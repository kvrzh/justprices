<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 31.10.16
 * Time: 12:26
 */
class Cities extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Sales_model', 'Admin_model'));
    }


    function index()
    {
        $data['cities'] = $this->Admin_model->getTable('city', null, false);
        $this->_view('admin/cities/index', $data);
    }

    function delete($id)
    {
        $this->Admin_model->deleteItem('city', $id, 'city_id');
        redirect('/admin/cities');
    }

    function add()
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->addItem('city', $_POST, 'Город успешно добавлен');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
            $this->_view('admin/cities/add', $data);
        } else {
            $this->_view('admin/cities/add');
        }

    }

    function edit($id)
    {
        if (isset($_POST) && $_POST != null) {
            $this->Admin_model->updateItem('city', $_POST, $id, 'Город успешно обновлен', 'city_id');
            $status = $this->session->flashdata('status');
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
        }
        $data['cities'] = $this->Admin_model->getTable('city', null, false);
        $this->_view('admin/cities/edit', $data);
    }
}