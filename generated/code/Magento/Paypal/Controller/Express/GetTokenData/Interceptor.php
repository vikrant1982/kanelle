<?php
namespace Magento\Paypal\Controller\Express\GetTokenData;

/**
 * Interceptor class for @see \Magento\Paypal\Controller\Express\GetTokenData
 */
class Interceptor extends \Magento\Paypal\Controller\Express\GetTokenData implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Customer\Model\Session $customerSession, \Magento\Checkout\Model\Session $checkoutSession, \Magento\Sales\Model\OrderFactory $orderFactory, \Magento\Paypal\Model\Express\Checkout\Factory $checkoutFactory, \Magento\Framework\Session\Generic $paypalSession, \Magento\Framework\Url\Helper\Data $urlHelper, \Magento\Customer\Model\Url $customerUrl, \Psr\Log\LoggerInterface $logger, \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository, \Magento\Quote\Api\CartRepositoryInterface $cartRepository, \Magento\Quote\Api\GuestCartRepositoryInterface $guestCartRepository)
    {
        $this->___init();
        parent::__construct($context, $customerSession, $checkoutSession, $orderFactory, $checkoutFactory, $paypalSession, $urlHelper, $customerUrl, $logger, $customerRepository, $cartRepository, $guestCartRepository);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
