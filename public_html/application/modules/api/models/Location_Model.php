<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Location_Model extends CI_Model {
   function __construct() {
      parent::__construct();
      $this->load->database();
   }
    
    
   /******** state Master start *************/
	function state_list() {  
      $this->db->select('state_code, name as state_name, name_local as local_name');
      $this->db->where(array('trv_state_master.status' => '1'));
      $this->db->order_by("trv_state_master.name", "asc");
      $this->db->from('trv_state_master');
      return $this->db->get()->result();	
	}

	function stateByID($state_code) {
      $this->db->select('state_code, name as state_name, name_local as local_name');
      $this->db->where(array('state_code' => $state_code, 'status' => '1'));
      $this->db->from('trv_state_master');
      return $this->db->get()->row_array();	
	} 	
   //state master end//
   /******** District Master *********************/
      
	function districtByState($state_code) {  
      $this->db->select('district_code, trv_district_master.name as district_name, trv_district_master.name_local as local_name,trv_state_master.name as state_name');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_district_master.state_code');
      $this->db->where(array('trv_district_master.status' => '1','trv_district_master.state_code' => $state_code));
      $this->db->order_by("trv_district_master.name", "asc");
      $this->db->from('trv_district_master');
      //echo '<pre>';print_r($this->db->get()->result());die;
      return $this->db->get()->result();	
	}
   function districtByID($district_code) {
        $this->db->where(array('district_code' => $district_code, 'status' => '1'));
        $this->db->from('trv_district_master');
        return $this->db->get()->row_array();	
	}
	//district master end//
    
	//block master start//
	function block_list() {  
      $this->db->select('trv_block_master.*,trv_district_master.name as district_name,trv_state_master.name as state_name');
      $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_block_master.district_code');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_district_master.state_code');
      $this->db->where(array('trv_block_master.status' => '1'));
      $this->db->order_by("trv_block_master.id", "desc");
      $this->db->from('trv_block_master');
      return $this->db->get()->result();	
	} 
	

	function add_block() {   
      $block_details = array(	
         'district_code'          => $this->input->post('district_name'),
         'name'          => $this->input->post('block_name'),
         'name_local'    => $this->input->post('block_name_local'),
         'status'        => 1,
         'updated_on'    => date('Y-m-d H:i:s'),
         'updated_by'    => ""        
      );
      return $this->db->insert('trv_block_master', $block_details);
	} 
	

	function blockByID($block_id) {
        $this->db->where(array('id' => $block_id, 'status' => '1'));
        $this->db->from('trv_block_master');
        return $this->db->get()->row_array();	
	} 	
    
    
    function update_block($block_id) {
        $block_details = array(	
	        'district_code'          => $this->input->post('district_name'),
	        'name'          => $this->input->post('block_name'),
            'name_local'    => $this->input->post('block_name_local'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
		return $this->db->update('trv_block_master', $block_details, array('id' => $block_id));
	}
    
    
    function delete_block($block_id ) {
        $blockid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_block_master', $blockid, array('id' => $block_id));
	}
	//block master end//
    
    //taluk master start//
	function taluk_list() {  
      $this->db->select('trv_taluk_master.*,trv_district_master.name as district_name,trv_state_master.name as state_name');
      $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_taluk_master.district_code');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_district_master.state_code');
      $this->db->where(array('trv_taluk_master.status' => '1'));
      $this->db->order_by("trv_taluk_master.id", "desc");
      $this->db->from('trv_taluk_master');
      return $this->db->get()->result();	
	} 
	

	function add_taluk() {   
        $taluk_details = array(	
	        'name'          => $this->input->post('taluk_name'),
            'name_local'    => $this->input->post('taluk_name_local'),
			'district_code'    => $this->input->post('district_name'),
			'block_id'    => $this->input->post('block_name'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
        return $this->db->insert('trv_taluk_master', $taluk_details);
	} 
	

	function talukByID($taluk_id) {
        $this->db->where(array('id' => $taluk_id, 'status' => '1'));
        $this->db->from('trv_taluk_master');
        return $this->db->get()->row_array();	
	} 	
    
    
    function update_taluk($taluk_id) {
        $taluk_details = array(	
	        'name'          => $this->input->post('taluk_name'),
            'name_local'    => $this->input->post('taluk_name_local'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
		return $this->db->update('trv_taluk_master', $taluk_details, array('id' => $taluk_id));
	}
    
    
   function delete_taluk($taluk_id ) {
        $talukid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_taluk_master', $talukid, array('id' => $taluk_id));
	}
	//taluk master end//
    
	//panchayat master start//
	function panchayat_list() {  
      $this->db->select('trv_panchayat_master.*,trv_block_master.name as block_name,trv_district_master.name as district_name,trv_state_master.name as state_name');
      //$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_panchayat_master.taluk_code');
      $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_panchayat_master.block_code');
      $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_panchayat_master.district_code');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_district_master.state_code');
      $this->db->where(array('trv_panchayat_master.status' => '1'));
      $this->db->order_by("trv_panchayat_master.id", "asc");
      $this->db->from('trv_panchayat_master');
      return $this->db->get()->result();
	} 
	

	function add_panchayat() {   
      $panchayat_details = array(	
         'state_code'          => $this->input->post('state_name'),
         'district_code'          => $this->input->post('district_name'),
         'block_code'          => $this->input->post('block_name'),
         'name'          => $this->input->post('gram_panchayat_name'),
         'name_local'    => $this->input->post('gram_panchayat_name_local'),
         'status'        => 1,
         'updated_on'    => date('Y-m-d H:i:s'),
         'updated_by'    => "1"        
      );
      return $this->db->insert('trv_panchayat_master', $panchayat_details);
	} 
	

	function panchayatByID($panchayat_id) {
        $this->db->where(array('id' => $panchayat_id, 'status' => '1'));
        $this->db->from('trv_panchayat_master');
        return $this->db->get()->row_array();	
	} 	
    
    
   function update_panchayat($panchayat_id) {
      $panchayat_details = array(	
         'name'          => $this->input->post('gram_panchayat_name'),
         'name_local'    => $this->input->post('gram_panchayat_name_local'),
         'updated_on'    => date('Y-m-d H:i:s'),
         'updated_by'    => ""        
      );
      return $this->db->update('trv_panchayat_master', $panchayat_details, array('id' => $panchayat_id));
	}
    
    
    function delete_panchayat($panchayat_id ) {
        $panchayatid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_panchayat_master', $panchayatid, array('id' => $panchayat_id));
	}
	//panchayat master end//
    
	//village master start//
	function village_list() {  
      $this->db->select('trv_village_master.*,trv_panchayat_master.name as panchayat_name,trv_block_master.name as block_name,trv_district_master.name as district_name,trv_state_master.name as state_name');
      $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_village_master.panchayat_code');
      //$this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_panchayat_master.taluk_id');
      $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_village_master.block_code');
      $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_village_master.district_code');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_village_master.state_code');
      $this->db->where(array('trv_village_master.status' => '1'));
      $this->db->order_by("trv_village_master.id", "asc");
      $this->db->from('trv_village_master');
      $this->db->limit(10000, 0);
      //$this->db->limit($limit, $start);
      return $this->db->get()->result();		
	} 
	

	function add_village() {   
        $village_details = array(	
	        'panchayat_id'          => $this->input->post('gram_panchayat_name'),
			'name'          => $this->input->post('village_name'),
            'name_local'    => $this->input->post('village_name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
        return $this->db->insert('trv_village_master', $village_details);
	} 
	

	function villageByID($village_id) {
        $this->db->where(array('id' => $village_id, 'status' => '1'));
        $this->db->from('trv_village_master');
        return $this->db->get()->row_array();	
	} 	
    
    
    function update_village($village_id) {
        $village_details = array(	
	        'name'          => $this->input->post('village_name'),
            'name_local'    => $this->input->post('village_name_local'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
		return $this->db->update('trv_village_master', $village_details, array('id' => $village_id));
	}
    
    
    function delete_village($village_id ) {
        $villageid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_village_master', $villageid, array('id' => $village_id));
	}
	//village master end//
   
   function districtcall($district) 
  { 
      $this->db->select('trv_district_master.*');
      $this->db->where('district_code',$district);
      $this->db->where('status', 1 );
      $this->db->from("trv_district_master");    
      return $this->db->get()->result();
   }
    
    function statecall($state) { 
      $this->db->select('district_code,name');
      $this->db->where('state_code', $state);
      $this->db->where('status', 1);
      $this->db->from("trv_district_master");    
      return $this->db->get()->result();
    }
    
   function blockcall($district) { 
      $this->db->select('block_code,name');
      $this->db->where('district_code', $district);
      $this->db->where('status', 1);
      $this->db->from("trv_block_master");    
      return $this->db->get()->result();
   }
    
    
   function talukcall($block) { 
      $this->db->select('id,name');
      $this->db->where('block_id', $block);
      $this->db->where('status', 1);
      $this->db->from("trv_taluk_master");    
      return $this->db->get()->result();
   }    
    
   function panchayatcall($panchayat_id) { 
      $this->db->select('id,name');
      $this->db->where('panchayat_id', $panchayat_id);
      $this->db->where('status', 1);
      $this->db->from("trv_village_master");    
      return $this->db->get()->result();
   }
}
?>