<?php
namespace Magento\Sales\Model\Order\ShipmentDocumentFactory;

/**
 * Interceptor class for @see \Magento\Sales\Model\Order\ShipmentDocumentFactory
 */
class Interceptor extends \Magento\Sales\Model\Order\ShipmentDocumentFactory implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Sales\Model\Order\ShipmentFactory $shipmentFactory, \Magento\Framework\EntityManager\HydratorPool $hydratorPool, \Magento\Sales\Model\Order\Shipment\TrackFactory $trackFactory, ?\Magento\Sales\Model\Order\ShipmentDocumentFactory\ExtensionAttributesProcessor $extensionAttributesProcessor = null)
    {
        $this->___init();
        parent::__construct($shipmentFactory, $hydratorPool, $trackFactory, $extensionAttributesProcessor);
    }

    /**
     * {@inheritdoc}
     */
    public function create(\Magento\Sales\Api\Data\OrderInterface $order, array $items = [], array $tracks = [], ?\Magento\Sales\Api\Data\ShipmentCommentCreationInterface $comment = null, $appendComment = false, array $packages = [], ?\Magento\Sales\Api\Data\ShipmentCreationArgumentsInterface $arguments = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'create');
        if (!$pluginInfo) {
            return parent::create($order, $items, $tracks, $comment, $appendComment, $packages, $arguments);
        } else {
            return $this->___callPlugins('create', func_get_args(), $pluginInfo);
        }
    }
}
