<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('user/model_user');
    }

    function login() {
        $this->template->title("Login Page");
        $this->load->view("login.php");
    }
    
    private function getPivot($data) {
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-type: application/json');
        $header = "[[";
        foreach ($data as $value) {
            foreach ($value as $key => $sembarang) {
                $header .= '"' . str_replace("_", " ", strtoupper($key)) . '"';
                break;
            }
            $count = 1;
            foreach ($value as $key => $sembarang) {
                if ($count > 1) {
                    $header .= ',"' . str_replace("_", " ", strtoupper($key)) . '"';
                }
                $count ++;
            }
            $header .= "]";
            break;
        }

        foreach ($data as $value) {
            $header .= ",[";
            foreach ($value as $key => $data) {
                
                if ($key == "idpengaduan") {
                    $header .= '"<a href=\'' . base_url() . 'index.php/pengaduan/super/lihat/' . $data . '\'>' . $data . '</a>"';
                } else {
                    $header .= '"' . $data . '"';
                }
                break;
            }
            $count = 1;
            foreach ($value as $key => $data) {
                
                if ($count > 1) {
                    if ($key == "idpengaduan") {
                        $header .= $key . ',"<a href=\'' . base_url() . 'index.php/pengaduan/super/lihat/' . $data . '\'>' . $data . '</a>"';
                    } else {
                        $header .= ',"' . $data . '"';
                    }
                }
                $count ++;
            }
            $header .= "]";
        }
        $header .= "]";
        echo $header;
    }

    function getalladmin() {
        $temp1 = $this->model_user->getAllDataAdmin();
        $data ["pengaduan"] = $this->getPivot($temp1);
        return $data ["pengaduan"];
    }

    function add() {
        $data['admin'] = $this->model_user->getAllDataAdmin();
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');

        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->set_layout('back_end');
        $this->template->title("Admin Page");
        $this->template->build("register.php", $data);
    }

    function listAdmin() {
        $data['admin'] = $this->model_user->getAllDataAdmin();
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');

        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->set_layout('back_end');
        $this->template->title("Admin Page");
        $this->template->build("listadmin.php", $data);
    }

}
