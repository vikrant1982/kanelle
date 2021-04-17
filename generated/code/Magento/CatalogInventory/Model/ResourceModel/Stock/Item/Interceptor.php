<?php
namespace Magento\CatalogInventory\Model\ResourceModel\Stock\Item;

/**
 * Interceptor class for @see \Magento\CatalogInventory\Model\ResourceModel\Stock\Item
 */
class Interceptor extends \Magento\CatalogInventory\Model\ResourceModel\Stock\Item implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context, \Magento\CatalogInventory\Model\Indexer\Stock\Processor $processor, $connectionName = null, ?\Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration = null, ?\Magento\Framework\Stdlib\DateTime\DateTime $dateTime = null)
    {
        $this->___init();
        parent::__construct($context, $processor, $connectionName, $stockConfiguration, $dateTime);
    }

    /**
     * {@inheritdoc}
     */
    public function updateSetOutOfStock(int $websiteId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'updateSetOutOfStock');
        if (!$pluginInfo) {
            return parent::updateSetOutOfStock($websiteId);
        } else {
            return $this->___callPlugins('updateSetOutOfStock', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function updateSetInStock(int $websiteId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'updateSetInStock');
        if (!$pluginInfo) {
            return parent::updateSetInStock($websiteId);
        } else {
            return $this->___callPlugins('updateSetInStock', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Magento\Framework\Model\AbstractModel $object)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'save');
        if (!$pluginInfo) {
            return parent::save($object);
        } else {
            return $this->___callPlugins('save', func_get_args(), $pluginInfo);
        }
    }
}
