<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class t extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('pemesanan/pemesanan_model');
    }

    function allevent() {
        
        $data = $this->pemesanan_model->allevent();
        echo json_encode($data);
    }

    function disableDates() {
        $data = $this->pemesanan_model->disableDate();
        $temp = array(); //array();//$data->result_array();
        foreach ($data as $item) {
            $temp = $item->date;
        }
        $js_array = json_encode($temp);
        echo $temp;
    }

    function index() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('blank');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['data'] = $this->pemesanan_model->disableDate();
        $this->load->view("t_cal.php", $data);
    }

}
