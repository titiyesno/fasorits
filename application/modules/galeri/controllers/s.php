<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('galeri/galeri_model');
        $this->load->library('form_validation');
        $this->load->library('image_CRUD');
    }

    public function upload() {
        if (isset($_FILES['upload']['name'])) {
            // total files //
            $count = count($_FILES['upload']['name']);
            // all uploads //
            $uploads = $_FILES['upload'];

            for ($i = 0; $i < $count; $i++) {
                if ($uploads['error'][$i] == 0) {
                    move_uploaded_file($uploads['tmp_name'][$i], 'storage/' . $uploads['name'][$i]);
                    echo $uploads['name'][$i] . "\n";
                }
            }
        }
    }

    public function upload_foto() {
        $image_crud = new image_CRUD();
        $image_crud->set_primary_key_field('idgambar');
        $image_crud->set_url_field('alamat');
        $image_crud->set_title_field('judul');
        $image_crud->set_table('gambar')
                ->set_relation_field('galeri_idgaleri')
                ->set_ordering_field('prioritas')
                ->set_image_path('gui_modul/galeri/');
        $image_crud->set_idgaleri('idgaleri');
        $output = $image_crud->render();
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Galeri");
        $this->template->set_partial("menu", $menu);
//        $this->template->set_partial("subnav", $subnav,$data);
        $this->template->set_partial("footer", $footer);
        $this->template->build("co.php", $output);
    }

    function kategori_add() {
        $data['nama'] = $this->input->post('nama');
        $this->galeri_model->insert_kategori($data);
        redirect('galeri/s/index');
    }

    public function ubah_kategori($id) {
        $data['nama'] = $this->galeri_model->getkategori($id);
        $data['galeri'] = $this->galeri_model->getgaleri();
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Galeri");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("ubah.php", $data);
    }

    function ubah() {
        $data['nama'] = $this->input->post('nama');
        $id = $this->input->post('id');
        $this->galeri_model->ubah_kategori($data, $id);
        redirect('galeri/s/index');
    }
    function hapus_kategori($id) {
        $this->galeri_model->hapus_kategori($id);
        redirect('galeri/s/index');
    }
    public function index($id=null) {
        $image_crud = new image_CRUD();
        $image_crud->set_primary_key_field('idgambar');
        $image_crud->set_url_field('alamat');
        $image_crud->set_title_field('judul');
        $image_crud->set_table('gambar')
                ->set_relation_field('galeri_idgaleri')
                ->set_ordering_field('prioritas')
                ->set_image_path('gui_modul/galeri/');
        $image_crud->set_idgaleri('idgaleri');
        $output = $image_crud->render();
        $data['galeri'] = $this->galeri_model->getgaleri();
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Galeri");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer,$output);
        $this->template->build("kategori.php", $data);
    }

    function organize_foto_galeri($idgaleri = "", $idgedung = "") {
        $data['datagaleri'] = $this->galeri_model->read_galeri_by_id($idgaleri);
        $data['idgedung'] = $idgedung;
        $image_crud = new image_CRUD();
        $image_crud->set_primary_key_field('idgambar');
        $image_crud->set_url_field('alamat');
        $image_crud->set_title_field('judul');
        $image_crud->set_table('gambar')
                ->set_relation_field('galeri_idgaleri')
                ->set_ordering_field('prioritas')
                ->set_image_path('assets/uploads');
        $image_crud->set_idgaleri('idgaleri');
        $output = $image_crud->render();

        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
//        $this->template->set_partial("subnav", $subnav);
        $this->template->set_partial("footer", $footer, $data);
        $this->template->build("viewalbum.php", $output);
    }

    function organize_foto_galeri_jeniskamar($idgaleri = "", $idjeniskamar = "") {
        $data['datagaleri'] = $this->galeri_model->read_galeri_by_id($idgaleri);
        $data['datajeniskamar'] = $this->jeniskamar_model->read_jeniskamar_by_id($idjeniskamar);
        $image_crud = new image_CRUD();
        $image_crud->set_primary_key_field('idgambar');
        $image_crud->set_url_field('alamat');
        $image_crud->set_title_field('judul');
        $image_crud->set_table('gambar')
                ->set_relation_field('galeri_idgaleri')
                ->set_ordering_field('prioritas')
                ->set_image_path('assets/uploads');
        $image_crud->set_idgaleri('idgaleri');
        $output = $image_crud->render();
        echo $image_crud->image_path;
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("subnav", $subnav, $data);
        $this->template->set_partial("footer", $footer);
        $this->template->build("viewalbum_tambah_jeniskamar.php", $output);
    }

    function lihat_galeri($id = "") {
        $data['datagaleri'] = $this->galeri_model->read_galeri_by_id($id);
        $image_crud = new image_CRUD();
        $image_crud->unset_upload();
        $image_crud->unset_delete();

        $image_crud->set_primary_key_field('idgambar');
        $image_crud->set_url_field('alamat');
        $image_crud->set_table('gambar')
                ->set_relation_field('galeri_idgaleri')
                ->set_ordering_field('prioritas')
                ->set_image_path('assets/uploads');
        $output = $image_crud->render();
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("subnav", $subnav, $data);
        $this->template->set_partial("footer", $footer);
        $this->template->build("viewalbum.php", $output);
    }

}

?>
