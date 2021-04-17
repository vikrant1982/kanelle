<?php
namespace Magento\Webapi\Model\Cache\Type\Webapi;

/**
 * Interceptor class for @see \Magento\Webapi\Model\Cache\Type\Webapi
 */
class Interceptor extends \Magento\Webapi\Model\Cache\Type\Webapi implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Authorization\Model\UserContextInterface $userContext)
    {
        $this->___init();
        parent::__construct($cacheFrontendPool, $storeManager, $userContext);
    }

    /**
     * {@inheritdoc}
     */
    public function save($data, $identifier, array $tags = [], $lifeTime = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'save');
        if (!$pluginInfo) {
            return parent::save($data, $identifier, $tags, $lifeTime);
        } else {
            return $this->___callPlugins('save', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function load($identifier)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'load');
        if (!$pluginInfo) {
            return parent::load($identifier);
        } else {
            return $this->___callPlugins('load', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function remove($identifier)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'remove');
        if (!$pluginInfo) {
            return parent::remove($identifier);
        } else {
            return $this->___callPlugins('remove', func_get_args(), $pluginInfo);
        }
    }
}
