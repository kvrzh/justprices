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
            $this->db->join('shops', 'shop=shops.shops_id', 'inner');
            $this->db->join('sales_city', 'sales.id=sales_city.sales_id', 'inner');
            $this->db->join('city', "city_id=city.id", 'inner');
            $this->db->join('category', 'category.id=sales.category_id', 'inner');
            $this->db->order_by("sales.id", "asc");
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

    public function getLastIdItem()
    {
        $this->db->select_max('id');
        $query = $this->db->get('sales');
        return $query->row();

    }

    public function updateSaleCity($id, $array)
    {
        $this->db->where('sales_id', $id);
        $this->db->delete('sales_city');
        foreach ($array as $item) {
            $this->db->set('sales_id', $id);
            $this->db->set('city_id', $item);
            $this->db->insert('sales_city');
        }
    }
}