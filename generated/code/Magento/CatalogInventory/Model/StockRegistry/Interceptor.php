<?php
namespace Magento\CatalogInventory\Model\StockRegistry;

/**
 * Interceptor class for @see \Magento\CatalogInventory\Model\StockRegistry
 */
class Interceptor extends \Magento\CatalogInventory\Model\StockRegistry implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration, \Magento\CatalogInventory\Model\Spi\StockRegistryProviderInterface $stockRegistryProvider, \Magento\CatalogInventory\Api\StockItemRepositoryInterface $stockItemRepository, \Magento\CatalogInventory\Api\StockItemCriteriaInterfaceFactory $criteriaFactory, \Magento\Catalog\Model\ProductFactory $productFactory)
    {
        $this->___init();
        parent::__construct($stockConfiguration, $stockRegistryProvider, $stockItemRepository, $criteriaFactory, $productFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getStockStatus($productId, $scopeId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStockStatus');
        if (!$pluginInfo) {
            return parent::getStockStatus($productId, $scopeId);
        } else {
            return $this->___callPlugins('getStockStatus', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getStockStatusBySku($productSku, $scopeId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStockStatusBySku');
        if (!$pluginInfo) {
            return parent::getStockStatusBySku($productSku, $scopeId);
        } else {
            return $this->___callPlugins('getStockStatusBySku', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getProductStockStatus($productId, $scopeId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getProductStockStatus');
        if (!$pluginInfo) {
            return parent::getProductStockStatus($productId, $scopeId);
        } else {
            return $this->___callPlugins('getProductStockStatus', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getProductStockStatusBySku($productSku, $scopeId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getProductStockStatusBySku');
        if (!$pluginInfo) {
            return parent::getProductStockStatusBySku($productSku, $scopeId);
        } else {
            return $this->___callPlugins('getProductStockStatusBySku', func_get_args(), $pluginInfo);
        }
    }
}
