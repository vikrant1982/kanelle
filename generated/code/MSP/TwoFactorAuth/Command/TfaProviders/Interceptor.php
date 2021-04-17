<?php
namespace MSP\TwoFactorAuth\Command\TfaProviders;

/**
 * Interceptor class for @see \MSP\TwoFactorAuth\Command\TfaProviders
 */
class Interceptor extends \MSP\TwoFactorAuth\Command\TfaProviders implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\MSP\TwoFactorAuth\Api\ProviderPoolInterface $providerPool)
    {
        $this->___init();
        parent::__construct($providerPool);
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
