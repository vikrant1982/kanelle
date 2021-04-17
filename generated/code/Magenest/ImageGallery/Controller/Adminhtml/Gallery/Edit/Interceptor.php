<?php
namespace Magenest\ImageGallery\Controller\Adminhtml\Gallery\Edit;

/**
 * Interceptor class for @see \Magenest\ImageGallery\Controller\Adminhtml\Gallery\Edit
 */
class Interceptor extends \Magenest\ImageGallery\Controller\Adminhtml\Gallery\Edit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\Registry $registry, \Magenest\ImageGallery\Model\GalleryFactory $galleryFactory)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $registry, $galleryFactory);
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
