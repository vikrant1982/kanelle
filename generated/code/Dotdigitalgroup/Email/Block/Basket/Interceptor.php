<?php
namespace Dotdigitalgroup\Email\Block\Basket;

/**
 * Interceptor class for @see \Dotdigitalgroup\Email\Block\Basket
 */
class Interceptor extends \Dotdigitalgroup\Email\Block\Basket implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Store\Model\App\EmulationFactory $emulationFactory, \Magento\Quote\Model\QuoteFactory $quoteFactory, \Dotdigitalgroup\Email\Helper\Data $helper, \Magento\Framework\Pricing\Helper\Data $priceHelper, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $emulationFactory, $quoteFactory, $helper, $priceHelper, $data);
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
