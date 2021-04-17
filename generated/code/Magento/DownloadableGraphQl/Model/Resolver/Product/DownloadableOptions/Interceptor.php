<?php
namespace Magento\DownloadableGraphQl\Model\Resolver\Product\DownloadableOptions;

/**
 * Interceptor class for @see \Magento\DownloadableGraphQl\Model\Resolver\Product\DownloadableOptions
 */
class Interceptor extends \Magento\DownloadableGraphQl\Model\Resolver\Product\DownloadableOptions implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\GraphQl\Query\EnumLookup $enumLookup, \Magento\Downloadable\Helper\Data $downloadableHelper, \Magento\Downloadable\Model\ResourceModel\Sample\Collection $sampleCollection, \Magento\Downloadable\Model\ResourceModel\Link\Collection $linkCollection)
    {
        $this->___init();
        parent::__construct($enumLookup, $downloadableHelper, $sampleCollection, $linkCollection);
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
