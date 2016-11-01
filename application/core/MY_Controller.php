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

}