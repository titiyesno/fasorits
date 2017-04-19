<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('sendEmail')) {
    function sendEmail($to, $subject, $isi) {
         $CI = & get_instance();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'asrama.its.2014@gmail.com',
            'smtp_pass' => 'brambang',
            'smtp_port' => 465,
//            'smtp_host' => 'ssl://smtp.googlemail.com',
//            'smtp_user' => 'asrama.its.2014@gmail.com',
            
//            'smtp_pass' => 'brambang', // change it to yours
            'mailtype' => 'html'
        );
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");

        //$this->email->from("asrama.its.2014@gmail.com", "Reservasi Asrama");
        $CI->email->from($config['smtp_user'], "Reservasi Asrama ITS");
        $CI->email->to($to);

        $CI->email->subject($subject);
        $CI->email->message($isi);

        if ($CI->email->send()) {
            //Success email Sent
            return 1;
        } else {
            //Email Failed To Send
            return 0;
        }
    }

}
