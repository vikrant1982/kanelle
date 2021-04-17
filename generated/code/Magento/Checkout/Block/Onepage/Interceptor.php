<?php
namespace Magento\Checkout\Block\Onepage;

/**
 * Interceptor class for @see \Magento\Checkout\Block\Onepage
 */
class Interceptor extends \Magento\Checkout\Block\Onepage implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Framework\Data\Form\FormKey $formKey, \Magento\Checkout\Model\CompositeConfigProvider $configProvider, array $layoutProcessors = [], array $data = [], ?\Magento\Framework\Serialize\Serializer\Json $serializer = null, ?\Magento\Framework\Serialize\SerializerInterface $serializerInterface = null)
    {
        $this->___init();
        parent::__construct($context, $formKey, $configProvider, $layoutProcessors, $data, $serializer, $serializerInterface);
    }

    /**
     * {@inheritdoc}
     */
    public function getJsLayout()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getJsLayout');
        if (!$pluginInfo) {
            return parent::getJsLayout();
        } else {
            return $this->___callPlugins('getJsLayout', func_get_args(), $pluginInfo);
        }
    }
}
