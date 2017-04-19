<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class u extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('company/company_model');
    }
    function index(){
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $data['yidic'] = $this->company_model->getcompany();
        $data['subnav'] = $this->company_model->getsubnav();
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_home.php",$data);
    }
    function prosedur(){
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $data['yidic'] = $this->company_model->getProsedur();
        $data['subnav'] = $this->company_model->getsubnav();
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_home.php",$data);
    }
}
