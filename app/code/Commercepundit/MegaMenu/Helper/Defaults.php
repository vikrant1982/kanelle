<?php
namespace Commercepundit\MegaMenu\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Defaults extends AbstractHelper
{
	CONST INENABLE = 1;
	CONST GROUP_ID = 1;
	CONST THEME = 1;
	CONST EFFECT = 1;
	CONST EFFECT_DURATION = 800;
	CONST START_LEVEL = 1;
	CONST END_LEVEL = 5;
	CONST INCLUDE_JQUERY = 1;

    /**
     * @var array
     */

	protected $_defaults;

    /**
     * @var mixed
     */

	protected $_scopeConfigInterface;

	/**
	 * Object manager
	 *
	 * @var \Magento\Framework\ObjectManagerInterface
	 */
	protected $_objectManager;

	protected $_storeManager;

	protected $_registry;
    /**
     * Defaults constructor.
     * @param Context $context
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */

	public function __construct(
		Context $context,
		\Magento\Framework\ObjectManagerInterface $objectManager,
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Framework\Registry $registry
	){
		$this->_objectManager = $objectManager;
		$this->_storeManager = $storeManager;
		$this->_registry = $registry;
		$this->_scopeConfigInterface = $this->_objectManager->get('\Magento\Framework\App\Config\ScopeConfigInterface');
		$this->_defaults = [
			/* General options */
			'isenabled'		    => self::INENABLE,
			'group_id'			=> self::GROUP_ID,
			'theme' 			=> self::THEME,			//default = Horizontal
			'effect'			=> self::EFFECT,		//default = css
			'effect_duration'   => self::EFFECT_DURATION,
			'start_level'		=> self::START_LEVEL,
			'end_level'			=> self::END_LEVEL,

			/* advanced options*/
			'include_jquery'	=> self::INCLUDE_JQUERY,
		];
		parent::__construct($context);
	}

    /**
     * @param array $attributes
     * @return array
     */

	public function get($attributes = [])
	{
		$data       = $this->_defaults;
		$general    = $this->_scopeConfigInterface->getValue('megamenu/general', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		$advanced   = $this->_scopeConfigInterface->getValue('megamenu/advanced', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		if (!is_array($attributes))
			$attributes = [$attributes];

		if (is_array($general)) {
			$data = array_merge($data, $general);
			/*start code to switch the menu for create category*/
		//	if($this->_objectManager->get("\CP\Createdesign\Helper\Data")->isCreateFlowPage() && isset($data['create_group_id'])) {
		//		$data['group_id'] = $data['create_group_id'];
		//	}
			/*end code*/
		}

		if (is_array($advanced))
			$data = array_merge($data, $advanced);

		return array_merge($data, $attributes);
	}

    public function getCurrentCategory() {        
        return $this->_registry->registry('current_category');
    }

    public function getCurrentProduct() {        
        return $this->_registry->registry('current_product');
    }
}
