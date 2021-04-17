<?php
namespace Magento\Inventory\Model\SourceRepository;

/**
 * Interceptor class for @see \Magento\Inventory\Model\SourceRepository
 */
class Interceptor extends \Magento\Inventory\Model\SourceRepository implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Inventory\Model\Source\Command\SaveInterface $commandSave, \Magento\Inventory\Model\Source\Command\GetInterface $commandGet, \Magento\Inventory\Model\Source\Command\GetListInterface $commandGetList)
    {
        $this->___init();
        parent::__construct($commandSave, $commandGet, $commandGetList);
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Magento\InventoryApi\Api\Data\SourceInterface $source) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'save');
        if (!$pluginInfo) {
            parent::save($source);
        } else {
            $this->___callPlugins('save', func_get_args(), $pluginInfo);
        }
    }
}
