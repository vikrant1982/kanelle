<?php
namespace Magento\CatalogGraphQl\Model\Resolver\Products;

/**
 * Interceptor class for @see \Magento\CatalogGraphQl\Model\Resolver\Products
 */
class Interceptor extends \Magento\CatalogGraphQl\Model\Resolver\Products implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder $searchCriteriaBuilder, \Magento\CatalogGraphQl\Model\Resolver\Products\Query\Search $searchQuery, \Magento\CatalogGraphQl\Model\Resolver\Products\Query\Filter $filterQuery, \Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\SearchFilter $searchFilter)
    {
        $this->___init();
        parent::__construct($searchCriteriaBuilder, $searchQuery, $filterQuery, $searchFilter);
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
