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
                        <h1>Dimension Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Production Management</a></li>
							<li><a href="#">Transactions</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/production/dimensionEntry'); ?>">Dimension Entry</a></li>
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
								<a href="<?php echo base_url('fpo/production/addDimension'); ?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Dimension Entry</span>
									</button>
								</a>
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Tag Name</th>								
								<th>Date</th>
								<th>Due Date</th>
								<th>Closed</th>
								<th>Balance</th>
								<th>Action</th>
							  </tr>
							</thead>
							
							<tbody id="dimensionList">
								<tr> 
									<td>Support</td>										
									<td>03/20/2019</td>
									<td>03/20/2019</td>
									<td>No</td>
									<td>0.00</td>
									<td>
										<a href="<?php echo base_url('fpo/production/editDimension/'); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
										<a href="<?php echo base_url('fpo/production/viewDimension/'); ?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									</td>
								</tr>
								<tr> 
									<td>Development</td>										
									<td>03/20/2019</td>
									<td>03/20/2019</td>
									<td>No</td>
									<td>0.00</td>
									<td>
										<a href="<?php echo base_url('fpo/production/editDimension/'); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
										<a href="<?php echo base_url('fpo/production/viewDimension/'); ?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									</td>
								</tr>
								<tr> 
									<td>Analyze</td>										
									<td>03/20/2019</td>
									<td>03/20/2019</td>
									<td>No</td>
									<td>0.00</td>
									<td>
										<a href="<?php echo base_url('fpo/production/editDimension/'); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
										<a href="<?php echo base_url('fpo/production/viewDimension/'); ?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									</td>
								</tr>
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