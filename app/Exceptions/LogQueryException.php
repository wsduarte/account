<?php

namespace App\Exceptions;

use Exception;

class LogQueryException extends Exception
{

    public static function get($e)
    {
        if ($e instanceof Exception) {
            echo $e->getCode(). '<br />';
            echo $e->getMessage(). '<br />';

            die;
        }

    }

}
