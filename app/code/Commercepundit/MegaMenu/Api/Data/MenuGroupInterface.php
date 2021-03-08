<?php
namespace Commercepundit\MegaMenu\Api\Data;

interface MenuGroupInterface
{
	const GROUP_ID  = 'group_id';
	const TITLE     = 'title';
	const STATUS    = 'status';
	const CONTENT   = 'content';

	public function getGroupId();

	public function getTitle();

	public function getStatus();

	public function getContent();

	public function setGroupId($groupId);

	public function setTitle($title);

	public function setStatus($status);

	public function setContent($content);
}