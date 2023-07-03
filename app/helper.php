<?php // Code within app\Helpers\Helper.php

use Illuminate\Support\Facades\Crypt;

if (!function_exists('encrypt')) {

    function encrypt($id)
    {
        $crypt_key = Crypt::encryptString($id);
        return $crypt_key;
    }
}
if (!function_exists('decrypt')) {
    function decrypt($id)
    {
        $decrypted = Crypt::decryptString($id);
        return $decrypted;
    }
}
