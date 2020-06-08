<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Setting_Model extends CI_Model {
   function __construct() {
      parent::__construct();
      $this->load->database();
   }
	//gst starts//
	function addgst() { 
      $last_inserted_gst_id = $this->session->userdata('user_id');
      if($this->input->post('gst_enable') == 1) {
         $add_gst_details = array(	
            'fpo_id'                   		=> $this->session->userdata('user_id'),			
            'state_code'               		=> $this->input->post('state_code'),
            'registration_type'        		=> $this->input->post('registration_type'),
            'gst_in'                  		   => $this->input->post('gst_in'),
            'gst_applicable_from'      		=> $this->input->post('gst_applicable_from'),
            'periodicity'             		   => $this->input->post('periodicity'),			
            'ewaybill_applicable'      		=> $this->input->post('ewaybill_applicable'),
            'ewaybill_applicable_from' 		=> $this->input->post('ewaybill_applicable_from'),
            'threshold_inter_state'          => $this->input->post('threshold_inter_state'),
            'threshold_intra_state'          => $this->input->post('threshold_intra_state'),
            'lut_bond_provided'           	=> $this->input->post('lut_bond_provided'),			
            'lut_bond_no'                    => $this->input->post('lut_bond_no'),
            'lut_bond_valid_from'            => $this->input->post('lut_bond_valid_from'),			
            'lut_bond_valid_to' 			      => $this->input->post('lut_bond_valid_to'),			
            'updated_by'            		   => $last_inserted_gst_id,
            'updated_on'            		   => date('Y-m-d H:i:s'),           	       
         );
            
         $fpo_details = array(    
            'gst'                  => $this->input->post('gst_in'),
            'gst_enable'           => $this->input->post('gst_enable'),
         );
         $this->db->update('trv_fpo', $fpo_details,array('user_id' => $this->session->userdata('user_id')));
         return $this->db->insert('trv_fpo_gst_setting', $add_gst_details);
      }
	}
	
	function updategst($id) { 
	   $last_inserted_gst_id = $this->session->userdata('user_id');
		$add_gst_details = array(	
         'fpo_id'                   		=> $this->session->userdata('user_id'),			
         'state_code'               		=> $this->input->post('state_code'),
         'registration_type'        		=> $this->input->post('registration_type'),
         'gst_in'                  		   => $this->input->post('gst_in'),
         'gst_applicable_from'      		=> $this->input->post('gst_applicable_from'),
         'periodicity'             		   => $this->input->post('periodicity'),			
         'ewaybill_applicable'      		=> $this->input->post('ewaybill_applicable'),
         'ewaybill_applicable_from' 		=> $this->input->post('ewaybill_applicable_from'),
         'threshold_inter_state'          => $this->input->post('threshold_inter_state'),
         'threshold_intra_state'          => $this->input->post('threshold_intra_state'),
         'lut_bond_provided'          	   => $this->input->post('lut_bond_provided'),			
         'lut_bond_no'                    => $this->input->post('lut_bond_no'),
         'lut_bond_valid_from'            => $this->input->post('lut_bond_valid_from'),			
         'lut_bond_valid_to' 			      => $this->input->post('lut_bond_valid_to'),			
         'updated_by'            		   => $last_inserted_gst_id,
         'updated_on'            		   => date('Y-m-d H:i:s'),           	       
      );
				
		$fpo_details = array(    
         'gst'                  => $this->input->post('gst_in'),
         'gst_enable'           => $this->input->post('gst_enable'),
      );
		$this->db->update('trv_fpo', $fpo_details,array('user_id' => $this->session->userdata('user_id')));
		return $this->db->update('trv_fpo_gst_setting', $add_gst_details,array('id' => $id));
	}
	
	function gstByID() {
		$this->db->select('trv_fpo_gst_setting.*');
		$this->db->from('trv_fpo_gst_setting');
		return $this->db->get()->result();
	}
	
	function postShareValue() {
	
		$get_loggined_fpo= $this->db->select('*')->from('trv_fpo_share_value')->where(array('fpo_id' => $this->session->userdata('user_id'),'status' => 1))->get()->result_array();
		$get_available_shares = $this->db->select('SUM(total_share_value) as total')->from('trv_share_allotment')->where(array('fpo_id' => $this->session->userdata('user_id'),'status' => 1))->order_by("id", "desc")->get()->result_array();
		$get_share_history= $this->db->select('*')->from('trv_fpo_share_value_history')->where(array('fpo_id' => $this->session->userdata('user_id')))->get()->result_array();		
		$shares_released=$this->input->post('shares_released');
		$end_date=$this->input->post('shares_released_date');
		$date=date('Y-m-d', strtotime($end_date .' -1 day'));
		if(!empty($get_loggined_fpo[0]['id'])){	
				$get_share_total=$get_available_shares[0]['total'];
				$get_share_released=$get_loggined_fpo[0]['shares_released']+ $shares_released;
				$available_shares = $get_share_released - $get_share_total;
            if($get_share_released <= $this->input->post('share_capital')){
               $share_update = array(	
               'fpo_id'       		=> $this->session->userdata('user_id'),
               'shares_released'    => $get_loggined_fpo[0]['shares_released'] + $shares_released,
               'unit_price'         => $this->input->post('unit_price'),
               'auth_capital_units' => $this->input->post('share_capital'),
               'minimum_threshold'  => $this->input->post('min_threshold'),
               'maximum_threshold'  => $this->input->post('max_threshold'),
               'shares_available'   => $available_shares ,
               'effective_date'  	=> $this->input->post('shares_released_date'),            
               'updated_by'         => $this->session->userdata('user_id'),
               'updated_on'         => date('Y-m-d H:i:s')
               );
               $share_value=$this->db->update('trv_fpo_share_value',$share_update,array('id' => $get_loggined_fpo[0]['id']));
               $share_update_history = array(	
               'fpo_id'       		=> $this->session->userdata('user_id'),
               'shares_released'   => $shares_released,
               'unit_price'        => $this->input->post('unit_price'),
               'from_date'  		  => $this->input->post('shares_released_date'),
               'end_date'  		  => $date, 
               'updated_by'        => $this->session->userdata('user_id'),
               'updated_on'        => date('Y-m-d H:i:s')
               );
               $share_history=$this->db->insert('trv_fpo_share_value_history', $share_update_history);
            } else {
               return false;
            }
		}else{
			
			$available_shares = '';
         $authtotal =($this->input->post('share_capital'))*($this->input->post('unit_price'));
			$share_update = array(	
				'fpo_id'       		=> $this->session->userdata('user_id'),
				'shares_released'    => $shares_released,
            'auth_capital_units' => $this->input->post('share_capital'),
            'auth_capital_amount'=> $authtotal,
				'unit_price'         => $this->input->post('unit_price'),
				'minimum_threshold'  => $this->input->post('min_threshold'),
				'maximum_threshold'  => $this->input->post('max_threshold'),
				'effective_date'  	=> $this->input->post('shares_released_date'),
				'shares_available'   => $available_shares ,
				'updated_by'         => $this->session->userdata('user_id'),
				'updated_on'         => date('Y-m-d H:i:s')
			);
			$share_value= $this->db->insert('trv_fpo_share_value', $share_update);
			$share_update_history = array(	
				'fpo_id'       	  => $this->session->userdata('user_id'),
				'shares_released'   => $shares_released,
				'unit_price'        => $this->input->post('unit_price'),
				'from_date'  		  => $this->input->post('shares_released_date'),
				'end_date'  		  => $date, 
				'updated_by'        => $this->session->userdata('user_id'),
				'updated_on'        => date('Y-m-d H:i:s')
			);
			$share_history=$this->db->insert('trv_fpo_share_value_history', $share_update_history);
			
		} 
		return array($share_value,$share_history);
    }
	
	function getShareValueByFpo() {
		$this->db->select('shares_released, unit_price, effective_date, minimum_threshold, maximum_threshold');
		$this->db->from('trv_fpo_share_value');
		$this->db->where(array('fpo_id' => $this->session->userdata('user_id'), 'status' => 1));
		return $this->db->get()->row();
	}
   
   function getShareSettingFpo(){
      $fpo_id = $this->session->userdata('user_id');
		$this->db->select('trv_fpo_share_value.*,fpo_gl_trans.amount as share_amount');
		$this->db->from('trv_fpo_share_value','trv_fpo_share_value_history');
      $this->db->join('fpo_gl_trans', 'fpo_gl_trans.fpo_id = trv_fpo_share_value.fpo_id');
      //$this->db->join('fpo_gl_trans', 'fpo_gl_trans.fpo_id = trv_fpo_share_value.account_code');
		$this->db->where(array('trv_fpo_share_value.fpo_id' => $fpo_id,'fpo_gl_trans.fpo_id' => $fpo_id));
		return $this->db->get()->row();
   }
   
   function paidUpcapital(){
      $fpo_id = $this->session->userdata('user_id');
		$this->db->select('fpo_gl_trans.amount as share_amount');
		$this->db->from('fpo_gl_trans');    
		$this->db->where(array('fpo_gl_trans.fpo_id' => $fpo_id));
		return $this->db->get()->row();
   }
	
	function shareValueList() {
		$this->db->select('trv_fpo_share_value.*');
		$this->db->from('trv_fpo_share_value');
		$this->db->where(array('trv_fpo_share_value.fpo_id' => $this->session->userdata('user_id')));
		return $this->db->get()->result();		
	}
	
	function shareValueHistory() {
		$this->db->select('trv_fpo_share_value_history.*');
		$this->db->from('trv_fpo_share_value_history');
		$this->db->where(array('trv_fpo_share_value_history.fpo_id' => $this->session->userdata('user_id')));
		return $this->db->get()->result();
		
	}
	
	function totalShareavailable(){
		$get_available_shares= $this->db->select('SUM(total_share_value) as total')->from('trv_share_allotment')->where(array('fpo_id' => $this->session->userdata('logger_id'),'status' => 1))->order_by("id", "desc")->get()->result_array();
		$get_loggined_fpo= $this->db->select('*')->from('trv_fpo_share_value')->where(array('fpo_id' => $this->session->userdata('logger_id'),'status' => 1))->order_by("id", "desc")->get()->result_array();		
		$get_share_total = $get_available_shares[0]['total'];
		if(count($get_loggined_fpo) !== 0){
		$get_share_released = $get_loggined_fpo[0]['shares_released'];
		}else{
			$get_share_released =0;
		}
		$total_available = $get_share_released - $get_share_total;
		return $total_available;
	}
	
	function postinvoiceprefix() { 
      if($this->input->post('invoice_yes_no') == 1){
         $add_invoice_prefix = array(			
            'invoice_prefix'				=> $this->input->post('invoice_prefix'),
            'invoice_suffix'				=> $this->input->post('invoice_suffix'),     	       
         );
      } else {
         $add_invoice_prefix = array(			
            'invoice_prefix'				=> "",
            'invoice_suffix'				=> "",     	       
         );
      }
      return $this->db->update('trv_fpo', $add_invoice_prefix,array('user_id' => $this->session->userdata('user_id')));      
	}
   
  function getPurchaseTransactionById($fpo_id){
      $this->db->select('fpo_supp_trans.supplier_id, fpo_purch_orders.order_no, fpo_purch_orders.ord_date,fpo_purch_order_details.po_detail_item');      
      $this->db->select('trv_fpo_product.*, AVG(round(fpo_purch_order_details.unit_price))AS price, fpo_purch_order_details.mrp, fpo_purch_order_details.selling_price');
      $this->db->where(array('fpo_supp_trans.fpo_id' => $fpo_id));      
      $this->db->order_by("fpo_supp_trans.trans_no", "desc");
      $this->db->join('fpo_purch_orders', 'fpo_purch_orders.supplier_id = fpo_supp_trans.supplier_id');
      $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
      $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_purch_order_details.item_code');
      $this->db->from('fpo_supp_trans'); 
      $this->db->group_by(array('trv_fpo_product.id','fpo_purch_order_details.mrp')); 
      return $this->db->get()->result(); 
    }
  
   function update_sellingprice($sellingPrice, $purchaseOrderID){
        $selling_price_details = array(    
         'selling_price'    => $sellingPrice,  
        );  
        return $this->db->update('fpo_purch_order_details', $selling_price_details, array('po_detail_item' => $purchaseOrderID));   
   }
   
}

?>