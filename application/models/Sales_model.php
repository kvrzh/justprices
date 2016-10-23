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
        $this->db->join('shops', 'sales.shop=shops.id', 'inner');
        $query = $this->db->get('sales');
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }
}