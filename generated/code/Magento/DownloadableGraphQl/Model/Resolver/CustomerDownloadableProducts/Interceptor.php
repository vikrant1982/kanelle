<?php
namespace Magento\DownloadableGraphQl\Model\Resolver\CustomerDownloadableProducts;

/**
 * Interceptor class for @see \Magento\DownloadableGraphQl\Model\Resolver\CustomerDownloadableProducts
 */
class Interceptor extends \Magento\DownloadableGraphQl\Model\Resolver\CustomerDownloadableProducts implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\DownloadableGraphQl\Model\ResourceModel\GetPurchasedDownloadableProducts $getPurchasedDownloadableProducts, \Magento\Framework\UrlInterface $urlBuilder)
    {
        $this->___init();
        parent::__construct($getPurchasedDownloadableProducts, $urlBuilder);
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
