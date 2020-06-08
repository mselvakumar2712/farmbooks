<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
         $this->load->library('form_validation');       
         $this->load->model('Login_Model');
         $this->load->model("Location_Model");
         $this->load->model("Masterdata_Model");
         $this->load->model('Farmer_Model');
         $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
         $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
         $this->output->set_header('Pragma: no-cache');
         $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         $this->output->set_header('Content-Type: application/json');
         /*cache control*/
	}
	
   /***default function, redirects to login page if no admin logged in yet***/
   public function index()
   {   
      $response = array("status" => 'TRV_S101', "information" => "Welcome ASPAART");
      echo json_encode($response);
   }
   
   public function statelist() {        
      $data['status'] = 'TRV_E101';
      $data['states'] = array();
      $state_list = $this->Location_Model->state_list();
      if($state_list){
         $data['status'] = 'TRV_S101';
         $data['states'] = $state_list;
      }      
      echo json_encode($data); 
	}
   public function state_detail($state_id) {        
      $data['status'] = 'TRV_E101';
      $data['detail'] = array();
      $state_info = $this->Location_Model->stateByID( $state_id );
      if($state_info){
         $data['status'] = 'TRV_S101';
         $data['detail'] = $state_info;
      }      
      echo json_encode($data); 
	}
   public function districtlist($state_code) {        
      $data['status'] = 'TRV_E101';
      $data['districts'] = array();
      $dist_list = $this->Location_Model->districtByState($state_code);
      if($dist_list){
         $data['status'] = 'TRV_S101';
         $data['districts'] = $dist_list;
      }      
      echo json_encode($data); 
	}
   public function district_detail($district_id) {        
      $data['status'] = 'TRV_E101';
      $data['detail'] = array();
      $district_info = $this->Location_Model->districtByID($district_id);
      if($district_info){
         $data['status'] = 'TRV_S101';
         $data['detail'] = $district_info;
      }      
      echo json_encode($data); 
	} 
   
   /********** Get location from pincode *********/
   public function getlocation( $pincode ) {
   $panchayatInfo = array();
   $talukInfo = array();
   $blockInfo = array();   
   $blockDetails = '';
   $pincode = (int)$pincode;
   $pincodeInfo = $this->Login_Model->getVillageByPostcode( $pincode );
   if(!empty($pincodeInfo)) {                    
      foreach($pincodeInfo as $key => $val) {
         array_push($talukInfo, $val->taluk_code);
         $state_code = $val->state_code;
         $district_code = $val->district_code;
      } 
      
      
      if (!empty($state_code)) {
          $stateInfo = $this->Login_Model->getStateByCode( $state_code );
      } else {
          $stateInfo = "";
      } 
      
      if (!empty($district_code)) {
          $districtInfo = $this->Login_Model->getDistrictByCode( $district_code );
          $blockDetails = $this->Login_Model->getBlockByDistCode( $district_code );
      } else {
          $districtInfo = "";
      }
      
      if(!empty($talukInfo)) {
          $talukDetails = $this->Login_Model->getTalukByCode( $talukInfo );
      }else {
          $talukDetails = "";
      }        
      
      //$data['villages'] = array();
      //$data['panchayats'] = array();
      $data['taluks'] = $talukDetails;
      $data['blocks'] = $blockDetails;
      $data['district'] = $districtInfo;
      $data['state'] = $stateInfo;
      $response = array("status" => "TRV_S101", "location" => $data);
   } else {
      $data['location'] = array();
      $response = array("status" => "TRV_E101", "location" => $data);
   }                
   echo json_encode($response);
   }
   
   public function get_panchayats( $block_code ) {
     $panchayatInfo = $this->Login_Model->getPanchayatByBlockcode( $block_code );     
     $response = array("status" => "TRV_S101", "panchayatInfo" => $panchayatInfo);
     echo json_encode($response);
   }
    
   public function get_villages( $panchayat_id ) {
     $villageInfo = $this->Login_Model->getVillageByPanchayatcode( $panchayat_id );
     
     $response = array("status" => "TRV_S101", "villageInfo" => $villageInfo);
     echo json_encode($response);
   }
}
