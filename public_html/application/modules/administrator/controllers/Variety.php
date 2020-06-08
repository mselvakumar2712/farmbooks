<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Variety extends CI_Controller
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
        $this->load->library("session");
        if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 || $this->session->userdata('user_type') != 0) {
            redirect('administrator/login/signout');
        }
        $this->load->library('session');
        $this->load->model("Variety_Model");
        $this->load->model("Category_Model");
        $this->load->model("Subcategory_Model");
        $this->load->model("Name_Model");

        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
    }


    /** View Crop Variety master related view by using the given functions **/
    public function index()
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'List Crop Variety Master';
        $data['page_module'] = 'master_data';
        $this->load->view('cropvarietymaster/listcrop_varietymaster', $data);
    }

    public function addvariety()
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'Add Crop Variety Master';
        $data['page_module'] = 'master_data';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $this->load->view('cropvarietymaster/addcrop_varietymaster', $data);
    }

    public function viewvariety()
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'View Crop Variety Master';
        $data['page_module'] = 'master_data';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $this->load->view('cropvarietymaster/viewcrop_varietymaster', $data);
    }
    /** End Crop Variety views **/



    /** Crop Variety Master Start **/
    public function varietylist()
    {
        $variety_list = $this->Variety_Model->varietyList();
//        for($i=0;$i<count($variety_list);$i++) {
//            $variety_list[$i]->category_name = $this->Category_Model->get_category($variety_list[$i]->category_id)->name;
//            $variety_list[$i]->subcategory_name = $this->Subcategory_Model->get_subcategory($variety_list[$i]->subcategory_id)->name;
//            $variety_list[$i]->crop_name = $this->Name_Model->get_name($variety_list[$i]->name_id)->name;
//        }
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }


    public function postvariety()
    {
        if (empty($this->input->post('cropcategory')) || empty($this->input->post('cropsubcategory')) || empty($this->input->post('cropname')) || empty($this->input->post('cropvariety')) || empty($this->input->post('cropregional'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } elseif ($this->Variety_Model->addvariety()) {
            $response = array("status" => 1, "message" => "New crop variety master created successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
    }


    public function editvariety($variety_id)
    {
        $variety_list = $this->Variety_Model->varietyByID($variety_id);
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }


    public function updatevariety($variety_id)
    {
        if (empty($this->input->post('cropcategory')) || empty($this->input->post('cropsubcategory')) || empty($this->input->post('cropname')) || empty($this->input->post('cropvariety')) || empty($this->input->post('cropregional'))) {
            $response = array("status" => 0, "message" => "provide the mandatory fields");
        } elseif ($this->Variety_Model->updatevariety($variety_id)) {
            $response = array("status" => 1, "message" => "Crop variety master updated successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
    }


    public function deletevariety($variety_id)
    {
        if ($this->Variety_Model->deletevariety($variety_id)) {
            $response = array("status" => 1, "message" => "Crop variety master deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
    }

    /** Crop Variety END **/
}
