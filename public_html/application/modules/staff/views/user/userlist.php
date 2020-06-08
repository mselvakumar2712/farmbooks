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
                        <h1>List Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">User Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/user');?>">List Users</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
			 <div class="container">
				<div class="" style="text-align:right;margin-bottom:20px;" >
				<a href="<?php echo base_url('staff/user/adduser');?>">
					<button type="button" class="btn btn-success btn-labeled">
						  <i class="fa fa-plus-square"></i><span class="ml-2"> Add User</span>
					</button>
				</a>
			 </div>
			 </div>
			 <div class="row">
                <div class="col-md-12">
                    <div class="card">
						<div class="card-body">
							  <table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Name</th>
									<th>User Type</th>
									<th>Mobile Number</th>
									<th>Status</th>
									<th>Action</th>
								  </tr>
								</thead>
								<tbody id="userlist">
								<?php 
                        //echo "<pre>";print_r($user_list);die;
                        foreach($user_list as $user){?>
								<tr>
									<td><?php echo $user->staff_name;?></td>
									<td><?php echo $user->profile_name;?></td>
									<td><?php echo $user->username;?></td>
									<td><?php echo $user->status==1 ? 'Active' :'Inactive';?></td>
									<td class="text-center">
										<a href="<?php echo base_url('staff/user/edituser/' . $user->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
										<a href="<?php echo base_url('staff/user/viewuser/' . $user->id); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									</td>							
								</tr>
							   <?php }?>
							
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