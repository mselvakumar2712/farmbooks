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
      if(!$this->session->userdata('name') || $this->session->userdata('user_type') != 3 || $this->session->userdata('is_active') == 0 ){  
         redirect('administrator/login/signout');
      }

      $this->load->model("Share_Model");
      $this->load->model("Member_Model");
      $this->load->model("Farmer_Model");
      $this->load->model("Fpo_Model");
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
        
        //$data['farmers'] = $this->Share_Model->farmerDropdownList();
        //$data['fpo_list'] = $this->Share_Model->fpoDropdownList(); 
		$data['business'] = $this->Fpo_Model->businessDropdownList();
		$data['popi_list'] = $this->Member_Model->popiDropDownList();
		$financial_year_from = date("m") > 3?date("Y-04-01"):date("Y-04-01", strtotime('-1 year'));//year-month-date
		$financial_year_to = date("m") > 3?date("Y-03-31", strtotime('+1 year')):date("Y-03-31");
		$data['financial_year_from']= $financial_year_from;
		$data['financial_year_to']= $financial_year_to;
		$date_formation = date("Y-m-d");//year-month-date
		$data['date_formation']= $date_formation;
        $this->load->view('share/member/addmember', $data); 
	}    
    
    
    public function viewmember($member_id) {        
        $data['page'] = 'Member Application';
		$data['page_title'] = 'Member Application View';
        $data['page_module'] = 'share';	
        
        //$data['farmers'] = $this->Share_Model->farmerDropdownList();
        //$data['fpo_list'] = $this->Share_Model->fpoDropdownList(); 
        $member = $this->Member_Model->getMemberById($member_id); 
		if($member->member_type == 1){
			$info = $this->Member_Model->getShareInfoByMember($member->member_id, 1);
		} else {
			$info = $this->Member_Model->getShareInfoByMember($member->member_id, 2);
		}
		$member->totalShare = $info->total_share_value;
		$data['member'] = $member;
        $this->load->view('share/member/editmember', $data); 
	}    
	
        
    public function postMember(){        
        //echo json_encode($this->input->post());die;		
		if($this->input->post('member_type') == 2 && $this->input->post('popi_name') && $this->input->post('mobile_num') && $this->input->post('fpo_register_name')){
			if($this->Member_Model->registerFPO()){  
				redirect('fpo/member');
			}
		} else if($this->Member_Model->postMember()){  
			redirect('fpo/member');
		} else {
			redirect('fpo/member/addmember');		
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
