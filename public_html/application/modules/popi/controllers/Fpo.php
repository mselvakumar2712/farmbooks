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
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
         redirect('administrator/login/signout');
		}
        $this->load->model("Fpo_Model"); 
        $this->load->model("Login_Model");
        $this->load->model("Masterdata_Model");
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
    
    
/** View FPG profile related view by using the given functions **/
    public function index() {
      //echo "<pre>";print_r($this->session->userdata());die;
      $data['page'] = 'FPO';
      $data['page_title'] = 'List FPO';
      $data['page_module'] = 'profile';
      $data['fpo_info'] = $this->Fpo_Model->fpoList();
      $this->load->view('fpo/fpolist', $data); 
	}    
    
	public function addfpo() {      
		$data['page'] = 'FPO';
		$data['page_title'] = 'Add FPO';
		$data['page_module'] = 'profile';	
		$data['business'] = $this->Fpo_Model->businessDropdownList();		
		
		$financial_year_from = date("m") > 3?date("Y-04-01"):date("Y-04-01", strtotime('-1 year'));//year-month-date
		$financial_year_to = date("m") > 3? date("Y-03-31", strtotime('+1 year')):date("Y-03-31");
		$data['financial_year_from']= $financial_year_from;
		$data['financial_year_to']= $financial_year_to;
		$date_formation = date("Y-mm-dd");//year-month-date
		$data['date_formation']= $date_formation;      
		$this->load->view('fpo/addfpo', $data); 
      //echo "<pre>";print_r($data);die;
	}
        
    public function viewfpo($fpo_id) {
		$data['page'] = 'FPO';
		$data['page_title'] = 'View FPO';
		$data['page_module'] = 'profile';	
		$data['business'] = $this->Fpo_Model->businessDropdownList();
		$data['fpo_info'] =$this->Fpo_Model->fpoByID($fpo_id);
		$data['panchayat'] = '';
		$data['village'] = '';
		$fpo_list = $this->Fpo_Model->fpoByID($fpo_id);
		if(!empty($fpo_list)){         
         $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($fpo_list['pin_code']);
		// print_r($fpo_list['pin_code']);
         $data['block_info'] = $this->Login_Model->getBlockByDistCode($fpo_list['district']);
         $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($fpo_list['block']);
         $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($fpo_list['panchayat']);
		}
		$data['fpo_info']= $fpo_list;
		//print_r($data['fpo_info']);
		//die;
		$data['business_nature'] = $this->Fpo_Model->business_nature_list();
		$financial_year_from = date("Y-04-01");//year-month-date
		$financial_year_to = date("Y-03-31", strtotime('+1 year'));
		$data['financial_year_from']= $financial_year_from;
		$data['financial_year_to']= $financial_year_to;
		$date_formation = date("Y-mm-dd");//year-month-date
		$data['date_formation']= $date_formation;
		$this->load->view('fpo/editfpo', $data); 
      
    // echo "<pre>"; print_r($data); die();
      
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
			redirect('popi/fpo');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
			redirect('popi/fpo');
        } 
	}
    
    
	public function editfpo( $fpo_id ) {
        $fpo_list = $this->Fpo_Model->fpoByID( $fpo_id );
		// print_r($fpo_list); die;
		  
        $response = array("status" => 1, "fpo_list" => $fpo_list);
        echo json_encode($response);
	}
    
    
    public function updatefpo( $fpo_id ) {
//        $fpoData = $this->postFormData();
//        if($fpoData) {
            if( $this->Fpo_Model->updatefpo( $fpo_id )) {  
                $response = array("status" => 1, "message" => "FPO updated successfully");
				redirect('popi/fpo');
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
				redirect('popi/fpo');
            }
//        } else {
//            $response = array("status" => 0, "message" => "Provide the mandatory fields");
//        }
       
	}
    
    
    public function deletefpo( $fpo_id ) {
        if( $this->Fpo_Model->verifyFIGChildByFPO( $fpo_id ) > 0 || $this->Fpo_Model->verifyFPGChildByFPO( $fpo_id ) > 0 ) {
            $response = array("status" => 0, "message" => "You can't able to delete this FPO");
        } else if( $this->Fpo_Model->deletefpo( $fpo_id ) ) {
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
            $_POST['business_from']             = $fpo['business_from'];
           
            return true;
        } else {
            return false;
        }
    }
    
    
    public function profile($fpo_id) {
        $data['page'] = 'FPO';
		$data['page_title'] = 'View FPO';
        $data['page_module'] = 'profile';		
		$data['fpo_id'] = $fpo_id;	
		$data['fpo_list'] = $this->Fpo_Model->fpoByUserID( $fpo_id );
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
   
	public function getbusiness_type() {
	    $businessInfo = $this->Fpo_Model->business(implode(',',$this->input->post('business_type')));
        $response = array("status" => 1, "businessInfo" => $businessInfo);
        echo json_encode($response);  
    } 	
		
}
