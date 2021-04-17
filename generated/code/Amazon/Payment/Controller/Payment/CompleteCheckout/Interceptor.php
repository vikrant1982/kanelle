<?php
namespace Amazon\Payment\Controller\Payment\CompleteCheckout;

/**
 * Interceptor class for @see \Amazon\Payment\Controller\Payment\CompleteCheckout
 */
class Interceptor extends \Amazon\Payment\Controller\Payment\CompleteCheckout implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Amazon\Core\Model\AmazonConfig $amazonConfig, \Magento\Quote\Api\CartManagementInterface $cartManagement, \Magento\Quote\Api\GuestCartManagementInterface $guestCartManagement, \Magento\Checkout\Model\Session $checkoutSession, \Magento\Customer\Model\Session $session, \Magento\Framework\View\Result\PageFactory $pageFactory, \Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->___init();
        parent::__construct($context, $amazonConfig, $cartManagement, $guestCartManagement, $checkoutSession, $session, $pageFactory, $messageManager);
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
