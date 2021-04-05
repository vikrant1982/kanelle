<?php
namespace Kanelle\Sorting\Plugin\Catalog\Model;

class Config {
  public function afterGetAttributeUsedForSortByArray(\Magento\Catalog\Model\Config $catalogConfig, $results){
        unset($result['positionn']);
        unset($result['price']);
        unset($result['name']);
  	$results['a_to_z'] = __('Name - A To Z');
  	$results['z_to_a'] = __('Name - Z To A');
	$results['low_to_high'] = __('Price - Low To High');
	$results['high_to_low'] = __('Price - High To Low');
	return $results;
	}
}