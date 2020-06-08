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
                        <h1>List of Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation');?>">List of Directors</a></li>
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
								<a href="<?php echo base_url('staff/operation/adddirector');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Director</span>
									</button>
								</a>
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Name of the Director</th>
								<th>DIN</th>
								<th>Date of Appointment </th>
								<th>Tenure</th>
								<th>Validity </th>
								<th>Status</th>
								<th>Action</th>
							  </tr>
							</thead>
							
							<tbody id="productfpolist">
								<?php  foreach($director_list as $row): ?>
								<tr> 
								<td><?php echo $row->name;?></td>	
								<td class="text-uppercase"><?php echo $row->din;?></td>
								<td><?php if ($row->reappointed_on =='')
								{
									echo fpo_display_date($row->date_of_appointment);
								}
								else
								{
									echo fpo_display_date($row->reappointed_on);
								}?></td>
								<td><?php echo $row->tenure > 1?$row->tenure.' Yrs':$row->tenure.' Yr';?> </td>
								<td><?php echo fpo_display_date($row->validity);?></td>
								<td><?php if($row->status == 0)
								{ 
									echo "In-Active";
								}
								elseif($row->status == 1 && $row->reappointed_on =='')
								{
									echo "Active";
								}
								elseif($row->status == 1 && $row->reappointed_on !='')
								{
									echo "Re-Appointed";
								}
								elseif($row->status == 2)
								{
									echo "Removed";
								}
								?></td>	
								<td>
								<?php if($row->status == 1 && $row->reappointed_on ==''){?>
								<a href='<?php echo base_url('staff/operation/editdirector/' . $row->id); ?>'  class='btn btn-success btn-sm' title='Edit'><i class='fa fa-edit' aria-hidden='true' title='Edit'></i></a>
								<a href='<?php echo base_url('staff/operation/viewdirector/' . $row->id); ?>'  class='btn btn-warning btn-sm' title='View'><i class='fa fa-eye' aria-hidden='true' title='View'></i></a>
								<?php }elseif($row->status == 1 && $row->reappointed_on !=''){?>
								<a href="<?php echo base_url('staff/operation/editreappointment/' . $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
								<a href="<?php echo base_url('staff/operation/viewreappointment/' . $row->id); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
								<?php }elseif($row->status == 2){?>
								<a href='<?php echo base_url('staff/operation/viewremoval/' . $row->id); ?>'  class='btn btn-warning btn-sm' title='View'><i class='fa fa-eye' aria-hidden='true' title='View'></i></a>
								<?php }?>
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