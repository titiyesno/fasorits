<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('test_method')) {

    function my_number_encrypt($data, $key, $base64_safe = true, $shrink = true) {
        $key = "&/ASD%g/..&FWSF2csvsq2we!%%";
        if ($shrink)
            $data = base_convert($data, 10, 36);
        $data = @mcrypt_encrypt(MCRYPT_ARCFOUR, $key, $data, MCRYPT_MODE_STREAM);
        if ($base64_safe)
            $data = str_replace('=', '', base64_encode($data));
        return $data;
    }

    function my_number_decrypt($data, $key, $base64_safe = true, $expand = true) {
        $key = "&/ASD%g/..&FWSF2csvsq2we!%%";
        if ($base64_safe)
            $data = base64_decode($data . '==');
        $data = @mcrypt_encrypt(MCRYPT_ARCFOUR, $key, $data, MCRYPT_MODE_STREAM);
        if ($expand)
            $data = base_convert($data, 36, 19);
        return $data;
    }

    function encrypt($pure_string) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, config_item('encryption_key'), utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }

    /**
     * Returns decrypted original string
     */
    function decrypt($encrypted_string) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, config_item('encryption_key'), $encrypted_string, MCRYPT_MODE_ECB, $iv);
        return $decrypted_string;
    }

}