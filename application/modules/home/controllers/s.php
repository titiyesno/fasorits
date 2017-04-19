<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    const IMAGE_UPLOAD_DIR = 'gui_modul/berita_gambar';

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
//        $this->load->model('berita/artikel_model');
//        $this->load->model('berita/gambar_model');
//        $this->load->model('berita/file_artikel_model');
        $this->load->library('form_validation');
        $this->load->helper('dompdf');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->_supported_extensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
    }
    function delete($id){
        $this->artikel_model->delete($id);
        redirect('berita/super/daftar');
    }
    function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    function getextent($name) {
        $ext = end((explode(".", $name)));
        return $ext;
    }
    public function editprofil($id){
		$data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";

        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['berita'] = $this->artikel_model->getberitafromjenis($id);
        $data['jenis'] = $this->artikel_model->getAlljenisberita();
        $data['id'] = $id;
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("edit_profil_layanan.php", $data);
	}
    private function _move_image($temp_location) {
        $filename = $this->random_string(10)."." . $this->getextent(basename($temp_location['name']));
        print_r($filename);
        $info = pathinfo($filename);
        $ext = strtolower($info['extension']);

        if (isset($temp_location['tmp_name']) &&
                isset($info['extension']) &&
                in_array($ext, $this->_supported_extensions)) {
            $new_file_path = self::IMAGE_UPLOAD_DIR . '/' . $filename;
            if (!is_dir(self::IMAGE_UPLOAD_DIR) ||
                    !is_writable(self::IMAGE_UPLOAD_DIR)) {
                // Attempt to auto-create upload directory.
                if (!is_writable(self::IMAGE_UPLOAD_DIR) ||
                        FALSE === @mkdir(base_url() . self::IMAGE_UPLOAD_DIR, null, TRUE)) {
                    throw new Exception('Error: File permission issue, ' .
                    'please consult your system administrator');
                }
            }

            if (move_uploaded_file($temp_location['tmp_name'], $new_file_path)) {
                return base_url() . $new_file_path;
            }
        }

        throw new Exception('File could not be uploaded.');
    }

    private function _setup_ckeditor($id) {
        $this->load->helper('url');
        $this->load->helper('ckeditor');
        $ckeditor = array(
            'id' => $id,
            'path' => 'gui_modul/ckeditor',
            'config' => array(
                'toolbar' => 'Full',
                'width' => '960px',
                'height' => '400px',
                'filebrowserImageUploadUrl' => base_url("index.php/berita/" . $this->session->userdata['logged_in']['privilege'] . "/upload/")));

        return $ckeditor;
    }

    public function upload() {
        $callback = 'null';
        $url = '';
        $get = array();
        $qry = $_SERVER['REQUEST_URI'];
        parse_str(substr($qry, strpos($qry, '?') + 1), $get);

        if (!isset($_POST) || !isset($get['CKEditorFuncNum'])) {
            $msg = 'CKEditor instance not defined. Cannot upload image.';
        } else {
            $callback = $get['CKEditorFuncNum'];

            try {
                $url = $this->_move_image($_FILES['upload']);
                $msg = "File uploaded successfully to: {$url}";

                // Persist additions to file manager CMS here.
            } catch (Exception $e) {
                $url = '';
                $msg = $e->getMessage();
            }
        }
        $output = '<html><body><script type="text/javascript">' .
                'window.parent.CKEDITOR.tools.callFunction(' .
                $callback .
                ', "' .
                $url .
                '", "' .
                $msg .
                '");</script></body></html>';

        echo $output;
    }

    public function publish($id, $status) {
        if ($status == 0) {
            $this->artikel_model->status($id, 0);
        } else if ($status == 1) {
            $this->artikel_model->status($id, 1);
        }
        redirect("berita/super/daftar");
    }

    private function config() {
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = 'prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        return $config;
    }
    public function daftar(){
        $data['listberita'] = $this->artikel_model->getallberita();
        $menu = "hf/menu/menu_pengelola.php";
            $subnav = "subnav.php";
            $footer = "hf/footer/footer.php";
            $this->template->set_layout('back_end');
            $this->template->title("Home Admin");
            $this->template->set_partial("menu", $menu);
            $this->template->set_partial("footer", $footer);
            $this->template->build("lihatberita.php", $data);
    }
    private function _daftar($page = 0) {
        $config = $this->config();
        $config['base_url'] = base_url() . "index.php/berita/super/daftar";
        $config['total_rows'] = $this->db->get('artikel')->num_rows();
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config['uri_segment'] = 4;
        $data['listberita'] = $this->artikel_model->getall($page, $page + $config['per_page']);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data['recent'] = $this->artikel_model->getrecent(5);
        try {

            $data['halaman'] = $this->pagination->create_links();
            $menu = "hf/menu/menu_pengelola.php";
            $subnav = "subnav.php";
            $footer = "hf/footer/footer.php";
            $this->template->set_layout('back_end');
            $this->template->title("Home Admin");
            $this->template->set_partial("menu", $menu);
            $this->template->set_partial("footer", $footer);
            $this->template->build("lihatberita.php", $data);
        } catch (Exception $err) {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
    }

    public function index() {
        redirect('contact/s/');
       // $data['data_berita_all'] = $this->artikel_model->read_all_berita();
        //$data['data_jenis_all'] = $this->artikel_model->read_all_jenis();
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("blank.php");
    }
    public function simpanedit(){
        $id = $this->input->post('id');
        $data['judul'] = $this->input->post('judul');
        $data['vr'] = $this->input->post('vr');
        $data['isi'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('content'));
        $data['jenis_artikel_idjenis_artikel'] = $this->input->post('jenis');
        $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];
		
        $idberita = $this->artikel_model->ubah($data,$id);
        redirect("berita/super/getberita/" . $id);
    }

    public function tambah() {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";

        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['jenis'] = $this->artikel_model->getAlljenisberita();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("sTambahBerita.php", $data);
    }

    public function simpantambah() {
        $data['judul'] = $this->input->post('judul');
        $data['vr'] = $this->input->post('vr');
        $data['isi'] = $this->input->post('content');
        $data['jenis_artikel_idjenis_artikel'] = $this->input->post('jenis');
        $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];
        $idberita = $this->artikel_model->create_berita($data);
        redirect("berita/super/getberita/" . $idberita);
    }

    public function getberita($idberita = "") {
        $data["berita"] = $this->artikel_model->getberitabyid($idberita);
        $data["recent"] = $this->artikel_model->getrecent(5);
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("view_single_berita.php", $data);
    }

    public function simpanoraddedit(){
	$id = $this->input->post('id');
       if(!isset($id) || $id==0){
        $data['judul'] = $this->input->post('judul');
        $data['vr'] = $this->input->post('vr');
        $data['isi'] = $this->input->post('content');
        $data['jenis_artikel_idjenis_artikel'] = $this->input->post('idjenis_artikel');
        $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];
        $idberita = $this->artikel_model->create_berita($data);
        redirect("berita/super/getberita/" . $idberita);
       }
	else {
	    $id = $this->input->post('id');
        $data['judul'] = $this->input->post('judul');
        $data['vr'] = $this->input->post('vr');
        $data['isi'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('content'));
        $data['jenis_artikel_idjenis_artikel'] = $this->input->post('idjenis_artikel');
        $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];
		
        $idberita = $this->artikel_model->ubah($data,$id);
        redirect("berita/super/getberita/" . $id);
	}
    }
    public function edit($id) { 
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";

        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['id'] = $id;
        $data['berita'] = $this->artikel_model->getberitabyid($id);
        $data['berita'][0]->isi =   str_replace("#CodeLinkUpload",base_url(),      $data['berita'][0]->isi);
        $data['jenis'] = $this->artikel_model->getAlljenisberita();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("edit.php", $data);
    }

    public function pencarian() {
        $data['data_berita_all'] = $this->artikel_model->read_all_berita();
        $data['data_jenis_all'] = $this->artikel_model->read_all_jenis();
        $this->load->view('header');
        $this->load->view('pencarian', $data);
    }
    //-------------------------------------------------------------
    function agenda_add(){
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";

        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['jenis'] = $this->artikel_model->getAlljenisberita();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("sAddAgenda.php", $data);
    }
    function agendalist(){

$data['listberita'] = $this->artikel_model->getallagenda();
        $menu = "hf/menu/menu_pengelola.php";
            $subnav = "subnav.php";
            $footer = "hf/footer/footer.php";
            $this->template->set_layout('back_end');
            $this->template->title("Home Admin");
            $this->template->set_partial("menu", $menu);
            $this->template->set_partial("footer", $footer);
            $this->template->build("lihatberita.php", $data);
    }
}

?>