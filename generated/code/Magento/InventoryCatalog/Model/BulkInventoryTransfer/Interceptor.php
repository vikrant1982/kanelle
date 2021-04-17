<?php
namespace Magento\InventoryCatalog\Model\BulkInventoryTransfer;

/**
 * Interceptor class for @see \Magento\InventoryCatalog\Model\BulkInventoryTransfer
 */
class Interceptor extends \Magento\InventoryCatalog\Model\BulkInventoryTransfer implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\InventoryCatalogApi\Model\BulkInventoryTransferValidatorInterface $inventoryTransferValidator, \Magento\InventoryCatalog\Model\ResourceModel\BulkInventoryTransfer $bulkInventoryTransfer, \Magento\InventoryIndexer\Indexer\Source\SourceIndexer $sourceIndexer, \Magento\InventoryCatalogApi\Api\DefaultSourceProviderInterface $defaultSourceProvider, \Magento\InventoryCatalogApi\Model\GetProductIdsBySkusInterface $getProductIdsBySkus, \Magento\CatalogInventory\Model\Indexer\Stock $legacyIndexer)
    {
        $this->___init();
        parent::__construct($inventoryTransferValidator, $bulkInventoryTransfer, $sourceIndexer, $defaultSourceProvider, $getProductIdsBySkus, $legacyIndexer);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(array $skus, string $originSource, string $destinationSource, bool $unassignFromOrigin) : bool
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        if (!$pluginInfo) {
            return parent::execute($skus, $originSource, $destinationSource, $unassignFromOrigin);
        } else {
            return $this->___callPlugins('execute', func_get_args(), $pluginInfo);
        }
    }
}
