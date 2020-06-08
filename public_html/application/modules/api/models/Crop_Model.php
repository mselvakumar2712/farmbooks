<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crop_Model extends CI_Model {
   function __construct() {
        parent::__construct();
        $this->load->database();
   }
    
   function cropList($farmer_id) {         
        $this->db->select('trv_crop.id, DATE_FORMAT(trv_crop.transplant_date, "%d/%m/%Y") transplant_date, DATE_FORMAT(trv_crop.expected_harvest_date, "%d/%m/%Y") expected_harvest_date, DATE_FORMAT(trv_crop.seedling_date, "%d/%m/%Y") seedling_date, trv_crop_variety_master.id AS variety_id, trv_crop_variety_master.variety AS variety_name, trv_crop_name_master.name AS crop_name, trv_village_master.name as village_name,trv_crop.crop_id');
        $this->db->from('trv_crop');
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.crop_id');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_crop.farmer_id');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_farmer.village', 'left');
        $this->db->where(array('trv_crop.farmer_id' => $farmer_id, 'trv_crop.status' => '1'));
        $this->db->order_by('trv_crop.transplant_date', 'DESC');
    	  return $this->db->get()->result();
   }
   
   function areaUom() {    
        $this->db->select('trv_uom_master.id, trv_uom_master.short_name, trv_uom_master.full_name');
        $this->db->from('trv_uom_master');
        $this->db->distinct();
        $this->db->where(array('trv_uom_master.uom_type' => '1','trv_uom_master.status' => '1'));
        return $this->db->get()->result();
   }
   
   function quantityUOM() {  
        $this->db->select('trv_uom_master.id, trv_uom_master.short_name, trv_uom_master.full_name');
        $this->db->from('trv_uom_master');
        $this->db->distinct();
        $this->db->where(array('trv_uom_master.uom_type' => '2','trv_uom_master.status' => '1'));
        return $this->db->get()->result();
   }
   
   function sale_quantityUOM() {  
        $this->db->select('trv_uom_master.id, trv_uom_master.short_name, trv_uom_master.full_name');
        $this->db->from('trv_uom_master');
        $this->db->distinct();
        $this->db->where('trv_uom_master.id in (25,17,20)');
        $this->db->where('trv_uom_master.status', '1');
        return $this->db->get()->result();
   }
   
   function classByVariety($variety_id) {  
        $this->db->select('trv_seed_master.id, trv_seed_master.class, trv_seed_master.category_id');
        $this->db->where(array('variety_id' => $variety_id, 'status' => '1'));
        $this->db->order_by("id", "desc");
		  $this->db->distinct();
        $this->db->from('trv_seed_master');
        return $this->db->get()->result();
    }
    
   function landIdentification($farmer_id) {  
		  $this->db->select('trv_land_identify.id, trv_land_identify.identification');
        $this->db->from('trv_land_identify');
		  $this->db->where(array('trv_land_identify.farmer_id' => $farmer_id));
        $this->db->distinct();
        return $this->db->get()->result();
   }
    
   function landAreaDetail($land_identify_id) {  
        $this->db->select('trv_land_identify.id as land_identify_id, trv_land_identify.measurement, trv_uom_master.id as uom_id, trv_uom_master.full_name AS uom_full_name');
        $this->db->from('trv_land_identify');
		  $this->db->distinct();
        $this->db->join('trv_uom_master', 'trv_uom_master.id = trv_land_identify.measurement_unit');
		  $this->db->where(array('trv_land_identify.id' => $land_identify_id));
        return $this->db->get()->result();
   }
   
   function expectedHarvestDate($transplant_date, $crop_id) {    
      $tenureDays = $this->getCropByName($crop_id)->tenure;
      $exp_harverst_date = date('d/m/Y',strtotime("+".$tenureDays." days", strtotime(str_replace('/', '-', $transplant_date) )));
      return $exp_harverst_date;
   }
   
   function getCropByName( $crop_name_id ) {    
		return $this->db->get_where('trv_crop_master', array('name_id' => $crop_name_id))->row();
	}
 
   function addCrop() {                                 
         $post_data = json_decode(file_get_contents('php://input'), true);
         $crop_details = array(	
	         'farmer_id'             => $post_data['farmer_id'],
				'land_id'               => $post_data['land_identify_id'],  
            'crop_type'             => $post_data['crop_type'],
            'category_id'           => $post_data['crop_category'],
            'subcategory_id'        => $post_data['crop_subcategory'],
            'crop_id'               => $post_data['crop_name'],
            'variety_id'            => $post_data['variety'],
            'class_id'              => ($post_data['class_id']) ? ($post_data['class_id']):"",
            'season_id'             => $post_data['season'],
            'is_direct_seeding'     => ($post_data['is_direct_seedling']) ? $post_data['is_direct_seedling']:"",
            'seedling_date'         => ($post_data['seedling_date'] != "")? explode("/",$post_data['seedling_date'])[2].'-'.explode("/",$post_data['seedling_date'])[1].'-'.explode("/",$post_data['seedling_date'])[0] : "0000-00-00",
            'transplant_date'       => ($post_data['transplant_date'] != "")? explode("/",$post_data['transplant_date'])[2].'-'.explode("/",$post_data['transplant_date'])[1].'-'.explode("/",$post_data['transplant_date'])[0] : "0000-00-00",
            'area'                  => $post_data['area'],
				'area_uom'              => $post_data['area_uom'],
            'seed_qty'              => $post_data['qty_used_seed'],
				'quantity_uom'          => $post_data['quantity_uom'],
            'seed_cost'             => $post_data['seed_cost'],
            'expected_harvest_date' => ($post_data['exp_harvest_date'] != "")? explode("/",$post_data['exp_harvest_date'])[2].'-'.explode("/",$post_data['exp_harvest_date'])[1].'-'.explode("/",$post_data['exp_harvest_date'])[0] : "0000-00-00",
             // 'image'              => ($img_data['file_name']) ? $img_data['file_name']:"",
            'status'                => 1,
            'updated_on'            => date('Y-m-d H:i:s'),
            'updated_by'            => ""
         );               
         $this->db->insert('trv_crop', $crop_details);
         $last_inserted_program_id = $this->db->insert_id();
         
         /*if (!empty($_FILES['crop_photo']['name'])) {	
            //$delete_files(asset_url("uploads/farmer/" . $user->user_avatar));		
            $config['upload_path'] = 'assets/uploads/newcrop_entry';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            // $config['max_size']	= 500;
            $config['encrypt_name']	= TRUE;				
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('crop_photo')) {					
               echo $this->upload->display_errors(); 
               return false;
            } 
            else {
               $img_data  = $this->upload->data();
               $photodetails = array(
                    'image' => $img_data['file_name']			                        
                );
                $this->db->update('trv_crop', $photodetails, array('id' => $last_inserted_program_id));             
            }	
        }*/ 
        
         $getrow = $this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' => $post_data['farmer_id'], 'trv_update_expense.crop_id' => $post_data['variety']))->from('trv_update_expense')->get()->row_array();
         if(!empty($getrow)){
               $cost_details = array(	
               'crop_id'               => $post_data['variety'],
               'seed_cost'             => $post_data['seed_cost'],
               'farmer_id'             => $post_data['farmer_id']
            );
            return $this->db->update('trv_update_expense', $cost_details,array('id' => $getrow['id']));
         }
         else {
            $cost_details = array(	
               'crop_id'               => $post_data['variety'],
               'seed_cost'             => $post_data['seed_cost'],
               'farmer_id'             => $post_data['farmer_id']
            );
            return $this->db->insert('trv_update_expense', $cost_details);
         }
   }
   
   function updateCrop() {          
        $post_data = json_decode(file_get_contents('php://input'), true);
        $crop_details = array(
            'farmer_id'             => $post_data['farmer_id'],
				'land_id'               => $post_data['land_identify_id'],  
            'crop_type'             => $post_data['crop_type'],
            'category_id'           => $post_data['crop_category'],
            'subcategory_id'        => $post_data['crop_subcategory'],
            'crop_id'               => $post_data['crop_name'],
            'variety_id'            => $post_data['variety'],
            'class_id'              => ($post_data['class_id']) ? ($post_data['class_id']):"",
            'season_id'             => $post_data['season'],
            'is_direct_seeding'     => ($post_data['is_direct_seedling']) ? $post_data['is_direct_seedling']:"",
            'seedling_date'         => ($post_data['seedling_date'] != "")? explode("/",$post_data['seedling_date'])[2].'-'.explode("/",$post_data['seedling_date'])[1].'-'.explode("/",$post_data['seedling_date'])[0] : "0000-00-00",
            'transplant_date'       => ($post_data['transplant_date'] != "")? explode("/",$post_data['transplant_date'])[2].'-'.explode("/",$post_data['transplant_date'])[1].'-'.explode("/",$post_data['transplant_date'])[0] : "0000-00-00",
            'area'                  => $post_data['area'],
				'area_uom'              => $post_data['area_uom'],
            'seed_qty'              => $post_data['qty_used_seed'],
				'quantity_uom'          => $post_data['quantity_uom'],
            'seed_cost'             => $post_data['seed_cost'],
            'expected_harvest_date' => ($post_data['exp_harvest_date'] != "")? explode("/",$post_data['exp_harvest_date'])[2].'-'.explode("/",$post_data['exp_harvest_date'])[1].'-'.explode("/",$post_data['exp_harvest_date'])[0] : "0000-00-00",
            // 'image'              => ($img_data['file_name']) ? $img_data['file_name']:"",
            'status'                => 1,
            'updated_on'            => date('Y-m-d H:i:s'),
            'updated_by'            => ""
        ); 
		  $this->db->update('trv_crop', $crop_details, array('id' => $post_data['crop_id']));

         /*if(!empty($_FILES['crop_photo']['name'])) {	        	
            $config['upload_path'] = 'assets/uploads/newcrop_entry';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name']	= TRUE;				
            $config['overwrite'] = TRUE;
           
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('crop_photo')) {					
             echo $this->upload->display_errors();
             return false;
            } else {
             $img_data  = $this->upload->data();
                  $photodetails = array(
                       'image' => $img_data['file_name']			                        
                   );
                $this->db->update('trv_crop', $photodetails, array('id' => $crop_id));             
            }	
         } */
         
         $getrow = $this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' => $post_data['farmer_id'], 'trv_update_expense.crop_id' => $post_data['variety']))->from('trv_update_expense')->get()->row_array();
         if(!empty($getrow)){
               $cost_details = array(	
               'crop_id'               => $post_data['variety'],
               'seed_cost'             => $post_data['seed_cost'],
               'farmer_id'             => $post_data['farmer_id']
            );
            return $this->db->update('trv_update_expense', $cost_details,array('id' => $getrow['id']));
         }
         else {
            $cost_details = array(	
               'crop_id'               => $post_data['variety'],
               'seed_cost'             => $post_data['seed_cost'],
               'farmer_id'             => $post_data['farmer_id']
            );
            return $this->db->insert('trv_update_expense', $cost_details);
         }
   }
   
   function cropByID($crop_id) {      $final_result = array();
		$this->db->select('tc.id,tc.farmer_id,tc.land_id,tli.identification as land_name,tc.crop_type,tc.variety_id,tcvm.variety as variety_name,tc.crop_id, tcnm.name as crop_name,tc.category_id, tccm.name as crop_category_name,tc.subcategory_id,tcscm.name as crop_subcategory_name,tc.class_id,tsem.name as class_name,tc.season_id,tsm.season as season_name,tc.is_direct_seeding, DATE_FORMAT(tc.seedling_date, "%d/%m/%Y") seedling_date, DATE_FORMAT(tc.transplant_date, "%d/%m/%Y") transplant_date, tc.area,tc.area_uom,tc.seed_qty,tc.quantity_uom,tc.seed_cost, DATE_FORMAT(tc.expected_harvest_date, "%d/%m/%Y") expected_harvest_date, tc.image,tc.status,tc.updated_by,tc.updated_on');
        $this->db->where(array('tc.id' => $crop_id, 'tc.status' => '1'));
        $this->db->from('trv_crop tc');
		$this->db->join('trv_crop_variety_master tcvm', 'tcvm.id = tc.variety_id', 'inner');
		$this->db->join('trv_land_identify tli', 'tc.land_id = tli.id', 'inner');
		$this->db->join('trv_crop_category_master tccm', 'tc.category_id = tccm.id', 'inner');
		$this->db->join('trv_crop_name_master tcnm', 'tc.crop_id = tcnm.id', 'inner');
		$this->db->join('trv_crop_sub_category_master tcscm', 'tc.subcategory_id = tcscm.id', 'inner');
		$this->db->join('trv_season_master tsm', 'tc.season_id = tsm.id', 'inner');
		$this->db->join('trv_crop_class_master tsem', 'tc.class_id = tsem.id', 'left');
		$result = $this->db->get()->result();            foreach($result as $obj) {           $obj->area_uom_value = $this->getUOM($obj->area_uom);           $obj->quantity_uom_value = $this->getUOM($obj->quantity_uom);           $final_result[] = $obj;      }      return $final_result;   }
    
   function updateCropList($farmer_id) {         
        $this->db->select('trv_update_crop.id, trv_update_crop.update_type, trv_update_crop.process_date, trv_update_crop.dosage, trv_update_crop.qty, trv_update_crop.process_cost, trv_crop_variety_master.variety AS variety_name, trv_brand_master.name AS brandname, trv_uom_master.short_name AS uom_short_name, trv_uom_master.full_name AS uom_full_name');
        $this->db->from('trv_update_crop');
		  $this->db->distinct();
 		  $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_update_crop.variety_id');
		  $this->db->join('trv_brand_master', 'trv_brand_master.id = trv_update_crop.brand_name', 'left');
		  $this->db->join('trv_uom_master', 'trv_uom_master.id = trv_update_crop.qty_uom');
		  $this->db->where(array('trv_update_crop.farmer_id' => $farmer_id, 'trv_update_crop.status' => 1));
        $this->db->order_by('trv_update_crop.id', 'DESC');
        return $this->db->get()->result(); 
   }
   
   function updateCropVariety($farmer_id) {  
        $cropid = $this->db->select('variety_id')->from('trv_crop_harvest')->where(array('status' => 1, 'farmer_id' => $farmer_id))->get()->result(); 
        $this->db->select('trv_crop.id, trv_crop.variety_id, trv_crop_variety_master.variety AS variety_name');
        $this->db->from('trv_crop');
		  $this->db->distinct();
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
		  $this->db->where(array('trv_crop.farmer_id' => $farmer_id, 'trv_crop.status' => '1'));
         if(!empty($cropid)){
            foreach($cropid as $cropids)
               $excluded[] = $cropids->variety_id;
            $this->db->where_not_in('trv_crop.variety_id', $excluded);
         }
         return $this->db->get()->result();
   }
   
   function nutrientDropdownList() {  
        $this->db->select('trv_nutrient_master.id, trv_nutrient_master.nutrient_type, trv_nutrient_master.name');
        $this->db->from('trv_nutrient_master');
        $this->db->where(array('trv_nutrient_master.status' => '1'));
        return $this->db->get()->result();
   }
   
   function fertilizerDropdownList() {  
        $this->db->select('trv_fertilizer_master.id, trv_fertilizer_master.fertilizer_type, trv_fertilizer_master.name');
        $this->db->from('trv_fertilizer_master');
        $this->db->where(array('trv_fertilizer_master.status' => '1'));
        return $this->db->get()->result();
   }
   
   function pesticideDropdownList() {  
        $this->db->select('trv_pesticide_master.id, trv_pesticide_master.pesticide_type, trv_pesticide_master.name');
        $this->db->from('trv_pesticide_master');
        $this->db->where(array('trv_pesticide_master.status' => '1'));
        return $this->db->get()->result();
   }
   
   function cropnutrientmasterDropdownList($nutrient_id) { 
		  $this->db->select('trv_brand_master.id,trv_brand_master.name,trv_brand_master.product');
        $this->db->from('trv_brand_master');
		  $this->db->where(array('trv_brand_master.product' => $nutrient_id, 'trv_brand_master.type_id' => 2,'trv_brand_master.status' => 1));
        return $this->db->get()->result();
   }
   
   function cropfertilizermasterDropdownList($fertilizer_id) { 
		  $this->db->select('trv_brand_master.id,trv_brand_master.name,trv_brand_master.product');
        $this->db->from('trv_brand_master');
		  $this->db->where(array('trv_brand_master.product' => $fertilizer_id, 'trv_brand_master.type_id' => 1,'trv_brand_master.status' => 1));
        return $this->db->get()->result();
   }
   
   function croppesticidemasterDropdownList($pesticide_id) { 
		  $this->db->select('trv_brand_master.id,trv_brand_master.name,trv_brand_master.product');
        $this->db->from('trv_brand_master');
		  $this->db->where(array('trv_brand_master.product' => $pesticide_id, 'trv_brand_master.type_id' => 3,'trv_brand_master.status' => 1));
        return $this->db->get()->result();
   }
      
   function varietydosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->distinct();
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '1','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			return $query;
   }
   
   function fertilizerdosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '2','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			return $query;
   }
   
   function pesticidedosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->distinct();
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '3','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			return $query;
   }
   
   function weedingdosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '4','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			return $query;
   }
   
   function add_updatecrop() {
        /* Based on crop type vaues are given */
        $post_data = json_decode(file_get_contents('php://input'), true);  
        if($post_data['update_type'] == 1) {            
            $variety_id     = $post_data['nutrient_variety'];
				$name  = $post_data['nutrient_name'];
            $process_date   = ($post_data['nutrient_dosage_date'] != "")? explode("/",$post_data['nutrient_dosage_date'])[2].'-'.explode("/",$post_data['nutrient_dosage_date'])[1].'-'.explode("/",$post_data['nutrient_dosage_date'])[0] : "0000-00-00";
            $dosage         = ($post_data['nutrient_dosage'])?$post_data['nutrient_dosage']:"";
            $qty            = $post_data['nutrient_quantity'];
				$qty_uom        = $post_data['nutrient_quantity_uom'];
				$brand_name     = $post_data['nutrient_brand_name'];
            //$brand_name     = implode(',', $post_data['nutrient_brand_name']);
            $process_cost   = ($post_data['cost_of_nutrient'])?$post_data['cost_of_nutrient']:"";
            
            $feed_type="";$weed_type="";$man_days="";$machine_hours="";
                        
        } else if($post_data['update_type'] == 2) {            
            $name 		 = $post_data['fertilizer_name'];
            $variety_id     		 = $post_data['fertilizer_variety'];
            $process_date         = ($post_data['fertilizer_dosage_date'] != "")? explode("/",$post_data['fertilizer_dosage_date'])[2].'-'.explode("/",$post_data['fertilizer_dosage_date'])[1].'-'.explode("/",$post_data['fertilizer_dosage_date'])[0] : "0000-00-00";
            $dosage         		 = ($post_data['fertilizer_dosage'])?$post_data['fertilizer_dosage']:"";
            $feed_type     		 = $post_data['fertilizer_feed_type'];
            $qty           		 = $post_data['fertilizer_quantity'];
				$qty_uom        		 = $post_data['fertilizer_quantity_uom'];
				$brand_name = $post_data['fertilizer_brand_name'];
            $process_cost   = ($post_data['cost_of_fertilizer'])?$post_data['cost_of_fertilizer']:"";
            
            $weed_type="";$man_days="";$machine_hours="";
        } else if($post_data['update_type'] == 3) {
            $name 		          = $post_data['pesticide_name'];
            $variety_id     		 = $post_data['pesticide_variety'];
            $process_date         = ($post_data['pesticide_dosage_date'] != "")? explode("/",$post_data['pesticide_dosage_date'])[2].'-'.explode("/",$post_data['pesticide_dosage_date'])[1].'-'.explode("/",$post_data['pesticide_dosage_date'])[0] : "0000-00-00";
            $dosage        		 = ($post_data['pesticide_dosage'])?$post_data['pesticide_dosage']:"";
            $feed_type     		 = $post_data['pesticide_feed_type'];
            $qty           	    = $post_data['pesticide_quantity'];
				$qty_uom              = $post_data['pesticide_quantity_uom'];
				$brand_name = $post_data['pesticide_brand_name'];
            //$brand_name     = implode(',', $post_data['pesticide_brand_name']);
            $process_cost   = ($post_data['cost_of_pesticide'])?$post_data['cost_of_pesticide']:"";
            
            $weed_type="";$man_days="";$machine_hours="";
        } else {
            if($post_data['type_weeding'] == 3) {

                $brand_nameData = $post_data['weeding_brand_name'];
            } else {
                $brand_nameData = "";
            }
            //$crop_id        = $post_data['weeding_crop'];
            $variety_id     = $post_data['weeding_variety'];
            $process_date   = ($post_data['weeding_dosage_date'] != "")? explode("/",$post_data['weeding_dosage_date'])[2].'-'.explode("/",$post_data['weeding_dosage_date'])[1].'-'.explode("/",$post_data['weeding_dosage_date'])[0] : "0000-00-00";
            $dosage         = ($post_data['weeding_dosage'])?$post_data['weeding_dosage']:"";
            $qty            = $post_data['weeding_quantity'];
				$qty_uom        = $post_data['weeding_quantity_uom'];
            $brand_name     = $post_data['weeding_brand_name'];
            $name="";
            $weed_type      = $post_data['type_weeding'];
            $man_days       = $post_data['weeding_no_of_man'];
            $machine_hours  = $post_data['weeding_machine_hrs'];
            $process_cost   = ($post_data['cost_of_weeding'])?$post_data['cost_of_weeding']:"";
            $feed_type="";
        }
        
        $crop_details = array(
			  'farmer_id'        => $post_data['farmer_id'],	
	        'update_type'        => $post_data['update_type'],
           'name'               => $name,
			 'crop_id'            => $post_data['crop_id'],
           'variety_id'         => $variety_id,
           'process_date'       => $process_date,
           'brand_name'         => $brand_name,
           'dosage'             => $dosage,
           'feed_type'          => $feed_type,
           'qty'                => $qty,
			  'qty_uom'            => $qty_uom,
           'weed_type'          => $weed_type,
           'man_days'           => $man_days,
           'machine_hours'      => $machine_hours,
           'process_cost'       => $process_cost,
           'status'             => 1,
           'updated_on'         => date('Y-m-d H:i:s'),
           'updated_by'         => ""
         );
        $this->db->insert('trv_update_crop', $crop_details);
          
        $getrow=$this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' =>$post_data['farmer_id'] ,'trv_update_expense.crop_id'=>  $variety_id))->from('trv_update_expense')->get()->row_array();
        
        if(!empty($getrow)){
           $cost_details = array(	
               'crop_id'               => $variety_id,  
               'farmer_id'             => $post_data['farmer_id'],
               'nutrient_cost'         => !empty($post_data['cost_of_nutrient']) ? $post_data['cost_of_nutrient'] : 0,
               'fertilizer_cost'       => !empty($post_data['cost_of_fertilizer']) ? $post_data['cost_of_fertilizer'] : 0,
               'pesticide_cost'        => !empty($post_data['cost_of_pesticide']) ? $post_data['cost_of_pesticide'] : 0,
               'weeding_cost'          => !empty($post_data['cost_of_weeding']) ? $post_data['cost_of_weeding'] : 0,
            );
           return $this->db->update('trv_update_expense', $cost_details,array('id' => $getrow['id']));
         }
         else {
            $cost_details = array(	
            'crop_id'               => $variety_id,  
            'farmer_id'             => $post_data['farmer_id'],
            'nutrient_cost'         => !empty($post_data['cost_of_nutrient']) ? $post_data['cost_of_nutrient'] : 0,
				'fertilizer_cost'       => !empty($post_data['cost_of_fertilizer']) ? $post_data['cost_of_fertilizer'] : 0,
				'pesticide_cost'        => !empty($post_data['cost_of_pesticide']) ? $post_data['cost_of_pesticide'] : 0,
				'weeding_cost'          => !empty($post_data['cost_of_weeding']) ? $post_data['cost_of_weeding'] : 0,
           
            );
            return $this->db->insert('trv_update_expense', $cost_details);
        }
   }
   
   function upateCropByCropID($updatecrop_id) {        $final_result = array();        $this->db->select('`tuc`.*,DATE_FORMAT(tuc.process_date, "%d/%m/%Y") as `process_date`, `tcvm`.`variety` AS `variety_name`,tcnm.name as crop_name');         $this->db->where(array('tuc.id' => $updatecrop_id, 'tuc.status' => '1'));        $this->db->from('trv_update_crop tuc');        $this->db->join('trv_crop_variety_master tcvm', 'tcvm.id = tuc.variety_id');        $this->db->join('trv_crop_name_master tcnm', 'tuc.crop_id = tcnm.id');        $result = $this->db->get()->result();        foreach($result as $obj) {           $obj->name_value = '';           $obj->brand_name_value = '';           $obj->qty_uom_value = $this->getUOM($obj->qty_uom);           if($obj->update_type == 1) {               $query = $this->db->query("SELECT name FROM trv_nutrient_master WHERE id = '".$obj->name."'");               if($query->num_rows() >0) {                  $row = $query->row();                  $obj->name_value = $row->name;               }                             $query = $this->db->query("SELECT name FROM trv_brand_master WHERE product = '".$obj->brand_name."' AND type_id = 2");               if($query->num_rows() >0) {                  $row = $query->row();                  $obj->brand_name_value = $row->name;               }           }           else if($obj->update_type == 2) {               $query = $this->db->query("SELECT name FROM trv_fertilizer_master WHERE id = '".$obj->name."'");               if($query->num_rows() >0) {                  $row = $query->row();                  $obj->name_value = $row->name;               }                             $query = $this->db->query("SELECT name FROM trv_brand_master WHERE product = '".$obj->brand_name."' AND type_id = 1");               if($query->num_rows() >0) {                  $row = $query->row();                  $obj->brand_name_value = $row->name;               }           }           else if($obj->update_type == 3) {               $query = $this->db->query("SELECT name FROM trv_pesticide_master WHERE id = '".$obj->name."'");               if($query->num_rows() >0) {                  $row = $query->row();                  $obj->name_value = $row->name;               }                             $query = $this->db->query("SELECT name FROM trv_brand_master WHERE product = '".$obj->brand_name."' AND type_id = 3");               if($query->num_rows() >0) {                  $row = $query->row();                  $obj->brand_name_value = $row->name;               }           }           else if($obj->update_type == 4) {              $query = $this->db->query("SELECT name FROM trv_pesticide_master WHERE id = '".$obj->brand_name."'");              if($query->num_rows() >0) {                  $row = $query->row();                  $obj->brand_name_value = $row->name;              }           }                                 $final_result[] = $obj;        }        return $final_result;   }
   function updateCropPost() {
        $post_data = json_decode(file_get_contents('php://input'), true);  
        if($post_data['update_type'] == 1) {            
            $variety_id     = $post_data['nutrient_variety'];
				$name  = $post_data['nutrient_name'];
            $process_date   = ($post_data['nutrient_dosage_date'] != "")? explode("/",$post_data['nutrient_dosage_date'])[2].'-'.explode("/",$post_data['nutrient_dosage_date'])[1].'-'.explode("/",$post_data['nutrient_dosage_date'])[0] : "0000-00-00";
            $dosage         = ($post_data['nutrient_dosage'])?$post_data['nutrient_dosage']:"";
            $qty            = $post_data['nutrient_quantity'];
				$qty_uom        = $post_data['nutrient_quantity_uom'];
				$brand_name     = $post_data['nutrient_brand_name'];
            $process_cost   = ($post_data['cost_of_nutrient'])?$post_data['cost_of_nutrient']:"";
            
            $feed_type="";$weed_type="";$man_days="";$machine_hours="";
                        
        } else if($post_data['update_type'] == 2) {            
            $name 		 = $post_data['fertilizer_name'];
            $variety_id     		 = $post_data['fertilizer_variety'];
            $process_date         = ($post_data['fertilizer_dosage_date'] != "")? explode("/",$post_data['fertilizer_dosage_date'])[2].'-'.explode("/",$post_data['fertilizer_dosage_date'])[1].'-'.explode("/",$post_data['fertilizer_dosage_date'])[0] : "0000-00-00";
            $dosage         		 = ($post_data['fertilizer_dosage'])?$post_data['fertilizer_dosage']:"";
            $feed_type     		 = $post_data['fertilizer_feed_type'];
            $qty           		 = $post_data['fertilizer_quantity'];
				$qty_uom        		 = $post_data['fertilizer_quantity_uom'];
				$brand_name = $post_data['fertilizer_brand_name'];
            $process_cost   = ($post_data['cost_of_fertilizer'])?$post_data['cost_of_fertilizer']:"";
            
            $weed_type="";$man_days="";$machine_hours="";
        } else if($post_data['update_type'] == 3) {
            $name 		          = $post_data['pesticide_name'];
            $variety_id     		 = $post_data['pesticide_variety'];
            $process_date         = ($post_data['pesticide_dosage_date'] != "")? explode("/",$post_data['pesticide_dosage_date'])[2].'-'.explode("/",$post_data['pesticide_dosage_date'])[1].'-'.explode("/",$post_data['pesticide_dosage_date'])[0] : "0000-00-00";
            $dosage        		 = ($post_data['pesticide_dosage'])?$post_data['pesticide_dosage']:"";
            $feed_type     		 = $post_data['pesticide_feed_type'];
            $qty           	    = $post_data['pesticide_quantity'];
				$qty_uom              = $post_data['pesticide_quantity_uom'];
				$brand_name           = $post_data['pesticide_brand_name'];
            $process_cost   = ($post_data['cost_of_pesticide'])?$post_data['cost_of_pesticide']:"";
            
            $weed_type="";$man_days="";$machine_hours="";
        } else {
            if($post_data['type_weeding'] == 3) {

                $brand_nameData = $post_data['weeding_brand_name'];
            } else {
                $brand_nameData = "";
            }
            $variety_id     = $post_data['weeding_variety'];
            $process_date   = ($post_data['weeding_dosage_date'] != "")? explode("/",$post_data['weeding_dosage_date'])[2].'-'.explode("/",$post_data['weeding_dosage_date'])[1].'-'.explode("/",$post_data['weeding_dosage_date'])[0] : "0000-00-00";
            $dosage         = ($post_data['weeding_dosage'])?$post_data['weeding_dosage']:"";
            $qty            = $post_data['weeding_quantity'];
				$qty_uom        = $post_data['weeding_quantity_uom'];
            $brand_name     = $post_data['weeding_brand_name'];
            $name="";
            $weed_type      = $post_data['type_weeding'];
            $man_days       = $post_data['weeding_no_of_man'];
            $machine_hours  = $post_data['weeding_machine_hrs'];
            $process_cost   = ($post_data['cost_of_weeding'])?$post_data['cost_of_weeding']:"";
            $feed_type="";
        }
        
        $crop_details = array(
			  'farmer_id'          => $post_data['farmer_id'],	
	        'update_type'        => $post_data['update_type'],
           'name'               => $name,
           'variety_id'         => $variety_id,
           'process_date'       => $process_date,
           'brand_name'         => $brand_name,
           'dosage'             => $dosage,
           'feed_type'          => $feed_type,
           'qty'                => $qty,
			  'qty_uom'            => $qty_uom,
           'weed_type'          => $weed_type,
           'man_days'           => $man_days,
           'machine_hours'      => $machine_hours,
           'process_cost'       => $process_cost,
           'status'             => 1,
           'updated_on'         => date('Y-m-d H:i:s'),
           'updated_by'         => ""
         );
        $this->db->update('trv_update_crop', $crop_details, array('id' => $post_data['updatecrop_id']));
       
        $getrow = $this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' =>$post_data['farmer_id'] ,'trv_update_expense.crop_id'=>  $variety_id))->from('trv_update_expense')->get()->row_array();
        
        if(!empty($getrow)){
            $cost_details = array(	
               'crop_id'               => $post_data['updatecrop_id'],
               'farmer_id'             => $post_data['farmer_id'],
               'nutrient_cost'         => !empty($post_data['cost_of_nutrient']) ? $post_data['cost_of_nutrient'] : 0,
               'fertilizer_cost'       => !empty($post_data['cost_of_fertilizer']) ? $post_data['cost_of_fertilizer'] : 0,
               'pesticide_cost'        => !empty($post_data['cost_of_pesticide']) ? $post_data['cost_of_pesticide'] : 0,
               'weeding_cost'          => !empty($post_data['cost_of_weeding']) ? $post_data['cost_of_weeding'] : 0,
            );
           return $this->db->update('trv_update_expense', $cost_details, array('id' => $getrow['id']));
         }
         else {
            $cost_details = array(	
               'crop_id'               => $post_data['updatecrop_id'],
               'farmer_id'             => $post_data['farmer_id'],
               'nutrient_cost'         => !empty($post_data['cost_of_nutrient']) ? $post_data['cost_of_nutrient'] : 0,
               'fertilizer_cost'       => !empty($post_data['cost_of_fertilizer']) ? $post_data['cost_of_fertilizer'] : 0,
               'pesticide_cost'        => !empty($post_data['cost_of_pesticide']) ? $post_data['cost_of_pesticide'] : 0,
               'weeding_cost'          => !empty($post_data['cost_of_weeding']) ? $post_data['cost_of_weeding'] : 0,
            );
            return $this->db->insert('trv_update_expense', $cost_details);
        }
   }
    
   function cropHarvestList($farmer_id) {                 $final_result = array();
         $this->db->select('trv_crop_harvest.*,DATE_FORMAT(trv_crop_harvest.date_of_harvest, "%d/%m/%Y") as `date_of_harvest`, trv_crop_variety_master.variety AS variety_name,trv_farmer.profile_name AS profile_name');
         $this->db->from('trv_crop_harvest');
         $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop_harvest.variety_id');
         $this->db->join('trv_farmer', 'trv_farmer.id = trv_crop_harvest.farmer_id');
         $this->db->where(array('trv_crop_harvest.status' => 1, 'trv_crop_harvest.farmer_id' => $farmer_id));
         $result = $this->db->get()->result();         foreach($result as $obj) {           $obj->qty_uom_value = $this->getUOM($obj->qty_uom);           $obj->sales_qty_uom_value = $this->getUOM($obj->sales_qty_uom);           $obj->output_quality_value = "";           if($obj->output_quality == 1) {              $obj->output_quality_value = "Very Good";           }           else if($obj->output_quality == 2) {              $obj->output_quality_value = "Good";           }           else if($obj->output_quality == 3) {              $obj->output_quality_value = "Satisfactory";           }           else if($obj->output_quality == 4) {              $obj->output_quality_value = "Poor";           }           $final_result[] = $obj;         }         return $final_result;
   }

   function cropHarvestVariety($farmer_id) {        
        return $this->updateCropVariety($farmer_id);
   }
   
   function outputmasterDropdownList($variety_id) {
        $this->db->select('trv_crop_master.id, trv_crop_master.variety_id, trv_crop_master.crop_output, trv_crop_name_master.name AS output_name');
        $this->db->from('trv_crop_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_master.name_id');
        $this->db->where(array('trv_crop_master.variety_id' => $variety_id,'trv_crop_master.status' => '1'));
        return $this->db->get()->result();
   } 
   
   function cropharvest() {
      $post_data = json_decode(file_get_contents('php://input'), true);  
      $crop_details = array( 
         'farmer_id'         => $post_data['farmer_id'],
         'variety_id'        => $post_data['crop_variety'],
         'date_of_harvest'   => ($post_data['harvest_date'] != "")? explode("/",$post_data['harvest_date'])[2].'-'.explode("/",$post_data['harvest_date'])[1].'-'.explode("/",$post_data['harvest_date'])[0] : "0000-00-00",
         'output'            => $post_data['output_product'],
         'output_qty'        => $post_data['output_qty'],
         'qty_uom'           => $post_data['output_quantity_uom'],
         'harvest_method'    => $post_data['harvest_method'],
         'man_days'          => ($post_data['man_days'])?$post_data['man_days']:"",
         'no_of_hours'       => ($post_data['no_of_hours'])?$post_data['no_of_hours']:"",
         'harvest_cost'      => $post_data['harvest_cost'],
         'output_quality'    => $post_data['output_quality'],
         'sales_available'   => $post_data['sales_available'],
         'qty_sales'         => $post_data['sales_qty'],
         'sales_qty_uom'     => $post_data['sales_qty_uom'],
         'status'            => 1,
         'updated_on'        => date('Y-m-d H:i:s'),
         'updated_by'        => ""
      );  
      $this->db->insert('trv_crop_harvest', $crop_details);
    
      $getrow = $this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' => $post_data['farmer_id'], 'trv_update_expense.crop_id' => $post_data['crop_variety']))->from('trv_update_expense')->get()->row_array();
      if(!empty($getrow)){
            $cost_details = array(	
            'crop_id'               => $post_data['crop_variety'],
            'harvesting_cost'       => $post_data['harvest_cost'],
            'farmer_id'             => $post_data['farmer_id']
         );
         return $this->db->update('trv_update_expense', $cost_details, array('id' => $getrow['id']));
      }
      else {
         $cost_details = array(	
            'crop_id'               => $post_data['crop_variety'],
            'harvesting_cost'       => $post_data['harvest_cost'],
            'farmer_id'             => $post_data['farmer_id']
         );
         return $this->db->insert('trv_update_expense', $cost_details);
      }
      return  true;
	} 
   
   function viewCropHarvest($crop_harvest_id) {     $final_result = array();     $this->db->select('trv_crop_harvest.*, trv_crop_variety_master.variety AS variety_name');      $this->db->where(array('trv_crop_harvest.id' => $crop_harvest_id, 'trv_crop_harvest.status' => '1'));     $this->db->from('trv_crop_harvest');     $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop_harvest.variety_id');     $result = $this->db->get()->result();     foreach($result as $obj) {           $obj->qty_uom_value = $this->getUOM($obj->qty_uom);           $obj->sales_qty_uom_value = $this->getUOM($obj->sales_qty_uom);           $final_result[] = $obj;      }      return $final_result;   }
   
   function cropHarvestPost() {
      $post_data = json_decode(file_get_contents('php://input'), true);  
      $crop_details = array( 
         'farmer_id'         => $post_data['farmer_id'],
         'variety_id'        => $post_data['crop_variety'],
         'date_of_harvest'   => ($post_data['harvest_date'] != "")? explode("/",$post_data['harvest_date'])[2].'-'.explode("/",$post_data['harvest_date'])[1].'-'.explode("/",$post_data['harvest_date'])[0] : "0000-00-00",
         'output'            => $post_data['output_product'],
         'output_qty'        => $post_data['output_qty'],
         'qty_uom'           => $post_data['output_quantity_uom'],
         'harvest_method'    => $post_data['harvest_method'],
         'man_days'          => ($post_data['man_days'])?$post_data['man_days']:"",
         'no_of_hours'       => ($post_data['no_of_hours'])?$post_data['no_of_hours']:"",
         'harvest_cost'      => $post_data['harvest_cost'],
         'output_quality'    => $post_data['output_quality'],
         'sales_available'   => $post_data['sales_available'],
         'qty_sales'         => $post_data['sales_qty'],
         'sales_qty_uom'     => $post_data['sales_qty_uom'],
         'status'            => 1,
         'updated_on'        => date('Y-m-d H:i:s'),
         'updated_by'        => ""
      );  
      $this->db->update('trv_crop_harvest', $crop_details, array('id' => $post_data['crop_harvest_id']));
    
      $getrow = $this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' => $post_data['farmer_id'], 'trv_update_expense.crop_id' => $post_data['crop_variety']))->from('trv_update_expense')->get()->row_array();
      if(!empty($getrow)){
            $cost_details = array(	
            'crop_id'               => $post_data['crop_variety'],
            'harvesting_cost'       => $post_data['harvest_cost'],
            'farmer_id'             => $post_data['farmer_id']
         );
         return $this->db->update('trv_update_expense', $cost_details, array('id' => $getrow['id']));
      }
      else {
         $cost_details = array(	
            'crop_id'               => $post_data['crop_variety'],
            'harvesting_cost'       => $post_data['harvest_cost'],
            'farmer_id'             => $post_data['farmer_id']
         );
         return $this->db->insert('trv_update_expense', $cost_details);
      }
      return  true;
	}
   function getCropVariety($farmer_id) {          $this->db->select('trv_crop_harvest.id, trv_crop_harvest.variety_id, trv_crop_harvest.farmer_id, trv_crop_variety_master.variety AS variety_name');        $this->db->from('trv_crop_harvest');		  $this->db->distinct();        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id =  trv_crop_harvest.variety_id');		  $this->db->where(array('trv_crop_harvest.farmer_id' => $farmer_id,'trv_crop_harvest.status' => '1'));        return $this->db->get()->result();   } 
   function postHarvestList($farmer_id) {         $final_result = array();
        $this->db->select('trv_post_harvest.*, trv_crop_variety_master.variety AS crop_name');
        $this->db->from('trv_post_harvest');
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_post_harvest.crop_input_id');
        $this->db->join('trv_post_harvest_master', 'trv_post_harvest_master.crop_id = trv_post_harvest.crop_id');
        $this->db->where(array('trv_post_harvest.status' => 1, 'trv_post_harvest.farmer_id' => $farmer_id));                
        $this->db->group_by('trv_post_harvest.id');
        $result = $this->db->get()->result();        
        foreach($result as $obj) {           
            $obj->crop_input_name = '';           
            $query = $this->db->query("SELECT crop_output FROM trv_crop_master WHERE variety_id = '".$obj->crop_input_id."'");           
            if($query->num_rows() >0) {              
                $row = $query->row();              
                $obj->crop_input_name = $row->crop_output;
            }           
            $obj->input_qty_uom_value = $this->getUOM($obj->input_qty_uom);           
            $obj->output_qty_uom_value = $this->getUOM($obj->output_qty_uom);           
            $obj->sales_qty_uom_value = $this->getUOM($obj->sales_qty_uom);           
            $final_result[] = $obj;
        }        
        return $final_result;   
       
   }
   
   function inputmasterDropdownList($variety_id) {
        $this->db->select('trv_crop_master.id,trv_crop_master.name_id, trv_crop_master.variety_id,trv_crop_master.crop_output, trv_crop_name_master.name AS output_name');
        $this->db->from('trv_crop_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_master.name_id');
        $this->db->where(array('trv_crop_master.variety_id' => $variety_id,'trv_crop_master.status' => '1'));
        return $this->db->get()->result();
   }
   
   function outputDropdownList($input_id) {		
        $this->db->select('trv_crop_harvest.*, trv_post_harvest_master.output_product AS output_name');
        $this->db->from('trv_crop_harvest');
        $this->db->join('trv_post_harvest_master', 'trv_post_harvest_master.crop_id = trv_crop_harvest.variety_id');
        $this->db->where(array('trv_crop_harvest.variety_id' => $input_id,'trv_crop_harvest.status' => '1'));        
        return $this->db->get()->result();		     
   }
    
   function postharvest() {
         $post_data = json_decode(file_get_contents('php://input'), true);
         //$output_details = $post_data['output_details'];

         if($post_data['sale_available'] == 1) {
            $sale_available = $post_data['sale_available'];
            //$sales_details = $post_data['sales_details'];
         } 
         //for($i=0;$i<count($output_details);$i++){
            $crop_details = array(
               'farmer_id'            => $post_data['farmer_id'],		  
               'process_date'         => ($post_data['date'] != "")? explode("/",$post_data['date'])[2].'-'.explode("/",$post_data['date'])[1].'-'.explode("/",$post_data['date'])[0] : "0000-00-00",
               'crop_id'              => $post_data['variety'],
               'work_type'            => $post_data['type_of_work'],
               'crop_input_id'        => $post_data['input'],
               'input_qty'            => $post_data['input_qty'],
               'input_qty_uom'        => $post_data['input_qty_uom'],
               'output_product'       => $post_data['output_product'],
               'output_qty'           => $post_data['output_qty'],
               'output_qty_uom'       => $post_data['output_qty_uom'],
               'post_harvesting_cost' => $post_data['cost_post_harvesting'],
               'sale_available'       => $sale_available,
               'status'               => 1,
               'updated_on'           => date('Y-m-d H:i:s'),
               'updated_by'           => "",
            );
            
            if($post_data['sale_available'] == 1) {
               $crop_details['qty_for_sale'] = $post_data['sales_qty'];
               $crop_details['sales_qty_uom'] = $post_data['sales_qty_uom'];
            }
            else {
               $crop_details['qty_for_sale'] = "";
               $crop_details['sales_qty_uom'] = "";
            }
                 
            $this->db->insert('trv_post_harvest', $crop_details);
            
            $crop_details = array(	
               'crop_id'               => $post_data['variety'],
               'work_type'             => $post_data['type_of_work'],
               'output_product'        => $post_data['output_product'],
               'input_product'         => $post_data['input'],
               'updated_by'         	=> "",
            );
            $this->db->insert('trv_post_harvest_master', $crop_details); 
         //}
         
         $getrow = $this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' => $post_data['farmer_id'], 'trv_update_expense.crop_id' => $post_data['variety']))->from('trv_update_expense')->get()->row_array();
         if(!empty($getrow)){
               $cost_details = array(	
               'crop_id'               => $post_data['variety'],
               'post_harvesting_cost'  => $post_data['cost_post_harvesting'],
               'farmer_id'             => $post_data['farmer_id']
            );
            return $this->db->update('trv_update_expense', $cost_details, array('id' => $getrow['id']));
         }
         else {
            $cost_details = array(	
               'crop_id'               => $post_data['variety'],
               'post_harvesting_cost'  => $post_data['cost_post_harvesting'],
               'farmer_id'             => $post_data['farmer_id']
            );
            return $this->db->insert('trv_update_expense', $cost_details);
         }
            
         return true;
   }
   
   function viewPostHarvest($postharvest_id) {      
        $final_result = array();          $this->db->select('trv_post_harvest.*, GROUP_CONCAT(trv_post_harvest.id ) as harvestid, trv_crop_variety_master.variety AS crop_name');        $this->db->from('trv_post_harvest');		        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_post_harvest.crop_id');        $this->db->where(array('trv_post_harvest.id' => $postharvest_id, 'trv_post_harvest.status' => '1'));        $result = $this->db->get()->result();        foreach($result as $obj) {           $obj->crop_input_name = '';           $query = $this->db->query("SELECT crop_output FROM trv_crop_master WHERE variety_id = '".$obj->crop_input_id."'");           if($query->num_rows() >0) {              $row = $query->row();              $obj->crop_input_name = $row->crop_output;           }           $obj->input_qty_uom_value = $this->getUOM($obj->input_qty_uom);           $obj->output_qty_uom_value = $this->getUOM($obj->output_qty_uom);           $obj->sales_qty_uom_value = $this->getUOM($obj->sales_qty_uom);           $final_result[] = $obj;        }        return $final_result;	
   }
   
   function worktypeDropdownList() {
        $this->db->select('trv_post_harvest_type.id, trv_post_harvest_type.name');
        $this->db->from('trv_post_harvest_type');
        $this->db->distinct();
        $this->db->where(array('trv_post_harvest_type.status' => '1'));
        return $this->db->get()->result();
    }
    function getUOM($id) {
       $query = $this->db->query("SELECT short_name, full_name FROM trv_uom_master WHERE id = '".$id."'");
       if($query->num_rows() >0) {
          $row = $query->row();         return $row->short_name;      
       }      
       else {
          return "";      
       }   
    } 

    function cropclassDropdownList() {
        $this->db->select('trv_crop_class_master.id, trv_crop_class_master.name');
        $this->db->from('trv_crop_class_master');
        $this->db->where(array('trv_crop_class_master.status' => '1'));
        return $this->db->get()->result();
    }
    
    function zofarminglist($post_data) {
        $this->db->select('photo_video_id,photo_video_title, photo_video_desc,photo_video_link');
        $this->db->from('fpo_org_zb');
		$this->db->where(array('fpo_org_zb.photo_video_lang' => $post_data['language'], 'fpo_org_zb.photo_video_type' => $post_data['photo'], 'fpo_org_zb.is_organic' => $post_data['is_organic']));
		$this->db->where('photo_video_id not in (10000,10001,10002)');
        return $this->db->get()->result();
    }
	
	function zofarmingintrolist($post_data) {
        $this->db->select('photo_video_id,photo_video_title, photo_video_desc,photo_video_link');
        $this->db->from('fpo_org_zb');
		$this->db->where(array('fpo_org_zb.photo_video_lang' => $post_data['language'], 'fpo_org_zb.is_organic' => $post_data['is_organic']));
		$this->db->where('photo_video_id in (10000,10001,10002)');
        return $this->db->get()->result();
    }
    
 }
 
?>