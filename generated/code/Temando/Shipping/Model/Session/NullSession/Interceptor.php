<?php
namespace Temando\Shipping\Model\Session\NullSession;

/**
 * Interceptor class for @see \Temando\Shipping\Model\Session\NullSession
 */
class Interceptor extends \Temando\Shipping\Model\Session\NullSession implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(array $data = [])
    {
        $this->___init();
        parent::__construct($data);
    }

    /**
     * {@inheritdoc}
     */
    public function start()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'start');
        if (!$pluginInfo) {
            return parent::start();
        } else {
            return $this->___callPlugins('start', func_get_args(), $pluginInfo);
        }
    }
}
