<?php
namespace Temando\Shipping\Model\Sales\Service\ShipmentService;

/**
 * Proxy class for @see \Temando\Shipping\Model\Sales\Service\ShipmentService
 */
class Proxy extends \Temando\Shipping\Model\Sales\Service\ShipmentService implements \Magento\Framework\ObjectManager\NoninterceptableInterface
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
     * @var \Temando\Shipping\Model\Sales\Service\ShipmentService
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
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Temando\\Shipping\\Model\\Sales\\Service\\ShipmentService', $shared = true)
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
     * @return \Temando\Shipping\Model\Sales\Service\ShipmentService
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
    public function cancel(string $shipmentId, int $salesShipmentId) : \Temando\Shipping\Model\ShipmentInterface
    {
        return $this->_getSubject()->cancel($shipmentId, $salesShipmentId);
    }

    /**
     * {@inheritdoc}
     */
    public function read(string $shipmentId, int $salesShipmentId) : \Temando\Shipping\Model\ShipmentInterface
    {
        return $this->_getSubject()->read($shipmentId, $salesShipmentId);
    }
}
