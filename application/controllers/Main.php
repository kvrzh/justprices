<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 21.10.16
 * Time: 11:21
 */
class Main extends MY_Controller
{
    public function index(){
        unset($_SESSION['city']);
        $this->_view('main/main');
    }
}