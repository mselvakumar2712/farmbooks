<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Maintenance_Bank_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
}
    

/** bank account Starts **/
    function bankAccount_List() {
		  $this->db->select('fpo_bank_accounts.id, fpo_bank_accounts.bank_account_name,fpo_bank_accounts.account_code, fpo_bank_accounts.account_type, fpo_bank_accounts.dflt_curr_act, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local,trv_fpo.producer_organisation_name');        
		  $this->db->order_by("fpo_bank_accounts.id", "desc");
		  $this->db->from('fpo_bank_accounts');
		  $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name');
		  $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address');
		  $this->db->join('trv_fpo', 'trv_fpo.id = fpo_bank_accounts.fpo_id');
		  $this->db->where(array('fpo_bank_accounts.status' => '1'));
		   //$this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.fpo_id = trv_fpo.id');
		  //echo "<pre>";print_r($this->db->get()->result());die;
		  return $this->db->get()->result();	
    }

    function addbankAccount() {
		  $bank_details = array(
		    'fpo_id'                    => $this->input->post('fpo_name'),
		    'bank_account_name'         => $this->input->post('bank_account_name'),
            'account_type'              => $this->input->post('account_type'),
            'dflt_curr_act'             => $this->input->post('dflt_curr_act'),
            'bank_name'                 => $this->input->post('bank_name'),
            'bank_address'              => $this->input->post('bank_address')
		  );
			$this->db->insert('fpo_bank_accounts', $bank_details); 
			$last_inserted_acc_id = $this->db->insert_id();
			$user_details = array(  
            'account_code'        => str_pad($last_inserted_acc_id, 6, '0', STR_PAD_LEFT)
          );
		 return $this->db->update('fpo_bank_accounts', $user_details, array('id' => $last_inserted_acc_id));
	}	
       
    function updatebankaccount($bank_name_id) {
       $bank_details = array(
	        'fpo_id'                    => $this->input->post('fpo_name'),
			'bank_account_name'         => $this->input->post('bank_account_name'),
            'account_type'              => $this->input->post('account_type'),
            'dflt_curr_act'             => $this->input->post('dflt_curr_act'),
            'bank_name'                 => $this->input->post('bank_name'),
            'bank_address'              => $this->input->post('bank_address')
		  );		
		return $this->db->update('fpo_bank_accounts', $bank_details, array('id' => $bank_name_id));
    }
    
	function deletebankAccount( $bank_name_id ) {
        $bankid = array(               
	       'status' => 0
        );	            	
        return $this->db->update('fpo_bank_accounts', $bankid, array('id' => $bank_name_id));
	}
    
	
    function bankByID($bank_name_id) {
		$this->db->select('fpo_bank_accounts.*, trv_fpo.producer_organisation_name');        
		$this->db->where(array('fpo_bank_accounts.id' => $bank_name_id));
		$this->db->from('fpo_bank_accounts');
		$this->db->join('trv_fpo', 'trv_fpo.id = fpo_bank_accounts.fpo_id');
		return $this->db->get()->result();	
	}
	
	function bank_address_list($bank_name_id) {
		$this->db->select('trv_bank_master.id, trv_bank_master.bank_name_id, trv_bank_master.branch_name');
        $this->db->from('trv_bank_master');
		$this->db->distinct();
        $this->db->where(array('trv_bank_master.bank_name_id' => $bank_name_id,'trv_bank_master.status' => '1'));
        return $this->db->get()->result();
		
    }
	function fpoDropdownList() {
        $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name');
        $this->db->from('trv_fpo');
		$this->db->distinct();
        $this->db->where(array('trv_fpo.status' => '1'));
        return $this->db->get()->row_array();
    }
	
	function bank_name_list() {  
        $this->db->select('trv_bank_name_master.*');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
        $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();	
	}
	
	
	/* function bank_name_list() {  
        $this->db->select('trv_bank_name_master.name,trv_bank_master.bank_name_id');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
		$this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = trv_bank_master.bank_name_id');
       // $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();	
	} */
/** bank account ends **/	
	
}

?>