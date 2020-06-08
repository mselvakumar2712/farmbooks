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
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}
        $this->load->database();
		$this->load->model("Farmer_Model");
		$this->load->model("Variety_Model");
		$this->load->model("Login_Model");
        $this->load->model("Cropmaster_Model");
        
        header('Access-Control-Allow-Origin: *');        
	}
            
    
/** View Farmers profile related view by using the given functions **/
    public function profilelist() {        
        $data['page'] = 'Farmer';
        $data['page_title'] = 'List Farmer Profile';
        $data['page_module'] = 'profile';		
        $this->load->view('farmer/farmer_profile_list', $data); 
	}        
	public function addfarmer() {
        $data['page'] = 'Farmer';
        $data['page_title'] = 'Add Farmer Profile';	
        $data['page_module'] = 'profile';		
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
		$data['variety'] = $this->Variety_Model->varietyDropdownList();
        $this->load->view('farmer/farmer_profile_add', $data); 
	}        
    public function editfarmer() {
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'View Farmer Profile';
        $data['page_module'] = 'profile';		
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
		$data['variety'] = $this->Variety_Model->varietyDropdownList();
        $this->load->view('farmer/farmer_profile_edit', $data); 
	}
    public function viewfarmer() {
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'View Farmer Profile';
        $data['page_module'] = 'profile';		
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
		$data['variety'] = $this->Variety_Model->varietyDropdownList();
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
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
		$data['variety'] = $this->Variety_Model->varietyDropdownList();
        $this->load->view('farmer/landdetail_add', $data); 
	}        
    public function viewland() {
        $data['page'] = 'Farmer'; 
		$data['page_title'] = 'Land Details List';
        $data['page_module'] = 'profile';		
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
		$data['variety'] = $this->Variety_Model->varietyDropdownList();
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
        /*if($farmer_list[0]->farm_implements == 1) {
            $farmer_list[0]->form_implement = $this->Farmer_Model->farmImplements($farmer_id);            
        } 
        if($farmer_list[0]->land_holdings == 1) {
            $farmer_list[0]->land_holding = $this->Farmer_Model->land_holding($farmer_id);
            $farmer_list[0]->land_holding[0]->land_identification = $this->Farmer_Model->land_identification($farmer_id);            
        } 
        if($farmer_list[0]->farm_implements == 1) {
            $farmer_list[0]->form_implement = $this->Farmer_Model->farm_implements($farmer_id);
            
        } 
        if($farmer_list[0]->live_stocks == 1) {
            $farmer_list[0]->live_stock = $this->Farmer_Model->live_stocks($farmer_id);                   
        }*/ 
        $response = array("status" => 1, "farmer_list" => $farmer_list);
        echo json_encode($response);
	}
    public function editland( $land_id ) {        
        $land_list = $this->Farmer_Model->land_holding($land_id);
        $land_list[0]->land_identification = $this->Farmer_Model->land_identification($land_id);           
        $response = array("status" => 1, "land_list" => $land_list);
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
            redirect('administrator/farmer/editfarmer?id='.$farmer_id);
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
        $product_list    = $this->Farmer_Model->getProductList();
        $response = array("status" => 1, "product_list" => $product_list);
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
    public function getAreaUOM() {
        $area_uom    = $this->Cropmaster_Model->areauomDropdownList();  
        $response = array("status" => 1, "area_uom" => $area_uom);
        echo json_encode($response);
    }
    
    
    public function existedFarmerName($farmer_id) {
        $farmer_name = $this->Farmer_Model->getExistedFarmerName($farmer_id);
        $response = array("status" => 1, "farmer_name" => $farmer_name);
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
