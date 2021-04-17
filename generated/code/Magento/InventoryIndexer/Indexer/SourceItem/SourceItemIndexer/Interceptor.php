<?php
namespace Magento\InventoryIndexer\Indexer\SourceItem\SourceItemIndexer;

/**
 * Interceptor class for @see \Magento\InventoryIndexer\Indexer\SourceItem\SourceItemIndexer
 */
class Interceptor extends \Magento\InventoryIndexer\Indexer\SourceItem\SourceItemIndexer implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\InventoryIndexer\Indexer\SourceItem\GetSkuListInStock $getSkuListInStockToUpdate, \Magento\InventoryMultiDimensionalIndexerApi\Model\IndexStructureInterface $indexStructureHandler, \Magento\InventoryMultiDimensionalIndexerApi\Model\IndexHandlerInterface $indexHandler, \Magento\InventoryIndexer\Indexer\SourceItem\IndexDataBySkuListProvider $indexDataBySkuListProvider, \Magento\InventoryMultiDimensionalIndexerApi\Model\IndexNameBuilder $indexNameBuilder, \Magento\InventoryIndexer\Indexer\Stock\StockIndexer $stockIndexer, \Magento\InventoryCatalogApi\Api\DefaultStockProviderInterface $defaultStockProvider)
    {
        $this->___init();
        parent::__construct($getSkuListInStockToUpdate, $indexStructureHandler, $indexHandler, $indexDataBySkuListProvider, $indexNameBuilder, $stockIndexer, $defaultStockProvider);
    }

    /**
     * {@inheritdoc}
     */
    public function executeList(array $sourceItemIds)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'executeList');
        if (!$pluginInfo) {
            return parent::executeList($sourceItemIds);
        } else {
            return $this->___callPlugins('executeList', func_get_args(), $pluginInfo);
        }
    }
}
