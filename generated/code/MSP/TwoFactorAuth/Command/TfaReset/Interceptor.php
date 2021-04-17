<?php
namespace MSP\TwoFactorAuth\Command\TfaReset;

/**
 * Interceptor class for @see \MSP\TwoFactorAuth\Command\TfaReset
 */
class Interceptor extends \MSP\TwoFactorAuth\Command\TfaReset implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\MSP\TwoFactorAuth\Api\UserConfigManagerInterface $userConfigManager, \MSP\TwoFactorAuth\Api\ProviderPoolInterface $providerPool, \Magento\User\Model\UserFactory $userFactory, \Magento\User\Model\ResourceModel\User $userResource)
    {
        $this->___init();
        parent::__construct($userConfigManager, $providerPool, $userFactory, $userResource);
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
