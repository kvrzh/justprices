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

    function _remap($method, $params = array())
    {
        if ($_SESSION['login'] != true) {
            redirect('/admin');
        } else {
            return call_user_func_array(array($this, $method), $params);
        }
    }
    function index()
    {
        $data['sales'] = $this->Admin_model->getTable('sales');
        print_r($data['sales']);
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
            $cities = $_POST['cities'];
            unset($_POST['cities']);
            $this->Admin_model->addItem('sales', $_POST, 'Скидка успешно добавлена');
            $this_id = $this->Admin_model->getLastIdItem();
            print_r($this_id->id);
            foreach ($cities as $city) {
                $array_cities['sales_id'] = $this_id->id;
                $array_cities['city_id'] = $city;
                $this->Admin_model->addItem('sales_city', $array_cities, 'Скидка успешно добавлена');
            }
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