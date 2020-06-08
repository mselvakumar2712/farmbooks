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
         $visit = $this->count_visits();
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
				   redirect('fpo/dashboard');  
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
				  if ($this->session->userdata('user_type') == 0) {
				   redirect('administrator/dashboard');       
			   } else if ($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2) {
				   redirect('popi/dashboard');  
			   } else if ($this->session->userdata('user_type') == 3) {
				   redirect('fpo/dashboard');  
			   } else if ($this->session->userdata('user_type') == 4) {
				   redirect('administrator/dashboard');  
			   } else if ($this->session->userdata('user_type') == 5) {
				   redirect('administrator/dashboard');  
			   } else if ($this->session->userdata('user_type') == 6) {
				   redirect('administrator/dashboard');  
			   } else {
				   redirect('administrator/dashboard');
			   }
				   
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

	    $auto_login_key = '';
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
               $fpo = $this->Fpo_Model->getfpo( $row->user_id );
               $logger_id = $fpo->id;
               $logger_name = $fpo->producer_organisation_name;
               
               //$auto_login_key = $this->_get_autologin_key($fpo, $row->password);
               
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
                "is_active"   => $row->status,
                //"auto_login_key" => $auto_login_key
            );
            $this->session->set_userdata($session_data);
            return true;
        } else {            
			$this->session->set_flashdata('danger','login failed');        
		    redirect('/');            
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
                $talukDetails = $this->Login_Model->getTalukByDistCode( $district_code );
            } else {
                $districtInfo = "";
            }
            
            /* if(!empty($talukInfo)) {
                $talukDetails = $this->Login_Model->getTalukByCode( $talukInfo );
            }else {
                $talukDetails = "";
            }    */     
            
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
    
   public function getPanchayat( $block_code ) {
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
    
    /** Redirecting the module by using customized code **/
    public function getModuleByCode($module_code) {
        $moduleCode = $this->Login_Model->getModuleByCode($module_code);
        $response = array("status" => 1, "moduleCode" => $moduleCode);
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

   public function _get_autologin_key($obj, $password) {
      if($_SERVER["HTTP_HOST"] == "localhost") {
         $log_file = $_SERVER["DOCUMENT_ROOT"].'/fpo/my-errors.log';
      }
      else {
         $log_file = $_SERVER["DOCUMENT_ROOT"].'/UAT/fpo/my-errors.log';
      }
   
      $user_login = $obj->mobile;
   
      $params = array(
        'action'            => 'get_login_key', 
        'key'               => '123456', 
        'user_login'        => $user_login,
        "username"          => $obj->mobile,
        "email"             => $obj->email,
        "display_name"      => $obj->producer_organisation_name,
        "first_name"        => $obj->producer_organisation_name,
        "last_name"         => '',
        "password"          => $password,
        "role"              => "wcfm_vendor"
      );
       
      $key = '';
      $api_url = '';
      $register_url = '';
      $authorization_key = '';
      if($_SERVER["HTTP_HOST"] == "localhost") {
         $api_url = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].'/sundar/wordpress-502/auto-login-api/';
      }
      else if(stripos($_SERVER["REQUEST_URI"], 'EaszBB')) {
         $api_url = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].'/EaszBB/auto-login-api/';
      }
      else if(stripos($_SERVER["REQUEST_URI"], 'EaszMarket')) {
         $api_url = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].'/UAT/EaszMarket/auto-login-api/';
      }
      
      error_log($api_url, 3, $log_file);
      
      if($api_url != '') {
          $ch = curl_init($api_url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          $gbi_response = curl_exec($ch);
          curl_close($ch);
          parse_str($gbi_response);
          $data = json_decode($gbi_response, true);
          $key = $data['key'];
 
          error_log($gbi_response, 3, $log_file);
          $log_data = print_r($data, true);
          error_log($log_data, 3, $log_file);
          
         if(!$key) {
           
            if($_SERVER["HTTP_HOST"] == "localhost") {
                $authorization_key = base64_encode('admin:B2Mv m18Z iOxY rFOi MEk1 wCMI');
                $register_url = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].'/sundar/wordpress-502/wp-json/trv/v1/vendor/register/';
            }
            else if(stripos($_SERVER["REQUEST_URI"], 'EaszBB')) {
                $register_url = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].'/EaszBB/wp-json/trv/v1/vendor/register/';
            }
            else if(stripos($_SERVER["REQUEST_URI"], 'EaszMarket')) {
                $authorization_key = base64_encode('admin:CK7H Tev0 Ro0W eYJM ynS9 MNYt');
                $register_url = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"].'/UAT/EaszMarket/wp-json/trv/v1/vendor/register/';
            }

              $curl = curl_init();
              curl_setopt_array($curl, array(
              CURLOPT_URL => $register_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_POST => true,
              CURLOPT_POSTFIELDS => $params,
              CURLOPT_HTTPHEADER => array(
                "Authorization: Basic ".$authorization_key,
                "Cache-Control: no-cache"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
              
                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $gbi_response = curl_exec($ch);
                curl_close($ch);
                parse_str($gbi_response);
                $data = json_decode($gbi_response, true);
                $key = $data['key'];
            }
         }
      }   
       
      return $key;
   }      
}
