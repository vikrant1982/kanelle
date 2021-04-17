<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup\Delete;

/**
 * Interceptor class for @see \Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup\Delete
 */
class Interceptor extends \Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $registry)
    {
        $this->___init();
        parent::__construct($context, $registry);
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
