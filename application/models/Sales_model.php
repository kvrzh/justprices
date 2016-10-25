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

    public function getSales()
    {
        $this->db->select('*');
        $this->db->join('shops', 'shops.id=sales.shop', 'inner');
        $query = $this->db->get('sales');
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }
    public function getSaleById($id){
        $this->db->select('*');
        $this->db->join('shops', 'shops.id=sales.shop', 'inner');
        $this->db->where('sales_id', $id);
        $query = $this->db->get('sales');
        if ($query->row('id')) {
            $sale = $query->row();
        }
        return $sale;
    }
}