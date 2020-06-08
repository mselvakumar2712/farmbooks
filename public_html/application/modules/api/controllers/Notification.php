<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
   public function __construct() {  
      parent::__construct();
      $this->load->model("Notification_Model");
      $this->load->model("Fdiary_Model");
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

   public function add_device() {  
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->deviceValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      }
      else if($this->Notification_Model->isMobileExist()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Mobile already exist';
      }   
      else if($this->Notification_Model->addDevice()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'New device added';
      }
      echo json_encode($data); 
	}
   
   public function deviceValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['mobile']) || empty($post_data['token']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function send_postsale() {
      $post_data = json_decode(file_get_contents('php://input'), true);
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->sendSingleDeviceValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      }
      else {
         $sale_id = $this->Fdiary_Model->getlatestsaleid($post_data['farmer_id']);
         $res['data'] = $this->Fdiary_Model->postSale($sale_id->id);
		 $res['title'] = "New Order request for purchase";
		 $res['flag'] = "1";
         $mPushNotification = $res;
         
         $devicetoken = $this->Notification_Model->getTokenByMobile($post_data['farmer_id']);
         if(count($devicetoken)) {
            $result = $this->send($devicetoken, $mPushNotification);
            if ($this->Notification_Model->update_traderid($post_data['farmer_id'])){
                $data['status'] = 'TRV_S101';
                $data['result'] = $result;
                $data['message'] = 'Sending notification to trader successfully';
            }
         }
         else {
            $data['status'] = 'TRV_E101';
            $data['message'] = 'No token received';
         }            
      }
      echo json_encode($data); 
	}
	
	public function send_acknowledgement() {
      $post_data = json_decode(file_get_contents('php://input'), true);
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      
      if(!$this->sendacknowledgementValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      }
      else {
          if($post_data['sale_status'] == "2")
          {
              $res['status'] = "Accept your request";
              $res['title'] = "Your request has been accepted by Trader";
              $res['min_price'] = "100";
		      $res['max_price'] = "200";
          }
          else
          {
              $res['status'] = "Denied your request";
              $res['title'] = "Your request has been denied by Trader";
          }
         $res['data'] = $this->Fdiary_Model->postSale($post_data['sale_id']);
		 
		 $res['flag'] = "2";
         $mPushNotification = $res;
         $devicetoken = $this->Notification_Model->getTokenBysaleid($post_data['sale_id']);
         
         if(count($devicetoken)) {
            $result = $this->send($devicetoken, $mPushNotification);
            if ($this->Fdiary_Model->updateSaleStatus()){
                $data['status'] = 'TRV_S101';
                $data['result'] = $result;
                $data['message'] = 'Sending notification to farmer successfully';
            }
         }
         else {
            $data['status'] = 'TRV_E101';
            $data['message'] = 'No token received';
         }            
      }
      echo json_encode($data); 
	}
   
   
   public function send_payments() {
      $post_data = json_decode(file_get_contents('php://input'), true);
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      
      if(!$this->sendpaymentsValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      }
      else {
              $res['status'] = "Payment Initiated";
              $res['title'] = "Your payment initiated by Trader";
              //$res['min_price'] = "100";
		      //$res['max_price'] = "200";
            $res['data'] = $this->Fdiary_Model->postPayments($post_data['sale_id']);
		 
		 $res['flag'] = "3";
         $mPushNotification = $res;
         $devicetoken = $this->Notification_Model->getTokenBysaleid($post_data['sale_id']);
         
         if(count($devicetoken)) {
            $result = $this->send($devicetoken, $mPushNotification);
            //if ($this->Fdiary_Model->updateSaleStatus()){
                $data['status'] = 'TRV_S101';
                $data['result'] = $result;
                $data['message'] = 'Sending notification to farmer successfully';
            //}
         }
         else {
            $data['status'] = 'TRV_E101';
            $data['message'] = 'No token received';
         }            
      }
      echo json_encode($data); 
	}
   public function sendSingleDeviceValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['farmer_id'])) {
         return false;
      } 
      else {
         return true;
      }
   }

   public function sendacknowledgementValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['sale_id']) || empty($post_data['sale_status'])) {
         return false;
      } 
      else {
         return true;
      }
   }   
   
   public function sendpaymentsValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['sale_id'])) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   private function sendPushNotification($fields) {
         
      $firebase_api_key = 'AAAA-UoEh-o:APA91bFh7SzY7fEus4KKlxBTeCHCyO3gbx7Bqcaad8FKCBIaYeK2kiboNPhPFogr6wnNus_HL-boyyaSXUvCJ-Xwv2qQsjXM1S0AgAmXxxuXMJTSGDP0KNjZFoo6wbSgcygG6UW8CBlJ';
      
      $url = 'https://fcm.googleapis.com/fcm/send';
 
      $headers = array(
         'Authorization: key=' . $firebase_api_key,
         'Content-Type: application/json'
      );
 
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
      $result = curl_exec($ch);
      if ($result === FALSE) {
         die('Curl failed: ' . curl_error($ch));
      }
      curl_close($ch);
      return $result;
   }
   
   private function send($registration_ids, $message) {
      $fields = array(
         'registration_ids' => $registration_ids,
         'data' => $message,
      );
      return $this->sendPushNotification($fields);
   }
   
   public function send_all_device() {
      $post_data = json_decode(file_get_contents('php://input'), true);   
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->sendMultipleDeviceValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      }
      else {
         $res = array();
         $res['data']['title'] = $post_data['title'];
         $res['data']['message'] = $post_data['message'];
         if(isset($post_data['image'])) {
            $res['data']['image'] = $post_data['image'];
         }
         else {
            $res['data']['image'] = null;
         }
         $mPushNotification = $res;
         
         $devicetoken = $this->Notification_Model->getAllTokens();
         if(count($devicetoken)) {
            $result = $this->send($devicetoken, $mPushNotification);
            
            $data['status'] = 'TRV_S101';
            $data['result'] = $result;
            $data['message'] = 'Sending notification to all devices successfully';
         }
         else {
            $data['status'] = 'TRV_E101';
            $data['message'] = 'No token received';
         }            
      }
      echo json_encode($data); 
	}
   
   public function sendMultipleDeviceValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['title']) || empty($post_data['message']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
   
   public function device_list() {  
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Notification_Model->getAllDevices();
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function get_device() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
      $data['result'] = array();
      $result = $this->Notification_Model->getDevice($post_data['device_id']);
      if($result){
         $data['status'] = 'TRV_S101';
         $data['result'] = $result;
      }      
      echo json_encode($data); 
	}
   
   public function update_device() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->deviceUpdateValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Notification_Model->updateDevice()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Device updated successfully';
      }
      echo json_encode($data); 
	}
   
   public function deviceUpdateValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if(empty($post_data['mobile']) || empty($post_data['device_id']) || empty($post_data['token']) ) {
         return false;
      }
      else {
         return true;
      }
   }
   
   public function delete_device() {
      $data['status'] = 'TRV_E101';
      $data['message'] = 'Technical problem';
      if(!$this->deviceDeleteValidator()) {
         $data['status'] = 'TRV_E101';
         $data['message'] = 'Provide the mandatory fields';
      } 
      else if( $this->Notification_Model->deleteDevice()) {
         $data['status'] = 'TRV_S101';
         $data['message'] = 'Device deleted successfully';
      }
      echo json_encode($data); 
	}
   
   public function deviceDeleteValidator() {  
      $post_data = json_decode(file_get_contents('php://input'), true);
      if( empty($post_data['device_id']) ) {
         return false;
      } 
      else {
         return true;
      }
   }
      

}