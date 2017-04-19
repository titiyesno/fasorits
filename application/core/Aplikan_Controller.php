<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aplikan_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        if (!isset($this->session->userdata['logged_in']) && !isset($this->session->userdata['logged_in']["privilege"])) {
            $this->session->set_userdata(array('last_url' => current_url()));
            redirect('user/login', 'refresh');
        }
        if ("aplikan" != $this->session->userdata['logged_in']["privilege"]) {
            $this->session->set_userdata(array('last_url' => current_url()));
            redirect('user/login', 'refresh');
        }
        if (0 >= $this->session->userdata['logged_in']["id"]) {
            $this->session->set_userdata(array('last_url' => current_url()));
            redirect('user/login', 'refresh');
        }
    }

    function getProfile() {
        
    }

}

?>
