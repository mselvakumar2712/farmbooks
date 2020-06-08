<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Share_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

    function farmerShareApplicationList() {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->where(array('trv_share_application.member_type' => 1, 'trv_share_application.status' => 1));
        $this->db->order_by("trv_share_application.id", "desc");
        $this->db->from('trv_share_application');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.fpo_id');
        return $this->db->get()->result();	
    }
    
    
    function shareApplicationList() {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->where(array('trv_share_application.status' => 1));
        $this->db->order_by("trv_share_application.id", "desc");
        $this->db->from('trv_share_application');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.holder_id', 'left');
        return $this->db->get()->result();	
    }
    
    
    function fpoShareApplicationList() {
        $this->db->select('trv_share_application.*, trv_fpo.producer_organisation_name, trv_fpo.producer_organisation_name As fpo_name');
        $this->db->where(array('trv_share_application.member_type' => 2, 'trv_share_application.status' => 1));
        $this->db->order_by("trv_share_application.id", "desc");
        $this->db->from('trv_share_application');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.holder_id');
        //$this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.fpo_id');
        return $this->db->get()->result();	
    }
    
    
/** Share Application related functions start here **/    
    function postShareApplication() {
        $share_details = array(	
	        'member_type'           => 1,
            'fpo_id'                => $this->input->post('fpo_name'),
            'holder_id'             => $this->input->post('farmer_name'),
            'apply_date'            => $this->input->post('share_date'),
            'no_of_share'           => $this->input->post('no_of_share'),
            'pan_number'            => $this->input->post('pan_number'),
            'mobile_number'        => $this->input->post('mobile_number'),
            'aadhaar_number'        => $this->input->post('aadhaar_number'),
            'nominee_name'          => $this->input->post('nominee_name'),
            'nominee_father_name'   => $this->input->post('nominee_father_name'),
            
            'created_by'            => '',
            'created_on'            => date('Y-m-d H:i:s')
        );
		         
        return $this->db->insert('trv_share_application', $share_details);
    }
    
    
    function shareApplicationByID($share_application_id) {
        $this->db->where(array('trv_share_application.id' => $share_application_id, 'trv_share_application.status' => 1));
        $this->db->from('trv_share_application');
        return $this->db->get()->result();	
    }
    
    
    function updateShareApplication($share_application_id) {
        $share_details = array(	
            'apply_date'            => $this->input->post('share_date'),
            'no_of_share'           => $this->input->post('no_of_share'),
            'pan_number'            => $this->input->post('pan_number'),
            'aadhaar_number'        => $this->input->post('aadhaar_number'),
            'nominee_name'          => $this->input->post('nominee_name'),
            'nominee_father_name'   => $this->input->post('nominee_father_name')
        );
		         
		return $this->db->update('trv_share_application', $share_details, array('id' => $share_application_id));
    }
    
    
    function deleteShareApplication( $share_application_id ) {
        $shareapplicationid = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_share_application', $shareapplicationid, array('id' => $share_application_id));
	}
/** Share Application End **/ 
    
    
    
/** Share Application with FPO related functions start here **/    
    function postShareApplicationByFPO() {
        $share_details = array(	
	        'member_type'           => 2,
            'fpo_id'                => $this->input->post('fpo_name_all'),
            'holder_id'             => $this->input->post('fpo_name'),
            'apply_date'            => $this->input->post('share_date'),
            'no_of_share'           => $this->input->post('no_of_share'),
            'pin_code'              => $this->input->post('pin_code'),
            'state'                 => $this->input->post('state'),
            'district'              => $this->input->post('district'),
            'block'                 => $this->input->post('area_block'),
            'taluk'                 => $this->input->post('taluk'),
            'gram_panchayat'        => $this->input->post('gram_panchayat'),
            'village'               => $this->input->post('village'),
            'street'                => $this->input->post('street_name'),
            'door_no'               => $this->input->post('door_no'),
            'contact_person'        => $this->input->post('contact_person'),
            'mobile_number'         => $this->input->post('mobile_number'),
            'pan_number'            => $this->input->post('pan_number'),
            
            'created_by'            => '',
            'created_on'            => date('Y-m-d H:i:s')
        );
		         
        return $this->db->insert('trv_share_application', $share_details);
    }
    
    
    function updateShareApplicationByFPO($share_application_id) {
        $share_details = array(	
            'apply_date'            => $this->input->post('share_date'),
            'no_of_share'           => $this->input->post('no_of_share'),
            'pin_code'              => $this->input->post('pin_code'),
            'state'                 => $this->input->post('state'),
            'district'              => $this->input->post('district'),
            'block'                 => $this->input->post('area_block'),
            'taluk'                 => $this->input->post('taluk'),
            'gram_panchayat'        => $this->input->post('gram_panchayat'),
            'village'               => $this->input->post('village'),
            'street'                => $this->input->post('street_name'),
            'door_no'               => $this->input->post('door_no'),
            'contact_person'        => $this->input->post('contact_person'),
            'mobile_number'         => $this->input->post('mobile_number'),
            'pan_number'            => $this->input->post('pan_number')
        );
		         
		return $this->db->update('trv_share_application', $share_details, array('id' => $share_application_id));
    }            
/** Share Application End **/ 
            
    
    /** Share Application Allotment Starts **/ 
    function postShareAllotment() {
        $share_application = $this->input->post('share_application');
        for($i=0; $i<count($share_application); $i++) {
            $share_details = array(	
                'allotment_nature'     => $this->input->post('allotment_nature'),
                'resolution_number'    => $this->input->post('resolution_number'),
                'resolution_date'      => $this->input->post('resolution_date'),
                'member_type'          => $share_application[$i]['member_type'],
                'holder_id'            => $share_application[$i]['holder_id'],
                'folio_number'         => $share_application[$i]['folio_no'],
                'share_applied'        => $share_application[$i]['share_applied'],
                'share_allotted'       => $share_application[$i]['share_alloted'],

                'created_by'           => '',
                'created_on'           => date('Y-m-d H:i:s')
            );
            $this->db->insert('trv_share_allotment', $share_details);
            
            $shareapplication_status = array(               
               'status' => 2
            );	            	
            $this->db->update('trv_share_application', $shareapplication_status, array('id' => $share_application[$i]['application_id']));
        }
        return true;
    }    
    /** Share Application Allotment End **/ 
    
    
    
    function getLocationByFpo($fpo_id) {
        $this->db->select('trv_fpo.id, trv_fpo.pin_code, trv_fpo.state, trv_fpo.district, trv_fpo.block, trv_fpo.taluk_id, trv_fpo.panchayat, trv_fpo.village, trv_fpo.street, trv_fpo.door_no, trv_fpo.mobile, trv_fpo.contact_person, trv_fpo.pan');        
        $this->db->where(array('trv_fpo.id' => $fpo_id));
        $this->db->from('trv_fpo');
        return $this->db->get()->result();	
    }
    
    
    function shareAppliedFarmers() {
        $this->db->select('trv_share_application.id, trv_share_application.holder_id, trv_farmer.profile_name');       
        $this->db->where(array('trv_share_application.status' => 1));
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'inner'); 
        $this->db->from('trv_share_application');
        return $this->db->get()->result();	
    }
    
    
    function searchFarmer() {  
        $this->db->select('trv_farmer.id, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.profile_name');
        if($this->input->post('mobilenumber') != null && $this->input->post('mobilenumber')) {
            $this->db->where(array('trv_farmer.mobile' => $this->input->post('mobilenumber'), 'trv_farmer.status' => 1));
        } else if($this->input->post('aadhaar_number') != null && $this->input->post('aadhaar_number')) {
            $this->db->where(array('trv_farmer.aadhar_no' => $this->input->post('aadhaar_number'), 'trv_farmer.status' => 1));
        }
        $this->db->from('trv_farmer');
        return $this->db->get()->result();	
    }
    
    
    function searchMemberToFarmer($farmer_id) {  
        $member_count = $this->db->get_where('trv_member', array('fpo_id' => $this->input->post('fpo_id'), 'member_id' => $farmer_id))->num_rows();
		return $member_count;
    }
    
    
    function searchFPO() {  
        $this->db->select('trv_fpo.id, trv_fpo.mobile');
        if($this->input->post('mobilenumber') != null && $this->input->post('mobilenumber')) {
            $this->db->where(array('trv_fpo.mobile' => $this->input->post('mobilenumber'), 'trv_fpo.status' => 1));
        } else {
            //$this->db->where(array('trv_fpo.aadhar_no' => $this->input->post('aadhaar_number'), 'trv_fpo.status' => 1));
        }
        $this->db->from('trv_fpo');
        return $this->db->get()->result();	
    }
    
    
    function searchMemberToFPO($fpo_id) {  
        $member_count = $this->db->get_where('trv_member', array('fpo_id' => $this->input->post('fpo_id'), 'member_id' => $fpo_id))->num_rows();
		return $member_count;
    }
    
    
    
    
    
    function getShareAlottmentID() {
      $query ="select * from trv_share_allotment order by id DESC limit 1";
      $res = $this->db->query($query);

      if($res->num_rows() > 0) {
            return $res->result("array");
      }else{
         return false;
      }
    }
    
    
    function fpoDropdownList() {
        $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name');       
        $this->db->where(array('trv_fpo.status' => 1));
        //$this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'inner'); 
        $this->db->from('trv_fpo');
        return $this->db->get()->result();	
    }
    
    
}

?>