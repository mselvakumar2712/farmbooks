<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Fpg_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
  
/** FPG Starts **/
   function fpgList() {
      $this->db->select('trv_fpg.*, trv_village_master.name AS village_name, trv_panchayat_master.name AS panchayat_name, trv_block_master.name AS block_name, trv_fpo.producer_organisation_name, trv_fpo.popi_id');
      $this->db->where(array('trv_fpg.status' => '1'));
      //$this->db->select('trv_fpg.*');
      $this->db->order_by("trv_fpg.id", "desc");
      $this->db->from('trv_fpg');
      $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpg.VillageID');
      $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpg.Gram_PanchayatID');
      $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpg.block');
      $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_fpg.fpo_id', 'inner');
      $this->db->where(array('trv_fpg.fpo_id' => $this->session->userdata('user_id')));
      if($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2) {
         $this->db->join('trv_popi', 'trv_popi.user_id = trv_fpo.popi_id', 'inner');
      }
      return $this->db->get()->result();	
   }
    
   function addfpg() {
      $fpo_id = $this->session->userdata('user_id');
      $rest = substr($this->session->userdata('user_id'),1);
      $total_fields = $this->Fpg_Model->get_fpg_last_id();
      if(empty($total_fields)){
         $total_fields = array();
         $total_fields[0]['id'] = 0;
      }
      $created_fig_user_id = '5'.$rest.str_pad(($total_fields[0]['id']+1), 3,'0', STR_PAD_LEFT);
        $fpg_details = array(
            'fpo_id'            =>  $this->session->userdata('user_id'),
            'user_id'           => $created_fig_user_id,
	        'PIN_Code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'Gram_PanchayatID'  => $this->input->post('gram_panchayat'),
            'VillageID'         => $this->input->post('village'),
			'taluk'         => $this->input->post('taluk'),
            'FPG_Name'          => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );		         
        return $this->db->insert('trv_fpg', $fpg_details);
    }
    
    
    /* function fpgByID( $fpg_id ) {
        $this->db->where(array('id' => $fpg_id));
        $this->db->from('trv_fpg');
        return $this->db->get()->row_array();	
    } */
	
	 function fpgByID( $fpg_id ) {
		 
        $this->db->select('trv_fpg.*, trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name, trv_district_master.name As district_name,trv_state_master.name As state_name,trv_taluk_master.name As taluk_name');        
		$this->db->from('trv_fpg');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpg.state');       
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpg.district');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_fpg.VillageID');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpg.Gram_PanchayatID');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpg.taluk');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpg.block');
		$this->db->where(array('trv_fpg.id' => $fpg_id));
		return $this->db->get()->row();	
   }
    
    
    function updatefpg( $fpg_id ) {
        $fpg_details = array(	
//            'fpo_id'            => $this->input->post('fpo_name'),
	        'PIN_Code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'Gram_PanchayatID'  => $this->input->post('gram_panchayat'),
            'VillageID'         => $this->input->post('village'),
			'taluk'         	=> $this->input->post('taluk'),
            'FPG_Name'          => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );	
		return $this->db->update('trv_fpg', $fpg_details, array('id' => $fpg_id));
    }
    
    
    function deletefpg( $fpg_id ) {
        $fpgid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_fpg', $fpgid, array('id' => $fpg_id));
	}
    
    
    function fpgByUserID($user_id) {
        $this->db->select('trv_fpg.*, trv_fpo.producer_organisation_name As fpo_name, trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, , trv_district_master.name As district_name, , trv_state_master.name As state_name');        
        $this->db->from('trv_fpg');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpg.VillageID');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.id = trv_fpg.Gram_PanchayatID');
//        $this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_popi.taluk');
        $this->db->join('trv_block_master', 'trv_block_master.id = trv_fpg.block');
        $this->db->join('trv_district_master', 'trv_district_master.id = trv_fpg.district');
        $this->db->join('trv_state_master', 'trv_state_master.id = trv_fpg.state');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_fpg.fpo_id');
        $this->db->where(array('trv_fpg.user_id' => $user_id, 'trv_fpg.status' => '1'));
        return $this->db->get()->result();
    }
    
    
    function profile_update($fpg_id) {
       return $this->db->update('trv_fpg', $fpo_details, array('id' => $fpg_id));
    }

/** FPG End **/  
    function fpoDropdownList() {
        $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name');
        $this->db->from('trv_fpo');
		$this->db->distinct();
        $this->db->where(array('trv_fpo.status' => '1'));
        return $this->db->get()->result();
    }
    
     function get_fpg_last_id() {
        $query ="select * from trv_fpg order by id DESC limit 1";
        $res = $this->db->query($query);

      if($res->num_rows() > 0) {
            return $res->result("array");
      }
      return array();
    }
    
}

?>