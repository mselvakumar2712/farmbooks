<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('asset_url()'))
{
  function asset_url()
  {
     return base_url().'assets/';
  }
}

if( !function_exists('fpo_display_date') ) {
  function fpo_display_date($date) {
    $timestamp = strtotime($date);
    return date('d-M-Y', $timestamp);
  }
}

if( !function_exists('fpo_display_datetime') ) {
  function fpo_display_datetime($date) {
    $timestamp = strtotime($date);
    return date('d-M-Y H:i', $timestamp);
  }
}

function check_staff_permission($logger_id, $module_id=null)	{
    $CI =& get_instance();
	$field_value = $CI->db->get_where('trv_access_right', array('profile_id' => $logger_id, 'module_id' => $module_id))->row();
    //print_r($field_value);
    //echo $field_value->module_id;
    if(!empty($field_value->module_id)) {
        return true;
    } else {
        return false;
    }
}
