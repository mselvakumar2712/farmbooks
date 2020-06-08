<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($bank_info);
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.text-right {
   font-style: normal ! important;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    border-color: green ! important;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none !important; 
    border-radius: 4px;
}
</style>
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
                            <li><a class="active" href="<?php echo base_url('fpo/finance/bank_accounts');?>">Bank Accounts</a></li>
                            <!--<li class="active">List FIG </li>-->
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
									<div class="table-responsive">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">	
													<th class="text-center">Account Name</th>
                                                    <th class="text-center">Bank Name</th>
                                                    <th class="text-center">Account Number</th>
                                                    <th class="text-center">Branch</th>
													<th class="text-center">Type</th>
													<th class="text-center">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody id="bankdetails">
											<?php foreach($bank_info as $row): ?>
											<tr> 
                                                <td><?php echo $row->bank_account_name; ?></td>
                                                <td><?php echo $row->name;?></td>
                                                <td><?php echo $row->bank_account_number; ?></td>
                                                <td><?php echo $row->branch_name; ?></td>
                                                <td>
                                                    <?php if($row->account_type==1){
                                                        echo "Savings Account";
                                                    }else if($row->account_type==2){
                                                        echo "Current Account";
                                                    } else if($row->account_type==3){
                                                        echo "Over Draft/Cash Credit";
                                                    } else{
														echo " ";
													}	?>	
                                                </td>											
                                                <td class="text-right"><?php echo ($row->opening_balance)?($row->opening_balance) > 0? number_format(abs($row->opening_balance),2)." ".'Cr':number_format(abs($row->opening_balance), 2)." ".'Dr':'';?></td>                                                
                                                <td>
                                                    <a href="<?php echo base_url('fpo/finance/viewbankAccounts/'. $row->id); ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
                                                </td>
											</tr>
											<?php endforeach; ?>												
											</tbody>
										</table> 
									</div>
                           <form action="<?php echo base_url('fpo/finance/postbankaccount')?>" id="addBankAccountForm" name="sentMessage" method="post" novalidate="novalidate">
        
									<div class="container-fluid">  
										<div class="row">
                                 <div class="form-group col-md-4">
												<label for="inputAddress2">Account Number <span class="text-danger">*</span></label>
												<input class="form-control numberOnly" autofocus type="text" placeholder="Account Number" id="account_no" name="account_no" required data-validation-required-message="Enter account number" minlength="9" maxlength="17">
												<p class="help-block text-danger"></p>
											</div>
                                            <div class="form-group col-md-4">
                                            <label for="inputAddress2">Bank Name<span class="text-danger">*</span></label>
                                                <select class="form-control" id="bank_name" name="bank_name" required data-validation-required-message="Select bank name">
                                                    <option value="">Select Bank Name</option>
                                                    <?php for($i=0; $i<count($bank_name);$i++) { ?>	
                                                     <option value="<?php echo $bank_name[$i]->id; ?>" id="<?php echo $bank_name[$i]->name; ?>"><?php echo $bank_name[$i]->name; ?></option>
                                                    <?php } ?>
                                                </select> 
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Branch <span class="text-danger">*</span></label>
                                                <select class="form-control" id="bank_address" name="bank_address" required data-validation-required-message="Enter bank address">
												  <option value="">Select Branch Name</option>
												</select>
                                                <p class="help-block with-errors text-danger"></p>
                                            </div>
                                        </div>
                                            
                                        <div class="row">
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" readonly placeholder="Account Name" id="bank_account_name" name="bank_account_name" maxlength="100">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Type <span class="text-danger">*</span></label>
												<select class="form-control" id="account_type" name="account_type" required data-validation-required-message="Select account type">
													<option value="">Select Account Type </option>
													<option value="1">Savings Account</option>
													<option value="2">Current Account</option>
													<option value="3">Over Draft/Cash Credit</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>											
                                 <div class="form-group col-md-3">
												<label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> ) <span class="text-danger">*</span></label>
												<input class="form-control inputfilter text-right" placeholder="0.00" id="opening_balance" name="opening_balance" required data-validation-required-message="Enter the opening balance" minlength="1" maxlength="10">
												<p class="help-block text-danger"></p>
											</div>
                                 <div class="form-group col-md-3">
                                    <label for="inputAddress2">Transaction Type</label>
                                    <select class="form-control" id="bank_acc_gl_code" name="bank_acc_gl_code">
                                       <option value="1">Cr</option>
                                       <option value="2">Dr</option>
                                    </select>
										   </div>	
								      </div>                                        										
									</div>
                                        
								      <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center" type="submit"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>							
											</div>											 
										</div>
                             </form>
									</div>	
								</div>	
				         </div>
						</div>					
			   </div>										
			</div>
		</div>
    </div><!-- /#right-panel -->
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
<script>
$(document).ready(function() {
   $('#bank_name').select2();
   $('#bank_address').select2();
   $('#account_type').select2();
    $('#sendMessageButton').click(function(){  	
        var validate = true;
        $('#addBankAccountForm').find('input, select').each(function(){      
            if($(this).val() != ""){
                validate = true;
            } else {
                validate = false;
            }
        });

        if(validate){		
            return true;// you can submit form or send ajax or whatever you want here
        }else{			
            swal('',"Provide all the data");
            return false;
        }
	});
	
	(function($) {
		$.fn.inputFilter = function(inputFilter) {
		return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
		  if (inputFilter(this.value)) {
		  this.oldValue = this.value;
		  this.oldSelectionStart = this.selectionStart;
		  this.oldSelectionEnd = this.selectionEnd;
		  } else if (this.hasOwnProperty("oldValue")) {
		  this.value = this.oldValue;
		  this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
		  }
		});
		};
	 }(jQuery));
  
	$(".inputfilter").inputFilter(function(value) {
	return /^-?\d*$/.test(value); });
});
    

$('#account_no').on('change', function() {
	var acc_name =  $(this).val();;
	 var bank_Name=$('#bank_name').children(":selected").attr("id");
	 if(bank_Name!==''){
	 var id = $('#bank_name').children(":selected").attr("id");
	 if(id !== ''){
     var getbank_Name = id.substring(0, 3);
	 var new_acc = acc_name+"-"+getbank_Name;
		$("#bank_account_name").val(new_acc);
	 }
	}else{
		 $("#bank_account_name").val(acc_name);
		 
	 } 

});
    

$("#bank_name").change(function() {
  var id = $(this).children(":selected").attr("id");
  var getbank_Name = id.substring(0, 3);
	 var acc = $('#account_no').val();
	 if(acc!==''){
		document.getElementById("bank_account_name").value = acc+"-"+getbank_Name ;
	 }else{	 
		 
	 }
});
    

$('#bank_name').change(function(){
    var get_bank_id = $("#bank_name").val();
    getBankAddressByBankName( get_bank_id );
});

    
function getBankAddressByBankName( bank_name_id ) {
    $("#bank_address option").remove();
    if(bank_name_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>fpo/finance/getBankAddressByBankName/"+bank_name_id,
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
			 });
			}
		  },
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	   }); 
    } /* else {
        swal("Sorry!", "Select the bank name");
    }  */
}
 
 
$('#account_type').on('change', function(e){ 
   var account_type = $(this).val();
   if(account_type == 3) {
      $("#bank_acc_gl_code").val("1"); 
      document.getElementById("bank_name").setAttribute("readonly", true);
      document.getElementById("bank_address").setAttribute("readonly", true);
      $("#account_no").prop('readonly',true);
      $("#account_no").prop('required',false);
      $("#bank_name").prop('required',false);
      $("#bank_address").prop('required',false);
   }
	else
	{
      $("#bank_acc_gl_code").val("2");
      document.getElementById("bank_name").setAttribute("readonly", true);
      document.getElementById("bank_address").setAttribute("readonly", true);
      $("#account_no").prop('readonly',false);
      $("#account_no").prop('required',false);
      $("#bank_name").prop('required',false);
      $("#bank_address").prop('required',false);
	}	
});
</script>	
</body>
</html>