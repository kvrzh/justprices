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

    function index($shop = 0)
    {
        $default = [
            "city" => array(
                "name" => "city",
                "value" => 2
            ),
            "shop" => array(
                "name" => "shop",
                "value" => $shop
            ),
            "category" => array(
                "name" => "category",
                "value" => 0
            )
        ];
        $data['city'] = decode_encode_city((int)$default['city']['value']);
        $data['sales'] = $this->Sales_model->getFilterSales($default);
        if(isset($_POST['result'])){
            $result = $_POST['result'];
            if (isset($result[2]) && $result[2]['name'] == 'shop') {
                $result[2]['value'] = $this->Sales_model->getShopsIdByName($result[2]['value']);
            }
            foreach($result as $item){
                $res[$item['name']] = $item['value'];
            }
            $data['city'] = decode_encode_city((int)$res['city']);
            $data['sales'] = $this->Sales_model->getFilterSales($result);
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
        $this->load->view('sales/main');
        $this->load->view('sales/'.$view,$data);
        $this->load->view('sales/endsale');
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
        print_r($default);
    }
    function sale($id){
        $data['sale'] = $this->Sales_model->getSaleById($id);
        $data['sale']->address = explode(';',$data['sale']->address);
        if(isset($_POST['js']) && $_POST['js'] == true){
            $this->load->view('sales/sale',$data);
        }else{
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
}