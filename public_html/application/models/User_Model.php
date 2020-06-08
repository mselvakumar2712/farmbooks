<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

//add user starts//
	function mobileNumberExists( $mobilenumber ) {
        $email_count = $this->db->get_where('trv_staff_member', array('username' => $mobilenumber))->num_rows();
		return $email_count;
    }
	
	function userByID($id) {    
		$this->db->select('trv_staff_member.*, trv_fpo.producer_organisation_name As fpo_name, trv_access_profile.profile_name');
        $this->db->where(array('trv_staff_member.id' => $id));
        $this->db->from('trv_staff_member');
		$this->db->join('trv_fpo', 'trv_fpo.user_id = trv_staff_member.fpo_id');
        $this->db->join('trv_access_profile', 'trv_access_profile.id = trv_staff_member.profile_type');
        return $this->db->get()->row_array();	
	}
		
   function userlist() {  
      $this->db->select('trv_staff_member.*, trv_access_profile.profile_name');
      $this->db->where(array('trv_staff_member.fpo_id' => $this->session->userdata('user_id')));
      $this->db->order_by("trv_staff_member.id", "desc");
      $this->db->from('trv_staff_member');
      $this->db->join('trv_access_profile', 'trv_access_profile.id = trv_staff_member.profile_type');
      return $this->db->get()->result();	
   } 
	
	function adduser() {   
	    $last_inserted_user_id = $this->session->userdata('user_id');   
        $add_user_details = array(	
			'profile_type'          => $this->input->post('profile_type'),
			'fpo_id'                => $this->session->userdata('user_id'),
			'staff_name'            => $this->input->post('staff_name'),
			'username'              => $this->input->post('username'),
			'password'              => $this->input->post('password'),
			'status'                => 1,
            'created_by'        => $last_inserted_user_id,
            'created_on'        => date('Y-m-d H:i:s'),
            	
        );	
        return $this->db->insert('trv_staff_member', $add_user_details);	
	} 

	function updateuser($id) {
		$last_inserted_user_id = $this->session->userdata('user_id');
         $update_user_details = array(	
			'profile_type'          => $this->input->post('profile_type'),
			'staff_name'            => $this->input->post('staff_name'),
			'username'              => $this->input->post('username'),
			'password'              => $this->input->post('password'),
		    'status'                => $this->input->post('status'),
            'updated_on'            => date('Y-m-d H:i:s'),
            'updated_by'            => $last_inserted_user_id            
        );
		return $this->db->update('trv_staff_member', $update_user_details, array('id' => $id));
	}
	
    function delete_user($userid) {
        $manufactureid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_staff_member', $manufactureid, array('id' => $userid));
	}
	
    function getRoleNameList(){
        $this->db->select('trv_access_profile.id, trv_access_profile.profile_name');
        $this->db->where(array('trv_access_profile.status' => 1));
		$this->db->where_in('trv_access_profile.created_by', [1, $this->session->userdata('user_id')]);
        $this->db->order_by("trv_access_profile.id", "ASC");
        $this->db->from('trv_access_profile');
        return $this->db->get()->result();	
    }
	//user ends//
    
}

?>