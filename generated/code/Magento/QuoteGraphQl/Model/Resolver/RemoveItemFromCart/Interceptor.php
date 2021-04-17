<?php
namespace Magento\QuoteGraphQl\Model\Resolver\RemoveItemFromCart;

/**
 * Interceptor class for @see \Magento\QuoteGraphQl\Model\Resolver\RemoveItemFromCart
 */
class Interceptor extends \Magento\QuoteGraphQl\Model\Resolver\RemoveItemFromCart implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\QuoteGraphQl\Model\Cart\GetCartForUser $getCartForUser, \Magento\Quote\Api\CartItemRepositoryInterface $cartItemRepository)
    {
        $this->___init();
        parent::__construct($getCartForUser, $cartItemRepository);
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
