<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

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
        $this->load->model("Subcategory_Model");
        $this->load->model("Category_Model");
        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}

    
/** View Crop Subcategory master related view by using the given functions **/
    public function index() {        
        $data['page'] = 'Crop Subcategory Master';
		$data['page_title'] = 'List Crop Subcategory Master';
        $data['page_module'] = 'master_data';		
        $this->load->view('cropsubcategorymaster/listcrop_subcategory', $data); 
	}    
    
	public function addsubcategory() {
        $data['page'] = 'Crop Subcategory Master';
		$data['page_title'] = 'Add Crop Subcategory Master';
        $data['page_module'] = 'master_data';		
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $this->load->view('cropsubcategorymaster/addcrop_subcategory', $data); 
	}
        
    public function viewsubcategory() {
        $data['page'] = 'Crop Subcategory Master';
		$data['page_title'] = 'View Crop Subcategory Master'; 
        $data['page_module'] = 'master_data';		
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $this->load->view('cropsubcategorymaster/viewcrop_subcategory', $data); 
	}
/** End Crop Subcategory views **/      

    
    
/** Crop Subcategory Master Start **/  
    public function subcategorylist() {
        $subcategory_list = $this->Subcategory_Model->subcategoryList();
//        for($i=0;$i<count($subcategory_list);$i++) {
//            $category_name = $this->Category_Model->get_category($subcategory_list[$i]->category_id)->name;
//            $subcategory_list[$i]->category_name = $category_name;                       
//            unset($category_name);
//        }
        $response = array("status" => 1, "subcategory_list" => $subcategory_list);
        echo json_encode($response);
	}
        
    
    public function postsubcategory() {
        if(empty($this->input->post('cropcategory')) || empty($this->input->post('cropsubcategory')) || empty($this->input->post('crop_category_in_regional'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } else if( $this->Subcategory_Model->addsubcategory()) {  
            $response = array("status" => 1, "message" => "New crop subcategory master created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
	public function editsubcategory( $subcategory_id ) {
        $subcategory_list = $this->Subcategory_Model->subcategoryByID( $subcategory_id );
        $response = array("status" => 1, "subcategory_list" => $subcategory_list);
        echo json_encode($response);
	}
    
    
    public function updatesubcategory( $subcategory_id ) {
        if(empty($this->input->post('cropcategory')) || empty($this->input->post('cropsubcategory')) || empty($this->input->post('crop_category_in_regional'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } else if( $this->Subcategory_Model->updatesubcategory( $subcategory_id )) {  
            $response = array("status" => 1, "message" => "Crop subcategory master updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
    public function deletesubcategory( $subcategory_id ) {
        if( $this->Subcategory_Model->deletesubcategory( $subcategory_id ) ) {
            $response = array("status" => 1, "message" => "Crop subcategory master deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
    
/** End Crop Subcategory End **/     
        	
}
