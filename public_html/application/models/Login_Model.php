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
      $this->db->select('trv_village_master.id, trv_village_master.panchayat_id, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
      $this->db->where(array('pincode' => $pincode, 'status' => '1') );
      $this->db->order_by("id", "desc");
      $this->db->from('trv_village_master');
      return $this->db->get()->result();
   }
   function getVillageByPanchayatcode( $panchayat_id ) {
      $this->db->select('trv_village_master.id, trv_village_master.panchayat_code, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
      $this->db->where(array('panchayat_code' => $panchayat_id, 'status' => '1') );
      $this->db->order_by("name", "asc");
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
      $this->db->where( array('id' => $taluk_id, 'status' => '1') );      $this->db->order_by("id", "desc");
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
	function getTalukByPinCode( $pincode ) {
     $this->db->select('trv_taluk_master.taluk_code as id, trv_taluk_master.taluk_code, trv_taluk_master.name');
     $this->db->where( array('trv_taluk_master.status' => '1') );
     $this->db->where('trv_pincode_master.pincode', $pincode);
     $this->db->order_by("name", "asc");
     $this->db->from('trv_pincode_master');
     $this->db->join('trv_taluk_master', 'trv_pincode_master.taluk_code = trv_taluk_master.taluk_code', 'inner');
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
   function getBlockByDistCode( $district_code ) {
      $this->db->select('block_code as id, block_code, district_code, name');
      $this->db->where( array('status' => '1') );
      $this->db->where('district_code', $district_code);
      $this->db->order_by("name", "asc");
      $this->db->from('trv_block_master');
      return $this->db->get()->result();
   }
	function getPanchayatByBlockcode( $block_code ) {
     $this->db->select('id, panchayat_code, name, status');
     $this->db->where(array('block_code' => $block_code, 'status' => '1') );
     $this->db->order_by("name", "asc");
     $this->db->from('trv_panchayat_master');
     return $this->db->get()->result();
   }
    
   function searchByModule(){
     $this->db->select('trv_access_module.*');
     $this->db->order_by("id", "asc");
     $this->db->from('trv_access_module');
     $this->db->where('status',1);
     return $this->db->get()->result();
   }
 
  //dashboard functionality//  
  function figCount($fpo_id) {
      $this->db->select('trv_fig.id,trv_fig.status');
      $this->db->from('trv_fig');
      $this->db->where(array('trv_fig.fpo_id' => $fpo_id, 'trv_fig.status' => 1));
      return $this->db->get()->result();     
   }
   
  function fpgCount($fpo_id) {
      $this->db->select('trv_fpg.id,trv_fpg.status');
      $this->db->from('trv_fpg');
      $this->db->where(array('trv_fpg.fpo_id' => $fpo_id, 'trv_fpg.status' => 1));
      return $this->db->get()->result();     
   }
   function farmerCount($fpo_id) {
      $this->db->select('trv_farmer.id,trv_farmer.status');
      $this->db->from('trv_farmer');
      $this->db->where(array('trv_farmer.created_by' => $fpo_id, 'trv_farmer.status' => 1));
      return $this->db->get()->result();	
   }
    
   function salespurchase($fpo_id) {
      $this->db->select('fpo_gl_trans.type,fpo_gl_trans.fpo_id,fpo_gl_trans.tran_date');
      $this->db->where(array('fpo_gl_trans.status'=>'1','fpo_gl_trans.type' => 5, 'fpo_gl_trans.type' => 6));
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1));
      $this->db->from('fpo_gl_trans');
      $result=$this->db->get()->result_array();
      return $result; 
   }
   
   function salespurchasemonth($fpo_id) {
      $until = mktime(0, 0, 0, date('n'), 1, date('Y'));
      $from = mktime(0, 0, 0, date('n', $until)-10, 1, date('Y', $until));
      $prev_month = (int) date('n', strtotime('-10 months'));
      $this->db->select('MONTHNAME(fpo_gl_trans.tran_date) as month');
      $this->db->from('fpo_gl_trans');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1));
      $this->db->order_by("month(fpo_gl_trans.tran_date)", "ASC");
      $this->db->group_by("MONTHNAME(fpo_gl_trans.tran_date)");       
      return $this->db->get()->result();	
   } 
   
   function totalsalespurchase($fpo_id) {
      $this->db->select('fpo_gl_trans.type as total_sales');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1));
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result_array();
   }
   
   public function count_purchase($fpo_id){
      $this->db->select('SUM(fpo_gl_trans.amount) as amount, fpo_gl_trans.type,MONTHNAME(fpo_gl_trans.tran_date) as month,MONTH(fpo_gl_trans.tran_date) as month_no,YEAR(fpo_gl_trans.tran_date) as year');
      $this->db->from('fpo_gl_trans');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1,'fpo_gl_trans.type' => 5));
      $this->db->group_start();
      $this->db->like('fpo_gl_trans.account_code','40205','after')->or_like('fpo_gl_trans.account_code','30302','after');
      $this->db->group_end();
      $this->db->group_by('fpo_gl_trans.type,YEAR(fpo_gl_trans.tran_date),MONTHNAME(fpo_gl_trans.tran_date),MONTH(fpo_gl_trans.tran_date)');
      $this->db->limit(10);
      $this->db->order_by("year","desc");
      $this->db->order_by("month_no","ASC");
      return $this->db->get()->result_array();	
   }

   public function count_sales($fpo_id){
      $this->db->select('ABS(SUM(fpo_gl_trans.amount)) as amount,MONTH(fpo_gl_trans.tran_date) as month_no,MONTHNAME(fpo_gl_trans.tran_date) as month,YEAR(fpo_gl_trans.tran_date) as year');
      $this->db->from('fpo_gl_trans');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1,'fpo_gl_trans.type' => 6));
      $this->db->group_start();
      $this->db->like('fpo_gl_trans.account_code','40205','after')->or_like('fpo_gl_trans.account_code','40202','after');
      $this->db->group_end();
      $this->db->group_by('fpo_gl_trans.type,YEAR(fpo_gl_trans.tran_date),MONTH(fpo_gl_trans.tran_date),MONTHNAME(fpo_gl_trans.tran_date)');
      $this->db->limit(10);
      $this->db->order_by("year","desc");
      $this->db->order_by("month_no","ASC");
      return $this->db->get()->result_array();	
   } 
  
  function yearlySalesPurchase($fpo_id){
      $this->db->select('fpo_gl_trans.type,ABS(SUM(fpo_gl_trans.amount)) as amount');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id,'fpo_gl_trans.status'=>'1','YEAR(fpo_gl_trans.tran_date)'=>date('Y')));
      $this->db->group_start();
      $this->db->like('fpo_gl_trans.account_code','40205','after')->or_like('fpo_gl_trans.account_code','40202','after');
      $this->db->or_like('fpo_gl_trans.account_code','40205','after')->or_like('fpo_gl_trans.account_code','30302','after');
      $this->db->group_end();
      $this->db->group_by('fpo_gl_trans.type');
      $this->db->from('fpo_gl_trans');
      $result=$this->db->get()->result_array();	
      return  $result;
   }
   
  function previousyearlySalesPurchase($fpo_id){
      //$this->db->select('fpo_gl_trans.type,fpo_gl_trans.tran_date,fpo_gl_trans.fpo_id,fpo_gl_trans.amount,fpo_gl_trans.person_type_id');
      $this->db->select('fpo_gl_trans.type,ABS(SUM(fpo_gl_trans.amount)) as amount');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id,'fpo_gl_trans.status'=>'1','YEAR(fpo_gl_trans.tran_date)'=>date('Y')-1));
      $this->db->group_start();
      $this->db->like('fpo_gl_trans.account_code','40205','after')->or_like('fpo_gl_trans.account_code','40202','after');
      $this->db->or_like('fpo_gl_trans.account_code','40205','after')->or_like('fpo_gl_trans.account_code','30302','after');
      $this->db->group_end();
      $this->db->group_by('fpo_gl_trans.type');
      $this->db->from('fpo_gl_trans');
      $result=$this->db->get()->result_array();	
      return  $result;
   }
  //dashboard ends// 
  
   function supportEnquiry($fpo_id){
     $this->db->select('trv_support_category_master.*');
     $this->db->order_by("id", "asc");
     $this->db->from('trv_support_category_master');
     return $this->db->get()->result();
   }
    
   function enquiry_information() {
      $enquiry_details = array(    
         'support_name'    => $this->input->post('support_name'),      
         'comments'        => $this->input->post('comments'),
         'created_by'      => $this->session->userdata('user_id'),
         'created_at'      => date('Y-m-d H:i:s'),
         'creator_type'    => $this->session->userdata('user_type'),
         'updated_by'      => $this->session->userdata('user_id'),
         'updated_at'      => "",
         'remarks'         => "",
         'status'          => 1        );      
      return $this->db->insert('trv_support_tickets', $enquiry_details);
   }
    
     
	function verifyRegisteredMobileNumber($mobile_number){
      return $this->db->get_where('trv_user_auth', array('username' => $mobile_number))->row();
   }
}

?>