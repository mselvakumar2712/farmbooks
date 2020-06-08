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
		 //$this->load->model('Cropmaster_Model');
		 $this->load->model('API_Model');
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
      $response = array("status" => 'TRV_S101', "information" => "Welcome to Farmbooks");
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
   //$panchayatInfo = array();
   //$talukInfo = array();
   //$blockInfo = array();   
   //$blockDetails = '';
   $pincode = (int)$pincode;
   $pincodeInfo = $this->Login_Model->getlocationbypincode( $pincode );
   if(!empty($pincodeInfo)) {                    
      foreach($pincodeInfo as $key => $val) {
         //array_push($talukInfo, $val->taluk_code);
         $state_code = $val->state_code;
         $district_code = $val->district_code;
      } 
      
      
      if (!empty($state_code)) {
          $stateInfo = $this->Login_Model->getStateByCity( $state_code );
      } else {
          $stateInfo = "";
      } 
      
      if (!empty($district_code)) {
          $districtInfo = $this->Login_Model->getCityByBlock( $district_code );
          //$blockDetails = $this->Login_Model->getBlockByDistCode( $district_code );
      } else {
          $districtInfo = "";
      }
      
      // if(!empty($talukInfo)) {
          // $talukDetails = $this->Login_Model->getTalukByCode( $talukInfo );
      // }else {
          // $talukDetails = "";
      // }        
      
      //$data['villages'] = array();
      //$data['panchayats'] = array();
      // $data['taluks'] = $talukDetails;
      // $data['blocks'] = $blockDetails;
      $data['district'] = $districtInfo;
      $data['state'] = $stateInfo;
      $response = array("status" => "TRV_S101", "location" => $data);
   } else {
      //$data['location'] = array();
      $response = array("status" => "TRV_E101", "message" => "Unknown Location");
   }                
   echo json_encode($response);
   }
   
   public function get_panchayats( $block_code ) {
     $panchayatInfo = $this->Login_Model->getPanchayatByBlockcode( $block_code );     
     $response = array("status" => "TRV_S101", "panchayatInfo" => $panchayatInfo);
     echo json_encode($response);
   }
    
	public function get_blocks( $district_code ) {
     $blockInfo = $this->Login_Model->getblockbydistrict( $district_code );     
     $response = array("status" => "TRV_S101", "blockInfo" => $blockInfo);
     echo json_encode($response);
	}
   public function get_villages( $panchayat_id ) {
     $villageInfo = $this->Login_Model->getVillageByPanchayatcode( $panchayat_id );
     
     $response = array("status" => "TRV_S101", "villageInfo" => $villageInfo);
     echo json_encode($response);
   }
   
   public function get_taluks( $district_code ) {
     $talukDetails = $this->API_Model->getTalukByDistrictCode( $district_code );
     
     $response = array("status" => "TRV_S101", "talukDetails" => $talukDetails);
     echo json_encode($response);
   }
   
    public function croplist() {        
      $data['status'] = 'TRV_E101';
      $data['crops'] = array();
      $crop_list = $this->API_Model->cropDropdownList();
      if($crop_list){
         $data['status'] = 'TRV_S101';
         $data['crops'] = $crop_list;
      }      
      echo json_encode($data); 
	}
	
	public function cropcatlist() {       
      $data['status'] = 'TRV_E101';
      $data['cropcats'] = array();
      $cropcats_list = $this->API_Model->getcropcategoryList();
      if($cropcats_list){
         $data['status'] = 'TRV_S101';
         $data['cropcats'] = $cropcats_list;
      }      
      echo json_encode($data); 
	}
	
	public function cropsubcatlist( $category_id ) {       
      $data['status'] = 'TRV_E101';
      $data['cropsubcat'] = array();
      $cropsubcat_list = $this->API_Model->getcropsubcategory( $category_id );
      if($cropsubcat_list){
         $data['status'] = 'TRV_S101';
         $data['cropsubcat'] = $cropsubcat_list;
      }      
      echo json_encode($data); 
	}
	
	public function cropnamelist( $subcategory_id ) {       
      $data['status'] = 'TRV_E101';
      $data['cropname'] = array();
      $cropname_list = $this->API_Model->getcropname( $subcategory_id );
      if($cropname_list){
         $data['status'] = 'TRV_S101';
         $data['cropname'] = $cropname_list;
      }      
      echo json_encode($data); 
	}
	
	public function cropvarietylist( $name_id ) {       
      $data['status'] = 'TRV_E101';
      $data['cropvariety'] = array();
      $cropvariety_list = $this->API_Model->getcropvariety( $name_id );
      if($cropvariety_list){
         $data['status'] = 'TRV_S101';
         $data['cropvariety'] = $cropvariety_list;
      }      
      echo json_encode($data); 
	}
	
	public function seasonlist() {       
      $data['status'] = 'TRV_E101';
      $data['season'] = array();
      $season_list = $this->API_Model->getseasonList();
      if($season_list){
         $data['status'] = 'TRV_S101';
         $data['season'] = $season_list;
      }      
      echo json_encode($data); 
	}
	
	public function farmimplementslist() {       
      $data['status'] = 'TRV_E101';
      $data['farmimplements'] = array();
      $farmimplements_list = $this->API_Model->getfarmimplementsList();
      if($farmimplements_list){
         $data['status'] = 'TRV_S101';
         $data['farmimplements'] = $farmimplements_list;
      }      
      echo json_encode($data); 
	}
	
	public function farmimplementsmakelist( $implements_id ) {       
      $data['status'] = 'TRV_E101';
      $data['farmimplementsmakemodel'] = array();
      $farmimplementsmakemodel_list = $this->API_Model->getfarmimplementsmakeList( $implements_id );
      if($farmimplementsmakemodel_list){
         $data['status'] = 'TRV_S101';
         $data['farmimplementsmakemodel'] = $farmimplementsmakemodel_list;
      }      
      echo json_encode($data); 
	}
	
	public function farmimplementsmodellist( $makename ) {       
      $data['status'] = 'TRV_E101';
      $data['farmimplementsmakemodel'] = array();
      $farmimplementsmakemodel_list = $this->API_Model->getfarmimplementsmodelList( $makename );
      if($farmimplementsmakemodel_list){
         $data['status'] = 'TRV_S101';
         $data['farmimplementsmakemodel'] = $farmimplementsmakemodel_list;
      }      
      echo json_encode($data); 
	}
	
	public function livestockslist() {       
      $data['status'] = 'TRV_E101';
      $data['livestocks'] = array();
      $livestocks_list = $this->API_Model->getlivestocksList();
      if($livestocks_list){
         $data['status'] = 'TRV_S101';
         $data['livestocks'] = $livestocks_list;
      }      
      echo json_encode($data); 
	}
	
	public function livestockvarietylist( $live_stock_id ) {       
      $data['status'] = 'TRV_E101';
      $data['livestockvariety'] = array();
      $livestockvariety_list = $this->API_Model->getlivestockvarietyList( $live_stock_id );
      if($livestockvariety_list){
         $data['status'] = 'TRV_S101';
         $data['livestockvariety'] = $livestockvariety_list;
      }      
      echo json_encode($data); 
	}
	
	public function certifiedproductlist() {       
      $data['status'] = 'TRV_E101';
      $data['certifiedproduct'] = array();
      $certifiedproduct_list = $this->API_Model->getcertifiedproductList();
      if($certifiedproduct_list){
         $data['status'] = 'TRV_S101';
         $data['certifiedproduct'] = $certifiedproduct_list;
      }      
      echo json_encode($data); 
	}
	
	public function jurisdictionlist() {       
      $data['status'] = 'TRV_E101';
      $data['jurisdiction'] = array();
      $jurisdiction_list = $this->API_Model->getjurisdictionList();
      if($jurisdiction_list){
         $data['status'] = 'TRV_S101';
         $data['jurisdiction'] = $jurisdiction_list;
      }      
      echo json_encode($data); 
	}
	
	public function getfarmerprofile($mobile_number) {
		$data['status'] = 'TRV_E101';
		$data['getfarmerprofile'] = array();
		$getfarmerprofile_list = $this->API_Model->getfarmerprofile( $mobile_number );
		if($getfarmerprofile_list){
			$data['status'] = 'TRV_S101';
			$data['getfarmerprofile'] = $getfarmerprofile_list;
		}      
		echo json_encode($data);
	}
	
	public function addFarmer() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");		

		if($this->API_Model->check_farmer($post_data['mobile_number']) == TRUE) {
            $response = array("status" => 'TRV_E101', "message" => "Farmer Already Registered");
        } else {
			if($this->API_Model->addFarmer($post_data)) {  
				$response = array("status" => 'TRV_S101', "message" => "Farmer Added successfully");
			} else {
				$response = array("status" => 'TRV_E101', "message" => "Technical problem");
			}    
        }  
        echo json_encode($response);
	}
	
	public function updateFarmer() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
		//echo $post_data; die;
        if($this->API_Model->updateFarmer($post_data)) {  
            $response = array("status" => 'TRV_S101', "message" => "Farmer updated successfully");
        } else {
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function farmerimplementslist($farmer_id) {       
      $data['status'] = 'TRV_E101';
      $data['message'] = 'No data found';
      $farmerimplements_list = $this->API_Model->getfarmerimplementsList($farmer_id);
      if($farmerimplements_list){
         $data['status'] = 'TRV_S101';
         $data['farmerimplements'] = $farmerimplements_list;
      }      
      echo json_encode($data); 
	}
	
	public function addfarmimplements() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->addFarmImplement($post_data)) {  
            $response = array("status" => 'TRV_S101', "message" => "Farmer Implements Added successfully");
        } else {
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function updatefarmimplements() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->updateFarmImplement($post_data)) {  
            $response = array("status" => 'TRV_S101', "message" => "Farmer Implements updated successfully");
        } else {
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function farmerlivestockslist($farmer_id) {       
      $data['status'] = 'TRV_E101';
      $data['farmerlivestocks'] = array();
      $farmerlivestocks_list = $this->API_Model->getfarmerlivestockslist($farmer_id);
      if($farmerlivestocks_list){
         $data['status'] = 'TRV_S101';
         $data['farmerlivestocks'] = $farmerlivestocks_list;
      }      
      echo json_encode($data); 
	}
	
	public function addlivestocks() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->addLiveStock($post_data)) {  
            $response = array("status" => 'TRV_S101', "message" => "Live Stocks Added successfully");
        } else {
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function updatelivestocks() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->updatelivestocks($post_data)) {  
            $response = array("status" => 'TRV_S101', "message" => "Live Stocks updated successfully");
        } else {
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function farmerlandlist($farmer_id) {        
		$data['status'] = 'TRV_E101';
		$data['farmerland'] = array();
        $farmerland_list = $this->API_Model->farmersLandDetailsList($farmer_id);
		if($farmerland_list){
         $data['status'] = 'TRV_S101';
         $data['farmerland'] = $farmerland_list;
      }      
        echo json_encode($data);
	}
	
	public function farmerlandholdingdetails($land_id) {        
		$data['status'] = 'TRV_E101';
		$data['farmerlandholdingdetails'] = array();
        $farmerlandholdingdetails_list['landholdingdetails'] = $this->API_Model->farmersLandHoldingDetails($land_id);
		$farmerlandholdingdetails_list['land_identification'] = $this->API_Model->farmerslandidentificationDetails($land_id);
		if($farmerlandholdingdetails_list){
         $data['status'] = 'TRV_S101';
         $data['farmerlandholdingdetails'] = $farmerlandholdingdetails_list;
      }      
        echo json_encode($data);
	}
	
	public function updatelandholdings() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->updatelandholdings($post_data)) {
				// if ($this->API_Model->updatelandidentificataion($post_data))
				// {
					$response = array("status" => 'TRV_S101', "message" => "Land Holdings updated successfully");		
				// }
				// else {
					// $response = array("status" => 'TRV_E101', "message" => "Technical problem");
				// }
        } else {
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function addlandholdings() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->addlandholdings($post_data)) {
            $this->API_Model->updateFarmerLand($post_data);
			$response = array("status" => 'TRV_S101', "message" => "Land Holdings Added successfully");		
        } 
		else 
		{
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function farmerupdatelandidentity() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->farmerupdatelandidentity($post_data)) {
            $this->API_Model->updateFarmerLand($post_data);
			$response = array("status" => 'TRV_S101', "message" => "Land Identity updated successfully");		
        } 
		else 
		{
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function farmerssourceofirrigation($land_id) {
		$data['status'] = 'TRV_E101';
		$data['sourceofirrigationlist'] = array();
        $sourceofirrigationlist_list = $this->API_Model->farmerssourceofirrigation($land_id);
		if($sourceofirrigationlist_list){
         $data['status'] = 'TRV_S101';
         $data['sourceofirrigationlist'] = $sourceofirrigationlist_list;
      }      
        echo json_encode($data);
	}	
	
	public function updatesourceofirrigation() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->updatesourceofirrigation($post_data)) {
			$response = array("status" => 'TRV_S101', "message" => "Source of Irrigation updated successfully");		
        } 
		else 
		{
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function farmersorganic($land_id) {
		$data['status'] = 'TRV_E101';
		$data['organiclist'] = array();
        $organic_list = $this->API_Model->farmersorganic($land_id);
		if($organic_list){
         $data['status'] = 'TRV_S101';
         $data['organiclist'] = $organic_list;
      }      
        echo json_encode($data);
	}
	
	public function updateorganic() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
        if($this->API_Model->updateorganic($post_data)) {
			$response = array("status" => 'TRV_S101', "message" => "Organic Farming Information updated successfully");		
        } 
		else 
		{
            $response = array("status" => 'TRV_E101', "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
	
	public function getfarmeraddress($farmer_id)
	{
		$data['status'] = 'TRV_E101';
		$data['addressdetails'] = array();
        $address_list = $this->API_Model->getfarmeraddress($farmer_id);
		if($address_list){
         $data['status'] = 'TRV_S101';
         $data['addressdetails'] = $address_list;
      }      
        echo json_encode($data);
	}
	
	public function getcropnamemaster()
	{
		$data['status'] = 'TRV_E101';
		$data['cropmasterlist'] = array();
        $cropmaster_list = $this->API_Model->getcropnamemaster();
		if($cropmaster_list){
         $data['status'] = 'TRV_S101';
         $data['cropmasterlist'] = $cropmaster_list;
      }      
        echo json_encode($data);
	}
	
	public function getbanknamemaster()
	{
		$data['status'] = 'TRV_E101';
		$data['banknamemasterlist'] = array();
        $banknamemaster_list = $this->API_Model->getbanknamemaster();
		if($banknamemaster_list){
         $data['status'] = 'TRV_S101';
         $data['banknamemasterlist'] = $banknamemaster_list;
      }      
        echo json_encode($data);
	}
	
	public function getbranchname($bank_name_id)
	{
		$data['status'] = 'TRV_E101';
		$data['getbranchnamelist'] = array();
        $getbranchname_list = $this->API_Model->getbranchname($bank_name_id);
		if($getbranchname_list){
         $data['status'] = 'TRV_S101';
         $data['getbranchnamelist'] = $getbranchname_list;
      }      
        echo json_encode($data);
	}
	
	
	/*Get the statecode based on the pincode to identify the local language
    for example : State code = 29 then the local language is Tamil
   */
   
   public function getstate_bypincode() {
        $data['status'] = 'TRV_E101';
        $data['statecode'] = array();
        $post_data = json_decode(file_get_contents('php://input'), true);
        $statecode = $this->API_Model->getstate_bypincode($post_data);
        if($statecode){
         $data['status'] = 'TRV_S101';
         $data['statecode'] = $statecode;
        }      
        echo json_encode($data);
   }
}
