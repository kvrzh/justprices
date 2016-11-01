<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 31.10.16
 * Time: 12:52
 */
class Main extends MY_Controller
{
    public function index()
    {
        $success = array(
            'login' => 'admin',
            'password' => encode_pass('adminforsite')
        );
        if (isset($_POST) && !empty($_POST)) {
            if ($_POST['login'] == $success['login'] && encode_pass($_POST['password']) == $success['password']) {
                $this->session->set_userdata('login', true);
            }
        }
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $this->_view('admin/main');
        } else {
            $this->_view('admin/login');
        }

    }
}