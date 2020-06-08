<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operation extends CI_Controller {

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
      $this->load->model("Fpo_Model");
      $this->load->model("Login_Model");
      $this->load->model("Operation_Model");
      $this->load->model('Share_Model');
	  $this->load->model("Role_Model");
      $this->load->library('upload');
      header('Access-Control-Allow-Origin: *');
		if(!check_staff_permission($_SESSION['profile_type'], 8)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
	}
	
	
	//Upload Incorporation Documents 	
	public function incorporatelist(){
		if(!check_staff_permission($_SESSION['profile_type'], 801)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'incorporate_operation';
      $data['page_title'] = 'List Incorporate';
      $data['page_module'] = 'setting';		
      $data['user_list'] = $this->Operation_Model->corporatelist();	
      $this->load->view('operation/incorporate_operation/incorporatelist', $data); 
	} 
	public function addincorporate(){
		if(!check_staff_permission($_SESSION['profile_type'], 801)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'incorporate_operation';
      $data['page_title'] = 'Add Incorporate';
      $data['page_module'] = 'setting';
      $data['doc_type'] = $this->Operation_Model->DocumentType();      
   //   echo "<pre>"; print_r($data['doc_type']); die();
      $this->load->view('operation/incorporate_operation/addincorporate', $data); 
	}
	public function post_incorporate() {		
		if($this->Operation_Model->addincorporate()){
		$this->session->set_flashdata('success', 'Document Account successfully.'); 
				redirect('staff/operation/incorporatelist');			
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('staff/operation/incorporatelist');
		}
	}
	
	public function update_incorporate($id) {		
		if($this->Operation_Model->updateincorporate($id)){
		 $this->session->set_flashdata('success', 'Document updated successfully.');       
		redirect('staff/operation/incorporatelist');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		redirect('staff/operation/incorporatelist');
		}
	}
	public function grnpoitems($orderno) {
        $result=$this->Operation_Model->orderdetailsByOrderno($orderno);
		echo json_encode($result);
    }
	
	
	
	//}
	
	/* function postincorporateValidator() {
         if(empty($this->input->post('logger_id')) || empty(implode(',', $this->input->post('document_type'))) || empty(implode(',', $this->input->post('file_type')))) {
            return false;
        } else {
            return true;
        }    
    } */
	/* 
    public function viewincorporate() {        
        $data['page'] = 'incorporate_operation';
		$data['page_title'] = 'View Reappointment';
        $data['page_module'] = 'setting';		
        $this->load->view('operation/incorporate_operation/viewdirector', $data); 
	} */
	public function editincorporate($id) {        
        $data['page'] = 'incorporate_operation';
		$data['page_title'] = 'Edit Reappointment';
        $data['page_module'] = 'setting';
		$data['user_list'] = $this->Operation_Model->corporatelist();
		$data['user_info'] = $this->Operation_Model->corporateByID($id);	
	//print_r($data['user_info']);die();	
        $this->load->view('operation/incorporate_operation/editincorporate', $data); 
	}
	public function deleteincorporate( $po_id ) {
		$this->Operation_Model->delete_incorporate( $po_id );
		$this->session->set_flashdata('success', 'Upload Incorporate Document Deleted successfully');
        redirect('staff/operation/incorporatelist',"refresh");
	}

	//appointment of directors
	public function index(){
		if(!check_staff_permission($_SESSION['profile_type'], 80101)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'operation';
      $data['page_title'] = 'Appointment List';
      $data['page_module'] = 'operation';
      $fpo_id = $this->session->userdata('user_id');
      $data['director_list'] = $this->Operation_Model->director_list($fpo_id);   		
      $this->load->view('operation/appointment_of_directors/directorlist', $data); 
	} 
	public function adddirector(){
		if(!check_staff_permission($_SESSION['profile_type'], 80102)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'operation';
      $data['page_title'] = 'Add Appointment';
      $data['page_module'] = 'operation';
      $fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['appoint_date'] = $appointment_date->date_formation;
      $this->load->view('operation/appointment_of_directors/adddirector', $data); 
	}
    public function viewdirector($director_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80101)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'operation';
      $data['page_title'] = 'View Appointment';
      $data['page_module'] = 'operation';	
      $data['director_info'] = $this->Operation_Model->directorByID($director_id);		
      $this->load->view('operation/appointment_of_directors/viewdirector', $data); 
	}
	public function editdirector($director_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80103)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'operation';
      $data['page_title'] = 'Edit Appointment';
      $data['page_module'] = 'operation';
      $data['director_info'] = $this->Operation_Model->directorByID($director_id);
      $fpo_id = $this->session->userdata('user_id');
      $appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['appoint_date'] = $appointment_date->date_formation;
      $this->load->view('operation/appointment_of_directors/editdirector', $data); 
	}
	public function post_director() {
      //echo json_encode($this->input->post());
      $fpo_id = $this->session->userdata('user_id');
      if( $this->Operation_Model->add_director($fpo_id)){
         $this->session->set_flashdata('success', 'New Director added successfully.');       
         redirect('staff/operation');
      }else{
         $this->session->set_flashdata('warning', 'Data not inserted.');       
         redirect('staff/operation/adddirector');
      } 
	}
	public function update_director($director_id) {
      $fpo_id = $this->session->userdata('user_id');
      if($this->Operation_Model->update_director($director_id, $fpo_id)){
         $this->session->set_flashdata('success', 'Director updated successfully.');       
         redirect('staff/operation');
      }else{
         $this->session->set_flashdata('warning', 'Data not updated.');       
         redirect('staff/operation/editdirector');
      }
   }
	//reappointment of directors
	public function reappointmentlist(){
		if(!check_staff_permission($_SESSION['profile_type'], 802)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'reappointment';
		  $data['page_title'] = 'Reappointment List';
        $data['page_module'] = 'operation';	
        $data['reappoinment_list'] = $this->Operation_Model->reappoinment_list();		
        $this->load->view('operation/reappointment_of_directors/directorlist', $data); 
	} 
	public function addreappointment(){
		if(!check_staff_permission($_SESSION['profile_type'], 802)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'reappointment';
      $data['page_title'] = 'Add Reappointment';
      $data['page_module'] = 'operation';	
      $data['director'] = $this->Operation_Model->directorlist();
      $this->load->view('operation/reappointment_of_directors/adddirector', $data); 
	}
    public function viewreappointment($director_id){
		if(!check_staff_permission($_SESSION['profile_type'], 802)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'reappointment';
		  $data['page_title'] = 'View Reappointment';
        $data['page_module'] = 'operation';	
		  $data['director'] = $this->Operation_Model->directorlist();	
        $data['reappoinment_info'] = $this->Operation_Model->reappoinmentById($director_id);		
        $this->load->view('operation/reappointment_of_directors/viewdirector', $data); 
	}
	public function editreappointment($director_id){
		if(!check_staff_permission($_SESSION['profile_type'], 802)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'reappointment';
      $data['page_title'] = 'Edit Reappointment';
      $data['page_module'] = 'operation';	
      $data['director'] = $this->Operation_Model->directorlist();
      $reappointment_date = $this->Operation_Model->reappointment_date();
      $data['reappoint_date'] = date('Y-m-d', strtotime('+1 day', strtotime($reappointment_date->date_of_appointment)));        
      $data['reappoinment_info'] = $this->Operation_Model->reappoinmentById($director_id);			
      $this->load->view('operation/reappointment_of_directors/editdirector', $data); 
	}
	 public function getdirectordetail($director_id)  {
        $director_list = $this->Operation_Model->getdirectordetail($director_id);
        $response = array("status" => 1, "director_list" => $director_list);
        echo json_encode($response);
    } 
	public function post_reappointment() {
		$director_id = $this->input->post('director');
        //echo json_encode($this->input->post());
		if($director_id != '')
		{
		 if( $this->Operation_Model->add_reappointment($director_id)){
			 $this->session->set_flashdata('success', 'Re Appointment added successfully.');       
			 redirect('staff/operation');
			}else{
			 $this->session->set_flashdata('warning', 'Data not updated.');       
			 redirect('staff/operation/editreappointment');
		}
		}		
	}
	public function update_reappointment($director_id) {
		 if( $this->Operation_Model->update_reappointment($director_id)){
			 $this->session->set_flashdata('success', 'Re Appointmnet updated successfully.');       
			 redirect('staff/operation');
			}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/addreappointment');
		}
			
	}
	//removal of directors
	
	/* public function removallist() {        
        $data['page'] = 'removal';
		$data['page_title'] = 'Removal List';
        $data['page_module'] = 'operation';		
        $this->load->view('operation/removal_of_directors/removallist', $data); 
	} 
	public function addremoval() {        
        $data['page'] = 'removal';
		$data['page_title'] = 'Add Removal of Directors';
        $data['page_module'] = 'operation';		
        $this->load->view('operation/removal_of_directors/addremoval', $data); 
	} */
    public function viewremoval($director_id) {        
        $data['page'] = 'removal';
		$data['page_title'] = 'View Removal of Directors';
        $data['page_module'] = 'operation';
		$data['director'] = $this->Operation_Model->removal_list();	
		//print_r($data['director']);
		//die;
        $data['removal_info'] = $this->Operation_Model->removallist($director_id);
		
        $this->load->view('operation/removal_of_directors/viewremoval', $data); 
	}
	public function editremoval(){
		if(!check_staff_permission($_SESSION['profile_type'], 803)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'removal';
      $data['page_title'] = 'Edit Removal of Directors';
      $data['page_module'] = 'operation';	
      $data['director'] = $this->Operation_Model->Alldirectorlist();	
      $reappointment_date = $this->Operation_Model->reappointment_date();
      $data['reappoint_date'] = date('Y-m-d', strtotime('+1 day', strtotime($reappointment_date->date_of_appointment)));		
      $this->load->view('operation/removal_of_directors/editremoval', $data); 
	}
	public function update_removal(){		
		$director_id = $this->input->post('director');
        //echo json_encode($this->input->post());
		if($director_id != '')
		{
		 if($this->Operation_Model->add_removal($director_id)){
			 $this->session->set_flashdata('success', ' Appointment Removed successfully.');       
			 redirect('staff/operation');
			}else{
			 $this->session->set_flashdata('warning', 'Data not removed.');       
			 redirect('staff/operation/editremoval');
		}
		}		
	}
	
	//Constitution of Board of Directors 
	public function constitutionlist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80401)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'constitution';
      $data['page_title'] = 'Constitution List';
      $data['page_module'] = 'operation';
      $constitution_list = $this->Operation_Model->constitutionlist();
      $allowence_list = $this->Operation_Model->constitutionAllowanceList();
      $allowence_value = [];
      if($constitution_list){
		for($i=0;$i<count($allowence_list);$i++){
			array_push($allowence_value, $allowence_list[$i]->director_name);
		} 
		$constitution_list[0]->directors = $allowence_value;
      }
      $data['constitution_list'] = $constitution_list;
	  $data['active_constitution'] = $this->Operation_Model->getActiveConstitution();
      $this->load->view('operation/constitution_of_board_directors/constitutionlist', $data); 
	} 
	public function addconstitution(){
		if(!check_staff_permission($_SESSION['profile_type'], 80402)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'constitution';
      $data['page_title'] = 'Add Constitution of Directors';
      $data['page_module'] = 'operation';  
      $fpo_id = $this->session->userdata('user_id');
      $data['all_director'] = $this->Operation_Model->getAllDirector($fpo_id);	  
	   $today = date("Y-01-01");
	   $month = date("Y-m-30", strtotime("+2 months"));
      //
    
	  $next_month = date('Y-m-31', strtotime("+3 months", strtotime($month)));
     
	   $next_month1 = date('Y-m-31', strtotime("+3 months", strtotime($next_month)));
		$next_month2 = date('Y-m-31', strtotime("+3 months", strtotime($next_month1)));
		$data['month']= $month;
		$data['next_month']= $next_month;
		$data['next_month1']= $next_month1;
		$data['next_month2']= $next_month2;
	  //print_r($data);
      $this->load->view('operation/constitution_of_board_directors/addconstitution', $data); 
	}
   public function viewconstitution($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80401)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'constitution';
      $data['page_title'] = 'View Constitution of Directors';
      $data['page_module'] = 'operation';	  
      $data['constitution_info'] = $this->Operation_Model->constitutionByID($id);
      $data['constitution_date'] = $this->Operation_Model->constitutiondate($id);
      $this->load->view('operation/constitution_of_board_directors/viewconstitution', $data); 
	}
	public function editconstitution($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80403)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'constitution';
      $data['page_title'] = 'Edit Constitution of Directors';
      $data['page_module'] = 'operation';	
      $data['constitution_info'] = $this->Operation_Model->constitutionByID($id);	
      $data['constitution_date'] = $this->Operation_Model->constitutiondate($id);
      $this->load->view('operation/constitution_of_board_directors/editconstitution', $data); 
	}
		
	public function post_constitution() {
		//echo json_encode($this->input->post());
		//die;
		 if( $this->Operation_Model->addconstitution()){
			 $this->session->set_flashdata('success', 'New Constitution of board of directors added successfully.');       
			 redirect('staff/operation/constitutionlist');
			}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/addconstitution');
		} 
	}
	
	public function update_constitution($id) {
		//echo json_encode($this->input->post());
		//die;
		 if( $this->Operation_Model->updateconstitution($id)){
			 $this->session->set_flashdata('success', 'New Constitution of board of directors updated successfully.');       
			 redirect('staff/operation/constitutionlist');
			}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/constitutionlist');
		} 
	}
	
	
	
	//Committee members	
	public function committeelist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80501)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'committee';
      $data['page_title'] = 'Committee List';
      $data['page_module'] = 'operation';		
      $data['committee_list'] = $this->Operation_Model->committeelist();
      $this->load->view('operation/committee_members/committeelist', $data); 
	}
	
	public function getAllDirector() {
      $director_list = $this->Operation_Model->getAllDirector();
      $response = array("status" => 1, "director_list" => $director_list);
      echo json_encode($response);
   }
	
	public function post_committee() {	
		if($this->Operation_Model->addcommittee()){
		$this->session->set_flashdata('success', 'Committee Added successfully.'); 
		redirect('staff/operation/committeelist');				
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('staff/operation/committeelist');
		}
	}
	
	public function update_committee($id) {	
		if($this->Operation_Model->updatecommittee($id)){
         $this->session->set_flashdata('success', 'Document updated successfully.');       
         redirect('staff/operation/committeelist');
		}else{
         $this->session->set_flashdata('warning', 'Data not inserted.');       
         redirect('staff/operation/committeelist');
		}
	}
	
	public function addcommittee(){
		if(!check_staff_permission($_SESSION['profile_type'], 80502)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'committee';
      $data['page_title'] = 'Add Committee';
      $data['page_module'] = 'operation';
      $fpo_id = $this->session->userdata('user_id');
      $data['all_director'] = $this->Operation_Model->getAllDirector($fpo_id);
      $data['all_ceo'] = $this->Operation_Model->getAllCeo($fpo_id);
      $this->load->view('operation/committee_members/addcommittee', $data); 
	}
	
   public function viewcommittee($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80501)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'committee';
      $data['page_title'] = 'View Committee';
      $data['page_module'] = 'operation';	
      $data['committee_info'] = $this->Operation_Model->committeeByDynamic($id);	
      $this->load->view('operation/committee_members/viewcommittee', $data); 
	}
	
	public function editcommittee($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80503)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'committee';
      $data['page_title'] = 'Edit Committee';
      $data['page_module'] = 'operation';
      $fpo_id = $this->session->userdata('user_id');
      $data['committee_info'] = $this->Operation_Model->committeeByDynamic($id);		
      $director_info = $this->Operation_Model->committee_member($id,$fpo_id);
      $data['other_members'] = $director_info;
      $this->load->view('operation/committee_members/editcommittee', $data); 
	}
	
	public function deletecommittee( $committee_id,$director_id,$is_ceo ) {
      $this->Operation_Model->delete_committee( $committee_id,$director_id,$is_ceo );
      $this->session->set_flashdata('success', 'Committee Members Deleted successfully');
      redirect('staff/operation/committeelist',"refresh");
	}	
	//committee members ends
	
	
	//notice to directors
	public function getLocationByFpo($fpo_id) {
        $location_data = $this->Operation_Model->getLocationByFpo( $fpo_id );
        $response = array("status" => 1, "location_data" => $location_data);
        echo json_encode($response);
	}
	
	public function noticelist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80601)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'notice';
		$data['page_title'] = 'Notice List';
        $data['page_module'] = 'operation';
        $data['notice_list'] = $this->Operation_Model->noticelist();
		
        $this->load->view('operation/notice_to_directors/noticelist', $data); 
	} 
	public function addnotice(){
		if(!check_staff_permission($_SESSION['profile_type'], 80602)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'notice';
		$data['page_title'] = 'Add notice';
        $data['page_module'] = 'operation';	
		$data['fpo_list'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$this->load->view('operation/notice_to_directors/addnotice', $data); 
	}
	public function post_notice() {
        //echo json_encode($this->input->post());
		if( $this->Operation_Model->addnotice()){
			 $this->session->set_flashdata('success', 'New Notice added successfully.');       
			 redirect('staff/operation/noticelist');
		}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/addnotice');
		} 
	}
    public function viewnotice($director_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80601)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'notice';
		$data['page_title'] = 'View notice';
        $data['page_module'] = 'operation';
		$data['fpo_list'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$data['notice_info'] = $this->Operation_Model->notice_list($director_id);
        $this->load->view('operation/notice_to_directors/viewnotice', $data); 
	}
	public function editnotice($director_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80603)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'notice';
		$data['page_title'] = 'Edit notice';
        $data['page_module'] = 'operation';
		$data['notice_info'] = $this->Operation_Model->notice_list($director_id);
		$data['fpo_list'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
        $this->load->view('operation/notice_to_directors/editnotice', $data); 
	}
	public function update_notice($director_id) {
        //echo json_encode($this->input->post());
		if( $this->Operation_Model->updatenotice($director_id)){
			 $this->session->set_flashdata('success', 'Notice Updated successfully.');       
			 redirect('staff/operation/noticelist');
		}else{
			 $this->session->set_flashdata('warning', 'Data not Updated.');       
			 redirect('staff/operation/editnotice');
		} 
	}
	
	
	//meetings	
	public function meetinglist(){
		if(!check_staff_permission($_SESSION['profile_type'], 807)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'Meeting List';
        $data['page_module'] = 'operation';		
        $this->load->view('operation/meeting/meetinglist', $data); 
	} 	
	
	//board meeting
	public function boardmeetinglist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80701)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'List Board Meeting';
        $data['page_module'] = 'operation';	
		$data['boardmeeting'] = $this->Operation_Model->boardmeetinglist();
		$this->load->view('operation/meeting/boardmeeting/boardmeetinglist', $data); 
	}
	
	public function addboardmeeting(){
		if(!check_staff_permission($_SESSION['profile_type'], 80702)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
		$data['page'] = 'meeting';
		$data['page_title'] = 'Add Board Meeting';
		$data['page_module'] = 'operation';	
		$data['director'] = $this->Operation_Model->Alldirectorlist();	
		$fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
		$data['appoint_date'] = $appointment_date->date_formation;
		$this->load->view('operation/meeting/boardmeeting/addboardmeeting', $data); 
	}
	public function post_boardmeeting() {		
		if( $this->Operation_Model->addboardmeeting()){
			 $this->session->set_flashdata('success', 'New Board Meeting added successfully.');       
			 redirect('staff/operation/boardmeetinglist');
		}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/addboardmeeting');
		} 
	}
	public function post_updateboardmeeting($board_meeting_id) {
		if( $this->Operation_Model->updateboardmeeting($board_meeting_id)){
			 $this->session->set_flashdata('success', ' Board Meeting updated successfully.');       
			 redirect('staff/operation/boardmeetinglist');
		}else{
			 $this->session->set_flashdata('warning', 'Data not updated.');       
			 redirect('staff/operation/editboardmeeting');
		} 
	}
    public function viewboardmeeting($meeting_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80701)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'View Board Meeting';
        $data['page_module'] = 'operation';
		$data['director'] = $this->Operation_Model->Alldirectorlist();
		$data['boardmeeting'] = $this->Operation_Model->boardmeeting_detail( $meeting_id );
        $this->load->view('operation/meeting/boardmeeting/viewboardmeeting', $data); 
	}
	public function editboardmeeting($meeting_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80703)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
		$data['page'] = 'meeting';
		$data['page_title'] = 'Edit Board Meeting';
		$data['page_module'] = 'operation';
		$data['director'] = $this->Operation_Model->Alldirectorlist();
		$fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
		$data['appoint_date'] = $appointment_date->date_formation;
		$data['boardmeeting'] = $this->Operation_Model->boardmeeting_detail( $meeting_id );
        $this->load->view('operation/meeting/boardmeeting/editboardmeeting', $data); 
	}
	
	//Notice of board meeting
	public function boardnoticepdf($meeting_id) {		 
		//load mPDF library
		$this->load->library('m_pdf');
		
		$data['fpo_info'] =$this->Share_Model->fpoByID($this->session->userdata('user_id'));
        $data['generate_pdf'] = $this->Operation_Model->generatePdf($meeting_id);
		
		$directors=$this->Operation_Model->director_list($this->session->userdata('user_id'));
		$generate_pdf=$data['generate_pdf'];
		if(!empty($generate_pdf))
		{
			$pdf = $this->m_pdf->load();
			$pdfFilePath ="Board Meeting Notice.pdf";	
		for($i=0;$i<count($directors);$i++)
		{
			$data['director'] = $directors[$i];
		$html = $this->load->view('operation/meeting/boardmeeting/generate_boardmeeting/boardmeeting_pdf',$data, true);			
		$pdf->AddPageByArray(array(
			'orientation' => 'P',
			'format' => 'A4',
			'mgf' => '13',
		));
		$pdf->simpleTables = true;
		$pdf->WriteHTML($html);		
		}
		$pdf->Output($pdfFilePath, "D");
		exit;
		}
				
	} 	
   public function getconstitutiondetail($director_id) {
        $constitution_data = $this->Operation_Model->getconstitutiondetail( $director_id );
        $response = array("status" => 1, "constitution_data" => $constitution_data);
        echo json_encode($response);
	}
	public function getnoticedetail($fpo_id) {
        $notice_data = $this->Operation_Model->getnoticedetail( $fpo_id );
        $response = array("status" => 1, "notice_data" => $notice_data);
        echo json_encode($response);
	}
	public function alldirector() {
        $director_data = $this->Operation_Model->Alldirectorlist();
        $response = array("status" => 1, "director_data" => $director_data);
        echo json_encode($response);
	}
	
	//committee meeting
	public function committeemeetinglist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80704)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'List Committee Meeting';
        $data['page_module'] = 'operation';	
		$data['commiteemeeting'] = $this->Operation_Model->commiteemeetinglist();
		$this->load->view('operation/meeting/committeemeeting/committeemeetinglist', $data); 
	}
	public function addcommitteemeeting(){
		if(!check_staff_permission($_SESSION['profile_type'], 80705)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
		$data['page'] = 'meeting';
		$data['page_title'] = 'Add Committee Meeting';
		$data['page_module'] = 'operation';
		$data['commitee_director'] = $this->Operation_Model->Commiteedirectorlist();
		$this->load->view('operation/meeting/committeemeeting/addcommitteemeeting', $data); 
	}
	public function getcommiteememberdetail($commitee_id)  {
        $commitee_list = $this->Operation_Model->getcommiteememberdetail($commitee_id);
		for($i=0;$i<count($commitee_list);$i++){
			 if($commitee_list[$i]->is_ceo == 1){
				$ceo_name = $this->Operation_Model->getCEOMemberNameByID($commitee_list[$i]->director_id);				
				$commitee_list[$i]->member_name = $ceo_name->ceo_name;
			 } else {
				$director_name = $this->Operation_Model->getDirectorMemberNameByID($commitee_list[$i]->director_id);
				$commitee_list[$i]->member_name = $director_name->director_name; 
			} 	
		}		
		$response = array("status" => 1, "commitee_list" => $commitee_list);
        echo json_encode($response);
    } 
	public function getcommiteemember($commitee_id)  {
        $commitee_list = $this->Operation_Model->getcommiteemember($commitee_id);
		$response = array("status" => 1, "commitee_list" => $commitee_list);
        echo json_encode($response);
    } 
	public function post_committeemeeting() {
		  if($this->Operation_Model->addcommiteemeeting()){
			 $this->session->set_flashdata('success', 'New Commitee Meeting added successfully.');       
			 redirect('staff/operation/committeemeetinglist');
			}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/addcommitteemeeting');
		} 
	}
    public function viewcommitteemeeting($commitee_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80704)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'View Committee Meeting';
        $data['page_module'] = 'operation';
		$data['commitee_director'] = $this->Operation_Model->Commiteedirectorlist();
		$commiteemeeting = $this->Operation_Model->commiteemeeting_detail( $commitee_id );		
		for($i=0;$i<count($commiteemeeting);$i++){			
			$commitee = $this->Operation_Model->getCommiteeMemberById($commiteemeeting[$i]->attendee_id);
			if($commitee[0]->is_ceo == 1){
				$ceo_name = $this->Operation_Model->getCEOMemberNameByID($commitee[0]->director_id);				
				$commiteemeeting[$i]->member_name = $ceo_name->ceo_name;
			} else {
				$director_name = $this->Operation_Model->getDirectorMemberNameByID($commitee[0]->director_id);
				$commiteemeeting[$i]->member_name = $director_name->director_name; 
			}
		}		
		
		$data['commiteemeeting'] = $commiteemeeting;
        $this->load->view('operation/meeting/committeemeeting/viewcommitteemeeting', $data); 
	}
	public function editcommitteemeeting($commitee_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80706)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'Edit Committee Meeting';
        $data['page_module'] = 'operation';
		$data['commitee_director'] = $this->Operation_Model->Commiteedirectorlist();
		$commiteemeeting = $this->Operation_Model->commiteemeeting_detail( $commitee_id );		
		for($i=0;$i<count($commiteemeeting);$i++){			
			$commitee = $this->Operation_Model->getCommiteeMemberById($commiteemeeting[$i]->attendee_id);
			if($commitee[0]->is_ceo == 1){
				$ceo_name = $this->Operation_Model->getCEOMemberNameByID($commitee[0]->director_id);				
				$commiteemeeting[$i]->member_name = $ceo_name->ceo_name;
			} else {
				$director_name = $this->Operation_Model->getDirectorMemberNameByID($commitee[0]->director_id);
				$commiteemeeting[$i]->member_name = $director_name->director_name; 
			}
		}		
		
		$data['commiteemeeting'] = $commiteemeeting;
        $this->load->view('operation/meeting/committeemeeting/editcommitteemeeting', $data); 
	}
	public function post_updatecommitteemeeting($commitee_id) {	
		//echo json_encode($this->input->post());
		//die;
		  if($this->Operation_Model->updatecommiteemeeting($commitee_id)){
			 $this->session->set_flashdata('success', 'New Commitee Meeting added successfully.');       
			 redirect('staff/operation/committeemeetinglist');
			}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/addcommitteemeeting');
		} 
	}
	
	//annual meeting
	public function annualmeetinglist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80707)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'List Annual Meeting';
        $data['page_module'] = 'operation';	
		$data['annualmeeting'] = $this->Operation_Model->annualmeetinglist();
		$this->load->view('operation/meeting/annualmeeting/annualmeetinglist', $data); 
	}
	
	public function addannualmeeting(){
		if(!check_staff_permission($_SESSION['profile_type'], 80708)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'Add Annual Meeting';
        $data['page_module'] = 'operation';	
		$this->load->view('operation/meeting/annualmeeting/addannualmeeting', $data); 
	}
	public function getsharecount() {
        $share_data = $this->Operation_Model->Allshare_data();
        $response = array("status" => 1, "share_data" =>$share_data);
        echo json_encode($response);
	}
	public function post_annualmeeting() {
		  if($this->Operation_Model->addannualmeeting()){
			 $this->session->set_flashdata('success', 'New Commitee Meeting added successfully.');       
			 redirect('staff/operation/annualmeetinglist');
			}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/addannualmeeting');
		} 

	}
    public function viewannualmeeting($annualmeeting_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80707)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'View Annual Meeting';
        $data['page_module'] = 'operation';
		$data['annualmeeting'] = $this->Operation_Model->annualmeeting_detail($annualmeeting_id);
        $this->load->view('operation/meeting/annualmeeting/viewannualmeeting', $data); 
	}
	public function editannualmeeting($annualmeeting_id){
		if(!check_staff_permission($_SESSION['profile_type'], 80709)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'meeting';
		$data['page_title'] = 'Edit Annual Meeting';
        $data['page_module'] = 'operation';
		$data['annualmeeting'] = $this->Operation_Model->annualmeeting_detail($annualmeeting_id);
        $this->load->view('operation/meeting/annualmeeting/editannualmeeting', $data); 
	}
	public function post_updateannualmeeting($annualmeeting_id) {
		if($this->Operation_Model->updateannualmeeting($annualmeeting_id)){
			 $this->session->set_flashdata('success', 'New Commitee Meeting added successfully.');       
			 redirect('staff/operation/annualmeetinglist');
		}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/editannualmeeting');
		} 
	}
	
	//CEO
	public function ceolist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80801)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'ceo';
      $data['page_title'] = 'CEO List';
      $data['page_module'] = 'operation';
      $data['ceo_list'] = $this->Operation_Model->getCeoList();		
      $data['active_ceo'] = $this->Operation_Model->getActiveCeo();
      $this->load->view('operation/ceo/ceolist', $data); 
	}
	public function addceo(){
		if(!check_staff_permission($_SESSION['profile_type'], 80802)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
		$data['page'] = 'ceo';
		data['page_title'] = 'Add CEO';
		$data['page_module'] = 'operation';
		$data['fpo_list'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
		$data['appoint_date'] = $appointment_date->date_formation;
		$this->load->view('operation/ceo/addceo', $data); 
	}
    public function viewceo($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80801)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
		$data['page'] = 'ceo';
		$data['page_title'] = 'View CEO';
		$data['page_module'] = 'operation';
		$data['ceo'] = $ceo = $this->Operation_Model->getCeoByID($id);
		if(!empty($ceo)){         
			$data['taluk_info'] = $this->Login_Model->getTalukByPinCode($ceo['pincode']);
			$data['block_info'] = $this->Login_Model->getBlockByDistCode($ceo['district']);
			$data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($ceo['block']);
			$data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($ceo['panchayat']);
		}
        $this->load->view('operation/ceo/viewceo', $data); 
	}
	public function editceo($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80803)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'ceo';
      $data['page_title'] = 'Edit CEO';
      $data['page_module'] = 'operation';
      $data['ceo'] = $ceo = $this->Operation_Model->getCeoByID($id);
      if(!empty($ceo)){         
      $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($ceo['pincode']);
      $data['block_info'] = $this->Login_Model->getBlockByDistCode($ceo['district']);
      $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($ceo['block']);
      $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($ceo['panchayat']);
		}	
        $this->load->view('operation/ceo/editceo', $data); 
	}
	public function post_ceo() {
  		if( $this->Operation_Model->add_ceo()){
			 $this->session->set_flashdata('success', 'New CEO added successfully.');       
			 redirect('staff/operation/ceolist');
		} else {
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/ceolist');
		} 
	}
	public function update_ceo($ceo_id) {
      if($this->Operation_Model->update_ceo($ceo_id)){
         $this->session->set_flashdata('success', 'CEO updated successfully.');       
         redirect('staff/operation/ceolist');
      }else{
         $this->session->set_flashdata('warning', 'Data not updated.');       
         redirect('staff/operation/ceolist');
      }
    }
	
	//company secretary
	public function company_secretarylist(){
		if(!check_staff_permission($_SESSION['profile_type'], 80901)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'company secretary';
      $data['page_title'] = 'Company Secretary List';
      $data['page_module'] = 'operation';	
      $data['secretary_list'] = $this->Operation_Model->getSecretaryList();	
      $data['active_secretary'] = $this->Operation_Model->getActiveSecretary();	
      $this->load->view('operation/company_secretary/companysecretarylist', $data); 
	}
	public function addcompany_secretary(){
		if(!check_staff_permission($_SESSION['profile_type'], 80902)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'company secretary';
      $data['page_title'] = 'Add Company Secretary';
      $data['page_module'] = 'operation';
      $fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['appoint_date'] = $appointment_date->date_formation;      
      $data['secretary_turnover'] = $this->Operation_Model->getIsTurnoverSlab();	
      $this->load->view('operation/company_secretary/addcompany_secretary', $data); 
	}
    public function viewcompany_secretary($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80901)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'company secretary';
      $data['page_title'] = 'View Company Secretary';
      $data['page_module'] = 'operation';
      $data['secretary'] = $secretary = $this->Operation_Model->getSecretaryByID($id);
		if(!empty($secretary)){         
		$data['taluk_info'] = $this->Login_Model->getTalukByPinCode($secretary['pincode']);
		$data['block_info'] = $this->Login_Model->getBlockByDistCode($secretary['district']);
		$data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($secretary['block']);
		$data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($secretary['panchayat']);
		}
        $this->load->view('operation/company_secretary/viewcompany_secretary', $data); 
	}
	public function editcompany_secretary($id){
		if(!check_staff_permission($_SESSION['profile_type'], 80903)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'company secretary';
      $data['page_title'] = 'Edit Company Secretary';
      $data['page_module'] = 'operation';
      $fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['appoint_date'] = $appointment_date->date_formation;
      $data['secretary'] = $secretary = $this->Operation_Model->getSecretaryByID($id);
      if(!empty($secretary)){         
      $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($secretary['pincode']);
      $data['block_info'] = $this->Login_Model->getBlockByDistCode($secretary['district']);
      $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($secretary['block']);
      $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($secretary['panchayat']);
		}
        $this->load->view('operation/company_secretary/editcompany_secretary', $data); 
	}
   
	public function post_secretary() {
		if($result = $this->Operation_Model->add_secretary()){
				 $this->session->set_flashdata('success', 'New company secretary added successfully');       
				 redirect('staff/operation/company_secretarylist');
		} else {
			 $this->session->set_flashdata('warning', 'Company secretary not inserted.');       
			 redirect('staff/operation/company_secretarylist');
		} 
	}
   
	public function update_secretary($secretary_id) {     
      if($this->Operation_Model->update_secretary($secretary_id)){
         $this->session->set_flashdata('success', 'Company secretary updated successfully.');       
         redirect('staff/operation/company_secretarylist');
      }else{
         $this->session->set_flashdata('warning', 'Company secretary not updated.');       
         redirect('staff/operation/editcompany_secretary/'.$secretary_id);
      }
    }
	
	public function getCompanySecretaryInformation() {
        $secretaryInfo = $this->Operation_Model->getCompanySecretaryInformation();
        $response = array("status" => 1, "secretaryInfo" => $secretaryInfo);
        echo json_encode($response);
    }
	
	//Chartered Account
	public function charteredlist(){
		if(!check_staff_permission($_SESSION['profile_type'], 81001)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'chartered accountant';
      $data['page_title'] = 'Chartered Accountant List';
      $data['page_module'] = 'operation';	
      $data['accountant_list'] = $this->Operation_Model->getAccountantList();			
      $this->load->view('operation/chartered_account/charteredlist', $data); 
	}
	public function addchartered(){
		if(!check_staff_permission($_SESSION['profile_type'], 81002)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'chartered accountant';
      $data['page_title'] = 'Add Chartered Accountant';
      $data['page_module'] = 'operation';
      $fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['appoint_date'] = $appointment_date->date_formation; 		
      $this->load->view('operation/chartered_account/addchartered', $data); 
	}
    public function viewchartered($id){
		if(!check_staff_permission($_SESSION['profile_type'], 81001)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'chartered accountant';
      $data['page_title'] = 'View Chartered Accountant';
      $data['page_module'] = 'operation';
      $data['accountant'] = $accountant = $this->Operation_Model->getAccountantByID($id);
      if(!empty($accountant)){         
      $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($accountant['pincode']);
      $data['block_info'] = $this->Login_Model->getBlockByDistCode($accountant['district']);
      $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($accountant['block']);
      $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($accountant['panchayat']);
		}
        $this->load->view('operation/chartered_account/viewchartered', $data); 
	}
	public function editchartered($id){
		if(!check_staff_permission($_SESSION['profile_type'], 81003)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'chartered accountant';
      $data['page_title'] = 'Edit Chartered Accountant';
      $data['page_module'] = 'operation';
      $data['accountant'] = $accountant = $this->Operation_Model->getAccountantByID($id);
      if(!empty($accountant)){         
      $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($accountant['pincode']);
      $data['block_info'] = $this->Login_Model->getBlockByDistCode($accountant['district']);
      $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($accountant['block']);
      $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($accountant['panchayat']);
		}
        $this->load->view('operation/chartered_account/editchartered', $data); 
	}
	public function post_chartered_accountant() {
		if($this->Operation_Model->add_chartered_accountant()){
			 $this->session->set_flashdata('success', 'New chartered accountant added successfully.');       
			 redirect('staff/operation/charteredlist');
		} else {
			 $this->session->set_flashdata('warning', 'Chartered accountant not inserted.');       
			 redirect('staff/operation/charteredlist');
		} 
	}
	public function update_chartered_accountant($accountant_id) {
      if($this->Operation_Model->update_chartered_accountant($accountant_id)){
         $this->session->set_flashdata('success', 'Chartered accountant updated successfully.');       
         redirect('staff/operation/charteredlist');
      }else{
         $this->session->set_flashdata('warning', 'Chartered accountant not updated.');       
         redirect('staff/operation/editchartered/'.$accountant_id);
      }
    }
		
	public function getCharteredAccountantInformation() {
        $accountantInfo = $this->Operation_Model->getCharteredAccountantInformation();
        $response = array("status" => 1, "accountantInfo" => $accountantInfo);
        echo json_encode($response);
    }
	
	//Training to Directors
	public function training_directorslist(){
		if(!check_staff_permission($_SESSION['profile_type'], 81101)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'training directors';
      $data['page_title'] = 'List Training Directors ';
      $data['page_module'] = 'operation';		
      $data['directors_list'] = $this->Operation_Model->trainingOfDirectors($this->session->userdata('user_id'));
      $this->load->view('operation/training_directors/training_directorslist', $data); 
	}
	public function addtraining_directors(){
		if(!check_staff_permission($_SESSION['profile_type'], 81102)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'training directors';
      $data['page_title'] = 'Add Training Directors';
      $data['page_module'] = 'operation';		

      $data['directors'] = $this->Operation_Model->director_list($this->session->userdata('user_id'));
      $this->load->view('operation/training_directors/addtraining_directors', $data); 
	}
	public function postAddTrainingOfDirector() {
		if($this->Operation_Model->postAddTrainingOfDirector()){
			$this->session->set_flashdata('success', 'Training of director added successfully');       
			redirect('staff/operation/training_directorslist');	
		} else {
			$this->session->set_flashdata('warning', 'Training of director not inserted.');       
			redirect('staff/operation/company_secretarylist');
		} 
	}
    public function viewtraining_directors($training_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81101)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'training directors';
		$data['page_title'] = 'View Training Directors';
        $data['page_module'] = 'operation';
		
		$data['directors'] = $this->Operation_Model->director_list($this->session->userdata('user_id'));
		$data['director'] = $this->Operation_Model->getTrainingDirectorsById($training_id);
        $this->load->view('operation/training_directors/viewtraining_directors', $data); 
	}
	public function edittraining_directors($training_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81103)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'training directors';
		$data['page_title'] = 'Edit Training Directors';
        $data['page_module'] = 'operation';
		
		$data['directors'] = $this->Operation_Model->director_list($this->session->userdata('user_id'));
		$data['director'] = $this->Operation_Model->getTrainingDirectorsById($training_id);
        $this->load->view('operation/training_directors/edittraining_directors', $data); 
	}
	public function postUpdateTrainingOfDirector($training_id) {
		if($this->Operation_Model->postUpdateTrainingOfDirector($training_id)){
			$this->session->set_flashdata('success', 'Training of director updated successfully');       
			redirect('staff/operation/training_directorslist');	
		} else {
			$this->session->set_flashdata('warning', 'Training of director not updated');       
			redirect('staff/operation/edittraining_directors/'.$training_id);
		} 
	}	
	
	//Training to CEO
	public function training_ceolist(){        
		if(!check_staff_permission($_SESSION['profile_type'], 81201)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'training ceo';
      $data['page_title'] = 'List Training CEO ';
      $data['page_module'] = 'operation';         
      $data['ceos'] = $this->Operation_Model->getCeoTrainingList($this->session->userdata('user_id'));      
      $this->load->view('operation/training_ceo/training_ceolist', $data); 
	}
	public function addtraining_ceo(){
		if(!check_staff_permission($_SESSION['profile_type'], 81202)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'training ceo';
      $data['page_title'] = 'Add Training CEO';
      $data['page_module'] = 'operation';		
      $data['ceos'] = $this->Operation_Model->getCeoDropdownList($this->session->userdata('user_id'));
      $this->load->view('operation/training_ceo/addtraining_ceo', $data); 
	}
	public function postAddTrainingOfCEO(){
		if($this->Operation_Model->postAddTrainingOfCEO($this->session->userdata('user_id'))){
			 $this->session->set_flashdata('success', 'New training to CEO added successfully.');       
			 redirect('staff/operation/training_ceolist');
		} else {
			 $this->session->set_flashdata('warning', 'Training to CEO not inserted.');       
			 redirect('staff/operation/addtraining_ceo');
		} 
	}
    public function viewtraining_ceo($training_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81201)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'training ceo';
      $data['page_title'] = 'View Training CEO';
      $data['page_module'] = 'operation';
      $data['ceo'] = $this->Operation_Model->getCeoTrainingByID($training_id);
      $this->load->view('operation/training_ceo/viewtraining_ceo', $data); 
	}
	public function edittraining_ceo($training_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81203)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'training ceo';
      $data['page_title'] = 'Edit Training CEO';
      $data['page_module'] = 'operation';
      $data['ceos'] = $this->Operation_Model->getCeoDropdownList($this->session->userdata('user_id'));
      $data['ceo'] = $this->Operation_Model->getCeoTrainingByID($training_id);
      $this->load->view('operation/training_ceo/edittraining_ceo', $data); 
	}
	public function postUpdateTrainingOfCEO($training_id) {
		if($this->Operation_Model->postUpdateTrainingOfCEO($training_id)){
			 $this->session->set_flashdata('success', 'New training to CEO updated successfully.');       
			 redirect('staff/operation/training_ceolist');
		} else {
			 $this->session->set_flashdata('warning', 'Training to CEO not updated.');       
			 redirect('staff/operation/edittraining_ceo/'.$training_id);
		} 
	}
	
	
	//exposure
	public function exposurelist(){
		if(!check_staff_permission($_SESSION['profile_type'], 81301)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'exposure';
		$data['page_title'] = 'List Exposure ';
        $data['page_module'] = 'operation';	
        $data['exposure_list'] = $this->Operation_Model->exposureVisitlist();		
        $this->load->view('operation/exposure/exposurelist', $data); 
	}
	
	public function post_exposure_visit(){
		if($this->Operation_Model->addExposurevisit($this->session->userdata('user_id'))){
			 $this->session->set_flashdata('success', 'New exposure visit added successfully.');       
			 redirect('staff/operation/exposurelist');
		}
		else {
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('staff/operation/exposurelist');
		} 
	}
	
	public function addexposure(){
		if(!check_staff_permission($_SESSION['profile_type'], 81302)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'exposure';
		$data['page_title'] = 'Add Exposure';
        $data['page_module'] = 'operation';		
		$this->load->view('operation/exposure/addexposure', $data); 
	}
    public function viewexposure($exposure_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81301)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'exposure';
		$data['page_title'] = 'View Exposure';
        $data['page_module'] = 'operation';
		$data['exposure'] =$this->Operation_Model->exposureVisitByID($exposure_id);
        $this->load->view('operation/exposure/viewexposure', $data); 
	}
	public function editexposure($exposure_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81303)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'exposure';
		$data['page_title'] = 'Edit Exposure';
        $data['page_module'] = 'operation';
		$data['exposure'] =$this->Operation_Model->exposureVisitByID($exposure_id);
        $this->load->view('operation/exposure/editexposure', $data); 
	}
	
	public function postUpdateExposure() {  			
		if($this->Operation_Model->updateExposurevisit()){            
			$this->session->set_flashdata('success', 'Exposure visit updated successfully');       
			redirect('staff/Operation/exposurelist');
		}else{
			$this->session->set_flashdata('danger', 'Exposure visit not inserted');       
			redirect('staff/Operation/editexposure');
		} 
	}
	
	//Awareness
	public function awarenesslist(){
		if(!check_staff_permission($_SESSION['profile_type'], 81401)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'awareness';
      $data['page_title'] = 'List Awarness';
      $data['page_module'] = 'operation';	

      $data['awareness_list'] =$this->Operation_Model->awarnessProgramList($this->session->userdata('user_id'));
      $this->load->view('operation/awareness/awarenesslist', $data); 
	}
   
	public function addawareness(){
		if(!check_staff_permission($_SESSION['profile_type'], 81402)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'awareness';
		$data['page_title'] = 'Add Awarness';
        $data['page_module'] = 'operation';			
		$this->load->view('operation/awareness/addawareness', $data); 
	}
	
	public function postAddAwareness() { 
		//echo json_encode($this->input->post());		
		if(!empty($this->input->post('date_visit')) && is_array($this->input->post('village_name'))){
			if($this->Operation_Model->addAwarenessProgram()){            
				$this->session->set_flashdata('success', 'Awareness program added successfully');       
				redirect('staff/Operation/awarenesslist');
			}else{
				$this->session->set_flashdata('danger', 'Awareness program not inserted');       
				redirect('staff/Operation/addawareness');
			} 
        }else{
            $this->session->set_flashdata('danger', 'Awareness program not inserted, Provide the mandatory fields');       
            redirect('staff/Operation/addawareness');
        } 
	}
	
    public function viewawareness($awarenes_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81401)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'awareness';
		$data['page_title'] = 'View Awarness';
        $data['page_module'] = 'operation';
		
		$data['awareness'] =$this->Operation_Model->awarnessProgramByID($awarenes_id);
        $this->load->view('operation/awareness/viewawareness', $data); 
	}
	public function editawareness($awarenes_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81403)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'awareness';
		$data['page_title'] = 'Edit Awarness';
        $data['page_module'] = 'operation';
		
		$data['awareness'] =$this->Operation_Model->awarnessProgramByID($awarenes_id);
        $this->load->view('operation/awareness/editawareness', $data); 
	}
	
	public function postUpdateAwareness($awarenes_id) {  	
		if(!empty($this->input->post('date_visit')) && is_array($this->input->post('village_name'))){
			if($this->Operation_Model->updateAwarenessProgram($awarenes_id)){            
				$this->session->set_flashdata('success', 'Awareness program updated successfully');       
				redirect('staff/Operation/awarenesslist');
			}else{
				$this->session->set_flashdata('danger', 'Awareness program not updated');       
				redirect('staff/Operation/editawareness/'.$awarenes_id);
			} 
        }else{
            $this->session->set_flashdata('danger', 'Awareness program not updated, Provide the mandatory fields');       
            redirect('staff/Operation/editawareness/'.$awarenes_id);
        } 
	}
	
	public function getblockByFpo($fpo_id) {
        $location_data = $this->Operation_Model->getpanchayatByFpo( $fpo_id );
        $response = array("status" => 1, "location_data" => $location_data);
        echo json_encode($response);
	}
	
	public function removeImageFromClick() {
		unlink($this->input->post('image_url'));
		$response = array("status" => 1, 'message' => 'Uploaded "'.$this->input->post('image_url').'" removed successfully');
        echo json_encode($response);
	}
	

/** Cluster identification details **/
	public function clusterlist(){
		if(!check_staff_permission($_SESSION['profile_type'], 81501)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'cluster';
		  $data['page_title'] = 'List Cluster ';
        $data['page_module'] = 'operation';	
		  $data['clusters'] = $this->Operation_Model->clusterIdentificationList($this->session->userdata('user_id'));
        $this->load->view('operation/cluster_identification/clusterlist', $data); 
	}
	
	public function addcluster(){
		if(!check_staff_permission($_SESSION['profile_type'], 81502)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'cluster';
		  $data['page_title'] = 'Add Cluster';
        $data['page_module'] = 'operation';		
		  $this->load->view('operation/cluster_identification/addcluster', $data); 
	}
	
	public function postAddClusterIdentification() {  	
		//echo json_encode($this->input->post());
		//die;
		if($this->Operation_Model->addClusterIdentification()){            
			$this->session->set_flashdata('success', 'Cluster identification added successfully');       
			redirect('staff/Operation/clusterlist');		
        }else{
            $this->session->set_flashdata('danger', 'Cluster identification not inserted');       
            redirect('staff/Operation/addcluster');
        } 
	}
	
    public function viewcluster($cluster_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81501)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'cluster';
		$data['page_title'] = 'View Cluster';
        $data['page_module'] = 'operation';
		
		$data['cluster'] = $this->Operation_Model->clusterIdentificationByID($cluster_id);
        $this->load->view('operation/cluster_identification/viewcluster', $data); 
	}
	
	public function editcluster($cluster_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81503)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'cluster';
		$data['page_title'] = 'Edit Cluster';
        $data['page_module'] = 'operation';
		
		$data['cluster'] = $this->Operation_Model->clusterIdentificationByID($cluster_id);
        $this->load->view('operation/cluster_identification/editcluster', $data); 
	}
	
	public function postUpdateClusterIdentification() {  	
		//echo json_encode($this->input->post());
		//die;
		if($this->Operation_Model->updateClusterIdentification()){            
			$this->session->set_flashdata('success', 'Cluster identification added successfully');       
			redirect('staff/Operation/clusterlist');		
        }else{
            $this->session->set_flashdata('danger', 'Cluster identification not updated');       
            redirect('staff/Operation/addcluster');
        } 
	}
	
	public function getdistrictByFpo($fpo_id) {		
        $location_data = $this->Operation_Model->getdistrictByFpo( $fpo_id );
        $response = array("status" => 1, "location_data" => $location_data);
        echo json_encode($response);
	} 
	public function getvillages( $panchayat_id ) {
     $villageInfo = $this->Login_Model->getVillageByPanchayatcode( $panchayat_id );     
     $response = array("status" => 1, "villageInfo" => $villageInfo);
     echo json_encode($response);
    }
   public function getvillagesbyblock() {  
	  $panchayat_id = $this->input->post('block');
	  //print_r($panchayat_id[0]);
	  
	  $villageInfo = $this->Operation_Model->getVillageByblockcode($panchayat_id[0]);
	  $response = array("status" => 1, "villageInfo" => $villageInfo);
	  echo json_encode($response);
	 
   }
    public function getBlocksByDistrict($district_code) {
        $blockInfo = $this->Operation_Model->getBlocksByDistrict($district_code);

        $response = array("status" => 1, "blockInfo" => $blockInfo);
        echo json_encode($response);
    }
   public function farmerlist() {  
	  $village_id = $this->input->post('village');
	  $farmerInfo = $this->Operation_Model->getfarmerByvillage($village_id[0]);
	  $response = array("status" => 1, "farmerInfo" => $farmerInfo);
	  echo json_encode($response);
   }
/** Cluster identification part end **/	

	//generation of baseline information
	public function baselinelist(){
		if(!check_staff_permission($_SESSION['profile_type'], 81601)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'baseline';
		$data['page_title'] = 'List Generation of Baseline Information';
        $data['page_module'] = 'operation';	
		
		$data['baseline_info'] = $this->Operation_Model->baselineInformationList($this->session->userdata('user_id'));
		$this->load->view('operation/generation_baseline_information/baselinelist', $data); 
	}
	
	public function addbaseline(){
		if(!check_staff_permission($_SESSION['profile_type'], 81602)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'baseline';
		$data['page_title'] = 'Add Generation of Baseline Information';
        $data['page_module'] = 'operation';	
		
		$data['cluster_names'] = $this->Operation_Model->clusterIdentificationNames($this->session->userdata('user_id'));		
		/*$villages = ["57036","57037","1057038","57039","57040","57041","57042","57043","57044","57045","57046","57047","57048","57049","57050","57051","57052","57053","57054","57055","57056","57057","57058","57059","57060","57061","57062","57063","57064","57065","57066","57067","57068","57069","57070","57071","57072","57073","57074","57075","57076","57077","57078","57079","57080","57081","57082","57083","57084","57085","57086","57087","57088","57089","57090","57091","57092","57093","57094","57095","57096","57097","57098","57099","57100","57101","57102","57103","57104","57105","57106","57107","57108","57109","57110","57111","57112","57113","57114","57115","57116","57117","57118"];		
		$farmers_list = $this->Operation_Model->getFarmersByvillage($villages);
		$crop_growned = [];
		for($i=0;$i<count($farmers_list);$i++) {
			$farmer_land_ids = $this->Operation_Model->getLandByFarmer($farmers_list[$i]->id);
			for($j=0;$j<count($farmer_land_ids);$j++) {
				$crop_info = $this->Operation_Model->getCropByLandID($farmer_land_ids[$j]->id);
				for($k=0;$k<count($crop_info);$k++) {
					array_push($crop_growned, $crop_info[$k]);
				}				
			}
		} 
		//print_r($crop_growned);
		
		$crop_grown=[];
		for($crop=0;$crop<count($crop_growned);$crop++) {
			if(isset($crop_grown[$crop]['id']) && $crop_grown[$crop]['id'] == $crop_growned[$crop]->id) {
				if($crop_growned[$crop]->short_name == "Heactre") {
					$acre = $crop_growned[$crop]->area*2.471;
				} else if($crop_growned[$crop]->short_name == "SqM") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqF") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqI") {
					$hectare = $crop_growned[$crop]->area/15500031;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "Cent") {
					$acre = $crop_growned[$crop]->area/100;
				} else {
					$acre = $crop_growned[$crop]->area;
				}	
				$crop_grown[$crop]['acre'] = $crop_grown[$crop]['acre']+$acre;
			} else {
				$crop_grown[$crop]['id'] = $crop_growned[$crop]->id;
				$crop_grown[$crop]['crop_name'] = $crop_growned[$crop]->crop_name;
				$crop_grown[$crop]['area'] = $crop_growned[$crop]->area;
				$crop_grown[$crop]['area_uom'] = $crop_growned[$crop]->area_uom;
				if($crop_growned[$crop]->short_name == "Heactre") {
					$acre = $crop_growned[$crop]->area*2.471;
				} else if($crop_growned[$crop]->short_name == "SqM") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqF") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqI") {
					$hectare = $crop_growned[$crop]->area/15500031;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "Cent") {
					$acre = $crop_growned[$crop]->area/100;
				} else {
					$acre = $crop_growned[$crop]->area;
				}	
				$crop_grown[$crop]['acre'] = $acre;
			}
		}
		//print_r($crop_grown);
		
		$acre = array();
		foreach ($crop_grown as $key => $row){
			$acre[$key] = $row['acre'];
		}
		array_multisort($acre, SORT_DESC, $crop_grown);
		print_r($crop_grown);*/
		$this->load->view('operation/generation_baseline_information/addbaseline', $data); 
	}
	
	public function postAddBaselineInformation() {  	
		//echo json_encode($this->input->post());
		//die;
		if($this->Operation_Model->addBaselineInformation()){            
			$this->session->set_flashdata('success', 'Baseline information added successfully');       
			redirect('staff/Operation/baselinelist');		
        }else{
            $this->session->set_flashdata('danger', 'Baseline information not inserted');       
            redirect('staff/Operation/addbaseline');
        } 
	}
	
    public function viewbaseline($baseline_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81601)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'baseline';
		$data['page_title'] = 'View Generation of Baseline Information';
        $data['page_module'] = 'operation';
		
		$data['baseline_info'] = $this->Operation_Model->baselineInformationByID($baseline_id);
        $this->load->view('operation/generation_baseline_information/viewbaseline', $data); 
	}
	
	public function editbaseline($baseline_id){
		if(!check_staff_permission($_SESSION['profile_type'], 81603)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'baseline';
		$data['page_title'] = 'Edit Generation of Baseline Information';
        $data['page_module'] = 'operation';
		
		$data['cluster_names'] = $this->Operation_Model->clusterIdentificationNames($this->session->userdata('user_id'));
		$data['baseline_info'] = $this->Operation_Model->baselineInformationByID($baseline_id);
		
		/*$block_code = $this->Operation_Model->getBlocksByFpo($this->session->userdata('user_id'));
		$farmers_list = $this->Operation_Model->getFarmersByBlockCode($block_code[0]->block);
		$data['crop_grown'] = [];
		for($i=0;$i<count($farmers_list);$i++) {
			$farmer_land_ids = $this->Operation_Model->getLandByFarmer($farmers_list[$i]->id);
			for($j=0;$j<count($farmer_land_ids);$j++) {
				$crop_info = $this->Operation_Model->getCropByLandID($farmer_land_ids[$j]->id);
				for($k=0;$k<count($crop_info);$k++) {
					array_push($data['crop_grown'], $crop_info[$k]);
				}				
			}
		}
		//print_r($data['crop_grown']);*/
        $this->load->view('operation/generation_baseline_information/editbaseline', $data); 
	}
	
	public function postUpdateBaselineInformation() {  	
		//echo json_encode($this->input->post());
		//die;
		if($this->Operation_Model->updateBaselineInformation()){            
			$this->session->set_flashdata('success', 'Baseline information updated successfully');       
			redirect('staff/Operation/baselinelist');		
        }else{
            $this->session->set_flashdata('danger', 'Baseline information not updated');       
            redirect('staff/Operation/addbaseline');
        } 
	}

	public function getClusterInformation($cluster_id) {
        $clusterInfo = $this->Operation_Model->getClusterInformation($cluster_id);
        $response = array("status" => 1, "clusterInfo" => $clusterInfo);
        echo json_encode($response);
    }
	
	public function getFarmersByVillage() {  
		$villagesCovered = $this->input->post('villagesCovered');
		$farmerInfo = $this->Operation_Model->getFarmersByVillage($villagesCovered[0]);
		$wetland_count=0;$dryland_count=0;
		for($i=0;$i<count($farmerInfo);$i++){
			$wetland = $this->Operation_Model->getFarmersWetLand($farmerInfo[$i]->id);			
			$dryland = $this->Operation_Model->getFarmersDryLand($farmerInfo[$i]->id);
			
			$wetland_count = ($wetland_count+$wetland);
			$dryland_count = ($dryland_count+$dryland);
		}
		
		/** Crop Growned dropdown contents are here **/
		$crop_growned = [];
		for($i=0;$i<count($farmerInfo);$i++) {
			$farmer_land_ids = $this->Operation_Model->getLandByFarmer($farmerInfo[$i]->id);
			for($j=0;$j<count($farmer_land_ids);$j++) {
				$crop_info = $this->Operation_Model->getCropByLandID($farmer_land_ids[$j]->id);
				for($k=0;$k<count($crop_info);$k++) {
					array_push($crop_growned, $crop_info[$k]);
				}				
			}
		} 
		//print_r($crop_growned);
		
		$crop_grown=[];
		for($crop=0;$crop<count($crop_growned);$crop++) {
			if(isset($crop_grown[$crop]['id']) && $crop_grown[$crop]['id'] == $crop_growned[$crop]->id) {
				if($crop_growned[$crop]->short_name == "Heactre") {
					$acre = $crop_growned[$crop]->area*2.471;
				} else if($crop_growned[$crop]->short_name == "SqM") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqF") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqI") {
					$hectare = $crop_growned[$crop]->area/15500031;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "Cent") {
					$acre = $crop_growned[$crop]->area/100;
				} else {
					$acre = $crop_growned[$crop]->area;
				}	
				$crop_grown[$crop]['acre'] = $crop_grown[$crop]['acre']+$acre;
			} else {
				$crop_grown[$crop]['id'] = $crop_growned[$crop]->id;
				$crop_grown[$crop]['crop_name'] = $crop_growned[$crop]->crop_name;
				$crop_grown[$crop]['area'] = $crop_growned[$crop]->area;
				$crop_grown[$crop]['area_uom'] = $crop_growned[$crop]->area_uom;
				if($crop_growned[$crop]->short_name == "Heactre") {
					$acre = $crop_growned[$crop]->area*2.471;
				} else if($crop_growned[$crop]->short_name == "SqM") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqF") {
					$hectare = $crop_growned[$crop]->area/10000;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "SqI") {
					$hectare = $crop_growned[$crop]->area/15500031;
					$acre = $hectare*2.471;
				} else if($crop_growned[$crop]->short_name == "Cent") {
					$acre = $crop_growned[$crop]->area/100;
				} else {
					$acre = $crop_growned[$crop]->area;
				}	
				$crop_grown[$crop]['acre'] = $acre;
			}
		}
		
		$acre = array();
		foreach ($crop_grown as $key => $row){
			$acre[$key] = $row['acre'];
		}
		array_multisort($acre, SORT_DESC, $crop_grown);
		$crop_grown = array_slice($crop_grown, 0, 25, true);
		$response = array("status" => 1, "wetland_count" => $wetland_count, 'dryland_count' => $dryland_count, 'crop_grown' => $crop_grown);
		echo json_encode($response);
	}

}
