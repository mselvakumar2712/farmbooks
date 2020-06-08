<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/administrator/
     *	- or -
     * 		http://example.com/index.php/administrator/
     *	- or -
     * http://example.com/index.php/administrator/index
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        if (!$this->session->userdata('name')  || $this->session->userdata('user_type') != 3  || $this->session->userdata('is_active') == 0) {
            redirect('administrator/login/signout');
        }
        $this->load->model("Login_Model");
        // $this->load->model("Administrator_Model");
    }

    //dashboard functionality
    public function index()
    {
        $data['page'] = 'dashboard';
        $data['page_title'] = 'dashboard';
        $data['page_module'] = 'dashboard';
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $fpo_id = $this->session->userdata('user_id');
        $data['fig_count']=$this->Login_Model->figCount($fpo_id);
        $data['fpg_count']=$this->Login_Model->fpgCount($fpo_id);
        $data['farmer_count']=$this->Login_Model->farmerCount($fpo_id);
        $data['farming_area']=$this->Login_Model->salespurchase($fpo_id);
        $data['sales_Monthwise']=$this->Login_Model->salespurchasemonth($fpo_id);
        $data['total_sales']=$this->Login_Model->totalsalespurchase($fpo_id);
        $data['purchase_count'] = $this->Login_Model->count_purchase($fpo_id);
        $data['sales_count'] = $this->Login_Model->count_sales($fpo_id);
        $data['yearly_sales']=$this->Login_Model->yearlySalesPurchase($fpo_id);
        $data['previous_yearly_sales']=$this->Login_Model->previousyearlySalesPurchase($fpo_id);

        //echo "<pre>";print_r($data);die;
        $this->load->view('dashboard', $data);
    }
    //dashboard ends//

    public function active_module($module)
    {
        if ($module=='profile') {
            if ($this->session->userdata('user_type')=='0') {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/popi', $data);
            } elseif ($this->session->userdata('user_type')=='1') {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/fpo', $data);
            } elseif ($this->session->userdata('user_type')=='2') {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/fpo', $data);
            } elseif ($this->session->userdata('user_type')=='3') {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/fpg', $data);
            } elseif ($this->session->userdata('user_type')=='4') {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/fpg', $data);
            } elseif ($this->session->userdata('user_type')=='5') {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/fig', $data);
            } elseif ($this->session->userdata('user_type')=='6') {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/farmer/profilelist', $data);
            } else {
                $this->session->unset_userdata('active_module');
                $data['active_module']=$this->session->set_userdata('active_module', $module);
                redirect('fpo/farmer/profilelist', $data);
            }
        } elseif ($module=='master_data') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/masterdata/productfpolist', $data);
        } elseif ($module=='user') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/user', $data);
        } elseif ($module=='role') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/role', $data);
        } elseif ($module =='finance') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/finance/salesentry', $data);
        } elseif ($module=='inventory') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/inventory/purchaseentry', $data);
        } elseif ($module=='share') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/share', $data);
        } elseif ($module=='operation') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/operation', $data);
        } elseif ($module=='crop') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/crop', $data);
        } elseif ($module=='soil') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/soil', $data);
        } elseif ($module=='production') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/production', $data);
        } elseif ($module=='market') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/market/salesentry', $data);
        } elseif ($module=='supply_chain') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/supplychain', $data);
        } elseif ($module=='ecommerce') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/ecommerce', $data);
        } elseif ($module=='loan') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/loan', $data);
        } elseif ($module=='hr') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/hr', $data);
        } elseif ($module=='hiring') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/hiring', $data);
        } elseif ($module=='setting') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/setting', $data);
        } elseif ($module=='operation') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/operation', $data);
        } elseif ($module=='search') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/dashboard/search', $data);
        }elseif ($module=='farmer') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/farmer/profilelist', $data);
        } elseif ($module=='approver') {
            $this->session->unset_userdata('active_module');
            $data['active_module']=$this->session->set_userdata('active_module', $module);
            redirect('fpo/approver', $data);
        }
    }
    public function searchByModule()
    {
        $search_list = $this->Login_Model->searchByModule();
        $response = array("status" => 1, "search_list" => $search_list);
        echo json_encode($response);
    }

    public function search()
    {
        $data['page'] = 'search';
        $data['page_module'] = 'searchmodule';
        $data['page_title'] = 'Search Module';
        $data['search_module'] = $this->Login_Model->searchByModule();
        $this->load->view('search/searchmodule_list', $data);
    }

    public function enquiry_information()
    {
        if ($this->Login_Model->enquiry_information()) {
            $response = array("status" => 1, "message" => "Your request has been submitted with Us. Our representative will get back to you shortly.");
        } else {
            $response = array("status" => 0, "message" => "Message not sent");
        }
        echo json_encode($response);
    }


    public function supportEnquiry()
    {
        $fpo_id = $this->session->userdata('user_id');
        $supportEnquiry = $this->Login_Model->supportEnquiry($fpo_id);
        $response = array("status" => 1, "supportEnquiry" => $supportEnquiry);
        echo json_encode($response);
    }
}
