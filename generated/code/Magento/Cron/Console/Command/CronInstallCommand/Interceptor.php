<?php
namespace Magento\Cron\Console\Command\CronInstallCommand;

/**
 * Interceptor class for @see \Magento\Cron\Console\Command\CronInstallCommand
 */
class Interceptor extends \Magento\Cron\Console\Command\CronInstallCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Crontab\CrontabManagerInterface $crontabManager, \Magento\Framework\Crontab\TasksProviderInterface $tasksProvider)
    {
        $this->___init();
        parent::__construct($crontabManager, $tasksProvider);
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
