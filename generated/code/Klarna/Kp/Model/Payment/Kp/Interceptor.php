<?php
namespace Klarna\Kp\Model\Payment\Kp;

/**
 * Interceptor class for @see \Klarna\Kp\Model\Payment\Kp
 */
class Interceptor extends \Klarna\Kp\Model\Payment\Kp implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Payment\Model\Method\Adapter $adapter, \Magento\Framework\Locale\Resolver $resolver, \Magento\Framework\App\Config\ScopeConfigInterface $config, \Klarna\Kp\Model\SessionInitiatorFactory $sessionInitiatorFactory)
    {
        $this->___init();
        parent::__construct($adapter, $resolver, $config, $sessionInitiatorFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function denyPayment(\Magento\Payment\Model\InfoInterface $payment)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'denyPayment');
        if (!$pluginInfo) {
            return parent::denyPayment($payment);
        } else {
            return $this->___callPlugins('denyPayment', func_get_args(), $pluginInfo);
        }
    }
}
