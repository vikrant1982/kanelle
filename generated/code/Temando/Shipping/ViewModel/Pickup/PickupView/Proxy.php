<?php
namespace Temando\Shipping\ViewModel\Pickup\PickupView;

/**
 * Proxy class for @see \Temando\Shipping\ViewModel\Pickup\PickupView
 */
class Proxy extends \Temando\Shipping\ViewModel\Pickup\PickupView implements \Magento\Framework\ObjectManager\NoninterceptableInterface
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Proxied instance name
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Proxied instance
     *
     * @var \Temando\Shipping\ViewModel\Pickup\PickupView
     */
    protected $_subject = null;

    /**
     * Instance shareability flag
     *
     * @var bool
     */
    protected $_isShared = null;

    /**
     * Proxy constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     * @param bool $shared
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Temando\\Shipping\\ViewModel\\Pickup\\PickupView', $shared = true)
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
        $this->_isShared = $shared;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return ['_subject', '_isShared', '_instanceName'];
    }

    /**
     * Retrieve ObjectManager from global scope
     */
    public function __wakeup()
    {
        $this->_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    }

    /**
     * Clone proxied instance
     */
    public function __clone()
    {
        $this->_subject = clone $this->_getSubject();
    }

    /**
     * Get proxied instance
     *
     * @return \Temando\Shipping\ViewModel\Pickup\PickupView
     */
    protected function _getSubject()
    {
        if (!$this->_subject) {
            $this->_subject = true === $this->_isShared
                ? $this->_objectManager->get($this->_instanceName)
                : $this->_objectManager->create($this->_instanceName);
        }
        return $this->_subject;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder() : \Magento\Sales\Api\Data\OrderInterface
    {
        return $this->_getSubject()->getOrder();
    }

    /**
     * {@inheritdoc}
     */
    public function getPickupId() : string
    {
        return $this->_getSubject()->getPickupId();
    }

    /**
     * {@inheritdoc}
     */
    public function getPickupState() : string
    {
        return $this->_getSubject()->getPickupState();
    }

    /**
     * {@inheritdoc}
     */
    public function getReadyAtDate() : string
    {
        return $this->_getSubject()->getReadyAtDate();
    }

    /**
     * {@inheritdoc}
     */
    public function getPickedUpAtDate() : string
    {
        return $this->_getSubject()->getPickedUpAtDate();
    }

    /**
     * {@inheritdoc}
     */
    public function getCancelledAtDate() : string
    {
        return $this->_getSubject()->getCancelledAtDate();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingDescription() : string
    {
        return $this->_getSubject()->getShippingDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function displayShippingPriceInclTax(\Magento\Sales\Api\Data\OrderInterface $order) : string
    {
        return $this->_getSubject()->displayShippingPriceInclTax($order);
    }

    /**
     * {@inheritdoc}
     */
    public function displayPriceAttribute($code, $strong = false, $separator = '<br/>') : string
    {
        return $this->_getSubject()->displayPriceAttribute($code, $strong, $separator);
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentMethodTitle(\Magento\Sales\Api\Data\OrderInterface $order) : string
    {
        return $this->_getSubject()->getPaymentMethodTitle($order);
    }

    /**
     * {@inheritdoc}
     */
    public function getPickupLocationAddressHtml() : string
    {
        return $this->_getSubject()->getPickupLocationAddressHtml();
    }
}
