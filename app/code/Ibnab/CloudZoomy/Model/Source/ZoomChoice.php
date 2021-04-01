<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ibnab\CloudZoomy\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class IsActive
 */
class ZoomChoice implements OptionSourceInterface
{

     /**
     * Constructor
     *
     */
    public function __construct()
    {
    }   
    public function toOptionArray()
    {

            $options = array(
            array(
                'label' => 'Use Default',
                'value' => 0,
            ),
            array(
                'label' => 'Cloud Zooom',
                'value' => 1,
            )
            );
  
        return $options;
    }
}
