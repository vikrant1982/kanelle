<?php
namespace Temando\Shipping\Model\ResourceModel\Repository\AddressRepositoryInterface;

/**
 * Proxy class for @see \Temando\Shipping\Model\ResourceModel\Repository\AddressRepositoryInterface
 */
class Proxy implements \Temando\Shipping\Model\ResourceModel\Repository\AddressRepositoryInterface, \Magento\Framework\ObjectManager\NoninterceptableInterface
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
     * @var \Temando\Shipping\Model\ResourceModel\Repository\AddressRepositoryInterface
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
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Temando\\Shipping\\Model\\ResourceModel\\Repository\\AddressRepositoryInterface', $shared = true)
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
     * @return \Temando\Shipping\Model\ResourceModel\Repository\AddressRepositoryInterface
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
    public function getById($addressId)
    {
        return $this->_getSubject()->getById($addressId);
    }

    /**
     * {@inheritdoc}
     */
    public function getByQuoteAddressId($quoteAddressId)
    {
        return $this->_getSubject()->getByQuoteAddressId($quoteAddressId);
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Temando\Shipping\Api\Data\Checkout\AddressInterface $address)
    {
        return $this->_getSubject()->save($address);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteByShippingAddressId($addressId)
    {
        return $this->_getSubject()->deleteByShippingAddressId($addressId);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(\Temando\Shipping\Api\Data\Checkout\AddressInterface $address)
    {
        return $this->_getSubject()->delete($address);
    }
}
