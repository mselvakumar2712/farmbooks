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
                        <h1>List Annual Meetings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/annualmeetinglist');?>">List Annual Meetings</a></li>
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
								<a href="<?php echo base_url('staff/operation/addannualmeeting');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Annual Meeting</span>
									</button>
								</a>
							 </div>
						   </div>
							<table id="example" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Type of Meeting</th>
									<th>Date of Meeting</th>								
									<th>Date of Notice to Shareholders</th>
									<th>Quorum Available</th>
									<th>Date of Adjournment Meeting</th>
									<th>Action</th>
								  </tr>
								</thead>
								
								
								<tbody id="boardlist">
									<?php  foreach($annualmeeting as $row): ?>
										<tr> 
										<td><?php if($row->meeting_type ==1)
										{
											echo "Ordinary";
										}
										else
										{
											echo "Extraordinary	";
										}?></td>
										<td><?php echo fpo_display_date($row->meeting_date);?></td>	
										<td><?php echo fpo_display_date($row->notice_date);?></td>	
										<td><?php if($row->quorum_available ==1)
										{
											echo "Yes";
										}
										else
										{
											echo "No";
										}?></td>
										<td><?php echo ($row->adjurnment_date != 0000-00-00) ? fpo_display_date($row->adjurnment_date):"";?></td>
										<td width="10%">
											<a href="<?php echo base_url('staff/operation/editannualmeeting/'. $row->id); ?>"  class="btn btn-success btn-sm mt-1" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
											<a href="<?php echo base_url('staff/operation/viewannualmeeting/'. $row->id); ?>"  class="btn btn-warning btn-sm mt-1" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
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