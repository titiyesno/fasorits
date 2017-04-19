<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class galeri_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_galeri($nama) {

        $data = array(
            'NAMA_GALERI' => $nama
        );
        $this->db->insert('galeri', $data);
        return $this->db->insert_id();
    }

    public function insert_kategori($data) {
        $this->db->insert('galeri', $data);
    }
    function getallgambar(){
        $sql= 'select * from galeri right join gambar on (gambar.galeri_idgaleri=galeri.idgaleri)';
        return $this->query($sql);
    }
    function getkategoriimage(){
        $sql='select DISTINCT galeri.idgaleri, galeri.nama from galeri right join gambar on (gambar.galeri_idgaleri=galeri.idgaleri)';
        return $this->query($sql);
    }

    public function hapus_kategori($id) {
        $this->db->delete('galeri', array('idgaleri' => $id));
    }

    public function ubah_kategori($data, $id) {
        $this->db->where('idgaleri', $id);
        $this->db->update('galeri', $data);
    }

    function getgaleri() {
        $sql = 'select * from galeri';
        return $this->query($sql);
    }

    function getkategori($id) {
        $sql = "select * from galeri where idgaleri=?";
        return $this->query($sql, $id);
    }

    public function read_galeri() {
        $query = $this->db->get('galeri');
        return $query->result();
    }

    public function read_galeri_by_id($id) {
        $this->db->where('idgaleri', $id);
        $query = $this->db->get('galeri');
        return $query->result();
    }

    public function update_galeri($id, $nama) {

        $data = array(
            'nama' => $nama
        );

        $this->db->where('idgaleri', $id);
        $result = $this->db->update('galeri', $data);
        return $result;
    }

    public function delete_galeri($id) {
        $this->db->where('idgaleri', $id);
        $this->db->delete('galeri');
    }

    function getvr() {
        $sql = 'select * from artikel where vr!=NULL';
        return $this->query($sql);
    }

}
