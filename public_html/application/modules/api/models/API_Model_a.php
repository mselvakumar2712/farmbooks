<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class API_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    function getdealerinfo( $dealer_id ) {
        $this->db->select('dealer_id, dealer_type, dealer_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno');
        $this->db->where(array('dealer_id' => $dealer_id) );
        $this->db->order_by("dealer_id", "desc");
        $this->db->from('fpo_dealer');
        return $this->db->get();
    }
	
	function getmarketinfo( $market_id ) {
        $this->db->select('market_id, market_type, market_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno');
        $this->db->where(array('market_id' => $market_id) );
        $this->db->order_by("market_id", "desc");
        $this->db->from('fpo_market');
        return $this->db->get();
    }
	
	function getstoreinfo( $store_id ) {
        $this->db->select('store_id, store_type, store_name, contact_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno');
        $this->db->where(array('store_id' => $store_id) );
        $this->db->order_by("store_id", "desc");
        $this->db->from('fpo_store');
        return $this->db->get();
    }
	
	function getcompanyinfo( $company_id ) {
        $this->db->select('company_id, cin, company_name, date_of_registration, month_name, state, roc, authorised_capital, paidup_capital, activity_code, activity_description, registered_office_address, registered_email');
        $this->db->where(array('company_id' => $company_id) );
        $this->db->order_by("company_id", "desc");
        $this->db->from('fpo_company');
        return $this->db->get();
    }
	
	function getstorageinfo( $storage_id ) {
        $this->db->select('storage_id, storage_type, storage_name, contact_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno, email');
        $this->db->where(array('storage_id' => $storage_id) );
        $this->db->order_by("storage_id", "desc");
        $this->db->from('fpo_storage');
        return $this->db->get();
    }
	
	function cropDropdownList() {
        $this->db->select('trv_crop_master.id, trv_crop_master.name_id, trv_crop_name_master.name AS crop_name');
        $this->db->from('trv_crop_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_master.name_id');
        $this->db->where(array('trv_crop_master.status' => '1'));
        return $this->db->get()->result();
    }
	
	function getcropcategoryList() {
        $this->db->select('trv_crop_category_master.id, trv_crop_category_master.name, trv_crop_category_master.name_local, trv_crop_category_master.status');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_crop_category_master');
        return $this->db->get()->result();	
    }

	function getcropsubcategory($category_id) {
        $this->db->select('id, crop_category_id, name, name_local, status');
        $this->db->where(array('crop_category_id' => $category_id, 'status' => '1'));
        $this->db->from('trv_crop_sub_category_master');
        return $this->db->get()->result();
    }
	
	function getcropname($subcategory_id) {
		$this->db->select('id, sub_category_id, name, name_local, status');
        $this->db->where(array('sub_category_id' => $subcategory_id, 'status' => '1'));
        $this->db->from('trv_crop_name_master');
        return $this->db->get()->result();
    }
	
	function getcropvariety($name_id) {
		$this->db->select('id, name_id, variety, variety_local, status');
        $this->db->where(array('name_id' => $name_id, 'status' => '1'));
        $this->db->from('trv_crop_variety_master');
        return $this->db->get()->result();
    }
	
	function getseasonList() {
        $this->db->select('id, state_id, season, status');
        $this->db->where(array('status' => '1'));
        $this->db->from('trv_season_master');
        return $this->db->get()->result();	
    }
	
	function getfarmimplementsList() {
        $this->db->select('id, Primary_Yes, Name, status');
		$this->db->where(array('status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_farm_implementation');
        return $this->db->get()->result();	
    }
	
	function getfarmimplementsmakemodelList($implements_id) {
		$this->db->select('id, Primary_Yes, Implements_id, Make, Model, status');
        $this->db->where(array('implements_id' => $implements_id, 'status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();	
    }
	
	function getlivestocksList() {
		$this->db->select('id, name, status');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_live_stocks_master');
        return $this->db->get()->result();	
    }
	
	function getlivestockvarietyList($live_stock_id) {
        $this->db->select('id, live_stock_id, variety, status');
		$this->db->where(array('live_stock_id' => $live_stock_id, 'status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_live_stock_variety_master');
        return $this->db->get()->result();	
    }
	
	function getcertifiedproductList() {
        $this->db->select('id, name, status');
        $this->db->order_by("id");
        $this->db->from('trv_product_master');
        return $this->db->get()->result();	
    }
	
	function getjurisdictionList() {
        $this->db->select('id, name, status');
        $this->db->order_by("id");
        $this->db->from('trv_country_master');
        return $this->db->get()->result();	
    }
	
	function updateFarmer($post_data) {
		
        $farmer_details = array(	
	        'profile_name'         => $post_data['farmer_name'],
            'alias_name'           => $post_data['alias_name'],
            'father_spouse_name'   => $post_data['father_spouse_name'],
            'no_of_dependents'     => $post_data['dependents'],
            'mobile'               => $post_data['mobile_number'],
            'aadhar_no'            => preg_replace('/\s+/', '', $post_data['aadhhar_number']),
            'pin_code'             => $post_data['pincode'],
            'state'                => $post_data['state'],
            'district'             => $post_data['district'],
            'block'                => $post_data['block'],
            'panchayat'            => $post_data['gram_panchayat'],
            'village'              => $post_data['village'],
            'street'               => $post_data['street'],
            'door_no'              => $post_data['door_no'],
            'dob'                  => $post_data['dob'],
            'age'                  => $post_data['age'],
            'income_category'      => $post_data['income_category'],
            'is_promotor'          => $post_data['promoter'],
            'status'               => 1,            
        );
		echo $post_data['mobile_number']; die;
		return $this->db->update('trv_farmer', $farmer_details, array('mobile' => $post_data['mobile_number']));
	}

	function getfarmerimplementsList($farmer_id) {
        $this->db->select('trv_farm_implements.id, trv_farm_implements.name as nameid, trv_farm_implementation.name, trv_farm_implements.make as makeid, trv_farm_implementation_make_model.make, trv_farm_implements.model as modelid, trv_farm_implementation_make_model.model, farmer_id, year, available_for_hire, purchase_by_loan, institution, insurance_coverage, ins_validity_from, ins_validity_to, trv_farm_implements.status')
		->join('trv_farm_implementation', 'trv_farm_implements.name = trv_farm_implementation.id')
        ->join('trv_farm_implementation_make_model', 'trv_farm_implementation_make_model.id = trv_farm_implements.make');
		$this->db->where(array('trv_farm_implements.farmer_id' => $farmer_id, 'trv_farm_implements.status' => '1'));
        $this->db->order_by("trv_farm_implements.id");
        $this->db->from('trv_farm_implements');
        return $this->db->get()->result();
    }
	
	function addFarmImplement($post_data) {
        $farmimplements_details = array(	
                'name'                  => $post_data['name'],
                'make'                  => $post_data['make'],
                'farmer_id'             => $post_data['farmer_id'],
                'model'                 => $post_data['model'],      
                'year'                  => $post_data['year'],      
                'available_for_hire'    => $post_data['available_hire'],  
                'purchase_by_loan'      => $post_data['purchase_loan'],
                'institution'           => ($post_data['purchase_loan'] == 1) ? $post_data['institution']:'',       
                'insurance_coverage'   => $post_data['insurance_coverage'],      
                'ins_validity_from'    => ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_from']:'', 
                'ins_validity_to'      => ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_to']:'', 
            );		         
            return $this->db->insert('trv_farm_implements', $farmimplements_details);
    }
	
	function updateFarmImplement($post_data) {          
        $farmimplements_details = array(	
                'name'                  => $post_data['name'],
                'make'                  => $post_data['make'],
                'farmer_id'             => $post_data['farmer_id'],
                'model'                 => $post_data['model'],      
                'year'                  => $post_data['year'],      
                'available_for_hire'    => $post_data['available_hire'],  
                'purchase_by_loan'      => $post_data['purchase_loan'],
                'institution'           => ($post_data['purchase_loan'] == 1) ? $post_data['institution']:'',       
                'insurance_coverage'   => $post_data['insurance_coverage'],      
                'ins_validity_from'    => ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_from']:'', 
                'ins_validity_to'      => ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_to']:'', 
            );		   
            return $this->db->update('trv_farm_implements', $farmimplements_details, array('id' => $post_data['farmimplement_id']));
    }
	
	function getfarmerlivestockslist($farmer_id) {
        $this->db->select('id, farmer_id, live_stock_type, name, variety, live_stock_count, purchase_by_loan, institution, insurance_coverage, ins_validity_from, ins_validity_to, status');
        $this->db->where(array('farmer_id' => $farmer_id, 'status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_live_stocks');
        return $this->db->get()->result();
    }
	
	function addLiveStock($post_data) {
        $livestocks_details = array(	
                'farmer_id'             => $post_data['farmer_id'],
				'live_stock_type'       => $post_data['live_stock_type'],
                'name'                  => $post_data['name'],
                'variety'               => $post_data['variety'],      
                'live_stock_count'      => $post_data['live_stock_count'],      
                'purchase_by_loan'      => $post_data['purchase_loan'],
                'institution'           => ($post_data['purchase_loan'] == 1) ? $post_data['institution']:'',       
                'insurance_coverage'   	=> $post_data['insurance_coverage'],      
                'ins_validity_from'    	=> ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_from']:'', 
                'ins_validity_to'      	=> ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_to']:'',
        );		         
        return $this->db->insert('trv_live_stocks', $livestocks_details);
    }

	function updatelivestocks($post_data) {          
        $farmimplements_details = array(	
                'farmer_id'             => $post_data['farmer_id'],
				'live_stock_type'       => $post_data['live_stock_type'],
                'name'                  => $post_data['name'],
                'variety'               => $post_data['variety'],      
                'live_stock_count'      => $post_data['live_stock_count'],      
                'purchase_by_loan'      => $post_data['purchase_loan'],
                'institution'           => ($post_data['purchase_loan'] == 1) ? $post_data['institution']:'',       
                'insurance_coverage'   	=> $post_data['insurance_coverage'],      
                'ins_validity_from'    	=> ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_from']:'', 
                'ins_validity_to'      	=> ($post_data['insurance_coverage'] == 1) ? $post_data['insurance_validity_to']:'', 
            );		   
            return $this->db->update('trv_live_stocks', $farmimplements_details, array('id' => $post_data['livestocks_id']));
    }

}

?>