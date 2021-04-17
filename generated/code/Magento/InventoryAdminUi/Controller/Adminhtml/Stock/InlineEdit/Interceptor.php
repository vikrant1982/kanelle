<?php
namespace Magento\InventoryAdminUi\Controller\Adminhtml\Stock\InlineEdit;

/**
 * Interceptor class for @see \Magento\InventoryAdminUi\Controller\Adminhtml\Stock\InlineEdit
 */
class Interceptor extends \Magento\InventoryAdminUi\Controller\Adminhtml\Stock\InlineEdit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Api\DataObjectHelper $dataObjectHelper, \Magento\InventoryApi\Api\StockRepositoryInterface $stockRepository)
    {
        $this->___init();
        parent::__construct($context, $dataObjectHelper, $stockRepository);
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
