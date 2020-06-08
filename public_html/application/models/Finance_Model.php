<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Finance_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /** Finance Transaction module post values starts **/
    public function postPayment()
    {
        //$payments = array_slice($this->input->post('payment'), 0, -1);
        $payments = $this->input->post('payment');
        foreach ($payments as $payment) {
            if (is_array($payment) && isset($payment) && $payment['cost_center'] && !empty($payment['cost_center']) && $payment['amount'] && !empty($payment['amount'])) {
                list($gl_id, $gl_group_code) = explode('-', $payment['cost_center']);
                $bankInfo = explode('-', $payment['payment_from']);

                $payment_details = array(
               'fpo_id'            => $_SESSION['user_id'],
               'voucher_no'        => $this->input->post('voucher_no'),
               'type'              => 1,
               'type_no'           => 1,
               'tran_date'         => $this->input->post('payment_date'),
               'account'           => $bankInfo[0],
               'account_code'      => $bankInfo[1],
               'amount'            => $payment['amount'],
               //'person_type_id'    => 3,
               'memo'             => $this->input->post('memo')
            );
                $this->db->insert('fpo_gl_trans', $payment_details);
                $payment_details1 = array(
               'fpo_id'            => $_SESSION['user_id'],
               'voucher_no'        => $this->input->post('voucher_no'),
               'type'              => 1,
               'type_no'           => 0,
               'tran_date'         => $this->input->post('payment_date'),
               'account'           => $gl_id,
               'account_code'      => $gl_group_code,
               'amount'            => '-'.$payment['amount'],
               //'person_type_id'    => 3,
               'memo'             => $this->input->post('memo')
            );
                $this->db->insert('fpo_gl_trans', $payment_details1);
            }
        }
        return true;
    }


    public function postDeposit()
    {
        //$deposits = array_slice($this->input->post('deposit'), 0, -1);
        $deposits = $this->input->post('deposit');
        foreach ($deposits as $deposit) {
            if (is_array($deposit) && isset($deposit) && $deposit['cost_center'] && !empty($deposit['cost_center']) && $deposit['deposit_into'] && !empty($deposit['deposit_into']) && $deposit['amount'] && !empty($deposit['amount'])) {
                list($gl_id, $gl_group_code) = explode('-', $deposit['cost_center']);
                $bankInfo = explode('-', $deposit['deposit_into']);

                $deposit_details = array(
                  'fpo_id'            => $_SESSION['user_id'],
                  'voucher_no'        => $this->input->post('deposit_ref'),
                  'type'              => 2,
                  'type_no'           => 1,
                  'tran_date'         => $this->input->post('receipt_date'),
                  'account'           => $bankInfo[0],
                  'account_code'      => $bankInfo[1],
                  'amount'            => '-'.$deposit['amount'],
                  'person_type_id'    => 3,
                  'memo'             => $this->input->post('memo')
               );
                $this->db->insert('fpo_gl_trans', $deposit_details);
                $deposit_details1 = array(
                  'fpo_id'            => $_SESSION['user_id'],
                  'voucher_no'        => $this->input->post('deposit_ref'),
                  'type'              => 2,
                  //'type_no'           => '',
                  'tran_date'         => $this->input->post('receipt_date'),
                  //'account'           => $bankInfo[0],
                  'account'           => $gl_id,
                  'account_code'      => $gl_group_code,
                  'amount'            => $deposit['amount'],
                  //'person_type_id'    => 3,
                  'memo'             => $this->input->post('memo')
               );
                $this->db->insert('fpo_gl_trans', $deposit_details1);
            }
        }
        return true;
    }


    public function postBankAccountTransfer()
    {
        list($from_id, $from_group_code) = explode('-', $this->input->post('account_from'));
        list($to_id, $to_group_code) = explode('-', $this->input->post('account_to'));
        $transfer_add_details = array(
            'fpo_id'            => $_SESSION['user_id'],
            'voucher_no'        => $this->input->post('transfer_ref'),
            'type'              => 3,
            'type_no'           => 3,
            'tran_date'         => $this->input->post('transfer_date'),
            'account'           => $from_id,
            'account_code'      => $from_group_code,
            'amount'            => "-".$this->input->post('amount'),
            'memo'             =>  $this->input->post('memo')
      );
        $this->db->insert('fpo_gl_trans', $transfer_add_details);
        $transfer_details = array(
            'fpo_id'            => $_SESSION['user_id'],
            'voucher_no'        => $this->input->post('transfer_ref'),
            'type'              => 3,
            'type_no'           => 3,
            'tran_date'         => $this->input->post('transfer_date'),
            'account'           => $to_id,
            'account_code'      => $to_group_code,
            'amount'            => $this->input->post('amount'),
            'memo'             => $this->input->post('memo')
      );
        return $this->db->insert('fpo_gl_trans', $transfer_details);
    }

    public function postJournalEntry()
    {
        // echo json_encode($this->input->post()); die;
        /*foreach($this->input->post('journal_entry') As $journal_entry) {
            if($journal_entry['credit'] && $journal_entry['credit'] != "" && $journal_entry['credit'] != null) {
             $journal_details = array(
                    'fpo_id'            => $_SESSION['user_id'],
                    'voucher_no'        => $this->input->post('journal_ref'),
                    'type'              => 4,
                    'tran_date'         => $this->input->post('journal_date'),
                    //'account'           => $journal_entry['account_name'],
                    'account_code'      => $journal_entry['cost_center'],
                    'amount'            => $journal_entry['credit'],
                    'memo'              => $this->input->post('memo')
                );
            } else {
                $journal_details = array(
                    'fpo_id'            => $_SESSION['user_id'],
                    'voucher_no'        => $this->input->post('journal_ref'),
                    'type'              => 4,
                    'tran_date'         => $this->input->post('journal_date'),
                    //'account'           => $journal_entry['account_name'],
                    'account_code'      => $journal_entry['cost_center'],
                    'amount'            => '-'.$journal_entry['debit'],
                    'memo'              => $this->input->post('memo')
                );
            }
            $this->db->insert('fpo_gl_trans', $journal_details);
        }*/
        $journal_entry = $this->input->post('journal_entry');
        foreach ($journal_entry as $journal) {
            if (is_array($journal) && isset($journal)) {
                list($gl_id, $gl_group_code) = explode('-', $journal['cost_center']);
                //echo "<pre>";print_r($journal);
                //$bankInfo = explode('-', $journal['credit']);
                if (isset($journal['credit']) && $journal['credit'] && $journal['credit'] != "" && $journal['credit'] != null) {
                    $journal_details = array(
                    'fpo_id'              => $_SESSION['user_id'],
                    'voucher_no'          => $this->input->post('journal_ref'),
                    'type'                => 4,
                    'tran_date'           => $this->input->post('journal_date'),
                    'account'             => $gl_id,
                    'account_code'        => $gl_group_code,
                    'amount'              => $journal['credit'],
                    'memo'                => $this->input->post('memo')
                  );
                } else {
                    $journal_details = array(
                    'fpo_id'             => $_SESSION['user_id'],
                    'voucher_no'         => $this->input->post('journal_ref'),
                    'type'               => 4,
                    'tran_date'          => $this->input->post('journal_date'),
                    'account'            => $gl_id,
                    'account_code'       => $gl_group_code,
                    'amount'             => '-'.$journal['debit'],
                    'memo'               => $this->input->post('memo')
                  );
                }

                $this->db->insert('fpo_gl_trans', $journal_details);
            }
        }
        return true;
    }
    /** Finance Transaction module post values end **/

    /** Finance Inquiries & Reports module post values starts **/
    /** April 10 **/
    public function postJournalInquiry()
    {
        if ($this->input->post("show_all") == 1) {
            $this->db->select('fpo_gl_trans.*, trv_chart_master.account_name, , fpo_debtors_master.name As customerName, fpo_suppliers.supp_name As supplierName');
            $this->db->where(array('fpo_gl_trans.type' => 4, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
            $this->db->from('fpo_gl_trans');
            //$this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.id = fpo_gl_trans.account');
            $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
            $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
            return $this->db->get()->result();
        } else {
            $this->db->select('fpo_gl_trans.*, trv_chart_master.account_name, , fpo_debtors_master.name As customerName, fpo_suppliers.supp_name As supplierName');
            /*,fpo_bank_accounts.bank_account_name,fpo_bank_accounts.bank_account_number*/
            $this->db->where(array('fpo_gl_trans.type' => 4, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("journal_entry_from"));
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("journal_entry_to"));
            if ($this->input->post("type") == 1) {
                $this->db->where('fpo_gl_trans.amount >=', 1);
            }
            if ($this->input->post("type") == 2) {
                $this->db->where('fpo_gl_trans.amount <=', 0);
            }
            if ($this->input->post("voucher_no")) {
                $this->db->where('fpo_gl_trans.voucher_no', $this->input->post("voucher_no"));
            }
            $this->db->from('fpo_gl_trans');
            $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
            $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
            //$this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.id = fpo_gl_trans.account');
            return $this->db->get()->result();
        }
    }


    public function postGLInquiry()
    {
        $this->db->select('fpo_gl_trans.*, fpo_bank_accounts.bank_account_name, fpo_bank_accounts.bank_account_number');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        if ($this->input->post("account_holder") != "") {
            $this->db->where('fpo_gl_trans.account', $this->input->post("account_holder"));
        }
        if ($this->input->post("amount_min") && $this->input->post("amount_min") != "0.00") {
            $this->db->where('fpo_gl_trans.amount >=', $this->input->post("amount_min"));
        }
        if ($this->input->post("amount_max") && $this->input->post("amount_max") != "0.00") {
            $this->db->where('fpo_gl_trans.amount <=', $this->input->post("amount_max"));
        }
        if ($this->input->post("ledger_from") != "" && $this->input->post("ledger_from") != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("ledger_from"));
        }
        if ($this->input->post("ledger_to") != "" && $this->input->post("ledger_to") != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("ledger_to"));
        }
        $this->db->from('fpo_gl_trans');
        $this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.id = fpo_gl_trans.account');
        return $this->db->get()->result();
    }

    public function postGLcashreports()
    {
        $this->db->select('fpo_gl_trans.*, trv_chart_master.account_name');
        if ($this->input->post("amount_min") && $this->input->post("amount_min") != "0.00") {
            $this->db->where('fpo_gl_trans.amount >=', $this->input->post("amount_min"));
        }
        if ($this->input->post("amount_max") && $this->input->post("amount_max") != "0.00") {
            $this->db->where('fpo_gl_trans.amount <=', $this->input->post("amount_max"));
        }
        if ($this->input->post("ledger_from") != "" && $this->input->post("ledger_from") != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("ledger_from"));
        }
        if ($this->input->post("ledger_to") != "" && $this->input->post("ledger_to") != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("ledger_to"));
        }
        if ($this->input->post("type") && $this->input->post("type") == 'ledger') {
            $this->db->where(array('fpo_gl_trans.account' => $this->input->post("account_holder"), /*'fpo_gl_trans.type_no' => 1, */'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        } else {
            $this->db->where(array('fpo_gl_trans.account' => $this->input->post("account_holder"), 'fpo_gl_trans.account_code' => 40204, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        }
        //$this->db->where(array('fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        //$this->db->where_in('fpo_gl_trans.account_code', ['40204', '4020501', '4020502']);
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        //print_r($this->db->get()->result());die;
        return $this->db->get()->result();
    }

    public function closingBalanceGLcashreports($type, $fromValue, $toValue)
    {
        $this->db->select('SUM(fpo_gl_trans.amount) As balance');
        if ($fromValue != "" && $fromValue != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $fromValue);
        }
        if ($toValue != "" && $toValue != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $toValue);
        }
        $this->db->where(array('fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        /*if($type == 1){
            $this->db->where_in('fpo_gl_trans.account_code', ['40204', '4020501', '4020502']);
        } else {
            $this->db->where('fpo_gl_trans.account_code', $this->input->post('account_holder'));
        }*/
        if ($this->input->post("type") && $this->input->post("type") == 'ledger') {
            $this->db->where(array('fpo_gl_trans.account' => $this->input->post("account_holder"), 'fpo_gl_trans.type_no' => 1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        } else {
            $this->db->where(array('fpo_gl_trans.account' => $this->input->post("account_holder"), 'fpo_gl_trans.account_code' => 40204, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        }
        $this->db->from('fpo_gl_trans');
        return $this->db->get()->row();
    }

    public function postGLPersonReports($type, $typeNo)
    {
        $person_id = $this->input->post('account_holder');
        $this->db->select('fpo_gl_trans.*, trv_chart_master.account_name');
        if ($this->input->post("amount_min") && $this->input->post("amount_min") != "0.00") {
            $this->db->where('fpo_gl_trans.amount >=', $this->input->post("amount_min"));
        }
        if ($this->input->post("amount_max") && $this->input->post("amount_max") != "0.00") {
            $this->db->where('fpo_gl_trans.amount <=', $this->input->post("amount_max"));
        }
        if ($this->input->post("ledger_from") != "" && $this->input->post("ledger_from") != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("ledger_from"));
        }
        if ($this->input->post("ledger_to") != "" && $this->input->post("ledger_to") != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("ledger_to"));
        }
        $this->db->where(array('fpo_gl_trans.type_no' => $typeNo, 'fpo_gl_trans.account' => $person_id, 'fpo_gl_trans.person_type_id' => $type, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        return $this->db->get()->result();
    }

    public function getPersonGLReport($type, $person_id)
    {
        $this->db->select('fpo_gl_trans.*, trv_chart_master.account_name, fpo_debtors_master.name As customerName, fpo_suppliers.supp_name As supplierName');
        if ($this->input->post("amount_min") && $this->input->post("amount_min") != "0.00") {
            $this->db->where('fpo_gl_trans.amount >=', $this->input->post("amount_min"));
        }
        if ($this->input->post("amount_max") && $this->input->post("amount_max") != "0.00") {
            $this->db->where('fpo_gl_trans.amount <=', $this->input->post("amount_max"));
        }
        if ($this->input->post("ledger_from") != "" && $this->input->post("ledger_from") != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("ledger_from"));
        }
        if ($this->input->post("ledger_to") != "" && $this->input->post("ledger_to") != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("ledger_to"));
        }
        if ($type == 2) {
            $this->db->where_in('fpo_gl_trans.account_code', ['4020201', '4020202']);
        } else {
            $this->db->where_in('fpo_gl_trans.account_code', ['3030201', '3030202', '3030203']);
        }
        $this->db->where(array('fpo_gl_trans.account' => $person_id, 'fpo_gl_trans.person_type_id' => null, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
        $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
        return $this->db->get()->result();
    }

    public function postGLreports()
    {
        $this->db->select('fpo_gl_trans.*, trv_chart_master.account_name');
        //$this->db->select_sum('fpo_gl_trans.amount');
        if ($this->input->post("amount_min") && $this->input->post("amount_min") != "0.00") {
            $this->db->where('fpo_gl_trans.amount >=', $this->input->post("amount_min"));
        }
        if ($this->input->post("amount_max") && $this->input->post("amount_max") != "0.00") {
            $this->db->where('fpo_gl_trans.amount <=', $this->input->post("amount_max"));
        }
        if ($this->input->post("ledger_from") != "" && $this->input->post("ledger_from") != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("ledger_from"));
        }
        if ($this->input->post("ledger_to") != "" && $this->input->post("ledger_to") != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("ledger_to"));
        }
        $this->db->where(array('fpo_gl_trans.account_code' => $this->input->post('account_holder'), 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        $this->db->from('fpo_gl_trans');
        //$this->db->group_by('fpo_gl_trans.voucher_no');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        return $this->db->get()->result();
    }

    /* function closingBalanceByperiod($person_type_id, $fromValue, $toValue){
        $debtor_id = $this->input->post('account_holder');
        $this->db->select('SUM(fpo_gl_trans.amount) As balance');
        //if($this->input->post("amount_min") && $this->input->post("amount_min") != "0.00") {
          //  $this->db->where('fpo_gl_trans.amount >=', $this->input->post("amount_min"));
        //}
        //if($this->input->post("amount_max") && $this->input->post("amount_max") != "0.00") {
          //  $this->db->where('fpo_gl_trans.amount <=', $this->input->post("amount_max"));
        //}
        if($fromValue != "" && $fromValue != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $fromValue);
        }
        if($toValue != "" && $toValue != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $toValue	);
        }
        $this->db->where(array('fpo_gl_trans.account' => $debtor_id, 'fpo_gl_trans.person_type_id' => $debtor_id, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        $this->db->from('fpo_gl_trans');
        return $this->db->get()->row();
    } */


    public function postBankAccountInquiry()
    {
        $this->db->select('fpo_gl_trans.*, fpo_bank_accounts.bank_account_name, fpo_bank_accounts.bank_account_number');
        $this->db->where(array('fpo_gl_trans.type' => 3, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        if ($this->input->post("account_holder") != "") {
            $this->db->where('fpo_gl_trans.account', $this->input->post("account_holder"));
        }
        if ($this->input->post("inquiry_from") != "") {
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("inquiry_from"));
        }
        if ($this->input->post("inquiry_to") != "") {
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("inquiry_to"));
        }
        $this->db->from('fpo_gl_trans');
        $this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.id = fpo_gl_trans.account');
        return $this->db->get()->result();
    }


    public function postTrialBalance()
    {
        $this->db->select('fpo_gl_trans.*');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        if ($this->input->post("trial_from") != "" && $this->input->post("trial_from") != null) {
            $this->db->where('fpo_gl_trans.tran_date >=', $this->input->post("trial_from"));
        }
        if ($this->input->post("trial_to") != "" && $this->input->post("trial_to") != null) {
            $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post("trial_to"));
        }
        $this->db->from('fpo_gl_trans');
        return $this->db->get()->result();
    }


    /*function getProfitCostByDate() {
        $as_at = $this->input->post('as_at');
        $query ="SELECT SUM(fpo_gl_trans.amount) As profitCost FROM `fpo_gl_trans` WHERE fpo_gl_trans.amount >= '1' AND fpo_gl_trans.status = '1' AND fpo_gl_trans.fpo_id = '$_SESSION[user_id]' AND fpo_gl_trans.tran_date <= '$as_at 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result("array");
        }else{
         return 0;
        }
    }

    function getLossCostByDate() {
        $as_at = $this->input->post('as_at');
        $query ="SELECT SUM(fpo_gl_trans.amount) As LossCost FROM `fpo_gl_trans` WHERE fpo_gl_trans.amount < '1' AND fpo_gl_trans.status = '1' AND fpo_gl_trans.fpo_id = '$_SESSION[user_id]' AND fpo_gl_trans.tran_date <='$as_at 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result("array");
        }else{
         return 0;
        }
    }

    function getProfitCost() {
        $fromValue = $this->input->post('profit_loss_from');
        $toValue = $this->input->post('profit_loss_to');
        $query ="SELECT SUM(fpo_gl_trans.amount) As profitCost FROM `fpo_gl_trans` WHERE fpo_gl_trans.amount >= '1' AND fpo_gl_trans.status = '1' AND fpo_gl_trans.fpo_id = '$_SESSION[user_id]' AND fpo_gl_trans.tran_date BETWEEN '$fromValue 00:00:00' AND '$toValue 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result("array");
        }else{
         return 0;
        }
    }


    function getLossCost() {
        $fromValue = $this->input->post('profit_loss_from');
        $toValue = $this->input->post('profit_loss_to');
        $query ="SELECT SUM(fpo_gl_trans.amount) As LossCost FROM `fpo_gl_trans` WHERE fpo_gl_trans.amount < '1' AND fpo_gl_trans.status = '1' AND fpo_gl_trans.fpo_id = '$_SESSION[user_id]' AND fpo_gl_trans.tran_date BETWEEN '$fromValue 00:00:00' AND '$toValue 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result("array");
        }else{
         return 0;
        }
    }

    function getLossTotalCost() {
        $query ="SELECT SUM(fpo_gl_trans.amount) As lossTotalCost FROM `fpo_gl_trans` WHERE fpo_gl_trans.amount < '1' AND fpo_gl_trans.fpo_id = '$_SESSION[user_id]' AND fpo_gl_trans.status = '1'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result("array");
        }else{
         return 0;
        }
    }

    function getGLCategory($group_code) {
      $this->db->select('trv_chart_master.*');
        $this->db->where(array('trv_chart_master.account_code2' => $group_code));
        $this->db->from('trv_chart_master');
        return $this->db->get()->result();
    }*/



    /*function getTotalByParentOfParent($fromValue=null, $toValue=null, $group_code) {
        //SELECT SUM(gt.amount) As currentCost FROM `fpo_gl_trans` gt inner JOIN `trv_chart_master` cm on gt.account_code = cm.account_code inner JOIN `trv_chart_master` cm1 on cm.account_code2 = cm1.account_code inner JOIN `trv_chart_master` cm2 on cm1.account_code2 = cm2.account_code inner JOIN `trv_chart_master` cm3 on cm2.account_code2 = cm3.account_code WHERE cm3.account_code = '1000'
        $query ="SELECT SUM(gt.amount) As currentCost FROM `fpo_gl_trans` gt inner JOIN `trv_chart_master` cm on gt.account_code = cm.account_code inner JOIN `trv_chart_master` cm1 on cm.account_code2 = cm1.account_code inner JOIN `trv_chart_master` cm2 on cm1.account_code2 = cm2.account_code inner JOIN `trv_chart_master` cm3 on cm2.account_code2 = cm3.account_code WHERE cm3.account_code = '$group_code' AND gt.status = '1' AND gt.fpo_id = '$_SESSION[user_id]'";// AND gt.tran_date BETWEEN '$fromValue 00:00:00' AND '$toValue 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result()[0];
        }else{
         return 0;
        }
    }
    function getTotalByGroupOfParent($fromValue=null, $toValue=null, $group_code) {
        $query ="SELECT SUM(gt.amount) As currentCost FROM `fpo_gl_trans` gt inner JOIN `trv_chart_master` cm on gt.account_code = cm.account_code inner JOIN `trv_chart_master` cm1 on cm.account_code2 = cm1.account_code inner JOIN `trv_chart_master` cm2 on cm1.account_code2 = cm2.account_code WHERE cm2.account_code = '$group_code' AND gt.status = '1' AND gt.fpo_id = '$_SESSION[user_id]'";// AND gt.tran_date BETWEEN '$fromValue 00:00:00' AND '$toValue 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result()[0];
        }else{
         return 0;
        }
    }
    function getTotalByGroup($fromValue=null, $toValue=null, $group_code) {
        $query ="SELECT SUM(gt.amount) As currentCost FROM `fpo_gl_trans` gt inner JOIN `trv_chart_master` cm on gt.account_code = cm.account_code WHERE cm.account_code2 = '$group_code' AND gt.status = '1' AND gt.fpo_id = '$_SESSION[user_id]'";// AND gt.tran_date BETWEEN '$fromValue 00:00:00' AND '$toValue 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result()[0];
        }else{
         return 0;
        }
    }
    function getTotalByCode($fromValue=null, $toValue=null, $group_code) {
        $query ="SELECT SUM(gt.amount) As currentCost FROM `fpo_gl_trans` gt inner JOIN `trv_chart_master` cm on gt.account_code = cm.account_code WHERE cm.account_code = '$group_code' AND gt.status = '1' AND gt.fpo_id = '$_SESSION[user_id]'";// AND gt.tran_date BETWEEN '$fromValue 00:00:00' AND '$toValue 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result()[0];
        }else{
         return 0;
        }
    }
    function getIncomeByGroupList($fromValue, $toValue, $group_code) {
        $query ="SELECT cm.*, gt.tran_date,gt.amount, gt.account_code FROM `fpo_gl_trans` gt inner JOIN `trv_chart_master` cm on gt.account_code = cm.account_code WHERE cm.account_code2 = '$group_code' AND gt.status = '1' AND gt.fpo_id = '$_SESSION[user_id]' AND gt.tran_date BETWEEN '$fromValue 00:00:00' AND '$toValue 23:59:59'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result();
        }else{
         return 0;
        }
    }*/


    //function getAllGLParentByCode($parent_code) {
    //$this->db->select('trv_chart_master.*');
    //$this->db->from('trv_chart_master');
    //$this->db->group_by("trv_chart_master.account_code");
    //$this->db->where(array('trv_chart_master.account_code' => $parent_code,/* 'trv_chart_master.account_code2' => $parent_code, */'trv_chart_master.status' => 1));
    //return $this->db->get()->result();
    //}
    public function getAllGLParent($fpo_id, $fromValue, $toValue, $selectedCode, $account_mode)
    {
        $codeLength = strlen($selectedCode);
        $query ="SELECT LEFT(fpo_gl_trans.account_code, '$codeLength') As account_code, sum(fpo_gl_trans.amount) As amount, trv_chart_master.account_name, trv_chart_master.has_child, trv_chart_master.account_mode FROM `fpo_gl_trans` INNER JOIN trv_chart_master on trv_chart_master.account_code = LEFT(fpo_gl_trans.account_code,'$codeLength') where fpo_gl_trans.fpo_id='$fpo_id' AND fpo_gl_trans.status=1 AND fpo_gl_trans.tran_date BETWEEN '$fromValue' AND '$toValue' AND trv_chart_master.account_mode='$account_mode' group by LEFT(fpo_gl_trans.account_code, '$codeLength')";
        $res = $this->db->query($query);
        if ($res->num_rows() > 0) {
            return $res->result();
        } else {
            return 0;
        }
    }
    /*function getAllGLTrialBalance($fpo_id, $fromValue, $toValue, $selectedCode, $account_mode, $leftAccountCode) {
        $codeLength = strlen($selectedCode);
        $query ="SELECT LEFT(fpo_gl_trans.account_code, '$codeLength') As account_code, sum(fpo_gl_trans.amount) As amount, trv_chart_master.account_name, trv_chart_master.has_child, trv_chart_master.account_mode FROM `fpo_gl_trans` INNER JOIN trv_chart_master on trv_chart_master.account_code = LEFT(fpo_gl_trans.account_code,'$codeLength') where fpo_gl_trans.fpo_id='$fpo_id' AND fpo_gl_trans.status=1 AND fpo_gl_trans.tran_date >= '$fromValue' AND fpo_gl_trans.tran_date <= '$toValue' AND trv_chart_master.account_mode='$account_mode' AND LEFT(fpo_gl_trans.account_code,'$codeLength') != '$leftAccountCode' group by LEFT(fpo_gl_trans.account_code, '$codeLength')";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result();
        }else{
         return 0;
        }
    }
    function getAllGLTrialBalanceCost($fpo_id, $fromValue, $toValue, $selectedCode, $account_mode, $leftAccountCode) {
        $selectedCodeLength = strlen($selectedCode);
        $query ="SELECT LEFT(fpo_gl_trans.account_code, '$selectedCodeLength') As account_code, sum(fpo_gl_trans.amount) As amount, trv_chart_master.account_name, trv_chart_master.has_child FROM `fpo_gl_trans` INNER JOIN trv_chart_master on trv_chart_master.account_code = LEFT(fpo_gl_trans.account_code,'$selectedCodeLength') where fpo_gl_trans.fpo_id='$fpo_id' AND fpo_gl_trans.status=1 AND fpo_gl_trans.tran_date >= '$fromValue' AND fpo_gl_trans.tran_date <= '$toValue' AND trv_chart_master.account_mode = '$account_mode' AND LEFT(fpo_gl_trans.account_code,'$selectedCodeLength') != '$leftAccountCode'";
        $res = $this->db->query($query);
        if($res->num_rows() > 0) {
          return $res->result()[0];
        }else{
         return 0;
        }
    }	*/

    public function getAllInventorySum($fpo_id, $fromValue, $toValue, $account_mode)
    {
        if ($account_mode == 1) {
            $this->db->select('sum(fpo_stock_moves.qty) as total_qty, sum(fpo_supp_trans.ov_amount) as total_amount');
            $this->db->join('fpo_supp_trans', 'fpo_supp_trans.trans_no = fpo_stock_moves.trans_no');
            //$this->db->join('fpo_gl_trans', 'fpo_gl_trans.voucher_no = fpo_supp_trans.reference');
            $this->db->where(array('fpo_supp_trans.fpo_id' => $fpo_id));
            $this->db->where('fpo_supp_trans.tran_date >=', $fromValue);
            $this->db->where('fpo_supp_trans.tran_date <=', $toValue);
        } else {
            $this->db->select('sum(fpo_stock_moves.qty) as total_qty, sum(fpo_debtor_trans.ov_amount) as total_amount');
            $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.trans_no = fpo_stock_moves.trans_no');
            //$this->db->join('fpo_gl_trans', 'fpo_gl_trans.voucher_no = fpo_debtor_trans.voucher_no');
            $this->db->where(array('fpo_debtor_trans.fpo_id' => $fpo_id));
            $this->db->where('fpo_debtor_trans.tran_date >=', $fromValue);
            $this->db->where('fpo_debtor_trans.tran_date <=', $toValue);
        }
        $this->db->from('fpo_stock_moves');
        $this->db->where(array('fpo_stock_moves.type' => $account_mode, 'fpo_stock_moves.visible' => 1));
        return $this->db->get()->row();
    }

    public function getInventorySumUpto($fpo_id, $toValue, $account_mode)
    {
        if ($account_mode == 1) {
            $this->db->select('sum(fpo_stock_moves.qty) as total_qty, sum(fpo_stock_moves.qty*fpo_stock_moves.price) as total_amount');
            $this->db->join('fpo_supp_trans', 'fpo_supp_trans.trans_no = fpo_stock_moves.trans_no');
            //$this->db->join('fpo_gl_trans', 'fpo_gl_trans.voucher_no = fpo_supp_trans.reference');
            $this->db->where(array('fpo_stock_moves.person_id' => $fpo_id));
            $this->db->where(array('fpo_supp_trans.fpo_id' => $fpo_id));
            $this->db->where('fpo_supp_trans.tran_date <=', $toValue);
        } else {
            $this->db->select('sum(fpo_stock_moves.qty) as total_qty, sum(fpo_stock_moves.qty*fpo_stock_moves.price) as total_amount');
            $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.trans_no = fpo_stock_moves.trans_no');
            //$this->db->join('fpo_gl_trans', 'fpo_gl_trans.voucher_no = fpo_debtor_trans.voucher_no');
            $this->db->where(array('fpo_stock_moves.person_id' => $fpo_id));
            $this->db->where(array('fpo_debtor_trans.fpo_id' => $fpo_id));
            $this->db->where('fpo_debtor_trans.tran_date <=', $toValue);
        }
        $this->db->from('fpo_stock_moves');
        $this->db->where(array('fpo_stock_moves.type' => $account_mode, 'fpo_stock_moves.visible' => 1));
        return $this->db->get()->row();
    }
    public function getInventoryStockUpto($fpo_id, $toValue, $account_mode)
    {
        if ($account_mode == 1) {
            $this->db->select('fpo_stock_moves.stock_id,sum(fpo_stock_moves.qty) as total_qty, sum(fpo_stock_moves.qty*fpo_stock_moves.price) as total_amount');
            $this->db->join('fpo_supp_trans', 'fpo_supp_trans.trans_no = fpo_stock_moves.trans_no');
            $this->db->group_by('fpo_stock_moves.stock_id');
            $this->db->where(array('fpo_stock_moves.person_id' => $fpo_id));
            $this->db->where(array('fpo_supp_trans.fpo_id' => $fpo_id));
            $this->db->where('fpo_supp_trans.tran_date <=', $toValue);
        } else {
            $this->db->select('fpo_stock_moves.stock_id,sum(fpo_stock_moves.qty) as total_qty, sum(fpo_stock_moves.qty*fpo_stock_moves.price) as total_amount');
            $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.trans_no = fpo_stock_moves.trans_no');
            $this->db->group_by('fpo_stock_moves.stock_id');
            $this->db->where(array('fpo_stock_moves.person_id' => $fpo_id));
            $this->db->where(array('fpo_debtor_trans.fpo_id' => $fpo_id));
            $this->db->where('fpo_debtor_trans.tran_date <=', $toValue);
        }
        $this->db->from('fpo_stock_moves');
        $this->db->where(array('fpo_stock_moves.type' => $account_mode, 'fpo_stock_moves.visible' => 1));
        return $this->db->get()->result();
    }
    /*function getAllCashInHandAmount($fpo_id, $fromValue, $toValue, $account_mode) {
        $this->db->select('sum(fpo_gl_trans.amount) as total_amount');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id));
        $this->db->where('fpo_gl_trans.tran_date >=', $fromValue);
        $this->db->where('fpo_gl_trans.tran_date <=', $toValue);
        $this->db->from('fpo_gl_trans');
        $this->db->where(array('fpo_gl_trans.account_code' => $account_mode));
        return $this->db->get()->row();
    }*/

    public function getAllCashInBankAmount($fpo_id, $fromValue, $toValue, $account_mode=null)
    {
        $this->db->select('sum(fpo_gl_trans.amount) as total_amount');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1));
        $this->db->where('fpo_gl_trans.tran_date >=', $fromValue);
        $this->db->where('fpo_gl_trans.tran_date <=', $toValue);
        if ($account_mode == 2) {
            $this->db->where('fpo_gl_trans.type_no', $account_mode);
        } else {
            //$this->db->where('fpo_gl_trans.type_no', 1);
            $this->db->where('fpo_gl_trans.type_no >', 0);
        }
        //$this->db->where('fpo_gl_trans.type_no >', 0);
        $this->db->from('fpo_gl_trans');
        //$this->db->where(array('fpo_gl_trans.account_code' => $account_mode));
        return $this->db->get()->row();
    }

    public function getLedgerBalance($fpo_id, $fromValue, $toValue, $account_mode)
    {
        $this->db->select('sum(fpo_gl_trans.amount) as total_amount');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1));
        $this->db->where('fpo_gl_trans.tran_date =', $fromValue);
        $this->db->where('LOWER(fpo_gl_trans.memo)', 'opening balance');
        $this->db->where('fpo_gl_trans.type', 9);
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code  = fpo_gl_trans.account_code');
        $this->db->where_in('trv_chart_master.account_type', array(2,4,5,6));
        return $this->db->get()->row();
    }



    public function getAllGLParentCost($fpo_id, $fromValue, $toValue, $selectedCode)
    {
        $selectedCodeLength = strlen($selectedCode);
        //$query ="SELECT LEFT(fpo_gl_trans.account_code, '$selectedCodeLength') As account_code, sum(fpo_gl_trans.amount) As amount, trv_chart_master.account_name, trv_chart_master.has_child FROM `fpo_gl_trans` INNER JOIN trv_chart_master on trv_chart_master.account_code = LEFT(fpo_gl_trans.account_code,'$selectedCodeLength') where fpo_gl_trans.fpo_id='$fpo_id' AND fpo_gl_trans.status=1 AND fpo_gl_trans.type_no=0 AND fpo_gl_trans.tran_date >= '$fromValue' AND fpo_gl_trans.tran_date <= '$toValue' AND LEFT(trv_chart_master.account_code, '$selectedCodeLength')='$selectedCode' group by LEFT(fpo_gl_trans.account_code, '$selectedCodeLength')";
        $query ="SELECT LEFT(fpo_gl_trans.account_code, '$selectedCodeLength') As account_code, sum(fpo_gl_trans.amount) As amount, trv_chart_master.account_name, trv_chart_master.has_child FROM `fpo_gl_trans` INNER JOIN trv_chart_master on trv_chart_master.account_code = LEFT(fpo_gl_trans.account_code,'$selectedCodeLength') where fpo_gl_trans.fpo_id='$fpo_id' AND fpo_gl_trans.status=1 AND fpo_gl_trans.tran_date BETWEEN '$fromValue' AND '$toValue' AND LEFT(trv_chart_master.account_code, '$selectedCodeLength')='$selectedCode' group by LEFT(fpo_gl_trans.account_code, '$selectedCodeLength')";
        $res = $this->db->query($query);
        if ($res->num_rows() > 0) {
            return $res->result()[0];
        } else {
            return 0;
        }
    }
    public function getAllGLParentsChild($fpo_id, $fromValue, $toValue, $selectedCode)
    {
        $selectedCodeLength = strlen($selectedCode);
        $nextCodeLength = strlen($selectedCode)+2;
        $query ="SELECT LEFT(fpo_gl_trans.account_code, '$nextCodeLength') As account_code, sum(fpo_gl_trans.amount) As amount, fpo_gl_trans.person_type_id, fpo_gl_trans.account, trv_chart_master.account_name, trv_chart_master.account_code2, trv_chart_master.has_child FROM `fpo_gl_trans` INNER JOIN trv_chart_master on trv_chart_master.account_code = LEFT(fpo_gl_trans.account_code, '$nextCodeLength') where fpo_gl_trans.fpo_id='$fpo_id' AND fpo_gl_trans.status=1 AND fpo_gl_trans.tran_date BETWEEN '$fromValue' AND '$toValue' AND LEFT(trv_chart_master.account_code, '$selectedCodeLength')='$selectedCode' group by LEFT(fpo_gl_trans.account_code, '$nextCodeLength')";
        $res = $this->db->query($query);
        if ($res->num_rows() > 0) {
            return $res->result();
        } else {
            return 0;
        }
    }

    public function getAllLedgerByParents($fpo_id, $fromValue, $toValue, $selectedCode)
    {
        $selectedCodeLength = strlen($selectedCode);
        $query ="SELECT trv_chart_master.account_name, trv_chart_master.account_code, trv_chart_master.has_child, SUM(fpo_gl_trans.amount) As amount, fpo_gl_trans.person_type_id, fpo_gl_trans.person_id from fpo_gl_trans INNER JOIN trv_chart_master on trv_chart_master.account_code = fpo_gl_trans.account_code WHERE trv_chart_master.account_code2 = '$selectedCode' AND fpo_gl_trans.fpo_id='$fpo_id' AND fpo_gl_trans.status=1 AND fpo_gl_trans.type_no=0 AND fpo_gl_trans.tran_date >= '$fromValue' AND fpo_gl_trans.tran_date <= '$toValue' GROUP BY fpo_gl_trans.person_id";
        $res = $this->db->query($query);
        if ($res->num_rows() > 0) {
            return $res->result();
        } else {
            return 0;
        }
    }
    public function getAllChildNodeByCode($fpo_id)
    {
        $fromValue = ($this->input->post('profit_loss_from'))?$this->input->post('profit_loss_from'):date('Y-04-01', strtotime("-1 year"));

        $this->db->select('sum(fpo_gl_trans.amount) as total_amount');
        $this->db->select('fpo_gl_trans.account, fpo_gl_trans.account_code, trv_chart_master.account_name, trv_chart_master.has_child');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1));
        $this->db->where('fpo_gl_trans.tran_date >=', $fromValue);
        $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post('profit_loss_to'));
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code  = fpo_gl_trans.account_code', 'inner');
        $this->db->where('trv_chart_master.account_code2', $this->input->post('accountCode'));
        $this->db->group_by("fpo_gl_trans.account");
        if ($this->input->post('person_type_id') == 1) {
            $this->db->select('fpo_suppliers.supp_name as supplier_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
        } elseif ($this->input->post('person_type_id') == 2) {
            $this->db->select('fpo_debtors_master.name as debtor_name');
            $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
        } elseif ($this->input->post('person_type_id') == 3) {
        } else {
        }
        $this->db->from('fpo_gl_trans');
        return $this->db->get()->result();
    }
    public function getSalesPurchaseNodeByCode($fpo_id)
    {
        $fromValue = ($this->input->post('profit_loss_from'))?$this->input->post('profit_loss_from'):date('Y-04-01', strtotime("-1 year"));

        $this->db->select('fpo_gl_trans.amount as total_amount,DATE_FORMAT(fpo_gl_trans.tran_date,"%d-%b-%Y") as tran_date,fpo_gl_trans.voucher_no');
        $this->db->select('fpo_gl_trans.account, fpo_gl_trans.account_code, trv_chart_master.account_name, trv_chart_master.has_child');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1));
        $this->db->where('fpo_gl_trans.tran_date >=', $fromValue);
        $this->db->where('fpo_gl_trans.tran_date <=', $this->input->post('profit_loss_to'));
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code  = fpo_gl_trans.account_code', 'inner');
        $this->db->where('trv_chart_master.account_code2', $this->input->post('accountCode'));
        //$this->db->group_by("fpo_gl_trans.account");
        if ($this->input->post('person_type_id') == 1) {
            $this->db->select('fpo_suppliers.supp_name as supplier_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
        } elseif ($this->input->post('person_type_id') == 2) {
            $this->db->select('fpo_debtors_master.name as debtor_name');
            $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
        } elseif ($this->input->post('person_type_id') == 3) {
        } else {
        }
        $this->db->from('fpo_gl_trans');
        return $this->db->get()->result();
    }
    /** Finance Inquiries & Reports module post values end **/


    /** Finance Maintenance module function start **/
    /** bank account Starts **/
    public function bankAccount_List()
    {
        $this->db->select('fpo_bank_accounts.*, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local, trv_fpo.producer_organisation_name');
        $this->db->order_by("fpo_bank_accounts.id", "desc");
        $this->db->from('fpo_bank_accounts');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name', 'left');
        $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_bank_accounts.fpo_id', 'left');
        $this->db->where(array('fpo_bank_accounts.fpo_id' => $this->session->userdata('user_id'), 'fpo_bank_accounts.status' => 1));
        return $this->db->get()->result();
    }

    public function bankAccountGL()
    {
        $this->db->select('fpo_bank_accounts.*, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local, trv_fpo.producer_organisation_name');
        $this->db->order_by("fpo_bank_accounts.bank_account_name ASC, fpo_bank_accounts.opening_balance DESC");
        $this->db->from('fpo_bank_accounts');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name', 'left');
        $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_bank_accounts.fpo_id', 'left');
        $this->db->where(array('fpo_bank_accounts.fpo_id' => $this->session->userdata('user_id'), 'fpo_bank_accounts.status' => 1));
        return $this->db->get()->result();
    }

    public function bankAccountGLAll()
    {
        $this->db->select('fpo_bank_accounts.*, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local, trv_fpo.producer_organisation_name');
        $this->db->order_by("fpo_bank_accounts.id", "desc");
        $this->db->from('fpo_bank_accounts');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name', 'left');
        $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_bank_accounts.fpo_id', 'left');
        $this->db->where(array('fpo_bank_accounts.fpo_id' => $this->session->userdata('user_id'), 'fpo_bank_accounts.status' => 1, 'fpo_bank_accounts.opening_balance !=' => 0));
        return $this->db->get()->result();
    }

    public function addbankAccount()
    {
        if ($this->input->post('account_type') != 4) {
            $bank_details = array(
                'fpo_id'                    => $this->session->userdata('user_id'),
                'bank_account_number'       => $this->input->post('account_no'),
                'bank_account_name'         => $this->input->post('bank_account_name'),
                'account_type'              => $this->input->post('account_type'),
                //'dflt_curr_act'             => $this->input->post('dflt_curr_act'),
                'bank_name'                 => $this->input->post('bank_name'),
                'bank_address'              => $this->input->post('bank_address'),
                'gl_code'                   => $this->input->post('bank_acc_gl_code'),
                //'opening_balance'           => $this->input->post('opening_balance')
                'opening_balance'           => ($this->input->post('bank_acc_gl_code') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance')
            );

            //print_r($bank_details);

        /*} else {
            $bank_details = array(
                'fpo_id'                    => $this->session->userdata('user_id'),
                'bank_account_number'       => 1000,
                'bank_account_name'         => $this->input->post('bank_account_name'),
                'account_type'              => $this->input->post('account_type'),
                //'dflt_curr_act'             => $this->input->post('dflt_curr_act'),
                'bank_name'                 => "",
                'bank_address'              => "",
                'gl_code'                   => $this->input->post('bank_acc_gl_code'),
                'opening_balance'           => $this->input->post('opening_balance')
            );*/
        }
        if ($this->input->post('account_type')) {
            $this->db->insert('fpo_bank_accounts', $bank_details);
            $last_inserted_acc_id = $this->db->insert_id();
            $account_code=str_pad($last_inserted_acc_id, 6, '0', STR_PAD_LEFT);

            $user_details = array(
                'account_code'        => $account_code,
            );
            $this->db->update('fpo_bank_accounts', $user_details, array('id' => $last_inserted_acc_id));

            $currentDate = date('Y-m-d H:i:s');
            $month=date("m", strtotime($currentDate));
            if ($month < '04') {
                $tran_date = date('Y-04-01', strtotime('-1 year'));
            } else {
                $tran_date = date('Y-04-01');
            }

            $type = $this->input->post('bank_acc_gl_code');
            $deposit_details = array(
                'fpo_id'            => $_SESSION['user_id'],
                'voucher_no'        => 'trv_OB_'.$last_inserted_acc_id,
                'type'              => 9,
                'type_no'         	=> 2,
                'tran_date'         => $tran_date,
                'account'           => $last_inserted_acc_id,
                'account_code'      => 40204,
                'amount'            => ($this->input->post('bank_acc_gl_code') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance'),
                'memo'              => 'opening balance',
                'person_type_id'    => 3,
                'person_id'    		=> $last_inserted_acc_id
            );

            return $this->db->insert('fpo_gl_trans', $deposit_details);
        } else {
            return false;
        }
    }
    /*
    function updatebankaccount($bank_name_id) {
       $bank_details = array(
            'fpo_id'                    => $this->session->userdata('user_id'),
            'bank_account_number'       => $this->input->post('account_no'),
            'bank_account_name'         => $this->input->post('bank_account_name'),
            'account_type'              => $this->input->post('account_type'),
            'dflt_curr_act'             => $this->input->post('dflt_curr_act'),
            'bank_name'                 => $this->input->post('bank_name'),
            'bank_address'              => $this->input->post('bank_address'),
            'gl_code'                   => $this->input->post('bank_acc_gl_code')
          );
        return $this->db->update('fpo_bank_accounts', $bank_details, array('id' => $bank_name_id));
    }

    function deletebankAccount( $bank_name_id ) {
        $bankid = array(
           'status' => 0
        );
        return $this->db->update('fpo_bank_accounts', $bankid, array('id' => $bank_name_id));
    }
    */

    public function bankByID($bank_name_id)
    {
        $this->db->select('fpo_bank_accounts.*, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local, trv_fpo.producer_organisation_name');
        $this->db->from('fpo_bank_accounts');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name', 'left');
        $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_bank_accounts.fpo_id', 'left');
        $this->db->where(array('fpo_bank_accounts.id' => $bank_name_id, 'fpo_bank_accounts.status' => 1));
        return $this->db->get()->result();
    }

    public function bankByViewID($bank_name_id)
    {
        $this->db->select('fpo_bank_accounts.*, trv_bank_name_master.name, trv_bank_master.branch_name, trv_bank_master.address_local, trv_fpo.producer_organisation_name');
        $this->db->from('fpo_bank_accounts');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name', 'left');
        $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = fpo_bank_accounts.fpo_id', 'left');
        $this->db->where(array('fpo_bank_accounts.id' => $bank_name_id));
        return $this->db->get()->result();
    }

    public function getBankAddressByBankName($bank_name_id)
    {
        $this->db->select('trv_bank_master.id, trv_bank_master.bank_name_id, trv_bank_master.branch_name');
        $this->db->from('trv_bank_master');
        $this->db->distinct();
        $this->db->where(array('trv_bank_master.bank_name_id' => $bank_name_id, 'trv_bank_master.status' => '1'));
        return $this->db->get()->result();
    }

    public function bank_name_list()
    {
        $this->db->select('trv_bank_name_master.*');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
        $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();
    }

    public function gl_ChartMasterList()
    {
        $this->db->select('account_code,account_name,has_child,account_mode,account_code2');
        $this->db->where(array('status' => 1, 'has_child' => 1));
        $this->db->distinct();
        $this->db->order_by("account_type", "asc");
        $this->db->order_by("account_mode", "asc");
        $this->db->order_by("account_code", "asc");
        $this->db->from('trv_chart_master');
        return $this->db->get()->result();
    }
    /** Finance Maintenance module function start **/

    /** General dropdown details **/
    public function getAllSupplierByFPO()
    {
        $this->db->select('fpo_suppliers.supplier_id, fpo_suppliers.supp_name,fpo_suppliers.gl_group_id');
        $this->db->where(array('fpo_suppliers.fpo_id' => $_SESSION['user_id'], 'fpo_suppliers.status' => 1));
        $this->db->distinct();
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }

    public function getAllDebtorsByFPO()
    {
        $this->db->select('fpo_debtors_master.debtor_no, fpo_debtors_master.name,fpo_debtors_master.gl_group');
        $this->db->where(array('fpo_debtors_master.fpo_id' => $_SESSION['user_id'], 'fpo_debtors_master.status' => 1));
        $this->db->distinct();
        $this->db->from('fpo_debtors_master');
        return $this->db->get()->result();
    }


    public function getAllBankByFPO()
    {
        $this->db->select('fpo_bank_accounts.id, fpo_bank_accounts.bank_account_name, fpo_bank_accounts.bank_account_number');
        $this->db->where(array('fpo_bank_accounts.fpo_id' => $_SESSION['user_id'], 'fpo_bank_accounts.status' => 1));
        $this->db->distinct();
        $this->db->from('fpo_bank_accounts');
        return $this->db->get()->result();
    }
    public function getgldata()
    {
        $this->db->select('trv_chart_master.account_code,trv_chart_master.account_code2,trv_chart_master.account_name,trv_chart_master.account_type, trv_chart_master.account_mode');
        $this->db->where(array('trv_chart_master.has_child' => 0,'trv_chart_master.account_type' => 1, 'trv_chart_master.status' => 1));
        $this->db->distinct();
        $this->db->from('trv_chart_master');
        return $this->db->get()->result();
    }

    public function getAllGL()
    {
        $this->db->select('trv_chart_master.account_code, trv_chart_master.account_name, trv_chart_master.has_child');
        $this->db->where(array('trv_chart_master.status' => 1));
        $this->db->distinct();
        $this->db->from('trv_chart_master');
        return $this->db->get()->result();
    }


    //28/12
    //gl accounts groups
    public function glAccountgroup_List()
    {
        $this->db->select('trv_chart_master.*,fpo_gl_trans.amount');
        $this->db->from('trv_chart_master');
        $this->db->where(array('trv_chart_master.status' => 1, 'trv_chart_master.has_child' => 0));
        $this->db->join('fpo_gl_trans', 'fpo_gl_trans.account_code = trv_chart_master.account_code', 'left');
        return $this->db->get()->result();
    }

    public function glAccountgroupGL()
    {
        $gl_result = array();
        $chart_result = array();
        $trans_result = array();
        $trans_result_1 = array();

        $this->db->select('c2.account_name as gname, trv_chart_master.account_code, trv_chart_master.account_name,trv_chart_master.account_mode');
        $this->db->from('trv_chart_master');
        $this->db->join('trv_chart_master c2', 'trv_chart_master.account_code2 = c2.account_code');
        $this->db->where(array('trv_chart_master.status' => 1, 'trv_chart_master.accept_opening_bal' => 1, 'trv_chart_master.has_child' => 0, 'trv_chart_master.account_type' => 2));
        //$this->db->where_in('trv_chart_master.account_type', array(1,2));
        $chart_result = $this->db->get()->result();

        $fpoid = $this->session->userdata('user_id');
        $this->db->select('fpo_gl_trans.account_code, fpo_gl_trans.amount');
        $this->db->from('fpo_gl_trans');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpoid, 'fpo_gl_trans.type' => 9));
        $trans_result = $this->db->get()->result();

        foreach ($trans_result as $trans) {
            $trans_result_1[$trans->account_code] = $trans->amount;
        }
        foreach ($chart_result as $chart) {
            if (array_key_exists($chart->account_code, $trans_result_1)) {
                $chart->amount = $trans_result_1[$chart->account_code];
                $gl_result[] = $chart;
            }
        }
        foreach ($chart_result as $chart) {
            if (array_key_exists($chart->account_code, $trans_result_1)) {
            } else {
                $chart->amount = 0;
                $gl_result[] = $chart;
            }
        }
        return $gl_result;
    }
    public function cashAccountGL()
    {
        $gl_result = array();
        $chart_result = array();
        $trans_result = array();
        $trans_result_1 = array();

        $this->db->select('trv_chart_master.account_code, trv_chart_master.account_name,trv_chart_master.account_mode');
        $this->db->from('trv_chart_master');
        $this->db->where(array('trv_chart_master.status' => 1, 'trv_chart_master.has_child' => 0));
        $this->db->where_in('trv_chart_master.account_type', array(3,4));
        $chart_result = $this->db->get()->result();

        $fpoid = $this->session->userdata('user_id');
        $this->db->select('fpo_gl_trans.account_code, fpo_gl_trans.amount');
        $this->db->from('fpo_gl_trans');
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpoid, 'fpo_gl_trans.type' => 9));
        $trans_result = $this->db->get()->result();

        foreach ($trans_result as $trans) {
            $trans_result_1[$trans->account_code] = $trans->amount;
        }
        foreach ($chart_result as $chart) {
            if (array_key_exists($chart->account_code, $trans_result_1)) {
                $chart->amount = $trans_result_1[$chart->account_code];
                $gl_result[] = $chart;
            }
        }
        foreach ($chart_result as $chart) {
            if (array_key_exists($chart->account_code, $trans_result_1)) {
            } else {
                $chart->amount = 0;
                $gl_result[] = $chart;
            }
        }
        return $gl_result;
    }
    public function glAccountgroupGLAll()
    {
        $fpoid = $this->session->userdata('user_id');
        $this->db->select('c2.account_name as gname,trv_chart_master.account_code, trv_chart_master.account_name, fpo_gl_trans.amount');
        $this->db->from('trv_chart_master');
        $this->db->where(array('trv_chart_master.status' => 1, 'trv_chart_master.accept_opening_bal' => 1, 'trv_chart_master.has_child' => 0, 'fpo_gl_trans.amount !=' => 0, 'fpo_gl_trans.type ' => 9, 'fpo_gl_trans.fpo_id' => $fpoid, 'trv_chart_master.account_type' => 2));
        //$this->db->where_in('trv_chart_master.account_type', array(1,2));
        $this->db->join('trv_chart_master c2', 'trv_chart_master.account_code2 = c2.account_code');
        $this->db->join('fpo_gl_trans', 'fpo_gl_trans.account_code = trv_chart_master.account_code');
        $this->db->order_by('fpo_gl_trans.amount', 'DESC');
        //echo "<pre>";print_r($this->db->get()->result());die;
        return $this->db->get()->result();
    }
    public function cashAccountGLAll()
    {
        $fpoid = $this->session->userdata('user_id');
        $this->db->select('trv_chart_master.account_code, trv_chart_master.account_name, fpo_gl_trans.amount');
        $this->db->from('trv_chart_master');
        $this->db->where(array('trv_chart_master.status' => 1, 'trv_chart_master.has_child' => 0, 'fpo_gl_trans.amount !=' => 0, 'fpo_gl_trans.type ' => 9, 'fpo_gl_trans.fpo_id' => $fpoid));
        $this->db->where_in('trv_chart_master.account_type', array(3,4));
        $this->db->join('fpo_gl_trans', 'fpo_gl_trans.account_code = trv_chart_master.account_code');
        $this->db->order_by('fpo_gl_trans.amount', 'DESC');
        return $this->db->get()->result();
    }
    public function glAccountgroup_view($id)
    {
        $this->db->select('trv_chart_master.*');
        $this->db->from('trv_chart_master');
        $this->db->where(array('trv_chart_master.status' => 1,'trv_chart_master.account_code2' => $id));
        return $this->db->get()->result();
    }

    public function addglAccount_group()
    {
        $this->db->select_max('account_code2');
        if ($this->input->post('trans_type') == 1) {
            $this->db->where('account_type', 1);
        } else {
            $this->db->where('account_type', 2);
        }
        $result = $this->db->get('trv_chart_master')->row();

        if ($result->account_code2 != "") {
            $account_code = $result->account_code2+100;
        } else {
            $account_code = ($this->input->post('trans_type') == 1)?"1100":"2100";
        }

        $glaccountgroup_details = array(
                'account_code'       	    => $account_code,
                'account_code2'       	    => $account_code,
                'account_name'        	    => $this->input->post('name'),
                'account_type'              => $this->input->post('trans_type')
            );
        return $this->db->insert('trv_chart_master', $glaccountgroup_details);
    }

    public function updateglAccount_group($gl_acc_grp_id)
    {
        $glaccountgroup_details = array(
                'account_name'        	    => $this->input->post('name'),
                'account_type'             => $this->input->post('trans_type')
            );
        return $this->db->update('trv_chart_master', $glaccountgroup_details, array('account_code2' => $gl_acc_grp_id));
    }

    public function glacc_groupByID($gl_acc_grp_id)
    {
        $this->db->select('trv_chart_master.*');
        $this->db->where(array('trv_chart_master.account_code2' => $gl_acc_grp_id));
        $this->db->from('trv_chart_master');
        return $this->db->get()->row_array();
    }

    /* function deleteglAccount_group( $gl_acc_grp_id ) {
        $glaccount_grp_id = array(
           'status' => 0
        );
        return $this->db->update('trv_chart_master', $glaccount_grp_id, array('id' => $gl_acc_grp_id));
    } */
    //gl account groups

    public function addglAccounts()
    {
        $glType = $this->input->post('hGLType');
        $financial_year_from = date("m") > 3?date("Y-04-01"):date("Y-04-01", strtotime('-1 year'));//year-month-date
        if ($glType == 'all') {
            $gl_amount = $this->input->post('gl_amount');
            $gl_account_code = $this->input->post('gl_account_code');
            $bank_amount = $this->input->post('bank_amount');
            $bank_account_code = $this->input->post('bank_account_code');
            $customer_amount = $this->input->post('customer_amount');
            $customer_account_code = $this->input->post('customer_account_code');
            $supplier_amount = $this->input->post('supplier_amount');
            $supplier_account_code = $this->input->post('supplier_account_code');
        } else {
            $amount = $this->input->post('amount');
            $balance_type = $this->input->post('crdr');
            $account_code = $this->input->post('account_code');
        }
        $fpo_id = $this->session->userdata('user_id');
        if ($glType == 'gl') {
            for ($i=0;$i<count($account_code);$i++) {
                $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account_code = '".$account_code[$i]."' AND fpo_id = '".$fpo_id."' AND tran_date = '".$financial_year_from."' AND LOWER(memo) = 'opening balance'");
                if ($result->num_rows() >0) {
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                             'tran_date'         => $financial_year_from,
                             'amount'            => $balance_type[$i].$amount[$i],
                     );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account_code' => $account_code[$i], 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                    } else {
                        $glaccountgroup_details = array(
                             'tran_date'         => $financial_year_from,
                             'amount'            => '0',
                     );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account_code' => $account_code[$i],'account' => $account_code[$i], 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                    }
                } else {
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                        'fpo_id'            => $this->session->userdata('user_id'),
                        'type'              => 9,
                        'tran_date'         => $financial_year_from,
                        'account_code'      => $account_code[$i],
                        'account'           => $account_code[$i],
                        'amount'            => $balance_type[$i].$amount[$i],
                        'memo'              => "Opening Balance"
                     );
                        $this->db->insert('fpo_gl_trans', $glaccountgroup_details);
                    }
                }
            }
        } elseif ($glType == 'bank') {
            for ($i=0;$i<count($account_code);$i++) {
                $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account = '".$account_code[$i]."' AND account_code = '40204' AND fpo_id = '".$fpo_id."' AND tran_date = '".$financial_year_from."' AND LOWER(memo) = 'opening balance'");
                if ($result->num_rows() >0) {
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                             'tran_date'         => $financial_year_from,
                             'amount'            => $balance_type[$i].$amount[$i],
                     );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account' => $account_code[$i], 'account_code' => '40204', 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                    } else {
                        $glaccountgroup_details = array(
                             'tran_date'         => $financial_year_from,
                             'amount'            => '0',
                     );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account' => $account_code[$i], 'account_code' => '40204', 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                    }
                } else {
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                        'fpo_id'            => $this->session->userdata('user_id'),
                        'type'              => 9,
                        'tran_date'         => $financial_year_from,
                        'account'           => $account_code[$i],
                        'account_code'      => '40204',
                        'amount'            => $balance_type[$i].$amount[$i],
                        'memo'              => "Opening Balance"
                     );
                        $this->db->insert('fpo_gl_trans', $glaccountgroup_details);
                    }
                }

                $result = $this->db->query("SELECT id FROM fpo_bank_accounts WHERE id = '".$account_code[$i]."' AND fpo_id = '".$fpo_id."'");
                if ($result->num_rows() >0) {
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                         'opening_balance'   => $balance_type[$i].$amount[$i],
                     );
                        $this->db->update('fpo_bank_accounts', $glaccountgroup_details, array('id' => $account_code[$i], 'fpo_id' => $fpo_id));
                    } else {
                        $glaccountgroup_details = array(
                           'opening_balance'   => '0',
                     );
                        $this->db->update('fpo_bank_accounts', $glaccountgroup_details, array('id' => $account_code[$i], 'fpo_id' => $fpo_id));
                    }
                }
            }
        } elseif ($glType == 'cash') {
            for ($i=0;$i<count($account_code);$i++) {
                $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account_code = '".$account_code[$i]."' AND fpo_id = '".$fpo_id."' AND tran_date = '".$financial_year_from."' AND LOWER(memo) = 'opening balance'");
                if ($result->num_rows() >0) {
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                             'tran_date'         => $financial_year_from,
                             'amount'            => $balance_type[$i].$amount[$i],
                     );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account_code' => $account_code[$i], 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                    } else {
                        $glaccountgroup_details = array(
                             'tran_date'         => $financial_year_from,
                             'amount'            => '0',
                     );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account_code' => $account_code[$i], 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                    }
                } else {
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                        'fpo_id'            => $this->session->userdata('user_id'),
                        'type'              => 9,
                        'tran_date'         => $financial_year_from,
                        'account_code'      => $account_code[$i],
                        'account'           => $account_code[$i],
                        'amount'            => $balance_type[$i].$amount[$i],
                        'memo'              => "Opening Balance"
                     );
                        $this->db->insert('fpo_gl_trans', $glaccountgroup_details);
                    }
                }
            }
        } elseif ($glType == 'customer') {
            for ($i=0;$i<count($account_code);$i++) {
                $result = $this->db->query("SELECT gl_group FROM fpo_debtors_master WHERE debtor_no = '".$account_code[$i]."' AND fpo_id = '".$fpo_id."'")->row();
                if (!empty($result->gl_group)) {
                    $gl_group = $result->gl_group;
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                            'opening_balance'   => $amount[$i],
                            'transaction_type'   => ($balance_type[$i] == '-'?2:1),
                        );
                        $this->db->update('fpo_debtors_master', $glaccountgroup_details, array('debtor_no' => $account_code[$i], 'fpo_id' => $fpo_id));
                    } else {
                        $glaccountgroup_details = array(
                              'opening_balance'   => '0',
                              'transaction_type'   => ($balance_type[$i] == '-'?2:1),
                        );
                        $this->db->update('fpo_debtors_master', $glaccountgroup_details, array('debtor_no' => $account_code[$i], 'fpo_id' => $fpo_id));
                    }
                    $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account = '".$account_code[$i]."' AND account_code = '".$gl_group."' AND fpo_id = '".$fpo_id."' AND tran_date = '".$financial_year_from."' AND LOWER(memo) = 'opening balance'");
                    if ($result->num_rows() >0) {
                        if ($amount[$i] > 0) {
                            $glaccountgroup_details = array(
                                'tran_date'         => $financial_year_from,
                                'amount'            => $balance_type[$i].$amount[$i],
                        );
                            $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account' => $account_code[$i],'account_code' => $gl_group, 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                        } else {
                            $glaccountgroup_details = array(
                                'tran_date'         => $financial_year_from,
                                'amount'            => '0',
                        );
                            $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account' => $account_code[$i],'account_code' => $gl_group, 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                        }
                    } else {
                        if ($amount[$i] > 0) {
                            $glaccountgroup_details = array(
                               'fpo_id'            => $this->session->userdata('user_id'),
                               'type'              => 9,
                               'tran_date'         => $financial_year_from,
                               'account'           => $account_code[$i],
                               'account_code'      => $gl_group,
                               'amount'            => $balance_type[$i].$amount[$i],
                               'memo'              => "Opening Balance"
                            );
                            $this->db->insert('fpo_gl_trans', $glaccountgroup_details);
                        }
                    }
                }
            }
        } elseif ($glType == 'supplier') {
            for ($i=0;$i<count($account_code);$i++) {
                $result = $this->db->query("SELECT gl_group_id FROM fpo_suppliers WHERE supplier_id = '".$account_code[$i]."' AND fpo_id = '".$fpo_id."'")->row();
                if (!empty($result->gl_group_id)) {
                    $gl_group = $result->gl_group_id;
                    if ($amount[$i] > 0) {
                        $glaccountgroup_details = array(
                            'opening_balance'   => $amount[$i],
                            'transaction_type'   => ($balance_type[$i] == '-'?2:1),
                        );
                        $this->db->update('fpo_suppliers', $glaccountgroup_details, array('supplier_id' => $account_code[$i], 'fpo_id' => $fpo_id));
                    } else {
                        $glaccountgroup_details = array(
                              'opening_balance'   => '0',
                              'transaction_type'   => ($balance_type[$i] == '-'?2:1),
                        );
                        $this->db->update('fpo_suppliers', $glaccountgroup_details, array('supplier_id' => $account_code[$i], 'fpo_id' => $fpo_id));
                    }
                    $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account = '".$account_code[$i]."' AND account_code = '".$gl_group."' AND fpo_id = '".$fpo_id."' AND tran_date = '".$financial_year_from."' AND LOWER(memo) = 'opening balance'");
                    if ($result->num_rows() >0) {
                        if ($amount[$i] > 0) {
                            $glaccountgroup_details = array(
                                'tran_date'         => $financial_year_from,
                                'amount'            => $balance_type[$i].$amount[$i],
                        );
                            $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account' => $account_code[$i],'account_code' => $gl_group, 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                        } else {
                            $glaccountgroup_details = array(
                                'tran_date'         => $financial_year_from,
                                'amount'            => '0',
                        );
                            $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account' => $account_code[$i],'account_code' => $gl_group, 'fpo_id' => $fpo_id, 'LOWER(memo)' => 'opening balance'));
                        }
                    } else {
                        if ($amount[$i] > 0) {
                            $glaccountgroup_details = array(
                           'fpo_id'            => $this->session->userdata('user_id'),
                           'type'              => 9,
                           'tran_date'         => $financial_year_from,
                           'account'           => $account_code[$i],
                           'account_code'      => $gl_group,
                           'amount'            => $balance_type[$i].$amount[$i],
                           'memo'              => "Opening Balance"
                        );
                            $this->db->insert('fpo_gl_trans', $glaccountgroup_details);
                        }
                    }
                }
            }
        } elseif ($glType == 'all') {
            for ($i=0;$i<count($gl_account_code);$i++) {
                $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account_code = '".$gl_account_code[$i]."' AND fpo_id = '".$fpo_id."' AND memo = 'Opening Balance'");
                if ($result->num_rows() >0) {
                    if ($gl_amount[$i] > 0) {
                        $glaccountgroup_details = array(
                                'tran_date'         => date('Y-m-d'),
                                'amount'            => $balance_type[$i].$gl_amount[$i],
                        );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account_code' => $gl_account_code[$i], 'fpo_id' => $fpo_id, 'memo' => 'Opening Balance'));
                    } else {
                        $glaccountgroup_details = array(
                                'tran_date'         => date('Y-m-d'),
                                'amount'            => '0',
                        );
                        $this->db->update('fpo_gl_trans', $glaccountgroup_details, array('account_code' => $gl_account_code[$i], 'fpo_id' => $fpo_id, 'memo' => 'Opening Balance'));
                    }
                } else {
                    if ($gl_amount[$i] > 0) {
                        $glaccountgroup_details = array(
                                'fpo_id'            => $this->session->userdata('user_id'),
                                'type'              => 9,
                                'tran_date'         => date('Y-m-d'),
                                'account_code'      => $gl_account_code[$i],
                                'amount'            => $balance_type[$i].$gl_amount[$i],
                                'memo'              => "Opening Balance"
                        );
                        $this->db->insert('fpo_gl_trans', $glaccountgroup_details);
                    }
                }
            }

            for ($i=0;$i<count($bank_account_code);$i++) {
                $result = $this->db->query("SELECT id FROM fpo_bank_accounts WHERE id = '".$bank_account_code[$i]."' AND fpo_id = '".$fpo_id."'");
                if ($result->num_rows() >0) {
                    if ($bank_amount[$i] > 0) {
                        $glaccountgroup_details = array(
                            'opening_balance'   => $balance_type[$i].$bank_amount[$i],
                        );
                        $this->db->update('fpo_bank_accounts', $glaccountgroup_details, array('id' => $bank_account_code[$i], 'fpo_id' => $fpo_id));
                    } else {
                        $glaccountgroup_details = array(
                              'opening_balance'   => '0',
                        );
                        $this->db->update('fpo_bank_accounts', $glaccountgroup_details, array('id' => $bank_account_code[$i], 'fpo_id' => $fpo_id));
                    }
                }
            }

            for ($i=0;$i<count($customer_account_code);$i++) {
                $result = $this->db->query("SELECT debtor_no FROM fpo_debtors_master WHERE debtor_no = '".$customer_account_code[$i]."' AND fpo_id = '".$fpo_id."'");
                if ($result->num_rows() >0) {
                    if ($customer_amount[$i] > 0) {
                        $glaccountgroup_details = array(
                            'opening_balance'   => $balance_type[$i].$customer_amount[$i],
                        );
                        $this->db->update('fpo_debtors_master', $glaccountgroup_details, array('debtor_no' => $customer_account_code[$i], 'fpo_id' => $fpo_id));
                    } else {
                        $glaccountgroup_details = array(
                              'opening_balance'   => '0',
                        );
                        $this->db->update('fpo_debtors_master', $glaccountgroup_details, array('debtor_no' => $customer_account_code[$i], 'fpo_id' => $fpo_id));
                    }
                }
            }

            for ($i=0;$i<count($supplier_account_code);$i++) {
                $result = $this->db->query("SELECT supplier_id FROM fpo_suppliers WHERE supplier_id = '".$supplier_account_code[$i]."' AND fpo_id = '".$fpo_id."'");
                if ($result->num_rows() >0) {
                    if ($supplier_amount[$i] > 0) {
                        $glaccountgroup_details = array(
                            'opening_balance'   => $balance_type[$i].$supplier_amount[$i],
                        );
                        $this->db->update('fpo_suppliers', $glaccountgroup_details, array('supplier_id' => $supplier_account_code[$i], 'fpo_id' => $fpo_id));
                    } else {
                        $glaccountgroup_details = array(
                              'opening_balance'   => '0',
                        );
                        $this->db->update('fpo_suppliers', $glaccountgroup_details, array('supplier_id' => $supplier_account_code[$i], 'fpo_id' => $fpo_id));
                    }
                }
            }
        }
        return true;
    }

    public function updateglAccounts($gl_acc_id)
    {
        $glaccountgroup_details = array(
            'account_name'        	    => $this->input->post('account_name'),
        );
        return $this->db->update('trv_chart_master', $glaccountgroup_details, array('account_code' => $gl_acc_id));
    }

    public function glaccountByID($gl_acc_id)
    {
        $this->db->select('trv_chart_master.*');
        $this->db->where(array('trv_chart_master.account_code2' => $gl_acc_id));
        $this->db->from('trv_chart_master');
        return $this->db->get()->row_array();
    }
    public function glAccount_view($id)
    {
        $this->db->select('trv_chart_master.*');
        $this->db->from('trv_chart_master');
        $this->db->where(array('trv_chart_master.status' => 1,'trv_chart_master.account_code' => $id));
        return $this->db->get()->result();
    }

    /** 10/01/2018 **/
    public function getAccountBalance()
    {
        $account_id = $this->input->post('account_id');
        $account_code = $this->input->post('account_code');
        $query ="SELECT SUM(fpo_gl_trans.amount) As current_amount FROM `fpo_gl_trans` WHERE fpo_gl_trans.fpo_id = ".$_SESSION['user_id']." And fpo_gl_trans.account_code = '".$account_code."' AND fpo_gl_trans.account = ".$account_id." And fpo_gl_trans.status = 1";
        $res = $this->db->query($query);
        if ($res->num_rows() > 0) {
            $result=$res->result("array");
            $current_amount_value= sprintf("%.2f", $result[0]['current_amount']);
            return $current_amount_value;
        } else {
            return 0;
        }
    }

    public function getLedgerAccountBalance()
    {
        $ledgerValue = $this->input->post('ledgerValue');
        $ledgerType = $this->input->post('ledgerType');

        //$query ="SELECT SUM(fpo_gl_trans.amount) As current_amount FROM `fpo_gl_trans` WHERE fpo_gl_trans.fpo_id = ".$_SESSION['user_id']." And fpo_gl_trans.account_code = '".$account_code."' AND fpo_gl_trans.account = ".$account_id." And fpo_gl_trans.status = 1";
        if ($this->input->post('type') != 3) {
            $query ="SELECT SUM(fpo_gl_trans.amount) As current_amount FROM `fpo_gl_trans` WHERE fpo_gl_trans.fpo_id = ".$_SESSION['user_id']." And fpo_gl_trans.account_code = '".$ledgerType."' AND fpo_gl_trans.account = ".$ledgerValue." And fpo_gl_trans.status = 1";
        } else {
            $query ="SELECT SUM(fpo_gl_trans.amount) As current_amount FROM `fpo_gl_trans` WHERE fpo_gl_trans.fpo_id = ".$_SESSION['user_id']." And fpo_gl_trans.account_code = '".$ledgerValue."' And fpo_gl_trans.status = 1";
        }
        $res = $this->db->query($query);
        if ($res->num_rows() > 0) {
            $result=$res->result("array");
            $current_amount_value= sprintf("%.2f", $result[0]['current_amount']);
            return $current_amount_value;
        } else {
            return 0;
        }
    }

    public function get_debit_lastid()
    {
        $query ="select counter from  fpo_gl_trans WHERE fpo_id = ".$this->session->userdata('user_id')." AND type = '7' order by counter DESC ";
        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            return $res->result("array");
        }

        return array();
    }

    public function get_credit_lastid()
    {
        $query ="select counter from  fpo_gl_trans WHERE fpo_id = ".$this->session->userdata('user_id')." AND type = '8' order by counter DESC";
        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            return $res->result("array");
        }

        return array();
    }

    public function getpurchaseInvoiceno()
    {
        $this->db->select('fpo_supp_trans.trans_no,fpo_supp_trans.supplier_id,fpo_supp_trans.supp_reference,fpo_suppliers.supp_name,fpo_supp_trans.ov_amount');
        $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_supp_trans.supplier_id');
        $this->db->where(array('fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_supp_trans');
        return $this->db->get()->result();
    }

    public function getsalesInvoiceno()
    {
        $this->db->select('fpo_debtor_trans.trans_no,fpo_debtor_trans.debtor_no,fpo_debtor_trans.ov_amount, fpo_debtor_trans.reference,fpo_debtors_master.name,');
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_debtor_trans.debtor_no');
        $this->db->where(array('fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_debtor_trans');
        return $this->db->get()->result();
    }

    public function postDebitnote()
    {
        list($account_id, $from_group_code) = explode('-', $this->input->post('ledger_entry'));
        $payment_trans = array(
            'fpo_id' 				  => $this->session->userdata('user_id'),
            'voucher_no'		      => $this->input->post('voucher_no'),
            'account'                 => $account_id,
            'account_code'            => $from_group_code,
            // 'account_code'      => $this->input->post('ledger_entry'),
            'type'   		 		  => 7,
            'type_no'   		 	  => 1,
            'tran_date'   			  => $this->input->post('entry_date'),
            'amount'   			      => $this->input->post('debit_note'),
            'memo'           		  => $this->input->post('memo'),
        );
        return $this->db->insert('fpo_gl_trans', $payment_trans);
    }

    public function postCreditnote()
    {
        list($account_id, $from_group_code) = explode('-', $this->input->post('ledger_entry'));
        $payment_trans = array(
            'fpo_id' 				 => $this->session->userdata('user_id'),
            'voucher_no'		     => $this->input->post('voucher_no'),
            //'account_code'   	 => $this->input->post('ledger_entry'),
            'account'               => $account_id,
            'account_code'          => $from_group_code,
            'type'   		 		=> 8,
            'type_no'   		 	=> 2,
            'tran_date'   			=> $this->input->post('entry_date'),
            'amount'   			 	=> '-'.$this->input->post('credit_note'),
            'memo'           		=> $this->input->post('memo')
        );
        return $this->db->insert('fpo_gl_trans', $payment_trans);
    }

    public function getSuppnameByInvoiceno($invoice_no)
    {
        $this->db->select('fpo_supp_trans.trans_no,fpo_supp_trans.supplier_id,fpo_supp_trans.tran_date, fpo_supp_trans.supp_reference,fpo_suppliers.supp_name,fpo_supp_trans.ov_amount');
        $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_supp_trans.supplier_id', 'left');
        $this->db->where(array('fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->where_in('fpo_supp_trans.supp_reference', $invoice_no);
        $this->db->from('fpo_supp_trans');
        $result = $this->db->get()->result();
        return $result;
    }

    public function getCustnameByInvoiceno($invoice_no)
    {
        $this->db->select('fpo_debtor_trans.trans_no, fpo_debtor_trans.debtor_no, fpo_debtor_trans.tran_date, SUM(fpo_debtor_trans.ov_amount) as total, fpo_debtor_trans.reference,fpo_debtors_master.name');
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_debtor_trans.debtor_no', 'left');
        $this->db->where(array('fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->where_in('fpo_debtor_trans.reference', $invoice_no);
        $this->db->from('fpo_debtor_trans');
        return $this->db->get()->result();
    }

    public function getPurchaseAmount($invoice)
    {
        $this->db->select('fpo_supp_trans.trans_no, fpo_supp_trans.supplier_id, fpo_supp_trans.supp_reference, SUM(fpo_supp_trans.ov_amount) as total');
        $this->db->where(array('fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->where_in('fpo_supp_trans.supp_reference', $invoice);
        $this->db->from('fpo_supp_trans');
        return $this->db->get()->result();
    }

    public function getSalesAmount($invoice)
    {
        $this->db->select('fpo_debtor_trans.trans_no,fpo_debtor_trans.debtor_no,SUM(fpo_debtor_trans.ov_amount) as total, fpo_debtor_trans.reference,fpo_debtors_master.name,');
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_debtor_trans.debtor_no', 'left');
        $this->db->where(array('fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->where_in('fpo_debtor_trans.reference', $invoice);
        $this->db->from('fpo_debtor_trans');
        return $this->db->get()->result();
    }
    /* get invoice no */
    public function getInvoicesale()
    {
        $this->db->select('fpo_debtor_trans.trans_no as id, fpo_debtor_trans.reference as text, CONCAT(fpo_debtor_trans.reference,"&CUST_",fpo_debtor_trans.debtor_no) as title');
        $this->db->limit(10);
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_debtor_trans.debtor_no', 'left');
        $this->db->where(array('fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
        //$this->db->like('fpo_debtor_trans.reference', $invoice_no);
        $this->db->from('fpo_debtor_trans');
        $result = $this->db->get()->result();
        return $result;
    }

    public function getInvoicepurchase()
    {
        $this->db->select('fpo_supp_trans.trans_no as id,fpo_supp_trans.supp_reference as text,CONCAT(fpo_supp_trans.supp_reference,"&SUP_",fpo_suppliers.supplier_id) as title');
        $this->db->limit(10);
        $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_supp_trans.supplier_id', 'left');
        $this->db->where(array('fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
        //$this->db->like('fpo_supp_trans.supp_reference', $invoice_no);
        $this->db->from('fpo_supp_trans');
        return $this->db->get()->result();
    }

    //glCode
    public function gl_code()
    {
        $this->db->select('trv_chart_master.account_code,trv_chart_master.account_name,trv_chart_master.account_mode');
        $this->db->where(array('trv_chart_master.status' => 1));
        $this->db->where_in('trv_chart_master.account_mode', array(5,6));
        $this->db->from('trv_chart_master');
        $result=$this->db->get()->result();
        return $result;
    }

    //sales invoice list feb28//
    public function salesinvoicelist()
    {
        $cutomers = $cash = array();
        $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.counter,fpo_gl_trans.voucher_no,fpo_gl_trans.amount,fpo_debtor_trans.reference as inv_no, fpo_debtors_master.name As customer_name');
        $this->db->order_by("counter", "asc");
        $this->db->where(array('fpo_gl_trans.type' => 6, 'fpo_gl_trans.account_code LIKE' => '40202%', 'fpo_gl_trans.status' =>1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_gl_trans');
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account');
        $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.voucher_no = fpo_gl_trans.voucher_no AND fpo_debtor_trans.debtor_no = fpo_debtors_master.debtor_no');
        $cutomers = $this->db->get()->result();

        $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.counter,fpo_gl_trans.voucher_no,fpo_gl_trans.amount,fpo_debtor_trans.reference as inv_no, "Cash" As customer_name');
        $this->db->order_by("counter", "asc");
        $this->db->where(array('fpo_gl_trans.type' => 6, 'fpo_gl_trans.account_code LIKE' => '40205%', 'fpo_gl_trans.status' =>1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_gl_trans');
        $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.voucher_no = fpo_gl_trans.voucher_no');
        $cash = $this->db->get()->result();

        if ($cash) {
            $cutomers = array_merge($cutomers, $cash);
        }
        return $cutomers;
    }

    public function getSalesTransactionById($voucher_no, $inv_no, $customer)
    {
        if ($customer == '4020501' || $customer == '4020502') {
            $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
            $this->db->select('fpo_debtor_trans.reference, fpo_debtor_trans_details.cgst AS cgst_value,fpo_debtor_trans_details.sgst AS sgst_value,fpo_debtor_trans_details.igst AS igst_value, "Retail Sales" As customer_name, fpo_debtor_trans_details.stock_id,fpo_debtor_trans_details.unit_price,fpo_debtor_trans_details.quantity,fpo_debtor_trans_details.discount_percent,fpo_debtor_trans_details.line_total, trv_uom_master.short_name');
            $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,hsn_category as hsn_code');
            $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
            $this->db->order_by("counter", "asc");
            $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $customer, 'fpo_debtor_trans.voucher_no' => $voucher_no, 'fpo_debtor_trans.reference' => $inv_no, 'fpo_gl_trans.type' => 6, 'fpo_gl_trans.person_type_id' => 2, 'fpo_gl_trans.status' =>1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
            $this->db->from('fpo_gl_trans');
            $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.debtor_no = '.$customer);
            $this->db->join('fpo_debtor_trans_details', 'fpo_debtor_trans_details.debtor_trans_no = fpo_debtor_trans.trans_no');
            $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_debtor_trans_details.uom');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_debtor_trans_details.stock_id');
            $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
        } else {
            $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
            $this->db->select('fpo_debtor_trans.reference, fpo_debtor_trans_details.cgst AS cgst_value,fpo_debtor_trans_details.sgst AS sgst_value,fpo_debtor_trans_details.igst AS igst_value, fpo_debtors_master.name As customer_name, fpo_debtor_trans_details.stock_id,fpo_debtor_trans_details.unit_price,fpo_debtor_trans_details.quantity,fpo_debtor_trans_details.discount_percent,fpo_debtor_trans_details.line_total, trv_uom_master.short_name');
            $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,hsn_category as hsn_code');
            $this->db->select('trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_pincode_master.pincode As pincode');//, trv_product_master.name AS product_name
            $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
            $this->db->order_by("counter", "asc");
            $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $customer, 'fpo_debtor_trans.voucher_no' => $voucher_no, 'fpo_debtor_trans.reference' => $inv_no, 'fpo_gl_trans.type' => 6, 'fpo_gl_trans.person_type_id' => 2, 'fpo_gl_trans.status' =>1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
            $this->db->from('fpo_gl_trans');
            $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account');
            $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.debtor_no = fpo_debtors_master.debtor_no');
            $this->db->join('fpo_debtor_trans_details', 'fpo_debtor_trans_details.debtor_trans_no = fpo_debtor_trans.trans_no');
            $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_debtor_trans_details.uom');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_debtor_trans_details.stock_id');
            $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
            $this->db->join('trv_village_master', 'trv_village_master.id = fpo_debtors_master.village', 'left');
            $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_debtors_master.panchayat', 'left');
            $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_debtors_master.taluk_id', 'left');
            $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_debtors_master.block', 'left');
            $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_debtors_master.district');
            $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_debtors_master.state');
            $this->db->join('trv_pincode_master', 'trv_pincode_master.pincode = fpo_debtors_master.pincode');
        }
        //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
        return $this->db->get()->result();
    }

    public function bankAccountByUserID()
    {
        $this->db->select('fpo_bank_accounts.bank_account_number, fpo_bank_accounts.bank_account_name, trv_bank_name_master.name AS bank_name, trv_bank_master.branch_name, trv_bank_master.ifsc_code');
        $this->db->where(array('fpo_bank_accounts.status' =>1, 'fpo_bank_accounts.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_bank_accounts');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_bank_accounts.bank_name');
        $this->db->join('trv_bank_master', 'trv_bank_master.id = fpo_bank_accounts.bank_address');
        return $this->db->get()->row();
    }


    //sales invoice list feb28//
    public function purchaseregisterlist()
    {
        $cutomers = $cash = array();
        $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.voucher_no,fpo_gl_trans.counter,fpo_gl_trans.amount,fpo_supp_trans.supp_reference as inv_no, fpo_suppliers.supp_name As customer_name');
        $this->db->order_by("counter", "asc");
        $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.account_code LIKE' => '30302%', 'fpo_gl_trans.status' => 1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_gl_trans');
        $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account');
        $this->db->where(array('fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->join('fpo_supp_trans', 'fpo_supp_trans.reference = fpo_gl_trans.voucher_no AND fpo_supp_trans.supplier_id = fpo_suppliers.supplier_id');
        $cutomers = $this->db->get()->result();

        $this->db->select('fpo_gl_trans.tran_date,fpo_gl_trans.account_code,fpo_gl_trans.voucher_no,fpo_gl_trans.counter,fpo_gl_trans.amount,fpo_supp_trans.supp_reference as inv_no, "Cash" As customer_name');
        $this->db->order_by("counter", "asc");
        $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.account_code LIKE' => '40205%', 'fpo_gl_trans.status' =>1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_gl_trans');
        $this->db->join('fpo_supp_trans', 'fpo_supp_trans.reference = fpo_gl_trans.voucher_no');
        $this->db->where(array('fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
        $cash = $this->db->get()->result();
        if ($cash) {
            $cutomers = array_merge($cutomers, $cash);
        }
        return $cutomers;
    }


    public function getInventoryTransactionById($type, $voucher_no, $inv_no, $category_person)
    {
        if ($type == 1) {
            if ($category_person == '4020501' || $category_person == '4020502') {
                $this->db->select('fpo_supp_trans.supplier_id, fpo_supp_trans.ov_amount, fpo_supp_trans.alloc AS overall_total, fpo_supp_trans.delivery_charge, fpo_supp_trans.adjustment, fpo_supp_trans.ov_discount, fpo_supp_trans.cgst AS total_cgst, fpo_supp_trans.sgst AS total_sgst, fpo_supp_trans.igst AS total_igst');
                $this->db->where(array('fpo_supp_trans.supplier_id' => $category_person, 'fpo_supp_trans.reference' => $voucher_no, 'fpo_supp_trans.supp_reference' => $inv_no, 'fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
                $this->db->from('fpo_supp_trans');
                return $this->db->get()->row();
            } else {
                $this->db->select('fpo_supp_trans.supplier_id, fpo_supp_trans.ov_amount, fpo_supp_trans.alloc AS overall_total, fpo_supp_trans.delivery_charge, fpo_supp_trans.adjustment, fpo_supp_trans.ov_discount, fpo_supp_trans.cgst AS total_cgst, fpo_supp_trans.sgst AS total_sgst, fpo_supp_trans.igst AS total_igst');
                $this->db->where(array('fpo_supp_trans.reference' => $voucher_no, 'fpo_supp_trans.supp_reference' => $inv_no, 'fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
                $this->db->from('fpo_supp_trans');
                return $this->db->get()->row();
            }
        } else {
            if ($category_person == '4020501' || $category_person == '4020502') {
                $this->db->select('fpo_debtor_trans.debtor_no, fpo_debtor_trans.ov_amount, fpo_debtor_trans.alloc AS overall_total, fpo_debtor_trans.ov_freight, fpo_debtor_trans.adjustment, fpo_debtor_trans.ov_discount, fpo_debtor_trans.cgst AS total_cgst, fpo_debtor_trans.sgst AS total_sgst, fpo_debtor_trans.igst AS total_igst');
                $this->db->where(array('fpo_debtor_trans.debtor_no' => $category_person, 'fpo_debtor_trans.voucher_no' => $voucher_no, 'fpo_debtor_trans.reference' => $inv_no, 'fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
                $this->db->from('fpo_debtor_trans');
                return $this->db->get()->row();
            } else {
                $this->db->select('fpo_debtor_trans.debtor_no, fpo_debtor_trans.ov_amount, fpo_debtor_trans.alloc AS overall_total, fpo_debtor_trans.ov_freight, fpo_debtor_trans.adjustment, fpo_debtor_trans.ov_discount, fpo_debtor_trans.cgst AS total_cgst, fpo_debtor_trans.sgst AS total_sgst, fpo_debtor_trans.igst AS total_igst');
                $this->db->where(array('fpo_debtor_trans.voucher_no' => $voucher_no, 'fpo_debtor_trans.reference' => $inv_no, 'fpo_debtor_trans.fpo_id' => $_SESSION['user_id']));
                $this->db->from('fpo_debtor_trans');
                return $this->db->get()->row();
            }
        }
    }
    public function getPurchaseTransactionById($voucher_no, $inv_no, $supplier)
    {
        if ($supplier == '4020501' || $supplier == '4020502') {
            $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
            $this->db->select('fpo_supp_trans.supp_reference, fpo_supp_invoice_items.unit_price,fpo_supp_invoice_items.discount,fpo_supp_invoice_items.quantity as qty_invoiced,fpo_supp_invoice_items.cgst AS cgst_value,fpo_supp_invoice_items.sgst AS sgst_value,fpo_supp_invoice_items.igst AS igst_value');
            $this->db->select('"Cash Purchase" As supplier_name,fpo_supp_trans.ov_discount, trv_uom_master.short_name');
            $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,trv_fpo_product.hsn_code');
            $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
            $this->db->order_by("counter", "asc");
            $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $supplier, 'fpo_supp_trans.reference' => $voucher_no, 'fpo_gl_trans.status' =>1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
            $this->db->where(array('fpo_supp_trans.supp_reference' => $inv_no, 'fpo_supp_trans.fpo_id' => $_SESSION['user_id']));
            $this->db->from('fpo_gl_trans');
            $this->db->join('fpo_supp_trans', 'fpo_supp_trans.supplier_id = '.$supplier);
            $this->db->join('fpo_supp_invoice_items', 'fpo_supp_invoice_items.supp_trans_no = fpo_supp_trans.trans_no');
            $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_supp_invoice_items.uom');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_supp_invoice_items.stock_id');
            $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
        } else {
            $this->db->select('fpo_gl_trans.voucher_no,fpo_gl_trans.tran_date,fpo_gl_trans.amount as total');
            $this->db->select('fpo_supp_trans.supp_reference, fpo_supp_invoice_items.unit_price,fpo_supp_invoice_items.discount,fpo_supp_invoice_items.quantity as qty_invoiced,fpo_supp_invoice_items.cgst AS cgst_value,fpo_supp_invoice_items.sgst AS sgst_value,fpo_supp_invoice_items.igst AS igst_value');
            $this->db->select('fpo_suppliers.supp_name As supplier_name,fpo_suppliers.gst_no As gst,fpo_suppliers.pan_no As pan,fpo_suppliers.pan_no As pan,fpo_supp_trans.ov_discount, trv_uom_master.short_name,trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_pincode_master.pincode As pincode');
            $this->db->select('trv_fpo_product.stock_group_id,trv_fpo_product.category_id,trv_fpo_product.sub_category_id,trv_fpo_product.product_id,trv_fpo_product.classification,trv_fpo_product.hsn_code');
            $this->db->select('trv_tax_master.sgst_utgst,trv_tax_master.igst,trv_tax_master.cgst');
            $this->db->order_by("counter", "asc");
            $this->db->where(array('fpo_gl_trans.type' => 5, 'fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account_code' => $supplier, 'fpo_supp_trans.reference' => $voucher_no, 'fpo_supp_trans.supp_reference' => $inv_no, 'fpo_gl_trans.status' =>1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
            $this->db->from('fpo_gl_trans');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account');
            $this->db->join('fpo_supp_trans', 'fpo_supp_trans.supplier_id = fpo_suppliers.supplier_id');
            $this->db->join('fpo_supp_invoice_items', 'fpo_supp_invoice_items.supp_trans_no = fpo_supp_trans.trans_no');
            $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_supp_invoice_items.uom');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_supp_invoice_items.stock_id');
            $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
            $this->db->join('trv_village_master', 'trv_village_master.id = fpo_suppliers.mailing_village', 'left');
            $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_suppliers.mailing_panchayat', 'left');
            $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_suppliers.mailing_taluk_id', 'left');
            $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_suppliers.mailing_block', 'left');
            $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_suppliers.mailing_district');
            $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_suppliers.mailing_state');
            $this->db->join('trv_pincode_master', 'trv_pincode_master.pincode = fpo_suppliers.mailing_pincode');
        }
        return $this->db->get()->result();
    }


    /* Getting the total products using product ID */
    public function getProductCountByID($product_id)
    {
        $this->db->select_sum('fpo_stock_moves.qty');
        $this->db->select('fpo_stock_moves.uom');
        $this->db->where(array('fpo_stock_moves.stock_id' => $product_id, 'fpo_stock_moves.visible' => 1, 'fpo_stock_moves.person_id' => $_SESSION['user_id']));//'fpo_stock_moves.type' => $type,
        $this->db->from('fpo_stock_moves');
        $this->db->distinct('fpo_stock_moves.uom');
        //$this->db->join('fpo_supp_trans', 'fpo_supp_trans.trans_no = fpo_stock_moves.trans_no');
        //$this->db->join('fpo_purch_orders', 'fpo_purch_orders.supplier_id = fpo_supp_trans.supplier_id');
        //$this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.item_code = fpo_stock_moves.stock_id');
        //$this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_stock_moves.uom');
        return $this->db->get()->row();
    }
    public function getUOMNameByID($uom_id)
    {
        $this->db->select('trv_uom_master.short_name');
        $this->db->where(array('trv_uom_master.id' => $uom_id));
        $this->db->from('trv_uom_master');
        return $this->db->get()->row();
    }
    /* function getProductCountByID($product_id){
         $this->db->select_sum('fpo_stock_moves.qty');
         $this->db->select('fpo_purch_order_details.uom, trv_uom_master.short_name');
         $this->db->where(array('fpo_stock_moves.stock_id' => $product_id, 'fpo_stock_moves.visible' => 1, 'fpo_supp_trans.fpo_id' => $_SESSION['user_id']));//'fpo_stock_moves.type' => $type,
         $this->db->from('fpo_stock_moves');
         $this->db->join('fpo_supp_trans', 'fpo_supp_trans.trans_no = fpo_stock_moves.trans_no');
         //$this->db->join('fpo_purch_orders', 'fpo_purch_orders.supplier_id = fpo_supp_trans.supplier_id');
         $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.item_code = fpo_stock_moves.stock_id');
         $this->db->join('trv_uom_master', 'trv_uom_master.id = fpo_purch_order_details.uom');
         return $this->db->get()->row();
     } */

    /* Getting the last transaction id by given fpo */
    public function getLastTransactionByFPO($fpo_id, $type)
    {
        //$trans_count = $this->db->get_where('fpo_gl_trans', array('type' => $type, 'fpo_id' => $fpo_id))->num_rows();
        //return $trans_count;

        $this->db->where(array('type' => $type, 'fpo_id' => $fpo_id));
        $this->db->from('fpo_gl_trans');
        $this->db->group_by('voucher_no');
        return $this->db->get()->num_rows();
    }


    public function getAllTransactionByVoucherNumber($voucher_no)
    {
        $this->db->select('fpo_gl_trans.*, trv_chart_master.account_name, , fpo_debtors_master.name As customerName, fpo_suppliers.supp_name As supplierName, fpo_bank_accounts.bank_account_name As accountName');
        $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.status' => 1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_gl_trans.account', 'left');
        $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_gl_trans.account', 'left');
        $this->db->join('fpo_bank_accounts', 'fpo_bank_accounts.id = fpo_gl_trans.account', 'left');
        return $this->db->get()->result();
    }
    public function closingBalanceByVoucherNumber($voucher_no, $type, $holder)
    {
        $this->db->select('SUM(fpo_gl_trans.amount) As balance');
        if ($type == 'ledger') {
            $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account' => $holder, 'fpo_gl_trans.type_no' => 1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        } else {
            $this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.account' => $holder, 'fpo_gl_trans.person_type_id' => 3, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id'], 'fpo_gl_trans.status' => 1));
        }
        //$this->db->where(array('fpo_gl_trans.voucher_no' => $voucher_no, 'fpo_gl_trans.status' => 1, 'fpo_gl_trans.fpo_id' => $_SESSION['user_id']));
        $this->db->from('fpo_gl_trans');
        return $this->db->get()->row();
    }
    //Function for GST report
    public function getTaxInOut($fpo_id, $fromValue, $toValue, $selectedCode)
    {
        $sales = $purchase = array();
        $this->db->select("fpo_gl_trans.account_code As account_code, fpo_debtor_trans_details.cgst,fpo_debtor_trans_details.sgst,fpo_debtor_trans_details.igst, fpo_gl_trans.person_type_id, fpo_gl_trans.account, trv_chart_master.account_name, trv_chart_master.account_code2, trv_chart_master.has_child,cgst_percent,sgst_percent,igst_percent");
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1, 'trv_chart_master.account_code LIKE' => "{$selectedCode}%"));
        $this->db->where("fpo_gl_trans.tran_date BETWEEN '{$fromValue}' AND '{$toValue}'");
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        $this->db->join('fpo_debtor_trans', 'fpo_debtor_trans.voucher_no = fpo_gl_trans.voucher_no');
        $this->db->join('fpo_debtor_trans_details', 'fpo_debtor_trans_details.debtor_trans_no = fpo_debtor_trans.trans_no');
        $sales = $this->db->get()->result();

        $this->db->select("fpo_gl_trans.account_code As account_code, fpo_supp_invoice_items.cgst,fpo_supp_invoice_items.sgst,fpo_supp_invoice_items.igst, fpo_gl_trans.person_type_id, fpo_gl_trans.account, trv_chart_master.account_name, trv_chart_master.account_code2, trv_chart_master.has_child,cgst_percent,sgst_percent,igst_percent");
        $this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1, 'trv_chart_master.account_code LIKE' => "{$selectedCode}%"));
        $this->db->where("fpo_gl_trans.tran_date BETWEEN '{$fromValue}' AND '{$toValue}'");
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        $this->db->join('fpo_supp_trans', 'fpo_supp_trans.reference = fpo_gl_trans.voucher_no');
        $this->db->join('fpo_supp_invoice_items', 'fpo_supp_invoice_items.supp_trans_no = fpo_supp_trans.trans_no');
        $purchase = $this->db->get()->result();
        return array_merge($sales,$purchase);
    }
    // Bank Reconciliation
    public function getSelectedBankTransfer($fpo_id, $fromValue, $toValue, $selectedCode,$account)
    {
        $this->db->select("fpo_gl_trans.account_code As account_code,fpo_gl_trans.person_type_id, fpo_gl_trans.account, amount, tran_date, fpo_gl_trans.created_on, bank_date");
        $this->db->where(array('fpo_gl_trans.account' => $account, 'fpo_gl_trans.fpo_id' => $fpo_id, 'fpo_gl_trans.status' => 1, 'fpo_gl_trans.account_code LIKE' => "{$selectedCode}%"));
        $this->db->where("fpo_gl_trans.tran_date BETWEEN '{$fromValue}' AND '{$toValue}'");
        $this->db->from('fpo_gl_trans');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_gl_trans.account_code');
        return $this->db->get()->result();
    }
}
