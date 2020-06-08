<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($bank_info);
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
			<form  action="<?php echo base_url('administrator/finance/postbankaccount')?>" id="figform" name="sentMessage" method="post" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">	
												    <th class="text-center">Fpo Name</th>
													<th class="text-center">Account Name</th>
													<th class="text-center">Type</th>
													<th class="text-center">GL Account</th>
													<th class="text-center">Bank</th>
													<th class="text-center">Number</th>
													<th class="text-center">Bank Address</th>
													<th class="text-center">Dflt</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody id="bankdetails">
											<?php foreach($bank_info as $row): ?>
											<tr> 
											<td><?php echo $row->producer_organisation_name; ?></td>	
											<td><?php echo $row->bank_account_name; ?></td>	
											<td><?php  if($row->account_type==1){
											echo "Savings Account";
											}else if($row->account_type==2){
												echo "Chequing Account";
											} else if($row->account_type==3){
												echo "Credit Account";
											} else if($row->account_type==4){
												echo "Cash Account";
											} ?></td>											
											<td><?php echo $row->account_code; ?></td>
											<td><?php echo $row->name;?></td>
											<td></td>
											<td>
											<?php echo $row->branch_name; ?></td>										
											<td>											
											<?php  if($row->dflt_curr_act==1){
												echo "No";
											}else if($row->dflt_curr_act==2){
												echo "Yes";
											} ?>								
											</td>
											<td >
											<a href="<?php echo base_url('administrator/finance/viewbankAccounts/'. $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
											</td>
											</tr>
											<?php endforeach; ?>												
											</tbody>
										</table> 
									</div>
									<div class="container-fluid">  
									<div class="row ">
											<div class="form-group col-md-4">
												<label for="">Select FPO <span class="text-danger">*</span></label>
													<select class="form-control" id="fpo_list" name="fpo_name" required="required"  data-validation-required-message="Select FPO...">
														<option value="">Select Fpo</option>
														<?php for($i=0; $i<count($fpo);$i++) { ?>										
														<option value="<?php echo $fpo[$i]->id; ?>"><?php echo $fpo[$i]->producer_organisation_name; ?></option>
														<?php } ?>
													</select>
												<p class="help-block text-danger"></p>
                                            </div>
									    </div>
											<div class="row ">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Bank Account Name <span class="text-danger">*</span></label>
												<input  class="form-control" type="text"  placeholder="Bank Account Name" id="bank_account_name" name="bank_account_name" required="required"  data-validation-required-message="Please enter bank account name.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Account Type <span class="text-danger">*</span></label>
												<select  class="form-control" id="account_type"  name="account_type" required="required"  data-validation-required-message="Please select account type.">
													<option value="">Select Account Type </option>
													<option value="1">Savings Account</option>
													<option value="2">Chequing Account</option>
													<option value="3">Credit Account</option>
													<option value="4">Cash Account</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
											<label for="inputAddress2">Bank Account GL Code </label>
											<select  class="form-control" id="bank_acc_gl_code"  name="bank_acc_gl_code">
												<option value="">Select Bank Account GL Code </option>
												<option value="1">ABC1234</option>
												<option value="2">DEF5678</option>
												<option value="3">GHI9123</option>
												<option value="4">JKL456</option>
											</select>
										    </div>					
										</div>
										<div class="row ">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Default currency account <span class="text-danger">*</span></label>
											<select  class="form-control" id="dflt_curr_act"  name="dflt_curr_act" required="required"  data-validation-required-message="Please select default currency.">
												<option value="">Select Default currency account </option>
												<option value="1">No</option>
												<option value="2">Yes</option>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
										<label for="inputAddress2">Bank Name<span class="text-danger">*</span></label>
											<select  class="form-control" id="bank_name" name="bank_name" required="required"  data-validation-required-message="Please Select bank name .">
												<option value="">Select Bank Name</option>
												<?php for($i=0; $i<count($bank_name);$i++) { ?>										
												 <option value="<?php echo $bank_name[$i]->id; ?>"><?php echo $bank_name[$i]->name; ?></option>
												<?php } ?>
											</select> 
										<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Bank Address <span class="text-danger">*</span></label>
											<select  class="form-control" id="bank_address"  name="bank_address" required="required"  data-validation-required-message="Please enter bank address.">
											</select>
											<p class="help-block text-danger"></p>
										</div>
										</div>
										 <div class="form-row">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<input id="sendMessageButton" value="Add New" class="btn btn-success text-center" type="submit">							
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
$('#bank_name').change(function(){
	 var get_bank_id = $("#bank_name").val();
	 //alert(get_bank_id)
	 getbank( get_bank_id );
 });

//administrator/finance/bank_accounts 
 
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
			$("#bank_address").append($('<option></option>').val(0).html('Select branch'));
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

//fpo list
$(document).ready(function() {
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