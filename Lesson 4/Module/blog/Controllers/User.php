<?php


namespace Module\blog\Controllers;
use Ballybran\Core\Controller\AbstractController;

class User extends AbstractController
{
    private $form;
	public function __construct(){

		parent::__construct();

	}


	public function signUp(){

		
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && )

        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['eail'];
        $data['password'] = $_POST['password'];
		$this->model->insertUser($data);

	}

}