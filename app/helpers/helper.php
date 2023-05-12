<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\Crypt;

class Helper
{
    public static function encrypt( $id)
    {
        $crypt_key = Crypt::encryptString($id);
        return $crypt_key;
    }
    public static function decrypt($id)
    {
        $crypt_key = Crypt::decryptString($id);
        return $crypt_key;
    }
}