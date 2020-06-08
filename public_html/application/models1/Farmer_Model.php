<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Farmer_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function farmersProfileList()
    {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.dob, trv_farmer.age, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.status');
        $this->db->order_by("id", "desc");
        $this->db->from('trv_farmer');
        $this->db->where(array('trv_farmer.status' => '1'));
        return $this->db->get()->result();
    }

    public function farmersProfileListByBlock($block_id)
    {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.dob, trv_farmer.age, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.status');
        $this->db->order_by("id", "desc");
        $this->db->from('trv_farmer');
        $this->db->where(array('trv_farmer.block' => $block_id, 'trv_farmer.status' => 1));
        return $this->db->get()->result();
    }

    public function farmersByLocation()
    {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.dob, trv_farmer.age, trv_farmer.mobile, trv_farmer.aadhar_no, trv_farmer.status');
        $this->db->order_by("id", "desc");
        $this->db->from('trv_farmer');
        if ($this->input->post('panchayatCode')) {
            $this->db->where('trv_farmer.panchayat', $this->input->post('panchayatCode'));
        }
        if ($this->input->post('panchayatCode') && $this->input->post('villageCode')) {
            $this->db->where('trv_farmer.village', $this->input->post('villageCode'));
        }
        $this->db->where(array('trv_farmer.state' => $this->input->post('stateCode'), 'trv_farmer.district' => $this->input->post('districtCode'), 'trv_farmer.block' => $this->input->post('blockCode'), 'trv_farmer.status' => 1));
        return $this->db->get()->result();
    }

    public function farmersLandDetailsList()
    {
        $this->db->select('trv_land_holdings.id, trv_land_holdings.farmer_id, trv_land_holdings.ownership_type, trv_land_holdings.name, trv_land_holdings.land_type, trv_land_holdings.address, trv_farmer.profile_name, trv_farmer.land_holdings, trv_farmer.status, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name');
        $this->db->order_by("trv_land_holdings.id", "desc");
        $this->db->where(array('trv_land_holdings.status' => 1));
        $this->db->from('trv_land_holdings');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_land_holdings.farmer_id');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_land_holdings.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_land_holdings.panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_land_holdings.taluk', 'left');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_land_holdings.block', 'left');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_land_holdings.district', 'left');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_land_holdings.state', 'left');
        return $this->db->get()->result();
    }

    public function landByLocation()
    {
        $this->db->select('trv_land_holdings.id, trv_land_holdings.farmer_id, trv_land_holdings.ownership_type, trv_land_holdings.name, trv_land_holdings.land_type, trv_land_holdings.address, trv_farmer.profile_name, trv_farmer.land_holdings, trv_farmer.status, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name');
        $this->db->order_by("trv_land_holdings.id", "desc");
        //$this->db->where(array('trv_land_holdings.status' => 1));
        $this->db->from('trv_land_holdings');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_land_holdings.farmer_id');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_land_holdings.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_land_holdings.panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_land_holdings.taluk', 'left');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_land_holdings.block', 'left');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_land_holdings.district', 'left');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_land_holdings.state', 'left');

        if ($this->input->post('panchayatCode')) {
            $this->db->where('trv_land_holdings.panchayat', $this->input->post('panchayatCode'));
        }
        if ($this->input->post('panchayatCode') && $this->input->post('villageCode')) {
            $this->db->where('trv_land_holdings.village', $this->input->post('villageCode'));
        }
        $this->db->where(array('trv_land_holdings.state' => $this->input->post('stateCode'), 'trv_land_holdings.district' => $this->input->post('districtCode'), 'trv_land_holdings.block' => $this->input->post('blockCode'), 'trv_land_holdings.status' => 1));

        return $this->db->get()->result();
    }

    public function farmersFarmImplementsList()
    {
        $this->db->select('trv_farm_implements.id, trv_farm_implements.farmer_id, trv_farm_implements.name, trv_farm_implements.make, trv_farm_implements.model, trv_farm_implements.year, trv_farm_implements.available_for_hire, trv_farm_implements.purchase_by_loan, trv_farm_implements.insurance_coverage, trv_farmer.farm_implements, trv_farmer.profile_name, trv_farmer.status, trv_farm_implementation.Name As implement_name, trv_farm_implementation_make_model.Make As implement_make, trv_farm_implementation_make_model.Model As implement_model');
        $this->db->order_by("trv_farm_implements.id", "desc");
        $this->db->where(array('trv_farm_implements.status' => 1));
        $this->db->from('trv_farm_implements');
        $this->db->join('trv_farm_implementation', 'trv_farm_implementation.id = trv_farm_implements.name', 'inner');
        $this->db->join('trv_farm_implementation_make_model', 'trv_farm_implementation_make_model.id = trv_farm_implements.make', 'left');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_farm_implements.farmer_id', 'inner');
        return $this->db->get()->result();
    }

    public function farmImplementsByLocation()
    {
        $farmerIds = [];
        $farmer_list = $this->farmersByLocation();
        for ($i=0;$i<count($farmer_list);$i++) {
            array_push($farmerIds, $farmer_list[$i]->id);
        }
        if (count($farmerIds) != 0) {
            $this->db->select('trv_farm_implements.id, trv_farm_implements.farmer_id, trv_farm_implements.name, trv_farm_implements.make, trv_farm_implements.model, trv_farm_implements.year, trv_farm_implements.available_for_hire, trv_farm_implements.purchase_by_loan, trv_farm_implements.insurance_coverage, trv_farmer.farm_implements, trv_farmer.profile_name, trv_farmer.status, trv_farm_implementation.Name As implement_name, trv_farm_implementation_make_model.Make As implement_make, trv_farm_implementation_make_model.Model As implement_model');
            $this->db->order_by("trv_farm_implements.id", "desc");
            $this->db->where_in('trv_farm_implements.farmer_id', $farmerIds);
            $this->db->where(array('trv_farm_implements.status' => 1));
            $this->db->from('trv_farm_implements');
            $this->db->join('trv_farm_implementation', 'trv_farm_implementation.id = trv_farm_implements.name', 'inner');
            $this->db->join('trv_farm_implementation_make_model', 'trv_farm_implementation_make_model.id = trv_farm_implements.make', 'left');
            $this->db->join('trv_farmer', 'trv_farmer.id = trv_farm_implements.farmer_id', 'left');
            return $this->db->get()->result();
        } else {
            return [];
        }
    }

    public function farmersLiveStocksList()
    {
        $this->db->select('trv_live_stocks.id, trv_live_stocks.farmer_id, trv_live_stocks.live_stock_type, trv_live_stocks.name, trv_live_stocks.variety, trv_live_stocks.live_stock_count, trv_farmer.profile_name, trv_farmer.live_stocks, trv_farmer.status, trv_live_stocks_master.name As live_stock_name, trv_live_stock_variety_master.variety As variety_name');
        $this->db->from('trv_live_stocks');
        $this->db->join('trv_live_stocks_master', 'trv_live_stocks_master.id = trv_live_stocks.name', 'inner');
        $this->db->join('trv_live_stock_variety_master', 'trv_live_stock_variety_master.id = trv_live_stocks.variety', 'left');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_live_stocks.farmer_id', 'inner');
        $this->db->order_by("trv_live_stocks.id", "desc");
        $this->db->where(array('trv_live_stocks.status' => 1));
        return $this->db->get()->result();
    }

    public function liveStocksByLocation()
    {
        $farmerIds = [];
        $farmer_list = $this->farmersByLocation();
        for ($i=0;$i<count($farmer_list);$i++) {
            array_push($farmerIds, $farmer_list[$i]->id);
        }
        if (count($farmerIds) != 0) {
            $this->db->select('trv_live_stocks.id, trv_live_stocks.farmer_id, trv_live_stocks.live_stock_type, trv_live_stocks.name, trv_live_stocks.variety, trv_live_stocks.live_stock_count, trv_farmer.profile_name, trv_farmer.live_stocks, trv_farmer.status, trv_live_stocks_master.name As live_stock_name, trv_live_stock_variety_master.variety As variety_name');
            $this->db->from('trv_live_stocks');
            $this->db->join('trv_live_stocks_master', 'trv_live_stocks_master.id = trv_live_stocks.name', 'inner');
            $this->db->join('trv_live_stock_variety_master', 'trv_live_stock_variety_master.id = trv_live_stocks.variety', 'left');
            $this->db->join('trv_farmer', 'trv_farmer.id = trv_live_stocks.farmer_id', 'inner');
            $this->db->order_by("trv_live_stocks.id", "desc");
            $this->db->where(array('trv_live_stocks.status' => 1));
            $this->db->where_in('trv_live_stocks.farmer_id', $farmerIds);
            return $this->db->get()->result();
        } else {
            return [];
        }
    }



    public function addFarmer()
    {
        $total_fields = $this->get_farmer_last_id();
        if (empty($total_fields)) {
            $total_fields = array();
            $total_fields[0]['id'] = 0;
        }
        //$created_farmer_user_id = '6'.$this->input->post('farmer_state').$this->input->post('farmer_district').$this->input->post('farmer_block').$this->input->post('farmer_gram_panchayat').str_pad(($total_fields[0]['id']+1), 4, '0', STR_PAD_LEFT);
        $created_farmer_user_id = '6'.$this->input->post('farmer_gram_panchayat').str_pad(($total_fields[0]['id']+1), 4, '0', STR_PAD_LEFT);
        $farmer_details = array(
'user_id'              => $created_farmer_user_id,
'profile_name'         => $this->input->post('farmer_profile_name'),
'alias_name'           => $this->input->post('farmer_alias_name'),
'father_spouse_name'   => $this->input->post('farmer_father_spouse_name'),
'no_of_dependents'     => $this->input->post('farmer_number_dependents'),
'mobile'               => $this->input->post('farmer_mobile_num'),
'aadhar_no'            => preg_replace('/\s+/', '', $this->input->post('farmer_aadhaar_num')),
'pin_code'             => $this->input->post('farmer_pin_code'),
'state'                => $this->input->post('farmer_state'),
'district'             => $this->input->post('farmer_district'),
'block'                => $this->input->post('farmer_block'),
'taluk'                => $this->input->post('farmer_taluk'),
'panchayat'            => $this->input->post('farmer_gram_panchayat'),
'village'              => $this->input->post('farmer_village'),
'street'               => $this->input->post('farmer_street'),
'door_no'              => $this->input->post('farmer_door_no'),
'dob'                  => $this->input->post('farmer_dob'),
'age'                  => $this->input->post('farmer_age'),
'income_category'      => $this->input->post('farmer_income_category'),
'is_promotor'          => $this->input->post('farmer_ispromotor'),
'is_trader'            => ($this->input->post('farmer_istrader'))?$this->input->post('farmer_istrader'):0,
'land_holdings'        => $this->input->post('farmer_land_holdings'),
'farm_implements'      => $this->input->post('farm_implements'),
'live_stocks'          => $this->input->post('live_stocks'),
'status'               => 1,
'created_by'           => $this->session->userdata('user_id'),
'creater_type'         =>$this->session->userdata('user_type')
);
        $this->db->insert('trv_farmer', $farmer_details);
        $farmer_id = $this->db->insert_id();


        if ($this->input->post('live_stocks') == 1) {
            $livestocks_details = array(
'farmer_id'             => $farmer_id,
'name'                  => $this->input->post('live_stocks_name'),
'live_stock_type'       => $this->input->post('live_stocks_type'),
'variety'               => $this->input->post('live_stocks_variety'),
'live_stock_count'      => $this->input->post('live_stocks_numbers'),
'purchase_by_loan'      => $this->input->post('live_stocks_purchase_loan'),
'institution'           => $this->input->post('live_stocks_institution'),
'insurance_coverage'    => $this->input->post('live_stocks_insurance_coverage'),
'ins_validity_from'     => $this->input->post('live_stocks_insurance_validity_from'),
'ins_validity_to'       => $this->input->post('live_stocks_insurance_validity_to')
);
            $this->db->insert('trv_live_stocks', $livestocks_details);
        }


        if ($this->input->post('farm_implements') == 1) {
            $farmimplements_details = array(
'farmer_id'             => $farmer_id,
'name'                  => $this->input->post('farm_implements_name'),
'make'                  => $this->input->post('farm_implements_make'),
'model'                 => $this->input->post('farm_implements_model'),
'year'                  => $this->input->post('farm_implements_year'),
'available_for_hire'    => $this->input->post('farm_implements_available_year'),
'purchase_by_loan'      => $this->input->post('farm_implements_purchase_loan'),
'institution'           => ($this->input->post('farm_implements_purchase_loan') == 1) ? $this->input->post('farm_implements_institution'):'',
'insurance_coverage'   => $this->input->post('farm_implements_insurance_coverage'),
'ins_validity_from'    => ($this->input->post('farm_implements_insurance_coverage') == 1) ? $this->input->post('farm_implements_insurance_validity_from'):'',
'ins_validity_to'      => ($this->input->post('farm_implements_insurance_coverage') == 1) ? $this->input->post('farm_implements_insurance_validity_to'):'',
);
            $this->db->insert('trv_farm_implements', $farmimplements_details);
        }


        if ($this->input->post('farmer_land_holdings') == 1) {
            $land_identify          = array();
            $land_measurement       = array();
            $land_measurement_unit  = array();

            if ($this->input->post('land_type') == 1) {
                if (is_array($this->input->post('wetland_source_irrigation'))) {
                    $wetland_source_irrigation = $this->input->post('wetland_source_irrigation');
                    $no_of_wells="";
                    $no_of_tubewells="";
                    $irrigation_method="";
                    for ($i=0;$i<count($wetland_source_irrigation);$i++) {
                        if ($wetland_source_irrigation[$i] == 1) {
                            $no_of_wells = $this->input->post('wetland_number_wells');
                        } elseif ($wetland_source_irrigation[$i] == 3) {
                            $no_of_tubewells = $this->input->post('wetland_number_tubewells');
                            //} else if($wetland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('wetland_irrigation_method'));
                        }
                    }
                } else {
                    $no_of_wells="";
                    $no_of_tubewells="";
                    $irrigation_method="";
                }

                if ($this->input->post('wetland_irrigation_method')) {
                    $irrigation_method = ($this->input->post('wetland_irrigation_method')) ? implode(',', $this->input->post('wetland_irrigation_method')):'';
                    $wetland_irrigation_method = $this->input->post('wetland_irrigation_method');
                    for ($j=0;$j<count($wetland_irrigation_method);$j++) {
                        if ($wetland_irrigation_method[$j] == 2 || $wetland_irrigation_method[$j] == 3 || $wetland_irrigation_method[$j] == 4) {
                            $subsidy_availed = $this->input->post('wetland_subsidy_availed');
                        } else {
                            $subsidy_availed = "";
                        }
                    }
                } else {
                    $subsidy_availed = "";
                }


                $land_identify          = $this->input->post('wet_land_identification');
                $land_measurement       = $this->input->post('wetland_land_measurement');
                $land_measurement_unit  = $this->input->post('wetland_land_measurement_unit');


                $land_details = array(
'farmer_id'             => $farmer_id,
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_date_lease'):'',
//'identification'        => $this->input->post('land_identification'),
'land_type'             => $this->input->post('land_type'),
//'land_measurement'      => $this->input->post('wetland_land_measurement'),
//'measurement_unit'      => $this->input->post('wetland_land_measurement_unit'),
'survey_number'         => $this->input->post('wetland_survey_number'),
'source_irrigation'     => ($this->input->post('wetland_source_irrigation'))? implode(',', $this->input->post('wetland_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('wetland_subsidy_availed') == 1) ? $this->input->post('wetland_year_subsidy_Claimed'):'',
'farm_pond'             => $this->input->post('wetland_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('wetland_farm_pond') == 1) ? $this->input->post('wetland_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('wetland_farm_pond') == 2) ? $this->input->post('wetland_construct_form_pond'):'',
'address'               => $this->input->post('wetland_farmer_address'),

'pin_code'              => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_pin_code'):$this->input->post('wetland_pincode'),
'state'                 => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_state'):$this->input->post('wetland_state'),
'district'              => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_district'):$this->input->post('wetland_district'),
'block'                 => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_block'):$this->input->post('wetland_block'),
'taluk'                 => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_taluk'):$this->input->post('wetland_taluk'),
'panchayat'             => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_gram_panchayat'):$this->input->post('wetland_gram_panchayat'),
'village'               => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_village'):$this->input->post('wetland_village'),
'street'                => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_street'):$this->input->post('wetland_street'),
'door_no'               => ($this->input->post('wetland_farmer_address') == 1) ? $this->input->post('farmer_door_no'):$this->input->post('wetland_door_no'),

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):'',
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
            } elseif ($this->input->post('land_type') == 2) {
                if (is_array($this->input->post('dryland_source_irrigation'))) {
                    $dryland_source_irrigation = $this->input->post('dryland_source_irrigation');
                    $no_of_wells="";
                    $no_of_tubewells="";
                    $irrigation_method="";
                    for ($i=0;$i<count($dryland_source_irrigation);$i++) {
                        if ($dryland_source_irrigation[$i] == 1) {
                            $no_of_wells = $this->input->post('dryland_number_wells');
                        } elseif ($dryland_source_irrigation[$i] == 3) {
                            $no_of_tubewells = $this->input->post('dryland_number_tubewells');
                            //} else if($dryland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('dryland_irrigation_method'));
                        }
                    }
                } else {
                    $no_of_wells="";
                    $no_of_tubewells="";
                    $irrigation_method="";
                }

                if ($this->input->post('dryland_irrigation_method')) {
                    $irrigation_method = ($this->input->post('dryland_irrigation_method')) ? implode(',', $this->input->post('dryland_irrigation_method')):'';
                    $dryland_irrigation_method = $this->input->post('dryland_irrigation_method');
                    for ($j=0;$j<count($dryland_irrigation_method);$j++) {
                        if ($dryland_irrigation_method[$j] == 2 || $dryland_irrigation_method[$j] == 3 || $dryland_irrigation_method[$j] == 4) {
                            $subsidy_availed = $this->input->post('dryland_subsidy_availed');
                        } else {
                            $subsidy_availed = "";
                        }
                    }
                } else {
                    $subsidy_availed = "";
                }


                $land_identify          = $this->input->post('dry_land_identification');
                $land_measurement       = $this->input->post('dryland_land_measurement');
                $land_measurement_unit  = $this->input->post('dryland_land_measurement_unit');


                $land_details = array(
'farmer_id'             => $farmer_id,
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_date_lease'):'',
//'identification'        => $this->input->post('land_identification'),
'land_type'             => $this->input->post('land_type'),
//'land_measurement'      => $this->input->post('dryland_land_measurement'),
///'measurement_unit'      => $this->input->post('dryland_land_measurement_unit'),
'survey_number'         => $this->input->post('dryland_survey_number'),
'source_irrigation'     => ($this->input->post('dryland_source_irrigation'))? implode(',', $this->input->post('dryland_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('dryland_subsidy_availed') == 1) ? $this->input->post('dryland_year_subsidy_claimed'):'',
'farm_pond'             => $this->input->post('dryland_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('dryland_farm_pond') == 1) ? $this->input->post('dryland_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('dryland_farm_pond') == 2) ? $this->input->post('dryland_construct_form_pond'):'',
'address'               => $this->input->post('dryland_farmer_address'),

'pin_code'              => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_pin_code'):$this->input->post('dryland_pincode'),
'state'                 => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_state'):$this->input->post('dryland_state'),
'district'              => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_district'):$this->input->post('dryland_district'),
'block'                 => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_block'):$this->input->post('dryland_block'),
'taluk'                 => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_taluk'):$this->input->post('dryland_taluk'),
'panchayat'             => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_gram_panchayat'):$this->input->post('dryland_gram_panchayat'),
'village'               => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_village'):$this->input->post('dryland_village'),
'street'                => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_street'):$this->input->post('dryland_street'),
'door_no'               => ($this->input->post('dryland_farmer_address') == 1) ? $this->input->post('farmer_door_no'):$this->input->post('dryland_door_no'),

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):'',
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
            } else {
                if (is_array($this->input->post('both_source_irrigation'))) {
                    $dryland_source_irrigation = $this->input->post('both_source_irrigation');
                    $no_of_wells="";
                    $no_of_tubewells="";
                    $irrigation_method="";
                    for ($i=0;$i<count($dryland_source_irrigation);$i++) {
                        if ($dryland_source_irrigation[$i] == 1) {
                            $no_of_wells = $this->input->post('both_number_wells');
                        } elseif ($dryland_source_irrigation[$i] == 3) {
                            $no_of_tubewells = $this->input->post('both_number_tubewells');
                            //} else if($dryland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('dryland_irrigation_method'));
                        }
                    }
                } else {
                    $no_of_wells="";
                    $no_of_tubewells="";
                    $irrigation_method="";
                }

                if ($this->input->post('both_irrigation_method')) {
                    $irrigation_method = ($this->input->post('both_irrigation_method')) ? implode(',', $this->input->post('both_irrigation_method')):'';
                    $dryland_irrigation_method = $this->input->post('both_irrigation_method');
                    for ($j=0;$j<count($dryland_irrigation_method);$j++) {
                        if ($dryland_irrigation_method[$j] == 2 || $dryland_irrigation_method[$j] == 3 || $dryland_irrigation_method[$j] == 4) {
                            $subsidy_availed = $this->input->post('both_subsidy_availed');
                        } else {
                            $subsidy_availed = "";
                        }
                    }
                } else {
                    $subsidy_availed = "";
                }


                $land_identify          = $this->input->post('both_land_identification');
                $land_identify_type     = $this->input->post('identity_type');
                $land_measurement       = $this->input->post('both_land_measurement');
                $land_measurement_unit  = $this->input->post('both_land_measurement_unit');

                $land_details = array(
'farmer_id'             => $farmer_id,
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_date_lease'):'',
'land_type'             => $this->input->post('land_type'),
'survey_number'         => $this->input->post('both_survey_number'),
'source_irrigation'     => ($this->input->post('both_source_irrigation'))? implode(',', $this->input->post('both_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('both_subsidy_availed') == 1) ? $this->input->post('both_year_subsidy_claimed'):'',
'farm_pond'             => $this->input->post('both_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('both_farm_pond') == 1) ? $this->input->post('both_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('both_farm_pond') == 2) ? $this->input->post('both_construct_form_pond'):'',
'address'               => $this->input->post('both_farmer_address'),

'pin_code'              => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_pin_code'):$this->input->post('both_pincode'),
'state'                 => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_state'):$this->input->post('both_state'),
'district'              => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_district'):$this->input->post('both_district'),
'block'                 => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_block'):$this->input->post('both_block'),
'taluk'                 => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_taluk'):$this->input->post('both_taluk'),
'panchayat'             => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_gram_panchayat'):$this->input->post('both_gram_panchayat'),
'village'               => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_village'):$this->input->post('both_village'),
'street'                => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_street'):$this->input->post('both_street'),
'door_no'               => ($this->input->post('both_farmer_address') == 1) ? $this->input->post('farmer_door_no'):$this->input->post('both_door_no'),

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):'',
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
            }
            $this->db->insert('trv_land_holdings', $land_details);
            $last_land_inserted_id = $this->db->insert_id();

            if ($this->input->post('land_type') != 3) {
                if (count($land_measurement_unit) != 0) {
                    for ($land_id=0; $land_id<count($land_identify); $land_id++) {
                        if ($land_identify[$land_id] != "" && $land_measurement_unit[$land_id] != "") {
                            $land_identification = array(
'land_holding_id'       => $last_land_inserted_id,
'farmer_id'             => $farmer_id,
'identification'        => $land_identify[$land_id],
'measurement'           => $land_measurement[$land_id],
'measurement_unit'      => $land_measurement_unit[$land_id],
'created_by'            => '',
'created_on'            => date('Y-m-d H:i:s')
);
                            $this->db->insert('trv_land_identify', $land_identification);
                        }
                    }
                }
            } else {
                if (count($land_measurement_unit) != 0) {
                    for ($land_id=0; $land_id<count($land_identify); $land_id++) {
                        if ($land_identify[$land_id] != "" && $land_measurement_unit[$land_id] != "") {
                            $land_identification = array(
'land_holding_id'       => $last_land_inserted_id,
'farmer_id'             => $farmer_id,
'land_type'             => $land_identify_type[$land_id],
'identification'        => $land_identify[$land_id],
'measurement'           => $land_measurement[$land_id],
'measurement_unit'      => $land_measurement_unit[$land_id],
'created_by'            => '',
'created_on'            => date('Y-m-d H:i:s')
);
                            $this->db->insert('trv_land_identify', $land_identification);
                        }
                    }
                }
            }
            //return $farmer_id;
        }

        /** Update the Farmer profile's in authentication table **/
        $profile_details = array(
'user_type'         => 6,
'user_id'           => $created_farmer_user_id,
'username'          => $this->input->post('farmer_mobile_num'),
'password'          => "123456",
'status'            => 1,
'is_verified'       => 1,

'created_by'        => $farmer_id,
'created_on'        => date('Y-m-d H:i:s'),
'updated_by'        => $farmer_id,
'updated_on'        => date('Y-m-d H:i:s')
);
        return $this->db->insert('trv_user_auth', $profile_details);
    }


    public function postLandDetail()
    {
        $land_identify          = array();
        $land_measurement       = array();
        $land_measurement_unit  = array();
        $land_identify_type     = array();

        if ($this->input->post('land_type') == 1) {
            if (is_array($this->input->post('wetland_source_irrigation'))) {
                $wetland_source_irrigation = $this->input->post('wetland_source_irrigation');
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
                for ($i=0;$i<count($wetland_source_irrigation);$i++) {
                    if ($wetland_source_irrigation[$i] == 1) {
                        $no_of_wells = $this->input->post('wetland_number_wells');
                    } elseif ($wetland_source_irrigation[$i] == 3) {
                        $no_of_tubewells = $this->input->post('wetland_number_tubewells');
                        //} else if($wetland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('wetland_irrigation_method'));
                    }
                }
            } else {
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
            }

            if ($this->input->post('wetland_irrigation_method')) {
                $irrigation_method = ($this->input->post('wetland_irrigation_method')) ? implode(',', $this->input->post('wetland_irrigation_method')):'';
                $wetland_irrigation_method = $this->input->post('wetland_irrigation_method');
                for ($j=0;$j<count($wetland_irrigation_method);$j++) {
                    if ($wetland_irrigation_method[$j] == 2 || $wetland_irrigation_method[$j] == 3 || $wetland_irrigation_method[$j] == 4) {
                        $subsidy_availed = $this->input->post('wetland_subsidy_availed');
                    } else {
                        $subsidy_availed = "";
                    }
                }
            } else {
                $subsidy_availed = "";
            }


            $land_identify          = $this->input->post('wet_land_identification');
            $land_measurement       = $this->input->post('wetland_land_measurement');
            $land_measurement_unit  = $this->input->post('wetland_land_measurement_unit');


            $land_details = array(
'farmer_id'             => $this->input->post('land_detail_farmer'),
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_date_lease'):'',
//'identification'        => $this->input->post('land_identification'),
'land_type'             => $this->input->post('land_type'),
//'land_measurement'      => $this->input->post('wetland_land_measurement'),
//'measurement_unit'      => $this->input->post('wetland_land_measurement_unit'),
'survey_number'         => $this->input->post('wetland_survey_number'),
'source_irrigation'     => ($this->input->post('wetland_source_irrigation'))?implode(',', $this->input->post('wetland_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('wetland_subsidy_availed') == 1) ? $this->input->post('wetland_year_subsidy_Claimed'):'',
'farm_pond'             => $this->input->post('wetland_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('wetland_farm_pond') == 1) ? $this->input->post('wetland_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('wetland_farm_pond') == 2) ? $this->input->post('wetland_construct_form_pond'):'',
'address'               => $this->input->post('wetland_farmer_address'),
'pin_code'              => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_pincode'):'',
'state'                 => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_state'):'',
'district'              => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_district'):'',
'block'                 => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_block'):'',
'taluk'                 => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_taluk'):'',
'panchayat'             => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_gram_panchayat'):'',
'village'               => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_village'):'',
'street'                => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_street'):'',
'door_no'               => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_door_no'):'',

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):'',
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
        } elseif ($this->input->post('land_type') == 2) {
            if (is_array($this->input->post('dryland_source_irrigation'))) {
                $dryland_source_irrigation = $this->input->post('dryland_source_irrigation');
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
                for ($i=0;$i<count($dryland_source_irrigation);$i++) {
                    if ($dryland_source_irrigation[$i] == 1) {
                        $no_of_wells = $this->input->post('dryland_number_wells');
                    } elseif ($dryland_source_irrigation[$i] == 3) {
                        $no_of_tubewells = $this->input->post('dryland_number_tubewells');
                        //} else if($dryland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('dryland_irrigation_method'));
                    }
                }
            } else {
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
            }

            if ($this->input->post('dryland_irrigation_method')) {
                $irrigation_method = ($this->input->post('dryland_irrigation_method')) ? implode(',', $this->input->post('dryland_irrigation_method')):'';
                $dryland_irrigation_method = $this->input->post('dryland_irrigation_method');
                for ($j=0;$j<count($dryland_irrigation_method);$j++) {
                    if ($dryland_irrigation_method[$j] == 2 || $dryland_irrigation_method[$j] == 3 || $dryland_irrigation_method[$j] == 4) {
                        $subsidy_availed = $this->input->post('dryland_subsidy_availed');
                    } else {
                        $subsidy_availed = "";
                    }
                }
            } else {
                $subsidy_availed = "";
            }


            $land_identify          = $this->input->post('dry_land_identification');
            $land_measurement       = $this->input->post('dryland_land_measurement');
            $land_measurement_unit  = $this->input->post('dryland_land_measurement_unit');


            $land_details = array(
'farmer_id'             => $this->input->post('land_detail_farmer'),
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_date_lease'):'',
//'identification'        => $this->input->post('land_identification'),
'land_type'             => $this->input->post('land_type'),
//'land_measurement'      => $this->input->post('dryland_land_measurement'),
///'measurement_unit'      => $this->input->post('dryland_land_measurement_unit'),
'survey_number'         => $this->input->post('dryland_survey_number'),
'source_irrigation'     => ($this->input->post('dryland_source_irrigation'))? implode(',', $this->input->post('dryland_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('dryland_subsidy_availed') == 1) ? $this->input->post('dryland_year_subsidy_claimed'):'',
'farm_pond'             => $this->input->post('dryland_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('dryland_farm_pond') == 1) ? $this->input->post('dryland_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('dryland_farm_pond') == 2) ? $this->input->post('dryland_construct_form_pond'):'',
'address'               => $this->input->post('dryland_farmer_address'),
'pin_code'              => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_pincode'):'',
'state'                 => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_state'):'',
'district'              => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_district'):'',
'block'                 => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_block'):'',
'taluk'                 => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_taluk'):'',
'panchayat'             => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_gram_panchayat'):'',
'village'               => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_village'):'',
'street'                => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_street'):'',
'door_no'               => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_door_no'):'',

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):'',
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
        } else {
            if (is_array($this->input->post('both_source_irrigation'))) {
                $dryland_source_irrigation = $this->input->post('both_source_irrigation');
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
                for ($i=0;$i<count($dryland_source_irrigation);$i++) {
                    if ($dryland_source_irrigation[$i] == 1) {
                        $no_of_wells = $this->input->post('both_number_wells');
                    } elseif ($dryland_source_irrigation[$i] == 3) {
                        $no_of_tubewells = $this->input->post('both_number_tubewells');
                        //} else if($dryland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('dryland_irrigation_method'));
                    }
                }
            } else {
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
            }

            if ($this->input->post('both_irrigation_method')) {
                $irrigation_method = ($this->input->post('both_irrigation_method')) ? implode(',', $this->input->post('both_irrigation_method')):'';
                $dryland_irrigation_method = $this->input->post('both_irrigation_method');
                for ($j=0;$j<count($dryland_irrigation_method);$j++) {
                    if ($dryland_irrigation_method[$j] == 2 || $dryland_irrigation_method[$j] == 3 || $dryland_irrigation_method[$j] == 4) {
                        $subsidy_availed = $this->input->post('both_subsidy_availed');
                    } else {
                        $subsidy_availed = "";
                    }
                }
            } else {
                $subsidy_availed = "";
            }


            $land_identify          = $this->input->post('both_land_identification');
            $land_identify_type     = $this->input->post('identity_type');
            $land_measurement       = $this->input->post('both_land_measurement');
            $land_measurement_unit  = $this->input->post('both_land_measurement_unit');

            $land_details = array(
'farmer_id'             => $this->input->post('land_detail_farmer'),
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_date_lease'):'',
'land_type'             => $this->input->post('land_type'),
'survey_number'         => $this->input->post('both_survey_number'),

'source_irrigation'     => ($this->input->post('both_source_irrigation'))? implode(',', $this->input->post('both_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('both_subsidy_availed') == 1) ? $this->input->post('both_year_subsidy_claimed'):'',
'farm_pond'             => $this->input->post('both_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('both_farm_pond') == 1) ? $this->input->post('both_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('both_farm_pond') == 2) ? $this->input->post('both_construct_form_pond'):'',
'address'               => $this->input->post('both_farmer_address'),
'pin_code'              => ($this->input->post('both_farmer_address')) ? $this->input->post('both_pincode'):'',
'state'                 => ($this->input->post('both_farmer_address')) ? $this->input->post('both_state'):'',
'district'              => ($this->input->post('both_farmer_address')) ? $this->input->post('both_district'):'',
'block'                 => ($this->input->post('both_farmer_address')) ? $this->input->post('both_block'):'',
'taluk'                 => ($this->input->post('both_farmer_address')) ? $this->input->post('both_taluk'):'',
'panchayat'             => ($this->input->post('both_farmer_address')) ? $this->input->post('both_gram_panchayat'):'',
'village'               => ($this->input->post('both_farmer_address')) ? $this->input->post('both_village'):'',
'street'                => ($this->input->post('both_farmer_address')) ? $this->input->post('both_street'):'',
'door_no'               => ($this->input->post('both_farmer_address')) ? $this->input->post('both_door_no'):'',

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):'',
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
        }
        $this->db->insert('trv_land_holdings', $land_details);
        $last_land_inserted_id = $this->db->insert_id();

        if ($this->input->post('land_type') != 3) {
            if (count($land_measurement_unit) != 0) {
                for ($land_id=0; $land_id<count($land_identify); $land_id++) {
                    if ($land_identify[$land_id] != "" && $land_measurement_unit[$land_id] != "") {
                        $land_identification = array(
'land_holding_id'       => $last_land_inserted_id,
'farmer_id'             => $this->input->post('land_detail_farmer'),
'identification'        => $land_identify[$land_id],
'measurement'           => $land_measurement[$land_id],
'measurement_unit'      => $land_measurement_unit[$land_id],
'created_by'            => '',
'created_on'            => date('Y-m-d H:i:s')
);
                        $this->db->insert('trv_land_identify', $land_identification);
                    }
                }
            }
        } else {
            if (count($land_measurement_unit) != 0) {
                for ($land_id=0; $land_id<count($land_identify); $land_id++) {
                    if ($land_identify[$land_id] != "" && $land_measurement_unit[$land_id] != "") {
                        $land_identification = array(
'land_holding_id'       => $last_land_inserted_id,
'farmer_id'             => $this->input->post('land_detail_farmer'),
'land_type'             => $land_identify_type[$land_id],
'identification'        => $land_identify[$land_id],
'measurement'           => $land_measurement[$land_id],
'measurement_unit'      => $land_measurement_unit[$land_id],
'created_by'            => '',
'created_on'            => date('Y-m-d H:i:s')
);
                        $this->db->insert('trv_land_identify', $land_identification);
                    }
                }
            }
        }
        return $last_land_inserted_id;
    }


    public function postFarmImplement()
    {
        $farmimplements_details = array(
'farmer_id'             => $this->input->post('farm_implement_farmer'),
'name'                  => $this->input->post('farm_implements_name'),
'make'                  => $this->input->post('farm_implements_make'),
'model'                 => $this->input->post('farm_implements_model'),
'year'                  => $this->input->post('farm_implements_year'),
'available_for_hire'    => $this->input->post('farm_implements_available_hire'),
'purchase_by_loan'      => $this->input->post('farm_implements_purchase_loan'),
'institution'           => ($this->input->post('farm_implements_purchase_loan') == 1) ? $this->input->post('farm_implements_institution'):'',
'insurance_coverage'   => $this->input->post('farm_implements_insurance_coverage'),
'ins_validity_from'    => ($this->input->post('farm_implements_insurance_coverage') == 1) ? $this->input->post('farm_implements_insurance_validity_from'):'',
'ins_validity_to'      => ($this->input->post('farm_implements_insurance_coverage') == 1) ? $this->input->post('farm_implements_insurance_validity_to'):''
);
        return $this->db->insert('trv_farm_implements', $farmimplements_details);
    }


    public function postLiveStock()
    {
        $livestocks_details = array(
'farmer_id'             => $this->input->post('live_stocks_farmer'),
'live_stock_type'       => $this->input->post('live_stocks_type'),
'name'                  => $this->input->post('live_stocks_name'),
'variety'               => $this->input->post('live_stocks_variety'),
'live_stock_count'      => $this->input->post('live_stocks_numbers'),
'purchase_by_loan'      => $this->input->post('live_stocks_purchase_loan'),
'institution'           => $this->input->post('live_stocks_institution'),
'insurance_coverage'    => $this->input->post('live_stocks_insurance_coverage'),
'ins_validity_from'     => $this->input->post('live_stocks_insurance_validity_from'),
'ins_validity_to'       => $this->input->post('live_stocks_insurance_validity_to')
);
        return $this->db->insert('trv_live_stocks', $livestocks_details);
    }




    public function farmerProfileByID($farmer_id)
    {
        $this->db->select('trv_farmer.*, trv_village_master.name As village_name, trv_state_master.name As state_name, trv_district_master.name As district_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_panchayat_master.name As panchayat_name');
        $this->db->from('trv_farmer');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_farmer.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_farmer.panchayat', 'inner');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_farmer.taluk', 'inner');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_farmer.block', 'inner');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_farmer.district', 'inner');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_farmer.state', 'inner');
        $this->db->where(array('trv_farmer.id' => $farmer_id, 'trv_farmer.status' => '1'));
        return $this->db->get()->result();
    }


    public function farmImplements($farmer_id)
    {
        $this->db->select('*');
        $this->db->where(array('trv_farm_implements.farmer_id' => $farmer_id));
        $this->db->from('trv_farm_implements');
        return $this->db->get()->result();
    }

    /*function live_stocks($farmer_id) {
    $this->db->select('*');
    $this->db->where(array('trv_live_stocks.farmer_id' => $farmer_id));
    $this->db->from('trv_live_stocks');
    return $this->db->get()->result();
    }
    function land_holding($farmer_id) {
    $this->db->select('*');
    $this->db->where(array('trv_land_holdings.farmer_id' => $farmer_id));
    $this->db->from('trv_land_holdings');
    return $this->db->get()->result();
    }*/

    public function farm_implements($farmimplement_id)
    {
        $this->db->select('trv_farm_implements.*, trv_farmer.profile_name, trv_farmer.status, trv_farmer.farm_implements');
        $this->db->from('trv_farm_implements');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_farm_implements.farmer_id', 'inner');
        $this->db->where(array('trv_farm_implements.id' => $farmimplement_id));
        return $this->db->get()->result();
    }


    public function live_stocks($livestock_id)
    {
        $this->db->select('trv_live_stocks.*, trv_farmer.profile_name, trv_farmer.status, trv_farmer.live_stocks');
        $this->db->from('trv_live_stocks');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_live_stocks.farmer_id', 'inner');
        $this->db->where(array('trv_live_stocks.id' => $livestock_id));
        return $this->db->get()->result();
    }


    public function land_holding($land_id)
    {
        $this->db->select('trv_land_holdings.*, trv_farmer.profile_name, trv_farmer.status, trv_farmer.land_holdings, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name');
        $this->db->from('trv_land_holdings');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_land_holdings.farmer_id', 'inner');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_land_holdings.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_land_holdings.panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_land_holdings.taluk', 'left');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_land_holdings.block', 'left');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_land_holdings.district', 'left');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_land_holdings.state', 'left');
        $this->db->where(array('trv_land_holdings.id' => $land_id));
        return $this->db->get()->result();
    }


    public function land_identification($land_id)
    {
        $this->db->select('*');
        $this->db->where(array('trv_land_identify.land_holding_id' => $land_id));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_land_identify');
        return $this->db->get()->result();
    }



    public function updateFarmer($farmer_id)
    {
        $farmer_details = array(
'profile_name'         => $this->input->post('farmer_profile_name'),
'alias_name'           => $this->input->post('farmer_alias_name'),
'father_spouse_name'   => $this->input->post('farmer_father_spouse_name'),
'no_of_dependents'     => $this->input->post('farmer_number_dependents'),
'mobile'               => $this->input->post('farmer_mobile_num'),
'aadhar_no'            => preg_replace('/\s+/', '', $this->input->post('farmer_aadhaar_num')),
'pin_code'             => $this->input->post('farmer_pin_code'),
'state'                => $this->input->post('farmer_state'),
'district'             => $this->input->post('farmer_district'),
'block'                => $this->input->post('farmer_block'),
'taluk'                => $this->input->post('farmer_taluk'),
'panchayat'            => $this->input->post('farmer_gram_panchayat'),
'village'              => $this->input->post('farmer_village'),
'street'               => $this->input->post('farmer_street'),
'door_no'              => $this->input->post('farmer_door_no'),
'dob'                  => $this->input->post('farmer_dob'),
'age'                  => $this->input->post('farmer_age'),
'income_category'      => $this->input->post('farmer_income_category'),
'is_promotor'          => ($this->input->post('farmer_ispromotor'))?$this->input->post('farmer_ispromotor'):0,
'is_trader'            => ($this->input->post('farmer_istrader'))?$this->input->post('farmer_istrader'):0,
'land_holdings'        => $this->input->post('farmer_land_holdings'),
'farm_implements'      => $this->input->post('farm_implements'),
'live_stocks'          => $this->input->post('live_stocks'),
'status'               => 1,
'updated_by'           => $this->session->userdata('user_id')
);

        if (!empty($_FILES['farmer_photo']['name'])) {
            //$delete_files(asset_url("uploads/farmer/" . $user->user_avatar));
            $config['upload_path'] = 'assets/uploads/farmer';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']	= 100;
            $config['encrypt_name']	= true;
            $config['overwrite'] = true;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('farmer_photo')) {
                echo $this->upload->display_errors();
                return false;
            } else {
                $img_data  = $this->upload->data();

                $photodetails = array(
'photo' => $img_data['file_name']
);
                $this->db->update('trv_farmer', $photodetails, array('id' => $farmer_id));
            }
        }
        return $this->db->update('trv_farmer', $farmer_details, array('id' => $farmer_id));
    }


    public function updateLandDetail($land_id)
    {
        if ($this->input->post('land_type') == 1) {
            if (is_array($this->input->post('wetland_source_irrigation'))) {
                $wetland_source_irrigation = $this->input->post('wetland_source_irrigation');
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
                for ($i=0;$i<count($wetland_source_irrigation);$i++) {
                    if ($wetland_source_irrigation[$i] == 1) {
                        $no_of_wells = $this->input->post('wetland_number_wells');
                    } elseif ($wetland_source_irrigation[$i] == 3) {
                        $no_of_tubewells = $this->input->post('wetland_number_tubewells');
                        //} else if($wetland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('wetland_irrigation_method'));
                    }
                }
            } else {
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
            }

            if ($this->input->post('wetland_irrigation_method')) {
                $irrigation_method = ($this->input->post('wetland_irrigation_method')) ? implode(',', $this->input->post('wetland_irrigation_method')):'';
                $wetland_irrigation_method = $this->input->post('wetland_irrigation_method');
                for ($j=0;$j<count($wetland_irrigation_method);$j++) {
                    if ($wetland_irrigation_method[$j] == 2 || $wetland_irrigation_method[$j] == 3 || $wetland_irrigation_method[$j] == 4) {
                        $subsidy_availed = $this->input->post('wetland_subsidy_availed');
                    } else {
                        $subsidy_availed = "";
                    }
                }
            } else {
                $subsidy_availed = "";
            }

            $land_identify          = $this->input->post('wet_land_identification');
            $land_ids               = $this->input->post('wet_land_id');
            $land_measurement       = $this->input->post('wetland_land_measurement');
            $land_measurement_unit  = $this->input->post('wetland_land_measurement_unit');

            $land_details = array(
'farmer_id'             => $this->input->post('land_detail_farmer'),
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('both_organic_former'):'',
//'identification'        => $this->input->post('land_identification'),
'land_type'             => $this->input->post('land_type'),
//'land_measurement'      => $this->input->post('wetland_land_measurement'),
//'measurement_unit'      => $this->input->post('wetland_land_measurement_unit'),
'survey_number'         => $this->input->post('wetland_survey_number'),
'source_irrigation'     => ($this->input->post('wetland_source_irrigation'))?implode(',', $this->input->post('wetland_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('wetland_subsidy_availed') == 1) ? $this->input->post('wetland_year_subsidy_Claimed'):'',
'farm_pond'             => $this->input->post('wetland_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('wetland_farm_pond') == 1) ? $this->input->post('wetland_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('wetland_farm_pond') == 2) ? $this->input->post('wetland_construct_form_pond'):'',
'address'               => $this->input->post('wetland_farmer_address'),
'pin_code'              => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_pincode'):'',
'state'                 => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_state'):'',
'district'              => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_district'):'',
'block'                 => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_block'):'',
'taluk'                 => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_taluk'):'',
'panchayat'             => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_gram_panchayat'):'',
'village'               => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_village'):'',
'street'                => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_street'):'',
'door_no'               => ($this->input->post('wetland_farmer_address')) ? $this->input->post('wetland_door_no'):'',

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):'',
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
        } elseif ($this->input->post('land_type') == 2) {
            if (is_array($this->input->post('dryland_source_irrigation'))) {
                $dryland_source_irrigation = $this->input->post('dryland_source_irrigation');
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
                for ($i=0;$i<count($dryland_source_irrigation);$i++) {
                    if ($dryland_source_irrigation[$i] == 1) {
                        $no_of_wells = $this->input->post('dryland_number_wells');
                    } elseif ($dryland_source_irrigation[$i] == 3) {
                        $no_of_tubewells = $this->input->post('dryland_number_tubewells');
                        //} else if($dryland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('dryland_irrigation_method'));
                    }
                }
            } else {
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
            }

            if ($this->input->post('dryland_irrigation_method')) {
                $irrigation_method = ($this->input->post('dryland_irrigation_method')) ? implode(',', $this->input->post('dryland_irrigation_method')):'';
                $dryland_irrigation_method = $this->input->post('dryland_irrigation_method');
                for ($j=0;$j<count($dryland_irrigation_method);$j++) {
                    if ($dryland_irrigation_method[$j] == 2 || $dryland_irrigation_method[$j] == 3 || $dryland_irrigation_method[$j] == 4) {
                        $subsidy_availed = $this->input->post('dryland_subsidy_availed');
                    } else {
                        $subsidy_availed = "";
                    }
                }
            } else {
                $subsidy_availed = "";
            }

            $land_identify          = $this->input->post('dry_land_identification');
            $land_ids               = $this->input->post('dry_land_id');
            $land_measurement       = $this->input->post('dryland_land_measurement');
            $land_measurement_unit  = $this->input->post('dryland_land_measurement_unit');

            $land_details = array(
'farmer_id'             => $this->input->post('land_detail_farmer'),
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('both_organic_former'):'',
//'identification'        => $this->input->post('land_identification'),
'land_type'             => $this->input->post('land_type'),
//'land_measurement'      => $this->input->post('dryland_land_measurement'),
//'measurement_unit'      => $this->input->post('dryland_land_measurement_unit'),
'survey_number'         => $this->input->post('dryland_survey_number'),
'source_irrigation'     => ($this->input->post('dryland_source_irrigation'))?implode(',', $this->input->post('dryland_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('dryland_subsidy_availed') == 1) ? $this->input->post('dryland_year_subsidy_Claimed'):'',
'farm_pond'             => $this->input->post('dryland_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('dryland_farm_pond') == 1) ? $this->input->post('dryland_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('dryland_farm_pond') == 2) ? $this->input->post('dryland_construct_form_pond'):'',
'address'               => $this->input->post('dryland_farmer_address'),
'pin_code'              => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_pincode'):'',
'state'                 => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_state'):'',
'district'              => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_district'):'',
'block'                 => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_block'):'',
'taluk'                 => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_taluk'):'',
'panchayat'             => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_gram_panchayat'):'',
'village'               => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_village'):'',
'street'                => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_street'):'',
'door_no'               => ($this->input->post('dryland_farmer_address')) ? $this->input->post('dryland_door_no'):'',

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):''
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
        } else {
            if (is_array($this->input->post('both_source_irrigation'))) {
                $bothland_source_irrigation = $this->input->post('both_source_irrigation');
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
                for ($i=0;$i<count($bothland_source_irrigation);$i++) {
                    if ($bothland_source_irrigation[$i] == 1) {
                        $no_of_wells = $this->input->post('both_number_wells');
                    } elseif ($bothland_source_irrigation[$i] == 3) {
                        $no_of_tubewells = $this->input->post('both_number_tubewells');
                        //} else if($dryland_source_irrigation[$i] == 7) {
//$irrigation_method = implode(',', $this->input->post('dryland_irrigation_method'));
                    }
                }
            } else {
                $no_of_wells="";
                $no_of_tubewells="";
                $irrigation_method="";
            }

            if ($this->input->post('both_irrigation_method')) {
                $irrigation_method = ($this->input->post('both_irrigation_method')) ? implode(',', $this->input->post('both_irrigation_method')):'';
                $bothland_irrigation_method = $this->input->post('both_irrigation_method');
                for ($j=0;$j<count($bothland_irrigation_method);$j++) {
                    if ($bothland_irrigation_method[$j] == 2 || $bothland_irrigation_method[$j] == 3 || $bothland_irrigation_method[$j] == 4) {
                        $subsidy_availed = $this->input->post('both_subsidy_availed');
                    } else {
                        $subsidy_availed = "";
                    }
                }
            } else {
                $subsidy_availed = "";
            }


            $land_identify          = $this->input->post('both_land_identification');
            $land_ids               = $this->input->post('both_land_id');
            $land_identify_type     = $this->input->post('identity_type');
            $land_measurement       = $this->input->post('both_land_measurement');
            $land_measurement_unit  = $this->input->post('both_land_measurement_unit');

            $land_details = array(
'farmer_id'             => $this->input->post('land_detail_farmer'),
'ownership_type'        => $this->input->post('land_ownership'),
'name'                  => ($this->input->post('land_ownership') == 1 || $this->input->post('land_ownership') == 2) ? $this->input->post('land_owner'):'',
'no_of_lease_years'     => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_year_lease'):'',
'lease_date'            => ($this->input->post('land_ownership') == 2) ? $this->input->post('land_date_lease'):'',
'land_type'             => $this->input->post('land_type'),
'survey_number'         => $this->input->post('both_survey_number'),
'source_irrigation'     => ($this->input->post('both_source_irrigation'))?implode(',', $this->input->post('both_source_irrigation')):"",
'no_of_wells'           => $no_of_wells,
'no_of_tubewells'       => $no_of_tubewells,
'irrigation_method'     => $irrigation_method,
'subsidy_availed'       => $subsidy_availed,
'subsidy_claimed_year'  => ($this->input->post('both_subsidy_availed') == 1) ? $this->input->post('both_year_subsidy_claimed'):'',
'farm_pond'             => $this->input->post('both_farm_pond'),
'farm_subsidy_availed'  => ($this->input->post('both_farm_pond') == 1) ? $this->input->post('both_farm_subsidy_availed'):'',
'construct_form_pond'   => ($this->input->post('both_farm_pond') == 2) ? $this->input->post('both_construct_form_pond'):'',
'address'               => $this->input->post('both_farmer_address'),
'pin_code'              => ($this->input->post('both_farmer_address')) ? $this->input->post('both_pincode'):'',
'state'                 => ($this->input->post('both_farmer_address')) ? $this->input->post('both_state'):'',
'district'              => ($this->input->post('both_farmer_address')) ? $this->input->post('both_district'):'',
'block'                 => ($this->input->post('both_farmer_address')) ? $this->input->post('both_block'):'',
'taluk'                 => ($this->input->post('both_farmer_address')) ? $this->input->post('both_taluk'):'',
'panchayat'             => ($this->input->post('both_farmer_address')) ? $this->input->post('both_gram_panchayat'):'',
'village'               => ($this->input->post('both_farmer_address')) ? $this->input->post('both_village'):'',
'street'                => ($this->input->post('both_farmer_address')) ? $this->input->post('both_street'):'',
'door_no'               => ($this->input->post('both_farmer_address')) ? $this->input->post('both_door_no'):'',

'organic_former'        => $this->input->post('organic_former'),
'organic_certifiation'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_certifiation'):'',
'certifiation'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation'):'',
'certifiation_date'     => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('intial_date_certifiation'):'',
'certification_agency'  => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certifiation_agency_name'):'',
'certifiation_period_from'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_from'):'',
'certifiation_period_to'   => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('effective_period_certifiation_to'):'',
'accreditation_type'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('accreditation_type'):'',
'certified_products'    => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('certified_products'):'',
'jurisdiction'          => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('jurisdiction'):''
//'cultivation_area'      => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('organic_cultivation_area'):'',
//'area_uom'              => ($this->input->post('organic_former') == 1 || $this->input->post('organic_former') == 3) ? $this->input->post('cultivation_area_uom'):''
);
        }
        $this->db->update('trv_land_holdings', $land_details, array('id' => $land_id));

        if ($this->input->post('land_type') != 3 && count($land_measurement_unit) != 0) {
            for ($land_id=0; $land_id<count($land_identify); $land_id++) {
                if ($land_ids[$land_id] != "") {
                    /*$land_identification = array(
                    'identification'        => $land_identify[$land_id],
                    'measurement'           => $land_measurement[$land_id],
                    'measurement_unit'      => $land_measurement_unit[$land_id]
                    );
                    $this->db->update('trv_land_identify', $land_identification, array('id' => $land_ids[$land_id]));*/
                } else {
                    if ($land_identify[$land_id] != "" && $land_measurement_unit[$land_id] != "") {
                        $land_identification = array(
'land_holding_id'       => $this->input->post('land_holding_id'),
'farmer_id'             => $this->input->post('land_detail_farmer'),
'identification'        => $land_identify[$land_id],
'measurement'           => $land_measurement[$land_id],
'measurement_unit'      => $land_measurement_unit[$land_id],
'created_by'            => '',
'created_on'            => date('Y-m-d H:i:s')
);
                        $this->db->insert('trv_land_identify', $land_identification);
                    }
                }
            }
            return $land_id;
        } else {
            for ($land_id=0; $land_id<count($land_identify); $land_id++) {
                if ($land_ids[$land_id] != "") {
                    /*$land_identification = array(
                    'land_type'             => $land_identify_type[$land_id],
                    'identification'        => $land_identify[$land_id],
                    'measurement'           => $land_measurement[$land_id],
                    'measurement_unit'      => $land_measurement_unit[$land_id]
                    );
                    $this->db->update('trv_land_identify', $land_identification, array('id' => $land_ids[$land_id]));*/
                } else {
                    if ($land_identify[$land_id] != "" && $land_measurement_unit[$land_id] != "") {
                        $land_identification = array(
'land_holding_id'       => $this->input->post('land_holding_id'),
'farmer_id'             => $this->input->post('land_detail_farmer'),
'land_type'             => $land_identify_type[$land_id],
'identification'        => $land_identify[$land_id],
'measurement'           => $land_measurement[$land_id],
'measurement_unit'      => $land_measurement_unit[$land_id],
'created_by'            => '',
'created_on'            => date('Y-m-d H:i:s')
);
                        $this->db->insert('trv_land_identify', $land_identification);
                    }
                }
            }
            return $land_id;
        }
    }


    public function updateLiveStock($livestock_id)
    {
        $livestocks_details = array(
'name'                  => $this->input->post('live_stocks_name'),
'live_stock_type'       => $this->input->post('live_stocks_type'),
'variety'               => $this->input->post('live_stocks_variety'),
'live_stock_count'      => $this->input->post('live_stocks_numbers'),
'purchase_by_loan'      => $this->input->post('live_stocks_purchase_loan'),
'institution'           => $this->input->post('live_stocks_institution'),
'insurance_coverage'    => $this->input->post('live_stocks_insurance_coverage'),
'ins_validity_from'     => $this->input->post('live_stocks_insurance_validity_from'),
'ins_validity_to'       => $this->input->post('live_stocks_insurance_validity_to')
);
        return $this->db->update('trv_live_stocks', $livestocks_details, array('id' => $livestock_id));
    }


    public function updateFarmImplement($farmimplement_id)
    {
        $farmimplements_details = array(
'name'                  => $this->input->post('farm_implements_name'),
'make'                  => $this->input->post('farm_implements_make'),
'model'                 => $this->input->post('farm_implements_model'),
'year'                  => $this->input->post('farm_implements_year'),
'available_for_hire'    => $this->input->post('farm_implements_available_hire'),
'purchase_by_loan'      => $this->input->post('farm_implements_purchase_loan'),
'institution'           => ($this->input->post('farm_implements_purchase_loan') == 1) ? $this->input->post('farm_implements_institution'):'',
'insurance_coverage'   => $this->input->post('farm_implements_insurance_coverage'),
'ins_validity_from'    => ($this->input->post('farm_implements_insurance_coverage') == 1) ? $this->input->post('farm_implements_insurance_validity_from'):'',
'ins_validity_to'      => ($this->input->post('farm_implements_insurance_coverage') == 1) ? $this->input->post('farm_implements_insurance_validity_to'):'',
);
        return $this->db->update('trv_farm_implements', $farmimplements_details, array('id' => $farmimplement_id));
    }

    public function delete($farmer_id)
    {
        $farmerid = array(
'status' => 0
);
        return $this->db->update('trv_farmer', $farmerid, array('id' => $farmer_id));
    }
    public function deleteLandDetail($land_id)
    {
        $farmerid = array(
'status' => 0
);
        return $this->db->update('trv_land_holdings', $farmerid, array('id' => $land_id));
    }
    public function deleteFarmImplement($farmimplement_id)
    {
        $farmerid = array(
'status' => 0
);
        return $this->db->update('trv_farm_implements', $farmerid, array('id' => $farmimplement_id));
    }
    public function deleteLiveStock($livestock_id)
    {
        $farmerid = array(
'status' => 0
);
        return $this->db->update('trv_live_stocks', $farmerid, array('id' => $livestock_id));
    }

    public function get_farmer_last_id()
    {
        $query ="select * from trv_farmer order by id DESC limit 1";
        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            return $res->result("array");
        } else {
            return 0;
        }
    }


    public function getLiveStocks($type)
    {
        $this->db->select('trv_live_stocks_master.id,trv_live_stocks_master.name');
        $this->db->where(array('trv_live_stocks_master.type' => $type, 'status' => 1));
        $this->db->from('trv_live_stocks_master');
        return $this->db->get()->result();
    }


    public function getLiveStockVariety($livestock_name)
    {
        $this->db->select('trv_live_stock_variety_master.id, trv_live_stock_variety_master.live_stock_id, trv_live_stock_variety_master.variety');
        $this->db->where(array('trv_live_stock_variety_master.live_stock_id' => $livestock_name, 'status' => 1));
        $this->db->from('trv_live_stock_variety_master');
        return $this->db->get()->result();
    }


    /*function getProductList() {
    $this->db->select('trv_product_master.id,trv_product_master.name');
    $this->db->where(array('status' => 1));
    $this->db->from('trv_product_master');
    return $this->db->get()->result();
    }*/


    public function getFarmImplements()
    {
        $this->db->select('trv_farm_implementation.id, trv_farm_implementation.Name');
        $this->db->where(array('trv_farm_implementation.status' => 1));
        $this->db->from('trv_farm_implementation');
        return $this->db->get()->result();
    }


    public function getFarmImplementsMakeAndModel($name_value)
    {
        $this->db->select('trv_farm_implementation_make_model.id, trv_farm_implementation_make_model.Make, trv_farm_implementation_make_model.Model');
        $this->db->where(array('trv_farm_implementation_make_model.Implements_id' => $name_value, 'trv_farm_implementation_make_model.status' => 1));
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();
    }

    public function getFarmImplementsMake($name_value)
    {
        $this->db->distinct();
        $this->db->select('trv_farm_implementation_make_model.Make');
        $this->db->where(array('trv_farm_implementation_make_model.Implements_id' => $name_value, 'trv_farm_implementation_make_model.status' => 1));
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();
    }

    public function getFarmImplementsModel($imp_id, $name_value)
    {
        $this->db->select('trv_farm_implementation_make_model.id, trv_farm_implementation_make_model.Make, trv_farm_implementation_make_model.Model');
        $this->db->where(array('trv_farm_implementation_make_model.Implements_id' => $imp_id,'trv_farm_implementation_make_model.Make' => $name_value, 'trv_farm_implementation_make_model.status' => 1));
        $this->db->from('trv_farm_implementation_make_model');
        return $this->db->get()->result();
    }

    public function getExistedFarmerName($farmer_id)
    {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name');
        $this->db->from('trv_farmer');
        $this->db->where(array('trv_farmer.id' => $farmer_id, 'trv_farmer.status' => 1));
        return $this->db->get()->result();
    }

    public function getFarmerByUserId($farmer_id)
    {
        $this->db->select('trv_farmer.*');
        $this->db->from('trv_farmer');
        $this->db->where(array('trv_farmer.user_id' => $farmer_id, 'trv_farmer.status' => 1));
        return $this->db->get()->row();
    }
}
