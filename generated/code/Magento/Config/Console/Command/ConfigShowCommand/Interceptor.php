<?php
namespace Magento\Config\Console\Command\ConfigShowCommand;

/**
 * Interceptor class for @see \Magento\Config\Console\Command\ConfigShowCommand
 */
class Interceptor extends \Magento\Config\Console\Command\ConfigShowCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Scope\ValidatorInterface $scopeValidator, \Magento\Framework\App\Config\ConfigSourceInterface $configSource, \Magento\Framework\App\Config\ConfigPathResolver $pathResolver, \Magento\Config\Console\Command\ConfigShow\ValueProcessor $valueProcessor)
    {
        $this->___init();
        parent::__construct($scopeValidator, $configSource, $pathResolver, $valueProcessor);
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
