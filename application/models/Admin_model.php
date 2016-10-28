<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 28.10.16
 * Time: 13:34
 */
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTable($table, $id = null, $join = true)
    {
        $result = false;
        $this->db->select('*');
        if ($join == true) {
            $this->db->join('shops', 'shops.id=sales.shop', 'inner');
            $this->db->join('city', 'city.city_id=sales.city_id', 'inner');
            $this->db->join('category', 'category.category_id=sales.category_id', 'inner');
        }
        if ($id) {
            $this->db->where('sales_id', $id);
        }
        $query = $this->db->get($table);
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }

    public function deleteItem($table, $id)
    {
        $this->db->where('sales_id', $id);
        $this->db->delete($table);
    }
}