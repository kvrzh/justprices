<?php
/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 18.11.16
 * Time: 14:11
 */

namespace errors;


class UserWrongTypeException extends UserException
{
    function __construct($message = "", $ex = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $ex, $code, $previous);
    }
}