<?php
namespace Magento\Sales\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Sales\Api\Data\CreditmemoItemInterface
 */
interface CreditmemoItemExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return string[]|null
     */
    public function getVertexTaxCodes();

    /**
     * @param string[] $vertexTaxCodes
     * @return $this
     */
    public function setVertexTaxCodes($vertexTaxCodes);

    /**
     * @return string[]|null
     */
    public function getInvoiceTextCodes();

    /**
     * @param string[] $invoiceTextCodes
     * @return $this
     */
    public function setInvoiceTextCodes($invoiceTextCodes);

    /**
     * @return string[]|null
     */
    public function getTaxCodes();

    /**
     * @param string[] $taxCodes
     * @return $this
     */
    public function setTaxCodes($taxCodes);
}
