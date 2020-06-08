<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

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
                        <h1>View Bank</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/banknamelist');?>">Bank Name</a></li>
                            <li class="active">View Bank</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				  <form  action="<?php echo base_url('administrator/masterdata/updatebank_name/'.$bankname_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="bank_id" value="<?php echo $bankname_info['id']?>" id="bank_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												
													
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Type <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_type" name="bank_type" required="required"  data-validation-required-message="Please Select bank type ."disabled>
													<option value="">Select Bank Type</option>
													<?php for($i=0; $i<count($bank_type);$i++) {
														if($bankname_info['type_id']==$bank_type[$i]->id){	
														echo '<option value="'.$bank_type[$i]->id.'" selected="selected">'.$bank_type[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$bank_type[$i]->id.'">'.$bank_type[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control "  value="<?php echo $bankname_info['name']?>"  maxlength="45" id="bank_name" name="bank_name" placeholder="Bank Name "  required="required" data-validation-required-message="Please enter bank name ."disabled>
													<p class="help-block text-danger"></p>
											</div>
										</div>
				
										<div class="col-md-12 text-center">
											<button id="edit" class="btn btn-success text-center btn-fs" type="button"> <i class="fa fa-edit"></i> Edit</button>
											<button id="sendMessageButton" class="btn btn-success text-center btn-fs" type="submit" style="display:none;"> <i class="fa fa-check-circle"></i> Update</button>
											<!--<a href="#" id="" class="del btn btn-danger btn-fs"> <i class="fa fa-trash"></i> Delete</a>	-->
											<a href="<?php echo base_url('administrator/masterdata/banknamelist');?>" id="ok" class="btn btn-fs btn-outline-dark ml-2"> <i class="fa fa-arrow-circle-left"></i> Back</a>
											<a href="<?php echo base_url('administrator/masterdata/banknamelist');?>" id="cancel" class="btn btn-fs btn-outline-dark ml-2" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
											</div>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
            </div><!-- .animated -->
        </div><!-- .content -->
     	</div>
		
     <?php $this->load->view('templates/footer.php');?>         
     <?php $this->load->view('templates/bottom.php');?>
		<?php $this->load->view('templates/datatable.php');?>	  
     <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	  <script src="<?php echo asset_url()?>js/register.js"></script>
	 <script>
	  	$('#edit').click(function(){
		  $('#editfig').toggleClass('view');
		  $("#sendMessageButton").show();
		  $("#cancel").show();
		  $("#edit").hide();
		   $("#ok").hide();
		  $('input').each(function(){
			var inp = $(this);
			 //var button = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("sendMessageButton").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  inp.attr('disabled', 'disabled');
			}
		 });
		  $('select').each(function(){
			var inp = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("sendMessageButton").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  inp.attr('disabled', 'disabled');
			}
		  });
		});
	  


</script>
</body>
</html>