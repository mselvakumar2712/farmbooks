<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/staff/
	 *	- or -
	 * 		http://example.com/index.php/staff/
	 *	- or -
	 * http://example.com/index.php/staff/index
	 *
	 */
    public function __construct() {
      parent::__construct();
		$this->load->library("session");
		if (!$this->session->userdata('name') || /*$this->session->userdata('user_type') != 3  || */$this->session->userdata('is_active') == 0 ){  
         redirect('staff/signout');
		}        
		$this->load->model("Finance_Model");
		$this->load->model("Share_Model");
		$this->load->model("Login_Model");
		$this->load->model("Setting_Model");
		$this->load->model("Fpo_Model");
		$this->load->model("Role_Model");
		header("Access-Control-Allow-Origin: *");
		if(!check_staff_permission($_SESSION['profile_type'], 9)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
	}

    
    public function index(){
		if(!check_staff_permission($_SESSION['profile_type'], 90201)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application Farmer List';
        $data['page_module'] = 'share';	
		$setting = $this->Setting_Model->getShareValueByFpo();
		$validateSetting = 0;
		if(isset($setting)) {
			if(isset($setting->shares_released) && isset($setting->unit_price) && isset($setting->effective_date)) {
				$cDate = date('Y-m-d');
				if($cDate >= $setting->effective_date) {
					$validateSetting = 1;
					$data['share_applications'] = $this->Share_Model->farmerShareApplicationList();
					$this->load->view('share/share_application/share_application_list', $data);
				}
			}
		}
		if(!$validateSetting) {
			$this->load->view('share/share_application/share_not_released_info', $data);
		}
 	} 
    
    
    public function fpo_shareapplication_list(){
		if(!check_staff_permission($_SESSION['profile_type'], 90204)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application FPO List';
        $data['page_module'] = 'share';	
		$setting = $this->Setting_Model->getShareValueByFpo();
		$validateSetting = 0;
		if(!empty($setting)) {
			if(!empty($setting->shares_released) && !empty($setting->unit_price) && !empty($setting->effective_date)) {
				$cDate = date('Y-m-d');
				if($cDate >= $setting->effective_date) {
					$validateSetting = 1;
					$data['share_applications'] = $this->Share_Model->fpoShareApplicationList();                        
					$this->load->view('share/share_application/fpo_share_application_list', $data);
				}
			}
		}
		if(!$validateSetting) {
			$this->load->view('share/share_application/share_not_released_info', $data);
		}
 	} 
    
    public function shareapplications() {        
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application Farmer List';
        $data['page_module'] = 'share';	
        
        $data['share_applications'] = $this->Share_Model->shareApplicationList();        
        $this->load->view('share/share_application/share_application_list', $data); 
	}   
    
	
    /** Share application for farmer Starts **/    
    public function addshareapplication(){
		if(!check_staff_permission($_SESSION['profile_type'], 90202)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'Share Application';
      $data['page_title'] = 'Share Application Farmer Add';
      $data['page_module'] = 'share';
      $data['farmers'] = $this->Share_Model->farmerDropdownList();   
	  $data['share_setting'] = $this->Setting_Model->getShareValueByFpo();  	  
      $this->load->view('share/share_application/add_share_application', $data);
	}   
    
    
    public function viewshareapplication($share_application_id){
		if(!check_staff_permission($_SESSION['profile_type'], 90201){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application Farmer View';
        $data['page_module'] = 'share';	
        
        $data['farmers'] = $this->Share_Model->farmerDropdownList();
        $data['share_application'] = $this->Share_Model->shareApplicationByID($share_application_id);      
        $this->load->view('share/share_application/view_share_application', $data);
	}   
    
    
    public function postShareApplication() {		
		$get_share_value = $this->Share_Model->getshareLastID();
		if(!empty($get_share_value)){
			if( $this->Share_Model->postShareApplication() ) {  
				redirect('staff/share');
			} else {
				$this->session->set_flashdata('warning', 'Data not inserted.');
				redirect('staff/share/addshareapplication');
			} 
		}else{
			$this->session->set_flashdata('warning', 'Shares not released for this FPO.');
			redirect('staff/share/addshareapplication');
		}			
	}
    
    
    public function updateShareApplication($share_application_id) {
        if( $this->Share_Model->updateShareApplication($share_application_id) ) {  
            redirect('staff/share');
        } else {
            redirect('staff/share/viewshareapplication');
        }           
	}    
    
    
    public function deleteShareApplication($share_application_id) {
        if( $this->Share_Model->deleteShareApplication($share_application_id) ) {  
            redirect('staff/share');
        } else {
            redirect('staff/share/viewshareapplication');
        }           
	}    
    /** Share application for farmer End **/
    
    
    
    /** Share application for FPO Starts **/
    public function addshareapplication_fpo(){
		if(!check_staff_permission($_SESSION['profile_type'], 90205)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Share Application';
		$data['page_title'] = 'Share Application FPO Add';
        $data['page_module'] = 'share';
        
        $data['fpo_list'] = $this->Share_Model->fpoDropdownList();  
		$data['share_setting'] = $this->Setting_Model->getShareValueByFpo(); 
		$data['fpo_info'] = $this->Fpo_Model->getFpoById($this->session->userdata('profile_type')); 		
        $this->load->view('share/share_application/add_fpo_share_application', $data);
	}   
    
    
   public function viewshareapplication_fpo($share_application_id){
		if(!check_staff_permission($_SESSION['profile_type'], 90204)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'Share Application';
      $data['page_title'] = 'Share Application FPO View';
      $data['page_module'] = 'share';	
      $data['fpo_info'] = array();        
      $share_application = $this->Share_Model->shareApplicationID($share_application_id);   
      if(!empty($share_application)){
         $data['fpo_info'] = $this->Share_Model->fpoByID($share_application['holder_id']);
      }
      $data['share_application']= $share_application;  
      //echo "<pre>";print_r($data);die;   
      $this->load->view('share/share_application/view_fpo_share_application', $data);
      
	}  
    
    
    public function postShareApplicationByFPO() {
		$get_share_value = $this->Share_Model->getshareLastID();
		if(!empty($get_share_value)){
			if( $this->Share_Model->postShareApplicationByFPO() ) {  
				redirect('staff/share/fpo_shareapplication_list');
			} else {
				redirect('staff/share/addshareapplication_fpo');
			}
		}else{
			$this->session->set_flashdata('warning', 'Shares not released for this FPO.');
			redirect('staff/share/addshareapplication_fpo');
		}
	}
    
    
    public function updateShareApplicationByFPO($share_application_id) {
        if( $this->Share_Model->updateShareApplicationByFPO($share_application_id) ) {  
            redirect('staff/share/fpo_shareapplication_list');
        } else {
            redirect('staff/share/addshareapplication_fpo');
        }                
	}    
    /** Share application for FPO End **/
    
    
    
    /** Share application Allotment starts **/
    public function shareallotment(){
		if(!check_staff_permission($_SESSION['profile_type'], 90401)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Allotment of Share';
		$data['page_title'] = 'Share Original Issue';
        $data['page_module'] = 'share';	
		$data['issue_detail'] = null;	
        $last_allot = $this->Share_Model->getShareAlottmentID();
        if(!is_array($last_allot) && $last_allot == 0){
            $data['last_allot_id'] = '1'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
        } else {
            $data['last_allot_id'] = '1'.str_pad(($last_allot[0]['id']+1), 4, '0', STR_PAD_LEFT);
        }		
        $data['share_application'] = $this->Share_Model->shareApplicationList();
        $data['farmers'] = $this->Share_Model->shareAppliedFarmers();
        //echo json_encode($data['share_application']);
        $this->load->view('share/allotment_shares/addshare_allotment', $data); 
	}
    
    
   public function postShareAllotment(){
        if( $this->Share_Model->postShareAllotment() ) {  
            redirect('staff/share');
        } else {
            redirect('staff/share/shareallotment');
        }                
	}

	
	public function sharebonusissue(){ 
		if(!check_staff_permission($_SESSION['profile_type'], 90402)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Allotment of Share';
		$data['page_title'] = 'Share Bonus Issue';
        $data['page_module'] = 'share';		
		
		$last_bonus = $this->Share_Model->getShareBonusID();        
		if(!is_array($last_bonus) && $last_bonus == 0){            
            $data['last_bonus_id'] = '2'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
        } else {
            $table_bonus_value = $last_bonus[0]['resolution_number'];            
            if($table_bonus_value[0]!=2) {
                $data['last_bonus_id'] = '2'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
            } else {
                $data['last_bonus_id'] = str_pad(($table_bonus_value+1), 4, '0', STR_PAD_LEFT);
            }            
        }
        $data['share_applied'] = [];
        $this->load->view('share/allotment_shares/addshare_bonus', $data); 
	}
	
    
    public function postCalculateBonus(){
        $data['page'] = 'Allotment of Share';
		$data['page_title'] = 'Share Bonus Issue';
        $data['page_module'] = 'share';		
        
        $last_bonus = $this->Share_Model->getShareBonusID();		
		if(!is_array($last_bonus) && $last_bonus == 0){
            $data['last_bonus_id'] = '2'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
        } else {
            $data['last_bonus_id'] = str_pad(($last_bonus[0]['id']+1), 4, '0', STR_PAD_LEFT);
        }
      
        if($this->input->post('bonus_new_shares') > $this->input->post('bonus_existing_shares')) {
            $data['share_applied'] = $this->Share_Model->shareBonusAppliedListByCutOffDate($this->input->post('bonus_cutoff_date'));
            $data['resolution_number'] = "";$data['resolution_date'] = "";
            $data['cutoff_date'] = "";$data['existing_shares'] = "";
            $data['new_shares'] = "";
            $this->session->set_flashdata('warning', 'New share value should be lessthan the existing share value');
        } else {
            $data['share_applied'] = $this->Share_Model->shareBonusAppliedListByCutOffDate($this->input->post('bonus_cutoff_date'));
            $data['resolution_number'] = $this->input->post('bonus_resolution_number');
            $data['resolution_date'] = $this->input->post('bonus_resolution_date');
            $data['cutoff_date'] = $this->input->post('bonus_cutoff_date');
            $data['existing_shares'] = $this->input->post('bonus_existing_shares');
            $data['new_shares'] = $this->input->post('bonus_new_shares');
            $this->session->set_flashdata('success', 'Got the share holders list');
        }
        $this->load->view('share/allotment_shares/addshare_bonus', $data);                         
	}
    
    
    public function postBonusShares(){
        //echo json_encode($this->input->post());
        if( $this->Share_Model->postBonusShares() ) { 
            $this->session->set_flashdata('success', 'Bonus share updated to members');
            redirect('staff/share/sharebonusissue');
        } else {
            $this->session->set_flashdata('warning', 'Something went wrong. Try again');
            redirect('staff/share/sharebonusissue');
        }                
	}
        
    
	public function sharerightissue(){
		if(!check_staff_permission($_SESSION['profile_type'], 90403)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Allotment of Share';
		$data['page_title'] = 'Share Right Issue';
        $data['page_module'] = 'share';		
		
		$last_bonus = $this->Share_Model->getShareRightID();	
		if(!is_array($last_bonus) && $last_bonus == 0){
            $data['last_bonus_id'] = '3'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
        } else {
            $table_bonus_value = $last_bonus[0]['resolution_number'];  
            
            if($table_bonus_value[0]!=3) {
                $data['last_bonus_id'] = '3'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
            } else {
                $data['last_bonus_id'] = str_pad(($table_bonus_value+1), 4, '0', STR_PAD_LEFT);
            }
        }
		
        $data['share_application'] = $this->Share_Model->shareApplicationList();
        $data['farmers'] = $this->Share_Model->shareAppliedFarmers();
        $data['share_applied'] = [];
        $this->load->view('share/allotment_shares/addshare_right', $data); 
	}
    
    
    public function postCalculateRights(){
        $data['page'] = 'Allotment of Share';
		$data['page_title'] = 'Share Rights Issue';
        $data['page_module'] = 'share';		
        
        $last_bonus = $this->Share_Model->getShareRightID();		
		if(!is_array($last_bonus) && $last_bonus == 0){
            $data['last_bonus_id'] = '3'.str_pad((0+1), 4, '0', STR_PAD_LEFT);
        } else {
            $data['last_bonus_id'] = str_pad(($last_bonus[0]['resolution_number']+1), 4, '0', STR_PAD_LEFT);
        }
        
        if($this->input->post('rights_new_shares') > $this->input->post('rights_existing_shares')) {
            $data['share_applied'] = $this->Share_Model->shareRightAppliedListByCutOffDate($this->input->post('rights_cutoff_date'));
            $data['resolution_number'] = "";$data['resolution_date'] = "";
            $data['cutoff_date'] = "";$data['existing_shares'] = "";
            $data['new_shares'] = "";
            $this->session->set_flashdata('warning', 'New share value should be lessthan the existng share value');
        } else {
            $data['share_applied'] = $this->Share_Model->shareRightAppliedListByCutOffDate($this->input->post('rights_cutoff_date'));
            $data['resolution_number'] = $this->input->post('rights_resolution_number');
            $data['resolution_date'] = $this->input->post('rights_resolution_date');
            $data['cutoff_date'] = $this->input->post('rights_cutoff_date');
            $data['existing_shares'] = $this->input->post('rights_existing_shares');
            $data['new_shares'] = $this->input->post('rights_new_shares');
            $this->session->set_flashdata('success', 'Got the share holders list');
        }
        $this->load->view('share/allotment_shares/addshare_right', $data);                          
	}
    
    
    public function postRightsShares(){
        if( $this->Share_Model->postRightsShares() ) { 
            $this->session->set_flashdata('success', 'Right share updated to members');
            redirect('staff/share/sharerightissue');
        } else {
            $this->session->set_flashdata('warning', 'Something went wrong. Try again');
            redirect('staff/share/sharerightissue');
        }                
	}
    /** Share application Allotment End **/
    
    
    
    public function getLocationByFpo($fpo_id){
        $location_data = $this->Share_Model->getLocationByFpo( $fpo_id );
        $response = array("status" => 1, "location_data" => $location_data);
        echo json_encode($response);
	}
    
    
    public function searchFarmer() {
        $farmer_data = $this->Share_Model->searchFarmer();
        if($farmer_data) {
            if($this->Share_Model->searchMemberToFarmer($farmer_data[0]->id) > 0) {
                $response = array("status" => 0, "message" => "Already member of this selected FPO");
            } else {
                $response = array("status" => 1, "farmer_data" => $farmer_data);
            }            
        } else {
            $response = array("status" => 0, "message" => "No farmer available");
        }        
        echo json_encode($response);
	}
    
    
    public function searchFPO() {
        $fpo_data = $this->Share_Model->searchFPO();
        if($fpo_data) {
            if($this->Share_Model->searchMemberToFPO($fpo_data[0]->id) > 0) {
                $response = array("status" => 0, "message" => "Already member of this selected FPO");
            } else {
                $response = array("status" => 1, "fpo_data" => $fpo_data);
            }                        
        } else {
            $response = array("status" => 0, "message" => "No FPO available");
        }        
        echo json_encode($response);
	}
	
	 /** Generate application  Starts **/    
    public function generateshareapplication(){
		if(!check_staff_permission($_SESSION['profile_type'], 903)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Generate Application';
		$data['page_title'] = 'Generate Application';
        $data['page_module'] = 'share';        
        $data['generate_application'] = $this->Share_Model->generateApplicationList();  
        $this->load->view('share/generate_application/generate_application_list', $data);
	} 

	/** Generate application  Starts **/    
   public function generateapplicationpdf($shares_id){
		//load mPDF library
		$this->load->library('m_pdf');
		$data['fpo_info'] =$this->Share_Model->fpoByID($this->session->userdata('profile_type'));
        $data['generate_application'] = $this->Share_Model->generateApplication($shares_id);
		$member_type= $data['generate_application']['member_type'];
		$parent_id=$data['generate_application']['holder_id'];
		
		if($member_type == 1){
			$data['address'] =$this->Share_Model->farmerProfileByID($parent_id);
		}else if($member_type==2){
			$data['address'] =$this->Share_Model->fpoByUserID($parent_id);
		}else{
			$data['address'] ='';
		}
		
		$no_share=$data['generate_application']['no_of_share'];
		$no_share_value=$this->Share_Model->getshareLastID();
		$share_price=$no_share_value[0]['unit_price'];
		$no_share_total=(($no_share)*($share_price));
		if(!empty($no_share_total)){
		$data['no_share_amount']=$no_share_total;
		$data['no_share_unit_price']=$share_price;
		}
		if(!empty($no_share)){
		$data['no_share_words']=$this->get_numberTowords($no_share);
		$data['no_share_total_words']= $this->get_numberTowords($no_share_total);		
		}
		$html = $this->load->view('share/generate_application/generate_application_pdf',$data, true);
		$pdfFilePath ="generate application.pdf";		
		$pdf = $this->m_pdf->load();
		$pdf->AddPageByArray(array(
			'orientation' => 'P',
			'format' => 'A4',
			'mgf' => '13',
		));
		$pdf->simpleTables = true;
		$pdf->WriteHTML($html);	
		$pdf->Output($pdfFilePath, "D");
		exit;		
	} 	
	/** Generate application  end **/    
    
	/** Issue of share certificate  Start **/ 
	
	public function originalsharecertificate(){
		if(!check_staff_permission($_SESSION['profile_type'], 90601)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Issue of Share Certificate';
		$data['page_title'] = 'Issue of Original Certificate';
        $data['page_module'] = 'share'; 
		$data['list_member'] = $this->Share_Model->listAllocatedMember();
		$data['certificate_num']=$this->Share_Model->certificatenum();
        $this->load->view('share/issue_certificate/original_share_certificate', $data);
	} 
	
	 public function postOriginalCertificate(){
        $data['page'] = 'Issue of Share Certificate';
		$data['page_title'] = 'Issue of Original Certificate';
        $data['page_module'] = 'share';		

        $allocatedById = $this->Share_Model->getAllocatedByID();		
        if($allocatedById) {
            $data['list_member'] =$allocatedById;            
            $data['resolution_number'] = $this->input->post('resolution_number');
            $data['resolution_date'] = $this->input->post('resolution_date');
			$data['certificate_num']=$this->Share_Model->certificatenum();
        } else {
            $data['list_member'] =$allocatedById;
			$data['resolution_number'] = '';
            $data['resolution_date'] = $this->input->post('resolution_date');
			$data['certificate_num']=$this->Share_Model->certificatenum();
            //$this->session->set_flashdata('warning', 'No search result found');
        }
        $this->load->view('share/issue_certificate/original_share_certificate', $data);                         
	}
	
	public function postIssueOriginalCertificate(){
       
        if( $this->Share_Model->postOriginalCertificate() ) { 
            $this->session->set_flashdata('success', 'original share certificate updated');
            redirect('staff/share/originalsharecertificate');
        } else {
            $this->session->set_flashdata('warning', 'Something went wrong. Try again');
            redirect('staff/share/originalsharecertificate');
        }                          
	}
	public function bonussharecertificate(){
		if(!check_staff_permission($_SESSION['profile_type'], 90602)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Issue of Share Certificate';
		$data['page_title'] = 'Issue of Bonus Certificate';
        $data['page_module'] = 'share';        
        $data['list_member'] = $this->Share_Model->listAllocatedBonus();
		$data['certificate_num']=$this->Share_Model->bonusCertificatenum();
        $this->load->view('share/issue_certificate/bonus_share_certificate', $data);
	} 
	
	public function postbonuscertificate(){        
        $data['page'] = 'Issue of Share Certificate';
		$data['page_title'] = 'Issue of Bonus Certificate';
        $data['page_module'] = 'share';        
        $allocatedBonusById = $this->Share_Model->getAllocatedBonusByID();		
        if($allocatedBonusById) {
            $data['list_member'] =$allocatedBonusById;            
            $data['resolution_number'] = $this->input->post('resolution_number');
            $data['resolution_date'] = $this->input->post('resolution_date');
			$data['certificate_num']=$this->Share_Model->bonusCertificatenum();
        } else {
            $data['list_member'] =$allocatedBonusById;
			$data['resolution_number'] = '';
            $data['resolution_date'] = $this->input->post('resolution_date');
			$data['certificate_num']=$this->Share_Model->bonusCertificatenum();
            $this->session->set_flashdata('warning', 'No search result found');
        }  
        $this->load->view('share/issue_certificate/bonus_share_certificate', $data);
	} 
	
	public function postIssueBonusCertificate(){       
        if( $this->Share_Model->postBonusCertificate() ) { 
            $this->session->set_flashdata('success', 'Bonus share certificate updated');
            redirect('staff/share/bonussharecertificate');
        } else {
            $this->session->set_flashdata('warning', 'Something went wrong. Try again');
            redirect('staff/share/bonussharecertificate');
        }                          
	}
	public function rightsharecertificate(){
		if(!check_staff_permission($_SESSION['profile_type'], 90603)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Issue of Share Certificate';
		$data['page_title'] = 'Issue of Right Certificate';
        $data['page_module'] = 'share';        
		$data['list_member'] = $this->Share_Model->listAllocatedRight();
		$data['certificate_num']=$this->Share_Model->rightCertificatenum();
        $this->load->view('share/issue_certificate/right_share_certificate', $data);
	} 
	
	public function postrightcertificate() {        
        $data['page'] = 'Issue of Share Certificate';
		$data['page_title'] = 'Issue of Right Certificate';
        $data['page_module'] = 'share';        
        $allocatedRightById = $this->Share_Model->getAllocatedRightByID();		
        if($allocatedRightById) {
            $data['list_member'] =$allocatedRightById;            
            $data['resolution_number'] = $this->input->post('resolution_number');
            $data['resolution_date'] = $this->input->post('resolution_date');
			$data['certificate_num']=$this->Share_Model->rightCertificatenum();
        } else {
            $data['list_member'] =$allocatedRightById;
			$data['resolution_number'] = '';
            $data['resolution_date'] = $this->input->post('resolution_date');
			$data['certificate_num']=$this->Share_Model->rightCertificatenum();
            $this->session->set_flashdata('warning', 'No search result found');
        }  
        $this->load->view('share/issue_certificate/right_share_certificate', $data);
	} 
	
	public function postIssueRightCertificate() {       
        if( $this->Share_Model->postRightCertificate() ) { 
            $this->session->set_flashdata('success', 'Right share certificate updated');
            redirect('staff/share/rightsharecertificate');
        } else {
            $this->session->set_flashdata('warning', 'Something went wrong. Try again');
            redirect('staff/share/rightsharecertificate');
        }                          
	}
    
    
    /** Share transfer and its surrender values **/
	public function sharetransfer(){
		if(!check_staff_permission($_SESSION['profile_type'], 907)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Share Transfer';
		$data['page_title'] = 'Share Transfer Between Members';
        $data['page_module'] = 'share';             
        $this->load->view('share/share_transfer/share_transfer', $data);
	} 	
            
    public function postShareTransfer() {
        //echo json_encode($this->input->post());
        if( $this->Share_Model->postShareTransfer() ) { 
            $this->session->set_flashdata('success', 'Share transferred successfully');
            redirect('staff/share/sharetransfer');
        } else {
            $this->session->set_flashdata('warning', 'Something went wrong. Try again');
            redirect('staff/share/sharetransfer');
        }                
	}
    
    
	public function sharesurrender(){
		if(!check_staff_permission($_SESSION['profile_type'], 908)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Share Surrender';
		$data['page_title'] = 'Share Surrender';
        $data['page_module'] = 'share';        
        $this->load->view('share/share_transfer/share_surrender', $data);
	} 	    
    
    public function postShareSurrender() {
        //echo json_encode($this->input->post());
        if( $this->Share_Model->postShareSurrender() ) { 
            $this->session->set_flashdata('success', 'Share surrendered successfully');
            redirect('staff/share/sharesurrender');
        } else {
            $this->session->set_flashdata('warning', 'Something went wrong. Try again');
            redirect('staff/share/sharesurrender');
        }                
   }
    
    
    public function getCertificateInfo() {
        $certificateInfo = $this->Share_Model->getCertificateInfo();        
        if(count($certificateInfo) != 0) {  
            $response = array("status" => 1, "certificateInfo" => $certificateInfo);
        } else {
            $response = array("status" => 0, "message" => "Not a valid certificate number");
        }  
        echo json_encode($response);
    }
    
        
    public function verifyMember() {
        if($this->Share_Model->verifyRegisteredNumber() == 0) {
            $response = array("status" => 0, "message" => "Sorry, Not a registered user");
            
        } else {
            $getFarmer  = $this->Share_Model->getFarmerByMobile();
            $getFPO  = $this->Share_Model->getFPOByMobile();
            if(($getFarmer && $getFPO=="") && $member_data = $this->Share_Model->verifyMember($getFarmer->id, 1)) {                   
				$member_shares = $this->Share_Model->getShareByMember($getFarmer->id);
                $response = array("status" => 1, 'member_share' => $member_shares, 'member_data' => $member_data, "message" => "It's a valid member");
                
            } else if($getFPO && $getFarmer=="" && $member_data = $this->Share_Model->verifyMember($getFPO->id, 2)) {
                $member_shares = $this->Share_Model->getShareByMember($getFPO->id);
                $response = array("status" => 1, 'member_share' => $member_shares, 'member_data' => $member_data, "message" => "It's a valid member");
                
            } else {
                $response = array("status" => 0, "message" => "Sorry, It's not a member");
            }
        }
        echo json_encode($response);
   }    
	/** Issue of share certificate  End **/ 	
	public function shareholders(){
		if(!check_staff_permission($_SESSION['profile_type'], 905)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
      $data['page'] = 'Shareholders List';
      $data['page_title'] = 'Shareholders List';
      $data['page_module'] = 'share';        
      $data['shareholders_list'] = $this->Share_Model->shareHoldersList();  
      $this->load->view('share/shareholders_list', $data);
   }
   public function viewsharedetails($folio_number) {        
      $data['page'] = 'View Share Details';
      $data['page_title'] = 'View Share Details';
      $data['page_module'] = 'share';        
      $data['share_details'] = $this->Share_Model->viewShareDetails($folio_number);  
      $this->load->view('share/view_share_details', $data);
   }
   
   function get_numberTowords($number)
	{	
		$no = round($number);
		$point = round($number - $no, 2) * 100;
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array('0' => '', '1' => 'One', '2' => 'Two',
		'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		'7' => 'Seven', '8' => 'eight', '9' => 'nine',
		'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
		'13' => 'thirteen', '14' => 'fourteen',
		'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
		'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
		'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
		'60' => 'sixty', '70' => 'seventy',
		'80' => 'eighty', '90' => 'ninety');
		$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
		while ($i < $digits_1) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += ($divider == 10) ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number] .
				" " . $digits[$counter] . $plural . " " . $hundred
				:
				$words[floor($number / 10) * 10]
				. " " . $words[$number % 10] . " "
				. $digits[$counter] . $plural . " " . $hundred;
			} else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);

		return strtoupper($result);
	} 
   /* Share settings */
   public function sharesvalue(){
		if(!check_staff_permission($_SESSION['profile_type'], 901)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
         $data['page'] = 'Shares Settings';
         $data['page_title'] = 'Shares Settings';
         $data['page_module'] = 'share';
         $data['sharevalue_list'] = $this->Share_Model->shareValueList();
         $data['share_available'] = $this->Share_Model->totalShareavailable();
         $data['banks'] = $this->Finance_Model->getAllBankByFPO();
         $this->load->view('share/sharesettings/share_value', $data); 	   
	} 
	
	public function post_shares_value() {
		if($this->Share_Model->postShareValue()){
		 $this->session->set_flashdata('success', 'New Shares Value added successfully.');       
		 redirect('staff/share/sharesvalue');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('staff/share/sharesvalue');
		}
	}

	public function shareshistory() {        
        $data['page'] = 'Share Settings';
		  $data['page_title'] = 'Share Settings';
        $data['page_module'] = 'share';
		$data['sharevalue_history'] = $this->Share_Model->shareValueHistory(); 
     // print_r($data['sharevalue_history']);
    //  die;
		$this->load->view('share/sharesettings/share_value_history', $data); 	   
	} 
   
   public function sharedfarmers(){
      $data['page'] = 'Existing Share Holder Setup';
      $data['page_title'] = 'Existing Share Holder Setup';
      $data['page_module'] = 'share';
      $data['farmer_list'] = $this->Share_Model->fpologginedfarmer();
      $data['village_list'] = $this->Share_Model->fpofarmervillageList();
      $data['panchayat_list'] = $this->Share_Model->fpofarmerpanchayatList();
      $data['available_sharevalue'] = $this->Share_Model->shareValueList();
      /* $allLedgers=[];
        $bank = $this->Finance_Model->getAllbankByFPO();
		$allLedgers[1]['bank'] = "Bank Account";
        if($bank) {            
            $allLedgers[1]['bank_list'] = $bank;
        } else {
			$allLedgers[1]['bank_list'] = [];
		}
        
        $gl_list = $this->Finance_Model->getAllGL();
		$allLedgers[2]['gl_trans'] = "GL List";
        if($gl_list) {            
            $allLedgers[2]['gl_list'] = $gl_list;
        } else {
			$allLedgers[2]['gl_list'] = [];
		} */
      $this->load->view('share/share_application/fpofarmers_list', $data); 
   }
   public function postfpo_farmer() {
		if($this->Share_Model->postfpo_farmer()){
		 $this->session->set_flashdata('success', 'New Shares Value added successfully.');       
		 redirect('staff/share/sharedfarmers');
		}else{
		 $this->session->set_flashdata('warning', 'Data not inserted.');       
		 redirect('staff/share/sharedfarmers');
		}
	}
    public function fpofarmersByLocation() {        
        $farmer_list = $this->Share_Model->fpofarmersByLocation();
        $response = array("status" => 1, "farmer_list" => $farmer_list);
        echo json_encode($response);
	}   
    
}
