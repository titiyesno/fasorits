<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class gambar_model extends CI_model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_gambar($idberita,$idgaleri,$judul,$alamat,$prioritas){
        $data = array(
            'ID_BERITA' => $idberita,
            'ID_GALERI' => $idgaleri,
            'JUDUL_GAMBAR' => $judul,
            'ALAMAT_GAMBAR' => $alamat,
            'PRIORITAS' => $prioritas
        );
        $this->db->insert('gambar', $data);    
    }
    
    public function read_gambar_by_idberita($id){
        $this->db->where('ID_BERITA',$id);
        $query = $this->db->get('gambar');
        return $query->result();
    }
    
}