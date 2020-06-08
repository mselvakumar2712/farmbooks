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
      if (!$this->session->userdata('name') || /*$this->session->userdata('user_type') != 3  || */$this->session->userdata('is_active') == 0 ){  
         redirect('staff/signout');
      }
      $this->load->model("Share_Model");
      $this->load->model("Member_Model");
      $this->load->model("Role_Model");

      header('Access-Control-Allow-Origin: *'); 
		if(!check_staff_permission($_SESSION['profile_type'], 909)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
	}

    
    public function index(){
		if(!check_staff_permission($_SESSION['profile_type'], 90901)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Member Application';
		$data['page_title'] = 'Member Application List';
        $data['page_module'] = 'share';	
        
        $data['members'] = $this->Member_Model->memberList();        
        $this->load->view('share/member/member_list', $data); 
	}    
    
    
    public function addmember(){
		if(!check_staff_permission($_SESSION['profile_type'], 90902)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Member Application';
		$data['page_title'] = 'Member Application Add';
        $data['page_module'] = 'share';	
        
        $data['farmers'] = $this->Share_Model->farmerDropdownList();
        $data['fpo_list'] = $this->Share_Model->fpoDropdownList(); 
        $this->load->view('share/member/addmember', $data); 
	}    
    
    
    public function viewmember($member_id){
		if(!check_staff_permission($_SESSION['profile_type'], 90901)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Member Application';
		$data['page_title'] = 'Member Application View';
        $data['page_module'] = 'share';	
        
        $data['farmers'] = $this->Share_Model->farmerDropdownList();
        $data['fpo_list'] = $this->Share_Model->fpoDropdownList(); 
        $data['member'] = $this->Member_Model->getMember($member_id);  
        $this->load->view('share/member/editmember', $data); 
	}    
	
        
    public function postMember() {        
        //print_r($this->input->post());
        if( $this->Member_Model->postMember() ) {  
            redirect('staff/member');
        } else {
            redirect('staff/member/addmember');
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
        if($this->Member_Model->verifyRegisteredNumber($this->input->post('mobilenumber')) == 0) {
            $response = array("status" => 2, "message" => "Mobile number is not registered!!!");
        } else {
            $member_data = $this->Member_Model->searchShareAllotment();
            if($member_data) {
                $response = array("status" => 1, "member_data" => $member_data);
            } else {
                $holder_data = $this->Member_Model->getSearchMemberResult();
                $response = array("status" => 0, "message" => "No data available", "member_data" => $holder_data);
            }   
        }
        echo json_encode($response);
	}
    
    
    public function getAllFIGByFPO($fpo_id) {
        $fig_list = $this->Member_Model->getAllFIGByFPO($fpo_id);
        $response = array("status" => 1, "fig_list" => $fig_list);
        echo json_encode($response);
	}
        
    
    
}
