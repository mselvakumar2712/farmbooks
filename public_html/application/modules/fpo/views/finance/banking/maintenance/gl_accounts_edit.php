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
                        <h1>GL Accounts Edit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="">GL Accounts Edit</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="<?php echo base_url('fpo/finance/updateglAccounts/'.$glgroup_info[0]->account_code)?>" method="post" id="gl_account_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">									
									<div class="container-fluid mt-5">  
										<div class="row ">
										<div class="form-group col-md-3">
										<input type="hidden" name="gl_acc_id" value="<?php echo $glgroup_info[0]->account_code;?>" id="gl_acc_id">				
												<label for="inputAddress2">Account Group</label>
												<select class="form-control" id="account_group" readonly name="account_group" required="required" data-validation-required-message="Please select account group.">
													<option value="">Select Account Group </option>
													<?php for($i=0; $i<count($gl_group_info);$i++) { ?>										
													<option value="<?php echo $gl_group_info[$i]->account_code2; ?>" <?php if($gl_group_info[$i]->account_code2 == $glgroup_info[0]->account_code2) { ?>selected<?php } ?>><?php echo $gl_group_info[$i]->account_name; ?></option>
													<?php } ?>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Group Code</label>
												<input class="form-control" type="text" readonly value="<?php echo $glgroup_info[0]->account_code2; ?>" id="group_code" name="group_code" required="required" data-validation-required-message="Please enter account name.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
													<label for="inputAddress2">Account Name</label>
													<input class="form-control" type="text" maxlength="75"  value="<?php echo $glgroup_info[0]->account_name; ?>" placeholder="Account Name" id="account_name" name="account_name" required="required" data-validation-required-message="Please enter account name.">
												    <p class="help-block text-danger"></p>
											</div>	
												
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Status</label>
												<select class="form-control" id="account_status" readonly name="account_status">
													<option value="">Select Account Status </option>
													<option value="1" <?php if($glgroup_info[0]->status == 1) { ?>selected<?php } ?>>Active</option>
													<option value="2" <?php if($glgroup_info[0]->status == 2) { ?>selected<?php } ?>>Inactive</option>
												</select>
											</div>												
										</div>
										<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button  class="btn btn-success text-center" ><i class="fa fa-check-circle"></i> Update</button>
											    <a href="<?php echo base_url('fpo/finance/glaccounts');?>" id="cancel" class="btn btn-outline-dark"><i class="fa fa-close"></i> Cancel</a>
											  </div>											 
									     </div>
									</div>
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
	$('#account_group').on('change', function() {
		$("#group_code").val(this.value);
	});
	$(document).ready(function() {
		$('#bankdetails').DataTable();
  });
	</script>
   </body>
</html>