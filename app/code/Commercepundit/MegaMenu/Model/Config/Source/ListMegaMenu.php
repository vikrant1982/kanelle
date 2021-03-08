<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;

use Commercepundit\MegaMenu\Model\MenuGroup;
use Magento\Framework\Option\ArrayInterface;

class ListMegaMenu implements ArrayInterface
{
    /**
     * @var MenuGroup
     */

	protected $_menuGroup;

    /**
     * ListMegaMenu constructor.
     * @param MenuGroup $menuGroup
     */

	public function __construct(
		MenuGroup $menuGroup
	)
	{
		$this->_menuGroup = $menuGroup;
	}

    /**
     * @return mixed
     */

	public function getOptionArray(){
		foreach ($this->_menuGroup->getCollection() as $group)
		{
			$arr[$group ->getTitle()] = $group ->getTitle();
		}
		return $arr;
	}

    /**
     * @return array
     */

	public function toOptionArray(){
		$arr[] = array(
			'value'			=>	'',
			'label'     	=>	__('--Please Select--'),
		);
		foreach ($this->_menuGroup->getCollection() as $group)
		{
			$label = '('.$group->getId().') ' . $group->getTitle();
			$arr[] = array(
				'value'		=>	$group->getId(),
				'label'     => 	$label,
			);
		}
		return $arr;
	}
}