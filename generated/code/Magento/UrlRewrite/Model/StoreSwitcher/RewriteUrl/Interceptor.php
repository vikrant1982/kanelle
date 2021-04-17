<?php
namespace Magento\UrlRewrite\Model\StoreSwitcher\RewriteUrl;

/**
 * Interceptor class for @see \Magento\UrlRewrite\Model\StoreSwitcher\RewriteUrl
 */
class Interceptor extends \Magento\UrlRewrite\Model\StoreSwitcher\RewriteUrl implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\UrlRewrite\Model\UrlFinderInterface $urlFinder, \Magento\Framework\HTTP\PhpEnvironment\RequestFactory $requestFactory)
    {
        $this->___init();
        parent::__construct($urlFinder, $requestFactory);
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
