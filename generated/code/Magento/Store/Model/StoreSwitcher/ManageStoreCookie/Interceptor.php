<?php
namespace Magento\Store\Model\StoreSwitcher\ManageStoreCookie;

/**
 * Interceptor class for @see \Magento\Store\Model\StoreSwitcher\ManageStoreCookie
 */
class Interceptor extends \Magento\Store\Model\StoreSwitcher\ManageStoreCookie implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Api\StoreCookieManagerInterface $storeCookieManager, \Magento\Framework\App\Http\Context $httpContext, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($storeCookieManager, $httpContext, $storeManager);
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
