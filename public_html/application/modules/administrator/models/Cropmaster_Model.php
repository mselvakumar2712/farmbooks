<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cropmaster_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

/** Crop master Starts **/
    function cropList() {
        $this->db->select('trv_crop_master.id, trv_crop_master.category_id, trv_crop_master.subcategory_id, trv_crop_master.name_id, trv_crop_master.variety_id, trv_crop_master.tenure, trv_crop_master.crop_output, trv_crop_master.status, trv_crop_variety_master.variety AS variety_name, trv_crop_name_master.name AS crop_name, trv_crop_sub_category_master.name AS subcategory_name, trv_crop_category_master.name AS category_name, tenure_to,tenure_unit,harvesting_commence');
        $this->db->from('trv_crop_master');
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop_master.variety_id');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_master.name_id');
        $this->db->join('trv_crop_sub_category_master', 'trv_crop_sub_category_master.id = trv_crop_master.subcategory_id');
        $this->db->join('trv_crop_category_master', 'trv_crop_category_master.id = trv_crop_master.category_id');
        $this->db->where(array('trv_crop_master.status' => '1','trv_crop_variety_master.status' => '1','trv_crop_name_master.status' => '1','trv_crop_sub_category_master.status' => '1','trv_crop_category_master.status'=>'1'));
        return $this->db->get()->result();
    }


    function addcrop() {
        if(is_array($this->input->post('cropoutput'))) {
            $cropoutput = implode(',', $this->input->post('cropoutput'));
        } else {
            $cropoutput = $this->input->post('cropoutput');
        }

        $crop_details = array(
            'category_id'               => $this->input->post('cropcategory'),
            'subcategory_id'            => $this->input->post('cropsubcategory'),
            'name_id'                   => $this->input->post('cropname'),
            'variety_id'                => $this->input->post('cropvariety'),
            'tenure'                    => $this->input->post('tenure'),
			'tenure_unit'               => $this->input->post('tenure_unit'),
            'harvesting_type'           => $this->input->post('harvesting_type'),
            'harvesting_commence'       => ($this->input->post('harvesting_commence')) ? $this->input->post('harvesting_commence'):"",
            'yield_measurement'         => $this->input->post('yield_measurement'),
            'crop_output'               => ($cropoutput)?$cropoutput:"",
            'status'                    => 1,
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
        return $this->db->insert('trv_crop_master', $crop_details);
    }


    function cropByID($crop_id) {
        $this->db->where(array('id' => $crop_id, 'status' => '1'));
        $this->db->from('trv_crop_master');
        return $this->db->get()->result();
    }


    function updatecrop($crop_id) {
        if(is_array($this->input->post('cropoutput'))) {
            $cropoutput = implode(',', $this->input->post('cropoutput'));
        } else {
            $cropoutput = $this->input->post('cropoutput');
        }

        $crop_details = array(
            'category_id'               => $this->input->post('cropcategory'),
            'subcategory_id'            => $this->input->post('cropsubcategory'),
            'name_id'                   => $this->input->post('cropname'),
            'variety_id'                => $this->input->post('cropvariety'),
            'tenure'                    => $this->input->post('tenure'),
			   'tenure_unit'               => $this->input->post('tenure_unit'),
            'harvesting_type'           => $this->input->post('harvesting_type'),
            'harvesting_commence'       => ($this->input->post('harvesting_commence')) ? $this->input->post('harvesting_commence'):"",
            'yield_measurement'         => $this->input->post('yield_measurement'),
            'crop_output'               => ($cropoutput)?$cropoutput:"",
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );
		return $this->db->update('trv_crop_master', $crop_details, array('id' => $crop_id));
    }


    function deletecrop( $crop_id ) {
        $crop_details = array(
	       'status' => 0
        );
        return $this->db->update('trv_crop_master', $crop_details, array('id' => $crop_id));
	}


    function cropDropdownList() {
        $this->db->select('trv_crop_master.id, trv_crop_master.name_id, trv_crop_name_master.name AS crop_name');
        $this->db->from('trv_crop_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_master.name_id');
        $this->db->where(array('trv_crop_master.status' => '1'));
        return $this->db->get()->result();
    }


    function get_crop( $crop_id ) {
		return $this->db->get_where('trv_crop_master', array('id' => $crop_id))->row();
	}


    function get_cropbyname( $name_id ) {
		return $this->db->get_where('trv_crop_master', array('name_id' => $name_id))->row();
	}


    function formerDropdownList() {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name');
        $this->db->from('trv_farmer');
        $this->db->where(array('trv_farmer.status' => '1'));
        return $this->db->get()->result();
    }

	function getSubcategory($category) {
		$this->db->select('id,name');
		$this->db->where('crop_category_id', $category );
		$this->db->where('status', 1 );
		$this->db->from("trv_crop_sub_category_master");
		return $this->db->get()->result();
    }

	function getnamebyid($sub_category) {
		$this->db->select('id,name');
		$this->db->where('sub_category_id',$sub_category);
		$this->db->where('status', 1 );
		$this->db->from("trv_crop_name_master");
		return $this->db->get()->result();
    }
	function getvarietybyid($nameid) {
		$this->db->select('id,variety');
		$this->db->where('name_id',$nameid);
		$this->db->where('status', 1 );
		$this->db->from("trv_crop_variety_master");
		return $this->db->get()->result();
    }
	function farmerDropdownList() {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name');
        $this->db->from('trv_farmer');
        $this->db->distinct();
        $this->db->where(array('trv_farmer.status' => '1'));
        return $this->db->get()->result();
    }
   function uomDropdownList() {
        $this->db->select('trv_uom_master.id, trv_uom_master.full_name,trv_uom_master.short_name');
        $this->db->from('trv_uom_master');
      $this->db->distinct();
        $this->db->where(array('trv_uom_master.uom_type' => '2','trv_uom_master.status' => '1'));
        return $this->db->get()->result();
    }
   function areauomDropdownList() {
        $this->db->select('trv_uom_master.id, trv_uom_master.full_name,trv_uom_master.short_name');
        $this->db->from('trv_uom_master');
      $this->db->distinct();
        $this->db->where(array('trv_uom_master.uom_type' => '1','trv_uom_master.status' => '1'));
        return $this->db->get()->result();
    }
   function worktypeDropdownList() {
        $this->db->select('trv_post_harvest_type.id, trv_post_harvest_type.name');
        $this->db->from('trv_post_harvest_type');
      $this->db->distinct();
        $this->db->where(array('trv_post_harvest_type.status' => '1'));
        return $this->db->get()->result();
    }
	function groupbyproduct($sub_category) {
		$this->db->select('id,name');
		$this->db->where('sub_category_id',$sub_category);
		$this->db->where('status', 1 );
		$this->db->from("trv_crop_name_master");
		return $this->db->get()->result();
    }
/** Crop End **/

}

?>
