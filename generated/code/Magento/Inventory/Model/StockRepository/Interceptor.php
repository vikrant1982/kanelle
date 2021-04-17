<?php
namespace Magento\Inventory\Model\StockRepository;

/**
 * Interceptor class for @see \Magento\Inventory\Model\StockRepository
 */
class Interceptor extends \Magento\Inventory\Model\StockRepository implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Inventory\Model\Stock\Command\SaveInterface $commandSave, \Magento\Inventory\Model\Stock\Command\GetInterface $commandGet, \Magento\Inventory\Model\Stock\Command\DeleteByIdInterface $commandDeleteById, \Magento\Inventory\Model\Stock\Command\GetListInterface $commandGetList)
    {
        $this->___init();
        parent::__construct($commandSave, $commandGet, $commandDeleteById, $commandGetList);
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Magento\InventoryApi\Api\Data\StockInterface $stock) : int
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'save');
        if (!$pluginInfo) {
            return parent::save($stock);
        } else {
            return $this->___callPlugins('save', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function get(int $stockId) : \Magento\InventoryApi\Api\Data\StockInterface
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'get');
        if (!$pluginInfo) {
            return parent::get($stockId);
        } else {
            return $this->___callPlugins('get', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $stockId) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'deleteById');
        if (!$pluginInfo) {
            parent::deleteById($stockId);
        } else {
            $this->___callPlugins('deleteById', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getList(?\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null) : \Magento\InventoryApi\Api\Data\StockSearchResultsInterface
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getList');
        if (!$pluginInfo) {
            return parent::getList($searchCriteria);
        } else {
            return $this->___callPlugins('getList', func_get_args(), $pluginInfo);
        }
    }
}
