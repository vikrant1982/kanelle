<?php
namespace Magento\Tax\Api\Data;

/**
 * Extension class for @see \Magento\Tax\Api\Data\QuoteDetailsItemInterface
 */
class QuoteDetailsItemExtension extends \Magento\Framework\Api\AbstractSimpleObject implements QuoteDetailsItemExtensionInterface
{
    /**
     * @return float|null
     */
    public function getPriceForTaxCalculation()
    {
        return $this->_get('price_for_tax_calculation');
    }

    /**
     * @param float $priceForTaxCalculation
     * @return $this
     */
    public function setPriceForTaxCalculation($priceForTaxCalculation)
    {
        $this->setData('price_for_tax_calculation', $priceForTaxCalculation);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVertexProductCode()
    {
        return $this->_get('vertex_product_code');
    }

    /**
     * @param string $vertexProductCode
     * @return $this
     */
    public function setVertexProductCode($vertexProductCode)
    {
        $this->setData('vertex_product_code', $vertexProductCode);
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getVertexIsConfigurable()
    {
        return $this->_get('vertex_is_configurable');
    }

    /**
     * @param bool $vertexIsConfigurable
     * @return $this
     */
    public function setVertexIsConfigurable($vertexIsConfigurable)
    {
        $this->setData('vertex_is_configurable', $vertexIsConfigurable);
        return $this;
    }
}
