<?php
namespace Commercepundit\MegaMenu\Model\Config\Source;

class ListNumCol implements \Magento\Framework\Option\ArrayInterface
{
	const ONE			= 1;
	const TWO			= 2;
	const THREE			= 3;
	const FOUR			= 4;
	const FIVE			= 5;
	const SIX			= 6;

    /**
     * @return array
     */

	public function getOptionArray()
	{
		return [
			self::ONE 		=> __('1 column'),
			self::TWO		=> __('2 columns'),
			self::THREE		=> __('3 columns'),
			self::FOUR		=> __('4 columns'),
			self::FIVE		=> __('5 columns'),
			self::SIX		=> __('6 columns'),
		];
	}

    /**
     * @return array
     */

	public function toOptionArray()
	{
		return [
			[
				'value'     => self::ONE,
				'label'     => __('1 column'),
			],

			[
				'value'     => self::TWO,
				'label'     => __('2 columns'),
			],

			[
				'value'     => self::THREE,
				'label'     => __('3 columns'),
			],
			[
				'value'     => self::FOUR,
				'label'     => __('4 columns'),
			],
			[
				'value'     => self::FIVE,
				'label'     => __('5 columns'),
			],
			[
				'value'     => self::SIX,
				'label'     => __('6 columns'),
			],
		];
	}
}