<?php
namespace Magento\MessageQueue\Console\StartConsumerCommand;

/**
 * Interceptor class for @see \Magento\MessageQueue\Console\StartConsumerCommand
 */
class Interceptor extends \Magento\MessageQueue\Console\StartConsumerCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\State $appState, \Magento\Framework\MessageQueue\ConsumerFactory $consumerFactory, $name = null, ?\Magento\MessageQueue\Model\Cron\ConsumersRunner\PidConsumerManager $pidConsumerManager = null)
    {
        $this->___init();
        parent::__construct($appState, $consumerFactory, $name, $pidConsumerManager);
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
