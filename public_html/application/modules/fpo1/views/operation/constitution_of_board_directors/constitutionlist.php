<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($constitution_list);
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
                        <h1>Constitution of Board of Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/constitutionlist');?>">List Constitution of Board of Directors</a></li>
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
								<?php 
									if($active_constitution >0) {
										?>
											<button type="button" class="btn btn-success btn-labeled" disabled><i class="fa fa-plus-square"></i> <span class="ml-2"> Add Constitution of Board of Directors</span></button>
										<?php
									}
									else {
										?>
										<a href="<?php echo base_url('fpo/operation/addconstitution');?>">
											<button type="button" class="btn btn-success btn-labeled"><i class="fa fa-plus-square"></i> <span class="ml-2"> Add Constitution of Board of Directors</span></button>
										</a>
										<?php
									}
								?>	
							 </div>
						   
						   </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
							    <th width="25%">Constitution Date</th>	
								 <th width="25%">Minimum Meetings in a Year</th>	
                         <th width="30%">Director</th>	                         
								 <th width="20%">Action</th>
							  </tr>
							</thead>
							<tbody id="constitutionlist">														
							<?php 
							foreach($constitution_list as $row):?>
								<tr>
									<td><?php echo fpo_display_date($row->constitution_date); ?></td>
									<td><?php echo $row->min_meetings_per_year;?></td>	
                           <td><?php echo implode(',', $row->directors);?></td>                          
									<td class="text-center">
										<a href="<?php echo base_url('fpo/operation/editconstitution/' . $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
										<a href="<?php echo base_url('fpo/operation/viewconstitution/' . $row->id); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									</td>							
								
							   <?php ?>
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