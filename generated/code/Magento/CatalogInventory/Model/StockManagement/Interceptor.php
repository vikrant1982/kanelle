<?php
namespace Magento\CatalogInventory\Model\StockManagement;

/**
 * Interceptor class for @see \Magento\CatalogInventory\Model\StockManagement
 */
class Interceptor extends \Magento\CatalogInventory\Model\StockManagement implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\CatalogInventory\Model\ResourceModel\Stock $stockResource, \Magento\CatalogInventory\Model\Spi\StockRegistryProviderInterface $stockRegistryProvider, \Magento\CatalogInventory\Model\StockState $stockState, \Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\CatalogInventory\Model\ResourceModel\QtyCounterInterface $qtyCounter, ?\Magento\CatalogInventory\Model\StockRegistryStorage $stockRegistryStorage = null)
    {
        $this->___init();
        parent::__construct($stockResource, $stockRegistryProvider, $stockState, $stockConfiguration, $productRepository, $qtyCounter, $stockRegistryStorage);
    }

    /**
     * {@inheritdoc}
     */
    public function registerProductsSale($items, $websiteId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'registerProductsSale');
        if (!$pluginInfo) {
            return parent::registerProductsSale($items, $websiteId);
        } else {
            return $this->___callPlugins('registerProductsSale', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function revertProductsSale($items, $websiteId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'revertProductsSale');
        if (!$pluginInfo) {
            return parent::revertProductsSale($items, $websiteId);
        } else {
            return $this->___callPlugins('revertProductsSale', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function backItemQty($productId, $qty, $scopeId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'backItemQty');
        if (!$pluginInfo) {
            return parent::backItemQty($productId, $qty, $scopeId);
        } else {
            return $this->___callPlugins('backItemQty', func_get_args(), $pluginInfo);
        }
    }
}
