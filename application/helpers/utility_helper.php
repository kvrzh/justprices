<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 29.09.2016
 * Time: 22:45
 */
function assets_url($file = '')
{
    return base_url() . 'assets/' . $file;
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
    return assets_url() . 'images/' . $file;
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
function decode_encode_city($elem){
    if(gettype($elem) == "integer"){
        switch ($elem){
            case 1: return "Киев";
            break;
            case 2: return "Львов";
            break;
            case 3:
                return "Харьков";
                break;
            default: return "Киев";
        }
    }else{
        switch($elem){
            case "Киев": return 1;
            break;
            case "Львов": return 2;
                break;
            case "Харьков":
                return 3;
            break;
            default: return 1;
        }
    }
}
function decode_encode_category($elem){
    if(gettype($elem) == "integer"){
        switch ($elem){
            case 0: return "Все категории";
                break;
            case 1: return "Магазины одежды";
                break;
            case 2: return "Рестораны и кафе";
                break;
            default: return "Магазины одежды";
        }
    }else{
        switch($elem){
            case "Все категории": return 0;
                break;
            case "Магазины одежды": return 1;
                break;
            case "Рестораны и кафе": return 2;
                break;
            default: return 1;
        }
    }
}