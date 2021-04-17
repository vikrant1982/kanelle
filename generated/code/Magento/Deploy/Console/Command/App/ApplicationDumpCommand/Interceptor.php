<?php
namespace Magento\Deploy\Console\Command\App\ApplicationDumpCommand;

/**
 * Interceptor class for @see \Magento\Deploy\Console\Command\App\ApplicationDumpCommand
 */
class Interceptor extends \Magento\Deploy\Console\Command\App\ApplicationDumpCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\DeploymentConfig\Writer $writer, array $sources, ?\Magento\Deploy\Model\DeploymentConfig\Hash $configHash = null)
    {
        $this->___init();
        parent::__construct($writer, $sources, $configHash);
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
