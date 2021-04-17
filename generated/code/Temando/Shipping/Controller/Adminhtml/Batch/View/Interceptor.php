<?php
namespace Temando\Shipping\Controller\Adminhtml\Batch\View;

/**
 * Interceptor class for @see \Temando\Shipping\Controller\Adminhtml\Batch\View
 */
class Interceptor extends \Temando\Shipping\Controller\Adminhtml\Batch\View implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Temando\Shipping\Model\ResourceModel\Repository\BatchRepositoryInterface $batchRepository, \Temando\Shipping\Model\BatchProviderInterface $batchProvider, \Temando\Shipping\ViewModel\DataProvider\BatchUrl $batchUrl, \Temando\Shipping\Model\ResourceModel\Repository\ShipmentReferenceRepositoryInterface $shipmentReferenceRepository, \Magento\Sales\Api\ShipmentRepositoryInterface $shipmentRepository)
    {
        $this->___init();
        parent::__construct($context, $batchRepository, $batchProvider, $batchUrl, $shipmentReferenceRepository, $shipmentRepository);
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
