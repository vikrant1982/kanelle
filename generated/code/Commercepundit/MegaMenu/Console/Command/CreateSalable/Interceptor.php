<?php
namespace Commercepundit\MegaMenu\Console\Command\CreateSalable;

/**
 * Interceptor class for @see \Commercepundit\MegaMenu\Console\Command\CreateSalable
 */
class Interceptor extends \Commercepundit\MegaMenu\Console\Command\CreateSalable implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\Filesystem\DirectoryList $directoryList, \Magento\Framework\Filesystem\Io\File $ioFile, \Magento\Catalog\Model\CategoryLinkRepository $categoryLinkRepository, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Api\CategoryLinkManagementInterface $categoryLinkManagementInterface, \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepositoryInterface, \Magento\Catalog\Model\ResourceModel\Product\Collection $collection, \Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable $configurable)
    {
        $this->___init();
        parent::__construct($storeManager, $directoryList, $ioFile, $categoryLinkRepository, $productCollectionFactory, $categoryLinkManagementInterface, $categoryRepositoryInterface, $collection, $configurable);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        if (!$pluginInfo) {
            return parent::run($input, $output);
        } else {
            return $this->___callPlugins('run', func_get_args(), $pluginInfo);
        }
    }
}
