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
                        <h1>List Chief Executive Officer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/ceolist');?>">List Chief Executive Officer</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
			<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('success');?></strong> 
					</div>
				<?php }elseif($this->session->flashdata('danger')){?>
					<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('danger');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('info')){?>
					<div class="alert alert-info alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('info');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('warning')){?>
					<div class="alert alert-warning alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('warning');?></strong> 
					</div>
            <?php }?>
            <div class="animated fadeIn">			   			
                <div class="row">				
                <div class="col-md-12">
                    <div class="card">					
                        <div class="card-body">	
                           <div class="container">
								<div class="" style="text-align:right;margin-bottom:20px;" >
								<?php 
									if($active_ceo >0) {
										?>
											<button type="button" class="btn btn-success btn-labeled" disabled><i class="fa fa-plus-square"></i> <span class="ml-2"> Add Chief Executive Officer</span></button>
										<?php
									}
									else {
										?>
										<a href="<?php echo base_url('staff/operation/addceo');?>">
											<button type="button" class="btn btn-success btn-labeled"><i class="fa fa-plus-square"></i> <span class="ml-2"> Add Chief Executive Officer</span></button>
										</a>
										<?php
									}
								?>	
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Name </th>
								<th>Father Name / Spouse Name</th>
								<th>Date of Birth</th>
								<th>Qualification</th>
								<th>Date of Appointment </th>
								<th>Date of Resignation </th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="ceolist">
								<?php foreach($ceo_list as $ceo) {
									?>
									<tr>
										<td width="15%"><?php echo $ceo->name; ?></td>
										<td width="15%"><?php echo $ceo->father_name; ?></td>
										<td width="15%"><?php echo fpo_display_date($ceo->dob); ?></td>
										<td>
											<?php 
												if($ceo->qualification == 1) {echo "Post Graduate"; }
												else if($ceo->qualification == 2) {echo "Graduate"; }
												else if($ceo->qualification == 3) {echo "Class 9-12"; }
												else if($ceo->qualification == 4) {echo "Class 6-8"; }
												else if($ceo->qualification == 5) {echo "Class 0-5"; }
											?>
										</td>
										<td><?php echo fpo_display_date($ceo->appointment_date); ?></td>
										<td><?php 
											if(isset($ceo->resigned_date) && $ceo->resigned_date != '0000-00-00') {
												echo fpo_display_date($ceo->resigned_date);
											}
										?>
										</td>
										<td width="10%">
                             <?php if(isset($ceo->resigned_date)&& $ceo->resigned_date != '0000-00-00') {?>
                                <a href="<?php echo base_url('staff/operation/viewceo/'.$ceo->id); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
										
                            <?php }else{?>
											<a href="<?php echo base_url('staff/operation/viewceo/'.$ceo->id); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
											<?php 
												if($ceo->status == 1) {
												?>
													<a href="<?php echo base_url('staff/operation/editceo/'.$ceo->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
												<?php
                            }}
											?>
										</td>
									</tr>
									<?php
								}
								?>
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
$(document).ready(function() {
	$('#example').DataTable();
});
</script>