<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cropstandard extends CI_Controller {

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
		if (!$this->session->userdata('name')  || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}
        $this->load->library('session');        
        $this->load->model("Cropstandard_Model");
        $this->load->model("Cropmaster_Model");
        $this->load->model("Variety_Model");
        $this->load->model("Category_Model");
        $this->load->model("Subcategory_Model");
        $this->load->model("Name_Model");
		$this->load->model("Location_Model");
        $this->load->model("Masterdata_Model");
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
	
    
    
/** View crop Standard master related view by using the given functions **/
    public function index() {        
        $data['page'] = 'Crop Standard Master';
		$data['page_title'] = 'List Crop Standard Master';	
        $data['page_module'] = 'master_data';		
        $this->load->view('cropstandardmaster/listcrop_standard', $data); 
	}    
    
	public function addcropstandard() {
        $data['page'] = 'Crop Standard Master';
		$data['page_title'] = 'Add Crop Standard Master';
        $data['page_module'] = 'master_data';		
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $data['crop'] = $this->Cropmaster_Model->cropDropdownList();
		$data['state']= $this->Location_Model->state_list();
		$data['season'] = $this->Masterdata_Model->season_list();
		$data['uom'] = $this->Masterdata_Model->uom_list();
        $this->load->view('cropstandardmaster/addcrop_standard', $data); 
	}
        
    public function viewcropstandard() {
        $data['page'] = 'Crop Standard Master';
		$data['page_title'] = 'View Crop Standard Master';	
        $data['page_module'] = 'master_data';		
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $data['crop'] = $this->Cropmaster_Model->cropDropdownList();
		$data['state']= $this->Location_Model->state_list();
		$data['season'] = $this->Masterdata_Model->season_list();
		$data['uom'] = $this->Masterdata_Model->uom_list();
        $this->load->view('cropstandardmaster/viewcrop_standard', $data); 
	}
/** End crop Standard views **/      

    
    
/** crop Standard Master Start **/  
    public function cropstandardmasterlist() {
        $cropstandard_list = $this->Cropstandard_Model->cropstandardmasterList();
        for($i=0;$i<count($cropstandard_list);$i++) {
            $cropstandard_list[$i]->crop_name = $this->Name_Model->get_name($cropstandard_list[$i]->crop_id)->name;
            $cropstandard_list[$i]->variety_name = $this->Variety_Model->get_variety($cropstandard_list[$i]->variety_id)->variety;
        }
        $response = array("status" => 1, "cropstandard_list" => $cropstandard_list);
        echo json_encode($response);
	}
        
    
    public function postcropstandardmaster() {        
        if(empty($this->input->post('crop')) || empty($this->input->post('variety')) || empty($this->input->post('crop_type')) || empty($this->input->post('area')) || empty($this->input->post('area_uom')) || empty($this->input->post('quantity_uom')) || empty($this->input->post('state')) || empty($this->input->post('district'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
            
        } else if( $this->Cropstandard_Model->addcropstandardmaster()) {  
            $response = array("status" => 1, "message" => "New crop standard master created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
	public function editcropstandardmaster( $cropstandard_id ) {
        $cropstandard_list = $this->Cropstandard_Model->cropstandardmasterByID( $cropstandard_id );
        //$cropstandard_list->variety_name = $this->Variety_Model->get_variety($cropstandard_list->variety_id)->name;
        $response = array("status" => 1, "cropstandard_list" => $cropstandard_list);
        echo json_encode($response);
	}
    
    
    public function updatecropstandardmaster( $cropstandard_id ) {
        if(empty($this->input->post('crop')) || empty($this->input->post('variety')) || empty($this->input->post('crop_type')) || empty($this->input->post('area')) || empty($this->input->post('area_uom')) || empty($this->input->post('quantity_uom')) || empty($this->input->post('state')) || empty($this->input->post('district'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
            
        } else if( $this->Cropstandard_Model->updatecropstandardmaster( $cropstandard_id )) {  
            $response = array("status" => 1, "message" => "Crop standard master updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
    
    
    public function deletecropstandardmaster( $cropstandard_id ) {
        if( $this->Cropstandard_Model->deletecropstandardmaster( $cropstandard_id ) ) {
            $response = array("status" => 1, "message" => "Crop standard master deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
	public function getvariety() { 	 
		$crop = $this->input->post('crop');
		$result = $this->Cropstandard_Model->getvarietybyid($crop);
		echo json_encode($result);	
	}
/** cropstandard Standard Master END **/         
}
