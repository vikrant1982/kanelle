<?php
namespace Commercepundit\MegaMenu\Model\ResourceModel\MenuGroup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * map model object to resource model object
     */
	protected function _construct()
	{
		$this->_init('Commercepundit\MegaMenu\Model\MenuGroup', 'Commercepundit\MegaMenu\Model\ResourceModel\MenuGroup');
	}
}