<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Catalog Product List Sortable allowed sortable attributes source
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
namespace Kanelle\Sorting\Plugin\Catalog\Model\Config\Source;

class ListSort
{
    public function afterToOptionArray(MagentoListSort $subject, array $result): array {

    \array_push($result, ['label' => __('Name - A To Z'), 'value' => 'a_to_z']);
    \array_push($result, ['label' => __('Name - Z To A'), 'value' => 'z_to_a']);
    \array_push($result, ['label' => __('Price - Low To High'), 'value' => 'low_to_high']);
    \array_push($result, ['label' => __('Price - High To Low'), 'value' => 'high_to_low']);


    return $result;
    }
}
