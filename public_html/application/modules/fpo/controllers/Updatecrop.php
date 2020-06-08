<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Updatecrop extends CI_Controller
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
    **/

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('name') || $this->session->userdata('user_type') != 3 || $this->session->userdata('is_active') == 0) {
            redirect('fpo/login/signout');
        }
        $this->load->model("Crop_Model");
        $this->load->model("Cropmaster_Model");
        $this->load->model("Variety_Model");
        $this->load->model("Category_Model");
        $this->load->model("Subcategory_Model");
        $this->load->model("Name_Model");
        header('Access-Control-Allow-Origin: *');
    }

    /**Update crop views **/
    public function index()
    {
        $data['page'] = 'Update Crop';
        $data['page_title'] = 'Update Crop List';
        $data['page_module'] = 'crop';
        $data['update_crop'] = $this->Crop_Model->updateCropList();
        $this->load->view('crop/updatecrop_list', $data);
    }

    public function add_updatecrop()
    {
        $data['page'] = 'Update Crop';
        $data['page_title'] = 'Add Update Crop';
        $data['page_module'] = 'crop';

        $data['cropEntry_name'] = $this->Crop_Model->cropnameDropdownList();
        $data['cropEntry_variety'] = $this->Crop_Model->cropvarietyDropdown();
        $data['nutrient'] = $this->Crop_Model->nutrientDropdownList();
        $data['fertilizer'] = $this->Crop_Model->fertilizerDropdownList();
        $data['pesticide'] = $this->Crop_Model->pesticideDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        //$data['nutrientname'] = $this->Crop_Model->nutrientDropdownList();
        $this->load->view('crop/addupdate_crop', $data);
    }

    public function view_updatecrop($updatecrop_id)
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'View Update Crop';
        $data['page_module'] = 'crop';

        $data['cropEntry_name'] = $this->Crop_Model->cropnameDropdownList();
        $data['cropEntry_variety'] = $this->Crop_Model->cropvarietyDropdownList();
        $data['nutrient'] = $this->Crop_Model->nutrientDropdownList();
        $data['fertilizer'] = $this->Crop_Model->fertilizerDropdownList();
        $data['pesticide'] = $this->Crop_Model->pesticideDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();

        $data['updatecrop_list'] = $this->Crop_Model->upateCropByCropID($updatecrop_id);
        //echo json_encode($data['updatecrop_list']);
        $this->load->view('crop/viewupdate_crop', $data);
    }

    public function edit_updatecrop($updatecrop_id)
    {
        $data['page'] = 'Crop Master';
        $data['page_title'] = 'Edit Update Crop';
        $data['page_module'] = 'crop';

        $data['cropEntry_name'] = $this->Crop_Model->cropnameDropdownList();
        $data['cropEntry_variety'] = $this->Crop_Model->cropvarietyDropdownList();
        $data['nutrient'] = $this->Crop_Model->nutrientDropdownList();
        $data['fertilizer'] = $this->Crop_Model->fertilizerDropdownList();
        $data['pesticide'] = $this->Crop_Model->pesticideDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();

        $data['updatecrop_list'] = $this->Crop_Model->upateCropByCropID($updatecrop_id);
        $this->load->view('crop/editupdate_crop', $data);
    }
    /**Update crop views end **/

    /** Crop harvest views **/
    public function cropharvest()
    {
        $data['page'] = 'Crop Harvest';
        $data['page_title'] = 'Crop Harvest List';
        $data['page_module'] = 'crop';

        $data['crop_harvest'] = $this->Crop_Model->cropHarvestList();
        $this->load->view('crop/cropharvest_list', $data);
    }

    public function addharvest()
    {
        $data['page'] = 'Crop Harvest';
        $data['page_title'] = 'Add Crop Harvest';
        $data['page_module'] = 'crop';
        $data['currentYear'] = date("Y-m-d");
        $data['cropEntry_variety'] = $this->Crop_Model->cropvarietyDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $this->load->view('crop/addharvest_crop', $data);
    }

    public function editcropharvest_value($crop_id)
    {
        $data['page'] = 'Crop Harvest';
        $data['page_title'] = 'View Crop Harvest';
        $data['page_module'] = 'crop';

        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $data['currentYear'] = date("Y-m-d");
        $data['cropEntry_variety'] = $this->Crop_Model->cropvarietyDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();

        $data['cropharvest_list'] = $this->Crop_Model->editcropharvest($crop_id);
        //echo json_encode($data['cropharvest_list']);
        $this->load->view('crop/edit_harvest_crop', $data);
    }

    public function viewharvest($crop_id)
    {
        $data['page'] = 'Crop Harvest';
        $data['page_title'] = 'View Crop Harvest';
        $data['page_module'] = 'crop';

        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $data['currentYear'] = date("Y-m-d");
        $data['cropEntry_variety'] = $this->Crop_Model->cropvarietyDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();

        $data['cropharvest_list'] = $this->Crop_Model->editcropharvest($crop_id);
        //echo json_encode($data['cropharvest_list']);
        $this->load->view('crop/viewharvest_crop', $data);
    }
    /** Crop harvest views end **/

    /** Post harvest views **/
    public function postharvest()
    {
        $data['page'] = 'Post Harvest';
        $data['page_title'] = 'Post Harvest List';
        $data['page_module'] = 'crop';

        $data['post_harvest'] = $this->Crop_Model->postHarvestList();
        $this->load->view('crop/postharvest_list', $data);
    }

    public function addpostharvest()
    {
        $data['page'] = 'Post Harvest';
        $data['page_title'] = 'Add Post Harvest';
        $data['page_module'] = 'crop';
        $data['currentYear'] = date("Y-m-d");
        $data['cropEntry'] = $this->Crop_Model->cropnameDropdownList();
        $data['worktype'] = $this->Cropmaster_Model->worktypeDropdownList();
        $data['cropname'] = $this->Name_Model->nameDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $this->load->view('crop/add_postharvest', $data);
    }

    public function viewpostharvest($harvest_id)
    {
        $data['page'] = 'Post Harvest';
        $data['page_title'] = 'View Post Harvest';
        $data['page_module'] = 'crop';
        $data['currentYear'] = date("Y-m-d");

        //$data['cropEntry'] = $this->Crop_Model->cropnameDropdownList();
        $data['cropname'] = $this->Name_Model->nameDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $data['worktype'] = $this->Cropmaster_Model->worktypeDropdownList();

        $postharvest_list = $this->Crop_Model->editpostharvest($harvest_id);
        $data['post_harvest_output'] = $this->Crop_Model->postHarvestOutputList($postharvest_list->farmer_id, $postharvest_list->crop_id);
        $data['postharvest_list'] = $postharvest_list;
        $this->load->view('crop/view_postharvest', $data);
    }

    public function editpostharvest($harvest_id)
    {
        $data['page'] = 'Post Harvest';
        $data['page_title'] = 'Edit Post Harvest';
        $data['page_module'] = 'crop';
        $data['currentYear'] = date("Y-m-d");

        //$data['cropEntry'] = $this->Crop_Model->cropnameDropdownList();
        $data['cropname'] = $this->Name_Model->nameDropdownList();
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        $data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $data['worktype'] = $this->Cropmaster_Model->worktypeDropdownList();

        $postharvest_list = $this->Crop_Model->editpostharvest($harvest_id);
        $data['post_harvest_output'] = $this->Crop_Model->postHarvestOutputList($postharvest_list->farmer_id, $postharvest_list->crop_id);
        $data['postharvest_list'] = $postharvest_list;
        $this->load->view('crop/edit_postharvest', $data);
    }

    public function getCropByName()
    {
        $crop_name = $this->Crop_Model->getCropName();
        $response = array("status" => 1, "crop_name" => $crop_name);
        echo json_encode($response);
    }

    public function getImplementByName($farmimplements_id)
    {
        $type_implement_name = $this->Masterdata_Model->getTypeByName($farmimplements_id);
        $response = array("status" => 1, "type_implement_name" => $type_implement_name);
        echo json_encode($response);
    }


    /** Post harvest views end **/


    /** Update crop Functionality **/
    //public function updatecroplist() {
    //$update_crop = $this->Crop_Model->updateCropList();
    //print_r($update_crop);
    /*  for($i=0;$i<count($update_crop);$i++) {
         if($update_crop[$i]->update_type == 1) {
             $update_crop[$i]->brand_name = $this->Crop_Model->nutrientBrandList( explode(',', $update_crop[$i]->brand_name) );

         } else if($update_crop[$i]->update_type == 2) {
             $update_crop[$i]->brand_name = $this->Crop_Model->fertilizerBrandList( explode(',', $update_crop[$i]->brand_name) );

         } else if($update_crop[$i]->update_type == 3) {
             $update_crop[$i]->brand_name = $this->Crop_Model->pesticideBrandList( explode(',', $update_crop[$i]->brand_name) );

         } else {
             if($update_crop[$i]->weed_type == 3) {
                 $update_crop[$i]->brand_name = $this->Crop_Model->pesticideBrandList( explode(',', $update_crop[$i]->brand_name) );
             } else {
                 $update_crop[$i]->brand_name="";
             }
         }
     } */
    //$response = array("status" => 1, "update_crop" => $update_crop);
    //echo json_encode($response);
    // }


    public function updatecrop_add()
    {
        if ($this->cropValidator() == 0) {
            //$response = array("status" => 0, "message" => "provide the mandatory fields");
            $this->session->set_flashdata('warning', 'provide the mandatory fields');
            redirect('fpo/Updatecrop/add_updatecrop');
        } else {
            if ($this->Crop_Model->add_updatecrop()) {
                //$response = array("status" => 1, "message" => "Crop update entry added");
                $this->session->set_flashdata('success', 'Update crop added successfully');
                redirect('fpo/updatecrop');
            } else {
                //$response = array("status" => 0, "message" => "Technical problem");
                $this->session->set_flashdata('warning', 'Technical problem');
                redirect('fpo/updatecrop');
            }
        }
        //echo json_encode($response);
    }


    /*public function updatecrop_edit( $updatecrop_id ) {
        $updatecrop_list = $this->Crop_Model->upateCropByCropID( $updatecrop_id );
        $response = array("status" => 1, "updatecrop_list" => $updatecrop_list);
        echo json_encode($response);
    }*/


    public function update_crop($updatecrop_id)
    {
        if ($this->cropValidator() == 0) {
            $this->session->set_flashdata('warning', 'provide the mandatory fields');
            redirect('fpo/Updatecrop/edit_updatecrop/'.$updatecrop_id);
        } else {
            if ($this->Crop_Model->update_crop($updatecrop_id)) {
                $this->session->set_flashdata('success', 'Update crop updated successfully');
                redirect('fpo/updatecrop');
            } else {
                $this->session->set_flashdata('warning', 'Technical problem');
                redirect('fpo/updatecrop');
            }
        }
        //echo json_encode($response);
    }


    public function cropValidator()
    {
        if ($this->input->post('update_type')== 1) {
            if (empty($this->input->post('farmer_id')) || empty($this->input->post('update_type')) || empty($this->input->post('nutrient_variety')) || empty($this->input->post('nutrient_name')) || empty($this->input->post('nutrient_dosage_date')) || empty($this->input->post('nutrient_brand_name')) || empty($this->input->post('nutrient_quantity')) || empty($this->input->post('nutrient_quantity_uom'))) {
                return false;
            } else {
                return true;
            }
        } elseif ($this->input->post('update_type')== 2) {
            if (empty($this->input->post('farmer_id')) || empty($this->input->post('update_type')) || empty($this->input->post('fertilizer_variety')) || empty($this->input->post('fertilizer_name')) || empty($this->input->post('fertilizer_dosage_date')) || empty($this->input->post('fertilizer_brand_name')) || empty($this->input->post('fertilizer_feed_type')) || empty($this->input->post('fertilizer_quantity')) || empty($this->input->post('fertilizer_quantity_uom'))) {
                return false;
            } else {
                return true;
            }
        } elseif ($this->input->post('update_type')== 3) {
            if (empty($this->input->post('farmer_id')) || empty($this->input->post('update_type')) || empty($this->input->post('pesticide_variety')) || empty($this->input->post('pesticide_name')) || empty($this->input->post('pesticide_dosage_date')) || empty($this->input->post('pesticide_brand_name')) || empty($this->input->post('pesticide_feed_type')) || empty($this->input->post('pesticide_quantity')) || empty($this->input->post('pesticide_quantity_uom'))) {
                return false;
            } else {
                return true;
            }
        } else {
            if (empty($this->input->post('farmer_id')) || empty($this->input->post('update_type')) || empty($this->input->post('weeding_variety')) || empty($this->input->post('weeding_dosage_date')) || empty($this->input->post('type_weeding')) || empty($this->input->post('weeding_quantity')) || empty($this->input->post('weeding_quantity_uom'))) {
                return false;
            } else {
                return true;
            }
        }
    }
    /**Update crop end **/



    /** Crop harvest Functionality **/
    /*public function cropharvestlist( $crop_id=null ) {
        $crop_harvest = $this->Crop_Model->cropHarvestList();
        $response = array("status" => 1, "crop_harvest" => $crop_harvest);
        echo json_encode($response);
    }*/

    public function crop_harvest()
    {
        if ($this->cropharvestValidator() == 0) {
            $this->session->set_flashdata('warning', 'provide the mandatory fields');
            redirect('fpo/Updatecrop/addharvest');
        } else {
            if ($this->Crop_Model->cropharvest()) {
                $this->session->set_flashdata('success', 'Crop harvest added successfully');
                redirect('fpo/updatecrop/cropharvest');
            } else {
                $this->session->set_flashdata('success', 'Technical problem');
                redirect('fpo/updatecrop/cropharvest');
            }
        }
        //echo json_encode($response);
    }


    /* public function editcropharvest( $crop_id ) {
         $cropharvest_list = $this->Crop_Model->editcropharvest( $crop_id );
         $response = array("status" => 1, "cropharvest_list" => $cropharvest_list);
         echo json_encode($response);
     }*/


    public function updatecropharvest($crop_id)
    {
        if ($this->cropharvestValidator() == 0) {
            $this->session->set_flashdata('warning', 'provide the mandatory fields');
            redirect('fpo/Updatecrop/editcropharvest_value/'.$crop_id);
        } else {
            if ($this->Crop_Model->updatecropharvest($crop_id)) {
                $this->session->set_flashdata('success', 'Crop harvest updated successfully');
                redirect('fpo/updatecrop/cropharvest');
            } else {
                $this->session->set_flashdata('success', 'Technical problem');
                redirect('fpo/updatecrop/cropharvest');
            }
        }
        //echo json_encode($response);
    }


    public function cropharvestValidator()
    {
        if (empty($this->input->post('farmer_id')) || empty($this->input->post('crop_variety')) || empty($this->input->post('harvest_date')) || empty($this->input->post('output_product')) || empty($this->input->post('output_qty')) || empty($this->input->post('output_quantity_uom')) || empty($this->input->post('harvest_method'))) {
            return false;
        } else {
            return true;
        }
    }
    /** Crop harvest end **/



    /** Post Crop harvest Functionality **/
    /* public function postharvestlist() {
         $post_harvest = $this->Crop_Model->postHarvestList();
         $response = array("status" => 1, "post_harvest" => $post_harvest);
         echo json_encode($response);
     }*/

    public function post_harvest()
    {
        if ($this->postHarvestValidator() == 0) {
            $this->session->set_flashdata('warning', 'provide the mandatory fields');
            redirect('fpo/Updatecrop/addpostharvest');
        //$response = array("status" => 1, "message" => "provide the mandatory fields");
        } else {
            if ($this->Crop_Model->postharvest()) {
                //$response = array("status" =>2, "message" => "Post harvest added");
                $this->session->set_flashdata('success', 'Post harvest added successfully');
                redirect('fpo/Updatecrop/postharvest');
            } else {
                //$response = array("status" => 3, "message" => "Technical problem");
                $this->session->set_flashdata('warning', 'Technical problem');
                redirect('fpo/Updatecrop/postharvest');
            }
        }
        //echo json_encode($response);
    }


    /*public function editpostharvest( $postharvest_id ) {
        $postharvest_list = $this->Crop_Model->editpostharvest( $postharvest_id );
        $response = array("status" => 1, "postharvest_list" => $postharvest_list);
        echo json_encode($response);
    }*/


    public function updatepostharvest($crop_id)
    {
        //echo json_encode($this->input->post()); die;
        if ($this->postHarvestValidator() == 0) {
            $this->session->set_flashdata('warning', 'provide the mandatory fields');
            redirect('fpo/Updatecrop/editpostharvest/'.$crop_id);
        } else {
            if ($this->Crop_Model->updatepostharvest($crop_id)) {
                $this->session->set_flashdata('success', 'Post harvest updated successfully');
                redirect('fpo/Updatecrop/postharvest');
            } else {
                $this->session->set_flashdata('warning', 'Technical problem');
                redirect('fpo/Updatecrop/postharvest');
            }
        }
        //echo json_encode($response);
    }

    public function postHarvestValidator()
    {
        if (empty($this->input->post('farmer_id')) || empty($this->input->post('date')) || empty($this->input->post('variety')) || empty($this->input->post('type_of_work')) || empty($this->input->post('input')) || empty($this->input->post('input_qty')) || empty($this->input->post('input_qty_uom')) || empty($this->input->post('output_qty')) || empty($this->input->post('output_product'))) {
            return false;
        } else {
            return true;
        }
    }
    /** Post Crop harvest end **/
    public function variety($farmer_id)
    {
        $variety_list = $this->Crop_Model->cropvarietymasterDropdownList($farmer_id);

        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }
    public function variety_dropdown_value($farmer_id)
    {
        $variety_list = $this->Crop_Model->cropvarietyDropdown_value($farmer_id);

        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }
    public function nutrient($nutrient_id)
    {
        $nutrient_list = $this->Crop_Model->cropnutrientmasterDropdownList($nutrient_id);
        $response = array("status" => 1, "nutrient_list" => $nutrient_list);
        echo json_encode($response);
    }
    public function fertilizer($fertilizer_id)
    {
        $fertilizer_list = $this->Crop_Model->cropfertilizermasterDropdownList($fertilizer_id);
        $response = array("status" => 1, "fertilizer_list" => $fertilizer_list);
        echo json_encode($response);
    }
    public function pesticide($pesticide_id)
    {
        $pesticide_list = $this->Crop_Model->croppesticidemasterDropdownList($pesticide_id);
        $response = array("status" => 1, "pesticide_list" => $pesticide_list);
        echo json_encode($response);
    }
    public function crop($farmer_id)
    {
        $crop_list = $this->Crop_Model->cropmasterDropdownList($farmer_id);
        $response = array("status" => 1, "crop_list" => $crop_list);
        echo json_encode($response);
    }
    public function output($variety_id)
    {
        $output_list = $this->Crop_Model->outputmasterDropdownList($variety_id);
        $response = array("status" => 1, "output_list" => $output_list);
        echo json_encode($response);
    }
    public function inputmaster($crop_id)
    {
        $input_list = $this->Crop_Model->inputmasterDropdownList($crop_id);

        $response = array("status" => 1, "input_list" => $input_list);
        echo json_encode($response);
    }
    public function outputmaster($input_id)
    {
        $output_list = $this->Crop_Model->outputDropdownList($input_id);
        $response = array("status" => 1, "output_list" => $output_list);
        echo json_encode($response);
    }
    public function category($farmer_id)
    {
        $variety_list = $this->Crop_Model->cropcategorymasterDropdownList($farmer_id);
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }
    public function subcategorybycategory($category_id)
    {
        $subcategory_list = $this->Crop_Model->subcategoryByCategory($category_id);
        $response = array("status" => 1, "subcategory_list" => $subcategory_list);
        echo json_encode($response);
    }
    public function cropnamebycategory($subcategory_id)
    {
        $name_list = $this->Crop_Model->cropnameByCategory($subcategory_id);
        $response = array("status" => 1, "name_list" => $name_list);
        echo json_encode($response);
    }
    public function varietybycategory($name_id)
    {
        $variety_list = $this->Crop_Model->varietyByCategory($name_id);
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }

    //Expenses Module
    public function expenseslist()
    {
        $data['page'] = 'Expenses';
        $data['page_title'] = 'Expenses List';
        $data['page_module'] = 'crop';
        $data['expenses_info'] = $this->Crop_Model->expensesList();/* print_r($data['expenses_info']);die; */
        $this->load->view('crop/expenses_list', $data);
    }
    public function addexpenses_update()
    {
        $data['page'] = 'Expenses';
        $data['page_title'] = 'Add Expenses Updation';
        $data['page_module'] = 'crop';
        $data['currentYear'] = date("Y-m-d");
        $data['farmers'] = $this->Cropmaster_Model->farmerDropdownList();
        //$data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $this->load->view('crop/addexpenses_update', $data);
    }
    public function viewexpenses_update($expenses_id)
    {
        $data['page'] 		  = 'Expenses';
        $data['page_title']  = 'View Expenses Updation';
        $data['page_module'] = 'crop';
        $data['currentYear'] = date("Y-m-d");
        $data['expenses_info'] = $this->Crop_Model->expensesssList($expenses_id);
        //echo json_encode($data['expenses_info']);
        //$data['farmers']     = $this->Cropmaster_Model->farmerDropdownList();
        //$data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $this->load->view('crop/viewexpenses_update', $data);
    }
    public function editexpenses_update($expenses_id)
    {
        $data['page'] 		  = 'Expenses';
        $data['page_title']  = 'View Expenses Updation';
        $data['page_module'] = 'crop';
        $data['currentYear'] = date("Y-m-d");
        $data['expenses_info'] = $this->Crop_Model->expensesssList($expenses_id);//print_r($data['expenses_info']);die;
        $data['farmers']     = $this->Cropmaster_Model->farmerDropdownList();
        //$data['quantity_uom'] = $this->Cropmaster_Model->uomDropdownList();
        $this->load->view('crop/editexpenses_update', $data);
    }
    public function costseed($variety_id)
    {
        $cost_list = $this->Crop_Model->costseeddetail($variety_id);
        $response = array("status" => 1, "cost_list" => $cost_list);
        echo json_encode($response);
    }
    public function updatecost($variety_id)
    {
        $updatecost_list = $this->Crop_Model->updatecostdetail($variety_id);
        $response = array("status" => 1, "updatecost_list" => $updatecost_list);
        echo json_encode($response);
    }
    public function costharvest($variety_id)
    {
        $costharvest_list = $this->Crop_Model->costharvestdetail($variety_id);

        $response = array("status" => 1, "costharvest_list" => $costharvest_list);
        echo json_encode($response);
    }
    public function postharvestdetail($variety_id)
    {
        $postharvest_list = $this->Crop_Model->postharvestdetail($variety_id);
        $response = array("status" => 1, "postharvest_list" => $postharvest_list);
        echo json_encode($response);
    }

    public function postexpenses_update()
    {
        if ($this->Crop_Model->addexpenses()) {
            $this->session->set_flashdata('success', 'New Expenses added successfully.');
            redirect('fpo/updatecrop/expenseslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/updatecrop/addexpenses_update');
        }
    }

    public function updateexpenses($expenses_id)
    {
        if ($this->Crop_Model->updateexpenses($expenses_id)) {
            $this->session->set_flashdata('success', 'Expenses  updated successfully');
            redirect('fpo/updatecrop/expenseslist');
        } else {
            $this->session->set_flashdata('success', 'Data  Not Updated');
            redirect('fpo/updatecrop/addexpenses_update');
        }
    }
    public function seedByCategory($variety_id)
    {
        $class_list = $this->Crop_Model->seedByCategory($variety_id);
        $response = array("status" => 1, "class_list" => $class_list);
        echo json_encode($response);
    }
    public function land($farmer_id)
    {
        $land_list = $this->Crop_Model->landdetail($farmer_id);
        $response = array("status" => 1, "land_list" => $land_list);
        echo json_encode($response);
    }
    public function varietymaster($farmer_id)
    {
        $variety_list = $this->Crop_Model->cropvarietymastersDropdownList($farmer_id);
        ;
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }
    public function cropvarietymastersDropdown($farmer_id)
    {
        $variety_list = $this->Crop_Model->cropvarietymastersDropdown($farmer_id);
        ;
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }
    public function varietydosage($variety_id)
    {
        $dosage_list = $this->Crop_Model->varietydosagelist($variety_id);
        if ($dosage_list>0) {
            $response = array("status" => 1, "dosage_list" => $dosage_list);
        }

        echo json_encode($response);
    }
    public function weedingdosage($variety_id)
    {
        $dosage_list = $this->Crop_Model->weedingdosagelist($variety_id);
        if ($dosage_list>0) {
            $response = array("status" => 1, "dosage_list" => $dosage_list);
        }
        echo json_encode($response);
    }
    public function fertilizerdosage($variety_id)
    {
        $dosage_list = $this->Crop_Model->fertilizerdosagelist($variety_id);
        if ($dosage_list>0) {
            $response = array("status" => 1, "dosage_list" => $dosage_list);
        }
        echo json_encode($response);
    }
    public function pesticidedosage($variety_id)
    {
        $dosage_list = $this->Crop_Model->pesticidedosagelist($variety_id);
        if ($dosage_list>0) {
            $response = array("status" => 1, "dosage_list" => $dosage_list);
        }
        echo json_encode($response);
    }
    public function harvestvarietymaster($farmer_id)
    {
        $variety_list = $this->Crop_Model->harvestvarietymastersDropdownList($farmer_id);
        ;
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }
    public function postharvestvariety($farmer_id)
    {
        $variety_list = $this->Crop_Model->postharvestvarietymastersDropdownList($farmer_id);
        ;
        $response = array("status" => 1, "variety_list" => $variety_list);
        echo json_encode($response);
    }
    public function landarea($land_id)
    {
        $landarea_list = $this->Crop_Model->landareadetail($land_id);
        $response = array("status" => 1, "landarea_list" => $landarea_list);
        echo json_encode($response);
    }
}
