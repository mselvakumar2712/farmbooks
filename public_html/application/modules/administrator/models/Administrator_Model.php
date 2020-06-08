<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Administrator_Model extends CI_Model 
{
	function __construct() {
      parent::__construct();
      $this->load->database();
   }
   function farmerCount() {
      $this->db->select('trv_farmer.id,trv_farmer.status');
      $this->db->from('trv_farmer');
      $this->db->where(array('trv_farmer.status'=>'1'));
      return $this->db->get()->result();	
   }
	function farmerMonthwiseCount() {
      $until = mktime(0, 0, 0, date('n'), 1, date('Y'));
      $from = mktime(0, 0, 0, date('n', $until)-10, 1, date('Y', $until));
      $prev_month = (int) date('n', strtotime('-10 months'));
      $this->db->select('YEAR(trv_farmer.created_on) as year,MONTHNAME(trv_farmer.created_on) as month,SUM(trv_farmer.status) as month_count');
      $this->db->from('trv_farmer');
      $this->db->where(array('trv_farmer.status'=>'1','trv_farmer.created_on >='=> date('Y-m-d',$from),'trv_farmer.created_on <='=> date('Y-d-m')));
      $this->db->group_by('YEAR(trv_farmer.created_on),MONTHNAME(trv_farmer.created_on)');
      $this->db->order_by("YEAR(trv_farmer.created_on)", "ASC");
      $this->db->order_by("month(trv_farmer.created_on)", "ASC");       
      return $this->db->get()->result();	
   }   
	function figCount() {
      $this->db->select('trv_fig.id,trv_fig.status');
      $this->db->from('trv_fig');
      $this->db->where(array('trv_fig.status','1'));
      return $this->db->get()->result();		
   }
	function figMonthwiseCount(){
      $until = mktime(0, 0, 0, date('n'), 1, date('Y'));
      $from = mktime(0, 0, 0, date('n', $until)-10, 1, date('Y', $until));
      $this->db->select('trv_fig.id,trv_fig.status,YEAR(trv_fig.updated_on) as year,MONTHNAME(trv_fig.updated_on) as month,SUM(trv_fig.status) as month_count');
      $this->db->from('trv_fig');
      $this->db->where(array('trv_fig.status'=>'1','trv_fig.updated_on >='=>  $from ,'trv_fig.updated_on <='=> date('Y-d-m')));
      $this->db->group_by('YEAR(trv_fig.updated_on),month(trv_fig.updated_on)');
      $this->db->order_by("YEAR(trv_fig.updated_on)", "ASC");
      $this->db->order_by("month(trv_fig.updated_on)", "ASC");       
      return $this->db->get()->result();	
   }
	function fpoCount() {
      $this->db->select('trv_fpo.id,trv_fpo.status');
      $this->db->from('trv_fpo');
      $this->db->where(array('trv_fpo.status','1'));
      return $this->db->get()->result();		
   }
	function fpoMonthwiseCount() {
      $until = mktime(0, 0, 0, date('n'), 1, date('Y'));
      $from = mktime(0, 0, 0, date('n', $until)-10, 1, date('Y', $until));
      $this->db->select('trv_fpo.id,trv_fpo.status,YEAR(trv_fpo.created_on) as year,MONTHNAME(trv_fpo.created_on) as month,SUM(trv_fpo.status) as month_count');
      $this->db->from('trv_fpo');
      $this->db->where(array('trv_fpo.status'=>'1','trv_fpo.created_on >='=> date('Y-m-d',$from),'trv_fpo.created_on <='=> date('Y-d-m')));
      $this->db->group_by('YEAR(trv_fpo.created_on),month(trv_fpo.created_on)');
      $this->db->order_by("YEAR(trv_fpo.created_on)", "ASC");
      $this->db->order_by("month(trv_fpo.created_on)", "ASC");  
      return $this->db->get()->result();	
   }
	function fpgCount() {
      $this->db->select('trv_fpg.id,trv_fpg.status');
      $this->db->from('trv_fpg');
      $this->db->where(array('trv_fpg.status'=>'1'));
      return $this->db->get()->result();		
   }
	function fpgMonthwiseCount() {
       $until = mktime(0, 0, 0, date('n'), 1, date('Y'));
      $from = mktime(0, 0, 0, date('n', $until)-10, 1, date('Y', $until));
      $this->db->select('trv_fpg.id,trv_fpg.status,YEAR(trv_fpg.updated_on) as year,MONTHNAME(trv_fpg.updated_on) as month,SUM(trv_fpg.status) as month_count');
      $this->db->from('trv_fpg');
      $this->db->where(array('trv_fpg.status'=>'1','trv_fpg.updated_on >='=> date('Y-m-d',$from),'trv_fpg.updated_on <='=> date('Y-m-d')));
      $this->db->group_by('YEAR(trv_fpg.updated_on),month(trv_fpg.updated_on)');
      $this->db->order_by("YEAR(trv_fpg.updated_on)", "ASC");
      $this->db->order_by("month(trv_fpg.updated_on)", "ASC");  
      return $this->db->get()->result();	
   }
	function harvestedCropcount() {
      $this->db->select('trv_crop.crop_id,SUM(trv_crop.area) as total_area,trv_crop_name_master.name');
      $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.crop_id');
      $this->db->where(array('trv_crop.status'=>'1','YEAR(trv_crop.updated_on)'=>date('Y')));
      $this->db->group_by('trv_crop.area_uom,trv_crop.crop_id');
      $this->db->order_by("total_area", "DESC");      
      $this->db->from('trv_crop');
      $this->db->limit(10);
      return $this->db->get()->result_array();		
   }
   function farmingArea() {
      $this->db->select('SUM(Case When trv_crop.area_uom = 1 then trv_crop.area else (trv_crop.area *2.471) end) as total_area,YEAR(trv_crop.updated_on) as year,trv_state_master.state_code,trv_state_master.name as state_name,trv_crop.area_uom,trv_state_master.state_code');
      $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.crop_id');
      $this->db->join('trv_farmer', 'trv_farmer.id = trv_crop.farmer_id');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_farmer.state');
      $this->db->where(array('trv_crop.status'=>'1','YEAR(trv_crop.updated_on)'=>date('Y')));
      $this->db->group_by('trv_state_master.state_code');
      $this->db->order_by("total_area", "DESC");  
      $this->db->from('trv_crop');
      $this->db->limit(10);
      $result=$this->db->get()->result_array();
      return $result; 
   }
   
   function farmingPreviousyeararea() {
      $this->db->select('SUM(Case When trv_crop.area_uom = 1 then trv_crop.area else (trv_crop.area *2.471) end) as total_area,trv_state_master.name as state_name');
      $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.crop_id');
      $this->db->join('trv_farmer', 'trv_farmer.id = trv_crop.farmer_id');
      $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_farmer.state');
      $this->db->where(array('trv_crop.status'=>'1','YEAR(trv_crop.updated_on)'=>date('Y')-1));
      $this->db->group_by('trv_state_master.state_code');
      $this->db->order_by("total_area", "DESC");      
      $this->db->from('trv_crop');
      $this->db->limit(10);
      return $this->db->get()->result_array();
		
   }
   function yearlyHarvest() {
      $this->db->select('SUM(Case When trv_crop_harvest.qty_uom = 1 then trv_crop_harvest.output_qty else (trv_crop_harvest.output_qty *2.471) end) as total_output,trv_crop_harvest.qty_uom,trv_season_master.season as season_name');
      $this->db->join('trv_crop', 'trv_crop.variety_id = trv_crop_harvest.variety_id');
      $this->db->join('trv_season_master', 'trv_season_master.id = trv_crop.season_id');
      $this->db->where(array('trv_crop_harvest.status'=>'1','YEAR(trv_crop_harvest.date_of_harvest)'=>date('Y')));
      $this->db->group_by('trv_crop.season_id');
      $this->db->from('trv_crop_harvest');
      $result=$this->db->get()->result_array();	
      return  $result;
   }
   function previousYearharvest() {
      $this->db->select('SUM(Case When trv_crop_harvest.qty_uom = 1 then trv_crop_harvest.output_qty else (trv_crop_harvest.output_qty *2.471) end) as total_output,trv_crop_harvest.qty_uom,trv_season_master.season as season_name');
      $this->db->join('trv_crop', 'trv_crop.variety_id = trv_crop_harvest.variety_id');
      $this->db->join('trv_season_master', 'trv_season_master.id = trv_crop.season_id');
      $this->db->where(array('trv_crop_harvest.status'=>'1','YEAR(trv_crop_harvest.date_of_harvest)'=>date('Y')-1));
      $this->db->group_by('trv_crop.season_id');
      $this->db->from('trv_crop_harvest');
      $result=$this->db->get()->result_array();	
      return  $result;
   }
}

?>