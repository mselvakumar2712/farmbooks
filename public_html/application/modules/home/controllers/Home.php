<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/home/
	 *	- or -
	 * 		http://example.com/index.php/home/
	 *	- or -
	 * http://example.com/index.php/home/index
	 *
	 */
	function __construct() {
      parent::__construct();
      $this->load->model("Location_Model");
      $this->load->library("session");
   }
	public function landing()
	{
      $data['page'] = 'home';
      $visit = $this->count_visits();
      $data['page_title'] = 'Farmer Producer Organization';
		$this->load->view('index', $data);
	}
  
  //landing page starts Mar 03//
   public function index()
	{
      $data['page'] = 'home';
      $visit = $this->count_visits();
      $data['page_title'] = 'Farmer Producer Organization';
		$this->load->view('index', $data);
	}
   //landing page 1//
    public function launch()
	{
      $data['page'] = 'home';
      $visit = $this->count_visits();
      $data['page_title'] = 'Farm Books - Farmer Producer Organization';
		$this->load->view('landing_2', $data);
	}
    //landing page 2//
    public function landing_1()
	{
      
      echo phpinfo();
      $info = ob_end_clean();
	}
    //landing page 3//
    public function landing_3()
	{
      $data['page'] = 'home';
      $visit = $this->count_visits();
      $data['page_title'] = 'Farmer Producer Organization';
		$this->load->view('landing_3', $data);
	}
    //landing page 4//
    public function landing_4()
	{
      $data['page'] = 'home';
      $visit = $this->count_visits();
      $data['page_title'] = 'Farmer Producer Organization';
		$this->load->view('landing_4', $data);
	}
   
   //landing page ends Mar 03//
   
   public function count_visits(){
      $this->load->library('user_agent');
      $this_IP =  $this->input->ip_address();
      $this_refer =  null;
      if ($this->agent->is_referral())
      {
         $this_refer = $this->agent->referrer();
      }
      $this_url =   current_url();
      if ($this->agent->is_browser())
      {
         $agent = $this->agent->browser().' '.$this->agent->version();
      }
      elseif ($this->agent->is_robot())
      {
         $agent = $this->agent->robot();
      }
      elseif ($this->agent->is_mobile())
      {
         $agent = $this->agent->mobile();
      }
      else
      {
         $agent = 'Unidentified User Agent';
      }
      $this_platform = $this->agent->platform();      
      $this_agent = $agent;
      
      $this->load->database();
      $data = array(
        'visitor_ip'=>$this_IP,
        'browser_type'=>$this_agent,
        'refernce_page'=>$this_refer,
        'page_visited'=>$this_url,
        'platform'=>$this_platform
      );

	  $query =  $this->db->insert('trv_site_visitor',$data);
	  return 1;      
   }
   
   public function contactus()
	{
      $data['page'] = 'home';
      $data['page_title'] = 'Contact us';
      $data['statelist'] =$this->Location_Model->state_list();
		$this->load->view('contact_us', $data);
	}
   public function postcontact()
	{
      $data['page'] = 'home';
      $data['page_title'] = 'Contact us';
      $data['statelist'] =$this->Location_Model->state_list();
		$this->load->view('home/contact_success', $data);
	}
}
