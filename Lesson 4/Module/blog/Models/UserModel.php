<?php


namespace Module\blog\Models;

use Ballybran\Database\Drives\AbstractDatabaseInterface;

class UserModel {

	private $entity;
	public function __construct(AbstractDatabaseInterface $entity){

		$this->entity = $entity;

	}

	public function insertUser($data){

		$this->entity->insert('user', $data);
	}
}