<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

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
//		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
//		  redirect('administrator/login');
//		}
        $this->load->model("Fpg_Model");
        $this->load->model("Login_Model");
        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
    
    
	public function index()	{
		redirect('administrator/login');
	}
    
    
    public function profile() {
        if($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2) {
            redirect('administrator/popi/profile/'.$this->session->userdata('user_id'));
        } else if($this->session->userdata('user_type') == 3) {
            redirect('administrator/fpo/profile/'.$this->session->userdata('user_id'));
        } else if($this->session->userdata('user_type') == 4) {
            redirect('administrator/fpg/profile/'.$this->session->userdata('user_id'));
        } else if($this->session->userdata('user_type') == 5) {
            redirect('administrator/fig/profile/'.$this->session->userdata('user_id'));
        } else if($this->session->userdata('user_type') == 6) {
            redirect('administrator/farmer/profile/'.$this->session->userdata('user_id'));
        } else if($this->session->userdata('user_type') == 0) {
            redirect('administrator/dashboard/');
        } else {
            redirect('administrator/member/profile/'.$this->session->userdata('user_id'));
        }
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
    
}
