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
            print_r($user);
            print_r($user->getShopsForUser());
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}