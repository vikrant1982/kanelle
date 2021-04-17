<?php
namespace Magento\CatalogGraphQl\Model\Resolver\Category\ProductsCount;

/**
 * Interceptor class for @see \Magento\CatalogGraphQl\Model\Resolver\Category\ProductsCount
 */
class Interceptor extends \Magento\CatalogGraphQl\Model\Resolver\Category\ProductsCount implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria, \Magento\CatalogGraphQl\Model\Resolver\Products\DataProvider\Product\CollectionProcessor\StockProcessor $stockProcessor)
    {
        $this->___init();
        parent::__construct($catalogProductVisibility, $searchCriteria, $stockProcessor);
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
