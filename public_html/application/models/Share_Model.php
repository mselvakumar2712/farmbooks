<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Share_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function farmerShareApplicationList()
    {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->where(array('trv_share_application.member_type' => 1));
        $this->db->order_by("trv_share_application.id", "desc");
        $this->db->from('trv_share_application');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id');
        $this->db->join('trv_fpo', 'trv_fpo.user_id = trv_share_application.fpo_id');
        $this->db->where(array('trv_share_application.fpo_id' => $this->session->userdata('user_id')));
        return $this->db->get()->result();
    }


    public function shareApplicationList()
    {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->select_sum('trv_share_application.no_of_share');
        $this->db->where(array('trv_share_application.status' => 1));
        //$this->db->order_by("trv_share_application.id", "desc");
        $this->db->group_by(array("trv_share_application.holder_id", "trv_share_application.member_type"));
        $this->db->from('trv_share_application');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.holder_id', 'left');
        $this->db->where(array('trv_share_application.fpo_id' => $this->session->userdata('user_id')));
        return $this->db->get()->result();
    }


    public function fpoShareApplicationList()
    {
        $this->db->select('trv_share_application.*, trv_fpo.producer_organisation_name, trv_fpo.producer_organisation_name As fpo_name');
        $this->db->where(array('trv_share_application.member_type' => 2));
        $this->db->order_by("trv_share_application.id", "desc");
        $this->db->from('trv_share_application');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.holder_id');
        $this->db->where(array('trv_share_application.fpo_id' => $this->session->userdata('user_id')));
        return $this->db->get()->result();
    }

    /** Share Application related functions start here **/
    public function postShareApplication()
    {
        $applicationID = $this->db->select(array('id', 'no_of_share', 'no_share_approved'))->get_where('trv_share_application', array('mobile_number' => $this->input->post('mobile_number'), 'holder_id' => $this->input->post('farmer_name'), 'member_type' => 1, 'status' => 1))->row();
        if (isset($applicationID) && isset($applicationID->no_of_share)) {
            $noOfShare = ($applicationID->no_of_share+$this->input->post('no_of_share'));
            $share_details = array(
             'member_type'           => 1,
             'holder_id'             => $this->input->post('farmer_name'),
             'apply_date'            => $this->input->post('share_date'),
             'no_of_share'           => $noOfShare,
             'mobile_number'         => $this->input->post('mobile_number'),
             'nominee_name'          => $this->input->post('nominee_name'),
             'nominee_father_name'   => $this->input->post('nominee_father_name'),

             'updated_by'            => $this->session->userdata('user_id'),
             'updated_on'            => date('Y-m-d H:i:s')
            );
            return $this->db->update('trv_share_application', $share_details, array('id' => $applicationID->id));
        } else {
            $noOfShare = $this->input->post('no_of_share');
            $share_details = array(
             'member_type'           => 1,
             'fpo_id'                => $this->session->userdata('user_id'),
             'holder_id'             => $this->input->post('farmer_name'),
             'apply_date'            => $this->input->post('share_date'),
             'no_of_share'           => $noOfShare,
             'pan_number'            => $this->input->post('pan_number'),
             'mobile_number'         => $this->input->post('mobile_number'),
             //'aadhaar_number'        => $this->input->post('aadhaar'),
             'nominee_name'          => $this->input->post('nominee_name'),
             'nominee_father_name'   => $this->input->post('nominee_father_name'),

             'updated_by'            => $this->session->userdata('user_id'),
             'updated_on'            => date('Y-m-d H:i:s'),
             'created_by'            => $this->session->userdata('user_id'),
             'created_on'            => date('Y-m-d H:i:s')
            );
            return $this->db->insert('trv_share_application', $share_details);
        }
    }


    public function shareApplicationByID($share_application_id)
    {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'left');
        $this->db->where(array('trv_share_application.id' => $share_application_id));
        $this->db->from('trv_share_application');
        return $this->db->get()->result();
    }

    public function shareApplicationID($share_application_id)
    {
        $this->db->select('trv_share_application.*, trv_fpo.producer_organisation_name As fpo_name');
        $this->db->from('trv_share_application');
        //$this->db->join('trv_share_allotment sal', 'trv_share_allotment.application_id = trv_share_application.id');
        //$this->db->join('trv_state_master', 'trv_state_master.state_code = trv_share_application.state');
        //$this->db->join('trv_district_master', 'trv_district_master.district_code = trv_share_application.district');
        //$this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_share_application.taluk');
        //$this->db->join('trv_block_master', 'trv_block_master.block_code = trv_share_application.block');
        //$this->db->join('trv_village_master', 'trv_village_master.id = trv_share_application.village','left');
        //$this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_share_application.gram_panchayat','left');
        $this->db->where(array('trv_share_application.id' => $share_application_id));
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.holder_id');
        return $this->db->get()->row_array();
    }

    public function updateShareApplication($share_application_id)
    {
        $share_details = array(
         'apply_date'            => $this->input->post('share_date'),
         'no_of_share'           => $this->input->post('no_of_share'),
         'pan_number'            => $this->input->post('pan_number'),
         'aadhaar_number'        => $this->input->post('aadhaar'),
         'nominee_name'          => $this->input->post('nominee_name'),
         'nominee_father_name'   => $this->input->post('nominee_father_name'),
         'updated_by'            => $this->session->userdata('user_id'),
         'updated_on'            => date('Y-m-d H:i:s')
      );
        return $this->db->update('trv_share_application', $share_details, array('id' => $share_application_id));
    }

    public function deleteShareApplication($share_application_id)
    {
        $shareapplicationid = array(
         'status' => 0
      );
        return $this->db->update('trv_share_application', $shareapplicationid, array('id' => $share_application_id));
    }
    /** Share Application End **/



    /** Share Application with FPO related functions start here **/
    public function postShareApplicationByFPO()
    {
        /*$share_details = array(
           'member_type'           => 2,
           'fpo_id'                => $this->session->userdata('user_id'),
           'holder_id'             => $this->input->post('fpo_name'),
           'apply_date'            => $this->input->post('share_date'),
           'no_of_share'           => $this->input->post('no_of_share'),
           'mobile_number'         => $this->input->post('mobile_number'),
           'pan_number'            => $this->input->post('pan_number'),

           'updated_by'            => $this->session->userdata('user_id'),
           'updated_on'            => date('Y-m-d H:i:s'),
           'created_by'            => $this->session->userdata('user_id'),
           'created_on'            => date('Y-m-d H:i:s')
        );
          return $this->db->insert('trv_share_application', $share_details);*/

        $applicationID = $this->db->select(array('id', 'no_of_share', 'no_share_approved'))->get_where('trv_share_application', array('mobile_number' => $this->input->post('mobile_number'), 'holder_id' => $this->input->post('fpo_name'), 'member_type' => 2, 'status' => 1))->row();
        if (isset($applicationID) && isset($applicationID->no_of_share)) {
            $noOfShare = ($applicationID->no_of_share+$this->input->post('no_of_share'));
            $share_details = array(
                'member_type'           => 2,
                'fpo_id'                => $this->session->userdata('user_id'),
                'holder_id'             => $this->input->post('fpo_name'),
                'apply_date'            => $this->input->post('share_date'),
                'no_of_share'           => $noOfShare,
                'mobile_number'         => $this->input->post('mobile_number'),
                'pan_number'            => $this->input->post('pan_number'),

                'updated_by'            => $this->session->userdata('user_id'),
                'updated_on'            => date('Y-m-d H:i:s'),
                'created_by'            => $this->session->userdata('user_id'),
                'created_on'            => date('Y-m-d H:i:s')
            );
            return $this->db->update('trv_share_application', $share_details, array('id' => $applicationID->id));
        } else {
            $noOfShare = $this->input->post('no_of_share');
            $share_details = array(
                'member_type'           => 2,
                'fpo_id'                => $this->session->userdata('user_id'),
                'holder_id'             => $this->input->post('fpo_name'),
                'apply_date'            => $this->input->post('share_date'),
                'no_of_share'           => $noOfShare,
                'mobile_number'         => $this->input->post('mobile_number'),
                'pan_number'            => $this->input->post('pan_number'),

                'updated_by'            => $this->session->userdata('user_id'),
                'updated_on'            => date('Y-m-d H:i:s'),
                'created_by'            => $this->session->userdata('user_id'),
                'created_on'            => date('Y-m-d H:i:s')
            );
            return $this->db->insert('trv_share_application', $share_details);
        }
    }


    public function updateShareApplicationByFPO($share_application_id)
    {
        $share_details = array(
         'apply_date'            => $this->input->post('share_date'),
         'no_of_share'           => $this->input->post('no_of_share'),
         'pin_code'              => $this->input->post('pin_code'),
         'state'                 => $this->input->post('state'),
         'district'              => $this->input->post('district'),
         'block'                 => $this->input->post('area_block'),
         'taluk'                 => $this->input->post('taluk'),
         'gram_panchayat'        => $this->input->post('gram_panchayat'),
         'village'               => $this->input->post('village'),
         'street'                => $this->input->post('street_name'),
         'door_no'               => $this->input->post('door_no'),
         'contact_person'        => $this->input->post('contact_person'),
         'mobile_number'         => $this->input->post('search_fpo'),
         'pan_number'            => $this->input->post('pan_number'),

         'updated_by'            => $this->session->userdata('user_id'),
         'updated_on'            => date('Y-m-d H:i:s')
      );

        return $this->db->update('trv_share_application', $share_details, array('id' => $share_application_id));
    }
    /** Share Application End **/


    /** Share Application Allotment Starts **/
    public function postShareAllotment()
    {
        $share_application = $this->input->post('share_application');
        //$total_avaialable_share = $this->db->select('shares_available')->from('trv_fpo_share_value')->where(array('fpo_id' => $this->session->userdata('user_id'), 'status' => 1))->get()->row();
        //$share_released = array_sum(array_column($share_application, 'share_alloted'));

        $shareAllotted = null;
        //if($share_released <= $total_avaialable_share->shares_available){
        for ($i=0; $i<count($share_application); $i++) {
            if ($share_application[$i]['share_alloted'] != 0 && $share_application[$i]['share_alloted'] > 0) {
                $shareAllotted = $this->getShareHolersByFolioNo($share_application[$i]['folio_no'], $share_application[$i]['holder_id'], $share_application[$i]['member_type']);
                $total_share=0;
                $new_share=0;
                $existing_share=0;
                if ($shareAllotted) {
                    $new_share = $share_application[$i]['share_alloted'];
                    $existing_share = $shareAllotted->total_share_value;
                    //$total_share = $shareAllotted->total_share_value+$share_application[$i]['share_alloted'];
                    $total_share = ($existing_share+$new_share);
                } else {
                    $existing_share = 0;
                    $new_share = $share_application[$i]['share_alloted'];
                    $total_share = ($existing_share+$new_share);
                }

                $share_details = array(
                        'fpo_id'               => $this->session->userdata('user_id'),
                        'application_id'	   => $share_application[$i]['application_id'],
                        'allotment_nature'     => 1,
                        'resolution_number'    => $this->input->post('resolution_number'),
                        'resolution_date'      => $this->input->post('resolution_date'),
                        'member_type'          => $share_application[$i]['member_type'],
                        'holder_id'            => $share_application[$i]['holder_id'],
                        'folio_number'         => $share_application[$i]['folio_no'],
                        'existing_share'       => $existing_share,
                        'new_share'            => $new_share,
                        'total_share_value'    => $total_share,
                        'allotted_date'        => date('Y-m-d'),

                        'created_by'           => $this->session->userdata('user_id'),
                        'created_on'           => date('Y-m-d H:i:s'),
                        'updated_by'           => $this->session->userdata('user_id'),
                        'updated_on'           => date('Y-m-d H:i:s')
                    );
                if (isset($shareAllotted) && $shareAllotted->id && $shareAllotted->folio_number && ($shareAllotted->fpo_id == $this->session->userdata('user_id'))) {
                    $this->db->update('trv_share_allotment', $share_details, array('id' => $shareAllotted->id));
                } else {
                    $this->db->insert('trv_share_allotment', $share_details);
                }

                $share_history = array(
                        'fpo_id'               => $this->session->userdata('user_id'),
                        'allotment_nature'     => 1,
                        'resolution_number'    => $this->input->post('resolution_number'),
                        'resolution_date'      => $this->input->post('resolution_date'),
                        'member_type'          => $share_application[$i]['member_type'],
                        'holder_id'            => $share_application[$i]['holder_id'],
                        'folio_number'         => $share_application[$i]['folio_no'],
                        'share_applied'        => $share_application[$i]['share_applied'],
                        'share_allotted'       => $share_application[$i]['share_alloted'],
                        'total_share_value'    => $share_application[$i]['share_alloted'],
                        'cut_off_date'         => date('Y-m-d H:i:s'),

                        'created_by'           => $this->session->userdata('user_id'),
                        'created_on'           => date('Y-m-d H:i:s'),
                        'updated_by'           => $this->session->userdata('user_id'),
                        'updated_on'           => date('Y-m-d H:i:s')
                    );
                $this->db->insert('trv_share_history', $share_history);
                $share_alloted = !empty($share_application[$i]['share_alloted'])?trim($share_application[$i]['share_alloted']):0;
                $shareapplication_status = array(
                       'status' => 2,
                       'no_share_approved' => $share_alloted,
                       'updated_by'        => $this->session->userdata('user_id'),
                       'updated_on'        => date('Y-m-d H:i:s')
                    );
                $this->db->update('trv_share_application', $shareapplication_status, array('id' => $share_application[$i]['application_id']));
            } else {
                $shareapplication_status = array(
                       'status' 		   => 3,
                       'no_share_approved' => 0,
                       'updated_by'        => $this->session->userdata('user_id'),
                       'updated_on'        => date('Y-m-d H:i:s')
                    );
                $this->db->update('trv_share_application', $shareapplication_status, array('id' => $share_application[$i]['application_id']));
            }
        }
        return true;
        /*} else {
            return false;
        }*/
    }
    /** Share Application Allotment End **/



    public function getLocationByFpo($fpo_id)
    {
        $this->db->select('trv_fpo.id, trv_fpo.pin_code, trv_fpo.state, trv_fpo.district, trv_fpo.block, trv_fpo.taluk_id, trv_fpo.panchayat, trv_fpo.village, trv_fpo.street, trv_fpo.door_no, trv_fpo.mobile, trv_fpo.contact_person, trv_fpo.pan');
        $this->db->where(array('trv_fpo.id' => $fpo_id));
        $this->db->from('trv_fpo');
        return $this->db->get()->result();
    }
    public function getLocationFpo($fpo_id)
    {
        $this->db->select('trv_fpo.id,trv_fpo.user_id, trv_fpo.pin_code, trv_fpo.state, trv_fpo.district, trv_fpo.block, trv_fpo.taluk_id, trv_fpo.panchayat, trv_fpo.village, trv_fpo.street, trv_fpo.door_no, trv_fpo.mobile, trv_fpo.contact_person, trv_fpo.pan');
        $this->db->select('trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo.village');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpo.panchayat');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpo.taluk_id');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpo.block');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpo.district');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo.state');
        $this->db->join('trv_popi', 'trv_popi.user_id = trv_fpo.popi_id');
        $this->db->where(array('trv_fpo.id' => $fpo_id, 'trv_fpo.status' => 1));
        $this->db->from('trv_fpo');
        return $this->db->get()->result();
    }

    public function shareAppliedFarmers()
    {
        $this->db->select('trv_share_application.id, trv_share_application.holder_id, trv_farmer.profile_name');
        $this->db->where(array('trv_share_application.status' => 1));
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'inner');
        $this->db->from('trv_share_application');
        return $this->db->get()->result();
    }


    public function searchFarmer()
    {
        $this->db->select('trv_farmer.id, trv_farmer.mobile, trv_farmer.alias_name, trv_farmer.father_spouse_name, trv_farmer.profile_name');
        if ($this->input->post('mobilenumber') != null && $this->input->post('mobilenumber')) {
            $this->db->where(array('trv_farmer.mobile' => $this->input->post('mobilenumber'), 'trv_farmer.status' => 1));
        } elseif ($this->input->post('aadhaar_number') != null && $this->input->post('aadhaar_number')) {
            $this->db->where(array('trv_farmer.aadhar_no' => preg_replace('/\s+/', '', $this->input->post('aadhaar_number')), 'trv_farmer.status' => 1));
        }
        $this->db->from('trv_farmer');
        return $this->db->get()->result();
    }


    public function searchMemberToFarmer($farmer_id)
    {
        $member_count = $this->db->get_where('trv_member', array('fpo_id' => $this->input->post('fpo_id'), 'member_id' => $farmer_id))->num_rows();
        return $member_count;
    }


    public function searchFPO()
    {
        $this->db->select('trv_fpo.id, trv_fpo.mobile');
        if ($this->input->post('mobilenumber') != null && $this->input->post('mobilenumber')) {
            $this->db->where(array('trv_fpo.mobile' => $this->input->post('mobilenumber'), 'trv_fpo.status' => 1));
        } else {
            //$this->db->where(array('trv_fpo.aadhar_no' => $this->input->post('aadhaar_number'), 'trv_fpo.status' => 1));
        }
        $this->db->from('trv_fpo');
        return $this->db->get()->result();
    }


    public function searchMemberToFPO($fpo_id)
    {
        $member_count = $this->db->get_where('trv_member', array('fpo_id' => $this->input->post('fpo_id'), 'member_id' => $fpo_id))->num_rows();
        return $member_count;
    }


    public function getAllotmentByID($folio_number, $holder_id, $member_type, $type)
    {
        $this->db->select('trv_share_history.*');
        $this->db->where(array('folio_number' => $folio_number, 'holder_id' => $holder_id, 'member_type' => $member_type));
        if ($type == 1) {
            $this->db->where_in('allotment_nature', [1, 2, 3]);
            $this->db->where_in('status', [1, 2, 3]);
        } else {
            $this->db->where_in('allotment_nature', [1, 2, 3, 4]);
            $this->db->where_in('status', [1, 2, 3]);
        }
        $this->db->from('trv_share_history');
        return $this->db->get()->result();
    }
    /*function getAllotmentBy($folio_number, $holder_id, $member_type, $type){
        $this->db->select('trv_share_history.*');
        $this->db->where(array('folio_number' => $folio_number, 'holder_id' => $holder_id, 'member_type' => $member_type, 'status' => 1));
        if($type == 1){
            $this->db->where_in('allotment_nature', [1, 2, 3]);
        } else {
            $this->db->where_in('allotment_nature', [1, 2, 3, 4]);
        }
        $this->db->from('trv_share_allotment');
        return $this->db->get()->result();
        $this->db->select('trv_share_allotment.*');
        $this->db->where(array('folio_number' => $folio_number, 'holder_id' => $holder_id, 'member_type' => $member_type, 'status' => 1));
        $this->db->from('trv_share_allotment');
        return $this->db->get()->result();
    }*/




    public function getShareAlottmentID($fpo_id)
    {
        /*$query ="select * from trv_share_allotment order by id DESC limit 1";
        $res = $this->db->query($query);

        if($res->num_rows() > 0) {
              return $res->result("array");
        }else{
           return false;
        }*/
        $fpo_allotment_count = $this->db->get_where('trv_share_allotment', array('fpo_id' => $fpo_id))->num_rows();
        return $fpo_allotment_count;
    }


    public function fpoDropdownList()
    {
        $this->db->select('trv_fpo.id, trv_fpo.user_id, trv_fpo.producer_organisation_name');
        $this->db->where(array('trv_fpo.status' => 1));
        //$this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'inner');
        $this->db->from('trv_fpo');
        return $this->db->get()->result();
    }


    public function farmerDropdownList()
    {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name');
        $this->db->from('trv_farmer');
        $this->db->distinct();
        $this->db->where(array('trv_farmer.status' => '1'));
        return $this->db->get()->result();
    }

    public function generateApplicationList()
    {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->where(array('trv_share_application.status' => 1, 'trv_share_application.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("trv_share_application.id", "desc");
        $this->db->from('trv_share_application');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.holder_id', 'left');
        return $this->db->get()->result();
    }

    public function generateApplication($shares_id)
    {
        $this->db->select('trv_share_application.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name,trv_fpo.mobile as fpo_mobile, trv_fpo.email as fpo_email,trv_farmer.mobile as farmer_mobile,trv_fpo.land_line as fpo_landline,trv_fpo.pan as fpo_pan,trv_fpo.door_no as fpo_doorno,trv_fpo.street as fpo_street,trv_farmer.street as farmer_street,trv_farmer.door_no as farmer_doorno,trv_farmer.father_spouse_name');
        $this->db->where(array('trv_share_application.status' => 1,'trv_share_application.id' => $shares_id,'trv_share_application.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("trv_share_application.id", "desc");
        $this->db->from('trv_share_application');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_application.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_application.holder_id', 'left');
        return $this->db->get()->row_array();
    }

    public function fpoByID($fpo_id)
    {
        $this->db->select('trv_fpo.*, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_taluk_master.name As taluk_name');
        $this->db->from('trv_fpo');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo.state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpo.district');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpo.panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpo.taluk_id');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpo.block');
        $this->db->where(array('trv_fpo.id' => $fpo_id));
        return $this->db->get()->row_array();
    }

    public function fpoByUser_ID($fpo_id)
    {
        $this->db->select('trv_fpo.*, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_district_master.name As district_name, trv_state_master.name As state_name,trv_taluk_master.name As taluk_name');
        $this->db->from('trv_fpo');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo.state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpo.district');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo.village');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpo.panchayat');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpo.taluk_id');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpo.block');
        $this->db->where(array('trv_fpo.user_id' => $fpo_id));
        return $this->db->get()->row_array();
    }

    /*function getShareBonusID($fpo_id){
        $query ="select resolution_number from trv_share_allotment WHERE status='1' AND fpo_id='$fpo_id' order by id DESC limit 1";
        $res = $this->db->query($query);
        $resolutionNumber=0;
        if($res->num_rows() > 0) {
            $result = $res->result();
            $resolutionNumber=$result[0]->resolution_number;
            //return $res->result("array");
        }else{
            //return false;
            $resolutionNumber=0;
        }
        $fpo_allotment_count = $this->db->get_where('trv_share_allotment', array('fpo_id' => $fpo_id, 'status' => 1))->num_rows();
        return [$fpo_allotment_count, $resolutionNumber];
    }*/

    /*function getShareRightID() {
      $query ="select * from trv_share_allotment WHERE status='1' order by id DESC limit 1";
      //$query ="select * from trv_share_allotment WHERE status='3' order by id DESC limit 1";
      $res = $this->db->query($query);

      if($res->num_rows() > 0) {
            return $res->result("array");
      }else{
         return false;
      }
   }*/


    /** Bonus share issue start **/
    public function shareBonusAppliedListByCutOffDate($cut_off_date)
    {
        $this->db->select('trv_share_history.id, trv_share_history.folio_number, trv_share_history.member_type, trv_share_history.holder_id, trv_share_history.share_allotted');
        $this->db->select('SUM(share_allotted) As total_share_value, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->from('trv_share_history');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_history.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_history.holder_id', 'left');
        $this->db->where(array('trv_share_history.fpo_id' => $this->session->userdata('user_id'), 'trv_share_history.status' => 2));
        $this->db->where_in('trv_share_history.allotment_nature', [1, 3]);
        $this->db->where('trv_share_history.created_on <=', $cut_off_date);
        $this->db->group_by(array("trv_share_history.holder_id", "trv_share_history.member_type"));
        return $this->db->get()->result();
    }

    public function postBonusShares()
    {
        $share_applied = $this->input->post('share_applied');
        for ($i=0; $i<count($share_applied); $i++) {
            $share_details = array(
                //'allotment_nature'     => 2,
                'resolution_number'    => $this->input->post('bonus_resolution_number'),
                'resolution_date'      => $this->input->post('bonus_resolution_date'),
                'folio_number'         => $share_applied[$i]['folio_number'],
                'existing_share'       => $share_applied[$i]['existing_share_value'],
                'new_share'            => $share_applied[$i]['new_share_value'],
                'total_share_value'    => $share_applied[$i]['total_share_value'],

                'updated_by'           => $this->session->userdata('user_id'),
                'updated_on'           => date('Y-m-d H:i:s')
            );
            $this->db->update('trv_share_allotment', $share_details, array('id' => $share_applied[$i]['share_id']));

            $share_history = array(
                'allotment_nature'     => 2,
                'resolution_number'    => $this->input->post('bonus_resolution_number'),
                'resolution_date'      => $this->input->post('bonus_resolution_date'),
                'member_type'          => $share_applied[$i]['member_type'],
                'holder_id'            => $share_applied[$i]['holder_id'],
                'folio_number'         => $share_applied[$i]['folio_number'],
                'share_applied'        => $share_applied[$i]['existing_share_value'],
                'share_allotted'       => $share_applied[$i]['new_share_value'],
                'total_share_value'    => $share_applied[$i]['total_share_value'],
                'cut_off_date'         => $this->input->post('bonus_cutoff_date'),
                'fpo_id'               => $this->session->userdata('user_id'),

                'created_by'           => $this->session->userdata('user_id'),
                'created_on'           => date('Y-m-d H:i:s'),
                'updated_by'           => $this->session->userdata('user_id'),
                'updated_on'           => date('Y-m-d H:i:s')
            );
            $this->db->insert('trv_share_history', $share_history);
        }
        return true;
    }

    public function shareRightAppliedListByCutOffDate($cut_off_date)
    {
        $this->db->select('trv_share_allotment.*, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->from('trv_share_allotment');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_allotment.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_allotment.holder_id', 'left');
        $this->db->where(array('trv_share_allotment.allotment_nature' => 1, 'trv_share_allotment.fpo_id' => $this->session->userdata('user_id'), 'trv_share_allotment.status' => 2));
        $this->db->where('trv_share_allotment.allotted_date <=', $cut_off_date);
        //$this->db->order_by("trv_share_allotment.id", "desc");
        return $this->db->get()->result();
    }

    public function postRightsShares()
    {
        $share_applied = $this->input->post('share_applied');
        for ($i=0; $i<count($share_applied); $i++) {
            $share_details = array(
                //'allotment_nature'     => 3,
                'resolution_number'    => $this->input->post('rights_resolution_number'),
                'resolution_date'      => $this->input->post('rights_resolution_date'),
                'folio_number'         => $share_applied[$i]['folio_number'],
                'existing_share'       => $share_applied[$i]['existing_share_value'],
                'new_share'            => $share_applied[$i]['new_share_value'],
                'total_share_value'    => $share_applied[$i]['total_share_value'],

                'updated_by'           => $this->session->userdata('user_id'),
                'updated_on'           => date('Y-m-d H:i:s')
            );
            $this->db->update('trv_share_allotment', $share_details, array('id' => $share_applied[$i]['share_id']));

            $share_history = array(
                'allotment_nature'     => 3,
                'resolution_number'    => $this->input->post('rights_resolution_number'),
                'resolution_date'      => $this->input->post('rights_resolution_date'),
                'member_type'          => $share_applied[$i]['member_type'],
                'holder_id'            => $share_applied[$i]['holder_id'],
                'folio_number'         => $share_applied[$i]['folio_number'],
                'share_applied'        => $share_applied[$i]['existing_share_value'],
                'share_allotted'       => $share_applied[$i]['new_share_value'],
                'total_share_value'    => $share_applied[$i]['total_share_value'],
                'cut_off_date'         => $this->input->post('rights_cutoff_date'),

                'fpo_id'               => $this->session->userdata('user_id'),
                'created_by'           => $this->session->userdata('user_id'),
                'created_on'           => date('Y-m-d H:i:s'),
                'updated_by'           => $this->session->userdata('user_id'),
                'updated_on'           => date('Y-m-d H:i:s')
            );

            $this->db->insert('trv_share_history', $share_history);
        }

        return true;
    }
    /** Bonus Share issue end **/



    /**Generate certificate issue code start**/
    public function listAllocatedMember()
    {
        $this->db->select('trv_share_history.*, SUM(share_allotted) As total_share_value');//, SUM(total_share_value) As total_share_value');
        $this->db->from('trv_share_history');
        $this->db->where(array('trv_share_history.status' => 1, 'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
        $this->db->where_in('trv_share_history.allotment_nature', [1, 4]);
        $this->db->order_by('trv_share_history.folio_number', 'ASC');
        $this->db->group_by(array('trv_share_history.holder_id', 'trv_share_history.member_type'));
        return $this->db->get()->result();
    }

    public function getAllocatedByID()
    {
        $resolution_date=$this->input->post('resolution_date');
        $resolution_number=$this->input->post('resolution_number');
        if (!empty($resolution_date and $resolution_number)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_number'=> $this->input->post('resolution_number'),'trv_share_history.fpo_id' => $this->session->userdata('user_id'),'trv_share_history.resolution_date'=>$this->input->post('resolution_date'),'trv_share_history.allotment_nature'=>1,'trv_share_history.status'=>1));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        } elseif (!empty($resolution_number)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_number'=> $this->input->post('resolution_number'),'trv_share_history.allotment_nature'=>1,'trv_share_history.fpo_id' => $this->session->userdata('user_id'),'trv_share_history.status'=>1));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        } elseif (!empty($resolution_date)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_date'=>$this->input->post('resolution_date'),'trv_share_history.status'=>1,'trv_share_history.allotment_nature'=>1,'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        }
        return $result;
    }

    public function postOriginalCertificate()
    {
        $list_member = $this->input->post('list_member');
        for ($i=0; $i<count($list_member); $i++) {
            $share_details = array(
                'holder_id'       	=> $list_member[$i]['holder_id'],
                'allotment_nature'  => 1,
                'certificate_num'   => $list_member[$i]['certificate_num'],
                'distinctive_from'  => $list_member[$i]['distinctive_from'],
                'distinctive_to'    => $list_member[$i]['distinctive_to'],
                'updated_by'        => $this->session->userdata('user_id'),
                'updated_on'        => date('Y-m-d H:i:s'),
                'status'        	=> 2
            );
            if ($list_member[$i]['folio_number']) {
                $this->db->update('trv_share_history', $share_details, array('folio_number' => $list_member[$i]['folio_number']));
            } else {
                $this->db->update('trv_share_history', $share_details, array('id' => $list_member[$i]['share_id']));
            }
        }
        return true;
    }
    public function certificatenum()
    {
        $total_fields = $this->Share_Model->get_certificate_last_id();

        if (count($total_fields) == 0) {
            $certificate_num = 0;
        } else {
            $certificate_num = $total_fields[0]['certificate_num'];
        }

        return $certificate_num;
    }

    public function listAllocatedBonus()
    {
        $this->db->select('trv_share_history.*');
        $this->db->from('trv_share_history');
        $this->db->where(array('trv_share_history.status' => 1,'trv_share_history.allotment_nature' => 2,'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by('trv_share_history.folio_number', 'ASC');
        return $this->db->get()->result();
    }

    public function getAllocatedBonusByID()
    {
        $resolution_date=$this->input->post('resolution_date');
        $resolution_number=$this->input->post('resolution_number');
        if (!empty($resolution_date and $resolution_number)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_number'=> $this->input->post('resolution_number'),'trv_share_history.resolution_date'=>$this->input->post('resolution_date'),'trv_share_history.allotment_nature'=>2,'trv_share_history.status'=>1,'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        } elseif (!empty($resolution_number)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_number'=> $this->input->post('resolution_number'),'trv_share_history.allotment_nature'=>2,'trv_share_history.status'=>1,'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        } elseif (!empty($resolution_date)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_date'=>$this->input->post('resolution_date'),'trv_share_history.status'=>1,'trv_share_history.allotment_nature'=>2,'trv_share_history.status'=>1,'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        }

        return $result;
    }

    public function postBonusCertificate()
    {
        $list_member = $this->input->post('list_member');
        for ($i=0; $i<count($list_member); $i++) {
            $share_details = array(
                'holder_id'       	=> $list_member[$i]['holder_id'],
                'allotment_nature'  => 2,
                'certificate_num'   => $list_member[$i]['certificate_num'],
                'distinctive_from'  => $list_member[$i]['distinctive_from'],
                'distinctive_to'    => $list_member[$i]['distinctive_to'],
                'updated_by'        => $this->session->userdata('user_id'),
                'updated_on'        => date('Y-m-d H:i:s'),
                'status'        	=> 2
            );
            if ($list_member[$i]['folio_number']) {
                $this->db->update('trv_share_history', $share_details, array('folio_number' => $list_member[$i]['folio_number']));
            } else {
                $this->db->update('trv_share_history', $share_details, array('id' => $list_member[$i]['share_id']));
            }
        }
        return true;
    }
    public function bonusCertificatenum()
    {
        $total_fields = $this->Share_Model->get_bonuscertificate_last_id();
        if (count($total_fields) == 0) {
            $certificate_num = 0;
        } else {
            $certificate_num = $total_fields[0]['certificate_num'];
        }
        return $certificate_num;
    }

    public function listAllocatedRight()
    {
        $this->db->select('trv_share_history.*');
        $this->db->from('trv_share_history');
        $this->db->where(array('trv_share_history.status' => 1,'trv_share_history.allotment_nature' => 3,'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by('trv_share_history.folio_number', 'ASC');
        return $this->db->get()->result();
    }

    public function getAllocatedRightByID()
    {
        $resolution_date=$this->input->post('resolution_date');
        $resolution_number=$this->input->post('resolution_number');
        if (!empty($resolution_date and $resolution_number)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_number'=> $this->input->post('resolution_number'),'trv_share_history.resolution_date'=>$this->input->post('resolution_date'),'trv_share_history.allotment_nature'=>3,'trv_share_history.fpo_id' => $this->session->userdata('user_id'),'trv_share_history.status' => 1));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        } elseif (!empty($resolution_number)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_number'=> $this->input->post('resolution_number'),'trv_share_history.allotment_nature'=>3,'trv_share_history.fpo_id' => $this->session->userdata('user_id'),'trv_share_history.status' => 1));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        } elseif (!empty($resolution_date)) {
            $this->db->select('trv_share_history.*');
            $this->db->from('trv_share_history');
            $this->db->where(array('trv_share_history.resolution_date'=>$this->input->post('resolution_date'),'trv_share_history.status'=>1,'trv_share_history.allotment_nature'=>3,'trv_share_history.fpo_id' => $this->session->userdata('user_id'),'trv_share_history.status' => 1));
            $this->db->order_by('trv_share_history.folio_number', 'ASC');
            $result= $this->db->get()->result();
        }
        return $result;
    }

    public function postRightCertificate()
    {
        $list_member = $this->input->post('list_member');
        for ($i=0; $i<count($list_member); $i++) {
            $share_details = array(
                'holder_id'       	=> $list_member[$i]['holder_id'],
                'allotment_nature'  => 3,
                'certificate_num'   => $list_member[$i]['certificate_num'],
                'distinctive_from'  => $list_member[$i]['distinctive_from'],
                'distinctive_to'    => $list_member[$i]['distinctive_to'],
                'updated_by'        => $this->session->userdata('user_id'),
                'updated_on'        => date('Y-m-d H:i:s'),
                'status'        	=> 2
            );
            if ($list_member[$i]['folio_number']) {
                $this->db->update('trv_share_history', $share_details, array('folio_number' => $list_member[$i]['folio_number']));
            } else {
                $this->db->update('trv_share_history', $share_details, array('id' => $list_member[$i]['share_id']));
            }
        }
        return true;
    }
    public function rightCertificatenum()
    {
        $total_fields = $this->Share_Model->get_rightcertificate_last_id();
        if (count($total_fields) == 0) {
            $certificate_num = 0;
        } else {
            $certificate_num = $total_fields[0]['certificate_num'];
        }
        return $certificate_num;
    }

    public function get_certificate_last_id()
    {
        $query ="select certificate_num from  trv_share_history WHERE allotment_nature='1' AND fpo_id = ".$this->session->userdata('user_id')." order by folio_number DESC limit 1";
        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }

    public function get_bonuscertificate_last_id()
    {
        $query ="select certificate_num from  trv_share_history WHERE allotment_nature='2' AND fpo_id = ".$this->session->userdata('user_id')."  order by folio_number DESC limit 1";
        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }

    public function get_rightcertificate_last_id()
    {
        $query ="select certificate_num from  trv_share_history WHERE allotment_nature='3' AND fpo_id = ".$this->session->userdata('user_id')."  order by folio_number DESC limit 1";
        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }

    /**Generate Certificate issue end**/


    /**Share Transfer & Share Surrender information**/
    public function getFarmerByMobile()
    {
        if (!empty($this->input->post('mobilenumber'))) {
            return $this->db->get_where('trv_farmer', array('mobile' => $this->input->post('mobilenumber')))->row();
        }
    }

    public function getFPOByMobile()
    {
        if (!empty($this->input->post('mobilenumber'))) {
            return $this->db->get_where('trv_fpo', array('mobile' => $this->input->post('mobilenumber')))->row();
        }
    }


    public function verifyMember($member_id, $member_type)
    {
        $this->db->select('trv_share_allotment.*');
        $this->db->from('trv_share_allotment');
        $this->db->where(array('trv_share_allotment.member_type' => $member_type, 'trv_share_allotment.holder_id' => $member_id, 'trv_share_allotment.status' => 1));
        $this->db->limit(1);
        return $this->db->get()->row();
        //return $this->db->get_where('trv_member', array('member_id' => $member_id, 'fpo_id' => $this->session->userdata('user_id')))->row();
    }


    public function getCertificateInfo()
    {
        $this->db->select('trv_share_history.id, trv_share_history.certificate_num, trv_share_history.distinctive_from, trv_share_history.distinctive_to');
        $this->db->select('MIN(distinctive_from) as distinctive_from, MAX(distinctive_to) as distinctive_to');
        $this->db->from('trv_share_history');
        $this->db->where(array('trv_share_history.holder_id' => $this->input->post('holder_id'), 'trv_share_history.member_type' => $this->input->post('member_type'), 'trv_share_history.folio_number' => $this->input->post('folio_number'), 'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
        $this->db->where_in('trv_share_history.allotment_nature', [1, 2, 3, 4]);
        $this->db->where_not_in('trv_share_history.status', 6);
        return $this->db->get()->result();
    }


    public function getShareByMember($holder_id, $member_type)
    {
        $this->db->select('trv_share_history.*, trv_share_history.share_applied, SUM(trv_share_history.share_allotted) As share_allotted, trv_farmer.profile_name, trv_fpo.producer_organisation_name');
        $this->db->order_by("trv_share_history.id", "desc");
        $this->db->group_by("trv_share_history.folio_number");
        $this->db->from('trv_share_history');
        $this->db->join('trv_farmer', 'trv_farmer.id = trv_share_history.holder_id', 'left');
        $this->db->join('trv_fpo', 'trv_fpo.id = trv_share_history.holder_id', 'left');
        $this->db->where(array('trv_share_history.holder_id' => $holder_id, 'trv_share_history.member_type' => $member_type, 'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
        $this->db->where_in('trv_share_history.allotment_nature', [1, 2, 3, 4]);
        $this->db->where_in('trv_share_history.status', [1, 2, 4]);
        return $this->db->get()->result();
    }


    public function postShareTransfer()
    {
        //echo '<pre>';print_r($this->input->post());die;

        $transferorInfo = $this->getAllotmentByID($this->input->post('folio_number'), $this->input->post('transferor_member_id'), $this->input->post('transferor_member_type'), 1);
        $sourceTotal = 0;
        for ($i=0;$i<count($transferorInfo);$i++) {
            $sourceTotal = ($sourceTotal+$transferorInfo[$i]->share_allotted);
            /*$share_details = array(
                'allotment_nature'  => 4,
                'existing_share'    => $transferorInfo[$i]->total_share_value,
                'new_share'         => '-'.$transferorInfo[$i]->total_share_value,
                'total_share_value' => ($transferorInfo[$i]->total_share_value - $transferorInfo[$i]->total_share_value),
                'status'         	=> 2,

                'updated_by'        => $this->session->userdata('user_id'),
                'updated_on'        => date('Y-m-d H:i:s')
            );
            $this->db->update('trv_share_allotment', $share_details, array('id' => $transferorInfo[$i]->id));

            $applicationData = array("status" => 3);
            $this->db->update('trv_share_application', $applicationData, array('id' => $transferorInfo[$i]->application_id));
            */
            $historyData = array("status" => 3);
            $this->db->update('trv_share_history', $historyData, array('id' => $transferorInfo[$i]->id));//array('folio_number' => $transferorInfo[$i]->folio_number, 'holder_id' => $transferorInfo[$i]->holder_id, 'member_type' => $transferorInfo[$i]->member_type));
        }
        $allotmentID = $this->db->select(array('id', 'application_id'))->get_where('trv_share_allotment', array('folio_number' => $this->input->post('folio_number'), 'holder_id' => $this->input->post('transferor_member_id'), 'member_type' => $this->input->post('transferor_member_type')))->row();
        $share_details = array(
            'allotment_nature'  => 4,
            'existing_share'    => $sourceTotal,
            'new_share'         => '-'.$sourceTotal,
            'total_share_value' => ($sourceTotal - $sourceTotal),
            'status'         	=> 2,

            'updated_by'        => $this->session->userdata('user_id'),
            'updated_on'        => date('Y-m-d H:i:s')
        );
        $this->db->update('trv_share_allotment', $share_details, array('id' => $allotmentID->id));

        $applicationData = array("status" => 3);
        $this->db->update('trv_share_application', $applicationData, array('id' => $allotmentID->application_id));




        $transfereeInfo = $this->db->get_where('trv_share_allotment', array('folio_number' => $this->input->post('transferee_folio'), 'holder_id' => $this->input->post('transferee_member_id'), 'member_type' => $this->input->post('transferee_member_type')))->row();
        if ($transferorInfo) {
            $new_share = $sourceTotal;
            $existing_share = $transfereeInfo->total_share_value;
            $total_share = ($existing_share+$new_share);

            $transferee_details = array(
                'fpo_id'               => $this->session->userdata('user_id'),
                'application_id'	   => $transfereeInfo->application_id,
                'allotment_nature'     => 4,
                'resolution_number'    => $transfereeInfo->resolution_number,
                'resolution_date'      => $transfereeInfo->resolution_date,
                'member_type'          => $transfereeInfo->member_type,
                'holder_id'            => $transfereeInfo->holder_id,
                'folio_number'         => $transfereeInfo->folio_number,
                'existing_share'       => $existing_share,
                'new_share'            => $new_share,
                'total_share_value'    => $total_share,
                'allotted_date'        => date('Y-m-d'),

                'created_by'           => $this->session->userdata('user_id'),
                'created_on'           => date('Y-m-d H:i:s'),
                'updated_by'           => $this->session->userdata('user_id'),
                'updated_on'           => date('Y-m-d H:i:s')
            );
            $this->db->insert('trv_share_allotment', $transferee_details);
        }

        $transferor_history = array(
            'fpo_id'               => $transferorInfo[0]->fpo_id,
            'allotment_nature'     => 4,
            'resolution_number'    => $transferorInfo[0]->resolution_number,
            'resolution_date'      => $transferorInfo[0]->resolution_date,
            'member_type'          => $transferorInfo[0]->member_type,
            'holder_id'            => $transferorInfo[0]->holder_id,
            'folio_number'         => $transferorInfo[0]->folio_number,
            'share_applied'        => 0,
            'share_allotted'       => '-'.$sourceTotal,
            'total_share_value'    => '-'.$sourceTotal,
            'cut_off_date'         => date('Y-m-d H:i:s'),
            'status'         	   => 5,

            'created_by'           => $this->session->userdata('user_id'),
            'created_on'           => date('Y-m-d H:i:s'),
            'updated_by'           => $this->session->userdata('user_id'),
            'updated_on'           => date('Y-m-d H:i:s')
        );
        $this->db->insert('trv_share_history', $transferor_history);

        $transferee_history = array(
            'fpo_id'               => $transfereeInfo->fpo_id,
            'allotment_nature'     => 4,
            'resolution_number'    => $transfereeInfo->resolution_number,
            'resolution_date'      => $transfereeInfo->resolution_date,
            'member_type'          => $transfereeInfo->member_type,
            'holder_id'            => $transfereeInfo->holder_id,
            'folio_number'         => $transfereeInfo->folio_number,
            'share_applied'        => $sourceTotal,
            'share_allotted'       => $sourceTotal,
            'total_share_value'    => $sourceTotal,
            'cut_off_date'         => date('Y-m-d H:i:s'),

            'created_by'           => $this->session->userdata('user_id'),
            'created_on'           => date('Y-m-d H:i:s'),
            'updated_by'           => $this->session->userdata('user_id'),
            'updated_on'           => date('Y-m-d H:i:s')
        );
        return $this->db->insert('trv_share_history', $transferee_history);
    }


    public function postShareSurrender()
    {
        //echo '<pre>';print_r($this->input->post());die;

        $transferorInfo = $this->getAllotmentByID($this->input->post('folio_number'), $this->input->post('transferor_member_id'), $this->input->post('transferor_member_type'), 2);
        $sourceTotal = 0;
        for ($i=0;$i<count($transferorInfo);$i++) {
            $sourceTotal = ($sourceTotal+$transferorInfo[$i]->share_allotted);
            /*$share_details = array(
                'allotment_nature'  => 5,
                'surrender_date	'   => $this->input->post('surrender_date'),
                'reason'            => $this->input->post('reason'),
                'existing_share'    => $transferorInfo[$i]->total_share_value,
                'new_share'         => '-'.$transferorInfo[$i]->total_share_value,
                'total_share_value' => ($transferorInfo[$i]->total_share_value - $transferorInfo[$i]->total_share_value),
                'status'         	=> 3,

                'updated_by'        => $this->session->userdata('user_id'),
                'updated_on'        => date('Y-m-d H:i:s')
            );
            $this->db->update('trv_share_allotment', $share_details, array('id' => $transferorInfo[$i]->id));

            $applicationData = array("status" => 4);
            $this->db->update('trv_share_application', $applicationData, array('id' => $transferorInfo[$i]->application_id));
            */

            $historyData = array("status" => 4);
            $this->db->update('trv_share_history', $historyData, array('id' => $transferorInfo[$i]->id));//array('folio_number' => $transferorInfo[$i]->folio_number, 'holder_id' => $transferorInfo[$i]->holder_id, 'member_type' => $transferorInfo[$i]->member_type));
        }
        $allotmentID = $this->db->select(array('id', 'application_id'))->get_where('trv_share_allotment', array('folio_number' => $this->input->post('folio_number'), 'holder_id' => $this->input->post('transferor_member_id'), 'member_type' => $this->input->post('transferor_member_type')))->row();
        $share_details = array(
            'allotment_nature'  => 5,
            'existing_share'    => $sourceTotal,
            'new_share'         => '-'.$sourceTotal,
            'total_share_value' => ($sourceTotal - $sourceTotal),
            'status'         	=> 3,

            'updated_by'        => $this->session->userdata('user_id'),
            'updated_on'        => date('Y-m-d H:i:s')
        );
        $this->db->update('trv_share_allotment', $share_details, array('id' => $allotmentID->id));

        $applicationData = array("status" => 4);
        $this->db->update('trv_share_application', $applicationData, array('id' => $allotmentID->application_id));


        $share_history = array(
            'fpo_id'               => $this->session->userdata('user_id'),
            'allotment_nature'     => 5,
            'resolution_number'    => $transferorInfo[0]->resolution_number,
            'resolution_date'      => $transferorInfo[0]->resolution_date,
            'member_type'          => $this->input->post('transferor_member_type'),
            'holder_id'            => $this->input->post('transferor_member_id'),
            'folio_number'         => $this->input->post('folio_number'),
            'share_applied'        => 0,
            'share_allotted'       => '-'.$sourceTotal,
            'total_share_value'    => '-'.$sourceTotal,
            'cut_off_date'         => date('Y-m-d H:i:s'),
            'status'         	   => 6,

            'created_by'           => $this->session->userdata('user_id'),
            'created_on'           => date('Y-m-d H:i:s'),
            'updated_by'           => $this->session->userdata('user_id'),
            'updated_on'           => date('Y-m-d H:i:s')
        );
        return $this->db->insert('trv_share_history', $share_history);
    }

    /****/

    public function verifyRegisteredNumber()
    {
        if (!empty($this->input->post('mobilenumber'))) {
            $user_count = $this->db->get_where('trv_user_auth', array('username' => $this->input->post('mobilenumber')))->num_rows();
            return $user_count;
        }
    }

    public function get_farmer_list()
    {
        $data = array();
        $this->db->select('trv_farmer.id, trv_farmer.profile_name, trv_farmer.mobile');
        $this->db->from('trv_farmer');
        $this->db->join('trv_share_allotment', 'trv_farmer.id = trv_share_allotment.holder_id');
        $result = $this->db->get()->result();
        foreach ($result as $obj) {
            $data[$obj->id] = array('profile_name' => $obj->profile_name, 'mobile' => $obj->mobile);
        }
        return $data;
    }

    public function get_fpo_list()
    {
        $data = array();
        $this->db->select('trv_fpo.id, trv_fpo.producer_organisation_name, trv_fpo.mobile');
        $this->db->from('trv_fpo');
        $this->db->join('trv_share_allotment', 'trv_fpo.id = trv_share_allotment.holder_id');
        $result = $this->db->get()->result();
        foreach ($result as $obj) {
            $data[$obj->id] = array('producer_organisation_name' => $obj->producer_organisation_name, 'mobile' => $obj->mobile);
        }
        return $data;
    }

    public function shareHoldersList()
    {
        $data_farmer = $this->get_farmer_list();
        $data_fpo = $this->get_fpo_list();
        $this->db->select('trv_share_history.member_type, trv_share_history.holder_id, trv_share_history.folio_number');
        $this->db->select('SUM(share_allotted) As total_share_value');
        $this->db->from('trv_share_history');
        $this->db->where(array('trv_share_history.fpo_id' => $this->session->userdata('user_id')));
        $this->db->where('trv_share_history.total_share_value >', 0);
        $this->db->where_in('trv_share_history.status', [1, 2]);
        $this->db->group_by(array('trv_share_history.holder_id', 'trv_share_history.member_type'));
        $this->db->order_by("id", "desc");
        $result = $this->db->get()->result();
        foreach ($result as $key => $obj) {
            if ($obj->member_type == 1) {
                $result[$key]->shareholder_name = $data_farmer[$obj->holder_id]['profile_name'];
                $result[$key]->mobile_no = $data_farmer[$obj->holder_id]['mobile'];
            } elseif ($obj->member_type == 2) {
                $result[$key]->shareholder_name = $data_fpo[$obj->holder_id]['producer_organisation_name'];
                $result[$key]->mobile_no = $data_fpo[$obj->holder_id]['mobile'];
            }
        }
        return $result;
    }

    public function viewShareDetails($holder_id, $member_type, $folio_number)
    {
        $data_farmer = $this->get_farmer_list();
        $data_fpo = $this->get_fpo_list();
        $this->db->select('trv_share_history.id, trv_share_history.allotment_nature, trv_share_history.member_type, trv_share_history.holder_id, trv_share_history.share_allotted As total_share_value, trv_share_history.certificate_num, trv_share_history.distinctive_from, trv_share_history.distinctive_to, trv_share_history.created_on');       /*, trv_share_allotment.allotted_date*/
        $this->db->from('trv_share_history');
        //$this->db->where(array('trv_share_allotment.holder_id' => $holder_id, 'trv_share_allotment.member_type' => $member_type, 'trv_share_allotment.folio_number' => $folio_number, 'trv_share_allotment.fpo_id' => $this->session->userdata('user_id'), 'trv_share_allotment.status' => 1));
        $this->db->order_by("trv_share_history.id", "asc");
        //$this->db->join('trv_share_allotment', 'trv_share_history.folio_number = trv_share_allotment.folio_number');
        $this->db->where(array('trv_share_history.holder_id' => $holder_id, 'trv_share_history.member_type' => $member_type, 'trv_share_history.folio_number' => $folio_number, 'trv_share_history.fpo_id' => $this->session->userdata('user_id')));
        $result = $this->db->get()->result();


        foreach ($result as $key => $obj) {
            if ($obj->member_type == 1) {
                $result[$key]->shareholder_name = $data_farmer[$obj->holder_id]['profile_name'];
            } elseif ($obj->member_type == 2) {
                $result[$key]->shareholder_name = $data_fpo[$obj->holder_id]['producer_organisation_name'];
            }
        }
        return $result;
    }
    public function fpoByUserID($user_id)
    {
        $this->db->select('trv_fpo.id,trv_fpo.pin_code,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name, , trv_block_master.name As block_name, , trv_district_master.name As district_name, , trv_state_master.name As state_name,, trv_taluk_master.name As taluk_name');
        $this->db->from('trv_fpo');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_fpo.taluk_id');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_fpo.block');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_fpo.district');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo.state');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_fpo.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_fpo.panchayat', 'left');
        $this->db->where(array('trv_fpo.id' => $user_id, 'trv_fpo.status' => '1'));
        return $this->db->get()->row_array();
    }
    public function farmerProfileByID($farmer_id)
    {
        $this->db->select('trv_farmer.id,trv_farmer.pin_code,trv_village_master.name As village_name, trv_state_master.name As state_name, trv_district_master.name As district_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_panchayat_master.name As panchayat_name');
        $this->db->from('trv_farmer');
        $this->db->join('trv_village_master', 'trv_village_master.id = trv_farmer.village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = trv_farmer.panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = trv_farmer.taluk', 'inner');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = trv_farmer.block', 'inner');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = trv_farmer.district', 'inner');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_farmer.state', 'inner');
        $this->db->where(array('trv_farmer.id' => $farmer_id, 'trv_farmer.status' => '1'));
        return $this->db->get()->row_array();
    }

    public function getshareLastID()
    {
        $this->db->select('trv_fpo_share_value.*');
        $this->db->from('trv_fpo_share_value');
        $this->db->where(array('trv_fpo_share_value.fpo_id' => $this->session->userdata('user_id'),'trv_fpo_share_value.status' => 1));
        $this->db->order_by("trv_fpo_share_value.id", "desc");
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    /** Share holders folio number **/
    public function getShareHolersFolioNo($holder_id, $member_type)
    {
        $this->db->select('trv_share_allotment.folio_number');
        $this->db->from('trv_share_allotment');
        $this->db->where(array('trv_share_allotment.holder_id' => $holder_id, 'trv_share_allotment.member_type' => $member_type, 'trv_share_allotment.fpo_id' => $this->session->userdata('user_id')/*, 'trv_share_allotment.status' => 1*/));
        return $this->db->get()->row();
    }
    public function getShareHoldersFolioCount($fpo_id, $holder_id=null, $member_type=null)
    {
        //$fpo_allotment_count = $this->db->get_where('trv_share_allotment', array('fpo_id' => $fpo_id, 'holder_id' => $holder_id, 'member_type' => $member_type))->num_rows();
        //return $fpo_allotment_count;

        $fpo_allotment_count = $this->db->select('folio_number')->from('trv_share_history')->where(array('fpo_id' => $fpo_id))->order_by('folio_number', 'desc')->get()->row();
        return $fpo_allotment_count;
    }
    public function getShareHolersByFolioNo($folio_no, $holder_id, $member_type)
    {
        $this->db->select('trv_share_allotment.id, trv_share_allotment.folio_number, trv_share_allotment.total_share_value');
        $this->db->from('trv_share_allotment');
        $this->db->order_by("trv_share_allotment.id", "desc");
        $this->db->where(array('trv_share_allotment.holder_id' => $holder_id, 'trv_share_allotment.member_type' => $member_type, 'trv_share_allotment.folio_number' => $folio_no, 'trv_share_allotment.status' => 1));
        return $this->db->get()->row();
    }

    public function fpologginedfarmer()
    {
        $this->db->select('trv_farmer.*,trv_share_allotment.folio_number as folio,trv_share_allotment.total_share_value as total_share,trv_share_allotment.new_share');
        $this->db->where(array('trv_farmer.status' => '1','trv_farmer.created_by' => $this->session->userdata('user_id'),'trv_farmer.creater_type' => $this->session->userdata('user_type')));
        $this->db->join('trv_share_allotment', 'trv_share_allotment.holder_id = trv_farmer.id', 'left');
        $this->db->order_by("trv_farmer.id", "desc");
        $this->db->from('trv_farmer');
        return $this->db->get()->result();
    }

    public function fpofarmervillageList()
    {
        $this->db->select('trv_village_master.*, trv_village_master.name as village_name');
        $this->db->order_by("trv_village_master.id", "desc");
        $this->db->from('trv_village_master');
        $this->db->join('trv_farmer', 'trv_farmer.village = trv_village_master.id', 'left');
        $this->db->where(array('trv_farmer.status' => '1','trv_farmer.created_by' => $this->session->userdata('user_id'),'trv_farmer.creater_type' => $this->session->userdata('user_type')));
        return $this->db->get()->result();
    }

    public function fpofarmerpanchayatList()
    {
        $this->db->select('trv_panchayat_master.*, trv_panchayat_master.name as panchayat_name');
        $this->db->order_by("trv_panchayat_master.id", "desc");
        $this->db->from('trv_panchayat_master');
        $this->db->join('trv_farmer', 'trv_farmer.panchayat = trv_panchayat_master.panchayat_code', 'left');
        $this->db->where(array('trv_farmer.status' => '1','trv_farmer.created_by' => $this->session->userdata('user_id'),'trv_farmer.creater_type' => $this->session->userdata('user_type')));
        return $this->db->get()->result();
    }

    public function fpofarmersByLocation()
    {
        $this->db->select('trv_farmer.id, trv_farmer.profile_name,trv_share_allotment.folio_number,trv_share_allotment.total_share_value,trv_share_allotment.new_share,trv_farmer.dob, trv_farmer.age, trv_farmer.mobile,trv_farmer.door_no,trv_farmer.street, trv_farmer.aadhar_no, trv_farmer.status');
        $this->db->order_by("id", "desc");
        $this->db->from('trv_farmer');
        if ($this->input->post('panchayatCode')) {
            $this->db->where('trv_farmer.panchayat', $this->input->post('panchayatCode'));
        }
        if ($this->input->post('villageCode')) {
            $this->db->where('trv_farmer.village', $this->input->post('villageCode'));
        }
        if ($this->input->post('panchayatCode') && $this->input->post('villageCode')) {
            $this->db->where('trv_farmer.village', $this->input->post('villageCode'));
        }
        $this->db->join('trv_share_allotment', 'trv_share_allotment.holder_id= trv_farmer.id', 'left');
        if (empty($this->input->post('mobile_number'))) {
            $this->db->where(array('trv_farmer.status' => '1','trv_farmer.created_by' => $this->session->userdata('user_id'),'trv_farmer.creater_type' => $this->session->userdata('user_type')));
        } else {
            $this->db->where(array('trv_farmer.status' => '1','trv_farmer.mobile' => $this->input->post('mobile_number')));
        }
        return $this->db->get()->result();
    }
    /** Share holders folio number **/

    /** Share settings Module */
    public function shareValueList()
    {
        $this->db->select('trv_fpo_share_value.*');
        $this->db->from('trv_fpo_share_value');
        $this->db->where(array('trv_fpo_share_value.fpo_id' => $this->session->userdata('user_id')));
        return $this->db->get()->result();
    }
    public function totalShareavailable()
    {
        $get_available_shares = $this->db->select('SUM(share_allotted) as total')->from('trv_share_history')->where(array('fpo_id' => $this->session->userdata('user_id')))->where_in('status', [1, 2, 3, 5])->order_by("id", "desc")->get()->result_array();
        $get_loggined_fpo = $this->db->select('*')->from('trv_fpo_share_value')->where(array('fpo_id' => $this->session->userdata('user_id'),'status' => 1))->order_by("id", "desc")->get()->result_array();
        $get_share_total = $get_available_shares[0]['total'];
        if (count($get_loggined_fpo) !== 0) {
            $get_share_released = $get_loggined_fpo[0]['shares_released'];
        } else {
            $get_share_released = 0;
        }
        $total_available = $get_share_released - $get_share_total;
        return $total_available;
    }

    public function postShareValue()
    {
        $get_loggined_fpo = $this->db->select('*')->from('trv_fpo_share_value')->where(array('fpo_id' => $this->session->userdata('user_id'), 'status' => 1))->get()->result_array();
        $get_available_shares = $this->db->select('SUM(total_share_value) as total')->from('trv_share_allotment')->where(array('fpo_id' => $this->session->userdata('user_id'), 'status' => 1))->order_by("id", "desc")->get()->result_array();
        $get_share_history = $this->db->select('*')->from('trv_fpo_share_value_history')->where(array('fpo_id' => $this->session->userdata('user_id')))->get()->result_array();
        $shares_released = $this->input->post('shares_released');
        $end_date = $this->input->post('shares_released_date');
        $fin_year = date("m") > 3?date("Y-04-01"):date("Y-04-01", strtotime('-1 year'));
        $date = date('Y-m-d', strtotime($end_date .' -1 day'));

        if (!empty($get_loggined_fpo[0]['id'])) {
            $get_share_total = $get_available_shares[0]['total'];
            $get_share_released = $get_loggined_fpo[0]['shares_released']+ $shares_released;
            $available_shares = $get_share_released - $get_share_total;
            if ($this->input->post('paid_capital') ==1) {
                $type = 7;
                $memo = 'Paid Up Capital';
                if ($end_date < $fin_year) {
                    $end_date = $fin_year;
                    $type = 9;
                    $memo = 'Opening Balance';
                }
                $fpo_id = $this->session->userdata('user_id');
                $gl_trans = array(
                      'fpo_id'       	   => $fpo_id ,
                      'voucher_no'         => 'PC_'.$fpo_id ,
                      'type'               => $type,
                      'account_code'       => 3010102,
                      'tran_date'          => $end_date,
                      'amount'             => $this->input->post('sharetotal'),
                      'memo'               => $memo,
                      'status'             => 1
                   );
                $gl_trans_value= $this->db->insert('fpo_gl_trans', $gl_trans);
                $sharetotal=$this->input->post('sharetotal');
                $sharebycash=$this->input->post('by_cash');
                $sharebybank=$this->input->post('by_bank');
                if ($sharebycash != '') {
                    $gl_cash_trans = array(
                     'fpo_id'       		=> $fpo_id ,
                     'voucher_no'         => 'PC_'.$fpo_id ,
                     'type'               => 7,
                     'account_code'       => 4020501,
                     'tran_date'          => $this->input->post('shares_released_date'),
                     'amount'             => '-'.$sharebycash,
                     'memo'               => 'Paid Up Cash',
                     'status'             =>1
                   );
                    $gl_cash_value= $this->db->insert('fpo_gl_trans', $gl_cash_trans);
                }

                if ($sharebycash) {
                    $shareamt = $sharetotal - $sharebycash;
                } else {
                    $shareamt = $sharetotal;
                }

                if ($sharebybank !='' and $sharebybank !=0) {
                    $gl_bank_trans = array(
                     'fpo_id'       		=> $fpo_id ,
                     'voucher_no'         => 'PC_'.$fpo_id ,
                     'type'               => 7,
                     'account_code'       => 40204,
                     'account'            => $this->input->post('by_bank'),
                     'tran_date'          => $this->input->post('shares_released_date'),
                     'amount'             => '-'.$shareamt,
                     'memo'               => 'Paid Up Bank',
                     'status'             => 1
                   );
                    $gl_bank_value= $this->db->insert('fpo_gl_trans', $gl_bank_trans);
                }
            }

            if ($get_share_released <= $this->input->post('share_capital')) {
                $share_update = array(
               'fpo_id'       		=> $this->session->userdata('user_id'),
               'shares_released'    => $get_loggined_fpo[0]['shares_released'] + $shares_released,
               'unit_price'         => $this->input->post('unit_price'),
               'auth_capital_units' => $this->input->post('share_capital'),
               'minimum_threshold'  => $this->input->post('min_threshold'),
               'maximum_threshold'  => $this->input->post('max_threshold'),
               'shares_available'   => $available_shares ,
               'effective_date'  	=> $this->input->post('shares_released_date'),
               'updated_by'         => $this->session->userdata('user_id'),
               'updated_on'         => date('Y-m-d H:i:s')
               );
                $share_value=$this->db->update('trv_fpo_share_value', $share_update, array('id' => $get_loggined_fpo[0]['id']));
                $share_update_history = array(
                 'fpo_id'       		=> $this->session->userdata('user_id'),
                 'shares_released'   => $shares_released,
                 'unit_price'        => $this->input->post('unit_price'),
                 'from_date'  		  => $this->input->post('shares_released_date'),
                 'end_date'  		  => $date,
                 'updated_by'        => $this->session->userdata('user_id'),
                 'updated_on'        => date('Y-m-d H:i:s')
                 );
                $share_history=$this->db->insert('trv_fpo_share_value_history', $share_update_history);
            } else {
                return false;
            }
        } else {
            if ($this->input->post('paid_capital') == 1) {
                $fpo_id = $this->session->userdata('user_id');
                $gl_trans = array(
                   'fpo_id'       		=> $fpo_id ,
                   'voucher_no'         => 'PC_'.$fpo_id ,
                   'type'               => 7,
                   'account_code'       => 3010102,
                   'tran_date'          => $this->input->post('shares_released_date'),
                   'amount'             => $this->input->post('sharetotal'),
                   'memo'               => 'Paid Up Capital',
                   'status'             => 1
                );
                $gl_trans_value= $this->db->insert('fpo_gl_trans', $gl_trans);

                $sharetotal=$this->input->post('sharetotal');
                $sharebycash=$this->input->post('by_cash');
                $sharebybank=$this->input->post('by_bank');
                if ($sharebycash != '') {
                    $gl_cash_trans = array(
                     'fpo_id'       		=> $fpo_id ,
                     'voucher_no'         => 'PC_'.$fpo_id ,
                     'type'               => 7,
                     'account_code'       => 4020501,
                     'tran_date'          => $this->input->post('shares_released_date'),
                     'amount'             => '-'.$sharebycash,
                     'memo'               => 'Paid Up Cash',
                     'status'             =>1
                   );
                    $gl_cash_value= $this->db->insert('fpo_gl_trans', $gl_cash_trans);
                }

                if ($sharebycash) {
                    $shareamt = $sharetotal - $sharebycash;
                } else {
                    $shareamt = $sharetotal;
                }

                if ($sharebybank !='' and $sharebybank !=0) {
                    $gl_bank_trans = array(
                     'fpo_id'       		=> $fpo_id ,
                     'voucher_no'         => 'PC_'.$fpo_id ,
                     'type'               => 7,
                     'account_code'       => 40204,
                     'account'            => $this->input->post('by_bank'),
                     'tran_date'          => $this->input->post('shares_released_date'),
                     'amount'             => '-'.$shareamt,
                     'memo'               => 'Paid Up Bank',
                     'status'             => 1
                   );
                    $gl_bank_value= $this->db->insert('fpo_gl_trans', $gl_bank_trans);
                }
            }
            $available_shares = '';
            $authtotal = ($this->input->post('share_capital'))*($this->input->post('unit_price'));
            $share_update = array(
                'fpo_id'       		=> $this->session->userdata('user_id'),
                'shares_released'    => $shares_released,
                'auth_capital_units' => $this->input->post('share_capital'),
                'auth_capital_amount'=> $authtotal,
                'unit_price'         => $this->input->post('unit_price'),
                'minimum_threshold'  => $this->input->post('min_threshold'),
                'maximum_threshold'  => $this->input->post('max_threshold'),
                'effective_date'  	=> $this->input->post('shares_released_date'),
                'shares_available'   => $available_shares ,
                'updated_by'         => $this->session->userdata('user_id'),
                'updated_on'         => date('Y-m-d H:i:s')
            );
            $share_value= $this->db->insert('trv_fpo_share_value', $share_update);
            $share_update_history = array(
                'fpo_id'       	  => $this->session->userdata('user_id'),
                'shares_released'   => $shares_released,
                'unit_price'        => $this->input->post('unit_price'),
                'from_date'  		  => $this->input->post('shares_released_date'),
                'end_date'  		  => $date,
                'updated_by'        => $this->session->userdata('user_id'),
                'updated_on'        => date('Y-m-d H:i:s')
            );
            $share_history=$this->db->insert('trv_fpo_share_value_history', $share_update_history);
        }
        return array($share_value, $share_history);
    }
    /* $get_loggined_fpo= $this->db->select('*')->from('trv_fpo_share_value')->where(array('fpo_id' => $this->session->userdata('user_id'),'status' => 1))->get()->result_array();
    $get_available_shares = $this->db->select('SUM(total_share_value) as total')->from('trv_share_allotment')->where(array('fpo_id' => $this->session->userdata('user_id'),'status' => 1))->order_by("id", "desc")->get()->result_array();
    $get_share_history= $this->db->select('*')->from('trv_fpo_share_value_history')->where(array('fpo_id' => $this->session->userdata('user_id')))->get()->result_array();
    $shares_released=$this->input->post('shares_released');
    $end_date=$this->input->post('shares_released_date');
    $date=date('Y-m-d', strtotime($end_date .' -1 day'));
    if(!empty($get_loggined_fpo[0]['id'])){
            $get_share_total=$get_available_shares[0]['total'];
            $get_share_released=$get_loggined_fpo[0]['shares_released']+ $shares_released;
            $available_shares = $get_share_released - $get_share_total;
        if($get_share_released <= $this->input->post('share_capital')){
           $share_update = array(
           'fpo_id'       		=> $this->session->userdata('user_id'),
           'shares_released'    => $get_loggined_fpo[0]['shares_released'] + $shares_released,
           'unit_price'         => $this->input->post('unit_price'),
           'auth_capital_units' => $this->input->post('share_capital'),
           'minimum_threshold'  => $this->input->post('min_threshold'),
           'maximum_threshold'  => $this->input->post('max_threshold'),
           'shares_available'   => $available_shares ,
           'effective_date'  	=> $this->input->post('shares_released_date'),
           'updated_by'         => $this->session->userdata('user_id'),
           'updated_on'         => date('Y-m-d H:i:s')
           );
           $share_value=$this->db->update('trv_fpo_share_value',$share_update,array('id' => $get_loggined_fpo[0]['id']));
           $share_update_history = array(
           'fpo_id'       		=> $this->session->userdata('user_id'),
           'shares_released'   => $shares_released,
           'unit_price'        => $this->input->post('unit_price'),
           'from_date'  		  => $this->input->post('shares_released_date'),
           'end_date'  		  => $date,
           'updated_by'        => $this->session->userdata('user_id'),
           'updated_on'        => date('Y-m-d H:i:s')
           );
           $share_history=$this->db->insert('trv_fpo_share_value_history', $share_update_history);
        } else {
           return false;
        }
    }else{
      if($this->input->post('paid_capital') ==1)
     {
        $fpo_id = $this->session->userdata('user_id');
        $gl_trans = array(
            'fpo_id'       		=> $fpo_id ,
            'voucher_no'         => 'PC_'.$fpo_id ,
        'type'               => 7,
        'account_code'       => 3010102,
        'tran_date'          => $this->input->post('shares_released_date'),
            'amount'             => '-'.$this->input->post('sharetotal'),
            'memo'               => 'Paid Up Capital',
            'status'             =>1
        );
        $gl_trans_value= $this->db->insert('fpo_gl_trans', $gl_trans);
        $available_shares = '';
     $authtotal =($this->input->post('share_capital'))*($this->input->post('unit_price'));
        $share_update = array(
            'fpo_id'       		=> $this->session->userdata('user_id'),
            'shares_released'    => $shares_released,
        'auth_capital_units' => $this->input->post('share_capital'),
        'auth_capital_amount'=> $authtotal,
            'unit_price'         => $this->input->post('unit_price'),
            'minimum_threshold'  => $this->input->post('min_threshold'),
            'maximum_threshold'  => $this->input->post('max_threshold'),
            'effective_date'  	=> $this->input->post('shares_released_date'),
            'shares_available'   => $available_shares ,
            'updated_by'         => $this->session->userdata('user_id'),
            'updated_on'         => date('Y-m-d H:i:s')
        );
        $share_value= $this->db->insert('trv_fpo_share_value', $share_update);

        $share_update_history = array(
            'fpo_id'       	  => $this->session->userdata('user_id'),
            'shares_released'   => $shares_released,
            'unit_price'        => $this->input->post('unit_price'),
            'from_date'  		  => $this->input->post('shares_released_date'),
            'end_date'  		  => $date,
            'updated_by'        => $this->session->userdata('user_id'),
            'updated_on'        => date('Y-m-d H:i:s')
        );
        $share_history=$this->db->insert('trv_fpo_share_value_history', $share_update_history);
     return array($gl_trans_value,$share_value,$share_history);
    }
     else{
        $available_shares = '';
     $authtotal =($this->input->post('share_capital'))*($this->input->post('unit_price'));
        $share_update = array(
            'fpo_id'       		=> $this->session->userdata('user_id'),
            'shares_released'    => $shares_released,
        'auth_capital_units' => $this->input->post('share_capital'),
        'auth_capital_amount'=> $authtotal,
            'unit_price'         => $this->input->post('unit_price'),
            'minimum_threshold'  => $this->input->post('min_threshold'),
            'maximum_threshold'  => $this->input->post('max_threshold'),
            'effective_date'  	=> $this->input->post('shares_released_date'),
            'shares_available'   => $available_shares ,
            'updated_by'         => $this->session->userdata('user_id'),
            'updated_on'         => date('Y-m-d H:i:s')
        );
        $share_value= $this->db->insert('trv_fpo_share_value', $share_update);
        $share_update_history = array(
            'fpo_id'       	  => $this->session->userdata('user_id'),
            'shares_released'   => $shares_released,
            'unit_price'        => $this->input->post('unit_price'),
            'from_date'  		  => $this->input->post('shares_released_date'),
            'end_date'  		  => $date,
            'updated_by'        => $this->session->userdata('user_id'),
            'updated_on'        => date('Y-m-d H:i:s')
        );
        $share_history=$this->db->insert('trv_fpo_share_value_history', $share_update_history);
        }
    }
    return array($share_value,$share_history);
    }*/
    public function shareValueHistory()
    {
        $this->db->select('trv_fpo_share_value_history.*');
        $this->db->from('trv_fpo_share_value_history');
        $this->db->where(array('trv_fpo_share_value_history.fpo_id' => $this->session->userdata('user_id')));
        return $this->db->get()->result();
    }
    public function postfpo_farmer()
    {
        $farmer_id =$this->input->post('farmer_id');
        $shares_held =$this->input->post('shares_held');
        $folio_number = $this->input->post('folio_number');
        $folio_number[0] = $folio_number[0] > 0 ?$folio_number[0]:0001;
        //echo "<pre>";print_r($shares_held);die;
        for ($i=0;$i<count($farmer_id);$i++) {
            $getid=0;
            $history_id = 0;
            if($shares_held[$i] > 0){
              $farmer = $this->db->select(array('mobile'))->get_where('trv_farmer', array('id' => $farmer_id[$i], 'status' => 1))->row();
              if(!empty($farmer)){
                $farmer_mobile=$farmer->mobile;
              }
              /********** Add application *********/
              $applicationID = $this->db->select(array('id', 'no_of_share', 'no_share_approved'))->get_where('trv_share_application', array('holder_id' => $farmer_id[$i], 'member_type' => 1, 'status' => 2))->row();
              if (isset($applicationID) && isset($applicationID->no_of_share)) {
                  $noOfShare = $shares_held[$i];
                  $share_details = array(
                   'member_type'           => 1,
                   'holder_id'             => $farmer_id[$i],
                   'mobile_number'         => $farmer_mobile,
                   'no_of_share'           => $noOfShare,
                   'no_share_approved'     => $noOfShare,
                   'updated_by'            => $this->session->userdata('user_id'),
                   'updated_on'            => date('Y-m-d H:i:s'),
                   'status'                => 2
                  );
                  $update_app = $this->db->update('trv_share_application', $share_details, array('id' => $applicationID->id));
                  $application_id = $applicationID->id;
              } else {
                  $noOfShare = $shares_held[$i];
                  $share_details = array(
                   'member_type'           => 1,
                   'fpo_id'                => $this->session->userdata('user_id'),
                   'holder_id'             => $farmer_id[$i],
                   'mobile_number'         => $farmer_mobile,
                   'apply_date'            => date('Y-m-d'),
                   'no_of_share'           => $noOfShare,
                   'no_share_approved'     => $noOfShare,
                   'created_by'            => $this->session->userdata('user_id'),
                   'created_on'            => date('Y-m-d H:i:s'),
                   'status'                => 2
                  );
                  $update_app = $this->db->insert('trv_share_application', $share_details);
                  $application_id = $this->db->insert_id();
              }
              /******** Add Allotment ***********/
              $getres=$this->db->select('trv_share_allotment.id')->where(array('trv_share_allotment.holder_id' =>$farmer_id[$i],'trv_share_allotment.fpo_id' =>$this->session->userdata('user_id')))->from('trv_share_allotment')->get()->row();
              if(!empty($getres)){
                $getid=$getres->id;
              }
              $folio_number[$i] = $folio_number[$i] > 0 ?$folio_number[$i]:$folio_number[$i-1]+1;
              $add_fpo_farmer = array(
               'fpo_id'               => $this->session->userdata('user_id'),
               'allotment_nature'     => 1,
               'application_id'       => $application_id,
               'resolution_number'    => 10001,
               'resolution_date'      => date('Y-m-d'),
               'member_type'          => 1,
               'holder_id'            => $farmer_id[$i],
               'folio_number'         => $folio_number[$i],
               'new_share'            => $shares_held[$i],
               'total_share_value'    => $shares_held[$i],
               'allotted_date'        => date('Y-m-d '),
               'created_on'           => date('Y-m-d '),
               'created_by'           =>$this->session->userdata('user_id'),
               'status'				     => 1
              );
              if (!empty($getid)) {
                  $addfpo=$this->db->update('trv_share_allotment', $add_fpo_farmer, array('id' => $getid));
              } else {
                  $addfpo=$this->db->insert('trv_share_allotment', $add_fpo_farmer);
              }
              /************ Add History **********/
              $share_history = array(
                      'fpo_id'               => $this->session->userdata('user_id'),
                      'allotment_nature'     => 1,
                      'resolution_number'    => 10001,
                      'resolution_date'      => date('Y-m-d'),
                      'member_type'          => 1,
                      'holder_id'            => $farmer_id[$i],
                      'folio_number'         => $folio_number[$i],
                      'share_applied'        => $shares_held[$i],
                      'share_allotted'       => $shares_held[$i],
                      'total_share_value'    => $shares_held[$i],
                      'cut_off_date'         => date('Y-m-d H:i:s'),

                      'created_by'           => $this->session->userdata('user_id'),
                      'created_on'           => date('Y-m-d H:i:s'),
                      'updated_by'           => $this->session->userdata('user_id'),
                      'updated_on'           => date('Y-m-d H:i:s')
                  );
              $getres=$this->db->select('trv_share_history.id')->where(array('trv_share_history.holder_id' =>$farmer_id[$i],'trv_share_history.fpo_id' =>$this->session->userdata('user_id')))->from('trv_share_history')->get()->row();
              if(!empty($getres)){
                $history_id=$getres->id;
              }
              if (!empty($history_id)) {
                  $addfpo=$this->db->update('trv_share_history', $share_history, array('id' => $history_id));
              } else {
                  $this->db->insert('trv_share_history', $share_history);
              }
            }
        }

        return $addfpo;
    }
}
