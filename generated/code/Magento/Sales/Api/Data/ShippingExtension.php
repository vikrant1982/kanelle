<?php
namespace Magento\Sales\Api\Data;

/**
 * Extension class for @see \Magento\Sales\Api\Data\ShippingInterface
 */
class ShippingExtension extends \Magento\Framework\Api\AbstractSimpleObject implements ShippingExtensionInterface
{
    /**
     * @return string|null
     */
    public function getExtOrderId()
    {
        return $this->_get('ext_order_id');
    }

    /**
     * @param string $extOrderId
     * @return $this
     */
    public function setExtOrderId($extOrderId)
    {
        $this->setData('ext_order_id', $extOrderId);
        return $this;
    }

    /**
     * @return \Temando\Shipping\Api\Data\Order\ShippingExperienceInterface|null
     */
    public function getShippingExperience()
    {
        return $this->_get('shipping_experience');
    }

    /**
     * @param \Temando\Shipping\Api\Data\Order\ShippingExperienceInterface $shippingExperience
     * @return $this
     */
    public function setShippingExperience(\Temando\Shipping\Api\Data\Order\ShippingExperienceInterface $shippingExperience)
    {
        $this->setData('shipping_experience', $shippingExperience);
        return $this;
    }

    /**
     * @return \Temando\Shipping\Api\Data\Delivery\OrderCollectionPointInterface|null
     */
    public function getCollectionPoint()
    {
        return $this->_get('collection_point');
    }

    /**
     * @param \Temando\Shipping\Api\Data\Delivery\OrderCollectionPointInterface $collectionPoint
     * @return $this
     */
    public function setCollectionPoint(\Temando\Shipping\Api\Data\Delivery\OrderCollectionPointInterface $collectionPoint)
    {
        $this->setData('collection_point', $collectionPoint);
        return $this;
    }
}
