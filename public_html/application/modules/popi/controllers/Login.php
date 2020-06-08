<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/admin/imports
	 *	- or -
	 * 		http://example.com/index.php/admin/imports
	 *	- or -
	 * http://example.com/index.php/admin/imports/index
	 **/
	 
	public function __construct() {
         parent::__construct();
         $this->load->database();
         $this->load->library("session");
         $this->load->library('form_validation');       
         $this->load->model('Login_Model');
         $this->load->model('Popi_Model');
         $this->load->model('Fpo_Model');
         $this->load->model('Farmer_Model');
         /*cache control*/
         header('Access-Control-Allow-Origin: *');
	}
	
   /***default function, redirects to login page if no admin logged in yet***/
   public function index()
   {   
      $data['page'] = 'Login';
      $data['page_module'] = 'Login';
      $data['page_title'] = 'Login';   
      $this->form_validation->set_rules('mobile_no', 'mobile_no', 'trim|required'); 
      $this->form_validation->set_rules('password', 'password', 'required|callback__validate_login');		
      $this->form_validation->set_message('_validate_login' . ' Login failed!');
      $this->form_validation->set_error_delimiters('<div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
       
       if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
           if ($this->session->userdata('user_type') == 0) {
               redirect('administrator/dashboard');       
           } else if ($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2) {
               redirect('popi/dashboard');  
           } else if ($this->session->userdata('user_type') == 3) {
               redirect('administrator/dashboard');  
           } else if ($this->session->userdata('user_type') == 4) {
               redirect('administrator/dashboard');  
           } else if ($this->session->userdata('user_type') == 5) {
               redirect('administrator/dashboard');  
           } else if ($this->session->userdata('user_type') == 6) {
               redirect('administrator/dashboard');  
           } else {
               redirect('administrator/dashboard');
           }
               
       } else{
           if ($this->form_validation->run() == FALSE) {
                $this->load->view('login',$data);
           } else{
               redirect('administrator/dashboard');
           }
       }       
   }
    
    
   /***validate login****/
   function _validate_login($str)
   {
		$query = $this->db->get_where('trv_user_auth',array(
		'username' => $this->input->post('mobile_no'),
		'password' => $this->input->post('password'),
		'status'   => 1,
		));

	    if( $query->num_rows() > 0) {			
			$row = $query->row();         
			if($row->user_type == 0 ){                           
                $logger_type = 'super_admin';
                $logger_id = "";
                $logger_name = "super_admin";
			}else if($row->user_type==1){            
                $logger_type = 'popi';
                $popi = $this->Popi_Model->getpopi( $row->user_id );
                $logger_id = $popi->id;
                $logger_name = $popi->institution_name;
		    }else if($row->user_type==2){            
                $logger_type = 'fedaration';
                $popi = $this->Popi_Model->getpopi( $row->user_id );
                $logger_id = $popi->id;
                $logger_name = $popi->institution_name;
		    }else if($row->user_type==3){            
                $logger_type = 'fpo';
                $logger_id = "";
                $logger_name = "fpo";
		    }else if($row->user_type==4){            
                $logger_type = 'fpg';
                $logger_id = "";
                $logger_name = "fpg";
		    }else if($row->user_type==5){            
                $logger_type = 'fig';
                $logger_id = "";
                $logger_name = "fig";
            }else if($row->user_type==6){            
                $logger_type = 'farmer';
                $logger_id = "";
                $logger_name = "farmer";
		    } else {
                $logger_type = 'member';
                $logger_id = "";
                $logger_name = "member";
            }
            
            $session_data = array(
                "user_type"   => $row->user_type,
                "user_id"     => $row->user_id,
                "username"    => $row->username,   
                "password"    => $row->password,
                "logger_type" => $logger_type,
                "name"        => $logger_name,
                "logger_id"   => $logger_id,
                "is_active"   => $row->status
            );
            $this->session->set_userdata($session_data);
            return true;
        } else {            
			$this->session->set_flashdata('danger','login failed');        
		    redirect('administrator/login');            
			return false;
        }
    }		
    
    /** Getting the login post values for setting session values **/
    public function checkusername($mobilenumber) {
        if( $this->Login_Model->mobileNumberExists( $mobilenumber ) > 0) {
            $response = array("status" => 0, "message" => "Mobile number is already registered");
        } else {
            $response = array("status" => 1, "message" => "Mobile number is available");
        }
        echo json_encode($response);
    }
    
   /*  
    public function getlocation( $pincode ) {
        $panchayatInfo = array();$talukInfo = array();$blockInfo = array();   
        
        $villageInfo = $this->Login_Model->getVillageByPostcode( $pincode );
        if(!empty($villageInfo)) {                    
            for($village=0; $village<count($villageInfo); $village++) {
                array_push($panchayatInfo, $villageInfo[$village]->panchayat_id);
            }
            if (!empty($panchayatInfo)) {
                $panchayatDetails = $this->Login_Model->getPanjayat( $panchayatInfo );
            }

            for($panchayat=0; $panchayat<count($panchayatDetails); $panchayat++) {
                array_push($talukInfo, $panchayatDetails[$panchayat]->taluk_id);
            }
            if (!empty($talukInfo)) {
                $talukDetails = $this->Login_Model->getTaluk( $talukInfo );
            }

            for($taluk=0; $taluk<count($talukDetails); $taluk++) {            
                array_push($blockInfo, $talukDetails[$taluk]->block_id);
            }
            if (!empty($blockInfo)) {
                $blockDetails = $this->Login_Model->getBlock( $blockInfo );
            }

            if (!empty($blockDetails[0]->district_id)) {
                $cityInfo = $this->Login_Model->getCityByBlock( $blockDetails[0]->district_id );
            } else {
                $cityInfo = "";
            }
            if (!empty($cityInfo[0]->state_id)) {
                $stateInfo = $this->Login_Model->getStateByCity( $cityInfo[0]->state_id );
            } else {
                $stateInfo = "";
            }  
            
            $data['villageInfo'] = $villageInfo;
            $data['panchayatInfo'] = $panchayatDetails;
            $data['talukInfo'] = $talukDetails;
            $data['blockInfo'] = $blockDetails;
            $data['cityInfo'] = $cityInfo;
            $data['stateInfo'] = $stateInfo;
            $response = array("status" => 1, "getlocation" => $data);
        } else {
            $data['villageInfo'] = "";
            $response = array("status" => 0, "message" => "No data found");
        }                
        echo json_encode($response);
    } */
    
    
       public function getlocation( $pincode ) {
        $panchayatInfo = array();
        $talukInfo = array();
        $blockInfo = array();   
        $blockDetails = '';
        $pincodeInfo = $this->Login_Model->getVillageByPostcode( $pincode );
        if(!empty($pincodeInfo)) {                    
            foreach($pincodeInfo as $key => $val) {
               array_push($talukInfo, $val->taluk_code);
               $state_code = $val->state_code;
               $district_code = $val->district_code;
            } 
            
            
            if (!empty($state_code)) {
                $stateInfo = $this->Login_Model->getStateByCode( $state_code );
            } else {
                $stateInfo = "";
            } 
            
            if (!empty($district_code)) {
                $districtInfo = $this->Login_Model->getDistrictByCode( $district_code );
                $blockDetails = $this->Login_Model->getBlockByDistCode( $district_code );
            } else {
                $districtInfo = "";
            }
            
            if(!empty($talukInfo)) {
                $talukDetails = $this->Login_Model->getTalukByCode( $talukInfo );
            }else {
                $talukDetails = "";
            }        
            
            $data['villageInfo'] = '';
            $data['panchayatInfo'] = '';
            $data['talukInfo'] = $talukDetails;
            $data['blockInfo'] = $blockDetails;
            $data['cityInfo'] = $districtInfo;
            $data['stateInfo'] = $stateInfo;
            $response = array("status" => 1, "getlocation" => $data);
        } else {
            $data['villageInfo'] = "";
            $response = array("status" => 0, "message" => "No data found");
        }                
        echo json_encode($response);
    }
    
    
    
    
    
    
    
    
    /*
    public function getlocation( $pincode ) {
        $panchayatInfo = array();$talukInfo = array();$blockInfo = array();        
        $villageInfo = $this->Login_Model->getVillageByPostcode( $pincode );
        
        for($village=0; $village<count($villageInfo); $village++) {
            $panchayatDetails = $this->Login_Model->getPanjayatByVillage( $villageInfo[$village]->panchayat_id );
            array_push($panchayatInfo, $panchayatDetails[0]);
            unset($panchayatDetails);
        }
        
        for($panchayat=0; $panchayat<count($panchayatInfo); $panchayat++) {
            $talukDetails = $this->Login_Model->getTalukByPanjayat( $panchayatInfo[$panchayat]->taluk_id );
            if(count($talukInfo) <= 1) {
                array_push($talukInfo, $talukDetails[0]);
            } else if(count($talukInfo) > 1) {
                for($i=0;$i<count($talukInfo);$i++) {
                    if($talukDetails[0]->block_id != $talukInfo[$i]->block_id) {
                        array_push($talukInfo, $talukDetails[0]);
                        unset($talukDetails);
                    }
                }  
            } 
            unset($talukDetails);
        }
        
        for($taluk=0; $taluk<count($talukInfo); $taluk++) {
            $blockDetails = $this->Login_Model->getBlockByTaluk( $talukInfo[$taluk]->block_id );
            array_push($blockInfo, $blockDetails[0]);
            unset($blockDetails);
        }
            
        $cityInfo = $this->Login_Model->getCityByBlock( $blockInfo[0]->district_id );
        $stateInfo = $this->Login_Model->getStateByCity( $cityInfo[0]->state_id );
        $data['villageInfo'] = $villageInfo;
        $data['panchayatInfo'] = $panchayatInfo;
        $data['talukInfo'] = $talukInfo;
        $data['blockInfo'] = $blockInfo;
        $data['cityInfo'] = $cityInfo;
        $data['stateInfo'] = $stateInfo;
        $response = array("status" => 1, "getlocation" => $data);
        echo json_encode($response);
    }
    */
    
   /*  public function getvillages( $panchayat_id ) {
        $villageInfo = $this->Login_Model->getVillageByPanchayatcode( $panchayat_id );
        
        $response = array("status" => 1, "villageInfo" => $villageInfo);
        echo json_encode($response);
    }
     */
     
    
    /** Gettting the logged user information **/
    public function getuser( $user_id ) {
        $userInfo = $this->Login_Model->getuser( $user_id );
        $response = array("status" => 1, "userInfo" => $userInfo);
        echo json_encode($response);        
    }
    
    
    /** update the logged user information **/
    public function updateuser( $user_id ) {
        if( $this->Login_Model->exists_email( $this->input->post('email') ) > 0) {
            $response = array("status" => 0, "message" => "You must register this account and try again!");
            
        } else if( $this->Login_Model->check_customer_detail() == FALSE ) {
            $response = array("status" => 0, "message" => "Invalid username & password");
            
        } else {
            $userInfo = $this->Login_Model->updateProfileInfo( $user_id );
        }
        echo json_encode($response);        
    }
    
    
    
    
   /*******LOGOUT function *******/
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
       redirect('administrator/login', 'refresh');
       
      /*if($this->session->userdata('user_type')=='super_admin'){
         $this->session->unset_userdata('user_login');
         $this->session->sess_destroy();
         $this->session->set_flashdata('success', 'you have logged_out');
         redirect('administrator/login', 'refresh');
      }else{
         $this->session->unset_userdata('user_login');
         $this->session->sess_destroy();
         $this->session->set_flashdata('success', 'you have logged_out');
         redirect('home', 'refresh');
      }*/
      
       }
       
      public function getPanchayat($block_code) {
        $panchayatInfo = $this->Login_Model->getPanchayatByBlockcode( $block_code );     
        $response = array("status" => 1, "panchayatInfo" => $panchayatInfo);
        echo json_encode($response);
      }
      
      public function getPanchayatByCode( $block_code,$panchayath_code ) {
        $panchayatInfo = $this->Login_Model->getPanchayatBycode( $block_code,$panchayath_code );     
        $response = array("status" => 1, "panchayatInfo" => $panchayatInfo);
        echo json_encode($response);
      }
      
       public function getvillages( $panchayat_id ) {
        $villageInfo = $this->Login_Model->getVillageByPanchayatcode( $panchayat_id );     
        $response = array("status" => 1, "villageInfo" => $villageInfo);
        echo json_encode($response);
      }
      public function getvillageById( $panchayat_id, $village_id ) {
        $villageInfo = $this->Login_Model->getVillageById( $panchayat_id, $village_id );     
        $response = array("status" => 1, "villageInfo" => $villageInfo);
        echo json_encode($response);
      }
      
      
      
  
    
}
