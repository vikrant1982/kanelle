<?php
namespace Magento\Shipping\Block\DataProviders\Tracking\DeliveryDateTitle;

/**
 * Interceptor class for @see \Magento\Shipping\Block\DataProviders\Tracking\DeliveryDateTitle
 */
class Interceptor extends \Magento\Shipping\Block\DataProviders\Tracking\DeliveryDateTitle implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct()
    {
        $this->___init();
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(\Magento\Shipping\Model\Tracking\Result\Status $trackingStatus)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTitle');
        if (!$pluginInfo) {
            return parent::getTitle($trackingStatus);
        } else {
            return $this->___callPlugins('getTitle', func_get_args(), $pluginInfo);
        }
    }
}
