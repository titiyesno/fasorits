<?php 
/**
 * Define Path Access Code Igniter
 *
 * @category   DefinerFiles
 * @package    ExplorasiController
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
 * @category   Controller
 * @package    ExplorasiController
 * @author     M Misbachul Huda <misbachul.h@gmail.com>
 * @copyright  2013-2014 CV Artcak Media Digital & LPTSI 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Version 1
 * @link       asrama.its.ac.id
 * @see        its.ac.id
 * @since      File available since Release 1.0
 * @deprecated File deprecated in Release 1.0
 */

class Explorasi extends CI_Controller
{
    /**
    Contructor class explorasi
    */
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
    }

    /**
    Try to Create foler on $path parameter
    *
    * @param string $path : alamat foler yang ingin dibuat
    *
    * @return int mengembalikan nilai #true jika berhasil dan #false jika gagal
    */

    function createPath($path) 
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            echo $path . "true";
            return true;
        }
        echo $path . "false";
        return false;
    }

    /**
    * adalah index file yang menjadi main function
    *
    * @return int mengembalikan nilai hasil pengujian pembuatan folder
    */
    public function index() 
    {
        echo $this->createPath(getcwd()."\uploads\\5109100145");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>