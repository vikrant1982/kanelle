<?php
namespace Magento\Quote\Model\Quote\Item;

/**
 * Interceptor class for @see \Magento\Quote\Model\Quote\Item
 */
class Interceptor extends \Magento\Quote\Model\Quote\Item implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory, \Magento\Framework\Api\AttributeValueFactory $customAttributeFactory, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency, \Magento\Sales\Model\Status\ListFactory $statusListFactory, \Magento\Framework\Locale\FormatInterface $localeFormat, \Magento\Quote\Model\Quote\Item\OptionFactory $itemOptionFactory, \Magento\Quote\Model\Quote\Item\Compare $quoteItemCompare, \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry, ?\Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, ?\Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = [], ?\Magento\Framework\Serialize\Serializer\Json $serializer = null)
    {
        $this->___init();
        parent::__construct($context, $registry, $extensionFactory, $customAttributeFactory, $productRepository, $priceCurrency, $statusListFactory, $localeFormat, $itemOptionFactory, $quoteItemCompare, $stockRegistry, $resource, $resourceCollection, $data, $serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function calcRowTotal()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'calcRowTotal');
        if (!$pluginInfo) {
            return parent::calcRowTotal();
        } else {
            return $this->___callPlugins('calcRowTotal', func_get_args(), $pluginInfo);
        }
    }
}
