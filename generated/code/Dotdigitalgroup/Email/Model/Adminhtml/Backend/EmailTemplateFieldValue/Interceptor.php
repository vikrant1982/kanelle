<?php
namespace Dotdigitalgroup\Email\Model\Adminhtml\Backend\EmailTemplateFieldValue;

/**
 * Interceptor class for @see \Dotdigitalgroup\Email\Model\Adminhtml\Backend\EmailTemplateFieldValue
 */
class Interceptor extends \Dotdigitalgroup\Email\Model\Adminhtml\Backend\EmailTemplateFieldValue implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\App\Config\ScopeConfigInterface $config, \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList, \Dotdigitalgroup\Email\Model\Email\TemplateFactory $templateFactory, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Email\Model\ResourceModel\Template $templateResource, \Dotdigitalgroup\Email\Helper\Data $helper, \Magento\Framework\App\RequestInterface $request, ?\Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, ?\Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $registry, $config, $cacheTypeList, $templateFactory, $storeManager, $templateResource, $helper, $request, $resource, $resourceCollection, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'afterSave');
        if (!$pluginInfo) {
            return parent::afterSave();
        } else {
            return $this->___callPlugins('afterSave', func_get_args(), $pluginInfo);
        }
    }
}
