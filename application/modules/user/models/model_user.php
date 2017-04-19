<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class model_user extends CI_model {

    function __construct() {
        parent::__construct();
    }

    function getAdminByUsername($username) {
        $sql = 'select * from admin where admin.username=?';
        return $this->query($sql, array($username));
    }

    function login($username, $password) {
        $sql = 'select * from admin where admin.username=? and md5(?)=admin.password and admin.status=1';
        return $this->query($sql, array($username, $password));
    }

    public function register($data) {
        $result = $this->getAdminByUsername($data['username']);
        if (count($result) == 0) {
            $this->db->insert('admin', $data);
            $result = $this->getAdminByUsername($data['username']);
            return $result[0];
        }
        return 0;
    }

    public function getAllDataAdmin() {
        $sql = "select admin.nama, DATE_FORMAT(admin.tanggal_buat,'%d %M %Y %k:%i') as 'tanggal_buat', admin.alamat, admin.telp, admin.email, admin.username, 
                case admin.issuper when 1 then 'Super User' else 'Admin' end as 'Privilege', 
                case admin.gender when 1 then 'Laki-laki' else 'Perempuan' end as 'Gender', 
                case admin.aktif when 1 then 'Aktif' else 'Non Aktif' end as 'Status'
                from admin";
        return $this->query($sql);
    }

}
