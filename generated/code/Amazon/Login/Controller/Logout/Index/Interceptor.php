<?php
namespace Amazon\Login\Controller\Logout\Index;

/**
 * Interceptor class for @see \Amazon\Login\Controller\Logout\Index
 */
class Interceptor extends \Amazon\Login\Controller\Logout\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\Controller\Result\JsonFactory $jsonFactory, \Amazon\Login\Helper\Session $sessionHelper)
    {
        $this->___init();
        parent::__construct($context, $jsonFactory, $sessionHelper);
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
