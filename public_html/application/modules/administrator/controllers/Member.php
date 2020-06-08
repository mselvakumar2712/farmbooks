<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 || $this->session->userdata('user_type') != 0 ){ 
		 redirect('administrator/login/signout');
		}
        
        $this->load->model("Share_Model");
        $this->load->model("Member_Model");
        $this->load->model("Cropmaster_Model");
        $this->load->model("Fig_Model");
        
        header('Access-Control-Allow-Origin: *');        
	}

    
    public function index() {        
        $data['page'] = 'Member Application';
		$data['page_title'] = 'Member Application List';
        $data['page_module'] = 'share';	
        
        $data['members'] = $this->Member_Model->memberList();    
        $this->load->view('share/member/member_list', $data); 
	}    
    
    
    public function addmember() {        
        $data['page'] = 'Member Application';
		$data['page_title'] = 'Member Application Add';
        $data['page_module'] = 'share';	
        
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['fpo_list'] = $this->Fig_Model->fpoDropdownList(); 
        $this->load->view('share/member/addmember', $data); 
	}    
    
    
    public function viewmember($member_id) {        
        $data['page'] = 'Member Application';
		$data['page_title'] = 'Member Application View';
        $data['page_module'] = 'share';	
        
        //$data['member'] = $this->Member_Model->getMember($member_id);  
        $this->load->view('share/member/editmember', $data); 
	}    
	
        
    public function postMember() {        
//        print_r($this->input->post());
        if( $this->Member_Model->postMember() ) {  
            redirect('administrator/member');
        } else {
            redirect('administrator/member/addmember');
        }                
	}
    
    
    public function updateMember($member_id) {
//        if( $this->Member_Model->updateMember($member_id) ) {  
//            redirect('administrator/member');
//        } else {
//            redirect('administrator/member/viewmember');
//        }           
	}    
    
    
    public function deleteMember($member_id) {
//        if( $this->Share_Model->deleteMember($member_id) ) {  
//            redirect('administrator/member');
//        } else {
//            redirect('administrator/member/viewmember');
//        }           
	}  
    
    
    public function searchShareAllotment() {
        $member_data = $this->Member_Model->searchShareAllotment();
        if($member_data) {
            $response = array("status" => 1, "member_data" => $member_data);
        } else {
            $farmer_data = $this->Member_Model->getSearchMemberResult();
            $response = array("status" => 0, "message" => "No data available", "member_data" => $farmer_data);
        }        
        echo json_encode($response);
	}
    
    
    public function getAllFIGByFPO($fpo_id) {
        $fig_list = $this->Member_Model->getAllFIGByFPO($fpo_id);
        $response = array("status" => 1, "fig_list" => $fig_list);
        echo json_encode($response);
	}
        
    
    
}
