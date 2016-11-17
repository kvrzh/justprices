<?php


/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 16.11.16
 * Time: 11:34
 */
class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $login
     * @param string $password
     * @return \classes\User
     * @throws Exception
     */
    public function getUserByLogin($login, $password)
    {
        $result = null;
        $this->db->select('*');
        $this->db->where('login', $login);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        if ($result == null) {
            throw new Exception('Такого пользователя нет');
        } else {
            return new classes\User($login, $password, $result[0]);
        }
    }

    /**
     * @param array $data
     * @param bool $getUser
     * @return \classes\User
     */
    public function newUser($data, $getUser = false)
    {
        foreach ($data as $key => $value) {
            $this->db->set($key, $value);
        }
        $this->db->insert('users');
        if ($getUser == true) {
            return $this->getUserByLogin($data['login'], $data['password']);
        }

    }

    /**
     * @param int $id
     * @param int $shop_id
     * @throws Exception
     */
    public function addShop($id, $shop_id)
    {
        $this->db->set('user_id', $id);
        $this->db->set('shop_id', $shop_id);
        $this->db->insert('user_shop');
        if ($this->db->error()) {
            throw new Exception('Пользователь уже подписан на данный магазин');
        }
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getShopsForUser($id)
    {
        $result = null;
        $this->db->select('*');
        $this->db->join('shops', 'shop_id = shops.shops_id', 'inner');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_shop');
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        if ($result == null) {
            throw new Exception('Нет выбранных магазинов');
        } else {
            return $result;
        }
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
}