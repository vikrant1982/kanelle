<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;
class ListEffect implements \Magento\Framework\Option\ArrayInterface
{
	const CSS		 	=	1;
	const ANIMATION	 	=	2;
	const TOGGLE 		=	3;

    /**
     * @return array
     */

	public function getOptionArray()
	{
		return [
			self::CSS 				=> __('Css'),
			self::ANIMATION			=> __('Animation'),
			self::TOGGLE			=> __('toggle'),
		];
	}

    /**
     * @return array
     */

	public function toOptionArray()
	{
		return [
			[
				'value'     => self::CSS,
				'label'     => __('Css'),
			],
			[
				'value'     => self::ANIMATION,
				'label'     => __('Animation'),
			],
			[
				'value'     => self::TOGGLE,
				'label'     => __('Toggle'),
			],
		];
	}
}