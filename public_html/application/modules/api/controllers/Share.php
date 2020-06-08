<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {

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
        
        $this->load->model("Share_Model");
        $this->load->model("Cropmaster_Model");
        $this->load->model("Fig_Model");
        
        header('Access-Control-Allow-Origin: *');
	}

    
    public function index() {        
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application Farmer List';
        $data['page_module'] = 'share';	
        
        $data['share_applications'] = $this->Share_Model->farmerShareApplicationList();                        
        $this->load->view('share/share_application/share_application_list', $data);
	} 
    
    
    public function fpo_shareapplication_list() {        
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application FPO List';
        $data['page_module'] = 'share';	
        
        $data['share_applications'] = $this->Share_Model->fpoShareApplicationList();                        
        $this->load->view('share/share_application/fpo_share_application_list', $data);
	} 
    
	
    /** Share application for farmer Starts **/    
    public function addshareapplication() {        
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application Farmer Add';
        $data['page_module'] = 'share';
        
        $data['fpo_list'] = $this->Share_Model->fpoDropdownList();  
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();        
        $this->load->view('share/share_application/add_share_application', $data);
	}   
    
    
    public function viewshareapplication($share_application_id) {  
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application Farmer View';
        $data['page_module'] = 'share';	
        
        $data['fpo_list'] = $this->Fig_Model->fpoDropdownList();  
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['share_application'] = $this->Share_Model->shareApplicationByID($share_application_id);        
        $this->load->view('share/share_application/view_share_application', $data);
	}   
    
    
    public function postShareApplication() {
        if( $this->Share_Model->postShareApplication() ) {  
            redirect('administrator/share');
        } else {
            redirect('administrator/share/addshareapplication');
        }                
	}
    
    
    public function updateShareApplication($share_application_id) {
        if( $this->Share_Model->updateShareApplication($share_application_id) ) {  
            redirect('administrator/share');
        } else {
            redirect('administrator/share/viewshareapplication');
        }           
	}    
    
    
    public function deleteShareApplication($share_application_id) {
        if( $this->Share_Model->deleteShareApplication($share_application_id) ) {  
            redirect('administrator/share');
        } else {
            redirect('administrator/share/viewshareapplication');
        }           
	}    
    /** Share application for farmer End **/
    
    
    
    /** Share application for FPO Starts **/
    public function addshareapplication_fpo() {        
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application FPO Add';
        $data['page_module'] = 'share';
        
        $data['fpo_list'] = $this->Fig_Model->fpoDropdownList();    
        $this->load->view('share/share_application/add_fpo_share_application', $data);
	}   
    
    
    public function viewshareapplication_fpo($share_application_id) {  
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application FPO View';
        $data['page_module'] = 'share';	
        
        $data['fpo_list'] = $this->Fig_Model->fpoDropdownList();  
        $data['share_application'] = $this->Share_Model->shareApplicationByID($share_application_id);
        
        $this->load->view('share/share_application/view_fpo_share_application', $data);
	}  
    
    
    public function postShareApplicationByFPO() {
        if( $this->Share_Model->postShareApplicationByFPO() ) {  
            redirect('administrator/share/fpo_share_application_list');
        } else {
            redirect('administrator/share/addshareapplication_fpo');
        }                
	}
    
    
    public function updateShareApplicationByFPO($share_application_id) {
        if( $this->Share_Model->updateShareApplicationByFPO($share_application_id) ) {  
            redirect('administrator/share/fpo_share_application_list');
        } else {
            redirect('administrator/share/addshareapplication_fpo');
        }                
	}    
    /** Share application for FPO End **/
    
    
    
    /** Share application Allotment starts **/
    public function shareallotment() {        
        $data['page'] = 'Allotment of Share';
		$data['page_title'] = 'Allotment of Share';
        $data['page_module'] = 'share';		
        $last_allot = $this->Share_Model->getShareAlottmentID();
        if(!is_array($last_allot) && $last_allot == 0){
            $data['last_allot_id'] = str_pad((0+1), 3, '0', STR_PAD_LEFT);
        } else {
            $data['last_allot_id'] = str_pad(($last_allot[0]['id']+1), 3, '0', STR_PAD_LEFT);
        }
        $data['share_application'] = $this->Share_Model->shareApplicationList();
        $data['farmers'] = $this->Share_Model->shareAppliedFarmers();
        
        $this->load->view('share/allotment_shares/addshare_allotment', $data); 
	}
    
    
    public function postShareAllotment() {
        if( $this->Share_Model->postShareAllotment() ) {  
            redirect('administrator/share');
        } else {
            redirect('administrator/share/shareallotment');
        }                
	}
    
        
//    public function shareAppliedFarmer() {
//        $farmer_data = $this->Share_Model->shareAppliedFarmers();
//        $response = array("status" => 1, "farmer_data" => $farmer_data);
//        echo json_encode($response);
//	}
    /** Share application Allotment End **/
    
    
    
    public function getLocationByFpo($fpo_id) {
        $location_data = $this->Share_Model->getLocationByFpo( $fpo_id );
        $response = array("status" => 1, "location_data" => $location_data);
        echo json_encode($response);
	}
    
    
    public function searchFarmer() {
        $farmer_data = $this->Share_Model->searchFarmer();
        if($farmer_data) {
            if($this->Share_Model->searchMemberToFarmer($farmer_data[0]->id) > 0) {
                $response = array("status" => 0, "message" => "Already member of this selected FPO");
            } else {
                $response = array("status" => 1, "farmer_data" => $farmer_data);
            }            
        } else {
            $response = array("status" => 0, "message" => "No farmer available");
        }        
        echo json_encode($response);
	}
    
    
    public function searchFPO() {
        $fpo_data = $this->Share_Model->searchFPO();
        if($fpo_data) {
            if($this->Share_Model->searchMemberToFPO($fpo_data[0]->id) > 0) {
                $response = array("status" => 0, "message" => "Already member of this selected FPO");
            } else {
                $response = array("status" => 1, "fpo_data" => $fpo_data);
            }                        
        } else {
            $response = array("status" => 0, "message" => "No FPO available");
        }        
        echo json_encode($response);
	}
    
    
}
