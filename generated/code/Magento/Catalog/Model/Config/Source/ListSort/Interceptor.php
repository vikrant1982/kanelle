<?php
namespace Magento\Catalog\Model\Config\Source\ListSort;

/**
 * Interceptor class for @see \Magento\Catalog\Model\Config\Source\ListSort
 */
class Interceptor extends \Magento\Catalog\Model\Config\Source\ListSort implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\Config $catalogConfig)
    {
        $this->___init();
        parent::__construct($catalogConfig);
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toOptionArray');
        if (!$pluginInfo) {
            return parent::toOptionArray();
        } else {
            return $this->___callPlugins('toOptionArray', func_get_args(), $pluginInfo);
        }
    }
}
