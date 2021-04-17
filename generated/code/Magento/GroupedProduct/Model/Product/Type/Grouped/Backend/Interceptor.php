<?php
namespace Magento\GroupedProduct\Model\Product\Type\Grouped\Backend;

/**
 * Interceptor class for @see \Magento\GroupedProduct\Model\Product\Type\Grouped\Backend
 */
class Interceptor extends \Magento\GroupedProduct\Model\Product\Type\Grouped\Backend implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\Product\Option $catalogProductOption, \Magento\Eav\Model\Config $eavConfig, \Magento\Catalog\Model\Product\Type $catalogProductType, \Magento\Framework\Event\ManagerInterface $eventManager, \Magento\MediaStorage\Helper\File\Storage\Database $fileStorageDb, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\Registry $coreRegistry, \Psr\Log\LoggerInterface $logger, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\GroupedProduct\Model\ResourceModel\Product\Link $catalogProductLink, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Catalog\Model\Product\Attribute\Source\Status $catalogProductStatus, \Magento\Framework\App\State $appState, \Magento\Msrp\Helper\Data $msrpData, ?\Magento\Framework\Serialize\Serializer\Json $serializer = null)
    {
        $this->___init();
        parent::__construct($catalogProductOption, $eavConfig, $catalogProductType, $eventManager, $fileStorageDb, $filesystem, $coreRegistry, $logger, $productRepository, $catalogProductLink, $storeManager, $catalogProductStatus, $appState, $msrpData, $serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function prepareForCartAdvanced(\Magento\Framework\DataObject $buyRequest, $product, $processMode = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'prepareForCartAdvanced');
        if (!$pluginInfo) {
            return parent::prepareForCartAdvanced($buyRequest, $product, $processMode);
        } else {
            return $this->___callPlugins('prepareForCartAdvanced', func_get_args(), $pluginInfo);
        }
    }
}
