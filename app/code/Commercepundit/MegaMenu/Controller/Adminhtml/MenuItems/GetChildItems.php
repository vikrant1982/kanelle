<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuItems;

use Magento\Backend\App\Action\Context;
use Commercepundit\MegaMenu\Model\MenuItems;

class GetChildItems extends \Magento\Backend\App\Action
{
	/**
	 * Mega Menu
	 * @var \Commercepundit\MegaMenu\Model\MenuItems
	 */

	protected $_megaMenu;

    /**
     * GetChildItems constructor.
     * @param Context $context
     * @param MenuItems $menuItems
     * @param array $data
     */

	public function __construct(
		Context $context,
		MenuItems $menuItems,
		array $data = []
	)
	{
		$this->_megaMenu = $menuItems;
		parent::__construct($context);
	}

    /**
     * @return mixed
     */

	public function createMenuItems(){
		return $this->_objectManager->create('Commercepundit\MegaMenu\Model\MenuItems');
	}

    /**
     * return menu items
     */

	public function execute(){
		if($params = $this->getRequest()->getParams())
		{
			if($params['group'])
			{
				$paramsItem = $this->createMenuItems()->load($params['group']);
				$menuIemsByGroup = $this->createMenuItems()->load($params['group']);
				$data = $menuIemsByGroup->getData();

				$items_data = $this->createMenuItems()->getChildsDirectlyByItem($data, 1);
				$cols_num = 6;
				if($paramsItem->getColsNb()){
					$cols_num = $paramsItem->getColsNb();
				}
				$arr_items = [];
				$success = "true";

				if(count($items_data)){
					foreach ($items_data as $item){
						$arr_items[] = '{"id":"'.$item['items_id'].'", "title":'.json_encode('('.$item['items_id'].') '.$item['title']).'}';
					}
					header('Content-Type: application/x-json');
					echo '{"success":"", "items":' . json_encode($arr_items) . ', "col_max":"'.$cols_num.'"}';
				}
				else{
					echo '{"success":"", "items":' . json_encode($arr_items) . ', "col_max":"'.$cols_num.'"}';
				}
				die;
			}
		}
	}
}