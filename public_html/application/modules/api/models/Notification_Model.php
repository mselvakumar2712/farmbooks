<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification_Model extends CI_Model {
   function __construct() {
        parent::__construct();
        $this->load->database();
   }
    
   function addDevice() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      $device_data = array(	
         'mobile'           => $post_data['mobile'],
         'token'            => $post_data['token']
      );               
      return $this->db->insert('fpo_fd_notifications', $device_data);
   }
   
   function isMobileExist() {
     $post_data = json_decode(file_get_contents('php://input'), true);
     $query = $this->db->query("SELECT id FROM fpo_fd_notifications WHERE mobile = '".$post_data['mobile']."'");
     return count($query->result());
   }
   
   function getAllTokens() {
      $tokens = array(); 
      $query = $this->db->query("SELECT token FROM fpo_fd_notifications");
      foreach ($query->result() as $row) {
         array_push($tokens, $row->token);
      }
      return $tokens;
   }
   
   function getTokenByMobile($farmer_id) {
      //$post_data = json_decode(file_get_contents('php://input'), true);
      $query = $this->db->query("SELECT panchayat FROM trv_farmer WHERE id = '".$farmer_id."' and status = 1");
      $row = $query->row();
      $query = $this->db->query("SELECT tua.token_key FROM trv_farmer tf INNER JOIN trv_user_auth tua on tua.username = tf.mobile WHERE is_trader = 1 and tf.status = 1 and tf.panchayat = '".$row->panchayat."'");
      $row = $query->row();
      if (isset($row)) {
         return array($row->token_key);
      }
      return array();
   }
   
   function update_traderid() {
      $post_data = json_decode(file_get_contents('php://input'), true);
      
      //$sale_id = $this->Fdiary_Model->getlatestsaleid($post_data['farmer_id']);
      
      $query = $this->db->query("SELECT `id` FROM `fpo_fd_sale` WHERE `farmer_id` = '".$post_data['farmer_id']."' and status = 1 ORDER BY `id` DESC LIMIT 1");
      $row = $query->row();
      $sale_id = $row->id;
      $query = $this->db->query("SELECT panchayat FROM trv_farmer WHERE id = '".$post_data['farmer_id']."' and status = 1");
      $row = $query->row();
      
      $query = $this->db->query("SELECT id trader_id FROM trv_farmer tf WHERE is_trader = 1 and tf.status = 1 and tf.panchayat = '".$row->panchayat."'");
      $row = $query->row();
      
      if(isset($row)) {
            $trader_data = array(	
               'trader_id'           => $row->trader_id
            );                 
            return $this->db->update('fpo_fd_sale', $trader_data, array('id' => $sale_id));
      }
      else {
         return false;
      }
   }
   
   function getTokenBysaleid($sale_id) {
      $query = $this->db->query("SELECT tua.token_key FROM trv_farmer tf INNER JOIN trv_user_auth tua on tua.username = tf.mobile Inner Join fpo_fd_sale ffs on ffs.farmer_id = tf.id WHERE tf.status = 1 and ffs.id = '".$sale_id."'");
      $row = $query->row();
      if (isset($row)) {
         return array($row->token_key);
      }
      return array();
   }
   
   function getAllDevices() {
      $query = $this->db->query("SELECT * FROM fpo_fd_notifications");
      return $query->result();
   }
   
   function getDevice($device_id) {
      $query = $this->db->query("SELECT * FROM fpo_fd_notifications WHERE id = '".$device_id."'");
      return $query->row();   
   } 

   function updateDevice() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['device_id'] >0) {
            $device_data = array(	
               'mobile'           => $post_data['mobile'],
               'token'            => $post_data['token']
            );                 
            return $this->db->update('fpo_fd_notifications', $device_data, array('id' => $post_data['device_id']));
      }
      else {
         return false;
      }
   }

   function deleteDevice() {                                 
      $post_data = json_decode(file_get_contents('php://input'), true);
      if($post_data['device_id'] >0) { 
         return $this->db->delete('fpo_fd_notifications', array('id' => $post_data['device_id']));
      }
      else {
         return false;
      }         
   } 
    
}
 
?>