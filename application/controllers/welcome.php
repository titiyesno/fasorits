<?php

/**
 * Define Path Access Code Igniter
 *
 * @category   DefinerFiles
 * @package    WelcomeController
 * @author     M Misbachul Huda <misbachul.h@gmail.com>
 * @copyright  2013-2014 CV Artcak Media Digital & LPTSI 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Version 1
 * @link       asrama.its.ac.id
 * @see        its.ac.id
 * @since      File available since Release 1.0
 * @deprecated File deprecated in Release 1.0
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Define Path Access Code Igniter
 *
 * @category   DefinerFiles
 * @package    WelcomeController
 * @author     M Misbachul Huda <misbachul.h@gmail.com>
 * @copyright  2013-2014 CV Artcak Media Digital & LPTSI 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Version 1
 * @link       asrama.its.ac.id
 * @see        its.ac.id
 * @since      File available since Release 1.0
 * @deprecated File deprecated in Release 1.0
 */
class Welcome extends CI_Controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('code');
        $this->load->helper('mem');
        $this->load->helper('html');
        
        $this->load->model('berita_model');
        $this->load->model('berita/gambar_model');
        $this->load->model('kamar/jeniskamar_model');
        $this->load->model('pemesanan/reservasi_model');
    }

    /**
     * Slash Screen Function for displaying spash screen
     *
     * @return page that show the spash screen
     */

    /**
     * Index
     *
     * @return page
     */
    public function index() {
        $data['wait'] = $this->reservasi_model->isGetWaitForRegistration();
        if (count($data['wait']) > 0) {
            $this->load->view("splashcreen", $data);
        } else {
            redirect("welcome/home");
        }
    }

    public function home() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer_fe.php";
        $this->template->set_layout('front_end');
        $this->template->title("fasor Sepuluh Nopember ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("home_template.php");
    }
 function reservasi() {
        $menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer_fe.php";
        $this->template->set_layout('front_end');
        $this->template->title("fasor Sepuluh Nopember ITS");
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
        $this->template->build("umum/reservasi.php");
    }
    /**
     * Cari Berita
     *
     * @return div yang menampilkan semua isi berita
     */
    public function getFile($file) {
        $file = urldecode($file);
        $file = base64_decode($file);
        if (file_exists($file)) {
            
            echo file_get_contents($file);
        }
    }

    public function cariAllBerita() {

        $berita = $this->berita_model->read_all_berita();
        $a = 1;
        $htmlres = '';
        foreach ($berita as $p) {
            $foto = $this->gambar_model->read_gambar_by_idberita($p->ID_BERITA);
            $g = $foto[0];
            $matches = array();
            preg_match("/<p>(.*)<\/p>/", $p->TEXT_BERITA, $matches);
            if (count($matches) > 0)
                $s = strip_tags($matches[1]);
            else
                $s = "";
            $htmlres .=
                    "   
                    <hr>    
                    <div class=\"row\" style=\"margin-bottom: 15px;\">
                        <div class=\"small-3 columns\">
                            <div class=\"row\">
                                <img style=\"margin-left:35%;\" width=120px; height=75px; src=\"" . base_url() . "/static/images/berita/$g->ALAMAT_GAMBAR\">
                            </div>
                        </div>
                        <div class=\"small-9 columns\">
                            <div class=\"row\">
                                <div class=\"small-12 columns\" style=\"margin-bottom:5px;\">$p->JUDUL</div>
                            </div>
                            <div class=\"row\">
                                <div class=\"small-12 columns\" style=\"overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: justify\"> " . $s . "</div>
                            </div>
                            <div class=\"row\">
                                <div class=\"small-12 columns\">
                                    <a href=\"#\">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>";
            $a++;
        }
        echo $htmlres;
    }
	
	public function cek_bayar(){
		$kode_bayar = $this->input->post('kode_bayar');
		$menu = "hf/menu/menu_umum.php";
        $footer = "hf/footer/footer_fe.php";
//        print_r ($data['ksg']);
		$url = "https://simondits.its.ac.id/api_amu?id_unit=103&kode=".$kode_bayar."&AMU-KEY=697190fd04cd9394010280a8cbf5ed51";
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
				if($decode[0]["BILL_FLAG"] == 1){
				$data["status"] = "LUNAS";
				$status = $this->pembayaran_model->status($decode[0]["BILL_DATA_ID"]);
				if($status){
					$totalbiaya = $status[0]->BAYAR*sqrt($status[0]->COUNTER);
					if($status[0]->UANG_MUKA == 1){
						$nominal = $decode[0]["BILL_AMOUNT"]*2;
					}
					for($i=0; $i<sqrt($status[0]->COUNTER); $i++){
						$data3["CODE_BOOKING"]= $status[0]->CODE_BOOKING;
						$data["NOMINAL_ANGSURAN"]=$nominal/sqrt($status[0]->COUNTER);
						$data["ID_SUBMIT"] = $status[0]->ID_SUBMIT;
						$this->pembayaran_model->pay($data);
						$status[0]->ID_SUBMIT+=1;
					}
					if($totalbiaya==$nominal)
					{
						$data3["ID_PENGELOLA"] = "";
						$data3["FLAG_SUBMIT"]= 3;
						$data3["FLAG"] = 1;
						$this->pembayaran_model->update_submit_bycodebooking($data3);
					}
				}
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
		
        $this->template->title("Sistem Reservasi Online | Wisma ITS");
        $this->template->set_layout('frontend');
        $this->template->set_partial("header", $header);
        $this->template->set_partial("menu", $menu);
        $this->template->set_partial("footer", $footer);
		$this->template->build("status_bayar.php",$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
