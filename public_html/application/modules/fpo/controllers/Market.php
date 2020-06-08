<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {

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
      $this->load->model("Customer_Model");
      $this->load->model("Login_Model");
      $this->load->model("Location_Model");
      $this->load->model("Masterdata_Model");
      $this->load->model("Fpo_Model");
      $this->load->model("Finance_Model");
      $this->load->model("User_Model");
      $this->load->model('Supplier_Model');
	  $this->load->model("Farmer_Model");
      header('Access-Control-Allow-Origin: *');
	}        
	/* sales start */	
	
	/* sales quotation entry start*/	
	public function salesquotationentry() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Sales Quotation Entry';
        $data['page_module'] = 'market';
        $data['customer'] = $this->Customer_Model->customer_list();
		$data['salestype'] = $this->Customer_Model->saleslist();
        $data['paymentterms'] = $this->Customer_Model->paymentterms();
        $data['product'] = $this->Customer_Model->product();
		$data['unit'] = $this->Customer_Model->get_uomlist();        
        $this->load->view('market/sales/transaction/sales_quotation_entry', $data); 
	}
	public function branchdetail($debtor_no) {
        $branch_list = $this->Customer_Model->branchdetail($debtor_no);
        $response = array("status" => 1, "branch_list" => $branch_list);
        echo json_encode($response);
	}
   
  public function locationdetail() { 
        $location_list = $this->Customer_Model->locationdetail();
        $fpo_location = $this->Customer_Model->fpolocationdetail();
        $response = array("status" => 1, "fpo_location" => $fpo_location, "location_list" => $location_list);
        echo json_encode($response);
  
  }
   
	public function postsales_quotation() {
        //echo json_encode($this->input->post());
		 if( $this->Customer_Model->add_salesquotation()){
			 $this->session->set_flashdata('success', 'Sales Quotation added successfully.');       
			 redirect('fpo/market/salesquotationentry');
			}else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('fpo/market/salesquotationentry');
		} 
	}
	public function getproducts() { 	 
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
	/* sales quotation entry end*/
	
	/* sales order entry start*/
	public function salesorderentry() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Sales Order Entry';
        $data['page_module'] = 'market';	
        $data['customer'] = $this->Customer_Model->customer_list();
		$data['salestype'] = $this->Customer_Model->saleslist();
        $data['paymentterms'] = $this->Customer_Model->paymentterms();
		$data['unit'] = $this->Customer_Model->get_uomlist();
        $data['product'] = $this->Customer_Model->product(); 		  
        $this->load->view('market/sales/transaction/sales_order_entry', $data); 
	}
	public function postsales_order(){        
        //echo json_encode($this->input->post());
        if( $this->Customer_Model->add_salesorder()){
			 $this->session->set_flashdata('success', 'Sales Order added successfully.');       
			 redirect('fpo/market/salesorderentry');
		} else {
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('fpo/market/salesorderentry');
		} 
	}

	/* sales order entry end*/
	
	/* direct  sales delivery start*/
	public function directsalesdelivery() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Direct Sales Delivery';
        $data['page_module'] = 'market';	
        $data['customer'] = $this->Customer_Model->customer_list();
		$data['salestype'] = $this->Customer_Model->saleslist();
        $data['paymentterms'] = $this->Customer_Model->paymentterms();	
        $data['product'] = $this->Customer_Model->product();
		$data['unit'] = $this->Customer_Model->get_uomlist();
        $this->load->view('market/sales/transaction/direct_sales_delivery', $data); 
	}
    
	public function postdirect_delivery() {
		 if( $this->Customer_Model->adddirect_delivery()){
			 $this->session->set_flashdata('success', 'Direct Sales Delivery added successfully');       
			 redirect('fpo/market/directsalesdelivery');
         }else{
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('fpo/market/directsalesdelivery');
		} 
	}
	/* direct  sales  delivery end*/
	
	/* direct  sales invoice start*/
	public function directsalesinvoice() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Direct Sales Invoice';
        $data['page_module'] = 'market';
		$data['unit'] = $this->Customer_Model->get_uomlist();
        $data['product'] = $this->Customer_Model->product(); 		  
        $this->load->view('market/sales/transaction/direct_sales_invoice', $data); 
	}
	/* direct  sales invoice end*/
	
	/* delivery  sales order start*/
	public function deliverysalesorder() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Delivery Against Sales Order';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/delivery_sales_order', $data); 
	}
	/* delivery  sales order start*/
	
	/* invoice sales delivery start*/
	public function invoicesalesdelivery() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Invoice Against Sales Delivery';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/invoice_sales_delivery', $data); 
	}
	/* invoice sales delivery end*/
	
	/* template delivery start*/
	public function templatedelivery() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Template Delivery';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/template_delivery', $data); 
	}
	/* template delivery end*/
	
	/* template invoice start*/
	public function templateinvoice() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Template Invoice';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/template_invoice', $data); 
	}
	/* template invoice end*/
	
	/* print recurrent invoice start*/
	public function printrecurrentinvoice() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Recurrent Invoice';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/recurrent_invoice', $data); 
	}        
	/* print recurrent invoice end*/
	
	/* customer paymentsstart*/
	public function customerpayments() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Customer Payments';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/customer_payments', $data); 
	}
	/* customer payments end*/
	
	/*customer credit notes start*/
	public function customercreditnotes() {        
        $data['page'] = 'Transaction';
		  $data['page_title'] = 'Customer Credit Notes';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/customer_credit_notes', $data); 
	}
	/*customer credit notes end*/
	
	/*customer allocation start*/
	public function customerallocation() {        
        $data['page'] = 'Transaction';
		$data['page_title'] = 'Customer Allocation';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/transaction/allocate_customer', $data); 
	}
	/*customer allocation end*/
	
	/*sales quotation inquiry start*/
	public function salesquotationinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		  $data['page_title'] = 'Sales Quotation Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/inquiries_reports/sales_quotation_inquiry', $data); 
	}
	/*sales quotation inquiry end*/
	
	/*sales order inquiry start*/
	public function salesorderinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Sales Order Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/inquiries_reports/sales_order_inquiry', $data); 
	}
	/*sales order inquiry end*/
	
	/*customer transaction inquiry start*/
	public function customertransactioninquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Customer Transaction Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/inquiries_reports/customer_transaction_inquiry', $data); 
	}
	/*customer transaction inquiry end*/
	
	/*customer Allocation inquiry start*/
	public function customerallocationinquiry() {        
        $data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Customer Allocation Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/inquiries_reports/customer_allocation_inquiry', $data); 
	}
	/*customer Allocation inquiry end*/
	
	/*sales groups start*/
	public function salesgroups() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Sales Groups';
        $data['page_module'] = 'market';
        $data['sale_group'] = $this->Customer_Model->getAllSaleGroup();
        $this->load->view('market/sales/maintenance/sales_groups', $data); 
	}
    
    public function postSaleGroup() {
        if($this->Customer_Model->postSaleGroup()){
            $this->session->set_flashdata('success', 'New Salegroup added successfully.');       
            redirect('fpo/Market/salesgroups');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');       
            redirect('fpo/Market/salesgroups');
		} 
	}
	/*sales groups end*/
	
	/*sales types start*/
	public function salestypes() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Sales Types';
        $data['page_module'] = 'market';	
        $data['sale_types'] = $this->Customer_Model->getAllSaleTypes();
        $this->load->view('market/sales/maintenance/sales_types', $data); 
	}
    
    public function postSaleType() {
        if($this->Customer_Model->postSaleType()){
            $this->session->set_flashdata('success', 'New Saletype added successfully.');       
            redirect('fpo/Market/salestypes');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');       
            redirect('fpo/Market/salestypes');
		} 
	}
	/*sales types end*/
	
	/*sales areas start*/
	public function salesareas() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Sales Areas';
        $data['page_module'] = 'market';	
        
        $data['sale_area'] = $this->Customer_Model->getAllSaleArea();        
        $this->load->view('market/sales/maintenance/sales_areas', $data); 
	}
    
	public function postSalesArea() {
        if($this->Customer_Model->postSalesArea()){
            $this->session->set_flashdata('success', 'New Sales srea added successfully.');       
            redirect('fpo/Market/salesareas');
		} else {
            $this->session->set_flashdata('warning', 'Data not inserted.');       
    		redirect('fpo/Market/salesareas');
		} 
	}
	/*sales areas end*/
	
	/*sales persons start*/
	public function salespersons() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Sales Persons';
        $data['page_module'] = 'market';		
        $this->load->view('market/sales/maintenance/sales_persons', $data); 
	}
    
    public function postsalesperson() {
         if($this->Customer_Model->addsalesperson()){
		  $this->session->set_flashdata('success', 'New Sales Persons added successfully.');       
		  redirect('fpo/Market/salespersons');
         }else{
		  $this->session->set_flashdata('warning', 'Data not inserted.');       
		  redirect('fpo/Market/salespersons');
         } 
    }
    
	
	public function salespersonlist() {
        $salesperson_list = $this->Customer_Model->salespersonlist();
        $response = array("status" => 1, "salesperson_list" => $salesperson_list);
        echo json_encode($response);
	}
	
    public function salespersoninactivelist() {
        $salesperson_list = $this->Customer_Model->salespersoninactivelist();
        $response = array("status" => 1, "salesperson_list" => $salesperson_list);
        echo json_encode($response);
	}
	/*sales persons end*/
	
	/*recurrent invoice start*/
	public function recurrentinvoice() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Recurrent Sales Invoice';
        $data['page_module'] = 'market';	        
        $data['recurrent_invoice'] = $this->Customer_Model->getAllRecurrentInvoices();
        $data['customer'] = $this->Customer_Model->customer_list();
        $this->load->view('market/sales/maintenance/recurrent_invoice', $data); 
	}
    
    public function postRecurrentInvoice() {
        if($this->Customer_Model->postRecurrentInvoice()){
            $this->session->set_flashdata('success', 'New Recurrent invoices added successfully.');       
            redirect('fpo/Market/recurrentinvoice');
        } else {
            $this->session->set_flashdata('warning', 'Data not inserted.');       
            redirect('fpo/Market/recurrentinvoice');
		} 
	}
	/*recurrent invoice end*/
	
	/*credit status start*/
	public function creditstatus() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Credit Status';
        $data['page_module'] = 'market';	
        $data['credit_status'] = $this->Customer_Model->getAllCreditStatus();
        $this->load->view('market/sales/maintenance/credit_status', $data); 
	}
    
    public function postCreditStatus() {
        if($this->Customer_Model->postCreditStatus()){
            $this->session->set_flashdata('success', 'New Credit status added successfully.');       
            redirect('fpo/Market/creditstatus');
		} else {
            $this->session->set_flashdata('warning', 'Data not inserted.');       
    		redirect('fpo/Market/creditstatus');
		} 
	}
	/*credit status end*/
	
    
	/*customers start*/
   public function getBankAddressByBankName()  {
        $bankaddress_list = $this->Customer_Model->getBankAddressByBankName();
        $response = array("status" => 1, "bankaddress_list" => $bankaddress_list);
        echo json_encode($response);
    }
    public function getbanklist($state_id) { 
 
 		$result = $this->Customer_Model->getbanklist($state_id);
		echo json_encode($result);	
	}
	public function customers() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Customers';
        $data['page_module'] = 'market';
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
                redirect('fpo/Market/customers');
            }else{
                $this->session->set_flashdata('warning', 'Data not inserted.');       
                redirect('fpo/Market/customers');
            } 
        }        
	}
    public function postupdatecustomer( $customer_id ) {
        if($this->Customer_Model->updatecustomer($customer_id)){
            $this->session->set_flashdata('success', 'Customer Updated successfully.');       
            redirect('fpo/Market/customers');
        }else{
            $this->session->set_flashdata('warning', 'Customer not Updated.');       
			redirect('fpo/Market/customeredit/'.$customer_id);
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
      $data['page_module'] = 'market';
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
		
		/* $data['page'] = 'Maintanance';
		$data['page_title'] = 'Customer Edit';
        $data['page_module'] = 'market';
		$data['customer'] = $this->Customer_Model->customer_list();
        $data['salesperson'] = $this->Customer_Model->salespersonDropdownList();	
        $data['sale_types'] = $this->Customer_Model->getAllSaleTypes();
        $data['credit_status'] = $this->Customer_Model->getAllCreditStatus();
        $data['sale_area'] = $this->Customer_Model->getAllSaleArea();        
        $data['payment_terms'] = $this->Customer_Model->getAllPaymentTerms(); 
        $data['tax_group'] = $this->Customer_Model->getAllTaxGroup(); 
        $customerinfo=$this->Customer_Model->customerByID($customer);
		//echo "ji";
		//print_r($customerinfo);
		//echo $customerinfo[0]->pincode;
		//die;
		if(!empty($customerinfo)){ 
         $data['taluk_info'] = $this->Login_Model->getTalukByPinCode($customerinfo[0]->pincode);
         $data['block_info'] = $this->Login_Model->getBlockByDistCode($customerinfo[0]->district);
         $data['panchayat_info'] = $this->Login_Model->getPanchayatByBlockcode($customerinfo[0]->block);
         $data['village_info'] = $this->Login_Model->getVillageByPanchayatcode($customerinfo[0]->panchayat);
		}
		$data['customer_info']= $customerinfo;
		print_r($data['customer_info']);
		$ this->load->view('market/sales/maintenance/customeredit', $data);*/
        $result=$this->Customer_Model->customerByID($customer);	
        //print_r($result);		
		echo json_encode($result);
    }
	/*customers start*/
	
	/*customer branches start*/
	public function customerbranches() {        
        $data['page'] = 'Maintanance';
		$data['page_title'] = 'Customer Branches';
        $data['page_module'] = 'market';	
        $data['customer'] = $this->Customer_Model->customer_list();
        $data['salesperson'] = $this->Customer_Model->salespersonDropdownList();
        $data['sale_area'] = $this->Customer_Model->getAllSaleArea();        
        $data['tax_group'] = $this->Customer_Model->getAllTaxGroup();
        $data['sale_group'] = $this->Customer_Model->getAllSaleGroup();
		$data['gl_group_info'] = $this->Customer_Model->gl_ChartMasterList();
        $this->load->view('market/sales/maintenance/customer_branches', $data); 
	}
	public function editcustomerbranch($customerbranch_id) {  
      $data['page']         = 'Maintanance';
		$data['page_title']   = 'Customer Branches';
        $data['page_module']  = 'market';	
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
		      redirect('fpo/Market/customerbranches');
		}else{
		      $this->session->set_flashdata('warning', 'Data not inserted.');       
		      redirect('fpo/Market/customerbranches');
		}   
	}
    public function postupdatecustomerbranch($customer_branch_id) {
         if($this->Customer_Model->updatecustomerbranch($customer_branch_id)){
    		 $this->session->set_flashdata('success', 'New customer branch updated successfully.');       
		      redirect('fpo/Market/customerbranches');
		}else{
		      $this->session->set_flashdata('warning', 'Data not inserted.');       
		      redirect('fpo/Market/customerbranches');
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
	
	/*customer branches end*/
	/* sales end */	  	
    
	public function salesentry() {
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Sales Entry';
      $data['page_module'] = 'market';
      $fpo_id = $this->session->userdata('user_id');
      $appointment_date = $this->Fpo_Model->fpo_formation_date();
      $data['formation_date'] = $appointment_date->date_formation;
      $data['ledger_type'] = $this->Finance_Model->gl_code();
		$data['customer'] = $this->Customer_Model->customer_list();
		$data['supply_location'] = $this->Masterdata_Model->godown_list();
		$data['fpo_data'] = $this->Fpo_Model->getfpo($this->session->userdata('user_id'));

 		$data['unit'] = $this->Customer_Model->get_uomlist();
     //$data['mrp'] = $this->Supplier_Model->get_mrplist();
      //$data['product'] = $this->Customer_Model->product(); 
		$data['debtor_trans_last_record'] = $this->Customer_Model->getFpoDebtorTransLastTransNo();
		$debtor_last_ref = $this->Customer_Model->getFpoDebtorLastRefNo();
		$data['invoice_prefix']='yes';
		if(!empty($debtor_last_ref)){
			$data['debtor_trans_last_ref'] = preg_replace('/\D/', '',$debtor_last_ref->reference);
			if(!empty($data['fpo_data']->invoice_prefix and $data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.''.str_pad(($data['debtor_trans_last_ref']+1), 3, '0', STR_PAD_LEFT).'_'.$data['fpo_data']->invoice_suffix;
			}else if(!empty($data['fpo_data']->invoice_prefix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.''.str_pad(($data['debtor_trans_last_ref']+1), 3, '0', STR_PAD_LEFT);
			}else if(!empty($data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =str_pad(($data['debtor_trans_last_ref']+1), 3,'0', STR_PAD_LEFT).''.$data['fpo_data']->invoice_suffix;
			}else {	
				$data['invoice_prefix']='no';
				$data['invoice_no'] =str_pad(($data['debtor_trans_last_ref']+1), 3, '0', STR_PAD_LEFT);
			}
			
		}else{
			if(!empty($data['fpo_data']->invoice_prefix and $data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.'_'.str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1_'.$data['fpo_data']->invoice_suffix;
			}else if(!empty($data['fpo_data']->invoice_prefix)){
				$data['invoice_no'] =$data['fpo_data']->invoice_prefix.'_'.str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1';
			}else if(!empty($data['fpo_data']->invoice_suffix)){
				$data['invoice_no'] =str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1_'.$data['fpo_data']->invoice_suffix;
			}else {
				$data['invoice_prefix']='no';
				$data['invoice_no'] =str_pad((1+0), 3, '0', STR_PAD_RIGHT).'1';
			}			
		}
		
		$lastInsertedID = $this->Fpo_Model->lastInsertedIdByFPO(2, $this->session->userdata('user_id'));
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
	
	public function checkinvoiceno($invoicenumber) {
        if($this->Customer_Model->invoiceNumberExists( $invoicenumber ) > 0) {
            $response = array("status" => 0, "message" => "Invoice number is already registered");
        } else {
            $response = array("status" => 1, "message" => "Invoice number is available");
        }
        echo json_encode($response);
   }
	
	public function postsales_entry(){        
         if( $this->Customer_Model->add_salesentry()){
			 $this->session->set_flashdata('success', 'New sales entry added successfully.');       
			 redirect('fpo/market/salesentry');
		} else {
			 $this->session->set_flashdata('warning', 'Data not inserted.');       
			 redirect('fpo/market/salesentry');
		} 
	}
	
	public function getAllCustomersSuppliers() {
		$search_data = $this->input->post('search_data');
		if(!empty($search_data)){
			$get_customer = $this->Customer_Model->getCustomers($search_data);
			$get_supplier = $this->Supplier_Model->getSuppliers($search_data);
			$json = array_merge($get_customer,$get_supplier);
		}
		if(count($json)) {
			echo "<ul>";
			foreach ($get_customer as $row):
			   echo "<li><div onclick='fnCustomer(this, ".$row->debtor_no.")' data-name='".$row->name."'>".$row->name." - ".$row->pincode."</div></li>";
			endforeach;
			foreach ($get_supplier as $row):
			   echo "<li><div onclick='fnSupplier(this, ".$row->supplier_id.")' data-name='".$row->supp_name."'>".$row->supp_name." - ".$row->mailing_pincode."</div></li>";
			endforeach;
			echo "</ul>";
		}
    }
  //mobile number search//  
    public function getAllMobileCustomersSuppliers() {
		$search_data = $this->input->post('search_data');
		if(!empty($search_data)){
			$get_customer = $this->Customer_Model->getMobileCustomers($search_data);
			$get_supplier = $this->Supplier_Model->getMobileSuppliers($search_data);
			$json = array_merge($get_customer,$get_supplier);
		}
		if(count($json)) {
			echo "<ul>";
			foreach ($get_customer as $row):
			   echo "<li><div onclick='fnCustomer(this, ".$row->debtor_no.")' data-name='".$row->debtor_no."'>".$row->name." - ".$row->pincode."</div></li>";
			endforeach;
			foreach ($get_supplier as $row):
			   echo "<li><div onclick='fnSupplier(this, ".$row->supplier_id.")' data-name='".$row->supp_name."'>".$row->supp_name." - ".$row->mailing_pincode."</div></li>";
			endforeach;
			echo "</ul>";
		}
    }
    
    
	
	public function getCustomer() {
		$debtor_no = $this->input->post('debtor_no');
		$get_customer = $this->Customer_Model->getCustomerDetail($debtor_no);
		echo json_encode($get_customer);
	}
	
	public function getSupplier() {
		$supplier_id = $this->input->post('supplier_id');
		$get_supplier = $this->Supplier_Model->get_supplierDetail($supplier_id);
		echo json_encode($get_supplier);
	}
      

	/* 18/03/2019 => Customer by mobile number */
	public function getCustomerByMobileNumber($mobilenumber){
		$verifyMobilenumber = $this->Login_Model->verifyRegisteredMobileNumber($mobilenumber);
		if(isset($verifyMobilenumber->user_type) && isset($verifyMobilenumber->user_id)){
			if($verifyMobilenumber->user_type == 3){
				$customer_data = $this->Fpo_Model->fpoByUserID($verifyMobilenumber->user_id);
				$customer_data = $customer_data[0];
			} else if($verifyMobilenumber->user_type == 6){
				$customer_data = $this->Farmer_Model->getFarmerByUserId($verifyMobilenumber->user_id);
			}
			$response = array("status" => 1, "customer_data" => $customer_data, 'user_type' => $verifyMobilenumber->user_type);	
		} else {
            $response = array("status" => 0, "message" => "Mobile number is not registered!!!");
        }
		echo json_encode($response);
	}
}
