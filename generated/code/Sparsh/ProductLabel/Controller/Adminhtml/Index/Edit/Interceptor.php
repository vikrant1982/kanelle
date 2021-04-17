<?php
namespace Sparsh\ProductLabel\Controller\Adminhtml\Index\Edit;

/**
 * Interceptor class for @see \Sparsh\ProductLabel\Controller\Adminhtml\Index\Edit
 */
class Interceptor extends \Sparsh\ProductLabel\Controller\Adminhtml\Index\Edit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Sparsh\ProductLabel\Model\ProductLabels $model, \Magento\Backend\Model\Session $session)
    {
        $this->___init();
        parent::__construct($context, $coreRegistry, $resultPageFactory, $model, $session);
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
