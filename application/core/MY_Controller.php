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

    public function _remap($method, $params = array())
    {
        if (stristr($_SERVER['REQUEST_URI'], 'admin') === FALSE) {
            if (method_exists($this, $method)) {
                return call_user_func_array(array($this, $method), $params);
            }
            show_404();
        } else {
            if ((isset($_SESSION['login']) && $_SESSION['login'] == true) || ($_SERVER['REQUEST_URI'] == '/admin' || $_SERVER['REQUEST_URI'] == '/index.php/admin')) {
                if (method_exists($this, $method)) {
                    return call_user_func_array(array($this, $method), $params);
                }
            } else {
                redirect('/admin');
            }
        }
    }

}