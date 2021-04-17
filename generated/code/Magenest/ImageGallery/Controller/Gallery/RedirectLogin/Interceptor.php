<?php
namespace Magenest\ImageGallery\Controller\Gallery\RedirectLogin;

/**
 * Interceptor class for @see \Magenest\ImageGallery\Controller\Gallery\RedirectLogin
 */
class Interceptor extends \Magenest\ImageGallery\Controller\Gallery\RedirectLogin implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\UrlInterface $url)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $url);
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
