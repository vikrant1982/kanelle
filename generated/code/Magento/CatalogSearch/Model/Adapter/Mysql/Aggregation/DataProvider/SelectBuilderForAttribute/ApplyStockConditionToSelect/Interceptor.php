<?php
namespace Magento\CatalogSearch\Model\Adapter\Mysql\Aggregation\DataProvider\SelectBuilderForAttribute\ApplyStockConditionToSelect;

/**
 * Interceptor class for @see \Magento\CatalogSearch\Model\Adapter\Mysql\Aggregation\DataProvider\SelectBuilderForAttribute\ApplyStockConditionToSelect
 */
class Interceptor extends \Magento\CatalogSearch\Model\Adapter\Mysql\Aggregation\DataProvider\SelectBuilderForAttribute\ApplyStockConditionToSelect implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ResourceConnection $resource)
    {
        $this->___init();
        parent::__construct($resource);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(\Magento\Framework\DB\Select $select) : \Magento\Framework\DB\Select
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        if (!$pluginInfo) {
            return parent::execute($select);
        } else {
            return $this->___callPlugins('execute', func_get_args(), $pluginInfo);
        }
    }
}
