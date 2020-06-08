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
		if (!$this->session->userdata('name')  || $this->session->userdata('is_active') == 0 ){ 
		 redirect('administrator/login');
		}      
        header('Access-Control-Allow-Origin: *');
        //header('Content-Type: application/json');
	}
    
      /* purchase start */
    public function purchaseorderlist() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Purchase Order Entry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/purchaseorder/purchaseorderlist', $data); 
	} 

	/* purchase order start*/
	public function addpurchase() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Purchase Order Entry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/purchaseorder/addpurchaseorder', $data); 
	} 
	public function post_purchase() {
		$data['page'] = 'Purchase Order';
		$data['page_title'] = 'Purchase Order Entry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/purchaseorder/addpurchaseorder', $data); 
	}
    
	/* purchase order end*/
	
	/* outstanding purchase order start*/
	public function outstandingpurchase() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Outstanding Purchase Orders Maintenance';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/outstanding_purchase/outstanding_purchase', $data); 
	} 
	/* outstanding purchase order end*/
	
	/* direct grn start*/
	public function directgrnlist() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Direct GRN';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/directgrn/directgrnlist', $data); 
	}
    
	
	public function directgrn() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Direct GRN';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/directgrn/adddirectgrn', $data); 
	} 
    /* direct grn end*/
	
	/* direct invoice start*/
	public function directinvoicelist() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Direct Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/directinvoice/directinvoicelist', $data); 
	}
    
	public function directinvoice() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Direct Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/directinvoice/adddirectinvoice', $data); 
	} 
	/* direct invoice end*/
	
	/* supplier payments start*/
	public function supplierpaymentslist() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Payments';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_payments/supplierpaymentslist', $data); 
	}
    
	public function supplierpayments() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Payments';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_payments/addsupplierpayments', $data); 
	}
	/* supplier payments end*/
	
	/* supplier allocation start*/
	public function supplierallocation() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Allocate Supplier Payments';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/allocate_supplier_payments/allocate_supplier_payments', $data); 
	}
    /* supplier allocation end*/
	
	/* supplier invoice start*/
	public function supplierinvoicelist() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_invoice/supplierinvoicelist', $data); 
	}
	public function addsupplierinvoice() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_invoice/addsupplierinvoice', $data); 
	}
	/* supplier invoice end*/
	
	/* supplier credit start*/
	public function suppliercreditlist() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Credit Note';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_credit/suppliercreditlist', $data); 
	}
	
	public function addsuppliercredit() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Credit Note';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/supplier_credit/addsuppliercredit', $data); 
	}
	/* supplier credit end*/
	
	/* search purchase order start*/	
	public function searchpurchaseorder() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Search Purchase Order';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/inquires_reports/search_purchase', $data); 
	}
    /* search purchase order end*/	
	
	/* search transaction inquiry start*/	
	public function suppliertransactioninquiry() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Transaction Inquiry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/inquires_reports/supplier_transaction_inquiry', $data); 
	}
	/* search transaction inquiry end*/
	
	/* search allocation inquiry start*/	
	public function supplierallocationinquiry() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Supplier Allocation Inquiry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/inquires_reports/supplier_allocation_inquiry', $data); 
	}
	/* search allocation inquiry end*/	
	
	/* suppliers start*/	
	public function suppliers() {        
        $data['page'] = 'Purchase Order';
		$data['page_title'] = 'Suppliers';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/suppliers/suppliers', $data); 
	} 
	/* suppliers end*/	
	
    /* purchase end */	
		
	
	/* sales start */	
	
	/* sales quotation entry start*/	
	public function salesquotationentry() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Quotation Entry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/sales_quotation_entry', $data); 
	}
	/* sales quotation entry end*/
	
	/* sales order entry start*/
	public function salesorderentry() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Order Entry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/sales_order_entry', $data); 
	}
	/* sales order entry end*/
	
	/* direct  sales delivery start*/
	public function directsalesdelivery() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Direct Sales Delivery';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/direct_sales_delivery', $data); 
	}
	/* direct  sales  delivery end*/
	
	/* direct  sales invoice start*/
	public function directsalesinvoice() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Direct Sales Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/direct_sales_invoice', $data); 
	}
	/* direct  sales invoice end*/
	
	/* delivery  sales order start*/
	public function deliverysalesorder() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Delivery Against Sales Order';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/delivery_sales_order', $data); 
	}
	/* delivery  sales order start*/
	
	/* invoice sales delivery start*/
	public function invoicesalesdelivery() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Invoice Against Sales Delivery';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/invoice_sales_delivery', $data); 
	}
	/* invoice sales delivery end*/
	
	/* template delivery start*/
	public function templatedelivery() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Template Delivery';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/template_delivery', $data); 
	}
	/* template delivery end*/
	
	/* template invoice start*/
	public function templateinvoice() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Template Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/template_invoice', $data); 
	}
	/* template invoice end*/
	
	/* print recurrent invoice start*/
	public function printrecurrentinvoice() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Recurrent Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/recurrent_invoice', $data); 
	}
	/* print recurrent invoice end*/
	
	/* customer paymentsstart*/
	public function customerpayments() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Customer Payments';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/customer_payments', $data); 
	}
	/* customer payments end*/
	
	/*customer credit notes start*/
	public function customercreditnotes() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Customer Credit Notes';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/customer_credit_notes', $data); 
	}
	/*customer credit notes end*/
	
	/*customer allocation start*/
	public function customerallocation() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Customer Allocation';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/transaction/allocate_customer', $data); 
	}
	/*customer allocation end*/
	
	/*sales quotation inquiry start*/
	public function salesquotationinquiry() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Quotation Inquiry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/inquiries_reports/sales_quotation_inquiry', $data); 
	}
	/*sales quotation inquiry end*/
	
	/*sales order inquiry start*/
	public function salesorderinquiry() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Order Inquiry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/inquiries_reports/sales_order_inquiry', $data); 
	}
	/*sales order inquiry end*/
	
	/*customer transaction inquiry start*/
	public function customertransactioninquiry() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Customer Transaction Inquiry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/inquiries_reports/customer_transaction_inquiry', $data); 
	}
	/*customer transaction inquiry end*/
	
	/*customer Allocation inquiry start*/
	public function customerallocationinquiry() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Customer Allocation Inquiry';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/inquiries_reports/customer_allocation_inquiry', $data); 
	}
	/*customer Allocation inquiry end*/
	
	/*sales groups start*/
	public function salesgroups() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Groups';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/sales_groups', $data); 
	}
	/*sales groups end*/
	
	/*sales types start*/
	public function salestypes() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Types';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/sales_types', $data); 
	}
	/*sales types end*/
	
	/*sales areas start*/
	public function salesareas() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Areas';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/sales_areas', $data); 
	}
	/*sales areas end*/
	
	/*sales persons start*/
	public function salespersons() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Sales Persons';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/sales_persons', $data); 
	}
	/*sales persons end*/
	
	/*recurrent invoice start*/
	public function recurrentinvoice() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Recurrent Sales Invoice';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/recurrent_invoice', $data); 
	}
	/*recurrent invoice end*/
	
	/*credit status start*/
	public function creditstatus() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Credit Status';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/credit_status', $data); 
	}
	/*credit status end*/
	
	/*customers start*/
	public function customers() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Customers';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/customers', $data); 
	}
	/*customers start*/
	
	/*customer branches start*/
	public function customerbranches() {        
        $data['page'] = 'Sales';
		$data['page_title'] = 'Customer Branches';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/sales/maintenance/customer_branches', $data); 
	}
	/*customer branches end*/
	/* sales end */	  	
    
	/*inventory location transfer*/
	 public function inventorylocations() {        
        $data['page'] = 'Inventory';
		$data['page_title'] = 'Inventory Location Transfer';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/inventorylocation/inventory_location', $data); 
	} 
	/*inventory adjustments*/
	 public function inventoryadjustment() {        
        $data['page'] = 'Inventory';
		$data['page_title'] = 'Inventory Adjustment';
        $data['page_module'] = 'inventory';		
        $this->load->view('inventory/purchase/inventoryadjustments/inventory_adjustment', $data); 
	} 
        
}
