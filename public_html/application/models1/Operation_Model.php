<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Operation_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
	function getLocationByFpo($fpo_id) {
        $this->db->select('trv_fpo.id, trv_fpo.pin_code, trv_fpo.state, trv_fpo.district, trv_fpo.block, trv_fpo.taluk_id, trv_fpo.panchayat, trv_fpo.village, trv_fpo.street, trv_fpo.door_no, trv_fpo.mobile, trv_fpo.contact_person, trv_fpo.pan');        
        $this->db->where(array('trv_fpo.user_id' => $fpo_id));
        $this->db->from('trv_fpo');
        return $this->db->get()->result();  
    }
	function getpanchayatByFpo($fpo_id) {
        $this->db->select('trv_fpo.id, trv_fpo.panchayat');        
        $this->db->where(array('trv_fpo.user_id' => $fpo_id, 'trv_fpo.status' => 1));
        $this->db->from('trv_fpo');
        return $this->db->get()->result();  
    }
	function getBlocksByFpo($fpo_id) {
        $this->db->select('trv_fpo.id, trv_fpo.block');        
        $this->db->where(array('trv_fpo.user_id' => $fpo_id, 'trv_fpo.status' => 1));
        $this->db->from('trv_fpo');
        return $this->db->get()->result();  
    }
	function getdistrictByFpo($fpo_id) {
        $this->db->select('trv_fpo.id,trv_fpo.district,trv_fpo.pin_code');        
        $this->db->where(array('trv_fpo.user_id' => $fpo_id));
        $this->db->from('trv_fpo');
        return $this->db->get()->result();  
    }
	 function getVillageByPanchayatcode( $panchayat_id ) {
     $this->db->select('trv_village_master.id, trv_village_master.panchayat_code, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
     $this->db->where(array('panchayat_code' => $panchayat_id, 'status' => '1') );
     $this->db->order_by("name", "asc");
     $this->db->from('trv_village_master');
     return $this->db->get()->result();
	}
	function getVillageByblockcode( $panchayat_id ) {
		$this->db->select('trv_village_master.id, trv_village_master.block_code, trv_village_master.name, trv_village_master.pincode, trv_village_master.status');
		$this->db->where_in('block_code', $panchayat_id);
        $this->db->from("trv_village_master");	
        return $this->db->get()->result();
	}
	function getfarmerByvillage( $village_id ) {
		$this->db->where_in('trv_farmer.village', $village_id);
		$this->db->where(array('status' => '1'));
        $this->db->from("trv_farmer");		
        $farmer_count = $this->db->get();
        $num_rows = $farmer_count->num_rows();
        return 	$num_rows;	
	}
    function getBlocksByDistrict($district_code) {
        $this->db->select('trv_block_master.block_code,trv_block_master.name');        
        $this->db->where(array('trv_block_master.district_code' => $district_code, 'trv_block_master.status' => 1));
        $this->db->from('trv_block_master');
        return $this->db->get()->result();  
    }  
	function add_director($fpo_id) {
      $add_director = array(
      'type_id'               => $this->input->post('director_type'),
      'fpo_id'               => $fpo_id,
      'name'                  => $this->input->post('director_name'),
      'father_name'           => $this->input->post('f_name'),
      'din	'               => $this->input->post('din'),
      'tenure'                => $this->input->post('tenure'),
      'retire_by_rotation'    => $this->input->post('retire'),
      'qualification'         => $this->input->post('qualification'),
      'date_of_appointment'   => $this->input->post('appointment_date'),
      'validity'              => $this->input->post('validity'),
      'gender'              => $this->input->post('gender'),
      'status'				=> 1
                        
     );	
     return $this->db->insert('trv_director', $add_director);
   }
	function director_list($fpo_id) { 
        $this->db->select('trv_director.*');
        $this->db->where(array('trv_director.fpo_id' => $fpo_id));
        $this->db->order_by("trv_director.id", "desc");
        $this->db->from('trv_director');
        return $this->db->get()->result();	
	} 
	function directorcommittee_list() {  
        $this->db->select('trv_director.*');
        $this->db->where(array('trv_director.status' => '1'));
        $this->db->order_by("trv_director.id", "desc");
        $this->db->from('trv_director');
        return $this->db->get()->result();	
	} 
	function directorByID($id) {
        $this->db->where(array('id' => $id,'status'=>1));
        $this->db->from('trv_director');
        return $this->db->get()->row_array();	
	}
	function update_director($director_id,$fpo_id){ 
      $update_director = array(
      //'fpo_id'          => $this->session->userdata('user_id'),
      'type_id'               => $this->input->post('director_type'),
      'name'                  => $this->input->post('director_name'),
      'father_name'           => $this->input->post('f_name'),
      'din	'               => $this->input->post('din'),
      'tenure'                => $this->input->post('tenure'),
      'retire_by_rotation'    => $this->input->post('retire'),
      'qualification'         => $this->input->post('qualification'),
      'date_of_appointment'   => $this->input->post('appointment_date'),
      'validity'              => $this->input->post('validity'),
      'gender'                => $this->input->post('gender'),
      'status'				=> 1			                  
      );	
		return $this->db->update('trv_director', $update_director, array('id' => $director_id,'fpo_id' => $fpo_id));
	}
	function directorlist() {       	 
      $this->db->select('trv_director.*');
      $this->db->from('trv_director');
      $this->db->where(array('trv_director.type_id' => 1,'trv_director.retire_by_rotation' => 1,'trv_director.status' => 1,'trv_director.fpo_id' =>$this->session->userdata('user_id')));
      $this->db->order_by("trv_director.id", "desc"); 
      return $this->db->get()->result();
    }
	function getdirectordetail($director_id) {
      $this->db->select('trv_director.*');
      $this->db->from('trv_director');
      $this->db->distinct();
      $this->db->where(array('trv_director.id' => $director_id, 'trv_director.status' => '1'));
      return $this->db->get()->result();		
    }
	function add_reappointment($director_id){ 
			$reappointment = array(
            //'fpo_id'          => $this->session->userdata('user_id'),
			//'type_id'               => $this->input->post('director_type'),
	        //'name'                  => $this->input->post('director'),
            //'father_name'           => $this->input->post('f_name'),
            'din	'               => $this->input->post('din'),
            'tenure'                => $this->input->post('tenure'),
            //'retire_by_rotation'    => $this->input->post('retire'),
			//'qualification'         => $this->input->post('qualification'),
			'reappointed_on'        => $this->input->post('appointment_date'),
			'validity'              => $this->input->post('validity'),
			'status'				=> 1
			                  
        );	
		return $this->db->update('trv_director', $reappointment, array('id' => $director_id));
	}
	function update_reappointment($director_id){ 
			$reappointment = array(
            //'fpo_id'          => $this->session->userdata('user_id'),
			//'type_id'               => $this->input->post('director_type'),
	        //'name'                  => $this->input->post('director'),
            //'father_name'           => $this->input->post('f_name'),
            'din	'               => $this->input->post('din'),
            'tenure'                => $this->input->post('tenure'),
            //'retire_by_rotation'    => $this->input->post('retire'),
			//'qualification'         => $this->input->post('qualification'),
			'reappointed_on'        => $this->input->post('appointment_date'),
			'validity'              => $this->input->post('validity'),
			'status'				=> 1
			                  
        );	
		return $this->db->update('trv_director', $reappointment, array('id' => $director_id));
	}
	function add_removal($director_id){ 
			/* if(($this->input->post('reason'))==8) {
			$reason=$this->input->post('other_reason');
		}else{
			$reason=$this->input->post('reason');
		} */
			$removal = array(
            //'fpo_id'          => $this->session->userdata('user_id'),
			//'type_id'               => $this->input->post('director_type'),
	        //'name'                  => $this->input->post('director'),
            //'father_name'           => $this->input->post('f_name'),
            //'din	'               => $this->input->post('din'),
            //'tenure'                => $this->input->post('tenure'),
            //'retire_by_rotation'    => $this->input->post('retire'),
			//'qualification'         => $this->input->post('qualification'),
			'terminated_on'        => $this->input->post('removal_date'),
			'reason'               => $this->input->post('reason'),
			'other_reason'         => $this->input->post('other_reason'),
			'status'			   => 2
			                  
        );	
		return $this->db->update('trv_director', $removal, array('id' => $director_id));
	}
	function reappoinment_list() {  
        $this->db->select('trv_director.*');
        $this->db->where(array('trv_director.type_id' => '1','trv_director.status' => '1','trv_director.fpo_id' =>$this->session->userdata('user_id')));
        $this->db->order_by("trv_director.id", "desc");
        $this->db->from('trv_director');
        return $this->db->get()->result();	
	}
	function reappoinmentById($id) {
        $this->db->where(array('id' => $id,'status'=>1));
        $this->db->from('trv_director');
        return $this->db->get()->row_array();	
	}
	function removallist($id) {
        $this->db->where(array('id' => $id,'status'=>2));
        $this->db->from('trv_director');
        return $this->db->get()->row_array();	
	}
	function removal_list() {
        $this->db->where(array('status'=>2,'trv_director.fpo_id' =>$this->session->userdata('user_id')));
        $this->db->from('trv_director');
        return $this->db->get()->result();	
	}
	function Alldirectorlist() {
      $fpo_id = $this->session->userdata('user_id');
      $this->db->select('trv_director.*');
      $this->db->from('trv_director');
		$this->db->where(array('trv_director.fpo_id' =>$fpo_id  ,'trv_director.status' => 1));
      $this->db->order_by("trv_director.id", "desc"); 
		return $this->db->get()->result();
    }

	function addincorporate() {
		$last_inserted_user_id = $this->session->userdata('user_id');
		
		$this->load->library('upload');
		
		 $image = array();
		 $ImageCount = count($_FILES['file_path']['name']);
		
        if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				$_FILES['file']['name']       = $_FILES['file_path']['name'][$i];
				$_FILES['file']['type']       = $_FILES['file_path']['type'][$i];
				$_FILES['file']['tmp_name']   = $_FILES['file_path']['tmp_name'][$i];
				$_FILES['file']['error']      = $_FILES['file_path']['error'][$i];
				$_FILES['file']['size']       = $_FILES['file_path']['size'][$i];
				$album= strtolower($this->session->userdata('user_id'));
				// File upload configuration
				$uploadPath = './assets/uploads/documents/'.$album;
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|pdf';
				$config['max_size']	= 512;
				$config['encrypt_name']	= TRUE;				
				$config['overwrite'] = TRUE;
				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!is_dir('./assets/uploads/documents/')) {
				mkdir('./assets/uploads/documents/', 0777, TRUE);
				}
				if (!is_dir('./assets/uploads/documents/'.$album)) {
					mkdir('./assets/uploads/documents/'.$album, 0777, TRUE);
				}						
				// Upload file to server
				if($this->upload->do_upload('file')){
					// Uploaded file data
					$imageData = $this->upload->data();
					$uploadImgData[] = $imageData['file_name'];

				}			
				
			}

			if(!empty($uploadImgData)){
				$add_incorporate = array(
				  'fpo_id'                     => $this->session->userdata('user_id'),	
				  'file_path'                  => implode(',',$uploadImgData),
				  'document_type'              => implode(',', $this->input->post('document_name')),
				  'file_type'                  => implode(',', $this->input->post('document_type')),
				  'created_by'                 => $last_inserted_user_id,
				  'created_on'                 => date('Y-m-d H:i:s'),                     
				);
				return $this->db->insert('trv_incorporation_document', $add_incorporate);          
			}
		}
    }
	
	
	function updateincorporate($id) {
		$last_inserted_user_id = $this->session->userdata('user_id');
         
		$this->load->library('upload');
		 $image = array();
		 $ImageCount = count($_FILES['file_path']['name']);
        if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				$_FILES['file']['name']       = $_FILES['file_path']['name'][$i];
				$_FILES['file']['type']       = $_FILES['file_path']['type'][$i];
				$_FILES['file']['tmp_name']   = $_FILES['file_path']['tmp_name'][$i];
				$_FILES['file']['error']      = $_FILES['file_path']['error'][$i];
				$_FILES['file']['size']       = $_FILES['file_path']['size'][$i];

				// File upload configuration
				$uploadPath = './assets/uploads/documents/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|pdf';
				$config['max_size']	= 512;
				$config['encrypt_name']	= TRUE;				
				$config['overwrite'] = TRUE;

				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server
				if($this->upload->do_upload('file')){
					// Uploaded file data
					$imageData = $this->upload->data();
					$uploadImgData[] = $imageData['file_name'];

				}
			}
			if(!empty($uploadImgData)){
				$add_incorporate = array(
				  'fpo_id'                     => $this->session->userdata('user_id'),	
				  'file_path'                  => implode(',',$uploadImgData),
				  'document_type'              => implode(',', $this->input->post('document_name')),
				  'file_type'                  => implode(',', $this->input->post('document_type')),
				  'created_by'                 => $last_inserted_user_id,
				  'created_on'                 => date('Y-m-d H:i:s'),                     
				);
		return $this->db->update('trv_incorporation_document', $update_incorporate, array('id' => $id));
			}
		}
    }
  
	function corporateByID($id) {    
		$this->db->select('trv_incorporation_document.*');
		$this->db->where(array('id' => $id));    
        $this->db->from('trv_incorporation_document');		
        return $this->db->get()->row_array();		  
	}	
	
	function delete_incorporate($po_id) {		
		$this->db->where('id', $po_id);		
		$this->db->delete('trv_incorporation_document'); 		
	}
	
	function orderdetailsByOrderno($orderid) {
		$this->db->select('trv_incorporation_document.*');
        $this->db->where(array('trv_incorporation_document.id' =>$orderid,'trv_incorporation_document.fpo_id' =>$this->session->userdata('user_id')));
        $this->db->from('trv_incorporation_document');
        return $this->db->get()->result_array();		        	
	}	
	
	function corporatelist() {  
      $fpo_id = $this->session->userdata('user_id');
      $this->db->select('trv_incorporation_document.*');
      $this->db->order_by("trv_incorporation_document.id", "desc");
      $this->db->where(array('trv_incorporation_document.fpo_id' => $fpo_id));
      $this->db->from('trv_incorporation_document');
      return $this->db->get()->result();	
   } 
   
   function noticelist() { 
      $fpo_id = $this->session->userdata('user_id');
      $this->db->select('trv_notice_to_director.*');
      $this->db->where(array('trv_notice_to_director.fpo_id' => $fpo_id));
      $this->db->order_by("trv_notice_to_director.id", "desc");
      $this->db->from('trv_notice_to_director');
      return $this->db->get()->result();	
   } 
   function getnoticedetail($fpo_id) {
	  //$fpoid=$this->session->userdata('user_id');
      $this->db->select('trv_notice_to_director.fpo_id, trv_notice_to_director.meeting_date');        
      $this->db->where(array('trv_notice_to_director.fpo_id' => $fpo_id));
      $this->db->from('trv_notice_to_director');
      return $this->db->get()->result();  
   }
   
    //constitution of board of directors getconstitutiondetail    
   function constitutionlist() { 
      $fpo_id = $this->session->userdata('user_id');   
      $this->db->select('trv_constitution_of_bod.*');
      //$this->db->join('trv_fpo_allowance_fee', 'trv_fpo_allowance_fee.fpo_id = trv_constitution_of_bod.fpo_id');
      //$this->db->join('trv_director', 'trv_director.id = trv_fpo_allowance_fee.director_id');
	   $this->db->where(array('trv_constitution_of_bod.fpo_id' => $fpo_id,'trv_constitution_of_bod.status' => 1));
	   $this->db->from('trv_constitution_of_bod');	 
      return $this->db->get()->result();	          
   } 
   function constitutionAllowanceList() { 
      $fpo_id = $this->session->userdata('user_id');   
      $this->db->select('trv_fpo_allowance_fee.director_id, trv_director.name As director_name');
      $this->db->join('trv_director', 'trv_director.id = trv_fpo_allowance_fee.director_id');
	   $this->db->where(array('trv_fpo_allowance_fee.fpo_id' => $fpo_id,'trv_fpo_allowance_fee.status' => 1));
	   $this->db->from('trv_fpo_allowance_fee');	 
      return $this->db->get()->result();	          
   } 
   function getconstitutiondetail($director_id) {
      $fpo_id=$this->session->userdata('user_id'); 
      $this->db->select('trv_fpo_allowance_fee.director_id,trv_fpo_allowance_fee.director_sitting_fee,trv_fpo_allowance_fee.director_allowance');
      $this->db->where(array('trv_fpo_allowance_fee.director_id' => $director_id,'trv_fpo_allowance_fee.fpo_id' => $fpo_id));
	   $this->db->from('trv_fpo_allowance_fee');	 
      return $this->db->get()->result();	
   } 
   function constitution_list() { 
    //  $fpo_id = $this->session->userdata('user_id');   
      $this->db->select('trv_constitution_of_bod.*');
	//  $this->db->join('trv_commitee_name', 'trv_commitee_name.id = trv_commitee_member.commitee_id');
	 // $this->db->where(array('trv_commitee_member.fpo_id' => $fpo_id));
	  $this->db->from('trv_constitution_of_bod');	 
      return $this->db->get()->result();	
   }  
   
   
   function constitutionByID($id) {    
		$this->db->select('trv_constitution_of_bod.*');
		$this->db->where(array('id' => $id));				
        $this->db->from('trv_constitution_of_bod');	
        return $this->db->get()->row_array();		  
	}
	
	function constitutiondate($id) {    
		$this->db->select('trv_fpo_allowance_fee.*,trv_fpo_allowance_fee.director_id,trv_director.name');
		$this->db->join('trv_director', 'trv_director.id = trv_fpo_allowance_fee.director_id');
        $this->db->from('trv_fpo_allowance_fee');		
        return $this->db->get()->result();		  
	}
	
	function getActiveConstitution() {  
 	  return $this->db->get_where('trv_constitution_of_bod', array('status' => 1, 'fpo_id' => $this->session->userdata('user_id')))->num_rows();	
    }
	
	
	function addconstitution(){ 		
			$add_user_details = array(	
				'fpo_id'                => $this->session->userdata('user_id'),
				'due_dates'          	=> implode(',',$this->input->post('due_dates')),
				'min_meetings_per_year' => $this->input->post('min_meetings_per_year'),
				'constitution_date'     => $this->input->post('constitution_date'),
				'created_by'        	=> $this->session->userdata('user_id'),
				'created_on'        	=> date('Y-m-d H:i:s')            	
			);	
			$this->db->insert('trv_constitution_of_bod', $add_user_details);
			
		$director_id = $this->input->post('director_id');
		$director_sitting_fee = $this->input->post('director_sitting_fee');
		$director_allowance = $this->input->post('director_allowance');
		$sitting_fee_from = $this->input->post('sitting_fee_from');
		$due_dates = $this->input->post('due_dates');		
		for($i=0;$i<count($director_id);$i++){
			 $constitution_details = array(            
				'fpo_id'                => $this->session->userdata('user_id'),
				'director_id'           => $director_id[$i],
				'sitting_fee_from'		=> $sitting_fee_from[$i],
				'director_sitting_fee'  => $director_sitting_fee[$i],
				'director_allowance'    => $director_allowance[$i],	
			);
			$this->db->insert('trv_fpo_allowance_fee', $constitution_details); 
		}
		
        return true;  
	} 

	 function updateconstitution($id) {
		$add_user_details = array(	
				'fpo_id'                => $this->session->userdata('user_id'),
				'due_dates'          	=> implode(',',$this->input->post('due_dates')),
				'min_meetings_per_year' => $this->input->post('min_meetings_per_year'),
				'constitution_date'     => $this->input->post('constitution_date'),							
				'created_by'        	=> $this->session->userdata('user_id'),
				'created_on'        	=> date('Y-m-d H:i:s') ,
				'updated_by'        	=> $this->session->userdata('user_id'),
			);	
        $this->db->update('trv_constitution_of_bod', $add_user_details);
		
		$director_id = $this->input->post('director_id');
		$constitution_id = $this->input->post('constitution_date_id');
		$director_sitting_fee = $this->input->post('director_sitting_fee');
		$director_allowance = $this->input->post('director_allowance');
		$sitting_fee_from = $this->input->post('sitting_fee_from');
		$due_dates = $this->input->post('due_dates');		
		for($i=0;$i<count($director_id);$i++){
			 $constitution_details = array(  
				'fpo_id'                => $this->session->userdata('user_id'),
				'director_id'           => $director_id[$i],
				'sitting_fee_from'		=> $sitting_fee_from[$i],
				'director_sitting_fee'  => $director_sitting_fee[$i],
				'director_allowance'    => $director_allowance[$i],
				
			);
			$this->db->update('trv_fpo_allowance_fee', $constitution_details, array('id' => $constitution_id[$i])); 
		}
		return true;
	}
   
   
    //committee members
   function directorId() {
		$this->db->select('trv_director.*');
		$this->db->join('trv_director', 'trv_director.id = trv_commitee_member.director_id');
        $this->db->where(array('trv_director.status' => '1'));
        $this->db->from('trv_director');
        return $this->db->get()->result();	
	} 
    function committee_member($id,$fpo_id){
		$this->db->select('director_id as id');
		$this->db->from('trv_commitee_member');      
      $this->db->join('trv_director', 'trv_director.id = trv_commitee_member.director_id');		
		$this->db->where(array('trv_commitee_member.commitee_id' =>$id,'trv_commitee_member.is_ceo' =>0,'trv_director.status' =>1));
      $directors = $this->db->get()->result_array();	
      
      $this->db->select('director_id as id');
		$this->db->from('trv_commitee_member');      
      $this->db->join('trv_fpo_ceo', 'trv_fpo_ceo.id = trv_commitee_member.director_id');		
		$this->db->where(array('trv_commitee_member.commitee_id' =>$id,'trv_commitee_member.is_ceo' =>1,'trv_fpo_ceo.status' =>1));
      $ceo = $this->db->get()->result();
      
      $ids = implode(',', array_column($directors, 'id'));
      $ids = explode(',',$ids);
      $this->db->select("id,name");
      $this->db->from('trv_director');
      $this->db->where(array('fpo_id' =>$fpo_id,'status' =>1));
      $this->db->where_not_in('id', $ids);
      $directors = $this->db->get()->result();
      
      $ids = implode(',', array_column($ceo, 'id'));
      $ids = explode(',',$ids);
      $this->db->select("id,CONCAT(name, ' - CEO') as name");
      $this->db->from('trv_fpo_ceo');
      $this->db->where(array('fpo_id' =>$fpo_id,'status' =>1));
      $this->db->where_not_in('id', $ids);
      $ceo = $this->db->get()->result();;
		if(!empty($ceo))
         $directors = array_merge($ceo, $directors);
      
		return $directors;	
		
	}
     
	 function getCEONameByID($ceo_id) { 
	  $this->db->select('trv_fpo_ceo.id, CONCAT(trv_fpo_ceo.name," - CEO") as name');
	  $this->db->where(array('trv_fpo_ceo.id' => $ceo_id, 'trv_fpo_ceo.status' => 1));
	  $this->db->from('trv_fpo_ceo');	 
      return $this->db->get()->result();	
   } 
   
   function getDirectorNameByID($director_id) { 
      $this->db->select('trv_director.name');
	  $this->db->where(array('trv_director.id' => $director_id, 'trv_director.status' => 1));
	  $this->db->from('trv_director');	 
      return $this->db->get()->result();	
   } 
	 
   function committeelist() { 
      $fpo_id = $this->session->userdata('user_id');   
      $this->db->select('id,commitee_name, commitee_date, status');
      $this->db->where(array('fpo_id' => $fpo_id));
      $this->db->from('trv_commitee_name');	 
      return $this->db->get()->result();	
   } 

   function notice_list($director_id) {
	  $fpo_id = $this->session->userdata('user_id');
      $this->db->select('trv_notice_to_director.*');        
      $this->db->where(array('trv_notice_to_director.fpo_id' => $fpo_id,'trv_notice_to_director.id'=> $director_id));
      $this->db->from('trv_notice_to_director');
      return $this->db->get()->result();  
   }

   function addcommittee(){  
		$add_committee_details = array(	
         'fpo_id'                => $this->session->userdata('user_id'),
         'commitee_name' 		=> $this->input->post('commitee_name'),
         'commitee_date'         => $this->input->post('commitee_date'),						
         'created_by'        	=> $this->session->userdata('user_id'),
         'created_on'        	=> date('Y-m-d H:i:s'),            	
      );	
      $this->db->insert('trv_commitee_name', $add_committee_details);
		$attendence = $this->db->insert_id();
		//$commitee_members = array_slice($this->input->post('commitee_members'), 0, -1);
      $commitee_members = $this->input->post('commitee_members');
		foreach($commitee_members As $commitee_members){
         if(!empty($commitee_members['director_id']) && $commitee_members['member_duration']){     
            $committee_details = array(            
               'fpo_id'                => $this->session->userdata('user_id'),
               'commitee_id'           => $attendence,
               'director_id' 			=> $commitee_members['director_id'],
               'member_duration'    	=> $commitee_members['member_duration'],
               'is_ceo'    			=> (isset($commitee_members['is_ceo']))?$commitee_members['is_ceo']:0 
            );
            $this->db->insert('trv_commitee_member', $committee_details);
         }
		}
		return true;
   }		
   function updatecommittee($id) { 			
			$commitee_members = $this->input->post('commitee_members');
			foreach($commitee_members As $commitee_member){	
            if(!empty($commitee_member['director_id']) && !empty($commitee_member['member_duration'])){
               $committee_details = array(            
                  'fpo_id'                => $this->session->userdata('user_id'),
                  'commitee_id'           => $id,
                  'director_id' 			=> $commitee_member['director_id'],
                  'member_duration'    	=> $commitee_member['member_duration'],
                  'is_ceo'    			=> (isset($commitee_member['is_ceo']))?$commitee_member['is_ceo']:0 
               );
               if(isset($commitee_member['commitee_member_id']) && $commitee_member['commitee_member_id']) {
                  $this->db->update('trv_commitee_member', $committee_details, array('id' => $commitee_member['commitee_member_id']));
               } else {
                  $this->db->insert('trv_commitee_member', $committee_details);
               }
            }               
			}	
		
		  return true;
	}
	
		
 	function delete_committee($committee_id,$director_id,$is_ceo) {
      $this->db->where(array('commitee_id'=>$committee_id,'director_id'=>$director_id,'is_ceo'=> $is_ceo));		
      $this->db->delete('trv_commitee_member');
	} 
	
	function committeeByID($id) {    
		$this->db->select('trv_commitee_name.*');
		$this->db->where(array('id' => $id));				
        $this->db->from('trv_commitee_name');	
        return $this->db->get()->row_array();		  
	}
	
	
	function committeeByDynamic($orderid) {
		$this->db->select('trv_director.name, trv_commitee_name.id,trv_commitee_member.director_id,trv_commitee_member.commitee_id, trv_commitee_member.is_ceo,trv_commitee_name.commitee_name,trv_commitee_name.commitee_date,trv_commitee_member.member_duration');
		$this->db->from('trv_commitee_member');      
		$this->db->join('trv_commitee_name', 'trv_commitee_name.id = trv_commitee_member.commitee_id');
		$this->db->join('trv_director', 'trv_director.id = trv_commitee_member.director_id');		
		$this->db->where(array('trv_commitee_member.commitee_id' =>$orderid,'trv_commitee_member.is_ceo' =>0));
		$directors = $this->db->get()->result();
		$this->db->select('trv_fpo_ceo.name, trv_commitee_name.id,trv_commitee_member.director_id,trv_commitee_member.commitee_id, trv_commitee_member.is_ceo,trv_commitee_name.commitee_name,trv_commitee_name.commitee_date,trv_commitee_member.member_duration');
		$this->db->from('trv_commitee_member');      
		$this->db->join('trv_commitee_name', 'trv_commitee_name.id = trv_commitee_member.commitee_id');
		$this->db->join('trv_fpo_ceo', 'trv_fpo_ceo.id = trv_commitee_member.director_id');		
		$this->db->where(array('trv_commitee_member.commitee_id' =>$orderid,'trv_commitee_member.is_ceo' =>1));
		$ceo = $this->db->get()->result();
		if(!empty($ceo))
         $directors = array_merge($ceo, $directors);
		return $directors;		        	
	}
		
	
	function getAllDirector($fpo_id) {  
        $this->db->select('trv_director.id, trv_director.name');
        $this->db->where(array('trv_director.status' => 1,'trv_director.fpo_id' => $fpo_id));
        $this->db->from('trv_director');
        return $this->db->get()->result();	
    }    
    
	function getAllCeo($fpo_id) {  
      $this->db->select('trv_fpo_ceo.id, CONCAT(trv_fpo_ceo.name,"-CEO") as name');
	  $this->db->from('trv_fpo_ceo');	 
	  $this->db->where(array('trv_fpo_ceo.status' => 1,'fpo_id' => $fpo_id));
      return $this->db->get()->result();	
    } 	  
   //ends

	function add_ceo() {
      $add_ceo = array(
      'fpo_id'                => $this->session->userdata('user_id'),
      'name'                  => $this->input->post('ceo_name'),
      'father_name'           => $this->input->post('father_name'),
      'dob'           		   => $this->input->post('dob'),
      'pincode'             	=> $this->input->post('pin_code'),
      'state'           		=> $this->input->post('state'),
      'district'           	=> $this->input->post('district'),
      'taluk'           	  	=> $this->input->post('taluk_id'),
      'block'           	  	=> $this->input->post('block'),
      'panchayat'           	=> $this->input->post('gram_panchayat'),
      'village'           	   => $this->input->post('village'),
      'street'           		=> $this->input->post('street_name'),
      'door'           		   => $this->input->post('door_no'),
      'qualification'        	=> $this->input->post('qualification'),
      'experience'          	=> $this->input->post('experience'),
      'appointment_date'      => $this->input->post('appointment_date'),
      'status'				      => 1,
      'updated_by'            => $this->session->userdata('user_id'),
      );	
      return $this->db->insert('trv_fpo_ceo', $add_ceo);
   }
	function update_ceo($ceo_id){
         if($this->input->post($this->input->post('resignation_date'))!="")
         {
		$update_ceo = array(
      'father_name'           => $this->input->post('father_name'),
      'dob'           		   => $this->input->post('dob'),
      'pincode'             	=> $this->input->post('pin_code'),
      'state'           		=> $this->input->post('state'),
      'district'           	=> $this->input->post('district'),
      'taluk'           	  	=> $this->input->post('taluk_id'),
      'block'           	  	=> $this->input->post('block'),
      'panchayat'           	=> $this->input->post('gram_panchayat'),
      'village'           	   => $this->input->post('village'),
      'street'           		=> $this->input->post('street_name'),
      'door'           		   => $this->input->post('door_no'),
      'qualification'        	=> $this->input->post('qualification'),
      'experience'          	=> $this->input->post('experience'),
      'appointment_date'      => $this->input->post('appointment_date'),      
      'resigned_date'      	=> $this->input->post('resignation_date'),
      'reason'             	=> $this->input->post('reason'),
      'status'				      => 2,
      'updated_by'            => $this->session->userdata('user_id'),
      );	
		return $this->db->update('trv_fpo_ceo', $update_ceo, array('id' => $ceo_id));
       }
       else
       {
       $update_ceo = array(
      'father_name'           => $this->input->post('father_name'),
      'dob'           		   => $this->input->post('dob'),
      'pincode'             	=> $this->input->post('pin_code'),
      'state'           		=> $this->input->post('state'),
      'district'           	=> $this->input->post('district'),
      'taluk'           	  	=> $this->input->post('taluk_id'),
      'block'           	  	=> $this->input->post('block'),
      'panchayat'           	=> $this->input->post('gram_panchayat'),
      'village'           	   => $this->input->post('village'),
      'street'           		=> $this->input->post('street_name'),
      'door'           		   => $this->input->post('door_no'),
      'qualification'        	=> $this->input->post('qualification'),
      'experience'          	=> $this->input->post('experience'),
      'appointment_date'      => $this->input->post('appointment_date'),      
      'resigned_date'      	=> $this->input->post('resignation_date'),
      'reason'             	=> $this->input->post('reason'),
      'status'				      => 1,
      'updated_by'            => $this->session->userdata('user_id'),
      );	
		return $this->db->update('trv_fpo_ceo', $update_ceo, array('id' => $ceo_id));
       }
	}
	function getCeoList() {  
      $this->db->select('trv_fpo_ceo.id, trv_fpo_ceo.name, trv_fpo_ceo.father_name, trv_fpo_ceo.dob, trv_fpo_ceo.qualification, trv_fpo_ceo.experience, trv_fpo_ceo.appointment_date, trv_fpo_ceo.resigned_date, trv_fpo_ceo.status');
      $this->db->where(array('trv_fpo_ceo.fpo_id' => $this->session->userdata('user_id')));	
      $this->db->from('trv_fpo_ceo');	 
      $this->db->order_by("trv_fpo_ceo.id", "desc");    
      return $this->db->get()->result();	
   } 
   function getCeoByID($id) {    
		$this->db->select('trv_fpo_ceo.*,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo_ceo.state'); 
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpo_ceo.district');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo_ceo.village','left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpo_ceo.panchayat','left');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpo_ceo.taluk','left');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpo_ceo.block','left');
		$this->db->where(array('trv_fpo_ceo.id' => $id));
		$this->db->from('trv_fpo_ceo');
		return $this->db->get()->row_array();
	}
	function getActiveCeo() {  
 	  return $this->db->get_where('trv_fpo_ceo', array('status' => 1, 'fpo_id' => $this->session->userdata('user_id')))->num_rows();	
   }
	
	function add_secretary() {
      $isTurnoverSlab = $this->input->post('is_turnover_slab');
		if($isTurnoverSlab == 2) {			
			$isExists = $this->getIsTurnoverSlab();
			if($isExists == 0) {
				$secretary_details = array(
					'fpo_id'                => $this->session->userdata('user_id'),
					'is_turnover_slab'      => $this->input->post('is_turnover_slab'),
					'status'				=> 0,
					'updated_by'            => $this->session->userdata('user_id'),
				);
				$this->db->insert('trv_fpo_comp_secretary', $secretary_details);
			}
			return $this->input->post('is_turnover_slab');
		} else if($isTurnoverSlab == 1) {	
				$uploaded_consent_file = '';
				$uploaded_certificate_file = '';
				if (!empty($_FILES['consent_file']['name'])) {
					
					$logger_id = $this->session->userdata('user_id');
					if (!is_dir('./assets/uploads/secretary')) {
						mkdir('./assets/uploads/secretary', 0777, TRUE);
					}
					if (!is_dir('./assets/uploads/secretary/'.$logger_id)) {
						mkdir('./assets/uploads/secretary/'.$logger_id, 0777, TRUE);
					}
					$config['upload_path'] = './assets/uploads/secretary/'.$logger_id;
					$config['allowed_types'] = 'pdf';
					$config['max_size']	= 1024;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('consent_file')) {					
						echo $this->upload->display_errors();
						return false;
					} else {
						$upload_data  = $this->upload->data();
						$uploaded_consent_file = $upload_data['file_name'];	
						$uploaded_consent_file = '/assets/uploads/secretary/'.$logger_id.'/'.$uploaded_consent_file;
					}
				}

				if (!empty($_FILES['certificate_file']['name'])) {
					
					$logger_id = $this->session->userdata('user_id');
					if (!is_dir('./assets/uploads/secretary')) {
						mkdir('./assets/uploads/secretary', 0777, TRUE);
					}
					if (!is_dir('./assets/uploads/secretary/'.$logger_id)) {
						mkdir('./assets/uploads/secretary/'.$logger_id, 0777, TRUE);
					}
					$config['upload_path'] = './assets/uploads/secretary/'.$logger_id;
					$config['allowed_types'] = 'pdf';
					$config['max_size']	= 1024;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('certificate_file')) {					
						echo $this->upload->display_errors();
						return false;
					} else {
						$upload_data  = $this->upload->data();
						$uploaded_certificate_file = $upload_data['file_name'];	
						$uploaded_certificate_file = '/assets/uploads/secretary/'.$logger_id.'/'.$uploaded_certificate_file;
					}
				}	

			if(empty($this->input->post('secretary_master_id')) && $this->input->post('secretary_master_id') == ""){
				$add_secretary = array(
					//'fpo_id'                => $this->session->userdata('user_id'),
               'name'                  => $this->input->post('name'),
					'reg_number'            => $this->input->post('reg_number'),
					'firm_name'           	=> $this->input->post('firm_name'),
					'firm_reg_number'       => $this->input->post('firm_reg_number'),
					'mobile'       			=> $this->input->post('mobile'),
					'std_code'       		   => $this->input->post('std_code'),
					'landline'       		   => $this->input->post('landline'),
					'email'       		    	=> $this->input->post('email'),
					'pincode'             	=> $this->input->post('pincode'),
					'state_code'           	=> $this->input->post('state'),
					'district'           	=> $this->input->post('district'),
					'taluk'           	  	=> $this->input->post('taluk'),
					'block'           	  	=> $this->input->post('block'),
					'panchayat'           	=> $this->input->post('panchayat'),
					'village'             	=> $this->input->post('village'),
					'street'           		=> $this->input->post('street'),
					'door'           		   => $this->input->post('door'),
					'status'			      	=> 1,
					'created_by'            => $this->session->userdata('user_id'),
				);	
				$this->db->insert('trv_comp_secretary', $add_secretary);
				$secretary_id = $this->db->insert_id();
				
				$isExists = $this->getIsTurnoverSlab();
				if($isExists == 0) {
					$secretary_details = array(
						'fpo_id'                => $this->session->userdata('user_id'),
						'secretary_id'          => $secretary_id,
						'is_turnover_slab'      => $this->input->post('is_turnover_slab'),
						'consent_date'      	=> $this->input->post('consent_date'),
						'certificate_date'      => $this->input->post('certificate_date'),
						'appointment_date'      => $this->input->post('appointment_date'),
						'status'				=> 1,
						'updated_by'            => $this->session->userdata('user_id'),
					);
					if($uploaded_consent_file != '') {
						$secretary_details['consent_file'] = $uploaded_consent_file;
					}
					if($uploaded_certificate_file != '') {
						$secretary_details['certificate_file'] = $uploaded_certificate_file;
					}
					$this->db->insert('trv_fpo_comp_secretary', $secretary_details);
				} else {
					$secretary_details = array(
						'secretary_id'          => $secretary_id,
						'is_turnover_slab'      => $this->input->post('is_turnover_slab'),
						'consent_date'      	=> $this->input->post('consent_date'),
						'certificate_date'      => $this->input->post('certificate_date'),
						'appointment_date'      => $this->input->post('appointment_date'),
						'status'				=> 1,
						'updated_by'            => $this->session->userdata('user_id'),
					);
					if($uploaded_consent_file != '') {
						$secretary_details['consent_file'] = $uploaded_consent_file;
					}
					if($uploaded_certificate_file != '') {
						$secretary_details['certificate_file'] = $uploaded_certificate_file;
					}
					$this->db->update('trv_fpo_comp_secretary', $secretary_details, array('is_turnover_slab' => 2, 'fpo_id' => $this->session->userdata('user_id')));
				}									
				return array($add_secretary, $secretary_details);
			} else {
				$secretary_details = array(
					'fpo_id'                => $this->session->userdata('user_id'),
					'secretary_id'          => $this->input->post('secretary_master_id'),
					'is_turnover_slab'      => $this->input->post('is_turnover_slab'),
					'consent_date'      	=> $this->input->post('consent_date'),
					'certificate_date'      => $this->input->post('certificate_date'),
					'appointment_date'      => $this->input->post('appointment_date'),
					'status'				=> 1,
					'updated_by'            => $this->session->userdata('user_id'),
				);
				if($uploaded_consent_file != '') {
					$secretary_details['consent_file'] = $uploaded_consent_file;
				}
				if($uploaded_certificate_file != '') {
					$secretary_details['certificate_file'] = $uploaded_certificate_file;
				}
				$this->db->insert('trv_fpo_comp_secretary', $secretary_details);
				return array($secretary_details);
			}
		}		
    }
	
	function update_secretary($secretary_id) {

      if($this->input->post('terminated_on')!="")
      {
         $update_secretary = array(
               'name'                  => $this->input->post('name'),
					'reg_number'            => $this->input->post('reg_number'),
					'firm_name'           	=> $this->input->post('firm_name'),
					'firm_reg_number'       => $this->input->post('firm_reg_number'),
					'mobile'       			=> $this->input->post('mobile'),
					'std_code'       		   => $this->input->post('std_code'),
					'landline'       		   => $this->input->post('landline'),
					'email'       		    	=> $this->input->post('email'),
					'pincode'             	=> $this->input->post('pincode'),
					'state_code'           	=> $this->input->post('state'),
					'district'           	=> $this->input->post('district'),
					'taluk'           	  	=> $this->input->post('taluk'),
					'block'           	  	=> $this->input->post('block'),
					'panchayat'           	=> $this->input->post('panchayat'),
					'village'             	=> $this->input->post('village'),
					'street'           		=> $this->input->post('street'),
					'door'           		   => $this->input->post('door'),
               'status'				=> 3,
               'updated_on'            => date('Y-m-d H:i:s'),
               'updated_by'            => $this->session->userdata('user_id'),
         );
         $this->db->update('trv_comp_secretary', $update_secretary, array('id' => $secretary_id));	
         $secretary_details = array(
            'terminated_on'      => $this->input->post('terminated_on'),
            'reason'      			=> $this->input->post('reason'),
            'status'				   => 3,
            'updated_by'         => $this->session->userdata('user_id')
           );
         $result = $this->db->update('trv_fpo_comp_secretary', $secretary_details, array('secretary_id' => $secretary_id, 'fpo_id' => $this->session->userdata('user_id')));	
         return array($result);
      }else{
            $update_secretary = array(
               'name'                  => $this->input->post('name'),
					'reg_number'            => $this->input->post('reg_number'),
					'firm_name'           	=> $this->input->post('firm_name'),
					'firm_reg_number'       => $this->input->post('firm_reg_number'),
					'mobile'       			=> $this->input->post('mobile'),
					'std_code'       		   => $this->input->post('std_code'),
					'landline'       		   => $this->input->post('landline'),
					'email'       		    	=> $this->input->post('email'),
					'pincode'             	=> $this->input->post('pincode'),
					'state_code'           	=> $this->input->post('state'),
					'district'           	=> $this->input->post('district'),
					'taluk'           	  	=> $this->input->post('taluk'),
					'block'           	  	=> $this->input->post('block'),
					'panchayat'           	=> $this->input->post('panchayat'),
					'village'             	=> $this->input->post('village'),
					'street'           		=> $this->input->post('street'),
					'door'           		   => $this->input->post('door'),
               
               'status'				=> 1,
               'updated_on'            => date('Y-m-d H:i:s'),
               'updated_by'            => $this->session->userdata('user_id'),
            );

             
            $this->db->update('trv_comp_secretary', $update_secretary, array('id' => $secretary_id));	

            $secretary_details = array(
               'terminated_on'      => $this->input->post('terminated_on'),
               'reason'      			=> $this->input->post('reason'),
               'status'				   => 1,
               'updated_by'         => $this->session->userdata('user_id'),
              );
            $result = $this->db->update('trv_fpo_comp_secretary', $secretary_details, array('secretary_id' => $secretary_id, 'fpo_id' => $this->session->userdata('user_id')));	

            return array($result);
      }
	}

	
	function getSecretaryList() {  
      $this->db->select('trv_comp_secretary.id, trv_comp_secretary.name, trv_comp_secretary.reg_number, trv_comp_secretary.firm_name, trv_comp_secretary.mobile, trv_fpo_comp_secretary.appointment_date, trv_fpo_comp_secretary.terminated_on, trv_comp_secretary.status');
      $this->db->from('trv_comp_secretary');
	  $this->db->join('trv_fpo_comp_secretary', 'trv_comp_secretary.id = trv_fpo_comp_secretary.secretary_id'); 
	  $this->db->where(array('trv_fpo_comp_secretary.fpo_id' => $this->session->userdata('user_id')));
	  $this->db->order_by("trv_comp_secretary.id", "desc");    
      return $this->db->get()->result();	
    } 
    function getSecretaryByID($id) {    
		$this->db->select('trv_comp_secretary.*,trv_fpo_comp_secretary.*,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_comp_secretary.state_code', 'left'); 
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_comp_secretary.district', 'left');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_comp_secretary.village', 'left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_comp_secretary.panchayat', 'left');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_comp_secretary.taluk', 'left');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_comp_secretary.block', 'left');
		$this->db->join('trv_fpo_comp_secretary', 'trv_comp_secretary.id = trv_fpo_comp_secretary.secretary_id');
		$this->db->where(array('trv_comp_secretary.id' => $id));
		$this->db->from('trv_comp_secretary');
		return $this->db->get()->row_array();
	}
	
	function getCompanySecretaryInformation() {    
		$this->db->select('trv_comp_secretary.*, trv_fpo_comp_secretary.*, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_comp_secretary.state_code', 'left'); 
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_comp_secretary.district', 'left');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_comp_secretary.village', 'left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_comp_secretary.panchayat', 'left');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_comp_secretary.taluk', 'left');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_comp_secretary.block', 'left');
		$this->db->join('trv_fpo_comp_secretary', 'trv_comp_secretary.id = trv_fpo_comp_secretary.secretary_id');
		$this->db->where(array('trv_comp_secretary.name' => $this->input->post('secretary_name'), 'trv_comp_secretary.reg_number' => $this->input->post('reg_number')));
		$this->db->from('trv_comp_secretary');
		return $this->db->get()->row();
	}
	
	function getActiveSecretary() {  
 	  return $this->db->get_where('trv_fpo_comp_secretary', array('status' => 1, 'fpo_id' => $this->session->userdata('user_id')))->num_rows();	
    }
	function getIsTurnoverSlab() {  
 	  return $this->db->get_where('trv_fpo_comp_secretary', array('status' => 0, 'is_turnover_slab' => 2, 'fpo_id' => $this->session->userdata('user_id')))->num_rows();	
    }
	
	function add_chartered_accountant() {        

				$uploaded_consent_file = '';
				$uploaded_certificate_file = '';
				if (!empty($_FILES['consent_file']['name'])) {
					
					$logger_id = $this->session->userdata('user_id');
					if (!is_dir('./assets/uploads/accountant')) {
						mkdir('./assets/uploads/accountant', 0777, TRUE);
					}
					if (!is_dir('./assets/uploads/accountant/'.$logger_id)) {
						mkdir('./assets/uploads/accountant/'.$logger_id, 0777, TRUE);
					}
					$config['upload_path'] = './assets/uploads/accountant/'.$logger_id;
					$config['allowed_types'] = 'pdf';
					$config['max_size']	= 1024;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('consent_file')) {					
						echo $this->upload->display_errors();
						return false;
					} else {
						$upload_data  = $this->upload->data();
						$uploaded_consent_file = $upload_data['file_name'];	
						$uploaded_consent_file = '/assets/uploads/accountant/'.$logger_id.'/'.$uploaded_consent_file;
					}
				}

				if (!empty($_FILES['certificate_file']['name'])) {
					
					$logger_id = $this->session->userdata('user_id');
					if (!is_dir('./assets/uploads/accountant')) {
						mkdir('./assets/uploads/accountant', 0777, TRUE);
					}
					if (!is_dir('./assets/uploads/accountant/'.$logger_id)) {
						mkdir('./assets/uploads/accountant/'.$logger_id, 0777, TRUE);
					}
					$config['upload_path'] = './assets/uploads/accountant/'.$logger_id;
					$config['allowed_types'] = 'pdf';
					$config['max_size']	= 1024;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('certificate_file')) {					
						echo $this->upload->display_errors();
						return false;
					} else {
						$upload_data  = $this->upload->data();
						$uploaded_certificate_file = $upload_data['file_name'];	
						$uploaded_certificate_file = '/assets/uploads/accountant/'.$logger_id.'/'.$uploaded_certificate_file;
					}
				}	
				
			if(empty($this->input->post('accountant_master_id')) && $this->input->post('accountant_master_id') == ""){
				$add_accountant = array(
					'name'                  => $this->input->post('accountant_name'),
					'reg_number'            => $this->input->post('registration_num'),
					'firm_name'           	=> $this->input->post('name_firm'),
					'firm_reg_number'       => $this->input->post('firm_number'),
					'mobile'       			=> $this->input->post('mobile_num'),
					'std_code'       		   => $this->input->post('std_code'),
					'landline'       		   => $this->input->post('landline_num'),
					'email'       			   => $this->input->post('email_address'),
					'pincode'           	   => $this->input->post('pin_code'),
					'state_code'           	=> $this->input->post('state'),
					'district'           	=> $this->input->post('district'),
					'taluk'           	  	=> $this->input->post('taluk_id'),
					'block'           	  	=> $this->input->post('block'),
					'panchayat'           	=> $this->input->post('gram_panchayat'),
					'village'             	=> $this->input->post('village'),
					'street'           		=> $this->input->post('street_name'),
					'door'           		   => $this->input->post('door_no'),
					'status'				      => 1,
					'created_by'            => $this->session->userdata('user_id'),
				);	
				$this->db->insert('trv_chartered_accountant', $add_accountant);
				$accountant_id = $this->db->insert_id();

				$accountant_details = array(
					'fpo_id'                => $this->session->userdata('user_id'),
					'ca_id'          		   => $accountant_id,
					'appointment_type'      => $this->input->post('appointment_type'),
					'consent_date'      	   => $this->input->post('date_of_consent'),
					'certificate_date'      => $this->input->post('date_of_certificate'),
					'appointment_date'      => $this->input->post('date_of_appointment'),
					'tenure_year'			   => $this->input->post('tenure_year'),
					'status'				      => 1,
					'updated_by'            => $this->session->userdata('user_id'),
				);
				
				$tenureYear = $this->input->post('tenure_year');
				if($tenureYear >0) {
					$appointmentDate = $this->input->post('date_of_appointment');
					list($y, $m, $d) = explode('-', $appointmentDate);
					$validityDate = date('Y-m-d', mktime(0, 0, 0, $m, $d-1, $y+$tenureYear));
					$accountant_details['validity_date'] = $validityDate;
				}
				if($uploaded_consent_file != '') {
					$accountant_details['consent_file'] = $uploaded_consent_file;
				}
				if($uploaded_certificate_file != '') {
					$accountant_details['certificate_file'] = $uploaded_certificate_file;
				}
				$this->db->insert('trv_fpo_auditor', $accountant_details);

				return array($add_accountant, $accountant_details);
			} else {
				$accountant_details = array(
					'fpo_id'                => $this->session->userdata('user_id'),
					'ca_id'          		   => $this->input->post('accountant_master_id'),
					'appointment_type'      => $this->input->post('appointment_type'),
					'consent_date'      	   => $this->input->post('date_of_consent'),
					'certificate_date'      => $this->input->post('date_of_certificate'),
					'appointment_date'      => $this->input->post('date_of_appointment'),
					'tenure_year'			   => $this->input->post('tenure_year'),
					'status'				      => 1,
					'updated_by'            => $this->session->userdata('user_id'),
				);
				
				$tenureYear = $this->input->post('tenure_year');
				if($tenureYear >0) {
					$appointmentDate = $this->input->post('date_of_appointment');
					list($y, $m, $d) = explode('-', $appointmentDate);
					$validityDate = date('Y-m-d', mktime(0, 0, 0, $m, $d-1, $y+$tenureYear));
					$accountant_details['validity_date'] = $validityDate;
				}
				if($uploaded_consent_file != '') {
					$accountant_details['consent_file'] = $uploaded_consent_file;
				}
				if($uploaded_certificate_file != '') {
					$accountant_details['certificate_file'] = $uploaded_certificate_file;
				}
				$this->db->insert('trv_fpo_auditor', $accountant_details);

				return array($accountant_details);
			}
    }
	
	function update_chartered_accountant($accountant_id) {
         if($this->input->post('terminated_on')!="")
         {
		$update_accountant = array(
 			'status'				      => 3,
			'updated_on'            => date('Y-m-d H:i:s'),
			'updated_by'            => $this->session->userdata('user_id'),
        );
		$this->db->update('trv_chartered_accountant', $update_accountant, array('id' => $accountant_id));	
		
		$accountant_details = array(
         'terminated_on'      	=> $this->input->post('terminated_on'),
			'reason'      			   => $this->input->post('reason'),
			'status'				      => 3,
			'updated_by'            => $this->session->userdata('user_id'),
        );
		$this->db->update('trv_fpo_auditor', $accountant_details, array('ca_id' => $accountant_id, 'fpo_id' => $this->session->userdata('user_id')));	
		
		return array($update_accountant, $accountant_details);
         }
         else
         {
         $update_accountant = array(
 			'status'				      => 1,
			'updated_on'            => date('Y-m-d H:i:s'),
			'updated_by'            => $this->session->userdata('user_id'),
        );
		$this->db->update('trv_chartered_accountant', $update_accountant, array('id' => $accountant_id));	
		
		$accountant_details = array(
         'terminated_on'      	=> $this->input->post('terminated_on'),
			'reason'      			   => $this->input->post('reason'),
			'status'				      => 1,
			'updated_by'            => $this->session->userdata('user_id'),
        );
		$this->db->update('trv_fpo_auditor', $accountant_details, array('ca_id' => $accountant_id, 'fpo_id' => $this->session->userdata('user_id')));	
		
		return array($update_accountant, $accountant_details);
         }
	}
	function getAccountantList() {  
      $this->db->select('trv_chartered_accountant.id, trv_chartered_accountant.name, trv_chartered_accountant.firm_name, trv_chartered_accountant.mobile, trv_fpo_auditor.appointment_date, trv_fpo_auditor.terminated_on, trv_fpo_auditor.tenure_year, trv_fpo_auditor.terminated_on, trv_chartered_accountant.status');
      $this->db->from('trv_chartered_accountant');
	  $this->db->join('trv_fpo_auditor', 'trv_chartered_accountant.id = trv_fpo_auditor.ca_id'); 
	  $this->db->where(array('trv_fpo_auditor.fpo_id' => $this->session->userdata('user_id')));
	  $this->db->order_by("trv_chartered_accountant.id", "desc");    
      return $this->db->get()->result();	
    } 
    function getAccountantByID($id) {    
		$this->db->select('trv_chartered_accountant.*,trv_fpo_auditor.*,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_chartered_accountant.state_code', 'left'); 
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_chartered_accountant.district', 'left');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_chartered_accountant.village', 'left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_chartered_accountant.panchayat', 'left');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_chartered_accountant.taluk', 'left');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_chartered_accountant.block', 'left');
		$this->db->join('trv_fpo_auditor', 'trv_chartered_accountant.id = trv_fpo_auditor.ca_id');
		$this->db->where(array('trv_chartered_accountant.id' => $id));
		$this->db->from('trv_chartered_accountant');
		return $this->db->get()->row_array();
	}
	
	function getCharteredAccountantInformation() {    
		$this->db->select('trv_chartered_accountant.*,trv_fpo_auditor.*,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_taluk_master.name As taluk_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_chartered_accountant.state_code', 'left'); 
		$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_chartered_accountant.district', 'left');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_chartered_accountant.village', 'left');
		$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_chartered_accountant.panchayat', 'left');
		$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_chartered_accountant.taluk', 'left');
		$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_chartered_accountant.block', 'left');
		$this->db->join('trv_fpo_auditor', 'trv_chartered_accountant.id = trv_fpo_auditor.ca_id');
		$this->db->where(array('trv_chartered_accountant.name' => $this->input->post('accountant_name'), 'trv_chartered_accountant.reg_number' => $this->input->post('registration_num')));
		$this->db->from('trv_chartered_accountant');
		return $this->db->get()->row();		
	}
	 

	/** Awareness program codes **/
	function awarnessProgramList($fpo_id) {
		$this->db->select('trv_awareness_program.*');
		$this->db->order_by("trv_awareness_program.id", "desc");
		$this->db->where(array('trv_awareness_program.fpo_id' => $fpo_id, 'trv_awareness_program.status' => 1));
		$this->db->from('trv_awareness_program');
		return $this->db->get()->result();	
	}
	
	function addAwarenessProgram() {
		if(is_array($this->input->post('village_name'))) {
			$village_names = implode(',', $this->input->post('village_name'));
		} else {
			$village_names = "";
		}
        $add_awareness = array(	
			'fpo_id'                => $this->session->userdata('user_id'),
			'program_date'          => $this->input->post('date_visit'),
			'conducting_place' 		=> $this->input->post('place_program'),	
			'no_of_participants'    => $this->input->post('no_participants'),
			'cost_involved'    		=> ($this->input->post('show_inactive'))?$this->input->post('show_inactive'):0,
			'involved_cost'    		=> ($this->input->post('involved_cost_value'))?$this->input->post('involved_cost_value'):0,
			'villages' 				=> $village_names,			
			
            'updated_by'        	=> $this->session->userdata('user_id'),
            'updated_on'        	=> date('Y-m-d H:i:s'),    
			'created_by'        	=> $this->session->userdata('user_id'),
            'created_on'        	=> date('Y-m-d H:i:s')    
        );	
        $this->db->insert('trv_awareness_program', $add_awareness);
		$last_inserted_program_id = $this->db->insert_id();
		
      if (!empty($_FILES['program_photo']['name'][0])) {
         if (!is_dir('assets/uploads/awareness')) {
            mkdir('assets/uploads/awareness', 0777, TRUE);
         }
         if (!is_dir('assets/uploads/awareness/program_'.$last_inserted_program_id)) {
            mkdir('assets/uploads/awareness/program_'.$last_inserted_program_id, 0777, TRUE);
         }	

         //echo json_encode($_FILES["program_photo"]);
         $UploadFolder = 'assets/uploads/awareness/program_'.$last_inserted_program_id;
         $counter = 0;
         $errors = array();
         $uploadedFiles = array();
         $extension = array("jpeg","jpg","png","gif");
         $bytes = 1024;
         $KB = 500;
         $totalBytes = $bytes * $KB;
         foreach($_FILES["program_photo"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["program_photo"]["tmp_name"][$key];
            $name = $_FILES["program_photo"]["name"][$key];
               
            if(empty($temp)) {
               break;
            }
                  
            $counter++;
            $UploadOk = true;
                  
            if($_FILES["program_photo"]["size"][$key] > $totalBytes) {
               $UploadOk = false;
               array_push($errors, $name." File size is larger than the 500KB.");
            }
                  
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
               $UploadOk = false;
               array_push($errors, $name." is invalid file type.");
            }
                  
            /*if(file_exists($UploadFolder."/".$name) == true){
               $UploadOk = false;
               array_push($errors, $name." file is already exist.");
            }*/
                  
            if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
               move_uploaded_file($temp,$UploadFolder."/".$name);
               array_push($uploadedFiles, $name);
               $add_awareness = array(	
                  'is_photo_available'  	=> 1
               );	
            } else {
               $add_awareness = array(	
                  'is_photo_available'  	=> 0
               );	
            }
            $this->db->update('trv_awareness_program', $add_awareness, array('id' => $last_inserted_program_id));
         }
      }   
		return $last_inserted_program_id;
	}
	
	function updateAwarenessProgram($awarenes_id) {
        $update_awareness = array(	
			'fpo_id'                => $this->session->userdata('user_id'),
			'program_date'          => $this->input->post('date_visit'),
			'conducting_place' 		=> $this->input->post('place_program'),	
			'no_of_participants'    => $this->input->post('no_participants'),
			'cost_involved'    		=> ($this->input->post('show_inactive'))?$this->input->post('show_inactive'):0,
			'involved_cost'    		=> ($this->input->post('involved_cost_value'))?$this->input->post('involved_cost_value'):0,
			'villages' 				=> implode(',', $this->input->post('village_name')),			
			
            'updated_by'        	=> $this->session->userdata('user_id'),
            'updated_on'        	=> date('Y-m-d H:i:s')   
        );	
		$this->db->update('trv_awareness_program', $update_awareness, array('id' => $awarenes_id));
		
      if (!empty($_FILES['program_photo']['name'][0])) {
         if (!is_dir('assets/uploads/awareness')) {
            mkdir('assets/uploads/awareness', 0777, TRUE);
         }
         if (!is_dir('assets/uploads/awareness/program_'.$awarenes_id)) {
            mkdir('assets/uploads/awareness/program_'.$awarenes_id, 0777, TRUE);
         }	

         //echo json_encode($_FILES["program_photo"]);
         $UploadFolder = 'assets/uploads/awareness/program_'.$awarenes_id;
         $counter = 0;
         $errors = array();
         $uploadedFiles = array();
         $extension = array("jpeg","jpg","png","gif");
         $bytes = 1024;
         $KB = 500;
         $totalBytes = $bytes * $KB;
         foreach($_FILES["program_photo"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["program_photo"]["tmp_name"][$key];
            $name = $_FILES["program_photo"]["name"][$key];
               
            if(empty($temp)) {
               break;
            }
                  
            $counter++;
            $UploadOk = true;
                  
            if($_FILES["program_photo"]["size"][$key] > $totalBytes) {
               $UploadOk = false;
               array_push($errors, $name." File size is larger than the 500KB.");
            }
                  
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
               $UploadOk = false;
               array_push($errors, $name." is invalid file type.");
            }
                  
            /*if(file_exists($UploadFolder."/".$name) == true){
               $UploadOk = false;
               array_push($errors, $name." file is already exist.");
            }*/
                  
            if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
               move_uploaded_file($temp,$UploadFolder."/".$name);
               array_push($uploadedFiles, $name);
               $add_awareness = array(	
                  'is_photo_available'  	=> 1
               );	
            } else {
               $add_awareness = array(	
                  'is_photo_available'  	=> 0
               );	
            }
            $this->db->update('trv_awareness_program', $add_awareness, array('id' => $awarenes_id));
         }
      }   
		return $awarenes_id;
	}
	
	function awarnessProgramByID($awarenes_id) {
      $this->db->select('trv_awareness_program.*');        
      $this->db->where(array('trv_awareness_program.id' => $awarenes_id, 'trv_awareness_program.status' => 1));
      $this->db->from('trv_awareness_program');
      return $this->db->get()->row_array();  

   }
   function addboardmeeting() {
		$fpo_id = $this->session->userdata('user_id');
		$image = array();
		$ImageCount = count($_FILES['upload_meeting']['name']);
         if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				if($_FILES['upload_meeting']['name'][$i] != '') { 
                if(($ImageCount >= 2 && $i != ($ImageCount-1)) || $ImageCount == 2){
                 
					$_FILES['file']['name']       = $_FILES['upload_meeting']['name'][$i];
					$_FILES['file']['type']       = $_FILES['upload_meeting']['type'][$i];
					$_FILES['file']['tmp_name']   = $_FILES['upload_meeting']['tmp_name'][$i];
					$_FILES['file']['error']      = $_FILES['upload_meeting']['error'][$i];
					$_FILES['file']['size']       = $_FILES['upload_meeting']['size'][$i];
					$album= strtolower($this->session->userdata('user_id'));
					// File upload configuration
					$uploadPath = './assets/uploads/meeting/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|pdf';
					$config['max_size']	= 5120;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!is_dir('./assets/uploads/meeting/')) {
					mkdir('./assets/uploads/meeting/', 0777, TRUE);
					}					
					// Upload file to server
					if($this->upload->do_upload('file')){
						// Uploaded file data
						$imageData = $this->upload->data();
						$uploadImgData[] = $imageData['file_name'];
					}
					else
					{
						
					}
					if(!empty($uploadImgData))
					{
						$imageupload=$uploadImgData;
					}
					else
					{
						$imageupload='';
					}
				}}	
			}
		}
			//if(!empty($uploadImgData)){
				$add_boardmeeting = array(
				  'fpo_id'                        => $this->session->userdata('user_id'),	
				  'mom_file'                      => implode(',', $imageupload),
				  'meeting_date'                  => $this->input->post('meeting_date'),
				  'chairman_id'                   => $this->input->post('chairman'),
				  'quorum'                        => $this->input->post('quorum'),
				  'quorum_available'              => $this->input->post('quorum_available'),
				  'adjurnment_date	'            => $this->input->post('adjourment_date'),
				  'mom'                           => $this->input->post('meeting_minutes'),
				  'status'						       => 1,
				  //'director'                  => implode(',', $this->input->post('director')),
				  'created_by'                 => $fpo_id,
				  'created_on'                 => date('Y-m-d H:i:s'),                     
				);
				$this->db->insert('trv_board_meeting', $add_boardmeeting); 				
				 $attendence = $this->db->insert_id();	
				  $members = array_slice($this->input->post('committee'), 0);
				  foreach($members As $member) {	 
                 if(is_array($member) && isset($member)) { 
                    $add_attendence = array(	
                    'fpo_id'            => $this->session->userdata('user_id'),
                    'meeting_id'        => $attendence,
                    'meeting_type'      => 1,
					     'meeting_date'      => $this->input->post('meeting_date'),
					     'attendee_type'     => 1,
					     'attendee_id'       => $member['member_id'],
					     'actual_sitting_fee'=> $member['sitting_fees'],
					     'paid_sitting_fee'   =>$member['sitting_fees_paid'],
					     'actual_allowance'   =>$member['director_allowance'],
					     'paid_allowance'     =>$member['allowance_fees_paid'] ,					
                    //'type_no'           => $payment['cost_center'],
                    'created_by'         => $fpo_id,
				        'created_on'         => date('Y-m-d H:i:s'),
                );
               $this->db->insert('trv_fpo_meeting_attendence', $add_attendence);
            }
        } 
		return true;		  
	

}

	function updateboardmeeting($board_meeting_id) {
		$fpo_id = $this->session->userdata('user_id');
		$image = array();
		$ImageCount = count($_FILES['upload_meeting']['name']);
        if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				if($_FILES['upload_meeting']['name'][$i] != '') { 
               if(($ImageCount >= 2 && $i != ($ImageCount-1)) || $ImageCount == 2){
                 
					$_FILES['file']['name']       = $_FILES['upload_meeting']['name'][$i];
					$_FILES['file']['type']       = $_FILES['upload_meeting']['type'][$i];
					$_FILES['file']['tmp_name']   = $_FILES['upload_meeting']['tmp_name'][$i];
					$_FILES['file']['error']      = $_FILES['upload_meeting']['error'][$i];
					$_FILES['file']['size']       = $_FILES['upload_meeting']['size'][$i];
					$album= strtolower($this->session->userdata('user_id'));
					// File upload configuration
					$uploadPath = './assets/uploads/meeting/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|pdf';
					$config['max_size']	= 5120;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!is_dir('./assets/uploads/meeting/')) {
					mkdir('./assets/uploads/meeting/', 0777, TRUE);
					}					
					// Upload file to server
					if($this->upload->do_upload('file')){
						// Uploaded file data
						$imageData = $this->upload->data();
						$uploadImgData[] = $imageData['file_name'];
					}
					else
					{
						
					}
					if(!empty($uploadImgData))
					{
						$imageupload=$uploadImgData;
					}
					else
					{
						$imageupload='';
					}
				}}	
			}
		}
      
			//if(!empty($uploadImgData)){
				$update_boardmeeting = array(
				  'fpo_id'                        => $this->session->userdata('user_id'),	
				  //'mom_file'                      => ($imageupload)?implode(',', $imageupload):"",
				  'meeting_date'                  => $this->input->post('meeting_date'),
				  'chairman_id'                   => $this->input->post('chairman'),
				  'quorum'                        => $this->input->post('quorum'),
				  'quorum_available'              => $this->input->post('quorum_available'),
				  'adjurnment_date	'             => $this->input->post('adjourment_date'),
				  'mom'                           => $this->input->post('meeting_minutes'),
				  'status'						  => 1,
				  'created_by'                 => $fpo_id,
				  'created_on'                 => date('Y-m-d H:i:s'),                     
				);
				
				if(isset($imageupload)) {
					$update_boardmeeting['mom_file'] = ($imageupload)?implode(',', $imageupload):"";
				}
				
				$this->db->update('trv_board_meeting', $update_boardmeeting); 				
				$member_id = $this->input->post('member_id');
				$member_attendee_id = $this->input->post('member_attendee_id');
				$member_sitting_fees = $this->input->post('member_sitting_fees');
				$member_sitting_fees_paid = $this->input->post('member_sitting_fees_paid');
				$member_director_allowance = $this->input->post('member_director_allowance');
				$member_allowance_fees_paid = $this->input->post('member_allowance_fees_paid');
				for($i=0; $i<count($member_id); $i++){
                 $get_id= $this->db->select('id')->from('trv_fpo_meeting_attendence')->where('id',$member_id[$i])->where('fpo_id',$this->session->userdata('user_id'))->get()->row()->id;
					 if(!empty($get_id)) {
						$add_attendence = array(	
							'fpo_id'            => $this->session->userdata('user_id'),
							'meeting_id'        => $board_meeting_id,
							'meeting_type'      => 1,
							'meeting_date'      => $this->input->post('meeting_date'),
							'attendee_type'     => 1,
							'attendee_id'       =>  $member_attendee_id[$i],
							'actual_sitting_fee'=>  $member_sitting_fees[$i],
							'paid_sitting_fee'   => $member_sitting_fees_paid[$i],
							'actual_allowance'   => $member_director_allowance[$i],
							'paid_allowance'     => $member_allowance_fees_paid[$i],					
							//'type_no'           => $payment['cost_center'],
							'created_by'         => $fpo_id,
							'created_on'         => date('Y-m-d H:i:s'),
						);
						$this->db->update('trv_fpo_meeting_attendence', $add_attendence,array('id' => $member_id[$i]));
					} 
					 else {
						$add_attendence = array(	
							'fpo_id'            => $this->session->userdata('user_id'),
							'meeting_id'        => $board_meeting_id,
							'meeting_type'      => 1,
							'meeting_date'      => $this->input->post('meeting_date'),
							'attendee_type'     => 1,
							'attendee_id'       =>  $member_attendee_id[$i],
							'actual_sitting_fee'=> $member_sitting_fees[$i],
							'paid_sitting_fee'  => $member_sitting_fees_paid[$i],
							'actual_allowance'  => $member_director_allowance[$i],
							'paid_allowance'    => $member_allowance_fees_paid[$i],					
							//'type_no'           => $payment['cost_center'],
							'created_by'        => $fpo_id,
							'created_on'        => date('Y-m-d H:i:s'),
						);
						$this->db->insert('trv_fpo_meeting_attendence', $add_attendence);
					} 
			}	
		return true;
	} 
	function generatePdf($meeting_id) { 
	  $fpo_id =$this->session->userdata('user_id');
      $this->db->select('trv_notice_to_director.*,trv_fpo_ceo.name as ceo_name, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_taluk_master.name As taluk_name');        
      $this->db->from('trv_notice_to_director');		
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_notice_to_director.state_id');       
      $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_notice_to_director.district_id');
      $this->db->join('trv_village_master', 'trv_village_master.id = trv_notice_to_director.village');
      $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_notice_to_director.panchayat');
      $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_notice_to_director.taluk_id');
      $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_notice_to_director.block');
	   $this->db->join('trv_fpo_ceo', 'trv_fpo_ceo.id =trv_notice_to_director.id','left');
      $this->db->where(array('trv_notice_to_director.id' => $meeting_id,'trv_notice_to_director.fpo_id' =>$fpo_id));		
      return $this->db->get()->row_array();
	}
	
	function addcommiteemeeting() {
		$fpo_id = $this->session->userdata('user_id');
		$image = array();
		$ImageCount = count($_FILES['upload_meeting']['name']);
      
       if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				if($_FILES['upload_meeting']['name'][$i] != '') { 
                if(($ImageCount >= 2 && $i != ($ImageCount-1)) || $ImageCount == 2){
                 
					$_FILES['file']['name']       = $_FILES['upload_meeting']['name'][$i];
					$_FILES['file']['type']       = $_FILES['upload_meeting']['type'][$i];
					$_FILES['file']['tmp_name']   = $_FILES['upload_meeting']['tmp_name'][$i];
					$_FILES['file']['error']      = $_FILES['upload_meeting']['error'][$i];
					$_FILES['file']['size']       = $_FILES['upload_meeting']['size'][$i];
					$album= strtolower($this->session->userdata('user_id'));
					// File upload configuration
					$uploadPath = './assets/uploads/commiteemeeting/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|pdf';
					$config['max_size']	= 5120;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!is_dir('./assets/uploads/commiteemeeting/')) {
					mkdir('./assets/uploads/commiteemeeting/', 0777, TRUE);
					}					
					// Upload file to server
					if($this->upload->do_upload('file')){
						// Uploaded file data
						$imageData = $this->upload->data();
						$uploadImgData[] = $imageData['file_name'];
					}
					else
					{
						
					}
					if(!empty($uploadImgData))
					{
						$imageupload=$uploadImgData;
					}
					else
					{
						$imageupload='';
					}
				}}	
			}
		}
			//if(!empty($uploadImgData)){
				$add_boardmeeting = array(
				  'fpo_id'                        => $this->session->userdata('user_id'),	
				  'mom_file'                      => ($imageupload)?implode(',', $imageupload):"",
				  'meeting_date'                  => $this->input->post('meeting_date'),
				  'committee_id'                  => $this->input->post('committee_id'),
				  'mom'                           => $this->input->post('meeting_minutes'),
				  'status'						  => 1,
				  'created_by'                 => $fpo_id,
				  'created_on'                 => date('Y-m-d H:i:s'),                     
				);
				$this->db->insert('trv_committee_meeting', $add_boardmeeting); 				
				 $attendence = $this->db->insert_id();	
				  $members = ($this->input->post('committee'));
				  foreach($members As $member) {	 
                 if(is_array($member) && isset($member)) { 
                $add_attendence = array(	
                    'fpo_id'            => $this->session->userdata('user_id'),
                    'meeting_id'        =>$attendence,
                    'meeting_type'      =>2,
                     'meeting_date'      => $this->input->post('meeting_date'),
                     'attendee_type'     => 2,
                     'attendee_id'       =>  $member['member_id'],
                     'actual_sitting_fee	'=> $member['sitting_fees'],
                     'paid_sitting_fee'   => $member['sitting_fees_paid'],
                     'actual_allowance'   => $member['director_allowance'],
                     'paid_allowance'     => $member['allowance_fees_paid'] ,					
                    //'type_no'           => $payment['cost_center'],
                    'created_by'         => $fpo_id,
				    'created_on'         => date('Y-m-d H:i:s'),
                );
               $this->db->insert('trv_fpo_meeting_attendence', $add_attendence);
            }
				
        } 
		return true;		  
	
	}

	function updatecommiteemeeting($commitee_id) {
		$fpo_id = $this->session->userdata('user_id');
		if($_FILES['upload_meeting']){
		$image = array();
		$ImageCount = count($_FILES['upload_meeting']['name']);
          if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				if($_FILES['upload_meeting']['name'][$i] != '') { 
               if(($ImageCount >= 2 && $i != ($ImageCount-1)) || $ImageCount == 2){
                 
					$_FILES['file']['name']       = $_FILES['upload_meeting']['name'][$i];
					$_FILES['file']['type']       = $_FILES['upload_meeting']['type'][$i];
					$_FILES['file']['tmp_name']   = $_FILES['upload_meeting']['tmp_name'][$i];
					$_FILES['file']['error']      = $_FILES['upload_meeting']['error'][$i];
					$_FILES['file']['size']       = $_FILES['upload_meeting']['size'][$i];
					$album= strtolower($this->session->userdata('user_id'));
					// File upload configuration
					$uploadPath = './assets/uploads/commiteemeeting/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|pdf';
					$config['max_size']	= 5120;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!is_dir('./assets/uploads/commiteemeeting/')) {
					mkdir('./assets/uploads/commiteemeeting/', 0777, TRUE);
					}					
					// Upload file to server
					if($this->upload->do_upload('file')){
						// Uploaded file data
						$imageData = $this->upload->data();
						$uploadImgData[] = $imageData['file_name'];
					}
					else
					{
						
					}
					if(!empty($uploadImgData))
					{
						$imageupload=$uploadImgData;
					}
					else
					{
						$imageupload='';
					}
				}}	
			}
		}
		}
		
			//if(!empty($uploadImgData)){
			 	$update_commiteemeeting = array(
				  'fpo_id'                        => $this->session->userdata('user_id'),	
				  //'mom_file'                      => ($imageupload)?implode(',', $imageupload):"",
				  'meeting_date'                  => $this->input->post('meeting_date'),
				  'committee_id'                  => $this->input->post('committee_id'),
				  'mom'                           => $this->input->post('meeting_minutes'),
				  //'director_id'                   => implode(',', $this->input->post('director_id')),
				  'status'						  => 1,
				  //'director'                  => implode(',', $this->input->post('director')),
				  'created_by'                 => $fpo_id,
				  'created_on'                 => date('Y-m-d H:i:s'),                     
				);
				
				if(isset($imageupload)) {
					$update_commiteemeeting['mom_file'] = ($imageupload)?implode(',', $imageupload):"";
				}
				$this->db->update('trv_committee_meeting', $update_commiteemeeting,array('id' => $commitee_id));
				
				
				$member_id = $this->input->post('member_id');
				$member_attendee_id = $this->input->post('member_attendee_id');
				$member_sitting_fees = $this->input->post('member_sitting_fees');
				$member_sitting_fees_paid = $this->input->post('member_sitting_fees_paid');
				$member_director_allowance = $this->input->post('member_director_allowance');
				$member_allowance_fees_paid = $this->input->post('member_allowance_fees_paid');
				for($i=0; $i<count($member_id); $i++){
					$get_id = $this->db->select('id')->from('trv_fpo_meeting_attendence')->where('id',$member_id[$i])->where('fpo_id',$this->session->userdata('user_id'))->get()->row()->id;
					if($get_id) {
						$add_attendence = array(	
							'fpo_id'            => $this->session->userdata('user_id'),
							'meeting_id'        => $commitee_id,
							'meeting_type'      => 2,
							'meeting_date'      => $this->input->post('meeting_date'),
							'attendee_type'     => 2,
							'attendee_id'       =>  $member_attendee_id[$i],
							'actual_sitting_fee	'=> $member_sitting_fees[$i],
							'paid_sitting_fee'   => $member_sitting_fees_paid[$i],
							'actual_allowance'   => $member_director_allowance[$i],
							'paid_allowance'     => $member_allowance_fees_paid[$i],					
							//'type_no'           => $payment['cost_center'],
							'created_by'         => $fpo_id,
							'created_on'         => date('Y-m-d H:i:s'),
						);
						$this->db->update('trv_fpo_meeting_attendence', $add_attendence,array('id' => $member_id[$i]));
					}
					else {
						$add_attendence = array(	
							'fpo_id'            => $this->session->userdata('user_id'),
							'meeting_id'        => $commitee_id,
							'meeting_type'      => 2,
							'meeting_date'      => $this->input->post('meeting_date'),
							'attendee_type'     => 2,
							'attendee_id'       =>  $member_attendee_id[$i],
							'actual_sitting_fee	'=> $member_sitting_fees[$i],
							'paid_sitting_fee'   => $member_sitting_fees_paid[$i],
							'actual_allowance'   => $member_director_allowance[$i],
							'paid_allowance'     => $member_allowance_fees_paid[$i],					
							//'type_no'           => $payment['cost_center'],
							'created_by'         => $fpo_id,
							'created_on'         => date('Y-m-d H:i:s'),
						);
						$this->db->insert('trv_fpo_meeting_attendence', $add_attendence); 
					}
				}
	return true;			
}
	function Allshare_data()
	{
		$fpo_id = $this->session->userdata('user_id');
		return $this->db->where('trv_share_allotment.fpo_id', $fpo_id)->where('trv_share_allotment.status', 1)->count_all_results('trv_share_allotment');
	}
	function addannualmeeting() {
			$fpo_id = $this->session->userdata('user_id');
			$image = array();
			$ImageCount = count($_FILES['upload_meeting']['name']);
			if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				if($_FILES['upload_meeting']['name'][$i] != '') { 
                     if(($ImageCount >= 2 && $i != ($ImageCount-1)) || $ImageCount == 2){
                       
                     $_FILES['file']['name']       = $_FILES['upload_meeting']['name'][$i];
                     $_FILES['file']['type']       = $_FILES['upload_meeting']['type'][$i];
                     $_FILES['file']['tmp_name']   = $_FILES['upload_meeting']['tmp_name'][$i];
                     $_FILES['file']['error']      = $_FILES['upload_meeting']['error'][$i];
                     $_FILES['file']['size']       = $_FILES['upload_meeting']['size'][$i];
                     $album= strtolower($this->session->userdata('user_id'));
                     // File upload configuration
                     $uploadPath = './assets/uploads/annualmeeting/';
                     $config['upload_path'] = $uploadPath;
                     $config['allowed_types'] = 'jpg|jpeg|pdf';
                     $config['max_size']	= 5120;
                     $config['encrypt_name']	= TRUE;				
                     $config['overwrite'] = TRUE;
                     // Load and initialize upload library
                     $this->load->library('upload', $config);
                     $this->upload->initialize($config);
                     if (!is_dir('./assets/uploads/annualmeeting/')) {
                     mkdir('./assets/uploads/annualmeeting/', 0777, TRUE);
                     }					
                     // Upload file to server
                     if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $imageData = $this->upload->data();
                        $uploadImgData[] = $imageData['file_name'];
                     }
                     else
                     {
                        
                     }
                     if(!empty($uploadImgData))
                     {
                        $imageupload=$uploadImgData;
                     }
                     else
                     {
                        $imageupload='';
                     }
                  }}	
               }
         }               
				//if(!empty($uploadImgData)){
					$add_annualmeeting = array(
					  'fpo_id'                        => $this->session->userdata('user_id'),	
					  'mom_file'                      => ($imageupload) ? implode(',', $imageupload):"",
					  'meeting_type'                  => $this->input->post('meeting_nature'),
					  'notice_date'                   => $this->input->post('notice_date'),
					  'meeting_date'                  => $this->input->post('meeting_date'),
					  'meeting_time'                  => $this->input->post('time'),
					  'place'                         => $this->input->post('place'),
					  'quorum'                        => $this->input->post('quorum'),
					  'attendee_count'                => $this->input->post('number_present'),
					  'quorum_available'              => $this->input->post('quorum_available'),
					  'adjurnment_date'               => $this->input->post('adjourment_date'),
					  'mom'                           => $this->input->post('meeting_minutes'),
					  'status'						  => 1,
					  //'director'                  => implode(',', $this->input->post('director')),
					  'created_by'                 => $fpo_id,
					  'created_on'                 => date('Y-m-d H:i:s'),                     
					);
					return  $this->db->insert('trv_annual_meeting', $add_annualmeeting); 									 

	}
	function updateannualmeeting($annualmeeting_id) {
			$fpo_id = $this->session->userdata('user_id');
			$image = array();
			$ImageCount = count($_FILES['upload_meeting']['name']);
         if(count($ImageCount)) {
			for($i = 0; $i < $ImageCount; $i++){
				if($_FILES['upload_meeting']['name'][$i] != '') {
               
               if(($ImageCount >= 2 && $i != ($ImageCount-1)) || $ImageCount == 2){
                 
					$_FILES['file']['name']       = $_FILES['upload_meeting']['name'][$i];
					$_FILES['file']['type']       = $_FILES['upload_meeting']['type'][$i];
					$_FILES['file']['tmp_name']   = $_FILES['upload_meeting']['tmp_name'][$i];
					$_FILES['file']['error']      = $_FILES['upload_meeting']['error'][$i];
					$_FILES['file']['size']       = $_FILES['upload_meeting']['size'][$i];
					$album= strtolower($this->session->userdata('user_id'));
					// File upload configuration
					$uploadPath = './assets/uploads/annualmeeting/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|pdf';
					$config['max_size']	= 5120;
					$config['encrypt_name']	= TRUE;				
					$config['overwrite'] = TRUE;
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!is_dir('./assets/uploads/annualmeeting/')) {
					mkdir('./assets/uploads/annualmeeting/', 0777, TRUE);
					}					
					// Upload file to server
					if($this->upload->do_upload('file')){
						// Uploaded file data
						$imageData = $this->upload->data();
						$uploadImgData[] = $imageData['file_name'];
					}
					else
					{
						
					}
					if(!empty($uploadImgData))
					{
						$imageupload=$uploadImgData;
					}
					else
					{
						$imageupload='';
					}
				}}	
			}
		}
				//if(!empty($uploadImgData)){
					$update_annualmeeting = array(
					  'fpo_id'                        => $this->session->userdata('user_id'),	
					  //'mom_file'                      => implode(',', $imageupload),
					  'meeting_type'                  => $this->input->post('meeting_nature'),
					  'notice_date'                   => $this->input->post('notice_date'),
					  'meeting_date'                  => $this->input->post('meeting_date'),
					  'meeting_time'                  => $this->input->post('time'),
					  'place'                         => $this->input->post('place'),
					  'quorum'                        => $this->input->post('quorum'),
					  'attendee_count'                => $this->input->post('number_present'),
					  'quorum_available'              => $this->input->post('quorum_available'),
					  'adjurnment_date'               => ($this->input->post('adjourment_date')) ? ($this->input->post('adjourment_date')):"",
					  'mom'                           => $this->input->post('meeting_minutes'),
					  'status'						        => 1,
					  //'director'                  => implode(',', $this->input->post('director')),
					  'created_by'                 => $fpo_id,
					  'created_on'                 => date('Y-m-d H:i:s'),                     
					);
					if(isset($imageupload)) {
					$update_annualmeeting['mom_file'] = ($imageupload)?implode(',', $imageupload):"";
				}
					return $this->db->update('trv_annual_meeting', $update_annualmeeting,array('id' => $annualmeeting_id)); 				
					 
		}

	
	function addnotice(){ 
			/* if(($this->input->post('reason'))==8) {
			$reason=$this->input->post('other_reason');
		}else{
			$reason=$this->input->post('reason');
		} */
			$notice = array(
         'fpo_id'                  => $this->session->userdata('user_id'),
			'notice_date'             => $this->input->post('notice_date'),
	      'meeting_date'          => $this->input->post('meeting_date'),
         'meeting_time'          => $this->input->post('meeting_time'),
         'place_of_meeting'      => $this->input->post('meeting_place'),
         'pincode'               => $this->input->post('pin_code'),
         'state_id'              => $this->input->post('state'),
			'district_id'           => $this->input->post('district'),
			'taluk_id'              => $this->input->post('taluk'),
			'block'                 => $this->input->post('block'),
			'panchayat'             => $this->input->post('gram_panchayat'),
			'village'               => $this->input->post('village'),
			'address'               => $this->input->post('street'),
			'door_no'               => $this->input->post('door_no'),
			'agenda'                => $this->input->post('agenda'),
			'short_notice_reason'   => $this->input->post('reason_notice'),                 
        );	
		return $this->db->insert('trv_notice_to_director', $notice);
	}
	function updatenotice($notice_id){ 
			/* if(($this->input->post('reason'))==8) {
			$reason=$this->input->post('other_reason');
		}else{
			$reason=$this->input->post('reason');
		} */
			$notice = array(
         'fpo_id'                => $this->session->userdata('user_id'),
			'notice_date'           => $this->input->post('notice_date'),
	      'meeting_date'          => $this->input->post('meeting_date'),
         'meeting_time'          => $this->input->post('meeting_time'),
         'place_of_meeting	'   => $this->input->post('meeting_place'),
         'pincode'               => $this->input->post('pin_code'),
         'state_id'              => $this->input->post('state'),
			'district_id'           => $this->input->post('district'),
			'taluk_id'              => $this->input->post('taluk'),
			'block'                 => $this->input->post('block'),
			'panchayat'             => $this->input->post('gram_panchayat'),
			'village'               => $this->input->post('village'),
			'address'               => $this->input->post('street'),
			'door_no'               => $this->input->post('door_no'),
			'agenda'                => $this->input->post('agenda'),
			'short_notice_reason'         => $this->input->post('reason_notice'),                 
        );	
		return $this->db->update('trv_notice_to_director', $notice, array('id' => $notice_id));
	}
    function boardmeetinglist(){ 
	    $fpo_id=$this->session->userdata('user_id');
		$this->db->select('trv_board_meeting.*,trv_director.name AS name,trv_fpo_meeting_attendence.meeting_id,trv_fpo_meeting_attendence.attendee_id');
		$this->db->join('trv_fpo_meeting_attendence', 'trv_fpo_meeting_attendence.meeting_id = trv_board_meeting.id','left');
		$this->db->join('trv_director', 'trv_director.id = trv_board_meeting.chairman_id','Left' );
		$this->db->from('trv_board_meeting');
		//$this->db->join('trv_director', 'trv_director.id =  trv_board_meeting.chairman_id', 'Right');
		$this->db->where(array('trv_board_meeting.fpo_id' => $fpo_id,'trv_board_meeting.status' => 1,'trv_fpo_meeting_attendence.meeting_type' => 1));
		$this->db->group_by('trv_fpo_meeting_attendence.meeting_id');
      $query = $this->db->get()->result();
		return $query;
	}
	function commiteemeetinglist(){ 
	    $fpo_id=$this->session->userdata('user_id');
		$this->db->select('trv_committee_meeting.*,trv_director.name AS name,trv_fpo_meeting_attendence.meeting_id,trv_fpo_meeting_attendence.attendee_id,trv_fpo_meeting_attendence.paid_sitting_fee,trv_fpo_meeting_attendence.paid_allowance');
		$this->db->join('trv_fpo_meeting_attendence', 'trv_fpo_meeting_attendence.meeting_id = trv_committee_meeting.id');
		$this->db->join('trv_director', 'trv_director.id = trv_committee_meeting.committee_id', 'left');
		$this->db->from('trv_committee_meeting');
		$this->db->where(array('trv_committee_meeting.fpo_id' => $fpo_id,'trv_committee_meeting.status' => 1,'trv_fpo_meeting_attendence.meeting_type' => 2));
      $this->db->group_by('trv_fpo_meeting_attendence.meeting_id');
      $query = $this->db->get()->result();
		return $query;
	}
	function annualmeetinglist(){ 
	    $fpo_id=$this->session->userdata('user_id');
		$this->db->select('trv_annual_meeting.*');
		///$this->db->join('trv_fpo_meeting_attendence', 'trv_fpo_meeting_attendence.meeting_id = trv_committee_meeting.id');
		//$this->db->join('trv_director', 'trv_director.id = trv_fpo_meeting_attendence.attendee_id', 'left');
		$this->db->from('trv_annual_meeting');
		$this->db->where(array('trv_annual_meeting.fpo_id' => $fpo_id,'trv_annual_meeting.status' => 1));
		$query = $this->db->get()->result();
		return $query;
	}
	function boardmeeting_detail($meeting_id){
		$this->db->select('trv_board_meeting.id,trv_fpo_meeting_attendence.meeting_id,trv_board_meeting.fpo_id,trv_board_meeting.meeting_date,trv_board_meeting.chairman_id,trv_board_meeting.quorum,trv_board_meeting.quorum_available,trv_board_meeting.adjurnment_date,trv_board_meeting.mom,trv_board_meeting.mom_file,trv_fpo_meeting_attendence.id,trv_fpo_meeting_attendence.attendee_id,trv_fpo_meeting_attendence.actual_sitting_fee,trv_fpo_meeting_attendence.paid_sitting_fee,trv_fpo_meeting_attendence.actual_allowance,trv_fpo_meeting_attendence.paid_allowance,trv_director.name AS name'); // <-- There is never any reason to write this line!		
		$this->db->from('trv_board_meeting');
		$this->db->join('trv_fpo_meeting_attendence','trv_fpo_meeting_attendence.meeting_id=trv_board_meeting.id');
		$this->db->join('trv_director', 'trv_director.id = trv_fpo_meeting_attendence.attendee_id');
		$this->db->where(array('trv_board_meeting.id' => $meeting_id, 'trv_board_meeting.status' => '1', 'trv_fpo_meeting_attendence.meeting_type' => '1'));
		$query = $this->db->get()->result();
		return $query;	
	}
	function fpomeeting_detail($boardmeeting_id) {	
		$this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('trv_fpo_meeting_attendence');
		$this->db->where(array('trv_fpo_meeting_attendence.meeting_id' => $boardmeeting_id));
		//$this->db->join('trv_fpo_meeting_attendence', 'trv_fpo_meeting_attendence.meeting_id = trv_board_meeting.id');
		//$this->db->join('trv_director', 'trv_director.id = trv_board_meeting.chairman_id');
		$query = $this->db->get()->result();
		return $query;
	}
	function commiteemeeting_detail($meeting_id) {
		$this->db->select('trv_committee_meeting.id,trv_committee_meeting.fpo_id,trv_committee_meeting.meeting_date,trv_committee_meeting.committee_id,trv_committee_meeting.mom,trv_committee_meeting.mom_file,trv_fpo_meeting_attendence.attendee_id,trv_fpo_meeting_attendence.actual_sitting_fee,trv_fpo_meeting_attendence.paid_sitting_fee,trv_fpo_meeting_attendence.actual_allowance,trv_fpo_meeting_attendence.paid_allowance,trv_director.name AS name'); // <-- There is never any reason to write this line!		
		$this->db->from('trv_committee_meeting');
		$this->db->join('trv_fpo_meeting_attendence','trv_fpo_meeting_attendence.meeting_id=trv_committee_meeting.id');
		$this->db->join('trv_director', 'trv_director.id = trv_fpo_meeting_attendence.attendee_id');
		$this->db->where(array('trv_committee_meeting.id' => $meeting_id, 'trv_committee_meeting.status' => '1', 'trv_fpo_meeting_attendence.meeting_type' => '2'));
		$query = $this->db->get()->result();
		return $query;
	}
	function fpocommiteemeeting_detail($commiteemeeting_id) {
		$this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('trv_fpo_meeting_attendence');
		$this->db->where(array('trv_fpo_meeting_attendence.meeting_id' => $commiteemeeting_id,'trv_fpo_meeting_attendence.meeting_type' => 2));
		//$this->db->join('trv_fpo_meeting_attendence', 'trv_fpo_meeting_attendence.meeting_id = trv_board_meeting.id');
		//$this->db->join('trv_director', 'trv_director.id = trv_board_meeting.chairman_id');
		$query = $this->db->get()->result();
		return $query;	
	}
	function annualmeeting_detail($annualmeeting_id){
		$fpoid=$this->session->userdata('user_id');
        $this->db->select('trv_annual_meeting.*');
        $this->db->from('trv_annual_meeting');
		$this->db->where(array('trv_annual_meeting.id' => $annualmeeting_id,'trv_annual_meeting.fpo_id' =>$fpoid ));
		//$this->db->join('trv_director', 'trv_director.id = trv_commitee_member.director_id','LEFT');
		return $this->db->get()->result();
	}
	//Commitee Meeting
	function Commiteedirectorlist() { 
	  $fpo_id=$this->session->userdata('user_id');
      $this->db->select('*');
      $this->db->order_by("trv_commitee_name.id", "desc");
	  $this->db->where(array('trv_commitee_name.fpo_id' => $fpo_id,'trv_commitee_name.fpo_id' => $fpo_id));	  
	  $this->db->from('trv_commitee_name');	 
      return $this->db->get()->result();	
    } 
	function getcommiteememberdetail($commitee_id){
		$fpoid=$this->session->userdata('user_id');
		$this->db->select('trv_commitee_member.*');
		$this->db->from('trv_commitee_member');
		$this->db->where(array('trv_commitee_member.commitee_id' => $commitee_id,'trv_commitee_member.fpo_id' =>$fpoid ));
		//$this->db->join('trv_director', 'trv_director.id = trv_commitee_member.director_id');
		return $this->db->get()->result();		 	
	}
	function getCommiteeMemberById($member_id){
		$this->db->select('trv_commitee_member.*');
		$this->db->from('trv_commitee_member');
		$this->db->where(array('trv_commitee_member.id' => $member_id));
		return $this->db->get()->result();		 	
	}
	function getDirectorMemberNameByID($director_id){
		$this->db->select('trv_director.name AS director_name');
		$this->db->from('trv_director');
		$this->db->where(array('trv_director.id' => $director_id));
		return $this->db->get()->row();		 	
	}
	function getCEOMemberNameByID($ceo_id){
		$this->db->select('trv_fpo_ceo.name AS ceo_name');
		$this->db->from('trv_fpo_ceo');
		$this->db->where(array('trv_fpo_ceo.id' => $ceo_id));
		return $this->db->get()->row();		 	
	}

	/** Cluster identification code starts **/
	function clusterIdentificationList($fpo_id){ 
		$this->db->select('trv_cluster_identification.*'); // <-- There is never any reason to write this line!
		$this->db->where(array('trv_cluster_identification.fpo_id' => $fpo_id, 'trv_cluster_identification.status' => 1));
		$this->db->from('trv_cluster_identification');
		$query = $this->db->get()->result();
		return $query;
	}
	
	function addClusterIdentification() {
		$cluster = array(
            'fpo_id'                => $this->session->userdata('user_id'),
			'identification_date'   => $this->input->post('date_identification'),
	        'cluster_name'          => $this->input->post('cluster_name'),
            'blocks'          		=> implode(',', $this->input->post('block_name')),
            'villages_covered	'   => implode(',', $this->input->post('village')),
            'no_of_farmers'         => $this->input->post('farmer_count'),
            'activities'    		=> $this->input->post('activities'),
			'updated_by'    		=> $this->session->userdata('user_id'),
			'updated_on'    		=> date('Y-m-d H:i:s'),
			'created_by'    		=> $this->session->userdata('user_id'),
			'created_on'    		=> date('Y-m-d H:i:s')		
        );	
		return $this->db->insert('trv_cluster_identification', $cluster);	
	}
	
	function updateClusterIdentification() {
		$cluster = array(
            'fpo_id'                => $this->session->userdata('user_id'),
			'identification_date'   => $this->input->post('date_identification'),
	        'cluster_name'          => $this->input->post('cluster_name'),
            'blocks'          		=> implode(',', $this->input->post('block_name')),
            'villages_covered'      => implode(',', $this->input->post('village')),
            'no_of_farmers'         => $this->input->post('no_of_farmers'),
            'activities'    		=> $this->input->post('activities'),
			
			'updated_by'    		=> $this->session->userdata('user_id'),
			'updated_on'    		=> date('Y-m-d H:i:s')
        );	
		return $this->db->update('trv_cluster_identification', $cluster, array('id' => $this->input->post('cluster_id')));	
	}
	
	function clusterIdentificationByID($cluster_id){ 
		$this->db->select('trv_cluster_identification.*'); // <-- There is never any reason to write this line!
		$this->db->where(array('trv_cluster_identification.id' => $cluster_id, 'trv_cluster_identification.status' => 1));
		$this->db->from('trv_cluster_identification');
		$query = $this->db->get()->row_array();
		return $query;
	}
/** Cluster identification code end **/


/** Baseline information related code starts **/
	function clusterIdentificationNames($fpo_id){ 
		$this->db->select('trv_cluster_identification.id, trv_cluster_identification.cluster_name');
		$this->db->where(array('trv_cluster_identification.fpo_id' => $fpo_id, 'trv_cluster_identification.status' => 1));
		$this->db->from('trv_cluster_identification');
		$query = $this->db->get()->result();
		return $query;
	}
	
	function getClusterInformation($cluster_id){ 
		$this->db->select('trv_cluster_identification.no_of_farmers,trv_cluster_identification.villages_covered'); // <-- There is never any reason to write this line!
		$this->db->where(array('trv_cluster_identification.id' => $cluster_id, 'trv_cluster_identification.status' => 1));
		$this->db->from('trv_cluster_identification');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	function getFarmersByVillage( $village_id ) {
		$this->db->select('trv_farmer.id'); 
		$this->db->where_in('trv_farmer.village', $village_id);
		$this->db->where(array('status' => 1));
        $this->db->from("trv_farmer");		
        return $this->db->get()->result();
	}
		
	function getFarmersWetLand( $farmer_id ) {
        $wetland_count = $this->db->get_where('trv_land_holdings', array('farmer_id' => $farmer_id, 'land_type' => 1))->num_rows();
		return $wetland_count;
    }
	
	function getFarmersDryLand( $farmer_id ) {
        $dryland_count = $this->db->get_where('trv_land_holdings', array('farmer_id' => $farmer_id, 'land_type' => 2))->num_rows();
		return $dryland_count;
    }
	
	function baselineInformationList($fpo_id){ 
		$this->db->select('trv_baseline_info.*, trv_cluster_identification.cluster_name As cluster');
		$this->db->where(array('trv_baseline_info.fpo_id' => $fpo_id, 'trv_baseline_info.status' => 1));
		$this->db->from('trv_baseline_info');
		$this->db->join('trv_cluster_identification', 'trv_cluster_identification.id = trv_baseline_info.cluster_name');	  
		$query = $this->db->get()->result();
		return $query;
	}
	
	function addBaselineInformation() {
		$baseline_info = array(
            'fpo_id'                	=> $this->session->userdata('user_id'),
			'baseline_date'   			=> $this->input->post('baseline_date'),
	        'cluster_name'          	=> $this->input->post('cluster_name'),
            'no_of_villages_covered'    => $this->input->post('village_covered'),
            'no_of_farmers'   			=> $this->input->post('farmer_covered'),
            'crop_grown'         		=> implode(',', $this->input->post('crop_grown')),
            'wet_land'    				=> $this->input->post('wet_land'),
			'dry_land'    				=> $this->input->post('dry_land'),
			'water_availability'    	=> $this->input->post('water_availability'),
			'market_availability'    	=> $this->input->post('market_availability'),
			'market_proximity'    		=> $this->input->post('market_proximity'),
			
			'updated_by'    		=> $this->session->userdata('user_id'),
			'updated_on'    		=> date('Y-m-d H:i:s'),
			'created_by'    		=> $this->session->userdata('user_id'),
			'created_on'    		=> date('Y-m-d H:i:s')		
        );	
		return $this->db->insert('trv_baseline_info', $baseline_info);	
	}
	
	function baselineInformationByID($baseline_id){ 
		$this->db->select('trv_baseline_info.*, trv_cluster_identification.cluster_name As cluster');
		$this->db->where(array('trv_baseline_info.id' => $baseline_id, 'trv_baseline_info.status' => 1));
		$this->db->from('trv_baseline_info');
		$this->db->join('trv_cluster_identification', 'trv_cluster_identification.id = trv_baseline_info.cluster_name');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	function updateBaselineInformation() {
		$baseline_info = array(
            'fpo_id'                	=> $this->session->userdata('user_id'),
			'baseline_date'   			=> $this->input->post('baseline_date'),
	        'cluster_name'          	=> $this->input->post('cluster_name'),
            'no_of_villages_covered'    => $this->input->post('village_covered'),
            'no_of_farmers'   			=> $this->input->post('farmer_covered'),
            'crop_grown'         		=> implode(',', $this->input->post('crop_grown')),
            'wet_land'    				=> $this->input->post('wet_land'),
			'dry_land'    				=> $this->input->post('dry_land'),
			'water_availability'    	=> $this->input->post('water_availability'),
			'market_availability'    	=> $this->input->post('market_availability'),
			'market_proximity'    		=> $this->input->post('market_proximity'),
			
			'updated_by'    		=> $this->session->userdata('user_id'),
			'updated_on'    		=> date('Y-m-d H:i:s')
        );	
		return $this->db->update('trv_baseline_info', $baseline_info, array('id' => $this->input->post('baseline_id')));	
	}
	
	function getLandByFarmer($farmer_id) {
        $this->db->select('trv_land_holdings.id');
        $this->db->order_by("trv_land_holdings.id", "desc");
        $this->db->from('trv_land_holdings');
        $this->db->where(array('trv_land_holdings.farmer_id' => $farmer_id, 'trv_land_holdings.status' => 1));
        return $this->db->get()->result();	
    }
		
	function getCropByLandID($land_id) {        
        $this->db->select('trv_crop.id, trv_crop_name_master.name AS crop_name, trv_crop.area, trv_crop.area_uom, trv_uom_master.short_name');
        $this->db->from('trv_crop');
		$this->db->distinct();
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.crop_id');
		$this->db->join('trv_uom_master', 'trv_uom_master.id = trv_crop.area_uom');
		$this->db->where(array('trv_crop.land_id' => $land_id, 'trv_crop.status' => 1));
		//$this->db->where_in('trv_crop.farmer_id', $farmer_ids);
		$this->db->group_by("trv_crop.crop_id");
		//$this->db->limit(1,5); 
		return $this->db->get()->result();
    }
	
	function exposureVisitlist() { 
	    $fpo_id=$this->session->userdata('user_id');
        $this->db->select('trv_exposure_visit.*');
		$this->db->order_by("trv_exposure_visit.id", "desc");
		$this->db->where(array('trv_exposure_visit.fpo_id' => $fpo_id, 'trv_exposure_visit.status' => 1));
		$this->db->from('trv_exposure_visit');
		return $this->db->get()->result();		
    } 
	
	function exposureVisitByID($awarenes_id) {
      $this->db->select('trv_exposure_visit.*');        
      $this->db->where(array('trv_exposure_visit.id' => $awarenes_id, 'trv_exposure_visit.status' => 1));
      $this->db->from('trv_exposure_visit');
      return $this->db->get()->row_array();  

    }
   
	function addExposurevisit() {
        $add_awareness = array(	
			'fpo_id'                => $this->session->userdata('user_id'),
			'program_date'          => $this->input->post('date_visit'),
			'conducting_place' 		=> $this->input->post('place_visit'),	
			'no_of_participants'    => $this->input->post('no_participants'),
			'cost_involved'    		=> $this->input->post('cost_involved'),
			'no_of_villages' 		=> $this->input->post('no_villages'),			
			'amount' 				=> $this->input->post('amount'),
            'updated_by'        	=> $this->session->userdata('user_id'),
            'updated_on'        	=> date('Y-m-d H:i:s'),    
			'created_by'        	=> $this->session->userdata('user_id'),
            'created_on'        	=> date('Y-m-d H:i:s')    
        );	
        $this->db->insert('trv_exposure_visit', $add_awareness);
		$last_inserted_program_id = $this->db->insert_id();

      if (!empty($_FILES['program_photo']['name'][0])) {
         if (!is_dir('assets/uploads/exposure')) {
            mkdir('assets/uploads/exposure', 0777, TRUE);
         }
         if (!is_dir('assets/uploads/exposure/exposure_visit_'.$last_inserted_program_id)) {
            mkdir('assets/uploads/exposure/exposure_visit_'.$last_inserted_program_id, 0777, TRUE);
         }	

         //echo json_encode($_FILES["program_photo"]);
         $UploadFolder = 'assets/uploads/exposure/exposure_visit_'.$last_inserted_program_id;
         $counter = 0;
         $errors = array();
         $uploadedFiles = array();
         $extension = array("jpeg","jpg","png","gif");
         $bytes = 1024;
         $KB = 500;
         $totalBytes = $bytes * $KB;
         foreach($_FILES["program_photo"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["program_photo"]["tmp_name"][$key];
            $name = $_FILES["program_photo"]["name"][$key];
              
            if(empty($temp)) {
               break;
            }
                  
            $counter++;
            $UploadOk = true;
                  
            if($_FILES["program_photo"]["size"][$key] > $totalBytes) {
               $UploadOk = false;
               array_push($errors, $name." File size is larger than the 500KB.");
            }
                  
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
               $UploadOk = false;
               array_push($errors, $name." is invalid file type.");
            }
                  
            /*if(file_exists($UploadFolder."/".$name) == true){
               $UploadOk = false;
               array_push($errors, $name." file is already exist.");
            }*/
                  
            if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
               move_uploaded_file($temp,$UploadFolder."/".$name);
               array_push($uploadedFiles, $name);
               $add_awareness = array(	
                  'is_photo_available'  	=> 1
               );	
            } else {
               $add_awareness = array(	
                  'is_photo_available'  	=> 0
               );	
            }
            $this->db->update('trv_exposure_visit', $add_awareness, array('id' => $last_inserted_program_id));
         }
      }
		return $last_inserted_program_id;
	}
	
	
	function updateExposurevisit() {
        $update_awareness = array(	
			'fpo_id'                => $this->session->userdata('user_id'),
			'program_date'          => $this->input->post('date_visit'),
			'conducting_place' 		=> $this->input->post('place_visit'),	
			'no_of_participants'    => $this->input->post('no_participants'),
			'cost_involved'    		=> $this->input->post('cost_involved'),
			'no_of_villages' 		=> $this->input->post('no_villages'),			
			'amount' 				=> $this->input->post('amount'),				
            'updated_by'        	=> $this->session->userdata('user_id'),
            'updated_on'        	=> date('Y-m-d H:i:s')   
        );	
		$this->db->update('trv_exposure_visit', $update_awareness, array('id' => $this->input->post('exposure_id')));
		
      if (!empty($_FILES['program_photo']['name'][0])) {
         if (!is_dir('assets/uploads/exposure')) {
            mkdir('assets/uploads/exposure', 0777, TRUE);
         }
         if (!is_dir('assets/uploads/exposure/exposure_visit_'.$this->input->post('exposure_id'))) {
            mkdir('assets/uploads/exposure/exposure_visit_'.$this->input->post('exposure_id'), 0777, TRUE);
         }	

         //echo json_encode($_FILES["program_photo"]);
         $UploadFolder = 'assets/uploads/exposure/exposure_visit_'.$this->input->post('exposure_id');
         $counter = 0;
         $errors = array();
         $uploadedFiles = array();
         $extension = array("jpeg","jpg","png","gif");
         $bytes = 1024;
         $KB = 500;
         $totalBytes = $bytes * $KB;
         foreach($_FILES["program_photo"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["program_photo"]["tmp_name"][$key];
            $name = $_FILES["program_photo"]["name"][$key];
               
            if(empty($temp)) {
               break;
            }
                  
            $counter++;
            $UploadOk = true;
                  
            if($_FILES["program_photo"]["size"][$key] > $totalBytes) {
               $UploadOk = false;
               array_push($errors, $name." File size is larger than the 500KB.");
            }
                  
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
               $UploadOk = false;
               array_push($errors, $name." is invalid file type.");
            }
                  
            /*if(file_exists($UploadFolder."/".$name) == true){
               $UploadOk = false;
               array_push($errors, $name." file is already exist.");
            }*/
                  
            if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
               move_uploaded_file($temp,$UploadFolder."/".$name);
               array_push($uploadedFiles, $name);
               $add_awareness = array(	
                  'is_photo_available'  	=> 1
               );	
            } else {
               $add_awareness = array(	
                  'is_photo_available'  	=> 0
               );	
            }
            $this->db->update('trv_exposure_visit', $add_awareness, array('id' => $this->input->post('exposure_id')));
         }
      }   
		return $this->input->post('exposure_id');
	}
/** Baseline information related code end **/



/** Training to directors related code starts **/
	function trainingOfDirectors($fpo_id){ 
		$this->db->select('trv_training_director.*');
		$this->db->where(array('trv_training_director.fpo_id' => $fpo_id, 'trv_training_director.status' => 1));
		$this->db->from('trv_training_director');
		$query = $this->db->get()->result();
		return $query;
	}
	
	function postAddTrainingOfDirector() {
        $add_training = array(	
         'fpo_id'                => $this->session->userdata('user_id'),
         'training_date'         => $this->input->post('date_of_training'),
         'attended_director' 	   => implode(',', $this->input->post('directors_attended')),	
         'program_speaker'    	=> implode(',', $this->input->post('program_speakers')),
         'cost_involved'    		=> $this->input->post('involved_cost'),
         'involved_cost' 		   => $this->input->post('involved_cost_value'),	

         'updated_by'        	   => $this->session->userdata('user_id'),
         'updated_on'          	=> date('Y-m-d H:i:s'),    
         'created_by'         	=> $this->session->userdata('user_id'),
         'created_on'          	=> date('Y-m-d H:i:s')    
        );	
        $this->db->insert('trv_training_director', $add_training);
         $last_inserted_program_id = $this->db->insert_id();
		
         if (!empty($_FILES['trainie_photo']['name'][0])) {
            if (!is_dir('assets/uploads/training_director')) {
               mkdir('assets/uploads/training_director', 0777, TRUE);
            }
            if (!is_dir('assets/uploads/training_director/training_'.$last_inserted_program_id)) {
               mkdir('assets/uploads/training_director/training_'.$last_inserted_program_id, 0777, TRUE);
            }	

            //echo json_encode($_FILES["trainie_photo"]);
            $UploadFolder = 'assets/uploads/training_director/training_'.$last_inserted_program_id;
            $counter = 0;
            $errors = array();
            $uploadedFiles = array();
            $extension = array("jpeg","jpg","png","gif");
            $bytes = 1024;
            $KB = 500;
            $totalBytes = $bytes * $KB;
            foreach($_FILES["trainie_photo"]["tmp_name"] as $key=>$tmp_name){
               $temp = $_FILES["trainie_photo"]["tmp_name"][$key];
               $name = $_FILES["trainie_photo"]["name"][$key];
                  
               if(empty($temp)) {
                  break;
               }
                     
               $counter++;
               $UploadOk = true;
                     
               if($_FILES["trainie_photo"]["size"][$key] > $totalBytes) {
                  $UploadOk = false;
                  array_push($errors, $name." File size is larger than the 500KB.");
               }
                     
               $ext = pathinfo($name, PATHINFO_EXTENSION);
               if(in_array($ext, $extension) == false){
                  $UploadOk = false;
                  array_push($errors, $name." is invalid file type.");
               }
                     
               /*if(file_exists($UploadFolder."/".$name) == true){
                  $UploadOk = false;
                  array_push($errors, $name." file is already exist.");
               }*/
                     
               if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
                  move_uploaded_file($temp,$UploadFolder."/".$name);
                  array_push($uploadedFiles, $name);
                  $updatetable = array(	
                     'is_photo_available'  => 1
                  );	
               } else {
                  $updatetable = array(	
                     'is_photo_available'  => 0
                  );	
               }
               $this->db->update('trv_training_director', $updatetable, array('id' => $last_inserted_program_id));
            }
         }   
            
		return $last_inserted_program_id;
	}
	
	function postUpdateTrainingOfDirector($training_id) {
        $update_training = array(	
            'training_date'         => $this->input->post('date_of_training'),
            'attended_director' 	=> implode(',', $this->input->post('directors_attended')),	
            'program_speaker'    	=> implode(',', $this->input->post('program_speakers')),
            'cost_involved'    		=> $this->input->post('involved_cost'),
            'involved_cost' 		=> $this->input->post('involved_cost_value'),	

            'updated_by'        	=> $this->session->userdata('user_id'),
            'updated_on'        	=> date('Y-m-d H:i:s')   
        );	
		$this->db->update('trv_training_director', $update_training, array('id' => $training_id));
		
      if (!empty($_FILES['trainie_photo']['name'][0])) {
         if (!is_dir('assets/uploads/training_director')) {
            mkdir('assets/uploads/training_director', 0777, TRUE);
         }
         if (!is_dir('assets/uploads/training_director/training_'.$training_id)) {
            mkdir('assets/uploads/training_director/training_'.$training_id, 0777, TRUE);
         }	

         //echo json_encode($_FILES["trainie_photo"]);
         $UploadFolder = 'assets/uploads/training_director/training_'.$training_id;
         $counter = 0;
         $errors = array();
         $uploadedFiles = array();
         $extension = array("jpeg","jpg","png","gif");
         $bytes = 1024;
         $KB = 500;
         $totalBytes = $bytes * $KB;
         foreach($_FILES["trainie_photo"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["trainie_photo"]["tmp_name"][$key];
            $name = $_FILES["trainie_photo"]["name"][$key];
               
            if(empty($temp)) {
               break;
            }
                  
            $counter++;
            $UploadOk = true;
                  
            if($_FILES["trainie_photo"]["size"][$key] > $totalBytes) {
               $UploadOk = false;
               array_push($errors, $name." File size is larger than the 500KB.");
            }
                  
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
               $UploadOk = false;
               array_push($errors, $name." is invalid file type.");
            }
                  
            /*if(file_exists($UploadFolder."/".$name) == true){
               $UploadOk = false;
               array_push($errors, $name." file is already exist.");
            }*/
                  
            if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
               move_uploaded_file($temp,$UploadFolder."/".$name);
               array_push($uploadedFiles, $name);
               $add_awareness = array(	
                  'is_photo_available'  	=> 1
               );	
            } else {
               $add_awareness = array(	
                  'is_photo_available'  	=> 0
               );	
            }
            $this->db->update('trv_training_director', $add_awareness, array('id' => $training_id));
         }
      }   
         
		return $training_id;
	}
	
	function getTrainingDirectorsById($training_id){ 
		$this->db->select('trv_training_director.*');
		$this->db->where(array('trv_training_director.id' => $training_id, 'trv_training_director.status' => 1));
		$this->db->from('trv_training_director');
		$query = $this->db->get()->row_array();
		return $query;
	}
/** Training to directors related code end **/

/** Training to CEO's related code starts **/
	function getCeoTrainingList($fpo_id) {  
		$this->db->select('trv_training_ceo.*, trv_fpo_ceo.name As ceo_name');
		$this->db->where(array('trv_training_ceo.fpo_id' => $fpo_id, 'trv_training_ceo.status' => 1));	
		$this->db->from('trv_training_ceo');	 
		$this->db->order_by("trv_training_ceo.id", "desc");  
		$this->db->join('trv_fpo_ceo', 'trv_fpo_ceo.id = trv_training_ceo.ceo_id');	
		return $this->db->get()->result();	
    } 
	
	function getCeoDropdownList($fpo_id) {  
      $this->db->select('trv_fpo_ceo.id, trv_fpo_ceo.name');
 	  $this->db->where(array('trv_fpo_ceo.fpo_id' => $fpo_id, 'trv_fpo_ceo.status' => 1));	
	  $this->db->from('trv_fpo_ceo');	 
	  $this->db->order_by("trv_fpo_ceo.id", "desc");    
      return $this->db->get()->result();	
    } 
	
	function postAddTrainingOfCEO($fpo_id) {
        $add_training = array(	
         'fpo_id'                => $fpo_id,
         'ceo_id'         		   => $this->input->post('ceo_name'),
         'training_start_date' 	=> $this->input->post('date_training'),	
         'training_end_date'    	=> $this->input->post('date_completeion'),
         'no_of_days'    		   => $this->input->post('total_days'),
         'trainer_name' 			=> $this->input->post('trainer_name'),
         'institute_name' 		   => $this->input->post('institutes_name'),	
         'exposure_date'    		=> $this->input->post('exposure_date'),
         'place_to_visit'     	=> $this->input->post('place_visit'),
         'cost_involved' 		   => $this->input->post('involved_cost'),
         'involved_cost' 		   => $this->input->post('involved_cost_value'),
         'updated_by'        	   => $this->session->userdata('user_id'),
         'updated_on'        	   => date('Y-m-d H:i:s'),    
         'created_by'        	   => $this->session->userdata('user_id'),
         'created_on'        	   => date('Y-m-d H:i:s')    
        );	
      $this->db->insert('trv_training_ceo', $add_training);
		$last_inserted_program_id = $this->db->insert_id();
      
      //$get_uploaded_date=$this->db->select('trv_training_ceo.created_on')->where(array('trv_training_ceo.fpo_id' =>$this->session->userdata('user_id'),'trv_training_ceo.id'=>$last_inserted_program_id))->from('trv_training_ceo')->get()->row()->created_on;
      if (!empty($_FILES['program_photo']['name'][0])) {
         //$uploadname=date("YmdHis", strtotime($get_uploaded_date));
         if (!is_dir('assets/uploads/training_CEO')) {
            mkdir('assets/uploads/training_CEO', 0777, TRUE);
         }
         if (!is_dir('assets/uploads/training_CEO/training_'.$last_inserted_program_id)) {
            mkdir('assets/uploads/training_CEO/training_'.$last_inserted_program_id, 0777, TRUE);
         }	
         
         //echo json_encode($_FILES["program_photo"]);die;
         
         $UploadFolder = 'assets/uploads/training_CEO/training_'.$last_inserted_program_id;
         $counter = 0;
         $errors = array();
         $uploadedFiles = array();
         $extension = array("jpeg","jpg","png","gif");
         $bytes = 1024;
         $KB = 500;
        // $max_length =5;
         $totalBytes = $bytes * $KB;
         foreach($_FILES["program_photo"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["program_photo"]["tmp_name"][$key];
            $name = $_FILES["program_photo"]["name"][$key];
               
            if(empty($temp)) {
               break;
            }
                  
            $counter++;
            $UploadOk = true;
                  
            if($_FILES["program_photo"]["size"][$key] > $totalBytes) {
               $UploadOk = false;
               array_push($errors, $name." File size is larger than the 500KB.");
            }
            
           /*  if($_FILES["program_photo"]["max_length"][$key] =5 ) {
               $UploadOk = false;
               array_push($errors, $name." File size is too large.");
            }
             */
               
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
               $UploadOk = false;
               array_push($errors, $name." is invalid file type.");
            }
                  
            /*if(file_exists($UploadFolder."/".$name) == true){
               $UploadOk = false;
               array_push($errors, $name." file is already exist.");
            }*/
                  
            if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
               move_uploaded_file($temp,$UploadFolder."/".$name);
               array_push($uploadedFiles, $name);
               $updatetable = array(	
                  'is_photo_available'  => 1
               );	
            } else {
               $updatetable = array(	
                  'is_photo_available'  => 0
               );	
            }
           // print_r($updatetable);die();
            $this->db->update('trv_training_ceo', $updatetable, array('id' => $last_inserted_program_id));
         }
      }   
		return $last_inserted_program_id;
	}
	
	function postUpdateTrainingOfCEO($training_id) {
        $update_training = array(	
			'fpo_id'                => $this->session->userdata('user_id'),
			'ceo_id'         		=> $this->input->post('ceo_name'),
			'training_start_date' 	=> $this->input->post('date_training'),	
			'training_end_date'    	=> $this->input->post('date_completeion'),
			'no_of_days'    		=> $this->input->post('total_days'),
			'trainer_name' 			=> $this->input->post('trainer_name'),
			'institute_name' 		=> $this->input->post('institutes_name'),	
			'exposure_date'    		=> $this->input->post('exposure_date'),
			'place_to_visit'    	=> $this->input->post('place_visit'),
			'cost_involved' 		=> $this->input->post('involved_cost'),
			'involved_cost' 		=> $this->input->post('involved_cost_value'),
			
            'updated_by'        	=> $this->session->userdata('user_id'),
            'updated_on'        	=> date('Y-m-d H:i:s')   
        );	
		$this->db->update('trv_training_ceo', $update_training, array('id' => $training_id));
      //$get_uploaded_date=$this->db->select('trv_training_ceo.created_on')->where(array('trv_training_ceo.fpo_id' =>$this->session->userdata('user_id'),'trv_training_ceo.id'=>$training_id))->from('trv_training_ceo')->get()->row()->created_on;
      //$uploadname=date("YmdHis", strtotime($get_uploaded_date));
      //print_r($uploadname);die;
      
      if (!empty($_FILES['program_photo']['name'][0])) {
         if (!is_dir('assets/uploads/training_CEO')) {
            mkdir('assets/uploads/training_CEO', 0777, TRUE);
         }
         if (!is_dir('assets/uploads/training_CEO/training_'.$training_id)) {
            mkdir('assets/uploads/training_CEO/training_'.$training_id, 0777, TRUE);
         }	

         //echo json_encode($_FILES["program_photo"]);
         $UploadFolder = 'assets/uploads/training_CEO/training_'.$training_id;
         $counter = 0;
         $errors = array();
         $uploadedFiles = array();
         $extension = array("jpeg","jpg","png","gif");
         $bytes = 1024;
         $KB = 500;
         $totalBytes = $bytes * $KB;
         foreach($_FILES["program_photo"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["program_photo"]["tmp_name"][$key];
            $name = $_FILES["program_photo"]["name"][$key];
               
            if(empty($temp)) {
               break;
            }
                  
            $counter++;
            $UploadOk = true;
                  
            if($_FILES["program_photo"]["size"][$key] > $totalBytes) {
               $UploadOk = false;
               array_push($errors, $name." File size is larger than the 500KB.");
            }
                  
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
               $UploadOk = false;
               array_push($errors, $name." is invalid file type.");
            }
                  
            /*if(file_exists($UploadFolder."/".$name) == true){
               $UploadOk = false;
               array_push($errors, $name." file is already exist.");
            }*/
                  
            if($UploadOk == true && file_exists($UploadFolder."/".$name) != true){
               move_uploaded_file($temp,$UploadFolder."/".$name);
               array_push($uploadedFiles, $name);
               $add_awareness = array(	
                  'is_photo_available'  	=> 1
               );	
            } else {
               $add_awareness = array(	
                  'is_photo_available'  	=> 0
               );	
            }
            $this->db->update('trv_training_ceo', $add_awareness, array('id' => $training_id));
         }
      }   
		return $training_id;
	}
	
	function getCeoTrainingByID($training_id){ 
		$this->db->select('trv_training_ceo.*, trv_fpo_ceo.name As ceo_name');	
		$this->db->where(array('trv_training_ceo.id' => $training_id, 'trv_training_ceo.status' => 1));
		$this->db->from('trv_training_ceo');
		$this->db->join('trv_fpo_ceo', 'trv_fpo_ceo.id = trv_training_ceo.ceo_id');	
		$query = $this->db->get()->row_array();
		return $query;
	}
   
   function getCeoTrainingdate($training_id){ 
   $get_uploaded_date=$this->db->select('trv_training_ceo.created_on')->where(array('trv_training_ceo.fpo_id' =>$this->session->userdata('user_id'),'trv_training_ceo.id'=>$training_id))->from('trv_training_ceo')->get()->row()->created_on;
   return $get_uploaded_date;
   }
/** Training to CEO's related code end **/	
   
 function DocumentType() {
      $this->db->select('trv_document_type.*,trv_document_type.doc_type as doc_name');
      $this->db->where(array('trv_document_type.status' => '1'));
      $this->db->from('trv_document_type');
      return $this->db->get()->result();	
	}
   function reappointment_date(){
      $this->db->select('trv_director.id,trv_director.date_of_appointment');
      $this->db->where(array('trv_director.status' => '1'));
      $this->db->from('trv_director');
      return $this->db->get()->row();
      
   }
}
?>