<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fpo extends CI_Controller {

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
      if (!$this->session->userdata('name')  || $this->session->userdata('user_type') != 3  || $this->session->userdata('is_active') == 0 ){  
         redirect('administrator/login/signout');
      }
      $this->load->model("Fpo_Model"); 
      $this->load->model("Login_Model");
      $this->load->model("Fpg_Model");
      $this->load->model("Fig_Model");
      $this->load->model("Farmer_Model");
      $this->load->model("Variety_Model");
      $this->load->model("Masterdata_Model");
      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}
    
    
/** View FPG profile related view by using the given functions **/
    public function index() {        
        $data['page'] = 'FPO';
		$data['page_title'] = 'List FPO';
		$data['page_module'] = 'profile';
        $this->load->view('fpolist', $data); 
	}    
    
	public function addfpo() {
        $data['page'] = 'FPO';
		$data['page_title'] = 'Add FPO';
        $data['page_module'] = 'profile';		
        
        
        $this->load->view('addfpo', $data); 
	}
        
    public function viewfpo() {
        $data['page'] = 'FPO';
		$data['page_title'] = 'View FPO';
        $data['page_module'] = 'profile';		
        
        
        $this->load->view('editfpo', $data); 
	}
/** End FPG views **/
    
/** FPO Start **/
    public function fpolist() {
        $fpo_list = $this->Fpo_Model->fpoList();
        $response = array("status" => 1, "fpo_list" => $fpo_list);
        echo json_encode($response);
	}
    
    
    public function postfpo() {
        if( $this->Fpo_Model->addfpo()) {  
            $response = array("status" => 1, "message" => "New FPO created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
	public function editfpo( $fpo_id ) {
        $fpo_list = $this->Fpo_Model->fpoByID( $fpo_id );
        $response = array("status" => 1, "fpo_list" => $fpo_list);
        echo json_encode($response);
	}
    
    
    public function updatefpo( $fpo_id ) {
//        $fpoData = $this->postFormData();
//        if($fpoData) {
            if( $this->Fpo_Model->updatefpo( $fpo_id )) {  
                $response = array("status" => 1, "message" => "FPO updated successfully");
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
            }
//        } else {
//            $response = array("status" => 0, "message" => "Provide the mandatory fields");
//        }
        echo json_encode($response);
	}
    
    
    public function deletefpo( $fpo_id ) {
        if( $this->Fpo_Model->deletefpo( $fpo_id ) ) {
            $response = array("status" => 1, "message" => "FPO deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
/** FPO END **/  
    
    
    
    function postFormData() {
        $fpo = json_decode(file_get_contents('php://input'), true);
        if($fpo) {
            $_POST['institution_name']          = $fpo['institution_name'];
            $_POST['pin_code']                  = $fpo['pin_code'];
            $_POST['state']                     = $fpo['state'];
            $_POST['district']                  = $fpo['district'];
            $_POST['block']                     = $fpo['block'];
            $_POST['gram_panchayat']            = $fpo['gram_panchayat'];
            $_POST['village']                   = $fpo['village'];
            $_POST['door_no']                   = $fpo['door_no'];
            $_POST['street']                    = $fpo['street'];
            $_POST['std_code']                  = $fpo['std_code'];
            $_POST['land_line']                 = $fpo['land_line'];
            $_POST['mobile_num']                = $fpo['mobile_num'];
            $_POST['email']                     = $fpo['email'];
            $_POST['constitution']              = $fpo['constitution'];
            $_POST['date_formation']            = $fpo['date_formation'];
            $_POST['reg_no']                    = $fpo['reg_no'];
            $_POST['pan']                       = $fpo['pan'];
            $_POST['tax_deduction']             = $fpo['tax_deduction'];
            $_POST['gst']                       = $fpo['gst'];
            $_POST['ie_code']                   = $fpo['ie_code'];
            $_POST['contact_person_name']       = $fpo['contact_person_name'];
            $_POST['business_type']             = $fpo['business_type'];
            $_POST['business_nature']           = $fpo['business_nature'];
            $_POST['inventory_required']        = $fpo['inventory_required'];
            $_POST['financial_year']            = $fpo['financial_year'];
            $_POST['business_from']             = $fpo['business_commence_from'];
           
            return true;
        } else {
            return false;
        }
    }
    
    
    public function profile($fpo_id) {
         $data['page'] = 'FPO';
		 $data['page_title'] = 'View FPO';
         $data['page_module'] = 'fpo-profile';		
		 $data['fpo_id'] = $fpo_id;	
		 $data['fpo_list'] = $this->Fpo_Model->fpoByUserID($fpo_id);
		 $business_nature = explode(",", $data['fpo_list'][0]->business_nature);
		 $nature_business  = $this->Masterdata_Model->businessnatureName($business_nature);
		 $all_business = array();
		 if(!empty($nature_business)){
			 foreach($nature_business as $business)
				$all_business[] = $business->name;
			$nature_business = implode(',',$all_business);
		 }
		 $data['nature_business'] = $nature_business;
	     $this->load->view('fpo/fpo_profile',$data); 
	}
    
	public function profile_update() {
        if( $this->Fpo_Model->profile_update()) {  
                $response = array("status" => 1, "message" => "POPI updated successfully");
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
    
}
