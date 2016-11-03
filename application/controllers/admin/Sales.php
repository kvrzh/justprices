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


    function index()
    {
        $sales = $this->Admin_model->getTable('sales');
        ini_set('display_errors', 0);
        foreach ($sales as $key => $value) {
            foreach ($sales as $k => $v) {
                if ($sales[$key]['sales_id'] == $sales[$k]['sales_id'] && $key != $k) {
                    if (!is_array($sales[$key]['city_id'])) {
                        $sales[$key]['city_id'] = array($sales[$key]['city_id']);
                        $sales[$key]['city_name'] = array($sales[$key]['city_name']);
                    }
                    array_push($sales[$key]['city_id'], $sales[$k]['city_id']);
                    array_push($sales[$key]['city_name'], $sales[$k]['city_name']);
                    if (!isset($sales[$key]['shop'])) {
                        unset($sales[$key]);
                    }
                    unset($sales[$k]);
                }
            }
        }

        $data['sales'] = $sales;
        $this->_view('admin/sales/index', $data);
    }
    function delete($id)
    {
        $this->db->trans_start();
        $this->Admin_model->deleteItem('sales', $id, 'id');
        $this->Admin_model->deleteItem('sales_city', $id, 'sales_id');
        $this->db->trans_complete();
        redirect('/admin/sales');
    }

    function add()
    {
        if (isset($_POST) && $_POST != null) {
            $cities = $_POST['cities'];
            unset($_POST['cities']);
            $this->Admin_model->addItem('sales', $_POST, 'Скидка успешно добавлена');
            $this_id = $this->Admin_model->getLastIdItem();
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
            $cities = $_POST['cities'];
            unset($_POST['cities']);
            $this->db->trans_start();
            $this->Admin_model->updateItem('sales', $_POST, $id, 'Скидка успешно обновлена', 'id');
            $this->Admin_model->updateSaleCity($id, $cities);
            $this->db->trans_complete();
            $status = $this->session->flashdata('status');
            if ($this->db->trans_status() === FALSE) {
                $status = 'Не получается';
            }
            if (isset($status) && $status != null) {
                $data['status'] = $status;
            }
        }
        $data['shops'] = $this->Admin_model->getTable('shops', null, false);
        $data['categories'] = $this->Admin_model->getTable('category', null, false);
        $data['cities'] = $this->Admin_model->getTable('city', null, false);
        $data['sale'] = $this->Admin_model->getTable('sales', $id, true);
        $data['sale'][0]['city_id'] = array($data['sale'][0]['city_id']);
        $data['sale'][0]['city_name'] = array($data['sale'][0]['city_name']);
        for ($i = 1; $i < count($data['sale']); $i++) {
            array_push($data['sale'][0]['city_id'], $data['sale'][$i]['city_id']);
            array_push($data['sale'][0]['city_name'], $data['sale'][$i]['city_name']);
        }
        $this->_view('admin/sales/edit', $data);
    }

}