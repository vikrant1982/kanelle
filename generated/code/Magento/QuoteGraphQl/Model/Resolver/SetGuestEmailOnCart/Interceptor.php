<?php
namespace Magento\QuoteGraphQl\Model\Resolver\SetGuestEmailOnCart;

/**
 * Interceptor class for @see \Magento\QuoteGraphQl\Model\Resolver\SetGuestEmailOnCart
 */
class Interceptor extends \Magento\QuoteGraphQl\Model\Resolver\SetGuestEmailOnCart implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\QuoteGraphQl\Model\Cart\GetCartForUser $getCartForUser, \Magento\Quote\Api\CartRepositoryInterface $cartRepository, \Magento\Framework\Validator\EmailAddress $emailValidator)
    {
        $this->___init();
        parent::__construct($getCartForUser, $cartRepository, $emailValidator);
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
