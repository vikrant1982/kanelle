<?php
namespace Vertex\Utility\SoapClientFactory;

/**
 * Interceptor class for @see \Vertex\Utility\SoapClientFactory
 */
class Interceptor extends \Vertex\Utility\SoapClientFactory implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct()
    {
        $this->___init();
    }

    /**
     * {@inheritdoc}
     */
    public function create($wsdl, array $options = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'create');
        if (!$pluginInfo) {
            return parent::create($wsdl, $options);
        } else {
            return $this->___callPlugins('create', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDefaultOptions');
        if (!$pluginInfo) {
            return parent::getDefaultOptions();
        } else {
            return $this->___callPlugins('getDefaultOptions', func_get_args(), $pluginInfo);
        }
    }
}
