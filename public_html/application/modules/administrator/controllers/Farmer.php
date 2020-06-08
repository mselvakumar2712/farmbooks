<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farmer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/administrator/
	 *	- or -
	 * 		http://example.com/index.php/administrator/
	 *	- or -
	 * http://example.com/index.php/administrator/index
	 **/
    public function __construct() {
		parent::__construct();
		$this->load->library("session");
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 || $this->session->userdata('user_type') != 0 ){ 
		 redirect('administrator/login/signout');
		}
        $this->load->database();
		$this->load->model("Farmer_Model");
		$this->load->model("Variety_Model");
		$this->load->model("Login_Model");
        $this->load->model("Cropmaster_Model");
        $this->load->model("Fpo_Model");       
        $this->load->model("Masterdata_Model");
        header('Access-Control-Allow-Origin: *');        
	}
            
    
/** View Farmers profile related view by using the given functions **/
    public function profilelist() {        
        $data['page'] = 'Farmer';
        $data['page_title'] = 'List Farmer Profile';
        $data['page_module'] = 'profile';	
        $data['state_list'] = $this->Fpo_Model->getStateList();
        $this->load->view('farmer/farmer_profile_list', $data); 
	}        
	public function addfarmer() {
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Add Farmer Profile';	
        $data['page_module'] = 'profile';		
                
		$data['variety'] = $this->Variety_Model->varietyDropdownList();
        $this->load->view('farmer/farmer_profile_add', $data); 
	}        
    public function editfarmer($farmer_id){
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'View Farmer Profile';
        $data['page_module'] = 'profile';		
        
        $farmer_list = $this->Farmer_Model->farmerProfileByID($farmer_id);	
        $data['talukInfo'] = $this->Login_Model->getTalukByDistCode($farmer_list[0]->district);
		$data['blockInfo'] = $this->Login_Model->getBlockByDistCode($farmer_list[0]->district);
		$data['farmer_list'] = $farmer_list;
        $this->load->view('farmer/farmer_profile_edit', $data); 
	}
    public function viewfarmer($farmer_id) {
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'View Farmer Profile';
        $data['page_module'] = 'profile';		
        
        $data['farmer_list'] = $this->Farmer_Model->farmerProfileByID($farmer_id); 
        $this->load->view('farmer/farmer_profile_view', $data); 
	}
    
    
    public function landlist() {        
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Land Details List';
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/land_detail', $data); 
	}        
	public function addland() {
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Land Details List';	
        $data['page_module'] = 'profile';		
                
		$data['area_uom'] = $this->Cropmaster_Model->areauomDropdownList(); 
		$product = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
		for($i=0;$i<count($product);$i++){
			if($product[$i]->stock_group_id == 3){	
				if($product[$i]->category_id == 13){
					$product[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			} else if($product[$i]->stock_group_id == 2){
				$product[$i]->product_name = $this->Masterdata_Model->cropNameById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
			} else {				
				if($product[$i]->category_id == 3 || $product[$i]->category_id == 4 || $product[$i]->category_id == 5){
					$product[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			}
		}
		$data['product_list'] = $product;
        $this->load->view('farmer/landdetail_add', $data); 
	}        
    public function viewland($land_id) {
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'Land Details List';
        $data['page_module'] = 'profile';		
              
		$land = $this->Farmer_Model->land_holding($land_id);			
        $data['talukInfo'] = $this->Login_Model->getTalukByDistCode($land[0]->district);
		$data['blockInfo'] = $this->Login_Model->getBlockByDistCode($land[0]->district);
		$data['landInfo'] = $land;
		$data['area_uom'] = $this->Cropmaster_Model->areauomDropdownList();
		$product = $this->Masterdata_Model->product_list();
		for($i=0;$i<count($product);$i++){
			if($product[$i]->stock_group_id == 3){	
				if($product[$i]->category_id == 13){
					$product[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			} else if($product[$i]->stock_group_id == 2){
				$product[$i]->product_name = $this->Masterdata_Model->cropNameById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
			} else {				
				if($product[$i]->category_id == 3 || $product[$i]->category_id == 4 || $product[$i]->category_id == 5){
					$product[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			}
		}
		$data['product_list'] = $product;
		$data['land_id'] = $land[0]->id;
        $this->load->view('farmer/landdetail_view', $data); 
	}
    
    
    public function farmimplementlist() {        
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Farm implement List';
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/farm_implements', $data); 
	}        
	public function add_farmimplement() {
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Farm implement List';	
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/farm_implement_add', $data); 
	}        
    public function view_farmimplement() {
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'Farm implement List';
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/farm_implement_view', $data); 
	}
    
    
    public function livestocklist() {        
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Live Stocks List';
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/live_stock', $data); 
	}        
	public function addlivestock() {
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Live Stocks List';	
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/livestock_add', $data); 
	}      
    public function viewlivestock() {
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'Live Stocks List';
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/livestock_view', $data); 
	}
/** End Farmers views **/
    
    
    
    public function index() {        
        $farmer_list = $this->Farmer_Model->farmersProfileList();
        $response = array("status" => 1, "farmer_list" => $farmer_list);
        echo json_encode($response);
	}    
    
    public function farmersByLocation() {        
        $farmer_list = $this->Farmer_Model->farmersByLocation();
        $response = array("status" => 1, "farmer_list" => $farmer_list);
        echo json_encode($response);
	}  
    
    public function land_list() {        
        $land_list = $this->Farmer_Model->farmersLandDetailsList();
        $response = array("status" => 1, "land_list" => $land_list);
        echo json_encode($response);
	}
    
    public function farmimplement_list() {        
        $farmimplement_list = $this->Farmer_Model->farmersFarmImplementsList();
        $response = array("status" => 1, "farmimplement_list" => $farmimplement_list);
        echo json_encode($response);
	}
    
    public function livestock_list() {        
        $livestock_list = $this->Farmer_Model->farmersLiveStocksList();
        $response = array("status" => 1, "livestock_list" => $livestock_list);
        echo json_encode($response);
	}
        
    
    public function postFarmer() {
        if($this->Login_Model->mobileNumberExists( $this->input->post('farmer_mobile_num') ) > 0){
            $response = array("status" => 0, "message" => "Mobile number already registered");
        } else {
            if( $this->Farmer_Model->addFarmer() ) {             	 
                $response = array("status" => 1, "message" => "New farmer created successfully");
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
            }
        }
        echo json_encode($response);
	}   
    public function postLandDetail() {
            if( $this->Farmer_Model->postLandDetail() ) {             	 
                $response = array("status" => 1, "message" => "New land detail created successfully");
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
            }
        echo json_encode($response);
	}  
    public function postFarmImplement() {
            if( $this->Farmer_Model->postFarmImplement() ) {             	 
                $response = array("status" => 1, "message" => "New farm implements created successfully");
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
            }
        echo json_encode($response);
	}  
    public function postLiveStock() {
            if( $this->Farmer_Model->postLiveStock() ) {             	 
                $response = array("status" => 1, "message" => "New live stock created successfully");
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
            }
        echo json_encode($response);
	}  
    
    
    public function edit_Farmer( $farmer_id ) {        
        $farmer_list = $this->Farmer_Model->farmerProfileByID($farmer_id);       
        $talukInfo = $this->Login_Model->getTalukByDistCode($farmer_list[0]->district);
		$blockInfo = $this->Login_Model->getBlockByDistCode($farmer_list[0]->district);
        $response = array("status" => 1, "farmer_list" => $farmer_list, "talukInfo" => $talukInfo, "blockInfo" => $blockInfo);
        echo json_encode($response);
	}
    public function editland( $land_id ) {        
        $land_list = $this->Farmer_Model->land_holding($land_id);
		$talukInfo = $this->Login_Model->getTalukByDistCode($land_list[0]->district);
		$blockInfo = $this->Login_Model->getBlockByDistCode($land_list[0]->district);
        $land_list[0]->land_identification = $this->Farmer_Model->land_identification($land_id);           
        $response = array("status" => 1, "land_list" => $land_list, "talukInfo" => $talukInfo, "blockInfo" => $blockInfo);
        echo json_encode($response);
	}  
    public function editfarmimplement( $farmimplement_id ) {        
        $farmimplement_list = $this->Farmer_Model->farm_implements($farmimplement_id);     
        $response = array("status" => 1, "farmimplement_list" => $farmimplement_list);
        echo json_encode($response);
	}  
    public function editlivestock( $livestock_id ) {        
        $livestock_list = $this->Farmer_Model->live_stocks($livestock_id);           
        $response = array("status" => 1, "livestock_list" => $livestock_list);
        echo json_encode($response);
	}  
    
    
    public function updateFarmer($farmer_id) {		 
        if( $this->Farmer_Model->updateFarmer($farmer_id)) {  
            $this->session->set_flashdata('success', 'Farmer updated successfully');
            redirect('administrator/farmer/profilelist');
        } else {
            $this->session->set_flashdata('warning', 'Profile image is not uploaded');
            redirect('administrator/farmer/editfarmer/'.$farmer_id);
        }        
        //echo json_encode($response);
	}
    public function updatelivestock($livestock_id) {		 
        if( $this->Farmer_Model->updateLiveStock($livestock_id)) {  
            $response = array("status" => 1, "message" => "Farmer's live stock updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
    public function updatefarmimplement($farmimplement_id) {		 
        if( $this->Farmer_Model->updateFarmImplement($farmimplement_id)) {  
            $response = array("status" => 1, "message" => "Farmer's farm implement updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
    public function updateland($land_id) {		 
        if( $this->Farmer_Model->updateLandDetail($land_id)) {  
            $response = array("status" => 1, "message" => "Farmer's land detail updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }        
        echo json_encode($response);
	}
    
    
    public function deleteFarmer($farmer_id) {
        if( $this->Farmer_Model->delete($farmer_id) ) {
            $response = array("status" => 1, "message" => "Farmer deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    public function deleteLandDetail($land_id) {
        if( $this->Farmer_Model->deleteLandDetail($land_id) ) {
            $response = array("status" => 1, "message" => "Farmer's land detail deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    public function deleteFarmImplement($farmimplement_id) {
        if( $this->Farmer_Model->deleteFarmImplement($farmimplement_id) ) {
            $response = array("status" => 1, "message" => "Farmer's farm implement deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    public function deleteLiveStock($livestock_id) {
        if( $this->Farmer_Model->deleteLiveStock($livestock_id) ) {
            $response = array("status" => 1, "message" => "Farmer's live stock deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
    public function getLocationInfo( $pincode ) {
        $villageInfo    = $this->Farmer_Model->getVillageByPostcode( $pincode );
        $panchayatInfo  = $this->Farmer_Model->getPanjayatByVillage( $villageInfo['id'] );
        $talukInfo      = $this->Farmer_Model->getTalukByPanjayat( $panchayatInfo['id'] );
        $blockInfo      = $this->Farmer_Model->getBlockByTaluk( $talukInfo['id'] );
        $cityInfo       = $this->Farmer_Model->getCityByBlock( $blockInfo['id'] );
        $stateInfo      = $this->Farmer_Model->getStateByCity( $cityInfo['id'] );
        
        $response = array("status" => 1, "villageinfo" => $villageInfo);
        echo json_encode($response);
    }
    
    
    /** Live stocks Dropdown contents **/
    public function getLiveStocks( $type ) {
        $livestock_type    = $this->Farmer_Model->getLiveStocks( $type );
        $response = array("status" => 1, "livestock_name" => $livestock_type);
        echo json_encode($response);
    }
    public function getLiveStockVariety( $livestock_name ) {
        $livestock_variety    = $this->Farmer_Model->getLiveStockVariety( $livestock_name );
        $response = array("status" => 1, "livestock_variety" => $livestock_variety);
        echo json_encode($response);
    }
    
    
    /** Land holdings Dropdown contents **/
    public function getProductList() {
        $product = $this->Masterdata_Model->product_list();
		for($i=0;$i<count($product);$i++){
			if($product[$i]->stock_group_id == 3){	
				if($product[$i]->category_id == 13){
					$product[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			} else if($product[$i]->stock_group_id == 2){
				$product[$i]->product_name = $this->Masterdata_Model->cropNameById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
			} else {				
				if($product[$i]->category_id == 3 || $product[$i]->category_id == 4 || $product[$i]->category_id == 5){
					$product[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			}
		}
        $response = array("status" => 1, "product_list" => $product);
		echo json_encode($response);
    }
    
    
    /** Farm implements Dropdown contents **/
    public function getFarmImplements() {
        $farmImplement_list    = $this->Farmer_Model->getFarmImplements();
        $response = array("status" => 1, "farm_implement_namelist" => $farmImplement_list);
        echo json_encode($response);
    }
    
    
    public function getFarmImplementsMakeAndModel($name_value) {
        $farmImplement_makeandmodel    = $this->Farmer_Model->getFarmImplementsMakeAndModel($name_value);
        $response = array("status" => 1, "farmImplement_makeandmodel" => $farmImplement_makeandmodel);
        echo json_encode($response);
    }
    
    
    /** Getting the Area UOM Dropdown contents **/
    /*public function getAreaUOM() {
        $area_uom    = $this->Cropmaster_Model->areauomDropdownList();  
        $response = array("status" => 1, "area_uom" => $area_uom);
        echo json_encode($response);
    }*/
    
    
    public function existedFarmerName($farmer_id) {
        $farmer_name = $this->Farmer_Model->getExistedFarmerName($farmer_id);
        $response = array("status" => 1, "farmer_name" => $farmer_name);
        echo json_encode($response);
    }
    
    
    public function verifyFarmerCode($farmer_id) {
        $farmer_name = $this->Farmer_Model->getExistedFarmerName($farmer_id);
        $response = array("status" => 1, "farmer_name" => $farmer_name);
        echo json_encode($response);
    }
    
    public function getDistrictByState($state_code) {
        $district_list = $this->Fpo_Model->getDistrictByState($state_code);
        $response = array("status" => 1, "district_list" => $district_list);
        echo json_encode($response);
    }
    
    
    public function getBlocksByDistrict($district_code) {
        $block_list = $this->Fpo_Model->getBlocksByDistrict($district_code);
        $response = array("status" => 1, "block_list" => $block_list);
        echo json_encode($response);
    }
    
    
    function postFormData() {
        $farmer = json_decode(file_get_contents('php://input'), true);
        if($farmer) {
            $_POST['opportunity']          = $farmer['opportunity'];
            $_POST['source_type']          = $farmer['source_type'];
            $_POST['company_name']         = $farmer['company_name'];
            $_POST['customer']             = $farmer['customer'];
            $_POST['address']              = $farmer['address'];
            $_POST['country_id']           = $farmer['country_id'];
            $_POST['state_id']             = $farmer['state_id'];
            $_POST['city_id']              = $farmer['city_id'];
            $_POST['salesperson_id']       = $farmer['salesperson_id'];
            $_POST['sales_team_id']        = $farmer['sales_team_id'];
            $_POST['contact_name']         = $farmer['contact_name'];
            $_POST['title']                = $farmer['title'];
            $_POST['email']                 = $farmer['email'];
            $_POST['function']              = $farmer['function'];
            $_POST['phone']                 = $farmer['phone'];
            $_POST['mobile']                = $farmer['mobile'];
            $_POST['fax']                   = $farmer['fax'];
            $_POST['tags']                  = $farmer['tags'];
            $_POST['priority']              = $farmer['priority'];
            $_POST['internal_notes']        = $farmer['internal_notes'];
            $_POST['assigned_partner_id']   = $farmer['assigned_partner_id'];
           
            return true;
        } else {
            return false;
        }
    }
    
    
}
