<?php


namespace errors;

/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 18.11.16
 * Time: 10:14
 */
class UserDatabaseException extends UserException
{
    function __construct($message = "", $ex = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $ex, $code, $previous);
    }
}