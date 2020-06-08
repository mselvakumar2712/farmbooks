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
      if (!$this->session->userdata('name') || $this->session->userdata('user_type') != 3 || $this->session->userdata('is_active') == 0){  
         redirect('administrator/login/signout');
      }
      $this->load->model("Finance_Model");
      $this->load->model("Supplier_Model");
      $this->load->model("Login_Model");
      $this->load->model("Location_Model");
      $this->load->model("Fpo_Model");
      $this->load->model("Customer_Model");
      $this->load->model("Share_Model");
      $this->load->model("Masterdata_Model");
      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}
	
	/* banking and general ledger start */
	
	/* payements start */
	public function payments() {        
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Payments';
      $data['page_module'] = 'finance';
      $fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
		$data['formation_date'] = $appointment_date->date_formation;
		$voucher_no = $this->Finance_Model->getLastTransactionByFPO($this->session->userdata('user_id'), 1);
		$data['voucher_no'] = 'PT'.str_pad(($voucher_no+1), 5, '0', STR_PAD_LEFT);
		$this->load->view('finance/banking/transaction/payments', $data); 
	}
	
   public function postPayment() {        
      if( $this->Finance_Model->postPayment() ) {
         $this->session->set_flashdata('success', 'Payment successfully added');
         redirect('fpo/finance/payments','refresh');
      } else {
         $this->session->set_flashdata('warning', 'Technical problem');
         redirect('fpo/finance/payments');
      }                
	}
	/* payements end */
	
	/* deposites start */
	public function deposits() {        
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Deposits';
      $data['page_module'] = 'finance';
		$fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
		$data['formation_date'] = $appointment_date->date_formation;
		$voucher_no = $this->Finance_Model->getLastTransactionByFPO($this->session->userdata('user_id'), 2);
		$data['voucher_no'] = 'RT'.str_pad(($voucher_no+1), 5, '0', STR_PAD_LEFT);
		$this->load->view('finance/banking/transaction/deposites', $data); 
	}
	
    public function postDeposit() {       
        if( $this->Finance_Model->postDeposit() ) {
            $this->session->set_flashdata('success', 'Deposited successfully');
            redirect('fpo/finance/deposits','refresh');
        } else {
            $this->session->set_flashdata('warning', 'Technical problem');
            redirect('fpo/finance/deposits');
        }                
	}
	/* deposites end */
	
    
    
	/* bank account start */
	public function bankaccounts() {        
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Bank Accounts';
      $data['page_module'] = 'finance';	
      $data['ledger_type'] = $this->Finance_Model->gl_code(); 
		$fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
		$data['formation_date'] = $appointment_date->date_formation;
		$voucher_no = $this->Finance_Model->getLastTransactionByFPO($this->session->userdata('user_id'), 3);
		$data['voucher_no'] = 'CT'.str_pad(($voucher_no+1), 5, '0', STR_PAD_LEFT);
		$data['banks'] = $this->Finance_Model->getAllBankByFPO();
      $this->load->view('finance/banking/transaction/bank_accounts', $data); 
	}
	
    public function postBankAccountTransfer() {
        if( $this->Finance_Model->postBankAccountTransfer() ) {
            $this->session->set_flashdata('success', 'Transferred successfully');            
            redirect('fpo/finance/bankaccounts'); 
        } else {
            $this->session->set_flashdata('warning', 'Technical problem');
            redirect('fpo/finance/bankaccounts');
        }                
	}
	/* bank account end */
	
    
    
	/* journal entry start */
	public function journalentry() {        
         $data['page'] = 'Transaction';
         $data['page_title'] = 'Journal Entry';
         $data['page_module'] = 'finance';
         $fpo_id = $this->session->userdata('user_id');
         $appointment_date = $this->Fpo_Model->fpo_formation_date();
         $data['formation_date'] = $appointment_date->date_formation;
		$voucher_no = $this->Finance_Model->getLastTransactionByFPO($this->session->userdata('user_id'), 4);
		$data['voucher_no'] = 'JL'.str_pad(($voucher_no+1), 5, '0', STR_PAD_LEFT);
        $this->load->view('finance/banking/transaction/journal_entry', $data); 
	}
    
	public function postJournalEntry() {
        if( $this->Finance_Model->postJournalEntry() ) {
            $this->session->set_flashdata('success', 'Journal entry successfully added');
            redirect('fpo/finance/journalentry');
        } else {
            $this->session->set_flashdata('warning', 'Technical problem');
            redirect('fpo/finance/journalentry');
        }                
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
	
    public function postJournalInquiry() {
        $journalInquiry = $this->Finance_Model->postJournalInquiry();
        $response = array("status" => 1, "journalInquiry" => $journalInquiry);
        echo json_encode($response);       
	}
	/*  journal inquiry end */
	
    
    
	/*  general ledger inquiry start */
	public function glinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'GL Inquiry';
        $data['page_module'] = 'finance';	
        
        $data['banks'] = $this->Finance_Model->getAllBankByFPO();
        $this->load->view('finance/banking/inquiries_reports/general_ledger_inquiry', $data); 
	}
   
	
    public function postGLInquiry() {
        $gl_Inquiry = $this->Finance_Model->postGLInquiry();
        $response = array("status" => 1, "gl_Inquiry" => $gl_Inquiry);
        echo json_encode($response);       
	}
	/* general ledger inquiry end */
	
	/*gl reports */
    public function glreports() {        
        $data['page']        = 'Inquiries and Reports';
		$data['page_title']  = 'GL Reports';
        $data['page_module'] = 'finance';	
        $this->load->view('finance/banking/inquiries_reports/glreports', $data); 
	}
    public function getglinfo() {
        $allLedgers=[];
        $ledger_type = $this->Finance_Model->gl_code();
		$bank_list = $this->Finance_Model->getAllBankByFPO();
        if($ledger_type || $bank_list){
            $allLedgers[0]['cashbook'] = "Cash Book";
            $allLedgers[0]['ledger_type'] = $ledger_type;
			$allLedgers[0]['bank_list'] = $bank_list;
        }
        $deptors = $this->Finance_Model->getAllDebtorsByFPO();
        if($deptors) {
            $allLedgers[0]['customer'] = "Customers";
            $allLedgers[0]['customer_list'] = $deptors;
        }
        
        $suppliers = $this->Finance_Model->getAllSupplierByFPO();
        if($suppliers) {
            $allLedgers[1]['supplier'] = "Suppliers";
            $allLedgers[1]['supplier_list'] = $suppliers;
        }
        
        $gl_list = $this->Finance_Model->getgldata();
        if($gl_list) {
            $allLedgers[2]['gl_trans'] = "GL List";
            $allLedgers[2]['gl_list'] = $gl_list;
        }
        $response = array("status" => 1, "gl_list" => $allLedgers);
        echo json_encode($response);
    }
    public function postGLreports(){
		$currentMonth = date("m", strtotime($this->input->post("ledger_from")));
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = date("Y-m-d");
		} else {
			$fromValue = date('Y-04-01');
			$toValue = date("Y-m-d");
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;
		
        $gl_Inquiry = $this->Finance_Model->postGLreports();
		$closing_balance = $this->Finance_Model->closingBalanceGLcashreports(2, $fromValue, $toValue);
		$tempClosingBalance = $closing_balance->balance;
		for($i=0;$i<count($gl_Inquiry);$i++){
			$firstCharacter = substr($gl_Inquiry[$i]->amount, 0, 1);
			if($firstCharacter != '-'){
				$tempClosingBalance = $tempClosingBalance+$gl_Inquiry[$i]->amount;
			} else {
				$tempClosingBalance = ($tempClosingBalance)+($gl_Inquiry[$i]->amount);
			}
			$gl_Inquiry[$i]->balance = $tempClosingBalance;
		}
        $response = array("status" => 1, 'closing_balance' => $closing_balance, "gl_Inquiry" => $gl_Inquiry, 'balance' => $tempClosingBalance);
        echo json_encode($response);       
	}
   public function postGLcashreports(){
		$currentMonth = date("m", strtotime($this->input->post("ledger_from")));
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = date("Y-m-d");
		} else {
			$fromValue = date('Y-04-01');
			$toValue = date("Y-m-d");
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;
		
		$gl_Inquiry = $this->Finance_Model->postGLcashreports();
		$closing_balance = $this->Finance_Model->closingBalanceGLcashreports($this->input->post("type"), $fromValue, $toValue);
		$tempClosingBalance = $closing_balance->balance;
		for($i=0;$i<count($gl_Inquiry);$i++){			
			$firstCharacter = substr($gl_Inquiry[$i]->amount, 0, 1);
			if($firstCharacter != '-'){
				$tempClosingBalance = $tempClosingBalance + $gl_Inquiry[$i]->amount;
			} else {
				$tempClosingBalance = ($tempClosingBalance)+($gl_Inquiry[$i]->amount);
			}
			$gl_Inquiry[$i]->balance = $tempClosingBalance;
		}
		
        $response = array("status" => 1, 'closing_balance' => $closing_balance, "gl_Inquiry" => $gl_Inquiry, 'balance' => $tempClosingBalance);
		echo json_encode($response);    
	}
   public function postGLcustomerreports(){
		$currentMonth = date("m", strtotime($this->input->post("ledger_from")));
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = date("Y-m-d");
		} else {
			$fromValue = date('Y-04-01');
			$toValue = date("Y-m-d");
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;
		
        $gl_Inquiry1 = $this->Finance_Model->postGLPersonReports(2, 2);
		$gl_Inquiry2 = $this->Finance_Model->getPersonGLReport(2, $this->input->post('account_holder'));
		$gl_Inquiry = array_merge($gl_Inquiry1, $gl_Inquiry2);
		$closing_balance = $this->Finance_Model->closingBalanceGLcashreports(2, $fromValue, $toValue);
		$tempClosingBalance = $closing_balance->balance;
		for($i=0;$i<count($gl_Inquiry);$i++){
			$firstCharacter = substr($gl_Inquiry[$i]->amount, 0, 1);
			if($firstCharacter != '-'){
				$tempClosingBalance = $tempClosingBalance+$gl_Inquiry[$i]->amount;
			} else {
				$tempClosingBalance = ($tempClosingBalance)+($gl_Inquiry[$i]->amount);
			}
			$gl_Inquiry[$i]->balance = $tempClosingBalance;
		}
        $response = array("status" => 1, 'closing_balance' => $closing_balance, "gl_Inquiry" => $gl_Inquiry, 'balance' => $tempClosingBalance);
        echo json_encode($response);       
	}
   public function postGLsupplierreports(){
		$currentMonth = date("m", strtotime($this->input->post("ledger_from")));
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = date("Y-m-d");
		} else {
			$fromValue = date('Y-04-01');
			$toValue = date("Y-m-d");
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;
		
        $gl_Inquiry1 = $this->Finance_Model->postGLPersonReports(1, 1);
		$gl_Inquiry2 = $this->Finance_Model->getPersonGLReport(1, $this->input->post('account_holder'));
		$gl_Inquiry = array_merge($gl_Inquiry1, $gl_Inquiry2);
		$closing_balance = $this->Finance_Model->closingBalanceGLcashreports(1, $fromValue, $toValue);		
		$tempClosingBalance = $closing_balance->balance;
		for($i=0;$i<count($gl_Inquiry);$i++){
			$firstCharacter = substr($gl_Inquiry[$i]->amount, 0, 1);
			if($firstCharacter != '-'){
				$tempClosingBalance = $tempClosingBalance+$gl_Inquiry[$i]->amount;
			} else {
				$tempClosingBalance = ($tempClosingBalance)+($gl_Inquiry[$i]->amount);
			}
			$gl_Inquiry[$i]->balance = $tempClosingBalance;
		}
        $response = array("status" => 1, "gl_Inquiry" => $gl_Inquiry, 'closing_balance' => $closing_balance, 'balance' => $tempClosingBalance);
        echo json_encode($response);       
	}
    
	/*  bank account inquiry start */
	public function bankaccountinquiry(){        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Bank Account Inquiry';
        $data['page_module'] = 'finance';	
        
        $data['banks'] = $this->Finance_Model->getAllBankByFPO();
        $this->load->view('finance/banking/inquiries_reports/bank_account_inquiry', $data); 
	}
	
    public function postBankAccountInquiry() {
        $accountInquiry = $this->Finance_Model->postBankAccountInquiry();
        $response = array("status" => 1, "accountInquiry" => $accountInquiry);
        echo json_encode($response);       
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
      $data['fromValue'] = date("Y-m-d");
      $data['toValue'] = date("Y-m-d");	
      $data['showPage'] = 0;
      $this->load->view('finance/banking/inquiries_reports/trial_balance', $data); 
	}
	
    public function postTrialBalance(){
      $data['page'] = 'Inquiries and Reports';
      $data['page_title'] = 'Trial Balance';
      $data['page_module'] = 'finance';
		
      $fromValue = $this->input->post('trial_from');
      $toValue = $this->input->post('trial_to');
      $data['fromValue'] = $fromValue;
      $data['toValue'] = $toValue;
      $lastYearFromValue = date('Y-04-01',strtotime("-1 year"));
      $lastYearToValue = date( 'Y-m-d', strtotime( $fromValue . ' -1 day' ) );
      $data['fpoData'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		
		$data['incomeGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 101, 1);
		$data['expenseGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 201, 2);
		$incomeCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 1);
		$expenseCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 2);		
		if($incomeCost){
			$data['incomeCost']=$incomeCost->amount;
		} else {
			$data['incomeCost'] = 0;
			$data['incomeGLData'] = [];
		}			
		if($expenseCost){
			$data['expenseCost']=$expenseCost->amount;		
		} else {
			$data['expenseCost']=0;
			$data['expenseGLData'] = [];
		}
		
		/* Current year closing stock calculations end */
		$purchase_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $fromValue, $toValue, 1);
		$sales_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $fromValue, $toValue, 2);		
		if($purchase_stock->total_qty != null && $purchase_stock->total_amount != null){
			$averageQty = $purchase_stock->total_qty + $sales_stock->total_qty;
			$purchaseValue = $purchase_stock->total_amount / $purchase_stock->total_qty;
			$data['closingStock'] = round($purchaseValue)*$averageQty;		
		} else {
			$data['closingStock'] = 0;		
		}	
		/* Current year closing stock calculations end */	
		
		/* Opening stock calculations starts */
		$lastYear_purchase_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 1);
		$lastYear_sales_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 2);				
			if($lastYear_purchase_stock->total_qty != null && $lastYear_purchase_stock->total_amount != null){
				$averageQty = $lastYear_purchase_stock->total_qty + $lastYear_sales_stock->total_qty;
				$purchaseValue = $lastYear_purchase_stock->total_amount / $lastYear_purchase_stock->total_qty;
				$data['openingStock'] = -(round($purchaseValue)*$averageQty);		
			} else {
				$data['openingStock'] = 0;		
			}
		//echo $data['openingStock'];die;
		/* Opening stock calculations end */			
		
		/* Closing stock update */
		if($data['closingStock']){			
			//$data['incomeCost'] = $data['incomeCost']+$data['closingStock'];
		}
			
		/* Closing stock update */
		if($data['openingStock']){
			$data['expenseCost'] = $data['expenseCost']+$data['openingStock'];
		}
			
		
		$data['liablityGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 301, 3);
		$data['assetGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 401, 4);				
		$liablityCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 3);
		$assetCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 4);		
			if($liablityCost){
				$data['liablityCost']=$liablityCost->amount;
			} else {
				$data['liablityCost'] = 0;
				$data['liablityGLData'] = [];
			}			
			if($assetCost){
				$data['assetCost']=$assetCost->amount;		
			} else {
				$data['assetCost']=0;
				$data['assetGLData'] = [];
			}
		//echo "<pre>";print_r($data);die;
		/* Net profit Updation Calculations */		
		$firstCharacter = substr($data['expenseCost'], 0, 1);
		if($firstCharacter != '-'){
			$data['netProfit'] = ($data['incomeCost']+$data['closingStock'])-$data['expenseCost'];
		} else {
			$data['netProfit'] = ($data['incomeCost']+$data['closingStock'])+$data['expenseCost'];
		}
      
      //echo "<pre>";print_r($data);die;
			if($data['netProfit'] >= 0){
				$data['liablityCost'] = $data['liablityCost']+$data['netProfit'];
			} else {
				$data['liablityCost'] = $data['liablityCost']-ltrim($data['netProfit'], '-');
			}
			$data['incomeCost'] = $data['incomeCost'];
		/* Net profit Updation Calculations end */
		
		if($data['closingStock']){
			//$data['assetCost'] = $data['assetCost']+$data['closingStock'];				
		} 
		
		$data['showPage'] = 1;
        $this->load->view('finance/banking/inquiries_reports/trial_balance', $data); 
	}
	/*  trial balance end */
	
    
    
	/* balance sheet drilldown start */	
	public function balancesheetdrilldown() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Balance Sheet Drilldown';
        $data['page_module'] = 'finance';	

		$currentMonth = date('m');
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = date("Y-m-d");
		} else {
			$fromValue = date('Y-04-01');
			$toValue = date("Y-m-d");
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;
				
		$data['fpoData'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));	
		$data['showPage'] = 0;
        $this->load->view('finance/banking/inquiries_reports/balance_sheet_drilldown', $data); 
	}
		
	
    public function balanceSheetReports() {
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Balance Sheet Drilldown';
        $data['page_module'] = 'finance';		
		
		$currentMonth = date('m');
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = $this->input->post('as_at');
		} else {
			$fromValue = date('Y-04-01');
			$toValue = $this->input->post('as_at');
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;
		$lastYearFromValue = date('Y-04-01',strtotime("-2 year"));
		$lastYearToValue = date('Y-03-31',strtotime("-1 year"));
		$data['fpoData'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));				
		
		/* Income or Expense values finding starts */
		$incomeCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 1);
		$expenseCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 2);		
			if($incomeCost){
				$data['incomeCost']=$incomeCost->amount;
			} else {
				$data['incomeCost'] = 0;
			}		
			if($expenseCost){
				$data['expenseCost']=$expenseCost->amount;		
			} else {
				$data['expenseCost']=0;
			}
		/* Income or Expense values finding end */			
		
		/* Current year closing stock calculations starts */
		$purchase_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $fromValue, $toValue, 1);
		$sales_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $fromValue, $toValue, 2);				
			if($purchase_stock->total_qty != null && $purchase_stock->total_amount != null){
				$averageQty = $purchase_stock->total_qty + $sales_stock->total_qty;
				$purchaseValue = $purchase_stock->total_amount / $purchase_stock->total_qty;
				$data['closingStock'] = -(round($purchaseValue)*$averageQty);
			} else {
				$data['closingStock'] = 0;
			}
			$data['incomeCost'] = $data['incomeCost']-$data['closingStock'];
		/* Closing stock calculations end */
		
		/* Opening stock calculations starts */		
		$lastYear_purchase_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 1);
		$lastYear_sales_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 2);				
			if($lastYear_purchase_stock->total_qty != null && $lastYear_purchase_stock->total_amount != null){
				$averageQty = $lastYear_purchase_stock->total_qty + $lastYear_sales_stock->total_qty;
				$purchaseValue = $lastYear_purchase_stock->total_amount / $lastYear_purchase_stock->total_qty;
				$data['openingStock'] = round($purchaseValue)*$averageQty;		
			} else {
				$data['openingStock'] = 0;		
			}	
		$data['expenseCost'] = $data['openingStock']+$data['expenseCost'];
		/* Opening stock calculations end */				
				
		/* Ledger/Supplier/Customer opening balance calculations starts */	
		$ledger_opening_cash = $this->Finance_Model->getLedgerBalance($this->session->userdata('user_id'), $fromValue, $toValue, 0);
			if($ledger_opening_cash->total_amount){		
				$data['ledgerBalance'] = $ledger_opening_cash->total_amount;
			} else {
				$data['ledgerBalance'] = 0;
			}
		/* Ledger Opening balance calculations end */
				
		
		
		$data['liablityGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 301, 3);
		$data['assetGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 401, 4);				
		$liablityCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 3);
		$assetCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 4);		
		
         if($liablityCost){
				$data['liablityCost']=$liablityCost->amount;
			} else {
				$data['liablityCost'] = 0;
				$data['liablityGLData'] = [];
			}			
			if($assetCost){
				$data['assetCost']=$assetCost->amount;		
			} else {
				$data['assetCost']=0;
				$data['assetGLData'] = [];
			}						
	

		/* Net profit Updation Calculations */		
		$firstCharacter = substr($data['expenseCost'], 0, 1);
		if($firstCharacter != '-'){
			$data['netProfit'] = $data['incomeCost']-$data['expenseCost'];
		} else {
			$data['netProfit'] = $data['incomeCost']+$data['expenseCost'];
		}
			if($data['netProfit'] >= 0){
				$data['liablityCost'] = $data['liablityCost']+$data['netProfit'];
			} else {
				$data['liablityCost'] = $data['liablityCost']-ltrim($data['netProfit'], '-');
			}
			$data['incomeCost'] = $data['incomeCost'];
		/* Net profit Updation Calculations end */
		
					
		/* Income cost value updation */
		if($data['incomeCost']){			
			//$data['assetCost'] = $data['assetCost']+$data['incomeCost'];
		}
		/* Closing stocks updation calculations */
		if($data['closingStock'] && $data['openingStock'] == 0){
			$data['assetCost'] = $data['assetCost']+$data['closingStock'];				
		} else {
			$data['closingStock'] = $data['openingStock']+$data['closingStock'];
			$data['assetCost'] = $data['assetCost']-$data['closingStock'];			
		}
		
		
		//echo '<br>Tot A:'.$data['assetCost'].':Tot L:'.$data['liablityCost'];
		//die;
      
		$data['total_equity'] = ltrim($data['assetCost'], '-')-ltrim($data['liablityCost'], '-');
		$data['showPage'] = 1;
		$this->load->view('finance/banking/inquiries_reports/balance_sheet_drilldown', $data); 
	}
	/* balance sheet drilldown end */
	
    
    
	/* profit and loss drilldown start */	
	public function profitandloss() {        
      $data['page'] = 'Inquiries and Reports';
      $data['page_title'] = 'Profit And Loss Drilldown';
      $data['page_module'] = 'finance';		

		$currentMonth = date('m');
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = date("Y-m-d");
		} else {
			$fromValue = date('Y-04-01');
			$toValue = date("Y-m-d");
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;		
		$data['fpoData'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$data['showPage'] = 0;		
        $this->load->view('finance/banking/inquiries_reports/profit_loss_drilldown', $data); 
	}
	
    public function profitAndLossReports() {
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Profit And Loss Drilldown';
		$data['page_module'] = 'finance';		
	  
		$fromValue = $this->input->post('profit_loss_from');
        $toValue = $this->input->post('profit_loss_to');
        $data['fromValue'] = $fromValue;$data['toValue'] = $toValue;
		
		$data['fpoData'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));		
		
		$data['incomeGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 101, 1);
		$data['expenseGLData'] = $this->Finance_Model->getAllGLParent($this->session->userdata('user_id'), $fromValue, $toValue, 201, 2);
		$incomeCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 1);
		$expenseCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, 2);		
		if($incomeCost){
			$data['incomeCost']=$incomeCost->amount;
		} else {
			$data['incomeCost'] = 0;
			$data['incomeGLData'] = [];
		}			
		if($expenseCost){
			$data['expenseCost']=$expenseCost->amount;		
		} else {
			$data['expenseCost']=0;
			$data['expenseGLData'] = [];
		}
		//echo $data['incomeCost'].':::'.$data['expenseCost'];
		
		/* Current year closing stock calculations end */
		$purchase_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $fromValue, $toValue, 1);
		$sales_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $fromValue, $toValue, 2);		
		if($purchase_stock->total_qty != null && $purchase_stock->total_amount != null){
			$averageQty = $purchase_stock->total_qty + $sales_stock->total_qty;
			$purchaseValue = $purchase_stock->total_amount / $purchase_stock->total_qty;
			$data['closingStock'] = round($purchaseValue)*$averageQty;		
		} else {
			$data['closingStock'] = 0;		
		}	
		//echo "<br>With Current Closing:".$data['closingStock'];	
		/* Current year closing stock calculations end */	
		
		/* Opening stock calculations starts */
		$lastYearFromValue = date('Y-04-01',strtotime("-2 year"));
		$lastYearToValue = date('Y-03-31',strtotime("-1 year"));
		$lastYear_purchase_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 1);
		$lastYear_sales_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 2);				
			if($lastYear_purchase_stock->total_qty != null && $lastYear_purchase_stock->total_amount != null){
				$averageQty = $lastYear_purchase_stock->total_qty + $lastYear_sales_stock->total_qty;
				$purchaseValue = $lastYear_purchase_stock->total_amount / $lastYear_purchase_stock->total_qty;
				$data['openingStock'] = round($purchaseValue)*$averageQty;		
			} else {
				$data['openingStock'] = 0;		
			}
		/*$purchase_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 1);
		$sales_stock = $this->Finance_Model->getAllInventorySum($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 2);				
			if($purchase_stock->total_qty != null && $purchase_stock->total_amount != null){
				$averageQty = $purchase_stock->total_qty + $sales_stock->total_qty;
				$purchaseValue = $purchase_stock->total_amount / $purchase_stock->total_qty;
				$data['lastYearClosingStock'] = round($purchaseValue)*$averageQty;		
			} else {
				$data['lastYearClosingStock'] = 0;		
			}*/
		//echo "<br>With last year closing:".$data['lastYearClosingStock'];	
		//$data['closingStock'] = $data['closingStock']+$data['lastYearClosingStock'];
		/* Opening stock calculations end */						
			
		/* Ledger/Supplier/Customer opening balance calculations starts */	
		$ledger_opening_cash = $this->Finance_Model->getLedgerBalance($this->session->userdata('user_id'), $lastYearFromValue, $lastYearToValue, 0);
			if($ledger_opening_cash->total_amount){		
				$data['ledgerBalance'] = $ledger_opening_cash->total_amount;
			} else {
				$data['ledgerBalance'] = 0;
			}
		/* Ledger Opening balance calculations end */		
		/* Cash in Bank */
		$bank_cash = $this->Finance_Model->getAllCashInBankAmount($this->session->userdata('user_id'), $fromValue, $toValue, 2);
		if($bank_cash->total_amount){		
			$data['cashInBank'] = $bank_cash->total_amount;
		} else {
			$data['cashInBank'] = 0;
		}
		/* Cash in Bank end */		
		
		/* Opening ledger balance update */
		//if($data['ledgerBalance']){
			//$data['incomeCost'] = $data['incomeCost']+$data['ledgerBalance'];
		//}		
		/* Cash in bank update */
		//if($data['cashInBank']){
			//$data['incomeCost'] = $data['incomeCost']+$data['cashInBank'];
		//}		

		/* Ledger and bank balance update */
		/*if($data['ledgerBalance'] || $data['cashInBank']){
			$data['openingBalance'] = $data['ledgerBalance']+$data['cashInBank'];
			$data['incomeCost'] = $data['incomeCost']+$data['openingBalance'];
		}
		if(!isset($data['openingBalance'])){
			$data['openingBalance']=0;
		}*/
		
		/* Closing stock update */
		if($data['closingStock']){			
			$data['incomeCost'] = $data['incomeCost']+$data['closingStock'];
		}
	
		
		/* Closing stock update */
		if($data['openingStock']){
			$data['expenseCost'] = $data['expenseCost']+$data['openingStock'];
		}
		
		//echo $data['incomeCost'].':::'.$data['expenseCost'];
		$firstCharacter = substr($data['expenseCost'], 0, 1);
		if($firstCharacter != '-'){
			$netAmount = $data['incomeCost']-$data['expenseCost'];
		} else {
			$netAmount = $data['incomeCost']+$data['expenseCost'];
		}
		//$netAmount = $data['incomeCost']-($data['expenseCost']);	
		if($netAmount >= 0){
			$data['netIncome'] = $netAmount;
			//$data['expenseCost'] = $data['expenseCost']-$data['netIncome'];
		} else {
			$data['netExpense'] = $netAmount;
			//$data['incomeCost'] = $data['incomeCost']+$data['netExpense'];
		}
		
		/* if(isset($data['netIncome'])){			
			$data['expenseCost'] = $data['expenseCost']+$data['netIncome'];
		}
		if(isset($data['netExpense'])){			
			$data['incomeCost'] = $data['incomeCost']+$data['netExpense'];
		} */
		
		//die;
		//$data['incomeCost'] = $data['incomeCost']+$data['closingStock'];				
		$data['showPage'] = 1;	
		$this->load->view('finance/banking/inquiries_reports/profit_loss_drilldown', $data); 
	}
	
	public function viewledger($selectedCode) {
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Profit And Loss Drilldown';
		$data['page_module'] = 'finance';		

		$currentMonth = date('m');
		if($currentMonth <= 3){
			$fromValue = date('Y-04-01',strtotime("-1 year"));
			$toValue = date("Y-m-d");
		} else {
			$fromValue = date('Y-04-01');
			$toValue = date("Y-m-d");
		}
		$data['fromValue'] = $fromValue;
		$data['toValue'] = $toValue;
			
		$data['ledgerData'] = $this->Finance_Model->getAllLedgerByParents($this->session->userdata('user_id'), $fromValue, $toValue, $selectedCode);
		$ledgerTotalCost = $this->Finance_Model->getAllGLParentCost($this->session->userdata('user_id'), $fromValue, $toValue, $selectedCode);		
		if($ledgerTotalCost){
			$data['ledgerTotalCost']=$ledgerTotalCost->amount;
		} else {
			$data['ledgerTotalCost'] = 0;
			$data['ledgerData'] = [];
		}
		
		$firstCharacter = substr($selectedCode, 0, 1);
		if($firstCharacter > 2){
			$data['reportType'] = 2;
		} else {
			$data['reportType'] = 1;
		}
        $this->load->view('finance/banking/inquiries_reports/view_ledgers', $data); 
	}
	
	public function getChildNodeByCode(){
		$fromValue = ($this->input->post('profit_loss_from'))?$this->input->post('profit_loss_from'):date('Y-04-01',strtotime("-1 year"));
		$toValue = $this->input->post('profit_loss_to');
		$selectedCode = $this->input->post('accountCode');
		
		$glCategory = $this->Finance_Model->getAllGLParentsChild($this->session->userdata('user_id'), $fromValue, $toValue, $selectedCode);
		$response = array("status" => 1, 'glCategory' => $glCategory);
        echo json_encode($response);   
	}
	
	public function getAllChildNodeByCode(){		
		$glCategory = $this->Finance_Model->getAllChildNodeByCode($this->session->userdata('user_id'));
		$response = array("status" => 1, 'glCategory' => $glCategory);
        echo json_encode($response);   
	}
	
	public function getChildNodeTotalByCode($selectedCode) {
		$glCategoryTotal = $this->Finance_Model->getIncomeByGroup('', '', $selectedCode);
		$response = array("status" => 1, 'glCategoryTotal' => $glCategoryTotal);
        echo json_encode($response);   
	}
	/* profit and loss drilldown end */
	
    
    
	/* bank account maintenance start */    
    public function bank_accounts() {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'Bank Accounts Maintenance';
        $data['page_module'] = 'finance';	
		$data['bank_name'] = $this->Finance_Model->bank_name_list();
		$data['bank_info'] = $this->Finance_Model->bankAccount_List();
        $data['chart_master'] = $this->Finance_Model->gl_ChartMasterList();
        $this->load->view('finance/banking/maintenance/bank_accounts', $data); 
	}
//	//add
//	public function addbankAccount() {        
//        $data['page'] = 'Maintenance';
//		$data['page_title'] = 'Bank Accounts Maintenance';
//        $data['page_module'] = 'finance';
//		$data['bank_name'] = $this->Finance_Model->bank_name_list();
//		$data['fpo'] = $this->Finance_Model->fpoDropdownList();
//        $this->load->view('finance/banking/maintenance/bank_accounts', $data); 
//	} 
	
	//view
	public function viewbankAccounts($bank_name_id) {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'Bank Accounts Maintenance';
        $data['page_module'] = 'finance';	
		$data['bank_name'] = $this->Finance_Model->bank_name_list();
		$data['bank_info'] = $this->Finance_Model->bankByID($bank_name_id);
        $data['chart_master'] = $this->Finance_Model->gl_ChartMasterList();
		$this->load->view('finance/banking/maintenance/bank_accounts_edit', $data);		
	}
	
	public function getBankAddressByBankName($bank_name_id)  {
        $bankaddress_list = $this->Finance_Model->getBankAddressByBankName($bank_name_id);
        $response = array("status" => 1, "bankaddress_list" => $bankaddress_list);
        echo json_encode($response);
    } 
    
    /** Chart master list data **/
    public function getChartmasterList()  {
        $chart_master = $this->Finance_Model->chartMasterList();
        $response = array("status" => 1, "chart_master" => $chart_master);
        echo json_encode($response);
    } 
	
	//edit
	public function editbankAccounts( $bank_name_id ) {
        $bank_list = $this->Finance_Model->bankByID($bank_name_id);
        $response = array("status" => 1, "bank_list" => $bank_list);
        echo json_encode($response);
	}
	
	//post
	public function postbankaccount() {
      //print_r($this->input->post());die;
		if($this->postBankAccountValidator() == 0) {
			$this->session->set_flashdata('danger', 'Provide the mandatory fields.'); 
			redirect('fpo/finance/bank_accounts');
        }else{
			if( $this->Finance_Model->addbankAccount()) {  
				$this->session->set_flashdata('success', 'Bank Account created successfully.'); 
				redirect('fpo/finance/bank_accounts');
				
			} else {
				$this->session->set_flashdata('danger', 'Provide the mandatory fields.'); 
				redirect('fpo/finance/bank_accounts');
			} 
	}
     // echo json_encode($response); 
	}	
  
	function postBankAccountValidator() {
         if(empty($this->input->post('account_no')) || empty($this->input->post('bank_account_name')) || empty($this->input->post('account_type')) || empty($this->input->post('bank_name'))  || $this->input->post('bank_address') == 0 ) {
            return false;
        } else {
            return true;
        }    
    }
	
	//update
	public function updatebankaccount( $bank_name_id ) {
        if( $this->Finance_Model->updatebankaccount( $bank_name_id )) {  
            $response = array("status" => 1, "message" => "Bank Account updated successfully");
		      redirect('fpo/finance/bank_accounts');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
		      redirect('fpo/finance/bank_accounts');
        }
        echo json_encode($response);
	}
    
	//delete
	 public function deletebankaccount( $bank_name_id ) {
        if( $this->Finance_Model->deletebankaccount( $bank_name_id ) ) {
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
	//28/11	
	public function glaccounts() {        
      $data['page'] = 'Maintenance';
      $data['page_title'] = 'GL Accounts';
      $data['page_module'] = 'finance';	
      $segs = $this->uri->segment_array();
      if(empty($segs[4])) {
         $data['gl_type'] = 'all';
         $data['bank_info'] = $this->Finance_Model->bankAccountGLAll();
         $data['cash_info'] = $this->Finance_Model->cashAccountGLAll();
         $data['customer_info'] = $this->Customer_Model->getCustomerGLAll();
         $data['supplier_info'] = $this->Supplier_Model->getSupplierGLAll();
         $data['glgroup_info'] = $this->Finance_Model->glAccountgroupGLAll();
         //echo "<pre>";print_r($data);die;
      }
      else {
         if($segs[4] == 'bank') {
            $data['bank_info'] = $this->Finance_Model->bankAccountGL();
            $data['gl_type'] = 'bank';
         }
         else if($segs[4] == 'cash') {
            $data['cash_info'] = $this->Finance_Model->cashAccountGL();
            $data['gl_type'] = 'cash';
         }
         else if($segs[4] == 'customer') {
            $data['customer_info'] = $this->Customer_Model->getCustomerGL();
            $data['gl_type'] = 'customer';
         }
         else if($segs[4] == 'supplier') {
            $data['supplier_info'] = $this->Supplier_Model->getSupplierGL();
            $data['gl_type'] = 'supplier';
         }
         else {
            $data['glgroup_info'] = $this->Finance_Model->glAccountgroupGL();
            $data['gl_type'] = $segs[4];
         }
      }
      $this->load->view('finance/banking/maintenance/gl_accounts', $data); 
	}
	//post
	public function postglaccounts() {
        $glType = $this->input->post('hGLType'); 
        if( $this->Finance_Model->addglAccounts()) {
            if($glType == 'gl') {
               $this->session->set_flashdata('success', 'GL Account updated successfully.');   
               redirect('fpo/finance/glaccounts/'.$glType);
            }
            else if($glType == 'bank') {
               $this->session->set_flashdata('success', 'Bank Account updated successfully.');  
               redirect('fpo/finance/glaccounts/'.$glType);
            }
            else if($glType == 'customer') {
               $this->session->set_flashdata('success', 'Customer Account updated successfully.');  
               redirect('fpo/finance/glaccounts/'.$glType);
            }
            else if($glType == 'supplier') {
               $this->session->set_flashdata('success', 'Supplier Account updated successfully.');  
               redirect('fpo/finance/glaccounts/'.$glType);
            }
            else if($glType == 'cash') {
               $this->session->set_flashdata('success', 'Cash Account updated successfully.');  
               redirect('fpo/finance/glaccounts/'.$glType);
            }
            else {
               $this->session->set_flashdata('success', 'Data updated successfully.');    
               redirect('fpo/finance/glaccounts');
            }
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
            redirect('fpo/finance/glaccounts');
        }
 	}
	//update
	public function updateglAccounts( $gl_acc_id ) {
        if( $this->Finance_Model->updateglAccounts( $gl_acc_id )) {  
            $response = array("status" => 1, "message" => "GL Account updated successfully");
		      redirect('fpo/finance/glaccounts');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
		      redirect('fpo/finance/glaccounts');
        }
        echo json_encode($response);
	}
	//view
	public function viewglaccount($id) {    
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'GL Account';
        $data['page_module'] = 'finance';
		$data['glgroup_info'] = $this->Finance_Model->glAccount_view($id);
		$data['gl_group_info'] = $this->Finance_Model->gl_ChartMasterList();
		$this->load->view('finance/banking/maintenance/gl_accounts_view', $data); 
	}
	//edit
	public function editglaccounts($id) {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'GL Account';
        $data['page_module'] = 'finance';
		$data['glgroup_info'] = $this->Finance_Model->glAccount_view($id);
		$data['gl_group_info'] = $this->Finance_Model->gl_ChartMasterList();
		$this->load->view('finance/banking/maintenance/gl_accounts_edit', $data); 
		
	}
	/* gl accounts  end */
	
    
    
/* gl account groups start */
	//28/11	
	public function glaccount_groups () {        
      $data['page'] = 'Maintenance';
      $data['page_title'] = 'GL Groups';
      $data['page_module'] = 'finance';	
      $data['gl_group_info'] = $this->Finance_Model->gl_ChartMasterList();
      //echo "<pre>";print_r($data);die;
      $this->load->view('finance/banking/maintenance/glaccount_groups', $data); 
	}
	//view
	public function viewglaccount_groups($id) {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'GL Account Groups';
        $data['page_module'] = 'finance';
		$data['glgroup_info'] = $this->Finance_Model->glAccountgroup_view($id);
		$this->load->view('finance/banking/maintenance/gl_accounts_groupsview', $data); 
		
	}
	//edit
	public function editglaccount_groups($id) {        
        $data['page'] = 'Maintenance';
		$data['page_title'] = 'GL Account Groups';
        $data['page_module'] = 'finance';
		$data['glgroup_info'] = $this->Finance_Model->glAccountgroup_view($id);
		$this->load->view('finance/banking/maintenance/gl_accounts_groupsedit', $data); 
		
	}
	//post
	public function postglaccount_group() {
        if( $this->Finance_Model->addglAccount_group()) {  
            $response = array("status" => 1, "message" => "GL Account Group created successfully");
			redirect('fpo/finance/glaccount_groups');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
			redirect('fpo/finance/glaccount_groups');
        }
        echo json_encode($response); 
	}
	
	//edit
	public function editpostglaccount_group( $gl_acc_grp_id ) {
        $glgroup_list = $this->Finance_Model->glacc_groupByID( $gl_acc_grp_id );
        $response = array("status" => 1, "glgroup_list" => $glgroup_list);
        echo json_encode($response);
	}
	
  	//update
	public function updateglAccount_group( $gl_acc_grp_id ) {
        if( $this->Finance_Model->updateglAccount_group( $gl_acc_grp_id )) {  
            $response = array("status" => 1, "message" => "GL Account Group updated successfully");
		      redirect('fpo/finance/glaccount_groups');
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
		      redirect('fpo/finance/glaccount_groups');
        }
        echo json_encode($response);
	}
    
	//delete
	 public function deleteglAccount_group( $gl_acc_grp_id ) {
        if( $this->Finance_Model->deleteglAccount_group( $gl_acc_grp_id ) ) {
            $response = array("status" => 1, "message" => "GL Account Group deleted successfully");
        } else {
            $response = array("status" => 0, "message" => "Technical problem");
        }
        echo json_encode($response);
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
	/* banking and general ledger start */    
//    public function getAllSupplierByFPO() {
//        $suppliers = $this->Finance_Model->getAllSupplierByFPO();
//        $response = array("status" => 1, "supplier_list" => $suppliers);
//        echo json_encode($response);
//    }
//    
//    public function getAllDebtorsByFPO() {
//        $deptors = $this->Finance_Model->getAllDebtorsByFPO();
//        $response = array("status" => 1, "deptors" => $deptors);
//        echo json_encode($response);
//    }
    
    public function getAllBankByFPO() {
       $allLedgers=[];
         $gl_list_code = $this->Finance_Model->gl_code();
         
		$allLedgers[0]['gl_trans_code'] = "GL List";
        if($gl_list_code) {            
            $allLedgers[0]['gl_list_code'] = $gl_list_code;
        } else {
			$allLedgers[0]['gl_list_code'] = [];
		}
        
        $bank_list = $this->Finance_Model->getAllBankByFPO();
        if($bank_list) {
            $allLedgers[1]['bank'] = "Bank";
            $allLedgers[1]['bank_list'] = $bank_list;
        }
        $bank_list = $this->Finance_Model->getAllBankByFPO();
        $response = array("status" => 1, "bank_list" => $allLedgers);
        echo json_encode($response);
    }
    
    public function getAllGL() {
        $allLedgers=[];
        $deptors = $this->Finance_Model->getAllDebtorsByFPO();
        if($deptors) {
            $allLedgers[0]['customer'] = "Customers";
            $allLedgers[0]['customer_list'] = $deptors;
        }
        
        $suppliers = $this->Finance_Model->getAllSupplierByFPO();
        if($suppliers) {
            $allLedgers[1]['supplier'] = "Suppliers";
            $allLedgers[1]['supplier_list'] = $suppliers;
        }
        
        $gl_list = $this->Finance_Model->getAllGL();
        if($gl_list) {
            $allLedgers[2]['gl_trans'] = "GL List";
            $allLedgers[2]['gl_list'] = $gl_list;
        }
        $response = array("status" => 1, "gl_list" => $allLedgers);
        echo json_encode($response);
    }
    
//    public function getAllGLPayment() {
//        $payment_list = $this->Finance_Model->getAllGLPayment();
//        $response = array("status" => 1, "payment_list" => $payment_list);
//        echo json_encode($response);
//    }
//    
//    public function getAllGLReceipt() {
//        $receipt_list = $this->Finance_Model->getAllGLReceipt();
//        $response = array("status" => 1, "receipt_list" => $receipt_list);
//        echo json_encode($response);
//    }
//    
//    public function getPettyCashAccuntByFPO($account_from) {
//        $petty_account = $this->Finance_Model->getPettyCashAccuntByFPO($account_from);
//        $response = array("status" => 1, "account_type" => $petty_account);
//        echo json_encode($response);
//    }
    
    
	public function getAccountBalance() {
		$account_balance = $this->Finance_Model->getAccountBalance();
		$response = array("status" => 1, "account_balance" => $account_balance);
		echo json_encode($response);
	}
	public function getLedgerAccountBalance() {
		$ledger_balance = $this->Finance_Model->getLedgerAccountBalance();
		$response = array("status" => 1, "ledger_balance" => $ledger_balance);
		echo json_encode($response);
	}
	
	public function purchaseentry() { 
      $logger_type = $this->session->userdata('logger_type');
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Purchase Entry';
      $data['page_module'] = 'finance';
      $fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['formation_date'] = $appointment_date->date_formation;
      $data['ledger_type'] = $this->Finance_Model->gl_code();     
      $data['supplier'] = $this->Supplier_Model->supplier_list();
      //$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
      $data['location'] = $this->Supplier_Model->get_godownlist();
      $data['unit'] = $this->Supplier_Model->get_uomlist();
      if($logger_type == 'fpo') {
         $data['fpo_data'] = $this->Fpo_Model->getfpo($this->session->userdata('user_id'));
      }
      else if($logger_type == 'staff') {
         $data['fpo_data'] = $this->Fpo_Model->getfpo($this->session->userdata('user_id'));
      }		

		$lastInsertedID = $this->Fpo_Model->lastInsertedIdByFPO(1, $this->session->userdata('user_id'));
		if($lastInsertedID || $lastInsertedID==0){
			$data['last_voucher_no'] = /*$fpo_name.*/'PS'.str_pad(($lastInsertedID+1), 4, '0', STR_PAD_LEFT);			
		}
      /*$get_fpo_name=$this->Supplier_Model->fpoNameByID();
      $last_voucher=$get_fpo_name[0]->producer_organisation_name;
      if(!empty($last_voucher)){
         $fpo_name=substr($last_voucher,0,3);
         $get_supplier_no=$this->Supplier_Model->get_purchaseentry_lastid($this->session->userdata('user_id'));
         if(count($get_supplier_no) == 0){
            $data['last_voucher_no'] = $fpo_name.'PS'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
         } else {
            $data['last_voucher_no'] = $fpo_name.'PS'.str_pad(($get_supplier_no[0]['trans_no']+1), 4, '0', STR_PAD_LEFT);
         }    
      }*/
	  
		$product = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
		for($i=0;$i<count($product);$i++){
			if($product[$i]->stock_group_id == 3){	
				if($product[$i]->category_id == 13){
					$product[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			} else if($product[$i]->stock_group_id == 2){
				$product[$i]->product_name = $this->Masterdata_Model->cropNameById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
			} else {				
				if($product[$i]->category_id == 3 || $product[$i]->category_id == 4 || $product[$i]->category_id == 5){
					$product[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			}
		}
		$data['product_fpo'] = $product;
		$this->load->view('inventory/purchase/purchase_entry/add_purchase_entry', $data); 
	} 

	public function post_purchase_entry() {
      if( $this->Supplier_Model->add_purchase_entry()){
         $this->session->set_flashdata('success', 'New purchase entry added successfully.');       
         redirect('fpo/finance/purchaseentry');
      }else{
		$this->session->set_flashdata('warning', 'Data not inserted.');       
         redirect('fpo/finance/purchaseentry');
      } 
	}
   
	public function salesentry() {
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Sales Entry';
		$data['page_module'] = 'finance';
		$fpo_id = $this->session->userdata('user_id');
		$appointment_date = $this->Fpo_Model->fpo_formation_date();
		$data['formation_date'] = $appointment_date->date_formation;
		$data['ledger_type'] = $this->Finance_Model->gl_code();
		$data['customer'] = $this->Customer_Model->customer_list();
		$data['supply_location'] = $this->Masterdata_Model->godown_list();
		$data['fpo_data'] = $this->Fpo_Model->getfpo($this->session->userdata('user_id'));
 		$data['unit'] = $this->Customer_Model->get_uomlist();
		$data['debtor_trans_last_record'] = $this->Customer_Model->getFpoDebtorTransLastTransNo();
		
		$lastInsertedID = $this->Fpo_Model->lastInsertedIdByFPO(2, $this->session->userdata('user_id'));
		//$debtor_last_ref = $this->Customer_Model->getFpoDebtorLastRefNo();
		$data['invoice_prefix']='yes';			
		//if(!empty($debtor_last_ref)){
			//$data['debtor_trans_last_ref'] = preg_replace('/\D/', '',$debtor_last_ref->reference);
			if(!empty($data['fpo_data']->invoice_prefix and $data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.''.str_pad(($lastInsertedID+1), 3, '0', STR_PAD_LEFT).''.$data['fpo_data']->invoice_suffix;
			}else if(!empty($data['fpo_data']->invoice_prefix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.''.str_pad(($lastInsertedID+1), 3, '0', STR_PAD_LEFT);
			}else if(!empty($data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =str_pad(($lastInsertedID+1), 3,'0', STR_PAD_LEFT).''.$data['fpo_data']->invoice_suffix;
			}else {	
				$data['invoice_prefix']='no';
				$data['invoice_no'] =str_pad(($lastInsertedID+1), 3, '0', STR_PAD_LEFT);
			}			
		/*} else {
			if(!empty($data['fpo_data']->invoice_prefix and $data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.''.str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1'.$data['fpo_data']->invoice_suffix;
			}else if(!empty($data['fpo_data']->invoice_prefix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.''.str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1';
			}else if(!empty($data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1'.$data['fpo_data']->invoice_suffix;
			}else {
				$data['invoice_prefix']='no';
				$data['invoice_no'] =str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1';
			}			
		}*/
		
		
		if($lastInsertedID || $lastInsertedID==0){
			$data['last_voucher_no'] = /*$fpo_name.*/'SL'.str_pad(($lastInsertedID+1), 4, '0', STR_PAD_LEFT);			
		}
		
		$product = $this->Masterdata_Model->product_list($this->session->userdata('user_id'));
		for($i=0;$i<count($product);$i++){
			if($product[$i]->stock_group_id == 3){	
				if($product[$i]->category_id == 13){
					$product[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			} else if($product[$i]->stock_group_id == 2){
				$product[$i]->product_name = $this->Masterdata_Model->cropNameById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
			} else {				
				if($product[$i]->category_id == 3 || $product[$i]->category_id == 4 || $product[$i]->category_id == 5){
					$product[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				} else {
					$product[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($product[$i]->category_id, $product[$i]->sub_category_id, $product[$i]->product_id)->name;
				}
			}
		}
		$data['product'] = $product;
		$this->load->view('market/sales/transaction/sales_entry', $data); 
	}
	
	public function postsales_entry(){        
         if( $this->Customer_Model->add_salesentry()){
			 $this->session->set_flashdata('success', 'New sales entry added successfully.');       
			 redirect('fpo/finance/salesentry');
		} else {
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('fpo/finance/salesentry');
		} 
	}
    /*  debit note start */
	public function debitnote(){        
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Debit Note';
      $data['page_module'] = 'finance';	
      $fpo_id = $this->session->userdata('user_id');
      $appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['formation_date'] = $appointment_date->date_formation;        
      $allLedgers=[];
      $deptors = $this->Finance_Model->getAllDebtorsByFPO();
		$allLedgers[0]['customer'] = "Customers";
        if($deptors) {
            $allLedgers[0]['customer_list'] = $deptors;
        } else {
            $allLedgers[0]['customer_list'] = [];
		 }
        
      $suppliers = $this->Finance_Model->getAllSupplierByFPO();
		$allLedgers[1]['supplier'] = "Suppliers";
        if($suppliers) {            
            $allLedgers[1]['supplier_list'] = $suppliers;
        } else {
			$allLedgers[1]['supplier_list'] = [];
		}
        
      $gl_list = $this->Finance_Model->getAllGL();
		$allLedgers[2]['gl_trans'] = "GL List";
        if($gl_list) {            
            $allLedgers[2]['gl_list'] = $gl_list;
        } else {
			$allLedgers[2]['gl_list'] = [];
		}
		$data['ledger_entry']=$allLedgers;
		$allInvoiceno=[];
		
		$supp_invoice = $this->Finance_Model->getpurchaseInvoiceno();
		$cust_invoice = $this->Finance_Model->getsalesInvoiceno();
		if($supp_invoice) {
            $allInvoiceno[0]['purchase_invoice'] = $supp_invoice;
        } else {
            $allInvoiceno[0]['purchase_invoice'] = [];
		}
		
		if($cust_invoice) {
            $allInvoiceno[1]['sales_invoice'] = $cust_invoice;
        } else {
            $allInvoiceno[1]['sales_invoice'] = [];
		}
		$data['invoice_no']=$allInvoiceno;
		
		$voucher_no = $this->Finance_Model->getLastTransactionByFPO($this->session->userdata('user_id'), 7);
		$data['last_voucher_no'] = 'DN'.str_pad(($voucher_no+1), 5, '0', STR_PAD_LEFT);
		
		/*$get_fpo_name=$this->Supplier_Model->fpoNameByID();
		$last_voucher=$get_fpo_name[0]->producer_organisation_name;
		if(!empty($last_voucher)){
			$fpo_name=substr($last_voucher,0,3);
			$get_debit_no=$this->Finance_Model->get_debit_lastid();
		if(count($get_debit_no) == 0){
			$data['last_voucher_no'] = $fpo_name.'_DR_'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
		} else {
			$data['last_voucher_no'] = $fpo_name.'_DR_'.str_pad((count($get_debit_no)+1), 4, '0', STR_PAD_LEFT);
		}     
		}*/
        $this->load->view('finance/banking/transaction/debit_note', $data); 
	}
	 
	public function postDebitnote() {
        if( $this->Finance_Model->postDebitNote()){
			 $this->session->set_flashdata('success', 'New Debit note added successfully.');       
			 redirect('fpo/finance/debitnote');
		} else {
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('fpo/finance/debitnote');
		} 
	} 
	/*  debit note end */
	
	/*  credit note start */
	public function creditnote(){        
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Credit Note';
      $data['page_module'] = 'finance';	
      $fpo_id = $this->session->userdata('user_id');
      $appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['formation_date'] = $appointment_date->date_formation;        
        $allLedgers=[];
        $deptors = $this->Finance_Model->getAllDebtorsByFPO();
		$allLedgers[0]['customer'] = "Customers";
        if($deptors) {
            $allLedgers[0]['customer_list'] = $deptors;
        } else {
            $allLedgers[0]['customer_list'] = [];
		}
        
        $suppliers = $this->Finance_Model->getAllSupplierByFPO();
		$allLedgers[1]['supplier'] = "Suppliers";
        if($suppliers) {            
            $allLedgers[1]['supplier_list'] = $suppliers;
        } else {
			$allLedgers[1]['supplier_list'] = [];
		}
        
        $gl_list = $this->Finance_Model->getAllGL();
		$allLedgers[2]['gl_trans'] = "GL List";
        if($gl_list) {            
            $allLedgers[2]['gl_list'] = $gl_list;
        } else {
			$allLedgers[2]['gl_list'] = [];
		}
		$data['ledger_entry']=$allLedgers;
		$allInvoiceno=[];
		
		$supp_invoice = $this->Finance_Model->getpurchaseInvoiceno();
		$cust_invoice = $this->Finance_Model->getsalesInvoiceno();
		if($supp_invoice) {
            $allInvoiceno[0]['purchase_invoice'] = $supp_invoice;
        } else {
            $allInvoiceno[0]['purchase_invoice'] = [];
		}
		
		if($cust_invoice) {
            $allInvoiceno[1]['sales_invoice'] = $cust_invoice;
        } else {
            $allInvoiceno[1]['sales_invoice'] = [];
		}
		$data['invoice_no']=$allInvoiceno;
		$voucher_no = $this->Finance_Model->getLastTransactionByFPO($this->session->userdata('user_id'), 8);
		$data['last_voucher_no'] = 'CN'.str_pad(($voucher_no+1), 5, '0', STR_PAD_LEFT);
        $this->load->view('finance/banking/transaction/credit_note', $data); 
	}
	
    public function postCreditnote() {
        if( $this->Finance_Model->postCreditnote()){
			 $this->session->set_flashdata('success', 'New Credit note added successfully.');       
			 redirect('fpo/finance/creditnote');
		} else {
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('fpo/finance/creditnote');
		}       
	} 
	
	public function getCustomername() {
		$invoice_no=$this->input->post('invoice_no');
        $get_customer = $this->Finance_Model->getCustnameByInvoiceno($invoice_no);
		$get_supplier = $this->Finance_Model->getSuppnameByInvoiceno($invoice_no);		
		if(!empty($get_customer) && empty($get_supplier)){				
            $response = array("type" => "customer", "customer_name" => $get_customer); 
		}else if(!empty($get_supplier) && !empty($get_supplier[0]->supp_reference) && empty($get_customer[0]->reference)){			
			$response = array("type" => "supplier", "supplier_name" => $get_supplier); 
		}		
		echo json_encode($response);
    }
	
	public function getInvoiceAmount(){
		$invoice_no = $this->input->post('invoice');
		if(!empty($invoice_no)){
			$get_customer = $this->Finance_Model->getSalesAmount($invoice_no);
			$get_supplier = $this->Finance_Model->getPurchaseAmount($invoice_no);
			
			if(!empty($get_customer[0]->debtor_no) && !empty($get_customer[0]->reference) && empty($get_supplier[0]->supp_reference)){
				$jsonLoad = array("type" => "sales", "sales_amount" => $get_customer); 
			}
			if(!empty($get_supplier[0]->supplier_id) && !empty($get_supplier[0]->supp_reference) && empty($get_customer[0]->reference)){
				$jsonLoad = array("type" => "purchase", "purchase_amount" => $get_supplier); 
			}
		} else {
			$jsonLoad = array("type" => "purchase", "message" => 'Invoice number is not provide'); 
		}
		echo json_encode($jsonLoad);
    }
	
	
	public function getInvoiceno(){		
		//$invoice_no = $this->input->get('q');
		//if(!empty($invoice_no)){
			$get_customer = $this->Finance_Model->getInvoicesale();
			$get_supplier = $this->Finance_Model->getInvoicepurchase();
			$json = array_merge($get_customer, $get_supplier);
		//}
		echo json_encode($json);
    }
	/*  credit note end */
   
   
   /*supplier 20*/
   
   public function suppliers() {        
      $data['page']          = 'Maintenance';
		$data['page_title']    = 'Suppliers';
      $data['page_module']   = 'finance';
		$data['supplier']      = $this->Supplier_Model->supplier_list();
		$data['payment_terms'] = $this->Supplier_Model->payment_terms_list();
		$data['location']      = $this->Supplier_Model->get_godownlist();
		$data['product_fpo']   = $this->Supplier_Model->productByFPOId();
		$data['state']  	     = $this->Supplier_Model->state_list();
		$data['bank_name']	   = $this->Finance_Model->bank_name_list();
		$data['bank_info']     = $this->Finance_Model->bankAccount_List();
		$data['gl_group_info'] = $this->Supplier_Model->gl_ChartMasterList();
		$data['glgroup_info']   = $this->Finance_Model->glAccountgroup_List();		
		$get_fpo_name=$this->Supplier_Model->fpoNameByID();
		$str=$get_fpo_name[0]->producer_organisation_name;
		if(!empty($str)){
			$fpo_name=substr($str,0,3);
			$get_supplier_no=$this->Supplier_Model->supplier_last_id();
			if(count($get_supplier_no) == 0){
				$data['last_supp_id'] = $fpo_name.'_'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
			} else {
				$data['last_supp_id'] = $fpo_name.'_'.str_pad((count($get_supplier_no) +1), 4, '0', STR_PAD_LEFT);
			}    
		}
        $this->load->view('inventory/purchase/suppliers/suppliers', $data); 
	} 
	
	public function post_suppliers() {
     
		$a=$this->Supplier_Model->add_supplier();
		if($a == 2){
		 $this->session->set_flashdata('success', 'New Supplier Added Successfully.');       
		 redirect('fpo/finance/suppliers');
		}elseif($a == 1){
		 $this->session->set_flashdata('success', 'New Supplier Updated Successfully.');       
		 redirect('fpo/finance/suppliers');
		}
		else
		{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/finance/suppliers');
		}
	}
    
	public function getallsupplier() {
        $result=$this->Supplier_Model->get_all_supplier_detail();
		echo json_encode($result);
    }
	public function suppliersearch() {
        $result=$this->Supplier_Model->get_purchase_supplier();
		echo json_encode($result);
		
    }
	
	public function getactivesupplier() {
        $result=$this->Supplier_Model->supplier_list();
		echo json_encode($result);
    }
	
	public function editsupplier($supplier) {
		$data['page']          = 'Maintenance';
		$data['page_title']    = 'Suppliers';
      $data['page_module']   = 'finance';
		$data['supplier']      = $this->Supplier_Model->supplier_list();
		$data['payment_terms'] = $this->Supplier_Model->payment_terms_list();
		$data['location']      = $this->Supplier_Model->get_godownlist();
		$data['product_fpo']   = $this->Supplier_Model->productByFPOId();
		$data['state']  	   = $this->Supplier_Model->state_list();
		$data['bank_name']	   = $this->Finance_Model->bank_name_list();
		$data['bank_info']     = $this->Finance_Model->bankAccount_List();
		$data['gl_group_info'] = $this->Supplier_Model->gl_ChartMasterList();
		$data['glgroup_info']   = $this->Finance_Model->glAccountgroup_List();
		$supplier_info=$this->Supplier_Model->supplierByID($supplier);
		if(!empty($supplier_info)){ 
        $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($supplier_info[0]->mailing_pincode);
        $data['block_info'] = $this->Login_Model->getBlockByDistCode($supplier_info[0]->mailing_district);
        $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($supplier_info[0]->mailing_block);
        $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($supplier_info[0]->mailing_panchayat);
		$data['taluk_info1'] = $this->Login_Model->getTalukByPinCode($supplier_info[0]->physical_pincode);
        $data['block_info1'] = $this->Login_Model->getBlockByDistCode($supplier_info[0]->physical_district);
        $data['panchayat_info1'] = $this->Login_Model->getPanchayatByBlockcode($supplier_info[0]->physical_block);
        $data['village_info1'] = $this->Login_Model->getVillageByPanchayatcode($supplier_info[0]->physical_panchayat);
		}
		$data['supplier_info']= $supplier_info;
		//print_r($data['supplier_info']);
        $this->load->view('inventory/purchase/suppliers/editsupplier', $data); 
        
		//echo json_encode($result);
    }
	public function postupdatesuppliers($supplier_id) {
        if($this->Supplier_Model->updatesupplier($supplier_id)){
    		 $this->session->set_flashdata('success', 'Supplier updated successfully.');       
		      redirect('fpo/finance/suppliers');
		}else{
		      $this->session->set_flashdata('warning', 'Data not inserted.');       
		      redirect('fpo/finance/suppliers');
		}    
	}
	public function delete_supplier($supplier_id) {
		$this->Supplier_Model->delete_supplier($supplier_id);
		$this->session->set_flashdata('success', 'State Deleted successfully');
        redirect('fpo/finance/suppliers',"refresh");
	}
	/*supplier ends*/
   
   /*customer starts 20*/
   
   public function customers() {        
      $data['page'] = 'Maintenance';
      $data['page_title'] = 'Customers';
      $data['page_module'] = 'finance';
      $data['state'] = $this->Location_Model->state_list();
      $data['bank_name'] = $this->Customer_Model->bank_name_list();
      $data['customer'] = $this->Customer_Model->customer_list();
      $data['salesperson'] = $this->Customer_Model->salespersonDropdownList();	
      $data['sale_types'] = $this->Customer_Model->getAllSaleTypes();
      $data['credit_status'] = $this->Customer_Model->getAllCreditStatus();
      $data['sale_area'] = $this->Customer_Model->getAllSaleArea(); 
      $data['gl_group_info'] = $this->Customer_Model->gl_ChartMasterList();		
      $data['payment_terms'] = $this->Customer_Model->getAllPaymentTerms(); 
      $data['tax_group'] = $this->Customer_Model->getAllTaxGroup(); 
      $this->load->view('market/sales/maintenance/customers', $data); 
	}
	public function postcustomer() {
		if(empty($this->input->post('debtor_no'))){
			if($this->Customer_Model->addcustomer()){
                $this->session->set_flashdata('success', 'New Customer added successfully.');       
                redirect('fpo/finance/customers');
            }else{
                $this->session->set_flashdata('warning', 'Data not inserted.');       
                redirect('fpo/finance/customers');
            } 
        }        
	}
    public function postupdatecustomer( $customer_id ) {
        if($this->Customer_Model->updatecustomer($customer_id)){
            $this->session->set_flashdata('success', 'Customer Updated successfully.');       
            redirect('fpo/finance/customers');
        }else{
            $this->session->set_flashdata('warning', 'Customer not Updated.');       
			redirect('fpo/finance/customeredit/'.$customer_id);
        } 
	}
	public function getallcustomer() {
        $result=$this->Customer_Model->get_all_customer();
		echo json_encode($result);
    }
    
	public function getactivecustomer() {
        $result=$this->Customer_Model->customer_list();
		echo json_encode($result);
    }
   public function customeredit($customer) { 
      $data['page'] = 'Maintanance';
      $data['page_title'] = 'Customer Edit';
      $data['page_module'] = 'finance';
      $data['state'] = $this->Location_Model->state_list();
      $data['bank_name'] = $this->Customer_Model->bank_name_list();
      //$data['branch_name'] = $this->Customer_Model->branch_name_list();
      $data['customer'] = $this->Customer_Model->customer_list();
      $data['salesperson'] = $this->Customer_Model->salespersonDropdownList();	
      $data['sale_types'] = $this->Customer_Model->getAllSaleTypes();
      $data['credit_status'] = $this->Customer_Model->getAllCreditStatus();
      $data['sale_area'] = $this->Customer_Model->getAllSaleArea();
      $data['gl_group_info'] = $this->Customer_Model->gl_ChartMasterList();	        
      $data['payment_terms'] = $this->Customer_Model->getAllPaymentTerms(); 
      $data['tax_group'] = $this->Customer_Model->getAllTaxGroup();
      $customerinfo=$this->Customer_Model->customerByID($customer);
      $customer_physical_info = $this->Customer_Model->custPhysicalAddByID($customer);
      
      if(!empty($customerinfo)){        
         $data['taluk_info'] = $this->Login_Model->getTalukByDistCode($customerinfo[0]->district);
         $data['block_info'] = $this->Login_Model->getBlockByDistCode($customerinfo[0]->district);
         $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($customerinfo[0]->block);
         $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($customerinfo[0]->panchayat);
         $data['taluk_info1'] = $this->Login_Model->getTalukByDistCode($customerinfo[0]->physical_district);
         $data['block_info1'] = $this->Login_Model->getBlockByDistCode($customerinfo[0]->physical_district);
         $data['panchayat_info1'] = $this->Login_Model->getPanchayatByBlockcode($customerinfo[0]->physical_block);
         $data['village_info1'] = $this->Login_Model->getVillageByPanchayatcode($customerinfo[0]->physical_panchayat);      
      }
      $data['customer_info']= $customerinfo;
      $data['customer_physical_info']= $customer_physical_info;
      $this->load->view('market/sales/maintenance/customeredit', $data); 		
	}
    
	public function editcustomer($customer) {
      $result=$this->Customer_Model->customerByID($customer);	
      echo json_encode($result);
    }
	/*customers start*/
	
	/*customer branches start*/
	public function customerbranches() {        
         $data['page'] = 'Maintenance';
         $data['page_title'] = 'Customer Branches';
         $data['page_module'] = 'finance';	
         $data['customer'] = $this->Customer_Model->customer_list();
         $data['salesperson'] = $this->Customer_Model->salespersonDropdownList();
         $data['sale_area'] = $this->Customer_Model->getAllSaleArea();        
         $data['tax_group'] = $this->Customer_Model->getAllTaxGroup();
         $data['sale_group'] = $this->Customer_Model->getAllSaleGroup();
         $data['gl_group_info'] = $this->Customer_Model->gl_ChartMasterList();
         $this->load->view('market/sales/maintenance/customer_branches', $data); 
	}
	public function editcustomerbranch($customerbranch_id) {  
         $data['page']         = 'Maintenance';
         $data['page_title']   = 'Customer Branches';
         $data['page_module']  = 'finance';	
         $data['customer']     = $this->Customer_Model->customer_list();
         $data['salesperson']  = $this->Customer_Model->salespersonDropdownList();
         $data['sale_area']    = $this->Customer_Model->getAllSaleArea();        
         $data['tax_group']    = $this->Customer_Model->getAllTaxGroup();
         $data['sale_group']   = $this->Customer_Model->getAllSaleGroup();
         $data['gl_group_info'] = $this->Customer_Model->gl_ChartMasterList();
         $customer_branch      =$this->Customer_Model->customerbranchByID($customerbranch_id);
         $customer_branch_physical = $this->Customer_Model->custBranchPhysicalAddByID($customerbranch_id);
       
      if(!empty($customer_branch)){ 
         $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($customer_branch[0]->mailing_pincode);
         $data['block_info'] = $this->Login_Model->getBlockByDistCode($customer_branch[0]->mailing_district);
         $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($customer_branch[0]->mailing_block);
         $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($customer_branch[0]->mailing_panchayat);
         $data['taluk_info1'] = $this->Login_Model->getTalukByPinCode($customer_branch[0]->physical_pincode);
         $data['block_info1'] = $this->Login_Model->getBlockByDistCode($customer_branch[0]->physical_district);
         $data['panchayat_info1'] = $this->Login_Model->getPanchayatByBlockcode($customer_branch[0]->physical_block);
         $data['village_info1'] = $this->Login_Model->getVillageByPanchayatcode($customer_branch[0]->physical_panchayat);
		} 
		$data['customer_branch']= $customer_branch;
      $data['customer_branch_physical']= $customer_branch_physical;
      $this->load->view('market/sales/maintenance/customereditbranch', $data); 
	}
    
	public function postcustomerbranch() {
        if($this->Customer_Model->addcustomerbranch()){
    		 $this->session->set_flashdata('success', 'New customer branch added successfully.');       
		      redirect('fpo/finance/customerbranches');
		}else{
		      $this->session->set_flashdata('warning', 'Data not inserted.');       
		      redirect('fpo/finance/customerbranches');
		}   
	}
    public function postupdatecustomerbranch($customer_branch_id) {
		//print_r($customer_branch_id);
		//print_r($this->input->post());
	
         if($this->Customer_Model->updatecustomerbranch($customer_branch_id)){
    		 $this->session->set_flashdata('success', 'New customer branch updated successfully.');       
		      redirect('fpo/finance/customerbranches');
		}else{
		      $this->session->set_flashdata('warning', 'Data not inserted.');       
		      redirect('fpo/finance/customerbranches');
		}    
	}
	public function customerbranchlist($customer_id) {
        $customerbranch_list = $this->Customer_Model->customerbranch_list($customer_id);
        $response = array("status" => 1, "customerbranch_list" => $customerbranch_list);
        echo json_encode($response);
	}
	
	public function getquantityunit() { 	 
		$result = $this->Supplier_Model->get_uomlist();
		echo json_encode($result);	
	}
	
   //sales list by FPO 28 feb//   
   public function salesinvoicelist() {        
      $data['page'] = 'Inquiries and Reports';
      $data['page_title'] = 'Sales Invoice List';
      $data['page_module'] = 'finance';
      $data['saleslist'] = $this->Finance_Model->salesinvoicelist();
      //$data['fpo_info'] =$this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));  
      $this->load->view('finance/banking/transaction/salesinvoice_list', $data); 
	}
   //Sales invoice receipt
	public function salesinvoicepdf($voucher_no,$inv_no,$customer){
		$this->load->library('m_pdf');		
		$data['fpo_info'] =$this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));      
		$data['account_info'] = $this->Finance_Model->bankAccountByUserID($this->session->userdata('user_id'));
		$salesTransaction = $this->Finance_Model->getSalesTransactionById($voucher_no,$inv_no,$customer);
      $total_info = $this->Finance_Model->getInventoryTransactionById(2, $voucher_no, $inv_no, $customer);
		 
		for($i=0;$i<count($salesTransaction);$i++){
			if($salesTransaction[$i]->stock_group_id == 3){
				if($salesTransaction[$i]->category_id == 13){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				}				
			} else if($salesTransaction[$i]->stock_group_id == 2){
				$salesTransaction[$i]->product_name = $this->Masterdata_Model->cropNameById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
			} else {								
				if($salesTransaction[$i]->category_id == 3 || $salesTransaction[$i]->category_id == 4 || $salesTransaction[$i]->category_id == 5){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				}				
			}
		}
      /* $netTotal=0;
      for($i=0; $i<count($salesTransaction);$i++){
       if($salesTransaction[$i]->igst_value && $salesTransaction[$i]->igst_value!= ""){
            //echo $salesTransaction[$i]->igst_value;
         } else if($salesTransaction[$i]->cgst_value && $salesTransaction[$i]->cgst_value!= "" && $salesTransaction[$i]->sgst_value && $salesTransaction[$i]->sgst_value!= ""){            
           // echo $salesTransaction[$i]->sgst_value.'<br> '.$salesTransaction[$i]->cgst_value;            
         } else {
         } 
       $line_total = $salesTransaction[$i]->line_total+abs($salesTransaction[$i]->sgst_value)+abs($salesTransaction[$i]->cgst_value)+abs($salesTransaction[$i]->igst_value);
       $netTotal = $netTotal+$line_total;
      } */
      $data['total_info'] = $total_info;
		$data['totalValues_words']= $this->get_numberTowords($total_info->overall_total); 
      //$data['totalValues_words']= $this->get_numberTowords($netTotal);
		if(count($salesTransaction) != 0){		
         $pdf = $this->m_pdf->load();
         $pdfFilePath ="Sales Invoice.pdf";	
         $data['salesinvoice'] = $salesTransaction;
         $html = $this->load->view('finance/banking/transaction/salesinvoicepdf', $data, true);			
         $pdf->AddPageByArray(array(
         'orientation' => 'P',
         'format' => 'A4',
         'mgf' => '13',
         ));
         $pdf->simpleTables = true;
         $pdf->WriteHTML($html);	
         $pdf->Output($pdfFilePath, "D");
         //echo $pdf; 
         exit;
		}			
	} 	
   
	//Sales invoice receipt view
   //mar 18 
   public function SalesInvoiceView($voucher_no,$inv_no,$customer){
      $data['page'] = 'Inquiries and Reports';
      $data['page_title'] = 'Sales Invoice PDF';
      $data['page_module'] = 'finance';
		$data['fpo_info'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$data['account_info'] = $this->Finance_Model->bankAccountByUserID($this->session->userdata('user_id'));
		
		$total_info = $this->Finance_Model->getInventoryTransactionById(2, $voucher_no, $inv_no, $customer);
		$salesTransaction = $this->Finance_Model->getSalesTransactionById($voucher_no, $inv_no, $customer);			  
		for($i=0;$i<count($salesTransaction);$i++){
			if($salesTransaction[$i]->stock_group_id == 3){
				if($salesTransaction[$i]->category_id == 13){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				}				
			} else if($salesTransaction[$i]->stock_group_id == 2){
				$salesTransaction[$i]->product_name = $this->Masterdata_Model->cropNameById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
			} else {								
				if($salesTransaction[$i]->category_id == 3 || $salesTransaction[$i]->category_id == 4 || $salesTransaction[$i]->category_id == 5){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				}				
			}
		}
      $data['salesinvoice'] = $salesTransaction;
	  
      /*$netTotal=0;
      for($i=0; $i<count($salesTransaction);$i++){
       if($salesTransaction[$i]->igst_value && $salesTransaction[$i]->igst_value!= ""){
            //echo $salesTransaction[$i]->igst_value;
         } else if($salesTransaction[$i]->cgst_value && $salesTransaction[$i]->cgst_value!= "" && $salesTransaction[$i]->sgst_value && $salesTransaction[$i]->sgst_value!= ""){            
           // echo $salesTransaction[$i]->sgst_value.'<br> '.$salesTransaction[$i]->cgst_value;            
         } else {
         } 
       $line_total = $salesTransaction[$i]->line_total+abs($salesTransaction[$i]->sgst_value)+abs($salesTransaction[$i]->cgst_value)+abs($salesTransaction[$i]->igst_value);
       $netTotal = $netTotal+$line_total;
      }*/
		$data['total_info'] = $total_info;
		$data['totalValues_words']= $this->get_numberTowords($total_info->overall_total);       
		$this->load->view('finance/banking/transaction/view_salesregister', $data);
	}
   
	public function viewSalesInvoice($voucher_no,$inv_no,$customer){
		$this->load->library('m_pdf');		
		$data['fpo_info'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$data['account_info'] = $this->Finance_Model->bankAccountByUserID($this->session->userdata('user_id'));
		$salesTransaction = $this->Finance_Model->getSalesTransactionById($voucher_no,$inv_no,$customer);		
		$total_info = $this->Finance_Model->getInventoryTransactionById(2, $voucher_no, $inv_no, $customer);
		for($i=0;$i<count($salesTransaction);$i++){
			if($salesTransaction[$i]->stock_group_id == 3){
				if($salesTransaction[$i]->category_id == 13){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				}				
			} else if($salesTransaction[$i]->stock_group_id == 2){
				$salesTransaction[$i]->product_name = $this->Masterdata_Model->cropNameById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
			} else {								
				if($salesTransaction[$i]->category_id == 3 || $salesTransaction[$i]->category_id == 4 || $salesTransaction[$i]->category_id == 5){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name;
				}				
			}
		}
      /* $netTotal=0;
      for($i=0; $i<count($salesTransaction);$i++){
      /* if($salesTransaction[$i]->igst_value && $salesTransaction[$i]->igst_value!= ""){
            //echo $salesTransaction[$i]->igst_value;
         } else if($salesTransaction[$i]->cgst_value && $salesTransaction[$i]->cgst_value!= "" && $salesTransaction[$i]->sgst_value && $salesTransaction[$i]->sgst_value!= ""){            
           // echo $salesTransaction[$i]->sgst_value.'<br> '.$salesTransaction[$i]->cgst_value;            
         } else {
         } 
       $line_total = $salesTransaction[$i]->line_total+abs($salesTransaction[$i]->sgst_value)+abs($salesTransaction[$i]->cgst_value)+abs($salesTransaction[$i]->igst_value);
       $netTotal = $netTotal+$line_total;
      }*/
      //$data['totalValues_words']= $this->get_numberTowords($netTotal); 
      $data['total_info'] = $total_info;
		$data['totalValues_words']= $this->get_numberTowords($total_info->overall_total);     
		if(count($salesTransaction) != 0){     
			$pdf = $this->m_pdf->load();
			$pdfFilePath ="Sales Invoice.pdf";	
			$data['salesinvoice'] = $salesTransaction;
			 $html = $this->load->view('finance/banking/transaction/salesinvoicepdf', $data, true);			
			 $pdf->AddPageByArray(array(
				'orientation' => 'P',
				'format' => 'A4',
				'mgf' => '13',
			 ));
			 $pdf->simpleTables = true;
			 $pdf->WriteHTML($html);		
			 $pdf->Output($pdfFilePath, 'I');
			 //header('Content-Type: application/pdf');
			 //echo $pdf; 
			 //exit;
		}			
	} 	
   public function purchaseregisterlist() {        
      $data['page'] = 'Inquiries and Reports';
      $data['page_title'] = 'Purchase Register List';
      $data['page_module'] = 'finance';
      $data['saleslist'] = $this->Finance_Model->purchaseregisterlist();
      $this->load->view('finance/banking/transaction/purchaseregister_list', $data); 
	}
    
   //Sales invoice receipt view
	public function viewPurchaseRegister($voucher_no,$inv_no,$supplier){
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Purchase Register View';
		$data['page_module'] = 'finance';
		$data['fpo_info'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$data['account_info'] = $this->Finance_Model->bankAccountByUserID($this->session->userdata('user_id'));
		//$data['saleslist'] = $this->Finance_Model->salesinvoiceTotallist();
      
		$total_info = $this->Finance_Model->getInventoryTransactionById(1, $voucher_no, $inv_no, $supplier);
		$salesTransaction = $this->Finance_Model->getPurchaseTransactionById($voucher_no, $inv_no, $supplier);
		for($i=0;$i<count($salesTransaction);$i++){
			if($salesTransaction[$i]->stock_group_id == 3){
				if($salesTransaction[$i]->category_id == 13){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name." - ".$salesTransaction[$i]->classification;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name." - ".$salesTransaction[$i]->classification;
				}				
			} else if($salesTransaction[$i]->stock_group_id == 2){
				$salesTransaction[$i]->product_name = $this->Masterdata_Model->cropNameById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name." - ".$salesTransaction[$i]->classification;
			} else {								
				if($salesTransaction[$i]->category_id == 3 || $salesTransaction[$i]->category_id == 4 || $salesTransaction[$i]->category_id == 5){
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name." - ".$salesTransaction[$i]->classification;
				} else {
					$salesTransaction[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($salesTransaction[$i]->category_id, $salesTransaction[$i]->sub_category_id, $salesTransaction[$i]->product_id)->name." - ".$salesTransaction[$i]->classification;
				}				
			}
		}            
		$data['purchaseinvoice'] = $salesTransaction;
      
		/*$netTotal=0;
		$gross = $salesTransaction[0]->qty_invoiced*$salesTransaction[0]->unit_price;
		$discount = $salesTransaction[0]->discount;
		for($i=0; $i<count($salesTransaction);$i++){
         if($salesTransaction[$i]->igst_value && $salesTransaction[$i]->igst_value!= ""){
         echo $salesTransaction[$i]->igst_value;
         } else if($salesTransaction[$i]->cgst_value && $salesTransaction[$i]->cgst_value!= "" && $salesTransaction[$i]->sgst_value && $salesTransaction[$i]->sgst_value!= ""){            
         //echo $salesTransaction[$i]->sgst_value .'<br> '. $salesTransaction[$i]->cgst_value;            
         } else {
         }
			$line_total = ($gross - $discount)+abs($salesTransaction[$i]->sgst_value)+abs($salesTransaction[$i]->cgst_value)+abs($salesTransaction[$i]->igst_value);
		}
		$netTotal = ($netTotal+$line_total);//+abs($salesTransaction[$i]->total_sgst)+abs($salesTransaction[$i]->total_cgst)+abs($salesTransaction[$i]->total_igst);
		*/
		$data['total_info'] = $total_info;
		$data['totalSalesValues_words'] = $this->get_numberTowords($total_info->overall_total);
		$this->load->view('finance/banking/transaction/view_purchaseregister_list', $data);
	}
   //values in words
  function get_numberTowords($number)
	{	
		$no = round($number);
		$point = round($number - $no, 2) * 100;
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array('0' => '', '1' => 'One', '2' => 'Two',
		'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		'7' => 'Seven', '8' => 'eight', '9' => 'nine',
		'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
		'13' => 'thirteen', '14' => 'fourteen',
		'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
		'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
		'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
		'60' => 'sixty', '70' => 'seventy',
		'80' => 'eighty', '90' => 'ninety');
		$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
		while ($i < $digits_1) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += ($divider == 10) ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number] .
				" " . $digits[$counter] . $plural . " " . $hundred
				:
				$words[floor($number / 10) * 10]
				. " " . $words[$number % 10] . " "
				. $digits[$counter] . $plural . " " . $hundred;
			} else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);

		return strtoupper($result);
	} 


	/* Getting the total products using product ID */
	public function getProductCountByID($product_id){
        $productCount = $this->Finance_Model->getProductCountByID($product_id);
		if($productCount->uom != 0){
			$uom_name = $this->Finance_Model->getUOMNameByID($productCount->uom);
			$productCount->uom_name = ($uom_name->short_name)?$uom_name->short_name:'';
		} else {
			$productCount->uom_name = '';
		}
        $response = array("status" => 1, "productCount" => $productCount);
        echo json_encode($response);
	}
	
	public function getAllTransactionByVoucherNumber($voucher_no){
        $transactionList = $this->Finance_Model->getAllTransactionByVoucherNumber($voucher_no);
		$closing_balance = $this->Finance_Model->closingBalanceByVoucherNumber($voucher_no, $this->input->post("type"), $this->input->post("account_holder"));
/* 		$tempClosingBalance = $closing_balance->balance;
		for($i=0;$i<count($transactionList);$i++){
			$firstCharacter = substr($transactionList[$i]->amount, 0, 1);
			if($firstCharacter != '-'){
				$tempClosingBalance = $tempClosingBalance+$transactionList[$i]->amount;
			} else {
				$tempClosingBalance = $tempClosingBalance+$transactionList[$i]->amount;
			}
			$transactionList[$i]->balance = $tempClosingBalance;
		}
 */        
		$response = array("status" => 1, "transactionList" => $transactionList, 'closing_balance' => $closing_balance);
        echo json_encode($response);
	}
	
}
