<?php
namespace Kanelle\Sorting\Plugin\Catalog\Model;

class Config {
  public function afterGetAttributeUsedForSortByArray(\Magento\Catalog\Model\Config $catalogConfig, $results){
	$results['low_to_high'] = __('Price - Low To High');
	$results['high_to_low'] = __('Price - High To Low');
	return $results;
	}
}