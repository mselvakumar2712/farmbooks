<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

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
      if (!$this->session->userdata('name') || $this->session->userdata('user_type') != 3  || $this->session->userdata('is_active') == 0 ){  
         redirect('administrator/login/signout');
      }
      $this->load->model("Fpo_Model");
      $this->load->model("Login_Model");
      $this->load->model("Ticket_Model");
      $this->load->library('upload');
      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}
	
	
		//Upload Incorporation Documents 
	
	public function ticketlist() {        
      $data['page'] = 'Ticket';
      $data['page_title'] = 'Ticket';
      $data['page_module'] = 'Ticket';	
      $fpo_id = $this->session->userdata('user_id'); 
      $data['ticket_list'] = $this->Ticket_Model->ticket_list($fpo_id); 
      $this->load->view('ticket/ticketlist', $data); 
	} 
   public function viewticket($id) {        
      $ticket_info = $this->Ticket_Model->ticketID($id);
      $response = array("status" => 1, "ticket_info" => $ticket_info);
      echo json_encode($response);        
	}
    public function updateticket_info($id) { 
      if($this->Validator() == 0) {
            $this->session->set_flashdata('danger', 'Provide the Mandatory field');       
		      redirect('fpo/ticket/ticketlist');

        }    
		else if($this->Ticket_Model->updateticket_info($id)){
		$this->session->set_flashdata('success', 'Support Ticket updated successfully.');       
		redirect('fpo/ticket/ticketlist');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		redirect('fpo/ticket/ticketlist');
		}
                 
	}
	function Validator() {
        if(empty($this->input->post('response')) ) {
            return false;
        } else {
            return  true;
        }
    }

}
