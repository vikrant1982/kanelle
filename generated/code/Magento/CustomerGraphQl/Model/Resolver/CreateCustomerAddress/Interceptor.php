<?php
namespace Magento\CustomerGraphQl\Model\Resolver\CreateCustomerAddress;

/**
 * Interceptor class for @see \Magento\CustomerGraphQl\Model\Resolver\CreateCustomerAddress
 */
class Interceptor extends \Magento\CustomerGraphQl\Model\Resolver\CreateCustomerAddress implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\CustomerGraphQl\Model\Customer\GetCustomer $getCustomer, \Magento\CustomerGraphQl\Model\Customer\Address\CreateCustomerAddress $createCustomerAddress, \Magento\CustomerGraphQl\Model\Customer\Address\ExtractCustomerAddressData $extractCustomerAddressData)
    {
        $this->___init();
        parent::__construct($getCustomer, $createCustomerAddress, $extractCustomerAddressData);
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
