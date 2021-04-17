<?php
namespace Magento\Sitemap\Controller\Adminhtml\Sitemap\Save;

/**
 * Interceptor class for @see \Magento\Sitemap\Controller\Adminhtml\Sitemap\Save
 */
class Interceptor extends \Magento\Sitemap\Controller\Adminhtml\Sitemap\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, ?\Magento\Framework\Validator\StringLength $stringValidator = null, ?\Magento\MediaStorage\Model\File\Validator\AvailablePath $pathValidator = null, ?\Magento\Sitemap\Helper\Data $sitemapHelper = null, ?\Magento\Framework\Filesystem $filesystem = null, ?\Magento\Sitemap\Model\SitemapFactory $sitemapFactory = null)
    {
        $this->___init();
        parent::__construct($context, $stringValidator, $pathValidator, $sitemapHelper, $filesystem, $sitemapFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
