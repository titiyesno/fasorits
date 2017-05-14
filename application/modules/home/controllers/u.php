<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class u extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->model('user/model_user');
		$this->load->model('pemesanan/pemesanan_model');
    }
    function index(){
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_home.php");
    }
    function offer(){
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_offers.php");
    }
	public function cek_bayar(){
		$kode_bayar = $this->input->post('kode_bayar');
		$menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
//        print_r ($data['ksg']);
		$url = "https://simondits.its.ac.id/api_amu?id_unit=105&kode=".$kode_bayar."&AMU-KEY=697190fd04cd9394010280a8cbf5ed51";
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		$result=curl_exec($ch);
		// Closing
		curl_close($ch);
		$decode = json_decode($result,true);
		if($decode){
			$data["flag"] = 1;
			$data["kode_bayar"] = $kode_bayar;
			$data["nama"] = $decode[0]["BILL_NAMA"];
			$data["total"] = $decode[0]["BILL_AMOUNT"];
			$data["batas"] = $decode[0]["EXPIRED_DATE"];
			$data["aplikan"] = $this->pemesanan_model->readaplikan($kode_bayar);
			
			if($decode[0]["BILL_FLAG"] == 1){
				$data["status"] = "LUNAS";
				$this->pemesanan_model->ubahstatussubmit_bycodebooking($kode_bayar,1);
			}
			else if($decode[0]["BILL_FLAG"] == 2){
				$data["status"] = "LUNAS";
			}
			else if($decode[0]["BILL_FLAG"] == 0){
				$data["status"] = "BELUM LUNAS";
			}
			
		}
		else{
			$data["flag"] = 0;
		}
		
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("status_bayar.php",$data);
	}
	
}
