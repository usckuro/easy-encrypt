<?php

namespace EasyEncrypt\Encrypt;

class Helper {

    /**
     * @description Method to encrypt with a key
     * @param $chain
     * @param $key
     * @return string
     */
    public static function encrypt($chain, $key){
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $chain, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
    }

    /**
     * @description Method to decrypt a key
     * @param $chain
     * @param $key
     * @return string
     */
    public static function decrypt($chain, $key){
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($chain), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;
    }
}