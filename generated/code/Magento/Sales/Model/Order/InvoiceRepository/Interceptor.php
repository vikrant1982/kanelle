<?php
namespace Magento\Sales\Model\Order\InvoiceRepository;

/**
 * Interceptor class for @see \Magento\Sales\Model\Order\InvoiceRepository
 */
class Interceptor extends \Magento\Sales\Model\Order\InvoiceRepository implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Sales\Model\ResourceModel\Metadata $invoiceMetadata, \Magento\Sales\Api\Data\InvoiceSearchResultInterfaceFactory $searchResultFactory, ?\Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor = null)
    {
        $this->___init();
        parent::__construct($invoiceMetadata, $searchResultFactory, $collectionProcessor);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'get');
        if (!$pluginInfo) {
            return parent::get($id);
        } else {
            return $this->___callPlugins('get', func_get_args(), $pluginInfo);
        }
    }
}
