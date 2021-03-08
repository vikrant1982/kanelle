<?php
namespace Commercepundit\MegaMenu\Controller\Index;

use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */

	protected $resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */

	public function __construct(
		Context $context,
		PageFactory $pageFactory
	)
	{
		$this->resultPageFactory = $pageFactory;
		parent::__construct($context);
	}

    /**
     * @return \Magento\Framework\View\Result\Page
     */

	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		//$resultPage->getConfig()->getTitle()->prepend(__('Commercepundit Mega Menu'));
		return $resultPage;
	}
}