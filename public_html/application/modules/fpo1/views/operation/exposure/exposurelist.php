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
                        <h1>List Exposure Visit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Exposure Visit</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/exposurelist');?>">List Exposure Visit</a></li>
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
								<a href="<?php echo base_url('fpo/operation/addexposure');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Exposure Visit</span>
									</button>
								</a>
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Date of Visit  </th>
									<th>Place of Visit</th>
									<th>No. of Participants</th>
									<th>No. of Villages Covered</th>
									<th>Cost Involved</th>
									<th>Action</th>
								  </tr>
								</thead>
									<tbody id="boardlist">
									<?php foreach($exposure_list as $exposure): ?>
										<tr> 
										<td><?php echo fpo_display_date($exposure->program_date); ?></td>
										<td><?php echo $exposure->conducting_place;?></td>
										<td><?php echo $exposure->no_of_participants;?></td>
										<td><?php echo $exposure->no_of_villages;?></td>
										<td><?php echo ($exposure->cost_involved == 1)?'Yes':'No';?></td>
										<td class="text-center">
											<a href="<?php echo base_url('fpo/operation/editexposure/'.$exposure->id); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
											<a href="<?php echo base_url('fpo/operation/viewexposure/'.$exposure->id); ?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
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