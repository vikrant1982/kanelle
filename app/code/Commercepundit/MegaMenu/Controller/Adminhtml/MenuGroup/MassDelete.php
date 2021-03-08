<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Registry
     */

	protected $_coreRegistry;

    /**
     * @var
     */

	protected $query;

    /**
     * MassDelete constructor.
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
     * @return mixed
     */

	public function execute(){
		$groupIds = $this->getRequest()->getParam('menugroup_param');
		$menuGroup = $this->_objectManager->create('Commercepundit\MegaMenu\Model\MenuGroup');
		$menuItems = $this->_objectManager->create('Commercepundit\MegaMenu\Model\MenuItems');
		$countMenuGroup = 0;

		if(!is_array($groupIds)) {
			$this->messageManager->addError(__('Please select item(s)'));
		}
		else{
			try {
				foreach ($groupIds as $group) {
					$collection = $menuGroup->load($group);
					$collection->delete();
					$menuItems->getDeleteItemsByGroup($group);
					$countMenuGroup++;
				}

				$this->messageManager->addSuccess(
					__('A total of %1 record(s) have been deleted.', $countMenuGroup)
				);
				$redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
				return $redirect->setPath('megamenu/*/index');
			} catch (\Magento\Framework\Exception\LocalizedException $e) {
				$this->messageManager->addError($e->getMessage());
			} catch (\Exception $e) {
				$this->_getSession()->addException($e, __('Something went wrong while updating the product(s) status.'));
			}
		}
	}
}