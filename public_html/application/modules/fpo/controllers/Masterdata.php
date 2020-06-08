<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata extends CI_Controller
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
        if (!$this->session->userdata('name')  || $this->session->userdata('user_type') != 3  || $this->session->userdata('is_active') == 0) {
            redirect('administrator/login/signout');
        }
        $this->load->model("Crop_Model");
        $this->load->model("Variety_Model");
        $this->load->model("Category_Model");
        $this->load->model("Subcategory_Model");
        $this->load->model("Name_Model");
        $this->load->model("Fpo_Model");
        $this->load->model("Location_Model");
        $this->load->model("Masterdata_Model");
        $this->load->model("Login_Model");
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
    }

    public function index()
    {
        $data['page'] = 'Master Data List';
        $data['page_title'] = 'Master Data List';
        $data['page_module'] = 'master_data';
        $this->load->view('menu/menulist', $data);
    }
    //state master start//
    public function statelist()
    {
        $data['page'] = 'State Master';
        $data['page_title'] = 'List State Master';
        $data['page_module'] = 'master_data';
        $data['state_list'] = $this->Location_Model->state_list();
        $this->load->view('masterdata/state/statelist', $data);
    }
    public function addstate()
    {
        $data['page'] = 'State Master';
        $data['page_title'] = 'Add State Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/state/addstate', $data);
    }


    public function viewstate($state_id)
    {
        $data['page'] = 'State Master';
        $data['page_title'] = 'View State Master';
        $data['page_module'] = 'master_data';
        $data['state_info'] = $this->Location_Model->stateByID($state_id);
        $this->load->view('masterdata/state/editstate', $data);
    }

    public function post_state()
    {
        if ($this->Location_Model->add_state()) {
            $this->session->set_flashdata('success', 'New State added successfully.');
            redirect('fpo/masterdata/statelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_state');
        }
    }

    public function updatestate()
    {
        $state_id=$this->input->post('state_id');
        if ($this->Location_Model->update_state($state_id)) {
            $this->session->set_flashdata('success', 'District updated successfully.');
            redirect('fpo/masterdata/statelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_state');
        }
    }

    public function delete_state($state_id)
    {
        $this->Location_Model->delete_state($state_id);
        $this->session->set_flashdata('success', 'State Deleted successfully');
        redirect('fpo/masterdata/statelist', "refresh");
    }

    //state master end//

    //district master start//

    public function districtlist()
    {
        $data['page'] = 'District Master';
        $data['page_title'] = 'List District Master';
        $data['page_module'] = 'master_data';
        $data['district_list'] = $this->Location_Model->district_list();
        $this->load->view('masterdata/district/districtlist', $data);
    }

    public function adddistrict()
    {
        $data['page'] = 'District Master';
        $data['page_title'] = 'Add District Master';
        $data['page_module'] = 'master_data';
        $data['state']= $this->Location_Model->state_list();
        $this->load->view('masterdata/district/adddistrict', $data);
    }

    public function viewdistrict($district_id)
    {
        $data['page'] = 'District Master';
        $data['page_title'] = 'View District Master';
        $data['page_module'] = 'master_data';
        $data['state']= $this->Location_Model->state_list();
        $data['district_info'] = $this->Location_Model->districtByID($district_id);
        $this->load->view('masterdata/district/editdistrict', $data);
    }

    public function post_district()
    {
        $result = $this->Location_Model->add_district();
        if (!empty($result)) {
            $this->session->set_flashdata('success', 'New District added successfully.');
            redirect('fpo/masterdata/districtlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_district');
        }
    }


    public function updatedistrict($district_id)
    {
        if ($this->Location_Model->update_district($district_id)) {
            $this->session->set_flashdata('success', 'District updated successfully.');
            redirect('fpo/masterdata/districtlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_district');
        }
    }

    public function delete_district($district_id)
    {
        $this->Location_Model->delete_district($district_id);
        $this->session->set_flashdata('success', 'District Deleted successfully');
        redirect('fpo/masterdata/districtlist', "refresh");
    }
    //district master end//


    //block master start//
    public function blocklist()
    {
        $data['page'] = 'Block Master';
        $data['page_title'] = 'List Block Master';
        $data['page_module'] = 'master_data';
        $data['block_list']= $this->Location_Model->block_list();
        $this->load->view('masterdata/block/blocklist', $data);
    }

    public function addblock()
    {
        $data['page'] = 'Block Master';
        $data['page_title'] = 'Add Block Master';
        $data['page_module'] = 'master_data';
        $data['state']= $this->Location_Model->state_list();
        $this->load->view('masterdata/block/addblock', $data);
    }

    public function viewblock($block_id)
    {
        $data['page'] = 'Block Master';
        $data['page_title'] = 'View Block Master';
        $data['page_module'] = 'master_data';
        $data['block_info']= $this->Location_Model->blockByID($block_id);
        $data['state']= $this->Location_Model->state_list();
        $this->load->view('masterdata/block/editblock', $data);
    }

    /* public function block_list() {
      $block_list = $this->Location_Model->block_list();
      $response = array("status" => 1, "block_list" => $block_list);
      echo json_encode($response);;
    } */

    public function post_block()
    {
        if ($this->Location_Model->add_block()) {
            $this->session->set_flashdata('success', 'New Block added successfully.');
            redirect('fpo/masterdata/blocklist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_block');
        }
    }

    public function get_statelist()
    {
        $result=$this->Location_Model->taluk_list();
        echo json_encode($result);
    }

    public function updateblock($block_id)
    {
        if ($this->Location_Model->update_block($block_id)) {
            $this->session->set_flashdata('success', 'Block updated successfully.');
            redirect('fpo/masterdata/blocklist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_block');
        }
    }

    public function get_state()
    {
        $result=$this->Location_Model->state_list();
        echo json_encode($result);
    }

    public function delete_block($block_id)
    {
        $this->Location_Model->delete_block($block_id);
        $this->session->set_flashdata('success', 'Block Deleted successfully');
        redirect('fpo/masterdata/blocklist', "refresh");
    }
    //block master end//

    //taluk master start//

    public function taluklist()
    {
        $data['page'] = 'Taluk Master';
        $data['page_title'] = 'List Taluk Master';
        $data['page_module'] = 'master_data';
        $data['taluk_list'] = $this->Location_Model->taluk_list();
        $this->load->view('masterdata/taluk/taluklist', $data);
    }

    public function addtaluk()
    {
        $data['page'] = 'Taluk Master';
        $data['page_title'] = 'Add Taluk Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $this->load->view('masterdata/taluk/addtaluk', $data);
    }

    public function viewtaluk($taluk_id)
    {
        $data['page'] = 'Taluk Master';
        $data['page_title'] = 'View Taluk Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $data['taluk_info']= $this->Location_Model->talukByID($taluk_id);
        $this->load->view('masterdata/taluk/edittaluk', $data);
    }

    /*
    public function taluk_list() {
      $taluk_list = $this->Location_Model->taluk_list();
      $response = array("status" => 1, "taluk_list" => $taluk_list);
      echo json_encode($response);;
    } */

    public function post_taluk()
    {
        if ($this->Location_Model->add_taluk()) {
            $this->session->set_flashdata('success', 'New  Taluk created successfully.');
            redirect('fpo/masterdata/taluklist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/viewtaluk');
        }
    }


    public function updatetaluk($taluk_id)
    {
        if ($this->Location_Model->update_taluk($taluk_id)) {
            $this->session->set_flashdata('success', 'Taluk updated successfully.');
            redirect('fpo/masterdata/taluklist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/taluklist');
        }
    }


    public function delete_taluk($taluk_id)
    {
        $this->Location_Model->delete_taluk($taluk_id);
        $this->session->set_flashdata('success', 'Taluk Deleted successfully');
        redirect('fpo/masterdata/taluklist', "refresh");
    }

    //taluk master end//

    //panchayat master start//

    public function grampanchayatlist()
    {
        $data['page'] = 'Gram Panchayat Master';
        $data['page_title'] = 'List Gram Panchayat Master';
        $data['page_module'] = 'master_data';
        $data['panchayat_list'] = $this->Location_Model->panchayat_list();
        $this->load->view('masterdata/grampanchayat/panchayatlist', $data);
    }


    public function addgrampanchayat()
    {
        $data['page'] = 'Gram Panchayat Master';
        $data['page_title'] = 'Add Gram Panchayat Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $this->load->view('masterdata/grampanchayat/addpanchayat', $data);
    }


    public function viewgrampanchayat($panchayat_id)
    {
        $data['page'] = 'Gram Panchayat Master';
        $data['page_title'] = 'View Gram Panchayat Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $data['panchayat_info']=$this->Location_Model->panchayatByID($panchayat_id);
        $this->load->view('masterdata/grampanchayat/editpanchayat', $data);
    }


    public function post_panchayat()
    {
        if ($this->Location_Model->add_panchayat()) {
            $this->session->set_flashdata('success', 'New Gram panchayat created  successfully.');
            redirect('fpo/masterdata/grampanchayatlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/viewpanchayat');
        }
    }


    public function updatepanchayat($panchayat_id)
    {
        if ($this->Location_Model->update_panchayat($panchayat_id)) {
            $this->session->set_flashdata('success', 'Gram panchayat updated successfully.');
            redirect('fpo/masterdata/grampanchayatlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/grampanchayatlist');
        }
    }


    public function delete_panchayat($panchayat_id)
    {
        $this->Location_Model->delete_panchayat($panchayat_id);
        $this->session->set_flashdata('success', 'Gram panchayat  Deleted successfully');
        redirect('fpo/masterdata/grampanchayatlist', "refresh");
    }
    //panchayat master end//

    //village master start//

    public function villagelist()
    {
        $data['page'] = 'Village Master';
        $data['page_title'] = 'List Village Master';
        $data['page_module'] = 'master_data';
        $data['village_list'] = $this->Location_Model->village_list();
        $this->load->view('masterdata/village/villagelist', $data);
    }


    public function addvillage()
    {
        $data['page'] = 'Village Master';
        $data['page_title'] = 'Add Village Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $this->load->view('masterdata/village/addvillage', $data);
    }


    public function viewvillage($village_id)
    {
        $data['page'] = 'Village Master';
        $data['page_title'] = 'View Village Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $data['village_info']=$this->Location_Model->villageByID($village_id);
        $this->load->view('masterdata/village/editvillage', $data);
    }


    public function post_village()
    {
        if ($this->Location_Model->add_village()) {
            $this->session->set_flashdata('success', 'New Village created  successfully.');
            redirect('fpo/masterdata/villagelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/viewvillage');
        }
    }

    public function updatevillage($village_id)
    {
        if ($this->Location_Model->update_panchayat($village_id)) {
            $this->session->set_flashdata('success', 'Village updated successfully.');
            redirect('fpo/masterdata/villagelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/villagelist');
        }
    }


    public function delete_village($village_id)
    {
        $this->Location_Model->delete_Village($village_id);
        $this->session->set_flashdata('success', 'Village  Deleted successfully');
        redirect('fpo/masterdata/villagelist', "refresh");
    }


    //village master end//

    //category master start//

    public function categorylist()
    {
        $data['page'] = 'Category Master';
        $data['page_title'] = 'List Category Master';
        $data['page_module'] = 'master_data';
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['category_list'] = $this->Masterdata_Model->category_list();
        $this->load->view('masterdata/category/categorylist', $data);
    }


    public function addcategory()
    {
        $data['page'] = 'Category Master';
        $data['page_title'] = 'Add Category Master';
        $data['page_module'] = 'master_data';
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $this->load->view('masterdata/category/addcategory', $data);
    }


    public function viewcategory($category_id)
    {
        $data['page'] = 'Category Master';
        $data['page_title'] = 'View Category Master';
        $data['page_module'] = 'master_data';
        $data['category_info'] = $this->Masterdata_Model->categoryByID($category_id);
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $this->load->view('masterdata/category/editcategory', $data);
    }

    public function post_category()
    {
        if ($this->Masterdata_Model->add_category()) {
            $this->session->set_flashdata('success', 'New Category added successfully.');
            redirect('fpo/masterdata/categorylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_category');
        }
    }

    public function updatecategory($category_id)
    {
        if ($this->Masterdata_Model->update_category($category_id)) {
            $this->session->set_flashdata('success', 'Category updated successfully.');
            redirect('fpo/masterdata/categorylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_category');
        }
    }

    public function delete_category($category_id)
    {
        $this->Masterdata_Model->delete_category($category_id);
        $this->session->set_flashdata('success', 'Category Deleted successfully');
        redirect('fpo/masterdata/categorylist', "refresh");
    }

    //category master end//

    //subcategory master start//

    public function subcategorylist()
    {
        $data['page'] = 'SubCategory Master';
        $data['page_title'] = 'List SubCategory Master';
        $data['page_module'] = 'master_data';
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['category'] = $this->Masterdata_Model->category_list();
        $data['subcategory_list'] = $this->Masterdata_Model->subcategory_list();
        $this->load->view('masterdata/subcategory/subcategorylist', $data);
    }


    public function addsubcategory()
    {
        $data['page'] = 'SubCategory Master';
        $data['page_title'] = 'Add SubCategory Master';
        $data['page_module'] = 'master_data';
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['category'] = $this->Masterdata_Model->category_list();
        $this->load->view('masterdata/subcategory/addsubcategory', $data);
    }


    public function viewsubcategory($subcategory_id)
    {
        $data['page'] = 'SubCategory Master';
        $data['page_title'] = 'View SubCategory Master';
        $data['page_module'] = 'master_data';
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['category'] = $this->Masterdata_Model->category_list();
        $data['subcategory_info'] = $this->Masterdata_Model->subcategoryByID($subcategory_id);
        $this->load->view('masterdata/subcategory/editsubcategory', $data);
    }

    public function post_subcategory()
    {
        if ($this->Masterdata_Model->add_subcategory()) {
            $this->session->set_flashdata('success', 'New Sub Category added successfully.');
            redirect('fpo/masterdata/subcategorylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_subcategory');
        }
    }

    public function updatesubcategory($subcategory_id)
    {
        if ($this->Masterdata_Model->update_subcategory($subcategory_id)) {
            $this->session->set_flashdata('success', 'SubCategory updated successfully.');
            redirect('fpo/masterdata/subcategorylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_subcategory');
        }
    }

    public function delete_subcategory($subcategory_id)
    {
        $this->Masterdata_Model->delete_subcategory($subcategory_id);
        $this->session->set_flashdata('success', 'SubCategory Deleted successfully');
        redirect('fpo/masterdata/subcategorylist', "refresh");
    }
    //subcategory master end//
    //get category from stock group master start//

    public function getcategory()
    {
        $groupid = $this->input->post('group');
        if ($this->input->post('group') == 1) {
            $result = $this->Masterdata_Model->groupcall($groupid);
        } elseif ($this->input->post('group') == 2) {
            $result = $this->Masterdata_Model->cropCategory();
        } else {
            $result = $this->Masterdata_Model->groupcall($groupid);
        }
        //$result = $this->Masterdata_Model->groupcall($groupid);
        echo json_encode($result);
    }

    public function getsubcategory()
    {
        $categoryid = $this->input->post('category_id');
        if ($this->input->post('stock_group_id') == 1) {
            if ($categoryid == 3) {
                $result = $this->Masterdata_Model->fertiliserList($categoryid);
            } elseif ($categoryid == 4) {
                $result = $this->Masterdata_Model->nutrientList($categoryid);
            } elseif ($categoryid == 5) {
                $result = $this->Masterdata_Model->pesticideList($categoryid);
            } else {
                $result = $this->Masterdata_Model->subCategoryListByCategory($categoryid);
            }
        } elseif ($this->input->post('stock_group_id') == 2) {
            $result = $this->Masterdata_Model->cropSubcategory($categoryid);
        } else {
            if ($categoryid == 13) {
                $result = $this->Masterdata_Model->getFarmImplementsData();
            } else {
                $result = $this->Masterdata_Model->subCategoryListByCategory($categoryid);
            }
        }
        //$result = $this->Masterdata_Model->categorycall($categoryid);
        echo json_encode($result);
    }

    public function getproduct()
    {
        $subcategory_id = $this->input->post('subcategory_id');
        if ($this->input->post('stock_group_id') == 1) {
            if ($this->input->post('category_id') == 3) {
                $result = $this->Masterdata_Model->brandListBySuppliers(1, $subcategory_id);
            } elseif ($this->input->post('category_id') == 4) {
                $result = $this->Masterdata_Model->brandListBySuppliers(2, $subcategory_id);
            } elseif ($this->input->post('category_id') == 5) {
                $result = $this->Masterdata_Model->brandListBySuppliers(3, $subcategory_id);
            } else {
                $result = $this->Masterdata_Model->productByCategoryAndSubcategory($this->input->post('category_id'), $subcategory_id);
            }
        } elseif ($this->input->post('stock_group_id') == 2) {
            $result = $this->Masterdata_Model->cropName($this->input->post('category_id'), $subcategory_id);
        } else {
            if ($this->input->post('category_id') == 13) {
                $result = $this->Masterdata_Model->getFarmImplementsModel($subcategory_id);
            } else {
                $result = $this->Masterdata_Model->productByCategoryAndSubcategory($this->input->post('category_id'), $subcategory_id);
            }
        }
        //$result = $this->Masterdata_Model->productcall($subcategory_id);
        echo json_encode($result);
    }


    public function getstate()
    {
        $districtid = $this->input->post('district');
        $result = $this->Location_Model->districtcall($districtid);
        echo json_encode($result);
    }


    public function getdistrict()
    {
        $stateid = $this->input->post('state');
        $result = $this->Location_Model->statecall($stateid);
        echo json_encode($result);
    }


    public function getblock()
    {
        $districtid = $this->input->post('district');
        $result = $this->Location_Model->blockcall($districtid);
        echo json_encode($result);
    }

    public function gettaluk()
    {
        $blockid = $this->input->post('block');
        $result = $this->Location_Model->talukcall($blockid);
        echo json_encode($result);
    }

    public function getpanchayat()
    {
        $talukid = $this->input->post('taluk');
        $result = $this->Location_Model->panchayatcall($talukid);
        echo json_encode($result);
    }

    public function gettalukbydistrict()
    {
        $talukid = $this->input->post('talukid');
        $result = $this->Location_Model->blockbytalukcall($talukid);
        echo json_encode($result);
    }

    //get category from stock group master end//

    //product master start//

    public function productlist()
    {
        $data['page'] = 'Product Master';
        $data['page_title'] = 'List Product Master';
        $data['page_module'] = 'master_data';
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['category'] = $this->Masterdata_Model->category_list();
        $data['sub_category'] = $this->Masterdata_Model->subcategory_list();
        $data['product_info'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $this->load->view('masterdata/product/productlist', $data);
    }


    public function addproduct()
    {
        $data['page'] = 'Product Master';
        $data['page_title'] = 'Add Product Master';
        $data['page_module'] = 'master_data';
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $this->load->view('masterdata/product/addproduct', $data);
    }
    public function gstdetail()
    {
        $data['page'] = 'Product Master';
        $data['page_title'] = 'Add Product Master';
        $data['page_module'] = 'master_data';
        $data['taxvalue'] = $this->Masterdata_Model->tax_list();
        //$data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $this->load->view('masterdata/product_fpo_mapping/gstdetail', $data);
    }


    public function viewproduct($product_id)
    {
        $data['page'] = 'Product Master';
        $data['page_title'] = 'View Product Master';
        $data['page_module'] = 'master_data';
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['product_info'] = $this->Masterdata_Model->productByID($product_id);
        $this->load->view('masterdata/product/editproduct', $data);
    }



    public function post_product()
    {
        if ($this->Masterdata_Model->add_product()) {
            $this->session->set_flashdata('success', 'New Product added successfully.');
            redirect('fpo/masterdata/productlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_product');
        }
    }



    public function updateproduct($product_id)
    {
        if ($this->Masterdata_Model->update_product($product_id)) {
            $this->session->set_flashdata('success', 'Product updated successfully.');
            redirect('fpo/masterdata/productlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_product');
        }
    }


    public function delete_product($product_id)
    {
        $this->Masterdata_Model->delete_product($product_id);
        $this->session->set_flashdata('success', 'Product Deleted successfully');
        redirect('fpo/masterdata/productlist', "refresh");
    }

    //product master end//


    //product fpo mapping start//
    public function productfpolist()
    {
        $data['page'] = 'Product FPO Mapping';
        $data['page_title'] = 'List Product FPO Mapping';
        $data['page_module'] = 'master_data';
        $product = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        if($product){
          foreach ($product as $key => $value) {
            $Stock = $this->Masterdata_Model->product_stock($value->id);
            if($Stock){

              $product[$key]->stock = $Stock->qty.' / &#8377;'.money_format("%!n",ltrim($Stock->ov_amount, '-'));
            }else {
              $product[$key]->stock = '';
            }
          }
        }
        //echo "<pre>"; print_r($product);die;
        //$data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        for ($i=0;$i<count($product);$i++) {
            if ($product[$i]->stock_group_id == 3) {
                $product[$i]->category_name = $this->Masterdata_Model->categoryListByID($product[$i]->category_id)->name;
                if ($product[$i]->category_id == 13) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->getFarmImplementsDataById($product[$i]->sub_category_id)->name;
                } else {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->getSubCategoryListByCategory($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                }
                if ($product[$i]->category_id == 13) {
                    $product[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($product[$i]->sub_category_id, $product[$i]->product_id)->name;
                } else {
                    $product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
                }
            } elseif ($product[$i]->stock_group_id == 2) {
                $product[$i]->category_name = $this->Masterdata_Model->cropCategoryById($product[$i]->category_id)->name;
                $product[$i]->subcategory_name = $this->Masterdata_Model->cropSubcategoryById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                $product[$i]->product_name = $this->Masterdata_Model->cropNameById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
            } else {
                $product[$i]->category_name = $this->Masterdata_Model->categoryListByID($product[$i]->category_id)->name;
                if ($product[$i]->category_id == 3) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->fertiliserListById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                } elseif ($product[$i]->category_id == 4) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->nutrientListById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                } elseif ($product[$i]->category_id == 5) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->pesticideListById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                } else {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->getSubCategoryListByCategory($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                }
                if ($product[$i]->category_id == 3 || $product[$i]->category_id == 4 || $product[$i]->category_id == 5) {
                    $product[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
                } else {
                    $product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
                }
            }
        }
        //$data['fpo'] = $this->Fpo_Model->fpoList();
        if($product){

        }
        $data['product'] = $product;
        //echo json_encode($data);
        $this->load->view('masterdata/product_fpo_mapping/productfpolist', $data);
    }


    public function addproductfpo()
    {
        $data['page'] = 'Product FPO Mapping';
        $data['page_title'] = 'Add Product FPO Mapping';
        $data['page_module'] = 'master_data';
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $data['taxvalue'] = $this->Masterdata_Model->tax_list();
        $data['uom_list'] = $this->Masterdata_Model->getquantityuom();
        $data['fpo'] = $this->Fpo_Model->fpoList();
        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['classificationInfo'] = $this->Masterdata_Model->getClassificationList($this->session->userdata('user_id'));
        //echo "<pre>";print_r($data);die;
        $this->load->view('masterdata/product_fpo_mapping/addproductfpo', $data);
    }


    public function viewproductfpo($product_id)
    {
        $data['page'] = 'Product FPO Mapping';
        $data['page_title'] = 'View Product FPO Mapping';
        $data['page_module'] = 'master_data';
        /*$data['productfpo_info'] = $this->Masterdata_Model->productfpoByID($product_id);
        $data['fpo'] = $this->Fpo_Model->fpoList();
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));


        $data['category'] = $this->Masterdata_Model->category_list();
        $data['subcategory'] = $this->Masterdata_Model->subcategory_list();*/

        $data['stock_group'] = $this->Masterdata_Model->stock_group_list();
        $data['taxvalue'] = $this->Masterdata_Model->tax_list();
        $product = $this->Masterdata_Model->productListById($product_id);
        for ($i=0;$i<count($product);$i++) {
            if ($product[$i]->stock_group_id == 3) {
                $product[$i]->category_name = $this->Masterdata_Model->categoryListByID($product[$i]->category_id)->name;
                if ($product[$i]->category_id == 13) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->getFarmImplementsDataById($product[$i]->sub_category_id)->name;
                    $product[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($product[$i]->sub_category_id, $product[$i]->product_id)->name;
                } else {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->getSubCategoryListByCategory($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                    $product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
                }
            } elseif ($product[$i]->stock_group_id == 2) {
                $product[$i]->category_name = $this->Masterdata_Model->cropCategoryById($product[$i]->category_id)->name;
                $product[$i]->subcategory_name = $this->Masterdata_Model->cropSubcategoryById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                $product[$i]->product_name = $this->Masterdata_Model->cropNameById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
            } else {
                $product[$i]->category_name = $this->Masterdata_Model->categoryListByID($product[$i]->category_id)->name;
                if ($product[$i]->category_id == 3) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->fertiliserListById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                } elseif ($product[$i]->category_id == 4) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->nutrientListById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                } elseif ($product[$i]->category_id == 5) {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->pesticideListById($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                } else {
                    $product[$i]->subcategory_name = $this->Masterdata_Model->getSubCategoryListByCategory($product[$i]->category_id, $product[$i]->sub_category_id)->name;
                }
                if ($product[$i]->category_id == 3 || $product[$i]->category_id == 4 || $product[$i]->category_id == 5) {
                    $product[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
                } else {
                    $product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
                }
            }
        }
        $data['product'] = $product;
        $this->load->view('masterdata/product_fpo_mapping/editproductfpo', $data);
    }


    public function post_productfpo()
    {
        if ($this->Masterdata_Model->add_productfpo()) {
            $this->session->set_flashdata('success', 'New Product added successfully');
            redirect('fpo/masterdata/productfpolist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/productfpolist');
        }
    }



    public function updateproductfpo($productfpo_id)
    {
        if ($this->Masterdata_Model->update_productfpo($productfpo_id)) {
            $this->session->set_flashdata('success', 'Product FPO Mapping updated successfully.');
            redirect('fpo/masterdata/productfpolist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/productfpolist');
        }
    }


    public function delete_productfpo($product_id)
    {
        $this->Masterdata_Model->delete_product($product_id);
        $this->session->set_flashdata('success', 'Product FPO  Mapping Deleted successfully');
        redirect('fpo/masterdata/productfpolist', "refresh");
    }

    //product fpo mapping end//

    //bank master start//

    public function banklist()
    {
        $data['page'] = 'Bank Master';
        $data['page_title'] = 'List Bank Master';
        $data['page_module'] = 'master_data';
        $fpo_location = $this->Fpo_Model->getBlockByFPO();
        $district = $fpo_location[0]->district;
        $data['bank_info'] = $this->Masterdata_Model->bank_list($district);
        $data['bank_name'] = $this->Masterdata_Model->bank_name_list();
        $this->load->view('masterdata/bank/banklist', $data);
    }

    public function addbank()
    {
        $data['page'] = 'Bank Master';
        $data['page_title'] = 'Add Bank Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $data['bank_type'] = $this->Masterdata_Model->bank_type_list();
        $data['bank_name'] = $this->Masterdata_Model->bank_name_list();
        $this->load->view('masterdata/bank/addbank', $data);
    }
    public function bankname($type_id)
    {
        $bankname_list = $this->Masterdata_Model->banknamedropdownlist($type_id);
        $response = array("status" => 1, "bankname_list" => $bankname_list);
        echo json_encode($response);
    }

    public function viewbank($bank_id)
    {
        $data['page'] = 'Bank Master';
        $data['page_title'] = 'View Bank Master';
        $data['page_module'] = 'master_data';
        $bankinfo = $this->Masterdata_Model->bankByID($bank_id);
        //print_r($bankinfo );
        if (!empty($bankinfo)) {
            $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($bankinfo['pincode']);
            $data['block_info'] = $this->Login_Model->getBlockByDistCode($bankinfo['bank_district']);
            $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($bankinfo['bank_block']);
            $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($bankinfo['bank_panchayat']);
        }
        $data['state'] = $this->Location_Model->state_list();
        $data['bank_type'] = $this->Masterdata_Model->bank_type_list();
        $data['bank_name'] = $this->Masterdata_Model->bank_name_list();
        $data['bank_info']= $bankinfo;
        //print_r($data['bank_info']);
        //$data['bank_info'] = $this->Masterdata_Model->bankByID( $bank_id );
        $this->load->view('masterdata/bank/editbank', $data);
    }

    public function post_bank()
    {
        if ($this->Masterdata_Model->add_bank()) {
            $this->session->set_flashdata('success', 'New Bank added successfully.');
            redirect('fpo/masterdata/banklist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_bank');
        }
    }

    public function updatebank($bank_id)
    {
        print_r($bank_id);
        print_r($this->input->post());
        if ($this->Masterdata_Model->update_bank($bank_id)) {
            $this->session->set_flashdata('success', 'Bank updated successfully.');
            redirect('fpo/masterdata/banklist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/banklist');
        }
    }


    public function delete_bank($bank_id)
    {
        $this->Masterdata_Model->delete_bank($bank_id);
        $this->session->set_flashdata('success', 'Product Deleted successfully');
        redirect('fpo/masterdata/banklist', "refresh");
    }
    //bank master end//

    //uom master start//

    public function uomlist()
    {
        $data['page'] = 'UOM Master';
        $data['page_title'] = 'List UOM Master';
        $data['page_module'] = 'master_data';
        $data['uom_info'] = $this->Masterdata_Model->uom_list();
        $this->load->view('masterdata/uom/uomlist', $data);
    }


    public function adduom()
    {
        $data['page'] = 'UOM Master';
        $data['page_title'] = 'Add UOM Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/uom/adduom', $data);
    }


    public function viewuom($uom_id)
    {
        $data['page'] = 'UOM Master';
        $data['page_title'] = 'View UOM Master';
        $data['page_module'] = 'master_data';
        $data['uom_info'] = $this->Masterdata_Model->uomByID($uom_id);
        $this->load->view('masterdata/uom/edituom', $data);
    }

    public function post_uom()
    {
        if ($this->Masterdata_Model->add_uom()) {
            $this->session->set_flashdata('success', 'New Unit of Measurement added successfully.');
            redirect('fpo/masterdata/uomlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/adduom');
        }
    }
    public function updateuom($uom_id)
    {
        if ($this->Masterdata_Model->update_uom($uom_id)) {
            $this->session->set_flashdata('success', 'Unit of Measurement updated successfully.');
            redirect('fpo/masterdata/uomlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/uomlist');
        }
    }


    public function delete_uom($uom_id)
    {
        $this->Masterdata_Model->delete_uom($uom_id);
        $this->session->set_flashdata('success', 'Uom Deleted successfully');
        redirect('fpo/masterdata/uomlist', "refresh");
    }
    //uom master end//

    //humidity master start//

    public function humiditylist()
    {
        $data['page'] = 'Humidity Master';
        $data['page_title'] = 'List Humidity Master';
        $data['page_module'] = 'master_data';
        $data['humidity_info'] = $this->Masterdata_Model->humidity_list();
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $this->load->view('masterdata/humidity/humiditylist', $data);
    }



    public function addhumidity()
    {
        $data['page'] = 'Humidity Master';
        $data['page_title'] = 'Add Humidity Master';
        $data['page_module'] = 'master_data';
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $this->load->view('masterdata/humidity/addhumidity', $data);
    }


    public function viewhumidity($humidity_id)
    {
        $data['page'] = 'Humidity Master';
        $data['page_title'] = 'View Humidity Master';
        $data['page_module'] = 'master_data';
        $data['humidity_info'] = $this->Masterdata_Model->humidityByID($humidity_id);
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $this->load->view('masterdata/humidity/edithumidity', $data);
    }

    public function post_humidity()
    {
        if ($this->Masterdata_Model->add_humidity()) {
            $this->session->set_flashdata('success', 'New Humidity added successfully.');
            redirect('fpo/masterdata/humiditylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addhumidity');
        }
    }

    public function updatehumidity($humidity_id)
    {
        if ($this->Masterdata_Model->update_humidity($humidity_id)) {
            $this->session->set_flashdata('success', 'Humidity updated successfully.');
            redirect('fpo/masterdata/humiditylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/humiditylist');
        }
    }


    public function delete_humidity($humidity_id)
    {
        $this->Masterdata_Model->delete_humidity($humidity_id);
        $this->session->set_flashdata('success', 'Humidity Deleted successfully');
        redirect('fpo/masterdata/humiditylist', "refresh");
    }
    //humidity master end//

    //size master start//

    public function sizelist()
    {
        $data['page'] = 'Size Master';
        $data['page_title'] = 'List Size Master';
        $data['page_module'] = 'master_data';
        $data['size_info'] = $this->Masterdata_Model->size_list();
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $data['uom'] = $this->Masterdata_Model->uom_list();
        $this->load->view('masterdata/size/sizelist', $data);
    }


    public function addsize()
    {
        $data['page'] = 'Size Master';
        $data['page_title'] = 'Add Size Master';
        $data['page_module'] = 'master_data';
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $data['uom'] = $this->Masterdata_Model->uom_list();
        $this->load->view('masterdata/size/addsize', $data);
    }


    public function viewsize($size_id)
    {
        $data['page'] = 'Size Master';
        $data['page_title'] = 'View Size Master';
        $data['page_module'] = 'master_data';
        $data['size_info'] = $this->Masterdata_Model->sizeByID($size_id);
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $data['uom'] = $this->Masterdata_Model->uom_list();
        $this->load->view('masterdata/size/editsize', $data);
    }

    public function post_size()
    {
        if ($this->Masterdata_Model->add_size()) {
            $this->session->set_flashdata('success', 'New Size added successfully.');
            redirect('fpo/masterdata/sizelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addsize');
        }
    }

    public function updatesize($size_id)
    {
        if ($this->Masterdata_Model->update_size($size_id)) {
            $this->session->set_flashdata('success', 'Size updated successfully.');
            redirect('fpo/masterdata/sizelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/sizelist');
        }
    }


    public function delete_size($size_id)
    {
        $this->Masterdata_Model->delete_size($size_id);
        $this->session->set_flashdata('success', 'Size Deleted successfully');
        redirect('fpo/masterdata/sizelist', "refresh");
    }
    //size master end//

    //colour master start//

    public function colourlist()
    {
        $data['page'] = 'Colour Master';
        $data['page_title'] = 'List Colour Master';
        $data['page_module'] = 'master_data';
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $data['color_info'] = $this->Masterdata_Model->colour_list();
        $this->load->view('masterdata/colour/colourlist', $data);
    }


    public function addcolour()
    {
        $data['page'] = 'Colour Master';
        $data['page_title'] = 'Add Colour Master';
        $data['page_module'] = 'master_data';
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $this->load->view('masterdata/colour/addcolour', $data);
    }


    public function viewcolour($colour_id)
    {
        $data['page'] = 'Colour Master';
        $data['page_title'] = 'View Colour Master';
        $data['page_module'] = 'master_data';
        $data['colour_info'] = $this->Masterdata_Model->colourByID($colour_id);
        $data['product'] = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
        $this->load->view('masterdata/colour/editcolour', $data);
    }

    public function post_colour()
    {
        if ($this->Masterdata_Model->add_colour()) {
            $this->session->set_flashdata('success', 'New Colour added successfully.');
            redirect('fpo/masterdata/colourlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addcolour');
        }
    }


    public function updatecolour($colour_id)
    {
        if ($this->Masterdata_Model->update_colour($colour_id)) {
            $this->session->set_flashdata('success', 'Colour updated successfully.');
            redirect('fpo/masterdata/colourlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/colourlist');
        }
    }


    public function delete_colour($colour_id)
    {
        $this->Masterdata_Model->delete_colour($colour_id);
        $this->session->set_flashdata('success', 'Colour Deleted successfully');
        redirect('fpo/masterdata/colourlist', "refresh");
    }
    //colour master end//

    //godown master start//

    public function godownlist()
    {
        $data['page'] = 'Godown Master';
        $data['page_title'] = 'List Godown Master';
        $data['page_module'] = 'master_data';
        $data['godown_info'] = $this->Masterdata_Model->godown_list();
        $this->load->view('masterdata/godown/godownlist', $data);
    }


    public function addgodown()
    {
        $data['page'] = 'Godown Master';
        $data['page_title'] = 'Add Godown Master';
        $data['page_module'] = 'master_data';

        $data['uom'] = $this->Masterdata_Model->uom_list();
        $fpoInfo = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
        $data['talukInfo'] = $this->Login_Model->getTalukByDistCode($fpoInfo[0]->district);
        $data['blockInfo'] = $this->Login_Model->getBlockByDistCode($fpoInfo[0]->district);
        $data['fpoInfo'] = $fpoInfo;
        //print_r($data['fpoInfo']); die;
        $this->load->view('masterdata/godown/addgodown', $data);
    }


    public function viewgodown($godown_id)
    {
        $data['page'] = 'Godown Master';
        $data['page_title'] = 'Edit Godown Master';
        $data['page_module'] = 'master_data';
        $godown = $this->Masterdata_Model->godownByID($godown_id);
        if (!empty($godown)) {
            $data['taluk_info'] = $this->Login_Model->getTalukByDistCode($godown['district_id']);
            $data['block_info'] = $this->Login_Model->getBlockByDistCode($godown['district_id']);
            $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($godown['block_id']);
            $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($godown['panchayat_id']);
        }
        $data['godown_info']= $godown;
        $this->load->view('masterdata/godown/editgodown', $data);
    }
    //mar 20
    public function editgodown($godown_id)
    {
        $data['page'] = 'Godown Master';
        $data['page_title'] = 'View Godown Master';
        $data['page_module'] = 'master_data';
        $godown = $this->Masterdata_Model->godownByID($godown_id);
        if (!empty($godown)) {
            $data['taluk_info'] = $this->Login_Model->getTalukByDistCode($godown['district_id']);
            $data['block_info'] = $this->Login_Model->getBlockByDistCode($godown['district_id']);
            $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($godown['block_id']);
            $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($godown['panchayat_id']);
        }
        $data['godown_info']= $godown;
        $this->load->view('masterdata/godown/viewgodown', $data);
    }


    public function post_godown()
    {
        if ($this->Masterdata_Model->add_godown()) {
            $this->session->set_flashdata('success', 'New Godown added successfully.');
            redirect('fpo/masterdata/godownlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addgodown');
        }
    }



    public function updategodown($godown_id)
    {
        if ($this->Masterdata_Model->update_godown($godown_id)) {
            $this->session->set_flashdata('success', 'Godown updated successfully.');
            redirect('fpo/masterdata/godownlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/godownlist');
        }
    }


    public function delete_godown($godown_id)
    {
        $this->Masterdata_Model->delete_godown($godown_id);
        $this->session->set_flashdata('success', 'Godown Deleted successfully');
        redirect('fpo/masterdata/godownlist', "refresh");
    }

    //godown master end//

    //nature of business master start//

    public function natureofbusinesslist()
    {
        $data['page'] = 'Nature of Business Master';
        $data['page_title'] = 'List Nature of Business Master';
        $data['page_module'] = 'master_data';
        $data['business_nature_info'] = $this->Masterdata_Model->business_nature_list();
        $this->load->view('masterdata/business/businesslist', $data);
    }


    public function addnatureofbusiness()
    {
        $data['page'] = 'Nature of Business Master';
        $data['page_title'] = 'Add Nature of Business Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/business/addbusiness', $data);
    }


    public function viewnatureofbusiness($business_id)
    {
        $data['page'] = 'Nature of Business Master';
        $data['page_title'] = 'View Nature of Business Master';
        $data['page_module'] = 'master_data';
        $data['business_info'] = $this->Masterdata_Model->businessnatureByID($business_id);
        $this->load->view('masterdata/business/editbusiness', $data);
    }

    public function post_business()
    {
        if ($this->Masterdata_Model->add_business_nature()) {
            $this->session->set_flashdata('success', 'New Business added successfully.');
            redirect('fpo/masterdata/natureofbusinesslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/add_business');
        }
    }

    public function updatebusiness($business_id)
    {
        if ($this->Masterdata_Model->update_business_nature($business_id)) {
            $this->session->set_flashdata('success', 'Business updated successfully.');
            redirect('fpo/masterdata/natureofbusinesslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_business');
        }
    }

    public function delete_business($business_id)
    {
        $this->Masterdata_Model->delete_business($business_id);
        $this->session->set_flashdata('success', 'Business Deleted successfully');
        redirect('fpo/masterdata/natureofbusinesslist', "refresh");
    }

    //nature of business master   end//

    //seed master start//

    public function seedlist()
    {
        $data['page'] = 'Seed Master';
        $data['page_title'] = 'List Seed Master';
        $data['page_module'] = 'master_data';
        $data['seed_info'] = $this->Masterdata_Model->seed_list();
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyList();
        $data['crop_master']= $this->Masterdata_Model->crop_master_list();
        $this->load->view('masterdata/seed/seedlist', $data);
    }

    public function addseed()
    {
        $data['page'] = 'Seed Master';
        $data['page_title'] = 'Add Seed Master';
        $data['page_module'] = 'master_data';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $this->load->view('masterdata/seed/addseed', $data);
    }

    public function viewseed($seed_id)
    {
        $data['page'] = 'Seed Master';
        $data['page_title'] = 'Seed Master';
        $data['page_module'] = 'master_data';
        $data['category'] = $this->Category_Model->categoryDropdownList();
        $data['subcategory'] = $this->Subcategory_Model->subcategoryDropdownList();
        $data['name'] = $this->Name_Model->nameDropdownList();
        $data['variety'] = $this->Variety_Model->varietyDropdownList();
        $data['seed_info'] = $this->Masterdata_Model->seedByID($seed_id);
        $this->load->view('masterdata/seed/editseed', $data);
    }

    public function post_seed()
    {
        if ($this->Masterdata_Model->add_seed()) {
            $this->session->set_flashdata('success', 'New seed added successfully.');
            redirect('fpo/masterdata/seedlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addseed');
        }
    }

    public function updateseed($seed_id)
    {
        if ($this->Masterdata_Model->update_seed($seed_id)) {
            $this->session->set_flashdata('success', 'seed updated successfully.');
            redirect('fpo/masterdata/seedlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/viewseed');
        }
    }

    public function delete_seed($seed_id)
    {
        $this->Masterdata_Model->delete_seed($seed_id);
        $this->session->set_flashdata('success', 'Seed Deleted successfully');
        redirect('fpo/masterdata/seedlist', "refresh");
    }
    //seed master   end//

    //nutrient master start//

    public function nutrientlist()
    {
        $data['page'] = 'Nutrient Master';
        $data['page_title'] = 'List Nutrient Master';
        $data['page_module'] = 'master_data';
        $data['nutrient_info'] = $this->Masterdata_Model->nutrient_list();
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/nutrient/nutrientlist', $data);
    }

    public function addnutrient()
    {
        $data['page'] = 'Nutrient Master';
        $data['page_title'] = 'Add Nutrient Master';
        $data['page_module'] = 'master_data';
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/nutrient/addnutrient', $data);
    }

    public function viewnutrient($nutrient_id)
    {
        $data['page'] = 'Nutrient Master';
        $data['page_title'] = 'View Nutrient Master';
        $data['page_module'] = 'master_data';
        $data['nutrient_info'] = $this->Masterdata_Model->nutrientByID($nutrient_id);
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/nutrient/editnutrient', $data);
    }


    public function post_nutrient()
    {
        if ($this->Masterdata_Model->add_nutrient()) {
            $this->session->set_flashdata('success', 'New Nutrient added successfully.');
            redirect('fpo/masterdata/nutrientlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addnutrient');
        }
    }

    public function updatenutrient($nutrient_id)
    {
        if ($this->Masterdata_Model->update_nutrient($nutrient_id)) {
            $this->session->set_flashdata('success', 'Nutrient updated successfully.');
            redirect('fpo/masterdata/nutrientlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/viewnutrient');
        }
    }


    public function delete_nutrient($nutrient_id)
    {
        $this->Masterdata_Model->delete_nutrient($nutrient_id);
        $this->session->set_flashdata('success', 'Nutrient Deleted successfully');
        redirect('fpo/masterdata/nutrientlist', "refresh");
    }
    //nutrient master end//

    //fertilizer master start//

    public function fertilizerlist()
    {
        $data['page'] = 'Fertilizer Master';
        $data['page_title'] = 'List Fertilizer Master';
        $data['page_module'] = 'master_data';
        $data['fertilizer_info'] = $this->Masterdata_Model->fertilizer_list();
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/fertilizer/fertilizerlist', $data);
    }


    public function addfertilizer()
    {
        $data['page'] = 'Fertilizer Master';
        $data['page_title'] = 'Add Fertilizer Master';
        $data['page_module'] = 'master_data';
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/fertilizer/addfertilizer', $data);
    }

    public function viewfertilizer($fertilizer_id)
    {
        $data['page'] = 'Fertilizer Master';
        $data['page_title'] = 'View Fertilizer Master';
        $data['page_module'] = 'master_data';
        $data['fertilizer_info'] = $this->Masterdata_Model->fertilizerByID($fertilizer_id);
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/fertilizer/editfertilizer', $data);
    }


    public function post_fertilizer()
    {
        if ($this->Masterdata_Model->add_fertilizer()) {
            $this->session->set_flashdata('success', 'New Fertilizer added successfully.');
            redirect('fpo/masterdata/fertilizerlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addfertilizer');
        }
    }



    public function updatefertilizer($fertilizer_id)
    {
        if ($this->Masterdata_Model->update_fertilizer($fertilizer_id)) {
            $this->session->set_flashdata('success', 'Fertilizer updated successfully.');
            redirect('fpo/masterdata/fertilizerlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/viewfertilizer');
        }
    }


    public function delete_fertilizer($fertilizer_id)
    {
        $this->Masterdata_Model->delete_fertilizer($fertilizer_id);
        $this->session->set_flashdata('success', 'Fertilizer Deleted successfully');
        redirect('fpo/masterdata/pesticideslist', "refresh");
    }
    //fertilizer master end//

    //Pesticides master start//

    public function pesticideslist()
    {
        $data['page'] = 'Pesticides Master';
        $data['page_title'] = 'List Pesticides Master';
        $data['page_module'] = 'master_data';
        $data['pesticides_info'] = $this->Masterdata_Model->pesticide_list();
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/pesticides/pesticideslist', $data);
    }


    public function addpesticides()
    {
        $data['page'] = 'Pesticides Master';
        $data['page_title'] = 'Add Pesticides Master';
        $data['page_module'] = 'master_data';
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/pesticides/addpesticides', $data);
    }

    public function viewpesticides($pesticide_id)
    {
        $data['page'] = 'Pesticides Master';
        $data['page_title'] = 'View Pesticides Master';
        $data['page_module'] = 'master_data';
        $data['pesticide_info'] = $this->Masterdata_Model->pesticideByID($pesticide_id);
        $data['manufacture'] = $this->Masterdata_Model->manufacture_list();
        $this->load->view('masterdata/pesticides/editpesticides', $data);
    }


    public function post_pesticides()
    {
        if ($this->Masterdata_Model->add_pesticide()) {
            $this->session->set_flashdata('success', 'New Pesticides added successfully.');
            redirect('fpo/masterdata/pesticideslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addpesticides');
        }
    }



    public function updatepesticides($pesticide_id)
    {
        if ($this->Masterdata_Model->update_pesticide($pesticide_id)) {
            $this->session->set_flashdata('success', 'Pesticides updated successfully.');
            redirect('fpo/masterdata/pesticideslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/pesticideslist');
        }
    }


    public function delete_pesticides($pesticide_id)
    {
        $this->Masterdata_Model->delete_pesticide($pesticide_id);
        $this->session->set_flashdata('success', 'State Deleted successfully');
        redirect('fpo/masterdata/pesticideslist', "refresh");
    }

    //Pesticides master end//

    //season master start//

    public function seasonlist()
    {
        $data['page'] = 'Season Master';
        $data['page_title'] = 'List Season Master';
        $data['page_module'] = 'master_data';
        $data['season_info'] = $this->Masterdata_Model->season_list();
        $data['state'] = $this->Location_Model->state_list();
        $this->load->view('masterdata/season/seasonlist', $data);
    }

    public function addseason()
    {
        $data['page'] = 'Season Master';
        $data['page_title'] = 'Add Season Master';
        $data['page_module'] = 'master_data';
        $data['state'] = $this->Location_Model->state_list();
        $this->load->view('masterdata/season/addseason', $data);
    }

    public function viewseason($id)
    {
        $data['page'] = 'Season Master';
        $data['page_title'] = 'View Season Master';
        $data['page_module'] = 'master_data';
        $data['season_info'] = $this->Masterdata_Model->seasonByID($id);
        $data['state'] = $this->Location_Model->state_list();
        $this->load->view('masterdata/season/editseason', $data);
    }


    public function post_season()
    {
        if ($this->Masterdata_Model->add_season()) {
            $this->session->set_flashdata('success', 'New Season added successfully.');
            redirect('fpo/masterdata/seasonlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addseason');
        }
    }

    public function updateseason($seasonid)
    {
        if ($this->Masterdata_Model->update_season($seasonid)) {
            $this->session->set_flashdata('success', 'Season updated successfully.');
            redirect('fpo/masterdata/seasonlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/seasonlist');
        }
    }


    public function delete_season($season_id)
    {
        $this->Masterdata_Model->delete_season($season_id);
        $this->session->set_flashdata('success', 'Season Deleted successfully');
        redirect('fpo/masterdata/seasonlist', "refresh");
    }
    //season master end//

    //post harvest master start//

    public function postharvestlist()
    {
        $data['page'] = 'Post Harvest Master';
        $data['page_title'] = 'List Post Harvest Master';
        $data['page_module'] = 'master_data';
        $data['post_harvest_info'] = $this->Masterdata_Model->postharvest_list();
        $this->load->view('masterdata/postharvest/postharvestlist', $data);
    }

    public function addpostharvest()
    {
        $data['page'] = 'Post Harvest Master';
        $data['page_title'] = 'Add Post Harvest Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/postharvest/addpostharvest', $data);
    }

    public function viewpostharvest($harvest_id)
    {
        $data['page'] = 'Post Harvest Master';
        $data['page_title'] = 'View Post Harvest Master';
        $data['page_module'] = 'master_data';
        $data['harvest_info'] = $this->Masterdata_Model->postharvestByID($harvest_id);
        $this->load->view('masterdata/postharvest/editpostharvest', $data);
    }

    public function post_postharvest()
    {
        if ($this->Masterdata_Model->add_postharvest()) {
            $this->session->set_flashdata('success', 'New Post Harvest added successfully.');
            redirect('fpo/masterdata/postharvestlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addpostharvest');
        }
    }

    public function update_postharvest($harvest_id)
    {
        if ($this->Masterdata_Model->update_postharvest($harvest_id)) {
            $this->session->set_flashdata('success', 'Post Harvest updated successfully.');
            redirect('fpo/masterdata/postharvestlist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/postharvestlist');
        }
    }


    public function delete_postharvest($postharvest_id)
    {
        $this->Masterdata_Model->delete_postharvest($postharvest_id);
        $this->session->set_flashdata('success', 'Post Harvest Deleted successfully');
        redirect('fpo/masterdata/postharvestlist', "refresh");
    }

    //post harvest master end//

    //farm implements  master start//

    public function farmimplementslist()
    {
        $data['page'] = 'Farm Implements Master';
        $data['page_title'] = 'List Farm Implements Master';
        $data['page_module'] = 'master_data';
        $data['farm_implements_info'] = $this->Masterdata_Model->farm_implements_list();
        $this->load->view('masterdata/farm_implements/farmimplementslist', $data);
    }

    public function addfarmimplements()
    {
        $data['page'] = 'Farm Implements Master';
        $data['page_title'] = 'Add Farm Implements Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/farm_implements/addfarmimplements', $data);
    }

    public function viewfarmimplements($farmimplements_id)
    {
        $data['page'] = 'Farm Implements Master';
        $data['page_title'] = 'View Farm Implements Master';
        $data['page_module'] = 'master_data';
        $data['farmimplements_info'] = $this->Masterdata_Model->farm_implementsByID($farmimplements_id);
        $this->load->view('masterdata/farm_implements/editfarmimplements', $data);
    }

    public function post_farmimplements()
    {
        if ($this->Masterdata_Model->add_farm_implements()) {
            $this->session->set_flashdata('success', 'Farm Implements added successfully.');
            redirect('fpo/masterdata/farmimplementslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addfarmimplements');
        }
    }

    public function update_farmimplements($farmimplements_id)
    {
        if ($this->Masterdata_Model->update_farm_implements($farmimplements_id)) {
            $this->session->set_flashdata('success', 'Farm Implements updated successfully.');
            redirect('fpo/masterdata/farmimplementslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_farmimplements');
        }
    }


    public function delete_farmimplements($farmimplements_id)
    {
        $this->Masterdata_Model->delete_farm_implements($farmimplements_id);
        $this->session->set_flashdata('success', 'Farm Implements Deleted successfully');
        redirect('fpo/masterdata/farmimplementslist', "refresh");
    }
    //farm implements  master end//


    //farm implements  make and model master start//

    public function farmimplementsmakelist()
    {
        $data['page'] = 'Farm Implements Make and Model Master';
        $data['page_title'] = 'List Farm Implements Make and Model Master';
        $data['page_module'] = 'master_data';
        $data['farm'] = $this->Masterdata_Model->farm_implements_list();
        $data['farm_implements_make'] = $this->Masterdata_Model->farm_implements_make_list();
        $this->load->view('masterdata/farm_implements_makemodel/farmmakelist', $data);
    }

    public function addfarmimplementsmake()
    {
        $data['page'] = 'Farm Implements Make and Model Master';
        $data['page_title'] = 'Add Farm Implements Make and Model Master';
        $data['page_module'] = 'master_data';
        $data['farm_implements'] = $this->Masterdata_Model->farm_implements_list();
        $this->load->view('masterdata/farm_implements_makemodel/addfarmmake', $data);
    }

    public function viewfarmimplementsmake($farmimplements_id)
    {
        $data['page'] = 'Farm Implements Make and Model Master';
        $data['page_title'] = 'View Farm Implements Make and Model Master';
        $data['page_module'] = 'master_data';
        $data['farm_implements'] = $this->Masterdata_Model->farm_implements_list();
        $data['farmimplements_info'] = $this->Masterdata_Model->farmimplementsmakeByID($farmimplements_id);
        $this->load->view('masterdata/farm_implements_makemodel/editfarmmake', $data);
    }


    public function post_farmimplementsmake()
    {
        if ($this->Masterdata_Model->add_farm_implements_make()) {
            $this->session->set_flashdata('success', 'New Farm Implements Make and Model added successfully.');
            redirect('fpo/masterdata/farmimplementsmakelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addfarmimplementsmake');
        }
    }

    public function update_farmimplements_make($farmimplements_id)
    {
        if ($this->Masterdata_Model->update_farm_implements_make($farmimplements_id)) {
            $this->session->set_flashdata('success', 'Live Stocks updated successfully.');
            redirect('fpo/masterdata/farmimplementsmakelist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/farmimplementsmakelist');
        }
    }


    public function delete_farmimplementsmake($farm_id)
    {
        $this->Masterdata_Model->delete_farm_implements_make($farm_id);
        $this->session->set_flashdata('success', 'Live stocks Deleted successfully');
        redirect('fpo/masterdata/farmimplementsmakelist', "refresh");
    }

    //farm implements  make and model  master end//

    //live stoks master start//

    public function livestockslist()
    {
        $data['page'] = 'Live Stocks Master';
        $data['page_title'] = 'List Live Stocks Master';
        $data['page_module'] = 'master_data';
        $data['live_stocks_info'] = $this->Masterdata_Model->live_stocks_list();
        $this->load->view('masterdata/livestocks/livestockslist', $data);
    }

    public function addlivestocks()
    {
        $data['page'] = 'Live Stocks Master';
        $data['page_title'] = 'Add Live Stocks Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/livestocks/addlivestocks', $data);
    }

    public function viewlivestocks($id)
    {
        $data['page'] = 'Live Stocks Master';
        $data['page_title'] = 'View Live Stocks Master';
        $data['page_module'] = 'master_data';
        $data['livestock_info'] = $this->Masterdata_Model->livestockByID($id);
        $this->load->view('masterdata/livestocks/editlivestocks', $data);
    }

    public function post_live_stocks()
    {
        if ($this->Masterdata_Model->add_live_stock()) {
            $this->session->set_flashdata('success', 'New Live stocks added successfully.');
            redirect('fpo/masterdata/livestockslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/addlivestocks');
        }
    }

    public function updatelive_stocks()
    {
        $livestock_id=$this->input->post('live_stock_id');
        if ($this->Masterdata_Model->update_live_stock($livestock_id)) {
            $this->session->set_flashdata('success', 'Live Stocks updated successfully.');
            redirect('fpo/masterdata/livestockslist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/edit_livestocks');
        }
    }


    public function delete_livestocks($livestock_id)
    {
        $this->Masterdata_Model->delete_livestock($livestock_id);
        $this->session->set_flashdata('success', 'Live stocks Deleted successfully');
        redirect('fpo/masterdata/livestockslist', "refresh");
    }

    //live stoks master end//

    //live stoks variety master start//

    public function livestocksvarietylist()
    {
        $data['page'] = 'Live Stocks Variety Master';
        $data['page_title'] = 'List Live Stocks Variety Master';
        $data['page_module'] = 'master_data';
        $data['live_stocks_info'] = $this->Masterdata_Model->live_stocks_variety_list();
        $data['live_stocks'] = $this->Masterdata_Model->live_stocks_list();
        $this->load->view('masterdata/livestocks_variety/livestocksvarietylist', $data);
    }

    public function addlivestocksvariety()
    {
        $data['page'] = 'Live Stocks Variety Master';
        $data['page_title'] = 'Add Live Stocks Variety Master';
        $data['page_module'] = 'master_data';
        $data['live_stocks'] = $this->Masterdata_Model->live_stocks_list();
        $this->load->view('masterdata/livestocks_variety/addlivestocksvariety', $data);
    }

    public function viewlivestocksvariety($id)
    {
        $data['page'] = 'Live Stocks Variety Master';
        $data['page_title'] = 'View Live Stocks Variety Master';
        $data['page_module'] = 'master_data';
        $data['livestock_info'] = $this->Masterdata_Model->livestockvarietyByID($id);
        $data['live_stocks'] = $this->Masterdata_Model->live_stocks_list();
        $this->load->view('masterdata/livestocks_variety/editlivestocksvariety', $data);
    }

    public function post_live_stocks_variety()
    {
        if ($this->Masterdata_Model->add_live_stock_variety()) {
            $this->session->set_flashdata('success', 'New Live stocks variety added successfully.');
            redirect('fpo/masterdata/livestocksvarietylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');
            redirect('fpo/masterdata/livestocksvarietylist');
        }
    }

    public function updatelive_stocks_variety($livestock_id)
    {
        if ($this->Masterdata_Model->update_live_stock_variety($livestock_id)) {
            $this->session->set_flashdata('success', 'Live Stocks variety  updated successfully.');
            redirect('fpo/masterdata/livestocksvarietylist');
        } else {
            $this->session->set_flashdata('warning', 'Data not updated.');
            redirect('fpo/masterdata/livestocksvarietylist');
        }
    }


    public function delete_livestocks_variety($livestock_id)
    {
        $this->Masterdata_Model->delete_livestock_variety($livestock_id);
        $this->session->set_flashdata('success', 'Live stocks variety Deleted successfully');
        redirect('fpo/masterdata/livestocksvarietylist', "refresh");
    }

    //live stoks variety master end//

    //constitution of committee of directors master start//

    public function committeedirectorslist()
    {
        $data['page'] = 'Constitution of Committee of Directors Master';
        $data['page_title'] = 'List Constitution of Committee of Directors Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/committee_directors/commiteedirectorslist', $data);
    }

    public function addcommitteedirectors()
    {
        $data['page'] = 'Constitution of Committee of Directors Master';
        $data['page_title'] = 'Add Constitution of Committee of Directors Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/committee_directors/addcommiteedirectors', $data);
    }

    public function viewcommitteedirectors()
    {
        $data['page'] = 'Constitution of Committee of Directors Master';
        $data['page_title'] = 'View Constitution of Committee of Directors Master';
        $data['page_module'] = 'master_data';
        $this->load->view('masterdata/committee_directors/editcommiteedirectors', $data);
    }

    public function getgroupbyproduct()
    {
        $productid = $this->input->post('product');
        $result = $this->Masterdata_Model->groupbyproduct($productid);
        echo json_encode($result);
    }

    public function getstockbyid()
    {
        $stockid = $this->input->post('stock');
        $result = $this->Masterdata_Model->stockbyid($stockid);
        echo json_encode($result);
    }
    public function get_taluk()
    {
        $talukid = $this->input->post('taluk');
        $result=$this->Location_Model->talukByID($talukid);
        echo json_encode($result);
    }
    public function get_village()
    {
        $panchayatid = $this->input->post('panchayat');
        $result=$this->Location_Model->panchayatByID($panchayatid);
        echo json_encode($result);
    }

    /* public function getproduct() {
        $productid = $this->input->post('product');
        $result = $this->Masterdata_Model->productcall($productid);
        echo json_encode($result);
    } */

    //constitution of committee of directors  master end//
}
