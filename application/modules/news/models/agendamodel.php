<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class agendaModel extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getAgenda($limit) {
        $sql = "select artikel.*, menu.menu, DATE_FORMAT(artikel.tanggal,'%d %M %Y') as 'waktu', DATE_FORMAT(artikel.tanggal_buat,'%l, %d %M %Y %k:%i') as 'tanggal_buat', jenis_artikel.jenis_artikel, admin.nama from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) left join menu on (menu.idmenu=jenis_artikel.menu_idmenu) where jenis_artikel_idjenis_artikel=22 order by artikel.tanggal_buat desc limit ?";
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
            $rest['lokasi'] = $i->lokasi;
            $rest['tanggal'] = $i->waktu;
            $rest['gambar'] = $this->getalamat($i->isi);

            array_push($rest2, $rest);
        }
        return $rest2;
    }

    private function getalamat($html) {
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $html, $image);
        if (isset($image) && isset($image['scr'])) {
            return $image['src'];
        } else {
            return "assets/images/imagenotfound.jpg";
        }
    }

}
