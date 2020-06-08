<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
	#remove_0 {
        display: none;
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
                        <h1>Add Committee Members</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/adddirector');?>">Add Committee Members</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_committee')?>" method="post" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space mt-4"> 
													  <div class="form-group col-md-6">
														  <label for="">Formation Date <span class="text-danger">*</span></label>
															 <input type="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d").' -1 year')); ?>" value="<?php echo date("Y-m-d"); ?>"  id="commitee_date" name="commitee_date" required="required" data-validation-required-message="Please enter date.">
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-6">
														<label for="">Name of the Committee <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="50" id="commitee_name" name="commitee_name"  placeholder="Name of the committee" required="required" data-validation-required-message="Please enter committee name.">
														<div class="help-block with-errors text-danger"></div>
													  </div>												
												</div>
											<div class="table-responsive mt-3">  
												<table class="table table-bordered" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Name of the Committee Member
															</th>
															<th class="text-center">
																Duration of Member
															</th>
															<th class="text-center">
																Is CEO
															</th>
															<th class="text-center"></th>
														</tr>
													</thead>
													<tbody>
													<tr id="row0"> 
														<td width="30%">														
														<select class="form-control d-none" id="hidden_dirs">
														  <option value="">Select Committee Member Name</option>
														  <?php if(!empty($all_ceo)){
															  foreach($all_ceo as $ceo){
														  ?>
														  <option value="<?php echo $ceo->id;?>" id="<?php echo $ceo->name;?>"><?php echo $ceo->name;?></option>
														 <?php
															}
														  }
														  ?>
														  <?php if(!empty($all_director)){
															  foreach($all_director as $ceo){
														  ?>
														  <option value="<?php echo $ceo->id;?>" id="<?php echo $ceo->name;?>"><?php echo $ceo->name;?></option>
														 <?php
															}
														  }
														  ?>
														</select>
														<select class="form-control" id="director_id0" name="commitee_members[0][director_id]" required="required" data-validation-required-message="Please select director name.">
														  <option value="">Select Committee Member Name</option>
														  <?php if(!empty($all_ceo)){
															  foreach($all_ceo as $ceo){															  
														  ?>
														  <option value="<?php echo $ceo->id;?>" id="<?php echo $ceo->name;?>" ><?php echo $ceo->name;?></option>
														 <?php
															}
														  }
														  ?>
														  <?php if(!empty($all_director)){
															  foreach($all_director as $ceo){															  
														  ?>
														  <option value="<?php echo $ceo->id;?>" id="<?php echo $ceo->name;?>" ><?php echo $ceo->name;?></option>
														 <?php
															}
														  }
														  ?>
														</select>
														  <div class="help-block with-errors text-danger"></div>
														   <!--<p class="help-block text-danger"></p>-->
                                                        </td>  
														<td width="30%">
														<select class="form-control" id="member_duration0" name="commitee_members[0][member_duration]" required data-validation-required-message="Select duration of member">
															  <option value="">Select Duration of Member</option>
															  <option value="1">6 Months</option>
															  <option value="2">7 Months</option>
															  <option value="3">8 Months</option>
															  <option value="4">9 Months</option>
															  <option value="5">10 Months</option>
															  <option value="6">11 Months</option>
															  <option value="7">12 Months</option>
															  <option value="8">2 Years</option>
															  <option value="9">3 Years</option>
															  <option value="10">4 Years</option>
															  <option value="11">5 Years</option>
													    </select>														
														</td>
														<td width="10%" class="text-center">
														<input type="checkbox" name="commitee_members[0][is_ceo]" readonly id="is_ceo0" value="1">
														</td>
														<td width="20%">
															<button type="button" name="remove" id="remove_0" class="btn btn-danger btn_remove del">-</button>
                                                            <button type="button" name="add" id="add_0" class="btn btn-success btn_add">+</button>
                                                        </td>  
													</tr>										
													</tbody>
												</table>  
											</div>											
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" disabled class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<a href="<?php echo base_url('fpo/operation/committeelist'); ?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
										  </div>											 
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script> 
$(document).ready(function() {
	var i=0;
	var j=0;
	$(document).on('click', '.btn_add', function(){ 		
	//validate condition
		var validate = true;
		$('#dynamic_field').find('tr select[id="director_id'+i+'"], tr select[id="member_duration'+i+'"],tr input[id="is_ceo'+i+'"]').each(function(){			
			if($(this).val() == ""){
				validate = false;
			}
		});
	//select 
	$('#dynamic_field').on('change','select', function () {
		var row = $(this).closest('tr');		
		$('select[id="committee_member'+i+'"]', row).each(function() {
			document.getElementById('director_id'+i+'').value= $(this).val();
		});
	});	

	//validate check
	if(validate){
		document.getElementById("sendMessageButton").disabled =false;
		document.getElementById('director_id'+i+'').setAttribute("readonly", "true");		
		document.getElementById('member_duration'+i+'').setAttribute("readonly", "true");		
		j=i;   
		i++;			
		var selecter_dir = $('#director_id'+j).prop('selectedIndex');
		var ceo_selected = $('#hidden_dirs option:eq(' + selecter_dir + ')').attr("id");  		
		
		if(ceo_selected.indexOf("-")>0){
			$('#is_ceo'+j).prop("checked", true);
		}else{
			$('#is_ceo'+j).prop("checked", false);
		}
		
		$('#hidden_dirs option:eq(' + selecter_dir + ')').remove();
		var strDirectors = $('#hidden_dirs').html();
		//alert(strDirectors); 				
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" id="director_id'+i+'" name="commitee_members['+i+'][director_id]" data-validation-required-message="Please select item description.">'+ strDirectors +'</select><p class="help-block text-danger"></p></td><td><select class="form-control" id="member_duration'+i+'" name="commitee_members['+i+'][member_duration]" required data-validation-required-message="Select duration of member"><option value="">Select Duration of Member</option><option value="1">6 Months</option><option value="2">7 Months</option><option value="3">8 Months</option><option value="4">9 Months</option><option value="5">10 Months</option><option value="6">11 Months</option><option value="7">12 Months</option><option value="8">2 Years</option><option value="9">3 Years</option><option value="10">4 Years</option><option value="11">5 Years</option></select><p class="help-block text-danger"></p></td><td class="text-center"><input type="checkbox" id="is_ceo'+i+'" name="commitee_members['+i+'][is_ceo]" readonly value="1" ></td><td><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove del" style="display:none;">-</button><button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>');  
			$('#add_'+j).hide();
			$('#remove_'+j).show();
			return true;		
		}else{
			swal('',"Provide all the data");
			return false;
		}																																																											
	});
	
	$(document).on('click', '.del', function(){          		
      var row_id = $(this).attr("id").split("_");
		$('#row'+row_id[1]+'').remove();
			// deleterow(button_id);
	});  
});


</script>	 
</body>
</html>