<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class u extends MX_Controller {

    private $brosur = "brosur";
    private $prosedur = "prosedur";

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper(array('ckeditor'));
        $this->load->model('kategori/kategori_model');
        $this->load->model('galeri/galeri_model');
        $this->load->model('news/artikel_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('paginationlib');
    }

    function kontak() {

        $data["recent"] = $this->artikel_model->getrecent(5);
        $data['menu'] = $this->kategori_model->getmenu();
        $data['jenis'] = $this->kategori_model->getkategori();
        $menu = "hf/menu/menu_umum.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("page/contact.php", $data);
    }

    private function getalamat($html) {
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $html, $image);
        return $image['src'];
    }

    public function index() {
        $data['gambar'] = $this->galeri_model->getallgambar();
        $data['kategori'] = $this->galeri_model->getkategoriimage();
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("Galeri fasor ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("galeri.php", $data);
    }

    public function vtour() {
        $data['artikel'] = $this->artikel_model->getartikel(3);
        $data['jenis'] = $this->kategori_model->getkategori();
        $data['menu'] = $this->kategori_model->getmenu();
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("Galeri RSUD Ngajuk");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("vr.php", $data);
    }

}
