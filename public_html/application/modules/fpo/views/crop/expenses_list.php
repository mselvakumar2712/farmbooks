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
                        <h1>Update Expenses List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop");?>">Update Expenses</a></li>
                            <li class="active">Update Expenses List</li>
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
									<a href="<?php echo base_url('fpo/updatecrop/addexpenses_update');?>">
										<button type="button" class="btn btn-success btn-labeled">
											<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Expenses Updation</span>
										</button>
									</a>
								</div>
							</div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
							   <th>Farmer Name</th>
								<th>Variety</th>
								<th>Cost of Seed</th>
								<th>Cost of Land Preparation</th>
								<th>Cost of Planting</th>
								<th>Cost of Fertilizer</th>
								<th>Cost of Pesticides</th>
								<th>Cost of Weeding</th>
								<th>Action</th>       
							  </tr>
							</thead>
							<tbody id="">
							<?php foreach($expenses_info as $row): ?>
							<tr> 
								<td><?php echo $row->profile_name; ?></td>							
								<td><?php echo $row->variety_name; ?></td>
								<td class="text-right"><?php echo number_format($row->seed_total, 2); ?></td>
								<td class="text-right"><?php echo number_format($row->land_preparation_cost, 2); ?></td>
								<td class="text-right"><?php echo number_format($row->planting_cost, 2); ?></td>
								<td class="text-right"><?php echo number_format($row->fertilizer_total, 2); ?></td>
								<td class="text-right"><?php echo number_format($row->pesticide_total, 2); ?></td>
								<td class="text-right"><?php echo number_format($row->weeding_total, 2); ?></td>
								<td class="text-center">
									<a href="<?php echo base_url('fpo/updatecrop/editexpenses_update/'.$row->id); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
									<a href="<?php echo base_url('fpo/updatecrop/viewexpenses_update/'.$row->id); ?>" class="btn btn-warning btn-sm mt-2" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>						
								</td>
							</tr>
							<?php endforeach; ?>
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