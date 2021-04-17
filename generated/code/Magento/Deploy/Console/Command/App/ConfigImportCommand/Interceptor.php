<?php
namespace Magento\Deploy\Console\Command\App\ConfigImportCommand;

/**
 * Interceptor class for @see \Magento\Deploy\Console\Command\App\ConfigImportCommand
 */
class Interceptor extends \Magento\Deploy\Console\Command\App\ConfigImportCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Deploy\Console\Command\App\ConfigImport\Processor $processor)
    {
        $this->___init();
        parent::__construct($processor);
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
