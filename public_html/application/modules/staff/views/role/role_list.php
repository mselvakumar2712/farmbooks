<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<body>
     <div class="container-fluid pl-0 pr-0">
        <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
        <?php $this->load->view('templates/menu-inner.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>List Roles</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Role Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/role');?>">Roles List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">			   			
                <div class="row">				
                <div class="col-md-12">
                    <div class="card">					
                        <div class="card-body">	
                           <div class="container">
										<div class="" style="text-align:right;margin-bottom:20px;" >
											<a href="<?php echo base_url('staff/role/addrole');?>">
												<button type="button" class="btn btn-success btn-labeled">
												    <i class="fa fa-plus-square"></i><span class="ml-2">  Add Role</span>
												</button>
											</a>
										</div>
									</div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Role Name</th>
								<th>Application Type</th>
								<th>Created by</th>
								<th>Created Date</th>
                                <th>Actions</th>
							  </tr>
							</thead>
							<tbody id="rolelist">
                            <?php for($i=0;$i<count($role_list);$i++){ ?>
                                <tr>
                                <td><?php echo $role_list[$i]->profile_name; ?></td>
                                <td><?php echo $role_list[$i]->application_type; ?></td>
                                <td><?php echo "Super Admin"; ?></td>
                                <td><?php echo date("d-M-Y", strtotime($role_list[$i]->created_on)); ?></td>
                                <td class="text-center">    
                                    <a href="<?php echo base_url('staff/role/editrole/'.$role_list[$i]->id);?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                                    <a href="<?php echo base_url('staff/role/viewrole/'.$role_list[$i]->id);?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td>
                                </tr>
                                <?php } ?> 
                            </tbody>
						  </table>
                    </div>
                  </div>
                </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
</div>
    
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>	   
</body>
</html>
<script type="text/javascript">
</script>