<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class pemesanan_model extends CI_model {

    function __construct() {
        parent::__construct();
    }

    function allevent() {
        $sql = "select concat(pemesanan.tanggal,'T',slot.`start`,':00') as start, concat(pemesanan.tanggal,'T',slot.`end`,':00') as end, jenis_acara.nama as title , jenis_acara.warna as 'borderColor', jenis_acara.warna as 'backgroundColor'
                from 
                pemesanan left join jenis_acara on (jenis_acara.idjenis_acara=pemesanan.keperluan) 
                left join slot on (slot.slot=pemesanan.slot)
                order by slot.`start` DESC
                ";
        //where pemesanan.`status` 
        return $this->query($sql);
    }
    function getAllevent(){
        $sql= "select pemesanan.tanggal,pemesanan.status, slot.`start`, jenis_acara.nama, pemesanan.idpemesanan from  pemesanan left join slot on( pemesanan.slot=slot.slot)  left join jenis_acara on jenis_acara.idjenis_acara=pemesanan.keperluan";
        return $this->query($sql);
    }
    function detil($id){
        $sql = 'select * from detil,item where detil.item_sewa_iditem_sewa=item.iditem_sewa && detil.pemesanan_idpemesanan='.$id;
        return $this->query($sql);
    }
    public function pemesan($id)
    {
        $sql = 'select pemesan.* from pemesanan left join pemesan on (pemesan.idpemesan=pemesanan.pemesan_idpemesan) where pemesanan.idpemesanan='.$id;
        return $this->query($sql);
    }
    public function pemesanan($id)
    {
        $sql = 'select pemesanan.* from pemesanan where pemesanan.idpemesanan='.$id;
        return $this->query($sql);
    }
    public function create_data($data, $tabel) {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function slot($id) {
        $sql = "select * from slot where lapangan=?";
        return $this->query($sql,array($id));
    }
    function olahraga($id) {
        $sql = "select lapangan.id as id, lapangan.nama as lapangan, olahraga.nama as olahraga "
                . " from lapangan left join olahraga on (olahraga.id=lapangan.olahraga) "
                . ""
                . "where lapangan.id=?";
        return $this->query($sql,array($id));
    }
    function disableDate() {
        $sql = "select DATE_FORMAT(pemesanan.tanggal,'%m/%d/%y') as 'date' 
                from pemesanan 
                group by pemesanan.tanggal
                having count(pemesanan.slot)=2";
        return $this->query($sql);
    }
	
	function getStart($id) {
        $sql = "select start 
                from slot 
                where slot.slot='$id'";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function postSubmit($datapost){
		$key =  md5('aku_keren'); //menghasilkan key : 697190fd04cd9394010280a8cbf5ed51

		$data = array(
				'kode'      => $datapost["KODE"],
				'id_unit'   => '105',
				'nrp'       => '',
				'nama'      => $datapost["NAMA"],
				'nominal'   => $datapost["NOMINAL"],
				'expired'   => $datapost["EXPIRED"],
				'AMU-KEY'   =>  $key
		);

		$data_string = json_encode($data);
		var_dump($data_string);

		$curl = curl_init('https://simondits.its.ac.id/api_amu');
		//$curl = curl_init('http://10.199.13.60/simondits/index.php/api_amu');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
		);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //untuk https

		// Send the request
		$result = curl_exec($curl);

		// Free up the resources $curl is using
		curl_close($curl);
	}
	
	function getHarga($data) {
        $sql = "select nominal from harga where id_lapangan ='".$data['idlap']."' and pengguna = '".$data['pengguna']."' and kegiatan = '".$data['kegiatan']."' and hari = '".$data['hari']."' and shift = '".$data['shift']."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
    function kategori(){
        $sql = 'select * from kategori';
        return $this->query($sql);
    }
    public function item($id)
    {
        $sql = 'select * from item where item.kategori_idkategori = '.$id;
        return $this->query($sql);
    }
}