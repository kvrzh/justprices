<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 21.11.16
 * Time: 9:51
 */
class Sales extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Sales_model'));
    }

    function index($shop = null)
    {
        $shop = str_replace('_', ' ', $shop);
        if (!isset($shop)) {
            $shop = 0;
        } else {
            $shop = str_replace('_', ' ', $this->Sales_model->getShopsIdByName($shop));
        }

        if (isset($_SESSION['city'])) {
            if (is_string($_SESSION['city'])) {
                $_SESSION['city'] = decode_encode_city((string)$_SESSION['city']);
            }
            $data['city'] = $_SESSION['city'];
        } else {
            $data['city'] = 1;
        }
        $default = [
            "city" => array(
                "name" => "city_id",
                "value" => $data['city']
            ),
            "shop" => array(
                "name" => "shops_id",
                "value" => $shop
            ),
            "category" => array(
                "name" => "category_id",
                "value" => 0
            )
        ];
        $data['city'] = decode_encode_city((int)$data['city']);
        if (!isset($_SESSION['city'])) {
            $_SESSION['city'] = $data['city'];
        }
        $data['cities'] = $this->Sales_model->getTable('city');
        $data['categories'] = $this->Sales_model->getTable('category');
        $data['sales'] = $this->Sales_model->getFilterSales($default);
        $this->load->view('mob/default/assets');
        $this->load->view('mob/sales/main', $data);
    }
}