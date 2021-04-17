<?php
namespace Sparsh\ProductLabel\Controller\Adminhtml\Index\Delete;

/**
 * Interceptor class for @see \Sparsh\ProductLabel\Controller\Adminhtml\Index\Delete
 */
class Interceptor extends \Sparsh\ProductLabel\Controller\Adminhtml\Index\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Sparsh\ProductLabel\Model\ProductLabels $model)
    {
        $this->___init();
        parent::__construct($context, $model);
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
