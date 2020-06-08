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
            <div class="col-md-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Constitution of Committee of Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/godownlist');?>">Constitution of Committee of Directors</a></li>
                            <li class="active">Add Constitution of Committee of Directors</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Name of the Committee <span class="text-danger">*</span></label>
													<input type="text" class="form-control"  maxlength="50" id="commitee_name" name="commitee_name" placeholder="Name of the Committee "  required="required" data-validation-required-message="Please enter name of the committee .">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Number of Members</label>
													<input type="text" class="form-control numberOnly" id="members_num"  name="members_num"  maxlength="2" placeholder="Number of Members" required="required" data-validation-required-message="Please enter number of members.">						
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Duration (In Yrs)<span class="text-danger">*</span></label>
													<select  class="form-control" id="duration" name="duration"required="required" data-validation-required-message="Please Select duration.">
													<option value="">Select Duration (In Yrs) </option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													</select>
													 <p class="help-block text-danger"></p>
												</div>
											</div>
											<div class="row row-space">
												<div class="form-group col-md-12">
												  <label class=" form-control-label">Objects of the committee <span class="text-danger">*</span></label>
												  <textarea  class="form-control" id="committe_obj" rows="3"  name="committe_obj"  maxlength="300" placeholder="Objects of the committee "></textarea>						
											    </div>
											</div>
											<div class="row row-space">																								
												<div class="form-group col-md-4">
													<label for="inputAddress2">Fees to Members</label>
													<input type="text" class="form-control numberOnly"  maxlength="5" onkeyup="getfeemembers(this.value)"  id="member_fees" name="member_fees" placeholder="Fees to Members" >
												</div>
												<div class="form-group col-md-4" id="fees_member1"style="display:none">
												<label for="inputAddress2">Date (from)</label>
												<input type="date" class="form-control"  id="member_from" name="member_from" required="required" data-validation-required-message="Please enter fees to members date from .">											
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4"  id="fees_member2" style="display:none">
												<label for="inputAddress2">Date (To)</label>
												<input type="date" class="form-control"  id="member_from" name="member_from" required="required" data-validation-required-message="Please enter fees to members date to .">											
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Allowance to Members </label>
													<input type="text" class="form-control numberOnly"  maxlength="5" onkeyup="getallowance(this.value)" id="member_allowance" name="member_allowance" placeholder="Allowance to Members">
												</div>
												<div class="form-group col-md-4" id="member_allowance1"style="display:none">
												<label for="inputAddress2">Date (from)</label>
												<input type="date" class="form-control"  id="allowance_member_from" name="allowance_member_from" required="required" data-validation-required-message="Please enter allowance to members date from .">											
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4"  id="member_allowance2" style="display:none">
												<label for="inputAddress2">Date (To)</label>
												<input type="date" class="form-control"  id="allowance_member_from" name="allowance_member_to" required="required" data-validation-required-message="Please enter allowance to members date to.">											
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Resolution Number</label>
													<input type="text" class="form-control numberOnly"  maxlength="3" id="resolution_number" name="resolution_number" placeholder="Resolution Number">
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Resolution Date </label>
													<input type="date" class="form-control"  id="resolution_date" name="resolution_date" >
												</div>												
											</div>
										<div class="form-row mt-2">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/colourlist');?>" class="btn btn-outline-dark">Cancel</a>	
											  </div>
											 
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
		function getfeemembers(member_fees) {
				if(member_fees.length > 0) {
				$('#fees_member1').show();
				$('#fees_member2').show();
			}else{
				$('#fees_member1').hide();
				$('#fees_member2').hide();
			}
		}
		function getallowance(member_allowance) {
				if(member_allowance.length > 0) {
				$('#member_allowance1').show();
				$('#member_allowance2').show();
			}else{
				$('#member_allowance1').hide();
				$('#member_allowance2').hide();
			}
		}
		
		
	$(document).ready(function() {
		
	  		$('form').submit(function(e){
	e.preventDefault();
	const figdata = $('#figform').serializeObject();
	if(figdata != '')
	{
	console.log(figdata);
		 $.ajax({
			url:"<?php echo base_url();?>administrator/fig/postfig",
			type:"POST",
			data:figdata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/fig')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
			
			}); 
	}
	else
	{
		alert('Please provide mandatory fields ');
	}
});
$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  return o;
};
});

    
</script>
</body>
</html>