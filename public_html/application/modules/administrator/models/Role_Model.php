<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Role_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function rolesList() {
        $this->db->select('trv_access_profile.*');
        $this->db->where(array('status' => 1));
        $this->db->order_by("id", "ASC");
        $this->db->from('trv_access_profile');
        return $this->db->get()->result();	
    }
    
    
    function addRole() {
        $role_profile = array(
            'profile_name'              => $this->input->post('role_name'),
            'application_type'          => $this->input->post('application_type'),
            'status'                    => $this->input->post('status'),
            
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => $this->session->userdata('user_id'),
            'created_on'                => date('Y-m-d H:i:s'),
            'created_by'                => $this->session->userdata('user_id')
        );
        $this->db->insert('trv_access_profile', $role_profile);
        $profile_last_inserted_ID = $this->db->insert_id();
        
		$modules = $this->input->post('modules');
		//echo json_encode($modules);die;
		for($i=0;$i<count($modules);$i++){													
			$subModule = $modules[$i]['submodule'];
			$moduleValue = 0;
			for($j=0;$j<count($subModule);$j++){
				if(isset($subModule[$j]['module_value'])){
					$moduleValue = 1;
				}
			}
			if($moduleValue == 1){
				$roleMainModule = array(
					'profile_id'                => $profile_last_inserted_ID,
					'module_id'                 => $modules[$i]['module_value'],
						
					'add_right'                 => 1,
					'view_right'                => 1,               
					'edit_right'                => 1,   
					'delete_right'              => 1,

					'updated_on'                => date('Y-m-d H:i:s'),
					'updated_by'                => $this->session->userdata('user_id')
				);
				$this->db->insert('trv_access_right', $roleMainModule);
			}
			
				for($j=0;$j<count($subModule);$j++){
					if(isset($subModule[$j]['module_value'])){
					$roleSubmodule = array(
						'profile_id'                => $profile_last_inserted_ID,
						'module_id'                 => $subModule[$j]['module_value'],
							
						'add_right'                 => 1,
						'view_right'                => 1,               
						'edit_right'                => 1,   
						'delete_right'              => 1,

						'updated_on'                => date('Y-m-d H:i:s'),
						'updated_by'                => $this->session->userdata('user_id')
					);
					$this->db->insert('trv_access_right', $roleSubmodule);
					
						if(!empty($subModule[$j]['menus'])){										
							$menus = $subModule[$j]['menus'];
							for($k=0;$k<count($menus);$k++){
								if(isset($menus[$k]['module_value'])){
									$roleMenu = array(
										'profile_id'                => $profile_last_inserted_ID,
										'module_id'                 => $menus[$k]['module_value'],
										
										'add_right'                 => 1,
										'view_right'                => 1,               
										'edit_right'                => 1,   
										'delete_right'              => 1,

										'updated_on'                => date('Y-m-d H:i:s'),
										'updated_by'                => $this->session->userdata('user_id')
									);
									$this->db->insert('trv_access_right', $roleMenu);
								}
							}
						}	
					}					
				}
			}
		
		return $profile_last_inserted_ID;        
    }
    
    
    function roleByID($role_id) {
        $this->db->where(array('id' => $role_id, 'status' => 1));
        $this->db->from('trv_access_profile');
        return $this->db->get()->result();	
    }
    
    
    function roleAccessRightsByID($role_id) {
        $this->db->select('trv_access_right.id, trv_access_right.module_id');
        $this->db->where(array('trv_access_right.profile_id' => $role_id, 'trv_access_right.status' => 1));
        $this->db->from('trv_access_right');
        return $this->db->get()->result_array();	
    }
    
    
    function getAccessRightId($role_id, $module_id) {
        $this->db->select('trv_access_right.id');
        $this->db->where(array('profile_id' => $role_id, 'module_id' => $module_id));
        $this->db->from('trv_access_right');
        return $this->db->get()->row_array();	
    }
    
    
    function updateRole($role_id){
        $role_profile = array(			
            'profile_name'              => $this->input->post('role_name'),
            'application_type'          => $this->input->post('application_type'),
            'status'                    => $this->input->post('status'),
            
            'updated_on'                => date('Y-m-d H:i:s'),
            'updated_by'                => $this->session->userdata('user_id')
        );
        $this->db->update('trv_access_profile', $role_profile, array('id' => $role_id));
                 
        $modules = $this->input->post('modules');
		//echo json_encode($modules);die;
		for($i=0;$i<count($modules);$i++){	
			if(!empty($modules[$i]['submodule'])){
				$subModule = $modules[$i]['submodule'];
				$moduleValue = 0;
				for($j=0;$j<count($subModule);$j++){
					if(isset($subModule[$j]['module_value'])){
						$moduleValue = 1;
					}
				}
				
				if($moduleValue == 1){
					/* $roleMainModule = array(
						'fpo_id'                	=> (!isset($modules[$i]['module_id']))?$this->session->userdata('user_id'):'',
						'profile_id'                => $role_id,
						'module_id'                 => $modules[$i]['module_value'],
						
						'add_right'                 => 1,
						'view_right'                => 1,               
						'edit_right'                => 1,   
						'delete_right'              => 1,

						'updated_on'                => date('Y-m-d H:i:s'),
						'updated_by'                => $this->session->userdata('user_id')
					); */
				/* } else if($moduleValue == 1 && !isset($modules[$i]['module_value'])){
					$roleMainModule = array(
						'profile_id'                => $role_id,
									
						'add_right'                 => 0,
						'view_right'                => 0,
						'edit_right'                => 0,
						'delete_right'              => 0,

						'status'              		=> 0,
						'updated_on'                => date('Y-m-d H:i:s'),
						'updated_by'                => $this->session->userdata('user_id')
					);*/
				//} 
				
				//echo $modules[$i]['module_value'];
				if(isset($modules[$i]['module_id']) && isset($modules[$i]['module_value'])){
					$roleMainModule = array(
						'profile_id'                => $role_id,
						'module_id'                 => $modules[$i]['module_value'],
						
						'add_right'                 => 1,
						'view_right'                => 1,               
						'edit_right'                => 1,   
						'delete_right'              => 1,

						'updated_on'                => date('Y-m-d H:i:s'),
						'updated_by'                => $this->session->userdata('user_id')
					);
					$this->db->update('trv_access_right', $roleMainModule, array('profile_id' => $role_id, 'id' => $modules[$i]['module_id']));
				} else if(!isset($modules[$i]['module_id']) && isset($modules[$i]['module_value'])){
					$roleMainModule = array(
						'profile_id'                => $role_id,
						'module_id'                 => $modules[$i]['module_value'],
						
						'add_right'                 => 1,
						'view_right'                => 1,               
						'edit_right'                => 1,   
						'delete_right'              => 1,

						'updated_on'                => date('Y-m-d H:i:s'),
						'updated_by'                => $this->session->userdata('user_id')
					);
					$this->db->insert('trv_access_right', $roleMainModule);
				} else if(isset($modules[$i]['module_id']) && !isset($modules[$i]['module_value'])){
					$roleMainModule = array(
						'profile_id'                => $role_id,
									
						'add_right'                 => 0,
						'view_right'                => 0,
						'edit_right'                => 0,
						'delete_right'              => 0,

						'status'              		=> 0,
						'updated_on'                => date('Y-m-d H:i:s'),
						'updated_by'                => $this->session->userdata('user_id')
					);
					//$this->db->update('trv_access_right', $roleMainModule, array('profile_id' => $role_id, 'id' => $modules[$i]['module_id']));
				}
			}
			
				$subModule = $modules[$i]['submodule'];
				for($j=0;$j<count($subModule);$j++){	
					/*if(isset($subModule[$j]['module_value'])){
						$roleSubmodule = array(
							'fpo_id'                	=> (!isset($subModule[$j]['module_id']))?$this->session->userdata('user_id'):'',
							'profile_id'                => $role_id,
							'module_id'                 => $subModule[$j]['module_value'],
								
							'add_right'                 => 1,
							'view_right'                => 1,               
							'edit_right'                => 1,   
							'delete_right'              => 1,

							'updated_on'                => date('Y-m-d H:i:s'),
							'updated_by'                => $this->session->userdata('user_id')
						);
					} else if(isset($subModule[$j]['module_id']) && !isset($subModule[$j]['module_value'])){
						$roleSubmodule = array(
							'profile_id'                => $role_id,
								
							'add_right'                 => 0,
							'view_right'                => 0,               
							'edit_right'                => 0,   
							'delete_right'              => 0,

							'status'              		=> 0,
							'updated_on'                => date('Y-m-d H:i:s'),
							'updated_by'                => $this->session->userdata('user_id')
						);
					}	*/				
					
					if(isset($subModule[$j]['module_id']) && isset($subModule[$j]['module_value'])){
						$roleSubmodule = array(
							'profile_id'                => $role_id,
							'module_id'                 => $subModule[$j]['module_value'],
								
							'add_right'                 => 1,
							'view_right'                => 1,               
							'edit_right'                => 1,   
							'delete_right'              => 1,

							'updated_on'                => date('Y-m-d H:i:s'),
							'updated_by'                => $this->session->userdata('user_id')
						);
						$this->db->update('trv_access_right', $roleSubmodule, array('profile_id' => $role_id, 'id' => $subModule[$j]['module_id']));
					} else if(!isset($subModule[$j]['module_id']) && isset($subModule[$j]['module_value'])){
						$roleSubmodule = array(
							'profile_id'                => $role_id,
							'module_id'                 => $subModule[$j]['module_value'],
								
							'add_right'                 => 1,
							'view_right'                => 1,               
							'edit_right'                => 1,   
							'delete_right'              => 1,

							'updated_on'                => date('Y-m-d H:i:s'),
							'updated_by'                => $this->session->userdata('user_id')
						);
						$this->db->insert('trv_access_right', $roleSubmodule);
					} else if(isset($subModule[$j]['module_id']) && !isset($subModule[$j]['module_value'])){
						$roleSubmodule = array(
							'profile_id'                => $role_id,
								
							'add_right'                 => 0,
							'view_right'                => 0,               
							'edit_right'                => 0,   
							'delete_right'              => 0,

							'status'              		=> 0,
							'updated_on'                => date('Y-m-d H:i:s'),
							'updated_by'                => $this->session->userdata('user_id')
						);
						//$this->db->update('trv_access_right', $roleSubmodule, array('profile_id' => $role_id, 'id' => $subModule[$j]['module_id']));
					}
					
					if(!empty($subModule[$j]['menus'])){																
						$menus = $subModule[$j]['menus'];
						for($k=0;$k<count($menus);$k++){
							/*if(isset($menus[$k]['module_value'])){
								$roleMenu = array(
									'fpo_id'                	=> (!isset($menus[$k]['module_id']))?$this->session->userdata('user_id'):'',
									'profile_id'                => $role_id,
									'module_id'                 => $menus[$k]['module_value'],
									
									'add_right'                 => 1,
									'view_right'                => 1,               
									'edit_right'                => 1,   
									'delete_right'              => 1,

									'updated_on'                => date('Y-m-d H:i:s'),
									'updated_by'                => $this->session->userdata('user_id')
								);
							} else if(isset($menus[$k]['module_id']) && !isset($menus[$k]['module_value'])){
								$roleMenu = array(
									'profile_id'                => $role_id,
									
									'add_right'                 => 0,
									'view_right'                => 0,               
									'edit_right'                => 0,   
									'delete_right'              => 0,

									'status'              		=> 0,
									'updated_on'                => date('Y-m-d H:i:s'),
									'updated_by'                => $this->session->userdata('user_id')
								);
							}*/
							if(isset($menus[$k]['module_id']) && isset($menus[$k]['module_value'])){
								$roleMenu = array(
									'profile_id'                => $role_id,
									'module_id'                 => $menus[$k]['module_value'],
									
									'add_right'                 => 1,
									'view_right'                => 1,               
									'edit_right'                => 1,   
									'delete_right'              => 1,

									'updated_on'                => date('Y-m-d H:i:s'),
									'updated_by'                => $this->session->userdata('user_id')
								);
								$this->db->update('trv_access_right', $roleMenu, array('profile_id' => $role_id, 'id' => $menus[$k]['module_id']));
							} else if(!isset($menus[$k]['module_id']) && isset($menus[$k]['module_value'])){
								$roleMenu = array(
									'profile_id'                => $role_id,
									'module_id'                 => $menus[$k]['module_value'],
									
									'add_right'                 => 1,
									'view_right'                => 1,               
									'edit_right'                => 1,   
									'delete_right'              => 1,

									'updated_on'                => date('Y-m-d H:i:s'),
									'updated_by'                => $this->session->userdata('user_id')
								);
								$this->db->insert('trv_access_right', $roleMenu);
							} else if(isset($menus[$k]['module_id']) && !isset($menus[$k]['module_value'])){
								$roleMenu = array(
									'profile_id'                => $role_id,
									
									'add_right'                 => 0,
									'view_right'                => 0,               
									'edit_right'                => 0,   
									'delete_right'              => 0,

									'status'              		=> 0,
									'updated_on'                => date('Y-m-d H:i:s'),
									'updated_by'                => $this->session->userdata('user_id')
								);
								//$this->db->update('trv_access_right', $roleMenu, array('profile_id' => $role_id, 'id' => $menus[$k]['module_id']));
							}							
						}
					}						
				}
			} 
		}		
		return $role_id;
    }
    
    
    function deleteRole( $role_id ) {
        $role_details = array(               
	       'status' => 0
        );	            	
        return $this->db->update('trv_access_level', $role_details, array('id' => $role_id));
	}
        
    
    function getModuleList($parentModule, $moduleCode, $type) {
        $this->db->select('trv_module_code.*');
        $this->db->where(array('trv_module_code.status' => 1, 'trv_module_code.type' => $type));
		if($parentModule != ''){
			$this->db->where('trv_module_code.module_code', $parentModule);
		}
		if($moduleCode != ''){
			$this->db->where('trv_module_code.sub_module_code', $moduleCode);
		}
        $this->db->order_by("trv_module_code.id", "ASC");
        $this->db->from('trv_module_code');
        return $this->db->get()->result();	
    }
	
	
	function getModuleByRights($type, $staff_id) {
        $this->db->select('trv_access_right.profile_id, trv_module_code.module_name');
        $this->db->where(array('trv_access_right.status' => 1, 'trv_access_right.profile_id' => $staff_id));		
        $this->db->order_by("trv_access_right.id", "ASC");
        $this->db->from('trv_access_right');
		$this->db->where(array('trv_module_code.status' => 1, 'trv_module_code.type' => $type));	
		$this->db->join('trv_module_code', 'trv_module_code.code = trv_access_right.module_id', 'inner');		
        return $this->db->get()->result();	
    }
    
	
}

?>