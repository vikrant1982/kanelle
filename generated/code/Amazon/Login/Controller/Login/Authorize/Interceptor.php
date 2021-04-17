<?php
namespace Amazon\Login\Controller\Login\Authorize;

/**
 * Interceptor class for @see \Amazon\Login\Controller\Login\Authorize
 */
class Interceptor extends \Amazon\Login\Controller\Login\Authorize implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Amazon\Core\Domain\AmazonCustomerFactory $amazonCustomerFactory, \Amazon\Core\Client\ClientFactoryInterface $clientFactory, \Amazon\Core\Helper\Data $amazonCoreHelper, \Magento\Customer\Model\Url $customerUrl, \Amazon\Login\Model\Validator\AccessTokenRequestValidator $accessTokenRequestValidator, \Amazon\Login\Model\Customer\Account\Redirect $accountRedirect, \Amazon\Login\Model\Customer\MatcherInterface $matcher, \Amazon\Login\Api\CustomerLinkManagementInterface $customerLinkManagement, \Magento\Customer\Model\Session $customerSession, \Amazon\Login\Helper\Session $session, \Psr\Log\LoggerInterface $logger)
    {
        $this->___init();
        parent::__construct($context, $amazonCustomerFactory, $clientFactory, $amazonCoreHelper, $customerUrl, $accessTokenRequestValidator, $accountRedirect, $matcher, $customerLinkManagement, $customerSession, $session, $logger);
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
