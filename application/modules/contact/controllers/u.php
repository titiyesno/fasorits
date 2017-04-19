<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class u extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('user/model_user');
        $this->load->model('news/artikel_model');
    }

    function index() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_home.php");
    }

    function submit() {
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['pesan'] = $this->input->post('pesan');
        $data['admin_idadmin'] = '1';
        $idberita = $this->artikel_model->create_data($data, 'contact');
        redirect("contact/u//");
    }

}
