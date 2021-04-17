<?php
namespace Magento\Tax\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Tax\Api\Data\QuoteDetailsItemInterface
 */
interface QuoteDetailsItemExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return float|null
     */
    public function getPriceForTaxCalculation();

    /**
     * @param float $priceForTaxCalculation
     * @return $this
     */
    public function setPriceForTaxCalculation($priceForTaxCalculation);

    /**
     * @return string|null
     */
    public function getVertexProductCode();

    /**
     * @param string $vertexProductCode
     * @return $this
     */
    public function setVertexProductCode($vertexProductCode);

    /**
     * @return bool|null
     */
    public function getVertexIsConfigurable();

    /**
     * @param bool $vertexIsConfigurable
     * @return $this
     */
    public function setVertexIsConfigurable($vertexIsConfigurable);
}
