<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Approver_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /* Profile list for FPG/FIG/Representative */
    function fpgList($fpo_id){
         $this->db->select('trv_fpg.id, trv_fpg.user_id, trv_fpg.FPG_Name, trv_fpg.updated_on, trv_fpg.status');
         $this->db->select('trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_district_master.name As district_name, trv_state_master.name As state_name, trv_taluk_master.name As taluk_name');
         $this->db->order_by("trv_fpg.id", "desc");
         $this->db->from('trv_fpg');
         $this->db->where(array('trv_fpg.fpo_id' => $this->session->userdata('user_id')));
         $this->db->where('trv_fpg.status !=', 1);
         $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpg.state');       
         $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpg.district');
         $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpg.VillageID');
         $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpg.Gram_PanchayatID');
         $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpg.taluk');
         $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpg.block');
		return $this->db->get()->result();  
    }
    function figList($fpo_id){
         $this->db->select('trv_fig.id, trv_fig.user_id, trv_fig.FIG_Name, trv_fig.updated_on, trv_fig.status');
         $this->db->select('trv_state_master.name As state_name, trv_district_master.name As district_name, trv_taluk_master.name As taluk_name, trv_block_master.name As block_name, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name');
         $this->db->order_by("trv_fig.id", "desc");
         $this->db->from('trv_fig');
         $this->db->where(array('trv_fig.fpo_id' => $this->session->userdata('user_id')));
         $this->db->where('trv_fig.status !=', 1);
         $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fig.state');  
         $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fig.district');
         $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fig.taluk');
         $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fig.block');
         $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fig.Gram_PanchayatID');
         $this->db->join('trv_village_master', 'trv_village_master.id = trv_fig.VillageID');
         return $this->db->get()->result();  
    }
    function figRepresentativeList($fpo_id){
         $this->db->select('trv_fig_representative.id, trv_fig_representative.representative_type, trv_fig_representative.appointment_date, trv_fig_representative.status, trv_fig.FIG_Name, trv_farmer.profile_name, trv_fpo.producer_organisation_name, trv_member.member_type');
         $this->db->order_by("trv_fig_representative.id", "desc");
         $this->db->from('trv_fig_representative');
         $this->db->join('trv_fig', 'trv_fig.id = trv_fig_representative.fig_id');
         $this->db->join('trv_farmer', 'trv_farmer.id = trv_fig_representative.member_id', 'left');
         $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_fig_representative.member_id', 'left');
         $this->db->join('trv_member', 'trv_member.id = trv_fig_representative.membership_id');
         $this->db->where('trv_fig_representative.status !=', 1);
         return $this->db->get()->result();  
    }
	function figrepresentByID( $figrepresent_id ) {
        $this->db->select('trv_fig_representative.*, trv_fig.FIG_Name, trv_fig.fpo_id');        
        $this->db->order_by("id", "desc");
        $this->db->from('trv_fig_representative');
        $this->db->join('trv_fig', 'trv_fig.id = trv_fig_representative.fig_id');
        $this->db->where(array('trv_fig_representative.status' => 0, 'trv_fig_representative.id' => $figrepresent_id));
        return $this->db->get()->result();	
    }
    /* end */
	/* Godown list */ 
	function godown_list() {  
        $this->db->select('trv_godown_master.*');
        $this->db->where(array('trv_godown_master.owner_type' => '2','trv_godown_master.user_id' => $this->session->userdata('user_id')));
        $this->db->where('trv_godown_master.status != ',1);
        $this->db->order_by("trv_godown_master.id", "desc");
        $this->db->from('trv_godown_master');
        return $this->db->get()->result();	
	} 
  /* Bank account list */
  function bankAccount_List() {
		  $this->db->select('fpo_bank_accounts.*, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local, trv_fpo.producer_organisation_name');        
		  $this->db->order_by("fpo_bank_accounts.id", "desc");
		  $this->db->from('fpo_bank_accounts');
		  $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name', 'left');
		  $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address', 'left');
		  $this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_bank_accounts.fpo_id', 'left');
		  $this->db->where(array('fpo_bank_accounts.fpo_id' => $this->session->userdata('user_id')));
        $this->db->where('fpo_bank_accounts.status != ',1);
       return $this->db->get()->result();	
    }
   /* User list */
   function userlist() {  
      $this->db->select('trv_staff_member.*, trv_access_profile.profile_name');
      $this->db->where(array('trv_staff_member.fpo_id' => $this->session->userdata('user_id')));
      $this->db->where('trv_staff_member.status != ',1);
      $this->db->order_by("trv_staff_member.id", "desc");
      $this->db->from('trv_staff_member');
      $this->db->join('trv_access_profile', 'trv_access_profile.id = trv_staff_member.profile_type');
      return $this->db->get()->result();	
   } 
   /* Finance module starts */
   /*Receipt List*/
   function receiptlist($fpo_id) {  
      $this->db->select('fpo_gl_trans.*');
      $this->db->select('fpo_suppliers.supp_name as supplier_name, fpo_debtors_master.name as debtor_name, CM_account.account_name as received_from, CM_accountCode.account_name as deposit_into');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.type' => 2));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
    	$this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
      $this->db->join('trv_chart_master AS CM_accountCode', 'CM_accountCode.account_code = fpo_gl_trans.account_code', 'left');
      $this->db->join('trv_chart_master AS CM_account', 'CM_account.account_code = fpo_gl_trans.account', 'left');
      $this->db->order_by("fpo_gl_trans.counter", "desc");
      $this->db->group_by("fpo_gl_trans.voucher_no","fpo_gl_trans.person_type_id");
      $this->db->from('fpo_gl_trans','fpo_suppliers','fpo_debtors_master');
      return $this->db->get()->result();	
   }
   
   function viewReceiptByVoucher($voucher_no){
      $this->db->select('fpo_gl_trans.*');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $this->session->userdata('user_id'), 'fpo_gl_trans.type' => 2));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no));      
      $this->db->order_by("fpo_gl_trans.counter", "ASC");
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result();       
   }
   function getLedgerTypeName($account_id, $type){
      if($type == 1){
         return $this->db->get_where('fpo_suppliers', array('supplier_id' => $account_id))->row()->supp_name;
      }else if($type == 2){         
         return $this->db->get_where('fpo_debtors_master', array('debtor_no' => $account_id))->row()->name;
      }else if($type == 3){         
         return $this->db->get_where('trv_chart_master', array('account_code' => $account_id))->row()->account_name;          
      } else if($type == 4){
        return $this->db->get_where('fpo_bank_accounts', array('id' => $account_id))->row()->bank_account_name;          
      } else{         
      }       
    }
    function getLedgerByName($account_id, $type){
    if($type == 1){
        return $this->db->get_where('trv_chart_master', array('account_code' => $account_id))->row()->account_name;          
      }else if($type == 2){         
       return $this->db->get_where('fpo_bank_accounts', array('account_code' => $account_id))->row()->bank_account_name;          
     } else{
      
      } 
       
    }
   /*Payment List*/
   function paymentlist($fpo_id) {  
      $this->db->select('fpo_gl_trans.*');
      $this->db->select('fpo_suppliers.supp_name as supplier_name, fpo_debtors_master.name as debtor_name, CM_account.account_name as received_from, CM_accountCode.account_name as deposit_into');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.type' => 1));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
    	$this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
      $this->db->join('trv_chart_master AS CM_accountCode', 'CM_accountCode.account_code = fpo_gl_trans.account_code', 'left');
      $this->db->join('trv_chart_master AS CM_account', 'CM_account.account_code = fpo_gl_trans.account', 'left');
      $this->db->order_by("fpo_gl_trans.counter", "desc");
      $this->db->group_by("fpo_gl_trans.voucher_no");
      $this->db->from('fpo_gl_trans','fpo_suppliers','fpo_debtors_master');
      return $this->db->get()->result();	
   } 
   
   function viewPaymentByVoucher($voucher_no) {  
      /* $this->db->select('fpo_gl_trans.*');
      $this->db->select('fpo_suppliers.supp_name as supplier_name, fpo_debtors_master.name as debtor_name, CM_account.account_name as received_from, CM_accountCode.account_name as deposit_into');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $this->session->userdata('user_id'), 'fpo_gl_trans.type' => 1));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no));      
      $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
    	$this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
      $this->db->join('trv_chart_master AS CM_accountCode', 'CM_accountCode.account_code = fpo_gl_trans.account_code', 'left');
      $this->db->join('trv_chart_master AS CM_account', 'CM_account.account_code = fpo_gl_trans.account', 'left');
      $this->db->order_by("fpo_gl_trans.counter", "desc");
      $this->db->from('fpo_gl_trans','fpo_suppliers','fpo_debtors_master');
      return $this->db->get()->result();	 */
      $this->db->select('fpo_gl_trans.*');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $this->session->userdata('user_id'), 'fpo_gl_trans.type' => 1));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no));      
      $this->db->order_by("fpo_gl_trans.counter", "ASC");
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result(); 
   } 
   
  /* Contra list */
    function contralist($fpo_id) {  
      $this->db->select('fpo_gl_trans.*');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id));
      $this->db->where(array('fpo_gl_trans.type_no' => 3,'fpo_gl_trans.type' => 3));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
      $this->db->order_by("fpo_gl_trans.counter", "desc");
      $this->db->group_by("fpo_gl_trans.voucher_no");      
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result();	
   } 
   function viewcontra($voucher_no) {   
      $this->db->select('fpo_gl_trans.*');
      $this->db->select('fpo_bank_accounts.bank_account_name,trv_chart_master.account_name');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $this->session->userdata('user_id'),'fpo_gl_trans.type_no' => 3,'fpo_gl_trans.type' => 3));
      $this->db->where(array('fpo_gl_trans.status !=', 1));
      $this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.id = fpo_gl_trans.account','left');
      $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account','left');    
      $this->db->where(array('fpo_gl_trans.voucher_no'=>$voucher_no));
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result();      
   }      
   /* Contra ends */
   
   /* Joournal */
   function journallist($fpo_id){  
      $this->db->select('fpo_gl_trans.*');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.type' => 4));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->from('fpo_gl_trans');
      $this->db->order_by("fpo_gl_trans.counter", "ASC");
      $this->db->group_by("fpo_gl_trans.voucher_no");    
      return $this->db->get()->result();	
   }
  
   function viewjournal($voucher_no){  
      $this->db->select('fpo_gl_trans.*');
      $this->db->select('fpo_suppliers.supp_name as supplier_name, fpo_debtors_master.name as debtor_name, trv_chart_master.account_name as ledgerName');
      $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.fpo_id' => $this->session->userdata('user_id'), 'fpo_gl_trans.type' => 4));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
      $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
      $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account', 'left');
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result();	
   } 
   /*Journal ends*/
   
   /* Debit list */
   function debitlist($fpo_id) {  
      $this->db->select('fpo_gl_trans.*');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id,'fpo_gl_trans.type_no' => 1,'fpo_gl_trans.type' => 7));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->order_by("fpo_gl_trans.counter", "desc");
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result();	
   }    
   function viewdebit($voucher_no) {  
      $this->db->select('fpo_gl_trans.*');
      $this->db->select('fpo_suppliers.supp_name as supplier_name, fpo_debtors_master.name as debtor_name, trv_chart_master.account_name as ledgerName');
      $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.fpo_id' => $this->session->userdata('user_id'), 'fpo_gl_trans.type' => 7));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
      $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
      $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account', 'left');
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result();
   }
  /* Debit ends */  
  /* credit list */    
   function creditlist($fpo_id){  
      $this->db->select('fpo_gl_trans.*');
      $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.type' => 8));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->from('fpo_gl_trans');
      $this->db->order_by("fpo_gl_trans.counter", "ASC");
      return $this->db->get()->result();	
   }
   function viewcredit($voucher_no){  
      $this->db->select('fpo_gl_trans.*');
      $this->db->select('fpo_suppliers.supp_name as supplier_name, fpo_debtors_master.name as debtor_name, trv_chart_master.account_name as ledgerName');
      $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.fpo_id' => $this->session->userdata('user_id'), 'fpo_gl_trans.type' => 8));
      $this->db->where('fpo_gl_trans.status !=', 1);
      $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
      $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
      $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account', 'left');
      $this->db->from('fpo_gl_trans');
      return $this->db->get()->result();      
   }  
   
   /* finance ends */ 
   
   /*purchase list */
   function purchaselist(){
      $cutomers = $cash = array();
      $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.voucher_no,fpo_gl_trans.counter,fpo_gl_trans.amount,fpo_supp_trans.supp_reference as inv_no, fpo_suppliers.supp_name As supplier_name,fpo_gl_trans.status');
      $this->db->order_by("counter", "asc");
      $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.account_code LIKE' => '30302%', 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
      $this->db->where('fpo_gl_trans.status != ',1);
      $this->db->from('fpo_gl_trans');
      $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account');
      $this->db->join('fpo_supp_trans', 'fpo_supp_trans.reference = fpo_gl_trans.voucher_no AND fpo_supp_trans.supplier_id = fpo_suppliers.supplier_id');
      $cutomers = $this->db->get()->result();
      $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.voucher_no,fpo_gl_trans.counter,fpo_gl_trans.amount,fpo_supp_trans.supp_reference as inv_no, "Cash" As customer_name,fpo_gl_trans.status');
      $this->db->order_by("counter", "asc");
      $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.account_code LIKE' => '40205%','fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
      $this->db->where('fpo_gl_trans.status != ',1);
      $this->db->from('fpo_gl_trans');
      $this->db->join('fpo_supp_trans', 'fpo_supp_trans.reference = fpo_gl_trans.voucher_no');
      $cash = $this->db->get()->result();
      if($cash){
         $cutomers = array_merge($cutomers, $cash);
      }
      return $cutomers;       
   }
   
   function getPurchaseTransactionView($voucher_no,$inv_no,$supplier){
      if($supplier == '4020501' || $supplier == '4020502'){
         $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
         $this->db->select('fpo_supp_trans.supp_reference, fpo_supp_invoice_items.unit_price,fpo_supp_invoice_items.discount,fpo_supp_invoice_items.quantity as qty_invoiced,fpo_supp_invoice_items.cgst AS cgst_value,fpo_supp_invoice_items.sgst AS sgst_value,fpo_supp_invoice_items.igst AS igst_value');
         $this->db->select('"Cash Purchase" As supplier_name,fpo_supp_trans.ov_discount, trv_uom_master.short_name');
         $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,trv_fpo_product.hsn_code');
         $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
         $this->db->order_by("counter", "asc");
         $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $supplier, 'fpo_supp_trans.reference' => $voucher_no, 'fpo_supp_trans.supp_reference' => $inv_no, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
         $this->db->from('fpo_gl_trans');
         $this->db->join('fpo_supp_trans', 'fpo_supp_trans.supplier_id = '.$supplier);
         $this->db->join('fpo_supp_invoice_items', 'fpo_supp_invoice_items.supp_trans_no = fpo_supp_trans.trans_no');
         $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_supp_invoice_items.uom');
         $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_supp_invoice_items.stock_id');
         $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
      }else{
         $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
         $this->db->select('fpo_supp_trans.supp_reference, fpo_supp_invoice_items.unit_price,fpo_supp_invoice_items.discount,fpo_supp_invoice_items.quantity as qty_invoiced,fpo_supp_invoice_items.cgst AS cgst_value,fpo_supp_invoice_items.sgst AS sgst_value,fpo_supp_invoice_items.igst AS igst_value');
         $this->db->select('fpo_suppliers.supp_name As supplier_name,fpo_suppliers.gst_no As gst,fpo_suppliers.pan_no As pan,fpo_suppliers.pan_no As pan,fpo_supp_trans.ov_discount, trv_uom_master.short_name,trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_pincode_master.pincode As pincode');
         $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,trv_fpo_product.hsn_code');
         $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
         $this->db->order_by("counter", "asc");
         $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $supplier, 'fpo_supp_trans.reference' => $voucher_no, 'fpo_supp_trans.supp_reference' => $inv_no, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
         $this->db->from('fpo_gl_trans');
         $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account');
         $this->db->join('fpo_supp_trans', 'fpo_supp_trans.supplier_id = fpo_suppliers.supplier_id');
         $this->db->join('fpo_supp_invoice_items', 'fpo_supp_invoice_items.supp_trans_no = fpo_supp_trans.trans_no');
         $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_supp_invoice_items.uom');
         $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_supp_invoice_items.stock_id');
         $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
         $this->db->join('trv_village_master', 'trv_village_master.id = fpo_suppliers.mailing_village','left');
         $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_suppliers.mailing_panchayat','left');
         $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_suppliers.mailing_taluk_id','left');
         $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_suppliers.mailing_block','left');
         $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_suppliers.mailing_district');
         $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_suppliers.mailing_state');	
         $this->db->join('trv_pincode_master', 'trv_pincode_master.pincode = fpo_suppliers.mailing_pincode');
      }
      return $this->db->get()->result();       
    }
   
   /*Sales list */
   function saleslist(){
      $cutomers = $cash = array();
      $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.counter,fpo_gl_trans.voucher_no,fpo_gl_trans.amount,fpo_debtor_trans.reference as inv_no, fpo_debtors_master.name As customer_name,fpo_gl_trans.status');
      $this->db->order_by("counter", "asc");
      $this->db->where(array('fpo_gl_trans.type' => 6, 'fpo_gl_trans.account_code LIKE' => '40202%','fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
      $this->db->where('fpo_gl_trans.status != ',1);
      $this->db->from('fpo_gl_trans');
      $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account');
      $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.voucher_no = fpo_gl_trans.voucher_no AND fpo_debtor_trans.debtor_no = fpo_debtors_master.debtor_no');
      $cutomers = $this->db->get()->result();
      $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.counter,fpo_gl_trans.voucher_no,fpo_gl_trans.amount,fpo_debtor_trans.reference as inv_no, "Cash" As customer_name,fpo_gl_trans.status');
      $this->db->order_by("counter", "asc");
      $this->db->where(array('fpo_gl_trans.type' => 6, 'fpo_gl_trans.account_code LIKE' => '40205%', 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
      $this->db->where('fpo_gl_trans.status != ',1);
      $this->db->from('fpo_gl_trans');
      $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.voucher_no = fpo_gl_trans.voucher_no');
      $cash = $this->db->get()->result();
      if($cash){
         $cutomers = array_merge($cutomers, $cash);
      }
      return $cutomers;       
   } 
   
   function getSalesTransactionView($voucher_no,$inv_no,$customer){
      if($customer == '4020501' || $customer == '4020502'){
         $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
         $this->db->select('fpo_debtor_trans.reference, fpo_debtor_trans_details.cgst AS cgst_value,fpo_debtor_trans_details.sgst AS sgst_value,fpo_debtor_trans_details.igst AS igst_value, "Retail Sales" As customer_name, fpo_debtor_trans_details.stock_id,fpo_debtor_trans_details.unit_price,fpo_debtor_trans_details.quantity,fpo_debtor_trans_details.discount_percent,fpo_debtor_trans_details.line_total, trv_uom_master.short_name');
         $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,hsn_category as hsn_code');
         $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
         $this->db->order_by("counter", "asc");
         $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $customer, 'fpo_debtor_trans.voucher_no' => $voucher_no, 'fpo_debtor_trans.reference' => $inv_no, 'fpo_gl_trans.type' => 6, 'fpo_gl_trans.person_type_id' => 2,'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
         $this->db->from('fpo_gl_trans');
         $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.debtor_no = '.$customer);
         $this->db->join('fpo_debtor_trans_details', 'fpo_debtor_trans_details.debtor_trans_no = fpo_debtor_trans.trans_no');
         $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_debtor_trans_details.uom');
         $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_debtor_trans_details.stock_id');
         $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');	
      }else{
         $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
         $this->db->select('fpo_debtor_trans.reference, fpo_debtor_trans_details.cgst AS cgst_value,fpo_debtor_trans_details.sgst AS sgst_value,fpo_debtor_trans_details.igst AS igst_value, fpo_debtors_master.name As customer_name, fpo_debtor_trans_details.stock_id,fpo_debtor_trans_details.unit_price,fpo_debtor_trans_details.quantity,fpo_debtor_trans_details.discount_percent,fpo_debtor_trans_details.line_total, trv_uom_master.short_name');
         $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,hsn_category as hsn_code');
         $this->db->select('trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_pincode_master.pincode As pincode');//, trv_product_master.name AS product_name
         $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
         $this->db->order_by("counter", "asc");
         $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $customer, 'fpo_debtor_trans.voucher_no' => $voucher_no, 'fpo_debtor_trans.reference' => $inv_no, 'fpo_gl_trans.type' => 6, 'fpo_gl_trans.person_type_id' => 2,'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
         $this->db->from('fpo_gl_trans');
         $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account');
         $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.debtor_no = fpo_debtors_master.debtor_no');
         $this->db->join('fpo_debtor_trans_details', 'fpo_debtor_trans_details.debtor_trans_no = fpo_debtor_trans.trans_no');
         $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_debtor_trans_details.uom');
         $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_debtor_trans_details.stock_id');
         $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
         $this->db->join('trv_village_master', 'trv_village_master.id = fpo_debtors_master.village','left');
         $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_debtors_master.panchayat','left');
         $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_debtors_master.taluk_id','left');
         $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_debtors_master.block','left');
         $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_debtors_master.district');
         $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_debtors_master.state');	
         $this->db->join('trv_pincode_master', 'trv_pincode_master.pincode = fpo_debtors_master.pincode');
      } 
	   return $this->db->get()->result();       
   }
   /*share */
   
   function shareHoldersList($fpo_id){
    $this->db->select('trv_share_allotment.id, trv_share_allotment.member_type, trv_share_allotment.holder_id, trv_share_allotment.folio_number, trv_share_allotment.resolution_number, trv_share_allotment.resolution_date, trv_share_allotment.status');
    $this->db->select('trv_share_history.share_applied, trv_share_history.share_allotted, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
    $this->db->from('trv_share_allotment');
    $this->db->where(array('trv_share_allotment.fpo_id' => $fpo_id)); 
    $this->db->where('trv_share_allotment.status !=', 1);
    $this->db->order_by("trv_share_allotment.id", "ASC");
    $this->db->group_by("trv_share_allotment.resolution_number");
    $this->db->join('trv_share_history', 'trv_share_history.holder_id = trv_share_allotment.holder_id AND trv_share_history.folio_number = trv_share_allotment.folio_number AND trv_share_history.member_type = trv_share_allotment.member_type AND trv_share_history.resolution_number = trv_share_allotment.resolution_number');
    $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_allotment.holder_id', 'left');
    $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_allotment.holder_id', 'left');
    return $this->db->get()->result();  
  }
  function shareHoldersView($allotment_id){
    $this->db->select('trv_share_allotment.id, trv_share_allotment.member_type, trv_share_allotment.holder_id, trv_share_allotment.folio_number, trv_share_allotment.resolution_number, trv_share_allotment.resolution_date, trv_share_allotment.status');
    $this->db->select('trv_share_history.share_applied, trv_share_history.share_allotted, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
    $this->db->from('trv_share_allotment');
    $this->db->where(array('trv_share_allotment.fpo_id' => $this->session->userdata('user_id')));
    $this->db->where(array('trv_share_allotment.id' => $allotment_id));      
    $this->db->where('trv_share_allotment.status !=', 1);
    $this->db->order_by("trv_share_allotment.id", "ASC");
    $this->db->join('trv_share_history', 'trv_share_history.holder_id = trv_share_allotment.holder_id AND trv_share_history.folio_number = trv_share_allotment.folio_number AND trv_share_history.member_type = trv_share_allotment.member_type AND trv_share_history.resolution_number = trv_share_allotment.resolution_number');
    $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_allotment.holder_id', 'left');
    $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_allotment.holder_id', 'left');
    return $this->db->get()->result();  
  }
  
  function shareHistoryList($fpo_id){
    $this->db->select('trv_share_history.id, trv_share_history.folio_number, trv_share_history.resolution_number, trv_share_history.total_share_value, trv_share_history.certificate_num, trv_share_history.distinctive_from, trv_share_history.distinctive_to, trv_share_history.status');
    $this->db->select('trv_farmer.profile_name, trv_fpo.producer_organisation_name');
    $this->db->from('trv_share_history');
    $this->db->where(array('trv_share_history.fpo_id' => $fpo_id)); 
    $this->db->where('trv_share_history.status !=', 1);
    $this->db->order_by("trv_share_history.id", "ASC");
    $this->db->group_by("trv_share_history.folio_number");    
    $this->db->join('trv_share_allotment', 'trv_share_history.holder_id = trv_share_allotment.holder_id AND trv_share_history.folio_number = trv_share_allotment.folio_number AND trv_share_history.member_type = trv_share_allotment.member_type AND trv_share_history.resolution_number = trv_share_allotment.resolution_number');
    $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_history.holder_id', 'left');
    $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_share_history.holder_id', 'left');
    //$this->db->group_by("trv_share_history.folio_number");
    return $this->db->get()->result();  
  }
  function shareHistoryView($certificate_id){
    $this->db->select('trv_share_history.id, trv_share_history.folio_number, trv_share_history.resolution_number, trv_share_history.total_share_value, trv_share_history.certificate_num, trv_share_history.distinctive_from, trv_share_history.distinctive_to, trv_share_history.status');
    $this->db->select('trv_farmer.profile_name, trv_fpo.producer_organisation_name');
    $this->db->from('trv_share_history');
    $this->db->where(array('trv_share_history.fpo_id' => $this->session->userdata('user_id'))); 
    $this->db->where(array('trv_share_history.id' => $certificate_id));
    $this->db->where('trv_share_history.status !=', 1);
    $this->db->order_by("trv_share_history.id", "ASC");
    $this->db->join('trv_share_allotment', 'trv_share_history.holder_id = trv_share_allotment.holder_id AND trv_share_history.folio_number = trv_share_allotment.folio_number AND trv_share_history.member_type = trv_share_allotment.member_type AND trv_share_history.resolution_number = trv_share_allotment.resolution_number');
    $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_history.holder_id', 'left');
    $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_share_history.holder_id', 'left');
    return $this->db->get()->result();  
  }
  
  /*share ends */  
   
  /*Supplier List*/
  function supplierlist($fpo_id){
      $this->db->select('fpo_suppliers.*');
      $this->db->select('trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_pincode_master.pincode As pincode');
      $this->db->from('fpo_suppliers');
      $this->db->where(array('fpo_suppliers.fpo_id' => $fpo_id)); 
      $this->db->where('fpo_suppliers.status !=', 1);
      $this->db->join('trv_village_master', 'trv_village_master.id = fpo_suppliers.mailing_village','left');
      $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_suppliers.mailing_panchayat','left');
      $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_suppliers.mailing_taluk_id','left');
      $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_suppliers.mailing_block','left');
      $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_suppliers.mailing_district');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_suppliers.mailing_state');	
      $this->db->join('trv_pincode_master', 'trv_pincode_master.pincode = fpo_suppliers.mailing_pincode');
      return $this->db->get()->result();  
    }
   /* supplier ends */
    /*Supplier List*/
  function customerlist($fpo_id){
      $this->db->select('fpo_debtors_master.*');
      $this->db->select('trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_pincode_master.pincode As pincode');//, trv_product_master.name AS product_name
      $this->db->from('fpo_debtors_master');
      $this->db->where(array('fpo_debtors_master.fpo_id' => $fpo_id)); 
      $this->db->where('fpo_debtors_master.status !=', 1);
      $this->db->join('trv_village_master', 'trv_village_master.id = fpo_debtors_master.village','left');
      $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_debtors_master.panchayat','left');
      $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_debtors_master.taluk_id','left');
      $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_debtors_master.block','left');
      $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_debtors_master.district');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_debtors_master.state');	
      $this->db->join('trv_pincode_master', 'trv_pincode_master.pincode = fpo_debtors_master.pincode');
      return $this->db->get()->result();  
    }
   /* supplier ends */
   
	
	/* Operation related source code */
	function getNoticetoDirectors($fpo_id){
		$this->db->select('trv_notice_to_director.id, trv_notice_to_director.meeting_date, trv_notice_to_director.meeting_time, trv_notice_to_director.place_of_meeting, trv_notice_to_director.status');
		$this->db->where(array('trv_notice_to_director.fpo_id' => $fpo_id));
		$this->db->where('trv_notice_to_director.status !=', 1);
		$this->db->order_by("trv_notice_to_director.id", "desc");
		$this->db->from('trv_notice_to_director');
		return $this->db->get()->result();	
	} 
	function getNoticetoDirectorsByID($director_id){
		$this->db->select('trv_notice_to_director.*');
		$this->db->select('trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name');
		$this->db->where(array('trv_notice_to_director.id' => $director_id));
		$this->db->where('trv_notice_to_director.status !=', 1);
		$this->db->from('trv_notice_to_director');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_notice_to_director.village', 'left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_notice_to_director.panchayat', 'left');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_notice_to_director.taluk_id', 'left');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_notice_to_director.block', 'left');
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_notice_to_director.district_id');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_notice_to_director.state_id');	
		return $this->db->get()->result();	
	} 
	function getTrainingToDirectors($fpo_id){ 
		$this->db->select('trv_training_director.*');
		$this->db->where(array('trv_training_director.fpo_id' => $fpo_id));
		$this->db->where('trv_training_director.status !=', 1);
		$this->db->from('trv_training_director');
		$query = $this->db->get()->result();
		return $query;
	}
	function getTrainingtoDirectorsByID($director_id){ 
		$this->db->select('trv_training_director.*');
		$this->db->where(array('trv_training_director.id' => $director_id));
		$this->db->where('trv_training_director.status !=', 1);
		$this->db->from('trv_training_director');
		$query = $this->db->get()->result();
		return $query;
	}
	function getTrainingToCEO($fpo_id) {  
		$this->db->select('trv_training_ceo.id, trv_training_ceo.training_start_date, trv_training_ceo.no_of_days, trv_training_ceo.trainer_name, trv_training_ceo.institute_name, trv_training_ceo.cost_involved, trv_training_ceo.status, trv_fpo_ceo.name As ceo_name');
		$this->db->where(array('trv_training_ceo.fpo_id' => $fpo_id));
		$this->db->where('trv_training_ceo.status !=', 1);
		$this->db->from('trv_training_ceo');	 
		$this->db->order_by("trv_training_ceo.id", "desc");  
		$this->db->join('trv_fpo_ceo', 'trv_fpo_ceo.id = trv_training_ceo.ceo_id');	
		return $this->db->get()->result();	
    }
	function getCeoTrainingByID($CEO_id){ 
		$this->db->select('trv_training_ceo.id, trv_training_ceo.training_start_date, trv_training_ceo.training_end_date, trv_training_ceo.no_of_days, trv_training_ceo.exposure_date, trv_training_ceo.place_to_visit, trv_training_ceo.trainer_name, trv_training_ceo.institute_name, trv_training_ceo.cost_involved, trv_training_ceo.involved_cost, trv_training_ceo.status, trv_fpo_ceo.name As ceo_name');
		$this->db->where(array('trv_training_ceo.id' => $CEO_id));
		$this->db->where('trv_training_ceo.status !=', 1);
		$this->db->from('trv_training_ceo');	 
		$this->db->order_by("trv_training_ceo.id", "desc");  
		$this->db->join('trv_fpo_ceo', 'trv_fpo_ceo.id = trv_training_ceo.ceo_id');	
		return $this->db->get()->result();	
	}
	function getExposureVisit($fpo_id) { 
        $this->db->select('trv_exposure_visit.id, trv_exposure_visit.program_date, trv_exposure_visit.conducting_place, trv_exposure_visit.no_of_participants, trv_exposure_visit.no_of_villages, trv_exposure_visit.cost_involved, trv_exposure_visit.status');
		$this->db->order_by("trv_exposure_visit.id", "desc");
		$this->db->where(array('trv_exposure_visit.fpo_id' => $fpo_id));
		$this->db->where('trv_exposure_visit.status !=', 1);
		$this->db->from('trv_exposure_visit');
		return $this->db->get()->result();		
    } 
	function getexposureVisitByID($exposure_id) { 
        $this->db->select('trv_exposure_visit.id, trv_exposure_visit.program_date, trv_exposure_visit.conducting_place, trv_exposure_visit.no_of_participants, trv_exposure_visit.no_of_villages, trv_exposure_visit.cost_involved, trv_exposure_visit.amount, trv_exposure_visit.status');
		$this->db->order_by("trv_exposure_visit.id", "desc");
		$this->db->where(array('trv_exposure_visit.id' => $exposure_id));
		$this->db->where('trv_exposure_visit.status !=', 1);
		$this->db->from('trv_exposure_visit');
		return $this->db->get()->result();		
    } 
	function getAwarenessPrograms($fpo_id){
		$this->db->select('trv_awareness_program.id, trv_awareness_program.program_date, trv_awareness_program.conducting_place, trv_awareness_program.no_of_participants, trv_awareness_program.villages, trv_awareness_program.cost_involved, trv_awareness_program.status');
		$this->db->order_by("trv_awareness_program.id", "desc");
		$this->db->where(array('trv_awareness_program.fpo_id' => $fpo_id));
		$this->db->where('trv_awareness_program.status !=', 1);
		$this->db->from('trv_awareness_program');
		return $this->db->get()->result();	
	}
	function getAwarenessProgramByID($awareness_id){
		$this->db->select('trv_awareness_program.id, trv_awareness_program.program_date, trv_awareness_program.conducting_place, trv_awareness_program.no_of_participants, trv_awareness_program.villages, trv_awareness_program.cost_involved, trv_awareness_program.involved_cost, trv_awareness_program.status');
		$this->db->order_by("trv_awareness_program.id", "desc");
		$this->db->where(array('trv_awareness_program.id' => $awareness_id));
		$this->db->where('trv_awareness_program.status !=', 1);
		$this->db->from('trv_awareness_program');
		return $this->db->get()->result();	
	}
	function getClusterIdentify($fpo_id){ 
		$this->db->select('trv_cluster_identification.*'); 
		$this->db->where(array('trv_cluster_identification.fpo_id' => $fpo_id));
		$this->db->where('trv_cluster_identification.status !=', 1);
		$this->db->from('trv_cluster_identification');
		$query = $this->db->get()->result();
		return $query;
	}
	function getClusterIdentifyByID($cluster_id){ 
		$this->db->select('trv_cluster_identification.*'); 
		$this->db->where(array('trv_cluster_identification.id' => $cluster_id));
		$this->db->where('trv_cluster_identification.status !=', 1);
		$this->db->from('trv_cluster_identification');
		$query = $this->db->get()->result();
		return $query;
	}
	function getBaselineInfo($fpo_id){ 
		$this->db->select('trv_baseline_info.*, trv_cluster_identification.cluster_name As cluster');
		$this->db->where(array('trv_baseline_info.fpo_id' => $fpo_id));
		$this->db->where('trv_baseline_info.status !=', 1);
		$this->db->from('trv_baseline_info');
		$this->db->join('trv_cluster_identification', 'trv_cluster_identification.id = trv_baseline_info.cluster_name');	  
		$query = $this->db->get()->result();
		return $query;
	}
	function getBaselineInfoByID($baselineinfo_id){ 
		$this->db->select('trv_baseline_info.*, trv_cluster_identification.cluster_name As cluster');
		$this->db->where(array('trv_baseline_info.id' => $baselineinfo_id));
		$this->db->where('trv_baseline_info.status !=', 1);
		$this->db->from('trv_baseline_info');
		$this->db->join('trv_cluster_identification', 'trv_cluster_identification.id = trv_baseline_info.cluster_name');	  
		$query = $this->db->get()->result();
		return $query;
	}
	/* opearation module related source code */
	
}
?>