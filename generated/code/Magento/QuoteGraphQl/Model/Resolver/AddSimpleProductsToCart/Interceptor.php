<?php
namespace Magento\QuoteGraphQl\Model\Resolver\AddSimpleProductsToCart;

/**
 * Interceptor class for @see \Magento\QuoteGraphQl\Model\Resolver\AddSimpleProductsToCart
 */
class Interceptor extends \Magento\QuoteGraphQl\Model\Resolver\AddSimpleProductsToCart implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\QuoteGraphQl\Model\Cart\GetCartForUser $getCartForUser, \Magento\QuoteGraphQl\Model\Cart\AddProductsToCart $addProductsToCart)
    {
        $this->___init();
        parent::__construct($getCartForUser, $addProductsToCart);
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
