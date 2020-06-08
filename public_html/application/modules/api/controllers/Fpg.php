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
        $this->load->view('fpg/fpglist', $data); 
	}    
    
	public function addfpg() {
        $data['page'] = 'FPG'; 
		$data['page_title'] = 'Add FPG';
		$data['page_module'] = 'profile';
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
        $data['blocks'] = $this->Login_Model->block_list();
		$data['fpo'] = $this->Fpg_Model->fpoDropdownList();
        $this->load->view('fpg/addfpg', $data); 
	}
        
    public function viewfpg() {
        $data['page'] = 'FPG'; 
		$data['page_title'] = 'View FPG';
		$data['page_module'] = 'profile';
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
        $data['blocks'] = $this->Login_Model->block_list();
		$data['fpo_list'] = $this->Fpo_Model->fpoList();
		$data['fpo'] = $this->Fpg_Model->fpoDropdownList();
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
		 if($this->fpgValidator() == 0) {
           $response = array("status" => 0, "message" => "provide the mandatory fields");
           
        } else
		  {
        if( $this->Fpg_Model->addfpg()) {  
            $response = array("status" => 1, "message" => "New FPG created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
		  }
        echo json_encode($response);
	}
    
    
	public function editfpg( $fpg_id ) {
        $fpg_list = $this->Fpg_Model->fpgByID( $fpg_id );
        $response = array("status" => 1, "fpg_list" => $fpg_list);
        echo json_encode($response);
	}
    
    
    public function updatefpg( $fpg_id ) {
		  if($this->fpgValidator() == 0) {
         $response = array("status" => 0, "message" => "provide the mandatory fields");
            
      } else{ 
        if( $this->Fpg_Model->updatefpg( $fpg_id )) {  
            $response = array("status" => 1, "message" => "FPG updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
		}
        echo json_encode($response);
	}
    
    function fpgValidator() {
		 //print_r($this->input->post());
         if(empty($this->input->post('fpo_name')) || empty($this->input->post('pin_code')) || empty($this->input->post('state')) || empty($this->input->post('district')) || empty($this->input->post('block')) || empty($this->input->post('taluk')) || empty($this->input->post('gram_panchayat')) ||empty($this->input->post('village')) ||empty($this->input->post('interest_group'))) {
            return false;
        } else {
            return true;
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
