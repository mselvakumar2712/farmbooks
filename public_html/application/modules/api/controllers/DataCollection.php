<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataCollection extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/admin/imports
	 *	- or -
	 * 		http://example.com/index.php/admin/imports
	 *	- or -
	 * http://example.com/index.php/admin/imports/index
	 **/
	 
	public function __construct() {
         parent::__construct();
         $this->load->database();
         $this->load->library('form_validation');       
         $this->load->model('API_Model');
         
         $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
         $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
         $this->output->set_header('Pragma: no-cache');
         $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         $this->output->set_header('Content-Type: application/json');
         /*cache control*/
	}
	
   /***default function, redirects to login page if no admin logged in yet***/
   public function dealer() {
		$post_data = json_decode(file_get_contents('php://input'), true);       
		  $data['status'] = 'TRV_E101';
		  $data['message'] = 'No data found';
		  $dealer_list = $this->API_Model->getDealerinfo($post_data['state'],$post_data['district'],$post_data['taluk'],$post_data['dealer_type']);
			if($dealer_list){
				$data['status'] = 'TRV_S101';
				$data['message'] = 'Success';
				$data['dealer'] = $dealer_list;
			}      
		echo json_encode($data); 
	}
   
   public function market() {
		$post_data = json_decode(file_get_contents('php://input'), true);       
		  $data['status'] = 'TRV_E101';
		  $data['message'] = 'No data found';
		  $market_list = $this->API_Model->getmarketinfo($post_data['state'],$post_data['district'],$post_data['taluk']);
			if($market_list){
				$data['status'] = 'TRV_S101';
				$data['message'] = 'Success';
				$data['market'] = $market_list;
			}      
		echo json_encode($data); 
	}
	
	public function researchstation() {
		$post_data = json_decode(file_get_contents('php://input'), true);       
		  $data['status'] = 'TRV_E101';
		  $data['message'] = 'No data found';
		  $researchstation_list = $this->API_Model->getresearchstationinfo($post_data['state'],$post_data['district']);
			if($researchstation_list){
				$data['status'] = 'TRV_S101';
				$data['message'] = 'Success';
				$data['researchstation'] = $researchstation_list;
			}      
		echo json_encode($data); 
	}

	public function kvk() {
		$post_data = json_decode(file_get_contents('php://input'), true);       
		  $data['status'] = 'TRV_E101';
		  $data['message'] = 'No data found';
		  $kvk_list = $this->API_Model->getkvkinfo($post_data['state'],$post_data['district']);
			if($kvk_list){
				$data['status'] = 'TRV_S101';
				$data['message'] = 'Success';
				$data['kvk'] = $kvk_list;
			}      
		echo json_encode($data);
	}
	
	public function store() {
		$post_data = json_decode(file_get_contents('php://input'), true);       
		  $data['status'] = 'TRV_E101';
		  $data['message'] = 'No data found';
		  $store_list = $this->API_Model->getstoreinfo($post_data['state'],$post_data['district'],$post_data['taluk']);
			if($store_list){
				$data['status'] = 'TRV_S101';
				$data['message'] = 'Success';
				$data['store'] = $store_list;
			}      
		echo json_encode($data); 
	}   
	
	public function company() {
		$post_data = json_decode(file_get_contents('php://input'), true);       
		  $data['status'] = 'TRV_E101';
		  $data['message'] = 'No data found';
		  $company_list = $this->API_Model->getcompanyinfo($post_data['state'],$post_data['district']);
			if($company_list){
				$data['status'] = 'TRV_S101';
				$data['message'] = 'Success';
				$data['company'] = $company_list;
			}      
		echo json_encode($data); 
	}   
	
public function storage()
   {   
		$post_data = json_decode(file_get_contents('php://input'), true);
		$data['status'] = 'TRV_E101';
		$data['message'] = 'No data found';
		$storage_list = $this->API_Model->getstorageinfo($post_data['state'],$post_data['district'],$post_data['taluk']);
			if($storage_list){
				$data['status'] = 'TRV_S101';
				$data['message'] = 'Success';
				$data['storage'] = $storage_list;
			}      
		echo json_encode($data);
   }   
}
