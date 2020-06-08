<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$this->load->model("Category_Model");
		header('Access-Control-Allow-Origin: *');
	}

    
/** View Crop Category master related view by using the given functions **/
    public function index() {        
        $data['page'] = 'Crop Category Master';
		$data['page_title'] = 'List Crop Category';
	    $data['page_module'] = 'master_data';
        $this->load->view('cropcategorymaster/listcrop_category', $data); 
	}    
    
	public function addcategory() {
        $data['page'] = 'Crop Category Master';
		$data['page_title'] = 'Add Crop Category';
		$data['page_module'] = 'master_data';
        $this->load->view('cropcategorymaster/addcrop_category', $data); 
	}
        
    public function viewcategory() {
        $data['page'] = 'Crop Category Master'; 
		$data['page_title'] = 'View Crop Category ';
		$data['page_module'] = 'master_data';
        $this->load->view('cropcategorymaster/viewcrop_category', $data); 
	}
/** End Crop Category views **/      

    
    
/** Crop Category Master Start **/  
    public function categorylist() {
        $category_list = $this->Category_Model->categoryList();
        $response = array("status" => 1, "category_list" => $category_list);
        echo json_encode($response);
	}
        
    
    public function postcategory() {
        if(empty($this->input->post('cropcategory')) || empty($this->input->post('crop_category_in_regional'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } else {
        if( $this->Category_Model->addcategory()) {  
            $response = array("status" => 1, "message" => "New crop category master created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
		}
        echo json_encode($response);
	}
    
    
	public function editcategory( $category_id ) {
        $category_list = $this->Category_Model->categoryByID( $category_id );
        $response = array("status" => 1, "category_list" => $category_list);
        echo json_encode($response);
	}
    
    
    public function updatecategory( $category_id ) {
        if(empty($this->input->post('cropcategory')) || empty($this->input->post('crop_category_in_regional'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } else if( $this->Category_Model->updatecategory( $category_id )) {  
            $response = array("status" => 1, "message" => "Crop category master updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
    public function deletecategory( $category_id ) {
        if( $this->Category_Model->deletecategory( $category_id ) ) {
            $response = array("status" => 1, "message" => "Crop category master deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}   
    
    public function getcropcategorybyid($category_id) {
        $result=$this->Category_Model->getcropcategoryByID($category_id);
		if($result) {
            $response = array("status" => 1);
        } else {
            $response = array("status" => 0);			
        }
        echo json_encode($response);
    }
	
	public function getcropsubcategorybyid($subcategory_id) {
        $result=$this->Category_Model->getcropsubcategoryByID($subcategory_id);
		if($result) {
            $response = array("status" => 1);
        } else {
            $response = array("status" => 0);			
        }
        echo json_encode($response);
    }

    public function getcropnamebyid($name_id) {
        $result=$this->Category_Model->getcropnameByID($name_id);
		if($result) {
            $response = array("status" => 1);
        } else {
            $response = array("status" => 0);			
        }
        echo json_encode($response);
    }	

	public function getcropvarietybyid($cropvariety_id) {
        $result=$this->Category_Model->getcropvarietyByID($cropvariety_id);
		if($result) {
            $response = array("status" => 1);
        } else {
            $response = array("status" => 0);			
        }
        echo json_encode($response);
    }
	public function getcropmasterbyid($cropmaster_id) {
        $result=$this->Category_Model->getcropmasterByID($cropmaster_id);
		if($result) {
            $response = array("status" => 1);
        } else {
            $response = array("status" => 0);			
        }
        echo json_encode($response);
    }
/** Crop Category END **/         
	
}
