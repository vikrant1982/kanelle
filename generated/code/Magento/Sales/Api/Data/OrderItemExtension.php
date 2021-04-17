<?php
namespace Magento\Sales\Api\Data;

/**
 * Extension class for @see \Magento\Sales\Api\Data\OrderItemInterface
 */
class OrderItemExtension extends \Magento\Framework\Api\AbstractSimpleObject implements OrderItemExtensionInterface
{
    /**
     * @return \Magento\GiftMessage\Api\Data\MessageInterface|null
     */
    public function getGiftMessage()
    {
        return $this->_get('gift_message');
    }

    /**
     * @param \Magento\GiftMessage\Api\Data\MessageInterface $giftMessage
     * @return $this
     */
    public function setGiftMessage(\Magento\GiftMessage\Api\Data\MessageInterface $giftMessage)
    {
        $this->setData('gift_message', $giftMessage);
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getVertexTaxCodes()
    {
        return $this->_get('vertex_tax_codes');
    }

    /**
     * @param string[] $vertexTaxCodes
     * @return $this
     */
    public function setVertexTaxCodes($vertexTaxCodes)
    {
        $this->setData('vertex_tax_codes', $vertexTaxCodes);
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getInvoiceTextCodes()
    {
        return $this->_get('invoice_text_codes');
    }

    /**
     * @param string[] $invoiceTextCodes
     * @return $this
     */
    public function setInvoiceTextCodes($invoiceTextCodes)
    {
        $this->setData('invoice_text_codes', $invoiceTextCodes);
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTaxCodes()
    {
        return $this->_get('tax_codes');
    }

    /**
     * @param string[] $taxCodes
     * @return $this
     */
    public function setTaxCodes($taxCodes)
    {
        $this->setData('tax_codes', $taxCodes);
        return $this;
    }
}
