<?php
namespace Magento\CatalogGraphQl\Model\Resolver\Categories;

/**
 * Interceptor class for @see \Magento\CatalogGraphQl\Model\Resolver\Categories
 */
class Interceptor extends \Magento\CatalogGraphQl\Model\Resolver\Categories implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory, \Magento\CatalogGraphQl\Model\AttributesJoiner $attributesJoiner, \Magento\CatalogGraphQl\Model\Resolver\Products\DataProvider\CustomAttributesFlattener $customAttributesFlattener, \Magento\Framework\GraphQl\Query\Resolver\ValueFactory $valueFactory, \Magento\CatalogGraphQl\Model\Category\Hydrator $categoryHydrator)
    {
        $this->___init();
        parent::__construct($collectionFactory, $attributesJoiner, $customAttributesFlattener, $valueFactory, $categoryHydrator);
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
