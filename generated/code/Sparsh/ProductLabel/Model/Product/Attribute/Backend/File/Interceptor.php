<?php
namespace Sparsh\ProductLabel\Model\Product\Attribute\Backend\File;

/**
 * Interceptor class for @see \Sparsh\ProductLabel\Model\Product\Attribute\Backend\File
 */
class Interceptor extends \Sparsh\ProductLabel\Model\Product\Attribute\Backend\File implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Psr\Log\LoggerInterface $logger, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\Filesystem\Driver\File $file, \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory, \Magento\Framework\Message\ManagerInterface $messageManager, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\UrlInterface $urlInterface, \Magento\Framework\App\Request\Http $request)
    {
        $this->___init();
        parent::__construct($logger, $filesystem, $file, $fileUploaderFactory, $messageManager, $storeManager, $urlInterface, $request);
    }

    /**
     * {@inheritdoc}
     */
    public function validate($object)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'validate');
        if (!$pluginInfo) {
            return parent::validate($object);
        } else {
            return $this->___callPlugins('validate', func_get_args(), $pluginInfo);
        }
    }
}
