<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Mydb {

    private $CI;

    /**
     * The constructor
     */
    function __construct() {
        $this->CI = & get_instance();
    }

    public function GetMultiResults($SqlCommand) {
        $k = 0;
        $arr_results_sets = array();

        if (mysqli_multi_query($this->CI->db->conn_id, $SqlCommand)) {
            do {
                $result = mysqli_store_result($this->CI->db->conn_id);
                if ($result) {
                    $l = 0;
                    while ($row = $result->fetch_assoc()) {
                        $arr_results_sets[$k][$l] = $row;
                        $l++;
                    }
                }
                $k++;
            } while (mysqli_next_result($this->CI->db->conn_id));

            return $arr_results_sets;
        }
    }
}
?>
