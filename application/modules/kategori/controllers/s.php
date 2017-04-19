<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('kategori/kategori_model');
    }

    function add() {
        $data['nama'] = $this->input->post('nama');
        $this->kategori_model->add($data);
        redirect("kategori/s/");
    }

    function hapus($id) {
        $this->kategori_model->delete($id);
        redirect("kategori/s/");
    }

    function hapuskategori($id) {
        $this->kategori_model->deletekategori($id);
        redirect("kategori/s/sewa");
    }

    function ubah($id) {
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $header = "hf/header/header.php";
        $data['kategori'] = $this->kategori_model->jenisArtikel();
        $this->template->set_layout('back_end');
        $this->template->title("Kategori - Super Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->build("home.php", $data);
    }

    function index() {
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $header = "hf/header/header.php";
        $data['kategori'] = $this->kategori_model->jenisArtikel();
        $this->template->set_layout('back_end');
        $this->template->title("Kategori - Super Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->build("home.php", $data);
    }

    function sewa() {
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $header = "hf/header/header.php";
        $data['kategori'] = $this->kategori_model->getKategori();
        $this->template->set_layout('back_end');
        $this->template->title("Kategori - Super Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->build("kategori.php", $data);
    }

    function addKategori() {
        $data['nama'] = $this->input->post('nama');
        $this->kategori_model->addKategori($data);
        redirect("kategori/s/sewa");
    }

}
