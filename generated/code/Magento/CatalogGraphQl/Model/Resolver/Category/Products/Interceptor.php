<?php
namespace Magento\CatalogGraphQl\Model\Resolver\Category\Products;

/**
 * Interceptor class for @see \Magento\CatalogGraphQl\Model\Resolver\Category\Products
 */
class Interceptor extends \Magento\CatalogGraphQl\Model\Resolver\Category\Products implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder $searchCriteriaBuilder, \Magento\CatalogGraphQl\Model\Resolver\Products\Query\Filter $filterQuery)
    {
        $this->___init();
        parent::__construct($productRepository, $searchCriteriaBuilder, $filterQuery);
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
