<?php
namespace Magento\Store\Controller\Store\Redirect;

/**
 * Interceptor class for @see \Magento\Store\Controller\Store\Redirect
 */
class Interceptor extends \Magento\Store\Controller\Store\Redirect implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Store\Api\StoreRepositoryInterface $storeRepository, \Magento\Store\Api\StoreResolverInterface $storeResolver, \Magento\Framework\Session\Generic $session, \Magento\Framework\Session\SidResolverInterface $sidResolver)
    {
        $this->___init();
        parent::__construct($context, $storeRepository, $storeResolver, $session, $sidResolver);
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
