<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popi extends CI_Controller {

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
        $this->load->model("Popi_Model");
        $this->load->model("Login_Model");
        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
    
    
    
/** View FPG profile related view by using the given functions **/
   public function index() {        
      $data['page'] = 'POPI';
      $data['page_title'] = 'List POPI';
      $data['page_module'] = 'profile';
      $data['popi_list'] = $this->Popi_Model->popiList();
      $this->load->view('popi/popi_list', $data); 
	}    
    
	public function addpopi() {
        $data['page'] = 'POPI';
		$data['page_title'] = 'Add POPI'; 
        $data['page_module'] = 'profile';		
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
		$financial_year = date("Y-04-01");//year-month-date
		$data['financial_year']= $financial_year;
		$date_formation = date("Y-m-d");//year-month-date
		$data['date_formation']= $date_formation;
        $this->load->view('popi/addpopi', $data); 
	}
        
    public function viewpopi($popi_id) {
      $data['page'] = 'POPI';
      $data['page_title'] = 'View POPI'; 
      $data['page_module'] = 'profile';
      $data['popi_id'] = $popi_id;		
      $data['panchayat'] = $this->Login_Model->panchayat_list();
      $data['village'] = $this->Login_Model->village_list();
      $popi_list = $this->Popi_Model->popiByID($popi_id);
	  $financial_year = date("Y-04-01");//year-month-date
	  $data['financial_year']= $financial_year;
	  $date_formation = date("Y-m-d");//year-month-date
	  $data['date_formation']= $date_formation;
      $this->load->view('popi/editpopi', $data); 
	}
/** End FPG views **/    
    
  
/** POPI Start **/     
    public function popi_list()	{
        $popi_list = $this->Popi_Model->popiList();
        $response = array("status" => 1, "popi_list" => $popi_list);
        echo json_encode($response);
	}
       
    
    public function postpopi() {
		  if($this->popiValidator() == 0) {
           $response = array("status" => 0, "message" => "provide the mandatory fields");           
        } else
		  { 
           if($this->Login_Model->mobileNumberExists( $this->input->post('mobile_num') ) > 0){
               $response = array("status" => 0, "message" => "Mobile number already registered");               
           } else {
               if( $this->Popi_Model->addpopi() ) {  
                   $response = array("status" => 1, "message" => "New POPI created successfully");
               } else {
                   $response = array("status" => 0, "message" => "Technical problem");
               }                
           }
		  }        
        echo json_encode($response);
	}
    
    
    public function editpopi( $popi_id ) {
        $popi_list = $this->Popi_Model->popiByID( $popi_id );
        $response = array("status" => 1, "popi_list" => $popi_list);
        echo json_encode($response);
	}
    
    
    public function updatepopi( $popi_id ) {
	    if($this->popiValidator() == 0) {
           $response = array("status" => 0, "message" => "provide the mandatory fields");
           
        } else
		  {
            if( $this->Popi_Model->updatepopi( $popi_id )) {  
                $response = array("status" => 1, "message" => "POPI updated successfully");
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
            }
		  }
        echo json_encode($response);
	}
    
     function popiValidator() {
         if(empty($this->input->post('institution_type')) || empty($this->input->post('institution_name')) || empty($this->input->post('pin_code')) || empty($this->input->post('state')) || empty($this->input->post('district')) || empty($this->input->post('mobile_num')) || empty($this->input->post('email')) || empty($this->input->post('constitution')) ||empty($this->input->post('date_formation')) ||empty($this->input->post('pan_promoting_institution')) || empty($this->input->post('contact_person')) ||empty($this->input->post('nature_activity')) ||empty($this->input->post('financial_year')) ||empty($this->input->post('business_commence')) ||empty($this->input->post('status'))) {
            return false;
        } else {
            return true;
        }    
    }
    public function deletepopi( $popi_id ) {
        if( $this->Popi_Model->verifyChildByPOPI( $popi_id ) > 0 ) {
            $response = array("status" => 0, "message" => "You can't able to delete this POPI");
        } else if( $this->Popi_Model->deletepopi( $popi_id ) ) {
            $response = array("status" => 1, "message" => "POPI deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
/** POPI END **/
    
    
    function postFormData() {
        $popi = json_decode(file_get_contents('php://input'), true);
        if($popi) {
            $_POST['institution_type']          = $popi['institution_type'];
            $_POST['institution_name']          = $popi['institution_name'];
            $_POST['pin_code']                  = $popi['pin_code'];
            $_POST['state']                     = $popi['state'];
            $_POST['district']                  = $popi['district'];
            $_POST['block']                     = $popi['block'];
            $_POST['gram_panchayat']            = $popi['gram_panchayat'];
            $_POST['village']                   = $popi['village'];
            $_POST['door_no']                   = $popi['door_no'];
            $_POST['street']                    = $popi['street'];
            $_POST['std_code']                  = $popi['std_code'];
            $_POST['land_line']                 = $popi['land_line'];
            $_POST['mobile_num']                = $popi['mobile_num'];
            $_POST['email']                     = $popi['email'];
            $_POST['constitution']              = $popi['constitution'];
            $_POST['date_formation']            = $popi['date_formation'];
            $_POST['pan_promoting_institution'] = $popi['pan_promoting_institution'];
            $_POST['contact_person']            = $popi['contact_person'];
            $_POST['nature_activity']           = $popi['nature_activity'];
            $_POST['financial_year']            = $popi['financial_year'];
            $_POST['business_commence']         = $popi['business_commence'];
            $_POST['status']                    = $popi['status'];
           
            return true;
        } else {
            return false;
        }
    }
    
    
    public function profile($popi_id) {
        $data['page'] = 'POPI';
		$data['page_title'] = 'Edit POPI'; 
        $data['page_module'] = 'profile';		
        $data['popi_user_id'] = $popi_id;  
        $data['popi_list'] = $this->Popi_Model->popiByUserID( $popi_id );
        $data['popi_id'] = $data['popi_list'][0]->id;  
        $this->load->view('popi/popi_profile', $data); 
    }

    public function profile_update() {
        if( $this->Popi_Model->profile_update()) {  
            $response = array("status" => 1, "message" => "POPI updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        } 
        echo json_encode($response);
    }
	
	
	public function popiDropDownList() {
        $popi_list = $this->Popi_Model->popiDropDownList();
        $response = array("status" => 1, "popi_list" => $popi_list);
        echo json_encode($response);
	}

}
