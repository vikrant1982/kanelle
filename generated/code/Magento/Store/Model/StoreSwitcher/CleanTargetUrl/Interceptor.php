<?php
namespace Magento\Store\Model\StoreSwitcher\CleanTargetUrl;

/**
 * Interceptor class for @see \Magento\Store\Model\StoreSwitcher\CleanTargetUrl
 */
class Interceptor extends \Magento\Store\Model\StoreSwitcher\CleanTargetUrl implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Url\Helper\Data $urlHelper, \Magento\Framework\Session\Generic $session, \Magento\Framework\Session\SidResolverInterface $sidResolver)
    {
        $this->___init();
        parent::__construct($urlHelper, $session, $sidResolver);
    }

    /**
     * {@inheritdoc}
     */
    public function switch(\Magento\Store\Api\Data\StoreInterface $fromStore, \Magento\Store\Api\Data\StoreInterface $targetStore, string $redirectUrl) : string
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'switch');
        if (!$pluginInfo) {
            return parent::switch($fromStore, $targetStore, $redirectUrl);
        } else {
            return $this->___callPlugins('switch', func_get_args(), $pluginInfo);
        }
    }
}
