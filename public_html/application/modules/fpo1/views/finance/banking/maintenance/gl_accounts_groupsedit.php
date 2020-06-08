<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($glgroup_info[0]);
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
                        <h1>GL Account Groups Edit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="">GL Account Groups Edit</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="<?php echo base_url('fpo/finance/updateglAccount_group/'.$glgroup_info[0]->account_code2)?>" id="" name="sentMessage" method="post" novalidate="novalidate" >
	            <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid mt-5">   
									<input type="hidden" name="gl_acc_grp_id" value="<?php echo $glgroup_info[0]->account_code2;?>" id="gl_acc_grp_id">									
										<div class="row ">
										    <div class="form-group col-md-4">
												<label for="inputAddress2">Group Code <span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="<?php echo $glgroup_info[0]->account_code2; ?>" readonly maxlength="75" placeholder="Group Name" id="name" name="name" required="required" data-validation-required-message="Please enter group name.">

											</div>	
											<div class="form-group col-md-4">
												<label for="inputAddress2">Group Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="<?php echo $glgroup_info[0]->account_name; ?>"  maxlength="75" placeholder="Group Name" id="name" name="name" required="required" data-validation-required-message="Please enter group name.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Class</label>
												<select class="form-control" id="trans_type"  name="trans_type" required="required" data-validation-required-message="Please select class.">
													<option value="">Select Class</option>
													<option value="1" <?php if($glgroup_info[0]->account_type == '1') {?> selected <?php } ?>><?php echo "Assets" ?></option>
													<option value="2" <?php if($glgroup_info[0]->account_type == '2') {?> selected <?php } ?>><?php echo "Liabilities" ?></option>
												</select>
											</div>
											
										</div>
									    <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center" type="submit" > <i class="fa fa-check-circle"></i> Update</button>
											    <a href="<?php echo base_url('fpo/finance/glaccount_groups');?>" id="cancel" class="btn btn-outline-dark"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
	$(document).ready(function() {
		$('#bankdetails').DataTable();
	
        });
	</script>
   </body>
</html>