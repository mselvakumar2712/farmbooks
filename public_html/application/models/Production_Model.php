<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Production_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

	//add user starts//
	function mobileNumberExists( $mobilenumber ) {
        $email_count = $this->db->get_where('trv_staff_member', array('username' => $mobilenumber))->num_rows();
		return $email_count;
    }
	
}

?>