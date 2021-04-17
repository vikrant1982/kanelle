<?php
namespace Temando\Shipping\Controller\Adminhtml\Batch\PrintPackageSlips;

/**
 * Interceptor class for @see \Temando\Shipping\Controller\Adminhtml\Batch\PrintPackageSlips
 */
class Interceptor extends \Temando\Shipping\Controller\Adminhtml\Batch\PrintPackageSlips implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Ui\Component\MassAction\Filter $filter, \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $collectionFactory, \Magento\Framework\Stdlib\DateTime\DateTime $dateTime, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Magento\Sales\Model\Order\Pdf\Shipment $shipment, \Magento\Sales\Model\ResourceModel\Order\Shipment\CollectionFactory $shipmentCollectionFactory)
    {
        $this->___init();
        parent::__construct($context, $filter, $collectionFactory, $dateTime, $fileFactory, $shipment, $shipmentCollectionFactory);
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
