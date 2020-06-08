<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Name extends CI_Controller {

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
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}
        $this->load->library('session');        
        $this->load->model("Name_Model");
        $this->load->model("Category_Model");
        $this->load->model("Subcategory_Model");
        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}

    
/** View Crop Name master related view by using the given functions **/
    public function index() {        
        $data['page'] = 'Crop Name Master';
		$data['page_title'] = 'List Crop Name Master';
		$data['page_module'] = 'master_data';
        $this->load->view('cropnamemaster/listcrop_namemaster', $data); 
	}    
    
	public function addname() {
        $data['page'] = 'Crop Name Master';
		$data['page_title'] = 'Add Crop Name Master';
		$data['page_module'] = 'master_data';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $this->load->view('cropnamemaster/addcrop_namemaster', $data); 
	}
        
    public function viewname() {
        $data['page'] = 'Crop Name Master'; 
		$data['page_title'] = 'View Crop Name Master'; 
        $data['page_module'] = 'master_data';  		
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $this->load->view('cropnamemaster/viewcrop_namemaster', $data); 
	}
/** End Crop Name views **/      

    
    
/** Crop Name Master Start **/  
    public function namelist() {
        $name_list = $this->Name_Model->nameList();
//        for($i=0;$i<count($name_list);$i++) {
//            $name_list[$i]->category_name = $this->Category_Model->get_category($name_list[$i]->category_id)->name;
//            $name_list[$i]->subcategory_name = $this->Subcategory_Model->get_subcategory($name_list[$i]->subcategory_id)->name;
//        }
        $response = array("status" => 1, "name_list" => $name_list);
        echo json_encode($response);
	}
        
    
    public function postname() {
        if(empty($this->input->post('cropcategory')) || empty($this->input->post('crop_sub_category')) || empty($this->input->post('crop_name')) || empty($this->input->post('crop_regional_language'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } else if( $this->Name_Model->addname()) {  
            $response = array("status" => 1, "message" => "New crop name master created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
	public function editname( $name_id ) {
        $name_list = $this->Name_Model->nameByID( $name_id );
        $response = array("status" => 1, "name_list" => $name_list);
        echo json_encode($response);
	}
    
    
    public function updatename( $name_id ) {
        if(empty($this->input->post('cropcategory')) || empty($this->input->post('crop_sub_category')) || empty($this->input->post('crop_name')) || empty($this->input->post('crop_regional_language'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } else if( $this->Name_Model->updatename( $name_id )) {  
            $response = array("status" => 1, "message" => "Crop name master updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
    public function deletename( $name_id ) {
        if( $this->Name_Model->deletename( $name_id ) ) {
            $response = array("status" => 1, "message" => "Crop name master deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}  
    
         
/** Crop Name END **/         
	
}
