<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fdiary_Model extends CI_Model {
   function __construct() {
        parent::__construct();
        $this->load->database();
   }
    
   function dailyActivityList($farmer_id) {         
        $this->db->select('da.id, DATE_FORMAT(da.activity_date, "%d/%m/%Y") activity_date, da.work_type, da.fields_details, da.nature_of_work, da.member_name, DATE_FORMAT(da.time_spent, "%H:%i") time_spent');
        $this->db->from('fpo_fd_daily_activity as da');
        $this->db->where(array('da.farmer_id' => $farmer_id, 'da.status' => '1'));
        $this->db->order_by('da.activity_date', 'DESC');
    	  return $this->db->get()->result();
   }
   
   function getDailyActivity($daily_activity_id) {         
        $this->db->select('da.id, DATE_FORMAT(da.activity_date, "%d/%m/%Y") activity_date, da.work_type, da.fields_details, da.nature_of_work, da.member_name, DATE_FORMAT(da.time_spent, "%H:%i") time_spent');
        $this->db->from('fpo_fd_daily_activity as da');
        $this->db->where(array('da.id' => $daily_activity_id, 'da.status' => '1'));
    	return $this->db->get()->result();
   }
  
   function addDailyActivity() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $daily_activity = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'activity_date'         => ($post_data['activity_date'] != "")? explode("/",$post_data['activity_date'])[2].'-'.explode("/",$post_data['activity_date'])[1].'-'.explode("/",$post_data['activity_date'])[0] : "0000-00-00",
         'work_type'             => $post_data['work_type'],  
         'fields_details'        => $post_data['fields_details'],
         'nature_of_work'        => $post_data['nature_of_work'],
         'member_name'           => $post_data['member_name'],
         'time_spent'            => $post_data['time_spent'],
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_daily_activity', $daily_activity);
   }

   function updateDailyActivity() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['daily_activity_id'] >0) {
            $daily_activity = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'activity_date'         => ($post_data['activity_date'] != "")? explode("/",$post_data['activity_date'])[2].'-'.explode("/",$post_data['activity_date'])[1].'-'.explode("/",$post_data['activity_date'])[0] : "0000-00-00",
               'work_type'             => $post_data['work_type'],  
               'fields_details'        => $post_data['fields_details'],
               'nature_of_work'        => $post_data['nature_of_work'],
               'member_name'           => $post_data['member_name'],
               'time_spent'            => $post_data['time_spent']
            );               
            return $this->db->update('fpo_fd_daily_activity', $daily_activity, array('id' => $post_data['daily_activity_id']));
      }
      else {
         return false;
      }
   }   
   
   function deleteDailyActivity() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['daily_activity_id'] >0) { 
         $daily_activity = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_daily_activity', $daily_activity, array('id' => $post_data['daily_activity_id']));
      }
      else {
         return false;
      }         
   } 

   function incomeList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.income_date, "%d/%m/%Y") income_date, ref.source_of_income, ref.crop_id,tcnm.name crop_name, ref.sale_to, ref.fpo_id, fc.company_name fpo_name, ref.income_category, ref.borrower_name, round(ref.trans_income,0) trans_income, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_income as ref');
		$this->db->join('fpo_company as fc', 'fc.company_id = ref.fpo_id', 'left');
		$this->db->join('trv_crop_name_master as tcnm', 'tcnm.id = ref.crop_id');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.income_date', 'DESC');
        return $this->db->get()->result();
   }

   function getIncome($income_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.income_date, "%d/%m/%Y") income_date, ref.source_of_income, ref.crop_id, ref.sale_to, ref.fpo_id, ref.income_category, ref.borrower_name, ref.trans_income, ref.remarks');
        $this->db->from('fpo_fd_income as ref');
        $this->db->where(array('ref.id' => $income_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addIncome() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $income_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'income_date'           => ($post_data['income_date'] != "")? explode("/",$post_data['income_date'])[2].'-'.explode("/",$post_data['income_date'])[1].'-'.explode("/",$post_data['income_date'])[0] : "0000-00-00",
         'source_of_income'      => $post_data['source_of_income'],  
         'crop_id'               => $post_data['crop_id'],
         'sale_to'               => $post_data['sale_to'],
         'fpo_id'                => $post_data['fpo_id'],
         'income_category'       => $post_data['income_category'],
         'borrower_name'         => $post_data['borrower_name'],
         'trans_income'          => $post_data['trans_income'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_income', $income_data);
   } 

   function updateIncome() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['income_id'] >0) {
            $income_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'income_date'           => ($post_data['income_date'] != "")? explode("/",$post_data['income_date'])[2].'-'.explode("/",$post_data['income_date'])[1].'-'.explode("/",$post_data['income_date'])[0] : "0000-00-00",
               'source_of_income'      => $post_data['source_of_income'],  
               'crop_id'               => $post_data['crop_id'],
               'sale_to'               => $post_data['sale_to'],
               'fpo_id'                => $post_data['fpo_id'],
               'income_category'       => $post_data['income_category'],
               'borrower_name'         => $post_data['borrower_name'],
               'trans_income'          => $post_data['trans_income'],
               'remarks'               => $post_data['remarks'],
               'flag'                  => $post_data['flag']     
            );                 
            return $this->db->update('fpo_fd_income', $income_data, array('id' => $post_data['income_id']));
      }
      else {
         return false;
      }
   } 

   function deleteIncome() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['income_id'] >0) { 
         $income_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_income', $income_data, array('id' => $post_data['income_id']));
      }
      else {
         return false;
      }         
   }
   
   function expenseList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.expense_date, "%d/%m/%Y") expense_date, ref.source_of_expense, ref.crop_id,tcnm.name crop_name, ref.area_of_expense, ref.type_of_expense, ref.lender_name, round(ref.trans_expense,0) trans_expense, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_expense as ref');
		$this->db->join('trv_crop_name_master as tcnm', 'tcnm.id = ref.crop_id');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.expense_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getExpense($expense_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.expense_date, "%d/%m/%Y") expense_date, ref.source_of_expense, ref.crop_id, ref.area_of_expense, ref.type_of_expense, ref.lender_name, ref.trans_expense, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_expense as ref');
        $this->db->where(array('ref.id' => $expense_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 
   
   function addExpense() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $expense_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'expense_date'          => ($post_data['expense_date'] != "")? explode("/",$post_data['expense_date'])[2].'-'.explode("/",$post_data['expense_date'])[1].'-'.explode("/",$post_data['expense_date'])[0] : "0000-00-00",
         'source_of_expense'     => $post_data['source_of_expense'],  
         'crop_id'               => $post_data['crop_id'],
         'area_of_expense'       => $post_data['area_of_expense'],
         'type_of_expense'       => $post_data['type_of_expense'],
         'lender_name'           => $post_data['lender_name'],
         'trans_expense'         => $post_data['trans_expense'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_expense', $expense_data);
   }
   
   function updateExpense() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['expense_id'] >0) {
            $expense_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'expense_date'          => ($post_data['expense_date'] != "")? explode("/",$post_data['expense_date'])[2].'-'.explode("/",$post_data['expense_date'])[1].'-'.explode("/",$post_data['expense_date'])[0] : "0000-00-00",
               'source_of_expense'     => $post_data['source_of_expense'],  
               'crop_id'               => $post_data['crop_id'],
               'area_of_expense'       => $post_data['area_of_expense'],
               'type_of_expense'       => $post_data['type_of_expense'],
               'lender_name'           => $post_data['lender_name'],
               'trans_expense'         => $post_data['trans_expense'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']    
            );                 
            return $this->db->update('fpo_fd_expense', $expense_data, array('id' => $post_data['expense_id']));
      }
      else {
         return false;
      }
   }
   
   function deleteExpense() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['expense_id'] >0) { 
         $expense_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_expense', $expense_data, array('id' => $post_data['expense_id']));
      }
      else {
         return false;
      }         
   }

   function loanReceiptList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.receipt_date, "%d/%m/%Y") receipt_date, ref.source, ref.financier_name, round(ref.loan,0) loan, ref.tenure, round(ref.rate_of_interest,0) rate_of_interest, ref.uom, u.short_name uom_name, ref.security, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_receipt as ref');
		$this->db->join('trv_uom_master as u', "ref.uom = u.id");
		$this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.receipt_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getLoanReceipt($loan_receipt_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.receipt_date, "%d/%m/%Y") receipt_date, ref.source, ref.financier_name, ref.loan, ref.tenure, ref.rate_of_interest, ref.uom, ref.security, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_receipt as ref');
        $this->db->where(array('ref.id' => $loan_receipt_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addLoanReceipt() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $loan_receipt_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'receipt_date'          => ($post_data['receipt_date'] != "")? explode("/",$post_data['receipt_date'])[2].'-'.explode("/",$post_data['receipt_date'])[1].'-'.explode("/",$post_data['receipt_date'])[0] : "0000-00-00",
         'source'                => $post_data['source'],  
         'financier_name'        => $post_data['financier_name'],
         'loan'                  => $post_data['loan'],
         'tenure'                => $post_data['tenure'],
         'rate_of_interest'      => $post_data['rate_of_interest'],
         'uom'                   => $post_data['uom'],
         'security'              => $post_data['security'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_loan_receipt', $loan_receipt_data);
   }

   function updateLoanReceipt() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_receipt_id'] >0) {
            $loan_receipt_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'receipt_date'          => ($post_data['receipt_date'] != "")? explode("/",$post_data['receipt_date'])[2].'-'.explode("/",$post_data['receipt_date'])[1].'-'.explode("/",$post_data['receipt_date'])[0] : "0000-00-00",
               'source'                => $post_data['source'],  
               'financier_name'        => $post_data['financier_name'],
               'loan'                  => $post_data['loan'],
               'tenure'                => $post_data['tenure'],
               'rate_of_interest'      => $post_data['rate_of_interest'],
               'uom'                   => $post_data['uom'],
               'security'              => $post_data['security'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']   
            );                 
            return $this->db->update('fpo_fd_loan_receipt', $loan_receipt_data, array('id' => $post_data['loan_receipt_id']));
      }
      else {
         return false;
      }
   }

   function deleteLoanReceipt() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_receipt_id'] >0) { 
         $loan_receipt_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_loan_receipt', $loan_receipt_data, array('id' => $post_data['loan_receipt_id']));
      }
      else {
         return false;
      }         
   } 

   function loanRepaymentList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.repayment_date, "%d/%m/%Y") repayment_date, ref.financier_name, round(ref.principal_repayment,0) principal_repayment, round(ref.interest) interest, round(ref.total) total, round(ref.balance) balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_repayment as ref');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.repayment_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getLoanRepayment($loan_repayment_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.repayment_date, "%d/%m/%Y") repayment_date, ref.financier_name, ref.principal_repayment, ref.interest, ref.total, ref.balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_repayment as ref');
        $this->db->where(array('ref.id' => $loan_repayment_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addLoanRepayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $loan_repayment_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'repayment_date'        => ($post_data['repayment_date'] != "")? explode("/",$post_data['repayment_date'])[2].'-'.explode("/",$post_data['repayment_date'])[1].'-'.explode("/",$post_data['repayment_date'])[0] : "0000-00-00",
         'financier_name'        => $post_data['financier_name'],
         'principal_repayment'   => $post_data['principal_repayment'],
         'interest'              => $post_data['interest'],
         'total'                 => $post_data['total'],
         'balance'               => $post_data['balance'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_loan_repayment', $loan_repayment_data);
   }

   function updateLoanRepayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_repayment_id'] >0) {
            $loan_repayment_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'repayment_date'        => ($post_data['repayment_date'] != "")? explode("/",$post_data['repayment_date'])[2].'-'.explode("/",$post_data['repayment_date'])[1].'-'.explode("/",$post_data['repayment_date'])[0] : "0000-00-00",
               'financier_name'        => $post_data['financier_name'],
               'principal_repayment'   => $post_data['principal_repayment'],
               'interest'              => $post_data['interest'],
               'total'                 => $post_data['total'],
               'balance'               => $post_data['balance'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']   
            );                 
            return $this->db->update('fpo_fd_loan_repayment', $loan_repayment_data, array('id' => $post_data['loan_repayment_id']));
      }
      else {
         return false;
      }
   }

   function deleteLoanRepayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_repayment_id'] >0) { 
         $loan_repayment_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_loan_repayment', $loan_repayment_data, array('id' => $post_data['loan_repayment_id']));
      }
      else {
         return false;
      }         
   } 

   function loanIssueList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.issue_date, "%d/%m/%Y") issue_date, ref.borrower_name, round(ref.loan,0) loan, round(ref.rate_of_interest,0) rate_of_interest, ref.uom, ref.tenure, round(ref.balance) balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_issue as ref');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.issue_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getLoanIssue($loan_issue_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.issue_date, "%d/%m/%Y") issue_date, ref.borrower_name, ref.loan, ref.rate_of_interest, ref.uom, ref.tenure, ref.balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_issue as ref');
        $this->db->where(array('ref.id' => $loan_issue_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addLoanIssue() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $loan_issue_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'issue_date'            => ($post_data['issue_date'] != "")? explode("/",$post_data['issue_date'])[2].'-'.explode("/",$post_data['issue_date'])[1].'-'.explode("/",$post_data['issue_date'])[0] : "0000-00-00",
         'borrower_name'         => $post_data['borrower_name'],
         'loan'                  => $post_data['loan'],
         'rate_of_interest'      => $post_data['rate_of_interest'],
         'uom'                   => $post_data['uom'],
         'tenure'                => $post_data['tenure'],
         'balance'               => $post_data['balance'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_loan_issue', $loan_issue_data);
   }

   function updateLoanIssue() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_issue_id'] >0) {
            $loan_issue_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'issue_date'            => ($post_data['issue_date'] != "")? explode("/",$post_data['issue_date'])[2].'-'.explode("/",$post_data['issue_date'])[1].'-'.explode("/",$post_data['issue_date'])[0] : "0000-00-00",
               'borrower_name'         => $post_data['borrower_name'],
               'loan'                  => $post_data['loan'],
               'rate_of_interest'      => $post_data['rate_of_interest'],
               'uom'                   => $post_data['uom'],
               'tenure'                => $post_data['tenure'],
               'balance'               => $post_data['balance'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']   
            );                 
            return $this->db->update('fpo_fd_loan_issue', $loan_issue_data, array('id' => $post_data['loan_issue_id']));
      }
      else {
         return false;
      }
   }

   function deleteLoanIssue() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_issue_id'] >0) { 
         $loan_issue_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_loan_issue', $loan_issue_data, array('id' => $post_data['loan_issue_id']));
      }
      else {
         return false;
      }         
   } 

   function loanReturnList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.return_date, "%d/%m/%Y") return_date, ref.borrower_name, round(ref.principal,0) principal, round(ref.interest,0) interest, round(ref.total,0) total, round(ref.balance,0) balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_return as ref');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.return_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getLoanReturn($loan_return_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.return_date, "%d/%m/%Y") return_date, ref.borrower_name, ref.principal, ref.interest, ref.total, ref.balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_loan_return as ref');
        $this->db->where(array('ref.id' => $loan_return_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addLoanReturn() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $loan_return_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'return_date'           => ($post_data['return_date'] != "")? explode("/",$post_data['return_date'])[2].'-'.explode("/",$post_data['return_date'])[1].'-'.explode("/",$post_data['return_date'])[0] : "0000-00-00",
         'borrower_name'         => $post_data['borrower_name'],
         'principal'             => $post_data['principal'],
         'interest'              => $post_data['interest'],
         'total'                 => $post_data['total'],
         'balance'               => $post_data['balance'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_loan_return', $loan_return_data);
   }

   function updateLoanReturn() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_return_id'] >0) {
            $loan_return_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'return_date'           => ($post_data['return_date'] != "")? explode("/",$post_data['return_date'])[2].'-'.explode("/",$post_data['return_date'])[1].'-'.explode("/",$post_data['return_date'])[0] : "0000-00-00",
               'borrower_name'         => $post_data['borrower_name'],
               'principal'             => $post_data['principal'],
               'interest'              => $post_data['interest'],
               'total'                 => $post_data['total'],
               'balance'               => $post_data['balance'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']  
            );                 
            return $this->db->update('fpo_fd_loan_return', $loan_return_data, array('id' => $post_data['loan_return_id']));
      }
      else {
         return false;
      }
   }

   function deleteLoanReturn() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['loan_return_id'] >0) { 
         $loan_return_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_loan_return', $loan_return_data, array('id' => $post_data['loan_return_id']));
      }
      else {
         return false;
      }         
   }

    function storageDepositList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.deposit_date, "%d/%m/%Y") deposit_date, ref.storage_type, ref.storage_name, ref.commodity, ref.quantity, ref.uom, u.short_name uom_name, round(ref.rent,0) rent, ref.receipt_no, ref.balance_quantity, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_storage_deposit as ref');
		$this->db->join('trv_uom_master as u', "ref.uom = u.id");
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.deposit_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getStorageDeposit($storage_deposit_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.deposit_date, "%d/%m/%Y") deposit_date, ref.storage_type, ref.storage_name, ref.commodity, ref.quantity, ref.uom, ref.rent, ref.receipt_no, ref.balance_quantity, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_storage_deposit as ref');
        $this->db->where(array('ref.id' => $storage_deposit_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addStorageDeposit() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $storage_deposit_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'deposit_date'          => ($post_data['deposit_date'] != "")? explode("/",$post_data['deposit_date'])[2].'-'.explode("/",$post_data['deposit_date'])[1].'-'.explode("/",$post_data['deposit_date'])[0] : "0000-00-00",
         'storage_type'          => $post_data['storage_type'],
         'storage_name'          => $post_data['storage_name'],
         'commodity'             => $post_data['commodity'],
         'quantity'              => $post_data['quantity'],
         'uom'                   => $post_data['uom'],
         'rent'                  => $post_data['rent'],
         'receipt_no'            => $post_data['receipt_no'],
         'balance_quantity'      => $post_data['balance_quantity'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_storage_deposit', $storage_deposit_data);
   }

   function updateStorageDeposit() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['storage_deposit_id'] >0) {
            $storage_deposit_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'deposit_date'          => ($post_data['deposit_date'] != "")? explode("/",$post_data['deposit_date'])[2].'-'.explode("/",$post_data['deposit_date'])[1].'-'.explode("/",$post_data['deposit_date'])[0] : "0000-00-00",
               'storage_type'          => $post_data['storage_type'],
               'storage_name'          => $post_data['storage_name'],
               'commodity'             => $post_data['commodity'],
               'quantity'              => $post_data['quantity'],
               'uom'                   => $post_data['uom'],
               'rent'                  => $post_data['rent'],
               'receipt_no'            => $post_data['receipt_no'],
               'balance_quantity'      => $post_data['balance_quantity'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']  
            );                 
            return $this->db->update('fpo_fd_storage_deposit', $storage_deposit_data, array('id' => $post_data['storage_deposit_id']));
      }
      else {
         return false;
      }
   }

   function deleteStorageDeposit() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['storage_deposit_id'] >0) { 
         $storage_deposit_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_storage_deposit', $storage_deposit_data, array('id' => $post_data['storage_deposit_id']));
      }
      else {
         return false;
      }         
   }   

   function fixedDepositList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.deposit_date, "%d/%m/%Y") deposit_date, ref.bank_name, round(ref.fixed_deposit,0) fixed_deposit, round(ref.rate_of_interest,0) rate_of_interest, ref.uom, u.short_name uom_name, ref.tenure, round(ref.balance,0) balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_fixed_deposit as ref');
		$this->db->join('trv_uom_master as u', "ref.uom = u.id");
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.deposit_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getFixedDeposit($fixed_deposit_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.deposit_date, "%d/%m/%Y") deposit_date, ref.bank_name, ref.fixed_deposit, ref.rate_of_interest, ref.uom, ref.tenure, ref.balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_fixed_deposit as ref');
        $this->db->where(array('ref.id' => $fixed_deposit_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addFixedDeposit() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $fixed_deposit_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'deposit_date'          => ($post_data['deposit_date'] != "")? explode("/",$post_data['deposit_date'])[2].'-'.explode("/",$post_data['deposit_date'])[1].'-'.explode("/",$post_data['deposit_date'])[0] : "0000-00-00",
         'bank_name'             => $post_data['bank_name'],
         'fixed_deposit'         => $post_data['fixed_deposit'],
         'rate_of_interest'      => $post_data['rate_of_interest'],
         'uom'                   => $post_data['uom'],
         'tenure'                => $post_data['tenure'],
         'balance'               => $post_data['balance'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_fixed_deposit', $fixed_deposit_data);
   }

   function updateFixedDeposit() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['fixed_deposit_id'] >0) {
            $fixed_deposit_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'deposit_date'          => ($post_data['deposit_date'] != "")? explode("/",$post_data['deposit_date'])[2].'-'.explode("/",$post_data['deposit_date'])[1].'-'.explode("/",$post_data['deposit_date'])[0] : "0000-00-00",
               'bank_name'             => $post_data['bank_name'],
               'fixed_deposit'         => $post_data['fixed_deposit'],
               'rate_of_interest'      => $post_data['rate_of_interest'],
               'uom'                   => $post_data['uom'],
               'tenure'                => $post_data['tenure'],
               'balance'               => $post_data['balance'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']   
            );                 
            return $this->db->update('fpo_fd_fixed_deposit', $fixed_deposit_data, array('id' => $post_data['fixed_deposit_id']));
      }
      else {
         return false;
      }
   }

   function deleteFixedDeposit() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['fixed_deposit_id'] >0) { 
         $fixed_deposit_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_fixed_deposit', $fixed_deposit_data, array('id' => $post_data['fixed_deposit_id']));
      }
      else {
         return false;
      }         
   } 

   function fixedDepositWithdrawList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.withdraw_date, "%d/%m/%Y") withdraw_date, ref.bank_name, round(ref.withdraw,0) withdraw, round(ref.interest,0) interest, round(ref.total,0) total, round(ref.balance,0) balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_fixed_deposit_withdraw as ref');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.withdraw_date', 'DESC');
        return $this->db->get()->result();
   }
   
   function getFixedDepositWithdraw($fixed_deposit_withdraw_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.withdraw_date, "%d/%m/%Y") withdraw_date, ref.bank_name, ref.withdraw, ref.interest, ref.total, ref.balance, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_fixed_deposit_withdraw as ref');
        $this->db->where(array('ref.id' => $fixed_deposit_withdraw_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 

   function addFixedDepositWithdraw() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $fixed_deposit_withdraw_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'withdraw_date'         => ($post_data['withdraw_date'] != "")? explode("/",$post_data['withdraw_date'])[2].'-'.explode("/",$post_data['withdraw_date'])[1].'-'.explode("/",$post_data['withdraw_date'])[0] : "0000-00-00",
         'bank_name'             => $post_data['bank_name'],
         'withdraw'              => $post_data['withdraw'],
         'interest'              => $post_data['interest'],
         'total'                 => $post_data['total'],
         'balance'               => $post_data['balance'],
         'remarks'               => $post_data['remarks'],  
         'flag'                  => $post_data['flag'],    
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_fd_fixed_deposit_withdraw', $fixed_deposit_withdraw_data);
   }

   function updateFixedDepositWithdraw() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['fixed_deposit_withdraw_id'] >0) {
            $fixed_deposit_withdraw_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'withdraw_date'         => ($post_data['withdraw_date'] != "")? explode("/",$post_data['withdraw_date'])[2].'-'.explode("/",$post_data['withdraw_date'])[1].'-'.explode("/",$post_data['withdraw_date'])[0] : "0000-00-00",
               'bank_name'             => $post_data['bank_name'],
               'withdraw'              => $post_data['withdraw'],
               'interest'              => $post_data['interest'],
               'total'                 => $post_data['total'],
               'balance'               => $post_data['balance'],
               'remarks'               => $post_data['remarks'],  
               'flag'                  => $post_data['flag']   
            );                 
            return $this->db->update('fpo_fd_fixed_deposit_withdraw', $fixed_deposit_withdraw_data, array('id' => $post_data['fixed_deposit_withdraw_id']));
      }
      else {
         return false;
      }
   }

   function deleteFixedDepositWithdraw() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['fixed_deposit_withdraw_id'] >0) { 
         $fixed_deposit_withdraw_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_fixed_deposit_withdraw', $fixed_deposit_withdraw_data, array('id' => $post_data['fixed_deposit_withdraw_id']));
      }
      else {
         return false;
      }         
   } 

   function saleList($farmer_id) { 
        $this->db->select('tcnm.name crop_name, tcnm.id crop_id, ref.id, ref.crop_variety_id,tcvm.variety crop_variety_name, ref.output_id, tcnm.name crop_output_name, ref.quantity,ref.quantity_uom, u.short_name uom_name, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.sale_status, ref.remarks, ref.flag,ref.farmer_id, "100" min_price, "300" max_price');
        $this->db->from('fpo_fd_sale as ref');
		$this->db->join('trv_uom_master as u', "ref.quantity_uom = u.id");
		$this->db->join('trv_crop_master as tch', "ref.output_id = tch.variety_id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.id = ref.crop_id');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.crop_variety_id');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1', 'ref.sale_status <> ' => '4'));
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }
   
   function get_available_saleList($farmer_id) {
        $this->db->select('tcnm.id crop_id, tcnm.name crop_name, ref.variety_id, tcvm.variety crop_variety_name, tcnm.id output_id, tcnm.name crop_output_name, ref.output_qty quantity, ref.qty_uom quantity_uom, u.short_name uom_name, ref.farmer_id');
        $this->db->from('trv_crop_harvest as ref');
		$this->db->join('trv_uom_master as u', "ref.qty_uom = u.id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.name = ref.output');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.variety_id and tcvm.name_id = tcnm.id');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }
   
   
   function getSale($sale_id) {         
        $this->db->select('ref.id, ref.crop_variety_id, ref.output_id, ref.quantity, ref.quantity_uom, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.sale_status, ref.remarks, ref.flag');
        $this->db->from('fpo_fd_sale as ref');
        $this->db->where(array('ref.id' => $sale_id, 'ref.status' => '1'));
        return $this->db->get()->result();
   } 
   
   function getlatestsaleid($farmer_id) {
       $this->db->select('id');
       $this->db->from('fpo_fd_sale');
       $this->db->where('farmer_id',$farmer_id);
       $this->db->order_by('id', 'desc');
       $this->db->limit('1','0');
       return $this->db->get()->row();
   }
   
   function postSale($sale_id) {
        $this->db->select('tcnm.id crop_id, tcnm.name crop_name, ref.id,tf.profile_name farmer_name, CONCAT(tf.door_no, ",", tf.street) AS address, tf.mobile mobile_no, tcvm.variety crop_variety_name, tcnm.name crop_output_name, ref.quantity,ref.quantity, u.short_name uom_name, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.remarks, ref.farmer_id');
        $this->db->from('fpo_fd_sale as ref');
		$this->db->join('trv_uom_master as u', "ref.quantity_uom = u.id");
		$this->db->join('trv_crop_master as tch', "ref.output_id = tch.variety_id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.id = ref.crop_id');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.crop_variety_id');
		$this->db->join('trv_farmer as tf', 'tf.id = ref.farmer_id');
        $this->db->where(array('ref.id' => $sale_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }
   
   function postPayments($sale_id) {
        $this->db->select('tcnm.id crop_id, tcnm.name crop_name, ref.id,tf.profile_name farmer_name, CONCAT(tf.door_no, ",", tf.street) AS address, tf.mobile mobile_no, tcvm.variety crop_variety_name, tcnm.name crop_output_name, ref.quantity,ref.quantity, u.short_name uom_name, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.remarks, ref.farmer_id, ref.sale_price, "100" min_price, "300" max_price');
        $this->db->from('fpo_fd_sale as ref');
		$this->db->join('trv_uom_master as u', "ref.quantity_uom = u.id");
		$this->db->join('trv_crop_master as tch', "ref.output_id = tch.variety_id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.id = ref.crop_id');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.crop_variety_id');
		$this->db->join('trv_farmer as tf', 'tf.id = ref.farmer_id');
        $this->db->where(array('ref.id' => $sale_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }

   function addSale() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $expected_date = "0000-00-00";
      $expected_time = "00:00";
      if($post_data['expected_time'] != '') {
         $arr_expected_time = explode(' ', $post_data['expected_time']);
         $expected_date = explode("/",$arr_expected_time[0])[2].'-'.explode("/",$arr_expected_time[0])[1].'-'.explode("/",$arr_expected_time[0])[0];
         $expected_time = $arr_expected_time[1];
      }
      $sale_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'crop_id'               => $post_data['crop_id'],
         'delivery_type'         => $post_data['delivery_type'],
         'crop_variety_id'       => $post_data['crop_variety_id'],
         'output_id'             => $post_data['output_id'],
         'quantity'              => $post_data['quantity'],
         'quantity_uom'          => $post_data['quantity_uom'],
         'expected_time'         => $expected_date." ".$expected_time,
         'sale_status'           => $post_data['sale_status'], //1-Open, 2- In Progress, 3- Re-Open, 4-Closed 
         'remarks'               => $post_data['remarks'],
         'flag'                  => $post_data['flag'],         
         'status'                => 1,  //Active
         'updated_on'            => date("Y-m-d H:i:s")
      );               
      return $this->db->insert('fpo_fd_sale', $sale_data);
   }

   function updateSale() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['sale_id'] >0) {
            $expected_date = "0000-00-00";
            $expected_time = "00:00";
            if($post_data['expected_time'] != '') {
               $arr_expected_time = explode(' ', $post_data['expected_time']);
               $expected_date = explode("/",$arr_expected_time[0])[2].'-'.explode("/",$arr_expected_time[0])[1].'-'.explode("/",$arr_expected_time[0])[0];
               $expected_time = $arr_expected_time[1];
            }
            $sale_data = array(	
               'farmer_id'             => $post_data['farmer_id'],
               'crop_id'             => $post_data['crop_id'],
               'delivery_type'         => $post_data['delivery_type'],
               'crop_variety_id'       => $post_data['crop_variety_id'],
               'output_id'             => $post_data['output_id'],
               'quantity'              => $post_data['quantity'],
               'quantity_uom'          => $post_data['quantity_uom'],
               'expected_time'         => $expected_date." ".$expected_time,
               'sale_status'           => $post_data['sale_status'], //1-Open, 2- In Progress, 3- Re-Open, 4-Closed 
               'remarks'               => $post_data['remarks'],
               'flag'                  => $post_data['flag'],   
               'updated_on'            => date("Y-m-d H:i:s")
            );                 
            return $this->db->update('fpo_fd_sale', $sale_data, array('id' => $post_data['sale_id']));
      }
      else {
         return false;
      }
   }

   function deleteSale() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['sale_id'] >0) { 
         $sale_data = array(	
            'status'             => 2, //Deleted
         );
         return $this->db->update('fpo_fd_sale', $sale_data, array('id' => $post_data['sale_id']));
      }
      else {
         return false;
      }         
   } 

   function updateSaleStatus() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['sale_id'] >0) { 
         $sale_data = array(	
            'sale_status'           => $post_data['sale_status'],
            'trader_id'           => $post_data['trader_id'],
            'updated_on'            => date("Y-m-d H:i:s")
         );
         return $this->db->update('fpo_fd_sale', $sale_data, array('id' => $post_data['sale_id']));
      }
      else {
         return false;
      }         
   }
   
   function updateSalePrice() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['sale_id'] >0) { 
         $sale_data = array(	
            'sale_price'           => $post_data['sale_price'],
            'sale_status'           => $post_data['sale_status'],
            'quantity'              => $post_data['quantity'],
            'trader_id'           => $post_data['trader_id'],
            'updated_on'            => date("Y-m-d H:i:s")
         );
         return $this->db->update('fpo_fd_sale', $sale_data, array('id' => $post_data['sale_id']));
      }
      else {
         return false;
      }         
   }
   
   function traderList($trader_id) {         
        $this->db->select('ref.id, tcnm.id crop_id, tcnm.name crop_name, tf.profile_name farmer_name, CONCAT(tf.door_no, ",", tf.street) AS address, tf.mobile mobile_no, ref.crop_variety_id, ref.output_id, tcvm.variety crop_variety_name, tcnm.name crop_output_name, ref.quantity_uom,ref.quantity, u.short_name uom_name, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.remarks, ref.farmer_id, ref.sale_price, "100" min_price, "300" max_price, ref.sale_status' );
        $this->db->from('fpo_fd_sale as ref');
		$this->db->join('trv_uom_master as u', "ref.quantity_uom = u.id");
		$this->db->join('trv_crop_master as tch', "ref.output_id = tch.variety_id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.id = ref.crop_id');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.crop_variety_id');
		$this->db->join('trv_farmer as tf', 'tf.id = ref.farmer_id');
        $this->db->where(array('ref.trader_id' => $trader_id, 'ref.status' => '1', 'ref.sale_status <> ' => '4'));
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }
   
   function farmer_salereport($farmer_id,$from_date,$to_date) {
        $arr_expected_time = explode(' ', $from_date);
        $from_date = explode("/",$arr_expected_time[0])[2].'-'.explode("/",$arr_expected_time[0])[1].'-'.explode("/",$arr_expected_time[0])[0].' 00:00:00';
        $arr_expected_time = explode(' ', $to_date);
        $to_date = explode("/",$arr_expected_time[0])[2].'-'.explode("/",$arr_expected_time[0])[1].'-'.explode("/",$arr_expected_time[0])[0].' 23:59:59';
        $this->db->select('ref.id, tcnm.id crop_id, tcnm.name crop_name, tf.profile_name farmer_name, CONCAT(tf.door_no, ",", tf.street) AS address, tf.mobile mobile_no, ref.crop_variety_id, ref.output_id, tcvm.variety crop_variety_name, tcnm.name crop_output_name, ref.quantity_uom,ref.quantity, u.short_name uom_name, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.remarks, ref.farmer_id, ref.sale_price, "100" min_price, "300" max_price, ref.sale_status' );
        $this->db->from('fpo_fd_sale as ref');
		$this->db->join('trv_uom_master as u', "ref.quantity_uom = u.id");
		$this->db->join('trv_crop_master as tch', "ref.output_id = tch.variety_id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.id = ref.crop_id');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.crop_variety_id');
		$this->db->join('trv_farmer as tf', 'tf.id = ref.farmer_id');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1', 'ref.sale_status' => '4'));
        $this->db->where('ref.expected_time >= "'.$from_date. '" and ref.expected_time <= "'.$to_date.'"');
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }
   
   function trader_salereport($trader_id,$from_date,$to_date) {
        $arr_expected_time = explode(' ', $from_date);
        $from_date = explode("/",$arr_expected_time[0])[2].'-'.explode("/",$arr_expected_time[0])[1].'-'.explode("/",$arr_expected_time[0])[0].' 00:00:00';
        $arr_expected_time = explode(' ', $to_date);
        $to_date = explode("/",$arr_expected_time[0])[2].'-'.explode("/",$arr_expected_time[0])[1].'-'.explode("/",$arr_expected_time[0])[0].' 23:59:59';
        $this->db->select('ref.id, tcnm.id crop_id, tcnm.name crop_name, tf.profile_name farmer_name, CONCAT(tf.door_no, ",", tf.street) AS address, tf.mobile mobile_no, ref.crop_variety_id, ref.output_id, tcvm.variety crop_variety_name, tcnm.name crop_output_name, ref.quantity_uom,ref.quantity, u.short_name uom_name, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.remarks, ref.farmer_id, ref.sale_price, "100" min_price, "300" max_price, ref.sale_status' );
        $this->db->from('fpo_fd_sale as ref');
		$this->db->join('trv_uom_master as u', "ref.quantity_uom = u.id");
		$this->db->join('trv_crop_master as tch', "ref.output_id = tch.variety_id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.id = ref.crop_id');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.crop_variety_id');
		$this->db->join('trv_farmer as tf', 'tf.id = ref.farmer_id');
        $this->db->where(array('ref.trader_id' => $trader_id, 'ref.status' => '1', 'ref.sale_status' => '4'));
        $this->db->where('ref.expected_time >= "'.$from_date. '" and ref.expected_time <= "'.$to_date.'"');
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }
   
   function closedtraderList($trader_id) {         
        $this->db->select('ref.id, tcnm.id crop_id, tcnm.name crop_name, tf.profile_name farmer_name, CONCAT(tf.door_no, ",", tf.street) AS address, tf.mobile mobile_no, ref.crop_variety_id, ref.output_id, tcvm.variety crop_variety_name, tcnm.name crop_output_name, ref.quantity_uom,ref.quantity, u.short_name uom_name, DATE_FORMAT(ref.expected_time, "%d/%m/%Y %H:%i") expected_time, ref.remarks, ref.farmer_id, ref.sale_price, "100" min_price, "300" max_price, ref.sale_status' );
        $this->db->from('fpo_fd_sale as ref');
		$this->db->join('trv_uom_master as u', "ref.quantity_uom = u.id");
		$this->db->join('trv_crop_master as tch', "ref.output_id = tch.variety_id");
		$this->db->join('trv_crop_name_master tcnm', 'tcnm.id = ref.crop_id');
		$this->db->join('trv_crop_variety_master as tcvm', 'tcvm.id = ref.crop_variety_id');
		$this->db->join('trv_farmer as tf', 'tf.id = ref.farmer_id');
        $this->db->where(array('ref.trader_id' => $trader_id, 'ref.status' => '1', 'ref.sale_status' => '4'));
        $this->db->order_by('ref.id', 'DESC');
        return $this->db->get()->result();
   }
  
}
 
?>