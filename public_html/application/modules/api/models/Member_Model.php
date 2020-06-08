<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Member_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    function memberList() {
        $this->db->select('trv_member.*');
        //$this->db->where(array('trv_member.member_type' => $this->input->post('member_type'), 'trv_member.status' => 1));
        $this->db->order_by("trv_member.id", "desc");
        $this->db->from('trv_member');
        return $this->db->get()->result();	
    }
    
    
    function postMember() {
        if($this->input->post('member_type') == 1) {
            $member_id = $this->input->post('holder_id');
        } else {
            $member_id = $this->input->post('holder_id'); 
        }
        if($this->input->post('alloted_share_paid') == 1) {
            $member_details = array(	
                'member_type'        => $this->input->post('member_type'),
                'fpo_id'             => $this->input->post('fpo_id'),
                'fig_id'             => $this->input->post('fig_name1'),
                'member_id'          => $member_id,
                'share_paid'         => $this->input->post('alloted_share_paid'),
                'share_allotment_id' => "",

                'created_by'         => '',
                'created_on'         => date('Y-m-d H:i:s')
            );
            return $this->db->insert('trv_member', $member_details);
        } else {
            if($this->input->post('fpo_id') && $this->input->post('fpo_id') != "") {
                $fpo_id = $this->input->post('fpo_id');
            } else {
                $fpo_id = $this->input->post('show_fpo_id'); 
            }
            
            if($this->input->post('member_type') == 1) {
                $share_details = array(	
                    'member_type'           => $this->input->post('member_type'),
                    'fpo_id'                => $fpo_id,
                    'holder_id'             => $member_id,
                    'apply_date'            => date('Y-m-d H:i:s'),
                    'no_of_share'           => $this->input->post('person_no_of_share'),
                    'mobile_number'         => $this->input->post('person_mobile'),
                    'aadhaar_number'        => $this->input->post('person_aadhaar_no'),

                    'created_by'            => '',
                    'created_on'            => date('Y-m-d H:i:s')
                );                
                $this->db->insert('trv_share_application', $share_details);
                $share_application_id = $this->db->insert_id();
                
                $shareallot_details = array(	
                    'allotment_nature'     => 1,
                    'resolution_number'    => "",
                    'resolution_date'      => "",
                    'member_type'          => $this->input->post('member_type'),
                    'holder_id'            => $member_id,
                    'folio_number'         => str_pad($share_application_id, 3, '0', STR_PAD_LEFT),
                    'share_applied'        => $this->input->post('person_no_of_share'),
                    'share_allotted'       => $this->input->post('person_no_of_share'),

                    'created_by'           => '',
                    'created_on'           => date('Y-m-d H:i:s')
                );
                $this->db->insert('trv_share_allotment', $shareallot_details);
                $share_allot_id = $this->db->insert_id();
                
                $member_details = array(	
                    'member_type'        => $this->input->post('member_type'),
                    'fpo_id'             => $fpo_id,
                    'fig_id'             => $this->input->post('fig_name2'),
                    'member_id'          => $member_id,
                    'share_paid'         => $this->input->post('person_money_paid'),
                    'share_allotment_id' => $share_allot_id,

                    'created_by'         => '',
                    'created_on'         => date('Y-m-d H:i:s')
                );
            } else {
                $share_details = array(	
                    'member_type'           => $this->input->post('member_type'),
                    'fpo_id'                => $fpo_id,
                    'holder_id'             => $member_id,
                    'apply_date'            => date('Y-m-d H:i:s'),
                    'no_of_share'           => $this->input->post('fpo_no_of_share'),
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
                $this->db->insert('trv_share_application', $share_details);
                $share_application_id = $this->db->insert_id();
                
                $shareallot_details = array(	
                    'allotment_nature'     => 1,
                    'resolution_number'    => "",
                    'resolution_date'      => "",
                    'member_type'          => $this->input->post('member_type'),
                    'holder_id'            => $member_id,
                    'folio_number'         => str_pad($share_application_id, 4, '0', STR_PAD_LEFT),
                    'share_applied'        => $this->input->post('fpo_no_of_share'),
                    'share_allotted'       => $this->input->post('fpo_no_of_share'),

                    'created_by'           => '',
                    'created_on'           => date('Y-m-d H:i:s')
                );
                $this->db->insert('trv_share_allotment', $shareallot_details);
                $share_allot_id = $this->db->insert_id();
                
                $member_details = array(	
                    'member_type'           => $this->input->post('member_type'),
                    'fpo_id'                => $fpo_id,
                    'fig_id'                => $this->input->post('fig_name3'),
                    'member_id'             => $member_id,
                    'share_paid'            => $this->input->post('fpo_money_paid'),
                    'share_allotment_id'    => $share_allot_id,

                    'created_by'            => '',
                    'created_on'            => date('Y-m-d H:i:s')
                );
            }
            
            return $this->db->insert('trv_member', $member_details);
//        } else {
//            return false;
        }        		         
        
    }
    
    
    function getMember($member_id) {
        $this->db->where(array('trv_member.id' => $member_id, 'trv_member.status' => 1));
        $this->db->from('trv_member');
        return $this->db->get()->result();	
    }
    
    
    function updateMember($member_id) {
        $member_details = array(	
            'apply_date'            => $this->input->post('share_date'),
            'no_of_share'           => $this->input->post('no_of_share'),
            'pan_number'            => $this->input->post('pan_number'),
            'aadhaar_number'        => $this->input->post('aadhaar_number'),
            'nominee_name'          => $this->input->post('nominee_name'),
            'nominee_father_name'   => $this->input->post('nominee_father_name')
        );
		         
		return $this->db->update('trv_member', $member_details, array('id' => $member_id));
    }
    
    
    function deleteMember( $member_id ) {
        $memberid = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_member', $memberid, array('id' => $member_id));
	}
    
    
    
    function searchShareAllotment() {  
        $this->db->select('trv_share_application.id, trv_share_application.member_type, trv_share_application.holder_id, trv_share_application.fpo_id, trv_farmer.profile_name, trv_farmer.mobile, trv_farmer.aadhar_no, trv_fpo.producer_organisation_name, trv_fpo.mobile As fpo_mobile, trv_share_allotment.id As share_holder_id');
        if($this->input->post('member_type') == 1) {
            $this->db->where(array('trv_share_application.member_type' => $this->input->post('member_type'), 'trv_share_application.mobile_number' => $this->input->post('mobilenumber'), 'trv_share_application.status' => 2));
            //$this->db->join('trv_share_allotment', 'trv_share_allotment.holder_id = trv_share_application.holder_id', 'inner');
        } else {
            $this->db->where(array('trv_share_application.member_type' => $this->input->post('member_type'), 'trv_share_application.mobile_number' => $this->input->post('mobilenumber'), 'trv_share_application.status' => 2));           
        }
        $this->db->from('trv_share_application');
        $this->db->join('trv_share_allotment', 'trv_share_allotment.holder_id = trv_share_application.holder_id', 'inner');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.fpo_id', 'left');
        return $this->db->get()->result();	
    }
    
    
    function getSearchMemberResult() {         
        if($this->input->post('member_type') == 1) {
            $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.mobile, trv_farmer.aadhar_no');
            $this->db->where(array('trv_farmer.mobile' => $this->input->post('mobilenumber'), 'trv_farmer.status' => 1));
            $this->db->from('trv_farmer');
            return $this->db->get()->result();
        } else {
            $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name, trv_fpo.mobile');
            $this->db->where(array('trv_fpo.mobile' => $this->input->post('mobilenumber'), 'trv_fpo.status' => 1));
            $this->db->from('trv_fpo');
            return $this->db->get()->result();
        }                	
    }
    
        
    function getAllFIGByFPO($fpo_id) {  
        $this->db->select('trv_fig.id, trv_fig.FIG_Name, trv_fig.fpo_id');
        $this->db->where(array('trv_fig.fpo_id' => $fpo_id, 'trv_fig.status' => 1));
        $this->db->distinct();
        $this->db->from('trv_fig');
        return $this->db->get()->result();	
    }
    
}

?>