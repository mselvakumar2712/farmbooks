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
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}
        $this->load->model("Fig_Model");  
        $this->load->model("Login_Model");
		$this->load->model("Fpo_Model");
        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
    

/** FIG Representative Start **/
/** View FIG Representative profile related view by using the given functions **/
    public function figrepresentativelist() {        
        $data['page'] = 'FIG Representative';
		$data['page_title'] = 'List FIG Representative';
        $data['page_module'] = 'profile';		
        $this->load->view('fig/figrepresentlist', $data); 
	}    
    
	public function addfigrepresent() {
        $data['page'] = 'FIG Representative';
		$data['page_title'] = 'Add FIG Representative';
		$data['page_module'] = 'profile';        
        $this->load->view('fig/figrepresentadd', $data); 
	}
        
    public function viewfigrepresent($figrepresent_id) {
        $data['page'] = 'FIG Representative'; 
		$data['page_title'] = 'View FIG Representative';
		$data['page_module'] = 'profile';
        
        $data['figrepresent_list'] = $this->Fig_Model->figrepresentByID( $figrepresent_id );
        $this->load->view('fig/figrepresentview', $data); 
	}
/** End FIG Representative views **/  
            
    public function figrepresentlist() {
        $figrepresent_list = $this->Fig_Model->figrepresentList();
		$response = array("status" => 1, "figrepresent_list" => $figrepresent_list);
        echo json_encode($response);
	}
       
    
    public function postfigrepresent() {
        //echo json_encode($this->input->post());
        if( $this->Fig_Model->addfigrepresent()) {  
            $this->session->set_flashdata('success', 'New FIG representative created successfully');
            redirect('administrator/fig/figrepresentativelist');
        } else {
            $this->session->set_flashdata('warning', 'Technical problem');
            redirect('administrator/fig/addfigrepresent');
        }
	}
    
    
//	public function editfigrepresent( $figrepresent_id ) {
//        $figrepresent_list = $this->Fig_Model->figrepresentByID( $figrepresent_id );
//        $response = array("status" => 1, "figrepresent_list" => $figrepresent_list);
//        echo json_encode($response);
//	}
    
    
    public function updatefigrepresent( $figrepresent_id ) {
        //echo json_encode($this->input->post());
        if( $this->Fig_Model->updatefigrepresent( $figrepresent_id )) {  
            $this->session->set_flashdata('success', 'FIG representative updated successfully');
            redirect('administrator/fig/figrepresentativelist');
        } else {
            $this->session->set_flashdata('warning', 'Technical problem');
            redirect('administrator/fig/figrepresentview');
        }
	}
    
    
    public function deletefigrepresent( $figrepresent_id ) {
        if( $this->Fig_Model->deletefigrepresent( $figrepresent_id ) ) {
            $this->session->set_flashdata('success', 'FIG representative deleted successfully');
            //redirect('administrator/fig/figrepresentativelist');
        } else {
            $this->session->set_flashdata('warning', 'Technical problem');
            //redirect('administrator/fig/figrepresentview');
        }
	}            
    
    
	//show fpo list
	public function fponame($popi_id) {
        $fponame_list = $this->Fig_Model->fpoDropdown_List($popi_id);
        $response = array("status" => 1, "fponame_list" => $fponame_list);		
        echo json_encode($response);
    }
	
    
	//show fig list
	public function figname($fpo_id) {
        $figname_list = $this->Fig_Model->figDropdown_List($fpo_id);
        $response = array("status" => 1, "figname_list" => $figname_list);		
        echo json_encode($response);
    }
    
	
	//mobile number validation
	public function verifyMember() {
        $member_data = $this->Fig_Model->memberExists();
        if($member_data) {
            $response = array("status" => 1, "member_data" => $member_data, "message" => "Given Mobilenumber are alreeady a member");
        } else {
            $response = array("status" => 0, "message" => "It's is not a member value");			
        }
        echo json_encode($response);
   }

/** FIG Representative END **/     
    
    
    
    
    
/** FIG Starts **/
/** View FIG profile related view by using the given functions **/
    public function index() {        
        $data['page'] = 'FIG';
		$data['page_module'] = 'profile';
		$data['page_title'] = 'List FIG';
        $this->load->view('fig/figlist', $data); 
	}    
    
	public function addfig() {
        $data['page'] = 'FIG';
        $data['page_module'] = 'profile';
        $data['page_title'] = 'Add FIG';		
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
        $data['blocks'] = $this->Login_Model->block_list();
		$data['fpo'] = $this->Fig_Model->fpoDropdownList();
        $this->load->view('fig/addfig', $data); 
	}
        
    public function viewfig() {
        $data['page'] = 'FIG';
        $data['page_module'] = 'profile';
        $data['page_title'] = 'view FIG';		
        $data['panchayat'] = $this->Login_Model->panchayat_list();
        $data['village'] = $this->Login_Model->village_list();
        $data['blocks'] = $this->Login_Model->block_list();
		$data['fpo'] = $this->Fig_Model->fpoDropdownList();
		$data['fpo_list'] = $this->Fpo_Model->fpoList();
        $this->load->view('fig/editfig', $data); 
	}
/** End FIG views **/ 
    
    
    
    
    public function figlist() {
        $fig_list = $this->Fig_Model->figList();
        $response = array("status" => 1, "fig_list" => $fig_list);
        echo json_encode($response);
	}
    
        
    public function postfig() {
		  if($this->figValidator() == 0) {
           $response = array("status" => 0, "message" => "provide the mandatory fields");
           
        } else
		  {
		 
        if( $this->Fig_Model->addfig()) {  
            $response = array("status" => 1, "message" => "New FIG created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
		  }
        echo json_encode($response);
	}
    
    
	public function editfig( $fig_id ) {
        $fig_list = $this->Fig_Model->figByID( $fig_id );
        $response = array("status" => 1, "fig_list" => $fig_list);
        echo json_encode($response);
	}
    
    
    public function updatefig( $fig_id ) {
		  if($this->figValidator() == 0) {
           $response = array("status" => 0, "message" => "provide the mandatory fields");
           
        } else
		  {
        if( $this->Fig_Model->updatefig( $fig_id )) {  
            $response = array("status" => 1, "message" => "FIG updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
		  }
        echo json_encode($response);
	}
    
    
    public function deletefig( $fig_id ) {
        if( $this->Fig_Model->deletefig( $fig_id ) ) {
            $response = array("status" => 1, "message" => "FIG deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
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
    
    
    function figValidator() {
         if(empty($this->input->post('fpo_name')) || empty($this->input->post('pin_code')) || empty($this->input->post('state')) || empty($this->input->post('district')) || empty($this->input->post('block')) || empty($this->input->post('taluk')) || empty($this->input->post('gram_panchayat')) ||empty($this->input->post('village')) ||empty($this->input->post('interest_group'))) {
            return false;
        } else {
            return true;
        } 
    }
	
	public function getmember($memeber_ship) {
        $member_list = $this->Fig_Model->getmember($memeber_ship);
        $response = array("status" => 1, "member_list" => $member_list);		
        echo json_encode($response);
    }
/** FIG END **/     

    
}
