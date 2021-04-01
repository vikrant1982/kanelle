<?php

namespace Ibnab\CloudZoomy\Block\Product\View;

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\Product\Gallery\ImagesConfigFactoryInterface;
use Magento\Catalog\Model\Product\Image\UrlBuilder;
use Magento\Framework\Json\EncoderInterface;
use Magento\Framework\Stdlib\ArrayUtils;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Gallery extends \Magento\Catalog\Block\Product\View\Gallery
{

    /**
     * @var \Magento\Framework\Json\EncoderInterface
     */
    protected $jsonEncoder;
    

    
    
    /**
     * @var Ibnab\CloudZoomy\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param Context $context
     * @param ArrayUtils $arrayUtils
     * @param EncoderInterface $jsonEncoder
     * @param array $data
     * @param ImagesConfigFactoryInterface|null $imagesConfigFactory
     * @param array $galleryImagesConfig
     * @param UrlBuilder|null $urlBuilder
     */
    public function __construct(
        \Ibnab\CloudZoomy\Helper\Data $dataHelper,
        Context $context,
        ArrayUtils $arrayUtils,
        EncoderInterface $jsonEncoder,
        array $data = [],
        ImagesConfigFactoryInterface $imagesConfigFactory = null,
        array $galleryImagesConfig = [],
        UrlBuilder $urlBuilder = null
    ) {

        $this->dataHelper = $dataHelper;
        parent::__construct($context, $arrayUtils, $jsonEncoder,$data,$imagesConfigFactory,$galleryImagesConfig,$urlBuilder);

    }
    
    public function getConfigValue($path){
        return $this->dataHelper->getValue($path, ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
    }
    public function getTemplate()
    {
        return 'Ibnab_CloudZoomy::product/view/gallery.phtml';
    }
}
