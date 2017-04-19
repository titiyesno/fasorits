<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class artikel_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getartikelbyjenis($id) {
        $sql = "select artikel.*, menu.menu, DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y') as 'tanggal_buat', jenis_artikel.jenis_artikel, admin.nama from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel) "
                . "    left join admin on (artikel.admin_idadmin = admin.idadmin) left join menu on (menu.idmenu=jenis_artikel.menu_idmenu) where jenis_artikel_idjenis_artikel=? order by artikel.tanggal_buat desc";
        return $this->fetch($this->query($sql, $id));
    }

    function delete($id) {
        $this->db->delete('artikel', array('idartikel' => $id));
    }

    public function create_berita($data) {
        $this->db->insert('artikel', $data);
        return $this->db->insert_id();
    }

    public function create_data($data, $tabel) {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    private function getalamat($html) {
        $image['src'] = "";
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $html, $image);
        if (isset($image["src"]))
            return $image['src'];
        else
            return "";
    }

    function getartikel($limit=0) {
        $sql = "select artikel.*,  DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y') as 'tanggal_buat', jenis_artikel.nama 
from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
where jenis_artikel_idjenis_artikel=2 order by artikel.tanggal_buat desc limit ?";
        return $this->fetch($this->query($sql, $limit));
    }

    private function fetch($data) {
        $rest2 = array();

        foreach ($data as $i) {
            $rest = array();
            $rest['isi'] = $i->isi;
            $rest['judul'] = $i->judul;
            $rest['idartikel'] = $i->idartikel;
            $rest['tanggal_buat'] = $i->tanggal_buat;
            $rest['gambar'] = str_replace("#CodeLinkUpload", base_url(), $this->getalamat($i->isi));
            array_push($rest2, $rest);
        }
        return $rest2;
    }
     function totalArtikel(){
      return $this->db->count_all_results('artikel');
     }
    private function fetchSinge($data) {
        $rest2 = array();
        foreach ($data as $i) {
            $rest = array();
            $y = str_replace("#CodeLinkUpload", base_url(), $i->isi);
            $rest['isi'] = $y;
            $rest['judul'] = $i->judul;
            $rest['nama'] = $i->nama;
            $rest['jenis_artikel_idjenis_artikel'] = $i->jenis_artikel_idjenis_artikel;
            $rest['idartikel'] = $i->idartikel;
            $rest['tanggal_buat'] = $i->tanggal_buat;
            $rest['vr'] = $i->vr;
            $rest['menu'] = $i->menu;
            $rest['jenis_artikel'] = $i->jenis_artikel;
            array_push($rest2, $rest);
        }
        return $rest2;
    }

    public function countberita() {
        $sql = 'select count(artikel.idartikel) as "count" from artikel where artikel.`status`=1';
        $rest = $this->query($sql);
        return $rest[0]->count;
    }

    public function getberitafromjenis($idjenis) {
        $sql = "select artikel.*, menu.menu, DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y') as 'tanggal_buat', jenis_artikel.jenis_artikel, admin.nama from artikel right join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) left join menu on (menu.idmenu=jenis_artikel.menu_idmenu) where jenis_artikel.idjenis_artikel=?";
        return $this->query($sql, $idjenis);
    }
    function getJenisFromArtikelID($id) {
        $sql = "select * from jenis_artikel left join artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel) and artikel.idartikel=?";
        return $this->fetch($this->query($sql, $id));
    }
    public function getberitabyid($id) {
        $sql = "select artikel.*,  DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y') as 'tanggal_buat', 
                jenis_artikel.nama, admin.nama 
                from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) 
                where artikel.idartikel=?";
        return $this->query($sql, $id);
    }

    public function getrecent($limit) {
        $sql = "select artikel.*, DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y') as 'tanggal_buat', jenis_artikel.nama, admin.nama from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) where artikel.jenis_artikel_idjenis_artikel=2 order by artikel.tanggal_buat desc limit ?";
        return $this->query($sql, $limit);
    }

    public function ubah($data, $id) {
        $this->db->where('idartikel', $id);
        $this->db->update('artikel', $data);
    }

    public function ubahsub($data, $id) {
        $this->db->where('idsubnav', $id);
        $this->db->update('subnav', $data);
    }

    public function getall($a, $b) {
        $sql = "select artikel.*, menu.menu, concat(dayname(artikel.tanggal_buat),', ',DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y')) as 'tanggal_buat', jenis_artikel.jenis_artikel, admin.nama from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) left join menu on (menu.idmenu=jenis_artikel.menu_idmenu) order by artikel.tanggal_buat desc limit $a, ?";
        return $this->query($sql, array($b));
    }

    function status($id, $status) {
        $data = array(
            'status' => $status
        );

        $this->db->where('idartikel', $id);
        $this->db->update('artikel', $data);
    }

    function getArtikelFromJenisID($id) {
        $sql = "select * from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
where artikel.jenis_artikel_idjenis_artikel=?";
        return $this->query($sql, $id);
    }

    function getjenisberita($id) {
        $sql = 'select * from jenis_artikel where idjenis_artikel=?';
        return $this->query($sql, array($id));
    }

    //ini dipake
    function getAlljenisberita() {
        $sql = 'select * from jenis_artikel';
        return $this->query($sql);
    }

    function test() {
        $sql = 'select * from jenis_artikel where idjenis_artikel=?';
        return $this->query($sql);
    }

    function getnewsberita($limit=0, $offset=0) {
        $offset+=0;
        $limit+=0;
        $sql = "select artikel.idartikel, artikel.judul, artikel.isi,  concat(dayname(artikel.tanggal_buat),', ',DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y')) as 'tanggal_buat', jenis_artikel.nama as 'jenis_artikel', admin.nama from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) where jenis_artikel.idjenis_artikel=2
                order by artikel.tanggal_buat desc limit ? offset ?";
        return $this->query($sql,array($limit, $offset));
    }

    function getberita($id) {
        $sql = "select artikel.*, menu.menu, DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y') as 'tanggal_buat', jenis_artikel.jenis_artikel, admin.nama from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) left join menu on (menu.idmenu=jenis_artikel.menu_idmenu) where artikel.idartikel=?";
        return $this->fetchSinge($this->query($sql, array($id)));
    }

}
