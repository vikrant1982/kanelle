<?php
namespace Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;

class MassStatus extends \Commercepundit\MegaMenu\Controller\Adminhtml\MenuGroup
{
    /**
     * @var Registry
     */

	protected $_coreRegistry;

    /**
     * MassStatus constructor.
     * @param Context $context
     * @param Registry $registry
     */

	public function __construct(
		Context $context,
		Registry $registry
	)
	{
		$this->_coreRegistry = $registry;
		parent::__construct($context, $registry);
	}

	/**
	 * Update product(s) status action
	 *
	 * @return \Magento\Backend\Model\View\Result\Redirect
	 */
	public function execute(){
		$megamenuIds = $this->getRequest()->getParam('menugroup_param');
		$menuItems = $this->_objectManager->create('Commercepundit\MegaMenu\Model\MenuGroup');
		$menuGroup = 0;
		if(!is_array($megamenuIds)) {
			$this->messageManager->addError($this->__('Please select item(s)'));
		}
		else{
			try {
				foreach ($megamenuIds as $group) {
					$menuItems->load($group)
						->setStatus($this->getRequest()->getParam('status'))
						->setIsMassupdate(true)
						->save();
					$menuGroup++;
				}
				$this->messageManager->addSuccess(
					__('A total of %1 record(s) have been update status.', $menuGroup)
				);
				$redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
				return $redirect->setPath('megamenu/*/index');
			} catch (\Magento\Framework\Exception\LocalizedException $e) {
				$this->messageManager->addError($e->getMessage());
			} catch (\Exception $e) {
				$this->_getSession()->addException($e, __('Something went wrong while updating the product(s) status.'));
			}
		}
		$redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
		return $redirect->setPath('megamenu/*/index');
	}
}