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
                        <h1>List Training to CEO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="#">List Training to CEO</a></li>
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
								<a href="<?php echo base_url('staff/operation/addtraining_ceo');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2">Add Training to CEO</span>
									</button>
								</a>
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
								<thead>
                           <tr>
                              <th>Commencement Date</th>
                              <th>No. of Days</th>
                              <th>Trainer Name</th>
                              <th>Training Institutes's Name</th>                             
                              <th>Cost Involved</th>
                              <th>Action</th>
                           </tr>
								</thead>
									<tbody id="boardlist">
									<?php  foreach($ceos as $ceo): ?>
										<tr>
                                 <td><?php echo fpo_display_date($ceo->training_start_date); ?></td>
                                 <td><?php echo $ceo->no_of_days;?></td>
                                 <td><?php echo $ceo->trainer_name;?></td>
                                 <td><?php echo $ceo->institute_name;?></td>
                                 <td><?php echo ($ceo->cost_involved == 1)?'<i class="fa fa-rupee"></i> '.$ceo->involved_cost:'No';?></td>
                                 <td class="text-center">
                                    <a href="<?php echo base_url('staff/operation/edittraining_ceo/'.$ceo->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                                    <a href="<?php echo base_url('staff/operation/viewtraining_ceo/'.$ceo->id); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
                                 </td>						
                              </tr>
									<?php endforeach; ?>									
									</tbody>
								</table>
							</div>
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
