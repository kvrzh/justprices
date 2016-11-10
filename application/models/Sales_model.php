<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 23.10.2016
 * Time: 22:21
 */
class Sales_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSales($city, $shop = null)
    {
        $result = false;
        $this->db->select('*');
        $this->db->join('shops', 'shops.id=sales.shop', 'inner');
        $this->db->join('sales_city', 'sales.sales_id=sales_city.sales_id', 'inner');
        $this->db->where('city',$city);
        if ($shop != null) {
            $this->db->where('shop', $shop);
        }
        $query = $this->db->get('sales');
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }

    public function getShopsIdByName($name)
    {
        $result = false;
        $this->db->select('*');
        $this->db->where('name', $name);
        $query = $this->db->get('shops');
        $result = $query->row('shops_id');
        return $result;
    }

    public function getFilterSales($array = null, $from = null)
    {
        $result = false;

        $this->db->select('*');

        foreach ($array as $item) {
            if ($item['value'] != 0) {
                $this->db->where($item['name'], $item['value']);
            }
        }
        $this->db->join('shops', 'shop=shops.shops_id', 'inner');
        $this->db->join('sales_city', 'sales.id=sales_city.sales_id', 'inner');
        $this->db->join('city', "city_id=city.id", 'inner');
        $this->db->join('category', 'category.id=sales.category_id', 'inner');
        $this->db->order_by("sales.id", "asc");
        $this->db->limit(11);
        if (isset($from)) {
            $this->db->where('sales_id>', $from);
        }
        $query = $this->db->get('sales');

        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }


    public function getTable($table)
    {
        $result = false;
        $this->db->select('*');
        $query = $this->db->get($table);
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;

    }
    public function getSaleById($id){
        $sale = false;
        $this->db->select('*');
        $this->db->join('shops', 'shops.id=sales.shop', 'inner');
        $this->db->join('sales_city', 'sales.sales_id=sales_city.sales_id', 'inner');
        $this->db->join('city', "city_id=city.id", 'inner');
        $this->db->where('sales_id', $id);
        $query = $this->db->get('sales');
        $sale = array();
        if ($query->row('id')) {
            $sale = $query->row();
        }
        return $sale;
    }
    public function liveSearch($search){
        $result = false;
        $this->db->select('name');
        $this->db->like('name', $search);
        $query = $this->db->get('shops');
        foreach($query->result_array() as $row){
            $result[] = $row;
        }
        if ($result == false) {
            return 'Sorry';
        }
        return $result;
    }
}