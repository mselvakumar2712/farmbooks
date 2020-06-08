<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class API_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    function getdealerinfo( $state, $district, $taluk ) {
        $this->db->select('dealer_id, dealer_type, dealer_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno');
        $this->db->where(array('state' => $state));
		$this->db->where(array('district' => $district));
		$this->db->where(array('taluk' => $taluk));
        $this->db->order_by("dealer_id", "desc");
        $this->db->from('fpo_dealer');
        return $this->db->get()->result();
    }
	
	function getmarketinfo( $state, $district, $taluk ) {
        $this->db->select('market_id, market_type, market_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno');
        $this->db->where(array('state' => $state));
		$this->db->where(array('district' => $district));
		$this->db->where(array('taluk' => $taluk));
        $this->db->order_by("market_id", "desc");
        $this->db->from('fpo_market');
        return $this->db->get()->result();
    }
	
	function getresearchstationinfo( $state, $district ) {
        $this->db->select('research_id, institution_type, institution_name, state, district, taluk, block, village, post, pincode, phoneno, mobileno, email');
        $this->db->where(array('state' => $state));
		$this->db->where(array('district' => $district));
		//$this->db->where(array('taluk' => $taluk));
        $this->db->order_by("research_id", "desc");
        $this->db->from('fpo_researchstation');
        return $this->db->get()->result();
    }
	
	function getkvkinfo( $state, $district ) {
        $this->db->select('kvk_id, institution_type, institution_name, state, district, taluk, block, village, post, pincode, phoneno, mobileno, email, whatsappno, facebookid');
        $this->db->where(array('state' => $state));
		$this->db->where(array('district' => $district));
		//$this->db->where(array('taluk' => $taluk));
        $this->db->order_by("kvk_id", "desc");
        $this->db->from('fpo_kvk');
        return $this->db->get()->result();
    }
	
	function getstoreinfo( $state, $district, $taluk ) {
        $this->db->select('store_id, store_type, store_name, contact_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno');
        $this->db->where(array('state' => $state));
		$this->db->where(array('district' => $district));
		$this->db->where(array('taluk' => $taluk));
        $this->db->order_by("store_id", "desc");
        $this->db->from('fpo_store');
        return $this->db->get()->result();
    }
	
	function getcompanyinfo( $state, $district) {
        $this->db->select('company_id, cin, company_name, date_of_registration, month_name, state, roc, authorised_capital, paidup_capital, activity_code, activity_description, registered_office_address, registered_email');
        $this->db->where(array('state' => $state));
		//$this->db->where(array('district' => $district));
		//$this->db->where(array('taluk' => $taluk));
        $this->db->order_by("company_id", "desc");
        $this->db->from('fpo_company');
        return $this->db->get()->result();
    }
	
	function getstorageinfo( $state, $district, $taluk ) {
        $this->db->select('storage_id, storage_type, storage_name, contact_name, state, district, taluk, block, village, post, address, pincode, phoneno, mobileno, email');
        $this->db->where(array('state' => $state));
		$this->db->where(array('district' => $district));
		$this->db->where(array('taluk' => $taluk));
        $this->db->order_by("storage_id", "desc");
        $this->db->from('fpo_storage');
        return $this->db->get()->result();
    }
	
	function getTalukByDistrictCode( $district_code ) {
        $this->db->select('trv_taluk_master.id, trv_taluk_master.district_code, trv_taluk_master.taluk_code, trv_taluk_master.name');
        $this->db->where( array('status' => '1') );  
        $this->db->where_in('trv_taluk_master.district_code', $district_code);
        $this->db->order_by("trv_taluk_master.id");
        $this->db->from('trv_taluk_master');
        return $this->db->get()->result();
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
	
	function getfarmimplementsmakeList($implements_id) {
		$this->db->select('Make');
        $this->db->where(array('implements_id' => $implements_id, 'status' => '1'));
        $this->db->order_by("Make");
        $this->db->from('trv_farm_implementation_make_model');
		$this->db->distinct();
        return $this->db->get()->result();	
    }
	
	function getfarmimplementsmodelList($makename) {
		$this->db->select('id, Model');
        $this->db->where(array('Make' => $makename, 'status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();	
    }
	
	function getlivestocksList() {
		$this->db->select('id, type, name, status');
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
	
	function get_farmer_last_id() {
      $query ="select id + 1 as id from trv_farmer order by id DESC limit 1";
      $res = $this->db->query($query)->row();
	  return $res->id;
    }
	
	function check_farmer($mobile_number) {
		  $query ="select count(mobile) as count from trv_farmer where mobile = '".$mobile_number."'";
		  $res = $this->db->query($query)->row();
		  return ($res->count > 0) ? TRUE : FALSE;
	  }
	
	function getfarmerprofile($mobile_number) {
        $this->db->select('trv_farmer.*,DATE_FORMAT(dob, "%d/%m/%Y") dob, trv_village_master.name As village_name, trv_state_master.name As state_name, trv_district_master.name As district_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_panchayat_master.name As panchayat_name');
        $this->db->from('trv_farmer');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_farmer.village', 'inner');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_farmer.panchayat', 'inner');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_farmer.taluk', 'inner');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_farmer.block', 'inner');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_farmer.district', 'inner');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_farmer.state', 'inner');
        $this->db->where(array('trv_farmer.mobile' => $mobile_number, 'trv_farmer.status' => '1'));
        return $this->db->get()->result();
    }

	
	function addFarmer($post_data) {
		 $created_farmer_user_id = '6'.$post_data['state'].$post_data['district'].$post_data['block'].$post_data['gram_panchayat'].str_pad(($this->get_farmer_last_id()), 4, '0', STR_PAD_LEFT);
         $auth_details = array(	
			'user_type' =>'6', 
            'user_id'   => $created_farmer_user_id,
			'username' 	=> $post_data['mobile_number'],
			'password'	=> '123456', 
			'status'	=> '1', 
			'is_verified'	=> '1',
			'created_by'	=> $created_farmer_user_id, 
			'updated_by'	=> $created_farmer_user_id,
			);
		 $this->db->insert('trv_user_auth', $auth_details);
		 
		 $farmer_details = array(	
            'user_id'              => $created_farmer_user_id,
            'profile_name'         => $post_data['profile_name'],
            'alias_name'           => $post_data['alias_name'],
            'father_spouse_name'   => $post_data['father_spouse_name'],
            'no_of_dependents'     => $post_data['dependents'],
            'dependent_name'       => $post_data['dependents_name'],
            'aadhar_no'            => preg_replace('/\s+/', '', $post_data['aadhhar_number']),
            'mobile'               => $post_data['mobile_number'],
            'pin_code'             => $post_data['pincode'],
            'state'                => $post_data['state'],
            'district'             => $post_data['district'],
            'block'                => $post_data['block'],
            'taluk'                => $post_data['taluk'],
            'panchayat'            => $post_data['gram_panchayat'],
            'village'              => $post_data['village'],
            'street'               => $post_data['street'],
            'door_no'              => $post_data['door_no'],
            'dob'                  => ($post_data['dob'] != "")?explode("/",$post_data['dob'])[2].'/'.explode("/",$post_data['dob'])[1].'/'.explode("/",$post_data['dob'])[0] : "0000/00/00",
            'age'                  => $post_data['age'],
            'income_category'      => $post_data['income_category'],
            'is_promotor'          => $post_data['promoter'],
            'is_trader'          => $post_data['trader'],
            'land_holdings'        => 0,
            'farm_implements'      => 0,
            'live_stocks'          => 0,
            'status'               => 1      
         );
         return $this->db->insert('trv_farmer', $farmer_details);
	}
	
	function updateFarmerLand($post_data) {
		$query = $this->db->query("SELECT id FROM trv_land_holdings WHERE farmer_id = '".$post_data['farmer_id']."'");
		if($query->num_rows() >0) {
			$farmer_details = array(	
				'land_holdings'         => 1,           
			);
			return $this->db->update('trv_farmer', $farmer_details, array('id' => $post_data['farmer_id']));
		}
		else
		{
			$farmer_details = array(	
				'land_holdings'         => 0,           
			);
			return $this->db->update('trv_farmer', $farmer_details, array('id' => $post_data['farmer_id']));
				
		}
	}
	
	function updateFarmer($post_data) {
		
        $farmer_details = array(	
	        'profile_name'         => $post_data['farmer_name'],
            'alias_name'           => $post_data['alias_name'],
            'father_spouse_name'   => $post_data['father_spouse_name'],
            'no_of_dependents'     => $post_data['dependents'],
            'dependent_name'       => $post_data['dependents_name'],
            'mobile'               => $post_data['mobile_number'],
            'aadhar_no'            => preg_replace('/\s+/', '', $post_data['aadhhar_number']),
            'pin_code'             => $post_data['pincode'],
            'state'                => $post_data['state'],
            'district'             => $post_data['district'],
            'block'                => $post_data['block'],
            'taluk'                => $post_data['taluk'],
			'panchayat'            => $post_data['gram_panchayat'],
            'village'              => $post_data['village'],
            'street'               => $post_data['street'],
            'door_no'              => $post_data['door_no'],
            'dob'                  => ($post_data['dob'] != "")?explode("/",$post_data['dob'])[2].'/'.explode("/",$post_data['dob'])[1].'/'.explode("/",$post_data['dob'])[0] : "0000/00/00",
            'age'                  => $post_data['age'],
            'income_category'      => $post_data['income_category'],
            'is_promotor'          => $post_data['promoter'],
            'status'               => 1,            
        );
		return $this->db->update('trv_farmer', $farmer_details, array('mobile' => $post_data['mobile_number']));
	}

	function getfarmerimplementsList($farmer_id) {
        $this->db->select('tf.id, tf.name as nameid, tfi.name, tf.make as makeid, tfimm.make, tf.model as modelid, tfimm.model, farmer_id, year, available_for_hire, purchase_by_loan, institution, insurance_coverage, ins_validity_from, ins_validity_to, tf.status')
		->join('trv_farm_implementation as tfi', 'tf.name = tfi.id')
        ->join('trv_farm_implementation_make_model as tfimm', 'tfimm.id = tf.make');
		$this->db->where(array('tf.farmer_id' => $farmer_id, 'tf.status' => '1'));
        $this->db->order_by("tf.id");
        $this->db->from('trv_farm_implements as tf');
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
        $this->db->select('tls.id, tls.farmer_id, live_stock_type, tlst.name as live_stock_type_name, tls.name as stockid, tlsm.name as stockname, tls.variety as varietyid, tlsvm.variety as varietyname, live_stock_count, purchase_by_loan, institution, insurance_coverage, ins_validity_from, ins_validity_to, tls.status')
        ->join('trv_live_stocks_type as tlst', 'tlst.id = tls.live_stock_type')
        ->join('trv_live_stock_variety_master as tlsvm', 'tlsvm.id = tls.variety')
        ->join('trv_live_stocks_master as tlsm', 'tlsm.id = tls.name');
		$this->db->where(array('farmer_id' => $farmer_id, 'tls.status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_live_stocks as tls');
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
	
	function farmersLandDetailsList($farmer_id) {
        $this->db->select('tlh.id, tlh.farmer_id, tlh.ownership_type, tlh.name, tlh.land_type, tlh.address, tf.profile_name, tf.status');
        $this->db->order_by("tlh.id", "desc");
        $this->db->where(array('tlh.farmer_id' => $farmer_id, 'tlh.status' => 1));
        $this->db->from('trv_land_holdings as tlh');
        $this->db->join('trv_farmer as tf', 'tf.id = tlh.farmer_id', 'inner');
        return $this->db->get()->result();
    }
	
	function farmersLandHoldingDetails($land_id) {
        $this->db->select('trv_land_holdings.*, trv_farmer.profile_name, trv_farmer.status, trv_farmer.land_holdings,trv_village_master.name As village_name, trv_state_master.name As state_name, trv_district_master.name As district_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_panchayat_master.name As panchayat_name');        
        $this->db->from('trv_land_holdings');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_land_holdings.farmer_id', 'inner');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_land_holdings.district', 'inner');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_land_holdings.state', 'inner');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_land_holdings.village', 'inner');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_land_holdings.panchayat', 'inner');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_land_holdings.taluk', 'inner');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_land_holdings.block', 'inner');
        $this->db->where(array('trv_land_holdings.id' => $land_id));
        return $this->db->get()->result();
    }
	
	function farmerslandidentificationDetails($land_id) {
        $this->db->select('id, land_holding_id, farmer_id, land_type, identification, longlat');
        $this->db->where('land_holding_id', $land_id);
        $this->db->order_by("id", "desc");
        $this->db->from('trv_land_identify');
        return $this->db->get()->result();
    }
	
	function updatelandholdings($post_data) {
         $post_data = json_decode(file_get_contents('php://input'), true);
			if ($post_data['address'] == 2)
			{
				$farmimplements_details_address = array(
					'pin_code'      		=> $post_data['pin_code'],
					'state'      			=> $post_data['state'],
					'district'      		=> $post_data['district'],
					'block'      			=> $post_data['block'],
					'taluk'      			=> $post_data['taluk'],
					'panchayat'      		=> $post_data['panchayat'],
					'village'      			=> $post_data['village'],
					'street'      			=> $post_data['street'],
					'door_no'      			=> $post_data['door_no'],
					);
					$this->db->update('trv_land_holdings', $farmimplements_details_address, array('id' => $post_data['landholdings_id']));
			}
			
			$farmimplements_details = array(	
                'ownership_type'		=> $post_data['ownership_type'],
				'name'                  => $post_data['name'],
                'no_of_lease_years'     => $post_data['no_of_lease_years'],      
                'lease_date'      		=> $post_data['lease_date'],      
                'land_type'           	=> $post_data['land_type'],
                'land_measurement'   	=> $post_data['land_measurement'],      
                'measurement_unit'    	=> $post_data['measurement_unit'],
				'address'      			=> $post_data['address'],
				'survey_number'			=>$post_data['survey_number'],
				
            );
            return $this->db->update('trv_land_holdings', $farmimplements_details, array('id' => $post_data['landholdings_id']));
    }
	
	function farmerupdatelandidentity($post_data)
	{
		$land_holding_id = $post_data['land_holding_id'];
		$query = $this->db->query("SELECT id FROM trv_land_holdings WHERE farmer_id = '".$post_data['farmer_id']."' ORDER BY id DESC LIMIT 1");
		if($query->num_rows() >0) {
		$row = $query->row();
			if($row->id == $land_holding_id) {
			}
			else {
			   $land_holding_id = $row->id;  
			}
		}		
		if ($post_data['id'] != "")
		{
			$land_identification = array(	
			'land_holding_id'       => $land_holding_id,
			'farmer_id'        		=> $post_data['farmer_id'],
			'land_type'         	=> $post_data['land_type'],
			'identification'		=> $post_data['land_identification'],
			'longlat'      			=> $post_data['latlng']
			);
			return $this->db->update('trv_land_identify', $land_identification, array('id' => $post_data['id']));			
		}
		else
		{
			$land_identification = array(	
			'land_holding_id'       => $land_holding_id,
			'farmer_id'        		=> $post_data['farmer_id'],
			'land_type'         	=> $post_data['land_type'],
			'identification'		=> $post_data['land_identification'],
			'longlat'      			=> $post_data['latlng']
			);
			return $this->db->insert('trv_land_identify', $land_identification);
		}
	}
	
	function updatelandidentificataion($post_data) {
		$post_data = json_decode(file_get_contents('php://input'), true);   
		$land_identify = $post_data['Land_Master'];
		//echo "<pre>";print_r($land_identify);die;
		for($land_id=0; $land_id<count($land_identify); $land_id++) {			
				if($land_identify[$land_id]['id'] != "") {
                        $land_identification = array(	
                            'land_holding_id'       => $land_identify[$land_id]['land_holding_id'],
							'farmer_id'        		=> $land_identify[$land_id]['farmer_id'],
                            'land_type'         	=> $land_identify[$land_id]['land_type'],
                            'identification'		=> $land_identify[$land_id]['land_identification'],
							'longlat'      			=> $land_identify[$land_id]['latlng']
                        );
                        $this->db->update('trv_land_identify', $land_identification, array('id' => $land_identify[$land_id]['id']));
                } else {
					$land_identification = array(	
                            'land_holding_id'   => $land_identify[$land_id]['land_holding_id'],
							'farmer_id'        	=> $land_identify[$land_id]['farmer_id'],
                            'land_type'         => $land_identify[$land_id]['land_type'],
                            'identification'	=> $land_identify[$land_id]['land_identification'],
							'longlat'      		=> $land_identify[$land_id]['latlng'],
							'measurement'		=> 0,
							'measurement_unit'	=> 0,
							'created_by'        => $land_identify[$land_id]['farmer_id'],
                            'created_on'        => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('trv_land_identify', $land_identification);
                }
            }
		return true;
	}
	
	function addlandholdings($post_data) {
         $post_data = json_decode(file_get_contents('php://input'), true); 
         $farmer_id = $post_data['farmer_id'];
		 if ($post_data['address'] == 2)
		 {
	 		$farmimplements_details = array(
				'address'      			=> 	$post_data['address'],
				'ownership_type'		=> 	$post_data['ownership_type'],
				'pin_code'      		=> 	$post_data['pin_code'],
				'state'      			=> 	$post_data['state'],
				'district'      		=> 	$post_data['district'],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
				'block'      			=> 	$post_data['block'],
				'taluk'      			=> 	$post_data['taluk'],
				'panchayat'      		=> 	$post_data['panchayat'],
				'village'      			=> 	$post_data['village'],
				'street'      			=> 	$post_data['street'],
				'door_no'      			=> 	$post_data['door_no'],				
				'name'                  => 	$post_data['name'],
				'no_of_lease_years'     => 	$post_data['no_of_lease_years'],      
				'lease_date'      		=> 	$post_data['lease_date'],      
				'land_type'           	=> 	$post_data['land_type'],
				'land_measurement'   	=> 	$post_data['land_measurement'],      
				'measurement_unit'    	=> 	$post_data['measurement_unit'],			
				'survey_number'			=>	$post_data['survey_number'],
				'farmer_id'             => $farmer_id,   
			);
			return $this->db->insert('trv_land_holdings', $farmimplements_details);
		 }
		else	
		{
			$farmimplements_details_address = array(
				'address'      			=> 	$post_data['address'],
				'ownership_type'		=> 	$post_data['ownership_type'],
				'name'                  => 	$post_data['name'],
				'no_of_lease_years'     => 	$post_data['no_of_lease_years'],      
				'lease_date'      		=> 	$post_data['lease_date'],      
				'land_type'           	=> 	$post_data['land_type'],
				'land_measurement'   	=> 	$post_data['land_measurement'],      
				'measurement_unit'    	=> 	$post_data['measurement_unit'],			
				'survey_number'			=>	$post_data['survey_number'],
				'farmer_id'             => $farmer_id,
			);
			$this->db->insert('trv_land_holdings', $farmimplements_details_address);
			$query =  $this->db->query("UPDATE trv_land_holdings tlh
            JOIN trv_farmer tf
            ON tf.id = tlh.farmer_id
            SET tlh.pin_code = tf.pin_code, tlh.state = tf.state, tlh.district = tf.district, 
			tlh.block = tf.block, tlh.taluk = tf.taluk, tlh.panchayat = tf.panchayat, 
			tlh.village = tf.village, tlh.street = tf.street, tlh.door_no = tf.door_no where tlh.farmer_id = '".$farmer_id."';");
			return $query;
		}
   }
            
 	function farmerssourceofirrigation($land_id) {
        $this->db->select('trv_land_holdings.id as land_holdings_id, source_irrigation,no_of_wells,no_of_tubewells,irrigation_method,subsidy_availed,subsidy_claimed_year,farm_pond,farm_subsidy_availed,construct_form_pond, trv_farmer.profile_name, trv_farmer.status');
        $this->db->from('trv_land_holdings');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_land_holdings.farmer_id', 'inner');
        $this->db->where(array('trv_land_holdings.id' => $land_id));
        return $this->db->get()->result();
    }
	
	function updatesourceofirrigation($post_data) {          
        $farmimplements_details = array(	
                'source_irrigation'  	=> $post_data['source_irrigation'],
				'no_of_wells'       	=> $post_data['no_of_wells'],
                'no_of_tubewells'       => $post_data['no_of_tubewells'],
                'irrigation_method'     => $post_data['irrigation_method'],      
                'subsidy_availed'      	=> $post_data['subsidy_availed'],      
                'subsidy_claimed_year'  => $post_data['subsidy_claimed_year'],
                'farm_pond'           	=> $post_data['farm_pond'],
                'farm_subsidy_availed'  => $post_data['farm_subsidy_availed'],      
                'construct_form_pond'   => $post_data['construct_form_pond'], 
            );	   
            return $this->db->update('trv_land_holdings', $farmimplements_details, array('id' => $post_data['land_holdings_id']));
    }
	
	function farmersorganic($land_id) {
        $this->db->select('trv_land_holdings.id as land_holdings_id, organic_former, organic_certifiation, certifiation, certifiation_date, certification_agency, certifiation_period_from, certifiation_period_to, accreditation_type, certified_products,trv_product_master.name as certified_products_name, jurisdiction, cultivation_area, area_uom, trv_farmer.profile_name, trv_farmer.status');
        $this->db->from('trv_land_holdings');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_land_holdings.farmer_id', 'inner');
		$this->db->join('trv_product_master', 'trv_product_master.id = trv_land_holdings.certified_products', 'left');
        $this->db->where(array('trv_land_holdings.id' => $land_id));
        return $this->db->get()->result();
    }
	
	function updateorganic($post_data) {
        $farmimplements_details = array(	
                'organic_former'  			=> $post_data['organic_former'],
				'organic_certifiation'      => $post_data['organic_certifiation'],
                'certifiation'       		=> $post_data['certifiation'],
                'certifiation_date'     	=> $post_data['certifiation_date'],      
                'certification_agency'      => $post_data['certification_agency'],      
                'certifiation_period_from'  => $post_data['certifiation_period_from'],
                'certifiation_period_to'    => $post_data['certifiation_period_to'],
                'accreditation_type'  		=> $post_data['accreditation_type'],      
                'certified_products'   		=> $post_data['certified_products'],
				'jurisdiction'   			=> $post_data['jurisdiction'],		
				'cultivation_area'   		=> $post_data['cultivation_area'],		
            );	   
            return $this->db->update('trv_land_holdings', $farmimplements_details, array('id' => $post_data['land_holdings_id']));
    }
    
	function getfarmeraddress($farmer_id) {
        $this->db->select('trv_farmer.*, trv_farmer.status, trv_farmer.land_holdings,trv_village_master.name As village_name, trv_state_master.name As state_name, trv_district_master.name As district_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_panchayat_master.name As panchayat_name');        
        $this->db->from('trv_farmer');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_farmer.district', 'inner');
		$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_farmer.state', 'inner');
		$this->db->join('trv_village_master', 'trv_village_master.id = trv_farmer.village', 'inner');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_farmer.panchayat', 'inner');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_farmer.taluk', 'inner');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_farmer.block', 'inner');
        $this->db->where(array('trv_farmer.id' => $farmer_id));
        return $this->db->get()->result();
    }
	
	function getcropnamemaster() {
		$this->db->select('id,name');
        $this->db->where(array('status' => '1'));
        $this->db->from('trv_crop_name_master');
        return $this->db->get()->result();
    }
	
	function getbanknamemaster() {
		$this->db->select('id as bank_name_id,name');
        $this->db->where(array('status' => '1'));
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();
    }
	
	function getbranchname($bank_name_id) {
		$this->db->select('id as branch_name_id,branch_name,ifsc_code');
        $this->db->where(array('status' => '1'));
		$this->db->where(array('bank_name_id' => $bank_name_id));
        $this->db->from('trv_bank_master');
        return $this->db->get()->result();
    }
    
    function getstate_bypincode($post_data) {
        $query = $this->db->query("SELECT state_code FROM `trv_pincode_master` WHERE pincode = '".$post_data['pincode']."' ORDER BY state_code DESC LIMIT 1");
        $row = $query->row();
        $state_code = $row->state_code;
        
        $this->db->select('*');
        $this->db->where(array('status' => '1'));
		$this->db->where(array('state_code' => $state_code));
        $this->db->from('fpo_language');
        return $this->db->get()->result();
    }

}	

?>