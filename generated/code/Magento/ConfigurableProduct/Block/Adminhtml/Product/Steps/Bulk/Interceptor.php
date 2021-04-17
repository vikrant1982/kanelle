<?php
namespace Magento\ConfigurableProduct\Block\Adminhtml\Product\Steps\Bulk;

/**
 * Interceptor class for @see \Magento\ConfigurableProduct\Block\Adminhtml\Product\Steps\Bulk
 */
class Interceptor extends \Magento\ConfigurableProduct\Block\Adminhtml\Product\Steps\Bulk implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Catalog\Helper\Image $image, \Magento\Catalog\Model\Product\Media\Config $catalogProductMediaConfig, \Magento\Catalog\Model\ProductFactory $productFactory)
    {
        $this->___init();
        parent::__construct($context, $image, $catalogProductMediaConfig, $productFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function setTemplate($template)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTemplate');
        if (!$pluginInfo) {
            return parent::setTemplate($template);
        } else {
            return $this->___callPlugins('setTemplate', func_get_args(), $pluginInfo);
        }
    }
}
