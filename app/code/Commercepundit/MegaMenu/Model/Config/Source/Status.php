<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;

class Status implements \Magento\Framework\Option\ArrayInterface
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 2;

    /**
     * @return array
     */

	public function getOptionArray()
	{
		return [
			self::STATUS_ENABLED    => __('Enable'),
			self::STATUS_DISABLED   => __('Disable')
		];
	}

    /**
     * @return array
     */

	public function toOptionArray()
	{
		return [
			[
				'value'     => self::STATUS_ENABLED,
				'label'     => __('Enable'),
			],
			[
				'value'     => self::STATUS_DISABLED,
				'label'     => __('Disable'),
			]
		];
	}
}