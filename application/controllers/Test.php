<?php
use classes as classes;
use errors as errors;
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
            'login' => 'antoniow',
            'password' => 'kvrzh',
            'email' => 'kovr-anton@mail.ru'
        );
        $data1 = array(
            'login' => 'ivanaww',
            'password' => 'password',
            'email' => 'kovr-anton@mail.ru'
        );
        try {
            $user = classes\User::registrationUser($data, true);
            print_r($user);
            echo 'normasik';
        } catch (errors\UserException $e) {
            echo $e->getMessage();
            echo $e->getEx();
        }

    }
}