<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;

class YesNo implements \Magento\Framework\Option\ArrayInterface
{
	const YES	= 1;
	const NO	= 2;

    /**
     * @return array
     */

	public function getOptionArray()
	{
		return [
			self::YES    => __('Yes'),
			self::NO   => __('No')
		];
	}

    /**
     * @return array
     */

	public function toOptionArray()
	{
		return [
			[
				'value'     => self::YES,
				'label'     => __('Yes'),
			],
			[
				'value'     => self::NO,
				'label'     => __('No'),
			]
		];
	}
}