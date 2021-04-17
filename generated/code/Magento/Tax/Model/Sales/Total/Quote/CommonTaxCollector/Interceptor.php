<?php
namespace Magento\Tax\Model\Sales\Total\Quote\CommonTaxCollector;

/**
 * Interceptor class for @see \Magento\Tax\Model\Sales\Total\Quote\CommonTaxCollector
 */
class Interceptor extends \Magento\Tax\Model\Sales\Total\Quote\CommonTaxCollector implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Tax\Model\Config $taxConfig, \Magento\Tax\Api\TaxCalculationInterface $taxCalculationService, \Magento\Tax\Api\Data\QuoteDetailsInterfaceFactory $quoteDetailsDataObjectFactory, \Magento\Tax\Api\Data\QuoteDetailsItemInterfaceFactory $quoteDetailsItemDataObjectFactory, \Magento\Tax\Api\Data\TaxClassKeyInterfaceFactory $taxClassKeyDataObjectFactory, \Magento\Customer\Api\Data\AddressInterfaceFactory $customerAddressFactory, \Magento\Customer\Api\Data\RegionInterfaceFactory $customerAddressRegionFactory, ?\Magento\Tax\Helper\Data $taxHelper = null, ?\Magento\Tax\Api\Data\QuoteDetailsItemExtensionInterfaceFactory $quoteDetailsItemExtensionInterfaceFactory = null)
    {
        $this->___init();
        parent::__construct($taxConfig, $taxCalculationService, $quoteDetailsDataObjectFactory, $quoteDetailsItemDataObjectFactory, $taxClassKeyDataObjectFactory, $customerAddressFactory, $customerAddressRegionFactory, $taxHelper, $quoteDetailsItemExtensionInterfaceFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function mapAddress(\Magento\Quote\Model\Quote\Address $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapAddress');
        if (!$pluginInfo) {
            return parent::mapAddress($address);
        } else {
            return $this->___callPlugins('mapAddress', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function mapItem(\Magento\Tax\Api\Data\QuoteDetailsItemInterfaceFactory $itemDataObjectFactory, \Magento\Quote\Model\Quote\Item\AbstractItem $item, $priceIncludesTax, $useBaseCurrency, $parentCode = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapItem');
        if (!$pluginInfo) {
            return parent::mapItem($itemDataObjectFactory, $item, $priceIncludesTax, $useBaseCurrency, $parentCode);
        } else {
            return $this->___callPlugins('mapItem', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function mapItemExtraTaxables(\Magento\Tax\Api\Data\QuoteDetailsItemInterfaceFactory $itemDataObjectFactory, \Magento\Quote\Model\Quote\Item\AbstractItem $item, $priceIncludesTax, $useBaseCurrency)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapItemExtraTaxables');
        if (!$pluginInfo) {
            return parent::mapItemExtraTaxables($itemDataObjectFactory, $item, $priceIncludesTax, $useBaseCurrency);
        } else {
            return $this->___callPlugins('mapItemExtraTaxables', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function mapItems(\Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment, $priceIncludesTax, $useBaseCurrency)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapItems');
        if (!$pluginInfo) {
            return parent::mapItems($shippingAssignment, $priceIncludesTax, $useBaseCurrency);
        } else {
            return $this->___callPlugins('mapItems', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingDataObject(\Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment, \Magento\Quote\Model\Quote\Address\Total $total, $useBaseCurrency)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingDataObject');
        if (!$pluginInfo) {
            return parent::getShippingDataObject($shippingAssignment, $total, $useBaseCurrency);
        } else {
            return $this->___callPlugins('getShippingDataObject', func_get_args(), $pluginInfo);
        }
    }
}
