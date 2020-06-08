<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    function mobileNumberExists( $mobilenumber ) {
        $email_count = $this->db->get_where('trv_user_auth', array('username' => $mobilenumber))->num_rows();
		return $email_count;
    }
    
    
    function getuser( $user_id ) {
        return $this->db->get_where('trv_user_auth', array('id' => $user_id))->row();
    }
    
    
    function checkpassword( $password ) {
        $passwordcount = $this->db->get_where('trv_user_auth', array('password' => $password))->num_rows();
		return $passwordcount;
    }
    
    
    function changepassword() {
        $user_pwd = array(	
            'password' => $this->input->post('password')
        );
		         
        return $this->db->update('trv_user_auth', $user_pwd, array('user_id' => $this->input->post('user_id')));
    }
            
    
    function check_customer_detail() {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        
        $customerdata = $this->customer_data( $username );

        if( $customerdata->email == $username && $customerdata->password == md5($password) && $customerdata->status == 1 ) {
            return true;
        } else {
            return false;
        }
        
    }
    
    
    function customer_data( $username ) {
        return $this->db->get_where('login', array('email' => $username))->row();
    }
    
    
    function checklogin() {
        $popi_details = array(	
            'pin_code'                  => $this->input->post('pin_code'),
            'state'                     => $this->input->post('state'),
            'district'                  => $this->input->post('district'),
            'block'                     => $this->input->post('block'),
            'status'                    => $this->input->post('status')
        );
		         
        return $this->db->update('logn', $popi_details);
    }
    
    /** 08/11/2018 **/
    function getVillageByPostcode( $pincode ) {
        $this->db->select('trv_pincode_master.id, trv_pincode_master.state_code, trv_pincode_master.district_code, trv_pincode_master.pincode, trv_pincode_master.taluk_code,status');
        $this->db->where(array('pincode' => $pincode, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_pincode_master');        
        return $this->db->get()->result();
    }
    
    
   function getVillageByPanchayatcode( $panchayat_id ) {
     $this->db->select('trv_village_master.id, trv_village_master.panchayat_code, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
     $this->db->where(array('panchayat_code' => $panchayat_id, 'status' => '1') );
     $this->db->order_by("name", "asc");
     $this->db->from('trv_village_master');
     return $this->db->get()->result();
   }
   function getVillageById( $panchayat_id, $village_id ) {
     $this->db->select('trv_village_master.id, trv_village_master.panchayat_code, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
     $this->db->where(array('id' => $village_id, 'panchayat_code' => $panchayat_id, 'status' => '1') );
     $this->db->order_by("name", "asc");
     $this->db->from('trv_village_master');
     return $this->db->get()->row();
   }
   function getPanchayatByBlockcode( $block_code ) {
     $this->db->select('id, panchayat_code, name, status');
     $this->db->where(array('block_code' => $block_code, 'status' => '1') );
     $this->db->order_by("name", "asc");
     $this->db->from('trv_panchayat_master');
     return $this->db->get()->result();
   }
   function getPanchayatBycode( $block_code,$panchayath_code ) {
     $this->db->select('id, panchayat_code, name, status');
     $this->db->where(array('block_code' => $block_code,'panchayat_code' => $panchayath_code, 'status' => '1') );
     $this->db->order_by("name", "asc");
     $this->db->from('trv_panchayat_master');
     return $this->db->get()->row();
   }
    /*function getPanjayatByVillage( $panchayat_id ) {
        $this->db->select('trv_panchayat_master.id, trv_panchayat_master.taluk_id, trv_panchayat_master.name');
        $this->db->where(array('id' => $panchayat_id, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_panchayat_master');
        return $this->db->get()->result();
    }*/ 
    
    function getPanjayat( $panchayat_ids ) {
        $this->db->select('trv_panchayat_master.id, trv_panchayat_master.taluk_id, trv_panchayat_master.name');
        $this->db->where( array('status' => '1') );  
        $this->db->where_in('trv_panchayat_master.id', $panchayat_ids);
        $this->db->group_by('trv_panchayat_master.id'); 
        $this->db->order_by("id", "desc");
        $this->db->from('trv_panchayat_master');
        return $this->db->get()->result();
    }    
    
    
    /*function getTalukByPanjayat( $taluk_id ) {
        $this->db->select('trv_taluk_master.id, trv_taluk_master.district_id, trv_taluk_master.block_id, trv_taluk_master.name');
        $this->db->where( array('id' => $taluk_id, 'status' => '1') );        
        $this->db->order_by("id", "desc");
        $this->db->from('trv_taluk_master');
        return $this->db->get()->result();
    }*/
    
    function getTaluk( $taluk_ids ) {
        $this->db->select('trv_taluk_master.id, trv_taluk_master.district_id, trv_taluk_master.block_id, trv_taluk_master.name');
        $this->db->where( array('status' => '1') );  
        $this->db->where_in('trv_taluk_master.id', $taluk_ids);
        $this->db->order_by("trv_taluk_master.id", "desc");
        $this->db->from('trv_taluk_master');
        return $this->db->get()->result();
    }
    
    
    /*function getBlockByTaluk( $block_id ) {
        $this->db->select('trv_block_master.id, trv_block_master.district_id, trv_block_master.name');
        $this->db->where(array('id' => $block_id, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_block_master');
        return $this->db->get()->result();
    }*/
    
    function getBlock( $block_ids ) {
        $this->db->select('trv_block_master.id, trv_block_master.district_id, trv_block_master.name');
        $this->db->where( array('status' => '1') );
        $this->db->where_in('trv_block_master.id', $block_ids);
        $this->db->order_by("trv_block_master.id", "desc");
        $this->db->from('trv_block_master');
        return $this->db->get()->result();
    }
    
    
    function getCityByBlock( $citycode ) {
        $this->db->select('trv_district_master.id, trv_district_master.state_id, trv_district_master.name');
        $this->db->where(array('id' => $citycode, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_district_master');
        return $this->db->get()->result();
    }
    
    
    function getStateByCity( $state_id ) {
        $this->db->select('trv_state_master.id, trv_state_master.name');
        $this->db->where(array('id' => $state_id, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_state_master');
        return $this->db->get()->result();
    }
    
	function getDistrictByCode( $distcode ) {
      $this->db->select('district_code as id, district_code, state_code, name');
      $this->db->where(array('district_code' => $distcode, 'status' => '1') );
      $this->db->order_by("id", "desc");
      $this->db->from('trv_district_master');
      return $this->db->get()->result();
	}
	
	function getStateByCode( $state_code ) {
      $this->db->select('state_code as id, state_code, name');
      $this->db->where(array('state_code' => $state_code, 'status' => '1') );
      $this->db->order_by("id", "desc");
      $this->db->from('trv_state_master');
      return $this->db->get()->result();
	}
	
	function getTalukByCode( $taluk_ids ) {
        $this->db->select('taluk_code as id, taluk_code, district_code, state_code, name');
        $this->db->where( array('status' => '1') );  
        $this->db->where_in('taluk_code', $taluk_ids);
        $this->db->order_by("id", "desc");
        $this->db->from('trv_taluk_master');
        return $this->db->get()->result();
	}
	
	function getBlockByDistCode( $district_code ) {
      $this->db->select('block_code as id, block_code, district_code, name');
      $this->db->where( array('status' => '1') );
      $this->db->where('district_code', $district_code);
      $this->db->order_by("name", "asc");
      $this->db->from('trv_block_master');
      return $this->db->get()->result();
   }

   function getTalukByDistCode( $district_code ) {
      $this->db->select('taluk_code as id, taluk_code, district_code, name');
      $this->db->where( array('status' => '1') );
      $this->db->where('district_code', $district_code);
      $this->db->order_by("name", "asc");
      $this->db->from('trv_taluk_master');
      return $this->db->get()->result();
   }
    
	function getTalukByPinCode( $pincode ) {
     $this->db->select('trv_taluk_master.taluk_code as id, trv_taluk_master.taluk_code, trv_taluk_master.name');
     $this->db->where( array('trv_taluk_master.status' => '1') );
     $this->db->where('trv_pincode_master.pincode', $pincode);
     $this->db->order_by("name", "asc");
     $this->db->from('trv_pincode_master');
     $this->db->join('trv_taluk_master', 'trv_pincode_master.taluk_code = trv_taluk_master.taluk_code', 'inner');
     return $this->db->get()->result();
	}
	
	function getModuleByCode($module_code) {
        $this->db->select('trv_access_module.module_name, trv_access_module.item, trv_access_module.module_code	, trv_access_module.module_type, trv_access_module.module_url');
        $this->db->where(array('trv_access_module.module_code' => strtoupper($module_code), 'trv_access_module.status' => 1) );
        $this->db->from('trv_access_module');        
        return $this->db->get()->row();
    }
}

?>