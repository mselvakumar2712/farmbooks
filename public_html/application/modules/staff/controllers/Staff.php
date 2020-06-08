<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

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
      $this->load->database();
	  $this->load->library("session");	  
      
      $this->load->library('form_validation');
      header('Access-Control-Allow-Origin: *');
   }
    
    
/** View FPG profile related view by using the given functions **/
    public function index() {   
      $data['page'] = 'Login';
      $data['page_module'] = 'Login';
      $data['page_title'] = 'Login';   
      $this->form_validation->set_rules('mobile_no', 'mobile_no', 'trim|required'); 
      $this->form_validation->set_rules('password', 'password', 'required|callback__validate_login');		
      $this->form_validation->set_message('_validate_login' . ' Login failed!');
      $this->form_validation->set_error_delimiters('<div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>', '</div>');

		   if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
			   redirect('staff/dashboard');
		   } else{
			   if ($this->form_validation->run() == FALSE) {
					$this->load->view('staff/login', $data);			  
			   } else {
                   redirect('staff/dashboard');
               }
		   }      
   }
    
    
   /***validate login****/
   function _validate_login() {
		$query = $this->db->get_where('trv_staff_member',array(
		'username' => $this->input->post('mobile_no'),
		'password' => $this->input->post('password'),
		'status'   => 1,
		));

	    if( $query->num_rows() > 0) {			
			$row = $query->row();         
            $logger_type = 'staff';
            $logger_id = $row->id;
            $profile_type = $row->profile_type;
            $logger_name = $row->staff_name;
            $parent_id = $row->fpo_id;
            $session_data = array(
                "user_type"   => 'SM',
                "user_id"     => $parent_id,
                "username"    => $row->username,   
                "logger_type" => $logger_type,
                "name"        => $logger_name,
                "logger_id"   => $logger_id,
                "profile_type"=> $profile_type,
                "is_active"   => '1'
            );
            $this->session->set_userdata($session_data);
            return true;
        } else {            
			$this->session->set_flashdata('danger','login failed');        
		    redirect('staff');            
			return false;
        }
    }	
    
    
    public function access_denied() {
        $data['page'] = 'Change Password';
        $data['page_title'] = 'Change Password';
        $this->load->view('staff/access_denied', $data);
	}
    
    
	public function profile($fpo_id) {
         $data['page'] = 'FPO';
		 $data['page_title'] = 'View FPO';
         $data['page_module'] = 'fpo-profile';		
		 $data['fpo_id'] = $fpo_id;	
		 $data['fpo_list'] = $this->Fpo_Model->fpoByUserID($fpo_id);		 
	     $this->load->view('staff/staff_profile',$data); 
	}
    
	public function profile_update() {
        if( $this->Fpo_Model->profile_update()) {  
                $response = array("status" => 1, "message" => "FPG updated successfully");
        } else {
                $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
	
	/** Change profile password function's **/
    public function changepassword($user_id) {
		$data['page'] = 'Change Password';
        $data['page_title'] = 'Change Password';
        $data['user_id'] = $user_id;
        $this->load->view('password/changepassword', $data);
    }	
	
	public function change_password() { 
         if($this->Login_Model->checkpassword($this->input->post('old_password')) == 0) {
            $response = array("status" => 0, "message" => "Current password is wrong, Try again!");
            
        } else if($this->input->post('old_password') == $this->input->post('password')) {
            $response = array("status" => 0, "message" => "Password does not match with old password");
            
        } else if($this->input->post('password') != $this->input->post('confirmpassword')) {
            $response = array("status" => 0, "message" => "Password & Confirm password is not matched");
          
        } else {
            if($this->Login_Model->changepassword()) {
                $response = array("status" => 1, "message" => "Password updated successfully");
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
            }            
        }
        echo json_encode($response);          
    }
    
 
    public function signout() {
      $session_data = array(
         "user_type"   => "",
         "user_id"     => "",
         "username"    => "",   
         "password"    => "",
         "logger_type" => "",
         "name"        => "",
         "logger_id"   => "",
         "is_active"   => "",
      );             
      $this->session->unset_userdata($session_data);
      $this->session->sess_destroy();
      redirect('staff', 'refresh');
    }    
}
