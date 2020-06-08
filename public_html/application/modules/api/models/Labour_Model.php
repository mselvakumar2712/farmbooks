<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Labour_Model extends CI_Model {
   function __construct() {
        parent::__construct();
        $this->load->database();
   }
    
   function enrolmentList($farmer_id) {         
        $this->db->select('ref.id, ref.photo, ref.name, ref.sex, ref.village, ref.mobile_no, ref.account_no, ref.bank_id, ref.branch_id, pm.name as village_name, bnm.name as bank_name, bm.branch_name as branch_name');
        $this->db->from('fpo_labour_enrolment as ref');
        $this->db->join('trv_village_master as pm', 'pm.id = ref.village', 'left');
        $this->db->join('trv_bank_name_master as bnm', 'bnm.id = ref.bank_id', 'left');
        $this->db->join('trv_bank_master as bm', 'bm.id = ref.branch_id', 'left');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'ASC');
    	  return $this->db->get()->result();
   }
   
   function getEnrolment($enrolment_id) {         
        $this->db->select('ref.id, ref.photo, ref.name, ref.sex, ref.village, ref.mobile_no, ref.account_no, ref.bank_id, ref.branch_id, pm.name as village_name, bnm.name as bank_name, bm.branch_name as branch_name');
        $this->db->from('fpo_labour_enrolment as ref');
        $this->db->join('trv_village_master as pm', 'pm.id = ref.village', 'left');
        $this->db->join('trv_bank_name_master as bnm', 'bnm.id = ref.bank_id', 'left');
        $this->db->join('trv_bank_master as bm', 'bm.id = ref.branch_id', 'left');
        $this->db->where(array('ref.id' => $enrolment_id, 'ref.status' => '1'));
    	  return $this->db->get()->result();
   }
  
   function addEnrolment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $form_data = array(	
         'farmer_id'       => $post_data['farmer_id'],
         'name'            => $post_data['name'],
         'sex'             => $post_data['sex'],  //1-Male, 2-Female
         'village'         => $post_data['village'],
         'mobile_no'       => $post_data['mobile_no'],
         'account_no'      => $post_data['account_no'],
         'bank_id'         => $post_data['bank_id'],
         'branch_id'       => $post_data['branch_id'],
         'status'          => 1  //Active
      );

      if(!empty($post_data['photo'])) {
         $year = date('Y');
         if (!is_dir('./assets/uploads/labour')) {
            mkdir('./assets/uploads/labour', 0777, TRUE);
         }
         if (!is_dir('./assets/uploads/labour/'.$year)) {
            mkdir('./assets/uploads/labour/'.$year, 0777, TRUE);
         }
         $upload_folder = './assets/uploads/labour/'.$year;
         $img_name = uniqid('img-');
         $img_path = $upload_folder.'/'.$img_name.'.jpg';
         file_put_contents($img_path, base64_decode($post_data['photo']));
         $form_data['photo'] = $img_path;
      }
      
      return $this->db->insert('fpo_labour_enrolment', $form_data);
   }

   function updateEnrolment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['enrolment_id'] >0) {
         $form_data = array(	
            'farmer_id'       => $post_data['farmer_id'],
            'name'            => $post_data['name'],
            'sex'             => $post_data['sex'],  //1-Male, 2-Female
            'village'         => $post_data['village'],
            'mobile_no'       => $post_data['mobile_no'],
            'account_no'      => $post_data['account_no'],
            'bank_id'         => $post_data['bank_id'],
            'branch_id'       => $post_data['branch_id']
         );
         
         if(!empty($post_data['photo'])) {
            $year = date('Y');
            if (!is_dir('./assets/uploads/labour')) {
               mkdir('./assets/uploads/labour', 0777, TRUE);
				}
            if (!is_dir('./assets/uploads/labour/'.$year)) {
               mkdir('./assets/uploads/labour/'.$year, 0777, TRUE);
				}
            $upload_folder = './assets/uploads/labour/'.$year;
            $img_name = uniqid('img-');
            $img_path = $upload_folder.'/'.$img_name.'.jpg';
            file_put_contents($img_path, base64_decode($post_data['photo']));
            $form_data['photo'] = $img_path;
         }
         
         return $this->db->update('fpo_labour_enrolment', $form_data, array('id' => $post_data['enrolment_id']));
      }
      else {
         return false;
      }
   }   
   
   function deleteEnrolment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['enrolment_id'] >0) { 
         $form_data = array(	
            'status'             => 2, //Inactive or Deleted
         );
         return $this->db->update('fpo_labour_enrolment', $form_data, array('id' => $post_data['enrolment_id']));
      }
      else {
         return false;
      }         
   } 

   function attendanceList($farmer_id) {         
        $this->db->select('ref.id, ref.farmer_id, DATE_FORMAT(ref.attendance_date, "%d/%m/%Y") attendance_date, ref.attendance_time, ref.work_type, ref.land_identification, li.identification as land_identification_name, ref.nature_of_work, ref.overtime, ref.labour_list, ref.overtime_list, round(ref.overtime_amount,0) overtime_amount, ref.others_women, ref.others_men, ref.total_labour, round(ref.total_wages,0) total_wages');
        $this->db->from('fpo_labour_attendance as ref');
        $this->db->join('trv_land_identify as li', 'li.id = ref.land_identification', 'left');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'ASC');
    	  return $this->db->get()->result();
   }
   
   function getAttendance($attendance_id) {         
        $this->db->select('ref.id, ref.farmer_id, DATE_FORMAT(ref.attendance_date, "%d/%m/%Y") attendance_date, ref.attendance_time, ref.work_type, ref.land_identification, li.identification as land_identification_name, ref.nature_of_work, ref.overtime, ref.labour_list, ref.overtime_list, round(ref.overtime_amount,0) overtime_amount, ref.others_women, ref.others_men, ref.total_labour, round(ref.total_wages,0) total_wages');
        $this->db->from('fpo_labour_attendance as ref');
        $this->db->join('trv_land_identify as li', 'li.id = ref.land_identification', 'left');
        $this->db->where(array('ref.id' => $attendance_id, 'ref.status' => '1'));
    	  return $this->db->get()->result();
   }
   
   function getAttendanceOvertime($attendance_id) {         
        $this->db->select('ref.labour_id, ref.overtime, le.name as labour_name');
        $this->db->from('fpo_labour_attendance_overtime as ref');
        $this->db->join('fpo_labour_enrolment as le', 'le.id = ref.labour_id', 'left');
        $this->db->where(array('ref.attendance_id' => $attendance_id));
    	  return $this->db->get()->result();
   }
  
   function addAttendance() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $form_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'attendance_date'       => ($post_data['attendance_date'] != "")? explode("/",$post_data['attendance_date'])[2].'-'.explode("/",$post_data['attendance_date'])[1].'-'.explode("/",$post_data['attendance_date'])[0] : "0000-00-00",
         'attendance_time'       => $post_data['attendance_time'],  //1-Full Day, 2-Half Day 
         'work_type'             => $post_data['work_type'],  // 1-Farm Work, 2-Others 
         'land_identification'   => $post_data['land_identification'],  
         'nature_of_work'        => $post_data['nature_of_work'],
         'overtime'              => $post_data['overtime'],  //1-Yes, 2-No 
         'labour_list'           => $post_data['labour_list'],
         'overtime_list'         => $post_data['overtime_list'],
         'overtime_amount'       => $post_data['overtime_amount'],
         'others_women'          => $post_data['others_women'],
         'others_men'            => $post_data['others_men'],
         'total_labour'          => $post_data['total_labour'],
         'total_wages'           => $post_data['total_wages'],
         'status'                => 1  //Active
      );               
      $attendance_entry = $this->db->insert('fpo_labour_attendance', $form_data);
      $attendance_id = $this->db->insert_id();
      
      $arr_labour_data = array();
      if(! empty($post_data['labour_list'])) {
         $arr_labour = explode(',', $post_data['labour_list']);
         foreach($arr_labour as $key => $labour_id) {
            $arr_labour_data[$key] = array(	
               'attendance_id'   => $attendance_id,
               'labour_id'       => $labour_id
            );
         }
      }
      if(isset($post_data['overtime_list'])) {
         $arr_overtime = explode(',', $post_data['overtime_list']);
         foreach($arr_overtime as $key => $overtime) {
            $arr_labour_data[$key]['overtime'] = $overtime;
         }
      }
      foreach($arr_labour_data as $labour_data) {
         $labour_entry = $this->db->insert('fpo_labour_attendance_overtime', $labour_data);
      }
       
      return $attendance_entry;
   }

   function updateAttendance() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['attendance_id'] >0) {
         $form_data = array(	
            'farmer_id'             => $post_data['farmer_id'],
            'attendance_date'       => ($post_data['attendance_date'] != "")? explode("/",$post_data['attendance_date'])[2].'-'.explode("/",$post_data['attendance_date'])[1].'-'.explode("/",$post_data['attendance_date'])[0] : "0000-00-00",
            'attendance_time'       => $post_data['attendance_time'],  //1-Full Day, 2-Half Day 
            'work_type'             => $post_data['work_type'],  //1-Farm Work, 2-Others 
            'land_identification'   => $post_data['land_identification'],  
            'nature_of_work'        => $post_data['nature_of_work'],
            'overtime'              => $post_data['overtime'],  //1-Yes, 2-No 
            'labour_list'           => $post_data['labour_list'],
            'overtime_list'         => $post_data['overtime_list'],
            'overtime_amount'       => $post_data['overtime_amount'],
            'others_women'          => $post_data['others_women'],
            'others_men'            => $post_data['others_men'],
            'total_labour'          => $post_data['total_labour'],
            'total_wages'           => $post_data['total_wages']
         );                
         $attendance_entry = $this->db->update('fpo_labour_attendance', $form_data, array('id' => $post_data['attendance_id']));
         $this->db->delete('fpo_labour_attendance_overtime', array('attendance_id' => $post_data['attendance_id']));
         
         $arr_labour_data = array();
         if(! empty($post_data['labour_list'])) {
            $arr_labour = explode(',', $post_data['labour_list']);
            foreach($arr_labour as $key => $labour_id) {
               $arr_labour_data[$key] = array(	
                  'attendance_id'   => $post_data['attendance_id'],
                  'labour_id'       => $labour_id
               );
            }
         }
         if(isset($post_data['overtime_list'])) {
            $arr_overtime = explode(',', $post_data['overtime_list']);
            foreach($arr_overtime as $key => $overtime) {
               $arr_labour_data[$key]['overtime'] = $overtime;
            }
         }
         foreach($arr_labour_data as $labour_data) {
            $labour_entry = $this->db->insert('fpo_labour_attendance_overtime', $labour_data);
         }
      
         return $attendance_entry;
      }
      else {
         return false;
      }
   }   
   
   function deleteAttendance() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['attendance_id'] >0) { 
         $form_data = array(	
            'status'             => 2, //Inactive or Deleted
         );
         return $this->db->update('fpo_labour_attendance', $form_data, array('id' => $post_data['attendance_id']));
      }
      else {
         return false;
      }         
   }
   
   function paymentList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.payment_date, "%d/%m/%Y") payment_date, ref.labour,  le.name labour_name, round(ref.wages,0) wages, round(ref.advance_adjustment,0) advance_adjustment, round(ref.payment,0) payment, round(ref.balance,0) balance');
        $this->db->from('fpo_labour_payment as ref');
        $this->db->join('fpo_labour_enrolment as le', 'le.id = ref.labour');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'ASC');
    	  return $this->db->get()->result();
   }
   
   function getPayment($payment_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.payment_date, "%d/%m/%Y") payment_date, ref.labour, round(ref.wages,0) wages, round(ref.advance_adjustment,0) advance_adjustment, round(ref.payment,0) payment, round(ref.balance,0) balance');
        $this->db->from('fpo_labour_payment as ref');
        $this->db->where(array('ref.id' => $payment_id, 'ref.status' => '1'));
    	  return $this->db->get()->result();
   }
  
   function addPayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $form_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'payment_date'          => ($post_data['payment_date'] != "")? explode("/",$post_data['payment_date'])[2].'-'.explode("/",$post_data['payment_date'])[1].'-'.explode("/",$post_data['payment_date'])[0] : "0000-00-00",
         'labour'                => $post_data['labour'], 
         'wages'                 => $post_data['wages'],
         'advance_adjustment'    => $post_data['advance_adjustment'],  
         'payment'               => $post_data['payment'],
         'is_contract'           => $post_data['is_contract'],
         'balance'               => $post_data['balance'],
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_labour_payment', $form_data);
   }

   function updatePayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['payment_id'] >0) {
         $form_data = array(	
            'farmer_id'             => $post_data['farmer_id'],
            'payment_date'          => ($post_data['payment_date'] != "")? explode("/",$post_data['payment_date'])[2].'-'.explode("/",$post_data['payment_date'])[1].'-'.explode("/",$post_data['payment_date'])[0] : "0000-00-00",
            'labour'                => $post_data['labour'], 
            'wages'                 => $post_data['wages'],
            'advance_adjustment'    => $post_data['advance_adjustment'],  
            'payment'               => $post_data['payment'],
            'is_contract'           => $post_data['is_contract'],
            'balance'               => $post_data['balance']
         );                 
         return $this->db->update('fpo_labour_payment', $form_data, array('id' => $post_data['payment_id']));
      }
      else {
         return false;
      }
   }   
   
   function deletePayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['payment_id'] >0) { 
         $form_data = array(	
            'status'             => 2, //Inactive or Deleted
         );
         return $this->db->update('fpo_labour_payment', $form_data, array('id' => $post_data['payment_id']));
      }
      else {
         return false;
      }         
   }
   
   function advancePaymentList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.payment_date, "%d/%m/%Y") payment_date, ref.labour, round(ref.advance,0) advance, le.name as labour_name');
        $this->db->from('fpo_labour_advance_payment as ref');
        $this->db->join('fpo_labour_enrolment as le', 'le.id = ref.labour', 'left');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'ASC');
    	  return $this->db->get()->result();
   }
   
   function getAdvancePayment($advance_payment_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.payment_date, "%d/%m/%Y") payment_date, ref.labour, round(ref.advance,0) advance, le.name as labour_name');
        $this->db->from('fpo_labour_advance_payment as ref');
        $this->db->join('fpo_labour_enrolment as le', 'le.id = ref.labour', 'left');
        $this->db->where(array('ref.id' => $advance_payment_id, 'ref.status' => '1'));
    	  return $this->db->get()->result();
   }
  
   function addAdvancePayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $form_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'payment_date'          => ($post_data['payment_date'] != "")? explode("/",$post_data['payment_date'])[2].'-'.explode("/",$post_data['payment_date'])[1].'-'.explode("/",$post_data['payment_date'])[0] : "0000-00-00",
         'labour'                => $post_data['labour'], 
         'advance'               => $post_data['advance'],
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_labour_advance_payment', $form_data);
   }

   function updateAdvancePayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['advance_payment_id'] >0) {
         $form_data = array(	
            'farmer_id'             => $post_data['farmer_id'],
            'payment_date'          => ($post_data['payment_date'] != "")? explode("/",$post_data['payment_date'])[2].'-'.explode("/",$post_data['payment_date'])[1].'-'.explode("/",$post_data['payment_date'])[0] : "0000-00-00",
            'labour'                => $post_data['labour'], 
            'advance'               => $post_data['advance']
         );                
         return $this->db->update('fpo_labour_advance_payment', $form_data, array('id' => $post_data['advance_payment_id']));
      }
      else {
         return false;
      }
   }   
   
   function deleteAdvancePayment() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['advance_payment_id'] >0) { 
         $form_data = array(	
            'status'             => 2, //Inactive or Deleted
         );
         return $this->db->update('fpo_labour_advance_payment', $form_data, array('id' => $post_data['advance_payment_id']));
      }
      else {
         return false;
      }         
   }
   
   function talkList($farmer_id) {         
        $this->db->select('ref.id, ref.name, ref.sex, ref.village, ref.mobile_no, ref.account_no, ref.bank_id, ref.branch_id, pm.name as village_name, bnm.name as bank_name, bm.branch_name as branch_name');
        $this->db->from('fpo_talk_to_labour as ref');
        $this->db->join('trv_village_master as pm', 'pm.id = ref.village', 'left');
        $this->db->join('trv_bank_name_master as bnm', 'bnm.id = ref.bank_id', 'left');
        $this->db->join('trv_bank_master as bm', 'bm.id = ref.branch_id', 'left');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'ASC');
    	  return $this->db->get()->result();
   }
   
   function getTalk($talk_id) {         
        $this->db->select('ref.id, ref.name, ref.sex, ref.village, ref.mobile_no, ref.account_no, ref.bank_id, ref.branch_id, pm.name as village_name, bnm.name as bank_name, bm.branch_name as branch_name');
        $this->db->from('fpo_talk_to_labour as ref');
        $this->db->join('trv_village_master as pm', 'pm.id = ref.village', 'left');
        $this->db->join('trv_bank_name_master as bnm', 'bnm.id = ref.bank_id', 'left');
        $this->db->join('trv_bank_master as bm', 'bm.id = ref.branch_id', 'left');
        $this->db->where(array('ref.id' => $talk_id, 'ref.status' => '1'));
    	  return $this->db->get()->result();
   }
  
   function addTalk() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $form_data = array(	
         'farmer_id'       => $post_data['farmer_id'],
         'name'            => $post_data['name'],
         'sex'             => $post_data['sex'],  //1-Male, 2-Female
         'village'         => $post_data['village'],
         'mobile_no'       => $post_data['mobile_no'],
         'account_no'      => $post_data['account_no'],
         'bank_id'         => $post_data['bank_id'],
         'branch_id'       => $post_data['branch_id'],
         'status'          => 1  //Active
      );               
      return $this->db->insert('fpo_talk_to_labour', $form_data);
   }

   function updateTalk() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['talk_id'] >0) {
         $form_data = array(	
            'farmer_id'       => $post_data['farmer_id'],
            'name'            => $post_data['name'],
            'sex'             => $post_data['sex'],  //1-Male, 2-Female
            'village'         => $post_data['village'],
            'mobile_no'       => $post_data['mobile_no'],
            'account_no'      => $post_data['account_no'],
            'bank_id'         => $post_data['bank_id'],
            'branch_id'       => $post_data['branch_id']
         );                
         return $this->db->update('fpo_talk_to_labour', $form_data, array('id' => $post_data['talk_id']));
      }
      else {
         return false;
      }
   }   
   
   function deleteTalk() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['talk_id'] >0) { 
         $form_data = array(	
            'status'             => 2, //Inactive or Deleted
         );
         return $this->db->update('fpo_talk_to_labour', $form_data, array('id' => $post_data['talk_id']));
      }
      else {
         return false;
      }         
   }
   
   function settingsList($farmer_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.settings_date, "%d/%m/%Y") settings_date, ref.week_no, round(ref.men_full_day_amount,0) men_full_day_amount, round(ref.men_half_day_amount,0) men_half_day_amount, round(ref.women_full_day_amount,0) women_full_day_amount, round(ref.women_half_day_amount,0) women_half_day_amount');
        $this->db->from('fpo_labour_settings as ref');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'ASC');
    	  return $this->db->get()->result();
   }
   
   function getSettings($settings_id) {         
        $this->db->select('ref.id, DATE_FORMAT(ref.settings_date, "%d/%m/%Y") settings_date, ref.week_no, round(ref.men_full_day_amount,0) men_full_day_amount, round(ref.men_half_day_amount,0) men_half_day_amount, round(ref.women_full_day_amount,0) women_full_day_amount, round(ref.women_half_day_amount,0) women_half_day_amount');
        $this->db->from('fpo_labour_settings as ref');
        $this->db->where(array('ref.id' => $settings_id, 'ref.status' => '1'));
    	  return $this->db->get()->result();
   }
  
   function addSettings() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $form_data = array(	
         'farmer_id'              => $post_data['farmer_id'],
         'settings_date'          => ($post_data['settings_date'] != "")? explode("/",$post_data['settings_date'])[2].'-'.explode("/",$post_data['settings_date'])[1].'-'.explode("/",$post_data['settings_date'])[0] : "0000-00-00",
         'week_no'                => $post_data['week_no'], 
         'men_full_day_amount'    => $post_data['men_full_day_amount'],
         'men_half_day_amount'    => $post_data['men_half_day_amount'],  
         'women_full_day_amount'  => $post_data['women_full_day_amount'],
         'women_half_day_amount'  => $post_data['women_half_day_amount'],
         'status'                 => 1  //Active
      );               
      return $this->db->insert('fpo_labour_settings', $form_data);
   }

   function updateSettings() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['settings_id'] >0) {
         $form_data = array(	
            'farmer_id'              => $post_data['farmer_id'],
            'settings_date'          => ($post_data['settings_date'] != "")? explode("/",$post_data['settings_date'])[2].'-'.explode("/",$post_data['settings_date'])[1].'-'.explode("/",$post_data['settings_date'])[0] : "0000-00-00",
            'week_no'                => $post_data['week_no'], 
            'men_full_day_amount'    => $post_data['men_full_day_amount'],
            'men_half_day_amount'    => $post_data['men_half_day_amount'],  
            'women_full_day_amount'  => $post_data['women_full_day_amount'],
            'women_half_day_amount'  => $post_data['women_half_day_amount']
         );                 
         return $this->db->update('fpo_labour_settings', $form_data, array('id' => $post_data['settings_id']));
      }
      else {
         return false;
      }
   }   
   
   function deleteSettings() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['settings_id'] >0) { 
         $form_data = array(	
            'status'             => 2, //Inactive or Deleted
         );
         return $this->db->update('fpo_labour_settings', $form_data, array('id' => $post_data['settings_id']));
      }
      else {
         return false;
      }         
   }
   
   function contractAttendanceList($farmer_id) {         
        $this->db->select('ref.id, ref.farmer_id, DATE_FORMAT(ref.attendance_date, "%d/%m/%Y") attendance_date, ref.work_type, ref.land_identification, li.identification as land_identification_name, ref.nature_of_work, ref.no_of_women, ref.no_of_men, round(ref.amount,0) amount, ref.total_labour, round(ref.total_wages,0) total_wages');
        $this->db->from('fpo_contract_labour_attendance as ref');
        $this->db->join('trv_land_identify as li', 'li.id = ref.land_identification', 'left');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.status' => '1'));
        $this->db->order_by('ref.id', 'ASC');
    	  return $this->db->get()->result();
   }
   
   function getContractAttendance($contract_attendance_id) {         
        $this->db->select('ref.id, ref.farmer_id, DATE_FORMAT(ref.attendance_date, "%d/%m/%Y") attendance_date, ref.work_type, ref.land_identification, li.identification as land_identification_name, ref.nature_of_work, ref.no_of_women, ref.no_of_men, round(ref.amount,0) amount, ref.total_labour, round(ref.total_wages,0) total_wages');
        $this->db->from('fpo_contract_labour_attendance as ref');
        $this->db->join('trv_land_identify as li', 'li.id = ref.land_identification', 'left');
        $this->db->where(array('ref.id' => $contract_attendance_id, 'ref.status' => '1'));
    	  return $this->db->get()->result();
   }
   
   function addContractAttendance() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $form_data = array(	
         'farmer_id'             => $post_data['farmer_id'],
         'attendance_date'       => ($post_data['attendance_date'] != "")? explode("/",$post_data['attendance_date'])[2].'-'.explode("/",$post_data['attendance_date'])[1].'-'.explode("/",$post_data['attendance_date'])[0] : "0000-00-00",
         'work_type'             => $post_data['work_type'],  // 1-Farm Work, 2-Others 
         'land_identification'   => $post_data['land_identification'],  
         'nature_of_work'        => $post_data['nature_of_work'],
         'no_of_women'           => $post_data['no_of_women'],
         'no_of_men'             => $post_data['no_of_men'],
         'amount'                => $post_data['amount'],
         'total_labour'          => $post_data['total_labour'],
         'total_wages'           => $post_data['total_wages'],
         'status'                => 1  //Active
      );               
      return $this->db->insert('fpo_contract_labour_attendance', $form_data);
   }

   function updateContractAttendance() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['contract_attendance_id'] >0) {
         $form_data = array(	
            'farmer_id'             => $post_data['farmer_id'],
            'attendance_date'       => ($post_data['attendance_date'] != "")? explode("/",$post_data['attendance_date'])[2].'-'.explode("/",$post_data['attendance_date'])[1].'-'.explode("/",$post_data['attendance_date'])[0] : "0000-00-00",
            'work_type'             => $post_data['work_type'],  // 1-Farm Work, 2-Others 
            'land_identification'   => $post_data['land_identification'],  
            'nature_of_work'        => $post_data['nature_of_work'],
            'no_of_women'           => $post_data['no_of_women'],
            'no_of_men'             => $post_data['no_of_men'],
            'amount'                => $post_data['amount'],
            'total_labour'          => $post_data['total_labour'],
            'total_wages'           => $post_data['total_wages']
         ); 
         
         return $this->db->update('fpo_contract_labour_attendance', $form_data, array('id' => $post_data['contract_attendance_id']));
      }
      else {
         return false;
      }
   }   
   
   function deleteContractAttendance() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['contract_attendance_id'] >0) { 
         $form_data = array(	
            'status'             => 2, //Inactive or Deleted
         );
         return $this->db->update('fpo_contract_labour_attendance', $form_data, array('id' => $post_data['contract_attendance_id']));
      }
      else {
         return false;
      }         
   }
   
   function getLabours($farmer_id, $attendance_date) {
        $db_attendance_date = date('Y-m-d', strtotime(str_replace('/', '-', $attendance_date) ));
        $this->db->select('ref.attendance_time, round(ref.overtime_amount,0) overtime_amount, ov.labour_id, ov.overtime, enrol.name as labour_name, enrol.sex');
        $this->db->from('fpo_labour_attendance as ref');
        $this->db->join('fpo_labour_attendance_overtime as ov', 'ov.attendance_id = ref.id');
        $this->db->join('fpo_labour_enrolment as enrol', 'enrol.id = ov.labour_id');
        $this->db->where(array('ref.farmer_id' => $farmer_id, 'ref.attendance_date' => $db_attendance_date, 'ref.status' => '1'));
     	  return $this->db->get()->result();
   }
   
   function getWagesLabour($labour_id) {
        $this->db->select('la.farmer_id, DATE_FORMAT(la.attendance_date, "%d/%m/%Y") attendance_date, la.attendance_time, round(la.overtime_amount,0) overtime_amount, ref.labour_id, ref.overtime, enrol.name as labour_name, enrol.sex');
        $this->db->from('fpo_labour_attendance_overtime as ref');
        $this->db->join('fpo_labour_attendance as la', 'la.id = ref.attendance_id', 'Left');
        $this->db->join('fpo_labour_enrolment as enrol', 'enrol.id = ref.labour_id', 'Left');
        $this->db->where(array('ref.labour_id' => $labour_id, 'la.status' => '1'));
     	  return $this->db->get()->result();
   }
   
   function getWagesLabourAdvance($labour_id) {
        $this->db->select('SUM(`advance`) labour_advance');
        $this->db->from('fpo_labour_advance_payment');
        $this->db->where(array('labour' => $labour_id, 'status' => '1'));
     	return $this->db->get()->row('labour_advance');
   }
   
   function getWagesLabourPayments($labour_id) {
        $this->db->select('SUM(`payment`) labour_payments');
        $this->db->from('fpo_labour_payment');
        $this->db->where(array('labour' => $labour_id, 'status' => '1'));
     	return $this->db->get()->row('labour_payments');
   }
   
}
 
?>