<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labour extends CI_Controller {
   public function __construct() {  
      parent::__construct();
      $this->load->model("Labour_Model");
      $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');
      $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      $this->output->set_header('Content-Type: application/json');
	}

   public function index() {  
      $response = array("status" => 'TRV_S101', "information" => "Welcome FARMBOOKS");
      echo json_encode($response);
	}

   public function enrolment_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->enrolmentList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_enrolment() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->getEnrolment($post_data['enrolment_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_enrolment() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->enrolmentValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->addEnrolment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New enrolment added';
      }
      echo json_encode($data); 
	}
   
   public function enrolmentValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || (empty($post_data['photo']) && empty($post_data['name'])) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_enrolment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->enrolmentUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->updateEnrolment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Enrolment updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function enrolmentUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['enrolment_id']) || (empty($post_data['photo']) && empty($post_data['name'])) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_enrolment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->enrolmentDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->deleteEnrolment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Enrolment deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function enrolmentDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['enrolment_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function attendance_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->attendanceList($post_data['farmer_id']);
      if($result){
         foreach($result as $key => $result_1) {
            $result_overtime = $this->Labour_Model->getAttendanceOvertime($result_1->id);
            $result[$key]->detail = $result_overtime;
         }
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_attendance() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->getAttendance($post_data['attendance_id']);
      $result_overtime = $this->Labour_Model->getAttendanceOvertime($post_data['attendance_id']);
      if($result){
         $result[0]->detail = $result_overtime;
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_attendance() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->attendanceValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->addAttendance()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New attendance added';
      }
      echo json_encode($data); 
	}
   
   public function attendanceValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['attendance_date']) || ! isset($post_data['attendance_time']) || ! isset($post_data['work_type']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['land_identification']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['nature_of_work']) ) {
         return false;
      }   
      else {
         return true;
      }
   }
   
   public function update_attendance() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->attendanceUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->updateAttendance()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Attendance updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function attendanceUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['attendance_id']) || empty($post_data['attendance_date']) || ! isset($post_data['attendance_time']) || ! isset($post_data['work_type']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['land_identification']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['nature_of_work']) ) {
         return false;
      }   
      else {
         return true;
      }
   }
   
   public function delete_attendance() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->attendanceDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->deleteAttendance()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Attendance deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function attendanceDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['attendance_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function payment_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->paymentList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_payment() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->getPayment($post_data['payment_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_payment() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->paymentValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->addPayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New payment added';
      }
      echo json_encode($data); 
	}
   
   public function paymentValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['payment_date']) || empty($post_data['labour']) || empty($post_data['wages']) || ! isset($post_data['payment']) || ! isset($post_data['balance']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function update_payment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->paymentUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->updatePayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Payment updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function paymentUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['payment_id']) || empty($post_data['payment_date']) || empty($post_data['labour']) || empty($post_data['wages']) || ! isset($post_data['payment']) || ! isset($post_data['balance']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function delete_payment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->paymentDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->deletePayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Payment deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function paymentDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['payment_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function advance_payment_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->advancePaymentList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_advance_payment() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->getAdvancePayment($post_data['advance_payment_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_advance_payment() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->advancePaymentValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->addAdvancePayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New advance payment added';
      }
      echo json_encode($data); 
	}
   
   public function advancePaymentValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['payment_date']) || empty($post_data['labour']) || ! isset($post_data['advance']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function update_advance_payment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->advancePaymentUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->updateAdvancePayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Advance payment updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function advancePaymentUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['advance_payment_id']) || empty($post_data['payment_date']) || empty($post_data['labour']) || ! isset($post_data['advance']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function delete_advance_payment() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->advancePaymentDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->deleteAdvancePayment()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Advance payment deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function advancePaymentDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['advance_payment_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function talk_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->talkList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_talk() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->getTalk($post_data['talk_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_talk() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->talkValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->addTalk()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New talk added';
      }
      echo json_encode($data); 
	}
   
   public function talkValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['name']) || ! isset($post_data['sex']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_talk() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->talkUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->updateTalk()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Talk updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function talkUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['talk_id']) || empty($post_data['name']) || ! isset($post_data['sex']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_talk() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->talkDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->deleteTalk()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Talk deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function talkDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['talk_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function settings_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->settingsList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_settings() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->getSettings($post_data['settings_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_settings() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->settingsValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->addSettings()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New settings added';
      }
      echo json_encode($data); 
	}
   
   public function settingsValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['settings_date']) || empty($post_data['week_no']) || empty($post_data['men_full_day_amount']) || empty($post_data['men_half_day_amount']) || empty($post_data['women_full_day_amount']) || empty($post_data['women_half_day_amount']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function update_settings() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->settingsUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->updateSettings()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Settings updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function settingsUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['settings_id']) || empty($post_data['settings_date']) || empty($post_data['week_no']) || empty($post_data['men_full_day_amount']) || empty($post_data['men_half_day_amount']) || empty($post_data['women_full_day_amount']) || empty($post_data['women_half_day_amount']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function delete_settings() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->settingsDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->deleteSettings()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Settings deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function settingsDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['settings_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function contract_attendance_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->contractAttendanceList($post_data['farmer_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_contract_attendance() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Labour_Model->getContractAttendance($post_data['contract_attendance_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function add_contract_attendance() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->contractAttendanceValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->addContractAttendance()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New contract attendance added';
      }
      echo json_encode($data); 
	}
   
   public function contractAttendanceValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['attendance_date']) || ! isset($post_data['work_type']) || ! isset($post_data['no_of_women']) || ! isset($post_data['no_of_men']) || ! isset($post_data['amount']) || ! isset($post_data['total_labour']) || ! isset($post_data['total_wages']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['land_identification']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['nature_of_work']) ) {
         return false;
      }   
      else {
         return true;
      }
   }
   
   public function update_contract_attendance() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->contractAttendanceUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->updateContractAttendance()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Contract attendance updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function contractAttendanceUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id']) || empty($post_data['contract_attendance_id']) || empty($post_data['attendance_date']) || ! isset($post_data['work_type']) || ! isset($post_data['no_of_women']) || ! isset($post_data['no_of_men']) || ! isset($post_data['amount']) || ! isset($post_data['total_labour']) || ! isset($post_data['total_wages']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['land_identification']) ) {
         return false;
      }
      else if( $post_data['work_type'] == 1 && empty($post_data['nature_of_work']) ) {
         return false;
      }   
      else {
         return true;
      }
   }
   
   public function delete_contract_attendance() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->contractAttendanceDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Labour_Model->deleteContractAttendance()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Contract attendance deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function contractAttendanceDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['contract_attendance_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function wages() {
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      if(!$this->_getWagesValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide farmer id and attendance date';
      } 
      else {
         $result = array();
         $r_labours = $this->Labour_Model->getLabours($post_data['farmer_id'], $post_data['attendance_date']);
         $r_settings = $this->Labour_Model->settingsList($post_data['farmer_id']);
         foreach($r_settings as $setting) {
            $men_full_day_amount    = $setting->men_full_day_amount;
            $men_half_day_amount    = $setting->men_half_day_amount;
            $women_full_day_amount  = $setting->women_full_day_amount;
            $women_half_day_amount  = $setting->women_half_day_amount;
         }
         foreach($r_labours as $labour) {
            $detail = array();
            $detail['labour_id'] = $labour->labour_id;
            $detail['name'] = $labour->labour_name;
            
            if($labour->attendance_time == 1) {
               $detail['time'] = 'Full day';
               if($labour->sex == 1) {
                  $detail['wages'] = $men_full_day_amount;
               }
               else {
                  $detail['wages'] = $women_full_day_amount;
               }
            }
            else {
               $detail['time'] = 'Half day';
               if($labour->sex == 1) {
                  $detail['wages'] = $men_half_day_amount;
               }
               else {
                  $detail['wages'] = $women_half_day_amount;
               }
            }
            $detail['overtime'] = 'No';
            $detail['overtime_amount'] = 0;
            if($labour->overtime == 1) {
               $detail['overtime'] = 'Yes';
               $detail['overtime_amount'] = $labour->overtime_amount;
            }
            $detail['total_wages'] = $detail['wages'] + $detail['overtime_amount'];
            
            $result[] = $detail;
         }
         if($result){
            $data['status'] = 'TRV_S101';
            $data['result'] = $result;
         } 
      }      
      echo json_encode($data); 
   }
   
   private function _getWagesValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['farmer_id']) || empty($post_data['attendance_date']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function wages_labour() {
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      if(!$this->_getWagesLabourValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide labour id';
      } 
      else {
         $result = array();
         $result1 = array();
         $settings = array();
         $r_labours = $this->Labour_Model->getWagesLabour($post_data['labour_id']);
         $detail1['total_wages'] = 0;
         foreach($r_labours as $labour) {
            $farmer_id = $labour->farmer_id;
            if(empty($settings[$farmer_id])) {
               $settings[$farmer_id] = $this->Labour_Model->settingsList($farmer_id);
            }
            foreach($settings[$farmer_id] as $setting) {
               $men_full_day_amount    = $setting->men_full_day_amount;
               $men_half_day_amount    = $setting->men_half_day_amount;
               $women_full_day_amount  = $setting->women_full_day_amount;
               $women_half_day_amount  = $setting->women_half_day_amount;
            }
            $detail = array();
            //$detail['farmer_id'] = $farmer_id;
            //$detail['attendance_date'] = $labour->attendance_date;
            $detail['labour_id'] = $labour->labour_id;
            $detail['name'] = $labour->labour_name;
            
            if($labour->attendance_time == 1) {
               //$detail['time'] = 'Full day';
               if($labour->sex == 1) {
                  $detail1['wages'] = $men_full_day_amount;
               }
               else {
                  $detail1['wages'] = $women_full_day_amount;
               }
            }
            else {
               //$detail['time'] = 'Half day';
               if($labour->sex == 1) {
                  $detail1['wages'] = $men_half_day_amount;
               }
               else {
                  $detail1['wages'] = $women_half_day_amount;
               }
            }
            //$detail['overtime'] = 'No';
            $detail1['overtime_amount'] = 0;
            if($labour->overtime == 1) {
               //$detail['overtime'] = 'Yes';
               $detail1['overtime_amount'] = $labour->overtime_amount;
            }
            $detail1['total_wages'] = $detail1['total_wages'] + $detail1['wages'] + $detail1['overtime_amount'];
            $result1[] = $detail1;
         }
         $detail1['advance_paid'] = 0;
         $r_labour_advance = $this->Labour_Model->getWagesLabourAdvance($post_data['labour_id']);
         if ($r_labour_advance > 0)
         {
             $detail1['advance_paid'] = floatval($r_labour_advance);
         }
         $detail1['labour_payments'] = 0;
         $r_labour_payments = $this->Labour_Model->getWagesLabourPayments($post_data['labour_id']);
         if ($r_labour_payments > 0)
         {
             $detail1['labour_payments'] = floatval($r_labour_payments);
         }
         if($result1){
            $data['status'] = 'TRV_S101';
            $detail['labour_id'] = $labour->labour_id;
            $detail['name'] = $labour->labour_name;
            $detail['total_wages'] = $detail1['total_wages'] - $detail1['labour_payments'];
            $detail['advance_paid'] = $detail1['advance_paid'];
            $detail['pending_payments'] = $detail['total_wages'] - $detail1['advance_paid'];
            $detail['pending_payments'] = $detail['pending_payments'] > 0 ? $detail['pending_payments'] : 0;
            $result[] = $detail;
            $data['result'] = $result;
         } 
      }      
      echo json_encode($data); 
   }
   
   private function _getWagesLabourValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['labour_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }

}