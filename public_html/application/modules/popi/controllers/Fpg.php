<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fpg extends CI_Controller {

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
        $this->load->model("Fpg_Model");
        $this->load->model("Login_Model");
		$this->load->model("Fpo_Model");
        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
    

/** View FPG profile related view by using the given functions **/
    public function index() {        
      $data['page'] = 'FPG';
		$data['page_title'] = 'List FPG';
		$data['page_module'] = 'profile';
		$data['fpg_info'] = $this->Fpg_Model->fpgList();
	//echo $this->session->userdata('user_type');
      $this->load->view('fpg/fpglist', $data); 
	}    
    
	public function addfpg() {
      $data['page'] = 'FPG'; 
      $data['page_title'] = 'Add FPG';
      $data['page_module'] = 'profile';
      $data['fpo'] = $this->Fpg_Model->fpoDropdownList();
      $this->load->view('fpg/addfpg', $data); 
	}
        
    public function viewfpg($fpg_id) {
      $data['page'] = 'FPG'; 
      $data['page_title'] = 'View FPG';
      $data['page_module'] = 'profile';
      $fpg_list = $this->Fpg_Model->fpgByID( $fpg_id );
      if(!empty($fpg_list)){         
         $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($fpg_list->PIN_Code);
         $data['block_info'] = $this->Login_Model->getBlockByDistCode($fpg_list->district);
         $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($fpg_list->block);
         $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($fpg_list->Gram_PanchayatID);
		}
      $data['fpg_info'] = $fpg_list;
      $data['fpo_list'] = $this->Fpo_Model->fpoList();
      $data['fpo'] = $this->Fpg_Model->fpoDropdownList();
      //print_r($data['fpo']); die();
      $this->load->view('fpg/editfpg', $data); 
	}
/** End FPG views **/      

    
    
/** FPG Start **/  
    public function fpglist() {
        $fpg_list = $this->Fpg_Model->fpgList();
        $response = array("status" => 1, "fpg_list" => $fpg_list);
        echo json_encode($response);
	}
        
    
    public function postfpg() {
        if( $this->Fpg_Model->addfpg()) {  
            $response = array("status" => 1, "message" => "New FPG created successfully");
			redirect('popi/fpg');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
			redirect('popi/fpg');
        }
	}
    
    
	public function editfpg( $fpg_id ) {
        $fpg_list = $this->Fpg_Model->fpgByID( $fpg_id );
        $response = array("status" => 1, "fpg_list" => $fpg_list);
        echo json_encode($response);
	}
    
    
    public function updatefpg( $fpg_id ) {
        if( $this->Fpg_Model->updatefpg( $fpg_id )) {  
            $response = array("status" => 1, "message" => "FPG updated successfully");
			redirect('popi/fpg');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
			redirect('popi/fpg');
        }
  	}
    
    
    public function deletefpg( $fpg_id ) {
        if( $this->Fpg_Model->deletefpg( $fpg_id ) ) {
            $response = array("status" => 1, "message" => "FPG deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}	
    
    
    public function profile( $fpg_id ) {
        $data['page'] = 'FPG';  
        $data['page_title'] = 'View FPG';
        $data['page_module'] = 'profile';
        $data['fpg_id'] = $fpg_id;  
        $data['fpg_list'] = $this->Fpg_Model->fpgByUserID( $fpg_id );        
        $this->load->view('fpg/fpg_profile',$data); 
    }
    
    public function profile_update() {
            if( $this->Fpg_Model->profile_update()) {  
                    $response = array("status" => 1, "message" => "POPI updated successfully");
            } else {
                    $response = array("status" => 0, "message" => "Technical problem");
            }
      }
/** FPG END **/         
    
    
}
