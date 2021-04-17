<?php
namespace Magento\InventoryAdminUi\Model\Stock\StockSourceLinkProcessor;

/**
 * Interceptor class for @see \Magento\InventoryAdminUi\Model\Stock\StockSourceLinkProcessor
 */
class Interceptor extends \Magento\InventoryAdminUi\Model\Stock\StockSourceLinkProcessor implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder, \Magento\InventoryApi\Api\Data\StockSourceLinkInterfaceFactory $stockSourceLinkFactory, \Magento\InventoryApi\Api\StockSourceLinksSaveInterface $stockSourceLinksSave, \Magento\InventoryApi\Api\StockSourceLinksDeleteInterface $stockSourceLinksDelete, \Magento\InventoryApi\Api\GetStockSourceLinksInterface $getStockSourceLinks, \Magento\Framework\Api\DataObjectHelper $dataObjectHelper)
    {
        $this->___init();
        parent::__construct($searchCriteriaBuilder, $stockSourceLinkFactory, $stockSourceLinksSave, $stockSourceLinksDelete, $getStockSourceLinks, $dataObjectHelper);
    }

    /**
     * {@inheritdoc}
     */
    public function process(int $stockId, array $linksData)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'process');
        if (!$pluginInfo) {
            return parent::process($stockId, $linksData);
        } else {
            return $this->___callPlugins('process', func_get_args(), $pluginInfo);
        }
    }
}
