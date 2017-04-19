<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class services_model extends CI_model {

    function __construct() {
        parent::__construct();
    }

    function getkategori() {
        $sql = "select * from kategori";
        return $this->query($sql);
    }

    function getItem($id) {
        $sql = "select * from item_sewa where iditem_sewa=?";
        return $this->query($sql, $id);
    }

    function add($data) {
        $this->db->insert('item_sewa', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function edit($data, $id) {
        $this->db->where('iditem_sewa', $id);
        $this->db->update('item_sewa', $data);
    }

    public function getallitem() {
        $sql = 'select item_sewa.iditem_sewa as "action", item_sewa.nama, item_sewa.deskripsi, item_sewa.harga, kategori.nama as "kategori" from item_sewa left join kategori on (kategori.idkategori=item_sewa.kategori_idkategori)';
        return $this->query($sql);
    }

    function hapus($id) {
        $this->db->delete('item_sewa', array('iditem_sewa' => $id));
    }
    function getOlahraga(){
        $sql = 'select * from olahraga';
        return $this->query($sql);
    }
    function  getlapangan(){
        $sql = "select lapangan.id as action, lapangan.nama as nama_lapangan, olahraga.nama as olahraga from lapangan left join olahraga on (lapangan.olahraga=olahraga.id)";
        return $this->query($sql);
    }
    function slot($id){
        $sql='select * from slot where slot.lapangan=?';
        return $this->query($sql,$id);
    }
}
