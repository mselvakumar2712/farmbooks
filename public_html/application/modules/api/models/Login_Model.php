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
    
    function login_validation($post_data) {
		$this->db->select('trv_user_auth.user_id,trv_farmer.id as farmer_id,trv_user_auth.username as login_id,trv_user_auth.status as is_active, "baad45ba30d1e556f99290c52e549fa636a7efdc" as user_key');
		$this->db->from('trv_user_auth');
		$this->db->join('trv_farmer', 'trv_farmer.mobile = trv_user_auth.username', 'inner');
		$this->db->where(array('trv_user_auth.username' => $post_data['mobile_no'],'trv_user_auth.password' => $post_data['password'], 'trv_user_auth.status' => '1', 'trv_user_auth.user_type' => '6'));
        return $this->db->get()->result();
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
    
    
    /*function getLocationInformation( $pincode ) {
        $this->db->select('trv_village_master.*, trv_panchayat_master.*, trv_taluk_master.*, trv_block_master.*, trv_district_master.*, trv_state_master.*');
        $this->db->from('trv_village_master');
        $this->db->join('trv_panchayat_master', 'trv_village_master.panchayat_id = trv_panchayat_master.id', 'inner');
        $this->db->join('trv_taluk_master', 'trv_panchayat_master.taluk_id = trv_taluk_master.id', 'inner');
        $this->db->join('trv_block_master', 'trv_taluk_master.block_id = trv_block_master.id', 'inner');
        $this->db->join('trv_district_master', 'trv_block_master.district_id = trv_district_master.id', 'inner');
        $this->db->join('trv_state_master', 'trv_district_master.state_id = trv_state_master.id', 'inner');
        $this->db->where(array('pincode' => $pincode) );
        return $this->db->get()->result();	
    }
    
    
    function getLocation( $pincode ) {
		return $this->db->get_where('trv_postcode_master', array('pincode' => $pincode))->row();
	}
        
   function getpanchayats( $pincode ) {
      $this->db->select('id, office_name');
		$query = $this->db->get_where('trv_postcode_master', array('pincode' => $pincode));
      return $query->result();
	}*/
 
   function panchayat_list() {
        $this->db->select('trv_postcode_master.id, trv_postcode_master.pincode, trv_postcode_master.division_name');
        //$this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_postcode_master');
        return $this->db->get()->result();	
    }
    
    
    function village_list() {
        $this->db->select('trv_postcode_master.id, trv_postcode_master.pincode, trv_postcode_master.office_name');
        //$this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_postcode_master');
        return $this->db->get()->result();	
    }
    
    
    function block_list() {
        $this->db->select('trv_postcode_master.id, trv_postcode_master.pincode, trv_postcode_master.region_name');
        //$this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_postcode_master');
        return $this->db->get()->result();	
    }
    
    
    function getlocationbypincode( $pincode ) {
        $this->db->select('state_code, district_code, taluk_code');
        $this->db->where(array('pincode' => $pincode, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_pincode_master');
        return $this->db->get()->result();
    }
    
    /** 08/11/2018 **/
    function getVillageByPostcode( $pincode ) {
        $this->db->select('trv_village_master.id, trv_village_master.panchayat_id, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
        $this->db->where(array('pincode' => $pincode, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_village_master');
        return $this->db->get()->result();
    }
    
    
    function getVillageByPanchayatcode( $panchayat_id ) {
        $this->db->select('trv_village_master.id, trv_village_master.panchayat_code, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
        $this->db->where(array('panchayat_code' => $panchayat_id, 'status' => '1') );
        $this->db->order_by("id", "desc");
        $this->db->from('trv_village_master');
        return $this->db->get()->result();
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
    
	function getblockbydistrict( $district_code ) {
        $this->db->select('trv_block_master.block_code, trv_block_master.district_code, trv_block_master.name');
        $this->db->where( array('status' => '1') );
        $this->db->where_in('trv_block_master.district_code', $district_code);
        $this->db->order_by("trv_block_master.block_code", "desc");
        $this->db->from('trv_block_master');
        return $this->db->get()->result();
    }
    
    
    function getCityByBlock( $citycode ) {
        $this->db->select('trv_district_master.district_code, trv_district_master.state_code, trv_district_master.name');
        $this->db->where(array('district_code' => $citycode, 'status' => '1') );
        $this->db->order_by("district_code", "desc");
        $this->db->from('trv_district_master');
        return $this->db->get()->result();
    }
    
    
    function getStateByCity( $state_id ) {
        $this->db->select('trv_state_master.state_code, trv_state_master.name');
        $this->db->where(array('state_code' => $state_id, 'status' => '1') );
        $this->db->order_by("state_code", "desc");
        $this->db->from('trv_state_master');
        return $this->db->get()->result();
    }
	
	function getPanchayatByBlockcode( $block_code ) {
     $this->db->select('id, panchayat_code, name, status');
     $this->db->where(array('block_code' => $block_code, 'status' => '1') );
     $this->db->order_by("name", "asc");
     $this->db->from('trv_panchayat_master');
     return $this->db->get()->result();
    }
    
    function updatedeviceinfo($post_data) {
        $updatedeviceinfo = array(	
            'device_id' => $post_data['device_id'],
            'token_key' => $post_data['token_key']
        );
        return $this->db->update('trv_user_auth', $updatedeviceinfo, array('username' => $post_data['mobile_no']));
    }
}

?>