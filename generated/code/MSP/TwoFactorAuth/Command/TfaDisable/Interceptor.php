<?php
namespace MSP\TwoFactorAuth\Command\TfaDisable;

/**
 * Interceptor class for @see \MSP\TwoFactorAuth\Command\TfaDisable
 */
class Interceptor extends \MSP\TwoFactorAuth\Command\TfaDisable implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Config\ConfigResource\ConfigInterface $config, \Magento\Framework\App\Cache\Manager $cacheManager)
    {
        $this->___init();
        parent::__construct($config, $cacheManager);
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
