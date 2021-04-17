<?php
namespace Magenest\ImageGallery\Controller\Adminhtml\Image\MassDelete;

/**
 * Interceptor class for @see \Magenest\ImageGallery\Controller\Adminhtml\Image\MassDelete
 */
class Interceptor extends \Magenest\ImageGallery\Controller\Adminhtml\Image\MassDelete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magenest\ImageGallery\Model\ResourceModel\Image\CollectionFactory $collectionFactory, \Magenest\ImageGallery\Model\ResourceModel\GalleryImage\CollectionFactory $galleryImageCollectionFactory)
    {
        $this->___init();
        parent::__construct($context, $coreRegistry, $resultPageFactory, $collectionFactory, $galleryImageCollectionFactory);
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
