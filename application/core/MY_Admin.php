<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 11.11.16
 * Time: 12:19
 */
class MY_Admin extends CI_Controllers
{
    public function _view($view, $data = null)
    {
        $this->load->view('default/assets');
        $this->load->view($view, $data);
        $this->load->view('default/footer');
    }
}