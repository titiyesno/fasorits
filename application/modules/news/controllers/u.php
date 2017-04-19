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
        $this->template->title("fasor ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("page/contact.php", $data);
    }

    public function jenisartikel($id = null) {
        $data['artikel'] = $this->artikel_model->getartikelbyjenis($id);
        $data['jenis'] = $this->kategori_model->getkategori();
        $data['menu'] = $this->kategori_model->getmenu();
        $subnavdata['jenis_artikel'] = $this->kategori_model->getJenisArtikel(3);
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $subnav = "hf/subnav/subnav_berita.php";
        $this->template->set_layout('fe_2');
        $this->template->title("fasor ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("subnav", $subnav, $subnavdata);
        $this->template->set_partial("footer", $footer);
        $this->template->build("berita.php", $data);
    }

    private function getalamat($html) {
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $html, $image);
        return $image['src'];
    }

    public function main($id = null) {
        $data['artikel'] = $this->artikel_model->getartikel(10);
        $data['jenis'] = $this->kategori_model->getkategori();
        $data['menu'] = $this->kategori_model->getmenu();
        $subnavdata['jenis_artikel'] = $this->kategori_model->getJenisArtikel(3);
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $subnav = "hf/subnav/subnav_berita.php";
        $this->template->set_layout('fe_2');
        $this->template->title("fasor ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("subnav", $subnav, $subnavdata);
        $this->template->set_partial("footer", $footer);
        $this->template->build("berita.php", $data);
    }

    public function index($index=5) {
        $data['artikel'] = $this->artikel_model->getnewsberita($index,$this->uri->segment(4));
        $data['recent'] = $this->artikel_model->getartikel(5);
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $config['total_rows'] = $this->artikel_model->totalArtikel();
  
          $config['base_url'] = base_url()."index.php/news/u/index/";
          $config['per_page'] = 5;
          $config['uri_segment'] = '4';
        
          $config['full_tag_open'] = '<ul class="pagination">';
          $config['full_tag_close'] = '</ul>';
        
          $config['first_link'] = '� First';
          $config['first_tag_open'] = '<li class="prev page">';
          $config['first_tag_close'] = '</li>';
        
          $config['last_link'] = 'Last �';
          $config['last_tag_open'] = '<li class="next page">';
          $config['last_tag_close'] = '</li>';
        
          $config['next_link'] = 'Next';
          $config['next_tag_open'] = '<li class="next page">';
          $config['next_tag_close'] = '</li>';
        
          $config['prev_link'] = 'Previous';
          $config['prev_tag_open'] = '<li class="prev page">';
          $config['prev_tag_close'] = '</li>';
        
          $config['cur_tag_open'] = '<li class="active"><a href="">';
          $config['cur_tag_close'] = '</a></li>';
        
          $config['num_tag_open'] = '<li>';
          $config['num_tag_close'] = '</li>';
        
        
          $this->pagination->initialize($config);
          
        $this->template->set_layout('fe');
        $this->template->title("fasor ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_home.php", $data);
    }

    public function getberita($idberita = "") {
        $data["yidic"] = $this->artikel_model->getberitabyid($idberita);
        $data["recent"] = $this->artikel_model->getartikel(5);
        $menu = "hf/menu/menu_umum.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_viewsingle.php", $data);
    }

    public function jenis($idberita = "") {
        $data['berita'] = $this->artikel_model->getberitajenis($idberita);
        $data['artikel'] = $this->artikel_model->getartikel(3);
        //$data["berita"] = $this->artikel_model->getberitabyid($idberita);
        $data["recent"] = $this->artikel_model->getrecent(5);
        $data['menu'] = $this->kategori_model->getmenu();
        $data['jenis'] = $this->kategori_model->getkategori();
//$data["berita"] = $this->artikel_model->getberitabyid($idberita);
        $data["recent"] = $this->artikel_model->getrecent(5);

        $menu = "hf/menu/menu_umum.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_jenis", $data);

        //$this->template->build("view_single_berita.php", $data);
    }

}
