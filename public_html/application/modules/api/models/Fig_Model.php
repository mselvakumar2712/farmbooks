<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Fig_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

/** FIG Starts **/
    function figList() {
        $this->db->select('trv_fig.*, trv_fpo.producer_organisation_name, trv_village_master.name AS village_name, trv_panchayat_master.name AS panchayat_name, trv_block_master.name AS block_name, trv_fpo.producer_organisation_name, trv_fpo.popi_id');
        //$this->db->where(array('trv_fig.status' => '1'));
        $this->db->order_by("trv_fig.id", "desc");
        $this->db->from('trv_fig');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fig.VillageID');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.id = trv_fig.Gram_PanchayatID');
        $this->db->join('trv_block_master', 'trv_block_master.id = trv_fig.block');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_fig.fpo_id', 'inner');
        if($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2) {
            $this->db->join('trv_popi', 'trv_popi.id = trv_fpo.popi_id', 'inner');
        }    
        return $this->db->get()->result();	
    }
    
    
    function addfig() {
        $fig_details = array(	
	        'fpo_id'            => $this->input->post('fpo_name'),
            'PIN_Code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'Gram_PanchayatID'  => $this->input->post('gram_panchayat'),
            'VillageID'         => $this->input->post('village'),
            'FIG_Name'          => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );
        return $this->db->insert('trv_fig', $fig_details);
    }
    
    
    function figByID($fig_id) {
        $this->db->where(array('id' => $fig_id));
        $this->db->from('trv_fig');
        return $this->db->get()->result();	
    }
    
    
    function updatefig($fig_id) {
        $fig_details = array(	
//            'fpo_id'            => $this->input->post('fpo_name'),
	        'PIN_Code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'Gram_PanchayatID'  => $this->input->post('gram_panchayat'),
            'VillageID'         => $this->input->post('village'),
            'FIG_Name'          => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );     
		return $this->db->update('trv_fig', $fig_details, array('id' => $fig_id));
    }
    
    
    function deletefig( $fig_id ) {
        $figid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_fig', $figid, array('id' => $fig_id));
	}
    
    
    function figByUserID($user_id) {
        $this->db->select('trv_fig.*, trv_fpo.producer_organisation_name As fpo_name, trv_village_master.name As village_name, , trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, , trv_district_master.name As district_name, , trv_state_master.name As state_name');        
        $this->db->from('trv_fig');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fig.VillageID');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.id = trv_fig.Gram_PanchayatID');
//        $this->db->join('trv_taluk_master', 'trv_taluk_master.id = trv_fig.taluk');
        $this->db->join('trv_block_master', 'trv_block_master.id = trv_fig.block');
        $this->db->join('trv_district_master', 'trv_district_master.id = trv_fig.district');
        $this->db->join('trv_state_master', 'trv_state_master.id = trv_fig.state');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_fig.fpo_id');
        $this->db->where(array('trv_fig.user_id' => $user_id, 'trv_fig.status' => '1'));
        return $this->db->get()->result();
    }
    
/** FIG End **/      
    
    

    

/** FIG Representative Starts **/
    function figrepresentList() {
       $this->db->select('trv_fig_representative.id, trv_fig_representative.representative_type, trv_fig_representative.appointment_date, trv_fig.FIG_Name, trv_farmer.profile_name, trv_fpo.producer_organisation_name');        
        $this->db->order_by("id", "desc");
        $this->db->from('trv_fig_representative');
        $this->db->join('trv_fig', 'trv_fig.id = trv_fig_representative.fig_id');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_fig_representative.member_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_fig_representative.member_id', 'left');
        $this->db->where(array('trv_fig_representative.status' => 1));
        return $this->db->get()->result();	
    }
    
    
    function mobile_or_aadhar_exists($mobile_or_aadhaar) {
        $mobile_or_aadhaar_count = $this->db->get_where('trv_fig_representative', array('Representative_mobile_aadhar_no' => $mobile_or_aadhaar))->num_rows();
		return $mobile_or_aadhaar_count;	
    }
    
    
    function addfigrepresent() {
        $figrepresent_details = array(	
			'fig_id'                 => $this->input->post('fig_name'),
            'member_id'              => $this->input->post('member_id'),
	        'membership_id'          => $this->input->post('membership_id'),
            'representative_type'    => $this->input->post('representative_type'),
            'appointment_date'       => $this->input->post('appointment_date'),
        );		         
        return $this->db->insert('trv_fig_representative', $figrepresent_details);
	}
    
    
    function figrepresentByID( $figrepresent_id ) {
        $this->db->select('trv_fig_representative.*, trv_fig.FIG_Name, trv_fig.fpo_id');        
        $this->db->order_by("id", "desc");
        $this->db->from('trv_fig_representative');
        $this->db->join('trv_fig', 'trv_fig.id = trv_fig_representative.fig_id');
        $this->db->where(array('trv_fig_representative.status' => 1));
        return $this->db->get()->result();	
    }
    
    
    function updatefigrepresent( $figrepresent_id ) {
        $figrepresent_details = array(				
            'terminated_on'                    => $this->input->post('terminate_date'),
            'reason'                              => $this->input->post('reason'),
			'status'                              => 2,
        );   
		return $this->db->update('trv_fig_representative', $figrepresent_details, array('id' => $figrepresent_id));
    }
    
    
    function deletefigrepresent( $figrepresent_id ) {
        $figid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_fig_representative', $figid, array('id' => $figrepresent_id));
	}
    
    
/** FIG Representative End **/           
    function fpoDropdownList() {
        $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name');
        $this->db->from('trv_fpo');
		$this->db->distinct();
        $this->db->where(array('trv_fpo.status' => '1'));
        return $this->db->get()->result();
    }
    
    
	//fpodropdownlist	
	function fpoDropdown_List($popi_id) {
        $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name,trv_fpo.popi_id');
        $this->db->from('trv_fpo');
		$this->db->distinct();
        $this->db->where(array('trv_fpo.popi_id' => $popi_id,'trv_fpo.status' => '1'));
        return $this->db->get()->result();
    }
    
    
	//fpodropdownlist	
	function figDropdown_List($fpo_id) {
        $this->db->select('trv_fig.id, trv_fig.FIG_Name');
        $this->db->from('trv_fig');
		$this->db->distinct();
        $this->db->where(array('trv_fig.fpo_id' => $fpo_id, 'trv_fig.status' => '1'));
        return $this->db->get()->result();
    }
    
    
	//check farmer mobile number
	function memberExists() {
        if($this->input->post('mobilenumber') && $this->input->post('mobilenumber') != "") {
            $this->db->select('trv_member.id, trv_member.member_type, trv_member.member_id, trv_farmer.profile_name, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.status, trv_fpo.producer_organisation_name, trv_fpo.mobile As fpo_mobile');
            $this->db->from('trv_member');
            $this->db->join('trv_farmer', 'trv_farmer.id = trv_member.member_id', 'left');
            $this->db->join('trv_fpo', 'trv_fpo.id = trv_member.member_id', 'left');
            $this->db->where(array('trv_farmer.mobile' => $this->input->post('mobilenumber')));
            $this->db->or_where(array('trv_fpo.mobile' => $this->input->post('mobilenumber')));
            return $this->db->get()->result();
        } else {
            $this->db->select('trv_member.id, trv_member.member_type, trv_member.member_id, trv_farmer.profile_name, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.status');
            $this->db->from('trv_member');
            $this->db->join('trv_farmer', 'trv_farmer.id = trv_member.member_id', 'left');
            $this->db->where(array('trv_farmer.aadhar_no' => $this->input->post('aadhaar_number'), 'trv_farmer.status' => 1));
            return $this->db->get()->result();
        }
    }
    
	function farmersProfileList($mobile) {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.status');
        $this->db->order_by("id", "desc");
        $this->db->from('trv_farmer');
        $this->db->where(array('trv_farmer.mobile' => $mobile,'trv_farmer.status' => '1'));
        return $this->db->get()->result();	
    }
	
	//check farmer mobile number
	function getmember($memeber_ship) {
            $this->db->select('trv_member.id, trv_member.member_type, trv_member.member_id, trv_farmer.profile_name, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.status, trv_fpo.producer_organisation_name, trv_fpo.mobile As fpo_mobile');
            $this->db->from('trv_member');
            $this->db->join('trv_farmer', 'trv_farmer.id = trv_member.member_id', 'left');
            $this->db->join('trv_fpo', 'trv_fpo.id = trv_member.member_id', 'left');
            $this->db->or_where(array('trv_member.id' => $memeber_ship));
            return $this->db->get()->result();
    }
	
}

?>