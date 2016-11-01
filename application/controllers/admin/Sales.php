<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 28.10.16
 * Time: 13:30
 */
class Sales extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Sales_model', 'Admin_model'));
    }

    function _remap($method)
    {
        if ($_SESSION['login'] != true) {
            redirect('/admin');
        } else {
            $this->$method();
        }
    }
    function index()
    {
        $data['sales'] = $this->Admin_model->getTable('sales');
        $this->_view('admin/sales/index', $data);
    }

    function delete($id)
    {
        $this->Admin_model->deleteItem('sales', $id, 'sales_id');
        redirect('/admin/sales');
    }

    function add()
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->addItem('sales', $_POST, 'Скидка успешно добавлена');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
        }
        $data['shops'] = $this->Admin_model->getTable('shops', null, false);
        $data['categories'] = $this->Admin_model->getTable('category', null, false);
        $data['cities'] = $this->Admin_model->getTable('city', null, false);
        $this->_view('admin/sales/add', $data);
    }

    function edit($id)
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->updateItem('sales', $_POST, $id, 'Скидка успешно обновлена', 'sales_id');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
        }
        $data['shops'] = $this->Admin_model->getTable('shops', null, false);
        $data['categories'] = $this->Admin_model->getTable('category', null, false);
        $data['cities'] = $this->Admin_model->getTable('city', null, false);
        $data['sale'] = $this->Admin_model->getTable('sales', $id, true);
        $this->_view('admin/sales/edit', $data);
    }

}