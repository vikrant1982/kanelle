<?php
namespace Temando\Shipping\Controller\Adminhtml\Batch\NewAction;

/**
 * Interceptor class for @see \Temando\Shipping\Controller\Adminhtml\Batch\NewAction
 */
class Interceptor extends \Temando\Shipping\Controller\Adminhtml\Batch\NewAction implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Temando\Shipping\Model\Config\ModuleConfigInterface $config, \Temando\Shipping\Model\BatchProviderInterface $batchProvider, \Temando\Shipping\Model\ResourceModel\Batch\OrderCollectionFactory $collectionFactory, \Magento\Ui\Component\MassAction\Filter $massActionFilter)
    {
        $this->___init();
        parent::__construct($context, $config, $batchProvider, $collectionFactory, $massActionFilter);
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
