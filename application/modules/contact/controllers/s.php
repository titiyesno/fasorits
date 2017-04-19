<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('contact/contact');
    }

    
    function getmember() {
        $temp1 = $this->contact->getcontact();
        $data ["pengaduan"] = $this->getPivot($temp1);
        return $data ["pengaduan"];
    }
    function index(){
                $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("s_contact.php");
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

}
