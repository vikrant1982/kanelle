<?php
namespace Magento\Customer\Model\Customer\DataProvider;

/**
 * Interceptor class for @see \Magento\Customer\Model\Customer\DataProvider
 */
class Interceptor extends \Magento\Customer\Model\Customer\DataProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct($name, $primaryFieldName, $requestFieldName, \Magento\Ui\DataProvider\EavValidationRules $eavValidationRules, \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory, \Magento\Eav\Model\Config $eavConfig, \Magento\Framework\View\Element\UiComponent\DataProvider\FilterPool $filterPool, ?\Magento\Customer\Model\FileProcessorFactory $fileProcessorFactory = null, array $meta = [], array $data = [], ?\Magento\Framework\View\Element\UiComponent\ContextInterface $context = null, $allowToShowHiddenAttributes = true, $fileUploaderDataResolver = null)
    {
        $this->___init();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $eavValidationRules, $customerCollectionFactory, $eavConfig, $filterPool, $fileProcessorFactory, $meta, $data, $context, $allowToShowHiddenAttributes, $fileUploaderDataResolver);
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getData');
        if (!$pluginInfo) {
            return parent::getData();
        } else {
            return $this->___callPlugins('getData', func_get_args(), $pluginInfo);
        }
    }
}
