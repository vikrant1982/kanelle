<?php
namespace Klarna\Core\Model\Config;

/**
 * Interceptor class for @see \Klarna\Core\Model\Config
 */
class Interceptor extends \Klarna\Core\Model\Config implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->___init();
        parent::__construct($scopeConfig);
    }

    /**
     * {@inheritdoc}
     */
    public function klarnaEnabled($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'klarnaEnabled');
        if (!$pluginInfo) {
            return parent::klarnaEnabled($store);
        } else {
            return $this->___callPlugins('klarnaEnabled', func_get_args(), $pluginInfo);
        }
    }
}
