<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends CI_Controller {

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
      $this->load->library('session'); 
      $this->load->model("Tax_Model"); 		
      header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
   public function index() {        
      $data['page'] = 'Tax List';
      $data['page_title'] = 'Tax List';
      $data['page_module'] = 'tax';
      $data['tax_info'] = $this->Tax_Model->tax_list();	     
      $this->load->view('tax/taxlist', $data); 
	} 
	public function taxadd() {        
        $data['page'] = 'Tax List';
		$data['page_title'] = 'Tax Add';
        $data['page_module'] = 'tax';		
        $this->load->view('tax/taxadd', $data); 
	} 
	public function taxedit($tax_id) {        
        $data['page'] = 'Tax List';
		$data['page_title'] = 'Tax Edit';
        $data['page_module'] = 'tax';
        $data['tax_info'] = $this->Tax_Model->taxByID( $tax_id );		
        $this->load->view('tax/edittax', $data); 
	} 
	public function taxview($tax_id) {        
        $data['page'] = 'Tax List';
		$data['page_title'] = 'Tax Edit';
        $data['page_module'] = 'tax';
        $data['tax_info'] = $this->Tax_Model->taxByID( $tax_id );		
        $this->load->view('tax/taxview', $data); 
	}   	
    public function posttax() {
      if( $this->Tax_Model->addtax()) {  
         $this->session->set_flashdata('success', 'New Tax created successfully');
         redirect('administrator/tax');
      } else {
         $this->session->set_flashdata('warning', 'Technical problem');
         redirect('administrator/tax/taxadd');
      }
	}
	public function updatetax($tax_id) {
      if($this->Tax_Model->update_tax($tax_id)){
         $this->session->set_flashdata('success', 'Tax updated successfully.');       
         redirect('administrator/tax');
      }else{
         $this->session->set_flashdata('warning', 'Data not updated.');       
         redirect('administrator/tax');
      }
   }
        	
}
