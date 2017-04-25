<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    const IMAGE_UPLOAD_DIR = 'gui_modul/berita_gambar';

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->library('cart');
        $this->load->model('pemesanan/pemesanan_model');
        $this->load->helper(array('form', 'captcha'));
        $this->load->library('form_validation');
        $this->load->model('pemesanan_model');
        $this->load->helper('dompdf');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->_supported_extensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
    }

    function reservasi() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['data'] = $this->pemesanan_model->disableDate();
        //$data['acara'] = $this->pemesanan_model->jenis_acara();
        $data['slot'] = $this->pemesanan_model->slot($id);
        $data['olahraga'] = $this->pemesanan_model->olahraga($id);
        $this->form_validation->set_rules('name', "Name", 'required');
        $this->form_validation->set_rules('captcha', "Captcha", 'required');
        $userCaptcha = set_value('captcha');
        $word = $this->session->userdata('captchaWord');

        $data['data0'] = $this->pemesanan_model->disableDate();
        if ($this->form_validation->run() == TRUE && strcmp(strtolower($userCaptcha), strtolower($word)) == 0) {
            $this->session->unset_userdata('captchaWord');
            $name = set_value('name');
            $data = array('name' => $name);
            print_r($data);
        } else {
            $vals = array(
                'img_path' => './index/',
                'img_url' => 'http://localhost/captcha/',
                'img_width' => '150',
                'img_height' => 30,
                'expiration' => 7200
            );
            /* Generate the captcha */
            $captcha = create_captcha($vals);
            /* Store the captcha value (or 'word') in a session to retrieve later */
            $this->session->set_userdata('captchaWord', $captcha['word']);
            $this->template->build("u_home.php", $data);
        }
    }

    function index() {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        //$data['events'] = $this->pemesanan_model->getAllevent();
        $this->template->build("dashboard.php", $data);
    }
	
	function all() {
        $temp1 = $this->pemesanan_model->read_pembayaran2();
        $data["submit"] = $this->getPivot($temp1);
        return $data["submit"];
    }

    function cetakbukti($id) {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['pemesan'] = $this->pemesanan_model->pemesan($id);
        $data['pemesanan'] = $this->pemesanan_model->pemesanan($id);
        $this->template->build("invoice.php", $data);
    }

    public function bayar($id) {
        $this->db->set("status", 1);
        $this->db->where('idpemesanan', $id);
        $this->db->update("pemesanan");
        redirect("pemesanan/s/");
    }

}
