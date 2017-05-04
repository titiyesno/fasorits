<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class s extends Super_Controller {

    const IMAGE_UPLOAD_DIR = 'gui_modul/berita_gambar';

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->library('cart');
        $this->load->model('pemesanan/pemesanan_model');
        $this->load->helper(array('form', 'captcha'));
        $this->load->library('form_validation');
        $this->load->model('pemesanan_model');
        $this->load->helper('dompdf');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->_supported_extensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
    }

    function reservasi() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['data'] = $this->pemesanan_model->disableDate();
        //$data['acara'] = $this->pemesanan_model->jenis_acara();
        $data['slot'] = $this->pemesanan_model->slot($id);
        $data['olahraga'] = $this->pemesanan_model->olahraga($id);
        $this->form_validation->set_rules('name', "Name", 'required');
        $this->form_validation->set_rules('captcha', "Captcha", 'required');
        $userCaptcha = set_value('captcha');
        $word = $this->session->userdata('captchaWord');

        $data['data0'] = $this->pemesanan_model->disableDate();
        if ($this->form_validation->run() == TRUE && strcmp(strtolower($userCaptcha), strtolower($word)) == 0) {
            $this->session->unset_userdata('captchaWord');
            $name = set_value('name');
            $data = array('name' => $name);
            print_r($data);
        } else {
            $vals = array(
                'img_path' => './index/',
                'img_url' => 'http://localhost/captcha/',
                'img_width' => '150',
                'img_height' => 30,
                'expiration' => 7200
            );
            /* Generate the captcha */
            $captcha = create_captcha($vals);
            /* Store the captcha value (or 'word') in a session to retrieve later */
            $this->session->set_userdata('captchaWord', $captcha['word']);
            $this->template->build("u_home.php", $data);
        }
    }

    function index() {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("dashboard.php",$data);
    }
	
	function sudahbayar(){
		$data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("lunas.php",$data);
	}
	
	function getreservasi() {
        $temp1 = $this->pemesanan_model->getreservasi();
        $data ["submit"] = $this->getPivot($temp1);
        return $data ["submit"];
    }
	
	function getlunas(){
		$temp1 = $this->pemesanan_model->getlunas();
        $data ["submit"] = $this->getPivot($temp1);
        return $data ["submit"];
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
                if ($count > 1)
                    $header .= ',"' . str_replace("_", " ", strtoupper($key)) . '"';
                $count++;
            }
            $header .= "]";
            break;
        }
        $idnya;
        foreach ($data as $value) {
            $header .= ",[";
            foreach ($value as $key => $data) {
                if($key == "idpemesanan")
                {
                    $idnya = $data;
                }
                
                if ($key == "CODE_BOOKING")
                    $header .= '"<a href=\'' . base_url() . 'index.php/pemesanan/s/booking_details/' . $data.'/'.$idnya . '>' . $data . '</a>"';
                else
                    $header .= '"' . $data . '"';
                break;
            }
            $count = 1;
            foreach ($value as $key => $data) {
                if ($count > 1) {
                    if ($key == "CODE_BOOKING")
                        $header .= ',"<a href=\'' . base_url() . 'index.php/pemesanan/s/booking_details/' . $data.'/'.$idnya .'\'>' . $data . '</a>"';
                    else
                        $header .= ',"' . $data . '"';
                }
                $count++;
            }
            $header .= "]";
        }
        $header .= "]";
        echo $header;
    }

    function cetakbukti($id) {
        $data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
        $subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['pemesan'] = $this->pemesanan_model->pemesan($id);
        $data['pemesanan'] = $this->pemesanan_model->pemesanan($id);
        $this->template->build("invoice.php", $data);
    }

    public function bayar($id) {
        $this->db->set("status", 1);
        $this->db->where('idpemesanan', $id);
        $this->db->update("pemesanan");
        redirect("pemesanan/s/");
    }
	
	function booking_details($booking_code){
		$data['error'] = '';
        $menu = "hf/menu/menu_pengelola.php";
		$subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Detail Reservasi");
		
		$url = "https://simondits.its.ac.id/api_amu?id_unit=105&kode=".$booking_code."&AMU-KEY=697190fd04cd9394010280a8cbf5ed51";
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
		
		$data["flag_api"] = $decode[0]["BILL_FLAG"];
		$data["amount_api"] = $decode[0]["BILL_AMOUNT"];
		
		$data["aplikan"] = $this->pemesanan_model->readaplikan($booking_code);
		
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("details_rev.php",$data);
	}
	
	function pesan($id) {
        $menu = "hf/menu/menu_pengelola.php";
		$subnav = "subnav.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('back_end');
        $this->template->title("Home Admin");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['data'] = $this->pemesanan_model->disableDate();
        //$data['acara'] = $this->pemesanan_model->jenis_acara();
        //$data['slot'] = $this->pemesanan_model->slot($id);
		$data['idlap'] = $id;
        $data['olahraga'] = $this->pemesanan_model->olahraga($id);
		//$data3['terisi'] = $this->pemesanan_model->slot_terisi($id);
		//echo $data['slot'][0]->slot;
		/*$data['terisi'] = array();
		foreach($data3['terisi'] as $tes){
			array_push($data['terisi'], $tes->slot);
		}*/
        $this->form_validation->set_rules('name', "Name", 'required');
        $this->form_validation->set_rules('captcha', "Captcha", 'required');
        $userCaptcha = set_value('captcha');
        $word = $this->session->userdata('captchaWord');

        $data['data0'] = $this->pemesanan_model->disableDate();
        if ($this->form_validation->run() == TRUE && strcmp(strtolower($userCaptcha), strtolower($word)) == 0) {
            $this->session->unset_userdata('captchaWord');
            $name = set_value('name');
            $data = array('name' => $name);
            print_r($data);
        } else {
            $vals = array(
                'img_path' => './index/',
                'img_url' => 'http://localhost/captcha/',
                'img_width' => '150',
                'img_height' => 30,
                'expiration' => 7200
            );
            /* Generate the captcha */
            $captcha = create_captcha($vals);
            /* Store the captcha value (or 'word') in a session to retrieve later */
            $this->session->set_userdata('captchaWord', $captcha['word']);
            $this->template->build("s_home.php", $data);
        }
    }
	
	function batalkanpesanan(){
        $codebooking = $this->input->post('cb');
		/*$datalog["ID_PENGELOLA"] = $this->session->userdata["telah_masuk"]["id"];
		$datalog["MESSAGE"] = "Batal manual kode booking ".$codebooking;
		$datalog["WAKTU"] = date("Y-m-d G:i:s");
		$tes = $this->reservasi_model->record_log($datalog);*/
		$url = "https://simondits.its.ac.id/api_amu?id_unit=105&kode=".$codebooking."&AMU-KEY=697190fd04cd9394010280a8cbf5ed51";
		//$url = "http://10.199.13.60/simondits/index.php/api_amu?id_unit=103&kode=".$cb."&AMU-KEY=697190fd04cd9394010280a8cbf5ed51";
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
//        $idsubmit = $this->pembayaran_model->getidsubmit_bybookingcode($codebooking);
//        foreach ($idsubmit as $aa) {
////            echo $aa->ID_SUBMIT;
//            $this->pembayaran_model->delete_angsuran_byidsubmit($aa->ID_SUBMIT);
//        }
        /*$status = $this->pembayaran_model->status($codebooking);
		foreach($status as $data1){
			$stat = $data1->STATUS;
		}*/

		if($decode[0]["BILL_FLAG"] == 1){
			$this->pemesanan_model->ubahstatussubmit_bycodebooking($codebooking,4);
		}
		else{
			$this->pemesanan_model->ubahstatussubmit_bycodebooking($codebooking,99);
		}
		
        redirect(base_url() . 'index.php/pemesanan/s');
    }
	
	function pay()
    {
        $codebooking = $this->input->post('kode_booking');      
        $nominal = $this->input->post("nominal");
        /*$data["ID_PENGELOLA"] = $this->session->userdata["telah_masuk"]["id"];
        $data["TANGGAL_ANGSURAN"] = date("Y-m-d");*/
		$data["KODE"] = $codebooking;
        $data["TANGGAL_BAYAR"] = $this->input->post("tanggal");
        $data["VIA"] = $this->input->post("via");
		$data["REKENING_PENERIMA"] = $this->input->post("rekening");
		$data["BANK_PENERIMA"] = $this->input->post("bank");
		
		$data2["aplikan"] = $this->pemesanan_model->readaplikan($codebooking);
		
        $data3 = $data;
		$dataput["KODE"] = $codebooking;
		$dataput["REKENING"] = $data["REKENING_PENERIMA"];
		$dataput["KODE_BANK"] = $data["BANK_PENERIMA"];
		$dataput["TANGGAL_BAYAR"] = $data["TANGGAL_BAYAR"];
		$simondits = $this->pemesanan_model->put_api($dataput);
	
		/*$datalog["ID_PENGELOLA"] = $this->session->userdata["telah_masuk"]["id"];
		$datalog["MESSAGE"] = "Bayar manual kode booking ".$codebooking;
		$datalog["WAKTU"] = date("Y-m-d G:i:s");
		$this->pembayaran_model->record_log($datalog);*/
  
        if($data2["aplikan"][0]->total==$nominal)
        {
			$data3["STATUS"] = 2;
            $this->pemesanan_model->update_bayar($data3);
        }
        else
        {
			$data3["STATUS"] = 0;
            $this->pemesanan_model->update_bayar($data3);
        }
		
        redirect("pemesanan/s/booking_details/".$codebooking,"refresh");
    }
	
	function umum() {
        $data['noid'] = $this->input->post("noid");
        $data['nama'] = $this->input->post("nama");
        $data['telp'] = $this->input->post("telp");
        //$data['alamat'] = $this->input->post("alamat");
        $data['email'] = $this->input->post("email");
        $id = $this->pemesanan_model->create_data($data, 'pemesan');
		$datapost['NAMA'] = $data['nama'];
		//echo $data['noid']." | ".$data['nama']." | ".$data['telp']." | ".$data['alamat']." | ".$data['email'];
        $data2['tanggal'] = $this->input->post("date");
        $data2['slot'] = $this->input->post("slot");
        $data2['lapangan'] = $this->input->post("jenis");
        $data2['pemesan_idpemesan'] = $id;
        $data2['admin_idadmin'] = 1;
        $data2['status'] = 0;
		$data3['kegiatan'] = $this->input->post("kegiatan");
		//echo $data2['tanggal']." | ".$data2['slot']." | ".$data2['lapangan'];
		$data3['pengguna'] = 'umum';
		$data3['idlap'] = $data2['lapangan'];
		$enam = array(13, 6, 5, 3);
		$sembilan = array(4, 12, 2, 9, 10, 11);
		$tgl = strtotime($data2['tanggal']);
		$day = date('w', $tgl); //0 sunday 6 saturday
		$beda = array(1, 4, 12, 5, 6, 13);
		$event = array(4, 5, 6, 12, 13);
		if($data3['kegiatan'] == 'turnamen'){
			if(in_array($data2['lapangan'],$event)){
				if($day == 0 || $day == 6){
					$data3['hari'] = 'weekend';
				}
				else{
					$data3['hari'] = 'normal';
				}
				if(strtotime($jam_mulai[0]->start) >= strtotime('18:00:00')){
					if($data2['lapangan'] == 4 || $data2['lapangan'] == 12){
						if(strtotime($jam_mulai[0]->start) >= strtotime('21:00:00')){
							$data3['shift'] = 'malam';
						}
						else{
							$data3['shift'] = 'sore';
						}
					}
					else{
						$data3['shift'] = 'malam';
					}
				}
				else{
					$data3['shift'] = 'pagi';
				}
			}
			else{
				$data3['hari'] = '';
				$data3['shift'] = '';
			}
		}
		else{
			if(in_array($data2['lapangan'],$beda)){
				if($day == 0 || $day == 6){
					$data3['hari'] = 'weekend';
				}
				else{
					$data3['hari'] = 'normal';
				}
			}
			else{
				$data3['hari'] = '';
			}
			if($data2['lapangan'] == 7 || $data2['lapangan'] == 8){
				$data3['shift'] = '';
			}
			else{
				$jam_mulai = $this->pemesanan_model->getStart($data2['slot']);
				//echo $jam_mulai[0]->start;
				if((strtotime($jam_mulai[0]->start) >= strtotime('18:00:00') and in_array($data2['lapangan'],$enam))
					|| (strtotime($jam_mulai[0]->start) >= strtotime('19:00:00') and $data2['lapangan'] == 1)
				|| (strtotime($jam_mulai[0]->start) >= strtotime('21:00:00') and in_array($data2['lapangan'],$sembilan))){
					$data3['shift'] = 'malam';
				}
				else if((strtotime($jam_mulai[0]->start) >= strtotime('18:00:00') and strtotime($jam_mulai[0]->start) < strtotime('21:00:00')) and ($data2['lapangan'] == 4 || $data2['lapangan'] == 12)){
					$data3['shift'] = 'sore';
				}
				else{
					$data3['shift'] = 'pagi';
				}
			}
			
		}		
		
		$harga = $this->pemesanan_model->getHarga($data3);
		//echo $harga[0]->nominal;
		$data2['total'] = $harga[0]->nominal;
		$databooking['total'] = $data2['total'];
		$datapost['NOMINAL'] = $data2['total'];
		$year = date("y");
		$month = date("m");
		$kode_unit = "105";
		$angsuran = "01";
		$digits = 6;
		$rand = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
		$data2['code'] = $year.$month.$kode_unit.$angsuran.$rand;
		$datapost['KODE'] = $data2['code'];
		$databooking['kode'] = $data2['code'];
		$datetoday = new DateTime();
		$dateplus1 = (strtotime($datetoday->format('Y-m-d H:i:s'))*1000 + 95177766) / 1000;
		$datetime = date("Y-m-d H:i:s", $dateplus1);
		$datapost['EXPIRED'] = $datetime;
		$databooking['expired'] = $datapost['EXPIRED'];
		$datapost['TGL_INPUT'] = $datetoday->format('Y-m-d H:i:s');
		//echo $datapost['EXPIRED'];
		$databooking['expired'] = $datapost['EXPIRED'];
		//echo $data2['code'];
		$pesan = $this->pemesanan_model->create_data($data2, 'pemesanan');
		
		$simondits = $this->pemesanan_model->postSubmit($datapost);
		$menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
		$subnav = "subnav.php";
        $this->template->set_layout('back_end');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
		$this->template->build("s_kode.php", $databooking);
    }
	
	function akademik() {
        $data['noid'] = $this->input->post("noid");
        $data['nama'] = $this->input->post("nama");
        $data['telp'] = $this->input->post("telp");
        //$data['alamat'] = $this->input->post("alamat");
        $data['email'] = $this->input->post("email");
        $id = $this->pemesanan_model->create_data($data, 'pemesan');
		$datapost['NAMA'] = $data['nama'];
		//echo $data['noid']." | ".$data['nama']." | ".$data['telp']." | ".$data['alamat']." | ".$data['email'];
        $data2['tanggal'] = $this->input->post("date");
        $data2['slot'] = $this->input->post("slot");
        $data2['lapangan'] = $this->input->post("jenis");
        $data2['pemesan_idpemesan'] = $id;
        $data2['admin_idadmin'] = 1;
        $data2['status'] = 0;
		$data3['kegiatan'] = $this->input->post("kegiatan");
		//echo $data2['tanggal']." | ".$data2['slot']." | ".$data2['lapangan'];
		$data3['pengguna'] = 'umum';
		$data3['idlap'] = $data2['lapangan'];
		$enam = array(13, 6, 5, 3);
		$sembilan = array(4, 12, 2, 9, 10, 11);
		$tgl = strtotime($data2['tanggal']);
		$day = date('w', $tgl); //0 sunday 6 saturday
		$beda = array(1, 4, 12, 5, 6, 13);
		$event = array(4, 5, 6, 12, 13);
		if($data3['kegiatan'] == 'turnamen'){
			if(in_array($data2['lapangan'],$event)){
				if($day == 0 || $day == 6){
					$data3['hari'] = 'weekend';
				}
				else{
					$data3['hari'] = 'normal';
				}
				if(strtotime($jam_mulai[0]->start) >= strtotime('18:00:00')){
					if($data2['lapangan'] == 4 || $data2['lapangan'] == 12){
						if(strtotime($jam_mulai[0]->start) >= strtotime('21:00:00')){
							$data3['shift'] = 'malam';
						}
						else{
							$data3['shift'] = 'sore';
						}
					}
					else{
						$data3['shift'] = 'malam';
					}
				}
				else{
					$data3['shift'] = 'pagi';
				}
			}
			else{
				$data3['hari'] = '';
				$data3['shift'] = '';
			}
		}
		else{
			if(in_array($data2['lapangan'],$beda)){
				if($day == 0 || $day == 6){
					$data3['hari'] = 'weekend';
				}
				else{
					$data3['hari'] = 'normal';
				}
			}
			else{
				$data3['hari'] = '';
			}
			if($data2['lapangan'] == 7 || $data2['lapangan'] == 8){
				$data3['shift'] = '';
			}
			else{
				$jam_mulai = $this->pemesanan_model->getStart($data2['slot']);
				//echo $jam_mulai[0]->start;
				if((strtotime($jam_mulai[0]->start) >= strtotime('18:00:00') and in_array($data2['lapangan'],$enam))
					|| (strtotime($jam_mulai[0]->start) >= strtotime('19:00:00') and $data2['lapangan'] == 1)
				|| (strtotime($jam_mulai[0]->start) >= strtotime('21:00:00') and in_array($data2['lapangan'],$sembilan))){
					$data3['shift'] = 'malam';
				}
				else if((strtotime($jam_mulai[0]->start) >= strtotime('18:00:00') and strtotime($jam_mulai[0]->start) < strtotime('21:00:00')) and ($data2['lapangan'] == 4 || $data2['lapangan'] == 12)){
					$data3['shift'] = 'sore';
				}
				else{
					$data3['shift'] = 'pagi';
				}
			}
			
		}		
		
		$harga = $this->pemesanan_model->getHarga($data3);
		//echo $harga[0]->nominal;
		$data2['total'] = $harga[0]->nominal;
		$databooking['total'] = $data2['total'];
		$datapost['NOMINAL'] = $data2['total'];
		$year = date("y");
		$month = date("m");
		$kode_unit = "105";
		$angsuran = "01";
		$digits = 6;
		$rand = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
		$data2['code'] = $year.$month.$kode_unit.$angsuran.$rand;
		$datapost['KODE'] = $data2['code'];
		$databooking['kode'] = $data2['code'];
		$datapost['EXPIRED'] = '';
		$databooking['expired'] = $datapost['EXPIRED'];
		//echo $data2['code'];
		$pesan = $this->pemesanan_model->create_data($data2, 'pemesanan');
		
		$simondits = $this->pemesanan_model->postSubmit($datapost);
		$menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
		$subnav = "subnav.php";
        $this->template->set_layout('back_end');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
		$this->template->build("s_kode.php", $databooking);
    }
	
	function ubah_registrasi($kodebooking)
    {
		$data["aplikan"] = $this->pemesanan_model->readaplikan2($kodebooking);
		//echo $data["aplikan"][0]->nama_lapangan;
        $menu = "hf/menu/menu_pengelola.php";
        $footer = "hf/footer/footer.php";
		$subnav = "subnav.php";
        $this->template->set_layout('back_end');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
		$this->template->build("ubah_slot.php", $data);
    }
	
	function submit_ubah_registrasi(){
		$data["tgl"] = $this->input->post('date');
		$data["slot"] = $this->input->post('slot');
		$data["kodebooking"] = $this->input->post('kodebooking');
		
		$ubah = $this->pemesanan_model->ubahjadwal($data);
		
		redirect("pemesanan/s/booking_details/".$data["kodebooking"],"refresh");
	}

}
