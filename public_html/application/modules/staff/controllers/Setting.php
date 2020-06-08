<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
      $this->load->library('session');  
      $this->load->model("User_Model");	
      $this->load->model("Location_Model");	
      $this->load->model("Fpo_Model");
      $this->load->model("Setting_Model");
      $this->load->model("Login_Model");
      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}
 //user management//  
      
    public function index() {        
      $data['page'] = 'GST settings for FPO';
      $data['page_title'] = 'Add GST';
      $data['page_module'] = 'setting';
      $month = date("m");
      $previous_year = ((date("Y"))-1);
      if ($month < 4) {
      $year = date("".$previous_year ."-04-01");
      } else {
      $year = date("Y-04-01");
      }
      $data['gst_applicable_from']= $year;
      $data['state'] = $this->Location_Model->state_list();

      $data['fpo_list'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
      $data['gst_info'] = $this->Setting_Model->gstByID();

      if($data['fpo_list'][0]->gst_enable == 1){
      $this->load->view('setting/viewgst', $data); 
      }
      else{
      $this->load->view('setting/addgst', $data); 
      }
	   
	}    
 
	public function post_gst() {
		if($this->Setting_Model->addgst()){
		 $this->session->set_flashdata('success', 'New GST added successfully.');       
		 redirect('fpo/setting');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/setting');
		}
	}
	public function update_gst($id) {
		
		if($this->Setting_Model->updategst($id)){
		 $this->session->set_flashdata('success', 'GST updated successfully.');       
		 redirect('fpo/setting');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/setting');
		}
	}
	
	public function viewgst($fpo_id) {        
      $data['page'] = 'GST settings for FPO';
      $data['page_title'] = 'Add GST';
      $data['page_module'] = 'setting';
      $month = date("m");
      $previous_year = ((date("Y"))-1);
      if ($month < 4) {
      $year = date("".$previous_year ."-04-01");
      } else {
      $year = date("Y-04-01");
      }
      $data['gst_applicable_from']= $year;
      $data['state'] = $this->Location_Model->state_list();
      $data['fpo_list'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
      $data['gst_info'] = $this->Setting_Model->gstByID($fpo_id);
      $data['state'] = $this->Location_Model->state_list();
      $this->load->view('setting/viewgst', $data); 
	}  
	
	public function sharesvalue() {        
      $data['page'] = 'Shares Value';
      $data['page_title'] = 'Share Value';
      $data['page_module'] = 'setting';
      $data['sharevalue_list'] = $this->Setting_Model->shareValueList();   
      $data['share_available'] = $this->Setting_Model->totalShareavailable();        
      $this->load->view('setting/share_value', $data); 	   
	} 
	
	public function post_shares_value() {
		if($this->Setting_Model->postShareValue()){
		 $this->session->set_flashdata('success', 'New Shares Value added successfully.');       
		 redirect('fpo/setting/sharesvalue');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/setting/sharesvalue');
		}
	}

	public function shareshistory() {        
      $data['page'] = 'Shares Value';
      $data['page_title'] = 'Shares History';
      $data['page_module'] = 'setting';
      $data['sharevalue_history'] = $this->Setting_Model->shareValueHistory(); 
      $this->load->view('setting/share_value_history', $data); 	   
	} 
	//gst ends// 
	// invoice prefix start //
	public function invoiceprefix() {        
      $data['page'] = 'Invoice Prefix';
      $data['page_title'] = 'Invoice Prefix';
      $data['page_module'] = 'setting';
      $data['invoice'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
      $this->load->view('setting/invoice_prefix', $data); 	   
	}
	
	public function postinvoiceprefix() {
		if($this->Setting_Model->postinvoiceprefix()){
		 $this->session->set_flashdata('success', 'Invoice Prefix added successfully.');       
		 redirect('fpo/setting/invoiceprefix');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/setting/invoiceprefix');
		}
	}
    // invoice prefix end //	
	
}
