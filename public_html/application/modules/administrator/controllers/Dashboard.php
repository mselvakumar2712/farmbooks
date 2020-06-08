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
      if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 || $this->session->userdata('user_type') != 0 ){ 
         redirect('administrator/login/signout');
      }
      $this->load->model("Administrator_Model");      
	}
	public function index()
	{
      $data['page'] = 'dashboard';
      $data['page_title'] = 'dashboard';
      $data['page_module'] = 'dashboard';
      $this->output->set_header("HTTP/1.0 200 OK");
      $this->output->set_header("HTTP/1.1 200 OK");
      $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
      $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
      $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
      $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
      $this->output->set_header("Pragma: no-cache");
      $data['farmer_count']=$this->Administrator_Model->farmerCount();
      $data['farmer_Monthwise']=$this->Administrator_Model->farmerMonthwiseCount();
      $data['fpo_count']=$this->Administrator_Model->fpoCount();
      $data['fpo_Monthwise']=$this->Administrator_Model->fpoMonthwiseCount();
      $data['fig_count']=$this->Administrator_Model->figCount();
      $data['fig_Monthwise']=$this->Administrator_Model->figMonthwiseCount();
      $data['fpg_count']=$this->Administrator_Model->fpgCount();
      $data['fpg_Monthwise']=$this->Administrator_Model->fpgMonthwiseCount();
      $data['crop_count']=$this->Administrator_Model->harvestedCropcount();
      $data['farming_area']=$this->Administrator_Model->farmingArea();
      $data['yearly_harvest']=$this->Administrator_Model->yearlyHarvest();
      $data['farming_previousyear']=$this->Administrator_Model->farmingPreviousyeararea();//print_r($data['fig_Monthwise']);
      $data['previous_yearlyharvest']=$this->Administrator_Model->previousYearharvest();
      $this->load->view('dashboard',$data);
	}
	public function active_module($module)
	{	  
	  if($module=='profile'){
       if($this->session->userdata('user_type')=='0'){      
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('administrator/popi',$data);
           
       }else if($this->session->userdata('user_type')=='1'){
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('popi/fpo',$data);
           
       }else if($this->session->userdata('user_type')=='2'){
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('popi/fpo',$data);

       }else if($this->session->userdata('user_type')=='3'){
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('fpo/fpg',$data);
           
       }else if($this->session->userdata('user_type')=='4'){
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('administrator/fpg',$data);
           
       }else if($this->session->userdata('user_type')=='5'){
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('administrator/fig',$data);
           
       }else if($this->session->userdata('user_type')=='6'){
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('administrator/farmer/profilelist',$data);
           
       }else{
        $this->session->unset_userdata('active_module');
        $data['active_module']=$this->session->set_userdata('active_module',$module);
        redirect('administrator/farmer/profilelist',$data);
       }
    }else if($module=='master_data'){
      $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);		  
	  redirect('administrator/cropmaster',$data); 
	  }else if($module=='user'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/user',$data); 
	  }else if($module=='role'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/role',$data); 
	  } else if($module =='finance'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/finance/payments',$data); 
	  } else if($module=='inventory'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/inventory/supplier_list',$data); 
	  }else if($module=='share'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/share/fpo_sharelist',$data); 
	  }else if($module=='operation'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/operation',$data); 
	  }else if($module=='crop'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/crop',$data); 
	  }else if($module=='soil'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/soil',$data);	  
	  }else if($module=='production'){
      $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);	      	  
	  redirect('administrator/production',$data); 
	  }else if($module=='market'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/market/customerlist',$data); 
	  }else if($module=='supply_chain'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/supplychain',$data); 
	  }else if($module=='ecommerce'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/ecommerce',$data); 
	  }else if($module=='loan'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/loan',$data); 
	  }else if($module=='hr'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/hr',$data); 
	  }else if($module=='hiring'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/hiring',$data); 
	  }else if($module=='tax'){
	  $this->session->unset_userdata('active_module');
	  $data['active_module']=$this->session->set_userdata('active_module',$module);
	  redirect('administrator/tax',$data); 
	  }
	}
}
