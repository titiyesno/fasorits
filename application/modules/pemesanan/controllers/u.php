<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class u extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->driver('session');
        $this->load->helper(array('url'));
        $this->load->library('cart');
        $this->load->model('pemesanan/pemesanan_model');
        $this->load->helper(array('form', 'captcha'));
    }

    function cart() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";


        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("cart.php");
    }

    function index($id) {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
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
            $this->template->build("u_home.php", $data);
        }
    }

    function fasilitas() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['data'] = $this->pemesanan_model->disableDate();
        $data['acara'] = $this->pemesanan_model->jenis_acara();
        $data['slot'] = $this->pemesanan_model->slot();
        $data['kategori'] = $this->pemesanan_model->kategori();
        $data['item'] = $this->pemesanan_model->item(1);
        $this->template->build("fasilitas.php", $data);
    }

    function kategori($id) {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $data['data'] = $this->pemesanan_model->disableDate();
        $data['acara'] = $this->pemesanan_model->jenis_acara();
        $data['slot'] = $this->pemesanan_model->slot();
        $data['kategori'] = $this->pemesanan_model->kategori();
        $data['item'] = $this->pemesanan_model->item($id);
        $this->template->build("fasilitas.php", $data);
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
		$menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
		$this->template->build("u_kode.php", $databooking);
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
		$menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
		$this->template->build("a_kode.php", $databooking);
    }

    function offer() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $data['yidic'] = $this->shop_model->getOfferArticle();
        $this->template->set_layout('fe_2');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_offers.php", $data);
    }

    function shop($id) {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer.php";
        $data['kategori'] = $this->produk_model->getallcategori();
        $data['produk'] = $this->produk_model->getproduk($id);
        $this->template->set_layout('fe');
        $this->template->title("fasor Sepuluh Nopember");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("u_buy.php", $data);
    }

    function add() {
        // Set array for send data.
        $insert_data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => 1
        );

        // This function add items into cart.
        $this->cart->insert($insert_data);

        // This will show insert data in cart.
        redirect('pemesanan/u/fasilitas');
    }

    function remove($rowid) {
        // Check rowid value.
        if ($rowid === "all") {
            // Destroy data which store in  session.
            $this->cart->destroy();
        } else {
            // Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            // Update cart data, after cancle.
            $this->cart->update($data);
        }

        // This will show cancle data in cart.
        redirect('pemesanan/u/fasilitas');
    }

    function update_cart() {

        // Recieve post values,calcute them and update
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];

            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'amount' => $amount,
                'qty' => $qty
            );

            $this->cart->update($data);
        }
        redirect('pemesanan/u/fasilitas');
    }
	
	function getslot($tgl,$id){
		$htmlres = "<option value=\"\">Pilih slot</option>";
		$slot = $this->pemesanan_model->slot($id);
		$terisi = $this->pemesanan_model->slot_terisi($tgl,$id);
		$reserved = array();
		foreach($terisi as $tes){
			array_push($reserved, $tes->slot);
		}
		foreach($slot as $all){
			if(in_array($all->slot,$reserved)){
				//echo "reserved";
				$htmlres .="<option value=".$all->slot." disabled>".$all->nama." ( ".$all->start." - ".$all->end." )</option>";
			}
			else{
				//echo $all->slot;
				$htmlres .="<option value=".$all->slot.">".$all->nama." ( ".$all->start." - ".$all->end." )</option>";
			}
		}
		echo $htmlres;
	}

}
