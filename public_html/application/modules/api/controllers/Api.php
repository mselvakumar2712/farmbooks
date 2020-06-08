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
   public function getlocation() {
	$post_data = json_decode(file_get_contents('php://input'), true);
	$response = array("status" => 'TRV_E101', "message" => "Technical problem");
	if(!$this->getlocationValidator()) {
         $response['status'] = 'TRV_E101';
         $response['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
		   $pincode = (int)$post_data['pincode'];
		   $pincodeInfo = $this->API_Model->getlocationbypincode( $pincode );
		   if(!empty($pincodeInfo)) {                    
			  foreach($pincodeInfo as $key => $val) {
				 $state_code = $val->state_code;
				 $district_code = $val->district_code;
			  } 
			  if (!empty($state_code)) {
				  $stateInfo = $this->API_Model->getStateByCity($state_code,$post_data['is_local']);
			  } else {
				  $stateInfo = "";
			  } 
			  if (!empty($district_code)) {
				  $districtInfo = $this->API_Model->getCityByBlock($district_code,$post_data['is_local']);
			  } else {
				  $districtInfo = "";
			  }      
			  $data['district'] = $districtInfo;
			  $data['state'] = $stateInfo;
			  $response = array("status" => "TRV_S101", "location" => $data);
		   } else {
			  $response = array("status" => "TRV_E101", "message" => "Unknown Location");
		   }  
	  }                
   echo json_encode($response);
   }
   
   public function getlocationValidator() {
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['state_code']) || empty($post_data['pincode']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }   
   
   public function get_panchayats() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
     if(!$this->get_panchayatsValidator()) {
         $response['status'] = 'TRV_E101';
         $response['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
		$panchayatInfo = $this->API_Model->getPanchayatByBlockcode($post_data['block_code'],$post_data['is_local'] );     
		$response = array("status" => "TRV_S101", "panchayatInfo" => $panchayatInfo);		
	  }
	  echo json_encode($response);
   }
   public function get_panchayatsValidator() {
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['block_code']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }  
	public function get_blocks() {
		$post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
		if(!$this->get_blocksValidator()) {
         $response['status'] = 'TRV_E101';
         $response['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
		$blockInfo = $this->API_Model->getblockbydistrict( $post_data['district_code'], $post_data['is_local'] );
		$response = array("status" => "TRV_S101", "blockInfo" => $blockInfo);
	  }
		echo json_encode($response);
	}
	
	public function get_blocksValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['district_code']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }
   
   public function get_villages() {
      $post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
     if(!$this->get_villagesValidator()) {
         $response['status'] = 'TRV_E101';
         $response['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
         $villageInfo = $this->API_Model->getVillageByPanchayatcode($post_data['panchayat_id'], $post_data['is_local'] );
         $response = array("status" => "TRV_S101", "villageInfo" => $villageInfo);
	  }
     echo json_encode($response);
   }
   
   public function get_villagesValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['panchayat_id']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

   public function get_taluks() {
      $post_data = json_decode(file_get_contents('php://input'), true);
		$response = array("status" => 'TRV_E101', "message" => "Technical problem");
     if(!$this->get_taluksValidator()) {
         $response['status'] = 'TRV_E101';
         $response['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
         $talukDetails = $this->API_Model->getTalukByDistrictCode( $post_data['district_code'], $post_data['is_local'] );
         $response = array("status" => "TRV_S101", "talukDetails" => $talukDetails);
	  }
     echo json_encode($response);
   }
   
   public function get_taluksValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['district_code']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
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
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->cropcatlistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $cropcats_list = $this->API_Model->getcropcategoryList($post_data['is_local']);
      if($cropcats_list){
         $data['status'] = 'TRV_S101';
         $data['cropcats'] = $cropcats_list;
      }
	  }       
      echo json_encode($data); 
	}
   
   public function cropcatlistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function cropsubcatlist( ) {       
      $data['status'] = 'TRV_E101';
      $data['cropsubcat'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->cropsubcatlistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $cropsubcat_list = $this->API_Model->getcropsubcategory( $post_data['category_id'], $post_data['is_local'] );
      if($cropsubcat_list){
         $data['status'] = 'TRV_S101';
         $data['cropsubcat'] = $cropsubcat_list;
      }
      }      
      echo json_encode($data); 
   }
   
	public function cropsubcatlistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['category_id']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }
	public function cropnamelist() {       
      $data['status'] = 'TRV_E101';
      $data['cropname'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->cropnamelistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $cropname_list = $this->API_Model->getcropname( $post_data['subcategory_id'], $post_data['is_local'] );
      if($cropname_list){
         $data['status'] = 'TRV_S101';
         $data['cropname'] = $cropname_list;
      }
      }       
      echo json_encode($data); 
	}
   
   public function cropnamelistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['subcategory_id']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function cropvarietylist() {       
      $data['status'] = 'TRV_E101';
      $data['cropvariety'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->cropvarietylistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $cropvariety_list = $this->API_Model->getcropvariety( $post_data['name_id'], $post_data['is_local'] );
      if($cropvariety_list){
         $data['status'] = 'TRV_S101';
         $data['cropvariety'] = $cropvariety_list;
      }
      }     
      echo json_encode($data); 
	}
   
   public function cropvarietylistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['name_id']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
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
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->farmimplementslistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $farmimplements_list = $this->API_Model->getfarmimplementsList($post_data['is_local']);
      if($farmimplements_list){
         $data['status'] = 'TRV_S101';
         $data['farmimplements'] = $farmimplements_list;
      }
	  }     
      echo json_encode($data); 
	}
   
   public function farmimplementslistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function farmimplementsmakelist( ) {       
      $data['status'] = 'TRV_E101';
      $data['farmimplementsmakemodel'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->farmimplementsmakelistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $farmimplementsmakemodel_list = $this->API_Model->getfarmimplementsmakeList( $post_data['implements_id'], $post_data['is_local']);
      if($farmimplementsmakemodel_list){
         $data['status'] = 'TRV_S101';
         $data['farmimplementsmakemodel'] = $farmimplementsmakemodel_list;
      }
	  }      
      echo json_encode($data); 
	}
   
   public function farmimplementsmakelistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['implements_id']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function farmimplementsmodellist( ) {       
      $data['status'] = 'TRV_E101';
      $data['farmimplementsmakemodel'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->farmimplementsmodellistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $farmimplementsmakemodel_list = $this->API_Model->getfarmimplementsmodelList( $post_data['makename'] , $post_data['is_local'] );
      if($farmimplementsmakemodel_list){
         $data['status'] = 'TRV_S101';
         $data['farmimplementsmakemodel'] = $farmimplementsmakemodel_list;
      }
	  }       
      echo json_encode($data); 
	}
   
   public function farmimplementsmodellistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['makename']) || empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function livestockslist() {       
      $data['status'] = 'TRV_E101';
      $data['livestocks'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->livestockslistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $livestocks_list = $this->API_Model->getlivestocksList($post_data['is_local']);
      if($livestocks_list){
         $data['status'] = 'TRV_S101';
         $data['livestocks'] = $livestocks_list;
      } 
	  }     
      echo json_encode($data); 
	}
   
   public function livestockslistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function livestockvarietylist( ) {       
      $data['status'] = 'TRV_E101';
      $data['livestockvariety'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->livestockslistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $livestockvariety_list = $this->API_Model->getlivestockvarietyList( $post_data['live_stock_id'], $post_data['is_local'] );
      if($livestockvariety_list){
         $data['status'] = 'TRV_S101';
         $data['livestockvariety'] = $livestockvariety_list;
      }  
	  }    
      echo json_encode($data); 
	}
   
   public function livestockvarietylistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['is_local']) || empty($post_data['live_stock_id'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function certifiedproductlist() {       
      $data['status'] = 'TRV_E101';
      $data['certifiedproduct'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->certifiedproductlistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $certifiedproduct_list = $this->API_Model->getcertifiedproductList($post_data['is_local']);
      if($certifiedproduct_list){
         $data['status'] = 'TRV_S101';
         $data['certifiedproduct'] = $certifiedproduct_list;
      }  
	  }       
      echo json_encode($data); 
	}
   
   public function certifiedproductlistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
   }

	public function jurisdictionlist() {       
      $data['status'] = 'TRV_E101';
      $data['jurisdiction'] = array();
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!$this->jurisdictionlistValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else
	  {
      $jurisdiction_list = $this->API_Model->getjurisdictionList($post_data['is_local']);
      if($jurisdiction_list){
         $data['status'] = 'TRV_S101';
         $data['jurisdiction'] = $jurisdiction_list;
      } 
	  }      
      echo json_encode($data); 
	}
	public function jurisdictionlistValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['is_local'])) {
         return false;
      }  
      else {
         return true;
      }
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
   
   public function get_farmer_bank_account() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $data['message'] = 'Farmer Bank Account Not Found';
      $result = $this->API_Model->getFarmerBankAccount($post_data['mobile_no']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
         $data['message'] = 'Farmer Bank Account Found';
      }      
      echo json_encode($data); 
	}
   
   public function add_farmer_bank_account() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->farmerBankAccountValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->API_Model->addFarmerBankAccount()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New farmer bank account added';
      }
      echo json_encode($data); 
	}
   
   public function farmerBankAccountValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['bank_id']) || empty($post_data['branch_id']) || empty($post_data['account_number']) || empty($post_data['ifsc_code']) || empty($post_data['mobile_no']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_farmer_bank_account() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->farmerBankAccountUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->API_Model->updateFarmerBankAccount()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Farmer bank account updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function farmerBankAccountUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['id']) || empty($post_data['farmer_id']) || empty($post_data['bank_id']) || empty($post_data['branch_id']) || empty($post_data['account_number']) || empty($post_data['ifsc_code']) || empty($post_data['mobile_no']) ) {
         return false;
      }  
      else {
         return true;
      }
   }
   
}
