<?php
namespace Plazathemes\Newproductslider\Block\Newproductslider;

/**
 * Interceptor class for @see \Plazathemes\Newproductslider\Block\Newproductslider
 */
class Interceptor extends \Plazathemes\Newproductslider\Block\Newproductslider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\App\Http\Context $httpContext, \Magento\Catalog\Model\ProductFactory $productFactory, \Magento\Catalog\Model\CategoryFactory $categoryFactory, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $productCollectionFactory, $catalogProductVisibility, $httpContext, $productFactory, $categoryFactory, $data);
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
