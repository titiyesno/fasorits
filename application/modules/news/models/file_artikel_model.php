<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class file_artikel_model extends CI_model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create_file($idberita,$namafile){
        $data = array(
            'ID_BERITA' => $idberita,
            'NAMA_FILE' => $namafile
        );
        $this->db->insert('file_berita', $data);    
    }
    public function read_file_by_idberita($id){
        $this->db->where('ID_BERITA',$id);
        $query = $this->db->get('file_berita');
        return $query->result();
    }
    public function get_last_id() {
        $sql = "select * from file_berita order by file_berita.id_file_berita desc limit 1";
        $result = $this->db->query($sql);
        return $result->result();
    }
}