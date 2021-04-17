<?php
namespace Magenest\ImageGallery\Controller\Gallery\Love;

/**
 * Interceptor class for @see \Magenest\ImageGallery\Controller\Gallery\Love
 */
class Interceptor extends \Magenest\ImageGallery\Controller\Gallery\Love implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magenest\ImageGallery\Model\ImageFactory $imageFactory, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory, \Magenest\ImageGallery\Model\ResourceModel\Interact\CollectionFactory $interactcollectionFactory, \Magenest\ImageGallery\Model\InteractFactory $interactFactory, \Magento\Customer\Model\Session $session)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $imageFactory, $resultJsonFactory, $interactcollectionFactory, $interactFactory, $session);
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
