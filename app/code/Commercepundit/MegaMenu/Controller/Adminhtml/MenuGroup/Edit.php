<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */

	protected $resultPageFactory;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */

	public function __construct(
		Context $context,
		PageFactory $resultPageFactory
	) {
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */

	protected function _initAction()
	{
		// load layout, set active menu and breadcrumbs
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Commercepundit_MegaMenu::megamenu_menugroup')
			->addBreadcrumb(__('Manager Menu'), __('Manager Menu'))
			->addBreadcrumb(__('Manager Menu'), __('Manager Menu'));
		return $resultPage;
	}

    /**
     * @return $this|\Magento\Backend\Model\View\Result\Page
     */

	public function execute()
	{
		// 1. Get ID and create model
		$id = $this->getRequest()->getParam('id');
		$model = $this->_objectManager->create('Commercepundit\MegaMenu\Model\MenuGroup');

		// 2. Initial checking
		if ($id) {
			$model->load($id);
			if (!$model->getId()) {
				$this->messageManager->addError(__('This group no longer exists.'));
				/** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
				$resultRedirect = $this->resultRedirectFactory->create();

				return $resultRedirect->setPath('*/*/');
			}
		}
		if ($model->getGroupId() || $id == 0) {
			// 3. Set entered data if was error when we do save
			$data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}
			
			// 4. Register model to use later in blocks
			$_coreRegistry = $this->_objectManager->get('\Magento\Framework\Registry');
			$_coreRegistry->register('megamenu_menugroup', $model);

			// 5. Build edit form
			/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
			$resultPage = $this->_initAction();
			$resultPage->addBreadcrumb(
				$id ? __('Edit Group') : __('New Group'),
				$id ? __('Edit Group') : __('New Group')
			);
			$resultPage->addContent(
				$this->_view->getLayout()->createBlock('\Commercepundit\MegaMenu\Block\Adminhtml\MenuGroup\Edit')
			);
			$resultPage->addLeft(
				$this->_view->getLayout()->createBlock('\Commercepundit\MegaMenu\Block\Adminhtml\MenuGroup\Edit\Tabs')
			);

			$resultPage->getConfig()->getTitle()->prepend(__('Menu Group'));
			$resultPage->getConfig()->getTitle()
				->prepend($model->getId() ? $model->getTitle() : __('New Group'));
			return $resultPage;
		}
	}
}