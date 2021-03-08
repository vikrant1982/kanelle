<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;

class Align implements \Magento\Framework\Option\ArrayInterface
{
	const LEFT	= 1;
	const RIGHT	= 2;

    /**
     * @return array
     */

	public function getOptionArray()
	{
		return [
			self::LEFT    => __('Left'),
			self::RIGHT   => __('Right')
		];
	}

    /**
     * @return array
     */

	public function toOptionArray()
	{
		return [
			[
				'value'     => self::LEFT,
				'label'     => __('Left'),
			],
			[
				'value'     => self::RIGHT,
				'label'     => __('Right'),
			]
		];
	}
}