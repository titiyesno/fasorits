<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('test_method')) {
function numberToConcurent($delimitter, $number) {
    $array = str_split($number);
    $result = '';
    for ($i = 0; $i < count($array); $i++) {
        if ($i % 3 == 2 && $i!=count($array)-1)
            $result = $delimitter.$array[count($array) - ($i + 1)] . $result;
        else
            $result = $array[count($array) - ($i + 1)] . $result;
    }
    return $result;
}
    function getContetType($file) {

        $mimetypes = array(
            'gif' => 'image/gif',
            'png' => 'image/png',
            'jpg' => 'image/jpg',
            'css' => 'text/html',
            'js' => 'text/html',
            'pdf' => 'application/pdf',
        );
        $path_parts = pathinfo($file);
        if (array_key_exists($path_parts['extension'], $mimetypes)) {
            $mime = $mimetypes[$path_parts['extension']];
        } else {
            $mime = 'application/octet-stream';
        }
    }
    function mem($path){
        echo base_url().'index.php/welcome/getFile/'.urlencode(base64_encode($path));
    }
}