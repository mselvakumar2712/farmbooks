<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crop extends CI_Controller {

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
   $this->load->library('session');
      if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}
      $this->load->model("Crop_Model");
      $this->load->model("Cropmaster_Model");
      $this->load->model("Variety_Model");
      $this->load->model("Category_Model");
      $this->load->model("Subcategory_Model");
      $this->load->model("Name_Model");
      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}


/** View Crop master related view by using the given functions **/
    public function index() {
        $data['page'] = 'Crop_Farmer_Mapping';
        $data['page_module'] = 'crop';
        $data['page_title'] = 'List Crops';
        $this->load->view('crop/crop_list', $data);
	}

	public function addcrop() {
        $data['page'] = 'Crop_Farmer_Mapping';
        $data['page_module'] = 'crop';
        $data['page_title'] = 'Add Crops';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
		  $data['season'] = $this->Crop_Model->seasonByCategory();
        $data['crop_master'] = $this->Cropmaster_Model->cropDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
		  $data['area_uom'] = $this->Cropmaster_Model->areauomDropdownList();
		  $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $data['crop_class'] = $this->Crop_Model->cropclassDropdownList();
        $data['beforeMonth'] = date("Y-m-d",strtotime("-1 month"));
        $data['afterMonth'] = date("Y-m-d",strtotime("+3 month"));
        $this->load->view('crop/addcrop', $data);
	}




   public function post_crop() {
		if($result = $this->Crop_Model->post_crop()){
				 $this->session->set_flashdata('success', 'New crop entry added successfully');       
				 redirect('administrator/crop');
		} else {
			 $this->session->set_flashdata('warning', 'New crop entry not inserted.');       
			 redirect('administrator/crop');
		} 
	}
   




    public function viewcrop() {
        $data['page'] = 'Crop_Farmer_Mapping';
        $data['page_module'] = 'crop';
        $data['page_title'] = 'View Crops';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
		  $data['season'] = $this->Crop_Model->seasonByCategory();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $data['crop_master'] = $this->Cropmaster_Model->cropDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
		  $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
		  $data['area_uom'] = $this->Cropmaster_Model->areauomDropdownList();
        $data['crop_class'] = $this->Crop_Model->cropclassDropdownList();
	     $data['beforeMonth'] = date("Y-m-d",strtotime("-1 month"));
        $data['afterMonth'] = date("Y-m-d",strtotime("+3 month"));
        $this->load->view('crop/viewcrop', $data);
	}
   
   public function edit_crop($crop_id) {
        $data['page'] = 'Crop_Farmer_Mapping';
        $data['page_module'] = 'crop';
        $data['page_title'] = 'View Crops';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
		  $data['season'] = $this->Crop_Model->seasonByCategory();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $data['crop_master'] = $this->Cropmaster_Model->cropDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
		  $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
		  $data['area_uom'] = $this->Cropmaster_Model->areauomDropdownList();
        $data['crop_class'] = $this->Crop_Model->cropclassDropdownList();
	     $data['beforeMonth'] = date("Y-m-d",strtotime("-1 month"));
        $data['afterMonth'] = date("Y-m-d",strtotime("+3 month"));
        $data['croplist'] = $this->Crop_Model->cropId($crop_id);//print_r($data['croplist']['id'] );die;        
        $this->load->view('crop/editcrop', $data);
	}
/** End Crop views **/



/** Crop Start **/
    public function croplist() {
        $crop_list = $this->Crop_Model->cropList();
        $response = array("status" => 1, "crop_list" => $crop_list);
        echo json_encode($response);
	}


    public function postcrop() {
        if($this->cropValidator() == 0) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");

        } else if( $this->Crop_Model->addcrop()) {
            $response = array("status" => 1, "message" => "New crop entry added");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}


	public function editcrop( $crop_id ) {
        $crop_list = $this->Crop_Model->cropByID( $crop_id );
        $response = array("status" => 1, "crop_list" => $crop_list);
        echo json_encode($response);
	}


   public function updatecrop( $crop_id ) {
        if($this->cropValidator() == 0){
				 $this->session->set_flashdata('warning', 'provide the mandatory fields');         
				 redirect('administrator/crop');
        }else if( $this->Crop_Model->updatecrop( $crop_id )) {
             $this->session->set_flashdata('success', 'Crop updated successfully.');       
             redirect('administrator/crop');
        } else {
             $this->session->set_flashdata('warning', 'Technical problem.');                 
             redirect('administrator/crop');
        } 
	}
    public function deletecrop( $crop_id ) {
        if( $this->Crop_Model->deletecrop( $crop_id ) ) {
            $response = array("status" => 1, "message" => "Crop deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}


    public function cropbyname( $transplant_date, $name_id ) {
        $tenureDays = $this->Cropmaster_Model->get_cropbyname( $name_id )->tenure;
        $exp_harverst_date = date('Y-m-d',strtotime("+".$tenureDays." days", strtotime($transplant_date)));
        $response = array("status" => 1, "transplant_date" => $transplant_date, "tenureDays"=>$tenureDays, "exp_harverst_date" => $exp_harverst_date);
        echo json_encode($response);
	}


    function cropValidator() {
        if(empty($this->input->post('farmer_id'))||empty($this->input->post('crop_type')) || empty($this->input->post('variety')) || empty($this->input->post('crop_name')) || empty($this->input->post('crop_category')) || empty($this->input->post('crop_subcategory')) || empty($this->input->post('season')) || empty($this->input->post('area')) || empty($this->input->post('used_seed_qty')) || empty($this->input->post('exp_harvest_date')) || empty($this->input->post('area')) || empty($this->input->post('area_uom')) || empty($this->input->post('used_seed_qty')) || empty($this->input->post('quantity_uom') )) {
            return false;
        } else {
            return  true;
        }
    }

/** Crop END **/


}
