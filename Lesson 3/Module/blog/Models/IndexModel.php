<?php

namespace Module\blog\Models;

use Ballybran\Database\Drives\AbstractDatabaseInterface;

class IndexModel 
{
	private $entity;

	public function __construct(AbstractDatabaseInterface $entity) {

		$this->entity = $entity;
	}

	public function getUsers(){

		return $this->entity->selectManager("SELECT * FROM user");
	}

}