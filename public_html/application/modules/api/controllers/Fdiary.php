<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fdiary extends CI_Controller {
   public function __construct() {  
      parent::__construct();
      $this->load->model("Fdiary_Model");
      $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');
      $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      $this->output->set_header('Content-Type: application/json');
	}

   public function index() {  
      $response = array("status" => 'TRV_S101', "information" => "Welcome FARMBOOKS");
      echo json_encode($response);
	}

   public function daily_activity_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->dailyActivityList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_daily_activity() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getDailyActivity($post_data['daily_activity_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_daily_activity() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->dailyActivityValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addDailyActivity()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New daily activity added';
      }
      echo json_encode($data); 
	}
   
   public function dailyActivityValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['activity_date']) || empty($post_data['work_type']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_daily_activity() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->dailyActivityUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateDailyActivity()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Daily activity updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function dailyActivityUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['daily_activity_id']) || empty($post_data['activity_date']) || empty($post_data['work_type']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_daily_activity() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->dailyActivityDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteDailyActivity()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Daily activity deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function dailyActivityDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['daily_activity_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function income_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->incomeList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}

   public function get_income() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getIncome($post_data['income_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_income() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->incomeValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addIncome()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New income added';
      }
      echo json_encode($data); 
	}
   
   public function incomeValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['income_date']) || empty($post_data['source_of_income']) || empty($post_data['trans_income']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_income() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->incomeUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateIncome()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Income updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function incomeUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['income_id']) || empty($post_data['income_date']) || empty($post_data['source_of_income']) || empty($post_data['trans_income']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_income() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->incomeDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteIncome()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Income deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function incomeDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['income_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function expense_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->expenseList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_expense() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getExpense($post_data['expense_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_expense() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->expenseValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addExpense()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New expense added';
      }
      echo json_encode($data); 
	}
   
   public function expenseValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['expense_date']) || empty($post_data['source_of_expense']) || empty($post_data['trans_expense']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_expense() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->expenseUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateExpense()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Expense updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function expenseUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['expense_id']) || empty($post_data['expense_date']) || empty($post_data['source_of_expense']) || empty($post_data['trans_expense']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_expense() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->expenseDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteExpense()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Expense deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function expenseDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['expense_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function loan_receipt_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->loanReceiptList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_loan_receipt() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getLoanReceipt($post_data['loan_receipt_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_loan_receipt() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanReceiptValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addLoanReceipt()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New loan receipt added';
      }
      echo json_encode($data); 
	}
   
   public function loanReceiptValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['receipt_date']) || empty($post_data['source']) || empty($post_data['financier_name']) || empty($post_data['loan']) || empty($post_data['tenure']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_loan_receipt() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanReceiptUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateLoanReceipt()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan receipt updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanReceiptUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['loan_receipt_id']) || empty($post_data['receipt_date']) || empty($post_data['source']) || empty($post_data['financier_name']) || empty($post_data['loan']) || empty($post_data['tenure']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_loan_receipt() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanReceiptDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteLoanReceipt()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan receipt deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanReceiptDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['loan_receipt_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function loan_repayment_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->loanRepaymentList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_loan_repayment() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getLoanRepayment($post_data['loan_repayment_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_loan_repayment() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanRepaymentValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addLoanRepayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New loan repayment added';
      }
      echo json_encode($data); 
	}
   
   public function loanRepaymentValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['repayment_date']) || empty($post_data['financier_name']) || empty($post_data['principal_repayment']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_loan_repayment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanRepaymentUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateLoanRepayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan repayment updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanRepaymentUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['loan_repayment_id']) || empty($post_data['repayment_date']) || empty($post_data['financier_name']) || empty($post_data['principal_repayment']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_loan_repayment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanRepaymentDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteLoanRepayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan repayment deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanRepaymentDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['loan_repayment_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function loan_issue_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->loanIssueList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_loan_issue() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getLoanIssue($post_data['loan_issue_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_loan_issue() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanIssueValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addLoanIssue()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New loan issue added';
      }
      echo json_encode($data); 
	}
   
   public function loanIssueValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['issue_date']) || empty($post_data['borrower_name']) || empty($post_data['loan']) || empty($post_data['tenure']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_loan_issue() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanIssueUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateLoanIssue()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan issue updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanIssueUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['loan_issue_id']) || empty($post_data['issue_date']) || empty($post_data['borrower_name']) || empty($post_data['loan']) || empty($post_data['tenure']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_loan_issue() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanIssueDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteLoanIssue()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan issue deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanIssueDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['loan_issue_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function loan_return_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->loanReturnList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_loan_return() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getLoanReturn($post_data['loan_return_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_loan_return() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanReturnValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addLoanReturn()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New loan return added';
      }
      echo json_encode($data); 
	}
   
   public function loanReturnValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['return_date']) || empty($post_data['borrower_name']) || empty($post_data['principal']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_loan_return() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanReturnUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateLoanReturn()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan return updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanReturnUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['loan_return_id']) || empty($post_data['return_date']) || empty($post_data['borrower_name']) || empty($post_data['principal']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function delete_loan_return() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->loanReturnDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteLoanReturn()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Loan return deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function loanReturnDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['loan_return_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function storage_deposit_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->storageDepositList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_storage_deposit() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getStorageDeposit($post_data['storage_deposit_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_storage_deposit() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->storageDepositValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addStorageDeposit()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New storage deposit added';
      }
      echo json_encode($data); 
	}
   
   public function storageDepositValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['deposit_date']) || empty($post_data['storage_name']) || empty($post_data['commodity']) || empty($post_data['quantity']) || empty($post_data['uom']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_storage_deposit() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->storageDepositUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateStorageDeposit()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Storage deposit updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function storageDepositUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['storage_deposit_id']) || empty($post_data['deposit_date']) || empty($post_data['storage_name']) || empty($post_data['commodity']) || empty($post_data['quantity']) || empty($post_data['uom']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function delete_storage_deposit() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->storageDepositDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteStorageDeposit()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Storage deposit deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function storageDepositDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['storage_deposit_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function fixed_deposit_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->fixedDepositList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_fixed_deposit() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getFixedDeposit($post_data['fixed_deposit_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_fixed_deposit() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->fixedDepositValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addFixedDeposit()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New fixed deposit added';
      }
      echo json_encode($data); 
	}
   
   public function fixedDepositValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['deposit_date']) || empty($post_data['bank_name']) || empty($post_data['fixed_deposit']) || empty($post_data['tenure']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_fixed_deposit() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->fixedDepositUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateFixedDeposit()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Fixed deposit updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function fixedDepositUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['fixed_deposit_id']) || empty($post_data['deposit_date']) || empty($post_data['bank_name']) || empty($post_data['fixed_deposit']) || empty($post_data['tenure']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function delete_fixed_deposit() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->fixedDepositDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteFixedDeposit()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Fixed deposit deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function fixedDepositDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['fixed_deposit_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function fixed_deposit_withdraw_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->fixedDepositWithdrawList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_fixed_deposit_withdraw() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getFixedDepositWithdraw($post_data['fixed_deposit_withdraw_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_fixed_deposit_withdraw() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->fixedDepositWithdrawValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addFixedDepositWithdraw()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New fixed deposit withdraw added';
      }
      echo json_encode($data); 
	}
   
   public function fixedDepositWithdrawValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['withdraw_date']) || empty($post_data['bank_name']) || empty($post_data['withdraw']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_fixed_deposit_withdraw() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->fixedDepositWithdrawUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateFixedDepositWithdraw()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Fixed deposit withdraw updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function fixedDepositWithdrawUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['fixed_deposit_withdraw_id']) || empty($post_data['withdraw_date']) || empty($post_data['bank_name']) || empty($post_data['withdraw']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_fixed_deposit_withdraw() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->fixedDepositWithdrawDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteFixedDepositWithdraw()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Fixed deposit withdraw deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function fixedDepositWithdrawDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['fixed_deposit_withdraw_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function gettransaction() {  
	  $data['status'] = 'TRV_E101';
      $data['message'] = 'No Transactions';
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(!empty($post_data['farmer_id']) ) {
         $data['status'] = 'TRV_S101';
		 $data['message'] = 'Success';
		 $result = $this->Fdiary_Model->incomeList($post_data['farmer_id']);
		 if($result){
		    $data['income_list'] = array();
			$data['income_list'] = $result;
		 }
		 $result = $this->Fdiary_Model->expenseList($post_data['farmer_id']);
		 if($result){
		    $data['expense_list'] = array();
			$data['expense_list'] = $result;
		 }
		 $result = $this->Fdiary_Model->loanReceiptList($post_data['farmer_id']);
		 if($result){
		    $data['loanReceipt_list'] = array();
			$data['loanReceipt_list'] = $result;
		 }
		 $result = $this->Fdiary_Model->loanRepaymentList($post_data['farmer_id']);
		 if($result){
		    $data['loanRepayment_list'] = array();
			$data['loanRepayment_list'] = $result;
		 }
		 $result = $this->Fdiary_Model->loanIssueList($post_data['farmer_id']);
		 if($result){
		    $data['loanIssue_ist'] = array();
			$data['loanIssue_ist'] = $result;
		 }
		 $result = $this->Fdiary_Model->loanReturnList($post_data['farmer_id']);
		 if($result){
		    $data['loanReturn_list'] = array();
			$data['loanReturn_list'] = $result;
		 }
		 $result = $this->Fdiary_Model->fixedDepositList($post_data['farmer_id']);
		 if($result){
		    $data['fixedDeposit_list'] = array();
			$data['fixedDeposit_list'] = $result;
		 }
		 $result = $this->Fdiary_Model->fixedDepositWithdrawList($post_data['farmer_id']);
		 if($result){
		    $data['fixedDepositWithdraw_list'] = array();
			$data['fixedDepositWithdraw_list'] = $result;
		 }
      }
		echo json_encode($data);
   }
   
   public function sale_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->saleList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   
   public function get_available_saleList() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->get_available_saleList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
      
   
   public function get_sale() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->getSale($post_data['sale_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_sale() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->saleValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->addSale()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New sale added';
      }
      echo json_encode($data); 
	}
   
   public function saleValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['crop_variety_id']) || empty($post_data['output_id']) || empty($post_data['quantity']) || empty($post_data['quantity_uom']) || empty($post_data['expected_time']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_sale() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->saleUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateSale()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Sale updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function saleUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['sale_id']) || empty($post_data['crop_variety_id']) || empty($post_data['output_id']) || empty($post_data['quantity']) || empty($post_data['quantity_uom']) || empty($post_data['expected_time']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_sale() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->saleDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->deleteSale()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Sale deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function saleDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['sale_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_sale_status() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->saleUpdateStatusValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateSaleStatus()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Sale status updated successfully';
      }
      echo json_encode($data); 
	}
   public function update_sale_price() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->saleUpdatePriceValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Fdiary_Model->updateSalePrice()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Sale Price updated successfully';
      }
      echo json_encode($data); 
	}
   public function saleUpdateStatusValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['sale_id']) || empty($post_data['sale_status']) || empty($post_data['trader_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function saleUpdatePriceValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['sale_id']) || empty($post_data['sale_price']) || empty($post_data['trader_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function trader_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->traderList($post_data['trader_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
	
	public function processed_trader_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Fdiary_Model->closedtraderList($post_data['trader_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data);
	}
	
	public function getfarmer_salereport() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      if(!$this->getfarmersalereportValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } else {
          //$data['result'] = array();
          $result = $this->Fdiary_Model->farmer_salereport($post_data['farmer_id'],$post_data['from_date'],$post_data['to_date']);
          if($result){
             $data['status'] = 'TRV_S101';
             $data['result'] = $result;
          }
          else
          {
              $data['status'] = 'TRV_S101';
              $data['message'] = 'No Tansaction(s) found';  
          }
          
      }
      echo json_encode($data); 
	}
	
	public function getfarmersalereportValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['from_date']) || empty($post_data['to_date']) ) {
         return false;
      } 
      else {
         return true;
      }
   }

	public function gettrader_salereport() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      if(!$this->gettradersalereportValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } else {
          //$data['result'] = array();
          $result = $this->Fdiary_Model->trader_salereport($post_data['trader_id'],$post_data['from_date'],$post_data['to_date']);
          if($result){
             $data['status'] = 'TRV_S101';
             $data['result'] = $result;
          }
          else
          {
              $data['status'] = 'TRV_S101';
              $data['message'] = 'No Tansaction(s) found';  
          }
          
      }
      echo json_encode($data); 
	}
	
	public function gettradersalereportValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['trader_id']) || empty($post_data['from_date']) || empty($post_data['to_date']) ) {
         return false;
      } 
      else {
         return true;
      }
   }

}