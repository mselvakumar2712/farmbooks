<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
/** POPI Starts **/
    function popiList() {
        $this->db->select('popi.id,popi.name,popi.dob,popi.mobile_no,popi.aadhar_no');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('popi');
        return $this->db->get()->result();	
    }
    
    
    function addpopi() {
        $popi_details = array(	
	        'institution_type'          => $this->input->post('institution_type'),
            'institution_name'          => $this->input->post('institution_name'),
            'pin_code'                  => $this->input->post('pin_code'),
            'state'                     => $this->input->post('state'),
            'district'                  => $this->input->post('district'),
            'block'                     => $this->input->post('block'),
            'gram_panchayat'            => $this->input->post('gram_panchayat'),
            'village'                   => $this->input->post('village'),
            'door_no'                   => $this->input->post('door_no'),
            'street'                    => $this->input->post('street'),
            'std_code'                  => $this->input->post('std_code'),
            'land_line'                 => $this->input->post('land_line'),
            'mobile_num'                => $this->input->post('mobile_num'),
            'email'                     => $this->input->post('email'),
            'constitution'              => $this->input->post('constitution'),
            'date_formation'            => $this->input->post('date_formation'),
            'pan_promoting_institution' => $this->input->post('pan_promoting_institution'),
            'contact_person'            => $this->input->post('contact_person'),
            'nature_activity'           => $this->input->post('nature_activity'),
            'financial_year'            => $this->input->post('financial_year'),
            'business_commence'         => $this->input->post('business_commence'),
            'status'                    => $this->input->post('status')
        );
		         
        return $this->db->update('popi', $popi_details);
    }
    
    
    function popiByID($popi_id) {
        $this->db->where(array('id' => $popi_id, 'status' => '1'));
        $this->db->from('popi');
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
            'gram_panchayat'            => $this->input->post('gram_panchayat'),
            'village'                   => $this->input->post('village'),
            'door_no'                   => $this->input->post('door_no'),
            'street'                    => $this->input->post('street'),
            'std_code'                  => $this->input->post('std_code'),
            'land_line'                 => $this->input->post('land_line'),
            'mobile_num'                => $this->input->post('mobile_num'),
            'email'                     => $this->input->post('email'),
            'constitution'              => $this->input->post('constitution'),
            'date_formation'            => $this->input->post('date_formation'),
            'pan_promoting_institution' => $this->input->post('pan_promoting_institution'),
            'contact_person'            => $this->input->post('contact_person'),
            'nature_activity'           => $this->input->post('nature_activity'),
            'financial_year'            => $this->input->post('financial_year'),
            'business_commence'         => $this->input->post('business_commence'),
            'status'                    => $this->input->post('status')
        );     
		return $this->db->update('popi', $popi_details, array('id' => $popi_id));
    }
    
    
    function deletepopi( $popi_id ) {
        $popiid = array(               
	       'status' => 0
        );	            	
        return $this->db->update('popi', $popiid, array('id' => $popi_id));
	}
/** POPI End **/ 
    
    
    
    
/** FPO Starts **/
    function fpoList() {
        $this->db->select('fpo.id, fpo.name,fpo.dob,fpo.mobile_no,fpo.aadhar_no');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('fpo');
        return $this->db->get()->result();	
    }
    
    
    function addfpo() {
        $fpo_details = array(	
	        'institution_name'      => $this->input->post('institution_name'),
            'pin_code'              => $this->input->post('pin_code'),
            'state'                 => $this->input->post('state'),
            'district'              => $this->input->post('district'),
            'block'                 => $this->input->post('block'),
            'farmer_gram_panchayat' => $this->input->post('farmer_gram_panchayat'),
            'village'               => $this->input->post('village'),
            'street'                => $this->input->post('street'),
            'door_no'               => $this->input->post('door_no'),
            'std_code'              => $this->input->post('std_code'),
            'land_line'             => $this->input->post('land_line'),
            'mobile_num'            => $this->input->post('mobile_num'),
            'email'                 => $this->input->post('email'),
            'constitution'          => $this->input->post('constitution'),
            'date_formation'        => $this->input->post('date_formation'),
            'reg_no'                => $this->input->post('reg_no'),
            'pan'                   => $this->input->post('pan'),
            'tax_deduction'         => $this->input->post('tax_deduction'),
            'gst'                   => $this->input->post('gst'),
            'ie_code'               => $this->input->post('ie_code'),
            'contact_person_name'   => $this->input->post('contact_person_name'),
            'business_type'         => $this->input->post('business_type'),
            'business_nature'       => $this->input->post('business_nature'),
            'inventory_req'         => $this->input->post('inventory_req'),
            'financial_year'        => $this->input->post('financial_year'),
            'business_from'         => $this->input->post('business_from')
        );		         
        return $this->db->update('fpo', $fpo_details);
    }
    
    
    function fpoByID($fpo_id) {
        $this->db->where(array('id' => $fpo_id, 'status' => '1'));
        $this->db->from('fpo');
        return $this->db->get()->result();	
    }
    
    
    function updatefpo($fpo_id) {
        $fpo_details = array(	
	        'institution_name'      => $this->input->post('institution_name'),
            'pin_code'              => $this->input->post('pin_code'),
            'state'                 => $this->input->post('state'),
            'district'              => $this->input->post('district'),
            'block'                 => $this->input->post('block'),
            'farmer_gram_panchayat' => $this->input->post('farmer_gram_panchayat'),
            'village'               => $this->input->post('village'),
            'street'                => $this->input->post('street'),
            'door_no'               => $this->input->post('door_no'),
            'std_code'              => $this->input->post('std_code'),
            'land_line'             => $this->input->post('land_line'),
            'mobile_num'            => $this->input->post('mobile_num'),
            'email'                 => $this->input->post('email'),
            'constitution'          => $this->input->post('constitution'),
            'date_formation'        => $this->input->post('date_formation'),
            'reg_no'                => $this->input->post('reg_no'),
            'pan'                   => $this->input->post('pan'),
            'tax_deduction'         => $this->input->post('tax_deduction'),
            'gst'                   => $this->input->post('gst'),
            'ie_code'               => $this->input->post('ie_code'),
            'contact_person_name'   => $this->input->post('contact_person_name'),
            'business_type'         => $this->input->post('business_type'),
            'business_nature'       => $this->input->post('business_nature'),
            'inventory_req'         => $this->input->post('inventory_req'),
            'financial_year'        => $this->input->post('financial_year'),
            'business_from'         => $this->input->post('business_from')
        );
		return $this->db->update('fpo', $fpo_details, array('id' => $fpo_id));
    }
    
    
    function deletefpo( $fpo_id ) {
        $fpoid = array(               
	       'status' => 0
        );	            	
        return $this->db->update('fpo', $fpoid, array('id' => $fpo_id));
	}
/** FPO End **/   
    
    
    
    
/** FIG Starts **/
    function figList() {
        $this->db->select('fig.id,fig.name,fig.dob,fig.mobile_no,fig.aadhar_no');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('fig');
        return $this->db->get()->result();	
    }
    
    
    function addfig() {
        $fig_details = array(	
	        'pin_code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'gram_panchayat'    => $this->input->post('gram_panchayat'),
            'village'           => $this->input->post('village'),
            'interest_group'    => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );		         
        return $this->db->update('fig', $fig_details);
    }
    
    
    function figByID($fig_id) {
        $this->db->where(array('id' => $fig_id, 'status' => '1'));
        $this->db->from('fig');
        return $this->db->get()->result();	
    }
    
    
    function updatefig($fig_id) {
        $fig_details = array(	
	        'pin_code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'gram_panchayat'    => $this->input->post('gram_panchayat'),
            'village'           => $this->input->post('village'),
            'interest_group'    => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );       
		return $this->db->update('fig', $fig_details, array('id' => $fig_id));
    }
    
    
    function deletefig( $fig_id ) {
        $figid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('fig', $figid, array('id' => $fig_id));
	}
/** FIG End **/      
    
    

    

/** FIG Representative Starts **/
    function figrepresentList() {
        $this->db->select('fig.id,fig.name,fig.dob,fig.mobile_no,fig.aadhar_no');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('figrepresent');
        return $this->db->get()->result();	
    }
    
    
    function mobile_or_aadhar_exists($mobile_or_aadhaar) {
        $mobile_or_aadhaar_count = $this->db->get_where('figrepresent', array('mobile_or_aadhaar' => $mobile_or_aadhaar))->num_rows();
		return $mobile_or_aadhaar_count;	
    }
    
    
    function addfigrepresent() {
        $figrepresent_details = array(	
	        'mobile_or_aadhaar'     => $this->input->post('mobile_or_aadhaar'),
            'representative_type'   => $this->input->post('representative_type'),
            'date_of_appointment'   => $this->input->post('date_of_appointment'),
        );		         
        return $this->db->update('figrepresent', $figrepresent_details);
    }
    
    
    function figrepresentByID( $figrepresent_id ) {
        $this->db->where(array('id' => $figrepresent_id, 'status' => '1'));
        $this->db->from('figrepresent');
        return $this->db->get()->result();	
    }
    
    
    function updatefigrepresent( $figrepresent_id ) {
        $figrepresent_details = array(	
	        'mobile_or_aadhaar'    => $this->input->post('mobile_or_aadhaar'),
            'representative_type'  => $this->input->post('representative_type'),
            'date_of_appointment'  => $this->input->post('date_of_appointment'),
        );        
		return $this->db->update('figrepresent', $figrepresent_details, array('id' => $figrepresent_id));
    }
    
    
    function deletefigrepresent( $figrepresent_id ) {
        $figid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('figrepresent', $figid, array('id' => $figrepresent_id));
	}
/** FIG Representative End **/         
    
    
    
    
    
    
/** FPG Starts **/
    function fpgList() {
        $this->db->select('fpg.id,fpg.name,fpg.dob,fpg.mobile_no,fpg.aadhar_no');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('fpg');
        return $this->db->get()->result();	
    }
    
    
    function addfpg() {
        $fpg_details = array(	
	        'pin_code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'gram_panchayat'    => $this->input->post('gram_panchayat'),
            'village'           => $this->input->post('village'),
            'interest_group'    => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );		         
        return $this->db->update('fpg', $fpg_details);
    }
    
    
    function fpgByID( $fpg_id ) {
        $this->db->where(array('id' => $fpg_id, 'status' => '1'));
        $this->db->from('fpg');
        return $this->db->get()->result();	
    }
    
    
    function updatefpg( $fpg_id ) {
        $fpg_details = array(	
	        'pin_code'          => $this->input->post('pin_code'),
            'state'             => $this->input->post('state'),
            'district'          => $this->input->post('district'),
            'block'             => $this->input->post('block'),
            'gram_panchayat'    => $this->input->post('gram_panchayat'),
            'village'           => $this->input->post('village'),
            'interest_group'    => $this->input->post('interest_group'),
            'status'            => $this->input->post('status')            
        );       
		return $this->db->update('fpg', $fig_details, array('id' => $fpg_id));
    }
    
    
    function deletefpg( $fpg_id ) {
        $fpgid= array(               
	       'status' => 0
        );	            	
        return $this->db->update('fpg', $fpgid, array('id' => $fpg_id));
	}
/** FPG End **/  
    
    
}

?>