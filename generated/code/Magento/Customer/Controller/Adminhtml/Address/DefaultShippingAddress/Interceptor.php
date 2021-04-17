<?php
namespace Magento\Customer\Controller\Adminhtml\Address\DefaultShippingAddress;

/**
 * Interceptor class for @see \Magento\Customer\Controller\Adminhtml\Address\DefaultShippingAddress
 */
class Interceptor extends \Magento\Customer\Controller\Adminhtml\Address\DefaultShippingAddress implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Customer\Api\AddressRepositoryInterface $addressRepository, \Psr\Log\LoggerInterface $logger, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
    {
        $this->___init();
        parent::__construct($context, $addressRepository, $logger, $resultJsonFactory);
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
