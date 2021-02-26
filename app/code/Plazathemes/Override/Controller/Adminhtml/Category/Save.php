<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Plazathemes\Override\Controller\Adminhtml\Category;

class Save extends \Magento\Catalog\Controller\Adminhtml\Category\Save
{
	private $storeManager;
	
    /**
     * Filter category data
     *
     * @param array $rawData
     * @return array
     */
    protected function _filterCategoryPostData(array $rawData)
    {
        $data = $rawData;
        // @todo It is a workaround to prevent saving this data in category model and it has to be refactored in future
        if (isset($data['image']) && is_array($data['image'])) {
            if (!empty($data['image']['delete'])) {
                $data['image'] = null;
            } else {
                if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
                    $data['image'] = $data['image'][0]['name'];
                } else {
                    unset($data['image']);
                }
            }
        }
		
		if (isset($data['thumb_nail']) && is_array($data['thumb_nail'])) {
            if (!empty($data['thumb_nail']['delete'])) {
                $data['thumb_nail'] = null;
            } else {
                if (isset($data['thumb_nail'][0]['name']) && isset($data['thumb_nail'][0]['tmp_name'])) {
                    $data['thumb_nail'] = $data['thumb_nail'][0]['name'];
                } else {
                    unset($data['thumb_nail']);
                }
            }
        }
		
        return $data;
    }

    /**
     * Image data preprocessing
     *
     * @param array $data
     *
     * @return array
     */
    public function imagePreprocessing($data)
    {
        if (empty($data['image'])) {
            unset($data['image']);
            $data['image']['delete'] = true;
        }
		
		if (empty($data['thumb_nail'])) {
            unset($data['thumb_nail']);
            $data['thumb_nail']['delete'] = true;
        }

        return $data;
    }
}
