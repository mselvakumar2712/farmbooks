<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Category_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
/** Crop Category master Starts **/
    function categoryList() {
        $this->db->select('trv_crop_category_master.id, trv_crop_category_master.name, trv_crop_category_master.name_local, trv_crop_category_master.status');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_crop_category_master');
        return $this->db->get()->result();	
    }
    
    
    function addcategory() {
        $category_details = array(	
            'name'                      => $this->input->post('cropcategory'),
            'name_local'                => $this->input->post('crop_category_in_regional'),
            'status'                    => 1,
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
        return $this->db->insert('trv_crop_category_master', $category_details);
    }
    
    
    function categoryByID($category_id) {
        $this->db->where(array('id' => $category_id, 'status' => '1'));
        $this->db->from('trv_crop_category_master');
        return $this->db->get()->result();	
    }
    
    
    function updatecategory($category_id) {
        $category_details = array(
            'name'                      => $this->input->post('cropcategory'),
            'name_local'                => $this->input->post('crop_category_in_regional'),
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
		return $this->db->update('trv_crop_category_master', $category_details, array('id' => $category_id));
    }
    
    
    function deletecategory( $category_id ) {
        $category_details = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_crop_category_master', $category_details, array('id' => $category_id));
	}
    
    
    function categoryDropdownList() {
        $this->db->select('trv_crop_category_master.id, trv_crop_category_master.name');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_crop_category_master');
        return $this->db->get()->result();	
    }
    
    
    function get_category( $category_id ) {
		return $this->db->get_where('trv_crop_category_master', array('id' => $category_id))->row();
	}
/** Crop Category End **/       
    
}

?>