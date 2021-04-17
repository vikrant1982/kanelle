<?php
namespace Magento\ImportExport\Controller\Adminhtml\Export\File\Download;

/**
 * Interceptor class for @see \Magento\ImportExport\Controller\Adminhtml\Export\File\Download
 */
class Interceptor extends \Magento\ImportExport\Controller\Adminhtml\Export\File\Download implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Magento\Framework\Filesystem $filesystem)
    {
        $this->___init();
        parent::__construct($context, $fileFactory, $filesystem);
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
