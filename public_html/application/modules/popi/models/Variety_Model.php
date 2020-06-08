<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Variety_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
/** Crop Variety master Starts **/
    function varietyList() {
        $this->db->select('trv_crop_variety_master.id, trv_crop_variety_master.category_id, trv_crop_variety_master.sub_category_id, trv_crop_variety_master.name_id, trv_crop_variety_master.variety, trv_crop_variety_master.variety_local, trv_crop_variety_master.status, trv_crop_name_master.name AS crop_name, trv_crop_sub_category_master.name AS subcategory_name, trv_crop_category_master.name AS category_name');
        $this->db->from('trv_crop_variety_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_variety_master.name_id');
        $this->db->join('trv_crop_sub_category_master', 'trv_crop_sub_category_master.id = trv_crop_variety_master.sub_category_id');
        $this->db->join('trv_crop_category_master', 'trv_crop_category_master.id = trv_crop_variety_master.category_id');        
        return $this->db->get()->result();
    }
    
    
    function addvariety() {
        $variety_details = array(	
            'category_id'               => $this->input->post('cropcategory'),
            'sub_category_id'            => $this->input->post('cropsubcategory'),
            'name_id'                   => $this->input->post('cropname'),
            'variety'                      => $this->input->post('cropvariety'),
            'variety_local'                => $this->input->post('cropregional'),
            'status'                    => 1,
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
        return $this->db->insert('trv_crop_variety_master', $variety_details);
    }
    
    
    function varietyByID($variety_id) {
        $this->db->where(array('id' => $variety_id, 'status' => '1'));
        $this->db->from('trv_crop_variety_master');
        return $this->db->get()->result();	
    }
    
    
    function updatevariety($variety_id) {
        $variety_details = array(	
            'category_id'               => $this->input->post('cropcategory'),
            'sub_category_id'            => $this->input->post('cropsubcategory'),
            'name_id'                   => $this->input->post('cropname'),
            'variety'                      => $this->input->post('cropvariety'),
            'variety_local'                => $this->input->post('cropregional'),
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
		return $this->db->update('trv_crop_variety_master', $variety_details, array('id' => $variety_id));
    }
    
    
    function deletevariety( $variety_id ) {
        $variety_details = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_crop_variety_master', $variety_details, array('id' => $variety_id));
	}
    
    
    function varietyDropdownList() {
        $this->db->select('trv_crop_variety_master.id, trv_crop_variety_master.variety');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_crop_variety_master');
        return $this->db->get()->result();	
    }
    
    
    function get_variety( $variety_id ) {
		return $this->db->get_where('trv_crop_variety_master', array('id' => $variety_id))->row();
	}
/** Crop Variety End **/       
    
}

?>