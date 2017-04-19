<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri extends MX_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('image_CRUD');
        $this->load->model('berita/artikel_model');
        $this->load->model('galeri/galeri_model');
                    //tes
    }
    
    function index()
    {
            $data['databerita'] = $this->artikel_model->read_all_berita();
            $data['datagaleri'] = $this->galeri_model->read_galeri();
            $this->load->view('gambar',$data);
    }
    
    function viewalbum($output=null)
    {
        
        $this->load->view('viewalbum',$output);
    }

    function organize_foto_berita()
    {
            $idberita = $this->input->post('idberita');
            $image_crud = new image_CRUD();
//            $image_crud->set_primary_key_field('id');
//            $image_crud->set_url_field('url');
//            $image_crud->set_title_field('title');
//            $image_crud->set_table('example_4')
//            ->set_ordering_field('priority')
//            ->set_image_path('assets/uploads');
            $image_crud->set_primary_key_field('ID_GAMBAR');
            $image_crud->set_url_field('ALAMAT_GAMBAR');
            $image_crud->set_title_field('JUDUL_GAMBAR');
            $image_crud->set_table('gambar')
            ->set_relation_field('ID_BERITA')
            ->set_ordering_field('PRIORITAS')
            ->set_image_path('assets/uploads');
            $image_crud->set_idberita('ID_BERITA');

            $output = $image_crud->render();
            $this->viewalbum($output);
    }
    
    function organize_foto_galeri()
    {
            $idgaleri = $this->input->post('idgaleri');
            $image_crud = new image_CRUD();
//            $image_crud->set_primary_key_field('id');
//            $image_crud->set_url_field('url');
//            $image_crud->set_title_field('title');
//            $image_crud->set_table('example_4')
//            ->set_ordering_field('priority')
//            ->set_image_path('assets/uploads');
            $image_crud->set_primary_key_field('ID_GAMBAR');
            $image_crud->set_url_field('ALAMAT_GAMBAR');
            $image_crud->set_title_field('JUDUL_GAMBAR');
            $image_crud->set_table('gambar')
            ->set_relation_field('ID_GALERI')
            ->set_ordering_field('PRIORITAS')
            ->set_image_path('assets/uploads');
            $image_crud->set_idgaleri('ID_GALERI');
            $output = $image_crud->render();
            $this->viewalbum($output);
    }
    
    function lihat_galeri()
    {
            $idgaleri = $this->input->post('idgaleri');
            $image_crud = new image_CRUD();
//            $image_crud->set_primary_key_field('id');
//            $image_crud->set_url_field('url');
//            $image_crud->set_title_field('title');
//            $image_crud->set_table('example_4')
//            ->set_ordering_field('priority')
//            ->set_image_path('assets/uploads');
            $image_crud->unset_upload();
            $image_crud->unset_delete();

            $image_crud->set_primary_key_field('ID_GAMBAR');
            $image_crud->set_url_field('ALAMAT_GAMBAR');
            $image_crud->set_table('gambar')
            ->set_relation_field('ID_GALERI')
            ->set_ordering_field('PRIORITAS')
            ->set_image_path('assets/uploads');

            $output = $image_crud->render();

//            $this->_example_output($output);
//            
//            $image_crud->set_primary_key_field('ID_GAMBAR');
//            $image_crud->set_url_field('ALAMAT_GAMBAR');
//            $image_crud->set_title_field('JUDUL_GAMBAR');
//            $image_crud->set_table('gambar')
//            ->set_relation_field('ID_GALERI')
//            ->set_ordering_field('PRIORITAS')
//            ->set_image_path('assets/uploads');
//            $image_crud->set_idgaleri('ID_GALERI');
//
//            $output = $image_crud->render();
            $this->viewalbum($output);
    }
    
    public function listgaleri()
    {
        $data["list_galeri"]=$this->galeri_model->read_galeri();
        $this->load->view('daftargaleri',$data);
    }
    
    public function listgaleri_ajax()
    {
        $list_kamar = $this->galeri_model->read_galeri();
        $a=1;
        echo "<option value=\"0\" >Pilih Galeri</option>";
            foreach ($list_kamar as $r){
                echo "<option value=\"$r->ID_GALERI\" >$r->NAMA_GALERI</option>";
            }
//        $htmlres = '';
//        foreach ($list_kamar as $r) 
//          { 
//            $htmlres .= 
//                "
//                    <option value=\"$r->ID_GALERI\" >$r->NAMA_GALERI</option>
//                ";
//            $a++;
//          } 
//          echo $htmlres;
    }
   
    public function tambah()
    {
        $nama = $this->input->post('nama');
        $data['data_galeri']=array(
                'nama' => $nama
        );
        $this->galeri_model->create_galeri($nama);
        redirect("galeri");
    }
    
    public function hapus($idgaleri="")
    {
        //$idberita = $this->input->post('idberita');
        $this->galeri_model->delete_galeri($idgaleri);
        redirect("galeri");
    }
    
}

?>
