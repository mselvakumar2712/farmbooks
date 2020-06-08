<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Location_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
//state master start//
	function state_list() {  
        $this->db->select('trv_state_master.*');
        $this->db->where(array('trv_state_master.status' => '1'));
        $this->db->order_by("trv_state_master.id", "desc");
        $this->db->from('trv_state_master');
        return $this->db->get()->result();	
	} 
	

	function add_state() {   
        $state_details = array(	
	        'name'          => $this->input->post('state_name'),
            'name_local'    => $this->input->post('state_name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
        return $this->db->insert('trv_state_master', $state_details);
	} 
	

	function stateByID($state_id) {
        $this->db->where(array('id' => $state_id, 'status' => '1'));
        $this->db->from('trv_state_master');
        return $this->db->get()->row_array();	
	} 	
    
    
    function update_state($state_id) {
        $state_details = array(	
	        'name'          => $this->input->post('state_name'),
            'name_local'    => $this->input->post('state_name_local'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
		return $this->db->update('trv_state_master', $state_details, array('id' => $state_id));
	}
    
    
    function delete_state( $state_id ) {
        $stateid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_state_master', $stateid, array('id' => $state_id));
	}
	//state master end//


    //district master start//
	function district_list() {  
        $this->db->select('trv_district_master.*,trv_state_master.name as state_name');
		$this->db->join('trv_state_master', 'trv_state_master.id = trv_district_master.state_id');
        $this->db->where(array('trv_district_master.status' => '1'));
        $this->db->order_by("trv_district_master.id", "desc");
        $this->db->from('trv_district_master');
        return $this->db->get()->result();	
	} 
	

	function add_district() {   
        $state_details = array(	
		    'state_id'      => $this->input->post('state_name'),
	        'name'          => $this->input->post('district_name'),
            'name_local'    => $this->input->post('district_name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
        return $this->db->insert('trv_district_master', $state_details);
	} 
	

	function districtByID($id) {
        $this->db->where(array('id' => $id, 'status' => '1'));
        $this->db->from('trv_district_master');
        return $this->db->get()->row_array();	
	} 	
    
    
    function update_district($district_id) {
        $district_details = array(	
	        'state_id'      => $this->input->post('state_name'),
	        'name'          => $this->input->post('district_name'),
            'name_local'    => $this->input->post('district_name_local'),
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
		return $this->db->update('trv_district_master', $district_details, array('id' => $district_id));
	}
    
    
    function delete_district($district_id ) {
        $districtid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_district_master', $districtid, array('id' => $district_id));
	}
	//district master end//
    
	//block master start//
	function block_list() {  
        $this->db->select('trv_block_master.*,trv_district_master.name as district_name,trv_state_master.name as state_name');
		$this->db->join('trv_district_master', 'trv_district_master.id = trv_block_master.district_id');
		$this->db->join('trv_state_master', 'trv_state_master.id = trv_district_master.state_id');
        $this->db->where(array('trv_block_master.status' => '1'));
        $this->db->order_by("trv_block_master.id", "desc");
        $this->db->from('trv_block_master');
        return $this->db->get()->result();	
	} 
	

	function add_block() {   
        $block_details = array(	
			'district_id'          => $this->input->post('district_name'),
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
	        'district_id'          => $this->input->post('district_name'),
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
        $this->db->select('trv_taluk_master.*,trv_district_master.name as district_name,trv_state_master.name as state_name,trv_block_master.name as block_name');
		$this->db->join('trv_district_master', 'trv_district_master.id = trv_taluk_master.district_id');
		$this->db->join('trv_state_master', 'trv_state_master.id = trv_district_master.state_id');
		$this->db->join('trv_block_master', 'trv_block_master.id = trv_taluk_master.block_id');		
        $this->db->where(array('trv_taluk_master.status' => '1'));
        $this->db->order_by("trv_taluk_master.id", "desc");
        $this->db->from('trv_taluk_master');
        return $this->db->get()->result();	
	} 
	

	function add_taluk() {   
        $taluk_details = array(	
	        'name'          => $this->input->post('taluk_name'),
            'name_local'    => $this->input->post('taluk_name_local'),
			'district_id'    => $this->input->post('district_name'),
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
        return $this->db->get()->result();	
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
        $this->db->select('trv_panchayat_master.*,trv_taluk_master.name as taluk_name,trv_block_master.name as block_name,trv_district_master.name as district_name,trv_state_master.name as state_name');
	    $this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_panchayat_master.taluk_id');
		$this->db->join('trv_block_master', 'trv_block_master.id = trv_taluk_master.block_id');
		$this->db->join('trv_district_master', 'trv_district_master.id = trv_taluk_master.district_id');
		$this->db->join('trv_state_master', 'trv_state_master.id = trv_district_master.state_id');
	    $this->db->where(array('trv_panchayat_master.status' => '1'));
        $this->db->order_by("trv_panchayat_master.id", "desc");
        $this->db->from('trv_panchayat_master');
        return $this->db->get()->result();	
	} 
	

	function add_panchayat() {   
        $panchayat_details = array(	
	        'taluk_id'          => $this->input->post('taluk_name'),
			'name'          => $this->input->post('gram_panchayat_name'),
            'name_local'    => $this->input->post('gram_panchayat_name_local'),
            'status'        => 1,
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => ""        
        );
        return $this->db->insert('trv_panchayat_master', $panchayat_details);
	} 
	

	function panchayatByID($panchayat_id) {
        $this->db->where(array('id' => $panchayat_id, 'status' => '1'));
        $this->db->from('trv_panchayat_master');
        return $this->db->get()->result();	
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
        $this->db->select('trv_village_master.*,trv_panchayat_master.name as panchayat_name,trv_taluk_master.name as taluk_name,trv_block_master.name as block_name,trv_district_master.name as district_name,trv_state_master.name as state_name');
	    $this->db->join('trv_panchayat_master', 'trv_panchayat_master.id = trv_village_master.panchayat_id');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_panchayat_master.taluk_id');
		$this->db->join('trv_block_master', 'trv_block_master.id = trv_taluk_master.block_id');
		$this->db->join('trv_district_master', 'trv_district_master.id = trv_taluk_master.district_id');
		$this->db->join('trv_state_master', 'trv_state_master.id = trv_district_master.state_id');
	    $this->db->where(array('trv_village_master.status' => '1'));
        $this->db->order_by("trv_village_master.id", "desc");
        $this->db->from('trv_village_master');
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
        return $this->db->get()->result();	
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
      $this->db->where('id',$district);
      $this->db->where('status', 1 );
      $this->db->from("trv_district_master");    
      return $this->db->get()->result();
   }
    
    function statecall($state) { 
      $this->db->select('id,name,district_code');
      $this->db->where('state_code', $state);
      $this->db->where('status', 1);
      $this->db->from("trv_district_master");    
      return $this->db->get()->result();
    }
    
    function blockcall($district) { 
      $this->db->select('id,name');
      $this->db->where('district_id', $district);
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