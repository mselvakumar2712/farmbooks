<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends CI_Controller {

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
    public function __construct(){
		parent::__construct();
		$this->load->library("session");
		if(!$this->session->userdata('name') || $this->session->userdata('user_type') != 3 || $this->session->userdata('is_active') == 0){
         redirect('administrator/login/signout');
		}
		$this->load->model("Production_Model");		
		header('Access-Control-Allow-Origin: *');
	}
    
    
	//Production Management/Manufacture Management//
	//Transaction code start//       
    public function index(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Work Order Entry';
        $data['page_module'] = 'production';		
		
		//$data['work_orders'] = $this->Production_Model->getWorkOrdersList();
        $this->load->view('production/transaction/work_order_entry/listwork_order', $data); 
	}    
	public function addWorkOrder(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Work Order Entry';
        $data['page_module'] = 'production';		
		
		//$data['work_orders'] = $this->Production_Model->getWorkOrdersList();
        $this->load->view('production/transaction/work_order_entry/addwork_order', $data); 
	}
	public function viewWorkOrder(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Work Order Entry';
        $data['page_module'] = 'production';		
		
		//$data['work_orders'] = $this->Production_Model->getWorkOrdersList();
        $this->load->view('production/transaction/work_order_entry/viewwork_order', $data); 
	}    
	public function editWorkOrder(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Work Order Entry';
        $data['page_module'] = 'production';		
		
		//$data['work_orders'] = $this->Production_Model->getWorkOrdersList();
        $this->load->view('production/transaction/work_order_entry/editwork_order', $data); 
	} 
	public function issueWorkOrder(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Work Order Entry';
        $data['page_module'] = 'production';		
		
		//$data['work_orders'] = $this->Production_Model->getWorkOrdersList();
        $this->load->view('production/transaction/work_order_entry/issue_work_order', $data); 
	}
	public function produceWorkOrder(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Work Order Entry';
        $data['page_module'] = 'production';		
		
		//$data['work_orders'] = $this->Production_Model->getWorkOrdersList();
        $this->load->view('production/transaction/work_order_entry/produce_work_order', $data); 
	}
	public function costsWorkOrder(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Work Order Entry';
        $data['page_module'] = 'production';		
		
		//$data['work_orders'] = $this->Production_Model->getWorkOrdersList();
        $this->load->view('production/transaction/work_order_entry/cost_work_order', $data); 
	}
	
	public function outstandingWorkOrderEntry(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Outstanding Work Order Entry';
        $data['page_module'] = 'production';		
		
	}   

	public function dimensionEntry(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Dimension Entry';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/transaction/dimension_entry/listdimensions', $data);
	}  
	public function addDimension(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Dimension Entry';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/transaction/dimension_entry/adddimension', $data);
	}  
	public function viewDimension(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Dimension Entry';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/transaction/dimension_entry/viewdimension', $data);
	}  
	public function editDimension(){
		$data['page'] = 'Transaction';
		$data['page_title'] = 'Dimension Entry';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/transaction/dimension_entry/editdimension', $data);
	}  
    //Transaction code end//     	
	

	//Inquiry & Report code start//       
    public function costedBillofMaterialInquiry(){
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Costed Bill of Material Inquiry';
        $data['page_module'] = 'production';		
		
	}    
	
	public function inventoryItemWhereUsedInquiry(){
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Inventory Item Where Used Inquiry';
        $data['page_module'] = 'production';		
		
	} 
	
	public function workOrderInquiry(){
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Work Order Inquiry';
        $data['page_module'] = 'production';		
		
	} 
	
	public function dimensionInquiry(){
		$data['page'] = 'Inquiries and Reports';
		$data['page_title'] = 'Dimension Inquiry';
        $data['page_module'] = 'production';		
		
	} 
    //Inquiry & Report code end//     	
	
	
	//Maintenance code start//       
    public function workCentre(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Work Centre';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/work_centre/listwork_centre', $data);
	}  
	public function addWorkCentre(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Work Centre';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/work_centre/addwork_centre', $data);
	}  
	public function viewWorkCentre(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Work Centre';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/work_centre/viewwork_centre', $data);
	}
	public function editWorkCentre(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Work Centre';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/work_centre/editwork_centre', $data);
	}  

	
	public function billofMaterials(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Bills of Material';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/material_bill/listmaterial_bill', $data);
	}
	public function addBillsofMaterial(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Bills of Material';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/material_bill/addmaterial_bill', $data);
	}
	public function viewBillsofMaterial(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Bills of Material';
        $data['page_module'] = 'production';		
	
		$this->load->view('production/maintenance/material_bill/viewmaterial_bill', $data);
	}
	public function editBillsofMaterial(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Bills of Material';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/material_bill/editmaterial_bill', $data);
	}
	
	public function dimensionTags(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Dimension Tags';
        $data['page_module'] = 'production';
		
		$this->load->view('production/maintenance/dimension_tags/listtags', $data);
	}
	public function addDimensionTag(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Dimension Tags';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/dimension_tags/addtags', $data);
	}
	public function viewDimensionTag(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Dimension Tags';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/dimension_tags/viewtags', $data);
	}
	public function editDimensionTag(){
		$data['page'] = 'Maintenance';
		$data['page_title'] = 'Dimension Tags';
        $data['page_module'] = 'production';		
		
		$this->load->view('production/maintenance/dimension_tags/edittags', $data);
	}
	//Maintenance code end//  	
	
}