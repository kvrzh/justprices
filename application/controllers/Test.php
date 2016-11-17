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
            'login' => 'anton',
            'password' => 'kvrzh',
            'email' => 'kovr-anton@mail.ru'
        );
        $data1 = array(
            'login' => 'ivanaww',
            'password' => 'password',
            'email' => 'kovr-anton@mail.ru'
        );
        try {
            $user = classes\User::getUser('ivanss', 'password');
            $user->addShop(12);
            echo 'normasik';
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}