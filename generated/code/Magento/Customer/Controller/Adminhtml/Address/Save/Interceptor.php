<?php
namespace Magento\Customer\Controller\Adminhtml\Address\Save;

/**
 * Interceptor class for @see \Magento\Customer\Controller\Adminhtml\Address\Save
 */
class Interceptor extends \Magento\Customer\Controller\Adminhtml\Address\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Customer\Api\AddressRepositoryInterface $addressRepository, \Magento\Customer\Model\Metadata\FormFactory $formFactory, \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository, \Magento\Framework\Api\DataObjectHelper $dataObjectHelper, \Magento\Customer\Api\Data\AddressInterfaceFactory $addressDataFactory, \Psr\Log\LoggerInterface $logger, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
    {
        $this->___init();
        parent::__construct($context, $addressRepository, $formFactory, $customerRepository, $dataObjectHelper, $addressDataFactory, $logger, $resultJsonFactory);
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
