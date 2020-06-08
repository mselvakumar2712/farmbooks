<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Variety_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /** Crop Variety master Starts **/
    public function varietyList()
    {
        $this->db->select('trv_crop_variety_master.id, trv_crop_variety_master.category_id, GROUP_CONCAT(trv_crop_variety_master.variety SEPARATOR ", ") AS varity_name, trv_crop_variety_master.sub_category_id, trv_crop_variety_master.name_id, trv_crop_variety_master.variety, trv_crop_variety_master.variety_local, trv_crop_variety_master.status, trv_crop_name_master.name AS crop_name, trv_crop_sub_category_master.name AS subcategory_name, trv_crop_category_master.name AS category_name');
        $this->db->from('trv_crop_variety_master');
        $this->db->join('trv_crop_name_master', 'trv_crop_name_master.id = trv_crop_variety_master.name_id');
        $this->db->join('trv_crop_sub_category_master', 'trv_crop_sub_category_master.id = trv_crop_variety_master.sub_category_id');
        $this->db->join('trv_crop_category_master', 'trv_crop_category_master.id = trv_crop_variety_master.category_id');
        $this->db->group_by('trv_crop_variety_master.name_id');
        $this->db->where(array('trv_crop_variety_master.status' => '1','trv_crop_name_master.status' => '1','trv_crop_sub_category_master.status' => '1','trv_crop_category_master.status'=>'1'));
        $this->db->order_by('trv_crop_category_master.name');
        $this->db->order_by('trv_crop_sub_category_master.name');
        $this->db->order_by('trv_crop_name_master.name');
        $this->db->order_by('trv_crop_variety_master.variety');
        return $this->db->get()->result();
    }


    public function addvariety()
    {
        $variety=$this->input->post('cropvariety');
        $variety_local=$this->input->post('cropregional');
        for ($i=0;$i<count($variety);$i++) {
            $variety_details = array(
            'category_id'               => $this->input->post('cropcategory'),
            'sub_category_id'           => $this->input->post('cropsubcategory'),
            'name_id'                   => $this->input->post('cropname'),
            'variety'                   => $variety[$i],
            'variety_local'             => $variety_local[$i],
            'status'                    => 1,
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
            );

            $varietydetail=$this->db->insert('trv_crop_variety_master', $variety_details);
        }

        return $varietydetail;
    }


    public function varietyByID($variety_id)
    {
        $this->db->select('trv_crop_variety_master.*,GROUP_CONCAT(trv_crop_variety_master.variety) AS varity_name,GROUP_CONCAT(trv_crop_variety_master.id) AS varietyid,GROUP_CONCAT(trv_crop_variety_master.variety_local) AS varietylocal');
        $this->db->group_by('trv_crop_variety_master.name_id');
        $this->db->where(array('trv_crop_variety_master.name_id'=>$variety_id,'trv_crop_variety_master.status'=>'1'));
        $this->db->from('trv_crop_variety_master');
        return $this->db->get()->result();
    }


    public function updatevariety($variety_id)
    {
        $cropvariety = $this->input->post('cropvariety');

        $cropregional = $this->input->post('cropregional');

        $varietyid = $this->input->post('cropvarietyid');

        for ($i=0;$i<count($cropvariety);$i++) {
            $getid=$this->db->select('id')->from('trv_crop_variety_master')->where('id', $varietyid[$i])->get()->row()->id;

            if ($getid) {
                $variety_details = array(
            'category_id'               => $this->input->post('cropcategory'),
            'sub_category_id'           => $this->input->post('cropsubcategory'),
            'name_id'                   => $this->input->post('cropname'),
            'variety'                   => $cropvariety[$i],
            'variety_local'             => $cropregional[$i],
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
        );

                $this->db->where('id', $varietyid[$i]);
                $varietydetail=$this->db->update('trv_crop_variety_master', $variety_details);
            } else {
                $variety_details = array(
            'category_id'               => $this->input->post('cropcategory'),
            'sub_category_id'           => $this->input->post('cropsubcategory'),
            'name_id'                   => $this->input->post('cropname'),
            'variety'                   => $cropvariety[$i],
            'variety_local'             => $cropregional[$i],
            'status'                    => 1,
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => ""
            );

                $varietydetail=$this->db->insert('trv_crop_variety_master', $variety_details);
            }
        }
        //print_r($varietydetail);
        return $varietydetail;
    }


    public function deletevariety($variety_id)
    {
        $variety_details = array(
           'status' => 0
        );
        return $this->db->update('trv_crop_variety_master', $variety_details, array('id' => $variety_id));
    }


    public function varietyDropdownList()
    {
        $this->db->select('trv_crop_variety_master.id, trv_crop_variety_master.variety');
        $this->db->where(array('status' => '1'));
        $this->db->order_by("id", "desc");
        $this->db->from('trv_crop_variety_master');
        return $this->db->get()->result();
    }


    public function get_variety($variety_id)
    {
        return $this->db->get_where('trv_crop_variety_master', array('id' => $variety_id))->row();
    }
    /** Crop Variety End **/
}
