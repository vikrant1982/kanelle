<?php
namespace MSP\ReCaptcha\Command\ReCaptcha;

/**
 * Interceptor class for @see \MSP\ReCaptcha\Command\ReCaptcha
 */
class Interceptor extends \MSP\ReCaptcha\Command\ReCaptcha implements \Magento\Framework\Interception\InterceptorInterface
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
