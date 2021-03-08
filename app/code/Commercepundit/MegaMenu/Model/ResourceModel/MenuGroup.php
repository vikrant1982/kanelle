<?php
namespace Commercepundit\MegaMenu\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Store\Model\StoreManagerInterface;

class MenuGroup extends AbstractDb
{
    /**
     * MenuGroup constructor.
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param null $connectionName
     */

	public function __construct(
		Context $context,
		StoreManagerInterface $storeManager,
		$connectionName = null
	)
	{
		parent::__construct($context, $connectionName);
		$this->_storeManager = $storeManager;
	}

    /**
     * init resource model
     */
	public function _construct()
	{
		$this->_init('commercepundit_megamenu_groups', 'group_id');
	}
}