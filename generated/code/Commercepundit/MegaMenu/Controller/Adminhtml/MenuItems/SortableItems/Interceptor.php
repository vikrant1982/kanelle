<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuItems\SortableItems;

/**
 * Interceptor class for @see \Commercepundit\MegaMenu\Controller\Adminhtml\MenuItems\SortableItems
 */
class Interceptor extends \Commercepundit\MegaMenu\Controller\Adminhtml\MenuItems\SortableItems implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Commercepundit\MegaMenu\Helper\Defaults $defaults, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->___init();
        parent::__construct($context, $defaults, $resultPageFactory);
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
