<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 28.10.16
 * Time: 13:30
 */
class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Sales_model', 'Admin_model'));
    }

    function index()
    {
        $data['sales'] = $this->Admin_model->getTable('sales');
        $this->_view('admin/index', $data);
    }

    function delete($id = null)
    {
        $this->Admin_model->deleteItem('sales', $id);
        redirect('/admin/');
    }

    function add()
    {
        if (isset($_POST)) {
            print_r($_POST);
        }
        $data['shops'] = $this->Admin_model->getTable('shops', null, false);
        $data['categories'] = $this->Admin_model->getTable('category', null, false);
        $data['cities'] = $this->Admin_model->getTable('city', null, false);
        $this->_view('admin/add', $data);
    }

    function edit($id = null)
    {
        echo 'wqddqdw';
    }
}