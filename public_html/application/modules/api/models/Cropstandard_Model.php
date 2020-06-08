<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cropstandard_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
/** Crop master Starts **/
    function cropstandardmasterList() {
        $this->db->select('*');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_crop_standard_master');
        return $this->db->get()->result();	
    }
    
    
    function addcropstandardmaster() {
        if(is_array($this->input->post('crop_type'))) {
            $crop_type = implode(',', $this->input->post('crop_type'));
        }
        $cropstandard_details = array(	
	        'crop_id'                   => $this->input->post('crop'),
            'variety_id'                => $this->input->post('variety'),
            'crop_type'                 => $crop_type,
            'area'                      => $this->input->post('area'),
            'uom_id'                    => $this->input->post('area_uom'),
            'standard_yield_wet_land'   => $this->input->post('wet_land_yield'),
            'standard_yield_dry_land'   => $this->input->post('dry_land_yield'),
            'quantity_uom'              => $this->input->post('quantity_uom'),
            'state_id'                  => $this->input->post('state'),
            'district_id'               => $this->input->post('district'),
            'season_id'                 => $this->input->post('season'),
            
            'status'             => 1,
            'updated_on'         => date('Y-m-d H:i:s'),
            'updated_by'         => ""
        );
        return $this->db->insert('trv_crop_standard_master', $cropstandard_details);
    }
    
    
    function cropstandardmasterByID($cropstandard_id) {
        $this->db->where(array('id' => $cropstandard_id, 'status' => '1'));
        $this->db->from('trv_crop_standard_master');
        return $this->db->get()->result();	
    }
    
    
    function updatecropstandardmaster($cropstandard_id) {
        if(is_array($this->input->post('crop_type'))) {
            $crop_type = implode(',', $this->input->post('crop_type'));
        }
        $cropstandard_details = array(	
	        'crop_id'                   => $this->input->post('crop'),
            'variety_id'                => $this->input->post('variety'),
            'crop_type'                 => $crop_type,
            'area'                      => $this->input->post('area'),
            'uom_id'                    => $this->input->post('area_uom'),
            'standard_yield_wet_land'   => $this->input->post('wet_land_yield'),
            'standard_yield_dry_land'   => $this->input->post('dry_land_yield'),
            'quantity_uom'              => $this->input->post('quantity_uom'),
            'state_id'                  => $this->input->post('state'),
            'district_id'               => $this->input->post('district'),
            'season_id'                 => $this->input->post('season'),
            
            'updated_on'         => date('Y-m-d H:i:s'),
            'updated_by'         => ""
        );
		return $this->db->update('trv_crop_standard_master', $cropstandard_details, array('id' => $cropstandard_id));
    }
    
    
    function deletecropstandardmaster( $cropstandard_id ) {
        $cropstandard_details = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_crop_standard_master', $cropstandard_details, array('id' => $cropstandard_id));
	}

/** Crop End **/       
    
}

?>