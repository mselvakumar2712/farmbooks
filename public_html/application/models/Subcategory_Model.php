<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Subcategory_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
/** Crop Subcategory master Starts **/
    function subcategoryList() {
        $this->db->select('trv_crop_sub_category_master.id, trv_crop_sub_category_master.crop_category_id, trv_crop_sub_category_master.name, trv_crop_sub_category_master.name_local, trv_crop_sub_category_master.status, trv_crop_category_master.name AS category_name');
        $this->db->from('trv_crop_sub_category_master');
        $this->db->join('trv_crop_category_master', 'trv_crop_category_master.id = trv_crop_sub_category_master.crop_category_id');
        $this->db->where(array('trv_crop_sub_category_master.status' => '1','trv_crop_category_master.status'=>'1'));
		return $this->db->get()->result();
    }
    
    
    function addsubcategory() {
        $subcategory_details = array(	
            'crop_category_id'          => $this->input->post('cropcategory'),
            'name'                      => $this->input->post('cropsubcategory'),
            'name_local'                => $this->input->post('crop_category_in_regional'),
            'status'                    => 1,
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
        return $this->db->insert('trv_crop_sub_category_master', $subcategory_details);
    }
    
    
    function subcategoryByID($subcategory_id) {
        $this->db->where(array('id' => $subcategory_id, 'status' => '1'));
        $this->db->from('trv_crop_sub_category_master');
        return $this->db->get()->result();	
    }
    
    
    function updatesubcategory($subcategory_id) {
        $subcategory_details = array(	
            'crop_category_id'               => $this->input->post('cropcategory'),
            'name'                      => $this->input->post('cropsubcategory'),
            'name_local'                => $this->input->post('crop_category_in_regional'),
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
		return $this->db->update('trv_crop_sub_category_master', $subcategory_details, array('id' => $subcategory_id));
    }
    
    
    function deletesubcategory( $subcategory_id ) {
        $subcategory_details = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_crop_sub_category_master', $subcategory_details, array('id' => $subcategory_id));
	}
    
    
    function subcategoryDropdownList() {
        $this->db->select('trv_crop_sub_category_master.id, trv_crop_sub_category_master.name');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_crop_sub_category_master');
        return $this->db->get()->result();	
    }
    
    
    function get_subcategory( $subcategory_id ) {
		return $this->db->get_where('trv_crop_sub_category_master', array('id' => $subcategory_id))->row();
	}
/** Crop Subcategory End **/       
    
}

?>