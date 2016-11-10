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
        if(isset($_POST['result'])){
            $result = $_POST['result'];
            if (isset($result[2]) && $result[2]['name'] == 'shop') {
                $id = str_replace('_', ' ', $result[2]['value']);
                $id = $this->Sales_model->getShopsIdByName($id);
                $result[2]['value'] = $id;
            }
            foreach($result as $item){
                $res[$item['name']] = $item['value'];
            }
            $_SESSION['city'] = decode_encode_city((int)$res['city_id']);
            $data['city'] = $_SESSION['city'];
            $data['sales'] = $this->Sales_model->getFilterSales($result);

        }
        if (isset($data['sales'][10])) {
            unset($data['sales'][10]);
            $data['new_sales'] = true;
        } else {
            $data['new_sales'] = false;
        }
        if(!$data['sales']){
            $data['sales'] = false;
        }
        if(isset($_POST['js']) && $_POST['js'] == true){
            $this->load->view('sales/sales-list',$data);
        }else{
            $this->viewSale('sales-list',$data);
        }
    }

    function viewSale($view,$data = null){
        $this->load->view('default/assets');
        $this->load->view('sales/main', $data);
        $this->load->view('sales/'.$view,$data);
        $this->load->view('sales/endsale', $data);
        $this->load->view('default/footer');
    }

    function test($shop = 2)
    {
        $default = [
            array(
                "name" => "city",
                "value" => 1
            ),
            array(
                "name" => "shop",
                "value" => $shop
            )
        ];
    }

    function sale($id = null)
    {
        $id = (int)$id;
        if ($id == 0) {
            redirect('/sales');
        }
        if ($_SESSION['city'] == 0) {
            $_SESSION['city'] = decode_encode_city((string)$_SESSION['city']);
        }
        $ar = [
            "sale" => array(
                "name" => "sales_id",
                "value" => $id
            ),
            "city" => array(
                "name" => "city_id",
                "value" => $_SESSION['city']
            )];
        if ($this->Sales_model->getFilterSales($ar) != false) {
            $data['status'] = true;
            $data['sale'] = $this->Sales_model->getFilterSales($ar);
            $data['sale'][0]['address'] = explode(';', $data['sale'][0]['address']);
            $_SESSION['city'] = $data['sale'][0]['city_name'];
        } else {
            $data['status'] = false;
        }
        if(isset($_POST['js']) && $_POST['js'] == true){
            $this->load->view('sales/sale',$data);
        }else{
            $data['cities'] = $this->Sales_model->getTable('city');
            $data['categories'] = $this->Sales_model->getTable('category');
            $this->viewSale('sale',$data);
        }
    }
    function search(){
        $search = $_GET['query'];
        $result = $this->Sales_model->liveSearch($search);
        if (is_array($result)) {
            foreach ($result as $item) {
                $res[] = $item['name'];
            }
            $res = json_encode($res);
            echo $res;
        } else {
            echo '["Извините, нет совпадений"]';
        }

    }

    function newSales()
    {
        if (isset($_GET['result'][2]) && $_GET['result'][2]['name'] == 'shop') {
            $shop_id = str_replace('_', ' ', $_GET['result'][2]['value']);
            $shop_id = $this->Sales_model->getShopsIdByName($shop_id);
            $_GET['result'][2]['value'] = $shop_id;
        }
        if (isset($data['sales'][10])) {
            unset($data['sales'][10]);
            $data['new_sales'] = true;
        } else {
            $data['new_sales'] = false;
        }
        $id = $_GET['id'];
        $data['sales'] = $this->Sales_model->getFilterSales($_GET['result'], $id);
        $this->load->view('sales/newSalesList', $data);
    }
}