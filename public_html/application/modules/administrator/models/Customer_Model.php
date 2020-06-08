<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Customer_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

/** FPO Starts **/
   
	
    /****/
	function gl_ChartMasterList() {
		$this->db->select('trv_chart_master.*');        
		$this->db->where(array('trv_chart_master.status' => 1));
		$this->db->distinct();
        $this->db->group_by("trv_chart_master.account_code2");
        $this->db->from('trv_chart_master');
		return $this->db->get()->result();	
	}
	
    /****/
	function customer_list() {
        $this->db->select('fpo_debtors_master.debtor_no,fpo_debtors_master.name,fpo_debtors_master.pincode,fpo_debtors_master.address,fpo_debtors_master.status,trv_district_master.name As district_name,trv_state_master.name As state_name');
        //$this->db->order_by("fpo_debtors_master.debtor_no", "desc");
        $this->db->from('fpo_debtors_master');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_debtors_master.state');       
		$this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_debtors_master.district');
		$this->db->where(array('fpo_debtors_master.status' => '1' ));
        $this->db->order_by("fpo_debtors_master.debtor_no", "desc");
        return $this->db->get()->result();
	} 
    
	
    /****/
	function customerByID($customer) { 
		  $fpoid=$this->session->userdata('user_id');
          $this->db->select('fd.* ,trv_chart_master.account_name AS account_name, trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
		  $this->db->join('trv_state_master', 'trv_state_master.state_code = fd.state'); 
		  $this->db->join('trv_district_master', 'trv_district_master.district_code = fd.district');
		  $this->db->join('trv_village_master', 'trv_village_master.id = fd.village','left');
		  $this->db->join('trv_chart_master', 'trv_chart_master.account_code2 = fd.gl_group','left');
		  $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fd.panchayat','left');
		  $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fd.taluk_id','left');
		  $this->db->join('trv_block_master', 'trv_block_master.block_code = fd.block','left'); 
		  //$this->db->join('fpo_cust_branch', 'fpo_cust_branch.debtor_no = fd.debtor_no');
		  $this->db->from('fpo_debtors_master AS fd');
		  //$this->db->where(array( 'fd.debtor_no = fb.debtor_no'));
		  $this->db->where(array('fd.debtor_no'=>$customer));
        //$this->db->order_by("fpo_debtors_master.debtor_no", "desc");
       // $this->db->from('fpo_debtors_master');
            return $query= $this->db->get()->result();	
		  // print_r($query);
	} 
    
	
    /****/
    function getAllCreditStatus() {  
        $this->db->select('fpo_credit_status.*');
		$this->db->where(array('fpo_credit_status.status' => 1,'fpo_credit_status.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("fpo_credit_status.id", "desc");
        $this->db->from('fpo_credit_status');
        return $this->db->get()->result();	
	}
    /****/
    function getAllPaymentTerms() {  
        $this->db->select('fpo_payment_terms.terms_indicator, fpo_payment_terms.terms');
		$this->db->where(array('fpo_payment_terms.status' => 1));
        $this->db->order_by("fpo_payment_terms.terms_indicator", "desc");
        $this->db->from('fpo_payment_terms');
        return $this->db->get()->result();	
	}
    
    function getAllTaxGroup() {  
        $this->db->select('fpo_tax_groups.id, fpo_tax_groups.name');
        $this->db->from('fpo_tax_groups');
        return $this->db->get()->result();	
	}
	
}

?>