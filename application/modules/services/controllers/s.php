<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    const IMAGE_UPLOAD_DIR = 'gui_modul/berita_gambar';

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

        $this->load->model('news/gambar_model');
        $this->load->model('news/artikel_model');
        $this->load->model('news/file_artikel_model');
        $this->load->model('services/services_model');
        $this->load->library('form_validation');
        $this->load->helper('dompdf');
        $this->load->helper('mem');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->_supported_extensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
    }

    function getolahraga() {
        $temp1 = $this->services_model->getlapangan();
        $data ["pengaduan"] = $this->getPivot($temp1);
        return $data ["pengaduan"];
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
                'width' => '960px',
                'height' => '400px',
                'filebrowserImageUploadUrl' => base_url("index.php/news/" . $this->session->userdata['logged_in']['privilege'] . "/upload/")));

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

    function delete($id) {
        $this->services_model->hapus($id);
        redirect("services/s/");
    }

    public function tambah() {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data = array(
            'ckeditor' => $this->_setup_ckeditor('content'),
            'content_html' => ''
        );
        $data['jenis'] = $this->services_model->getkategori();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("s_tambah.php", $data);
    }

    public function simpantambah() {
        $data['nama'] = $this->input->post('nama');
        $data['keterangan'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('keterangan'));
        $data['kategori_idkategori'] = $this->input->post('kategori_idkategori');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $data['harga'] = $this->input->post('harga');
        $data['satuan'] = $this->input->post('satuan');
        $idberita = $this->services_model->add($data);
        redirect("services/s/edit/" . $idberita);
    }

    public function index() {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data['item'] = $this->services_model->getallitem();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("s_daftar.php", $data);
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
        $data['iditem_sewa'] = $id;
        $data['item'] = $this->services_model->getItem($id);
        if (isset($data['item'][0]->keterangan)) {
            $data['item'][0]->keterangan = str_replace("#CodeLinkUpload", base_url(), $data['item'][0]->keterangan);
        }
        $data['jenis'] = $this->services_model->getkategori();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("s_edit.php", $data);
    }

    public function simpanedit() {
        $id = $this->input->post('iditem_sewa');
        $data['nama'] = $this->input->post('nama');
        $data['keterangan'] = str_replace(base_url(), "#CodeLinkUpload", $this->input->post('keterangan'));
        $data['kategori_idkategori'] = $this->input->post('kategori_idkategori');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $data['harga'] = $this->input->post('harga');
        $data['satuan'] = $this->input->post('satuan');
        $idberita = $this->services_model->edit($data, $id);
        redirect("services/s/edit/" . $id);
    }

    public function allitem() {
        $temp1 = $this->services_model->getallitem();
        $data ["pengaduan"] = $this->getPivot($temp1);
        return $data ["pengaduan"];
    }

    public function olahraga() {
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data['item'] = $this->services_model->getOlahraga();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("olahraga.php", $data);
    }

    function ubaholahraga() {
        
    }

    function addolahraga() {
        $data['nama'] = $this->input->post('nama');
        $this->db->insert('olahraga', $data);
        $this->olahraga();
    }
    function adlapangan(){
        $data['nama'] = $this->input->post('nama');
        $data['olahraga'] = $this->input->post('olahraga');
        $this->db->insert('lapangan', $data);
        $this->lapangan();
    }

    public function lapangan() {
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data['item'] = $this->services_model->getOlahraga();
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("lapangan.php", $data);
    }
    public function slot($id){
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $data['item'] = $this->services_model->slot($id);
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("slot.php", $data);
    }

    private function getPivot($data) {
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-type: application/json');
        $header = "[[";
        foreach ($data as $value) {
            foreach ($value as $key => $sembarang) {
                if ($key == "ID") {
                    $key = "ACTION";
                }
                $header .= '"' . str_replace("_", " ", strtoupper($key)) . '"';

                break;
            }
            $count = 1;
            foreach ($value as $key => $sembarang) {
                if ($count > 1) {
                    if ($key == "ID") {
                        $key = "ACTION";
                    }
                    $header .= ',"' . str_replace("_", " ", strtoupper($key)) . '"';
                }
                $count ++;
            }
            $header .= "]";
            break;
        }

        foreach ($data as $value) {
            $header .= ",[";
            foreach ($value as $key => $data) {

                if ($key == "action") {
                    $header .= '"<a href=\'' . base_url() . 'index.php/services/s/slot/' . $data . '\'>Lihat Slot Jadwal</a>"';
                } else {
                    $header .= '"' . $data . '"';
                }
                break;
            }
            $count = 1;
            foreach ($value as $key => $data) {

                if ($count > 1) {
                    if ($key == "action") {
                        $header .= $key . ',"<a href=\'' . base_url() . 'index.php/services/s/slot/' . $data . '\'>Lihat Slot Jadwal</a>"';
                    } else {
                        $header .= ',"' . $data . '"';
                    }
                }
                $count ++;
            }
            $header .= "]";
        }
        $header .= "]";
        echo $header;
    }

}
