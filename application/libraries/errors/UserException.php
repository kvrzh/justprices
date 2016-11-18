<?php
/**
 * Created by PhpStorm.
 * User: bizremy
 * Date: 18.11.16
 * Time: 14:10
 */

namespace errors;


class UserException extends DefaultException
{
    protected $ex;

    public function __construct($message = "", $ex = "", $code = 0, \Exception $previous = null)
    {
        $this->ex = $ex;
        parent::__construct($message, $code, $previous);

    }

    /**
     * @return string
     */
    public function getEx(): string
    {
        return $this->ex;
    }

}