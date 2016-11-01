<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 21.10.16
 * Time: 11:52
 */
class MY_Controller extends CI_Controller
{
    public function _view($view, $data = null)
    {
        $this->load->view('default/assets');
        $this->load->view($view, $data);
        $this->load->view('default/footer');
    }

    function _remap($method)
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
        }
        if ($_SESSION['login'] == false) {
            if ($_SERVER['REQUEST_URI'] == '/index.php/admin' || $_SERVER['REQUEST_URI'] == '/admin') {
                $this->$method();
            } else {
                redirect('admin');
            }
        } elseif ($_SESSION['login'] == true) {
            $this->$method();
        }
    }
}