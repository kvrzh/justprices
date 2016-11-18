<?php
/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 18.11.16
 * Time: 14:07
 */

namespace errors;


class DefaultException extends \Exception
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}