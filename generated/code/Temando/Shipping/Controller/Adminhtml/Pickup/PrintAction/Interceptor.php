<?php
namespace Temando\Shipping\Controller\Adminhtml\Pickup\PrintAction;

/**
 * Interceptor class for @see \Temando\Shipping\Controller\Adminhtml\Pickup\PrintAction
 */
class Interceptor extends \Temando\Shipping\Controller\Adminhtml\Pickup\PrintAction implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Stdlib\DateTime\DateTime $dateTime, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Temando\Shipping\Model\Pickup\Pdf\PickupPdfFactory $pickupPdfFactory, \Temando\Shipping\Model\Pickup\PickupLoader $pickupLoader, \Temando\Shipping\Model\PickupProviderInterface $pickupProvider)
    {
        $this->___init();
        parent::__construct($context, $dateTime, $fileFactory, $pickupPdfFactory, $pickupLoader, $pickupProvider);
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
