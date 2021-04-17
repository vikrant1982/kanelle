<?php
namespace Magento\Sales\Block\Adminhtml\Order\Create\Totals\Discount;

/**
 * Interceptor class for @see \Magento\Sales\Block\Adminhtml\Order\Create\Totals\Discount
 */
class Interceptor extends \Magento\Sales\Block\Adminhtml\Order\Create\Totals\Discount implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Backend\Model\Session\Quote $sessionQuote, \Magento\Sales\Model\AdminOrder\Create $orderCreate, \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency, \Magento\Sales\Helper\Data $salesData, \Magento\Sales\Model\Config $salesConfig, \Magento\Tax\Model\Config $taxConfig, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $sessionQuote, $orderCreate, $priceCurrency, $salesData, $salesConfig, $taxConfig, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTotals()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotals');
        if (!$pluginInfo) {
            return parent::getTotals();
        } else {
            return $this->___callPlugins('getTotals', func_get_args(), $pluginInfo);
        }
    }
}
