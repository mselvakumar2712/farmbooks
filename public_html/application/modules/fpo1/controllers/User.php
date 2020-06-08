<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		if (!$this->session->userdata('name')  || $this->session->userdata('user_type') != 3  || $this->session->userdata('is_active') == 0 ){  
         redirect('administrator/login/signout');
		}
      $this->load->model("User_Model");		
      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}
    
    
//user management//  
    public function checkusername($mobilenumber) {
        if( $this->User_Model->mobileNumberExists( $mobilenumber ) > 0) {
            $response = array("status" => 0, "message" => "Mobile number is already registered");
        } else {
            $response = array("status" => 1, "message" => "Mobile number is available");
        }
        echo json_encode($response);
   }
  
    public function index() {        
        $data['page'] = 'User Management';
		$data['page_title'] = 'List User';
        $data['page_module'] = 'user';	
        $data['user_list'] = $this->User_Model->userlist();	
        $this->load->view('user/userlist', $data); 
	}    
    	
	public function adduser() {        
        $data['page'] = 'User Management';
		$data['page_title'] = 'Add User';
        $data['page_module'] = 'user';		
		$data['role_list'] = $this->User_Model->getRoleNameList();
        $this->load->view('user/adduser', $data); 
	} 
	

	public function viewuser($id) {        
        $data['page'] = 'User Management';
		$data['page_title'] = 'Add User';
        $data['page_module'] = 'user';	
		$data['user_info'] = $this->User_Model->userByID($id);
        $data['role_list'] = $this->User_Model->getRoleNameList();
        $this->load->view('user/viewuser', $data); 
	} 
	public function edituser($id) {        
        $data['page'] = 'User Management';
		$data['page_title'] = 'Add User';
        $data['page_module'] = 'user';	
		$data['user_info'] = $this->User_Model->userByID($id);
        $data['role_list'] = $this->User_Model->getRoleNameList();
        $this->load->view('user/edituser', $data); 
	}

	public function post_user() {
		if( $this->User_Model->adduser()){
		 $this->session->set_flashdata('success', 'New User added successfully.');       
		 redirect('fpo/user');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('user/adduser');
		}
	}
        
    public function updateuser($id) {
		//$state_id=$this->input->post('state_id');
		if($this->User_Model->updateuser($id)){
		 $this->session->set_flashdata('success', 'User updated successfully.');       
		 redirect('fpo/user');
		}else{
		 $this->session->set_flashdata('warning', 'Data not updated.');       
		 redirect('user/edituser');
		}
	}
    
    
    public function delete_user() {
	//	$this->User_Model->deleteuser( $state_id );
		$this->session->set_flashdata('success', 'User Deleted successfully');
        redirect('fpo/user',"refresh");
	}
	
	//user end//
	
	
        	
}
