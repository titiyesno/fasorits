<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class u extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('user/model_user');
    }
    function index(){
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_home.php");
    }
    function offer(){
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_offers.php");
    }
}
