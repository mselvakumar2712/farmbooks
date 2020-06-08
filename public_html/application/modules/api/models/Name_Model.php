<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Name_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
/** Crop Name master Starts **/
    function nameList() {
        $this->db->select('trv_crop_name_master.id, trv_crop_name_master.category_id, trv_crop_name_master.sub_category_id, trv_crop_name_master.name, trv_crop_name_master.name_local, trv_crop_name_master.status, trv_crop_sub_category_master.name AS subcategory_name, trv_crop_category_master.name AS category_name');
        $this->db->from('trv_crop_name_master');
        $this->db->join('trv_crop_sub_category_master', 'trv_crop_sub_category_master.id = trv_crop_name_master.sub_category_id');
        $this->db->join('trv_crop_category_master', 'trv_crop_category_master.id = trv_crop_name_master.category_id');
        $this->db->where(array('trv_crop_name_master.status' => '1','trv_crop_sub_category_master.status' => '1','trv_crop_category_master.status'=>'1'));		
		return $this->db->get()->result();
    }
    
    
    function addname() {
        $name_details = array(	
            'category_id'               => $this->input->post('cropcategory'),
            'sub_category_id'            => $this->input->post('crop_sub_category'),
            'name'                      => $this->input->post('crop_name'),
            'name_local'                => $this->input->post('crop_regional_language'),
            'status'                    => 1,
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
        return $this->db->insert('trv_crop_name_master', $name_details);
    }
    
    
    function nameByID($name_id) {
        $this->db->where(array('id' => $name_id, 'status' => '1'));
        $this->db->from('trv_crop_name_master');
        return $this->db->get()->result();	
    }
    
    
    function updatename($name_id) {
        $name_details = array(	
            'category_id'               => $this->input->post('cropcategory'),
            'sub_category_id'            => $this->input->post('crop_sub_category'),
            'name'                      => $this->input->post('crop_name'),
            'name_local'                => $this->input->post('crop_regional_language'),
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
		return $this->db->update('trv_crop_name_master', $name_details, array('id' => $name_id));
    }
    
    
    function deletename( $name_id ) {
        $name_details = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_crop_name_master', $name_details, array('id' => $name_id));
	}
    
    
    function nameDropdownList() {
        $this->db->select('trv_crop_name_master.id, trv_crop_name_master.name');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_crop_name_master');
        return $this->db->get()->result();	
    }
    
    
    function get_name($name_id ) {
		return $this->db->get_where('trv_crop_name_master', array('id' => $name_id))->row();
	}
/** Crop name End **/       
    
}

?>