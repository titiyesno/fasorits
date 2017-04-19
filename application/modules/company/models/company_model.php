<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class company_model extends CI_model {

    function __construct() {
        parent::__construct();
    }

    function getcompany() {
        $sql = "select artikel.idartikel, artikel.judul, artikel.isi,  concat(dayname(artikel.tanggal_buat),', ',DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y')) as 'tanggal_buat', jenis_artikel.nama as 'jenis_artikel', admin.nama 
                from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) where jenis_artikel.idjenis_artikel=1
		order by artikel.tanggal_buat desc ";
        return $this->query($sql);
    }
    function getProsedur() {
        $sql = "select artikel.idartikel, artikel.judul, artikel.isi,  concat(dayname(artikel.tanggal_buat),', ',DATE_FORMAT(artikel.tanggal_buat,'%d %M %Y')) as 'tanggal_buat', jenis_artikel.nama as 'jenis_artikel', admin.nama 
                from artikel left join jenis_artikel on (artikel.jenis_artikel_idjenis_artikel=jenis_artikel.idjenis_artikel)
                left join admin on (artikel.admin_idadmin = admin.idadmin) where jenis_artikel.idjenis_artikel=3
		order by artikel.tanggal_buat desc ";
        return $this->query($sql);
    }
    function getcompanyjenis(){
        $sql = "select * from jenis_artikel where idjenis_artikel=1";
        return $this->query($sql);
    }
            function getsubnav() {
        $sql = "select *  from subnav left join jenis_artikel on (jenis_artikel.idjenis_artikel=subnav.jenis_artikel_idjenis_artikel) 
where subnav.jenis_artikel_idjenis_artikel=1";
        return $this->query($sql);
    }
}
