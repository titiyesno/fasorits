<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class contact extends CI_model {

    function __construct() {
        parent::__construct();
    }
    function getcontact(){
        $sql = 'select contact.nama, contact.email, contact.pesan from contact';
        return $this->query($sql);
    }

}
