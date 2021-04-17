<?php
namespace Magento\InventoryReservationCli\Command\ShowInconsistencies;

/**
 * Interceptor class for @see \Magento\InventoryReservationCli\Command\ShowInconsistencies
 */
class Interceptor extends \Magento\InventoryReservationCli\Command\ShowInconsistencies implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\InventoryReservationCli\Model\GetSalableQuantityInconsistencies $getSalableQuantityInconsistencies, \Magento\InventoryReservationCli\Model\SalableQuantityInconsistency\FilterCompleteOrders $filterCompleteOrders, \Magento\InventoryReservationCli\Model\SalableQuantityInconsistency\FilterIncompleteOrders $filterIncompleteOrders)
    {
        $this->___init();
        parent::__construct($getSalableQuantityInconsistencies, $filterCompleteOrders, $filterIncompleteOrders);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        if (!$pluginInfo) {
            return parent::run($input, $output);
        } else {
            return $this->___callPlugins('run', func_get_args(), $pluginInfo);
        }
    }
}
