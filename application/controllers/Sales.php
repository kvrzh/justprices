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
    function index(){
        $data['sales'] = $this->Sales_model->getSales(1);
        $data['city'] = "Киев";
        if(isset($_POST['result'])){
            $result = $_POST['result'];
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
    function test(){
        $data['sales'] = $this->Sales_model->getSales();
        $this->_view('sales/sales-list',$data);
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
        $result = json_encode($result);
        print_r($result);
    }
}