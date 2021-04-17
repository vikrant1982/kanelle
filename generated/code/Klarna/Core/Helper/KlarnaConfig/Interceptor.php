<?php
namespace Klarna\Core\Helper\KlarnaConfig;

/**
 * Interceptor class for @see \Klarna\Core\Helper\KlarnaConfig
 */
class Interceptor extends \Klarna\Core\Helper\KlarnaConfig implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Helper\Context $context, \Magento\Framework\Config\DataInterface $config, \Klarna\Core\Api\VersionInterfaceFactory $versionFactory, \Magento\Framework\DataObjectFactory $dataObjectFactory, $eventPrefix = 'kp')
    {
        $this->___init();
        parent::__construct($context, $config, $versionFactory, $dataObjectFactory, $eventPrefix);
    }

    /**
     * {@inheritdoc}
     */
    public function getOmBuilderType(\Klarna\Core\Api\VersionInterface $versionConfig, $methodCode = 'klarna_kp')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOmBuilderType');
        if (!$pluginInfo) {
            return parent::getOmBuilderType($versionConfig, $methodCode);
        } else {
            return $this->___callPlugins('getOmBuilderType', func_get_args(), $pluginInfo);
        }
    }
}
