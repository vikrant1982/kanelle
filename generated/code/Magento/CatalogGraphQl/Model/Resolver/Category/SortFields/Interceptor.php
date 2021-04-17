<?php
namespace Magento\CatalogGraphQl\Model\Resolver\Category\SortFields;

/**
 * Interceptor class for @see \Magento\CatalogGraphQl\Model\Resolver\Category\SortFields
 */
class Interceptor extends \Magento\CatalogGraphQl\Model\Resolver\Category\SortFields implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\Config $catalogConfig, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Catalog\Model\Category\Attribute\Source\Sortby $sortbyAttributeSource)
    {
        $this->___init();
        parent::__construct($catalogConfig, $storeManager, $sortbyAttributeSource);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        if (!$pluginInfo) {
            return parent::resolve($field, $context, $info, $value, $args);
        } else {
            return $this->___callPlugins('resolve', func_get_args(), $pluginInfo);
        }
    }
}
