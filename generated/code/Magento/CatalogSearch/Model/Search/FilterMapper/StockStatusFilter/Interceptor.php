<?php
namespace Magento\CatalogSearch\Model\Search\FilterMapper\StockStatusFilter;

/**
 * Interceptor class for @see \Magento\CatalogSearch\Model\Search\FilterMapper\StockStatusFilter
 */
class Interceptor extends \Magento\CatalogSearch\Model\Search\FilterMapper\StockStatusFilter implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ResourceConnection $resourceConnection, \Magento\Framework\Search\Adapter\Mysql\ConditionManager $conditionManager, \Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration, \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry)
    {
        $this->___init();
        parent::__construct($resourceConnection, $conditionManager, $stockConfiguration, $stockRegistry);
    }

    /**
     * {@inheritdoc}
     */
    public function apply(\Magento\Framework\DB\Select $select, $stockValues, $type, $showOutOfStockFlag)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'apply');
        if (!$pluginInfo) {
            return parent::apply($select, $stockValues, $type, $showOutOfStockFlag);
        } else {
            return $this->___callPlugins('apply', func_get_args(), $pluginInfo);
        }
    }
}
