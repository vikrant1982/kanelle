<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup
{
    /**
     * @var PageFactory
     */

	protected $resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     */

	public function __construct(
		Context $context,
		Registry $coreRegistry,
		PageFactory $resultPageFactory
	)
	{
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context, $coreRegistry);
	}

    /**
     * @return \Magento\Framework\View\Result\Page
     */

	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$this->_initAction($resultPage)->getConfig()->getTitle()->prepend(__('Manager Menu'));
		return $resultPage;
	}
}