<?php
use classes as classes;

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 16.11.16
 * Time: 9:56
 */
class Test extends MY_Controller
{
    function index()
    {

        $data = array(
            'login' => 'ivanss',
            'password' => 'password',
            'email' => 'kovr-anton@mail.ru'
        );
        $data1 = array(
            'login' => 'ivanaww',
            'password' => 'password',
            'email' => 'kovr-anton@mail.ru'
        );
        try {
            $user = classes\User::getUser('ivans', 'password');
            $user->updateUser($data);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}