<?php
namespace Dotdigitalgroup\Email\Controller\Adminhtml\Connector\Trial;

/**
 * Interceptor class for @see \Dotdigitalgroup\Email\Controller\Adminhtml\Connector\Trial
 */
class Interceptor extends \Dotdigitalgroup\Email\Controller\Adminhtml\Connector\Trial implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\HTTP\PhpEnvironment\ServerAddress $serverAddress, \Magento\Framework\Stdlib\DateTime\Timezone $localeDate, \Dotdigitalgroup\Email\Model\Trial\TrialSetupFactory $trialFactory)
    {
        $this->___init();
        parent::__construct($context, $serverAddress, $localeDate, $trialFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
