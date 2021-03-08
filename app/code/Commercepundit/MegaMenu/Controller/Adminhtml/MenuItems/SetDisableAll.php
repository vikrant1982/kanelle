<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuItems;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class SetDisableAll extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */

	protected $resultPageFactory;

    /**
     * SetDisableAll constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */

	public function __construct(
		Context $context,
		PageFactory $resultPageFactory
	)
	{
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

    /**
     * @return mixed
     */

	public function createMenuItemsResource()
	{
		return $this->_objectManager->create('Commercepundit\MegaMenu\Model\ResourceModel\MenuItems');
	}

    /**
     * @return mixed
     */

	public function createMenuItemsCollection()
	{
		return $this->_objectManager->create('Commercepundit\MegaMenu\Model\ResourceModel\MenuItems\Collection');
	}

    /**
     * @return $this
     */

	public function execute()
	{
		$groupId = $this->getRequest()->getParam('gid');
		if ($groupId)
		{
			$mainTable = $this->createMenuItemsResource()->getMainTable();
			$resultRedirect = $this->resultRedirectFactory->create();
			try{
				$this->createMenuItemsCollection()->setDisableAll($mainTable, $groupId);
				$this->messageManager->addSuccess(__('You disable all items was successfully.'));
				return $resultRedirect->setPath('*/*/newaction', [
					'gid' => $groupId,
					'activeTab' => 'menuitems'
				]);
			} catch (\Exception $e) {
				$this->messageManager->addError($e->getMessage());
				return $resultRedirect->setPath('*/*/newaction', [
					'gid' => $groupId,
					'activeTab' => 'menuitems'
				]);
			}
		}
	}
}