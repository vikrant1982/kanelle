<?php
namespace Magento\InventoryAdminUi\Ui\DataProvider\SourceDataProvider;

/**
 * Interceptor class for @see \Magento\InventoryAdminUi\Ui\DataProvider\SourceDataProvider
 */
class Interceptor extends \Magento\InventoryAdminUi\Ui\DataProvider\SourceDataProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct($name, $primaryFieldName, $requestFieldName, \Magento\Framework\Api\Search\ReportingInterface $reporting, \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder, \Magento\Framework\App\RequestInterface $request, \Magento\Framework\Api\FilterBuilder $filterBuilder, \Magento\InventoryApi\Api\SourceRepositoryInterface $sourceRepository, \Magento\Ui\DataProvider\SearchResultFactory $searchResultFactory, \Magento\Backend\Model\Session $session, array $meta = [], array $data = [])
    {
        $this->___init();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $reporting, $searchCriteriaBuilder, $request, $filterBuilder, $sourceRepository, $searchResultFactory, $session, $meta, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getMeta()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMeta');
        if (!$pluginInfo) {
            return parent::getMeta();
        } else {
            return $this->___callPlugins('getMeta', func_get_args(), $pluginInfo);
        }
    }
}
