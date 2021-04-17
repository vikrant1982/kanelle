<?php
namespace Magento\Payment\Model\MethodList;

/**
 * Interceptor class for @see \Magento\Payment\Model\MethodList
 */
class Interceptor extends \Magento\Payment\Model\MethodList implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Payment\Helper\Data $paymentHelper, \Magento\Payment\Model\Checks\SpecificationFactory $specificationFactory)
    {
        $this->___init();
        parent::__construct($paymentHelper, $specificationFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getAvailableMethods(?\Magento\Quote\Api\Data\CartInterface $quote = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAvailableMethods');
        if (!$pluginInfo) {
            return parent::getAvailableMethods($quote);
        } else {
            return $this->___callPlugins('getAvailableMethods', func_get_args(), $pluginInfo);
        }
    }
}
