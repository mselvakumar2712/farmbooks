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
      /* $this->load->library("session");
      if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
         redirect('administrator/login');
      } */
      $this->load->model("Fpo_Model"); 
      $this->load->model("Login_Model");
      $this->load->model("Masterdata_Model");
      $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');
      $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      $this->output->set_header('Content-Type: application/json');
   }


   /** View FPG profile related view by using the given functions **/
   public function login() {        
      $post_data = json_decode(file_get_contents('php://input'), true);
		$data['status'] = 'TRV_E101';
		$data['fpo_info'] = array();
		$user_list = $this->Fpo_Model->login_validation($post_data);
		if($user_list){
         $fpo_id = $user_list->user_id;
			$fpo = $this->Fpo_Model->fpoByUserID($fpo_id);
         if($fpo){
            $data['status'] = 'TRV_S101';
            $data['fpo_info'] = $fpo;
         }
		}      
		echo json_encode($data);
   }
   /** End FPG views **/
   public function farmers() {
      $post_data = json_decode(file_get_contents('php://input'), true);
		$data['status'] = 'TRV_E101';
		$data['fpo_farmers'] = array();
      $farmer_list = $this->Fpo_Model->list_farmers($post_data);
		if($farmer_list){
         $data['status'] = 'TRV_S101';
         $data['fpo_farmers'] = $farmer_list;
		}  
      echo json_encode($data);
   }
}
