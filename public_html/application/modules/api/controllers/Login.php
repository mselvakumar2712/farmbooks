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
         $this->load->library('form_validation');       
         $this->load->model('Login_Model');
         $this->load->model('Popi_Model');
         $this->load->model('Fpo_Model');
         $this->load->model('Farmer_Model');
         
         $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
         $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
         $this->output->set_header('Pragma: no-cache');
         $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         $this->output->set_header('Content-Type: application/json');
         /*cache control*/
	}
	
   /***default function, redirects to login page if no admin logged in yet***/
   public function index()
   {   
      $post_data = json_decode(file_get_contents('php://input'), true);
		$user_list = $this->Login_Model->login_validation($post_data);
		if($user_list){
			if($this->Login_Model->updatedeviceinfo($post_data) > 0) {
                $data['status'] = 'TRV_S101';
			    $data['user_info'] = $user_list;
            } 
		} 
		else 
		{
			$data['status'] = 'TRV_E101';
			$data['message'] = "Invalid Login";	
		}      
		echo json_encode($data);
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
    
    public function getvillages( $panchayat_id ) {
        $villageInfo = $this->Login_Model->getVillageByPanchayatcode( $panchayat_id );
        
        $response = array("status" => 1, "villageInfo" => $villageInfo);
        echo json_encode($response);
    }
    
    
   
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
      if($this->session->userdata('user_type')=='0'){
         $this->session->unset_userdata($session_data);
			$this->session->sess_destroy();
			//redirect('administrator/login', 'refresh');
         redirect('/', 'refresh');
      }else{
         $this->session->unset_userdata($session_data);
			$this->session->sess_destroy();
			redirect('/', 'refresh');
      }
   }
   public function count_visits(){
      $this->load->library('user_agent');
      $this_IP =  $this->input->ip_address();
      $this_refer =  null;
      if ($this->agent->is_referral())
      {
         $this_refer = $this->agent->referrer();
      }
      $this_url =   current_url();
      if ($this->agent->is_browser())
      {
         $agent = $this->agent->browser().' '.$this->agent->version();
      }
      elseif ($this->agent->is_robot())
      {
         $agent = $this->agent->robot();
      }
      elseif ($this->agent->is_mobile())
      {
         $agent = $this->agent->mobile();
      }
      else
      {
         $agent = 'Unidentified User Agent';
      }
      $this_platform = $this->agent->platform();      
      $this_agent = $agent;
      
      $this->load->database();
      $data = array(
        'visitor_ip'=>$this_IP,
        'browser_type'=>$this_agent,
        'refernce_page'=>$this_refer,
        'page_visited'=>$this_url,
        'platform'=>$this_platform
      );

	  $query =  $this->db->insert('trv_site_visitor',$data);
	  return 1;      
   } 
}
