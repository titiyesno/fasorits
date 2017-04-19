<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    const IMAGE_UPLOAD_DIR = 'gui_modul/berita_gambar';

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('news/artikel_model');
        $this->load->model('news/gambar_model');
        $this->load->model('news/file_artikel_model');
        $this->load->model('company/company_model');
        $this->load->library('form_validation');
        $this->load->helper('dompdf');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->_supported_extensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
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

    private function _move_image($temp_location) {
        $filename = $this->random_string(10) . "." . $this->getextent(basename($temp_location['name']));
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
                'width' => '100%',
                'height' => '400px',
                'filebrowserImageUploadUrl' => base_url("index.php/company/" . $this->session->userdata['logged_in']['privilege'] . "/upload/")));

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

    public function simpanedit() {
        $id = $this->input->post('idartikel');
        $data['judul'] = $this->input->post('judul');
        $data['isi'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('content'));
        $data['jenis_artikel_idjenis_artikel'] = 1;
        $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];
        $idberita = $this->artikel_model->ubah($data, $id);
        redirect("company/s/");
    }

    public function tambah($id) {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['jenis'] = $this->artikel_model->getjenisberita($id);
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("s_tambah.php", $data);
    }

    public function simpantambah() {
        $data['judul'] = $this->input->post('judul');
        $data['isi'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('isi'));
        $data['jenis_artikel_idjenis_artikel'] = $this->input->post('jenis');
        $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];
        $idberita = $this->artikel_model->create_berita($data);
        redirect("company/s/index/" . $idberita);
    }

    public function simpanoraddedit() {
        $id = $this->input->post('id');
        if (!isset($id) || $id == 0) {
            $data['judul'] = $this->input->post('judul');
            $data['vr'] = $this->input->post('vr');
            $data['isi'] = $this->input->post('content');
            $data['jenis_artikel_idjenis_artikel'] = $this->input->post('idjenis_artikel');
            $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];
            $idberita = $this->artikel_model->create_berita($data);
            redirect("company/s/getberita/" . $idberita);
        } else {
            $id = $this->input->post('id');
            $data['judul'] = $this->input->post('judul');
            $data['vr'] = $this->input->post('vr');
            $data['isi'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('content'));
            $data['jenis_artikel_idjenis_artikel'] = $this->input->post('idjenis_artikel');
            $data['admin_idadmin'] = $this->session->userdata['logged_in']['id'];

            $idberita = $this->artikel_model->ubah($data, $id);
            redirect("company/s/getberita/" . $id);
        }
    }

    function index() {
        $resul = $this->company_model->getcompany();
        if (count($resul) == 0)
            redirect('company/s/tambah/1');
        else if (count($resul) == 1)
            redirect('company/s/edit/' . $resul[0]->idartikel);
    }
    function prosedur() {
        $resul = $this->company_model->getProsedur();
        if (count($resul) == 0)
            redirect('company/s/tambah/3');
        else if (count($resul) == 1)
            redirect('company/s/edit/' . $resul[0]->idartikel);
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
        $data['berita'][0]->isi = str_replace("#CodeLinkUpload", base_url(), $data['berita'][0]->isi);
        $data['jenis'] = $this->artikel_model->getjenisberita(1);
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("s_edit.php", $data);
    }

    function member() {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['jenis'] = $this->artikel_model->getjenisberita(7);
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("member.php", $data);
    }

    function subs() {
        $data = $this->company_model->getsubnav();
        if (count($data) != 0) {
            $this->subs_edit();
            return;
        }
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['jenis'] = $this->artikel_model->getjenisberita(1);
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("ps_subsedit.php", $data);
    }

    public function subs_edit() {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );

        $data['berita'] = $this->company_model->getsubnav();
        $data['berita'][0]->isi = str_replace("#CodeLinkUpload", base_url(), $data['berita'][0]->isi);
        $data['idsubnav'] = $data['berita'][0]->idsubnav;
        $data['jenis'] = $this->company_model->getcompanyjenis();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("ps_edit.php", $data);
    }

    public function subs_simpantambah() {
        $data['judul'] = $this->input->post('judul');
        $data['isi'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('isi'));
        $data['jenis_artikel_idjenis_artikel'] = $this->input->post('jenis');
        $idberita = $this->artikel_model->create_data($data, 'subnav');
        redirect("company/s/subs/");
    }

    public function subs_simpanedit() {
        $id = $this->input->post('idsubnav');
        $data['judul'] = $this->input->post('judul');
        $data['isi'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('content'));
        $data['jenis_artikel_idjenis_artikel'] = $this->input->post('jenis');
        $idberita = $this->artikel_model->ubahsub($data, $id);
        redirect("company/s/subs");
    }

}
