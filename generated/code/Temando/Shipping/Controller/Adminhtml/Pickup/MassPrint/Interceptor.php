<?php
namespace Temando\Shipping\Controller\Adminhtml\Pickup\MassPrint;

/**
 * Interceptor class for @see \Temando\Shipping\Controller\Adminhtml\Pickup\MassPrint
 */
class Interceptor extends \Temando\Shipping\Controller\Adminhtml\Pickup\MassPrint implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Temando\Shipping\Model\ResourceModel\Pickup\Grid\CollectionFactory $collectionFactory, \Temando\Shipping\Ui\Component\MassAction\Filter $filter, \Temando\Shipping\Model\Pickup\PickupLoader $pickupLoader, \Temando\Shipping\Model\PickupProviderInterface $pickupProvider, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Magento\Framework\Stdlib\DateTime\DateTime $dateTime, \Temando\Shipping\Model\Pickup\Pdf\PickupPdfFactory $pickupPdfFactory)
    {
        $this->___init();
        parent::__construct($context, $collectionFactory, $filter, $pickupLoader, $pickupProvider, $fileFactory, $dateTime, $pickupPdfFactory);
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
