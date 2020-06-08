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
                        <h1>GL Groups</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="">GL Groups</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="<?php echo base_url('fpo/finance/postglaccount_group')?>" id="figform" name="sentMessage" method="post" novalidate="novalidate" >
	            <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">  
										<table class="table table-bordered" id="bankdetails">
											<thead>
												<tr bgcolor="#afd66b">		
													<th class="text-center">Group Code</th>
													<th class="text-center">Group Name</th>
													<!--<th class="text-center">Subgroup Of</th>-->
													<th class="text-center">Class</th>
												</tr>
											</thead>
											<tbody >
											<?php foreach($gl_group_info as $row): ?>
											<tr> 
                                                <td><?php echo $row->account_code; ?></td>
                                                <td><?php echo $row->account_name;?></td>
                                                <!--<td></td>-->                                         
                                                <td>
                                                   <?php 
                                                   if($row->account_mode==1){
                                                      echo "Income";
                                                   }else if($row->account_mode==2){
                                                      echo "Expenses";
                                                   }else if($row->account_mode==4){
                                                      echo "Assets";
                                                   }else if($row->account_mode==3){
                                                      echo "Liabilities";
                                                   }else{
                                                      echo "";
                                                   }
                                                   ?>
                                                </td>	
                                                <!--<td class="text-center">
                                                   <!--<a href="<?php //echo base_url('fpo/finance/editglaccount_groups/'. $row->account_code2); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                                                   <a href="<?php echo base_url('fpo/finance/viewglaccount_groups/'. $row->account_code2); ?>" class="btn btn-warning btn-sm" title="view" ><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
												</td>-->
											</tr>
											<?php endforeach; ?>												
											</tbody>
											<tbody>
											<!--<tr>
												<td colspan="5" class="text-left" ><input type="checkbox" id="in_active" name="in_active">  show also Inactive</td>
												<td colspan="1" class="text-center" ><input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">	</td>
											</tr>-->													
											</tbody>
										</table> 
									</div>
                                    
<!--
									<div class="container-fluid mt-5">                                            
										<div class="row ">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Group Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" maxlength="75" placeholder="Group Name" id="name" name="name" required="required" data-validation-required-message="Please enter group name.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Class</label>
												<select class="form-control" id="trans_type" name="trans_type" required="required" data-validation-required-message="Please select class.">
													<option value="">Select Class</option>
													<option value="1" selected>Assets</option>
													<option value="2">Liabilities</option>
												</select>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Subgroup Of</label>
												<select class="form-control" id="Sub_group" name="Sub_group" required="required" data-validation-required-message="Please select subgroup.">
													<option value="">Select Subgroup</option>
													<option value="1" selected>None</option>
												</select>
											</div>	
										</div>
									    <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>						
											  </div>											 
									     </div>
									</div>
                                    
-->
								</div>
							</div>
						</div>
					</div>						
				</form>
			</div>
		</div>	
      </div><!-- /#right-panel -->
	</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
$(document).ready(function() {
	$('#bankdetails').DataTable({"aaSorting": []});
});
</script>
</body>
</html>