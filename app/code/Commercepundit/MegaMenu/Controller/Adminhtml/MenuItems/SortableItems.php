<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuItems;

use Magento\Backend\App\Action;
use Commercepundit\MegaMenu\Helper\Defaults;
use Magento\Framework\View\Result\PageFactory;

class SortableItems extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */

	protected $resultPageFactory;

    /**
     * @var array
     */

	protected $_defaults;

    /**
     * SortableItems constructor.
     * @param Action\Context $context
     * @param Defaults $defaults
     * @param PageFactory $resultPageFactory
     */

	public function __construct(
		Action\Context $context,
		Defaults $defaults,
		PageFactory $resultPageFactory
	)
	{
		$this->_defaults = $defaults->get();
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

    /**
     * @return mixed
     */

	public function createMenuItems(){
		return $this->_objectManager->create('Commercepundit\MegaMenu\Model\MenuItems');
	}

    /**
     * @param $gid
     * @return mixed
     */

	public function getIdParent($gid){
		$menuItems= $this->createMenuItems();
		$status_child = $this->_defaults['isenabled'];
		$level_start = $this->_defaults['start_level'];
		$items = $menuItems->getIdParent($gid, $level_start, $status_child);
		$data = $items[0];
		return $data;
	}

    /**
     * @param $child
     * @return array
     */

	public function getOrderItems($child)
	{
		$arr = [];
		foreach ($child as $chi)
		{
			$arr[] = $chi->items_id;
		}
		if (count($arr))
		{
			return $arr;
		}
	}

	public function execute()
	{
		$gid = $this->getRequest()->getParam('gid');
		$data_items_by_group_id = $this->getIdParent($gid);
		$parent_id = $data_items_by_group_id['parent_id'];
		if (json_decode($this->getRequest()->getParam('element')))
		{
			$data = json_decode($this->getRequest()->getParam('element'));
			$this->getSortableItems($data, 1, $parent_id, 0);
		}
	}

    /**
     * @param $data
     * @param $depth_item
     * @param $parent_id
     * @param $order
     * @return $this|string
     */

	public function getSortableItems($data, $depth_item, $parent_id, $order)
	{
		$count = 0;
		$menuItems= $this->createMenuItems();
		$count_items = 0;
		$orderitems = [];
		$resultRedirect = $this->resultRedirectFactory->create();
		if ($this->getOrderItems($data))
		{
			$orderitems = $this->getOrderItems($data);
			$count_items = count($orderitems);
		}
		if ($data)
		{
			foreach ($data as $dat)
			{
				$count++;
				$id = $dat->items_id;
				$depth = $depth_item;
				$menuItems->load($id);
				$menuItems->setDepth($depth);
				$menuItems->setParentId((string)$parent_id);
				if (($count_items>0) && (count($orderitems)>0))
				{
					$order_items = 0;
					for($i = 0; $i < $count_items; $i++)
					{
						if($i>0)
							$p = $i-1;
						else
							$p = 0;

						if($orderitems[$i] == $id)
						{
							if ($orderitems[$p])
							{
								$order_items = $orderitems[$p];
							}
							/*else
							{
								$order_items = 0;
							}*/
						}
					}
					$menuItems->setOrderItem((string)$order_items);
					$menuItems->setPositionItem(2);
					$menuItems->setPriorities($count);
					try
					{
						if (isset($dat->children) && count($dat->children)>0)
						{
							$this->getSortableChildrenItems($dat->children, $depth+1, $id, $order_items, $count);
						}
						$menuItems->save();
					} catch (\Exception $e) {
						$this->messageManager->addError($e->getMessage());
						return $resultRedirect->setPath('*/*/edit', [
							'gid' => $menuItems->getGroupId(),
							'id'  => $menuItems->getItemsId(),
							'activeTab' => 'menuitems'
						]);
					}
				}else
					return '';
			}
		}
	}

    /**
     * @param $data
     * @param $depth_item
     * @param $parent_id
     * @param $order
     * @param $count
     * @return $this
     */

	public function getSortableChildrenItems($data, $depth_item, $parent_id, $order, $count)
	{
		$menuItems= $this->createMenuItems();
		$count_items = 0;
		$orderitems = [];
		$resultRedirect = $this->resultRedirectFactory->create();
		if ($this->getOrderItems($data))
		{
			$orderitems = $this->getOrderItems($data);
			$count_items = count($orderitems);
		}
		foreach ($data as $dat)
		{
			$count++;
			$id = $dat->items_id;
			$depth = $depth_item;
			$menuItems->load($id);
			$menuItems->setDepth($depth);
			$menuItems->setParentId((string)$parent_id);
			if (($count_items>0) && (count($orderitems)>0))
			{
				$order_items = 0;
				for($i = 0; $i < $count_items; $i++)
				{
					if($i>0)
						$p = $i-1;
					else
						$p = 0;

					if($orderitems[$i] == $id)
					{
						if ($orderitems[$p])
						{
							$order_items = $orderitems[$p];
						}
						else
						{
							$order_items = 0;
						}
					}
				}
				$menuItems->setOrderItem((string)$order_items);
				$menuItems->setPositionItem(2);
				$menuItems->setPriorities($count);
				try
				{
					if (isset($dat->children) && count($dat->children)>0)
					{
						$this->getSortableChildrenItems($dat->children, $depth+1, $id, $order_items, $count);
					}
					$menuItems->save();
				} catch (\Exception $e) {
					$this->messageManager->addError($e->getMessage());
					return $resultRedirect->setPath('*/*/edit', [
						'gid' => $menuItems->getGroupId(),
						'id'  => $menuItems->getItemsId(),
						'activeTab' => 'menuitems'
					]);
				}
			}
		}
	}
}