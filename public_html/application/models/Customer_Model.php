<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Customer_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /** FPO Starts **/
    public function postSaleType()
    {
        $sale_types = array(
            'fpo_id'               => $this->session->userdata('user_id'),
            'sales_type'           => $this->input->post('sales_type_name'),
            'tax_included'         => ($this->input->post('tax_included') == "on")?1:0,
            'factor'               => $this->input->post('factor_value')
        );
        return $this->db->insert('fpo_sales_types', $sale_types);
    }

    public function postSalesArea()
    {
        $sale_area = array(
            'fpo_id'               => $this->session->userdata('user_id'),
            'area_name'            => $this->input->post('area_name')
        );
        return $this->db->insert('fpo_sales_area', $sale_area);
    }

    public function addsalesperson()
    {
        $salespersons = array(
               'fpo_id'                  => $this->session->userdata('user_id'),
               'salesman_name'           => $this->input->post('sales_person_name'),
               'salesman_phone'          => $this->input->post('mobile_num'),
          // 'salesman_fax'            => $this->input->post('fax_num'),
              'salesman_email'          => $this->input->post('email'),
              'provision'               => $this->input->post('provision'),
              'break_pt'                => $this->input->post('break_pt'),
              'provision2'              => $this->input->post('provision_2'),
              'status'                  => 1

        );
        return $this->db->insert('fpo_salesman', $salespersons);
    }

    public function postCreditStatus()
    {
        $credit_status = array(
            'fpo_id'               => $this->session->userdata('user_id'),
            'reason_description'   => $this->input->post('description'),
            'dissallow_invoices'   => ($this->input->post('dissallow_invoicing') == 1)?$this->input->post('dissallow_invoicing'):0
        );
        return $this->db->insert('fpo_credit_status', $credit_status);
    }
    public function getAllBankByFPO()
    {
        $this->db->select('fpo_bank_accounts.id, fpo_bank_accounts.bank_account_name, fpo_bank_accounts.bank_account_number');
        $this->db->where(array('fpo_bank_accounts.fpo_id' => $_SESSION['user_id'], 'fpo_bank_accounts.status' => 1));
        $this->db->distinct();
        $this->db->from('fpo_bank_accounts');
        return $this->db->get()->result();
    }
    public function bank_name_list()
    {
        $this->db->select('trv_bank_name_master.*');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
        $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();
    }
    public function branch_list()
    {
        $this->db->select('trv_bank_name_master.*');
        $this->db->where(array('trv_bank_name_master.status' => '1'));
        $this->db->order_by("trv_bank_name_master.id", "desc");
        $this->db->from('trv_bank_name_master');
        return $this->db->get()->result();
    }
    public function gl_ChartMasterList()
    {
        $this->db->select('trv_chart_master.*');
        $this->db->where(array('trv_chart_master.account_code2' => 40202,'trv_chart_master.status' => 1));
        $this->db->distinct();
        //$this->db->group_by("trv_chart_master.account_code2");
        $this->db->from('trv_chart_master');
        return $this->db->get()->result();
    }
    public function postRecurrentInvoice()
    {
        $recurrent_invoice = array(
            'fpo_id'          => $this->session->userdata('user_id'),
            'description'     => $this->input->post('description'),
            //'order_no'        => $this->input->post('template'),
            'debtor_no'       => $this->input->post('customer'),
            //'branch'           => $this->input->post('branch'),
            'days'             => $this->input->post('days'),
            'monthly'          => $this->input->post('monthly'),
            'begin'            => $this->input->post('begin'),
            'end'              => $this->input->post('end'),
            'last_sent'        => date('Y-m-d H:i:s')
        );
        return $this->db->insert('fpo_recurrent_invoices', $recurrent_invoice);
    }

    public function postSaleGroup()
    {
        $sale_area = array(
            'fpo_id'         => $this->session->userdata('user_id'),
            'group_name'     => $this->input->post('group_name')
        );
        return $this->db->insert('fpo_sales_group', $sale_area);
    }



    public function salespersonlist()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_salesman.*');
        $this->db->from('fpo_salesman');
        $this->db->where(array('fpo_salesman.status' => 1,'fpo_salesman.fpo_id' => $fpoid ));
        return $this->db->get()->result();
    }

    public function salespersoninactivelist()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_salesman.*');
        $this->db->from('fpo_salesman');
        $this->db->where(array('fpo_salesman.fpo_id' => $fpoid));
        $this->db->order_by("fpo_salesman.salesman_code", "desc");
        return $this->db->get()->result();
    }

    public function updatesalesperson($salesman_code)
    {
        $salespersons = array(
           'fpo_id'                  => $this->session->userdata('user_id'),
            'salesman_name'				 => $this->input->post('sales_person_name'),
            'salesman_phone'          => $this->input->post('mobile_num'),
            'provision'               => $this->input->post('provision'),
            'break_pt'                => $this->input->post('break_pt'),
            'provision2'              => $this->input->post('provision_2'),
           'status'                  => 1,
        );
        return $this->db->update('fpo_salesman', $salespersons, array('salesman_code' => $salesman_code));
    }
    public function getbanklist($state_id)
    {
        $this->db->select('trv_bank_name_master.id,trv_bank_name_master.name AS bank_name');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = trv_bank_master.bank_name_id');
        $this->db->where(array('trv_bank_master.bank_state' =>$state_id ,'trv_bank_name_master.status' => '1'));
        $this->db->distinct();
        $this->db->order_by("trv_bank_name_master.name", "asc");
        $this->db->from('trv_bank_master');
        return $this->db->get()->result_array();
    }
    public function getBankAddressByBankName()
    {
        $state_id=$this->input->post('state');
        $bank_id=$this->input->post('bank_name');
        $this->db->select('trv_bank_master.*,trv_bank_name_master.name AS bank_name');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = trv_bank_master.bank_name_id', 'left');
        $this->db->where(array('trv_bank_master.bank_state' =>$state_id,'trv_bank_master.status' => '1'));
        $this->db->where(array('trv_bank_master.bank_name_id' =>$bank_id));
        //$this->db->where(array('trv_bank_master.bank_state' =>$state_id,'trv_bank_master.id' =>$bank_id,'trv_bank_master.status' => '1'));
        $this->db->distinct();
        $this->db->order_by("trv_bank_master.id", "aesc");
        $this->db->from('trv_bank_master');
        return $this->db->get()->result_array();

        /* function getBankAddressByBankName() {
             $state_id=$this->input->post('state');
             $bank_id=$this->input->post('bank_name');
           $this->db->select('trv_bank_name_master.id,trv_bank_name_master.name AS bank_name');
             $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = trv_bank_master.bank_name_id');
             $this->db->where(array('trv_bank_master.bank_state' =>$state_id,'trv_bank_master.status' => '1'));
             $this->db->where(array('trv_bank_name_master.id' =>$bank_id));
             $this->db->distinct();
             $this->db->order_by("trv_bank_master.id", "asc");
             $this->db->from('trv_bank_master');
             return $this->db->get()->result_array();
         } */
    }
    public function addcustomer()
    {
        $debtor_id= $this->input->post('debtor_no');
        if (empty($debtor_id)) {
            $customer_details = array(
               'fpo_id' 					      => $this->session->userdata('user_id'),
               'name' 				            => $this->input->post('customer_name'),
               'debtor_ref'          	      => $this->input->post('customer_short_name'),
               'gl_group'          	         => $this->input->post('gl_group'),
               'pincode'          	         => $this->input->post('pin_code'),
               'state'          	            => $this->input->post('state'),
               'district'          	         => $this->input->post('district'),
               'taluk_id'          	         => $this->input->post('taluk_id'),
               'block'          	            => $this->input->post('block'),
               'panchayat'          	      => $this->input->post('gram_panchayat'),
               'village'          	         => $this->input->post('village'),
               'address'          	         => $this->input->post('street'),
               'contact_person'          	   => $this->input->post('contact_person'),
               'std_code'          	         => $this->input->post('std_code'),
               'phone_number'          	   => $this->input->post('phone_number'),
               'mobile_number'          	   => $this->input->post('mobile_num'),
               'email'           	         => $this->input->post('email_address'),
               'physical_pincode'          	=> $this->input->post('physical_pincode'),
               'physical_state'          	   => $this->input->post('physical_state'),
               'physical_district'           => $this->input->post('physical_district'),
               'physical_taluk_id'           => $this->input->post('physical_taluk_id'),
               'physical_block'          	   => $this->input->post('physical_block'),
               'physical_panchayat'    	   => $this->input->post('physical_gram_panchayat'),
               'physical_village'    	      => $this->input->post('physical_village'),
               'gst_no'    				      => $this->input->post('gst'),
               'pan_no'    				      => $this->input->post('pan_promoting_institution'),
               'physical_street'    	      => $this->input->post('physical_street'),
               'physical_contact_person'     => $this->input->post('physical_contact_person'),
               'physical_std_code'    		   => $this->input->post('physical_std_code'),
               'physical_phone_number'    	=> $this->input->post('physical_phone_number'),
               'physical_mobile_num'    	   => $this->input->post('mobile_num'),
               'registration_type'    	      => $this->input->post('registration_type'),
               'sameaddress'    	            => $this->input->post('sameaddress'),
               'physical_email'    		      => $this->input->post('physical_email'),
               'place_of_customer'      	   => $this->input->post('place_of_customer'),
               'discount'      		         => $this->input->post('discount_percent'),
               'credit_limit'      		      => $this->input->post('credit_limit'),
               'pymt_discount'      	      => $this->input->post('prompt_discount_percent'),
               'payment_terms'      		   => $this->input->post('payment_terms'),
               'bank_details'      		      => $this->input->post('bank_info'),
               'transaction_type'			   => $this->input->post('transaction_type'),
               'opening_balance'          	=> $this->input->post('opening_balance'),
               'bank_name'      		         => $this->input->post('bank_name'),
               'branch_name'      		      => $this->input->post('branch_name'),
               'account_number'      		   => $this->input->post('account_number'),
               'ifsc_code'      		         => $this->input->post('ifsc_code'),
               'credit_status'      	      => $this->input->post('credit_status'),
               'credit_period'      		   => $this->input->post('credit_period'),
               'notes'      		            => $this->input->post('general_notes'),
               'status'            		      => 1
            );
            $this->db->insert('fpo_debtors_master', $customer_details);
            //for bank_information detalils mar 15
            /* if($this->input->post('bank_info') == 1){
              $customer_details1 = array(
                 'account_number'      	=> $this->input->post('account_number'),
                 'bank_name'      			=> $this->input->post('bank_name'),
                 'branch_name'      		=> $this->input->post('branch_name'),
                 'bank_details'      		=> $this->input->post('bank_info'),
                 'ifsc_code'      			=> $this->input->post('ifsc_code'),
              );
              $customer_details = array_merge($customer_details,$customer_details1);
         } */
            $debtor_no = $this->db->insert_id();
            $customer_branch_details = array(
            'debtor_no'=>$debtor_no,
            'fpo_id' 					 => $this->session->userdata('user_id'),
            'area'   					 => $this->input->post('sales_area'),
            'br_name'      		    => $this->input->post('customer_name'),
            'branch_ref'      		 => $this->input->post('customer_short_name'),
            'contact_name'      	    => $this->input->post('contact_person'),
            'salesman'      		    => 0,
            'default_location'       => 0,
            'default_ship_via'  		 => 0,
            'gl_group'          	    => $this->input->post('gl_group'),
            'tax_group_id'   		    => 0,
            'notes'    				    => $this->input->post('general_notes'),
            'mailing_pincode'    	 => $this->input->post('pin_code'),
            'mailing_state'    		 => $this->input->post('state'),
            'mailing_street'    		 => $this->input->post('street'),
            'physical_street'    	 => $this->input->post('physical_street'),
            'contact_name'    		 => $this->input->post('contact_person'),
            'mailing_std_code'    	 => $this->input->post('std_code'),
            'mailing_mobile_number'  => $this->input->post('mobile_num'),
            'mailing_phone_number'   => $this->input->post('phone_number'),
            'mailing_email'    		 => $this->input->post('email_address'),
            // 'gst_no'    			 => $this->input->post('gst'),
            'same_address'    	    => $this->input->post('sameaddress'),
            'mailing_district'    	 => $this->input->post('district'),
            'mailing_taluk_id'    	 => $this->input->post('taluk_id'),
            'mailing_block'    		 => $this->input->post('block'),
            'mailing_panchayat'      => $this->input->post('gram_panchayat'),
            'mailing_village'    	 => $this->input->post('village'),
            'physical_pincode'    	 => $this->input->post('physical_pincode'),
            'physical_state'    		 => $this->input->post('physical_state'),
            //'gst_no'    			    => $this->input->post('gst'),
            'physical_district'    	 => $this->input->post('physical_district'),
            'physical_taluk_id'    	 => $this->input->post('physical_taluk_id'),
            'physical_block'    		 => $this->input->post('physical_block'),
            'physical_panchayat'     => $this->input->post('physical_gram_panchayat'),
            'physical_village'    	 => $this->input->post('physical_village'),
            'physical_contact_person'=> $this->input->post('physical_contact_person'),
            'physical_std_code'      => $this->input->post('physical_std_code'),
            'physical_phone_number'  => $this->input->post('physical_phone_number'),
            'physical_mobile_number' => $this->input->post('physical_mobile_num'),
            'physical_email'    		 => $this->input->post('physical_email'),
            'status'            		 => 1,
         );
            $this->db->insert('fpo_cust_branch', $customer_branch_details);

            $currentDate = date('Y-m-d');
            $month=date("m", strtotime($currentDate));
            if ($month < '04') {
                $tran_date = date('Y-04-01', strtotime('-1 year'));
            } else {
                $tran_date = date('Y-04-01');
            }

            $payment_details = array(
                'fpo_id'            => $_SESSION['user_id'],
                'voucher_no'        => 'trv_RT_'.$debtor_no,
                'type'              => 9,
                //'type_no'         => $deposit['cost_center'],
                'tran_date'         => $tran_date,
                'account'           => $debtor_no,
                'account_code'      => ($this->input->post('gl_group'))?$this->input->post('gl_group'):"",
                'amount'            => ($this->input->post('transaction_type') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance'),
               'person_type_id'     => 2,
               'person_id'    		=> $debtor_no,
               'memo'               => 'Opening Balance'
            );
            $this->db->insert('fpo_gl_trans', $payment_details);
            //mar 15 checkbox code
            if ($this->input->post('same_supplier') == 1) {
                $cus_gl_group ='';
                if ($this->input->post('gl_group') == '4020201') {
                    $cus_gl_group = '3030201';
                } else {
                    $cus_gl_group = '3030204';
                }
                $fpo_id = $this->session->userdata('user_id');
                $supplier_information = array(
               'fpo_id'       		   => $fpo_id,
               'supp_name' 				=> $this->input->post('customer_name'),
               'supp_ref'          		=> $this->input->post('customer_short_name'),
               'address'    				=> 0,
               'supp_address'      		=> 0,
               'supp_place'      		=> $this->input->post('place_of_customer'),
               'gst_no'   					=> $this->input->post('gst'),
               'pan_no'   					=> $this->input->post('pan_promoting_institution'),
               'gl_group_id'   			=> $cus_gl_group,
               'gl_acc_name'   			=> 0,
               'gl_acc_status'   		=> $this->input->post('credit_status'),
               'regist_type'   			=> $this->input->post('registration_type'),
               'mailing_pincode'       => $this->input->post('pin_code'),
               'mailing_state'         => $this->input->post('state'),
               'mailing_district'      => $this->input->post('district'),
               'mailing_block'             => $this->input->post('block'),
               'mailing_panchayat'         => $this->input->post('gram_panchayat'),
               'mailing_village'           => $this->input->post('village'),
               'mailing_taluk_id'          => $this->input->post('taluk_id'),
               'mailing_street'            => $this->input->post('street'),
               'mailing_contact_person'    => $this->input->post('contact_person'),
               'mailing_mobile_no'   		=> $this->input->post('mobile_num'),
               'mailing_phone_no'   		=> $this->input->post('phone_number'),
               'mailing_std_code'   		=> $this->input->post('std_code'),
               'mailing_email_id'   		=> $this->input->post('email_address'),
               'physical_pincode'          => $this->input->post('physical_pincode'),
               'physical_state'            => $this->input->post('physical_state'),
               'physical_district'         => $this->input->post('physical_district'),
               'physical_block'            => $this->input->post('physical_block'),
               'physical_panchayat'        => $this->input->post('physical_gram_panchayat'),
               'physical_village'          => $this->input->post('physical_village'),
               'physical_taluk_id'         => $this->input->post('physical_taluk_id'),
               'physical_street'           => $this->input->post('physical_street'),
               'physical_contact_person'   => $this->input->post('physical_contact_person'),
               'physical_mobile_no'   		=> $this->input->post('mobile_num'),
               'physical_phone_no'   		=> $this->input->post('physical_phone_number'),
               'physical_std_code'   		=> $this->input->post('physical_std_code'),
               'physical_email_id'   		=> $this->input->post('physical_email'),
               'same_address'           	=> $this->input->post('sameaddress'),
               'credit_period'				=> $this->input->post('credit_period'),
               'maintain_bill'				=> $this->input->post('maintain_bill'),
               'transaction_type'			=> $this->input->post('transaction_type'),
               'opening_balance'			  => $this->input->post('opening_balance'),
               'curr_code'         		  => 'INR',
               'payment_terms'     		  => $this->input->post('payment_terms'),
               'notes'    					  => $this->input->post('general_notes'),
               'status'                  =>1
            );
                $gl_trans_value= $this->db->insert('fpo_suppliers', $supplier_information);
                //payment details
                $payment_supplier_details = array(
               'fpo_id'            => $_SESSION['user_id'],
               'voucher_no'        => 'SD_'.$debtor_no,
               'type'              => 9,
               'tran_date'         => $tran_date,
               'account'           => $debtor_no,
               'account_code'      => ($this->input->post('gl_group'))?$this->input->post('gl_group'):"",
               'amount'            => ($this->input->post('transaction_type') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance'),
               'person_type_id'    => 1,
               'person_id'    		=> $debtor_no,
               'memo'              => 'Opening Balance'
               );
                if ($this->input->post('bank_info') == 1) {
                    $supplier_information1 = array(
                     'bank_account'      		=> $this->input->post('account_number'),
                     'bank_name'      			=> $this->input->post('bank_name'),
                     'branch_name'      		=> $this->input->post('branch_name'),
                     'bank_detail'      		=> $this->input->post('bank_info'),
                     'ifsc_code'      			=> $this->input->post('ifsc_code'),
                  );
                    $supplier_information = array_merge($supplier_information, $supplier_information1);
                }
                $this->db->insert('fpo_gl_trans', $payment_supplier_details);
            }
        }
        return true;
    }
    public function updatecustomer($customer_id)
    {
        $customer_details = array(
               'fpo_id' 					=> $this->session->userdata('user_id'),
               'name' 				        => $this->input->post('customer_name'),
               'debtor_ref'          	    => $this->input->post('customer_short_name'),
               'gl_group'          	        => $this->input->post('gl_group'),
               'pincode'          	        => $this->input->post('pincode'),
               'state'          	        => $this->input->post('state'),
               'district'          	        => $this->input->post('district'),
               'taluk_id'          	        => $this->input->post('taluk'),
               'block'          	        => $this->input->post('block'),
               'panchayat'          	    => $this->input->post('gram_panchayat'),
               'village'          	        => $this->input->post('village'),
               'address'          	        => $this->input->post('street'),
               'contact_person'          	=> $this->input->post('contact_person'),
               'transaction_type'			=> $this->input->post('transaction_type'),
               'opening_balance'          	=> $this->input->post('opening_balance'),
               'std_code'          	        => $this->input->post('std_code'),
               'phone_number'          	    => $this->input->post('phone_number'),
               'mobile_number'          	=> $this->input->post('mobile_num'),
               'email'           	        => $this->input->post('email_billing_address'),
               'physical_pincode'          	=> $this->input->post('physical_pincode'),
               'physical_state'          	=> $this->input->post('physical_state'),
               'physical_district'          => $this->input->post('physical_district'),
               'physical_taluk_id'          => $this->input->post('physical_taluk_id'),
               'physical_block'          	=> $this->input->post('physical_block'),
               'physical_panchayat'    	    => $this->input->post('physical_gram_panchayat'),
               'physical_village'    	    => $this->input->post('physical_village'),
               'gst_no'    				    => $this->input->post('gst'),
               'pan_no'    				    => $this->input->post('pan_promoting_institution'),
               'physical_street'    	    => $this->input->post('physical_street'),
               'physical_contact_person'    => $this->input->post('physical_contact_person'),
               'physical_std_code'    		=> $this->input->post('physical_std_code'),
               'physical_phone_number'    	=> $this->input->post('physical_phone_number'),
               'physical_mobile_num'    	=> $this->input->post('physical_mobile_num'),
               'registration_type'    	    => $this->input->post('registration_type'),
               /* 'registration_type'    	    => $this->input->post('registration_type2'),
               'registration_type'    	    => $this->input->post('registration_type3'),
               'registration_type'    	    => $this->input->post('registration_type4'),
               'registration_type'    	    => $this->input->post('registration_type5'),
               'registration_type'    	    => $this->input->post('registration_type6'), */
               'sameaddress'    	        => $this->input->post('sameaddress'),
               'physical_email'    		    => $this->input->post('physical_email'),

               'place_of_customer'      	=> $this->input->post('place_of_customer'),
               'discount'      		        => $this->input->post('discount_percent'),
               'credit_limit'      		    => $this->input->post('credit_limit'),
               'pymt_discount'      	    => $this->input->post('prompt_discount_percent'),
               'payment_terms'      		=> $this->input->post('payment_terms'),
               'bank_details'      		    => $this->input->post('bank_info'),
               'bank_name'      		    => $this->input->post('bank_name'),
               'branch_name'      		    => $this->input->post('branch_name'),
               'account_number'      		=> $this->input->post('account_number'),
               'ifsc_code'      		    => $this->input->post('ifsc_code'),
               'credit_status'      	    => $this->input->post('credit_status'),
               'credit_period'      		=> $this->input->post('credit_period'),
               'notes'      		        => $this->input->post('general_notes'),
               'status'            		    => 1
            );

        $this->db->update('fpo_debtors_master', $customer_details, array('debtor_no' => $customer_id));

        $currentDate = date('Y-m-d');
        $month=date("m", strtotime($currentDate));
        if ($month < '04') {
            $tran_date = date('Y-04-01', strtotime('-1 year'));
        } else {
            $tran_date = date('Y-04-01');
        }
        $account_code = $this->input->post('gl_group')?$this->input->post('gl_group'):"";
        $fpo_id = $this->session->userdata('user_id');
        $payment_details = array(
          'fpo_id'            => $fpo_id,
          'voucher_no'        => 'SD_'.$customer_id,
          'type'              => 9,
          'tran_date'         => $tran_date,
          'account'           => $customer_id,
          'account_code'      => $account_code,
          'amount'            => ($this->input->post('transaction_type') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance'),
          'person_type_id'     => 2,
          'person_id'    		=> $customer_id,
          'memo'               => 'Opening Balance'
        );
        $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account = '".$customer_id."' AND fpo_id = '".$fpo_id."' AND tran_date = '".$tran_date."' AND LOWER(memo) = 'opening balance' AND person_type_id = 2");
        if ($result->num_rows() >0) {
            $this->db->update('fpo_gl_trans', $payment_details, array('account' => $customer_id, fpo_id => $fpo_id, 'tran_date' => $tran_date, 'memo' => 'Opening Balance','person_type_id'=>2));
        } else {
            $this->db->insert('fpo_gl_trans', $payment_details);
        }

        $customer_branch_details = array(
               'debtor_no'                  => $this->input->post('debtor_no'),
               'fpo_id' 					=> $this->session->userdata('user_id'),
               'area'   					=> $this->input->post('sales_area'),
               'br_name'      		        => $this->input->post('customer_name'),
               'branch_ref'      		    => $this->input->post('customer_short_name'),
               'contact_name'      		    => $this->input->post('contact_person'),
               'salesman'      		        => 0,
               'gl_group'          	        => $this->input->post('gl_group'),
               'default_location'           => 0,
               'default_ship_via'  		    => 0,
               'tax_group_id'   		    => 0,
               'notes'    					=> $this->input->post('general_notes'),
               'mailing_pincode'    		=> $this->input->post('pincode'),
               'mailing_state'    		    => $this->input->post('state'),
               'mailing_street'    		    => $this->input->post('street'),
               'physical_street'    		=> $this->input->post('physical_street'),
                // 'gst_no'    			    => $this->input->post('gst'),
                'same_address'    	        => $this->input->post('sameaddress'),
                 'mailing_district'    		=> $this->input->post('district'),
                 'mailing_taluk_id'    		=> $this->input->post('taluk'),
                 'mailing_block'    		=> $this->input->post('block'),
                 'mailing_panchayat'        => $this->input->post('gram_panchayat'),
                 'mailing_village'    		=> $this->input->post('village'),
                 'contact_name'    		    => $this->input->post('contact_person'),
                 'mailing_std_code'    		=> $this->input->post('std_code'),
                 'mailing_mobile_number'    => $this->input->post('mobile_num'),
                 'mailing_phone_number'    	=> $this->input->post('phone_number'),
                 'mailing_email'    		=> $this->input->post('email_billing_address'),
                 'physical_pincode'    		=> $this->input->post('physical_pincode'),
                 'physical_state'    		=> $this->input->post('physical_state'),
                // 'gst_no'    			    => $this->input->post('gst'),
                 'physical_district'    	=> $this->input->post('physical_district'),
                 'physical_taluk_id'    	=> $this->input->post('physical_taluk_id'),
                 'physical_block'    		=> $this->input->post('physical_block'),
                 'physical_panchayat'       => $this->input->post('physical_gram_panchayat'),
                 'physical_village'    		=> $this->input->post('physical_village'),
                 'physical_contact_person'  => $this->input->post('physical_contact_person'),
                 'physical_std_code'        => $this->input->post('physical_std_code'),
                 'physical_phone_number'    => $this->input->post('physical_phone_number'),
                 'physical_mobile_number'   => $this->input->post('physical_mobile_num'),
                 'physical_email'    		=> $this->input->post('physical_email'),
               'status'            		=> 1,
            );

        return $this->db->update('fpo_cust_branch', $customer_branch_details, array('debtor_no' => $customer_id));
    }
    public function salespersonDropdownList()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_salesman.*');
        $this->db->where(array('fpo_salesman.status' => '1','fpo_salesman.fpo_id' => $fpoid ));
        $this->db->order_by("fpo_salesman.salesman_code", "desc");
        $this->db->distinct();
        $this->db->from('fpo_salesman');
        return $this->db->get()->result();
    }

    public function customer_list()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_debtors_master.*');
        $this->db->where(array('fpo_debtors_master.status' => '1','fpo_debtors_master.fpo_id' => $fpoid ));
        //$this->db->order_by("fpo_debtors_master.debtor_no", "desc");
        $this->db->from('fpo_debtors_master');
        return $this->db->get()->result();
    }

    public function get_all_customer()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_debtors_master.*');
        $this->db->where(array('fpo_debtors_master.fpo_id' => $fpoid));
        $this->db->order_by("fpo_debtors_master.debtor_no", "desc");
        $this->db->from('fpo_debtors_master');
        return $this->db->get()->result();
    }

    public function customerByID($customer)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fd.* ,trv_chart_master.account_name AS account_name, trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_taluk_master.name As taluk_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = fd.state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = fd.district');
        $this->db->join('trv_village_master', 'trv_village_master.id = fd.village', 'left');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fd.gl_group');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fd.panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fd.taluk_id', 'left');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = fd.block', 'left');
        $this->db->from('fpo_debtors_master AS fd');
        $this->db->where(array('fd.debtor_no'=>$customer,'fd.fpo_id' => $fpoid));
        return $query= $this->db->get()->result();
    }

    public function custPhysicalAddByID($customer)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('trv_district_master.name As district_name,trv_state_master.name As state_name');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = fd.physical_state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = fd.physical_district');
        $this->db->from('fpo_debtors_master AS fd');
        $this->db->where(array('fd.debtor_no'=>$customer,'fd.fpo_id' => $fpoid));
        return $query = $this->db->get()->result();
    }

    public function customerbranch_list($customer_id)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_cust_branch.*');
        $this->db->from('fpo_cust_branch');
        //$this->db->join('fpo_salesman', 'fpo_salesman.salesman_code = fpo_cust_branch.salesman');
        //$this->db->join('fpo_tax_groups', 'fpo_tax_groups.id = fpo_cust_branch.tax_group_id');
        $this->db->where(array('fpo_cust_branch.debtor_no' =>$customer_id ,'fpo_cust_branch.fpo_id' => $fpoid));
        return $this->db->get()->result();
    }
    public function customerbranchByID($customer)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_cust_branch.*,trv_chart_master.account_name AS account_name,trv_village_master.name As village_name,trv_panchayat_master.name As panchayat_name,trv_block_master.name As block_name,trv_district_master.name As district_name,trv_state_master.name As state_name');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_cust_branch.mailing_state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_cust_branch.mailing_district');
        $this->db->join('trv_village_master', 'trv_village_master.id = fpo_cust_branch.mailing_village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_cust_branch.mailing_panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_cust_branch.mailing_taluk_id', 'left');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_cust_branch.mailing_block', 'left');
        $this->db->join('trv_chart_master', 'trv_chart_master.account_code = fpo_cust_branch.gl_group');
        $this->db->where(array('fpo_cust_branch.branch_code'=>$customer,'fpo_cust_branch.fpo_id' => $fpoid));
        $this->db->from('fpo_cust_branch');
        return $this->db->get()->result();
    }
    public function custBranchPhysicalAddByID($customer)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('trv_district_master.name As district_name,trv_state_master.name As state_name');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_cust_branch.physical_state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_cust_branch.physical_district');
        $this->db->from('fpo_cust_branch');
        $this->db->where(array('fpo_cust_branch.branch_code'=>$customer,'fpo_cust_branch.fpo_id' => $fpoid));
        return $query = $this->db->get()->result();
    }

    public function addcustomerbranch()
    {
        $debtor_id= $this->input->post('customer');
        if ($debtor_id) {
            $customer_branch_details = array(
            'fpo_id' 					=> $this->session->userdata('user_id'),
            'debtor_no' 				=> $this->input->post('customer'),
            'br_name' 				    => $this->input->post('branch_name'),
            'branch_ref'          		=> $this->input->post('branch_short_name'),
            'salesman'    				=> 0,
            'group_no'      		    => 0,
            'area'   					=> 0,
            'default_location'	        => 0,
            'default_ship_via'          => 0,
            'tax_group_id'      		=> 0,
            'sales_account'     		=> $this->input->post('sales_account'),
            'sales_discount_account'    => $this->input->post('sales_discount'),
            'receivables_account'       => $this->input->post('account_receivable'),
            'payment_discount_account'  => $this->input->post('prompt_payment'),
            'contact_name'   		    => $this->input->post('contact_person'),
            'br_address'    		    => 0,
            'br_post_address'    		=> 0,
            'gl_group'                  => $this->input->post('gl_group'),
            'mailing_pincode'           => $this->input->post('pin_code'),
            'mailing_state'             => $this->input->post('state'),
            'mailing_district'          => $this->input->post('district'),
            'mailing_block'             => $this->input->post('block'),
            'mailing_panchayat'         => $this->input->post('gram_panchayat'),
            'mailing_village'           => $this->input->post('village'),
            'mailing_taluk_id'          => $this->input->post('taluk_id'),
            'mailing_street'            => $this->input->post('street'),
            'mailing_mobile_number'     => $this->input->post('mobile_num'),
            'mailing_std_code'          => $this->input->post('std_code'),
            'mailing_phone_number'      => $this->input->post('phone_number'),
            'mailing_email'             => $this->input->post('email_address'),
            'same_address'              => $this->input->post('sameaddress'),
            'physical_pincode'          => $this->input->post('physical_pin_code'),
            'physical_state'            => $this->input->post('physical_state'),
            'physical_district'         => $this->input->post('physical_district'),
            'physical_block'            => $this->input->post('physical_block'),
            'physical_panchayat'        => $this->input->post('physical_gram_panchayat'),
            'physical_village'          => $this->input->post('physical_village'),
            'physical_taluk_id'         => $this->input->post('physical_taluk_id'),
            'physical_contact_person'   => $this->input->post('physical_contact_person'),
            'physical_mobile_number'    => $this->input->post('physical_mobile_num'),
            'physical_std_code'         => $this->input->post('physical_std_code'),
            'physical_phone_number'     => $this->input->post('physiacl_phone_number'),
            'physical_email'            => $this->input->post('physical_email'),
            'physical_street'           => $this->input->post('physical_street'),
            'notes'    					=> $this->input->post('general_notes'),
            'status'            		=> 1,
         );
            return $this->db->insert('fpo_cust_branch', $customer_branch_details);
        }
    }
    public function updatecustomerbranch($customer_branch_id)
    {
        $customer_branch_details = array(
         'fpo_id' 					=> $this->session->userdata('user_id'),
         'debtor_no' 				=> $this->input->post('customer'),
         'br_name' 				    => $this->input->post('branch_name'),
         'branch_ref'          		=> $this->input->post('branch_short_name'),
         'salesman'    				=> 0,
         'group_no'      		    => 0,
         'area'   					=> 0,
         'default_location'	        => 0,
         'default_ship_via'          => 0,
         'tax_group_id'      		=> 0,
         'sales_account'     		=> $this->input->post('sales_account'),
         'sales_discount_account'    => $this->input->post('sales_discount'),
         'receivables_account'       => $this->input->post('account_receivable'),
         'payment_discount_account'  => $this->input->post('prompt_payment'),
         'contact_name'   		    => $this->input->post('contact_person'),
         'mailing_mobile_number'     => $this->input->post('mobile_num'),
         'mailing_std_code'          => $this->input->post('std_code'),
         'mailing_phone_number'      => $this->input->post('phone_number'),
         'mailing_email'             => $this->input->post('email_address'),
         'gl_group'                  => $this->input->post('gl_group'),
         'br_address'    		    => 0,
         'br_post_address'    		=> 0,
         'mailing_pincode'           => $this->input->post('pin_code'),
         'mailing_state'             => $this->input->post('state'),
         'mailing_district'          => $this->input->post('district'),
         'mailing_block'             => $this->input->post('block'),
         'mailing_panchayat'         => $this->input->post('gram_panchayat'),
         'mailing_village'           => $this->input->post('village'),
         'mailing_taluk_id'          => $this->input->post('taluk_id'),
         'mailing_street'            => $this->input->post('street'),
         'same_address'              => $this->input->post('sameaddress'),
         'physical_pincode'          => $this->input->post('physical_pin_code'),
         'physical_state'            => $this->input->post('physical_state'),
         'physical_district'         => $this->input->post('physical_district'),
         'physical_block'            => $this->input->post('physical_block'),
         'physical_panchayat'        => $this->input->post('physical_gram_panchayat'),
         'physical_village'          => $this->input->post('physical_village'),
         'physical_taluk_id'         => $this->input->post('physical_taluk_id'),
         'physical_street'           => $this->input->post('physical_street'),
         'physical_contact_person'   => $this->input->post('physical_contact_person'),
         'physical_mobile_number'    => $this->input->post('physical_mobile_num'),
         'physical_std_code'         => $this->input->post('physical_std_code'),
         'physical_phone_number'     => $this->input->post('physiacl_phone_number'),
         'physical_email'            => $this->input->post('physical_email'),
         'notes'    					=> $this->input->post('general_notes'),
         'status'            		=> 1,
      );
        return $this->db->update('fpo_cust_branch', $customer_branch_details, array('branch_code' => $customer_branch_id));
    }
    public function branchdetail($debtor_no)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_cust_branch.*,trv_district_master.name As district_name,trv_state_master.name As state_name');
        $this->db->from('fpo_cust_branch');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_cust_branch.mailing_state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_cust_branch.mailing_district');
        $this->db->where(array('fpo_cust_branch.debtor_no' =>$debtor_no ,'fpo_cust_branch.fpo_id' => $fpoid));
        $this->db->order_by("fpo_cust_branch.branch_code", "desc");
        return $this->db->get()->result();
    }

    public function fpolocationdetail()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('state_code As state_id,name As state_name');
        $this->db->from('trv_fpo');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = trv_fpo.state');
        $this->db->where(array('trv_fpo.user_id' => $fpoid));
        return $this->db->get()->row();
    }
    public function locationdetail()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('state_code As state_id,name As state_name');
        $this->db->from('trv_state_master');
        $this->db->where(array('status' => 1));
        return $this->db->get()->result();
    }
    public function saleslist()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_sales_types.*');
        $this->db->from('fpo_sales_types');
        $this->db->where(array('fpo_sales_types.status' => 1));
        $this->db->order_by("fpo_sales_types.id", "desc");
        return $this->db->get()->result();
    }

    public function paymentterms()
    {
        //$fpoid=$this->session->userdata('logger_id');
        $this->db->select('fpo_payment_terms.*');
        $this->db->from('fpo_payment_terms');
        $this->db->where(array('fpo_payment_terms.status' => 1));
        $this->db->order_by("fpo_payment_terms.terms_indicator", "desc");
        return $this->db->get()->result();
    }

    public function product()
    {
        $this->db->select('trv_fpo_product.*,trv_product_master.name as product_name');
        $this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
        $this->db->where(array('trv_fpo_product.fpo_id' => $this->session->userdata('logger_id'), 'trv_fpo_product.status' => '1'));
        $this->db->from('trv_fpo_product');
        return $this->db->get()->result();
    }

    public function add_salesquotation()
    {
        $total= implode(",", $this->input->post('line_total'));
        $salesquotation = array(
               'fpo_id' 			 => $this->session->userdata('user_id'),
               'type' 			     => 1,
               'debtor_no'      	 => $this->input->post('customer'),
               'payment_terms'		 => $this->input->post('payment'),
               'ord_date'   		 => $this->input->post('quotation_date'),
               'branch_code'         => $this->input->post('branch'),
               'order_type	'        => $this->input->post('price_list'),
               'reference'      	 => $this->input->post('ref'),
               'ship_via'      		 => $this->input->post('shipping_charge'),
               'delivery_address'    => $this->input->post('delivery_from'),
               'comments'      	     => $this->input->post('comments'),
               'total'      	     => $total,
        );
        $sales_quotation= $this->db->insert('fpo_sales_orders', $salesquotation);
        $orderno = $this->db->insert_id();
        $stk_code =$this->input->post('item_code');
        $item_description =$this->input->post('item_description');
        $discount_percent = $this->input->post('discount');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');
        for ($i=0;$i<count($item_description);$i++) {
            $sales_quotation_details = array(
                        'fpo_id' 			=> $this->session->userdata('user_id'),
                        'order_no'      	=> $orderno,
                        'stk_code'			=> $stk_code[$i],
                        'description'   	=> $item_description[$i],
                        'discount_percent'  => $discount_percent[$i] ,
                        //'qty_sent'        => 0,
                        'unit_price	'       => $price[$i],
                        //'act_price'      	=> 0,
                      // 'std_cost_unit'    => 0,
                        'quantity'          => $qty[$i],
                    );
            $fpo_sales_quotation= $this->db->insert('fpo_sales_order_details', $sales_quotation_details);
        }
        return  array($sales_quotation,$fpo_sales_quotation);
    }

    public function add_salesorder()
    {
        $total= implode(",", $this->input->post('line_total'));
        $salesquotation = array(
               'fpo_id' 			 => $this->session->userdata('user_id'),
               'type' 			     => 2,
               'debtor_no'      	 => $this->input->post('customer'),
               'payment_terms'		 => $this->input->post('payment'),
               'ord_date'            => $this->input->post('quotation_date'),
               'branch_code'         => $this->input->post('branch'),
               'order_type	'        => $this->input->post('price_list'),
               'reference'      	 => $this->input->post('ref'),
               'ship_via'      		 => $this->input->post('shipping_charge'),
               'delivery_address'    => $this->input->post('delivery_from'),
               'comments'      	     => $this->input->post('comments'),
               'total'      	     => $total,
        );
        $sales_quotation= $this->db->insert('fpo_sales_orders', $salesquotation);
        $orderno = $this->db->insert_id();
        $stk_code =$this->input->post('item_code');
        $item_description =$this->input->post('item_description');
        $discount_percent = $this->input->post('discount');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');
        for ($i=0;$i<count($item_description);$i++) {
            $sales_quotation_details = array(
                'fpo_id' 			=> $this->session->userdata('user_id'),
                'order_no'      	=> $orderno,
                'stk_code'			=> $stk_code[$i],
                'description'   	=> $item_description[$i],
                'discount_percent'  => $discount_percent[$i] ,
                //'qty_sent'        => 0,
                'unit_price	'       => $price[$i],
                //'act_price'      	=> 0,
                // 'std_cost_unit'  => 0,
                'quantity'          => $qty[$i],
              );
            $fpo_sales_quotation= $this->db->insert('fpo_sales_order_details', $sales_quotation_details);
        }
        return  array($sales_quotation, $fpo_sales_quotation);
    }

    public function adddirect_delivery()
    {
        $total= implode(",", $this->input->post('line_total'));
        $salesquotation = array(
            'fpo_id' 				=> $this->session->userdata('user_id'),
            'type' 			        => 3,
            'debtor_no'      	    => $this->input->post('customer'),
            'payment_terms'         => $this->input->post('payment'),
            'delivery_date'   	    => $this->input->post('delivery_date'),
            'branch_code'           => $this->input->post('branch'),
            'order_type	'           => $this->input->post('price_list'),
            'reference'      		=> $this->input->post('ref'),
            'ship_via'      		=> $this->input->post('shipping_charge'),
            'delivery_address'      => $this->input->post('delivery_from'),
            'comments'      	    => $this->input->post('comments'),
            'total'      	        => $total,
        );
        $sales_quotation= $this->db->insert('fpo_sales_orders', $salesquotation);
        $orderno = $this->db->insert_id();
        $stk_code =$this->input->post('item_code');
        $item_description =$this->input->post('item_description');
        $discount_percent = $this->input->post('discount');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');
        for ($i=0;$i<count($item_description);$i++) {
            $sales_quotation_details = array(
                    'fpo_id' 				=> $this->session->userdata('user_id'),
                    'order_no'      		=> $orderno,
                    'stk_code'			    => $stk_code[$i],
                    'description'   		=> $item_description[$i],
                    'discount_percent'      => $discount_percent[$i] ,
                    //'qty_sent'            => 0,
                    'unit_price	'           => $price[$i],
                    //'act_price'      		=> 0,
                    // 'std_cost_unit'      => 0,
                    'quantity'              => $qty[$i],
                );
            $fpo_sales_quotation= $this->db->insert('fpo_sales_order_details', $sales_quotation_details);
        }
        return  array($sales_quotation,$fpo_sales_quotation);
    }

    public function get_uomlist()
    {
        $this->db->select('trv_uom_master.*');
        $this->db->where(array('trv_uom_master.status' => '1','trv_uom_master.uom_type' => '2'));
        $this->db->order_by("trv_uom_master.id", "desc");
        $this->db->from('trv_uom_master');
        return $this->db->get()->result();
    }

    public function getAllSaleTypes()
    {
        $this->db->select('fpo_sales_types.*');
        $this->db->where(array('fpo_sales_types.status' => 1,'fpo_sales_types.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("fpo_sales_types.id", "desc");
        $this->db->from('fpo_sales_types');
        return $this->db->get()->result();
    }

    public function getAllSaleArea()
    {
        $this->db->select('fpo_sales_area.*');
        $this->db->where(array('fpo_sales_area.status' => 1,'fpo_sales_area.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("fpo_sales_area.id", "desc");
        $this->db->from('fpo_sales_area');
        return $this->db->get()->result();
    }

    public function getAllCreditStatus()
    {
        $this->db->select('fpo_credit_status.*');
        $this->db->where(array('fpo_credit_status.status' => 1,'fpo_credit_status.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("fpo_credit_status.id", "desc");
        $this->db->from('fpo_credit_status');
        return $this->db->get()->result();
    }

    public function getAllPaymentTerms()
    {
        $this->db->select('fpo_payment_terms.terms_indicator, fpo_payment_terms.terms');
        $this->db->where(array('fpo_payment_terms.status' => 1));
        $this->db->order_by("fpo_payment_terms.terms_indicator", "desc");
        $this->db->from('fpo_payment_terms');
        return $this->db->get()->result();
    }

    public function getAllTaxGroup()
    {
        $this->db->select('fpo_tax_groups.id, fpo_tax_groups.name');
        $this->db->from('fpo_tax_groups');
        return $this->db->get()->result();
    }

    public function getAllSaleGroup()
    {
        $this->db->select('fpo_sales_group.*');
        $this->db->where(array('fpo_sales_group.status' => 1,'fpo_sales_group.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("fpo_sales_group.id", "desc");
        $this->db->from('fpo_sales_group');
        return $this->db->get()->result();
    }

    public function getAllRecurrentInvoices()
    {
        $this->db->select('fpo_recurrent_invoices.*, fpo_debtors_master.name');
        $this->db->where(array('fpo_recurrent_invoices.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("fpo_recurrent_invoices.id", "desc");
        $this->db->from('fpo_recurrent_invoices');
        $this->db->join('fpo_debtors_master', 'fpo_debtors_master.debtor_no = fpo_recurrent_invoices.debtor_no');
        return $this->db->get()->result();
    }

    public function getFpoDebtorTransLastTransNo()
    {
        $this->db->select('fpo_debtor_trans.trans_no');
        $this->db->from('fpo_debtor_trans');
        $this->db->order_by('fpo_debtor_trans.trans_no', 'desc');
        $this->db->limit(1, 0);
        return $this->db->get()->row();
    }

    public function invoiceNumberExists($invoicenumber)
    {
        $invoice_count = $this->db->get_where('fpo_debtor_trans', array('reference' => $invoicenumber))->num_rows();
        return $invoice_count;
    }

    public function add_salesentry()
    {
        $gst_enable = $this->input->post('gst_enable');
        $gst_type = $this->input->post('gst_type');
        $salesentry = array(
         'fpo_id' 			 => $this->session->userdata('user_id'),
         'type' 			     => 3,
         'debtor_no'      	 => $this->input->post('sub_customer'),
         'tran_date'           =>  date('Y-m-d'),
         'due_date'          	 => $this->input->post('invoiceDate'),
         'branch_code'         => $this->input->post('sub_delivery'),
         'supply_location'     => $this->input->post('sub_location'),
         'reference'      	 => $this->input->post('invoiceNo'),
         'voucher_no'      	 => $this->input->post('voucherNo'),
         'ov_amount'      	 => $this->input->post('subTotal'),
         'ov_freight'      	 => $this->input->post('shippingCharge'), // Shipping charge only
         'ov_discount'      	 => $this->input->post('discount'),
         'adjustment'      	 => $this->input->post('adjustment'),
         'alloc'      	     => $this->input->post('grandTotal'),
         'memo'      	     => $this->input->post('memo'),
         'tax_included'      => $this->input->post('includeGst') ? $this->input->post('includeGst') : 0,
      );

        if ($gst_enable == 1) {
            $salesentry['ov_gst'] = $this->input->post('cgstTotal') + $this->input->post('sgstTotal') + $this->input->post('igstTotal');
            $salesentry['cgst'] = $this->input->post('cgstTotal');
            $salesentry['sgst'] = $this->input->post('sgstTotal');
            $salesentry['igst'] = $this->input->post('igstTotal');
            $salesentry['freight_percent'] = 5;
            $salesentry['ov_freight_tax'] = $this->input->post('gst_delivery_charge'); // GST shipping charge only
        }

        $sales_entry = $this->db->insert('fpo_debtor_trans', $salesentry);
        $debtor_trans_no = $this->db->insert_id();

        $item_description = $this->input->post('item_description');
        $price = $this->input->post('price');
        $line_discount = $this->input->post('line_discount');
        $qty = $this->input->post('qty');
        $each_qty = $this->input->post('each_qty');
        $unit = $this->input->post('unit');
        $each_unit = $this->input->post('each_unit');
        $line_total = $this->input->post('line_total');
        $line_percent_cgst = $this->input->post('line_percent_cgst');
        $line_percent_sgst = $this->input->post('line_percent_sgst');
        $line_percent_igst = $this->input->post('line_percent_igst');
        $line_cgst = $this->input->post('line_cgst');
        $line_sgst = $this->input->post('line_sgst');
        $line_igst = $this->input->post('line_igst');

        for ($i=0; $i<count($item_description); $i++) {
            //$description=$this->db->select('trv_product_master.*')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' => $item_description[$i]))->from('trv_fpo_product')->get()->result();

            if ($item_description[$i] >0) {
                $sales_entry_details = array(
            'fpo_id' 			=> $this->session->userdata('user_id'),
            'debtor_trans_no'  	=> $debtor_trans_no,
            'stock_id'			=> $item_description[$i],//$description[0]->id,
            'description'  		=> 'Desc',//$description[0]->name,
            'unit_price'        => $price[$i],
            'discount_percent'  => $line_discount[$i],
            'quantity'          => $qty[$i],
            'each_quantity'     => $each_qty[$i],
            'qty_done'  		=> $qty[$i],
            'uom'  				=> $unit[$i],
            'each_uom'  		=> $each_unit[$i],
            'line_total'  		=> $line_total[$i],
            );
                if ($gst_enable == 1) {
                    $sales_entry_details['cgst_percent'] = $line_percent_cgst[$i];
                    $sales_entry_details['sgst_percent'] = $line_percent_sgst[$i];
                    $sales_entry_details['igst_percent'] = $line_percent_igst[$i];
                    $sales_entry_details['cgst'] = $line_cgst[$i];
                    $sales_entry_details['sgst'] = $line_sgst[$i];
                    $sales_entry_details['igst'] = $line_igst[$i];
                }

                $fpo_sales_entry = $this->db->insert('fpo_debtor_trans_details', $sales_entry_details);
                /* stock moves entry start*/
                $get_stock_master= $this->db->select('stock_id')->from('fpo_stock_master')->where('category_id', $item_description[$i])->get()->row()->stock_id;

                if (!empty($get_stock_master)) {
                    $stock_moves = array(
                        'trans_no'               => $debtor_trans_no,
                        'stock_id'      		 => $item_description[$i],//$description[0]->id,
                        'loc_code'				 => $this->input->post('sub_location'),
                        'tran_date'       	 	 =>  date('Y-m-d'),
                        'price'                  => $price[$i],
                        'type'                   => 2,
                        'qty'                    => '-'.$qty[$i],
                        'uom'  					 => $unit[$i],
                        'person_id' 			 => $this->session->userdata('user_id'),
                        'visible'                => 1
                        );

                    $stockmoves= $this->db->insert('fpo_stock_moves', $stock_moves);
                    $stocktoid = $this->db->insert_id();
                    $stockid = str_pad($stocktoid, 6, '0', STR_PAD_LEFT);

                    if ($stockmoves) {
                        $refid= array(
                               'reference' => $stockid,
                            );
                        $stockreftodetail= $this->db->update('fpo_stock_moves', $refid, array('trans_id' => $stocktoid));
                    }
                } else {
                    $stock_master = array(
                  'category_id'      	 => $item_description[$i],//$description[0]->id,
                  'description'      	 => 'Desc',//$description[0]->name,
                  'units'				 => $unit[$i],
                  'actual_cost'        => $this->input->post('subTotal'),
                  'fpo_id' 			 => $this->session->userdata('user_id'),
               );

                    $stockmaster = $this->db->insert('fpo_stock_master', $stock_master);
                    $stockid     = $this->db->insert_id();
                    $stock_moves = array(
                  'trans_no'               => $debtor_trans_no,
                  'stock_id'      		 => $item_description[$i],//$description[0]->id ,
                  'loc_code'				 => $this->input->post('sub_location'),
                  'tran_date'       	 	 => date('Y-m-d'),
                  'price'                  => $price[$i],
                  'qty'                    => '-'.$qty[$i],
                  'type'                   => 2,
                  'uom'				 => $unit[$i],
                  'person_id' 			 => $this->session->userdata('user_id'),
                  'visible'                => 1
               );

                    $stockmoves= $this->db->insert('fpo_stock_moves', $stock_moves);
                    $stocktoid = $this->db->insert_id();
                    $stockid = str_pad($stocktoid, 6, '0', STR_PAD_LEFT);

                    if ($stockmoves) {
                        $refid= array(
                  'reference' => $stockid,
               );
                        $stockreftodetail= $this->db->update('fpo_stock_moves', $refid, array('trans_id' => $stocktoid));
                    }
                }
                /* stock moves entry end*/
            }
        }

        $cust_gl_group = '';
        if ($this->input->post('sub_customer') == '4020501' || $this->input->post('sub_customer') == '4020502') {
            $cust_gl_group=$this->input->post('sub_customer');
        } else {
            $query_gl_group = $this->db->query("SELECT gl_group FROM fpo_debtors_master WHERE debtor_no = '".$this->input->post('sub_customer')."'");
            $result_gl_group = $query_gl_group->row();
            if (isset($result_gl_group)) {
                $cust_gl_group = $result_gl_group->gl_group;
            }
        }
        $sales_gl_trans = array(
           'fpo_id' 		   => $this->session->userdata('user_id'),
           'voucher_no'      => $this->input->post('voucherNo'),
           'type'      	   => 6,
           'tran_date'       => date('Y-m-d'),
           'account'         => $this->input->post('sub_customer'),
           'account_code'    => $cust_gl_group,
           'amount'          => '-'.$this->input->post('grandTotal'),
           'person_type_id'  => 2,
           'person_id'       => $this->input->post('sub_customer'),
           'memo'      	   => $this->input->post('memo'),
        );
        $this->db->insert('fpo_gl_trans', $sales_gl_trans);
        if ($gst_enable == 1) {
            if ($gst_type == 1) {
                $cust_gl_group1 = '101010103'; //Intra - Taxable
            } elseif ($gst_type == 2) {
                $cust_gl_group1 = '101010106'; //Inter - Taxable
            }
        } else {
            if ($gst_type == 1) {
                $cust_gl_group1 = '101010101'; //Intra - Exempted
            } elseif ($gst_type == 2) {
                $cust_gl_group1 = '101010104'; //Inter - Exempted
            }
        }

        $sales_gl_trans = array(
         'fpo_id' 		   => $this->session->userdata('user_id'),
         'voucher_no'      => $this->input->post('voucherNo'),
         'type'      	   => 6,
         'type_no'   	   => 2,
         'tran_date'       => date('Y-m-d'),
         'account'         => $this->input->post('sub_customer'),
         'account_code'    => $cust_gl_group1,
         'amount'          => $this->input->post('subTotal'),
         'person_type_id'  => 2,
         'person_id'       => $this->input->post('sub_customer'),
         'memo'      	   => $this->input->post('memo'),
        );
        $this->db->insert('fpo_gl_trans', $sales_gl_trans);

        if ($gst_enable == 1) {
            if ($gst_type == 1) {
                $output_cgst = '303010105'; //Output CGST
                $output_sgst = '303010107'; //Output SGST
                $output_cgst_total = $this->input->post('cgstTotal');
                $output_sgst_total = $this->input->post('sgstTotal');

                $sales_gl_trans_gst = array(
                   'fpo_id' 		   => $this->session->userdata('user_id'),
                   'voucher_no'      => $this->input->post('voucherNo'),
                   'type'      	   => 6,
                   'tran_date'       => date('Y-m-d'),
                   'account'         => $this->input->post('sub_customer'),
                   'account_code'    => $output_cgst,
                   'amount'          => $output_cgst_total,
                   'person_type_id'  => 2,
                   'person_id'       => $this->input->post('sub_customer'),
                   'memo'      	   => $this->input->post('memo'),
                );
                $this->db->insert('fpo_gl_trans', $sales_gl_trans_gst);

                $sales_gl_trans_gst = array(
                     'fpo_id' 		   => $this->session->userdata('user_id'),
                     'voucher_no'      => $this->input->post('voucherNo'),
                     'type'      	   => 6,
                     'tran_date'       => date('Y-m-d'),
                     'account'         => $this->input->post('sub_customer'),
                     'account_code'    => $output_sgst,
                     'amount'          => $output_sgst_total,
                     'person_type_id'  => 2,
                     'person_id'       => $this->input->post('sub_customer'),
                     'memo'      	   => $this->input->post('memo'),
                );
                $this->db->insert('fpo_gl_trans', $sales_gl_trans_gst);
            } elseif ($gst_type == 2) {
                $output_igst = '303010106'; //Output IGST
                $output_igst_total = $this->input->post('igstTotal');

                $sales_gl_trans_gst = array(
                     'fpo_id' 		   => $this->session->userdata('user_id'),
                     'voucher_no'      => $this->input->post('voucherNo'),
                     'type'      	   => 6,
                     'tran_date'       => date('Y-m-d'),
                     'account'         => $this->input->post('sub_customer'),
                     'account_code'    => $output_igst,
                     'amount'          => $output_igst_total,
                     'person_type_id'  => 2,
                     'person_id'       => $this->input->post('sub_customer'),
                     'memo'      	   => $this->input->post('memo'),
                );
                $this->db->insert('fpo_gl_trans', $sales_gl_trans_gst);
            }
        }

        if ($this->input->post('shippingCharge') >0) {
            $shipping_code = '1020501'; //Freight Income
            $sales_gl_trans_shipping = array(
                'fpo_id' 		   => $this->session->userdata('user_id'),
                'voucher_no'      => $this->input->post('voucherNo'),
                'type'      	   => 6,
                'tran_date'       => date('Y-m-d'),
                'account'         => $this->input->post('sub_customer'),
                'account_code'    => $shipping_code,
                'amount'          => $this->input->post('shippingCharge'),// + $this->input->post('gst_delivery_charge'),
                'person_type_id'  => 2,
                'person_id'       => $this->input->post('sub_customer'),
                'memo'      	   => $this->input->post('memo'),
            );
            $this->db->insert('fpo_gl_trans', $sales_gl_trans_shipping);
        }

        if ($this->input->post('discount') >0) {
            $discount_code = '2020305'; //Discount Allowed
            $sales_gl_trans_discount = array(
                'fpo_id' 		   => $this->session->userdata('user_id'),
                'voucher_no'      => $this->input->post('voucherNo'),
                'type'      	   => 6,
                'tran_date'       => date('Y-m-d'),
                'account'         => $this->input->post('sub_customer'),
                'account_code'    => $discount_code,
                'amount'          => '-'.$this->input->post('discount'),
                'person_type_id'  => 2,
                'person_id'       => $this->input->post('sub_customer'),
                'memo'      	   => $this->input->post('memo'),
            );
            $this->db->insert('fpo_gl_trans', $sales_gl_trans_discount);
        }

        if ($this->input->post('adjustment') != '') {
            $adjustment_code = '1020701';
            $sales_gl_trans_adjustment = array(
                'fpo_id' 		   => $this->session->userdata('user_id'),
                'voucher_no'      => $this->input->post('voucherNo'),
                'type'      	   => 6,
                'tran_date'       => date('Y-m-d'),
                'account'         => $this->input->post('sub_customer'),
                'account_code'    => $adjustment_code,
                'amount'          => $this->input->post('adjustment') >0 ? $this->input->post('adjustment') : '-'.abs($this->input->post('adjustment')),
                'person_type_id'  => 2,
                'person_id'       => $this->input->post('sub_customer'),
                'memo'      	   => $this->input->post('memo'),
            );
            $this->db->insert('fpo_gl_trans', $sales_gl_trans_adjustment);
        }
        if($this->input->post('transaction_type') == 1){
            $this->db->where(array('type' => 2, 'fpo_id' => $this->session->userdata('user_id')));
            $this->db->from('fpo_gl_trans');
            $this->db->group_by('voucher_no');
            $receipt = $this->db->get()->num_rows();
            $receipt = $receipt+1;
            $receipt = str_pad($receipt, 5, '0', STR_PAD_LEFT);
            $voucherNo = 'RT'.$receipt;
            $receipt_gl_trans = array(
              'fpo_id' 		   => $this->session->userdata('user_id'),
              'voucher_no'      => $voucherNo,
              'type'      	   => 2,
              'tran_date'       => date('Y-m-d'),
              'account'         => $this->input->post('sub_customer'),
              'account_code'    => $cust_gl_group,
              'amount'          => $this->input->post('grandTotal'),
              'person_id'       => $this->input->post('sub_customer'),
            );
            $this->db->insert('fpo_gl_trans', $receipt_gl_trans);
            $receipt_gl_trans = null;
            $receipt_gl_trans = array(
             'fpo_id' 		   => $this->session->userdata('user_id'),
             'voucher_no'      => $voucherNo,
             'type'      	   => 2,
             'type_no'   	   => 1,
             'tran_date'       => date('Y-m-d'),
             'account'         => '4020501',
             'account_code'    => '4020501',
             'amount'          => '-'.$this->input->post('grandTotal'),
             'person_type_id'  => 3,
             'memo'      	   => $this->input->post('memo'),
            );
            $this->db->insert('fpo_gl_trans', $receipt_gl_trans);
        }
        return  array($sales_entry, $sales_entry_details);
    }

    public function getCustomers($search)
    {
        $this->db->select('debtor_no, name, pincode');
        $this->db->where(array('status' => '1'));
        $this->db->like('name', $search);
        $this->db->order_by("name");
        $this->db->from('fpo_debtors_master');
        return $this->db->get()->result();
    }
    //mobile number search//
    public function getMobileCustomers($search)
    {
        $this->db->select('debtor_no, name, pincode,mobile_number');
        $this->db->where(array('status' => '1'));
        $this->db->like('mobile_number', $search);
        $this->db->order_by("mobile_number");
        $this->db->from('fpo_debtors_master');
        return $this->db->get()->result();
    }


    public function getCustomerDetail($id)
    {
        $this->db->select('fpo_debtors_master.*');
        $this->db->where(array('fpo_debtors_master.debtor_no' => $id));
        $this->db->from('fpo_debtors_master');
        return $this->db->get()->result();
    }

    public function getFpoDebtorLastRefNo()
    {
        $this->db->select('fpo_debtor_trans.reference');
        $this->db->from('fpo_debtor_trans');
        $this->db->order_by('fpo_debtor_trans.trans_no', 'desc');
        $this->db->limit(1, 0);
        return $this->db->get()->row();
    }

    public function getCustomerGL()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_debtors_master.debtor_no, fpo_debtors_master.name, fpo_debtors_master.opening_balance,fpo_debtors_master.transaction_type, trv_chart_master.account_name');
        $this->db->from('fpo_debtors_master');
        $this->db->join('trv_chart_master', 'fpo_debtors_master.gl_group = trv_chart_master.account_code');
        $this->db->where(array('fpo_debtors_master.fpo_id' => $fpoid));
        $this->db->order_by("fpo_debtors_master.opening_balance ASC, fpo_debtors_master.name ASC");
        return $this->db->get()->result();
    }

    public function getCustomerGLAll()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_debtors_master.debtor_no, fpo_debtors_master.name,fpo_debtors_master.transaction_type, fpo_debtors_master.opening_balance, trv_chart_master.account_name');
        $this->db->from('fpo_debtors_master');
        $this->db->join('trv_chart_master', 'fpo_debtors_master.gl_group = trv_chart_master.account_code');
        $this->db->where(array('fpo_debtors_master.fpo_id' => $fpoid, 'fpo_debtors_master.opening_balance !=' => 0));
        $this->db->order_by("fpo_debtors_master.name ASC");

        return $this->db->get()->result();
    }
}
