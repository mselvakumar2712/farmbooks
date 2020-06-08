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
      if (!$this->session->userdata('name') /*|| $this->session->userdata('user_type') != 3  */|| $this->session->userdata('is_active') == 0 ){  
         redirect('staff/signout');
      }
      $this->load->model("Fpg_Model");
      $this->load->model("Login_Model");
	  $this->load->model("Role_Model");
      header('Access-Control-Allow-Origin: *');
		if(!check_staff_permission($_SESSION['profile_type'], 103)){
			redirect(base_url('staff/access_denied'), 'refresh');  
        }
	}
    

/** View FPG profile related view by using the given functions **/
	public function index(){
		if (!check_staff_permission($_SESSION['profile_type'], 10301)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
		
      $data['page'] = 'FPG';
      $data['page_title'] = 'List FPG';
      $data['page_module'] = 'profile';
      $data['fpg_info'] = $this->Fpg_Model->fpgList();
      $data['fpg_list'] = $this->Fpg_Model->fpgList();
      $this->load->view('fpg/fpglist', $data);  
	}    
    
	public function addfpg(){
		if (!check_staff_permission($_SESSION['profile_type'], 10302)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'FPG'; 
		$data['page_title'] = 'Add FPG';
		$data['page_module'] = 'profile';
                       
        $this->load->view('fpg/addfpg', $data); 
	}
        
    public function viewfpg($fpg_id) {
		if (!check_staff_permission($_SESSION['profile_type'], 10301)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
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
        $this->load->view('fpg/editfpg', $data); 
	}
/** End FPG views **/      

    
    
/** FPG Start **/  
    /* public function fpglist() {
        $fpg_list = $this->Fpg_Model->fpgList();
        $response = array("status" => 1, "fpg_list" => $fpg_list);
        echo json_encode($response);
	} */
        
    
    public function postfpg() {
		if($this->Fpg_Model->addfpg()){
		 $this->session->set_flashdata('success', 'New FPG added successfully.');       
		 redirect('staff/fpg');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('staff/fpg');
		}
	}
    

	/* public function editfpg( $fpg_id ) {		
        $fpg_list = $this->Fpg_Model->fpgByID( $fpg_id );
        $response = array("status" => 1, "fpg_list" => $fpg_list);
        echo json_encode($response);
	} */
    
    
    public function updatefpg( $fpg_id ) {
		if( $this->Fpg_Model->updatefpg( $fpg_id ) ) {
			$this->session->set_flashdata('success', 'FPG  updated successfully');       
			redirect('staff/fpg');
        } else {
            $this->session->set_flashdata('success', 'FPG  Not Deleted');       
			redirect('staff/fpg');
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
    
    
    /*public function profile( $fpg_id ) {
        $data['page'] = 'FPG';  
        $data['page_title'] = 'View FPG';
        $data['page_module'] = 'profile';
        $data['fpg_id'] = $fpg_id;  
        $data['fpg_list'] = $this->Fpg_Model->fpgByUserID( $fpg_id );        
        $this->load->view('fpg/fpg_profile',$data); 
    }
    
    public function profile_update() {
            if($this->Fpg_Model->profile_update()) {  
                    $response = array("status" => 1, "message" => "FPG updated successfully");
            } else {
                    $response = array("status" => 0, "message" => "Technical problem");
            }
    }*/
/** FPG END **/         
    
    
}
