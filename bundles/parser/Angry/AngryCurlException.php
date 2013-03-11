<?php

namespace Parser\Angry;

/**
 * AngryCurl custom exception
 */
class AngryCurlException extends Exception
{
    public function __construct($message = "", $code = 0 /*For PHP < 5.3 compatibility omitted: , Exception $previous = null*/)
    {
        AngryCurl::add_debug_msg($message);
        parent::__construct($message, $code);
    }
}