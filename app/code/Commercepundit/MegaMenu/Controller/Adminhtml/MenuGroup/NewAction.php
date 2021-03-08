<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Backend\Model\View\Result\ForwardFactory;

//class NewAction extends \Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup
class NewAction extends \Magento\Backend\App\Action
{
    /**
     * @var ForwardFactory
     */
	protected $resultForwardFactory;

    /**
     * NewAction constructor.
     * @param Context $context
     * @param ForwardFactory $resultForwardFactory
     */

	public function __construct(
		Context $context,
		ForwardFactory $resultForwardFactory
	) {
		$this->resultForwardFactory = $resultForwardFactory;
		parent::__construct($context);
	}

    /**
     * @return $this
     */

	public function execute()
	{
		/** @var \Magento\Framework\Controller\Result\Forward $resultForward */
		$resultForward = $this->resultForwardFactory->create();
		return $resultForward->forward('edit');
	}
}