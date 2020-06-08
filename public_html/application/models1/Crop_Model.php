<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crop_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
/** Crop Starts **/
    function cropList() {        
        $this->db->select('trv_crop.*, trv_crop_variety_master.variety AS variety_name, trv_crop_name_master.name AS crop_name, trv_crop_sub_category_master.name AS subcategory_name, trv_crop_category_master.name AS category_name,trv_farmer.profile_name,trv_village_master.name as village_name');
        $this->db->from('trv_crop');
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.crop_id');
        $this->db->join('trv_crop_sub_category_master', 'trv_crop_sub_category_master.id = trv_crop.subcategory_id');
        $this->db->join('trv_crop_category_master', 'trv_crop_category_master.id = trv_crop.category_id');        
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_crop.farmer_id');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_farmer.village','left');
        $this->db->order_by('trv_crop.id');
		return $this->db->get()->result();
    }
    
    
    function post_crop() { 
        $crop_details = array(	
	        'crop_type'             => $this->input->post('crop_type'),
            'variety_id'            => $this->input->post('variety'),
            'crop_id'               => $this->input->post('crop_name'),
            'category_id'           => $this->input->post('crop_category'),
            'subcategory_id'        => $this->input->post('crop_subcategory'),
            'class_id'              => ($this->input->post('seed_class')) ? ($this->input->post('seed_class')):"",
            'season_id'             => $this->input->post('season'),
            'is_direct_seeding'     => ($this->input->post('direct_seed')) ? $this->input->post('direct_seed'):"",
            'transplant_date'       => $this->input->post('seed_date'),
            'area'                  => $this->input->post('area'),
				'area_uom'              => $this->input->post('area_uom'),
            'seed_qty'              => $this->input->post('used_seed_qty'),
				'quantity_uom'          => $this->input->post('quantity_uom'),
            'seed_cost'             => $this->input->post('seed_cost'),
            'expected_harvest_date' => $this->input->post('exp_harvest_date'),
            'farmer_id'             => $this->input->post('farmer_id'),
				'land_id'               => $this->input->post('land_id'),  
           // 'image'                  => ($img_data['file_name']) ? $img_data['file_name']:"",
            'status'                => 1,
            'updated_on'            => date('Y-m-d H:i:s'),
            'updated_by'            => ""
        );               
       // echo "<pre>"; print_r($crop_details); die;
         $this->db->insert('trv_crop', $crop_details);
         
         $last_inserted_program_id = $this->db->insert_id();
          if (!empty($_FILES['crop_photo']['name'])) {	
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
            } else {
             $img_data  = $this->upload->data();
                  $photodetails = array(
                       'image' => $img_data['file_name']			                        
                   );
                $this->db->update('trv_crop', $photodetails, array('id' => $last_inserted_program_id));             
            }	
        } 
        
        $getrow=$this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' =>$this->input->post('farmer_id') ,'trv_update_expense.crop_id'=> $this->input->post('variety')))->from('trv_update_expense')->get()->row_array();
        
        if(!empty($getrow)){
            $seed_cost=$getrow['seed_cost'];

            $cost_details = array(	
            'crop_id'               => $this->input->post('variety'),
            'seed_cost'             => $seed_cost + $this->input->post('seed_cost'),
            'farmer_id'             => $this->input->post('farmer_id')
           
            );
            return $this->db->update('trv_update_expense', $cost_details,array('id' => $getrow['id']));
        
        }else{
            $cost_details = array(	
            'crop_id'               => $this->input->post('variety'),
            'seed_cost'             => $seed_cost + $this->input->post('seed_cost'),
            'farmer_id'             => $this->input->post('farmer_id')
           
            );
            return $this->db->insert('trv_update_expense', $cost_details);
        }

    }
    
    function cropByID($crop_id) {
        $this->db->where(array('id' => $crop_id, 'status' => '1'));
        $this->db->from('trv_crop');
        return $this->db->get()->result();	
    }
    
    function cropId($crop_id) {
        $this->db->where(array('id' => $crop_id, 'status' => '1'));
        $this->db->from('trv_crop');
        return $this->db->get()->row_array();	
    }
    
    
    function updatecrop($crop_id) {          
        
        $crop_details = array(	
	         'crop_type'             => $this->input->post('crop_type'),
            'variety_id'            => $this->input->post('variety'),
            'crop_id'               => $this->input->post('crop_name'),
            'category_id'           => $this->input->post('crop_category'),
            'subcategory_id'        => $this->input->post('crop_subcategory'),
            'class_id'              => $this->input->post('seed_class'),
            'season_id'             => $this->input->post('season'),
            'is_direct_seeding'     => ($this->input->post('direct_seed')) ? $this->input->post('direct_seed'):"",
            'transplant_date'       => $this->input->post('seed_date'),
            'area'                  => $this->input->post('area'),
            'seed_qty'              => $this->input->post('used_seed_qty'),
            'seed_cost'             => $this->input->post('seed_cost'),
            'expected_harvest_date' => $this->input->post('exp_harvest_date'),
				'quantity_uom'          => $this->input->post('quantity_uom'),
            'farmer_id'             => $this->input->post('farmer_id'),
				'land_id'               => $this->input->post('land_id'),
				'area_uom'              => $this->input->post('area_uom'),
           // 'image'                 => $img_data['file_name'],
            
            'status'                => 1,
            'updated_on'            => date('Y-m-d H:i:s'),
            'updated_by'            => ""
        ); 
		  $this->db->update('trv_crop', $crop_details, array('id' => $crop_id));

         if(!empty($_FILES['crop_photo']['name'])) {	        	
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
                
          
        }  
		 $cost_details = array(	
            'crop_id'               => $this->input->post('variety'),
            'seed_cost'             => $this->input->post('seed_cost'),
            'farmer_id'             => $this->input->post('farmer_id')
            //'image'                 => ($img_data) ? $img_data['file_name']:"",
           
        );
		  return $this->db->update('trv_update_expense', $cost_details,array('id' => $crop_id));
    }
    
    
    function deletecrop( $crop_id ) {
        $crop_details = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_crop', $crop_details, array('id' => $crop_id));
	}        
    
    
    function cropnameDropdownList() {
        $this->db->select('trv_crop.id, trv_crop.crop_id, trv_crop_name_master.name AS crop_name');
        $this->db->from('trv_crop');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.crop_id');
        $this->db->where(array('trv_crop.status' => '1'));
        return $this->db->get()->result();
    }            
    
    
    function get_crop( $crop_id ) {
		return $this->db->get_where('trv_crop', array('id' => $crop_id))->row();
	}
/** Crop End **/
    function cropvarietyDropdown() {
        $cropid = $this->db->select('variety_id')->from('trv_crop_harvest')->where(array('status' => 1))->get()->result(); 
         //print_r($cropid);die;
        $this->db->select('trv_crop.id, trv_crop.variety_id,farmer_id, trv_crop_variety_master.variety AS variety_name');
        $this->db->from('trv_crop');
		  $this->db->distinct();
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
		  $this->db->where(array('trv_crop.status' => '1'));
        //$this->db->where_not_in('trv_crop_variety_master.id', 201);
         if(!empty($cropid)){
           //$harvested = (array)$harvested;
           foreach($cropid as $cropids)
            $excluded[] = $cropids->variety_id;
            $this->db->where_not_in('trv_crop.variety_id',$excluded);
         }
         
		return $this->db->get()->result();
    }
     function cropvarietyDropdown_value() {
        //$cropid = $this->db->select('variety_id')->from('trv_crop_harvest')->where(array('status' => 1))->get()->result(); 
         //print_r($cropid);die;
        $this->db->select('trv_crop_harvest.*, trv_crop_variety_master.variety AS variety_name');
        $this->db->from('trv_crop_harvest');
		  $this->db->distinct();
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop_harvest.variety_id');
		  $this->db->where(array('trv_crop_harvest.status' => '1'));
        //$this->db->where_not_in('trv_crop_variety_master.id', 201);
        /*  if(!empty($cropid)){
           //$harvested = (array)$harvested;
           foreach($cropid as $cropids)
            $excluded[] = $cropids->variety_id;
            $this->db->where_not_in('trv_crop.variety_id',$excluded);
         } */
         
		return $this->db->get()->result();
    }
    
    
/** Crop Management Common drop down API functions **/    
    function cropvarietyDropdownList() {
        $this->db->select('trv_crop.id, trv_crop.variety_id,farmer_id, trv_crop_variety_master.variety AS variety_name');
        $this->db->from('trv_crop');
		  $this->db->distinct();
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
		  $this->db->where(array('trv_crop.status' => '1'));
		  return $this->db->get()->result();
    }
	 function cropvarietymasterDropdownList($farmer_id) {
        $this->db->select('trv_crop.id, trv_crop.variety_id,trv_crop.farmer_id, trv_crop_variety_master.variety AS variety_name');
        $this->db->from('trv_crop');
		  $this->db->distinct();
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
		  $this->db->where(array('trv_crop.farmer_id' => $farmer_id,'trv_crop.status' => '1'));
        return $this->db->get()->result();
    }
    
    
    function nutrientDropdownList() {
        $this->db->select('trv_nutrient_master.id, trv_nutrient_master.nutrient_type, trv_nutrient_master.name');
        $this->db->from('trv_nutrient_master');
        $this->db->where(array('trv_nutrient_master.status' => '1'));
        return $this->db->get()->result();
    }
    function cropnutrientmasterDropdownList($nutrient_id) { 
		  $this->db->select('trv_brand_master.id,trv_brand_master.name,trv_brand_master.product');
        $this->db->from('trv_brand_master');
        //$this->db->join('trv_brand_master', 'trv_nutrient_master.id = trv_brand_master_id');
        //$this->db->distinct();
		  $this->db->where(array('trv_brand_master.product' => $nutrient_id, 'trv_brand_master.type_id' => 2,'trv_brand_master.status' => 1));
        return $this->db->get()->result();
    }
	 function cropfertilizermasterDropdownList($fertilizer_id) { 
		  $this->db->select('trv_brand_master.id,trv_brand_master.name,trv_brand_master.product');
        $this->db->from('trv_brand_master');
        //$this->db->join('trv_brand_master', 'trv_nutrient_master.id = trv_brand_master_id');
        //$this->db->distinct();
		  $this->db->where(array('trv_brand_master.product' => $fertilizer_id, 'trv_brand_master.type_id' => 1,'trv_brand_master.status' => 1));
        return $this->db->get()->result();
    }
	 function croppesticidemasterDropdownList($pesticide_id) { 
		  $this->db->select('trv_brand_master.id,trv_brand_master.name,trv_brand_master.product');
        $this->db->from('trv_brand_master');
        //$this->db->join('trv_brand_master', 'trv_nutrient_master.id = trv_brand_master_id');
        //$this->db->distinct();
		  $this->db->where(array('trv_brand_master.product' => $pesticide_id, 'trv_brand_master.type_id' => 3,'trv_brand_master.status' => 1));
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
            
/** Crop End **/
    
    
    
/** Update Crop related API functions **/
    function updateCropList() {        
        $this->db->select('trv_update_crop.*,trv_farmer.profile_name AS profile_name,trv_crop_variety_master.variety AS variety_name,trv_brand_master.name AS brandname ,trv_uom_master.full_name AS fullname');
        $this->db->from('trv_update_crop');
		  $this->db->distinct();
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_update_crop.farmer_id');
		  $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_update_crop.variety_id');
		  $this->db->join('trv_brand_master', 'trv_brand_master.id = trv_update_crop.brand_name', 'left');
		  $this->db->join('trv_uom_master', 'trv_uom_master.id = trv_update_crop.qty_uom');
		  $this->db->where(array('trv_update_crop.status' => 1));
        $this->db->order_by('trv_update_crop.id');
        return $this->db->get()->result(); 
    }
    
    
    /*function brandList( $update_type, $crop_id ) { 
        if($update_type == 1) {
            $this->db->select('trv_nutrient_master.id, trv_nutrient_master.name');
            $this->db->where('trv_nutrient_master.status', 1);
            $this->db->where_in('id', $crop_id);
            $this->db->from('trv_nutrient_master');
            return $this->db->get()->result();
        } else if($update_type == 2) {
            $this->db->select('trv_fertilizer_master.id, trv_fertilizer_master.name');
            $this->db->where('trv_fertilizer_master.status', 1);
            $this->db->where_in('id', $crop_id);
            $this->db->from('trv_fertilizer_master');
            return $this->db->get()->result();
        } else if($update_type == 3) {
            $this->db->select('trv_pesticide_master.id, trv_pesticide_master.name');
            $this->db->where('trv_pesticide_master.status', 1);
            $this->db->where_in('id', $crop_id);
            $this->db->from('trv_pesticide_master');
            return $this->db->get()->result();
        }                                
    }*/
    
    function nutrientBrandList( $crop_id ) { 
            $this->db->select('trv_nutrient_master.id, trv_nutrient_master.name');
            $this->db->where('trv_nutrient_master.status', 1);
            $this->db->where_in('id', $crop_id);
            $this->db->from('trv_nutrient_master');
            return $this->db->get()->result();      
    }
    
    function fertilizerBrandList( $crop_id ) { 
            $this->db->select('trv_fertilizer_master.id, trv_fertilizer_master.name');
            $this->db->where('trv_fertilizer_master.status', 1);
            $this->db->where_in('id', $crop_id);
            $this->db->from('trv_fertilizer_master');
            return $this->db->get()->result();
    }
    
    function pesticideBrandList( $crop_id ) { 
            $this->db->select('trv_pesticide_master.id, trv_pesticide_master.name');
            $this->db->where('trv_pesticide_master.status', 1);
            $this->db->where_in('id', $crop_id);
            $this->db->from('trv_pesticide_master');
            return $this->db->get()->result();
    }
    
    
    function add_updatecrop() {
        /* Based on crop type vaues are given */       
        if($this->input->post('update_type') == 1) {            
            $variety_id     = $this->input->post('nutrient_variety');
				$name  = $this->input->post('nutrient_name');
            $process_date   = $this->input->post('nutrient_dosage_date');
            $dosage         = ($this->input->post('nutrient_dosage'))?$this->input->post('nutrient_dosage'):"";
            $qty            = $this->input->post('nutrient_quantity');
				$qty_uom        = $this->input->post('nutrient_quantity_uom');
				$brand_name     = $this->input->post('nutrient_brand_name');
            //$brand_name     = implode(',', $this->input->post('nutrient_brand_name'));
            $process_cost   = ($this->input->post('cost_of_nutrient'))?$this->input->post('cost_of_nutrient'):"";
            
            $feed_type="";$weed_type="";$man_days="";$machine_hours="";
                        
        } else if($this->input->post('update_type') == 2) {            
            $name 		 = $this->input->post('fertilizer_name');
            $variety_id     		 = $this->input->post('fertilizer_variety');
            $process_date   		 = $this->input->post('fertilizer_dosage_date');
            $dosage         		 = ($this->input->post('fertilizer_dosage'))?$this->input->post('fertilizer_dosage'):"";
            $feed_type     		 = $this->input->post('fertilizer_feed_type');
            $qty           		 = $this->input->post('fertilizer_quantity');
				$qty_uom        		 = $this->input->post('fertilizer_quantity_uom');
				$brand_name = $this->input->post('fertilizer_brand_name');
            $process_cost   = ($this->input->post('cost_of_fertilizer'))?$this->input->post('cost_of_fertilizer'):"";
            
            $weed_type="";$man_days="";$machine_hours="";
        } else if($this->input->post('update_type') == 3) {
            $name 		          = $this->input->post('pesticide_name');
            $variety_id     		 = $this->input->post('pesticide_variety');
            $process_date  		 = $this->input->post('pesticide_dosage_date');
            $dosage        		 = ($this->input->post('pesticide_dosage'))?$this->input->post('pesticide_dosage'):"";
            $feed_type     		 = $this->input->post('pesticide_feed_type');
            $qty           	    = $this->input->post('pesticide_quantity');
				$qty_uom              = $this->input->post('pesticide_quantity_uom');
				$brand_name = $this->input->post('pesticide_brand_name');
            //$brand_name     = implode(',', $this->input->post('pesticide_brand_name'));
            $process_cost   = ($this->input->post('cost_of_pesticide'))?$this->input->post('cost_of_pesticide'):"";
            
            $weed_type="";$man_days="";$machine_hours="";
        } else {
            if($this->input->post('type_weeding') == 3) {

                $brand_nameData = $this->input->post('weeding_brand_name');
            } else {
                $brand_nameData = "";
            }
            //$crop_id        = $this->input->post('weeding_crop');
            $variety_id     = $this->input->post('weeding_variety');
            $process_date   = $this->input->post('weeding_dosage_date');
            $dosage         = ($this->input->post('weeding_dosage'))?$this->input->post('weeding_dosage'):"";
            $qty            = $this->input->post('weeding_quantity');
				$qty_uom        = $this->input->post('weeding_quantity_uom');
            $brand_name     = $this->input->post('weeding_brand_name');
            $name="";
            $weed_type      = $this->input->post('type_weeding');
            $man_days       = $this->input->post('weeding_no_of_man');
            $machine_hours  = $this->input->post('weeding_machine_hrs');
            $process_cost   = ($this->input->post('cost_of_weeding'))?$this->input->post('cost_of_weeding'):"";
            $feed_type="";
        }
        
        $crop_details = array(
			  'farmer_id'        => $this->input->post('farmer_id'),	
	        'update_type'        => $this->input->post('update_type'),
           'name'               => $name,
			  //'crop_id'            => $crop_id,
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
        
         
        $getrow=$this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' =>$this->input->post('farmer_id') ,'trv_update_expense.crop_id'=>  $variety_id))->from('trv_update_expense')->get()->row_array();
        
        if(!empty($getrow)){
          $nutrient_cost=$getrow['nutrient_cost'];
          $fertilizer_cost = $getrow['fertilizer_cost'];
          $pesticide_cost = $getrow['pesticide_cost'];
          $weeding_cost = $getrow['weeding_cost'];
           $cost_details = array(	
               'crop_id'               => $variety_id,  
               'farmer_id'             => $this->input->post('farmer_id'),
               'nutrient_cost'         => $nutrient_cost + $this->input->post('cost_of_nutrient'),
               'fertilizer_cost'       => $fertilizer_cost + $this->input->post('cost_of_fertilizer'),
               'pesticide_cost'        => $pesticide_cost + $this->input->post('cost_of_pesticide'),
               'weeding_cost'          => $weeding_cost + $this->input->post('cost_of_weeding'),
               //'image'                 => ($img_data) ? $img_data['file_name']:"",
              
            );
           return $this->db->update('trv_update_expense', $cost_details,array('id' => $getrow['id']));
        }else{
           $cost_details = array(	
            'crop_id'               => $variety_id,  
            'farmer_id'             => $this->input->post('farmer_id'),
            'nutrient_cost'         => $this->input->post('cost_of_nutrient'),
				'fertilizer_cost'       => $this->input->post('cost_of_fertilizer'),
				'pesticide_cost'        => $this->input->post('cost_of_pesticide'),
				'weeding_cost'          => $this->input->post('cost_of_weeding'),
           
         );
          return $this->db->insert('trv_update_expense', $cost_details);
        }
		 
    }
    
    
    function upateCropByCropID($updatecrop_id) {
        $this->db->where(array('id' => $updatecrop_id, 'status' => '1'));
        $this->db->from('trv_update_crop');
        return $this->db->get()->result();	
    }
    
    
    function update_crop($updatecrop_id) {
        /* Based on crop type vaues are given */
        if($this->input->post('update_type') == 1) {            
            $name  = $this->input->post('nutrient_name');
            $variety_id     = $this->input->post('updatevariety');
            $process_date   = $this->input->post('nutrient_dosage_date');
            $dosage         = ($this->input->post('nutrient_dosage'))?$this->input->post('nutrient_dosage'):"";
            $qty            = $this->input->post('nutrient_quantity');
				$qty_uom        = $this->input->post('nutrient_quantity_uom');
				$brand_name     = $this->input->post('nutrient_brand_name');
            //$brand_name     = implode(',', $this->input->post('nutrient_brand_name'));
            $process_cost   = ($this->input->post('cost_of_nutrient'))?$this->input->post('cost_of_nutrient'):"";
            $feed_type="";$weed_type="";$man_days="";$machine_hours="";
                        
        } else if($this->input->post('update_type') == 2) {            
            $name 		 = $this->input->post('fertilizer_name');
            $variety_id     = $this->input->post('updatevariety');
            $process_date   = $this->input->post('fertilizer_dosage_date');
            $dosage         = ($this->input->post('fertilizer_dosage'))?$this->input->post('fertilizer_dosage'):"";
            $feed_type      = $this->input->post('fertilizer_feed_type');
            $qty            = $this->input->post('fertilizer_quantity');
				$qty_uom        		 = $this->input->post('fertilizer_quantity_uom');
				$brand_name = $this->input->post('fertilizer_brand_name');
            //$brand_name     = implode(',', $this->input->post('fertilizer_brand_name'));
            $process_cost   = ($this->input->post('cost_of_fertilizer'))?$this->input->post('cost_of_fertilizer'):"";
            $weed_type="";$man_days="";$machine_hours="";
        } else if($this->input->post('update_type') == 3) {
            //$crop_id        = $this->input->post('pesticide_crop');
				$name 		 = $this->input->post('pesticide_name');
            $variety_id     = $this->input->post('updatevariety');
            $process_date   = $this->input->post('pesticide_dosage_date');
            $dosage         = ($this->input->post('pesticide_dosage'))?$this->input->post('pesticide_dosage'):"";
            $feed_type      = $this->input->post('pesticide_feed_type');
            $qty            = $this->input->post('pesticide_quantity');
				$qty_uom        = $this->input->post('pesticide_quantity_uom');
				$brand_name = $this->input->post('pesticide_brand_name');
            //$brand_name     = implode(',', $this->input->post('pesticide_brand_name'));
            $process_cost   = ($this->input->post('cost_of_pesticide'))?$this->input->post('cost_of_pesticide'):"";
            
            $weed_type="";$man_days="";$machine_hours="";
        } else {
     
            $variety_id     = $this->input->post('updatevariety');
            $process_date   = $this->input->post('weeding_dosage_date');
            $dosage         = ($this->input->post('weeding_dosage'))?$this->input->post('weeding_dosage'):"";
            $qty            = $this->input->post('weeding_quantity');
				$qty_uom        = $this->input->post('weeding_quantity_uom');
            $brand_name     = $this->input->post('weeding_brand_name');
            $name="";
            //$brand_name     = ($this->input->post('weeding_brand_name'))?implode(',', $this->input->post('weeding_brand_name')):"";
            
            $weed_type      = $this->input->post('type_weeding');
            $man_days       = $this->input->post('weeding_no_of_man');
            $machine_hours  = $this->input->post('weeding_machine_hrs');
            $process_cost   = ($this->input->post('cost_of_weeding'))?$this->input->post('cost_of_weeding'):"";
            $feed_type="";
        }
        $crop_details = array(
				'farmer_id'          => $this->input->post('farmer_id'),	
	         'update_type'        => $this->input->post('update_type'),
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
            'updated_on'         => date('Y-m-d H:i:s'),
            'updated_by'         => ""
        );
	   $this->db->update('trv_update_crop', $crop_details, array('id' => $updatecrop_id));
		
      $getrow=$this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' => $this->input->post('farmer_id') ,'trv_update_expense.crop_id'=> $variety_id))->from('trv_update_expense')->get()->row_array();
        
        if(!empty($getrow)){
          $nutrient_cost=$getrow['nutrient_cost'];
          $fertilizer_cost = $getrow['fertilizer_cost'];
          $pesticide_cost = $getrow['pesticide_cost'];
          $weeding_cost = $getrow['weeding_cost'];
           $cost_details = array(	
               'crop_id'               => $variety_id,  
               'farmer_id'             => $this->input->post('farmer_id'),
               'nutrient_cost'         =>  $nutrient_cost + $this->input->post('cost_of_nutrient'),
               'fertilizer_cost'       => $fertilizer_cost + $this->input->post('cost_of_fertilizer'),
               'pesticide_cost'        => $pesticide_cost + $this->input->post('cost_of_pesticide'),
               'weeding_cost'          => $weeding_cost + $this->input->post('cost_of_weeding'),
               //'image'                 => ($img_data) ? $img_data['file_name']:"",
              
            );
           return $this->db->update('trv_update_expense', $cost_details,array('id' => $getrow['id']));
        }else{
           $cost_details = array(	
            'crop_id'               => $variety_id,  
            'farmer_id'             => $this->input->post('farmer_id'),
            'nutrient_cost'         => $this->input->post('cost_of_nutrient'),
				'fertilizer_cost'       => $this->input->post('cost_of_fertilizer'),
				'pesticide_cost'        => $this->input->post('cost_of_pesticide'),
				'weeding_cost'          => $this->input->post('cost_of_weeding'),
           
         );
          return $this->db->insert('trv_update_expense', $cost_details);
        }
		 
    }
/** Update Crop End **/
    
    
/** Crop harvest related API functions **/
    function cropHarvestList() {        
        $this->db->select('trv_crop_harvest.*, trv_crop_variety_master.variety AS variety_name,trv_farmer.profile_name AS profile_name');
        $this->db->where(array('trv_crop_harvest.status' => 1));
        $this->db->from('trv_crop_harvest');
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop_harvest.variety_id');
		  $this->db->join('trv_farmer', 'trv_farmer.id = trv_crop_harvest.farmer_id');
        return $this->db->get()->result();
    }
    
    function cropharvest() {
        /** Harvest method is values **/
        if(is_array($this->input->post('harvest_method'))) {
            $harvest_method = implode(',', $this->input->post('harvest_method'));
        } else {
            $harvest_method = $this->input->post('harvest_method');
        }
        /** Sales quantity by using available sales **/
        /* if($this->input->post('sales_available') == 1) {
            $sales_qty = $this->input->post('sales_qty');
        } else {
            $sales_qty = "";
        } */
       $output_product = $this->input->post('output_product');
		 $output_qty = $this->input->post('output_qty');
		 $output_quantity_uom = $this->input->post('output_quantity_uom');
		 $sales_qty_uom = $this->input->post('sales_qty_uom');
		 $quantity_uom = $this->input->post('quantity_uom');
        if($this->input->post('sales_available') == 1) {
            $sales_qty = $this->input->post('sales_qty');
        } else {
            $sales_qty = "";
        } 
		 for($i=0;$i<count($output_product);$i++){
			 //echo $output_product[$i];
			 // echo $quantity_uom[$i];
			  $crop_details = array( 
				'farmer_id'        => $this->input->post('farmer_id'),
				'variety_id'        => $this->input->post('crop_variety'),
            'date_of_harvest'   => $this->input->post('harvest_date'),
            'output'            => $output_product[$i],
            'output_qty'        => $output_qty[$i],
				'qty_uom'           => $output_quantity_uom[$i],
            'harvest_method'    => $harvest_method,
            'man_days'          => ($this->input->post('man_days'))?$this->input->post('man_days'):"",
            'no_of_hours'       => ($this->input->post('no_of_hours'))?$this->input->post('no_of_hours'):"",
            'harvest_cost'      => $this->input->post('harvest_cost'),
            'output_quality'    => $this->input->post('output_quality'),
            //'sales_available'   => $this->input->post('sales_available'),
            'qty_sales'         => $quantity_uom[$i],
            'sales_qty_uom'     => $sales_qty_uom[$i],
            'status'            => 1,
            'updated_on'       => date('Y-m-d H:i:s'),
            'updated_by'         => ""
        );  
		  //print_r($crop_details);
		  $this->db->insert('trv_crop_harvest', $crop_details);
         $getrow=$this->db->select('trv_update_expense.*')->where(array('trv_update_expense.farmer_id' =>$this->input->post('farmer_id') ,'trv_update_expense.crop_id'=>  $this->input->post('crop_variety')))->from('trv_update_expense')->get()->row_array();
		    if(!empty($getrow)){
              $seed_cost=$getrow['harvesting_cost'];

         $cost_details = array(	
            'crop_id'               => $this->input->post('crop_variety'),
            'harvesting_cost'       => $seed_cost + $this->input->post('harvest_cost'),
            'farmer_id'             => $this->input->post('farmer_id') 
        );
		  return $this->db->update('trv_update_expense', $cost_details,array('id' => $getrow['id']));
          }
          else{
            $cost_details = array(	
            'crop_id'               => $this->input->post('crop_variety'),
            'harvesting_cost'       => $seed_cost + $this->input->post('harvest_cost'),
            'farmer_id'             => $this->input->post('farmer_id')
           
            );
            return $this->db->insert('trv_update_expense', $cost_details);
        }
		 }
		  
		 }  
    
    function editcropharvest($crop_id) {
		$this->db->select('trv_crop_harvest.*,GROUP_CONCAT(trv_crop_harvest.id SEPARATOR ",") as harvestid'); 
      $this->db->from('trv_crop_harvest');
      $this->db->where(array('id' => $crop_id, 'status' => '1'));		
        return $this->db->get()->result();	
    }
	 function editpostharvest($postharvest_id) {
		  $this->db->select('trv_post_harvest.*,GROUP_CONCAT(trv_post_harvest.id ) as harvestid');
        $this->db->where(array('id' => $postharvest_id, 'status' => '1'));
        $this->db->from('trv_post_harvest');		  
        return $this->db->get()->result();	
    }

    function updatecropharvest($crop_id) {  
        //echo $crop_id.'hi';	 
        /** Harvest method is values **/
        if(is_array($this->input->post('harvest_method'))) {
            $harvest_method = implode(',', $this->input->post('harvest_method'));
        } else {
            $harvest_method = $this->input->post('harvest_method');
        }
        /** Sales quantity by using available sales **/
        if($this->input->post('sales_available') == 1) {
            $sales_qty = $this->input->post('sales_qty');
        } else {
            $sales_qty = "";
        } 
        $output_product = $this->input->post('output_product');
		  $output_qty = $this->input->post('output_qty');
		  $output_quantity_uom = $this->input->post('output_quantity_uom');
		  $sales_qty_uom = $this->input->post('sales_qty_uom');
		  $quantity_uom = $this->input->post('quantity_uom');
		  $harvestid = $this->input->post('harvestid');
        for($i=0;$i<count($output_product);$i++){
			   $crop_details = array( 
				 'farmer_id'         => $this->input->post('farmer_id'),
				 'variety_id'        => $this->input->post('crop_variety'),
             'date_of_harvest'   => $this->input->post('harvest_date'),
             'output'            => $output_product[$i],
             'output_qty'        => $output_qty[$i],
				 'qty_uom'           => $output_quantity_uom[$i],
             'harvest_method'    => $harvest_method,
             'man_days'          => ($this->input->post('man_days'))?$this->input->post('man_days'):"",
             'no_of_hours'       => ($this->input->post('no_of_hours'))?$this->input->post('no_of_hours'):"",
             'harvest_cost'      => $this->input->post('harvest_cost'),
             'output_quality'    => $this->input->post('output_quality'),
             'sales_available'   => $this->input->post('sales_available'),
             'qty_sales'         => $quantity_uom[$i],
             'sales_qty_uom'     => $sales_qty_uom[$i],
             'status'            => 1,
             'updated_on'       => date('Y-m-d H:i:s'),
             'updated_by'         => ""
         ); 
		    $this->db->update('trv_crop_harvest', $crop_details, array('id' => $harvestid[$i]));
			 $cost_details = array(	
            'crop_id'               => $this->input->post('variety'),
            'harvesting_cost' => $this->input->post('harvest_cost'),
            'farmer_id'             => $this->input->post('farmer_id'),
            //'image'                 => ($img_data) ? $img_data['file_name']:"",
           
        );
		  return $this->db->update('trv_update_expense', $cost_details,array('id' => $harvestid[$i]));
		  }
		  return true; 
    }
/** Crop harvest End **/
    
/** Post Crop harvest related API functions **/
    function postHarvestList() { 
		  $this->db->select('trv_post_harvest.*, trv_crop_variety_master.variety AS variety_name,trv_farmer.profile_name AS profile_name');
        $this->db->where(array('trv_post_harvest.status' => 1));
        $this->db->from('trv_post_harvest');
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_post_harvest.crop_id');
        $this->db->join('trv_post_harvest_master', 'trv_post_harvest_master.crop_id = trv_post_harvest.crop_id');
		  $this->db->join('trv_farmer', 'trv_farmer.id = trv_post_harvest.farmer_id');
        $this->db->group_by('trv_post_harvest.farmer_id');
        return $this->db->get()->result();
	
    }
    function getCropName() {
		  $this->db->select('id,output_product,crop_id');
        $this->db->where(array('trv_post_harvest_master.status' => 1));
        $this->db->order_by("trv_post_harvest_master.output_product", "desc");
        $this->db->from('trv_post_harvest_master');
        return $this->db->get()->result();	
    } 
    function postharvest() { 
        $output_product = $this->input->post('output_product');
		  $output_qty = $this->input->post('output_qty');
		  $output_quantity_uom = $this->input->post('output_quantity_uom');
		
		
        if($this->input->post('sale_available') == 1) {
            $sales_qty = $this->input->post('available');
            $sales_qty_uom = $this->input->post('sales_qty_uom');
            $quantity_uom = $this->input->post('quantity_uom');
        } else {
            $sales_qty = "";
            $sales_qty_uom ="";
            $quantity_uom ="";
        } 
       // echo "<pre>";print_r($this->input->post());die;
        for($i=0;$i<count($output_product);$i++){
   
        $crop_details = array(
			   'farmer_id'         => $this->input->post('farmer_id'),		  
	         'process_date'         => $this->input->post('date'),
            'crop_id'              => $this->input->post('variety'),
            'work_type'            => $this->input->post('type_of_work'),
            'crop_input_id'        => $this->input->post('input'),
            'input_qty'            => $this->input->post('input_qty'),
				'input_qty_uom'        => $this->input->post('input_qty_uom'),
            'output_product'       => $output_product[$i],
            'output_qty'           => $output_qty[$i],
				'output_qty_uom'       => $output_quantity_uom[$i],
            'post_harvesting_cost' => $this->input->post('cost_post_harvesting'),
            'sale_available'       => $sales_qty,
            'qty_for_sale'         => ($sales_qty_uom)? $sales_qty_uom[$i]:"",
				'sales_qty_uom'        => ($quantity_uom)? $quantity_uom[$i]:"",
            'status'               => 1,
            'updated_on'           => date('Y-m-d H:i:s'),
            'updated_by'           => $this->session->userdata('user_id'),
        );
				  
       $this->db->insert('trv_post_harvest', $crop_details);
		  $cost_details = array(	
            'crop_id'               => $this->input->post('variety'),
            'post_harvesting_cost'       =>  $this->input->post('cost_post_harvesting'),
            'farmer_id'             => $this->input->post('farmer_id'),
            'updated_by'           => $this->session->userdata('user_id'),
        );
		 $this->db->insert('trv_update_expense', $cost_details);       
       
        $crop_details = array(	
            'crop_id'               => $this->input->post('variety'),
            'work_type'             => $this->input->post('type_of_work'),
            'output_product'        => $output_product[$i],
            'input_product'         => $this->input->post('input'),
            'updated_by'         	=> $this->session->userdata('user_id'),
                     
        );
		  $this->db->insert('trv_post_harvest_master', $crop_details); 
		  } 
		 return true;
    }
    
    function updatepostharvest($crop_id) {              
        $output_product = $this->input->post('output_product');
		  $output_qty = $this->input->post('output_qty');
		  $output_quantity_uom = $this->input->post('output_quantity_uom');
		 // $sales_qty_uom = $this->input->post('sales_qty_uom');
		 // $quantity_uom = $this->input->post('quantity_uom');
		
         if($this->input->post('sale_available') == 1) {
            $sales_qty = $this->input->post('available');
            $sales_qty_uom = $this->input->post('sales_qty_uom');
            $quantity_uom = $this->input->post('quantity_uom');
        } else {
            $sales_qty = "";
            $sales_qty_uom ="";
            $quantity_uom ="";
        }
        
        for($i=0;$i<count($output_product);$i++){
			 
        $crop_details = array(
			   'farmer_id'         => $this->input->post('farmer_id'),		  
	         'process_date'         => $this->input->post('date'),
            'crop_id'              => $this->input->post('variety'),
            'work_type'            => $this->input->post('type_of_work'),
            'crop_input_id'        => $this->input->post('input'),
            'input_qty'            => $this->input->post('input_qty'),
				'input_qty_uom'        => $this->input->post('input_qty_uom'),
            'output_product'       => $output_product[$i],
            'output_qty'           => $output_qty[$i],
				'output_qty_uom'       => $output_quantity_uom[$i],
            'post_harvesting_cost' => $this->input->post('cost_post_harvesting'),
            'sale_available'       => $sales_qty,
            'qty_for_sale'         => $sales_qty_uom[$i],
				'sales_qty_uom'        => $quantity_uom[$i],
            'status'               => 1,
            'updated_on'           => date('Y-m-d H:i:s'),
            'updated_by'           => $this->session->userdata('user_id'),
        );
				  
        $this->db->update('trv_post_harvest', $crop_details);
		  $cost_details = array(	
            'crop_id'               => $this->input->post('variety'),
            'post_harvesting_cost'       =>  $this->input->post('cost_post_harvesting'),
            'farmer_id'             => $this->input->post('farmer_id'),
            'updated_by'           => $this->session->userdata('user_id'),
        );
        $this->db->where('id',$harvest_id[$i]);
		  $this->db->insert('trv_update_expense', $cost_details);         
       
        $crop_details_list = array(	
            'crop_id'               => $this->input->post('variety'),
            'work_type'             => $this->input->post('type_of_work'),
            'output_product'       => $output_product[$i],
            'input_product'        => $this->input->post('input'),
            'updated_by'         	=> $this->session->userdata('user_id'),
                     
        );
		  $cropdetail = $this->db->update('trv_post_harvest_master', $crop_details_list); 
		  } 
	    return $cropdetail;
  }
 
/** Post Crop harvest End **/    
     function cropmasterDropdownList($farmer_id) {
        $this->db->select('trv_crop.id, trv_crop.crop_id,trv_crop.farmer_id, trv_crop_name_master.name AS crop_name');
        $this->db->from('trv_crop');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop.id');
        $this->db->where(array('trv_crop.farmer_id' => $farmer_id,'trv_crop.status' => '1'));
        return $this->db->get()->result();
    } 
	 function outputmasterDropdownList($variety_id) {
        $this->db->select('trv_crop_master.*, trv_crop_name_master.name AS output_name');
        $this->db->from('trv_crop_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_master.name_id');
        $this->db->where(array('trv_crop_master.variety_id' => $variety_id,'trv_crop_master.status' => '1'));
        return $this->db->get()->result();
    } 
   function inputmasterDropdownList($crop_id) {
        $this->db->select('trv_crop_master.id,trv_crop_master.name_id, trv_crop_master.variety_id,trv_crop_master.crop_output, trv_crop_name_master.name AS output_name');
        $this->db->from('trv_crop_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_master.name_id');
        $this->db->where(array('trv_crop_master.variety_id' => $crop_id,'trv_crop_master.status' => '1'));
        return $this->db->get()->result();
    } 
    function outputDropdownList($input_id) {		
        $this->db->select('trv_crop_harvest.*, trv_post_harvest_master.output_product AS output_name');
        $this->db->from('trv_crop_harvest');
        $this->db->join('trv_post_harvest_master', 'trv_post_harvest_master.crop_id = trv_crop_harvest.variety_id');
        $this->db->where(array('trv_crop_harvest.variety_id' => $input_id,'trv_crop_harvest.status' => '1'));        
        return $this->db->get()->result();		     
    } 	 
    function cropcategorymasterDropdownList($farmer_id) {
        $this->db->select('trv_crop.id, trv_crop.category_id,trv_crop.farmer_id, trv_crop_category_master.name AS category_name');
        $this->db->from('trv_crop');
        $this->db->join('trv_crop_category_master', 'trv_crop_category_master.id = trv_crop.id');
        $this->db->distinct();
		  $this->db->where(array('trv_crop.farmer_id' => $farmer_id,'trv_crop.status' => '1'));
        return $this->db->get()->result();
    }	
  function subcategoryByCategory($category_id) {
        $this->db->select('trv_crop_sub_category_master.id, trv_crop_sub_category_master.name, trv_crop_sub_category_master.crop_category_id');
        $this->db->where(array('crop_category_id' => $category_id, 'status' => '1'));
        $this->db->order_by("id", "desc");
		  $this->db->distinct();
        $this->db->from('trv_crop_sub_category_master');
        return $this->db->get()->result();  
    }
	 function cropnameByCategory($subcategory_id) {
        $this->db->select('trv_crop_name_master.id, trv_crop_name_master.name, trv_crop_name_master.category_id');
        $this->db->where(array('sub_category_id' => $subcategory_id, 'status' => '1'));
        $this->db->order_by("id", "desc");
		  $this->db->distinct();
        $this->db->from('trv_crop_name_master');
        return $this->db->get()->result();  
    }
	 function varietyByCategory($name_id) {
        $this->db->select('trv_crop_variety_master.id, trv_crop_variety_master.variety, trv_crop_variety_master.name_id');
        $this->db->where(array('name_id' => $name_id, 'status' => '1'));
        $this->db->order_by("id", "desc");
		  $this->db->distinct();
        $this->db->from('trv_crop_variety_master');
        return $this->db->get()->result();  
    }
	 function seasonByCategory() {
       $this->db->select('trv_season_master.id, trv_season_master.season');
        $this->db->from('trv_season_master');
        $this->db->where(array('trv_season_master.status' => '1'));
        return $this->db->get()->result();  
    }
	 function seedByCategory($variety_id) {
       $this->db->select('trv_seed_master.id, trv_seed_master.class, trv_seed_master.category_id');
        $this->db->where(array('variety_id' => $variety_id, 'status' => '1'));
        $this->db->order_by("id", "desc");
		  $this->db->distinct();
        $this->db->from('trv_seed_master');
        return $this->db->get()->result();
    }
	 
	 //expenses module
	  function costseeddetail($variety_id) {
        $this->db->select('trv_crop.id, trv_crop.variety_id, SUM(trv_crop.seed_cost) as total');
        $this->db->from('trv_crop');
        $this->db->where(array('trv_crop.id' => $variety_id,'trv_crop.status' => '1'));
        return $this->db->get()->result();
    }
	 function updatecostdetail($variety_id) {
		$this->db->select('trv_update_crop.id,trv_update_crop.variety_id,trv_update_crop.update_type,SUM(trv_update_crop.process_cost) as process_total');
      $this->db->from('trv_update_crop');
      //$this->db->join('trv_crop', 'trv_crop.id = trv_update_crop.variety_id');
      $this->db->group_by('trv_update_crop.update_type');
      $this->db->where(array('trv_update_crop.variety_id' =>$variety_id,'trv_update_crop.status' => '1'));
      return $this->db->get()->result();
		 
    }
	 function costharvestdetail($variety_id) {
		  $this->db->select('trv_crop_harvest.id,trv_crop_harvest.variety_id,SUM(trv_crop_harvest.harvest_cost) as harvestcost');
        $this->db->from('trv_crop_harvest');
        //$this->db->join('trv_crop', 'trv_crop.id = trv_crop_harvest.variety_id');
        $this->db->distinct();
		  $this->db->where(array('trv_crop_harvest.variety_id' => $variety_id,'trv_crop_harvest.status' => '1'));
        return $this->db->get()->result();
        
    }
	 function postharvestdetail($variety_id) {
		  $this->db->select('trv_post_harvest.id,trv_post_harvest.crop_id,SUM(trv_post_harvest.post_harvesting_cost) as postharvest');
        $this->db->from('trv_post_harvest');
        //$this->db->join('trv_crop', 'trv_crop.id = trv_post_harvest.crop_id');
        $this->db->distinct();
		  $this->db->where(array('trv_post_harvest.crop_id' => $variety_id,'trv_post_harvest.status' => '1'));
        return $this->db->get()->result();
        
    }
	 function addexpenses() {
        $expenses_details = array(
           'farmer_id'           	 => $this->input->post('farmer_id'),
			  'crop_id'             	 => $this->input->post('variety'),
	        'seed_cost'            	 => $this->input->post('cost_of_seed'),
           'land_preparation_cost'   => $this->input->post('land_preparation'),
           'planting_cost'           => $this->input->post('cost_planting'),
           'fertilizer_cost'         => $this->input->post('cost_of_fertilizer'),
			  'pesticide_cost'          => $this->input->post('cost_of_pesticides'),
			  'weeding_cost'            => $this->input->post('cost_of_weeding'),
           'harvesting_cost'         => $this->input->post('cost_of_harvesting'),
           'post_harvesting_cost'    => $this->input->post('cost_of_postharvesting'),
			  'other_expenses'          => $this->input->post('other_expenses'),
			  'total'                   => $this->input->post('total'),
			  'updated_on'           => date('Y-m-d H:i:s'),
           'updated_by'           => ""
           //'FPG_Name'                => $this->input->post('interest_group'),
           //'status'                  => $this->input->post('status')            
        );	
        return $this->db->insert('trv_update_expense', $expenses_details);
    }
	  /* function expensesList() {
        $query = $this->db->get('trv_update_expense');
        $ret = $query->result_array();
        return $ret; 
    } */
	 
	 function expensesList() {        
        $this->db->select('trv_update_expense.id,trv_update_expense.crop_id,trv_update_expense.land_preparation_cost,trv_update_expense.planting_cost,trv_update_expense.farmer_id,SUM(trv_update_expense.seed_cost) as seed_total,SUM(trv_update_expense.fertilizer_cost) as fertilizer_total,SUM(trv_update_expense.pesticide_cost) as pesticide_total,SUM(trv_update_expense.weeding_cost) as weeding_total,SUM(trv_update_expense.harvesting_cost) as harvesting_total,SUM(trv_update_expense.post_harvesting_cost) as post_harvesting_total, trv_crop_variety_master.variety AS variety_name,trv_farmer.profile_name AS profile_name');
        //$this->db->where(array('trv_update_expense.status' => 1));
        $this->db->group_by('trv_update_expense.crop_id,trv_update_expense.farmer_id');
		  $this->db->from('trv_update_expense');
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_update_expense.crop_id');
		  $this->db->join('trv_farmer', 'trv_farmer.id = trv_update_expense.farmer_id');
        $this->db->order_by('trv_update_expense.id');
        return $this->db->get()->result();
    }
	 function expensesssList( $expenses_id ) {
        $this->db->select('trv_update_expense.*,SUM(trv_update_expense.nutrient_cost) as nutrient_total,SUM(trv_update_expense.total) as cost_total,SUM(trv_update_expense.planting_cost) as planting_cost_total,SUM(trv_update_expense.land_preparation_cost) as land_preparation_total,SUM(trv_update_expense.seed_cost) as seed_total,SUM(trv_update_expense.fertilizer_cost) as fertilizer_total,SUM(trv_update_expense.pesticide_cost) as pesticide_total,SUM(trv_update_expense.weeding_cost) as weeding_total,SUM(trv_update_expense.harvesting_cost) as harvesting_total,SUM(trv_update_expense.post_harvesting_cost) as post_harvesting_total,SUM(trv_update_expense.other_expenses) as other_expenses_total,SUM(trv_update_expense.nutrient_cost) as nutrient_cost_total');
        $this->db->from('trv_update_expense');
		  $this->db->where(array('trv_update_expense.id' =>  $expenses_id,));
        return $this->db->get()->result();
    }
	 function updateexpenses($expenses_id) {
       $expenses_details = array(
           'farmer_id'           	 => $this->input->post('farmer_id'),
			  'crop_id'             	 => $this->input->post('variety'),
	        'seed_cost'            	 => $this->input->post('cost_of_seed'),
           'land_preparation_cost'   => $this->input->post('land_preparation'),
           'planting_cost'           => $this->input->post('cost_planting'),
           'fertilizer_cost'         => $this->input->post('cost_of_fertilizer'),
           'nutrient_cost'           => $this->input->post('cost_of_nutrient'),
			  'pesticide_cost'          => $this->input->post('cost_of_pesticides'),
			  'weeding_cost'            => $this->input->post('cost_of_weeding'),
           'harvesting_cost'         => $this->input->post('cost_of_harvesting'),
           'post_harvesting_cost'    => $this->input->post('cost_of_postharvesting'),
			  'other_expenses'          => $this->input->post('other_expenses'),
			  'total'                   => $this->input->post('total'),
			  'updated_on'              => date('Y-m-d H:i:s'),
           'updated_by'              => ""           
        );	//print_r( $expenses_details);die;
		return $this->db->update('trv_update_expense', $expenses_details, array('id' => $expenses_id));
    }
	  function landdetail($farmer_id) { 
		  $this->db->select('trv_land_identify.*,trv_uom_master.full_name AS full_name');
        $this->db->from('trv_land_identify');
		  $this->db->distinct();
        $this->db->join('trv_uom_master', 'trv_uom_master.id = trv_land_identify.measurement_unit');
		  $this->db->where(array('trv_land_identify.farmer_id' => $farmer_id));
        return $this->db->get()->result();
    }

    function cropvarietymastersDropdownList($farmer_id) {
      $this->db->select('trv_update_expense.id, trv_update_expense.crop_id,trv_update_expense.farmer_id, trv_crop_variety_master.variety AS variety_name');
		$this->db->from('trv_update_expense');
		$this->db->distinct('trv_update_expense.crop_id');
		$this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_update_expense.crop_id');
		$this->db->where(array('trv_update_expense.farmer_id' => $farmer_id));
      $this->db->group_by('trv_update_expense.crop_id');
		return $this->db->get()->result();
    }
    
    function cropvarietymastersDropdown($farmer_id) {
      $cropid = $this->db->select('crop_id')->from('trv_update_expense')->where(array('farmer_id' => $farmer_id))->get()->result();  
      $this->db->select('trv_crop.id, trv_crop.variety_id,trv_crop.farmer_id, trv_crop_variety_master.variety AS variety_name');
		$this->db->from('trv_crop');
		$this->db->distinct();
		$this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
		$this->db->where(array('trv_crop.farmer_id' => $farmer_id,'trv_crop.status' => '1'));
		if(!empty($cropid)){
		  //$harvested = (array)$harvested;
		  foreach($cropid as $cropids)
			$excluded[] = $cropids->crop_id;
		  $excluded = implode(',',$excluded);
		  $this->db->where_not_in('trv_crop.variety_id', $excluded);
		}
		return $this->db->get()->result();
    }
	 function varietydosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->distinct();
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '1','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			//$row = $query->row();
			return $query;

    }
	  function pesticidedosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->distinct();
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '3','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			//$row = $query->row();
			return $query;

    }
	  function fertilizerdosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '2','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			//$row = $query->row();
			return $query;

    }
	 function weedingdosagelist($variety_id){          
			$this->db->select('trv_update_crop.variety_id,trv_update_crop.dosage');
         $this->db->from('trv_update_crop');
			$this->db->where(array('trv_update_crop.variety_id' => $variety_id,'trv_update_crop.update_type' => '4','trv_update_crop.status' => '1'));
			$query = $this->db->get()->result();
			//$row = $query->row();
			return $query;

    }
	 function harvestvarietymastersDropdownList($farmer_id) {
		  $harvested = $this->db->select('variety_id')->from('trv_crop_harvest')->where(array('farmer_id' => $farmer_id))->get()->result();
        $this->db->select('trv_crop.id, trv_crop.variety_id,trv_crop.farmer_id, trv_crop_variety_master.variety AS variety_name');
		  $this->db->distinct();
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id = trv_crop.variety_id');
		  $this->db->where(array('trv_crop.farmer_id' => $farmer_id,'trv_crop.status' => '1'));
		  if(!empty($harvested)){
			  //$harvested = (array)$harvested;
			  foreach($harvested as $harvests)
					$excluded[] = $harvests->variety_id;
			  $excluded = implode(',',$excluded);
			  $this->db->where_not_in('trv_crop.variety_id', $excluded);
		  }
		  $this->db->from('trv_crop');
        return $this->db->get()->result();
    }
	  function postharvestvarietymastersDropdownList($farmer_id) {
        $this->db->select('trv_crop_harvest.id, trv_crop_harvest.variety_id,trv_crop_harvest.farmer_id, trv_crop_variety_master.variety AS variety_name');
        $this->db->from('trv_crop_harvest');
		  $this->db->distinct();
        $this->db->join('trv_crop_variety_master', 'trv_crop_variety_master.id =  trv_crop_harvest.variety_id');
		  $this->db->where(array('trv_crop_harvest.farmer_id' => $farmer_id,'trv_crop_harvest.status' => '1'));
        return $this->db->get()->result();
    }
	 function landareadetail($land_id) { 
	     
		  $this->db->select('trv_land_identify.*,trv_uom_master.full_name AS full_name');
        $this->db->from('trv_land_identify');
		  $this->db->distinct();
        $this->db->join('trv_uom_master', 'trv_uom_master.id = trv_land_identify.measurement_unit');
		  $this->db->where(array('trv_land_identify.id' => $land_id));
        return $this->db->get()->result();
    }
	 function cropclassDropdownList() {
        $this->db->select('trv_crop_class_master.id, trv_crop_class_master.name');
        $this->db->from('trv_crop_class_master');
        $this->db->where(array('trv_crop_class_master.status' => '1'));
        return $this->db->get()->result();
    } 
 }
  
	 
    

?>