<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Supplier_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //supplier start//
    public function supplier_list()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_suppliers.*');
        $this->db->where(array('fpo_suppliers.status' => '1','fpo_suppliers.fpo_id' => $fpoid ));
        $this->db->order_by("fpo_suppliers.supplier_id", "desc");
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }
    public function get_all_supplier()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_suppliers.*');
        $this->db->where(array('fpo_suppliers.fpo_id' => $fpoid));
        $this->db->order_by("fpo_suppliers.supplier_id", "desc");
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }
    /*supplier bank detail */
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
    public function getplacesupply()
    {
        $this->db->select('trv_state_master.*');
        $this->db->where(array('trv_state_master.status' => '1'));
        $this->db->order_by("trv_state_master.id", "asc");
        $this->db->from('trv_state_master');
        return $this->db->get()->result();
    }
    public function gl_ChartMasterList()
    {
        $this->db->select('trv_chart_master.*');
        $this->db->where(array('trv_chart_master.account_code2' => 30302, 'trv_chart_master.status' => 1));
        $this->db->distinct();
        //$this->db->group_by("trv_chart_master.account_code2");
        $this->db->from('trv_chart_master');
        return $this->db->get()->result();
    }
    public function add_supplier()
    {
        $supplier_details = array(
'fpo_id' 					   => $this->session->userdata('user_id'),
'supp_name' 				   => $this->input->post('supplier_name'),
'supp_ref'          		   => $this->input->post('supp_short_name'),
'address'    				   => 0,
'supp_address'      		   => 0,
'supp_place'      			=> $this->input->post('supply_place'),
'gst_no'   					   => $this->input->post('gst'),
'pan_no'   					   => $this->input->post('pan'),
'gl_group_id'   			   => $this->input->post('account_group'),
'gl_acc_name'   			   => 0,
'gl_acc_status'   			=> $this->input->post('account_status'),
'regist_type'   			   => $this->input->post('registration_type'),
'mailing_pincode'          => $this->input->post('pin_code'),
'mailing_state'            => $this->input->post('state'),
'mailing_district'         => $this->input->post('district'),
'mailing_block'            => $this->input->post('block'),
'mailing_panchayat'        => $this->input->post('gram_panchayat'),
'mailing_village'          => $this->input->post('village'),
'mailing_taluk_id'         => $this->input->post('taluk_id'),
'mailing_street'           => $this->input->post('street'),
'mailing_contact_person'   => $this->input->post('billing_contact_person'),
'mailing_mobile_no'   		=> $this->input->post('billing_mobile_num'),
'mailing_phone_no'   		=> $this->input->post('billing_phone_num'),
'mailing_std_code'   		=> $this->input->post('billing_std_code'),
'mailing_email_id'   		=> $this->input->post('billing_email'),
'physical_pincode'         => $this->input->post('physical_pin_code'),
'physical_state'           => $this->input->post('physical_state'),
'physical_district'        => $this->input->post('physical_district'),
'physical_block'           => $this->input->post('physical_block'),
'physical_panchayat'       => $this->input->post('physical_gram_panchayat'),
'physical_village'         => $this->input->post('physical_village'),
'physical_taluk_id'        => $this->input->post('physical_taluk_id'),
'physical_street'          => $this->input->post('physical_street'),
'physical_contact_person'  => $this->input->post('shipping_contact_person'),
'physical_mobile_no'   		=> $this->input->post('billing_mobile_num'),
'physical_phone_no'   		=> $this->input->post('shipping_phone_num'),
'physical_std_code'   		=> $this->input->post('shipping_std_code'),
'physical_email_id'   		=> $this->input->post('shipping_email'),
'same_address'           	=> $this->input->post('sameaddress'),
'supp_account_no'			   => strtoupper($this->input->post('our_customer_no')),
'credit_period'				=> $this->input->post('credit_period'),
'maintain_bill'				=> $this->input->post('maintain_bill'),
'transaction_type'			=> $this->input->post('transaction_type'),
'opening_balance'			   => $this->input->post('opening_balance'),
'curr_code'         		   => 'INR',
'payment_terms'     		   => $this->input->post('payment_terms'),
'notes'    					   => $this->input->post('general_notes'),
'status'            		   => 1,
);
        if ($this->input->post('bank_info') == 1) {
            $supplier_details1 = array(
'bank_account'      		=> $this->input->post('account_number'),
'bank_name'      			=> $this->input->post('bank_name'),
'branch_name'      			=> $this->input->post('branch_name'),
'bank_detail'      			=> $this->input->post('bank_info'),
'ifsc_code'      			=> $this->input->post('ifsc_code'),
);
            $supplier_details = array_merge($supplier_details, $supplier_details1);
        }
        $this->db->insert('fpo_suppliers', $supplier_details);
        $last_inserted_supplier_id = $this->db->insert_id();
        $currentDate = date('Y-m-d');
        $month=date("m", strtotime($currentDate));
        if ($month < '04') {
            $tran_date = date('Y-04-01', strtotime('-1 year'));
        } else {
            $tran_date = date('Y-04-01');
        }
        $payment_details = array(
'fpo_id'            => $_SESSION['user_id'],
'voucher_no'        => 'SC_'.$last_inserted_supplier_id,
'type'              => 9,
//'type_no'           => $deposit['cost_center'],
'tran_date'         => $tran_date,
'account'           => $last_inserted_supplier_id,
'account_code'      => ($this->input->post('group_code'))?$this->input->post('group_code'):"",
'amount'            => ($this->input->post('transaction_type') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance'),
'person_type_id'    => 1,
'person_id'    		=> $last_inserted_supplier_id,
'memo'              => 'Opening Balance'
);

        $this->db->insert('fpo_gl_trans', $payment_details);
        if ($this->input->post('same_customer') == 1) {
            $supp_gl_group ='';
            if ($this->input->post('account_group') == '3030201' || $this->input->post('account_group') == '3030202' || $this->input->post('account_group') == '3030203') {
                $supp_gl_group = '4020201';
            } else {
                $supp_gl_group = '4020202';
            }
            $fpo_id = $this->session->userdata('user_id');
            $customer_details = array(
'fpo_id' 					      => $this->session->userdata('user_id'),
'name' 				            => $this->input->post('supplier_name'),
'debtor_ref'          	      => $this->input->post('supp_short_name'),
'gl_group'          	         => $supp_gl_group,
'pincode'          	         => $this->input->post('pin_code'),
'state'          	            => $this->input->post('state'),
'district'          	         => $this->input->post('district'),
'taluk_id'          	         => $this->input->post('taluk_id'),
'block'          	            => $this->input->post('block'),
'panchayat'          	      => $this->input->post('gram_panchayat'),
'village'          	         => $this->input->post('village'),
'address'          	         => $this->input->post('street'),
'contact_person'          	   => $this->input->post('billing_contact_person'),
'std_code'          	         => $this->input->post('billing_std_code'),
'phone_number'          	   => $this->input->post('billing_phone_num'),
'mobile_number'          	   => $this->input->post('billing_mobile_num'),
'email'           	         => $this->input->post('billing_email'),
'physical_pincode'          	=> $this->input->post('physical_pin_code'),
'physical_state'          	   => $this->input->post('physical_state'),
'physical_district'           => $this->input->post('physical_district'),
'physical_taluk_id'           => $this->input->post('physical_taluk_id'),
'physical_block'          	   => $this->input->post('physical_block'),
'physical_panchayat'    	   => $this->input->post('physical_gram_panchayat'),
'physical_village'    	      => $this->input->post('physical_village'),
'physical_street'    	      => $this->input->post('physical_street'),
'physical_contact_person'     => $this->input->post('shipping_contact_person'),
'physical_std_code'    		   => $this->input->post('shipping_std_code'),
'physical_phone_number'    	=> $this->input->post('shipping_phone_num'),
'physical_mobile_num'    	   => $this->input->post('shipping_mobile_num'),
'physical_email'    		      => $this->input->post('shipping_email'),
'gst_no'    				      => $this->input->post('gst'),
'pan_no'    				      => $this->input->post('pan'),
'registration_type'    	      => $this->input->post('registration_type'),
'sameaddress'    	            => $this->input->post('sameaddress'),
'place_of_customer'      	   => $this->input->post('place_of_customer'),
'discount'      		         => 0,
'credit_limit'      		      => 0,
'pymt_discount'      	      => 0,
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
            if ($this->input->post('bank_info') == 1) {
                $customer_details1 = array(
'account_number'      	=> $this->input->post('account_number'),
'bank_name'      			=> $this->input->post('bank_name'),
'branch_name'      		=> $this->input->post('branch_name'),
'bank_details'      		=> $this->input->post('bank_info'),
'ifsc_code'      			=> $this->input->post('ifsc_code'),
);
                $customer_details = array_merge($customer_details, $customer_details1);
            }
            $payment_customer_details = array(
'fpo_id'            => $_SESSION['user_id'],
'voucher_no'        => 'trv_RT_'.$last_inserted_supplier_id,
'type'              => 9,
//'type_no'         => $deposit['cost_center'],
'tran_date'         => $tran_date,
'account'           => $last_inserted_supplier_id,
'account_code'      => ($this->input->post('group_code'))?$this->input->post('group_code'):"",
'amount'            => ($this->input->post('transaction_type') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance'),
'person_type_id'     => 2,
'person_id'    		=> $last_inserted_supplier_id,
'memo'               => 'Opening Balance'
);
            $this->db->insert('fpo_gl_trans', $payment_customer_details);
        }
        return true;
    }

    public function updatesupplier($supplier_id)
    {
        $supplierdetails = array(
'fpo_id' 					=> $this->session->userdata('user_id'),
'supp_name' 				=> $this->input->post('supplier_name'),
'supp_ref'          		=> $this->input->post('supp_short_name'),
'address'    				=> 0,
'supp_address'      		=> 0,
'supp_place'      			=> $this->input->post('supply_place'),
'gst_no'   					=> $this->input->post('gst'),
'pan_no'   					=> $this->input->post('pan'),
'gl_group_id'   			=> $this->input->post('account_group'),
'gl_acc_name'   			=> $this->input->post('account_name'),
'gl_acc_status'   			=> $this->input->post('account_status'),
'regist_type'   			=> $this->input->post('registration_type'),
'mailing_pincode'           => $this->input->post('pin_code'),
'mailing_state'             => $this->input->post('state'),
'mailing_district'          => $this->input->post('district'),
'mailing_block'             => $this->input->post('block'),
'mailing_panchayat'         => $this->input->post('gram_panchayat'),
'mailing_village'           => $this->input->post('village'),
'mailing_taluk_id'          => $this->input->post('taluk_id'),
'mailing_street'            => $this->input->post('street'),
'mailing_contact_person'    => $this->input->post('billing_contact_person'),
'mailing_mobile_no'   		=> $this->input->post('billing_mobile_num'),
'mailing_phone_no'   		=> $this->input->post('billing_phone_num'),
'mailing_std_code'   		=> $this->input->post('billing_std_code'),
'mailing_email_id'   		=> $this->input->post('billing_email'),
'physical_pincode'          => $this->input->post('physical_pin_code'),
'physical_state'            => $this->input->post('physical_state'),
'physical_district'         => $this->input->post('physical_district'),
'physical_block'            => $this->input->post('physical_block'),
'physical_panchayat'        => $this->input->post('physical_gram_panchayat'),
'physical_village'          => $this->input->post('physical_village'),
'physical_taluk_id'         => $this->input->post('physical_taluk_id'),
'physical_street'           => $this->input->post('physical_street'),
'physical_contact_person'   => $this->input->post('shipping_contact_person'),
'physical_mobile_no'   		=> $this->input->post('shipping_mobile_num'),
'physical_phone_no'   		=> $this->input->post('shipping_phone_num'),
'physical_std_code'   		=> $this->input->post('shipping_std_code'),
'physical_email_id'   		=> $this->input->post('shipping_email'),
'same_address'           	=> $this->input->post('sameaddress'),
'supp_account_no'			=> strtoupper($this->input->post('our_customer_no')),
'credit_period'				=> $this->input->post('credit_period'),
'maintain_bill'				=> $this->input->post('maintain_bill'),
'transaction_type'			=> $this->input->post('transaction_type'),
'opening_balance'			=> $this->input->post('opening_balance'),
// 'website'         			=> $this->input->post('website'),
'bank_account'      		=> $this->input->post('account_number'),
'bank_name'      			=> $this->input->post('bank_name'),
'branch_name'      			=> $this->input->post('branch_name'),
'bank_detail'      			=> $this->input->post('bank_info'),
'ifsc_code'      			=> $this->input->post('ifsc_code'),
'curr_code'         		=> 'INR',
'payment_terms'     		=> $this->input->post('payment_terms'),
//  'tax_included'      		=> $tax_included,
//  'tax_group_id'      		=> $this->input->post('taxt_group'),
//   'credit_limit'     			=> $this->input->post('credit_limit'),
//  'purchase_account'  		=> $this->input->post('purchase_account'),
//	'payable_account'   		=> $this->input->post('accounts_payable'),
//	'payment_discount_account'  => $this->input->post('purchase_discount_account'),
'notes'    					=> $this->input->post('general_notes'),
'status'            		=> 1,
);
        $fpo_id = $this->session->userdata('user_id');
        $currentDate = date('Y-m-d');
        $month=date("m", strtotime($currentDate));
        if ($month < '04') {
            $tran_date = date('Y-04-01', strtotime('-1 year'));
        } else {
            $tran_date = date('Y-04-01');
        }
        $payment_details = array(
'fpo_id'            => $fpo_id,
'voucher_no'        => 'SC_'.$supplier_id,
'type'              => 9,
'tran_date'         => $tran_date,
'account'           => $supplier_id,
'account_code'      => ($this->input->post('group_code'))?$this->input->post('group_code'):"",
'amount'            => ($this->input->post('transaction_type') == 1)?$this->input->post('opening_balance'):'-'.$this->input->post('opening_balance'),
'person_type_id'    => 1,
'person_id'    		=> $supplier_id,
'memo'              => 'Opening Balance'
);
        $result = $this->db->query("SELECT counter FROM fpo_gl_trans WHERE account = '".$supplier_id."' AND fpo_id = '".$fpo_id."' AND tran_date = '".$tran_date."' AND LOWER(memo) = 'opening balance' AND person_type_id = 1");
        if ($result->num_rows() >0) {
            $this->db->update('fpo_gl_trans', $payment_details, array('account' => $supplier_id, fpo_id => $fpo_id, 'tran_date' => $tran_date, 'memo' => 'Opening Balance','person_type_id'=>1));
        } else {
            $this->db->insert('fpo_gl_trans', $payment_details);
        }

        return $this->db->update('fpo_suppliers', $supplierdetails, array('supplier_id' => $supplier_id));
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
    public function getAllSaleArea()
    {
        $this->db->select('fpo_sales_area.*');
        $this->db->where(array('fpo_sales_area.status' => 1,'fpo_sales_area.fpo_id' => $this->session->userdata('user_id')));
        $this->db->order_by("fpo_sales_area.id", "desc");
        $this->db->from('fpo_sales_area');
        return $this->db->get()->result();
    }
    public function supplierByID($supplier)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_suppliers.*, trv_village_master.name As village_name, trv_panchayat_master.name As panchayat_name, trv_block_master.name As block_name, trv_taluk_master.name As taluk_name, trv_district_master.name As district_name, trv_state_master.name As state_name, trv_village_master.name As physical_village_name, trv_panchayat_master.name As physical_panchayat_name, trv_block_master.name As physical_block_name, trv_taluk_master.name As physical_taluk_name, trv_district_master.name As physical_district_name, trv_state_master.name As physical_state_name');
        $this->db->select('trv_bank_name_master.name As bankName');
        $this->db->join('trv_state_master', 'trv_state_master.state_code = fpo_suppliers.mailing_state');
        $this->db->join('trv_district_master', 'trv_district_master.district_code = fpo_suppliers.mailing_district');
        $this->db->join('trv_village_master', 'trv_village_master.id = fpo_suppliers.mailing_village', 'left');
        $this->db->join('trv_panchayat_master', 'trv_panchayat_master.panchayat_code = fpo_suppliers.mailing_panchayat', 'left');
        $this->db->join('trv_taluk_master', 'trv_taluk_master.taluk_code = fpo_suppliers.mailing_taluk_id', 'left');
        $this->db->join('trv_block_master', 'trv_block_master.block_code = fpo_suppliers.mailing_block', 'left');
        $this->db->join('trv_bank_name_master', 'trv_bank_name_master.id = fpo_suppliers.bank_name', 'left');
        $this->db->where(array('fpo_suppliers.supplier_id'=>$supplier,'fpo_suppliers.fpo_id' => $fpoid));
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }


    public function delete_supplier($supplier_id)
    {
        $supplierid= array(
'status' => 0
);
        return $this->db->update('fpo_suppliers', $supplierid, array('supplier_id' => $supplier_id));
    }
    //supplier end//

    //payment terms start//
    public function payment_terms_list()
    {
        $this->db->select('fpo_payment_terms.*');
        $this->db->where(array('fpo_payment_terms.status' => '1'));
        $this->db->order_by("fpo_payment_terms.terms_indicator", "desc");
        $this->db->from('fpo_payment_terms');
        return $this->db->get()->result();
    }
    //payment terms end//

    //purchase entry start//
    public function purchase_order_list()
    {
        $this->db->select('fpo_payment_terms.*');
        $this->db->where(array('fpo_payment_terms.status' => '1'));
        $this->db->order_by("fpo_payment_terms.terms_indicator", "desc");
        $this->db->from('fpo_payment_terms');
        return $this->db->get()->result();
    }

    public function productByFPOId()
    {
        $this->db->select('trv_fpo_product.*, trv_product_master.name as product_name');
        $this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
        $this->db->where(array('trv_fpo_product.fpo_id' => $this->session->userdata('user_id'), 'trv_fpo_product.status' => 1));
        $this->db->from('trv_fpo_product');
        return $this->db->get()->result();
    }

    public function add_purchaseorder()
    {
        $purchase_order = array(
'fpo_id' 				 => $this->session->userdata('user_id'),
'supplier_id'      		 => $this->input->post('supplier'),
'comments'				 => $this->input->post('memo'),
'ord_date'   			 => $this->input->post('order_date'),
'into_stock_location'    => 'DEF',
'supp_quotation_ref'     => $this->input->post('supplier_reference'),
'delivery_address	'    => $this->input->post('delivery_to') ,
'total'      			 => $this->input->post('sub_total'),
);

        $purchaseorder= $this->db->insert('fpo_purch_orders', $purchase_order);
        $orderno = $this->db->insert_id();
        $refval = str_pad($orderno, 6, '0', STR_PAD_LEFT);

        if ($orderno) {
            $refid= array(
'reference' => $refval,
);
            $stockreftodetail= $this->db->update('fpo_purch_orders', $refid, array('order_no' => $orderno));
        }
        $item_code =$this->input->post('item_code');
        $item_description =$this->input->post('item_description');
        $delivery_date = $this->input->post('delivery_date');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');

        for ($i=0;$i<count($item_description);$i++) {
            $description=$this->db->select('trv_product_master.name as product_name')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' =>$item_code[$i]))->from('trv_fpo_product')->get()->row()->product_name;


            $purch_order_details = array(
'fpo_id' 				=> $this->session->userdata('user_id'),
'order_no'      		=> $orderno,
'item_code'			    => $item_code[$i],
'description'   		=> $description,
'delivery_date'         => $delivery_date[$i] ,
'qty_invoiced'          => 0,
'unit_price	'           => $price[$i],
'act_price'      		=> 0,
'std_cost_unit'      	=> 0,
'quantity_ordered'      => $qty[$i],
'uom'					=> $uom[$i],
);
            $purchaseorder_details= $this->db->insert('fpo_purch_order_details', $purch_order_details);
        }


        for ($i=0;$i<count($item_description);$i++) {
            $description=$this->db->select('trv_product_master.name as product_name')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' =>$item_code[$i]))->from('trv_fpo_product')->get()->row()->product_name;

            $supplierdetail = array(
'supplier_id'      		 => $this->input->post('supplier'),
'stock_id'      		 => $item_code[$i],
'price'				 	 => $price[$i],
'suppliers_uom'       	 => $uom[$i],
'conversion_factor	'    => 1,
'supplier_description'   =>$description,
);

            $supplier= $this->db->insert('fpo_purch_data', $supplierdetail);
        }

        return  array($purchaseorder,$purchaseorder_details,$supplier);
    }


    public function outstandingBysearch()
    {
        $supplier=$this->input->post('supplier');
        $from=$this->input->post('from');
        $to=$this->input->post('to');
        $location=$this->input->post('location');
        $item_code=$this->input->post('item_code');
        $reference=$this->input->post('reference');
        if ($supplier) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,fpo_purch_order_details.po_detail_item as orders');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->where('fpo_purch_order_details.quantity_ordered != ', 'fpo_purch_order_details.quantity_received', false);
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($from & $to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.ord_date >=' =>$from,'fpo_purch_orders.ord_date <=' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->where('fpo_purch_order_details.quantity_ordered != ', 'fpo_purch_order_details.quantity_received', false);
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($from) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.ord_date' =>$from,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->where('fpo_purch_order_details.quantity_ordered != ', 'fpo_purch_order_details.quantity_received', false);
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_purch_orders.ord_date' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->where('fpo_purch_order_details.quantity_ordered != ', 'fpo_purch_order_details.quantity_received', false);
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($location) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.delivery_address' =>$location,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->where('fpo_purch_order_details.quantity_ordered != ', 'fpo_purch_order_details.quantity_received', false);
            $this->db->from('fpo_purch_orders');
            $result =$this->db->get()->result();
        } elseif ($item_code) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_order_details.item_code' =>$item_code,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->where('fpo_purch_order_details.quantity_ordered != ', 'fpo_purch_order_details.quantity_received', false);
            $this->db->from('fpo_purch_orders');
            $result =$this->db->get()->result();
        } elseif ($reference) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.reference' =>$reference,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->where('fpo_purch_order_details.quantity_ordered != ', 'fpo_purch_order_details.quantity_received', false);
            $this->db->from('fpo_purch_orders');
            $result =$this->db->get()->result();
        }
        return $result;
    }

    public function purchaseBysearch()
    {
        $supplier=$this->input->post('supplier');
        $from=$this->input->post('from');
        $to=$this->input->post('to');
        $location=$this->input->post('location');
        $item_code=$this->input->post('item_code');
        $reference=$this->input->post('reference');

        if ($supplier) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($from & $to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_purch_orders.ord_date >=' =>$from,'fpo_purch_orders.ord_date <=' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($from) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_purch_orders.ord_date' =>$from,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_purch_orders.ord_date' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($location) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_purch_orders.delivery_address' =>$location,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result =$this->db->get()->result();
        } elseif ($item_code) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_order_details.item_code' =>$item_code,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result =$this->db->get()->result();
        } elseif ($reference) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_purch_orders.reference' =>$reference,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result =$this->db->get()->result();
        }
        return $result;
    }


    public function transactionBysearch()
    {
        $supplier=$this->input->post('supplier');
        $from=$this->input->post('from');
        $to=$this->input->post('to');
        $location=$this->input->post('location');

        if ($supplier) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,fpo_suppliers.credit_limit as current_credit_limit,fpo_purch_order_details.quantity_received as received_qty,fpo_purch_order_details.quantity_ordered as qty_ordered,fpo_purch_order_details.delivery_date as delivery_date');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($from & $to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,fpo_suppliers.credit_limit as current_credit_limit,fpo_purch_order_details.quantity_received as received_qty,fpo_purch_order_details.quantity_ordered as qty_ordered,fpo_purch_order_details.delivery_date as delivery_date');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.ord_date >=' =>$from,'fpo_purch_orders.ord_date <=' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($from) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,fpo_suppliers.credit_limit as current_credit_limit,fpo_purch_order_details.quantity_received as received_qty,fpo_purch_order_details.quantity_ordered as qty_ordered,fpo_purch_order_details.delivery_date as delivery_date');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.ord_date' =>$from,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,fpo_suppliers.credit_limit as current_credit_limit,fpo_purch_order_details.quantity_received as received_qty,fpo_purch_order_details.quantity_ordered as qty_ordered,fpo_purch_order_details.delivery_date as delivery_date');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.ord_date' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result = $this->db->get()->result();
        } elseif ($location) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,fpo_suppliers.credit_limit as current_credit_limit,fpo_purch_order_details.quantity_received as received_qty,fpo_purch_order_details.quantity_ordered as qty_ordered,fpo_purch_order_details.delivery_date as delivery_date');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_orders.delivery_address' =>$location,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            $result =$this->db->get()->result();
        }

        return $result;
    }
    public function get_purchase_supplier()
    {
        $supplier=$this->input->post('supplier');
        $from=$this->input->post('from');
        $to=$this->input->post('to');
        $reference=$this->input->post('reference');
        $item_code=$this->input->post('item_code');
        $location=$this->input->post('location');

        if ($from & $to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,trv_godown_master.name as suppiler_delivery_address');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('trv_godown_master', 'trv_godown_master.id = fpo_purch_orders.delivery_address');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.ord_date >=' =>$from,'fpo_purch_orders.ord_date <=' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            return $this->db->get()->result();
        } elseif ($from) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,trv_godown_master.name as suppiler_delivery_address');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('trv_godown_master', 'trv_godown_master.id = fpo_purch_orders.delivery_address');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.ord_date' =>$from,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            return $this->db->get()->result();
        } elseif ($to) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,trv_godown_master.name as suppiler_delivery_address');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('trv_godown_master', 'trv_godown_master.id = fpo_purch_orders.delivery_address');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.ord_date' =>$to,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            return $this->db->get()->result();
        } elseif ($location) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,trv_godown_master.name as suppiler_delivery_address');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('trv_godown_master', 'trv_godown_master.id = fpo_purch_orders.delivery_address');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.delivery_address' =>$location,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            return $this->db->get()->result();
        } elseif ($reference) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,trv_godown_master.name as suppiler_delivery_address');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('trv_godown_master', 'trv_godown_master.id = fpo_purch_orders.delivery_address');
            $this->db->where(array('fpo_purch_orders.supplier_id' =>$supplier,'fpo_purch_orders.reference' =>$reference,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            return $this->db->get()->result();
        } elseif ($item_code) {
            $this->db->select('fpo_purch_orders.*,fpo_suppliers.supp_name as suppiler_name,trv_godown_master.name as suppiler_delivery_address');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->join('trv_godown_master', 'trv_godown_master.id = fpo_purch_orders.delivery_address');
            $this->db->join('fpo_purch_order_details', 'fpo_purch_order_details.order_no = fpo_purch_orders.order_no');
            $this->db->where(array('fpo_purch_order_details.item_code' =>$item_code,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
            $this->db->from('fpo_purch_orders');
            return $this->db->get()->result();
        }
    }

    public function orderByID($orderid)
    {
        $this->db->select('fpo_purch_orders.*');
        $this->db->where(array('fpo_purch_orders.order_no' =>$orderid,'fpo_purch_orders.fpo_id' =>$this->session->userdata('user_id')));
        $this->db->from('fpo_purch_orders');
        return $this->db->get()->row_array();
    }

    public function orderdetailsByOrderno($orderid)
    {
        $this->db->select('fpo_purch_order_details.*');
        $this->db->where(array('fpo_purch_order_details.order_no' =>$orderid,'fpo_purch_order_details.fpo_id' =>$this->session->userdata('user_id')));
        $this->db->from('fpo_purch_order_details');
        return $this->db->get()->result();
    }
    //purchase entry end//
    public function update_grn()
    {
        $orderno =$this->input->post('order_no');
        $purchase_order = array(
'fpo_id' 				 => $this->session->userdata('user_id'),
'supplier_id'      		 => $this->input->post('supplier'),
'comments'				 => $this->input->post('memo'),
'ord_date'   			 => $this->input->post('deliverydate'),
'delivery_address' 	     => $this->input->post('delivery_to') ,
'supp_quotation_ref'     => $this->input->post('supplier_reference'),
'total'      			 => $this->input->post('sub_total'),
);

        $purchaseorder= $this->db->update('fpo_purch_orders', $purchase_order, array('order_no' => $orderno));

        $item_code =$this->input->post('item_code');
        $quantity_received =$this->input->post('received');
        $item_description =$this->input->post('item_description');
        $delivery_date = $this->input->post('delivery_date');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');

        for ($i=0;$i<count($item_description);$i++) {
            $description=$this->db->select('trv_product_master.name as product_name')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' =>$item_code[$i]))->from('trv_fpo_product')->get()->row()->product_name;
            $purch_order_details = array(
'fpo_id' 				=> $this->session->userdata('user_id'),
'order_no'      		=> $orderno,
'item_code'			    => $item_code[$i],
'description'   		=> $description,
'delivery_date'         => $delivery_date[$i] ,
'qty_invoiced'          => 0,
'unit_price	'           => $price[$i],
'quantity_received'     => $quantity_received[$i],
'act_price'      		=> 0,
'std_cost_unit'      	=> 0,
'quantity_ordered'      => $qty[$i],
'uom'					=> $uom[$i],
);

            $purchaseorder_details= $this->db->update('fpo_purch_order_details', $purch_order_details, array('order_no' => $orderno));

            $supplierdetail = array(
'stock_id'      		 => $item_code[$i],
'price'				 	 => $price[$i],
'suppliers_uom'       	 => $uom[$i],
'conversion_factor	'    => 1,
'supplier_description'   =>$item_description[$i],
);

            $supplier= $this->db->update('fpo_purch_data', $supplierdetail, array('supplier_id' => $this->input->post('supplier')));


            $get_stock_master= $this->db->select('stock_id')->from('fpo_stock_master')->where('category_id', $item_code[$i])->get()->row();

            if (empty($get_stock_master)) {
                $description=$this->db->select('trv_product_master.name as product_name')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' =>$item_code[$i]))->from('trv_fpo_product')->get()->row()->product_name;

                $stock_master = array(
                'category_id'      	 => $item_code[$i],
                'description'      	 => $description,
                'units'				 => $uom[$i],
                'actual_cost'        => $this->input->post('sub_total'),
                'fpo_id' 			 => $this->session->userdata('user_id'),
                );

                $stockmaster = $this->db->insert('fpo_stock_master', $stock_master);
                $stockid     = $this->db->insert_id();

                $stock_moves = array(
                'trans_no'               => $orderno,
                'stock_id'      		 => $stockid ,
                'loc_code'				 => $this->input->post('delivery_to'),
                'tran_date'       	 	 => $this->input->post('deliverydate'),
                'price'                  => $price[$i],
                'qty'                    => $quantity_received[$i],
                'reference'       		 => $this->input->post('reference'),
                'person_id' 			 => $this->session->userdata('user_id'),
                'visible'                =>1
                );

                $stockmoves= $this->db->insert('fpo_stock_moves', $stock_moves);
                $stocktoid = $this->db->insert_id();
                $stock_id = str_pad($stocktoid, 6, '0', STR_PAD_LEFT);

                if ($stockmoves) {
                    $refid= array(
                    'reference' => $stock_id,
                    );
                    $stockreftodetail= $this->db->update('fpo_stock_moves', $refid, array('trans_id' => $stocktoid));
                }
            } else {
                $stock_moves = array(
                'trans_no'               => $orderno,
                'stock_id'      		 => $get_stock_master->stock_id,
                'loc_code'				 => $this->input->post('delivery_to'),
                'tran_date'       	 	 => $this->input->post('deliverydate'),
                'price'                  => $price[$i],
                'qty'                    => $quantity_received[$i],
                'reference'       		 => $this->input->post('reference'),
                'person_id' 			 => $this->session->userdata('user_id'),
                'visible'                =>1
                );

                $stockmoves= $this->db->insert('fpo_stock_moves', $stock_moves);
                $stocktoid = $this->db->insert_id();
                $stock_id = str_pad($stocktoid, 6, '0', STR_PAD_LEFT);

                if ($stockmoves) {
                    $refid= array(
'reference' => $stock_id,
);
                    $stockreftodetail= $this->db->update('fpo_stock_moves', $refid, array('trans_id' => $stocktoid));
                }
            }
        }
        if (!empty($stock_moves or $stock_master)) {
            return  array($purchaseorder,$purchaseorder_details,$stockmaster,$stockmoves);
        } else {
            return  array($purchaseorder,$purchaseorder_details,);
        }
    }

    public function delete_grn($po_id)
    {
        $this->db->where('po_detail_item', $po_id);

        $this->db->delete('fpo_purch_order_details');
    }


    public function add_directgrn()
    {
        $purchase_order = array(
        'fpo_id' 				 => $this->session->userdata('user_id'),
        'supplier_id'      		 => $this->input->post('supplier'),
        'comments'				 => $this->input->post('memo'),
        'ord_date'   			 => $this->input->post('delivery_date'),
        'into_stock_location'	 => $this->input->post('receive_into'),
        'supp_quotation_ref'     => $this->input->post('supplier_reference'),
        'delivery_address	'    => $this->input->post('delivery_to') ,
        'total'      			 => $this->input->post('sub_total'),
        );

        $purchaseorder= $this->db->insert('fpo_purch_orders', $purchase_order);
        $orderno = $this->db->insert_id();
        $refval = str_pad($orderno, 6, '0', STR_PAD_LEFT);
        if ($orderno) {
            $refid= array(
            'reference' => $refval,
            );
            $directgrndetail= $this->db->update('fpo_purch_orders', $refid, array('order_no' => $orderno));
        }
        $item_code =$this->input->post('item_code');
        $quantity_received =$this->input->post('received');
        $item_description =$this->input->post('item_description');
        $delivery_date = $this->input->post('delivery_date');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');

        for ($i=0;$i<count($item_description);$i++) {
            $description=$this->db->select('trv_product_master.name as product_name')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' =>$item_code[$i]))->from('trv_fpo_product')->get()->row()->product_name;

            $purch_order_details = array(
            'fpo_id' 				=> $this->session->userdata('user_id'),
            'order_no'      		=> $orderno,
            'item_code'			    => $item_code[$i],
            'description'   		=> $description,
            'delivery_date'         => $this->input->post('delivery_date') ,
            'qty_invoiced'          => 0,
            'unit_price	'           => $price[$i],
            'quantity_received'     => $quantity_received[$i],
            'act_price'      		=> 0,
            'std_cost_unit'      	=> 0,
            'quantity_ordered'      => $qty[$i],
            'uom'					=> $uom[$i],
            );
            $purchaseorder_details= $this->db->insert('fpo_purch_order_details', $purch_order_details);

            $get_stock_master= $this->db->select('stock_id')->from('fpo_stock_master')->where('category_id', $item_code[$i])->get()->row();

            if (empty($get_stock_master)) {
                $description=$this->db->select('trv_product_master.name as product_name')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' =>$item_code[$i]))->from('trv_fpo_product')->get()->row()->product_name;

                $stock_master = array(
                'category_id'      	 => $item_code[$i],
                'description'      	 => $description,
                'units'				 => $uom[$i],
                'actual_cost'        => $this->input->post('sub_total'),
                'fpo_id' 			 => $this->session->userdata('user_id'),
                );

                $stockmaster = $this->db->insert('fpo_stock_master', $stock_master);
                $stockid     = $this->db->insert_id();
                $stock_moves = array(
                'trans_no'               => $orderno,
                'stock_id'      		 => $stockid ,
                'loc_code'				 => $this->input->post('delivery_to'),
                'tran_date'       	 	 => $this->input->post('delivery_date'),
                'price'                  => $price[$i],
                'qty'                    => $quantity_received[$i],
                'person_id' 			 => $this->session->userdata('user_id'),
                'visible'                =>1
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
                $stock_moves = array(
                'trans_no'               => $orderno,
                'stock_id'      		 => $get_stock_master->stock_id,
                'loc_code'				 => $this->input->post('delivery_to'),
                'tran_date'       	 	 => $this->input->post('delivery_date'),
                'price'                  => $price[$i],
                'qty'                    => $quantity_received[$i],
                'person_id' 			 => $this->session->userdata('user_id'),
                'visible'                =>1
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
        }


        for ($i=0;$i<count($item_description);$i++) {
            $supplierdetail = array(
            'supplier_id'      		 => $this->input->post('supplier'),
            'stock_id'      		 => $item_code[$i],
            'price'				 	 => $price[$i],
            'suppliers_uom'       	 => $uom[$i],
            'conversion_factor	'    => 1,
            'supplier_description'   =>$item_description[$i],
            );

            $supplier= $this->db->insert('fpo_purch_data', $supplierdetail);
        }
        //echo '<pre>';

        return  array($purchaseorder,$purchaseorder_details,$supplier);
    }

    public function add_purchase_entry()
    {
        $logined_fpo_gst = $this->db->select('trv_fpo.gst_enable')->where(array('trv_fpo.user_id' => $this->session->userdata('user_id')))->from('trv_fpo')->get()->row()->gst_enable;
        //echo '<pre>';echo json_encode($this->input->post());die;
        $supp_trans = array(
        'fpo_id' 				 => $this->session->userdata('user_id'),
        'supplier_id'      		 => $this->input->post('sub_supplier'),
        'reference'		 		 => $this->input->post('voucher_no'),
        'supp_reference'		 => $this->input->post('invoice_no'),
        'tran_date'   			 => $this->input->post('entry_date'),
        'due_date'   			 => $this->input->post('invoice_date'),
        'ov_amount'   			 => $this->input->post('sub_total'),
        'ov_discount'   		 => $this->input->post('discount'),
        'delivery_charge'   	 => $this->input->post('delivery_charge'), // Shipping charge only
        'adjustment'      	 	 => $this->input->post('adjustment'),
        //'ov_cess'   	 			 => $this->input->post('cess_available'),
        'type'   			     => 20,
        'rate'					 => 1,
        'alloc'					 => $this->input->post('amount_total'),
        'tax_included'        	 => $this->input->post('includeGst') ? $this->input->post('includeGst') : 0,
        'memo'           		 => $this->input->post('memo'),
        );

        if ($logined_fpo_gst > 0) {
            $supp_trans['ov_gst'] = $this->input->post('tax_total');
            $supp_trans['cgst'] = $this->input->post('cgst');
            $supp_trans['sgst'] = $this->input->post('sgst');
            $supp_trans['igst'] = $this->input->post('igst');
            $supp_trans['freight_percent'] = 5;
            $supp_trans['ov_freight_tax'] = $this->input->post('gst_delivery_charge'); // GST shipping charge only
        }

        $supplier_trans_detail= $this->db->insert('fpo_supp_trans', $supp_trans);
        $trans_id = $this->db->insert_id();
        $tranid = str_pad($trans_id, 6, '0', STR_PAD_LEFT);
        /* $transid='INV_'.$tranid;
        if($supplier_trans_detail){

        $refid= array(
        'reference' => $transid,
        );
        $transdetail= $this->db->update('fpo_supp_trans', $refid, array('trans_no' => $trans_id));

        } */

        $purchase_order = array(
        'fpo_id' 				 => $this->session->userdata('user_id'),
        'supplier_id'      	 => $this->input->post('sub_supplier'),
        'comments'				 => $this->input->post('memo'),
        'ord_date'   			 => $this->input->post('entry_date'),
        'supp_quotation_ref'  => $this->input->post('invoice_no'),
        'delivery_address	'   => $this->input->post('sub_delivery_to'),
        'total'      			 => $this->input->post('amount_total'),
        );

        $purchaseorder= $this->db->insert('fpo_purch_orders', $purchase_order);
        $orderno = $this->db->insert_id();
        $refval = str_pad($orderno, 6, '0', STR_PAD_LEFT);
        if ($orderno) {
            $refid= array(
            'reference' => $refval,
            );
            $directgrndetail= $this->db->update('fpo_purch_orders', $refid, array('order_no' => $orderno));
        }
        $delivery_state = $this->db->select('trv_godown_master.state_id')->where(array('trv_godown_master.id' => $this->input->post('sub_delivery_to')))->from('trv_godown_master')->get()->row()->state_id;
        $logined_fpo_gst = $this->db->select('trv_fpo.gst_enable')->where(array('trv_fpo.user_id' => $this->session->userdata('user_id')))->from('trv_fpo')->get()->row()->gst_enable;
        /***** Check for cash purchase ***/
        if ($this->input->post('sub_supplier') == '4020501' || $this->input->post('sub_supplier') == '4020502') {
            $gl_code=$this->input->post('sub_supplier');
            $supplier_state=$delivery_state;
        } else {
            $gl_code=$this->db->select('fpo_suppliers.gl_group_id')->where(array('fpo_suppliers.supplier_id' => $this->input->post('sub_supplier')))->from('fpo_suppliers')->get()->row()->gl_group_id;
            $supplier_state=$this->db->select('fpo_suppliers.mailing_state')->where(array('fpo_suppliers.supplier_id' => $this->input->post('sub_supplier')))->from('fpo_suppliers')->get()->row()->mailing_state;
        }
        $get_acc_code=0;
        if ($supplier_state == $delivery_state) {
            if ($logined_fpo_gst > 0) {
                $get_acc_code = 201010103; //Intra (CGST/SGST) - Taxable
            } elseif ($logined_fpo_gst == 0) {
                $get_acc_code = 201010101;  //Intra (CGST/SGST) - Exempted
            } else {
                $get_acc_code = 201010102; //Intra (CGST/SGST) - NIL Rated
            }
        } else {
            if ($logined_fpo_gst > 0) {
                $get_acc_code=201010106; //Inter (IGST) - Taxable
            } elseif ($logined_fpo_gst == 0) {
                $get_acc_code=201010104; //Inter (IGST) - Exempted
            } else {
                $get_acc_code=201010105; //Inter (IGST) - NIL Rated
            }
        }

        $payment_trans = array(
          'fpo_id' 				=> $this->session->userdata('user_id'),
          'voucher_no'		   => $this->input->post('voucher_no'),
          'account_code'   	 	=> $gl_code,
          'type'   		 		=> 5,
          'tran_date'   			=> $this->input->post('entry_date'),
          'amount'   			   => $this->input->post('amount_total'),
          'person_type_id'     => 1,
          'person_id'          => $this->input->post('sub_supplier'),
          'account'            => $this->input->post('sub_supplier'),
          'memo'           		=> $this->input->post('memo'),
          );

        $payment_trans_detail= $this->db->insert('fpo_gl_trans', $payment_trans);

        $updateglcode = array(
          'fpo_id' 				=> $this->session->userdata('user_id'),
          'voucher_no'		    => $this->input->post('voucher_no'),
          'account_code'   		=> $get_acc_code,
          'type'   		 		=> 5,
          'type_no'   		 	=> 1,
          'tran_date'   			=> $this->input->post('entry_date'),
          'amount'   			    => '-'.$this->input->post('sub_total'),
          'person_type_id'      	=> 1,
          'person_id'           	=> $this->input->post('sub_supplier'),
          'account'             	=> $this->input->post('sub_supplier'),
          'memo'           		=> $this->input->post('memo'),
          );

        $updateglcode_detail= $this->db->insert('fpo_gl_trans', $updateglcode);

        if ($supplier_state == $delivery_state) {
            if ($logined_fpo_gst > 0) {
                $input_cgst = '303010101'; //Input CGST
                $input_sgst = '303010103'; //Input SGST
                $input_cgst_total = $this->input->post('cgst');
                $input_sgst_total = $this->input->post('sgst');

                $purchase_gl_trans_gst = array(
                'fpo_id' 				=> $this->session->userdata('user_id'),
                'voucher_no'		   => $this->input->post('voucher_no'),
                'account_code'   		=> $input_cgst,
                'type'   		 		=> 5,
                'tran_date'   			=> $this->input->post('entry_date'),
                'amount'   			   => '-'.$input_cgst_total,
                'person_type_id'     => 1,
                'person_id'          => $this->input->post('sub_supplier'),
                'account'            => $this->input->post('sub_supplier'),
                'memo'           		=> $this->input->post('memo'),
                );
                $this->db->insert('fpo_gl_trans', $purchase_gl_trans_gst);

                $purchase_gl_trans_gst = array(
                'fpo_id' 				 => $this->session->userdata('user_id'),
                'voucher_no'		    => $this->input->post('voucher_no'),
                'account_code'   		 => $input_sgst,
                'type'   		 		 => 5,
                'tran_date'   			 => $this->input->post('entry_date'),
                'amount'   			    => '-'.$input_sgst_total,
                'person_type_id'      => 1,
                'person_id'           => $this->input->post('sub_supplier'),
                'account'             => $this->input->post('sub_supplier'),
                'memo'           		 => $this->input->post('memo'),
                );
                $this->db->insert('fpo_gl_trans', $purchase_gl_trans_gst);
            }
        } else {
            if ($logined_fpo_gst > 0) {
                $input_igst = '303010102'; //Input IGST
                $input_igst_total = $this->input->post('igst');

                $purchase_gl_trans_gst = array(
                'fpo_id' 				 => $this->session->userdata('user_id'),
                'voucher_no'		    => $this->input->post('voucher_no'),
                'account_code'   		 => $input_igst,
                'type'   		 		 => 5,
                'tran_date'   			 => $this->input->post('entry_date'),
                'amount'   			    => '-'.$input_igst_total,
                'person_type_id'      => 1,
                'person_id'           => $this->input->post('sub_supplier'),
                'account'             => $this->input->post('sub_supplier'),
                'memo'           		 => $this->input->post('memo'),
                );
                $this->db->insert('fpo_gl_trans', $purchase_gl_trans_gst);
            }
        }

        if ($this->input->post('delivery_charge') > 0) {
            $shipping_code = '201010401'; //Freight Inward
            $purchase_gl_trans_shipping = array(
            'fpo_id'              => $this->session->userdata('user_id'),
            'voucher_no'		    => $this->input->post('voucher_no'),
            'account_code'   		 => $shipping_code,
            'type'   		 		 => 5,
            'tran_date'   			 => $this->input->post('entry_date'),
            'amount'   			    => '-'.$this->input->post('delivery_charge'),// + $this->input->post('gst_delivery_charge')),
            'person_type_id'      => 1,
            'person_id'           => $this->input->post('sub_supplier'),
            'account'             => $this->input->post('sub_supplier'),
            'memo'           		 => $this->input->post('memo'),
            );
            $this->db->insert('fpo_gl_trans', $purchase_gl_trans_shipping);
        }

        if ($this->input->post('discount') >0) {
            $discount_code = '1020202'; //Trade Discount
            $purchase_gl_trans_discount = array(
            'fpo_id'              => $this->session->userdata('user_id'),
            'voucher_no'		    => $this->input->post('voucher_no'),
            'account_code'   		 => $discount_code,
            'type'   		 		 => 5,
            'tran_date'   			 => $this->input->post('entry_date'),
            'amount'   			    => $this->input->post('discount'),
            'person_type_id'      => 1,
            'person_id'           => $this->input->post('sub_supplier'),
            'account'             => $this->input->post('sub_supplier'),
            'memo'           		 => $this->input->post('memo'),
            );
            $this->db->insert('fpo_gl_trans', $purchase_gl_trans_discount);
        }

        if ($this->input->post('adjustment') != '') {
            $adjustment_code = '1020701';
            $purchase_gl_trans_adjustment = array(
            'fpo_id'              => $this->session->userdata('user_id'),
            'voucher_no'		    => $this->input->post('voucher_no'),
            'account_code'   		 => $adjustment_code,
            'type'   		 		 => 5,
            'tran_date'   			 => $this->input->post('entry_date'),
            'amount'   			    => $this->input->post('adjustment') >0 ? '-'.$this->input->post('adjustment') : abs($this->input->post('adjustment')),
            'person_type_id'      => 1,
            'person_id'           => $this->input->post('sub_supplier'),
            'account'             => $this->input->post('sub_supplier'),
            'memo'           		 => $this->input->post('memo'),
            );
            $this->db->insert('fpo_gl_trans', $purchase_gl_trans_adjustment);
        }

        if($this->input->post('payment_type') == '4020501'){
            $this->db->where(array('type' => 1, 'fpo_id' => $this->session->userdata('user_id')));
            $this->db->from('fpo_gl_trans');
            $this->db->group_by('voucher_no');
            $receipt = $this->db->get()->num_rows();
            $receipt = $receipt+1;
            $receipt = str_pad($receipt, 5, '0', STR_PAD_LEFT);
            $voucher_no = 'PT'.$receipt;
            $payment_gl = array(
                            'fpo_id'        => $this->session->userdata('user_id'),
                            'voucher_no'		=> $voucher_no,
                            'account_code'  => '4020501',
                            'type'   		 		=> 1,
                            'type_no'   		=> 1,
                            'tran_date'   	=> $this->input->post('entry_date'),
                            'amount'   			=> $this->input->post('amount_total'),
                            'person_id'     => $this->input->post('sub_supplier'),
                            'account'       => '4020501',
                            );
            $payment_gl_detail= $this->db->insert('fpo_gl_trans', $payment_gl);
            $payment_gl = null;
            $payment_gl = array(
                              'fpo_id' 				   => $this->session->userdata('user_id'),
                              'voucher_no'		   => $voucher_no,
                              'account_code'   	 => $gl_code,
                              'type'             => 1,
                              'tran_date'   		 => $this->input->post('entry_date'),
                              'amount'   			   => '-'.$this->input->post('amount_total'),
                              'person_id'        => $this->input->post('sub_supplier'),
                              'account'          => $this->input->post('sub_supplier'),
                              'memo'           	 => $this->input->post('memo'),
                              );
            $payment_gl_detail= $this->db->insert('fpo_gl_trans', $payment_gl);
        }

        $item_code =$this->input->post('item_description');
        $quantity_invoiced =$this->input->post('invoiced');
        $item_description =$this->input->post('item_description');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');
        $mrp = $this->input->post('mrp');
        $each_qty = $this->input->post('package_qty');
        $each_uom = $this->input->post('package_uom');
        $line_percent_cgst = $this->input->post('line_percent_cgst');
        $line_percent_sgst = $this->input->post('line_percent_sgst');
        $line_percent_igst = $this->input->post('line_percent_igst');
        $line_cgst = $this->input->post('line_cgst');
        $line_sgst = $this->input->post('line_sgst');
        $line_igst = $this->input->post('line_igst');
        $line_discount = $this->input->post('line_discount');
        for ($i=0;$i<count($item_description);$i++) {
            if (!empty($item_code[$i])) {
                //$description=$this->db->select('trv_product_master.*')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' => $item_code[$i]))->from('trv_fpo_product')->get()->result();
                //echo $item_code[$i];die;

                $purch_order_details = array(
                'fpo_id' 				=> $this->session->userdata('user_id'),
                'order_no'      		=> $orderno,
                'item_code'			   => $item_code[$i],//$description[0]->id,
                'description'   		=> 'Desc',//$description[0]->name,
                'delivery_date'      => $this->input->post('invoice_date') ,
                'qty_invoiced'       => $quantity_invoiced[$i],
                'unit_price	'        => $price[$i],
                'quantity_received'  => $qty[$i],
                'act_price'      		=> 0,
                'std_cost_unit'      => 0,
                'quantity_ordered'   => $qty[$i],
                'uom'					   => $uom[$i],
                'mrp'					   => $mrp[$i],
                'selling_price'		=> $mrp[$i],
                );
                $purchaseorder_details= $this->db->insert('fpo_purch_order_details', $purch_order_details);
                $po_id = $this->db->insert_id();
                $supp_invoice = array(
                'supp_trans_no'     => $trans_id,
                'supp_trans_type'   => 20,
                'gl_code'   		  => $gl_code,
                'grn_item_id'		  => $po_id,
                'po_detail_item_id' => $po_id,
                'stock_id'   	     => $item_code[$i],//$description[0]->id,
                'description'       => 'Desc',//$description[0]->name,
                'quantity'   		  => $qty[$i],
                'uom'   			     => $uom[$i],
                'unit_price'		  => $price[$i],
                'e_qty'   			  => $each_qty[$i],
                'e_uom'   			  => $each_uom[$i],
                'discount'   		  => $line_discount[$i],
                'memo_'             => $this->input->post('memo'),
                );

                if ($logined_fpo_gst >0) {
                    $supp_invoice['cgst_percent'] = $line_percent_cgst[$i];
                    $supp_invoice['sgst_percent'] = $line_percent_sgst[$i];
                    $supp_invoice['igst_percent'] = $line_percent_igst[$i];
                    $supp_invoice['cgst'] = $line_cgst[$i];
                    $supp_invoice['sgst'] = $line_sgst[$i];
                    $supp_invoice['igst'] = $line_igst[$i];
                }

                $supplier_invoice_detail= $this->db->insert('fpo_supp_invoice_items', $supp_invoice);

                $get_stock_master= $this->db->select('stock_id')->from('fpo_stock_master')->where('category_id', $item_code[$i])->get()->row();

                //$desc = $this->db->select('trv_product_master.name as product_name')->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id')->where(array('trv_fpo_product.id' => $item_code[$i]))->from('trv_fpo_product')->get()->row()->product_name;

                if (!empty($get_stock_master)) {
                    $stock_moves = array(
                    'trans_no'           => $orderno,
                    'stock_id'      		=> $item_code[$i],//$description[0]->id,
                    'uom'   			      => $uom[$i],
                    'loc_code'			   => $this->input->post('sub_delivery_to'),
                    'tran_date'       	=> $this->input->post('entry_date'),
                    'price'              => $price[$i],
                    'qty'                => $qty[$i],
                    'type'               => 1,
                    'person_id' 			=> $this->session->userdata('user_id'),
                    'visible'            => 1
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
                    'category_id'      	 => $item_code[$i],//$description[0]->id,
                    'description'      	 => 'Desc',//$description[0]->name,
                    'units'				 => $uom[$i],
                    'actual_cost'        => $this->input->post('sub_total'),
                    'fpo_id' 			 => $this->session->userdata('user_id'),
                    );
                    $stockmaster = $this->db->insert('fpo_stock_master', $stock_master);
                    $stockid     = $this->db->insert_id();
                    $stock_moves = array(
                    'trans_no'               => $orderno,
                    'stock_id'      		 => $item_code[$i],//$description[0]->id ,
                    'loc_code'				 => $this->input->post('sub_delivery_to'),
                    'tran_date'       	 	 => $this->input->post('entry_date'),
                    'price'                  => $price[$i],
                    'qty'                    => $qty[$i],
                    'type'                   => 1,
                    'uom'				      => $uom[$i],
                    'person_id' 			 => $this->session->userdata('user_id'),
                    'visible'                =>1
                    );
                    $stockmoves= $this->db->insert('fpo_stock_moves', $stock_moves);
                    $stocktoid = $this->db->insert_id();
                    $stockid = str_pad($stocktoid, 6, '0', STR_PAD_LEFT);
                }
                $supplier = null;
                if ($stockmoves) {
                    $refid= array(
                    'reference' => $stockid,
                    );
                    $stockreftodetail= $this->db->update('fpo_stock_moves', $refid, array('trans_id' => $stocktoid));
                    $supplierdetail = array(
                    'supplier_id'      		 => $this->input->post('sub_supplier'),
                    'stock_id'      		 => $item_code[$i],//$description[0]->id,
                    'price'				 	 => $price[$i],
                    'suppliers_uom'       	 => $uom[$i],
                    'conversion_factor	'    => 1,
                    'supplier_description'   =>$item_description[$i],
                    );
                    $supplier= $this->db->insert('fpo_purch_data', $supplierdetail);
                }
            }
        }

        return array($purchaseorder, $purchaseorder_details, $supplier);
    }

    public function get_godownlist()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('trv_godown_master.*');
        $this->db->where(array('trv_godown_master.user_id' => $fpoid,'trv_godown_master.status' => '1','trv_godown_master.owner_type' => '2'));
        $this->db->order_by("trv_godown_master.id", "desc");
        $this->db->from('trv_godown_master');
        return $this->db->get()->result();
    }

    public function add_location_adjustment()
    {
        $from_location=$this->input->post('from_loc');
        $item_code =$this->input->post('item_code');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');
        $price = $this->input->post('unit_cash');
        for ($i=0;$i<count($item_code);$i++) {
            if ($this->input->post('type')==1) {
                $qtytype= $qty[$i];
            } elseif ($this->input->post('type')==2) {
                $qtytype='-'.$qty[$i];
            } else {
                $qtytype='';
            }
            if ($item_code[$i] !== '') {
                $stock_moves = array(
/* 'trans_no'               => $orderno,
'stock_id'      		 => $stockid , */
'stock_id'      		 => $item_code[$i],
'loc_code'				 => $from_location,
'tran_date'       	 	 => $this->input->post('date_adjust'),
'type'       	 		 => $this->input->post('type'),
'qty'                    => $qtytype,
'price'                  => $price[$i],
'person_id' 			 => $this->session->userdata('user_id'),
'visible'                =>1
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
        }
        return $stockmoves;
    }

    public function add_location_transfer()
    {
        $from_location=$this->input->post('from_loc');
        $to_location=$this->input->post('to_loc');
        $item_code =$this->input->post('item_code');
        $item_description =$this->input->post('item_description');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('unit');

        for ($i=0;$i<count($item_description);$i++) {
            if ($item_code[$i] !== "") {
                if ($from_location) {
                    $stock_from_moves = array(
/* 'trans_no'               => $orderno,
'stock_id'      		 => $stockid , */
'stock_id'      		 => $item_code[$i],
'loc_code'				 => $from_location,
'tran_date'       	 	 => $this->input->post('date_adjust'),
'type'       	 		 => $this->input->post('type'),
'qty'                    => '-'.$qty[$i],
'person_id' 			 => $this->session->userdata('user_id'),
'visible'                =>1
);

                    $stockfrommoves= $this->db->insert('fpo_stock_moves', $stock_from_moves);
                    $stockfromid = $this->db->insert_id();
                    $stockid = str_pad($stockfromid, 6, '0', STR_PAD_LEFT);

                    if ($stockfrommoves) {
                        $refid= array(
'reference' => $stockid,
);
                        $stockrefdetail= $this->db->update('fpo_stock_moves', $refid, array('trans_id' => $stockfromid));
                    }
                }

                if ($to_location) {
                    $stock_to_moves = array(
/* 'trans_no'               => $orderno,
'stock_id'      		 => $stockid , */
'stock_id'      		 => $item_code[$i],
'loc_code'				 => $to_location,
'tran_date'       	 	 => $this->input->post('date_adjust'),
'type'       	 		 => $this->input->post('type'),
'qty'                    => $qty[$i],
'person_id' 			 => $this->session->userdata('user_id'),
'visible'                =>1
);

                    $stocktomoves= $this->db->insert('fpo_stock_moves', $stock_to_moves);
                    $stocktoid = $this->db->insert_id();
                    $stockid = str_pad($stocktoid, 6, '0', STR_PAD_LEFT);

                    if ($stocktomoves) {
                        $refid= array(
'reference' => $stockid,
);
                        $stockreftodetail= $this->db->update('fpo_stock_moves', $refid, array('trans_id' => $stocktoid));
                    }
                }
            }
        }
        return array($stockfrommoves,$stocktomoves);
    }
    public function get_uomlist()
    {
        $this->db->select('trv_uom_master.*');
        $this->db->where(array('trv_uom_master.status' => '1','trv_uom_master.uom_type' => '2'));
        $this->db->order_by("trv_uom_master.id", "desc");
        $this->db->from('trv_uom_master');
        return $this->db->get()->result();
    }


    public function checkavailableqty()
    {
        $from_loc = $this->input->post('from_loc');
        $item_code = $this->input->post('item_code');
        $this->db->select('SUM(fpo_stock_moves.qty) as total');
        $this->db->where(array('fpo_stock_moves.visible' => '1','fpo_stock_moves.loc_code' =>$from_loc,'fpo_stock_moves.stock_id' => $item_code));
        $this->db->group_by('fpo_stock_moves.qty');
        $this->db->from('fpo_stock_moves');
        return $this->db->get()->result();
    }

    public function priceBystockID($stock_id)
    {
        $this->db->select('fpo_prices.*');
        $this->db->join('fpo_stock_master', 'fpo_stock_master.stock_id = fpo_prices.stock_id');
        $this->db->where(array('fpo_prices.stock_id' => $stock_id));
        $this->db->from('fpo_prices');
        return $this->db->get()->row_array();
    }
    public function get_all_supplier_detail()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_suppliers.*');
        $this->db->where(array('fpo_suppliers.fpo_id' => $fpoid));
        $this->db->order_by("fpo_suppliers.supplier_id", "desc");
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }
    public function get_supplierDetail($supplier_id)
    {
        $this->db->select('fpo_suppliers.*');
        $this->db->where(array('fpo_suppliers.supplier_id' => $supplier_id));
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }

    public function state_list()
    {
        $this->db->select('trv_state_master.*');
        $this->db->where(array('trv_state_master.status' => '1'));
        $this->db->order_by("trv_state_master.id", "asc");
        $this->db->from('trv_state_master');
        return $this->db->get()->result();
    }
    public function fpoNameByID()
    {
        $this->db->select('trv_fpo.id,trv_fpo.producer_organisation_name');
        $this->db->order_by("trv_fpo.id", "desc");
        $this->db->from('trv_fpo');
        $this->db->where(array('trv_fpo.user_id' => $this->session->userdata('user_id'), 'trv_fpo.status' => '1'));
        return $this->db->get()->result();
    }
    public function supplier_last_id()
    {
        $query ="select supplier_id from  fpo_suppliers WHERE status='1' AND fpo_id = ".$this->session->userdata('user_id')."  order by supplier_id";
        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }
    public function checkHsncode()
    {
        $this->db->select('trv_fpo_product.*,trv_tax_master.id as tax_id,trv_tax_master.sgst_utgst as tax_sgst,trv_tax_master.cgst as tax_cgst,trv_tax_master.igst as tax_igst,trv_tax_master.cess_applicable as tax_cess_applicable,trv_tax_master.cess_percentage as tax_cess_percentage,trv_tax_master.cess_amount as tax_cess_amount');
        //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
        $this->db->join('trv_tax_master', 'trv_tax_master.hsn_code = trv_fpo_product.hsn_code');
        $this->db->where(array('trv_fpo_product.fpo_id' => $this->session->userdata('user_id'), 'trv_fpo_product.status' => '1','trv_fpo_product.id' => $this->input->post('item_id')));
        $this->db->from('trv_fpo_product');
        return $this->db->get()->result();
    }
    /*function get_purchaseentry_lastid($fpo_id) {
    $query = "select trans_no from fpo_supp_trans WHERE fpo_id = ".$fpo_id." order by trans_no DESC limit 1";
    $res = $this->db->query($query);

    if($res->num_rows() > 0) {
    return $res->result("array");
    }

    return array();
    }*/

    public function invoiceNumberExists($invoicenumber)
    {
        $invoice_count = $this->db->get_where('fpo_supp_trans', array('fpo_id' => $this->session->userdata('user_id'), 'supp_reference' => $invoicenumber))->num_rows();
        return $invoice_count;
    }

    public function supplierInvoiceNumberExists()
    {
        $supplierId = $this->input->post('supplierId');
        $invoiceNo = $this->input->post('invoiceNo');
        //$invoice_count = $this->db->get_where('fpo_supp_trans', array('fpo_id' => $this->session->userdata('user_id'), 'supp_reference' => $invoiceNo, 'supplier_id' => $supplierId))->num_rows();
        $invoice_count = $this->db->get_where('fpo_supp_trans', array('fpo_id' => $this->session->userdata('user_id'), 'supp_reference' => $invoiceNo))->num_rows();
        return $invoice_count;
    }

    public function get_transfertype()
    {
        $this->db->select('trv_transfer_type.*');
        $this->db->where(array('trv_transfer_type.status' => '1'));
        $this->db->order_by("trv_transfer_type.id", "ASC");
        $this->db->from('trv_transfer_type');
        return $this->db->get()->result();
    }

    public function getSuppliers($search)
    {
        $this->db->select('supplier_id, supp_name, mailing_pincode');
        $this->db->where(array('status' => '1'));
        $this->db->like('supp_name', $search);
        $this->db->order_by("supp_name");
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }
    //mobile number search//
    public function getMobileSuppliers($search)
    {
        $this->db->select('supplier_id, supp_name, mailing_pincode,mailing_mobile_no');
        $this->db->where(array('status' => '1'));
        $this->db->like('mailing_mobile_no', $search);
        $this->db->order_by("mailing_mobile_no");
        $this->db->from('fpo_suppliers');
        return $this->db->get()->result();
    }

    public function stockmovementBysearch()
    {
        if (!empty($this->input->post('stock_search')) && $this->input->post('stock_search')) {
            $supplier=$this->input->post('supplier');
            $from=$this->input->post('from');
            $to=$this->input->post('to');
            $location=$this->input->post('location');
        } else {
            $supplier='';
            $from=date('Y-m-01');
            $to=date('Y-m-t');
            $location='';
        }

        if ($supplier) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->join('fpo_purch_orders', 'fpo_purch_orders.order_no = fpo_stock_moves.trans_no');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_suppliers.supplier_id' =>$supplier));
            $this->db->group_by('fpo_stock_moves.tran_date, fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($from & $to) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.tran_date >=' =>$from,'fpo_stock_moves.tran_date <=' =>$to,'fpo_stock_moves.person_id' =>$this->session->userdata('user_id')));
            $this->db->group_by('fpo_stock_moves.tran_date, fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($from) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_stock_moves.tran_date' =>$from));
            $this->db->group_by('fpo_stock_moves.tran_date, fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($to) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_stock_moves.tran_date' =>$to));
            $this->db->group_by('fpo_stock_moves.tran_date, fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($location) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_stock_moves.loc_code' =>$location));
            $this->db->group_by('fpo_stock_moves.tran_date, fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        }
        return $result;
    }

    public function stockreportBysearch()
    {
        if (!empty($this->input->post('stock_search')) && $this->input->post('stock_search')) {
            $supplier=$this->input->post('supplier');
            $from=$this->input->post('from');
            $to=$this->input->post('to');
            $location=$this->input->post('location');
        } else {
            $supplier='';
            $from=date('Y-m-01');
            $to=date('Y-m-t');
            $location='';
        }

        if ($supplier) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->join('fpo_purch_orders', 'fpo_purch_orders.order_no = fpo_stock_moves.trans_no');
            $this->db->join('fpo_suppliers', 'fpo_suppliers.supplier_id = fpo_purch_orders.supplier_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_suppliers.supplier_id' =>$supplier));
            $this->db->group_by('fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($from & $to) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.tran_date >=' =>$from,'fpo_stock_moves.tran_date <=' =>$to,'fpo_stock_moves.person_id'  =>$this->session->userdata('user_id')));
            $this->db->group_by('fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($from) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_stock_moves.tran_date' =>$from));
            $this->db->group_by('fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($to) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_stock_moves.tran_date' =>$to));
            $this->db->group_by('fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        } elseif ($location) {
            $this->db->select('fpo_stock_moves.*,trv_fpo_product.*,Sum(Case When fpo_stock_moves.qty > 0 then fpo_stock_moves.qty else 0 end) purchase,Sum(Case When fpo_stock_moves.qty < 0 then fpo_stock_moves.qty else 0 end) sales');
            $this->db->join('trv_fpo_product', 'trv_fpo_product.id = fpo_stock_moves.stock_id');
            //$this->db->join('trv_product_master', 'trv_product_master.id = trv_fpo_product.product_id');
            $this->db->where(array('fpo_stock_moves.person_id' =>$this->session->userdata('user_id'),'fpo_stock_moves.loc_code' =>$location));
            $this->db->group_by('fpo_stock_moves.stock_id');
            $this->db->from('fpo_stock_moves');
            $result = $this->db->get()->result();
        }
        return $result;
    }

    public function getSupplierGL()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_suppliers.supplier_id, fpo_suppliers.supp_name, fpo_suppliers.transaction_type,fpo_suppliers.opening_balance, trv_chart_master.account_name');
        $this->db->from('fpo_suppliers');
        $this->db->join('trv_chart_master', 'fpo_suppliers.gl_group_id = trv_chart_master.account_code');
        $this->db->where(array('fpo_suppliers.fpo_id' => $fpoid));
        $this->db->order_by("fpo_suppliers.opening_balance ASC, fpo_suppliers.supp_name ASC");
        return $this->db->get()->result();
    }

    public function getSupplierGLAll()
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_suppliers.supplier_id, fpo_suppliers.supp_name, fpo_suppliers.transaction_type,fpo_suppliers.opening_balance, trv_chart_master.account_name');
        $this->db->from('fpo_suppliers');
        $this->db->join('trv_chart_master', 'fpo_suppliers.gl_group_id = trv_chart_master.account_code');
        $this->db->where(array('fpo_suppliers.fpo_id' => $fpoid, 'fpo_suppliers.opening_balance !=' => 0));
        $this->db->order_by("fpo_suppliers.opening_balance ASC, fpo_suppliers.supp_name ASC");
        return $this->db->get()->result();
    }
    public function get_mrplist($product_id)
    {
        $fpoid=$this->session->userdata('user_id');
        $this->db->select('fpo_purch_order_details.po_detail_item,fpo_purch_order_details.selling_price,fpo_purch_order_details.mrp, fpo_purch_order_details.item_code');
        $this->db->group_by('fpo_purch_order_details.mrp');
        $this->db->where(array('fpo_purch_order_details.item_code' => $product_id, 'fpo_purch_order_details.fpo_id' => $fpoid));
        $this->db->from('fpo_purch_order_details');
        return $this->db->get()->result();
    }
    public function get_SellingPricelist($price_id)
    {
        $this->db->select('fpo_purch_order_details.po_detail_item,fpo_purch_order_details.selling_price,fpo_purch_order_details.mrp');
        //$this->db->group_by('fpo_purch_order_details.mrp');
        $this->db->where(array('fpo_purch_order_details.po_detail_item' => $price_id));
        $this->db->from('fpo_purch_order_details');
        return $this->db->get()->row();
    }
}
