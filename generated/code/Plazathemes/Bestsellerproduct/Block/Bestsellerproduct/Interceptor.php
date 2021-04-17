<?php
namespace Plazathemes\Bestsellerproduct\Block\Bestsellerproduct;

/**
 * Interceptor class for @see \Plazathemes\Bestsellerproduct\Block\Bestsellerproduct
 */
class Interceptor extends \Plazathemes\Bestsellerproduct\Block\Bestsellerproduct implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\App\Http\Context $httpContext, \Magento\Catalog\Model\ProductFactory $productFactory, \Magento\Sales\Model\ResourceModel\Report\Bestsellers\CollectionFactory $collectionFactory, \Magento\Framework\App\ResourceConnection $resource, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $productCollectionFactory, $catalogProductVisibility, $httpContext, $productFactory, $collectionFactory, $resource, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getImage($product, $imageId, $attributes = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getImage');
        if (!$pluginInfo) {
            return parent::getImage($product, $imageId, $attributes);
        } else {
            return $this->___callPlugins('getImage', func_get_args(), $pluginInfo);
        }
    }
}
