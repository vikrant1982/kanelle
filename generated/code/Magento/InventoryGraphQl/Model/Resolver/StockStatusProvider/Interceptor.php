<?php
namespace Magento\InventoryGraphQl\Model\Resolver\StockStatusProvider;

/**
 * Interceptor class for @see \Magento\InventoryGraphQl\Model\Resolver\StockStatusProvider
 */
class Interceptor extends \Magento\InventoryGraphQl\Model\Resolver\StockStatusProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\InventorySalesApi\Api\IsProductSalableInterface $isProductSalable, \Magento\InventoryCatalog\Model\GetStockIdForCurrentWebsite $getStockIdForCurrentWebsite)
    {
        $this->___init();
        parent::__construct($isProductSalable, $getStockIdForCurrentWebsite);
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
