<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 14.11.16
 * Time: 14:03
 */
class Main extends CI_Controller
{
    public function index()
    {
        $this->load->view('mob/default/assets');
        $this->load->view('mob/main/main');
    }
}