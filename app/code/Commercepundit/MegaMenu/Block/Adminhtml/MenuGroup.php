<?php
namespace Commercepundit\MegaMenu\Block\Adminhtml;

class MenuGroup extends \Magento\Backend\Block\Widget\Grid\Container
{

    /**
     * boilerplate code
     */

	protected function _construct()
	{
		$this->_blockGroup = 'Commercepundit_MegaMenu';
		$this->_controller = 'adminhtml_menuGroup';
		$this->_headerText = __('Manager Menu');
		parent::_construct();

		if ($this->_isAllowedAction('Commercepundit_MegaMenu::save')) {
			$this->buttonList->update('add', 'label', __('Add New Menu'));
		} else {
			$this->buttonList->remove('add');
		}
	}

    /**
     * @param $resourceId
     * @return bool
     */

	protected function _isAllowedAction($resourceId)
	{
		return $this->_authorization->isAllowed($resourceId);
	}
}