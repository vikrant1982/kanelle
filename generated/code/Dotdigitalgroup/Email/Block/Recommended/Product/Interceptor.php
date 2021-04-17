<?php
namespace Dotdigitalgroup\Email\Block\Recommended\Product;

/**
 * Interceptor class for @see \Dotdigitalgroup\Email\Block\Recommended\Product
 */
class Interceptor extends \Dotdigitalgroup\Email\Block\Recommended\Product implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Sales\Model\ResourceModel\Order $orderResource, \Magento\Sales\Model\OrderFactory $orderFactory, \Dotdigitalgroup\Email\Helper\Recommended $recommended, \Dotdigitalgroup\Email\Helper\Data $helper, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $orderResource, $orderFactory, $recommended, $helper, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getImage($product, $imageId, $attributes = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getImage');
        if (!$pluginInfo) {
            return parent::getImage($product, $imageId, $attributes);
        } else {
            return $this->___callPlugins('getImage', func_get_args(), $pluginInfo);
        }
    }
}
