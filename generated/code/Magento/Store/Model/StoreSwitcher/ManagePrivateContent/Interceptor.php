<?php
namespace Magento\Store\Model\StoreSwitcher\ManagePrivateContent;

/**
 * Interceptor class for @see \Magento\Store\Model\StoreSwitcher\ManagePrivateContent
 */
class Interceptor extends \Magento\Store\Model\StoreSwitcher\ManagePrivateContent implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $cookieMetadataFactory, \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager)
    {
        $this->___init();
        parent::__construct($cookieMetadataFactory, $cookieManager);
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
