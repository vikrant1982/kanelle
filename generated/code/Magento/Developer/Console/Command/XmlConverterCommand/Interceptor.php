<?php
namespace Magento\Developer\Console\Command\XmlConverterCommand;

/**
 * Interceptor class for @see \Magento\Developer\Console\Command\XmlConverterCommand
 */
class Interceptor extends \Magento\Developer\Console\Command\XmlConverterCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Developer\Model\Tools\Formatter $formatter, \Magento\Framework\DomDocument\DomDocumentFactory $domFactory, \Magento\Framework\XsltProcessor\XsltProcessorFactory $xsltProcessorFactory)
    {
        $this->___init();
        parent::__construct($formatter, $domFactory, $xsltProcessorFactory);
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
