<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 31.10.16
 * Time: 12:41
 */
class Categories extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Sales_model', 'Admin_model'));
    }


    function index()
    {
        $data['categories'] = $this->Admin_model->getTable('category', null, false);
        $this->_view('admin/categories/index', $data);
    }

    function delete($id)
    {
        $this->Admin_model->deleteItem('category', $id, 'category_id');
        redirect('/admin/categories');
    }

    function add()
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->addItem('category', $_POST, 'Город успешно добавлен');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
            $this->_view('admin/categories/add', $data);
        } else {
            $this->_view('admin/categories/add');
        }

    }

    function edit($id)
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->updateItem('category', $_POST, $id, 'Город успешно обновлен', 'category_id');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
        }
        $data['categories'] = $this->Admin_model->getTable('category', null, false);
        $this->_view('admin/categories/edit', $data);
    }
}