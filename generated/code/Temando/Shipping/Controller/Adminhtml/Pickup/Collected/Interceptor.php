<?php
namespace Temando\Shipping\Controller\Adminhtml\Pickup\Collected;

/**
 * Interceptor class for @see \Temando\Shipping\Controller\Adminhtml\Pickup\Collected
 */
class Interceptor extends \Temando\Shipping\Controller\Adminhtml\Pickup\Collected implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Temando\Shipping\Model\Pickup\PickupLoader $pickupLoader, \Temando\Shipping\Model\PickupProviderInterface $pickupProvider, \Temando\Shipping\Model\ResourceModel\Repository\PickupRepositoryInterface $pickupRepository, \Magento\Sales\Api\OrderRepositoryInterface $orderRepository, \Temando\Shipping\Model\Pickup\Email\Sender\PickupSender $pickupSender)
    {
        $this->___init();
        parent::__construct($context, $pickupLoader, $pickupProvider, $pickupRepository, $orderRepository, $pickupSender);
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
