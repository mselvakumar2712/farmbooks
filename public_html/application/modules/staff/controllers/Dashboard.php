<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
      if (!$this->session->userdata('name') || /*$this->session->userdata('user_type') != 3 || */$this->session->userdata('is_active') == 0){  
         redirect('staff/signout');
      }
      $this->load->model("Login_Model");
	  $this->load->model("Role_Model");
      // $this->load->model("Administrator_Model"); 
	}
   
    //dashboard functionality
	public function index(){
      $data['page'] = 'dashboard';
      $data['page_title'] = 'dashboard';
      $data['page_module'] = 'dashboard';
      
		$data['roles'] = $this->Role_Model->getModuleByRights(1, $this->session->userdata('profile_type'));	
		$this->load->view('dashboard', $data);
	}
  //dashboard ends//    
   
	public function active_module($module){	  
	if($module=='Profile'){       
		$this->session->unset_userdata('active_module');
		$data['active_module']=$this->session->set_userdata('active_module',$module);
		redirect('staff/fpg', $data);                 
    }else if($module=='Masters'){
      $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);		  
	  redirect('staff/masterdata/productfpolist',$data); 
	  }else if($module=='User'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/user',$data); 
	  }else if($module=='Role'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/role',$data); 
	  } else if($module =='Finance'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/finance/salesentry',$data); 
	  } else if($module=='Inventory'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/inventory/purchaseentry',$data); 
	  }else if($module=='Share'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/share',$data); 
	  }else if($module=='Operation'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/operation',$data); 
	  }else if($module=='CROP'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/crop',$data); 
	  }else if($module=='Soil'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/soil',$data);	  
	  }else if($module=='Production'){
      $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);	      	  
	  redirect('staff/production',$data); 
	  }else if($module=='Sales'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/market/salesentry',$data); 
	  }else if($module=='Supply_chain'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/supplychain',$data); 
	  }else if($module=='Ecommerce'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/ecommerce',$data); 
	  }else if($module=='loan'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/loan',$data); 
	  }else if($module=='HR'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/hr',$data); 
	  }else if($module=='Hiring'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/hiring',$data); 
	  }else if($module=='Setting'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/setting',$data); 	 
	  }else if($module=='Search'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('staff/dashboard/search',$data); 
	  }
	}
	public function searchByModule(){        
        $search_list = $this->Login_Model->searchByModule();
        $response = array("status" => 1, "search_list" => $search_list);
        echo json_encode($response);
	} 
    
	public function search(){
      $data['page'] = 'search';
      $data['page_module'] = 'searchmodule';
      $data['page_title'] = 'Search Module';
      $data['search_module'] = $this->Login_Model->searchByModule();
      $this->load->view('search/searchmodule_list', $data);      
	}
  
	function enquiry_information(){
        if($this->Login_Model->enquiry_information()) {
           $response = array("status" => 1, "message" => "Your request has been submitted with Us. Our representative will get back to you shortly.");
           } else {
              $response = array("status" => 0, "message" => "Message not sent");
          } 
      echo json_encode($response);        
    }
    
    
    public function supportEnquiry() {
      $fpo_id = $this->session->userdata('user_id');      
      $supportEnquiry = $this->Login_Model->supportEnquiry($fpo_id);
      $response = array("status" => 1, "supportEnquiry" => $supportEnquiry);
      echo json_encode($response);  
   } 
    
}
