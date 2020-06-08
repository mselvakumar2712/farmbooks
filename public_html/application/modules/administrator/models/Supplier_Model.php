<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Supplier_Model extends CI_Model {
   function __construct() {
      parent::__construct();
      $this->load->database();
   }
    
	 //supplier start//
    function supplier_list() {
        $this->db->select('fpo_suppliers.supplier_id,fpo_suppliers.supp_name,fpo_suppliers.mailing_pincode,fpo_suppliers.mailing_state,fpo_suppliers.mailing_district,fpo_suppliers.mailing_street,fpo_suppliers.status,trv_district_master.name As district_name,trv_state_master.name As state_name');
		$this->db->from('fpo_suppliers');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_suppliers.mailing_state');       
		$this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_suppliers.mailing_district');
        $this->db->order_by("fpo_suppliers.supplier_id", "desc");
		$this->db->where(array('fpo_suppliers.status' => '1'));
        return $this->db->get()->result();	
	} 
	function supplier_detail($supplier_id) {
        $this->db->select('fpo_suppliers.supplier_id,fpo_suppliers.gl_group_id,fpo_suppliers.gl_acc_name,fpo_suppliers.gl_acc_status,fpo_suppliers.physical_contact_person,fpo_suppliers.physical_mobile_no,fpo_suppliers.physical_std_code,fpo_suppliers.physical_email_id,fpo_suppliers.bank_detail,fpo_suppliers.credit_period,fpo_suppliers.maintain_bill,fpo_suppliers.transaction_type,fpo_suppliers.opening_balance,fpo_suppliers.bank_name,fpo_suppliers.ifsc_code,fpo_suppliers.pan_no,fpo_suppliers.regist_type,fpo_suppliers.supp_place,fpo_suppliers.physical_phone_no,fpo_suppliers.supp_name,fpo_suppliers.supp_ref,fpo_suppliers.address,fpo_suppliers.mailing_pincode,fpo_suppliers.mailing_state,fpo_suppliers.mailing_contact_person,fpo_suppliers.mailing_mobile_no,fpo_suppliers.mailing_std_code,fpo_suppliers.mailing_phone_no,fpo_suppliers.mailing_email_id,fpo_suppliers.mailing_district,fpo_suppliers.mailing_block,fpo_suppliers.mailing_taluk_id,fpo_suppliers.mailing_panchayat,fpo_suppliers.mailing_village,fpo_suppliers.mailing_street,fpo_suppliers.physical_pincode,fpo_suppliers.physical_state,fpo_suppliers.physical_district,fpo_suppliers.physical_block,fpo_suppliers.physical_taluk_id,fpo_suppliers.physical_panchayat,fpo_suppliers.physical_village,fpo_suppliers.physical_street,fpo_suppliers.same_address,fpo_suppliers.supp_address,fpo_suppliers.gst_no,fpo_suppliers.contact,fpo_suppliers.supp_account_no,fpo_suppliers.website,fpo_suppliers.	bank_account,fpo_suppliers.curr_code,fpo_suppliers.payment_terms,fpo_suppliers.tax_included,fpo_suppliers.dimension_id,fpo_suppliers.dimension2_id,fpo_suppliers.tax_group_id,fpo_suppliers.purchase_account,fpo_suppliers.payable_account,fpo_suppliers.payment_discount_account,fpo_suppliers.notes,fpo_suppliers.status,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name,trv_village_master.name As physical_village_name,trv_panchayat_master.name As physical_panchayat_name,trv_block_master.name As physical_block_name,trv_district_master.name As physical_district_name,trv_state_master.name As physical_state_name');
		$this->db->from('fpo_suppliers');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_suppliers.mailing_state'); 
		$this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_suppliers.mailing_district');
		$this->db->join('trv_village_master', 'trv_village_master.id = fpo_suppliers.mailing_village', 'left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_suppliers.mailing_panchayat','left');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_suppliers.mailing_taluk_id','left');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_suppliers.mailing_block','left');
        $this->db->order_by("fpo_suppliers.supplier_id", "desc");
		$this->db->where(array('fpo_suppliers.supplier_id' =>$supplier_id,'fpo_suppliers.status' => '1'));
        return $this->db->get()->result();	
	}
	function payment_terms_list() {  
        $this->db->select('fpo_payment_terms.*');
        $this->db->where(array('fpo_payment_terms.status' => '1'));
        $this->db->order_by("fpo_payment_terms.terms_indicator", "desc");
        $this->db->from('fpo_payment_terms');
        return $this->db->get()->result();	
	} 	
	function get_godownlist() {  
		$fpoid=$this->session->userdata('user_id');
        $this->db->select('trv_godown_master.*');
		$this->db->where(array('trv_godown_master.user_id' => $fpoid,'trv_godown_master.status' => '1','trv_godown_master.owner_type' => '2'));
        $this->db->order_by("trv_godown_master.id", "desc");
        $this->db->from('trv_godown_master');
        return $this->db->get()->result();	
	}
	function productByFPOId() {
		$this->db->select('trv_fpo_product.*,trv_product_master.name as product_name');
		$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
        $this->db->where(array('trv_fpo_product.fpo_id' => $this->session->userdata('logger_id'), 'trv_fpo_product.status' => '1'));
        $this->db->from('trv_fpo_product');
        return $this->db->get()->result();	
	}
	function state_list() {  
        $this->db->select('trv_state_master.*');
        $this->db->where(array('trv_state_master.status' => '1'));
        $this->db->order_by("trv_state_master.id", "asc");
        $this->db->from('trv_state_master');
        return $this->db->get()->result();	
	} 
	function bank_name_list() {  
        $this->db->select('trv_bank_name_master.*');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
        $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();	
	}
	 function bankAccount_List() {
		  $this->db->select('fpo_bank_accounts.*, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local, trv_fpo.producer_organisation_name');        
		  $this->db->order_by("fpo_bank_accounts.id", "desc");
		  $this->db->from('fpo_bank_accounts');
		  $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name', 'left');
		  $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address', 'left');
		  $this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_bank_accounts.fpo_id', 'left');
		  $this->db->where(array('fpo_bank_accounts.fpo_id' => $this->session->userdata('user_id'), 'fpo_bank_accounts.status' => 1));
		  //$this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.fpo_id = trv_fpo.id');
		  //echo "<pre>";print_r($this->db->get()->result());die;
		  return $this->db->get()->result();	
    }
	function gl_ChartMasterList() {
		$this->db->select('trv_chart_master.*');        
		$this->db->where(array('trv_chart_master.status' => 1));
		$this->db->distinct();
        $this->db->group_by("trv_chart_master.account_code2");
        $this->db->from('trv_chart_master');
		return $this->db->get()->result();	
	}
	function glAccountgroup_List() {
		  $this->db->select('trv_chart_master.account_code, trv_chart_master.account_code2, trv_chart_master.account_name, trv_chart_master.account_type');        
		  $this->db->from('trv_chart_master');
		  $this->db->where(array('trv_chart_master.status' => 1));
		  return $this->db->get()->result();	
    }
	function stockreportBysearch() {
		if(!empty($this->input->post('stock_search')) && $this->input->post('stock_search')){	
			$supplier=$this->input->post('supplier');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$location=$this->input->post('location');
		}else{            
			$supplier='';
			$from=date('Y-m-01');
			$to=date('Y-m-t');
			$location='';

		}

		if($supplier){
			$this->db->select('fpo_stock_moves.*,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('fpo_purch_orders', 'fpo_purch_orders.order_no = fpo_stock_moves.trans_no');
			$this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
			$this->db->where(array('fpo_suppliers.supplier_id' =>$supplier));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();		
		}else if($from & $to){
			$this->db->select('fpo_stock_moves.*,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->where(array('fpo_stock_moves.tran_date >=' =>$from,'fpo_stock_moves.tran_date <=' =>$to));			
		    $this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($from){
			$this->db->select('fpo_stock_moves.*,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->where(array('fpo_stock_moves.tran_date' =>$from));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($to){			
			$this->db->select('fpo_stock_moves.*,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->where(array('fpo_stock_moves.tran_date' =>$to));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($location){
			$this->db->select('fpo_stock_moves.*,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->where(array('fpo_stock_moves.loc_code' =>$location));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');	
			$result = $this->db->get()->result();
		}
       	return $result;
	} 
	function fpo_stockreportBysearch() {
		if(!empty($this->input->post('stock_search')) && $this->input->post('stock_search')){	
			$supplier=$this->input->post('supplier');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$location=$this->input->post('location');
		}else{            
			$supplier='';
			$from=date('Y-m-01');
			$to=date('Y-m-t');
			$location='';
		}

		if($supplier){
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('fpo_purch_orders', 'fpo_purch_orders.order_no = fpo_stock_moves.trans_no');
			$this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_suppliers.supplier_id' =>$supplier));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();		
		}else if($from & $to){
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_stock_moves.tran_date >=' =>$from,'fpo_stock_moves.tran_date <=' =>$to));			
		   $this->db->group_by('fpo_stock_moves.stock_id,fpo_stock_moves.person_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($from){
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->where(array('fpo_stock_moves.tran_date' =>$from));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($to){			
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_stock_moves.tran_date' =>$to));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($location){
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_stock_moves.loc_code' =>$location));
			$this->db->group_by('fpo_stock_moves.stock_id'); 
			$this->db->from('fpo_stock_moves');	
			$result = $this->db->get()->result();
		}
      return $result;
	} 
	function stockmovementBysearch() {
		if(!empty($this->input->post('stock_search')) && $this->input->post('stock_search')){	
			$supplier=$this->input->post('supplier');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$location=$this->input->post('location');
		}else{            
			$supplier='';
			$from=date('Y-m-01');
			$to=date('Y-m-t');
			$location='';

		}

		if($supplier){
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('fpo_purch_orders', 'fpo_purch_orders.order_no = fpo_stock_moves.trans_no');
			$this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_suppliers.supplier_id' =>$supplier));
			$this->db->group_by('fpo_stock_moves.tran_date'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();		
		}else if($from & $to){
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_stock_moves.tran_date >=' =>$from,'fpo_stock_moves.tran_date <=' =>$to));			
		    $this->db->group_by('fpo_stock_moves.tran_date'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($from){

			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_stock_moves.tran_date' =>$from));
			$this->db->group_by('fpo_stock_moves.tran_date'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($to){			
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_stock_moves.tran_date' =>$to));
			$this->db->group_by('fpo_stock_moves.tran_date'); 
			$this->db->from('fpo_stock_moves');
			$result = $this->db->get()->result();
		}else if($location){
			$this->db->select('fpo_stock_moves.*,trv_fpo.producer_organisation_name AS fpo_name,trv_product_master.name as product_name,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
			$this->db->join('trv_product_master', 'trv_product_master.id = fpo_stock_moves.stock_id');
			$this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_stock_moves.person_id ');
			$this->db->where(array('fpo_stock_moves.loc_code' =>$location));
			$this->db->group_by('fpo_stock_moves.tran_date'); 
			$this->db->from('fpo_stock_moves');	
			$result = $this->db->get()->result();
		}
       	return $result;
	} 

	
}

?>