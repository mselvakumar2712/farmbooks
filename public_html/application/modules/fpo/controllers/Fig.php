<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fig extends CI_Controller {

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
      if (!$this->session->userdata('name')  || $this->session->userdata('user_type') != 3  || $this->session->userdata('is_active') == 0 ){  
         redirect('administrator/login/signout');
      }
      $this->load->library('session');        
      $this->load->model("Fig_Model");  
      $this->load->model("Login_Model");

      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}
    

/** FIG Representative Start **/
/** View FIG Representative profile related view by using the given functions **/
   public function figrepresentativelist() {        
      $data['page'] = 'FIG Representative';
      $data['page_title'] = 'List FIG Representative';
      $data['page_module'] = 'profile';
      $data['figrepresent_info'] = $this->Fig_Model->figrepresentList();
      $this->load->view('fig/figrepresentlist', $data); 
	}    
    
	public function addfigrepresent() {
        $data['page'] = 'FIG Representative';
		$data['page_title'] = 'Add FIG Representative';
		$data['page_module'] = 'profile';
        
        
		$data['fig'] = $this->Fig_Model->fig_list();
        $this->load->view('fig/figrepresentadd', $data); 
	}
        
    public function viewfigrepresent($id) {
        $data['page'] = 'FIG Representative'; 
		$data['page_title'] = 'View FIG Representative';
		$data['page_module'] = 'profile';
        
        
		$data['figrepresent_list'] = $this->Fig_Model->figrepresentByID($id);
		$data['fig'] = $this->Fig_Model->fig_list();
        $this->load->view('fig/figrepresentview', $data); 
	}
/** End FIG Representative views **/  
            
    public function figrepresentlist() {
        $figrepresent_list = $this->Fig_Model->figrepresentList();
        $response = array("status" => 1, "figrepresent_list" => $figrepresent_list);
        echo json_encode($response);
	}
       
    
    public function postfigrepresent() {        
        $data['page'] = 'FIG representative';

		if($this->Fig_Model->addfigrepresent()) {  
			$this->session->set_flashdata('success', 'Given Mobile or Adhaar number already used.');       
			redirect('fpo/fig/figrepresentativelist');
		} else {
			$response = array("status" => 0, "message" => "Technical problem");
			$this->session->set_flashdata('warning', 'Data not inserted.');       
			redirect('fpo/fig/figrepresentativelist');
		}
	}
    
    
	public function editfigrepresent($figrepresent_id) {
        $figrepresent_list = $this->Fig_Model->figrepresentByID( $figrepresent_id );
        $response = array("status" => 1, "figrepresent_list" => $figrepresent_list);
        echo json_encode($response);
	}
    
    
    public function updatefigrepresent( $figrepresent_id ) {

            if( $this->Fig_Model->updatefigrepresent( $figrepresent_id )) {  
				$this->session->set_flashdata('success', 'FIG representative updated successfully');       
				redirect('fpo/fig/figrepresentativelist');
            } else {
               $this->session->set_flashdata('warning', 'Data not inserted.');       
			   redirect('fpo/fig/figrepresentativelist');
            }

	}
    
    
    public function deletefigrepresent( $figrepresent_id ) {
        if( $this->Fig_Model->deletefigrepresent( $figrepresent_id ) ) {
			$this->session->set_flashdata('success', 'FIG representative deleted successfully');       
			redirect('fpo/fig/figrepresentativelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not deleted.');       
			redirect('fpo/fig/figrepresentativelist');
        }
	}	
/** FIG Representative END **/     
    
    
    
    
    
/** FIG Starts **/
/** View FIG profile related view by using the given functions **/
    public function index() {        
      $data['page'] = 'FIG';
      $data['page_module'] = 'profile';
      $data['page_title'] = 'List FIG';
      $data['fig_info'] = $this->Fig_Model->figList();
      $this->load->view('fig/figlist', $data); 
	}    
    
	public function addfig() {
        $data['page'] = 'FIG';
        $data['page_module'] = 'profile';
        $data['page_title'] = 'Add FIG';		
        
        
        
        $this->load->view('fig/addfig', $data); 
	}
        
    public function viewfig($fig_id) {
        $data['page'] = 'FIG';
        $data['page_module'] = 'profile';
        $data['page_title'] = 'view FIG';		
        
        
        
		//$data['fig_info']  = $this->Fig_Model->figByID($id);

		$fig_list = $this->Fig_Model->figByID( $fig_id );

      if(!empty($fig_list)){         
         $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($fig_list['PIN_Code']);
		/*  print_r($data['taluk_info']);
		 die; */
        $data['block_info'] = $this->Login_Model->getBlockByDistCode($fig_list['district']);
        $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($fig_list['block']);
         $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($fig_list['Gram_PanchayatID']);
		} 
      $data['fig_info'] = $fig_list; 
        $this->load->view('fig/editfig', $data); 
	}
/** End FIG views **/ 
    
    
    
    
    public function figlist() {
        $fig_list = $this->Fig_Model->figList();
        $response = array("status" => 1, "fig_list" => $fig_list);
        echo json_encode($response);
	}
    
        
    public function postfig() {
		if($this->Fig_Model->addfig()){
		 $this->session->set_flashdata('success', 'New FIG added successfully.');       
		 redirect('fpo/fig');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/fig');
		}
	}
    
    
	public function editfig( $fig_id ) {
        $fig_list = $this->Fig_Model->figByID( $fig_id );
        $response = array("status" => 1, "fig_list" => $fig_list);
        echo json_encode($response);
	}
    
    
    public function updatefig($fig_id) {

		if( $this->Fig_Model->updatefig( $fig_id )) {  
			$this->session->set_flashdata('success', 'FIG  updated successfully');       
			redirect('fpo/fig');
		} else {
		   $this->session->set_flashdata('warning', 'Data not inserted.');       
		   redirect('fpo/fig');
		}
	}
    
    
    public function deletefig( $fig_id ) {
        if( $this->Fig_Model->deletefig( $fig_id ) ) {
            $response = array("status" => 1, "message" => "FIG deleted successfully");
			$this->session->set_flashdata('success', 'FIG  updated successfully');       
			redirect('fpo/fig');
        } else {
            $this->session->set_flashdata('success', 'FIG  Not Deleted');       
			redirect('fpo/fig');
        }

	}
    
    
    public function profile( $fig_id ) {
        $data['page'] = 'FIG';
        $data['page_title'] = 'View FIG';
        $data['page_module'] = 'profile';  
        $data['fig_id'] = $fig_id;  
        $data['fig_list'] = $this->Fig_Model->figByUserID( $fig_id );
        $this->load->view('fig/fig_profile',$data); 
    }

    public function profile_update() {
            if( $this->Fpo_Model->profile_update()) {  
                    $response = array("status" => 1, "message" => "POPI updated successfully");
            } else {
                    $response = array("status" => 0, "message" => "Technical problem");
            }
    }
	
	//mobile number validation
	public function verifyMember() {
        $member_data = $this->Fig_Model->memberExists();
        if($member_data) {
            $response = array("status" => 1, "member_data" => $member_data, "message" => "Given Member is valid");
        } else {
            $response = array("status" => 0, "message" => "It's is not a member value");			
        }
        echo json_encode($response);
   }
   
   public function getmember($memeber_ship) {
        $member_list = $this->Fig_Model->getmember($memeber_ship);
        $response = array("status" => 1, "member_list" => $member_list);		
        echo json_encode($response);
    }
/** FIG END **/     

    
}
