<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;

class PositionItem implements \Magento\Framework\Option\ArrayInterface
{
	const BEFORE    = 1;
	const AFTER	    = 2;
	const FIRST		= 3;

    /**
     * @return array
     */

	public function getOptionArray()
	{
		return [
			self::AFTER     => __('After'),
			self::BEFORE    => __('Before')
		];
	}

    /**
     * @return array
     */

	public function toOptionArray()
	{
		return [
			[
				'value'     => self::AFTER,
				'label'     => __('After'),
			],
			[
				'value'     => self::BEFORE,
				'label'     => __('Before'),
			]
		];
	}
}