<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 11/04/18
 * Time: 18:05
 */

namespace Module\blog\Controllers;


use Ballybran\Core\Controller\AbstractController;
use Ballybran\Helpers\Http\Hook;
use Ballybran\Helpers\Security\Session;

class Cpanel extends AbstractController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (Session::exist()) {

            $this->view->title = "Panel";
            $this->view->user = $this->model->getAllUser();
            $this->view->render($this, "index");

        } else {
            Hook::Header("");

        }

    }
}
