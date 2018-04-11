<?php



namespace Module\blog\Controllers;

use Ballybran\Core\Controller\AbstractController;

class Index extends AbstractController {

	public function __construct() {

		parent::__construct();
	}

	public function index(){

				$this->view->render($this, 'index');
	}
}