<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 21.10.16
 * Time: 14:41
 */
class Sales extends MY_Controller
{
    function index(){
        $this->_view('sales/main');
    }
}