<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Member_Model extends CI_Model {
   function __construct() {
        parent::__construct();
        $this->load->database();
   }    
    
    function memberList(){
		$this->db->select('trv_member.id, trv_member.member_type,trv_member.status,trv_fig.FIG_Name, trv_farmer.profile_name, trv_farmer.aadhar_no,trv_fpo.producer_organisation_name,trv_fpo.mobile as fpo_mobile,trv_farmer.mobile as farmer_mobile');        
        $this->db->order_by("id", "desc");
        $this->db->from('trv_member');
        $this->db->join('trv_fig', 'trv_fig.id = trv_member.fig_id');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_member.member_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_member.member_id', 'left');
		$this->db->where(array('trv_member.status' => 1, 'trv_member.fpo_id' => $_SESSION['user_id']));
        return $this->db->get()->result();
    }
    
    
    function postMember(){ 
        if($this->input->post('member_type') == 1) {
            $member_id = $this->input->post('holder_id');
			$mobileNumber = $this->input->post('person_mobile');
			$shareValue = $this->input->post('person_no_of_share');
			$applicationDate = $this->input->post('farmer_application_date');
        } else {
            $member_id = $this->input->post('holder_id'); 
			$mobileNumber = $this->input->post('mobile_number');
			$shareValue = $this->input->post('fpo_no_of_share');
			$applicationDate = $this->input->post('fpo_date');
        }
        if($this->input->post('alloted_share_paid') == 1) {
            $member_details = array(	
                'member_type'        => $this->input->post('member_type'),
                'fpo_id'             => $this->session->userdata('user_id'),
                'fig_id'             => $this->input->post('fig_name1'),
                'member_id'          => $member_id,
                'share_paid'         => $this->input->post('alloted_share_paid'),
                'share_allotment_id' => "",

                'created_by'         => $this->session->userdata('user_id'),
                'created_on'         => date('Y-m-d H:i:s')
            );
            return $this->db->insert('trv_member', $member_details);
        } else {
            			
			/*Getting the last inserted resolution number*/
			$last_allot = $this->db->select('resolution_number')->from('trv_share_history')->where(array('fpo_id' => $this->session->userdata('user_id'), 'allotment_nature' => 1, 'status' => 1))->order_by('resolution_number', 'desc')->get()->row();
			if($last_allot == null && !isset($last_allot)){
				$resolution_number = '1'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
			} else {
				$resolution_number = str_pad(($last_allot->resolution_number+1), 4, '0', STR_PAD_LEFT);
			}				
			
			/*Getting the last inserted folio number*/
			$allottedFolioCount = $this->Share_Model->getShareHoldersFolioCount($this->session->userdata('user_id'), null, null);
			if(!$allottedFolioCount && !isset($allottedFolioCount->folio_number)){
				$folio_number = str_pad((0+1), 4, '0', STR_PAD_LEFT);
			} else {
				$folio_number = str_pad(($allottedFolioCount->folio_number+1), 4, '0', STR_PAD_LEFT);
			}
			
			$applicationID = $this->db->select(array('id', 'no_of_share', 'no_share_approved'))->get_where('trv_share_application', array('mobile_number' => $mobileNumber, 'holder_id' => $member_id, 'member_type' => $this->input->post('member_type'), 'status' => 1))->row();			
			if($this->input->post('member_type') == 1){
				if(isset($applicationID) && isset($applicationID->no_of_share)){
					$noOfShare = ($applicationID->no_of_share+$shareValue);			
					$share_details = array(	
						'member_type'           => $this->input->post('member_type'),
						'fpo_id'                => $this->session->userdata('user_id'),
						'holder_id'             => $member_id,
						'apply_date'            => $applicationDate,
						'no_of_share'           => $noOfShare,
						'no_share_approved'		=> $noOfShare,
						'mobile_number'         => $mobileNumber,
						'status'                => 2,

						'created_by'            => $this->session->userdata('user_id'),
						'created_on'            => date('Y-m-d H:i:s')
					);  
					$this->db->update('trv_share_application', $share_details, array('id' => $applicationID->id));
					$share_application_id = $applicationID->id;
				} else {
					$noOfShare = $shareValue;	
					$share_details = array(	
						'member_type'           => $this->input->post('member_type'),
						'fpo_id'                => $this->session->userdata('user_id'),
						'holder_id'             => $member_id,
						'apply_date'            => $applicationDate,
						'no_of_share'           => $noOfShare,
						'no_share_approved'		=> $noOfShare,
						'mobile_number'         => $mobileNumber,
						'status'                => 2,

						'created_by'            => $this->session->userdata('user_id'),
						'created_on'            => date('Y-m-d H:i:s'),
						'updated_by'            => $this->session->userdata('user_id'),
						'updated_on'            => date('Y-m-d H:i:s')
					);   
					$this->db->insert('trv_share_application', $share_details);
					$share_application_id = $this->db->insert_id();
				}
                
                $shareallot_details = array(	
					'fpo_id'               => $this->session->userdata('user_id'),
					'application_id'	   => $share_application_id,
					'allotment_nature'     => 1,
					'resolution_number'    => $resolution_number,
					'resolution_date'      => $applicationDate,
					'member_type'          => $this->input->post('member_type'),
					'holder_id'            => $member_id,
					'folio_number'         => $folio_number,
					'existing_share'       => 0,
					'new_share'            => $noOfShare,
					'total_share_value'    => $noOfShare,
					'allotted_date'        => date('Y-m-d'),
					
					'created_by'           => $this->session->userdata('user_id'),
					'created_on'           => date('Y-m-d H:i:s'),
					'updated_by'           => $this->session->userdata('user_id'),
					'updated_on'           => date('Y-m-d H:i:s')
				);		
                $this->db->insert('trv_share_allotment', $shareallot_details);
                $share_allot_id = $this->db->insert_id();
                
				$share_history = array(	
					'fpo_id'               => $this->session->userdata('user_id'),
					'allotment_nature'     => 1,
					'resolution_number'    => $resolution_number,
					'resolution_date'      => $applicationDate,
					'member_type'          => $this->input->post('member_type'),
					'holder_id'            => $member_id,
					'folio_number'         => $folio_number,
					'share_applied'        => $noOfShare,
					'share_allotted'       => $noOfShare,
					'total_share_value'    => $noOfShare,
					'cut_off_date'         => date('Y-m-d H:i:s'),
					
					'created_by'           => $this->session->userdata('user_id'),
					'created_on'           => date('Y-m-d H:i:s'),
					'updated_by'           => $this->session->userdata('user_id'),
					'updated_on'           => date('Y-m-d H:i:s')
				);
				$this->db->insert('trv_share_history', $share_history);
				
                $member_details = array(	
                    'member_type'        => $this->input->post('member_type'),
                    'fpo_id'             => $this->session->userdata('user_id'),
                    'fig_id'             => $this->input->post('fig_name2'),
                    'member_id'          => $member_id,
                    'share_paid'         => $this->input->post('person_money_paid'),
                    'share_allotment_id' => $share_allot_id,

                    'created_by'         => $this->session->userdata('user_id'),
                    'created_on'         => date('Y-m-d H:i:s')
                );
            } else {             
				
				if(isset($applicationID) && isset($applicationID->no_of_share)){
					$noOfShare = ($applicationID->no_of_share+$shareValue);			
					$share_details = array(	
						'member_type'           => $this->input->post('member_type'),
						'fpo_id'                => $this->session->userdata('user_id'),
						'holder_id'             => $member_id,
						'apply_date'            => $applicationDate,
						'no_of_share'           => $noOfShare,
						'no_share_approved'		=> $noOfShare,
						'mobile_number'         => $mobileNumber,
						'pan_number'            => $this->input->post('pan_number'),
						'status'                => 2,

						'created_by'            => $this->session->userdata('user_id'),
						'created_on'            => date('Y-m-d H:i:s')
					);                
					$this->db->update('trv_share_application', $share_details, array('id' => $applicationID->id));
					$share_application_id = $applicationID->id;
				} else {
					$noOfShare = $shareValue;	
					$share_details = array(	
						'member_type'           => $this->input->post('member_type'),
						'fpo_id'                => $this->session->userdata('user_id'),
						'holder_id'             => $member_id,
						'apply_date'            => $applicationDate,
						'no_of_share'           => $noOfShare,
						'no_share_approved'		=> $noOfShare,
						'mobile_number'         => $mobileNumber,
						'pan_number'            => $this->input->post('pan_number'),
						'status'                => 2,

						'created_by'            => $this->session->userdata('user_id'),
						'created_on'            => date('Y-m-d H:i:s'),
						'updated_by'            => $this->session->userdata('user_id'),
						'updated_on'            => date('Y-m-d H:i:s')
					);                
					$this->db->insert('trv_share_application', $share_details);
					$share_application_id = $this->db->insert_id();
				}
                
                $shareallot_details = array(	
					'fpo_id'               => $this->session->userdata('user_id'),
					'application_id'	   => $share_application_id,
					'allotment_nature'     => 1,
					'resolution_number'    => $resolution_number,
					'resolution_date'      => $applicationDate,
					'member_type'          => $this->input->post('member_type'),
					'holder_id'            => $member_id,
					'folio_number'         => $folio_number,
					'existing_share'       => 0,
					'new_share'            => $noOfShare,
					'total_share_value'    => $noOfShare,
					'allotted_date'        => $applicationDate,
					
					'created_by'           => $this->session->userdata('user_id'),
					'created_on'           => date('Y-m-d H:i:s'),
					'updated_by'           => $this->session->userdata('user_id'),
					'updated_on'           => date('Y-m-d H:i:s')
				);		
                $this->db->insert('trv_share_allotment', $shareallot_details);
                $share_allot_id = $this->db->insert_id();
				
				$share_history = array(	
					'fpo_id'               => $this->session->userdata('user_id'),
					'allotment_nature'     => 1,
					'resolution_number'    => $resolution_number,
					'resolution_date'      => $applicationDate,
					'member_type'          => $this->input->post('member_type'),
					'holder_id'            => $member_id,
					'folio_number'         => $folio_number,
					'share_applied'        => $noOfShare,
					'share_allotted'       => $noOfShare,
					'total_share_value'    => $noOfShare,
					'cut_off_date'         => date('Y-m-d H:i:s'),
					
					'created_by'           => $this->session->userdata('user_id'),
					'created_on'           => date('Y-m-d H:i:s'),
					'updated_by'           => $this->session->userdata('user_id'),
					'updated_on'           => date('Y-m-d H:i:s')
				);
				$this->db->insert('trv_share_history', $share_history);
                
                $member_details = array(	
                    'member_type'           => $this->input->post('member_type'),
                    'fpo_id'                => $this->session->userdata('user_id'),
                    'fig_id'                => $this->input->post('fig_name3'),
                    'member_id'             => $member_id,
                    'share_paid'            => $this->input->post('fpo_money_paid'),
                    'share_allotment_id'    => $share_allot_id,

                    'created_by'            => $this->session->userdata('user_id'),
                    'created_on'            => date('Y-m-d H:i:s')
                );
            }
            return $this->db->insert('trv_member', $member_details);
        }        		                
    }
	
	function registerFPO(){
          $total_fields = $this->Fpo_Model->get_fpo_last_id();
          $total_field = 0;
          if(!empty($total_fields)){
            $total_field = $total_fields[0]['id'];
          }
		  $popi_id=$this->db->select('trv_popi.id')->where(array('trv_popi.user_id' =>$this->input->post('popi_name')))->from('trv_popi')->get()->row()->id;
          $created_fpo_user_id = '3'.$this->input->post('stateCode').str_pad($popi_id, 3, '0', STR_PAD_LEFT).str_pad(($total_field+1), 2, '0', STR_PAD_LEFT);

        $fpo_details = array(  
            'popi_id'                       => $this->input->post('popi_name'),
            'user_id'                       => $created_fpo_user_id,
            'producer_organisation_name'    => $this->input->post('producer_organisation_name'),
            'pin_code'                      => $this->input->post('postcode'),
            'state'                         => $this->input->post('stateCode'),
            'district'                      => $this->input->post('districtCode'),
            'block'                         => $this->input->post('blockCode'),
            'panchayat'                     => $this->input->post('panchayatCode'),
            'village'                       => $this->input->post('villageCode'),
			'taluk_id'                      => $this->input->post('talukCode'),
            'street'                        => $this->input->post('streetName'),
            'door_no'                       => $this->input->post('doorNo'),
            'std_code'                      => $this->input->post('stdCode'),
            'land_line'                     => $this->input->post('landLineNo'),
            'mobile'                        => $this->input->post('mobile_num'),
            'email'                         => $this->input->post('email'),
            'constitution'                  => $this->input->post('constitution'),
            'date_formation'                => $this->input->post('date_formation'),
            'reg_no'                        => $this->input->post('reg_no'),
            'pan'                           => $this->input->post('pan'),
            'tax_deduction'                 => $this->input->post('tax_deduction'),
            'gst'                           => $this->input->post('gst'),
            'ie_code'                       => $this->input->post('ie_code'),
            'contact_person'                => $this->input->post('contact_person_name'),
            'business_type'                 => implode(',', $this->input->post('business_type')),
            'business_nature'               => implode(',', $this->input->post('business_nature')),
            'inventory_required'            => $this->input->post('inventory_required'),
            'financial_year'                => $this->input->post('financial_year'),
			'financial_year_to'             => $this->input->post('financial_year_to'),
            'business_commence'             => $this->input->post('business_commence'),
            'status'                        => 1
        ); 
        $this->db->insert('trv_fpo', $fpo_details);
        $last_inserted_fpo_id = $this->db->insert_id();        
        
        $user_details = array(  
            'user_type'         => 3,
            'user_id'           => $created_fpo_user_id,
            'username'          => $this->input->post('mobile_num'),
            'password'          => "123456",
            'status'            => 1,
            'is_verified'       => 1,
            'created_by'        => $last_inserted_fpo_id,
            'created_on'        => date('Y-m-d H:i:s'),
            'updated_by'        => $last_inserted_fpo_id,
            'updated_on'        => date('Y-m-d H:i:s')
        );
        return $this->db->insert('trv_user_auth', $user_details); 
    }
	
    
    
    function getMember($member_id){
        $this->db->where(array('trv_member.id' => $member_id, 'trv_member.status' => 1));
        $this->db->from('trv_member');
        return $this->db->get()->result();	
    }
    
	function getMemberById($member_id){
		$this->db->select('trv_member.*, trv_farmer.profile_name, trv_farmer.mobile As farmerMobile, trv_fpo.producer_organisation_name, trv_fpo.mobile As fpoMobile');
        $this->db->where(array('trv_member.id' => $member_id, 'trv_member.status' => 1));
        $this->db->from('trv_member');
		$this->db->join('trv_farmer', 'trv_farmer.id = trv_member.member_id');
		$this->db->join('trv_fpo', 'trv_fpo.id = trv_member.member_id');
        return $this->db->get()->row();	
    }
	function getShareInfoByMember($member_id, $member_type){
		$this->db->select('trv_share_allotment.total_share_value');
        $this->db->where(array('trv_share_allotment.holder_id' => $member_id, 'trv_share_allotment.member_type' => $member_type, 'trv_share_allotment.status' => 1));
        $this->db->from('trv_share_allotment');
        return $this->db->get()->row();	
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
        } else {
            $this->db->where(array('trv_share_application.member_type' => $this->input->post('member_type'), 'trv_share_application.mobile_number' => $this->input->post('mobilenumber'), 'trv_share_application.status' => 2));           
        }
        $this->db->from('trv_share_application');
        $this->db->join('trv_share_allotment', 'trv_share_allotment.holder_id = trv_share_application.holder_id', 'inner');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_share_application.fpo_id', 'left');
        return $this->db->get()->result();	
    }
    
    
    function getSearchMemberResult() {         
        if($this->input->post('member_type') == 1) {
            $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.mobile, trv_farmer.aadhar_no');
            $this->db->where(array('trv_farmer.mobile' => $this->input->post('mobilenumber'), 'trv_farmer.status' => 1));
            $this->db->from('trv_farmer');
            return $this->db->get()->result();
        } else {
            $this->db->select('trv_fpo.id, trv_fpo.user_id, trv_fpo.producer_organisation_name, trv_fpo.mobile');
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
 
    function verifyRegisteredNumber( $mobile_number ) {
        $user_count = $this->db->get_where('trv_user_auth', array('username' => $mobile_number))->num_rows();
		return $user_count;
    }
	
	function popiDropDownList(){
        $this->db->select('trv_popi.id, trv_popi.user_id, trv_popi.institution_name');
        $this->db->where(array('trv_popi.status' => 1));
        $this->db->order_by("trv_popi.id", "desc");
        $this->db->from('trv_popi');
        return $this->db->get()->result();	

    }
}

?>