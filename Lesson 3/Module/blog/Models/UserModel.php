<?php


namespace Module\blog\Models;

use Ballybran\Database\Drives\AbstractDatabaseInterface;

class UserModel {

	private $entity;
	public function __construct(AbstractDatabaseInterface $entity){

		$this->entity = $entity;

	}

	public function login($data)
    {
       return  $this->entity->selectManager("SELECT * FROM user WHERE email =:email", $data);
    }

	public function insertUser($data){

		$this->entity->insert('user', $data);
	}
}