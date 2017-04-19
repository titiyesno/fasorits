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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
