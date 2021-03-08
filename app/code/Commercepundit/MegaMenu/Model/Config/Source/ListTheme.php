<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;
class ListTheme implements \Magento\Framework\Option\ArrayInterface
{
	const HORIZONTAL =	1;
	const VERTICAL	 =	2;

    /**
     * @return array
     */

	public function getOptionArray()
	{
		return [
			self::HORIZONTAL 		=> __('Horizontal'),
			self::VERTICAL			=> __('Vertical'),
		];
	}

    /**
     * @return array
     */

	public function toOptionArray()
	{
		return [
			[
				'value'     => self::HORIZONTAL,
				'label'     => __('Horizontal'),
			],
			[
				'value'     => self::VERTICAL,
				'label'     => __('Vertical'),
			],
		];
	}
}