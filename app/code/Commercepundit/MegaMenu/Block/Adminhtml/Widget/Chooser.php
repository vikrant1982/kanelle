<?php
namespace Commercepundit\MegaMenu\Block\Adminhtml\Widget;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Json\EncoderInterface;
use Magento\Framework\Data\Form\Element\Factory;
use Magento\Framework\Registry;

class Chooser extends \Magento\Widget\Block\Adminhtml\Widget\Chooser
{
	/**
	 * @var \Magento\Framework\Data\Form\Element\Factory
	 */

	protected $_elementFactory;

	/**
	 * @var \Magento\Framework\Json\EncoderInterface
	 */

	protected $_jsonEncoder;

    /**
     * @var Registry
     */

	protected $_coreRegistry;

    /**
     * Chooser constructor.
     * @param Context $context
     * @param Registry $registry
     * @param EncoderInterface $jsonEncoder
     * @param Factory $elementFactory
     * @param array $data
     */

	public function __construct(
		Context $context,
		Registry $registry,
		EncoderInterface $jsonEncoder,
		Factory $elementFactory,
		array $data = []
	) {
		$this->_jsonEncoder = $jsonEncoder;
		$this->_elementFactory = $elementFactory;
		$this->_coreRegistry = $registry;
		parent::__construct($context, $jsonEncoder, $elementFactory);
	}

    /**
     * @return mixed
     */

	public function getSourceUrl()
	{
		return $this->_getData('source_url');
	}

    /**
     * @return mixed
     */

	public function getElement()
	{
		return $this->_getData('element');
	}

    /**
     * @return mixed
     */

	public function getConfig()
	{
		if ($this->_getData('config') instanceof \Magento\Framework\DataObject) {
			return $this->_getData('config');
		}

		$configArray = $this->_getData('config');
		$config = new \Magento\Framework\DataObject();
		$this->setConfig($config);
		if (!is_array($configArray)) {
			return $this->_getData('config');
		}

		// define chooser label
		if (isset($configArray['label'])) {
			$config->setData('label', __($configArray['label']));
		}

		// chooser control buttons
		$buttons = ['open' => __('Choose...'), 'close' => __('Close')];
		if (isset($configArray['button']) && is_array($configArray['button'])) {
			foreach ($configArray['button'] as $id => $label) {
				$buttons[$id] = __($label);
			}
		}
		$config->setButtons($buttons);

		return $this->_getData('config');
	}

    /**
     * @return mixed
     */

	public function getUniqId()
	{
		return $this->_getData('uniq_id');
	}

    /**
     * @return mixed
     */

	public function getFieldsetId()
	{
		return $this->_getData('fieldset_id');
	}

    /**
     * @return bool
     */

	public function getHiddenEnabled()
	{
		return $this->hasData('hidden_enabled') ? (bool)$this->_getData('hidden_enabled') : true;
	}

    /**
     * @return string
     */

	protected function _toHtml()
	{
		if(is_null($this->_coreRegistry->registry('menuitems_widget_chooser'))){
			return parent::_toHtml();
		}
		$this->_coreRegistry->unregister('menuitems_widget_chooser');
		$element = $this->getElement();
		//$htmlIdPrefix = $element->getForm()->getHtmlIdPrefix();
		/* @var $fieldset \Magento\Framework\Data\Form\Element\Fieldset */
		// $fieldset = $element->getForm()->getElement($this->getFieldsetId());
		$chooserId = $this->getUniqId();
		$config = $this->getConfig();

		$hiddenHtml = '';
		if ($this->getHiddenEnabled()) {
			$hidden = $this->_elementFactory->create('hidden', ['data' => $element->getData()]);
			$hidden->setId("{$chooserId}value")->setForm($element->getForm());
			if ($element->getRequired()) {
				$hidden->addClass('required-entry');
			}
			$hiddenHtml = $hidden->getElementHtml();
			$element->setValue('');
		}

		$buttons = $config->getButtons();
		$chooseButton = $this->getLayout()->createBlock(
			'Magento\Backend\Block\Widget\Button'
		)->setType(
			'button'
		)->setId(
			$chooserId . 'control'
		)->setClass(
			'btn-chooser'
		)->setLabel(
			$buttons['open']
		)->setOnclick(
			$chooserId . '.choose();$$(\'.data_type\')[0].id=\''.$chooserId.'value\';'
		)->setDisabled(
			$element->getReadonly()
		);

		// render label and chooser scripts
		$configJson = $this->_jsonEncoder->encode($config->getData());

		$js= '
            <script type="text/javascript">
            require(["prototype", "mage/adminhtml/wysiwyg/widget"], function(){
            //<![CDATA[
                (function() {
                    var instantiateChooser = function() {
                        window.'.$chooserId.' = new WysiwygWidget.chooser("'.$chooserId.'",
                            "'.$this->getSourceUrl().'",
                            '.$configJson.'
                        );
                        if ($("'.$chooserId.'value")) {
                            $("'.$chooserId.'value").advaiceContainer = "'.$chooserId.'advice-container";
                        }
                    }
                    if (document.loaded) { //allow load over ajax
                        instantiateChooser();
                    } else {
                        document.observe("dom:loaded", instantiateChooser);
                    }
                })();
            //]]>
            });
            </script>
        ';
		return '<div id="'.'box_'.$chooserId.'">
            <label class="widget-option-label renderer-input" id="'.$chooserId . 'label">'.($this->getLabel() ? $this->getLabel() : __('Not Selected')).'</label>
            <div id="'.$chooserId.'advice-container" class="hidden"></div>
        '.$hiddenHtml . $chooseButton->toHtml().$js.
		'</div>';
	}
}