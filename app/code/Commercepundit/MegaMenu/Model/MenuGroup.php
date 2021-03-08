<?php
namespace Commercepundit\MegaMenu\Model;

use Commercepundit\MegaMenu\Api\Data\MenuGroupInterface;
use Magento\Framework\Model\AbstractModel;

class MenuGroup extends AbstractModel implements MenuGroupInterface
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 2;

    /**
     * init resource model
     */

	protected function _construct()
	{
		$this->_init('Commercepundit\MegaMenu\Model\ResourceModel\MenuGroup');
	}

    /**
     * @return mixed
     */

	public function getGroupId()
	{
		return $this->getData(self::GROUP_ID);
	}

    /**
     * @return mixed
     */

	public function getTitle()
	{
		return $this->getData(self::TITLE);
	}

    /**
     * @return mixed
     */

	public function getStatus()
	{
		return $this->getData(self::STATUS);
	}

    /**
     * @return mixed
     */

	public function getContent()
	{
		return $this->getData(self::CONTENT);
	}

    /**
     * @param $groupId
     * @return $this
     */

	public function setGroupId($groupId)
	{
		return $this->setData(self::GROUP_ID, $groupId);
	}

    /**
     * @param $title
     * @return $this
     */

	public function setTitle($title)
	{
		return $this->setData(self::TITLE, $title);
	}

    /**
     * @param $status
     * @return $this
     */

	public function setStatus($status)
	{
		return $this->setData(self::STATUS, $status);
	}

    /**
     * @param $content
     * @return $this
     */

	public function setContent($content)
	{
		return $this->setData(self::CONTENT, $content);
	}

    /**
     * @return array
     */

	public function getAvailableStatuses()
	{
		return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
	}
}