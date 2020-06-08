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
                        <h1>View Tax</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							   <li><a href="#">Tax</a></li>
                               <li><a class="active" href="<?php echo base_url('administrator/taxlist');?>">View Tax</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
			  <form   id="" name="sentMessage"  method="POST" action="<?php echo base_url('administrator/tax/updatetax/'.$tax_info['id'])?>" novalidate="novalidate" >
					<input type="hidden" name="tax_id" value="<?php echo $tax_info['id'];?>" id="tax_id">
					<div class="container">
						<div class="row">
							<div class="form-group col-md-12">
							 <div class="form-group col-md-4">
									<label for="inputAddress2">Type <span class="text-danger">*</span></label>
									<select id="type_id" name="type_id" class="form-control" disabled required="required" data-validation-required-message="Please Select Type">
									<option value="">Select Type</option>
									<option value="1" <?=$tax_info['type_id'] == '1' ? ' selected="selected"' : '';?> >Goods</option>
									<option value="2" <?=$tax_info['type_id'] == '2' ? ' selected="selected"' : '';?> >Service</option>
									<option value="3" <?=$tax_info['type_id'] == '3' ? ' selected="selected"' : '';?> >Unprocessed</option>
									</select>
                           <div class="help-block with-errors text-danger"></div>									
                        </div>
                        <div class="form-group col-md-4">
                           <label for="inputAddress2">HSN Code <span class="text-danger">*</span></label>
                           <input  class="form-control numberOnly" type="text" disabled value="<?php echo $tax_info['hsn_code'];?>" placeholder="HSN Code" id="hsn_code" maxlength="8" name="hsn_code" required="required"  data-validation-required-message="Please Enter HSN Code.">
                           <div class="help-block with-errors text-danger"></div>
                        </div>
                        <div class="form-group col-md-4">
									<label for="inputAddress2">IGST (%) <span class="text-danger">*</span></label>
									<input  class="form-control numberOnly" type="text" disabled placeholder="IGST" value="<?php echo $tax_info['igst'];?>" pattern="^\d+(\.\d{1,2})?$" id="igst" onfocusout="focusFunction()"  maxlength="5" name="igst" required="required"  data-validation-required-message="Please Enter SGST.">
									<div class="help-block with-errors text-danger"></div>
                        </div>
                     </div>
                  </div>                  
                  <div class="row">
							<div class="form-group col-md-12">
							<div class="form-group col-md-4">
								<label for="inputAddress2">CGST (%) <span class="text-danger">*</span></label>
								<input  class="form-control numberOnly" type="text"  disabled placeholder="CGST" id="cgst" value="<?php echo $tax_info['cgst'];?>" pattern="^\d+(\.\d{1,2})?$" maxlength="5" name="cgst" required="required"  data-validation-required-message="Please Enter CGST.">
								<div class="help-block with-errors text-danger"></div>
							</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">SGST / UTGST (%) <span class="text-danger">*</span></label>
									<input  class="form-control numberOnly" type="text" disabled placeholder="SGST" id="sgst" value="<?php echo $tax_info['sgst_utgst'];?>" pattern="^\d+(\.\d{1,2})?$" maxlength="5" name="sgst" required="required"  data-validation-required-message="Please Enter SGST.">
									<div class="help-block with-errors text-danger"></div>
								</div>
								
								<div class="form-group col-md-4">
								<label class=" form-control-label">CESS Applicable?</label>
									<div class="row">
										<div class="col-md-6">
											<div class="form-check-inline form-check">
												<label for="cess_applicable1" class="form-check-label">
													<input type="radio" id="cess_applicable1" disabled name="cess_applicable" value="1" <?php echo ($tax_info['cess_applicable'] == '1') ?  "checked" : "" ;  ?> class="form-check-input"><span class="ml-1">Yes</span>	
												</label>
											</div> 
										</div>
										<div class="col-md-6">
											<div class="form-check-inline form-check">
												<label for="cess_applicable2" class="form-check-label">
													<input type="radio" id="cess_applicable2" disabled name="cess_applicable" value="2" <?php echo ($tax_info['cess_applicable'] == '2') ?  "checked" : "" ;  ?> class="form-check-input" ><span class="ml-1">No</span>
												</label>
											</div>
										</div>			
									</div>
								</div>
							</div>
							</div>
                  <div class="row">
                  <div class="form-group col-md-12">
							<div class="form-group col-md-4">
								<label for="inputAddress2">Short Description <span class="text-danger">*</span></label>
								<textarea type="text" class="form-control" rows="3" id="short_description" disabled name="short_description" maxlength="200" required="required" placeholder="Description" data-validation-required-message="Please Enter Goods Description"><?php echo $tax_info['short_description'];?></textarea>					
								<div class="help-block with-errors text-danger"></div>
							</div>
								<div class="form-group col-md-4" id="cess_percentage" style="display:none;">
									<label for="inputAddress2">Cess Percentage (%)</label>
									<input type="text" class="form-control numberOnly" disabled value="<?php echo $tax_info['cess_percentage'];?>" pattern="^\d+(\.\d{1,2})?$" maxlength="5" id="percentage" name="cess_percentage"  placeholder="Percentage">
								</div>
								<div class="form-group col-md-4" id="cess_amount" style="display:none;">
									<label for="inputAddress2">Cess Minimum Amount</label>
									<input type="text" class="form-control numberOnly" disabled maxlength="8" value="<?php echo $tax_info['cess_amount'];?>" id="amount" name="cess_amount"  placeholder="Amount">
								</div>
							 
							</div>
						</div>
                  <div class="row">
							<div class="form-group col-md-12">
                        <div class="form-group col-md-12">
                           <label for="inputAddress2">Goods Description <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" rows="3" id="item_description" disabled name="item_description" maxlength="450" required="required" placeholder="Description" data-validation-required-message="Please Enter Goods Description"><?php echo $tax_info['item_description'];?></textarea>					
                           <div class="help-block with-errors text-danger"></div>
                        </div>
							</div>
                  </div>
						 <div class="row">
							  <div class="form-group col-md-12 text-center">
							    <div id="success"></div>
								<!--<button id="edit" class="btn btn-success text-center btn-fs" type="button"><i class="fa fa-edit"></i> Edit</button>
									<button   align="center" id="update" name="update" class="btn btn-success btn-fs text-center"  type="submit" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
									<a href="" id="cancel"class="btn btn-outline-dark btn-fs ml-2" style="display:none;"><i class="fa fa-close" aria-hidden="true" ></i>Cancel</a>-->
														 
									 <a href="<?php echo base_url('administrator/tax/taxedit/' . $tax_info['id']); ?>"  class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit</a>
									 <a href="<?php echo base_url('administrator/tax');?>" id="ok" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-close"></i> Cancel</a>				
							 </div>
						 
						  </div>
					</div>
			 </form>			
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	<?php $this->load->view('templates/datatable.php');?>
	<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	<script src="<?php echo asset_url()?>js/register.js"></script>
	<script>
	
	function focusFunction(){
		var igst = $('#igst').val();
		var result = igst/2;
		$('#cgst').val(result);
		$('#sgst').val(result);			
  } 
	 $('#edit').click(function(){
		  $('#editfig').toggleClass('view');
		  $("#update").show();
		  $("#cancel").show();
		  $("#edit").hide();
		   $("#ok").hide();
		  $('input').each(function(){
			var inp = $(this);
			 //var button = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("update").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  //inp.attr('disabled', 'disabled');
			}
		 });
		  $('select').each(function(){
			var inp = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("update").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  //inp.attr('disabled', 'disabled');
			}
		  });
		  $('textarea').each(function(){
			var inp = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("update").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  //inp.attr('disabled', 'disabled');
			}
		  });
		});
		
		$('input[name=cess_applicable]').on('change', function() {
    var cess_info = $("input[name='cess_applicable']:checked").val();  
    if(cess_info == 1) {
		$('#cess_percentage').show();
		$('#cess_amount').show();
		//$('#bank_details2').show();
		//$('#bank_details3').show();
    }else{
		$('#cess_amount').hide();
		$('#cess_percentage').hide();
		//$('#bank_details3').hide();
	}
	});
	var cess_detail = $("input[name='cess_applicable']:checked").val();  
    if(cess_detail == 1) {
		$('#cess_percentage').show();
		$('#cess_amount').show();
    }else{
		$('#cess_amount').hide();
		$('#cess_percentage').hide();
	}

	</script>
   </body>
</html>