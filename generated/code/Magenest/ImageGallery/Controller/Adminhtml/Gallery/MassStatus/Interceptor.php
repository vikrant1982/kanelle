<?php
namespace Magenest\ImageGallery\Controller\Adminhtml\Gallery\MassStatus;

/**
 * Interceptor class for @see \Magenest\ImageGallery\Controller\Adminhtml\Gallery\MassStatus
 */
class Interceptor extends \Magenest\ImageGallery\Controller\Adminhtml\Gallery\MassStatus implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magenest\ImageGallery\Model\ResourceModel\Gallery\CollectionFactory $collectionFactory)
    {
        $this->___init();
        parent::__construct($context, $coreRegistry, $resultPageFactory, $collectionFactory);
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
