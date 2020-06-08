<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Masterdata_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }

    //category master start//
    public function category_list()
    {
        $this->db->select('trv_category_master.id,trv_category_master.name, trv_category_master.name_local,trv_category_master.status, trv_stock_group_master.name as st_name');
        $this->db->where(array('trv_category_master.status' => '1'));
        $this->db->order_by("trv_category_master.stock_group_id DESC,trv_category_master.name ASC");
        $this->db->from('trv_category_master');
        $this->db->join('trv_stock_group_master', 'trv_stock_group_master.id = trv_category_master.stock_group_id');
        return $this->db->get()->result();
    }
    public function categoryListByID($category_id)
    {
        $this->db->select('trv_category_master.id, trv_category_master.name');
        $this->db->where(array('trv_category_master.id' => $category_id, 'trv_category_master.status' => 1));
        $this->db->order_by("trv_category_master.id", "desc");
        $this->db->from('trv_category_master');
        return $this->db->get()->row();
    }


    public function add_category()
    {
        $category_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'name'          => $this->input->post('product_category'),
            'name_local'    => $this->input->post('product_category_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_category_master', $category_details);
    }


    public function categoryByID($category_id)
    {
        $this->db->where(array('id' => $category_id, 'status' => '1'));
        $this->db->from('trv_category_master');
        return $this->db->get()->row_array();
    }


    public function update_category($category_id)
    {
        $category_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'name'          => $this->input->post('product_category'),
            'name_local'    => $this->input->post('product_category_local'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_category_master', $category_details, array('id' => $category_id));
    }


    public function delete_category($category_id)
    {
        $categoryid= array(
           'status' => 0
        );
        return $this->db->update('trv_category_master', $categoryid, array('id' => $category_id));
    }
    //state master end//

    //stock group master start//
    public function stock_group_list()
    {
        $this->db->select('trv_stock_group_master.*');
        $this->db->where(array('trv_stock_group_master.status' => '1'));
        $this->db->order_by("trv_stock_group_master.id", "desc");
        $this->db->from('trv_stock_group_master');
        return $this->db->get()->result();
    }
    //stock group master end//

    //sub category master start//
    public function subcategory_list()
    {
        $this->db->select('trv_sub_category_master.*');
        $this->db->where(array('trv_sub_category_master.status' => '1'));
        $this->db->order_by("trv_sub_category_master.id", "desc");
        $this->db->from('trv_sub_category_master');
        return $this->db->get()->result();
    }

    public function subCategoryListByCategory($category_id)
    {
        $this->db->select('trv_sub_category_master.id, trv_sub_category_master.name');
        $this->db->where(array('trv_sub_category_master.category_id' => $category_id, 'trv_sub_category_master.status' => 1));
        $this->db->order_by("trv_sub_category_master.id", "desc");
        $this->db->from('trv_sub_category_master');
        return $this->db->get()->result();
    }

    public function getSubCategoryListByCategory($category_id, $subcategory_id)
    {
        $this->db->select('trv_sub_category_master.id, trv_sub_category_master.name');
        $this->db->where(array('trv_sub_category_master.id' => $subcategory_id, 'trv_sub_category_master.category_id' => $category_id, 'trv_sub_category_master.status' => 1));
        $this->db->order_by("trv_sub_category_master.id", "desc");
        $this->db->from('trv_sub_category_master');
        return $this->db->get()->row();
    }


    public function add_subcategory()
    {
        $subcategory_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'category_id' => $this->input->post('category'),
            'name'          => $this->input->post('sub_product_category'),
            'name_local'    => $this->input->post('sub_product_category_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_sub_category_master', $subcategory_details);
    }


    public function subcategoryByID($subcategory_id)
    {
        $this->db->where(array('id' => $subcategory_id, 'status' => '1'));
        $this->db->from('trv_sub_category_master');
        return $this->db->get()->row_array();
    }


    public function update_subcategory($subcategory_id)
    {
        $subcategory_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'category_id' => $this->input->post('category'),
            'name'          => $this->input->post('sub_product_category'),
            'name_local'    => $this->input->post('sub_product_category_local'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_sub_category_master', $subcategory_details, array('id' => $subcategory_id));
    }


    public function delete_subcategory($subcategory_id)
    {
        $subcategoryid= array(
           'status' => 0
        );
        return $this->db->update('trv_sub_category_master', $subcategoryid, array('id' => $subcategory_id));
    }

    //sub state master end//
    public function groupcall($group)
    {
        $this->db->select('id, name');
        $this->db->where('stock_group_id', $group);
        $this->db->where('status', 1);
        $this->db->from("trv_category_master");
        return $this->db->get()->result();
    }
    public function categorycall($category)
    {
        $this->db->select('id,name');
        $this->db->where('category_id', $category);
        $this->db->where('status', 1);
        $this->db->from("trv_sub_category_master");
        return $this->db->get()->result();
    }
    public function cropCategory()
    {
        $this->db->select('id, name');
        $this->db->where('status', 1);
        $this->db->from("trv_crop_category_master");
        return $this->db->get()->result();
    }
    public function cropSubcategory($category_id)
    {
        $this->db->select('id, name');
        $this->db->where('status', 1);
        $this->db->where('crop_category_id', $category_id);
        $this->db->from("trv_crop_sub_category_master");
        return $this->db->get()->result();
    }
    public function cropName($category_id, $subcategory_id)
    {
        $this->db->select('trv_crop_variety_master.id, CONCAT(trv_crop_name_master.name, " - ", trv_crop_variety_master.variety) as name');
        $this->db->where(array('trv_crop_name_master.status' => 1, 'trv_crop_name_master.category_id' => $category_id, 'trv_crop_name_master.sub_category_id' => $subcategory_id));
        $this->db->from("trv_crop_name_master");
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.name_id = trv_crop_name_master.id');
        return $this->db->get()->result();
    }
    public function cropCategoryById($category_id)
    {
        $this->db->select('id, name');
        $this->db->where(array('status' => 1, 'id' => $category_id));
        $this->db->from("trv_crop_category_master");
        return $this->db->get()->row();
    }
    public function cropSubcategoryById($category_id, $subcategory_id)
    {
        $this->db->select('id, name');
        $this->db->where('status', 1);
        $this->db->where(array('status' => 1, 'id' => $subcategory_id, 'crop_category_id' => $category_id));
        $this->db->from("trv_crop_sub_category_master");
        //echo $category_id, $subcategory_id."<pre>";print_r($this->db->get()->row());die;
        return $this->db->get()->row();
    }
    public function cropNameById($category_id, $subcategory_id, $product_id)
    {
        $this->db->select('trv_crop_variety_master.id, CONCAT(trv_crop_name_master.name, " - ", trv_crop_variety_master.variety) as name');
        $this->db->where(array('trv_crop_name_master.status' => 1, 'trv_crop_name_master.category_id' => $category_id, 'trv_crop_name_master.sub_category_id' => $subcategory_id, 'trv_crop_variety_master.id' => $product_id));
        $this->db->from("trv_crop_name_master");
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.name_id = trv_crop_name_master.id', 'inner');
        //echo $category_id.'--'.$subcategory_id.'---'.$product_id."<pre>";print_r($this->db->get()->row());die;
        return $this->db->get()->row();
    }


    public function getFarmImplementsData()
    {
        $this->db->select('id, name');
        $this->db->where('status', 1);
        $this->db->from("trv_farm_implementation");
        return $this->db->get()->result();
    }
    public function getFarmImplementsModel($subcategory_id)
    {
        $this->db->select('id, CONCAT(Make," - ",Model) as name');
        $this->db->where('status', 1);
        $this->db->where('Implements_id', $subcategory_id);
        $this->db->from("trv_farm_implementation_make_model");
        return $this->db->get()->result();
    }
    public function getFarmImplementsDataById($subcategory_id)
    {
        $this->db->select('id, name');
        $this->db->where(array('status' => 1, 'id' => $subcategory_id));
        $this->db->from("trv_farm_implementation");
        return $this->db->get()->row();
    }
    public function getFarmImplementsModelById($subcategory_id, $product_id)
    {
        $this->db->select('id, CONCAT(Make," - ",Model) as name');
        $this->db->where(array('status' => 1, 'id' => $product_id, 'Implements_id', $subcategory_id));
        $this->db->from("trv_farm_implementation_make_model");
        return $this->db->get()->row();
    }


    public function fertiliserList($category_id)
    {
        $this->db->select('id,name');
        $this->db->where('status', 1);
        $this->db->from("trv_fertilizer_master");
        return $this->db->get()->result();
    }
    public function nutrientList($category_id)
    {
        $this->db->select('id,name');
        $this->db->where('status', 1);
        $this->db->from("trv_nutrient_master");
        return $this->db->get()->result();
    }
    public function pesticideList($category_id)
    {
        $this->db->select('id,name');
        $this->db->where('status', 1);
        $this->db->from("trv_pesticide_master");
        return $this->db->get()->result();
    }
    public function brandListBySuppliers($category_id, $subcategory_id)
    {
        $this->db->select('id, name');
        $this->db->where(array('status' => 1, 'type_id' => $category_id, 'product' => $subcategory_id));
        $this->db->from("trv_brand_master");
        return $this->db->get()->result();
    }
    public function fertiliserListById($category_id, $subcategory_id)
    {
        $this->db->select('id,name');
        $this->db->where(array('status' => 1, 'id' => $subcategory_id));
        $this->db->from("trv_fertilizer_master");
        return $this->db->get()->row();
    }
    public function nutrientListById($category_id, $subcategory_id)
    {
        $this->db->select('id,name');
        $this->db->where(array('status' => 1, 'id' => $subcategory_id));
        $this->db->from("trv_nutrient_master");
        return $this->db->get()->row();
    }
    public function pesticideListById($category_id, $subcategory_id)
    {
        $this->db->select('id,name');
        $this->db->where(array('status' => 1, 'id' => $subcategory_id));
        $this->db->from("trv_pesticide_master");
        return $this->db->get()->row();
    }
    public function brandListBySuppliersById($category_id, $subcategory_id, $product_id)
    {
        $this->db->select('id, name');
        $this->db->where(array('status' => 1, 'id' => $product_id));
        $this->db->from("trv_brand_master");
        return $this->db->get()->row();
    }

    //
    //product master start//
    public function product_list()
    {
        $this->db->select('trv_fpo_product.*');
        $this->db->where(array('trv_fpo_product.status' => 1));
        $this->db->order_by("trv_fpo_product.id", "desc");
        $this->db->from('trv_fpo_product');
        //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
        return $this->db->get()->result();
    }
    public function admin_product_list()
    {
        $this->db->select('pm.id, pm.name,pm.status, sg.name as stock_group, cm.name as category, sm.name as sub_category');
        $this->db->from('trv_product_master pm');
        $this->db->join('trv_stock_group_master sg', 'sg.id = pm.stock_group_id');
        $this->db->join('trv_category_master cm', 'cm.id = pm.category_id');
        $this->db->join('trv_sub_category_master sm', 'sm.id = pm.sub_category_id');
        $this->db->where(array('sg.status' => 1,'cm.status' => 1,'sm.status' => 1));
        $this->db->order_by("pm.id", "desc");
        //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
        return $this->db->get()->result();
    }
    public function productListById($product_id)
    {
        $this->db->select('trv_fpo_product.*');
        $this->db->where(array('trv_fpo_product.id' => $product_id, 'trv_fpo_product.status' => 1));
        $this->db->order_by("trv_fpo_product.id", "desc");
        $this->db->from('trv_fpo_product');
        return $this->db->get()->result();
    }
    public function tax_list()
    {
        $this->db->select('hsn_category,hsn_code,igst,short_description,item_description');
        $this->db->where(array('trv_tax_master.status' => '1'));
        $this->db->order_by("trv_tax_master.hsn_category", "asc");
        $this->db->from('trv_tax_master');
        return $this->db->get()->result();
    }
    public function add_product()
    {
        $product_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'category_id' => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
            'name'          => $this->input->post('product'),
            'name_local'    => $this->input->post('product_category_local'),
            'hsn_code'    => $this->input->post('hsn_code'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_product_master', $product_details);
    }


    public function productByID($product_id)
    {
        $this->db->where(array('id' => $product_id, 'status' => '1'));
        $this->db->from('trv_product_master');
        return $this->db->get()->row_array();
    }

    public function productByCategoryAndSubcategory($category_id, $subcategory_id)
    {
        $this->db->select('trv_product_master.id, trv_product_master.name');
        $this->db->where(array('trv_product_master.category_id' => $category_id, 'trv_product_master.sub_category_id' => $subcategory_id, 'trv_product_master.status' => 1));
        $this->db->from('trv_product_master');
        return $this->db->get()->result();
    }

    public function getProductByCategoryAndSubcategory($category_id, $subcategory_id, $product_id)
    {
        $this->db->select('trv_product_master.id, trv_product_master.name');
        $this->db->where(array('trv_product_master.id' => $product_id, 'trv_product_master.category_id' => $category_id, 'trv_product_master.sub_category_id' => $subcategory_id, 'trv_product_master.status' => 1));
        $this->db->from('trv_product_master');
        return $this->db->get()->row();
    }

    public function update_product($product_id)
    {
        $product_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'category_id' => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
            'name'          => $this->input->post('product'),
            'name_local'    => $this->input->post('product_category_local'),
            'hsn_code'    => $this->input->post('hsn_code'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_product_master', $product_details, array('id' => $product_id));
    }


    public function delete_product($subcategory_id)
    {
        $subcategoryid= array(
           'status' => 0
        );
        return $this->db->update('trv_product_master', $subcategoryid, array('id' => $subcategory_id));
    }

    //product master end//

    //product fpo mapping master start//
    public function productfpo_list()
    {
        $this->db->select('trv_fpo_product.*');
        $this->db->where(array('trv_fpo_product.status' => '1'));
        $this->db->order_by("trv_fpo_product.id", "desc");
        $this->db->from('trv_fpo_product');
        return $this->db->get()->result();
    }

    public function add_productfpo()
    {
        $fpo_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'category_id' => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
            'fpo_id'    => $this->input->post('fpo'),
            'product_id'    => $this->input->post('product'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_fpo_product', $fpo_details);
    }


    public function productfpoByID($product_id)
    {
        $this->db->where(array('id' => $product_id, 'status' => '1'));
        $this->db->from('trv_fpo_product');
        return $this->db->get()->row_array();
    }


    public function update_productfpo($fpo_id)
    {
        $fpo_details = array(
            'stock_group_id' => $this->input->post('stock_group'),
            'category_id' => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
            'fpo_id'    => $this->input->post('fpo'),
            'product_id'    => $this->input->post('product'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_fpo_product', $fpo_details, array('id' => $fpo_id));
    }


    public function delete_productfpo($fpo_id)
    {
        $fpoid= array(
           'status' => 0
        );
        return $this->db->update('trv_fpo_product', $fpoid, array('id' => $fpo_id));
    }
    //product fpo mapping master end//

    //bank master start//
    public function bank_list()
    {
        $bank_type  = !empty($this->input->post('search_bank_type'))?$this->input->post('search_bank_type'):2;
        $state      = !empty($this->input->post('search_state'))?$this->input->post('search_state'):29;
        $district   = !empty($this->input->post('search_district'))?$this->input->post('search_district'):2924;
        $this->db->select('bm.id, bm.bank_name_id,bm.ifsc_code,bm.branch_name,bm.status,bn.name');
        $this->db->where(array('bm.status' => '1'));
        $this->db->where(array('bm.type_id' => $bank_type,'bm.bank_state' => $state,'bm.bank_district' => $district));
        $this->db->order_by("bm.id", "desc");
        $this->db->from('trv_bank_master bm');
        $this->db->join('trv_bank_name_master bn', 'bn.id = bm.bank_name_id');
        $this->db->limit(1000, 0);
        return $this->db->get()->result();
    }
    public function bank_type_list()
    {
        $this->db->select('trv_bank_type.*');
        $this->db->where(array('trv_bank_type.status' => '1'));
        $this->db->order_by("trv_bank_type.id", "desc");
        $this->db->from('trv_bank_type');
        return $this->db->get()->result();
    }
    public function bank_name_list()
    {
        $this->db->select('trv_bank_name_master.*');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
        $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();
    }


    public function add_bank()
    {
        $bank_details = array(
            'state_id' => $this->input->post('state'),
            'district_id' => $this->input->post('district'),
            'branch_name' => $this->input->post('branch_name'),
            'bank_name_id'    => $this->input->post('bank_name'),
            'type_id'    => $this->input->post('bank_type'),
            'ifsc_code'    => $this->input->post('ifsc_code'),
            'address_local'    => $this->input->post('address'),
            'contact_no'    => $this->input->post('contact_num'),
            'email_id'    => $this->input->post('email_id'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_bank_master', $bank_details);
    }
    public function bankname_list()
    {
        $this->db->select('trv_bank_name_master.*');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
        $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();
    }
    public function add_bankname()
    {
        $bank_details = array(
      'type_id' => $this->input->post('bank_type'),
      'name' => $this->input->post('bank_name'),
      'status'        => 1,
      'updated_on'    => date('Y-m-d H:i:s'),
      'updated_by'    => ""
      );
        return $this->db->insert('trv_bank_name_master', $bank_details);
    }
    public function banknameByID($bank_id)
    {
        $this->db->where(array('id' => $bank_id, 'status' => '1'));
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->row_array();
    }
    public function update_bankname($bank_id)
    {
        $bank_details = array(
      'type_id' => $this->input->post('bank_type'),
      'name' => $this->input->post('bank_name'),
      'status'        => 1,
      'updated_on'    => date('Y-m-d H:i:s'),
      'updated_by'    => ""
      );
        return $this->db->update('trv_bank_name_master', $bank_details, array('id' => $bank_id));
    }

    public function update_bank($bank_id)
    {
        $bank_details = array(
            'state_id' => $this->input->post('state'),
            'district_id' => $this->input->post('district'),
            'branch_name' => $this->input->post('branch_name'),
            'bank_name_id'    => $this->input->post('bank_name'),
            'type_id'    => $this->input->post('bank_type'),
            'ifsc_code'    => $this->input->post('ifsc_code'),
            'address_local'    => $this->input->post('address'),
            'contact_no'    => $this->input->post('contact_num'),
            'email_id'    => $this->input->post('email_id'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_bank_master', $bank_details, array('id' => $bank_id));
    }

    public function bankByID($bank_id)
    {
        $this->db->where(array('id' => $bank_id, 'status' => '1'));
        $this->db->from('trv_bank_master');
        return $this->db->get()->row_array();
    }

    public function delete_bank($bank_id)
    {
        $bankid= array(
           'status' => 0
        );
        return $this->db->update('trv_bank_master', $bankid, array('id' => $bank_id));
    }
    //bank master end//

    //uom master start//
    public function uom_list()
    {
        $this->db->select('trv_uom_master.*');
        $this->db->where(array('trv_uom_master.status' => '1'));
        $this->db->order_by("trv_uom_master.id", "desc");
        $this->db->from('trv_uom_master');
        return $this->db->get()->result();
    }
    public function add_uom()
    {
        $bank_details = array(
            'uom_type' => $this->input->post('uom_type'),
            'short_name' => $this->input->post('uom_short_name'),
            'full_name' => $this->input->post('uom_full_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_uom_master', $bank_details);
    }

    public function update_uom($uom_id)
    {
        $uom_details = array(
            'uom_type' => $this->input->post('uom_type'),
            'short_name' => $this->input->post('uom_short_name'),
            'full_name' => $this->input->post('uom_full_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_uom_master', $uom_details, array('id' => $uom_id));
    }

    public function uomByID($uom_id)
    {
        $this->db->where(array('id' => $uom_id, 'status' => '1'));
        $this->db->from('trv_uom_master');
        return $this->db->get()->row_array();
    }

    public function delete_uom($uom_id)
    {
        $uomid= array(
           'status' => 0
        );
        return $this->db->update('trv_uom_master', $uomid, array('id' => $uom_id));
    }
    //uom master end//


    //uom master start//
    public function humidity_list()
    {
        $this->db->select('trv_humidity_master.*');
        $this->db->where(array('trv_humidity_master.status' => '1'));
        $this->db->order_by("trv_humidity_master.id", "desc");
        $this->db->from('trv_humidity_master');
        return $this->db->get()->result();
    }

    public function add_humidity()
    {
        $humidity_details = array(
            'product_id' => $this->input->post('product'),
            'humidity' => $this->input->post('humidity'),
            'from_date' => $this->input->post('humidity_from'),
            'to_date' => $this->input->post('humidity_to'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_humidity_master', $humidity_details);
    }

    public function update_humidity($humidity_id)
    {
        $humidity_details = array(
            'product_id' => $this->input->post('product'),
            'humidity' => $this->input->post('humidity'),
            'from_date' => $this->input->post('humidity_from'),
            'to_date' =>  $this->input->post('humidity_to'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_humidity_master', $humidity_details, array('id' => $humidity_id));
    }

    public function humidityByID($humidity_id)
    {
        $this->db->where(array('id' => $humidity_id, 'status' => '1'));
        $this->db->from('trv_humidity_master');
        return $this->db->get()->row_array();
    }

    public function delete_humidity($humidity_id)
    {
        $uomid= array(
           'status' => 0
        );
        return $this->db->update('trv_humidity_master', $uomid, array('id' => $humidity_id));
    }
    //uom master end//


    //size master start//
    public function size_list()
    {
        $this->db->select('trv_size_master.*');
        $this->db->where(array('trv_size_master.status' => '1'));
        $this->db->order_by("trv_size_master.id", "desc");
        $this->db->from('trv_size_master');
        return $this->db->get()->result();
    }

    public function add_size()
    {
        $size_details = array(
            'product_id' => $this->input->post('product'),
            'size' => $this->input->post('size'),
            'uom_id' => $this->input->post('uom'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_size_master', $size_details);
    }
    public function update_size($size_id)
    {
        $size_details = array(
            'product_id' => $this->input->post('product'),
            'size' => $this->input->post('size'),
            'uom_id' => $this->input->post('uom'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_size_master', $size_details, array('id' => $size_id));
    }


    public function sizeByID($size_id)
    {
        $this->db->where(array('id' => $size_id, 'status' => '1'));
        $this->db->from('trv_size_master');
        return $this->db->get()->row_array();
    }

    public function delete_size($size_id)
    {
        $sizeid= array(
           'status' => 0
        );
        return $this->db->update('trv_size_master', $sizeid, array('id' => $size_id));
    }
    //size master end//

    //colour  master start//
    public function colour_list()
    {
        $this->db->select('trv_color_master.*');
        $this->db->where(array('trv_color_master.status' => '1'));
        $this->db->order_by("trv_color_master.id", "desc");
        $this->db->from('trv_color_master');
        return $this->db->get()->result();
    }
    public function add_colour()
    {
        $size_details = array(
            'product_id' => $this->input->post('product'),
            'name' => $this->input->post('colour'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_color_master', $size_details);
    }

    public function update_colour($colour_id)
    {
        $color_details = array(
            'product_id' => $this->input->post('product'),
            'name' => $this->input->post('colour'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_color_master', $color_details, array('id' => $colour_id));
    }

    public function colourByID($colour_id)
    {
        $this->db->where(array('id' => $colour_id, 'status' => '1'));
        $this->db->from('trv_color_master');
        return $this->db->get()->row_array();
    }

    public function delete_colour($colour_id)
    {
        $colourid= array(
           'status' => 0
        );
        return $this->db->update('trv_color_master', $colourid, array('id' => $colour_id));
    }
    //colour master end//

    //godown  master start//
    //12/05 starts
    public function godown_list()
    {
        $this->db->select('trv_godown_master.*');
        $this->db->where(array('trv_godown_master.status' => '1'));
        $this->db->order_by("trv_godown_master.id", "desc");
        $this->db->from('trv_godown_master');

        return $this->db->get()->result();
    }
    public function add_godown()
    {
        if ($this->input->post('owner_type')==1) {
            $user_id=$this->input->post('farmer_user_id');
        } elseif ($this->input->post('owner_type')==2) {
            $user_id=$this->input->post('fpo_user_id');
        }

        $godown_details = array(
            'owner_type'       		=> $this->input->post('owner_type'),
            'user_id'       		=> $user_id,
            'uom_id'       		    => $this->input->post('uom'),
            'name'       			=> $this->input->post('name'),
            'alias-name'      	    => $this->input->post('alias'),
            'ownership'             => $this->input->post('ownership'),
            'capacity'              => $this->input->post('capacity'),
            'godown_type'           => $this->input->post('type'),
            'no_of_compartments'    => $this->input->post('compartments_no'),
            'location_type'         => $this->input->post('location'),
            'pincode'               => $this->input->post('pincode'),
            'state_id'              => $this->input->post('state'),
            'district_id'           => $this->input->post('district'),
            'block_id'              => $this->input->post('block'),
            'panchayat_id'          => $this->input->post('gram_panchayat'),
            'village_id'            => $this->input->post('village'),
            'taluk_id'              => $this->input->post('taluk'),
            'street'                => $this->input->post('street'),
            'door_no'               => $this->input->post('door_no'),
            'uom_id'       => $this->input->post('uom'),
            'status'                => 1,
            'updated_on'            => date('Y-m-d H:i:s'),
            'updated_by'            => ""
        );
        return $this->db->insert('trv_godown_master', $godown_details);
    }

    public function godownByID($id)
    {
        $ownertype= $this->db->select('owner_type')->where(array('id' => $id, 'status' => '1'))->from('trv_godown_master')->get()->row()->owner_type;
        if ($ownertype==1) {
            $this->db->select('trv_godown_master.*,trv_farmer.profile_name,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
            $this->db->join('trv_farmer', 'trv_farmer.user_id = trv_godown_master.user_id');
            $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_godown_master.state_id');
            $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_godown_master.district_id');
            $this->db->join('trv_village_master', 'trv_village_master.id = trv_godown_master.village_id	');
            $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_godown_master.panchayat_id');
            $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_godown_master.taluk_id');
            $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_godown_master.block_id');
            $this->db->where(array('trv_godown_master.id' => $id, 'trv_godown_master.status' => 1));
            $this->db->from('trv_godown_master');
            $godown = $this->db->get()->row_array();
        } else {
            $this->db->select('trv_godown_master.*,trv_fpo.producer_organisation_name,trv_village_master.name As village_name,trv_state_master.name As state_name,trv_district_master.name As district_name,trv_taluk_master.name As taluk_name,trv_block_master.name As block_name,trv_panchayat_master.name As panchayat_name');
            $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_godown_master.user_id');
            $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_godown_master.state_id');
            $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_godown_master.district_id');
            $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_godown_master.taluk_id');
            $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_godown_master.block_id');
            $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_godown_master.panchayat_id');
            $this->db->join('trv_village_master', 'trv_village_master.id = trv_godown_master.village_id	');
            $this->db->where(array('trv_godown_master.id' => $id, 'trv_godown_master.status' => 1));
            $this->db->from('trv_godown_master');
            $godown = $this->db->get()->row_array();
        }
        return $godown;
    }

    public function update_godown($godown_id)
    {
        if ($this->input->post('owner_type')==1) {
            $user_id=$this->input->post('farmer_user_id');
        } elseif ($this->input->post('owner_type')==2) {
            $user_id=$this->input->post('fpo_user_id');
        }

        $godown_details = array(
            'owner_type'       	   => $this->input->post('owner_type'),
            'user_id'       	   => $user_id,
            'uom_id'       		   => $this->input->post('uom'),
            'name'                 => $this->input->post('name'),
            'alias-name'           => $this->input->post('alias'),
            'ownership'            => $this->input->post('ownership'),
            'capacity'             => $this->input->post('capacity'),
            'godown_type'          => $this->input->post('type'),
            'no_of_compartments'   => $this->input->post('compartments_no'),
            'location_type'        => $this->input->post('location'),
            'pincode'              => $this->input->post('pincode'),
            'state_id'             => $this->input->post('state'),
            'district_id'          => $this->input->post('district'),
            'block_id'             => $this->input->post('block'),
            'panchayat_id'         => $this->input->post('gram_panchayat'),
            'village_id'           => $this->input->post('village'),
            'taluk_id'             => $this->input->post('taluk'),
            'street'               => $this->input->post('street'),
            'door_no'              => $this->input->post('door_no'),
            'uom_id'       		   => $this->input->post('uom'),
            'status'               => 1,
            'updated_on'           => date('Y-m-d H:i:s'),
            'updated_by'           => ""
        );

        return $this->db->update('trv_godown_master', $godown_details, array('id' => $godown_id));
    }

    public function delete_godown($godown_id)
    {
        $businessid= array(
           'status' => 0
        );
        return $this->db->update('trv_godown_master', $businessid, array('id' => $godown_id));
    }

    public function userExists()
    {
        if ($this->input->post('owner_type') == 1) {
            $this->db->select('trv_farmer.id, trv_farmer.profile_name');
            $this->db->from('trv_farmer');
            $this->db->where(array('trv_farmer.user_id' => $this->input->post('userID'), 'trv_farmer.status' => 1));
            return $this->db->get()->result();
        } else {
            $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name');
            $this->db->from('trv_fpo');
            $this->db->where(array('trv_fpo.user_id' => $this->input->post('userID'), 'trv_fpo.status' => 1));
            return $this->db->get()->result();
        }
    }


    //12/05 starts

    //godown master end//

    //business  master start//
    public function business_nature_list()
    {
        $this->db->select('trv_business_nature_master.*');
        $this->db->where(array('trv_business_nature_master.status' => '1'));
        $this->db->order_by("trv_business_nature_master.id", "desc");
        $this->db->from('trv_business_nature_master');
        return $this->db->get()->result();
    }
    public function add_business_nature()
    {
        $business_details = array(
            'business_type'          => $this->input->post('business_type'),
            'name'       => $this->input->post('business_nature'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_business_nature_master', $business_details);
    }

    public function businessnatureByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_business_nature_master');
        return $this->db->get()->row_array();
    }

    public function update_business_nature($business_id)
    {
        $business_details = array(
            'business_type'     => $this->input->post('business_type'),
            'name'       => $this->input->post('business_nature'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_business_nature_master', $business_details, array('id' => $business_id));
    }

    public function delete_business($business_id)
    {
        $businessid= array(
           'status' => 0
        );
        return $this->db->update('trv_business_nature_master', $businessid, array('id' => $business_id));
    }

    public function businessnatureName($business_nature)
    {
        $this->db->select('trv_business_nature_master.name');
        $this->db->where_in('trv_business_nature_master.id', $business_nature);
        $this->db->from('trv_business_nature_master');
        return $this->db->get()->result();
    }
    //business master end//

    //seed  master start//
    public function seed_list()
    {
        $this->db->select('trv_seed_master.*');
        $this->db->where(array('trv_seed_master.status' => '1'));
        $this->db->order_by("trv_seed_master.id", "desc");
        $this->db->from('trv_seed_master');
        return $this->db->get()->result();
    }
    public function add_seed()
    {
        $seed_details = array(
            'category_id'          => $this->input->post('crop_category'),
            'sub_category_id'       => $this->input->post('crop_subcategory'),
            'variety_id'   		=> $this->input->post('crop_variety'),
            'class'   		=> $this->input->post('class'),
            'name_id'   		=> $this->input->post('crop_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_seed_master', $seed_details);
    }

    public function seedByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_seed_master');
        return $this->db->get()->row_array();
    }

    public function update_seed($seed_id)
    {
        $seed_details = array(
            'category_id'          => $this->input->post('crop_category'),
            'sub_category_id'       => $this->input->post('crop_subcategory'),
            'variety_id'   		=> $this->input->post('crop_variety'),
            'class'   		=> $this->input->post('class'),
            'name_id'   		=> $this->input->post('crop_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_seed_master', $seed_details, array('id' => $seed_id));
    }

    public function delete_seed($seed_id)
    {
        $seedid= array(
           'status' => 0
        );
        return $this->db->update('trv_seed_master', $seedid, array('id' => $seed_id));
    }
    //seed master end//

    //nutrient  master start//
    public function nutrient_list()
    {
        $this->db->select('trv_nutrient_master.*');
        $this->db->where(array('trv_nutrient_master.status' => '1'));
        $this->db->order_by("trv_nutrient_master.name", "asc");
        $this->db->from('trv_nutrient_master');
        return $this->db->get()->result();
    }

    public function add_nutrient()
    {
        $nutrient_details = array(
            'nutrient_type'  => $this->input->post('nutrient_type'),
              'name'       => $this->input->post('nutrient_name'),
              'nutrient_variety'       => implode(',', $this->input->post('nutrient_variety')),
           'nutrient_form'   => implode(',', $this->input->post('form')),
            //'manufacturer_id'   => $this->input->post('manufacturer'),
            //'brand_name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_nutrient_master', $nutrient_details);
    }

    public function nutrientByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_nutrient_master');
        return $this->db->get()->row_array();
    }

    public function update_nutrient($nutrient_id)
    {
        $nutrient_details = array(
            'nutrient_type'  => $this->input->post('nutrient_type'),
            'name'       => $this->input->post('nutrient_name'),
            'nutrient_variety'       => implode(',', $this->input->post('nutrient_variety')),
            'nutrient_form'   => implode(',', $this->input->post('form')),
            //'manufacturer_id'   => $this->input->post('manufacturer'),
            //'brand_name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_nutrient_master', $nutrient_details, array('id' => $nutrient_id));
    }

    public function delete_nutrient($nutrient_id)
    {
        $nutrientid= array(
           'status' => 0
        );
        return $this->db->update('trv_nutrient_master', $nutrientid, array('id' => $nutrient_id));
    }
    //nutrient master end//

    //fertilizer  master start//
    public function fertilizer_list()
    {
        $this->db->select('trv_fertilizer_master.*');
        $this->db->where(array('trv_fertilizer_master.status' => '1'));
        $this->db->order_by("trv_fertilizer_master.name", "asc");
        $this->db->from('trv_fertilizer_master');
        return $this->db->get()->result();
    }

    public function add_fertilizer()
    {
        $fertilizer_details = array(
            'fertilizer_type'  => $this->input->post('fertilizer_type'),
            'name'       => $this->input->post('fertilizer_name'),
            'fertilizer_form'   => implode(',', $this->input->post('form_fertilizer')),
            //'manufacturer_id'   => $this->input->post('manufacturer'),
            //'brand_name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_fertilizer_master', $fertilizer_details);
    }

    public function fertilizerByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_fertilizer_master');
        return $this->db->get()->row_array();
    }

    public function update_fertilizer($fertilizer_id)
    {
        $fertilizer_details = array(
            'fertilizer_type'  => $this->input->post('fertilizer_type'),
              'name'       => $this->input->post('fertilizer_name'),
            'fertilizer_form'   =>implode(',', $this->input->post('form_fertilizer')),
              //'manufacturer_id'   => $this->input->post('manufacturer'),
              //'brand_name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_fertilizer_master', $fertilizer_details, array('id' => $fertilizer_id));
    }

    public function delete_fertilizer($fertilizer_id)
    {
        $fertilizerid= array(
           'status' => 0
        );
        return $this->db->update('trv_fertilizer_master', $fertilizerid, array('id' => $fertilizer_id));
    }
    //fertilizer master end//

    //pesticide  master start//
    public function pesticide_list()
    {
        $this->db->select('trv_pesticide_master.*');
        $this->db->where(array('trv_pesticide_master.status' => '1'));
        $this->db->order_by("trv_pesticide_master.name", "asc");
        $this->db->from('trv_pesticide_master');
        return $this->db->get()->result();
    }
    public function fertilizermasterDropdownList()
    {
        $this->db->select('trv_fertilizer_master.*');
        $this->db->where(array('trv_fertilizer_master.status' => '1'));
        $this->db->order_by("trv_fertilizer_master.id", "desc");
        $this->db->from('trv_fertilizer_master');
        return $this->db->get()->result();
    }
    public function nutrientmasterDropdownList()
    {
        $this->db->select('trv_nutrient_master.*');
        $this->db->where(array('trv_nutrient_master.status' => '1'));
        $this->db->order_by("trv_nutrient_master.id", "desc");
        $this->db->from('trv_nutrient_master');
        return $this->db->get()->result();
    }
    public function pesticidemasterDropdownList()
    {
        $this->db->select('trv_pesticide_master.*');
        $this->db->where(array('trv_pesticide_master.status' => '1'));
        $this->db->order_by("trv_pesticide_master.id", "desc");
        $this->db->from('trv_pesticide_master');
        return $this->db->get()->result();
    }
    public function add_pesticide()
    {
        $pesticide_details = array(
            'pesticide_type'  => $this->input->post('pesticide_type'),
            'name'       => $this->input->post('pesticide_name'),
            'pesticide_form'   => implode(',', $this->input->post('form_pesticide')),
            //'manufacturer_id'   => $this->input->post('manufacturer'),
            //'brand_name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_pesticide_master', $pesticide_details);
    }

    public function pesticideByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_pesticide_master');
        return $this->db->get()->row_array();
    }

    public function update_pesticide($pesticide_id)
    {
        $pesticide_details = array(
            'pesticide_type'  => $this->input->post('pesticide_type'),
            'name'       => $this->input->post('pesticide_name'),
            'pesticide_form'   => implode(',', $this->input->post('form_pesticide')),
            //'manufacturer_id'   => $this->input->post('manufacturer'),
            //'brand_name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_pesticide_master', $pesticide_details, array('id' => $pesticide_id));
    }

    public function delete_pesticide($pesticide_id)
    {
        $pesticideid= array(
           'status' => 0
        );
        return $this->db->update('trv_pesticide_master', $pesticideid, array('id' => $pesticide_id));
    }
    //pesticide master end//
    //brand master start//
    public function brand_list()
    {
        $this->db->select('bm.id,bm.type_id,bm.product,bm.manufacture_id,bm.name,bm.status,mm.name as manufacture,fm.name as fertilizer_name,nm.name as nutrient_name,pm.name as pestiside_name');
        $this->db->from('trv_brand_master bm');
        $this->db->join('trv_fertilizer_master fm', 'fm.id = bm.product AND bm.type_id = 1', 'left');
        $this->db->join('trv_nutrient_master nm', 'nm.id = bm.product AND bm.type_id = 2', 'left');
        $this->db->join('trv_pesticide_master pm', 'pm.id = bm.product AND bm.type_id = 3', 'left');
        $this->db->join('trv_manufacturer_master mm', 'mm.id = bm.manufacture_id AND mm.status = 1');
        //$this->db->where(array('trv_brand_master.status' => '1'));
        $this->db->order_by("bm.id", "desc");
        return $this->db->get()->result();
    }

    public function add_brand()
    {
        $brand_details = array(
            'type_id'  => $this->input->post('type'),
              'product'       => $this->input->post('product'),
           //'pesticide_form'   => implode(',', $this->input->post('form_pesticide')),
              'manufacture_id'   => $this->input->post('manufacturer'),
               'name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_brand_master', $brand_details);
    }
    public function brandByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_brand_master');
        return $this->db->get()->row_array();
    }
    public function update_brand($brand_id)
    {
        $brand_details = array(
              'type_id'  => $this->input->post('type'),
              'product'       => $this->input->post('product'),
           //'pesticide_form'   => implode(',', $this->input->post('form_pesticide')),
               'manufacture_id'   => $this->input->post('manufacturer'),
               'name'   => $this->input->post('brand_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_brand_master', $brand_details, array('id' => $brand_id));
    }
    public function delete_brand($brand_id)
    {
        $brandid= array(
           'status' => 0
        );
        return $this->db->update('trv_brand_master', $brandid, array('id' => $brand_id));
    }
    //brand master end//

    //manufacturer master starts
    public function manufacture_list()
    {
        $this->db->select('trv_manufacturer_master.id,trv_manufacturer_master.name,trv_manufacturer_master.name_local,trv_manufacturer_master.status');
        $this->db->where(array('trv_manufacturer_master.status' => '1'));
        $this->db->order_by("trv_manufacturer_master.name", "asc");
        $this->db->from('trv_manufacturer_master');
        return $this->db->get()->result();
    }

    public function add_manufacture()
    {
        $add_manufacture_details = array(
            'name'          => $this->input->post('name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_manufacturer_master', $add_manufacture_details);
    }

    public function manufacturerByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_manufacturer_master');
        return $this->db->get()->row_array();
    }

    public function update_manufacture($manufacturer_id)
    {
        $update_manufacture_details = array(
            'name'          => $this->input->post('name'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'status'        => 1,
            'updated_by'    => ""
        );
        return $this->db->update('trv_manufacturer_master', $update_manufacture_details, array('id' => $manufacturer_id));
    }

    public function delete_manufacture($manufacture_id)
    {
        $manufactureid= array(
           'status' => 0
        );
        return $this->db->update('trv_manufacturer_master', $manufactureid, array('id' => $manufacture_id));
    }

    //manufacturer master ends


    //season master start//
    public function season_list()
    {
        $this->db->select('trv_season_master.*');
        $this->db->where(array('trv_season_master.status' => '1'));
        $this->db->order_by("trv_season_master.id", "desc");
        $this->db->from('trv_season_master');
        return $this->db->get()->result();
    }


    public function add_season()
    {
        $postharvest_details = array(
            'state_id'          => $this->input->post('state'),
            'season'          => $this->input->post('season_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_season_master', $postharvest_details);
    }

    public function seasonByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_season_master');
        return $this->db->get()->row_array();
    }

    public function update_season($season_id)
    {
        $live_stocks_details = array(
            'state_id'          => $this->input->post('state'),
            'season'          => $this->input->post('season_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_season_master', $live_stocks_details, array('id' => $season_id));
    }

    public function delete_season($postharvest_id)
    {
        $postharvestid= array(
           'status' => 0
        );
        return $this->db->update('trv_season_master', $postharvestid, array('id' => $postharvest_id));
    }

    //season master end//

    //postharvest  master start//
    public function postharvest_list()
    {
        $this->db->select('trv_post_harvest_type.*');
        $this->db->where(array('trv_post_harvest_type.status' => '1'));
        $this->db->order_by("trv_post_harvest_type.id", "desc");
        $this->db->from('trv_post_harvest_type');
        return $this->db->get()->result();
    }

    public function add_postharvest()
    {
        $postharvest_details = array(
            'name'          => $this->input->post('name'),
            'name_local'          => $this->input->post('name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_post_harvest_type', $postharvest_details);
    }

    public function postharvestByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_post_harvest_type');
        return $this->db->get()->row_array();
    }

    public function update_postharvest($harvest_id)
    {
        $live_stocks_details = array(
            'name'      => $this->input->post('name'),
            'name_local'    => $this->input->post('name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_post_harvest_type', $live_stocks_details, array('id' => $harvest_id));
    }

    public function delete_postharvest($postharvest_id)
    {
        $postharvestid= array(
           'status' => 0
        );
        return $this->db->update('trv_post_harvest_type', $postharvestid, array('id' => $postharvest_id));
    }

    //postharvest master end//

    //farm implements  master start//
    public function farm_implements_list()
    {
        $this->db->select('trv_farm_implementation.*');
        $this->db->where(array('trv_farm_implementation.status' => 1));
        $this->db->order_by("trv_farm_implementation.id", "desc");
        $this->db->from('trv_farm_implementation');
        return $this->db->get()->result();
    }
    public function farm_implementmake_list()
    {
        $this->db->distinct();
        $this->db->select('trv_farm_implementation_make_model.Primary_Yes,trv_farm_implementation_make_model.status,Make,make_local, trv_farm_implementation.name');
        //$this->db->where(array('trv_farm_implementation_make_model.status' => 1));
        $this->db->order_by("trv_farm_implementation_make_model.Primary_Yes", "asc");
        $this->db->order_by("trv_farm_implementation.name", "asc");
        $this->db->order_by("Implements_id", "asc");
        $this->db->from('trv_farm_implementation_make_model');
        $this->db->join('trv_farm_implementation', 'trv_farm_implementation.id = trv_farm_implementation_make_model.Implements_id');
        return $this->db->get()->result();
    }
    public function farm_implement_make_model_list()
    {
        $this->db->select('trv_farm_implementation_make_model.id,trv_farm_implementation_make_model.Primary_Yes,trv_farm_implementation_make_model.status,Make,make_local,Model,model_local, trv_farm_implementation.name');
        //$this->db->where(array('trv_farm_implementation_make_model.status' => 1));
        $this->db->order_by("trv_farm_implementation_make_model.Primary_Yes", "asc");
        $this->db->order_by("trv_farm_implementation.name", "asc");
        $this->db->order_by("Make", "asc");
        $this->db->order_by("Model", "asc");
        $this->db->from('trv_farm_implementation_make_model');
        $this->db->join('trv_farm_implementation', 'trv_farm_implementation.id = trv_farm_implementation_make_model.Implements_id');
        return $this->db->get()->result();
    }
    public function farm_implements_primary_list()
    {
        $this->db->select('id,name,name_local,status');
        $this->db->where(array('trv_farm_implementation.Primary_Yes'=>'1','trv_farm_implementation.status' => '1'));
        $this->db->order_by("trv_farm_implementation.id", "desc");
        $this->db->from('trv_farm_implementation');
        return $this->db->get()->result();
    }
    public function farm_implements_attach_list()
    {
        $this->db->select('id,name,name_local,status');
        $this->db->where(array('trv_farm_implementation.Primary_Yes'=>'2','trv_farm_implementation.status' => '1'));
        $this->db->order_by("trv_farm_implementation.id", "desc");
        $this->db->from('trv_farm_implementation');
        return $this->db->get()->result();
    }

    public function add_farm_implements()
    {
        if ($this->input->post('implement_type')==1) {
            $farm_implements_details = array(
            'Primary_Yes'   => $this->input->post('implement_type'),
            'Name'       => $this->input->post('primary'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
            );
        } elseif ($this->input->post('implement_type')==2) {
            $farm_implements_details = array(
            'Primary_Yes'   => $this->input->post('implement_type'),
            'Name'       => $this->input->post('attachment'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
            );
        }
        return $this->db->insert('trv_farm_implementation', $farm_implements_details);
    }

    public function farm_implementsByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_farm_implementation');
        return $this->db->get()->row_array();
    }

    public function update_farm_implements($farm_id)
    {
        if ($this->input->post('implement_type')==1) {
            $farm_implements_details = array(
            'Primary_Yes'   => $this->input->post('implement_type'),
            'name'       => $this->input->post('primary'),
            'name_local'       => $this->input->post('name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
            );
        } elseif ($this->input->post('implement_type')==2) {
            $farm_implements_details = array(
            'Primary_Yes'   => $this->input->post('implement_type'),
            'name'       => $this->input->post('attachment'),
            'name_local'       => $this->input->post('name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
            );
        }
        return $this->db->update('trv_farm_implementation', $farm_implements_details, array('id' => $farm_id));
    }

    public function delete_farm_implements($farm_id)
    {
        $farmid= array(
           'status' => 0
        );
        return $this->db->update('trv_farm_implementation', $farmid, array('id' => $farm_id));
    }

    //farm implements master end//

    //farm implements  make master start//
    public function farm_implements_make_list()
    {
        $this->db->select('trv_farm_implementation_make_model.*');
        $this->db->where(array('trv_farm_implementation_make_model.status' => '1'));
        $this->db->order_by("trv_farm_implementation_make_model.id", "desc");
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();
    }
    public function add_farm_implements_make()
    {
        $farm_details = array(
            'Primary_Yes'         => $this->input->post('implement_type'),
            'Implements_id'       => $this->input->post('implement_name'),
            'Make'   		      => $this->input->post('make'),
            'Model'   		      => $this->input->post('model'),
            'status'              => 1,
            'updated_on'          => date('Y-m-d H:i:s'),
            'updated_by'          => ""
        );
        return $this->db->insert('trv_farm_implementation_make_model', $farm_details);
    }

    public function farmimplementsmakeByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->row_array();
    }

    public function update_farm_implements_make($farmid)
    {
        $farm_details = array(
            'Primary_Yes'         => $this->input->post('implement_type'),
            'Implements_id'       => $this->input->post('implement_name'),
            'Make'   		      => $this->input->post('make'),
            'Model'   		      => $this->input->post('model'),
            'status'              => 1,
            'updated_on'          => date('Y-m-d H:i:s'),
            'updated_by'          => ""
        );
        return $this->db->update('trv_farm_implementation_make_model', $farm_details, array('id' => $farmid));
    }

    public function delete_farm_implements_make($farm_id)
    {
        $farmid= array(
           'status' => 0
        );
        return $this->db->update('trv_farm_implementation_make_model', $farmid, array('id' => $farm_id));
    }

    public function getTypeByImplement($farmimplements_id)
    {
        $this->db->select('trv_farm_implementation.id, trv_farm_implementation.Primary_Yes, trv_farm_implementation.name');
        $this->db->from('trv_farm_implementation');
        $this->db->distinct();
        $this->db->where(array('trv_farm_implementation.Primary_Yes' => $farmimplements_id, 'trv_farm_implementation.status' => 1));
        return $this->db->get()->result();
    }

    //farm implements model master starts//
    //02/01/2019

    public function farm_implements_model_list()
    {
        $this->db->select('trv_farm_implementation_make_model.*');
        $this->db->where(array('trv_farm_implementation_make_model.status' => '1'));
        $this->db->order_by("trv_farm_implementation_make_model.id", "desc");
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();
    }


    public function farm_implements_makelist($farmimplements_id)
    {
        $this->db->select('id,Make,Implements_id');
        $this->db->where(array('trv_farm_implementation_make_model.status' => 1, 'Implements_id' => $farmimplements_id));
        $this->db->order_by("trv_farm_implementation_make_model.Make", "desc");
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();
    }


    public function add_farm_implements_model()
    {
        $farm_details = array(
         'Primary_Yes'          => $this->input->post('implement_type'),
         'Implements_id'        => $this->input->post('implement_name'),
         'Make'   		       => trim($this->input->post('make')),
         'Model'   		       => trim($this->input->post('model')),
         'status'               => 1,
         'updated_on'           => date('Y-m-d H:i:s'),
         'updated_by'   		   => ""
      );
        return $this->db->insert('trv_farm_implementation_make_model', $farm_details);
    }

    public function farmimplementsmodelByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->row_array();
    }

    public function update_farm_implements_model($farmid)
    {
        $farm_details = array(
      'Primary_Yes'          => $this->input->post('implement_type'),
      'Model'   		       => $this->input->post('model'),
      'status'               => 1,
      'updated_on'           => date('Y-m-d H:i:s'),
      'updated_by'           => ""
   );
        //print_r($farm_details);
        //	die;
        return $this->db->update('trv_farm_implementation_make_model', $farm_details, array('id' => $farmid));
    }

    public function delete_farm_implements_model($farm_id)
    {
        $farmid= array(
           'status' => 0
        );
        return $this->db->update('trv_farm_implementation_make_model', $farmid, array('id' => $farm_id));
    }

    public function getTypeByName($implement_id)
    {
        $this->db->select('id,Make,Implements_id');
        $this->db->where(array('trv_farm_implementation_make_model.status' => 1, 'Implements_id' => $implement_id));
        $this->db->order_by("trv_farm_implementation_make_model.Make", "desc");
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();
    }




    //live stocks master start//
    public function live_stocks_list()
    {
        $this->db->select('trv_live_stocks_master.id,trv_live_stocks_master.type,trv_live_stocks_master.name,trv_live_stocks_master.name_local,trv_live_stocks_master.status,trv_live_stocks_type.name as type_name,trv_live_stocks_type.name_local as type_name_local');
        $this->db->join('trv_live_stocks_type','trv_live_stocks_master.type = trv_live_stocks_type.id');
        $this->db->where(array('trv_live_stocks_master.status' => '1'));
        $this->db->order_by("trv_live_stocks_master.id", "desc");
        $this->db->from('trv_live_stocks_master');
        return $this->db->get()->result();
    }

    public function add_live_stock()
    {
        $live_stocks_details = array(
            'name'          => $this->input->post('livestock_name'),
            'type'   		=> $this->input->post('livestock_type'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->insert('trv_live_stocks_master', $live_stocks_details);
    }

    public function livestockByID($id)
    {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_live_stocks_master');

        return $this->db->get()->row_array();
    }

    public function update_live_stock($livestock_id)
    {
        $live_stocks_details = array(
            'name'          => $this->input->post('livestock_name'),
            'type'   		=> $this->input->post('livestock_type'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
        return $this->db->update('trv_live_stocks_master', $live_stocks_details, array('id' => $livestock_id));
    }

    public function delete_livestock($livestock_id)
    {
        $livestockid= array(
           'status' => 0
        );
        return $this->db->update('trv_live_stocks_master', $livestockid, array('id' => $livestock_id));
    }
    //live stocks master end//

    public function crop_master_list()
    {
        $this->db->select('trv_crop_master.*');
        $this->db->where(array('trv_crop_master.status' => '1'));
        $this->db->order_by("trv_crop_master.id", "desc");
        $this->db->from('trv_crop_master');
        return $this->db->get()->result();
    }

    public function groupbyproduct($productid)
    {
        $this->db->select('id,stock_group_id');
        $this->db->where('id', $productid);
        $this->db->where('status', 1);
        $this->db->from("trv_product_master");
        return $this->db->get()->result();
    }

    public function stockbyid($stockid)
    {
        $this->db->select('id,name');
        $this->db->where('id', $stockid);
        $this->db->where('status', 1);
        $this->db->from("trv_stock_group_master");
        return $this->db->get()->result();
    }

    //live stocks variety master start//
    public function live_stocks_variety_list()
    {
        $this->db->select('trv_live_stock_variety_master.id, trv_live_stock_variety_master.live_stock_id,trv_live_stock_variety_master.status,CONCAT(trv_live_stocks_master.name, " / ",trv_live_stocks_master.name_local) as stock_name,GROUP_CONCAT(trv_live_stock_variety_master.variety SEPARATOR ", ") AS varity_name');
        $this->db->where(array('trv_live_stock_variety_master.status' => '1'));
        $this->db->group_by('trv_live_stock_variety_master.live_stock_id');
        $this->db->order_by("trv_live_stocks_master.id", "asc");
        $this->db->from('trv_live_stock_variety_master');
        $this->db->join('trv_live_stocks_master', 'trv_live_stock_variety_master.live_stock_id=trv_live_stocks_master.id');
        return $this->db->get()->result();
    }

    public function add_live_stock_variety()
    {
        $variety = $this->input->post('variety');
        for ($i=0;$i<count($variety);$i++) {
            //print_r( $variety[$i]);
            $live_stocks_details = array(
            'live_stock_id'          => $this->input->post('livestocks'),
            'variety'   		=> $variety[$i],
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
            $varietydetail=$this->db->insert('trv_live_stock_variety_master', $live_stocks_details);
        }
        return $varietydetail;
    }

    public function livestockvarietyByID($id)
    {
        $this->db->select('trv_live_stock_variety_master.*,GROUP_CONCAT(trv_live_stock_variety_master.id) AS varityid,GROUP_CONCAT(trv_live_stock_variety_master.variety) AS varity_name');
        $this->db->group_by('trv_live_stock_variety_master.live_stock_id');
        $this->db->where(array('live_stock_id' => $id, 'status' => '1'));
        $this->db->from('trv_live_stock_variety_master');
        return $this->db->get()->row_array();
    }

    public function update_live_stock_variety($livestock_id)
    {
        $variety = $this->input->post('variety');
        $varietyid = $this->input->post('varietyid');
        for ($i=0;$i<count($variety);$i++) {
            $getid=$this->db->select('id')->from('trv_live_stock_variety_master')->where('id', $varietyid[$i])->get()->row()->id;
            if ($getid) {
                $live_stocks_details = array(
            'live_stock_id' => $this->input->post('livestocks'),
            'variety'       => $variety[$i],
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );
                $this->db->where('id', $varietyid[$i]);
                $varietydetail=$this->db->update('trv_live_stock_variety_master', $live_stocks_details);
            } else {
                $live_stocks_details = array(
            'live_stock_id'          => $this->input->post('livestocks'),
            'variety'   		=> $variety[$i],
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""
        );

                $varietydetail= $this->db->insert('trv_live_stock_variety_master', $live_stocks_details);
            }
        }
        return $varietydetail;
    }

    public function delete_livestock_variety($livestock_id)
    {
        $livestockid= array(
           'status' => 0
        );
        return $this->db->update('trv_live_stock_variety_master', $livestockid, array('id' => $livestock_id));
    }

    public function getcategoryByID($category_id)
    {
        $this->db->where(array('category_id' => $category_id, 'status' => '1'));
        $this->db->from('trv_sub_category_master');
        return $this->db->get()->row_array();
    }
    public function getsubcategoryByID($subcategory_id)
    {
        $this->db->where(array('sub_category_id' => $subcategory_id, 'status' => '1'));
        $this->db->from('trv_product_master');
        return $this->db->get()->row_array();
    }
    public function getproductByID($product_id)
    {
        $this->db->where(array('product_id' => $product_id, 'status' => '1'));
        $this->db->from('trv_fpo_product');
        return $this->db->get()->row_array();
    }

    //live stocks variety master end//

    //stock group//
    public function stockgroup_list()
    {
        $this->db->select('trv_stock_group_master.id,trv_stock_group_master.name,trv_stock_group_master.status');
        $this->db->where(array('trv_stock_group_master.status' => '1'));
        $this->db->order_by("trv_stock_group_master.id", "desc");
        $this->db->from('trv_stock_group_master');
        return $this->db->get()->result();
    }

    public function add_stockgroup()
    {
        $add_stockgroup_details = array(
            'name'          => $this->input->post('name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'        =>  1

        );
        return $this->db->insert('trv_stock_group_master', $add_stockgroup_details);
    }

    //stock group ends//
}
