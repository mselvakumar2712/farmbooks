<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Crop extends CI_Controller {



   public function __construct() {  

      parent::__construct();

      $this->load->model("Crop_Model");

      $this->load->model("Cropmaster_Model");

      $this->load->model("Variety_Model");

      $this->load->model("Category_Model");

      $this->load->model("Subcategory_Model");

      $this->load->model("Name_Model");

      $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

      $this->output->set_header('Pragma: no-cache');

      $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

      $this->output->set_header('Content-Type: application/json');

	}



   public function index() {  

      $response = array("status" => 'TRV_S101', "information" => "Welcome ASPAART");

      echo json_encode($response);

	}



   public function crop_list() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['crop_list'] = array();

      $crop_list = $this->Crop_Model->cropList($post_data['farmer_id']);

      if($crop_list){

         $data['status'] = 'TRV_S101';

         $data['crop_list'] = $crop_list;

      }      

      echo json_encode($data); 

	}

   

   public function land_identification() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['land_identification'] = array();

      $land_identification = $this->Crop_Model->landIdentification($post_data['farmer_id']);

      if($land_identification){

         $data['status'] = 'TRV_S101';

         $data['land_identification'] = $land_identification;

      }      

      echo json_encode($data); 

   }

   

   public function crop_class() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['crop_class'] = array();

      $crop_class = $this->Crop_Model->cropclassDropdownList();

      if($crop_class){

         $data['status'] = 'TRV_S101';

         $data['crop_class'] = $crop_class;

      }      

      echo json_encode($data); 

   }

   

   public function area_uom() {  

      $data['status'] = 'TRV_E101';

      $data['area_uom'] = array();

      $area_uom = $this->Crop_Model->areaUom();

      if($area_uom){

         $data['status'] = 'TRV_S101';

         $data['area_uom'] = $area_uom;

      }      

      echo json_encode($data); 

   }

   

   public function land_area_detail() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['land_area_detail'] = array();

      $land_area_detail = $this->Crop_Model->landAreaDetail($post_data['land_identify_id']);

      if($land_area_detail){

         $data['status'] = 'TRV_S101';

         $data['land_area_detail'] = $land_area_detail;

      }      

      echo json_encode($data); 

   }

   

   public function quantity_uom() {  

      $data['status'] = 'TRV_E101';

      $data['quantity_uom'] = array();

      $quantity_uom = $this->Crop_Model->quantityUOM();

      if($quantity_uom){

         $data['status'] = 'TRV_S101';

         $data['quantity_uom'] = $quantity_uom;

      }      

      echo json_encode($data); 

   }


    public function sale_quantity_uom() {  

      $data['status'] = 'TRV_E101';

      $data['quantity_uom'] = array();

      $quantity_uom = $this->Crop_Model->sale_quantityUOM();

      if($quantity_uom){

         $data['status'] = 'TRV_S101';

         $data['quantity_uom'] = $quantity_uom;

      }      

      echo json_encode($data); 

   }


   public function post_crop() {  

      $data['status'] = 'TRV_E101';

      $data['message'] = 'Technical problem';

      if(!$this->cropValidator()) {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Provide the mandatory fields';

      } 

      else if( $this->Crop_Model->addCrop()) {

         $data['status'] = 'TRV_S101';

         $data['message'] = 'New crop entry added';

      }

      echo json_encode($data); 

	}

   

   public function expected_harvest_date() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['expected_harvest_date'] = array();

      $expected_harvest_date = $this->Crop_Model->expectedHarvestDate($post_data['transplant_date'], $post_data['crop_id']);

      if($expected_harvest_date){

         $data['status'] = 'TRV_S101';

         $data['expected_harvest_date'] = $expected_harvest_date;

      }      

      echo json_encode($data); 

   }

   

   public function cropValidator() {  

      $post_data = json_decode(file_get_contents('php://input'), true);

      if(empty($post_data['farmer_id']) || empty($post_data['land_identify_id']) || empty($post_data['crop_category']) || empty($post_data['crop_subcategory']) || empty($post_data['crop_name']) || empty($post_data['variety']) || empty($post_data['class_id']) || empty($post_data['season']) || empty($post_data['transplant_date']) || empty($post_data['area']) || empty($post_data['area_uom']) || empty($post_data['qty_used_seed']) || empty($post_data['quantity_uom']) || empty($post_data['seed_cost']) || empty($post_data['exp_harvest_date']) ) {

         return false;

      } 

      else {

         return true;

      }

   }

   

   public function updatecrop_list() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['updatecrop_list'] = array();

      $updatecrop_list = $this->Crop_Model->updateCropList($post_data['farmer_id']);

      if($updatecrop_list){

         $data['status'] = 'TRV_S101';

         $data['updatecrop_list'] = $updatecrop_list;

      }      

      echo json_encode($data); 

	}

   

   public function updatecrop_variety() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['updatecrop_variety'] = array();

      $updatecrop_variety = $this->Crop_Model->updateCropVariety($post_data['farmer_id']);

      if($updatecrop_variety){

         $data['status'] = 'TRV_S101';

         $data['updatecrop_variety'] = $updatecrop_variety;

      }      

      echo json_encode($data); 

	}

   

   public function updatecrop_nutrient() {  

      $data['status'] = 'TRV_E101';

      $data['updatecrop_nutrient'] = array();

      $updatecrop_nutrient = $this->Crop_Model->nutrientDropdownList();

      if($updatecrop_nutrient){

         $data['status'] = 'TRV_S101';

         $data['updatecrop_nutrient'] = $updatecrop_nutrient;

      }      

      echo json_encode($data); 

	}

   

   public function updatecrop_fertilizer() {  

      $data['status'] = 'TRV_E101';

      $data['updatecrop_fertilizer'] = array();

      $updatecrop_fertilizer = $this->Crop_Model->fertilizerDropdownList();

      if($updatecrop_fertilizer){

         $data['status'] = 'TRV_S101';

         $data['updatecrop_fertilizer'] = $updatecrop_fertilizer;

      }      

      echo json_encode($data); 

	}

   

   public function updatecrop_pesticide() {  

      $data['status'] = 'TRV_E101';

      $data['updatecrop_pesticide'] = array();

      $updatecrop_pesticide = $this->Crop_Model->pesticideDropdownList();

      if($updatecrop_pesticide){

         $data['status'] = 'TRV_S101';

         $data['updatecrop_pesticide'] = $updatecrop_pesticide;

      }      

      echo json_encode($data); 

	}

   

   public function brand_by_nutrient() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['brand_by_nutrient'] = array();

      $brand_by_nutrient = $this->Crop_Model->cropnutrientmasterDropdownList($post_data['nutrient_id']);

      if($brand_by_nutrient){

         $data['status'] = 'TRV_S101';

         $data['brand_by_nutrient'] = $brand_by_nutrient;

      }      

      echo json_encode($data); 

	}

   

   public function brand_by_fertilizer() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['brand_by_fertilizer'] = array();

      $brand_by_fertilizer = $this->Crop_Model->cropfertilizermasterDropdownList($post_data['fertilizer_id']);

      if($brand_by_fertilizer){

         $data['status'] = 'TRV_S101';

         $data['brand_by_fertilizer'] = $brand_by_fertilizer;

      }      

      echo json_encode($data); 

	}

   

   public function brand_by_pesticide() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['brand_by_pesticide'] = array();

      $brand_by_pesticide = $this->Crop_Model->croppesticidemasterDropdownList($post_data['pesticide_id']);

      if($brand_by_pesticide){

         $data['status'] = 'TRV_S101';

         $data['brand_by_pesticide'] = $brand_by_pesticide;

      }      

      echo json_encode($data); 

	}

   

   public function dosage_by_nutrient_variety() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['dosage_by_nutrient_variety'] = array();

      $dosage_by_nutrient_variety = $this->Crop_Model->varietydosagelist($post_data['variety_id']);

      if($dosage_by_nutrient_variety){

         $data['status'] = 'TRV_S101';

         $data['dosage_by_nutrient_variety'] = $dosage_by_nutrient_variety;

      }      

      echo json_encode($data); 

	}

   

   public function dosage_by_fertilizer_variety() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['dosage_by_fertilizer_variety'] = array();

      $dosage_by_fertilizer_variety = $this->Crop_Model->fertilizerdosagelist($post_data['variety_id']);

      if($dosage_by_fertilizer_variety){

         $data['status'] = 'TRV_S101';

         $data['dosage_by_fertilizer_variety'] = $dosage_by_fertilizer_variety;

      }      

      echo json_encode($data); 

	}

   

   public function dosage_by_pesticide_variety() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['dosage_by_pesticide_variety'] = array();

      $dosage_by_pesticide_variety = $this->Crop_Model->pesticidedosagelist($post_data['variety_id']);

      if($dosage_by_pesticide_variety){

         $data['status'] = 'TRV_S101';

         $data['dosage_by_pesticide_variety'] = $dosage_by_pesticide_variety;

      }      

      echo json_encode($data); 

	}

   

   public function dosage_by_weeding_variety() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['dosage_by_weeding_variety'] = array();

      $dosage_by_weeding_variety = $this->Crop_Model->weedingdosagelist($post_data['variety_id']);

      if($dosage_by_weeding_variety){

         $data['status'] = 'TRV_S101';

         $data['dosage_by_weeding_variety'] = $dosage_by_weeding_variety;

      }      

      echo json_encode($data); 

	}

   

   public function updatecrop_add() {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Technical problem';

         if(!$this->updateCropValidator()) {

            $data['status'] = 'TRV_E101';

            $data['message'] = 'Provide the mandatory fields';

         } 

         else if( $this->Crop_Model->add_updatecrop()) {

            $data['status'] = 'TRV_S101';

            $data['message'] = 'Crop update entry added';

         }

         echo json_encode($data);

	}

   

   function updateCropValidator() {

      $post_data = json_decode(file_get_contents('php://input'), true);

  		if($post_data['update_type'] == 1) {

           if(empty($post_data['farmer_id']) || empty($post_data['update_type']) || empty($post_data['nutrient_variety']) || empty($post_data['nutrient_name']) || empty($post_data['nutrient_dosage_date']) || empty($post_data['nutrient_brand_name']) || empty($post_data['nutrient_quantity']) || empty($post_data['nutrient_quantity_uom']) ) {

               return false;

           } else {

               return true;

           }

      }

       elseif($post_data['update_type'] == 2)

       {

          if(empty($post_data['farmer_id']) || empty($post_data['update_type']) || empty($post_data['fertilizer_variety']) || empty($post_data['fertilizer_name']) || empty($post_data['fertilizer_dosage_date']) || empty($post_data['fertilizer_brand_name']) || empty($post_data['fertilizer_feed_type']) || empty($post_data['fertilizer_quantity']) || empty($post_data['fertilizer_quantity_uom']) ) {

               return false;

           } else {

               return true;

           }

          

       }

       elseif($post_data['update_type'] == 3)

       {

           if(empty($post_data['farmer_id']) || empty($post_data['update_type']) || empty($post_data['pesticide_variety']) || empty($post_data['pesticide_name']) || empty($post_data['pesticide_dosage_date']) || empty($post_data['pesticide_brand_name']) || empty($post_data['pesticide_feed_type']) || empty($post_data['pesticide_quantity']) || empty($post_data['pesticide_quantity_uom']) ) {

               return false;

           } else {

               return true;

           }

          

       }

       else{

         if(empty($post_data['farmer_id']) || empty($post_data['update_type']) || empty($post_data['weeding_variety']) || empty($post_data['weeding_dosage_date']) || empty($post_data['type_weeding']) || empty($post_data['weeding_quantity']) || empty($post_data['weeding_quantity_uom']) ) {

               return false;

           } else {

               return true;

           } 

       }

	}

 

   public function view_crop() {

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['crop_detail'] = array();

      $crop_detail = $this->Crop_Model->cropByID($post_data['crop_id']);

      if($crop_detail){

         $data['status'] = 'TRV_S101';

         $data['crop_detail'] = $crop_detail;

      }      

      echo json_encode($data);   

	}

   

   public function update_crop() {

      $data['status'] = 'TRV_E101';

      $data['message'] = 'Technical problem';

      if(!$this->cropValidator()) {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Provide the mandatory fields';

      } 

      else if( $this->Crop_Model->updateCrop()) {

         $data['status'] = 'TRV_S101';

         $data['message'] = 'Crop updated successfully';

      }

      echo json_encode($data); 

	}

   

   public function view_update_crop() {

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['update_crop_detail'] = array();

      $update_crop_detail = $this->Crop_Model->upateCropByCropID($post_data['updatecrop_id']);

      if($update_crop_detail){

         $data['status'] = 'TRV_S101';

         $data['update_crop_detail'] = $update_crop_detail;

      }      

      echo json_encode($data);   

	}

   

   public function updatecrop_post() {

      $data['status'] = 'TRV_E101';

      $data['message'] = 'Technical problem';

      if(!$this->updateCropValidator()) {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Provide the mandatory fields';

      } 

      else if( $this->Crop_Model->updateCropPost()) {

         $data['status'] = 'TRV_S101';

         $data['message'] = 'Update crop posted successfully';

      }

      echo json_encode($data); 

	}

   

   public function crop_harvest_list() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['crop_harvest_list'] = array();

      $crop_harvest_list = $this->Crop_Model->cropHarvestList($post_data['farmer_id']);

      if($crop_harvest_list){

         $data['status'] = 'TRV_S101';

         $data['crop_harvest_list'] = $crop_harvest_list;

      }      

      echo json_encode($data); 

	}

   

   public function crop_harvest_variety() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['crop_harvest_variety'] = array();

      $crop_harvest_variety = $this->Crop_Model->cropHarvestVariety($post_data['farmer_id']);

      if($crop_harvest_variety){

         $data['status'] = 'TRV_S101';

         $data['crop_harvest_variety'] = $crop_harvest_variety;

      }      

      echo json_encode($data); 

	}

   

   public function crop_harvest_output() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['crop_harvest_output'] = array();

      $crop_harvest_output = $this->Crop_Model->outputmasterDropdownList($post_data['variety_id']);

      if($crop_harvest_output){

         $data['status'] = 'TRV_S101';

         $data['crop_harvest_output'] = $crop_harvest_output;

      }      

      echo json_encode($data); 

	}

   

   public function crop_harvest_add() {  

      $data['status'] = 'TRV_E101';

      $data['message'] = 'Technical problem';

      if(!$this->cropharvestValidator()) {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Provide the mandatory fields';

      } 

      else if( $this->Crop_Model->cropharvest()) {

         $data['status'] = 'TRV_S101';

         $data['message'] = 'Crop harvest entry added';

      }

      echo json_encode($data);  

 	}

   

   function cropharvestValidator() {

         $post_data = json_decode(file_get_contents('php://input'), true); 

         if(empty($post_data['farmer_id']) || empty($post_data['crop_variety']) || empty($post_data['harvest_date']) || empty($post_data['output_product']) || empty($post_data['output_qty']) || empty($post_data['output_quantity_uom']) || empty($post_data['harvest_method'])) {

            return false;

         } 

         else {

            return true;

         }

   }

   

   public function view_crop_harvest() {

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['view_crop_harvest'] = array();

      $view_crop_harvest = $this->Crop_Model->viewCropHarvest($post_data['crop_harvest_id']);

      if($view_crop_harvest){

         $data['status'] = 'TRV_S101';

         $data['view_crop_harvest'] = $view_crop_harvest;

      }      

      echo json_encode($data);   

	}

   

   public function crop_harvest_post() {

      $data['status'] = 'TRV_E101';

      $data['message'] = 'Technical problem';

      if(!$this->cropharvestValidator()) {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Provide the mandatory fields';

      } 

      else if( $this->Crop_Model->cropHarvestPost()) {

         $data['status'] = 'TRV_S101';

         $data['message'] = 'Crop harvest entry updated';

      }

      echo json_encode($data);   

	}

   

   public function get_crop_variety() {

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['get_crop_variety'] = array();

      $get_crop_variety = $this->Crop_Model->getCropVariety($post_data['farmer_id']);

      if($get_crop_variety){

         $data['status'] = 'TRV_S101';

         $data['get_crop_variety'] = $get_crop_variety;

      }      

      echo json_encode($data);   

	}

   

   public function post_harvest_list() {  

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['post_harvest_list'] = array();

      $post_harvest_list = $this->Crop_Model->postHarvestList($post_data['farmer_id']);

      if($post_harvest_list){

         $data['status'] = 'TRV_S101';

         $data['post_harvest_list'] = $post_harvest_list;

      }      

      echo json_encode($data); 

	}

   

   public function get_variety_input() {

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['get_variety_input'] = array();

      $get_variety_input = $this->Crop_Model->inputmasterDropdownList($post_data['variety_id']);

      if($get_variety_input){

         $data['status'] = 'TRV_S101';

         $data['get_variety_input'] = $get_variety_input;

      }      

      echo json_encode($data);   

	}

   

   public function get_variety_output() { 

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['get_variety_output'] = array();

      $get_variety_output = $this->Crop_Model->outputDropdownList($post_data['input_id']);

      if($get_variety_output){

         $data['status'] = 'TRV_S101';

         $data['get_variety_output'] = $get_variety_output;

      }      

      echo json_encode($data);   

	}

   

   public function post_harvest_add() {  

      $data['status'] = 'TRV_E101';

      $data['message'] = 'Technical problem';

      if(!$this->postHarvestValidator()) {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Provide the mandatory fields';

      } 

      else if( $this->Crop_Model->postharvest()) {

         $data['status'] = 'TRV_S101';

         $data['message'] = 'Post harvest entry added';

      }

      echo json_encode($data);  

 	}

   

   function postHarvestValidator() {

      $post_data = json_decode(file_get_contents('php://input'), true);

      if(empty($post_data['farmer_id']) || empty($post_data['date']) || empty($post_data['variety']) || empty($post_data['type_of_work']) || empty($post_data['input']) || empty($post_data['input_qty']) || empty($post_data['input_qty_uom'])  || empty($post_data['output_qty']) || empty($post_data['output_qty_uom']) || empty($post_data['output_product'])) {

          return false;

      } else {

         return true;

      }

   }

   

   public function view_post_harvest() {

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['view_post_harvest'] = array();

      $view_post_harvest = $this->Crop_Model->viewPostHarvest($post_data['post_harvest_id']);

      if($view_post_harvest){

         $data['status'] = 'TRV_S101';

         $data['view_post_harvest'] = $view_post_harvest;

      }      

      echo json_encode($data);   

	}

   

   public function type_of_work() { 

      $post_data = json_decode(file_get_contents('php://input'), true); 

      $data['status'] = 'TRV_E101';

      $data['type_of_work'] = array();

      $type_of_work = $this->Crop_Model->worktypeDropdownList();

      if($type_of_work){

         $data['status'] = 'TRV_S101';

         $data['type_of_work'] = $type_of_work;

      }      

      echo json_encode($data);   

	}

   

   /*public function post_harvest_update() {  

      $data['status'] = 'TRV_E101';

      $data['message'] = 'Technical problem';

      if(!$this->postHarvestValidator()) {

         $data['status'] = 'TRV_E101';

         $data['message'] = 'Provide the mandatory fields';

      } 

      else if( $this->Crop_Model->updatePostHarvest()) {

         $data['status'] = 'TRV_S101';

         $data['message'] = 'Post harvest entry updated';

      }

      echo json_encode($data);  

 	}*/
 	
    public function zo_farming_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
	  $data['message'] = 'No photo or video found';
      $data['zo_farming_list'] = array();
      $zo_farming_list = $this->Crop_Model->zofarminglist($post_data);
      if($zo_farming_list){
         $data['status'] = 'TRV_S101';
		 $data['message'] = 'Photo or Video found';
         $data['zo_farming_list'] = $zo_farming_list;
      }      
      echo json_encode($data);
	}
	
	public function zo_farming_intro_list() {  
      $post_data = json_decode(file_get_contents('php://input'), true); 
      $data['status'] = 'TRV_E101';
	  $data['message'] = 'No photo or video found';
      $data['zo_farming_list'] = array();
      $zo_farming_list = $this->Crop_Model->zofarmingintrolist($post_data);
      if($zo_farming_list){
         $data['status'] = 'TRV_S101';
		 $data['message'] = 'Photo or Video found';
         $data['zo_farming_list'] = $zo_farming_list;
      }      
      echo json_encode($data);
	}


}

