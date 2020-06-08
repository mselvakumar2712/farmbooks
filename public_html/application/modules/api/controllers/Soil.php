<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/administrator/
	 *	- or -
	 * 		http://example.com/index.php/administrator/
	 *	- or -
	 * http://example.com/index.php/administrator/index
	 *
	 */
    public function __construct() {
        parent::__construct();
		$this->load->library("session");
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}
        $this->load->library('session');        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}

    
    public function index() {        
        $data['page'] = 'Soil List';
		$data['page_title'] = 'Soil List';
        $data['page_module'] = 'soil';		
        $this->load->view('menu/menulist', $data); 
	}    
    
	
        	
}
