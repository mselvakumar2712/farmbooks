<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/staff/
	 *	- or -
	 * 		http://example.com/index.php/staff/
	 *	- or -
	 * http://example.com/index.php/staff/index
	 *
	 */
    public function __construct() {
        parent::__construct();
		$this->load->library("session");
		if (!$this->session->userdata('name') || $this->session->userdata('is_active') == 0 /*|| $this->session->userdata('user_type') != 3*/){
			redirect('staff/signout');
		}
        $this->load->model("Role_Model");
        header('Access-Control-Allow-Origin: *');
        if(!check_staff_permission($_SESSION['profile_type'], 401)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
	}

    
    public function index(){
		if(!check_staff_permission($_SESSION['profile_type'], 40101)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Role List';
		$data['page_title'] = 'Role List';
        $data['page_module'] = 'role';	
        
        $data['role_list'] = $this->Role_Model->rolesList();
        $this->load->view('role/role_list', $data); 
	}    
    
	
    public function addrole(){
		if(!check_staff_permission($_SESSION['profile_type'], 40102)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Role List';
		$data['page_title'] = 'Role List';
        $data['page_module'] = 'role';	
        
        $mainmodule = $this->Role_Model->getModuleList('', '', 1);
		for($i=0;$i<count($mainmodule);$i++){
			$submodule = $this->Role_Model->getModuleList($mainmodule[$i]->code, '', 2);			
			for($j=0;$j<count($submodule);$j++){
				$menus = $this->Role_Model->getModuleList($submodule[$j]->module_code, $submodule[$j]->code, 3);
				$submodule[$j]->menus = $menus;
			}
			$mainmodule[$i]->submodule = $submodule;  	
		}
		$data['module_list'] = $mainmodule;
		//echo json_encode($data['module_list']);
        $this->load->view('role/addrole', $data); 
	}  
    
    
    public function postAddRole() {        
        //echo json_encode($this->input->post());    
        //die;
        if($this->Role_Model->addRole()) {  
            redirect('staff/role');
        } else {
            redirect('staff/role/addrole');
        }   
	}    
    
    
    public function viewrole($role_id){
		if(!check_staff_permission($_SESSION['profile_type'], 40101)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Role List';
		$data['page_title'] = 'Role List';
        $data['page_module'] = 'role';

		$mainmodule = $this->Role_Model->getModuleList('', '', 1);
		for($i=0;$i<count($mainmodule);$i++){
			$submodule = $this->Role_Model->getModuleList($mainmodule[$i]->code, '', 2);			
			for($j=0;$j<count($submodule);$j++){
				$menus = $this->Role_Model->getModuleList($submodule[$j]->module_code, $submodule[$j]->code, 3);
				$submodule[$j]->menus = $menus;
			}
			$mainmodule[$i]->submodule = $submodule;  	
		}
		$data['module_list'] = $mainmodule;
		
        $data['access_profile'] = $this->Role_Model->roleByID($role_id);
        $data['access_rights'] = $this->Role_Model->roleAccessRightsByID($role_id);
        $this->load->view('role/viewrole', $data); 
	}
    
    
    public function editrole($role_id){
		if(!check_staff_permission($_SESSION['profile_type'], 40103)){
            redirect(base_url('staff/access_denied'), 'refresh');  
        }
        $data['page'] = 'Role List';
		$data['page_title'] = 'Role List';
        $data['page_module'] = 'role';	

		$mainmodule = $this->Role_Model->getModuleList('', '', 1);
		for($i=0;$i<count($mainmodule);$i++){
			$submodule = $this->Role_Model->getModuleList($mainmodule[$i]->code, '', 2);			
			for($j=0;$j<count($submodule);$j++){
				$menus = $this->Role_Model->getModuleList($submodule[$j]->module_code, $submodule[$j]->code, 3);
				$submodule[$j]->menus = $menus;
			}
			$mainmodule[$i]->submodule = $submodule;  	
		}
		$data['module_list'] = $mainmodule;
		
        $data['access_profile'] = $this->Role_Model->roleByID($role_id);		
        $data['access_rights'] = $this->Role_Model->roleAccessRightsByID($role_id);
        $this->load->view('role/editrole', $data); 
	}
    
    
    public function postUpdateRole($role_id) {        
        //echo json_encode($this->input->post());
        //die;
        if($this->Role_Model->updateRole($role_id)) {  
            redirect('staff/role');
        } else {
            redirect('staff/role/addrole');
        }   
	}  
        
}
