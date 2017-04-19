<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class u extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('user/model_user');
    }

    function cekLogin() {
        if (isset($this->session->userdata['logged_in'])) {
            $data = $this->session->userdata['logged_in'];
            if (count($data) > 0) {
                return true;
            }
        }
        return false;
    }

    function registration() {
        $this->template->set_layout('blank');
        $this->template->title("Register Page");
        $this->template->build("register.php");
    }

    function submitregister() {
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['telp'] = $this->input->post('telp');
        $data['email'] = $this->input->post('email');
        $data['gender'] = $this->input->post('gender');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $res = $this->model_user->register($data);
        if ($res != 0) {
            redirect("user/u/login");
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }

    function login() {
        if (!$this->cekLogin()) {

            $this->load->view("login.php");
        } else {
            redirect("pengaduan/" . $this->session->userdata['logged_in']['privilege']);
        }
    }

    function signin() {
        if (!$this->cekLogin()) {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $result = $this->model_user->login($data['username'], $data['password']);
            $session_arr = array();
            $url = "";
            if ($result != null) {
                if ($result[0]->issuper == 1) {
                    $url = "home/s";
                    $session_arr = array("privilege" => "s", "id" => $result[0]->idadmin, "nama" => $result[0]->nama);
                } else if ($result[0]->issuper == 0) {
                    $url = "home/s";
                    $session_arr = array("privilege" => "s", "id" => $result[0]->idadmin, "nama" => $result[0]->nama);
                }
                $this->session->set_userdata("logged_in", $session_arr);
            }
            if (count($result) == 0) {
                $this->template->title("Login Page");
                $message['error'] = "Username atau Password anda tidak benar";
                $this->load->view("login.php", $message);
            } else {
                redirect($url);
            }
        } else {
            redirect("home/" . $this->session->userdata['logged_in']['privilege']);
        }
    }

}
