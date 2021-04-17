<?php
namespace Magento\CatalogSearch\Model\Search\FilterMapper\TermDropdownStrategy\ApplyStockConditionToSelect;

/**
 * Interceptor class for @see \Magento\CatalogSearch\Model\Search\FilterMapper\TermDropdownStrategy\ApplyStockConditionToSelect
 */
class Interceptor extends \Magento\CatalogSearch\Model\Search\FilterMapper\TermDropdownStrategy\ApplyStockConditionToSelect implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ResourceConnection $resourceConnection)
    {
        $this->___init();
        parent::__construct($resourceConnection);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(string $alias, string $stockAlias, \Magento\Framework\DB\Select $select)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        if (!$pluginInfo) {
            return parent::execute($alias, $stockAlias, $select);
        } else {
            return $this->___callPlugins('execute', func_get_args(), $pluginInfo);
        }
    }
}
