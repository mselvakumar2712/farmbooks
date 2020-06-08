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
                        <h1>View Committee Members</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/viewcommittee');?>">View Committee Members</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/update_committee/'.$committee_info[0]->id)?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-6">
														  <label for="">Formation Date <span class="text-danger">*</span></label>
															 <input type="date" class="form-control" readonly value="<?php echo $committee_info[0]->commitee_date;?>" id="commitee_date" name="commitee_date" required="required" data-validation-required-message="Please enter date.">
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-6">
														<label for="">Name of the Committee <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly maxlength="50" value="<?php echo $committee_info[0]->commitee_name;?>" id="commitee_name" name="commitee_name"  placeholder="Name of the committee" required="required" data-validation-required-message="Please enter committee name.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
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
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($committee_info as $commitee_member) { ?>														
													<tr id="sample"> 
														<td width="45%">
														<select class="form-control" readonly  required="required" data-validation-required-message="Please select director name.">
														  <option value="<?php echo $commitee_member->id;?>"  ><?php echo $commitee_member->name;?></option>
														</select>													
                                          </td>  
														<td width="40%">
														<select class="form-control" id="member_duration0" readonly name="commitee_members[<?php echo $i; ?>][member_duration]" required data-validation-required-message="Select duration of member">
															  <option value="">Select Duration of Member</option>
															  <option value="1"  <?php if($commitee_member->member_duration == 1) { echo 'selected="selected"'; } ?> >6 Months</option>
															  <option value="2"  <?php if($commitee_member->member_duration == 2) { echo 'selected="selected"'; } ?>>7 Months</option>
															  <option value="3"  <?php if($commitee_member->member_duration == 3) { echo 'selected="selected"'; } ?>>8 Months</option>
															  <option value="4"  <?php if($commitee_member->member_duration == 4) { echo 'selected="selected"'; } ?>>9 Months</option>
															  <option value="5"  <?php if($commitee_member->member_duration == 5) { echo 'selected="selected"'; } ?>>10 Months</option>
															  <option value="6"  <?php if($commitee_member->member_duration == 6) { echo 'selected="selected"'; } ?>>11 Months</option>
															  <option value="7"  <?php if($commitee_member->member_duration == 7) { echo 'selected="selected"'; } ?>>12 Months</option>
															  <option value="8"  <?php if($commitee_member->member_duration == 8) { echo 'selected="selected"'; } ?>>2 Years</option>
															  <option value="9"  <?php if($commitee_member->member_duration == 9) { echo 'selected="selected"'; } ?>>3 Years</option>
															  <option value="10" <?php if($commitee_member->member_duration == 10) { echo 'selected="selected"'; } ?>>4 Years</option>
															  <option value="11" <?php if($commitee_member->member_duration == 11) { echo 'selected="selected"'; } ?>>5 Years</option>
													    </select>
														</td>
                                          <td width="15%" class="text-center"><?php echo ($commitee_member->is_ceo == 1)?'Yes':'No'; ?> </td>
													</tr>
													<?php } ?>			
													</tbody>
												</table>  
											</div>
										<div class="col-md-12 text-center">
										  <a href="<?php echo base_url('fpo/operation/editcommittee/'.$committee_info[0]->id);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>
										  <a href="<?php echo base_url('fpo/operation/committeelist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
	var j=0;
		var i="<?php echo $i; ?>";  
		
		var selecter_dir = $('#director_id'+j).prop('selectedIndex');
			var ceo_selected = $('#hidden_dirs option:eq(' + selecter_dir + ')').attr("id");  		
			//alert(selecter_dir);
			if(ceo_selected.indexOf("-")>0){
				$('#is_ceo'+j).prop("checked", true);
			}else{
				$('#is_ceo'+j).prop("checked", false);
			}
			
			$('#hidden_dirs option:eq(' + selecter_dir + ')').remove();
			var strDirectors = $('#hidden_dirs').html();
			
		$('#dynamic_field').on('click', '.btn_add',function(){ 		
//alert(i);		
		    var validate = true;
			$('#dynamic_field').find('tr select').each(function(){	
			if($(this).val() == ""){
				//validate = false;
			}
			});
	 	//select 
		$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');			
			$('select[id="committee_member'+i+'"]', row).each(function() {
			});
		});	
		if(validate){
			j=(i-1);
			
			
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" id="director_id'+i+'" name="director_id[]" data-validation-required-message="Please select item description.">'+ strDirectors +'</select><p class="help-block text-danger"></p></td><td><select class="form-control" id="member_duration'+i+'" name="member_duration[]" required data-validation-required-message="Select duration of member"><option value="">Select Duration of Member</option><option value="1">6 Months</option><option value="2">7 Months</option><option value="3">8 Months</option><option value="4">9 Months</option><option value="5">10 Months</option<option value="6">11 Months</option><option value="7">12 Months</option><option value="8">2 Years</option><option value="9">3 Years</option><option value="10">4 Years</option><option value="11">5 Years</option></select><p class="help-block text-danger"></p></td></tr>');  
			
			//$('#director_id'+i).html(strOptions);
			
			$('#add_'+(i-1)).hide();			
			//$('#remove_'+j).show();
			i++;
			return true;// you can submit form or send ajax or whatever you want here
			}else{
			swal('',"Provide all the data");
			return false;
			}																																																											
		});
		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  
	});
</script>	 
</body>
</html>