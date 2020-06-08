<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Fpo_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

/** FPO Starts **/
    function fpoList() {
        $this->db->select('trv_fpo.id,trv_fpo.user_id, trv_fpo.producer_organisation_name, trv_fpo.mobile, trv_fpo.constitution, trv_fpo.contact_person, trv_fpo.status, trv_popi.institution_name');        
        $this->db->order_by("trv_fpo.id", "desc");
        $this->db->from('trv_fpo');
        if($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2) {
            $this->db->where(array('trv_fpo.popi_id' => $this->session->userdata('user_id'), 'trv_fpo.status' => '1'));
        } else {
            $this->db->where(array('trv_fpo.status' => '1'));
        }
        $this->db->join('trv_popi', 'trv_popi.user_id = trv_fpo.popi_id', 'inner');
        return $this->db->get()->result();	
    }
    
    
      function addfpo() {
          $total_fields = $this->Fpo_Model->get_fpo_last_id();
          $total_field = 0;
          if(!empty($total_fields)){
            $total_field = $total_fields[0]['id'];
          }
          $created_fpo_user_id = '3'.$this->input->post('state').str_pad($this->input->post('popi_name'), 3, '0', STR_PAD_LEFT).str_pad(($total_field+1), 2, '0', STR_PAD_LEFT);
        
        $fpo_details = array(  
            //start//
			'popi_id'                       => $this->session->userdata('user_id'),
			//end//
            'user_id'                       => $created_fpo_user_id,
            'producer_organisation_name'    => $this->input->post('producer_organisation_name'),
            'pin_code'                      => $this->input->post('pin_code'),
            'state'                         => $this->input->post('state'),
            'district'                      => $this->input->post('district'),
            'block'                         => $this->input->post('block'),
            'panchayat'                     => $this->input->post('gram_panchayat'),
            'village'                       => $this->input->post('village'),
			'taluk_id'                      => $this->input->post('taluk_id'),
            'street'                        => $this->input->post('street'),
            'door_no'                       => $this->input->post('door_no'),
            'std_code'                      => $this->input->post('std_code'),
            'land_line'                     => $this->input->post('land_line'),
            'mobile'                        => $this->input->post('mobile_num'),
            'email'                         => $this->input->post('email'),
            'constitution'                  => $this->input->post('constitution'),
            'date_formation'                => $this->input->post('date_formation'),
            'reg_no'                        => $this->input->post('reg_no'),
            'pan'                           => $this->input->post('pan'),
            'tax_deduction'                 => $this->input->post('tax_deduction'),
            'gst'                           => $this->input->post('gst'),
            'ie_code'                       => $this->input->post('ie_code'),
            'contact_person'                => $this->input->post('contact_person_name'),
            'business_type'                 => implode(',', $this->input->post('business_type')),
            'business_nature'               => implode(',', $this->input->post('business_nature')),
            'inventory_required'            => $this->input->post('inventory_required'),
            'financial_year'                => $this->input->post('financial_year'),
			'financial_year_to'             => $this->input->post('financial_year_to'),
            'business_commence'             => $this->input->post('business_commence'),
            'status'                        => 1
        );        
        $this->db->insert('trv_fpo', $fpo_details);
        $last_inserted_fpo_id = $this->db->insert_id();        
        
        $user_details = array(  
            'user_type'         => 3,
            'user_id'           => $created_fpo_user_id,
            'username'          => $this->input->post('mobile_num'),
            'password'          => "123456",
            'status'            => 1,
            'is_verified'       => 1,
            'created_by'        => $last_inserted_fpo_id,
            'created_on'        => date('Y-m-d H:i:s'),
            'updated_by'        => $last_inserted_fpo_id,
            'updated_on'        => date('Y-m-d H:i:s')
        );
        return $this->db->insert('trv_user_auth', $user_details);
    }
    
    
    function fpoByID($fpo_id) {
        $this->db->select('trv_fpo.*, trv_popi.institution_name As popi_name, trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, , trv_district_master.name As district_name, , trv_state_master.name As state_name');        
   		$this->db->from('trv_fpo');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo.state');       
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpo.district');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo.village');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpo.panchayat');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpo.taluk_id');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpo.block');
		$this->db->where(array('trv_fpo.id' => $fpo_id));		
		$this->db->join('trv_popi', 'trv_popi.user_id = trv_fpo.popi_id');
		return $this->db->get()->row_array();		
    }
    
    
    function updatefpo($fpo_id) {
        $fpo_details = array(
//          'popi_id'                       => $this->session->userdata('logger_id'),
			'popi_id'                       => $this->session->userdata('user_id'),
	        'producer_organisation_name'    => $this->input->post('producer_organisation_name'),
            'pin_code'                      => $this->input->post('pin_code'),
            'state'                         => $this->input->post('state'),
            'district'                      => $this->input->post('district'),
            'block'                         => $this->input->post('block'),
            'panchayat'                     => $this->input->post('gram_panchayat'),
            'village'                       => $this->input->post('village'),
			'taluk_id'                      => $this->input->post('taluk_id'),
            'street'                        => $this->input->post('street'),
            'door_no'                       => $this->input->post('door_no'),
            'std_code'                      => $this->input->post('std_code'),
            'land_line'                     => $this->input->post('land_line'),
            'mobile'                        => $this->input->post('mobile'),
            'email'                         => $this->input->post('email'),
            'constitution'                  => $this->input->post('constitution'),
            'date_formation'                => $this->input->post('date_formation'),
            'reg_no'                        => $this->input->post('reg_no'),
            'pan'                           => $this->input->post('pan'),
            'tax_deduction'                 => $this->input->post('tax_deduction'),
            'gst'                           => $this->input->post('gst'),
            'ie_code'                       => $this->input->post('ie_code'),
            'contact_person'                => $this->input->post('contact_person'),
            'business_type'                 => implode(',', $this->input->post('business_type')),
            'business_nature'               => implode(',', $this->input->post('business_nature')),
            'inventory_required'            => $this->input->post('inventory_required'),
            'financial_year'                => $this->input->post('financial_year'),
			'financial_year_to'             => $this->input->post('financial_year_to'),
            'business_commence'             => $this->input->post('business_commence')
        );		         
		return $this->db->update('trv_fpo', $fpo_details, array('id' => $fpo_id));
    }
    
    
    function deletefpo( $fpo_id ) {
        $fpoid = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_fpo', $fpoid, array('id' => $fpo_id));
	}
    
    
    
    function fpoByUserID($user_id) {
        $this->db->select('trv_fpo.*, trv_popi.institution_name As popi_name, trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, , trv_district_master.name As district_name, , trv_state_master.name As state_name');        
        $this->db->from('trv_fpo');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo.village');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.id = trv_fpo.panchayat');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_fpo.taluk_id');
        $this->db->join('trv_block_master', 'trv_block_master.id = trv_fpo.block');
        $this->db->join('trv_district_master', 'trv_district_master.id = trv_fpo.district');
        $this->db->join('trv_state_master', 'trv_state_master.id = trv_fpo.state');
        $this->db->join('trv_popi', 'trv_popi.id = trv_fpo.popi_id');
        $this->db->where(array('trv_fpo.user_id' => $user_id, 'trv_fpo.status' => '1'));
        return $this->db->get()->result();
    }
    
    function profile_update() {
        $fpo_details = array(    
            'std_code'                  => $this->input->post('std_code'),
      
            'land_line'                 => $this->input->post('land_line'),

            'mobile'                    => $this->input->post('mobile'),

            'email'                     => $this->input->post('email')
        );
        return $this->db->update('trv_fpo', $fpo_details, array('id' => $this->input->post('fpo_id')));
    }
/** FPO End **/   
    //Get last row
  function get_fpo_last_id() {
    $query ="select * from trv_fpo order by id DESC limit 1";
        $res = $this->db->query($query);

      if($res->num_rows() > 0) {
            return $res->result("array");
      }
      return array();
    }  
    
	function businessDropdownList() {
        $this->db->select('trv_business_nature_master.id, trv_business_nature_master.name, trv_business_nature_master.business_type');
        $this->db->from('trv_business_nature_master');
		$this->db->where(array('trv_business_nature_master.status' => '1'));
        $this->db->order_by("business_type", "desc");
        return $this->db->get()->result();
    }
	
	function business($business_type) 
	{ 
	    $this->db->select('trv_business_nature_master.id, trv_business_nature_master.name, trv_business_nature_master.business_type');
        $this->db->from('trv_business_nature_master');
		$this->db->where(array('trv_business_nature_master.status' => 1));
		$this->db->where_in('trv_business_nature_master.business_type',explode(',', $business_type)); 
        $this->db->order_by("trv_business_nature_master.id", "desc");
        return $this->db->get()->result();
   }
	
	function business_nature_list() {  
        $this->db->select('trv_business_nature_master.*');
        $this->db->where(array('trv_business_nature_master.status' => '1'));
        $this->db->order_by("trv_business_nature_master.id", "desc");
        $this->db->from('trv_business_nature_master');
        return $this->db->get()->result();	
	}
	
    
    function verifyFIGChildByFPO( $fpo_id ) {
        $fpo_count = $this->db->get_where('trv_fig', array('fpo_id' => $fpo_id))->num_rows();
		return $fpo_count;
    }
    function verifyFPGChildByFPO( $fpo_id ) {
        $fpo_count = $this->db->get_where('trv_fpg', array('fpo_id' => $fpo_id))->num_rows();
		return $fpo_count;
    }
    
    
    /** 13/01/2019 **/
    function getStateList() {
        $this->db->select('trv_state_master.state_code,trv_state_master.name');        
        $this->db->where(array('trv_state_master.status' => 1));
        $this->db->from('trv_state_master');
        return $this->db->get()->result();  
    }
    
    function getDistrictByState($state_code) {
        $this->db->select('trv_district_master.district_code,trv_district_master.name');        
        $this->db->where(array('trv_district_master.state_code' => $state_code, 'trv_district_master.status' => 1));
        $this->db->from('trv_district_master');
        return $this->db->get()->result();  
    }
    
    function getBlocksByDistrict($district_code) {
        $this->db->select('trv_block_master.block_code,trv_block_master.name');        
        $this->db->where(array('trv_block_master.district_code' => $district_code, 'trv_block_master.status' => 1));
        $this->db->from('trv_block_master');
        return $this->db->get()->result();  
    }
    
//    function getBlockByFPO() {
//        $this->db->select('trv_fpo.id, trv_fpo.state, trv_fpo.district, trv_fpo.block, trv_fpo.panchayat, trv_fpo.village');        
//        $this->db->where(array('trv_fpo.id' => $this->session->userdata('logger_id'), 'trv_fpo.status' => 1));
//        $this->db->from('trv_fpo');
//        return $this->db->get()->result();  
//    }
    
}

?>