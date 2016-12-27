<?php

namespace App\Libs;

class Validate
{

    /**
    * Check for SHA1 string validity
    *
    * @param string $sha1 SHA1 string to validate
    * @return boolean Validity is ok or not
    */
   public static function isSha1($sha1)
   {
       return preg_match('/^[a-fA-F0-9]{40}$/', $sha1);
   }

}
