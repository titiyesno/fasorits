<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class kategori_model extends CI_model {

    function __construct() {
        parent::__construct();
    }
	function jenisArtikel(){
		$sql="select * from jenis_artikel";
		return $this->query($sql);
	}
    function getJenisArtikel($id) {
        $sql = "select * from jenis_artikel where jenis_artikel.menu_idmenu=?";
        return $this->query($sql,$id);
    }

    function add($data) {
        $this->db->insert('jenis_artikel', $data);
    }
    function delete($id){
        $this->db->delete('jenis_artikel',array('idjenis_artikel'=>$id));
    }
    function deletekategori($id){
        $this->db->delete('kategori',array('idkategori'=>$id));
    }
    function getKategori(){
        $sql = "select * from kategori";
        return $this->query($sql);
    }
    function getKategoriByID($id){
        $sql = "select * from kategori where idkategori=?";
        return $this->query($sql,$id);
    }
    function addKategori($data) {
        $this->db->insert('kategori', $data);
    }

}
