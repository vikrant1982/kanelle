<?php
namespace Magenest\ImageGallery\Controller\Adminhtml\Gallery\Delete;

/**
 * Interceptor class for @see \Magenest\ImageGallery\Controller\Adminhtml\Gallery\Delete
 */
class Interceptor extends \Magenest\ImageGallery\Controller\Adminhtml\Gallery\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Filesystem $filesystem, \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory, \Magenest\ImageGallery\Model\ResourceModel\GalleryImage\CollectionFactory $galleryImageCollectionFactory, \Magenest\ImageGallery\Model\GalleryFactory $galleryFactory)
    {
        $this->___init();
        parent::__construct($context, $filesystem, $fileUploaderFactory, $galleryImageCollectionFactory, $galleryFactory);
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
