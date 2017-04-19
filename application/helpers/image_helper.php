<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('test_method')) {

    function my_number_encrypt($data, $key, $base64_safe = true, $shrink = true) {
        $images = $_FILES["userfile"]["tmp_name"];
        $new_images = "thumbnails_" . $_FILES["userfile"]["name"];
        copy($_FILES, "Photos/" . $_FILES["userfile"]["name"]);
        $width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
        $size = GetimageSize($images);
        $height = round($width * $size[1] / $size[0]);
        $images_orig = ImageCreateFromJPEG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
        ImageJPEG($images_fin, "Photos/" . $new_images);
        ImageDestroy($images_orig);
        ImageDestroy($images_fin);
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

    function getImage($filename) {

        if (file_exists($filename)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filename));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filename));
            ob_clean();
            flush();
            readfile($filename);
            exit;
        }
    }

}