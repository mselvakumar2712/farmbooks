<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpo_Model extends CI_Model {
   function __construct() {
      parent::__construct();
      $this->load->database();
   }

   /** FPO Detail **/
   function fpoByUserID($user_id) {
      $this->db->select('trv_fpo.user_id as fpo_id,producer_organisation_name as fpo_name,trv_fpo.pin_code,trv_fpo.state,trv_fpo.district,trv_fpo.block,trv_fpo.taluk_id as taluk, trv_fpo.panchayat, trv_fpo.village, trv_fpo.street, trv_fpo.std_code, trv_fpo.land_line, trv_fpo.mobile, trv_fpo.email, trv_fpo.date_formation, trv_fpo.popi_id, trv_popi.institution_name As popi_name, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_district_master.name As district_name, trv_state_master.name As state_name');        
      //$this->db->select('trv_fpo.*');
      $this->db->from('trv_fpo');
      $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo.village','left');
      $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpo.panchayat');
      $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpo.taluk_id');
      $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpo.block');
      $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpo.district');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo.state');		
      $this->db->join('trv_popi', 'trv_popi.user_id = trv_fpo.popi_id');
      $this->db->where(array('trv_fpo.user_id' => $user_id, 'trv_fpo.status' => '1'));
      //echo "<pre>";print_r($this->db->get()->result());die;
      return $this->db->get()->row();
   }
   /******** Validate FPO user ********/
   function login_validation($post_data) {
		$this->db->select('trv_user_auth.user_id,trv_fpo.user_id as fpo_id,trv_user_auth.username as login_id,trv_user_auth.status as is_active');
		$this->db->from('trv_user_auth');
		$this->db->join('trv_fpo', 'trv_fpo.mobile = trv_user_auth.username', 'inner');
		$this->db->where(array('trv_user_auth.username' => $post_data['mobile_no'],'trv_user_auth.password' => $post_data['password'], 'trv_user_auth.status' => '1', 'trv_user_auth.user_type' => '3'));
      //echo "<pre>";print_r($this->db->get()->result());die;
      return $this->db->get()->row();
   }
   /********** List of Farmers ***********/
   function list_farmers($post_data) {
		$this->db->select('trv_user_auth.user_id,trv_farmer.id as farmer_id,trv_farmer.profile_name as name,trv_farmer.father_spouse_name, mobile, street, age');
		$this->db->from('trv_user_auth');
		$this->db->join('trv_farmer', 'trv_farmer.mobile = trv_user_auth.username', 'inner');
		$this->db->where(array('trv_farmer.created_by' => $post_data['fpo_id'],'trv_farmer.village' => $post_data['village'], 'trv_user_auth.status' => '1', 'trv_user_auth.user_type' => '6'));
      return $this->db->get()->result();
   }
}
