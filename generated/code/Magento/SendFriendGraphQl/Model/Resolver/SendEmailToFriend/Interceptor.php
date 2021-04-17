<?php
namespace Magento\SendFriendGraphQl\Model\Resolver\SendEmailToFriend;

/**
 * Interceptor class for @see \Magento\SendFriendGraphQl\Model\Resolver\SendEmailToFriend
 */
class Interceptor extends \Magento\SendFriendGraphQl\Model\Resolver\SendEmailToFriend implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\SendFriend\Model\SendFriendFactory $sendFriendFactory, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\Framework\DataObjectFactory $dataObjectFactory, \Magento\Framework\Event\ManagerInterface $eventManager)
    {
        $this->___init();
        parent::__construct($sendFriendFactory, $productRepository, $dataObjectFactory, $eventManager);
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
