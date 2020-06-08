<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tax_Model extends CI_Model {
   function __construct() {
      parent::__construct();
      $this->load->database();
   }
    

/** FPO Starts **/
   function addtax() {
      $tax_details = array(  
         'type_id'                       => $this->input->post('type_id'),
         'hsn_code'    					     => $this->input->post('hsn_code'),
         'igst'                     	  => $this->input->post('igst'),
         'cgst'                          => $this->input->post('cgst'),
         'sgst_utgst'                    => $this->input->post('sgst'),
         'cess_applicable'               => $this->input->post('cess_applicable'),
         'item_description'              => $this->input->post('item_description'),
         'cess_percentage'               => $this->input->post('cess_percentage'),
         'cess_amount'                   => $this->input->post('cess_amount'),
         'status'                        => 1,
         'updated_on'    => date('Y-m-d H:i:s'),
         'updated_by'    => "" 
      ); 
      return $this->db->insert('trv_tax_master', $tax_details); 
   }
	function tax_list() {  
      $this->db->select('id,type_id,hsn_code,sgst_utgst,cgst,igst,short_description,effective_date,status');
      $this->db->where(array('trv_tax_master.status' => '1'));
      $this->db->order_by("trv_tax_master.id", "desc");
      $this->db->from('trv_tax_master');
      return $this->db->get()->result();	
   }
   function taxByID($tax_id) {
	  $this->db->where(array('id' => $tax_id, 'status' => '1'));
	  $this->db->from('trv_tax_master');
	  return $this->db->get()->row_array();	
   } 
	function update_tax($tax_id) { 
			$tax_details = array(  
			'type_id'                       => $this->input->post('type_id'),
			'hsn_code'    					=> $this->input->post('hsn_code'),
			'igst'                     	    => $this->input->post('igst'),
			'cgst'                          => $this->input->post('cgst'),
			'sgst_utgst'                    => $this->input->post('sgst'),
			'cess_applicable'               => $this->input->post('cess_applicable'),
			'item_description'              => $this->input->post('item_description'),
			'cess_percentage'               => $this->input->post('cess_percentage'),
			'cess_amount'                   => $this->input->post('cess_amount'),
			'status'                        => 1,
			'updated_on'    => date('Y-m-d H:i:s'),
			'updated_by'    => ""   
		); 	
		return $this->db->update('trv_tax_master', $tax_details, array('id' => $tax_id));
	} 

    
    
	
}

?>