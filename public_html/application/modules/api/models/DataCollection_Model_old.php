<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class DataCollection_Model extends CI_Model {
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
	
	function getcropcategoryList() {
        $this->db->select('trv_crop_category_master.id, trv_crop_category_master.name, trv_crop_category_master.name_local, trv_crop_category_master.status');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_crop_category_master');
        return $this->db->get()->result();	
    }

	function getcropsubcategory($category_id) {
        $this->db->where(array('crop_category_id' => $category_id, 'status' => '1'));
        $this->db->from('trv_crop_sub_category_master');
        return $this->db->get()->result();
    }
	
	function getcropname($subcategory_id) {
        $this->db->where(array('sub_category_id' => $subcategory_id, 'status' => '1'));
        $this->db->from('trv_crop_name_master');
        return $this->db->get()->result();
    }
	
	function getcropvariety($name_id) {
        $this->db->where(array('name_id' => $name_id, 'status' => '1'));
        $this->db->from('trv_crop_variety_master');
        return $this->db->get()->result();
    }
	
	function getseasonList() {
        $this->db->where(array('status' => '1'));
        $this->db->from('trv_season_master');
        return $this->db->get()->result();	
    }
	
	function getfarmimplementsList() {
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id");
        $this->db->from('trv_farm_implementation');
        return $this->db->get()->result();	
    }
	
	function getfarmimplementsmakemodelList($implements_id) {
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
}

?>