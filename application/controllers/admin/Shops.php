<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 31.10.16
 * Time: 10:46
 */
class Shops extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Sales_model', 'Admin_model'));
    }


    function index()
    {
        $data['shops'] = $this->Admin_model->getTable('shops', null, false);
        $this->_view('admin/shops/index', $data);
    }

    function delete($id)
    {
        $this->Admin_model->deleteItem('shops', $id, 'id');
        redirect('/admin/shops');
    }

    function add()
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->addItem('shops', $_POST, 'Магазин успешно добавлен');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
            $this->_view('admin/shops/add', $data);
        } else {
            $this->_view('admin/shops/add');
        }

    }

    function edit($id)
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->updateItem('shops', $_POST, $id, 'Магазин успешно обновлен', 'id');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
        }
        $data['shops'] = $this->Admin_model->getTable('shops', null, false);
        $this->_view('admin/shops/edit', $data);
    }
}