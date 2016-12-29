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

   /**
    * Check for password validity
    *
    * @param string $passwd Password to validate
    * @param int $size
    * @return boolean Validity is ok or not
    */
   public static function isPasswd($passwd, $size = 6)
   {
       return (Tools::strlen($passwd) >= $size && Tools::strlen($passwd) < 255);
   }

}
