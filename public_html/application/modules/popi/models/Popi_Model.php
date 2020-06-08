<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');





class Popi_Model extends CI_Model {

    function __construct() {

        parent::__construct();

        $this->load->database();

    }

    

/** POPI Starts **/

    function popiList() {

        $this->db->select('trv_popi.id, trv_popi.institution_type, trv_popi.institution_name, trv_popi.mobile, trv_popi.constitution, trv_popi.date_formation, trv_popi.contact_person, trv_popi.status');

        $this->db->where(array('trv_popi.status' => '1'));

        $this->db->order_by("trv_popi.id", "desc");

        $this->db->from('trv_popi');

        return $this->db->get()->result();	

    }

    

    

   function addpopi() {
      $total_fields = $this->Popi_Model->get_popi_last_id();
      if(empty($total_fields)){
         $total_fields = array();
         $total_fields[0]['id'] = 0;
      }
    	//$last_id = $total_fields[0]['id'];    	
        $created_popi_user_id = '1'.$this->input->post('state').str_pad(($total_fields[0]['id']+1), 3, '0', STR_PAD_LEFT);
        
        $popi_details = array(	

	        'user_id'                   => $created_popi_user_id,
            
            'institution_type'          => $this->input->post('institution_type'),

            'institution_name'          => $this->input->post('institution_name'),

            'pin_code'                  => $this->input->post('pin_code'),

            'state'                     => $this->input->post('state'),

            'district'                  => $this->input->post('district'),

            'block'                     => $this->input->post('block'),

            'panchayat'                 => $this->input->post('gram_panchayat'),

            'village'                   => $this->input->post('village'),

            'door_no'                   => $this->input->post('door_no'),

            'street'                    => $this->input->post('street'),

            'std_code'                  => $this->input->post('std_code'),

            'land_line'                 => $this->input->post('land_line'),

            'mobile'                    => $this->input->post('mobile_num'),

            'email'                     => $this->input->post('email'),

            'constitution'              => $this->input->post('constitution'),

            'date_formation'            => $this->input->post('date_formation'),

            'pan_promoting_inst'        => $this->input->post('pan_promoting_institution'),

            'contact_person'            => $this->input->post('contact_person'),

            'nature_activity'           => $this->input->post('nature_activity'),

            'financial_year'            => $this->input->post('financial_year'),

            'business_commence'         => $this->input->post('business_commence'),

            'status'                    => $this->input->post('status')

        );

        $this->db->insert('trv_popi', $popi_details);
        $last_inserted_popi_id = $this->db->insert_id();        
        if($this->input->post('institution_type') == 1) { $user_type = 1; } else { $user_type = 2; }        
        
        $user_details = array(	
            'user_type'         => $user_type,
            'user_id'           => $created_popi_user_id,
            'username'          => $this->input->post('mobile_num'),
            'password'          => "123456",
            'status'            => 1,
            'is_verified'       => 1,
            
            'created_by'        => $last_inserted_popi_id,
            'created_on'        => date('Y-m-d H:i:s'),
            'updated_by'        => $last_inserted_popi_id,
            'updated_on'        => date('Y-m-d H:i:s')
        );
        return $this->db->insert('trv_user_auth', $user_details);
    }

   
    

    function popiByID($popi_id) {
        $this->db->select('trv_popi.*, trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, , trv_district_master.name As district_name, , trv_state_master.name As state_name');        
        $this->db->from('trv_popi');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_popi.village');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.id = trv_popi.panchayat');
//        $this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_popi.taluk');
        $this->db->join('trv_block_master', 'trv_block_master.id = trv_popi.block');
        $this->db->join('trv_district_master', 'trv_district_master.id = trv_popi.district');
        $this->db->join('trv_state_master', 'trv_state_master.id = trv_popi.state');
        $this->db->where(array('trv_popi.id' => $popi_id, 'trv_popi.status' => '1'));
        return $this->db->get()->result();
    }

    

    

    function updatepopi($popi_id) {

        $popi_details = array(	

	        'institution_type'          => $this->input->post('institution_type'),

            'institution_name'          => $this->input->post('institution_name'),

            'pin_code'                  => $this->input->post('pin_code'),

            'state'                     => $this->input->post('state'),

            'district'                  => $this->input->post('district'),

            'block'                     => $this->input->post('block'),

            'panchayat'                 => $this->input->post('gram_panchayat'),

            'village'                   => $this->input->post('village'),

            'door_no'                   => $this->input->post('door_no'),

            'street'                    => $this->input->post('street'),

            'std_code'                  => $this->input->post('std_code'),

            'land_line'                 => $this->input->post('land_line'),

            'mobile'                    => $this->input->post('mobile_num'),

            'email'                     => $this->input->post('email'),

            'constitution'              => $this->input->post('constitution'),

            'date_formation'            => $this->input->post('date_formation'),

            'pan_promoting_inst'        => $this->input->post('pan_promoting_institution'),

            'contact_person'            => $this->input->post('contact_person'),

            'nature_activity'           => $this->input->post('nature_activity'),

            'financial_year'            => $this->input->post('financial_year'),

            'business_commence'         => $this->input->post('business_commence'),

            'status'                    => $this->input->post('status')

        );

		return $this->db->update('trv_popi', $popi_details, array('id' => $popi_id));

    }

    

    

    function deletepopi( $popi_id ) {

        $popiid = array(               

	       'status' => 0

        );	            	

        return $this->db->update('trv_popi', $popiid, array('id' => $popi_id));

	}

     

    
    function popiByUserID($user_id) {
        $this->db->select('trv_popi.*, trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, , trv_district_master.name As district_name, , trv_state_master.name As state_name');        
        $this->db->from('trv_popi');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_popi.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_popi.panchayat', 'left');
//        $this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_popi.taluk');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_popi.block', 'left');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_popi.district');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_popi.state');
        $this->db->where(array('trv_popi.user_id' => $user_id, 'trv_popi.status' => 1));
        return $this->db->get()->result();
    }
    
    
    function profile_update() {

        $popi_details = array(	

            'mobile'                    => $this->input->post('mobile_num'),

            'email'                     => $this->input->post('email'),

            'date_formation'            => $this->input->post('date_formation'),

            'contact_person'            => $this->input->post('contact_person'),

            'nature_activity'           => $this->input->post('nature_activity'),

            'financial_year'            => $this->input->post('financial_year'),

            'business_commence'         => $this->input->post('business_commence')

        );

		return $this->db->update('trv_popi', $popi_details, array('id' => $this->input->post('popi_id')));

    }

    
    //Get last row
	function get_popi_last_id() {
		$query ="select * from trv_popi order by id DESC limit 1";
        $res = $this->db->query($query);

	    if($res->num_rows() > 0) {
            return $res->result("array");
	    }
	    return array();
    }
    
    
    function getpopi( $user_id ) {
        return $this->db->get_where('trv_popi', array('user_id' => $user_id))->row();
    }
/** POPI End **/ 
    
}



?>