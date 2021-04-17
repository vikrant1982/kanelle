<?php
namespace Magenest\ImageGallery\Controller\Gallery\GetListImage;

/**
 * Interceptor class for @see \Magenest\ImageGallery\Controller\Gallery\GetListImage
 */
class Interceptor extends \Magenest\ImageGallery\Controller\Gallery\GetListImage implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory, \Magento\Framework\App\RequestInterface $request, \Magenest\ImageGallery\Model\GalleryFactory $galleryFactory, \Magenest\ImageGallery\Model\ResourceModel\Gallery\CollectionFactory $galleryCollectionFactory, \Magenest\ImageGallery\Model\ResourceModel\Interact\CollectionFactory $interactCollectionFactory, \Magenest\ImageGallery\Model\ImageFactory $imageFactory, \Magento\Customer\Model\Session $session, \Magento\Catalog\Model\ProductFactory $productFactory, \Magenest\ImageGallery\Model\ResourceModel\GalleryImage\CollectionFactory $galleryImageCollectionFactory)
    {
        $this->___init();
        parent::__construct($context, $resultJsonFactory, $request, $galleryFactory, $galleryCollectionFactory, $interactCollectionFactory, $imageFactory, $session, $productFactory, $galleryImageCollectionFactory);
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
