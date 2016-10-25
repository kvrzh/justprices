<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 21.10.16
 * Time: 14:41
 */
class Sales extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Sales_model'));
    }

    function index(){
        $data['sales'] = $this->Sales_model->getSales();
        $this->_view('sales/main', $data);
    }
    function sale($id){
        $data['sale'] = $this->Sales_model->getSaleById($id);
        $this->load->view('sales/sale',$data);
    }
}