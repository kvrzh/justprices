<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 29.09.2016
 * Time: 22:45
 */
function assets_url()
{
    return base_url() . 'assets/';
}

function css_url($file)
{
    return assets_url() . 'css/' . $file;
}

function js_url($file)
{
    return assets_url() . 'js/' . $file;
}

function img_url($file)
{
    return assets_url() . 'img/' . $file;
}

function encode_pass($string)
{
    if ($string) {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5('1HdcQDmV4hzvQHT35ZUdSnxbnJMyuqC4'),
            $string, MCRYPT_MODE_CBC, md5(md5('1HdcQDmV4hzvQHT35ZUdSnxbnJMyuqC4'))));
    } else
        return false;
}
function decode_status($status){
    if($status == 0){
        return "Регистрация";
    }elseif($status == 1) {
        return "Проходит";
    }else{
        return "Завершен";
    }
}

function decode_type($type)
{
    if ($type == 5) {
        return '<i class="fa fa-users" aria-hidden="true"></i> Командный';
    } elseif ($type == 1) {
        return '<i class="fa fa-user" aria-hidden="true"></i> Одиночный';
    }
    return $type;
}