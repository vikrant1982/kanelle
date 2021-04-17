<?php
namespace Magento\Backend\Console\Command\CacheStatusCommand;

/**
 * Interceptor class for @see \Magento\Backend\Console\Command\CacheStatusCommand
 */
class Interceptor extends \Magento\Backend\Console\Command\CacheStatusCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Cache\Manager $cacheManager)
    {
        $this->___init();
        parent::__construct($cacheManager);
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
