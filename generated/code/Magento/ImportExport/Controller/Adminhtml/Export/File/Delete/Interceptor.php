<?php
namespace Magento\ImportExport\Controller\Adminhtml\Export\File\Delete;

/**
 * Interceptor class for @see \Magento\ImportExport\Controller\Adminhtml\Export\File\Delete
 */
class Interceptor extends \Magento\ImportExport\Controller\Adminhtml\Export\File\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\Filesystem\DriverInterface $file)
    {
        $this->___init();
        parent::__construct($context, $filesystem, $file);
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
