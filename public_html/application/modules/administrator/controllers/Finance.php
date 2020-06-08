<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/administrator/
	 *	- or -
	 * 		http://example.com/index.php/administrator/
	 *	- or -
	 * http://example.com/index.php/administrator/index
	 *
	 */
    public function __construct() {
        parent::__construct();
		$this->load->library("session");
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 || $this->session->userdata('user_type') != 0 ){ 
		 redirect('administrator/login/signout');
		}
        $this->load->library('session'); 
		  $this->load->model("Maintenance_Bank_Model");
		  $this->load->model("Masterdata_Model");
		  $this->load->model("Fpo_Model");
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
	
	/* banking and general ledger start */
	
	/* payements start */
	public function payments() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Payments';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/transaction/payments', $data); 
	}
	
	/* payements end */
	
	/* deposites start */
	public function deposits() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Deposits';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/transaction/deposites', $data); 
	}
	
	/* deposites end */
	
	/* bank account start */
	public function bankaccounts() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Bank Accounts';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/transaction/bank_accounts', $data); 
	}
	
	/* bank account end */
	
	/* journal entry start */
	public function journalentry() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Journal Entry';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/transaction/journal_entry', $data); 
	}
	
	/* journal entry end */
	
	/* budget entry start */
	public function budgetentry() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Budget Entry';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/transaction/budget_entry', $data); 
	}
	
	/* budget entry end */
	
	/*  reconcile bank account start */
	public function reconcilebankaccount() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Reconcile Bank Account';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/transaction/reconcile_bankaccount', $data); 
	}
	
	/*  reconcile bank account end */
	
	/*  journal inquiry start */
	public function journalinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Journal Inquiry';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/inquiries_reports/journal_inquiry', $data); 
	}
	
	/*  journal inquiry end */
	
	/*  general ledger inquiry start */
	public function glinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'GL Inquiry';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/inquiries_reports/general_ledger_inquiry', $data); 
	}
	
	/* general ledger inquiry end */
	
	/*  bank account inquiry start */
	public function bankaccountinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Bank Account Inquiry';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/inquiries_reports/bank_account_inquiry', $data); 
	}
	
	/*  bank account inquiry end */
	
	/*  tax inquiry start */
	
	public function taxinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Tax Inquiry';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/inquiries_reports/tax_inquiry', $data); 
	}
	
	/*  tax inquiry end */
	
	/*  trial balance start */
	
	public function trialbalance() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Trial Balance';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/inquiries_reports/trial_balance', $data); 
	}
	
	/*  trial balance end */
	
	/* balance sheet drilldown start */
	
	public function balancesheetdrilldown() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Balance Sheet Drilldown';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/inquiries_reports/balance_sheet_drilldown', $data); 
	}
	
	/* balance sheet drilldown end */
	
	/* profit and loss drilldown start */
	
	public function profitandloss() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Profit And Loss Drilldown';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/inquiries_reports/profit_loss_drilldown', $data); 
	}
	
	/* profit and loss drilldown end */
	
	/* bank account maintenance start */
	
	//12/02
	//list
	public function bank_accounts() {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'Bank Accounts Maintenance';
        $data['page_module'] = 'finance';	
		$data['bank_name'] = $this->Maintenance_Bank_Model->bank_name_list();
		$data['bank_info'] = $this->Maintenance_Bank_Model->bankAccount_List();
		$data['fpo'] = $this->Fpo_Model->fpoList();
        $this->load->view('finance/banking/maintenance/bank_accounts', $data); 
	}
	//add
	public function addbankAccount() {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'Bank Accounts Maintenance';
        $data['page_module'] = 'finance';
		$data['bank_name'] = $this->Maintenance_Bank_Model->bank_name_list();
		$data['fpo'] = $this->Maintenance_Bank_Model->fpoDropdownList();
        $this->load->view('finance/banking/maintenance/bank_accounts', $data); 
	} 
	
	//view
	public function viewbankAccounts($bank_name_id) {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'Bank Accounts Maintenance';
        $data['page_module'] = 'finance';	
		$data['bank_name'] = $this->Masterdata_Model->bank_name_list();
		$data['bank_info'] = $this->Maintenance_Bank_Model->bankByID($bank_name_id);
		$this->load->view('finance/banking/maintenance/bank_accounts_edit', $data);
		
	}
	
	public function bankaddress($bank_name_id)  {
        $bankaddress_list = $this->Maintenance_Bank_Model->bank_address_list($bank_name_id);
        $response = array("status" => 1, "bankaddress_list" => $bankaddress_list);
        echo json_encode($response);
    } 
	
	//edit
	public function editbankAccounts( $bank_name_id ) {
        $bank_list = $this->Maintenance_Bank_Model->bankByID($bank_name_id);
        $response = array("status" => 1, "bank_list" => $bank_list);
        echo json_encode($response);
	}
	
	//post
	public function postbankaccount() {
       if( $this->Maintenance_Bank_Model->addbankAccount()) {  
            $response = array("status" => 1, "message" => "Bank Account created successfully");
			redirect('administrator/finance/bank_accounts');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
			redirect('administrator/finance/bank_accounts');
        }
        echo json_encode($response); 
	}
	
	
	//update
	public function updatebankaccount( $bank_name_id ) {
            if( $this->Maintenance_Bank_Model->updatebankaccount( $bank_name_id )) {  
                $response = array("status" => 1, "message" => "Bank Account updated successfully");
				redirect('administrator/finance/bank_accounts');
            } else {
                $response = array("status" => 0, "message" => "Technical problem");
				redirect('administrator/finance/bank_accounts');
            }
        echo json_encode($response);
	}
	//delete
	 public function deletebankaccount( $bank_name_id ) {
        if( $this->Maintenance_Bank_Model->deletebankaccount( $bank_name_id ) ) {
            $response = array("status" => 1, "message" => "Bank Account deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
	}
	
	
	/* bank account maintenance end */
	
	/* quick entries start */
	
	public function quickentries() {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'Quick Entries';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/maintenance/quick_entries', $data); 
	}
	
	/* quick entries end */
	
	/* account tags start */
	
	public function account_tags() {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'Account Tags';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/maintenance/account_tags', $data); 
	}
	
	/* account tags end */
	
	/* gl accounts start */
	
	public function glaccounts () {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'GL Accounts';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/maintenance/gl_accounts', $data); 
	}
	
	/* gl accounts  end */
	
	/* gl account groups start */
	
	public function glaccount_groups () {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'GL Account Groups';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/maintenance/glaccount_groups', $data); 
	}
	
	/* gl account groups  end */
	
	/* gl account classes start */
	
	public function glaccount_classes () {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'GL Account Classes';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/maintenance/glaccount_classes', $data); 
	}
	
	/* gl account classes  end */
	/*Tax  start*/
	public function tax() {        
        $data['page'] = 'Tax Sector';
		  $data['page_title'] = 'Tax';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/tax/tax', $data); 
	}

	/* Tax  end*/
	/* Tax Group Start */
	
	public function taxgroup() {        
        $data['page'] = 'Tax Sector';
		  $data['page_title'] = 'Tax Group';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/tax/taxgroup', $data); 
	}
	/*Tax group end */
	/*item tax start */
	public function itemtax() {        
        $data['page'] = 'Tax Sector';
		  $data['page_title'] = 'Item Tax Types';
        $data['page_module'] = 'finance';		
        $this->load->view('finance/banking/tax/itemtax', $data); 
	}
	/*item tax end */
	
	/* banking and general ledger start */
}
