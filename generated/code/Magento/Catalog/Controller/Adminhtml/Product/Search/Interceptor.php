<?php
namespace Magento\Catalog\Controller\Adminhtml\Product\Search;

/**
 * Interceptor class for @see \Magento\Catalog\Controller\Adminhtml\Product\Search
 */
class Interceptor extends \Magento\Catalog\Controller\Adminhtml\Product\Search implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Controller\Result\JsonFactory $resultFactory, \Magento\Catalog\Model\ProductLink\Search $productSearch, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($resultFactory, $productSearch, $context);
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
