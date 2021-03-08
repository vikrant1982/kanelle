<?php
namespace Commercepundit\MegaMenu\Model;

use \Magento\Framework\Registry;
use Magento\Framework\App\Action\Context as ActionContext;
use Commercepundit\MegaMenu\Api\Data\MenuItemsInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Data\Collection;
use Magento\Framework\DataObject;
use Commercepundit\MegaMenu\Helper\Defaults;
use Magento\Framework\Model\Context as FrameContext;
use Magento\Framework\Model\ResourceModel\Db\Context;

class MenuItems extends AbstractModel implements MenuItemsInterface
{
	/**
	 * @var \Magento\Framework\Message\ManagerInterface
	 */

	protected $messageManager;

    /**
     * @var array
     */

	protected $_defaults;

    /**
     * @var array|Collection
     */

	protected $_dataCollection = [];

    /**
     * @var array|DataObject
     */

	protected $_dataObject = [];

    /**
     * @var null
     */

	protected $_resource = null;

    /**
     * @var
     */

	protected $_query;

    /**
     * @var int
     */

	protected $_statusChild;

    /**
     * @var string
     */

	protected $_tableName;

    /**
     * MenuItems constructor.
     * @param EntityFactoryInterface $entityFactory
     * @param ActionContext $actionContext
     * @param Context $context
     * @param Registry $registry
     * @param Collection $collection
     * @param DataObject $dataObject
     * @param Defaults $defaults
     * @param FrameContext $frameContext
     * @param array $data
     */

	public function __construct(
		EntityFactoryInterface $entityFactory,
		ActionContext $actionContext,
		Context $context,
		Registry $registry,
		Collection $collection,
		DataObject $dataObject,
		Defaults $defaults,
		FrameContext $frameContext,
		array $data = []
	)
	{
		parent::__construct($frameContext, $registry);
		$this->_dataCollection = $collection;
		$this->_dataObject = $dataObject;
		$this->_defaults = $defaults->get($data);
		$this->messageManager = $actionContext->getMessageManager();
		$this->_statusChild = \Commercepundit\MegaMenu\Model\Config\Source\Status::STATUS_ENABLED;
		$this->_tableName = $this->_getResource()->getMainTable();
	}

    /**
     * init resource model
     */

	protected function _construct()
	{
		$this->_init('Commercepundit\MegaMenu\Model\ResourceModel\MenuItems');
	}

    /**
     * @return mixed
     */

	public function getItemsId()
	{
		return $this->getData(self::ITEMS_ID);
	}

    /**
     * @return mixed
     */

	public function getGroupId()
	{
		return $this->getData(self::GROUP_ID);
	}

    /**
     * @return mixed
     */

	public function getTitle()
	{
		return $this->getData(self::TITLE);
	}

    /**
     * @return mixed
     */

	public function getStatus()
	{
		return $this->getData(self::STATUS);
	}

    /**
     * @return mixed
     */

	public function getShowTitle()
	{
		return $this->getData(self::SHOW_TITLE);
	}

    /**
     * @return mixed
     */

	public function getDescription()
	{
		return $this->getData(self::DESCRIPTION);
	}

    /**
     * @return mixed
     */

	public function getAlign()
	{
		return $this->getData(self::ALIGN);
	}

    /**
     * @return mixed
     */

	public function getDepth()
	{
		return $this->getData(self::DEPTH);
	}

    /**
     * @return mixed
     */

	public function getColsNb()
	{
		return $this->getData(self::COLS_NB);
	}

    /**
     * @return mixed
     */

	public function getIconUrl()
	{
		return $this->getData(self::ICON_URL);
	}

    /**
     * @return mixed
     */

	public function getTarget()
	{
		return $this->getData(self::TARGET);
	}

    /**
     * @return mixed
     */

	public function getType()
	{
		return $this->getData(self::TYPE);
	}

    /**
     * @return mixed
     */

	public function getDataType()
	{
		return $this->getData(self::DATA_TYPE);
	}

    /**
     * @return mixed
     */

	public function getCustomClass()
	{
		return $this->getData(self::CUSTOM_CLASS);
	}

    /**
     * @return mixed
     */

	public function getParentId()
	{
		return $this->getData(self::PARENT_ID);
	}

    /**
     * @return mixed
     */

	public function getOrderItem()
	{
		return $this->getData(self::ORDER_ITEM);
	}

    /**
     * @return mixed
     */

	public function getPositionItem()
	{
		return $this->getData(self::POSITION_ITEM);
	}

    /**
     * @return mixed
     */

	public function getPriorities()
	{
		return $this->getData(self::PRIORITIES);
	}

    /**
     * @return mixed
     */

	public function getContent()
	{
		return $this->getData(self::CONTENT);
	}

    /**
     * @return mixed
     */

	public function getShowImageProduct()
	{
		return $this->getData(self::SHOW_IMAGE_PRODUCT);
	}

    /**
     * @return mixed
     */

	public function getShowTitleProduct()
	{
		return $this->getData(self::SHOW_TITLE_PRODUCT);
	}

    /**
     * @return mixed
     */

	public function getShowRatingProduct()
	{
		return $this->getData(self::SHOW_RATING_PRODUCT);
	}

    /**
     * @return mixed
     */

	public function getShowPriceProduct()
	{
		return $this->getData(self::SHOW_PRICE_PRODUCT);
	}

    /**
     * @return mixed
     */

	public function getShowTitleCategory()
	{
		return $this->getData(self::SHOW_TITLE_CATEGORY);
	}

    /**
     * @return mixed
     */

	public function getLimitCategory()
	{
		return $this->getData(self::LIMIT_CATEGORY);
	}

    /**
     * @param $itemsId
     * @return $this
     */

	public function setItemsId($itemsId)
	{
		return $this->setData(self::ITEMS_ID, $itemsId);
	}

    /**
     * @param $groupId
     * @return $this
     */

	public function setGroupId($groupId)
	{
		return $this->setData(self::GROUP_ID, $groupId);
	}

    /**
     * @param $title
     * @return $this
     */

	public function setTitle($title)
	{
		return $this->setData(self::TITLE, $title);
	}

    /**
     * @param $status
     * @return $this
     */

	public function setStatus($status)
	{
		return $this->setData(self::STATUS, $status);
	}

    /**
     * @param $content
     * @return $this
     */

	public function setContent($content)
	{
		return $this->setData(self::CONTENT, $content);
	}

    /**
     * @param $showTitle
     * @return $this
     */

	public function setShowTitle($showTitle)
	{
		return $this->setData(self::SHOW_TITLE, $showTitle);
	}

    /**
     * @param $desription
     * @return $this
     */

	public function setDescription($desription)
	{
		return $this->setData(self::DESCRIPTION, $desription);
	}

    /**
     * @param $align
     * @return $this
     */

	public function setAlign($align)
	{
		return $this->setData(self::ALIGN, $align);
	}

    /**
     * @param $depth
     * @return $this
     */

	public function setDepth($depth)
	{
		return $this->setData(self::DEPTH, $depth);
	}

    /**
     * @param $colsNb
     * @return $this
     */

	public function setColsNb($colsNb)
	{
		return $this->setData(self::COLS_NB, $colsNb);
	}

    /**
     * @param $iconUrl
     * @return $this
     */

	public function setIconUrl($iconUrl)
	{
		return $this->setData(self::ICON_URL, $iconUrl);
	}

    /**
     * @param $target
     * @return $this
     */

	public function setTarget($target)
	{
		return $this->setData(self::TARGET, $target);
	}

    /**
     * @param $type
     * @return $this
     */

	public function setType($type)
	{
		return $this->setData(self::TYPE, $type);
	}

    /**
     * @param $dataType
     * @return $this
     */

	public function setDataType($dataType)
	{
		return $this->setData(self::DATA_TYPE, $dataType);
	}

    /**
     * @param $customClass
     * @return $this
     */

	public function setCustomClass($customClass)
	{
		return $this->setData(self::CUSTOM_CLASS, $customClass);
	}

    /**
     * @param $parentId
     * @return $this
     */

	public function setParentId($parentId)
	{
		return $this->setData(self::PARENT_ID, $parentId);
	}

    /**
     * @param $orderItem
     * @return $this
     */

	public function setOrderItem($orderItem)
	{
		return $this->setData(self::ORDER_ITEM, $orderItem);
	}

    /**
     * @param $positionItem
     * @return $this
     */

	public function setPositionItem($positionItem)
	{
		return $this->setData(self::POSITION_ITEM, $positionItem);
	}

    /**
     * @param $priorities
     * @return $this
     */

	public function setPriorities($priorities)
	{
		return $this->setData(self::PRIORITIES, $priorities);
	}

    /**
     * @param $showImageProduct
     * @return $this
     */

	public function setShowImageProduct($showImageProduct)
	{
		return $this->setData(self::SHOW_IMAGE_PRODUCT, $showImageProduct);
	}

    /**
     * @param $showTitleProduct
     * @return $this
     */

	public function setShowTitleProduct($showTitleProduct)
	{
		return $this->setData(self::SHOW_TITLE_PRODUCT, $showTitleProduct);
	}

    /**
     * @param $showRatingProduct
     * @return $this
     */

	public function setShowRatingProduct($showRatingProduct)
	{
		return $this->setData(self::SHOW_RATING_PRODUCT, $showRatingProduct);
	}

    /**
     * @param $showPriceProduct
     * @return $this
     */

	public function setShowPriceProduct($showPriceProduct)
	{
		return $this->setData(self::SHOW_PRICE_PRODUCT, $showPriceProduct);
	}

    /**
     * @param $showTitleCategory
     * @return $this
     */

	public function setShowTitleCategory($showTitleCategory)
	{
		return $this->setData(self::SHOW_TITLE_CATEGORY, $showTitleCategory);
	}

    /**
     * @param $limitCategory
     * @return $this
     */

	public function setLimitCategory($limitCategory)
	{
		return $this->setData(self::LIMIT_CATEGORY, $limitCategory);
	}

    /**
     * @param $groupId
     * @param bool $addPrefix
     * @return mixed
     */

	public function getNodesByGroupId($groupId, $addPrefix = true)
	{
		$prefix = ($addPrefix) ? \Commercepundit\MegaMenu\Model\Config\Source\Prefix::PREFIX : '';
		$itemByGroupId = $this->getCollection()->getNodesByGroupId($prefix, $groupId);
		return $itemByGroupId;
	}

    /**
     * @param $parent
     * @param int $mode
     * @return array|bool
     */

	public function getChildsDirectlyByItem($parent, $mode = 1)
	{
		$tableName = $this->_tableName;
		$depth_child_directly = $parent['depth'] + 1;
		$parent_id = $parent['items_id'];
		$groupId = $parent['group_id'];
		$query = "
			SELECT * FROM {$tableName}
			WHERE (depth = '{$depth_child_directly}') AND parent_id = '{$parent_id}' AND group_id ='{$groupId}'
			ORDER BY priorities ASC
		";
		try {
			$childrenItems = $this->getCollection()->getConnection()->fetchAll($query);
			return $childrenItems;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return false;
		}
		return false;
	}

    /**
     * @param $groupId
     * @param $levelStart
     * @param $statusChild
     * @return array|bool
     */

	public function getIdParent($groupId, $levelStart, $statusChild)
	{
		$tableName = $this->_tableName;
		$filterStatus = "AND status ='{$statusChild}'";
		$query = "
			SELECT * FROM {$tableName}
			WHERE (depth = '{$levelStart}') AND group_id ='{$groupId}' {$filterStatus}
			ORDER BY items_id ASC
		";
		try {
			$childrenItems = $this->getCollection()->getConnection()->fetchAll($query);
			return $childrenItems;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return false;
		}
		return false;
	}

    /**
     * @param $item
     * @param int $mode
     * @param string $attributes
     * @return array|bool
     */

	public function getAllItemsInEqLv($item, $mode = 1, $attributes = '')
	{
		$tableName = $this->_tableName;
		$depth_child_directly = $item['depth'] + 1;
		$parent_id = $item['items_id'];
		$status_child = $this->_statusChild;
		$filter_status = "AND status ='{$status_child}'";
		if ($mode == 2) {
			$filter_status = '';
		}
		$groupId = $item['group_id'];
		if($attributes)
		{
			$query = "
				SELECT {$attributes} FROM {$tableName}
				WHERE (depth = '{$depth_child_directly}') AND parent_id = '{$parent_id}' AND group_id ='{$groupId}' {$filter_status}
				ORDER BY priorities ASC
			";
		}else
		{
			$query = "
				SELECT * FROM {$tableName}
				WHERE (depth = '{$depth_child_directly}') AND parent_id = '{$parent_id}' AND group_id ='{$groupId}' {$filter_status}
				ORDER BY priorities ASC
			";
		}

		try {
			$childrenItems = $this->getCollection()->getConnection()->fetchAll($query);
			return $childrenItems;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return false;
		}
		return false;
	}

    /**
     * @param $groupId
     */

	public function getDeleteItemsByGroup($groupId)
	{
		$tableName = $this->_tableName;
		try {
			$this->getCollection()->getDeleteItemsByGroup($tableName, $groupId);
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $id
     * @param $allItems
     * @param $groupId
     * @param $prioritiesOrder
     */

	public function setPrioritiesByNewItems($id, $allItems, $groupId, $prioritiesOrder)
	{
		$tableName = $this->_tableName;
		try {
			$this->getCollection()->setPrioritiesByNewItems($tableName, $id, $allItems, $groupId, $prioritiesOrder);
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $id
     * @param $groupId
     * @return bool|void
     */

	public function deleteNode($id, $groupId)
	{
		$tableName = $this->_tableName;
		try {
			$item_child = $this->getCollection()->getChidrenItemsByItems($id, $groupId);
			$this->getCollection()->deleteItems($tableName, $id, $groupId);
			if(count($item_child))
			{
				$this->deleteItemsChildByItemsId($item_child, $groupId);
			}
			return true;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $item_child
     * @param $groupId
     */

	public function deleteItemsChildByItemsId($item_child, $groupId)
	{
		$tableName = $this->_tableName;
		foreach ($item_child as $item)
		{
			try {
				$item_child = $this->getCollection()->getChidrenItemsByItems($item['items_id'], $groupId);
				$this->getCollection()->deleteItems($tableName, $item['items_id'], $groupId);
				if(count($item_child))
				{
					$this->deleteItemsChildByItemsId($item_child, $groupId);
				}
				/*return true;*/
			} catch (\Exception $e) {
				$this->messageManager->addError($e->getMessage());
				return;
			}
		}
	}

    /**
     * @param $groupId
     * @param $level_start
     */

	public function getItemsByLv($groupId, $level_start)
	{
		$status_child = $this->_statusChild;
		try
		{
			$items = $this->getCollection()->getItemsByLv($groupId, $level_start, $status_child);
			return $items;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $parentId
     * @param $groupId
     */

	public function getAllItemsByItemsId($parentId, $groupId){
		try
		{
			$items = $this->getCollection()->getAllItemsByItemsId($parentId, $groupId);
			return $items;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $parentId
     * @param $groupId
     */

	public function getAllItemsByItemsIdEnabled($parentId, $groupId){
		$status_child = $this->_statusChild;
		try
		{
			$items = $this->getCollection()->getAllItemsByItemsIdEnabled($parentId, $groupId, $status_child);
			return $items;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $type
     * @param $itemId
     * @param $groupId
     */

	public function getAllActivedItems($type, $itemId, $groupId){
		$status_child = $this->_statusChild;
		try
		{
			$items = $this->getCollection()->getAllActivedItems($status_child, $type, $itemId, $groupId);
			return $items;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $groupId
     */

	public function getAllLeafByGroupId($groupId){
		$lv_config = $this->_defaults['start_level']+1;
		$status_child = $this->_statusChild;
		try
		{
			$items = $this->getCollection()->getItemsByLv($groupId, $lv_config, $status_child);
			return $items;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}

    /**
     * @param $groupId
     */

	public function getAllItemsFirstByGroupId($groupId)
	{
		$tableName = $this->_tableName;
		$lv_config = $this->_defaults['start_level']+1;
		$status_child = $this->_statusChild;
		try
		{
			$items = $this->getCollection()->getAllItemsFirstByGroupId($tableName, $groupId, $lv_config, $status_child);
			return $items;
		} catch (\Exception $e) {
			$this->messageManager->addError($e->getMessage());
			return;
		}
	}
}