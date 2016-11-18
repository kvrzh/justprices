<?php

use errors as errors;

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
     * @return \classes\User|null
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
            return null;
        } else {
            return new classes\User($login, $password, $result[0]);
        }
    }

    /**
     * @param array $data
     * @param bool $getUser
     * @return \classes\User|bool
     * @throws errors\UserDatabaseException
     */
    public function newUser($data, $getUser = false)
    {
        foreach ($data as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            $this->db->set($key, $value);
        }
        $this->db->insert('users');
        if ($this->db->error()['code'] != 0) {
            throw new errors\UserDatabaseException('Ошибка при регистрации');
        }
        if ($getUser == true) {
            return $this->getUserByLogin($data['login'], $data['password']);
        } else {
            return true;
        }


    }

    /**
     * @param int $id
     * @param int $shop_id
     * @throws errors\UserDatabaseException
     * @throws errors\UserWrongTypeException
     */
    public function addShop($id, $shop_id)
    {
        if (is_int($shop_id)) {
            $this->db->set('user_id', $id);
            $this->db->set('shop_id', $shop_id);
            $this->db->insert('user_shop');
        } elseif (is_array($shop_id)) {
            foreach ($shop_id as $item) {
                if (!is_int($item)) {
                    throw new errors\UserWrongTypeException('Wrong type of data: ' . gettype($item), $item);
                }
                $this->db->set('user_id', $id);
                $this->db->set('shop_id', $item);
                $this->db->insert('user_shop');
                if ($this->db->error()['code'] != 0) {
                    throw new errors\UserDatabaseException('Пользователь уже подписан на данный магазин. ID: ' . $item, $item);
                };
            }
        } else {
            throw new errors\UserWrongTypeException('Wrong type of data: ' . gettype($shop_id), $shop_id);
        }
        if ($this->db->error()['code'] != 0) {
            throw new errors\UserDatabaseException('Пользователь уже подписан на данный магазин. ID: ' . $shop_id, $shop_id);
        }

    }

    /**
     * @param int $id
     * @return array|null
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
        return $result;
    }

    /**
     * @param $id
     * @param $shop_id
     * @throws errors\UserDatabaseException
     * @throws errors\UserWrongTypeException
     */
    public function deleteShop($id, $shop_id)
    {
        if (is_int($shop_id)) {
            $this->db->where('user_id', $id);
            $this->db->where('shop_id', $shop_id);
            $this->db->delete('user_shop');
        } elseif (is_array($shop_id)) {
            foreach ($shop_id as $item) {
                if (!is_int($item)) {
                    throw new errors\UserWrongTypeException('Wrong type of data: ' . gettype($item), $item);
                }
                $this->db->where('user_id', $id);
                $this->db->where('shop_id', $item);
                $this->db->delete('user_shop');
            }
        } elseif (is_string($shop_id) && $shop_id == 'ALL') {
            $this->db->delete('user_shop');
        } else {
            throw new errors\UserWrongTypeException('Wrong type of data: ' . gettype($shop_id), $shop_id);
        }
        if ($this->db->error()['code'] != 0) {
            throw new errors\UserDatabaseException('Ошибка при удалении магазина');
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @throws errors\UserDatabaseException
     */
    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        if ($this->db->error()['code'] != 0) {
            throw new errors\UserDatabaseException('Ошибка при обновлении данных');
        }
    }
}