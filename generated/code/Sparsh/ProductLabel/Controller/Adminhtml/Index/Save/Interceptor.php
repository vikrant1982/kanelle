<?php
namespace Sparsh\ProductLabel\Controller\Adminhtml\Index\Save;

/**
 * Interceptor class for @see \Sparsh\ProductLabel\Controller\Adminhtml\Index\Save
 */
class Interceptor extends \Sparsh\ProductLabel\Controller\Adminhtml\Index\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Sparsh\ProductLabel\Model\ProductLabels $model, \Magento\Framework\Serialize\SerializerInterface $serializer, \Sparsh\ProductLabel\Model\ImageUploader $imageUploader)
    {
        $this->___init();
        parent::__construct($context, $model, $serializer, $imageUploader);
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
