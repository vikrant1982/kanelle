<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;

abstract class MenuGroup extends \Magento\Backend\App\Action
{
    /**
     * @var Registry|null
     */
	protected $_coreRegistry = null;

    /**
     * MenuGroup constructor.
     * @param Context $context
     * @param Registry $registry
     */

	public function __construct(
		Context $context,
		Registry $registry
	)
	{
		$this->_coreRegistry = $registry;
		parent::__construct($context);
	}

	/**
	 * Init page
	 *
	 * @param \Magento\Backend\Model\View\Result\Page $resultPage
	 * @return \Magento\Backend\Model\View\Result\Page
	 */

	protected function _initAction($resultPage)
	{
		$resultPage->setActiveMenu('Commercepundit_MegaMenu::megamenu_menugroup');
		$resultPage->addBreadcrumb(__('Manager Menu'), __('Manager Menu'))
			->addBreadcrumb(__('Menu Groups'), __('Menu Groups'));
		return $resultPage;
	}

    /**
     * @return bool
     */

	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Commercepundit_MegaMenu::save');
	}
}