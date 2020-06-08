<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Share_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

    function farmerShareApplicationList() {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->where(array('trv_share_application.member_type' => 1));
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
        $this->db->where(array('trv_share_application.member_type' => 2));
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
            'mobile_number'         => $this->input->post('mobile_number'),
            'aadhaar_number'        => $this->input->post('aadhaar'),
            'nominee_name'          => $this->input->post('nominee_name'),
            'nominee_father_name'   => $this->input->post('nominee_father_name'),
            
            'created_by'            => '',
            'created_on'            => date('Y-m-d H:i:s')
        );
		         
        return $this->db->insert('trv_share_application', $share_details);
    }
    
    
    function shareApplicationByID($share_application_id) {
        $this->db->where(array('trv_share_application.id' => $share_application_id));
        $this->db->from('trv_share_application');
        return $this->db->get()->result();	
    }
	
    function shareApplicationID($share_application_id) {
        $this->db->select('trv_share_application.*,trv_state_master.name As state_name,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name,trv_district_master.name As district_name,trv_taluk_master.name As taluk_name');        
   		$this->db->from('trv_share_application');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_share_application.state');
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_share_application.district');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_share_application.taluk');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_share_application.block');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_share_application.village','left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_share_application.gram_panchayat','left');
        $this->db->where(array('trv_share_application.id' => $share_application_id));        
        return $this->db->get()->row_array();	
    }
    
    
    function updateShareApplication($share_application_id) {
        $share_details = array(	
            'apply_date'            => $this->input->post('share_date'),
            'no_of_share'           => $this->input->post('no_of_share'),
            'pan_number'            => $this->input->post('pan_number'),
            'aadhaar_number'        => $this->input->post('aadhaar'),
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
            'mobile_number'         => $this->input->post('search_fpo'),
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
            $this->db->where(array('trv_farmer.aadhar_no' => preg_replace('/\s+/', '', $this->input->post('aadhaar_number')), 'trv_farmer.status' => 1));
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
	
	function get_farmer_list() {
 	   $data = array();
       $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.mobile');
	   $this->db->from('trv_farmer');
	   $this->db->join('trv_share_allotment', 'trv_farmer.id = trv_share_allotment.holder_id');  
	   $result = $this->db->get()->result();
       foreach($result as $obj) {
           $data[$obj->id] = array('profile_name' => $obj->profile_name, 'mobile' => $obj->mobile);
       }
       return $data;
    }

    function get_fpo_list() {
	   $data = array();
       $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name, trv_fpo.mobile');
	   $this->db->from('trv_fpo');
	   $this->db->join('trv_share_allotment', 'trv_fpo.id = trv_share_allotment.holder_id'); 
	   $result = $this->db->get()->result();
       foreach($result as $obj) {
           $data[$obj->id] = array('producer_organisation_name' => $obj->producer_organisation_name, 'mobile' => $obj->mobile);
       }
       return $data;
    }
	
	function get_fpo_under_popi() {
       $data = array();
       $this->db->select('trv_fpo.id');
	   $this->db->from('trv_fpo');
	   if($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2) {
			$this->db->where(array('trv_fpo.popi_id' => $this->session->userdata('logger_id'), 'trv_fpo.status' => '1'));
       } else {
			$this->db->where(array('trv_fpo.status' => '1'));
       }
       $this->db->join('trv_popi', 'trv_popi.id = trv_fpo.popi_id', 'inner');
       $result = $this->db->get()->result();	
       foreach($result as $obj) {
			array_push($data, $obj->id);
       }
       return $data;
    }
	
    function shareHoldersList() {
      $data_farmer = $this->get_farmer_list();
      $data_fpo = $this->get_fpo_list();
	  $data_fpo_under_popi = $this->get_fpo_under_popi();
      $this->db->select('member_type, holder_id, folio_number, total_share_value');       
      $this->db->from('trv_share_allotment');
	  if(count($data_fpo_under_popi)) {
		$this->db->where_in('trv_share_allotment.fpo_id', $data_fpo_under_popi); 
	  }
      $this->db->order_by("id", "desc");
      $result = $this->db->get()->result();	
      foreach($result as $key => $obj) {
         if($obj->member_type == 1) {
            $result[$key]->shareholder_name = $data_farmer[$obj->holder_id]['profile_name'];
            $result[$key]->mobile_no = $data_farmer[$obj->holder_id]['mobile'];
         }
         else if($obj->member_type == 2) {
            $result[$key]->shareholder_name = $data_fpo[$obj->holder_id]['producer_organisation_name'];
            $result[$key]->mobile_no = $data_fpo[$obj->holder_id]['mobile'];
         }
      }
      return $result;
    }
	
    function viewShareDetails($folio_number) {
       $data_farmer = $this->get_farmer_list();
       $data_fpo = $this->get_fpo_list();
	   $data_fpo_under_popi = $this->get_fpo_under_popi();
	   $data_fpo_under_popi = $this->get_fpo_under_popi();	
       $this->db->select('trv_share_history.id, trv_share_history.allotment_nature, trv_share_history.member_type, trv_share_history.holder_id, trv_share_history.total_share_value, trv_share_history.certificate_num, trv_share_history.distinctive_from, trv_share_history.distinctive_to, trv_share_allotment.allotted_date');       
       $this->db->from('trv_share_history');
       $this->db->where(array('trv_share_allotment.folio_number' => $folio_number));
	   if(count($data_fpo_under_popi)) {
		$this->db->where_in('trv_share_allotment.fpo_id', $data_fpo_under_popi); 
	   }
       $this->db->order_by("trv_share_history.id", "asc");
       $this->db->join('trv_share_allotment', 'trv_share_history.folio_number = trv_share_allotment.folio_number', 'inner');
       $result = $this->db->get()->result();
       foreach($result as $key => $obj) {
           if($obj->member_type == 1) {
               $result[$key]->shareholder_name = $data_farmer[$obj->holder_id]['profile_name'];
           }
           else if($obj->member_type == 2) {
               $result[$key]->shareholder_name = $data_fpo[$obj->holder_id]['producer_organisation_name'];
           }
       }
       return $result;
    }
	
	/*shareapplication list */
	function shareValueList() {
		$this->db->select('trv_fpo_share_value.*,trv_fpo.producer_organisation_name as fpo_name');
		$this->db->from('trv_fpo_share_value');
		$this->db->join('trv_fpo', 'trv_fpo.id = trv_fpo_share_value.fpo_id', 'left');
		$this->db->where(array('trv_fpo_share_value.status' => 1));
		return $this->db->get()->result();		
	}
	function totalShareavailable(){
		//$get_available_shares = $this->db->select('SUM(total_share_value) as total')->from('trv_share_allotment')->where(array('status' => 1))->order_by("id", "desc")->get()->result_array();
		//$get_loggined_fpo = $this->db->select('*')->from('trv_fpo_share_value')->where(array('status' => 1))->order_by("id", "desc")->get()->result_array();		
		
		$q_shares = $this->db->query("SELECT fpo_id, SUM(total_share_value) as total FROM trv_share_allotment GROUP BY fpo_id");
		$r_shares = $q_shares->result();
		
		$q_share_value = $this->db->query("SELECT fpo_id, shares_released FROM trv_fpo_share_value");
		$r_share_value = $q_share_value->result();
		
		$result_share_value = array();
		foreach($r_share_value as $obj) {
			$result_share_value[$obj->fpo_id] = $obj->shares_released;
		}
		$result_shares = array();
		foreach($r_shares as $obj) {
			$result_shares[$obj->fpo_id] = $obj->total;
		}
		
		$shares_available = array();
		foreach($result_share_value as $key => $value) {
			if(!empty($result_shares[$key])) {
				$shares_available[$key] = $value - $result_shares[$key];
			}
			else {
				$shares_available[$key] = $value;
			}
		}
		return $shares_available;
		
		
		
		
		/*$get_share_total = $get_available_shares[0]['total'];
		if(count($get_loggined_fpo) !== 0){
		$get_share_released = $get_loggined_fpo[0]['shares_released'];
		}else{
			$get_share_released =0;
		}
		$total_available = $get_share_released - $get_share_total;
		return $total_available;*/
	}
    
    
}

?>