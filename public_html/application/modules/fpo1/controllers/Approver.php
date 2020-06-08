<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approver extends CI_Controller {

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
      $this->load->model("Approver_Model");
      $this->load->model("Supplier_Model");
      $this->load->model("Finance_Model");
      $this->load->model("Login_Model");
      $this->load->model("Customer_Model");
      $this->load->model("Location_Model");
      $this->load->model("Masterdata_Model");
	   $this->load->model("Fig_Model");
       $this->load->model("Fpo_Model");
	   $this->load->model("Fpg_Model");
      $this->load->model("Role_Model");
      $this->load->model("User_Model");
	  $this->load->model("Operation_Model");
      header('Access-Control-Allow-Origin: *');
	}
	/*Profile starts*/
	public function index(){        
		$data['page'] = 'Profile List';
		$data['page_title'] = 'Profile List';
		$data['page_module'] = 'approver'; 
		$data['fpg_list'] = $this->Approver_Model->fpgList($this->session->userdata('user_id'));
		$data['fig_list'] = $this->Approver_Model->figList($this->session->userdata('user_id'));
		$data['fig_representative'] = $this->Approver_Model->figRepresentativeList($this->session->userdata('user_id'));
		$this->load->view('approver/profilelist', $data); 
	}
	public function approveProfile($source_id, $source_type){
		$sourceData = array("status" => 1); 
		if($source_type == 1){
		  $this->db->update('trv_fpg', $sourceData, array('id' => $source_id)); 
		  $response = array("status" => 1, "message" => "FPG approved successfully");
		} else if($source_type == 2){
		  $this->db->update('trv_fig', $sourceData, array('id' => $source_id)); 
		  $response = array("status" => 1, "message" => "FIG approved successfully");
		} else if($source_type == 3){
		  $this->db->update('trv_fig_representative', $sourceData, array('fig_id' => $source_id)); 
		  $response = array("status" => 1, "message" => "FIG representative approved successfully");
		} else {
		  $response = array("status" => 0, "message" => "Something went wrong");
		}         
		echo json_encode($response);
	}
	public function rejectProfile($source_id, $source_type){
		$sourceData = array("status" => 2); 
		if($source_type == 1){
		  $this->db->update('trv_fpg', $sourceData, array('id' => $source_id)); 
		  $response = array("status" => 1, "message" => "FPG rejected successfully");
		} else if($source_type == 2){
		  $this->db->update('trv_fig', $sourceData, array('id' => $source_id)); 
		  $response = array("status" => 1, "message" => "FIG rejected successfully");
		} else if($source_type == 3){
		  $this->db->update('trv_fig_representative', $sourceData, array('fig_id' => $source_id)); 
		  $response = array("status" => 1, "message" => "FIG representative rejected successfully");
		} else {
		  $response = array("status" => 0, "message" => "Something went wrong");
		}         
		echo json_encode($response);
	}
	public function viewProfile($profileId){
		$profileId = explode('_', $profileId);
		if($profileId[1] == 1){
			$fpg_list = $this->Fpg_Model->fpgByID($profileId[0]);
			if(!empty($fpg_list)){         
			 $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($fpg_list->PIN_Code);
			 $data['block_info'] = $this->Login_Model->getBlockByDistCode($fpg_list->district);
			 $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($fpg_list->block);
			 $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($fpg_list->Gram_PanchayatID);
			}
			$data['fpg_info'] = $fpg_list;
			$data['state'] = 1;
		} else if($profileId[1] == 2){
			$data['fig_info'] = $this->Fig_Model->figByID($profileId[0]);
			$data['state'] = 2;
		} else {
			$data['figrepresent_list'] = $this->Approver_Model->figrepresentByID($profileId[0]);
			$data['fig'] = $this->Fig_Model->fig_list();
			$data['state'] = 3;
		}
		$this->load->view('approver/viewprofile', $data);
    }
   /*Profile ends*/
   
   /*Godown starts*/
   public function godownlist(){        
      $data['page'] = 'Godown List';
      $data['page_title'] = 'Godown List';
      $data['page_module'] = 'approver';
      $data['godown_list'] = $this->Approver_Model->godown_list();		
      $this->load->view('approver/godownlist', $data); 
	}
    public function godownstatus($godown_id,$status){
      $godown_data = array(
      "status"   => $status,
      ); 
      $this->db->update('trv_godown_master', $godown_data, array('id' => $godown_id));   
      $response = array("status" => $status);
      echo json_encode($response); 
   }
   public function viewgodown($godown_id){        
      $godown = $this->Masterdata_Model->godownByviewID($godown_id);
      if(!empty($godown)){ 
      $data['taluk_info'] = $this->Login_Model->getTalukByDistCode($godown['district_id']);
      $data['block_info'] = $this->Login_Model->getBlockByDistCode($godown['district_id']);
      $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($godown['block_id']);
      $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($godown['panchayat_id']);
      }
      $data['godown_info']= $godown;
      $this->load->view('approver/viewgodown', $data); 
	} 
   /*Godown ends*/
   
   /*Bank starts*/
   public function banklist(){        
      $data['page'] = 'Bank List';
      $data['page_title'] = 'Bank List';
      $data['page_module'] = 'approver';
      $data['bank_info'] = $this->Approver_Model->bankAccount_List();
      $this->load->view('approver/banklist', $data); 
	}
   public function bankstatus($bank_name_id,$status){
      $bank_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_bank_accounts', $bank_data, array('id' => $bank_name_id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   public function viewbank($bank_name_id){   
		$data['bank_name'] = $this->Finance_Model->bank_name_list();
		$data['bank_info'] = $this->Finance_Model->bankByViewID($bank_name_id);
      $data['chart_master'] = $this->Finance_Model->gl_ChartMasterList();
		$this->load->view('approver/viewbank', $data);		
	}
   /*Bank ends*/
   
   /*User starts*/
   public function userlist(){        
      $data['page'] = 'User List';
      $data['page_title'] = 'User List';
      $data['page_module'] = 'approver';
      $data['user_list'] = $this->Approver_Model->userlist();	
      $this->load->view('approver/userlist', $data); 
	}
   public function userstatus($id,$status){
      $user_data = array(
      "status"   => $status,
      ); 
      $this->db->update('trv_staff_member', $user_data, array('id' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   public function viewuser($id) {        
      $data['user_info'] = $this->User_Model->userByID($id);
      $this->load->view('approver/viewuser', $data); 
	} 

  /*User ends*/
  
  /*Finance starts*/
  public function receiptlist(){        
      $data['page'] = 'Finance';
      $data['page_title'] = 'Receipt List';
      $data['page_module'] = 'approver';	
      $data['receipt_list'] = $this->Approver_Model->receiptlist($this->session->userdata('user_id')); 
      //print_r($data['receipt_list']); die;
      $this->load->view('approver/receiptlist', $data); 
	}
   public function viewreceipt($voucher_no){
      $receiptinfo = $this->Approver_Model->viewReceiptByVoucher($voucher_no);
      for($i=0;$i<count($receiptinfo);$i++){
         $account_name = $this->Approver_Model->getLedgerTypeName($receiptinfo[$i]->account_code, 3);
         $receiptinfo[$i]->account_name = $account_name; 
         if($receiptinfo[$i]->account_code == '40204'){                       
            $bank_name = $this->Approver_Model->getLedgerTypeName($receiptinfo[$i]->account, 4);
            $receiptinfo[$i]->bank_name = $bank_name; 
         } else if($receiptinfo[$i]->account_code == '4020201' || $receiptinfo[$i]->account_code == '4020202'){
            $supplierName = $this->Approver_Model->getLedgerTypeName($receiptinfo[$i]->account, 1);
            $receiptinfo[$i]->supplierName = $supplierName;
         }else if($receiptinfo[$i]->account_code == '3030201' || $receiptinfo[$i]->account_code == '3030202' || $receiptinfo[$i]->account_code == '3030203' || $receiptinfo[$i]->account_code == '3030204'){
            $customerName = $this->Approver_Model->getLedgerTypeName($receiptinfo[$i]->account, 2);
            $receiptinfo[$i]->customerName = $customerName;
         }else{
            
         }
      }
      $data['receipt_info'] = $receiptinfo;  
      $this->load->view('approver/viewreceipt', $data); 
	}
   public function receiptstatus($id,$status){
      $receipt_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $receipt_data, array('counter' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   public function paymentlist(){        
      $data['page'] = 'Finance';
      $data['page_title'] = 'Payment List';
      $data['page_module'] = 'approver';
      $data['payment_list'] = $this->Approver_Model->paymentlist($this->session->userdata('user_id'));
      $this->load->view('approver/paymentlist', $data); 
	}  
   public function viewpayment($voucher_no){
      /* $paymentinfo = $this->Approver_Model->viewPaymentByVoucher($voucher_no);
      for($i=0;$i<count($paymentinfo);$i++){
         if($paymentinfo[$i]->account_code == '3030201' || $paymentinfo[$i]->account_code == '3030202' || $paymentinfo[$i]->account_code == '3030203' || $paymentinfo[$i]->account_code == '3030204'){
            $supplierName = $this->Approver_Model->getLedgerTypeName($paymentinfo[$i]->account, 1);
            $paymentinfo[$i]->supplierName = $supplierName;
         }else if($paymentinfo[$i]->account_code == '4020201' || $paymentinfo[$i]->account_code == '4020202'){
            $customerName = $this->Approver_Model->getLedgerTypeName($paymentinfo[$i]->account, 2);
            $paymentinfo[$i]->customerName = $customerName;
         }else if($paymentinfo[$i]->account_code != '3030201' || $paymentinfo[$i]->account_code != '3030202' || $paymentinfo[$i]->account_code != '3030203' || $paymentinfo[$i]->account_code != '3030204' || $paymentinfo[$i]->account_code != '4020201' || $paymentinfo[$i]->account_code != '4020202'){
            $cashName = $this->Approver_Model->getLedgerTypeName($paymentinfo[$i]->account, 3);
            $paymentinfo[$i]->cashName = $cashName;            
         }else{
            
         }         
      } */
      $paymentinfo = $this->Approver_Model->viewPaymentByVoucher($voucher_no);
      for($i=0;$i<count($paymentinfo);$i++){
         $account_name = $this->Approver_Model->getLedgerTypeName($paymentinfo[$i]->account_code, 3);
         $paymentinfo[$i]->account_name = $account_name; 
         if($paymentinfo[$i]->account_code == '40204'){                       
            $bank_name = $this->Approver_Model->getLedgerTypeName($paymentinfo[$i]->account, 4);
            $paymentinfo[$i]->bank_name = $bank_name; 
         } else if($paymentinfo[$i]->account_code == '4020201' || $paymentinfo[$i]->account_code == '4020202'){
            $supplierName = $this->Approver_Model->getLedgerTypeName($paymentinfo[$i]->account, 1);
            $paymentinfo[$i]->supplierName = $supplierName;
         }else if($paymentinfo[$i]->account_code == '3030201' || $paymentinfo[$i]->account_code == '3030202' || $paymentinfo[$i]->account_code == '3030203' || $paymentinfo[$i]->account_code == '3030204'){
            $customerName = $this->Approver_Model->getLedgerTypeName($paymentinfo[$i]->account, 2);
            $paymentinfo[$i]->customerName = $customerName;
         }else{
            
         }
      }
      
      $data['payment_info'] = $paymentinfo; 
     // echo"<pre>"; print_r($data['payment_info']); die;      
      $this->load->view('approver/viewpayment', $data); 
	}
    public function paymentstatus($id,$status){
      $payment_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $payment_data, array('counter' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   public function contralist(){        
      $data['page'] = 'Finance';
      $data['page_title'] = 'Contra List';
      $data['page_module'] = 'approver';
      $data['contra_list'] = $this->Approver_Model->contralist($this->session->userdata('user_id'));
      $this->load->view('approver/contralist', $data); 
	}
    public function viewcontra($voucher_no){        
      $contrainfo = $this->Approver_Model->viewcontra($voucher_no);
      $data['counter'] = $contrainfo[0]->counter;
      $data['voucher_no'] = $contrainfo[0]->voucher_no;
      $data['amount'] = $contrainfo[0]->amount;
      $data['tran_date'] = $contrainfo[0]->tran_date;
      $data['from_account'] = $contrainfo[0]->account;
      $data['to_account'] = $contrainfo[1]->account;      
      if($contrainfo[0]->account == '4020501' || $contrainfo[0]->account == '4020502'){
         $data['account_from'] = $contrainfo[0]->account_name;
      } else if($contrainfo[0]->account != '4020501' || $contrainfo[0]->account != '4020502'){
         $data['account_from'] = $contrainfo[0]->bank_account_name;
      }      
      if($contrainfo[1]->account == '4020501' || $contrainfo[1]->account == '4020502'){
         $data['account_to'] = $contrainfo[1]->account_name;
      } else if($contrainfo[1]->account != '4020501' || $contrainfo[1]->account != '4020502'){
         $data['account_to'] = $contrainfo[1]->bank_account_name;
      }      
      $this->load->view('approver/viewcontra', $data); 
	}
   public function contrastatus($id,$status){
      $contra_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $contra_data, array('counter' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   public function journallist(){        
      $data['page'] = 'Finance';
      $data['page_title'] = 'Journal List';
      $data['page_module'] = 'approver';
      $data['journal_list'] = $this->Approver_Model->journallist($this->session->userdata('user_id'));
      $this->load->view('approver/journallist', $data); 
	}
   public function journalstatus($id,$status){
      $journal_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $journal_data, array('voucher_no' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   
   public function viewjournal($voucher_no){        
		$journalinfo = $this->Approver_Model->viewjournal($voucher_no);    
		$data['journal_info'] = $journalinfo;     
		$this->load->view('approver/viewjournal', $data); 
	}
   public function debitlist(){        
      $data['page'] = 'Finance';
      $data['page_title'] = 'Debit List';
      $data['page_module'] = 'approver';	
      $data['debit_list'] = $this->Approver_Model->debitlist($this->session->userdata('user_id'));
      //print_r($data['debit_list']); die; 
        
      $this->load->view('approver/debitlist', $data); 
	}
   public function debitstatus($id,$status){
      $debit_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $debit_data, array('counter' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   public function viewdebit($voucher_no){        
      $debitinfo = $this->Approver_Model->viewdebit($voucher_no);    
		$data['debit_info'] = $debitinfo;         
      $this->load->view('approver/viewdebit_note', $data); 
	}
   
   public function creditlist(){        
      $data['page'] = 'Finance';
      $data['page_title'] = 'Credit List';
      $data['page_module'] = 'approver';
      $data['credit_list'] = $this->Approver_Model->creditlist($this->session->userdata('user_id'));     		
      $this->load->view('approver/creditlist', $data); 
	}
   
   public function creditstatus($id,$status){
      $credit_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $credit_data, array('counter' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   public function viewcredit($voucher_no){ 
      $creditinfo = $this->Approver_Model->viewcredit($voucher_no);    
		$data['credit_info'] = $creditinfo; 
      
      //echo "<pre>"; print_r($data['credit_info']); die;
      
      $this->load->view('approver/viewcredit_note', $data); 
	}
   /*Finance ends*/
   
   /* Purchase starts*/   
   public function purchaselist(){        
      $data['page'] = 'Inventory';
      $data['page_title'] = 'Purchase List';
      $data['page_module'] = 'approver';
      $data['purchase_list'] = $this->Approver_Model->purchaselist();
      //print_r($data['purchase_list']); die;
      $this->load->view('approver/purchaselist', $data); 
	}
   public function purchasestatus($id,$status){
      $purchase_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $purchase_data, array('counter' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
   
    //Sales invoice receipt view
	public function viewpurchase($voucher_no,$inv_no,$supplier){
		$data['fpo_info'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$data['account_info'] = $this->Finance_Model->bankAccountByUserID($this->session->userdata('user_id'));
		$total_info = $this->Finance_Model->getInventoryTransactionById(1, $voucher_no, $inv_no, $supplier);
		$salesTransaction = $this->Approver_Model->getPurchaseTransactionView($voucher_no, $inv_no, $supplier);
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
		$data['total_info'] = $total_info;
		$data['totalSalesValues_words'] = $this->get_numberTowords($total_info->overall_total);
		$this->load->view('approver/viewpurchase', $data);
	}
   /* Purchase ends*/
   
   /* Sales starts*/   
   public function saleslist(){        
      $data['page'] = 'Sales';
      $data['page_title'] = 'Sales List';
      $data['page_module'] = 'approver';
      $data['sales_list'] = $this->Approver_Model->saleslist();
      //print_r($data['sales_list']); die;
      $this->load->view('approver/saleslist', $data); 
	}
   
   public function salesstatus($id,$status){
      $sales_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_gl_trans', $sales_data, array('counter' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }   
   public function viewsales($voucher_no,$inv_no,$customer){
		$data['fpo_info'] = $this->Fpo_Model->fpoByUserID($this->session->userdata('user_id'));
		$data['account_info'] = $this->Finance_Model->bankAccountByUserID($this->session->userdata('user_id'));
		$total_info = $this->Finance_Model->getInventoryTransactionById(2, $voucher_no, $inv_no, $customer);
		$salesTransaction = $this->Approver_Model->getSalesTransactionView($voucher_no, $inv_no, $customer);			  
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
		$data['total_info'] = $total_info;
		$data['totalValues_words']= $this->get_numberTowords($total_info->overall_total);       
		$this->load->view('approver/viewsales', $data);
	}
	/* Sales ends*/
   
   /* Share starts*/   
  public function shareAllotedList(){
    $data['page'] = 'Share';
    $data['page_title'] = 'Allotment List';
    $data['page_module'] = 'approver';
    $data['share_allotment'] = $this->Approver_Model->shareHoldersList($this->session->userdata('user_id'));
    $this->load->view('approver/shareallotmentlist', $data);
  }
  public function viewshareallotment($allotment_id){     
     $data['share_info'] = $this->Approver_Model->shareHoldersView($allotment_id);
    $this->load->view('approver/viewshare_allotment', $data);
  }
  public function approveShareAllotment($source_id){
    $sourceData = array("status" => 1); 
    $this->db->update('trv_share_allotment', $sourceData, array('id' => $source_id)); 
    $response = array("status" => 1, "message" => "Share allotment approved successfully");    
    echo json_encode($response);
  }
  public function rejectShareAllotment($source_id){
    $sourceData = array("status" => 2); 
    $this->db->update('trv_share_allotment', $sourceData, array('id' => $source_id)); 
    $response = array("status" => 1, "message" => "Share allotment rejected successfully");    
    echo json_encode($response);
  }
  public function shareCertificateList(){
    $data['page'] = 'Share';
    $data['page_title'] = 'Allotment Issue List';
    $data['page_module'] = 'approver';
    $data['share_history'] = $this->Approver_Model->shareHistoryList($this->session->userdata('user_id'));
    //print_r($data['share_history']); die;
    $this->load->view('approver/certificatelist', $data);
  }
   public function shareHistoryView($certificate_id){
    $data['sharehistory_info'] = $this->Approver_Model->shareHistoryView($certificate_id);
    $this->load->view('approver/viewshare_certificate', $data);
  }
  
  public function approveShareCertificate($source_id){
    $sourceData = array("status" => 1); 
    $this->db->update('trv_share_history', $sourceData, array('id' => $source_id)); 
    $response = array("status" => 1, "message" => "Share history approved successfully");    
    echo json_encode($response);
  }
  public function rejectShareCertificate($source_id){
    $sourceData = array("status" => 2); 
    $this->db->update('trv_share_history', $sourceData, array('id' => $source_id)); 
    $response = array("status" => 1, "message" => "Share history rejected successfully");    
    echo json_encode($response);
  }
  /* Share ends*/ 
  
  /* Supplier list */
   public function supplierlist(){        
      $data['page'] = 'Supplier';
      $data['page_title'] = 'Supplier List';
      $data['page_module'] = 'approver';
      $data['supplier_list'] = $this->Approver_Model->supplierlist($this->session->userdata('user_id'));
      $this->load->view('approver/supplierlist', $data); 
	}   
	/* april 4 view supplier popup*/
	public function viewsupplier($supplier) {
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
		$data['supplier_info'] = $supplier_info;
		//echo json_encode($data['supplier_info']);
		$this->load->view('approver/viewsupplier', $data);		
    }
   
   public function supplierstatus($id,$status){
      $supplier_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_suppliers', $supplier_data, array('supplier_id' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
  /*Supplier ends*/
  
  /* Customer list */
   public function customerlist(){        
      $data['page'] = 'Customer';
      $data['page_title'] = 'Customer List';
      $data['page_module'] = 'approver';
      $data['customer_list'] = $this->Approver_Model->customerlist($this->session->userdata('user_id'));		
      $this->load->view('approver/customerlist', $data); 
	}   
   public function customerstatus($id,$status){
      $customer_data = array(
      "status"   => $status,
      ); 
      $this->db->update('fpo_debtors_master', $customer_data, array('debtor_no' => $id));   
      $response = array("status" => $status);
      echo json_encode($response);
   }
    public function viewcustomer($customer) { 
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
      $this->load->view('approver/viewcustomer', $data); 
		
	}
	/*Customer ends*/   
	
	/*Operation Starts*/ 
	public function directorsAppoinment(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Director Appointment';
		$data['page_module'] = 'approver';		
		
		$this->load->view('approver/operationlist', $data); 
	}
	
	public function noticeToDirectors(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Notice to Director';
		$data['page_module'] = 'approver';		
		
		$data['notice_director'] = $this->Approver_Model->getNoticetoDirectors($this->session->userdata('user_id'));
		$this->load->view('approver/operation/noticetodirector', $data); 
	} 
	public function viewNoticeToDirectors($director_id){
		$data['notice_director'] = $this->Approver_Model->getNoticetoDirectorsByID($director_id);
		$this->load->view('approver/operation/viewnotice', $data); 
	}
	public function approveNoticetoDirector($source_id){
		$sourceData = array("status" => 1); 
		$this->db->update('trv_notice_to_director', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Notice to director approved successfully");    
		echo json_encode($response);
	}
	public function rejectNoticetoDirector($source_id){
		$sourceData = array("status" => 2); 
		$this->db->update('trv_notice_to_director', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Notice to director rejected successfully");    
		echo json_encode($response);
	}
	
	public function trainingToDirector(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Training to Director';
		$data['page_module'] = 'approver';		
		
		$data['training_director'] = $this->Approver_Model->getTrainingToDirectors($this->session->userdata('user_id'));
		$this->load->view('approver/operation/training_directorslist', $data); 
	}
	public function viewTrainingToDirectors($director_id){
		$data['directors'] = $this->Operation_Model->director_list($this->session->userdata('user_id'));
		$data['director'] = $this->Approver_Model->getTrainingtoDirectorsByID($director_id);
		//echo json_encode($data['director']);
		$this->load->view('approver/operation/viewtraining_directors', $data); 
	}
	public function approveTrainingtoDirector($source_id){
		$sourceData = array("status" => 1); 
		$this->db->update('trv_training_director', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Training to director approved successfully");    
		echo json_encode($response);
	}
	public function rejectTrainingtoDirector($source_id){
		$sourceData = array("status" => 2); 
		$this->db->update('trv_training_director', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Training to director rejected successfully");    
		echo json_encode($response);
	}
	
	public function trainingToCEO(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Training to CEO';
		$data['page_module'] = 'approver';		
		
		$data['training_ceo'] = $this->Approver_Model->getTrainingToCEO($this->session->userdata('user_id'));
		$this->load->view('approver/operation/training_ceolist', $data); 
	} 
	public function viewTrainingToCEO($CEO_id){
		$data['ceo'] = $this->Approver_Model->getCeoTrainingByID($CEO_id);
		$this->load->view('approver/operation/viewtraining_ceo', $data); 
	}
	public function approveTrainingtoCEO($source_id){
		$sourceData = array("status" => 1); 
		$this->db->update('trv_training_ceo', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Training to CEO approved successfully");    
		echo json_encode($response);
	}
	public function rejectTrainingtoCEO($source_id){
		$sourceData = array("status" => 2); 
		$this->db->update('trv_training_ceo', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Training to CEO rejected successfully");    
		echo json_encode($response);
	}
	
	public function exposureVisit(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Exposure Visit';
		$data['page_module'] = 'approver';		
		
		$data['exposure'] = $this->Approver_Model->getExposureVisit($this->session->userdata('user_id'));
		$this->load->view('approver/operation/exposurelist', $data); 
	}
	public function viewExposureVisitByID($exposure_id){
		$data['exposure'] = $this->Approver_Model->getexposureVisitByID($exposure_id);
		$this->load->view('approver/operation/viewexposure', $data); 
	}
	public function approveExposureVisit($source_id){
		$sourceData = array("status" => 1); 
		$this->db->update('trv_exposure_visit', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Exposure visit approved successfully");    
		echo json_encode($response);
	}
	public function rejectExposureVisit($source_id){
		$sourceData = array("status" => 2); 
		$this->db->update('trv_exposure_visit', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Exposure visit rejected successfully");    
		echo json_encode($response);
	}
	
	public function awarenessProgram(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Awareness Program';
		$data['page_module'] = 'approver';		
		
		$data['awareness_program'] = $this->Approver_Model->getAwarenessPrograms($this->session->userdata('user_id'));
		$this->load->view('approver/operation/awarenesslist', $data); 
	} 
	public function viewAwarenessProgram($awareness_id){
		$data['awareness'] = $this->Approver_Model->getAwarenessProgramByID($awareness_id);
		$this->load->view('approver/operation/viewawareness', $data); 
	} 
	public function approveAwarenessProgram($source_id){
		$sourceData = array("status" => 1); 
		$this->db->update('trv_awareness_program', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Awareness program approved successfully");    
		echo json_encode($response);
	}
	public function rejectAwarenessProgram($source_id){
		$sourceData = array("status" => 2); 
		$this->db->update('trv_awareness_program', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Awareness program rejected successfully");    
		echo json_encode($response);
	}
	
	public function clusterIdentify(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Cluster Identification';
		$data['page_module'] = 'approver';		
		
		$data['cluster_identify'] = $this->Approver_Model->getClusterIdentify($this->session->userdata('user_id'));
		$this->load->view('approver/operation/clusterlist', $data); 
	} 
	public function viewClusterIdentify($cluster_id){
		$data['cluster'] = $this->Approver_Model->getClusterIdentifyByID($cluster_id);
		$this->load->view('approver/operation/viewcluster', $data); 
	} 
	public function approveClusterIdentify($source_id){
		$sourceData = array("status" => 1); 
		$this->db->update('trv_cluster_identification', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Cluster identification approved succes	sfully");    
		echo json_encode($response);
	}
	public function rejectClusterIdentify($source_id){
		$sourceData = array("status" => 2); 
		$this->db->update('trv_cluster_identification', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Cluster identification rejected successfully");    
		echo json_encode($response);
	}
	public function baselineInfo(){
		$data['page'] = 'Operation';
		$data['page_title'] = 'Baseline Information';
		$data['page_module'] = 'approver';		
		
		$data['baseline_info'] = $this->Approver_Model->getBaselineInfo($this->session->userdata('user_id'));
		$this->load->view('approver/operation/baselinelist', $data); 
	} 
	public function viewbaselineInfo($baselineinfo_id){
		$data['baseline_info'] = $this->Approver_Model->getBaselineInfoByID($baselineinfo_id);
		$this->load->view('approver/operation/viewbaseline', $data); 
	} 
	public function approveBaselineInfo($source_id){
		$sourceData = array("status" => 1); 
		$this->db->update('trv_baseline_info', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Baseline Information approved successfully");    
		echo json_encode($response);
	}
	public function rejectBaselineInfo($source_id){
		$sourceData = array("status" => 2); 
		$this->db->update('trv_baseline_info', $sourceData, array('id' => $source_id)); 
		$response = array("status" => 1, "message" => "Baseline Information rejected successfully");    
		echo json_encode($response);
	}
	/*Operation ends*/
	
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
}
