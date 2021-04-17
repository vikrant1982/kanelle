<?php
namespace Magento\InventoryShippingAdminUi\Controller\Adminhtml\SourceSelection\Validate;

/**
 * Interceptor class for @see \Magento\InventoryShippingAdminUi\Controller\Adminhtml\SourceSelection\Validate
 */
class Interceptor extends \Magento\InventoryShippingAdminUi\Controller\Adminhtml\SourceSelection\Validate implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
    {
        $this->___init();
        parent::__construct($context, $resultJsonFactory);
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
