<?php
namespace Magento\Customer\Controller\Adminhtml\Address\Validate;

/**
 * Interceptor class for @see \Magento\Customer\Controller\Adminhtml\Address\Validate
 */
class Interceptor extends \Magento\Customer\Controller\Adminhtml\Address\Validate implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory, \Magento\Customer\Model\Metadata\FormFactory $formFactory)
    {
        $this->___init();
        parent::__construct($context, $resultJsonFactory, $formFactory);
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
