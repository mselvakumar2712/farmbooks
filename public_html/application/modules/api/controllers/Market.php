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
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}
        $this->load->library('session');        
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}

    
   public function salesquotationentry() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Quotation Entry';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/sales_quotation_entry', $data); 
	}
	/* sales quotation entry end*/
	
	/* sales order entry start*/
	public function salesorderentry() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Order Entry';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/sales_order_entry', $data); 
	}
	/* sales order entry end*/
	
	/* direct  sales delivery start*/
	public function directsalesdelivery() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Direct Sales Delivery';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/direct_sales_delivery', $data); 
	}
	/* direct  sales  delivery end*/
	
	/* direct  sales invoice start*/
	public function directsalesinvoice() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Direct Sales Invoice';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/direct_sales_invoice', $data); 
	}
	/* direct  sales invoice end*/
	
	/* delivery  sales order start*/
	public function deliverysalesorder() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Delivery Against Sales Order';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/delivery_sales_order', $data); 
	}
	/* delivery  sales order start*/
	
	/* invoice sales delivery start*/
	public function invoicesalesdelivery() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Invoice Against Sales Delivery';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/invoice_sales_delivery', $data); 
	}
	/* invoice sales delivery end*/
	
	/* template delivery start*/
	public function templatedelivery() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Template Delivery';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/template_delivery', $data); 
	}
	/* template delivery end*/
	
	/* template invoice start*/
	public function templateinvoice() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Template Invoice';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/template_invoice', $data); 
	}
	/* template invoice end*/
	
	/* print recurrent invoice start*/
	public function printrecurrentinvoice() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Recurrent Invoice';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/recurrent_invoice', $data); 
	}
	/* print recurrent invoice end*/
	
	/* customer paymentsstart*/
	public function customerpayments() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Customer Payments';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/customer_payments', $data); 
	}
	/* customer payments end*/
	
	/*customer credit notes start*/
	public function customercreditnotes() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Customer Credit Notes';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/customer_credit_notes', $data); 
	}
	/*customer credit notes end*/
	
	/*customer allocation start*/
	public function customerallocation() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Customer Allocation';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/transaction/allocate_customer', $data); 
	}
	/*customer allocation end*/
	
	/*sales quotation inquiry start*/
	public function salesquotationinquiry() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Quotation Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/inquiries_reports/sales_quotation_inquiry', $data); 
	}
	/*sales quotation inquiry end*/
	
	/*sales order inquiry start*/
	public function salesorderinquiry() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Order Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/inquiries_reports/sales_order_inquiry', $data); 
	}
	/*sales order inquiry end*/
	
	/*customer transaction inquiry start*/
	public function customertransactioninquiry() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Customer Transaction Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/inquiries_reports/customer_transaction_inquiry', $data); 
	}
	/*customer transaction inquiry end*/
	
	/*customer Allocation inquiry start*/
	public function customerallocationinquiry() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Customer Allocation Inquiry';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/inquiries_reports/customer_allocation_inquiry', $data); 
	}
	/*customer Allocation inquiry end*/
	
	/*sales groups start*/
	public function salesgroups() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Groups';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/sales_groups', $data); 
	}
	/*sales groups end*/
	
	/*sales types start*/
	public function salestypes() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Types';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/sales_types', $data); 
	}
	/*sales types end*/
	
	/*sales areas start*/
	public function salesareas() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Areas';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/sales_areas', $data); 
	}
	/*sales areas end*/
	
	/*sales persons start*/
	public function salespersons() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Sales Persons';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/sales_persons', $data); 
	}
	
	/*sales persons end*/
	
	/*recurrent invoice start*/
	public function recurrentinvoice() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Recurrent Sales Invoice';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/recurrent_invoice', $data); 
	}
	/*recurrent invoice end*/
	
	/*credit status start*/
	public function creditstatus() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Credit Status';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/credit_status', $data); 
	}
	/*credit status end*/
	
	/*customers start*/
	public function customers() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Customers';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/customers', $data); 
	}
	/*customers start*/
	
	/*customer branches start*/
	public function customerbranches() {        
        $data['page'] = 'Sales';
		  $data['page_title'] = 'Customer Branches';
        $data['page_module'] = 'market';		
        $this->load->view('inventory/sales/maintenance/customer_branches', $data); 
	}
	/*customer branches end*/
	/* sales end */	  	
    
	
    
	
        	
}
