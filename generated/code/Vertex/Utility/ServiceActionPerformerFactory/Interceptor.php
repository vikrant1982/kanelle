<?php
namespace Vertex\Utility\ServiceActionPerformerFactory;

/**
 * Interceptor class for @see \Vertex\Utility\ServiceActionPerformerFactory
 */
class Interceptor extends \Vertex\Utility\ServiceActionPerformerFactory implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct()
    {
        $this->___init();
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $parameters)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'create');
        if (!$pluginInfo) {
            return parent::create($parameters);
        } else {
            return $this->___callPlugins('create', func_get_args(), $pluginInfo);
        }
    }
}
