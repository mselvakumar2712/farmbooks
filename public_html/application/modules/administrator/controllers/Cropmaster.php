<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cropmaster extends CI_Controller
{

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
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 || $this->session->userdata('user_type') != 0) {
            redirect('administrator/login/signout');
        }
        $this->load->model("Cropmaster_Model");
        $this->load->model("Variety_Model");
        $this->load->model("Category_Model");
        $this->load->model("Subcategory_Model");
        $this->load->model("Name_Model");
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
    }


    /** View Crop master related view by using the given functions **/
    public function index()
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'List Crop Master';
        $data['page_module'] = 'master_data';
        $data['crop_list'] = $this->Cropmaster_Model->cropList();
        //echo "<pre>";print_r($data);die;
        $this->load->view('cropmaster/listcrop_master', $data);
    }

    public function addcrop()
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'Add Crop Master';
        $data['page_module'] = 'master_data';

        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $this->load->view('cropmaster/addcrop_master', $data);
    }

    public function viewcrop()
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'View Crop Master';
        $data['page_module'] = 'master_data';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $this->load->view('cropmaster/viewcrop_master', $data);
    }
    /** End Crop views **/



    /** Crop Master Start **/
    public function croplist()
    {
        $crop_list = $this->Cropmaster_Model->cropList();
//        for($i=0;$i<count($crop_list);$i++) {
//            $crop_list[$i]->category_name = $this->Category_Model->get_category($crop_list[$i]->category_id)->name;
//            $crop_list[$i]->subcategory_name = $this->Subcategory_Model->get_subcategory($crop_list[$i]->subcategory_id)->name;
//            $crop_list[$i]->crop_name = $this->Name_Model->get_name($crop_list[$i]->name_id)->name;
//            $crop_list[$i]->variety_name = $this->Variety_Model->get_variety($crop_list[$i]->variety_id)->name;
//        }
        $response = array("status" => 1, "crop_list" => $crop_list);
        echo json_encode($response);
    }


    public function postcrop()
    {
//        if(empty($this->input->post('cropcategory')) || empty($this->input->post('cropsubcategory')) || empty($this->input->post('cropname')) || empty($this->input->post('cropvariety')) || empty($this->input->post('tenure')) || empty($this->input->post('harvesting_type')) || empty($this->input->post('yield_measurement'))) {
//            $response = array("status" => 0, "message" => "provide the mandatory fields");
//
//        } else

        if ($this->Cropmaster_Model->addcrop()) {
            $response = array("status" => 1, "message" => "New crop master created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
    }


    public function editcrop($crop_id)
    {
        $crop_list = $this->Cropmaster_Model->cropByID($crop_id);
        $response = array("status" => 1, "crop_list" => $crop_list);
        echo json_encode($response);
    }


    public function updatecrop($crop_id)
    {
        if (empty($this->input->post('cropcategory')) || empty($this->input->post('cropsubcategory')) || empty($this->input->post('cropname')) || empty($this->input->post('cropvariety')) || empty($this->input->post('tenure')) || empty($this->input->post('harvesting_type')) || empty($this->input->post('yield_measurement'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } elseif ($this->Cropmaster_Model->updatecrop($crop_id)) {
            $response = array("status" => 1, "message" => "Crop master updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
    }


    public function deletecrop($crop_id)
    {
        if ($this->Cropmaster_Model->deletecrop($crop_id)) {
            $response = array("status" => 1, "message" => "Crop master deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
    }
    /* get sub category by crop category id */
    public function getsubcategory()
    {
        $category = $this->input->post('crop_category');
        $result = $this->Cropmaster_Model->getSubcategory($category);
        echo json_encode($result);
    }

    public function getnameid()
    {
        $sub_category = $this->input->post('crop_sub_category');
        $result = $this->Cropmaster_Model->getnamebyid($sub_category);
        echo json_encode($result);
    }
    public function getvarietyid()
    {
        $nameid = $this->input->post('crop_name');
        $result = $this->Cropmaster_Model->getvarietybyid($nameid);
        echo json_encode($result);
    }
    /** Crop Master END **/
}
