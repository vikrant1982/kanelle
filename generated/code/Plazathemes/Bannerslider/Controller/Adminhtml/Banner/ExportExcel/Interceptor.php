<?php
namespace Plazathemes\Bannerslider\Controller\Adminhtml\Banner\ExportExcel;

/**
 * Interceptor class for @see \Plazathemes\Bannerslider\Controller\Adminhtml\Banner\ExportExcel
 */
class Interceptor extends \Plazathemes\Bannerslider\Controller\Adminhtml\Banner\ExportExcel implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry, \Magento\Framework\App\Response\Http\FileFactory $fileFactory)
    {
        $this->___init();
        parent::__construct($context, $coreRegistry, $fileFactory);
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
