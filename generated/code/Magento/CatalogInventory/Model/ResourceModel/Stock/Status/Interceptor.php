<?php
namespace Magento\CatalogInventory\Model\ResourceModel\Stock\Status;

/**
 * Interceptor class for @see \Magento\CatalogInventory\Model\ResourceModel\Stock\Status
 */
class Interceptor extends \Magento\CatalogInventory\Model\ResourceModel\Stock\Status implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Store\Model\WebsiteFactory $websiteFactory, \Magento\Eav\Model\Config $eavConfig, $connectionName = null, $stockConfiguration = null)
    {
        $this->___init();
        parent::__construct($context, $storeManager, $websiteFactory, $eavConfig, $connectionName, $stockConfiguration);
    }

    /**
     * {@inheritdoc}
     */
    public function addStockStatusToSelect(\Magento\Framework\DB\Select $select, \Magento\Store\Model\Website $website)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addStockStatusToSelect');
        if (!$pluginInfo) {
            return parent::addStockStatusToSelect($select, $website);
        } else {
            return $this->___callPlugins('addStockStatusToSelect', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addStockDataToCollection($collection, $isFilterInStock)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addStockDataToCollection');
        if (!$pluginInfo) {
            return parent::addStockDataToCollection($collection, $isFilterInStock);
        } else {
            return $this->___callPlugins('addStockDataToCollection', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addIsInStockFilterToCollection($collection)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addIsInStockFilterToCollection');
        if (!$pluginInfo) {
            return parent::addIsInStockFilterToCollection($collection);
        } else {
            return $this->___callPlugins('addIsInStockFilterToCollection', func_get_args(), $pluginInfo);
        }
    }
}
