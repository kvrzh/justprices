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

    public function deleteItem($table, $id, $table_id = 'sales_id')
    {
        $this->db->where($table_id, $id);
        $this->db->delete($table);
    }

    public function addItem($table, $array, $status = 'Ок')
    {
        if (isset($array)) {
            foreach ($array as $key => $value) {
                $this->db->set($key, $value);
            }
            if ($this->db->insert($table)) {
                $this->session->set_flashdata('status', $status);
            }
        }
    }

    public function updateItem($table, $array, $id, $status = 'Ок', $table_id = 'sales_id')
    {
        $this->db->where($table_id, $id);
        if ($this->db->update($table, $array)) {
            $this->session->set_flashdata('status', $status);
        }
    }
}