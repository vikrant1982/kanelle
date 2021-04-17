<?php
namespace Dotdigitalgroup\Email\Block\Recommended\Quoteproducts;

/**
 * Interceptor class for @see \Dotdigitalgroup\Email\Block\Recommended\Quoteproducts
 */
class Interceptor extends \Dotdigitalgroup\Email\Block\Recommended\Quoteproducts implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Dotdigitalgroup\Email\Helper\Data $helper, \Dotdigitalgroup\Email\Helper\Recommended $recommendedHelper, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $helper, $recommendedHelper, $data);
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
