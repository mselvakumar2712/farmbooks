<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

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
      if (!$this->session->userdata('name') || $this->session->userdata('user_type') != 3 || $this->session->userdata('is_active') == 0 ){  
         redirect('administrator/login/signout');
      }    
      $this->load->model("Supplier_Model");
      $this->load->model("Location_Model");
      $this->load->model("Finance_Model");
      $this->load->model("Login_Model");
      $this->load->model("Masterdata_Model");
      $this->load->model("Fpo_Model");
	  $this->load->model("Farmer_Model");
      header('Access-Control-Allow-Origin: *');
      //header('Content-Type: application/json');
	}
    
      /* purchase start */
    public function purchaseorderlist() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Purchase Order Entry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/purchaseorder/purchaseorderlist', $data); 
	} 

	/* purchase order start*/
	public function addpurchase() {        
        $data['page'] = 'Transaction';
        $data['page_title'] = 'Purchase Order Entry';
        $data['page_module'] = 'inventory';
		  $data['supplier'] = $this->Supplier_Model->supplier_list();
		  $data['product_fpo'] = $this->Supplier_Model->productByFPOId();
		  $data['location'] = $this->Supplier_Model->get_godownlist();
		  $data['unit'] = $this->Supplier_Model->get_uomlist();
        $this->load->view('inventory/purchase/purchaseorder/addpurchaseorder', $data); 
	} 

    public function post_purchaseorder() {
		if( $this->Supplier_Model->add_purchaseorder()){
		 $this->session->set_flashdata('success', 'New purchase order added successfully.');       
		 redirect('fpo/inventory/outstandingpurchase');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/inventory/addpurchaseorder');
		}
	}
	
	public function getproducts(){ 	 
		//$result = $this->Supplier_Model->productByFPOId();
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
		$result = $product;
		echo json_encode($result);	
	}
	
	/* purchase order end*/
	
	/* outstanding purchase order start*/
	public function outstandingpurchase() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Outstanding Purchase Orders Maintenance';
        $data['page_module'] = 'inventory';	
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
        $this->load->view('inventory/purchase/outstanding_purchase/outstanding_purchase', $data); 
	} 
	
	
	public function getoutstandingorder() {
		$outstanding_details=$this->Supplier_Model->outstandingBysearch();
		if($outstanding_details){
		$data['purchase_info'] = $outstanding_details;
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Outstanding Purchase Orders Maintenance';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
	    $this->load->view('inventory/purchase/outstanding_purchase/outstanding_purchase', $data); 
		}else{
		 $this->session->set_flashdata('warning', 'There is no outstanding purchase order.');       
		 redirect('fpo/inventory/outstandingpurchase');
		}
	}
	
	public function grn($orderid) {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Outstanding Purchase Orders Maintenance';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
		$data['purchase_info'] = $this->Supplier_Model->orderByID($orderid);
		$data['purchase_order_info'] = $this->Supplier_Model->orderdetailsByOrderno($orderid);
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['unit'] = $this->Supplier_Model->get_uomlist();
        $this->load->view('inventory/purchase/outstanding_purchase/grn', $data); 
	} 
	
	public function grnpoitems($orderno) {
        $result=$this->Supplier_Model->orderdetailsByOrderno($orderno);
		echo json_encode($result);
    }
	
	public function post_grn() {
		if( $this->Supplier_Model->update_grn()){
		 $this->session->set_flashdata('success', 'New grn updated successfully.');       
		 redirect('fpo/inventory/outstandingpurchase');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/inventory/outstandingpurchase');
		} 
	}
	
	
	public function deletegrn( $po_id ) {
		$this->Supplier_Model->delete_grn( $po_id );
		$this->session->set_flashdata('success', 'Po items Deleted successfully');
        redirect('fpo/inventory/outstandingpurchase',"refresh");
	}
	/* outstanding purchase order end*/
	
	/* direct grn start*/
	public function directgrnlist() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Direct GRN';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/directgrn/directgrnlist', $data); 
	}
    
	
	public function directgrn() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Direct GRN';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['unit'] = $this->Supplier_Model->get_uomlist();
        $this->load->view('inventory/purchase/directgrn/adddirectgrn', $data); 
	} 
	
	public function post_directgrn() {
		if( $this->Supplier_Model->add_directgrn()){
		 $this->session->set_flashdata('success', 'New direct grn entry added successfully.');       
		 redirect('fpo/inventory/directgrn');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/inventory/directgrn');
		} 
	}

	
    /* direct grn end*/
	
	/* direct invoice start*/
	public function directinvoicelist() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Direct Invoice';
        $data['page_module'] = 'inventory';
        $this->load->view('inventory/purchase/directinvoice/directinvoicelist', $data); 
	}
    
	public function purchaseentry(){
      $fpo_id = $this->session->userdata('user_id');
      $appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['formation_date'] = $appointment_date->date_formation;       
      $logger_type = $this->session->userdata('logger_type');
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Purchase Entry';
      $data['page_module'] = 'inventory';
      $data['supplier'] = $this->Supplier_Model->supplier_list();
      $data['ledger_type'] = $this->Finance_Model->gl_code();   
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
			$get_supplier_no=$this->Supplier_Model->get_purchaseentry_lastid();
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
		 redirect('fpo/inventory/purchaseentry');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/inventory/purchaseentry');
		} 
	}
	/* direct invoice end*/
	
	/* supplier payments start*/
	public function supplierpaymentslist() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Supplier Payments';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_payments/supplierpaymentslist', $data); 
	}
    
	public function supplierpayments() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Supplier Payments';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_payments/addsupplierpayments', $data); 
	}
	/* supplier payments end*/
	
	/* supplier allocation start*/
	public function supplierallocation() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Allocate Supplier Payments';
        $data['page_module'] = 'inventory';	
        $data['supplier']    = $this->Supplier_Model->supplier_list();		
        $this->load->view('inventory/purchase/allocate_supplier_payments/allocate_supplier_payments', $data); 
	}
	public function supplierallDetail() {
        $result=$this->Supplier_Model->get_all_supplier_detail();
		echo json_encode($result);
    }
	public function supplierDetail($supplier_id) {
        $result=$this->Supplier_Model->get_supplierDetail($supplier_id);
		echo json_encode($result);
    }
	public function allocation() {
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Allocate Supplier Payments';
        $data['page_module'] = 'inventory';	
        $data['supplier']    = $this->Supplier_Model->supplier_list();		
        $this->load->view('inventory/purchase/allocate_supplier_payments/allocation_of_payment', $data);
	}
    /* supplier allocation end*/
	
	/* supplier invoice start*/
	public function supplierinvoicelist() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Supplier Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_invoice/supplierinvoicelist', $data); 
	}
	public function addsupplierinvoice() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Supplier Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_invoice/addsupplierinvoice', $data); 
	}
	/* supplier invoice end*/
	
	/* supplier credit start*/
	public function suppliercreditlist() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Supplier Credit Note';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_credit/suppliercreditlist', $data); 
	}
	
	public function addsuppliercredit() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Supplier Credit Note';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_credit/addsuppliercredit', $data); 
	}
	/* supplier credit end*/
	
	/* search purchase order start*/	
	public function searchpurchaseorder() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Search Purchase Order';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
        $this->load->view('inventory/purchase/inquires_reports/search_purchase', $data); 
	}
	
	public function getpurchaseorder() {
		$purchase_details=$this->Supplier_Model->purchaseBysearch();
		if($purchase_details){
		$data['purchase_info'] = $purchase_details;
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Search Purchase Order';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
		//print_r($data['purchase_info'] );die;
	    $this->load->view('inventory/purchase/inquires_reports/search_purchase', $data); 
		}else{
		 $this->session->set_flashdata('warning', 'There is no purchase order.');       
		 redirect('fpo/inventory/searchpurchaseorder');
		}
	}
    /* search purchase order end*/	
	
	/* search transaction inquiry start*/	
	public function suppliertransactioninquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Supplier Transaction Inquiry';
        $data['page_module'] = 'inventory';	
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
        $this->load->view('inventory/purchase/inquires_reports/supplier_transaction_inquiry', $data); 
	}
	
	public function getinquirytranscation() {
		$purchase_details=$this->Supplier_Model->transactionBysearch();
		if($purchase_details){
		$data['purchase_info'] = $purchase_details;
		$data['page']          = 'Inquiries and Reports';
		$data['page_title']    = 'Supplier Transaction Inquiry';
        $data['page_module']   = 'inventory';
		$data['supplier']      = $this->Supplier_Model->supplier_list();	
		$data['location']      = $this->Supplier_Model->get_godownlist();
		$data['product_fpo']   = $this->Supplier_Model->productByFPOId();
	    $this->load->view('inventory/purchase/inquires_reports/supplier_transaction_inquiry', $data); 
		}else{
		 $this->session->set_flashdata('warning', 'There is no transaction.');       
		 redirect('fpo/inventory/suppliertransactioninquiry');
		}
	}
	/* search transaction inquiry end*/
	
	/* search allocation inquiry start*/	
	public function supplierallocationinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Supplier Allocation Inquiry';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['product_fpo'] = $this->Supplier_Model->productByFPOId();
        $this->load->view('inventory/purchase/inquires_reports/supplier_allocation_inquiry', $data); 
	}
	
	public function getinquiryallocation() {
		$purchase_details=$this->Supplier_Model->allocationBysearch();
		if($purchase_details){
		$data['purchase_info']  = $purchase_details;
		$data['page']           = 'Inquiries and Reports';
		$data['page_title']     = 'Supplier Allocation Inquiry';
        $data['page_module']    = 'inventory';
		$data['supplier']       = $this->Supplier_Model->supplier_list();	
		$data['location']       = $this->Supplier_Model->get_godownlist();
		$data['product_fpo']    = $this->Supplier_Model->productByFPOId();
	    $this->load->view('inventory/purchase/inquires_reports/supplier_allocation_inquiry', $data); 
		}else{
		 $this->session->set_flashdata('warning', 'There is no allocation.');       
		 redirect('fpo/inventory/supplierallocationinquiry');
		}
	}
	/* search allocation inquiry end*/	
	
	/* suppliers start*/	
   public function getbanklist($state_id) {  
 		$result = $this->Supplier_Model->getbanklist($state_id);
		echo json_encode($result);	
	}
   public function getBankAddressByBankName()  {
        $bankaddress_list = $this->Supplier_Model->getBankAddressByBankName();
        $response = array("status" => 1, "bankaddress_list" => $bankaddress_list);
        echo json_encode($response);
    }
   public function getplacesupply()  {
        $supplyplace = $this->Supplier_Model->getplacesupply();
        $response = array("status" => 1, "supplyplace" => $supplyplace);
        echo json_encode($response);
    }    
	public function suppliers() {        
      $data['page']          = 'Maintenance';
		$data['page_title']    = 'Suppliers';
      $data['page_module']   = 'inventory';
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
   // echo json_encode($this->input->post()); die;
		$a=$this->Supplier_Model->add_supplier();
		if($a == 2){
		 $this->session->set_flashdata('success', 'New Supplier Added Successfully.');       
		 redirect('fpo/inventory/suppliers');
		}elseif($a == 1){
		 $this->session->set_flashdata('success', 'New Supplier Updated Successfully.');       
		 redirect('fpo/inventory/suppliers');
		}
		else
		{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/inventory/suppliers');
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
        $data['page_module']   = 'inventory';
		$data['supplier']      = $this->Supplier_Model->supplier_list();
		$data['payment_terms'] = $this->Supplier_Model->payment_terms_list();
		$data['location']      = $this->Supplier_Model->get_godownlist();
		$data['product_fpo']   = $this->Supplier_Model->productByFPOId();
		$data['state']  	   = $this->Supplier_Model->state_list();
		$data['bank_name']	   = $this->Finance_Model->bank_name_list();
		$data['bank_info']     = $this->Finance_Model->bankAccount_List();
		$data['gl_group_info'] = $this->Supplier_Model->gl_ChartMasterList();
		$data['glgroup_info']   = $this->Finance_Model->glAccountgroup_List();
		//$data['salesperson']  = $this->Supplier_Model->salespersonDropdownList();
       // $data['sale_area']    = $this->Supplier_Model->getAllSaleArea();        
        //$data['tax_group']    = $this->Supplier_Model->getAllTaxGroup();
        //$data['sale_group']   = $this->Supplier_Model->getAllSaleGroup();
		$supplier_info=$this->Supplier_Model->supplierByID($supplier);
     //echo "<pre>"; print_r($supplier_info);
		
      if(!empty($supplier_info)){ 
        $data['taluk_info'] = $this->Login_Model->getTalukByDistCode($supplier_info[0]->mailing_district);
        $data['block_info'] = $this->Login_Model->getBlockByDistCode($supplier_info[0]->mailing_district);
        //die();
        $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($supplier_info[0]->mailing_block);
        $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($supplier_info[0]->mailing_panchayat);
		$data['taluk_info1'] = $this->Login_Model->getTalukByDistCode($supplier_info[0]->physical_district);
        $data['block_info1'] = $this->Login_Model->getBlockByDistCode($supplier_info[0]->physical_district);
        $data['panchayat_info1'] = $this->Login_Model->getPanchayatByBlockcode($supplier_info[0]->physical_block);
        $data['village_info1'] = $this->Login_Model->getVillageByPanchayatcode($supplier_info[0]->physical_panchayat);
		}
		$data['supplier_info']= $supplier_info;
		//print_r($data['supplier_info']);
        $this->load->view('inventory/purchase/suppliers/editsupplier', $data);         
    }
	public function postupdatesuppliers($supplier_id) {
        if($this->Supplier_Model->updatesupplier($supplier_id)){
    		 $this->session->set_flashdata('success', 'Supplier updated successfully.');       
		      redirect('fpo/inventory/suppliers');
		}else{
		      $this->session->set_flashdata('warning', 'Data not inserted.');       
		      redirect('fpo/inventory/suppliers');
		}    
	}
	public function delete_supplier($supplier_id) {
		$this->Supplier_Model->delete_supplier($supplier_id);
		$this->session->set_flashdata('success', 'State Deleted successfully');
      redirect('fpo/inventory/suppliers',"refresh");
	}
	
	/* suppliers end*/	
	   
	/*inventory location transfer*/
	public function inventorylocations() {        
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Inventory Location Transfer';
      $data['page_module'] = 'inventory';	
      $data['location'] = $this->Supplier_Model->get_godownlist();
      $data['unit'] = $this->Supplier_Model->get_uomlist();
      $data['trans_type'] = $this->Supplier_Model->get_transfertype();
      
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
      $this->load->view('inventory/purchase/inventorylocation/inventory_location', $data); 
	} 
	/*inventory adjustments*/
	public function inventoryadjustment() {        
      $data['page'] = 'Transaction';
      $data['page_title'] = 'Inventory Adjustment';
      $data['page_module'] = 'inventory';
      $data['location'] = $this->Supplier_Model->get_godownlist();
      $data['unit'] = $this->Supplier_Model->get_uomlist();
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
      $this->load->view('inventory/purchase/inventoryadjustments/inventory_adjustment', $data); 
	}

	public function post_locationtransfer() {
		if( $this->Supplier_Model->add_location_transfer()){
         $this->session->set_flashdata('success', 'New Location Transfer entry added successfully.');       
         redirect('fpo/inventory/inventorylocations');
		}else{
         $this->session->set_flashdata('warning', 'Data not inserted.');       
         redirect('fpo/inventory/inventorylocations');
		}
	}

	public function post_locationadjusment() {
		if( $this->Supplier_Model->add_location_adjustment()){
		 $this->session->set_flashdata('success', 'New Location adjusment entry added successfully.');       
		 redirect('fpo/inventory/inventoryadjustment');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('fpo/inventory/inventoryadjustment');
		} 
	}
	public function getquantityunit() { 	 
		$result = $this->Supplier_Model->get_uomlist();
		echo json_encode($result);	
	}
	
	public function checkavailablequantity() { 	 
		$result = $this->Supplier_Model->checkavailableqty();
		echo json_encode($result);	
	}
	
	public function getHsncode() {
      $item_data = $this->Supplier_Model->checkHsncode();
      if($item_data) {
         $response = array("status" => 1, "items" => $item_data, "message" => "Given item id is valid");
      } else {
         $response = array("status" => 0, "message" => "It has no hsn code");			
      }
      echo json_encode($response);
	}
	
	public function getSupplierstate() {
		$supplier = $this->input->post('supplier');
		$godown_id = $this->input->post('deliver');

        $supp_data = $this->Supplier_Model->supplierByID($supplier);
		$deliver_data = $this->Masterdata_Model->godownByID($godown_id);
        if(!empty($supp_data and $deliver_data)) {
            $response = array("status" => 1, "supplier_state" => $supp_data,"deliver_state" => $deliver_data, "message" => "Given supplier id and deliver is valid");
        } else {
            $response = array("status" => 0, "message" => "It has no state code");			
        }
		echo json_encode($response);
   }
	
	public function calculatesgst() {
      $sgst_data = array_sum($this->input->post('sgst_val'));
		$cgst_data = array_sum($this->input->post('sgst_val'));
		$igst_data = array_sum($this->input->post('igst_val'));
      if($sgst_data and $cgst_data) {
         $response = array("status" => 1, "sgst" => $sgst_data,"cgst" => $cgst_data,"igst" => "","message" => "Given item id is valid");
      }else if($igst_data) {
         $response = array("status" => 1, "igst" => $igst_data, "message" => "Given item id is valid");
      } else {
         $response = array("status" => 0, "message" => "It has no sgst val");			
      }
      echo json_encode($response);
	}
	
	public function checkinvoiceno($invoicenumber) {
        if($this->Supplier_Model->invoiceNumberExists( $invoicenumber ) > 0) {
            $response = array("status" => 0, "message" => "Supplier invoice number is already processed");
        } else {
            $response = array("status" => 1, "message" => "Supplier invoice number is available");
        }
        echo json_encode($response);
	}
   
	public function checkSupplierInvoiceNo() {
        if($this->Supplier_Model->supplierInvoiceNumberExists() > 0) {
            $response = array("status" => 0, "message" => "Supplier invoice number is already processed");
        } else {
            $response = array("status" => 1, "message" => "Supplier invoice number is available");
        }
        echo json_encode($response);
	}
    
	
	public function stockmovements() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Stock Movements';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$product = $this->Supplier_Model->stockmovementBysearch();
		$data['from_date'] = date('Y-m-01');
		$data['to_date'] = date('Y-m-t');
		$data['supp'] ='';
		$data['loc'] ='';		
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
		$data['month_info'] = $product;
        $this->load->view('inventory/purchase/inquires_reports/stock_movement', $data); 
	}
	
	public function stockreports() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Stock Reports';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$product = $this->Supplier_Model->stockreportBysearch();
		$data['from_date'] = date('Y-m-01');
		$data['to_date'] = date('Y-m-t');
		$data['supp'] ='';
		$data['loc'] ='';
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
		$data['month_info'] = $product;
        $this->load->view('inventory/purchase/inquires_reports/stock_report', $data); 
	}
	
	public function getstockmovement() {
		$from_date=$this->input->post('from');
		$to_date=$this->input->post('to');
		$supplier=$this->input->post('supplier');
		$location=$this->input->post('location');
		$stockmovement=$this->Supplier_Model->stockmovementBysearch();
		if($stockmovement){
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Stock Movement';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['supp'] =$supplier;
		$data['loc'] =$location;
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		
		for($i=0;$i<count($stockmovement);$i++){
			if($stockmovement[$i]->stock_group_id == 3){	
				if($stockmovement[$i]->category_id == 13){
					$stockmovement[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($stockmovement[$i]->sub_category_id, $stockmovement[$i]->product_id)->name;
				} else {
					$stockmovement[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($stockmovement[$i]->category_id, $stockmovement[$i]->sub_category_id, $stockmovement[$i]->product_id)->name;
				}
			} else if($stockmovement[$i]->stock_group_id == 2){
				$stockmovement[$i]->product_name = $this->Masterdata_Model->cropNameById($stockmovement[$i]->category_id, $stockmovement[$i]->sub_category_id, $stockmovement[$i]->product_id)->name;
			} else {				
				if($stockmovement[$i]->category_id == 3 || $stockmovement[$i]->category_id == 4 || $stockmovement[$i]->category_id == 5){
					$stockmovement[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($stockmovement[$i]->category_id, $stockmovement[$i]->sub_category_id, $stockmovement[$i]->product_id)->name;
				} else {
					$stockmovement[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($stockmovement[$i]->category_id, $stockmovement[$i]->sub_category_id, $stockmovement[$i]->product_id)->name;
				}
			}
		}
		$data['month_info'] = $stockmovement;
	    $this->load->view('inventory/purchase/inquires_reports/stock_movement', $data);
		}else{
		$data['month_info'] = '';
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Stock Movement';
        $data['page_module'] = 'inventory';		
		if(!empty($location)){
			$data['loc'] =$location;
		}else{
			$data['location'] = $this->Supplier_Model->get_godownlist();	
		}
		if(!empty($supplier)){
			$data['supp'] =$supplier;
		}else{
			$data['supplier'] = $this->Supplier_Model->supplier_list();	
		}
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		$this->session->set_flashdata('warning', 'There is no stock movement.');    
	    $this->load->view('inventory/purchase/inquires_reports/stock_movement', $data);
		} 
	}
	
	public function getstockreport() {
		$from_date=$this->input->post('from');
		$to_date=$this->input->post('to');
		$supplier=$this->input->post('supplier');
		$location=$this->input->post('location');
		$stockreport=$this->Supplier_Model->stockreportBysearch();
		if($stockreport){
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Stock Movement';
        $data['page_module'] = 'inventory';
		$data['supplier'] = $this->Supplier_Model->supplier_list();	
		$data['location'] = $this->Supplier_Model->get_godownlist();
		$data['supp'] =$supplier;
		$data['loc'] =$location;
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		
		for($i=0;$i<count($stockreport);$i++){
			if($stockreport[$i]->stock_group_id == 3){	
				if($stockreport[$i]->category_id == 13){
					$stockreport[$i]->product_name = $this->Masterdata_Model->getFarmImplementsModelById($stockreport[$i]->sub_category_id, $stockreport[$i]->product_id)->name;
				} else {
					$stockreport[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($stockreport[$i]->category_id, $stockreport[$i]->sub_category_id, $stockreport[$i]->product_id)->name;
				}
			} else if($stockreport[$i]->stock_group_id == 2){
				$stockreport[$i]->product_name = $this->Masterdata_Model->cropNameById($stockreport[$i]->category_id, $stockreport[$i]->sub_category_id, $stockreport[$i]->product_id)->name;
			} else {				
				if($stockreport[$i]->category_id == 3 || $stockreport[$i]->category_id == 4 || $stockreport[$i]->category_id == 5){
					$stockreport[$i]->product_name = $this->Masterdata_Model->brandListBySuppliersById($stockreport[$i]->category_id, $stockreport[$i]->sub_category_id, $stockreport[$i]->product_id)->name;
				} else {
					$stockreport[$i]->product_name = $this->Masterdata_Model->getProductByCategoryAndSubcategory($stockreport[$i]->category_id, $stockreport[$i]->sub_category_id, $stockreport[$i]->product_id)->name;
				}
			}
		}
		$data['month_info'] = $stockreport;
	    $this->load->view('inventory/purchase/inquires_reports/stock_report', $data);
		}else{			
		$data['month_info'] = '';
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Stock Movement';
        $data['page_module'] = 'inventory';		
		if(!empty($location)){
			$data['loc'] =$location;
		}else{
			$data['location'] = $this->Supplier_Model->get_godownlist();	
		}
		if(!empty($supplier)){
			$data['supp'] =$supplier;
		}else{
			$data['supplier'] = $this->Supplier_Model->supplier_list();	
		}
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		$this->session->set_flashdata('warning', 'There is no stock report.');        
		$this->load->view('inventory/purchase/inquires_reports/stock_report', $data); 
		} 
	}
        	

			
	/* 18/03/2019 => Supplier by mobile number */
	public function getSupplierByMobileNumber($mobilenumber){
		$verifyMobilenumber = $this->Login_Model->verifyRegisteredMobileNumber($mobilenumber);
		//print_r($verifyMobilenumber);
		if(isset($verifyMobilenumber->user_type) && isset($verifyMobilenumber->user_id)){
			if($verifyMobilenumber->user_type == 3){
				$supplier_data = $this->Fpo_Model->fpoByUserID($verifyMobilenumber->user_id);
				$supplier_data = $supplier_data[0];
			} else if($verifyMobilenumber->user_type == 6){
				$supplier_data = $this->Farmer_Model->getFarmerByUserId($verifyMobilenumber->user_id);
			}
			$response = array("status" => 1, "supplier_data" => $supplier_data, 'user_type' => $verifyMobilenumber->user_type);	
		} else {
            $response = array("status" => 0, "message" => "Mobile number is not registered!!!");
        }
		echo json_encode($response);
	}
   
   //mrp values dropdwon function//
   public function getmrp($product_id){
      $result = $this->Supplier_Model->get_mrplist($product_id);
	   echo json_encode($result);
   }
   
   public function getsellingPrice($price_id){
      $result = $this->Supplier_Model->get_SellingPricelist($price_id);      
      $response = array("status" => 1, "result" => $result);
	   echo json_encode($result);
      
   }
   
   
}


