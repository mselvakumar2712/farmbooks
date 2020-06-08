<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ticket_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function ticket_list($fpo_id) { 
        $this->db->select('trv_support_tickets.*,trv_support_category_master.name As categoryname,trv_fpo.producer_organisation_name,trv_fpo.mobile');
        $this->db->join('trv_support_category_master', 'trv_support_category_master.id = trv_support_tickets.support_name');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_support_tickets.created_by', 'left');
        $this->db->where(array('trv_support_tickets.created_by' => $fpo_id ,'trv_support_tickets.creator_type' => 3 ));
        $this->db->order_by("trv_support_tickets.created_at", "asc");
        $this->db->from('trv_support_tickets');
        return $this->db->get()->result();	
	}  
    function ticketID($id){    
		/* $this->db->select('trv_support_tickets.*,trv_support_category_master.name As categoryname');
		$this->db->join('trv_support_category_master', 'trv_support_category_master.id = trv_support_tickets.support_name'); 	
		$this->db->where(array('trv_support_tickets.id' => $id));
		$this->db->from('trv_support_tickets');
		return $this->db->get()->row_array(); */
      $reappointment = array(
			'status'				=> 2
			                  
        );	
		return $this->db->update('trv_support_tickets', $reappointment, array('id' => $id));
	}
   function updateticket_info($id){    
		/* $this->db->select('trv_support_tickets.*,trv_support_category_master.name As categoryname');
		$this->db->join('trv_support_category_master', 'trv_support_category_master.id = trv_support_tickets.support_name'); 	
		$this->db->where(array('trv_support_tickets.id' => $id));
		$this->db->from('trv_support_tickets');
		return $this->db->get()->row_array(); */
      /* $id = $this->db->insert_id();
      $query = $this->db->get_where('trv_support_tickets', array('id' => $id));
      $last_inserted_id=$query->row();
      print_r($last_inserted_id);
      die; */
      /* $last = $this->db->order_by('id',"desc")->limit(1)->get('trv_support_tickets')->row();
      print_r($last);
      die; */
      $response_value = array(
         'respose_to'=>$id,
         'parent_id'=>$id,
         'comments'  => $this->input->post('response'),
         'support_name'  => $this->input->post('support_name'),
         'created_by'      => $this->session->userdata('user_id'),
         'created_at'      => date('Y-m-d H:i:s'),
         'creator_type'    => $this->session->userdata('user_type'),
         'updated_by'      => $this->session->userdata('user_id'),
         'status'	   => 3
			                  
        );	
		$response = $this->db->insert('trv_support_tickets', $response_value);
      $response_detail = array(
         'status'	   => 3                 
        );	
         $result = $this->db->update('trv_support_tickets', $response_detail, array('id' => $id));	
         return true;
	}
	
}
?>