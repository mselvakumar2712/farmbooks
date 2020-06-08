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
                        <h1>Bank Accounts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/finance/bank_accounts');?>">Bank Accounts</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form  action="<?php echo base_url('administrator/finance/updatebankaccount/'.$bank_info[0]->id)?>" id="figform" name="sentMessage" method="post" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">    
									<input type="hidden" name="bank_name_id" value="<?php echo $bank_info[0]->id;?>" id="bank_name_id">									
									<input type="hidden" name="fpo_id" value="<?php echo $bank_info[0]->fpo_id;?>" id="fpo_id">
										<div class="row">
											<div class="form-group col-md-4">
										          <label for="">FPO <span class="text-danger">*</span></label>	 
												  <select class="form-control" id="fpo_list" name="fpo_name" readonly required="required" data-validation-required-message="Select FPO...">
                                                  	<option value="">Select fpo </option>
												  </select>
												 <p class="help-block text-danger"></p>
                                             </div>
											 </div>
											<div class="row ">
										
											<div class="form-group col-md-4">
												<label for="inputAddress2">Bank Account Name <span class="text-danger">*</span></label>
												<input  class="form-control" type="text" disabled value="<?php echo $bank_info[0]->bank_account_name;?>" placeholder="Bank Account Name" id="bank_account_name" name="bank_account_name" required="required"  data-validation-required-message="Please enter bank account name.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Account Type <span class="text-danger">*</span></label>
												<select  class="form-control" id="account_type" disabled name="account_type" required="required"  data-validation-required-message="Please select account type.">
													<option value="1" <?php if($bank_info[0]->id == $bank_info[0]->account_type) {?> selected <?php } ?>><?php echo "Savings Account" ?></option>
													<option value="2" <?php if($bank_info[0]->id == $bank_info[0]->account_type) {?> selected <?php } ?>><?php echo "Chequing Account" ?></option>
													<option value="3" <?php if($bank_info[0]->id == $bank_info[0]->account_type) {?> selected <?php } ?>><?php echo "Credit Account" ?></option>
													<option value="4" <?php if($bank_info[0]->id == $bank_info[0]->account_type) {?> selected <?php } ?>><?php echo "Cash Account" ?></option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
											<label for="inputAddress2">Bank Account GL Code </label>
											<select  class="form-control" id="bank_acc_gl_code" disabled name="bank_acc_gl_code">
												<option value="">Select Bank Account GL Code </option>
												<option value="1" selected>ABC1234</option>
												<option value="2">DEF5678</option>
												<option value="3">GHI9123</option>
												<option value="4">JKL456</option>
											</select>
										    </div>					
										</div>
										<div class="row">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Default currency account <span class="text-danger">*</span></label>
											<select  class="form-control" id="dflt_curr_act" disabled name="dflt_curr_act" required="required"  data-validation-required-message="Please select default currency.">
												<?php for($i=0; $i<count($bank_info);$i++) { ?>
													<option value="1" <?php if($bank_info[$i]->id == $bank_info[0]->dflt_curr_act) {?> selected <?php } ?>><?php echo "No" ?></option>
													<option value="2" <?php if($bank_info[$i]->id == $bank_info[0]->dflt_curr_act) {?> selected <?php } ?>><?php echo "Yes" ?></option>
                                                <?php } ?>								
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
										<label for="inputAddress2">Bank Name<span class="text-danger">*</span></label>
											<select  class="form-control" id="bank_name" disabled name="bank_name" required="required"  data-validation-required-message="Please Select bank name .">
												<?php for($i=0; $i<count($bank_name);$i++) { ?>	
												 <option value="<?php echo $bank_name[$i]->id; ?>" <?php if($bank_name[$i]->id == $bank_info[0]->bank_name) {?> selected <?php } ?>><?php echo $bank_name[$i]->name; ?></option>
												<?php } ?>												
											</select> 
										<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Bank Address <span class="text-danger">*</span></label>
											<select  class="form-control" id="bank_address" disabled name="bank_address" required="required"  data-validation-required-message="Please enter bank address.">
											</select>
											<p class="help-block text-danger"></p>
										</div>
										</div>
										<div class="row row-space mt-3">
												<div class="form-group col-md-12 text-center">
													<div class="form-group">
														<div id="success"></div>
														<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
														  <input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
														  <a class="del btn btn-danger">Delete</a>	
														  <a href="<?php echo base_url('administrator/finance/bank_accounts');?>" id="ok" class="btn btn-outline-dark">Back</a>
														  <a href="<?php echo base_url('administrator/finance/bank_accounts');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
													</div>
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

$(document).ready(function(){
	$('#edit').click(function(){
	$('#view_harvestcrop').toggleClass('view');
	$("#sendMessageButton").show();
	$("#cancel").show();
	$("#edit").hide();
	$("#ok").hide();	
	$('input').each(function(){
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
	$('select').each(function(){
		var inp = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		 document.getElementById("sendMessageButton").disabled =false;
		 document.getElementById("cancel").disabled =false;
		}
		else {
		  //inp.attr('disabled', 'disabled');
		}
	});
});
});
$(document).ready(function(){
    var bank_name =<?php echo $bank_info[0]->bank_name;?>;
	getbank( bank_name );	
	var fpo_id =<?php echo $bank_info[0]->fpo_id; ?>;
	
});

$('#bank_name').change(function(){
	 var get_bank_id = $("#bank_name").val();
	 //alert(get_bank_id)
	 getbank( get_bank_id );
 });

function getbank( bank_name_id  ) {
 $("#bank_address option").remove() ;
 if( bank_name_id !='')
{    
	 $.ajax({
		url:"<?php echo base_url();?>administrator/finance/bankaddress/"+bank_name_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		console.log(response);
			response=response.trim();                
			responseArray=$.parseJSON(response);
			console.log(responseArray);
			if(responseArray.status == 1){
			if (Object.keys(responseArray).length > 0) {
			//$("#bank_name").append($('<option></option>').val(0).html('Select branch'));
			}
			$.each(responseArray.bankaddress_list,function(key,value){
			$("#bank_address").append($('<option></option>').val(value.id).html(value.branch_name));
			console.log(value.branch_name);
			});
			}
		},
		error:function(response){
			alert('Error!!! Try again');
		} 			
	}); 
}
else
{
alert('Please provide mandatory field');
} 
}

//delete
$('a.del').click(function() {
		var bank_name_id = '<?php echo $bank_info[0]->id;?>';
		swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'question',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
         if (result.value) {          
            $(this).prop("disabled", true);
            $.ajax({
              url: "<?php echo base_url();?>administrator/finance/deletebankaccount/"+bank_name_id,
              type: "POST",
              data: {
                 this_delete: bank_name_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('administrator/finance/bank_accounts')?>");
                 }, 1000);
              },
              error: function() {
                  setTimeout(function() {
                  swal("Error in progress. Try again!!!");
                 }, 1000);
              },
              complete: function() {
                 setTimeout(function() {
                  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
                 }, 1000);
              }
            });
         }else {
            swal("Cancelled", "You have cancelled the Bank account delete action", "info");
            return false;
         }
      });
});
 $(document).ready(function() {
	var fpo_id = '<?php echo $bank_info[0]->fpo_id;?>';
	$.ajax({
		url: "<?php echo base_url();?>administrator/fpo/fpolist",
		type: "GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response){
		console.log(response);
		response=response.trim();
		responseArray=$.parseJSON(response);
		console.log(responseArray.fpo_list);
		 if(responseArray.status == 1){
			var fpg_list = '<option value="">Select</option>';
			$.each(responseArray.fpo_list,function(key,value){
			 fpg_list += '<option value='+value.id+'>'+value.producer_organisation_name+'</option>';
			});
			$('#fpo_list').html(fpg_list);
			document.getElementById("fpo_list").value = fpo_id;
			} 
		},
		error:function(){

		$('#example').DataTable();
		} 
	});
});

</script>	
</body>
</html>