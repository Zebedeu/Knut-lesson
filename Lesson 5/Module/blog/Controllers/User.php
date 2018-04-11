<?php


namespace Module\blog\Controllers;
use Ballybran\Core\Collections\Collection\IteratorCollection;
use Ballybran\Core\Controller\AbstractController;
use Ballybran\Helpers\Http\Hook;
use Ballybran\Helpers\Security\Session;
use Ballybran\Helpers\Security\Val;
use Ballybran\Helpers\Security\Validate;
use Ballybran\Helpers\Utility\Hash;

class User extends AbstractController
{
    private $form;
	public function __construct(){

		parent::__construct();

		$this->form = new Validate( new Val());
		$this->form->setMethod("POST");
	}

	public function index() {

	    $this->view->title = "Create";
	    $this->view->render($this,  "index");
    }

    public function login()
    {
        if(!empty($_POST['email']) && !empty($_POST['password'])){

            $response =  $this->model->login( array(":email"=> $_POST['email']) );

            if(!empty($response)){
                $response = $response[0];
                if(Hash::verify_password($_POST['password'], $response['password'])) {

                    $this->createSession($response['name'], $response['role'], $response['id']);
                    Hook::Header("cpanel");

                }else {

                    Hook::Header("");
                }

            }else{
                Hook::Header("");

            }


        }

	}

	public function signUp(){

		$this->form->post('name')->text()->val('maxlength', 100)
            ->post('email')->email()->val("minlength", 5)
            ->post('password')->text()->val("minlength",1)->submit();

		$it = new IteratorCollection($this->form->getPostData());
		$it->set("password", Hash::hash_password($_POST['password']));


		    $this->model->insertUser($it->toArray());

	}


	public function createSession($user, $role, $id){
	    Session::set("U_NAME", $user);
	    Session::set("role", $role);
	    Session::set("ID", $id);
    }

    public function destroySession()
    {
        if(!Session::exist()){
            throw new \Exception("User not exist");
        }

        Session::Destroy();
        Hook::Header("");
    }
}