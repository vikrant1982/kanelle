<?php
namespace Magento\Sales\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Sales\Api\Data\InvoiceInterface
 */
interface InvoiceExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return \Magento\Sales\Api\Data\OrderAddressInterface|null
     */
    public function getVertexTaxCalculationShippingAddress();

    /**
     * @param \Magento\Sales\Api\Data\OrderAddressInterface $vertexTaxCalculationShippingAddress
     * @return $this
     */
    public function setVertexTaxCalculationShippingAddress(\Magento\Sales\Api\Data\OrderAddressInterface $vertexTaxCalculationShippingAddress);

    /**
     * @return \Magento\Sales\Api\Data\OrderAddressInterface|null
     */
    public function getVertexTaxCalculationBillingAddress();

    /**
     * @param \Magento\Sales\Api\Data\OrderAddressInterface $vertexTaxCalculationBillingAddress
     * @return $this
     */
    public function setVertexTaxCalculationBillingAddress(\Magento\Sales\Api\Data\OrderAddressInterface $vertexTaxCalculationBillingAddress);

    /**
     * @return \Magento\Sales\Api\Data\OrderInterface|null
     */
    public function getVertexTaxCalculationOrder();

    /**
     * @param \Magento\Sales\Api\Data\OrderInterface $vertexTaxCalculationOrder
     * @return $this
     */
    public function setVertexTaxCalculationOrder(\Magento\Sales\Api\Data\OrderInterface $vertexTaxCalculationOrder);

    /**
     * @return string|null
     */
    public function getGwBasePrice();

    /**
     * @param string $gwBasePrice
     * @return $this
     */
    public function setGwBasePrice($gwBasePrice);

    /**
     * @return string|null
     */
    public function getGwPrice();

    /**
     * @param string $gwPrice
     * @return $this
     */
    public function setGwPrice($gwPrice);

    /**
     * @return string|null
     */
    public function getGwItemsBasePrice();

    /**
     * @param string $gwItemsBasePrice
     * @return $this
     */
    public function setGwItemsBasePrice($gwItemsBasePrice);

    /**
     * @return string|null
     */
    public function getGwItemsPrice();

    /**
     * @param string $gwItemsPrice
     * @return $this
     */
    public function setGwItemsPrice($gwItemsPrice);

    /**
     * @return string|null
     */
    public function getGwCardBasePrice();

    /**
     * @param string $gwCardBasePrice
     * @return $this
     */
    public function setGwCardBasePrice($gwCardBasePrice);

    /**
     * @return string|null
     */
    public function getGwCardPrice();

    /**
     * @param string $gwCardPrice
     * @return $this
     */
    public function setGwCardPrice($gwCardPrice);

    /**
     * @return string|null
     */
    public function getGwBaseTaxAmount();

    /**
     * @param string $gwBaseTaxAmount
     * @return $this
     */
    public function setGwBaseTaxAmount($gwBaseTaxAmount);

    /**
     * @return string|null
     */
    public function getGwTaxAmount();

    /**
     * @param string $gwTaxAmount
     * @return $this
     */
    public function setGwTaxAmount($gwTaxAmount);

    /**
     * @return string|null
     */
    public function getGwItemsBaseTaxAmount();

    /**
     * @param string $gwItemsBaseTaxAmount
     * @return $this
     */
    public function setGwItemsBaseTaxAmount($gwItemsBaseTaxAmount);

    /**
     * @return string|null
     */
    public function getGwItemsTaxAmount();

    /**
     * @param string $gwItemsTaxAmount
     * @return $this
     */
    public function setGwItemsTaxAmount($gwItemsTaxAmount);

    /**
     * @return string|null
     */
    public function getGwCardBaseTaxAmount();

    /**
     * @param string $gwCardBaseTaxAmount
     * @return $this
     */
    public function setGwCardBaseTaxAmount($gwCardBaseTaxAmount);

    /**
     * @return string|null
     */
    public function getGwCardTaxAmount();

    /**
     * @param string $gwCardTaxAmount
     * @return $this
     */
    public function setGwCardTaxAmount($gwCardTaxAmount);
}
