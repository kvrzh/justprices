<?php

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 16.11.16
 * Time: 9:51
 */

namespace classes;

use errors as errors;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User
{
    protected $login;
    protected $password;
    protected $data;
    protected $CI;

    /**
     * User constructor.
     * @param string $login
     * @param string $password
     * @param array $data
     */
    public function __construct($login, $password, $data)
    {
        $this->login = $login;
        $this->password = $password;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function __toString()
    {
        return $this->login . '<br>' . $this->password . '<br>';
    }

    /**
     * @param string $login
     * @param string $password
     * @return User|null
     * @throws errors\UserDatabaseException
     */
    public static function getUser($login, $password)
    { // Get User by login & password
        $CI = &get_instance();
        $CI->load->model('Users_model');
        return $CI->Users_model->getUserByLogin($login, $password);
    }

    /**
     * @param array $data
     * @param bool $getUser
     * @return User
     * @throws errors\UserDatabaseException
     */
    public static function registrationUser($data, $getUser = false)
    { // Registration of new User (if u want to get new User as object - set $getUser to true
        $CI = &get_instance();
        $CI->load->model('Users_model');
        $data['password'] = encode_pass($data['password']);
        return $CI->Users_model->newUser($data, $getUser);
    }

    /**
     * @param $data
     * @throws errors\UserDatabaseException
     */
    public function updateUser($data)
    { // Update information about user
        if (!isset($this->CI)) {
            $this->CI = &get_instance();
            $this->CI->load->model('Users_model');
        }
        if (empty(array_diff($this->data, $data))) {
            throw new errors\UserDatabaseException('Данные не изменились');
        } else {
            $this->CI->Users_model->updateUser((int)$this->data['id'], $data);
        }

    }

    /**
     * @param int|array $shop_id
     */
    public function addShop($shop_id)
    { // Add new shop or shops to favorite to current user
        if (!isset($this->CI)) {
            $this->CI = &get_instance();
            $this->CI->load->model('Users_model');
        }
        $this->CI->Users_model->addShop($this->data['id'], $shop_id);
    }

    public function deleteShop($shop_id)
    { // Delete shop or shops from favourite
        if (!isset($this->CI)) {
            $this->CI = &get_instance();
            $this->CI->load->model('Users_model');
        }
        $this->CI->Users_model->deleteShop($this->data['id'], $shop_id);
    }

    /**
     * @return array|null
     */
    public function getShopsForUser()
    { // Get all favourite shops for current user
        if (!isset($this->CI)) {
            $this->CI = &get_instance();
            $this->CI->load->model('Users_model');
        }
        return $this->CI->Users_model->getShopsForUser($this->data['id']);
    }


}