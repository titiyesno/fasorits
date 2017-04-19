<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class menu extends CI_model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getjenisartikel(){
        $sql= 'select * from jenis_artikel';
    }
    public function read_gambar_by_idberita($id){
        $this->db->where('ID_BERITA',$id);
        $query = $this->db->get('gambar');
        return $query->result();
    }
}