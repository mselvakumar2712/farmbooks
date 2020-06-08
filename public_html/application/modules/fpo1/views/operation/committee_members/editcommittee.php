<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<?php 
$CI = get_instance();
    //$role_idByAccessRights = $CI->Role_Model->getAccessRightId($role_id, $module_id);
    //return $role_idByAccessRights['id'];
?>
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
                        <h1>Edit Committee Members</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/editcommittee');?>">Edit Committee Members</a></li>
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
                                              <input type="hidden" class="form-control" readonly value="<?php echo $committee_info[0]->id;?>" id="commitee_id" name="commitee_id">
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
															<th class="text-center">
															</th>
														</tr>
													</thead>
													<tbody>
                                          <select class="form-control d-none" id="hidden_dirs">
														  <option value="">Select Committee Member Name</option>
                                             <?php if(!empty($other_members)){
															  foreach($other_members as $this_member){															  
                                             ?>
                                             <option value="<?php echo $this_member->id;?>" id="<?php echo $this_member->name;?>"><?php echo $this_member->name;?></option>
                                             <?php
                                                }
                                             }
                                             ?>
														</select>
														<?php //print_r($committee_info);
														$k=0;
														for($i=0; $i<count($committee_info);$i++) { ?>														
														<tr id="row<?php echo $k;?>"> 
                                             <td width="30%">
                                                <input type="hidden" value="<?php echo $committee_info[$i]->director_id;?>" name="commitee_members[<?php echo $i; ?>][commitee_member_id]" id="director_id<?php echo $i; ?>">
                                                <input type="text" class="form-control" readonly value="<?php echo $committee_info[$i]->name;?>" name="commitee_members[<?php echo $i; ?>][commitee_member_id]" id="director_id1<?php echo $i; ?>">                 
                                             </td>  
                                             <td width="30%">
                                             <select class="form-control" id="member_duration<?php echo $i; ?>" name="commitee_members[<?php echo $i; ?>][member_duration]" required data-validation-required-message="Select duration of member">
                                                  <option value="1"  <?php if($committee_info[$i]->member_duration == 1) { echo 'selected="selected"'; } ?> >6 Months</option>
                                                  <option value="2"  <?php if($committee_info[$i]->member_duration == 2) { echo 'selected="selected"'; } ?>>7 Months</option>
                                                  <option value="3"  <?php if($committee_info[$i]->member_duration == 3) { echo 'selected="selected"'; } ?>>8 Months</option>
                                                  <option value="4"  <?php if($committee_info[$i]->member_duration == 4) { echo 'selected="selected"'; } ?>>9 Months</option>
                                                  <option value="5"  <?php if($committee_info[$i]->member_duration == 5) { echo 'selected="selected"'; } ?>>10 Months</option>
                                                  <option value="6"  <?php if($committee_info[$i]->member_duration == 6) { echo 'selected="selected"'; } ?>>11 Months</option>
                                                  <option value="7"  <?php if($committee_info[$i]->member_duration == 7) { echo 'selected="selected"'; } ?>>12 Months</option>
                                                  <option value="8"  <?php if($committee_info[$i]->member_duration == 8) { echo 'selected="selected"'; } ?>>2 Years</option>
                                                  <option value="9"  <?php if($committee_info[$i]->member_duration == 9) { echo 'selected="selected"'; } ?>>3 Years</option>
                                                  <option value="10" <?php if($committee_info[$i]->member_duration == 10) { echo 'selected="selected"'; } ?>>4 Years</option>
                                                  <option value="11" <?php if($committee_info[$i]->member_duration == 11) { echo 'selected="selected"'; } ?>>5 Years</option>
                                              </select>
                                             </td>
                                             <td class="text-center">
                                                <input type="checkbox" name="commitee_members[<?php echo $i; ?>][is_ceo]" readonly id="is_ceo<?php echo $i; ?>" value="1" <?php if($committee_info[$i]->is_ceo == 1) { ?> checked <?php } ?> style="visibility: visible;">
                                             </td>
                                             <td width="20%">
                                                <button type="button" name="remove" id="remove_<?php echo $i;?>" class="btn btn-danger del" <?php if($i == (count($committee_info)-1)) { ?>style="display:none;"<?php } ?>>-</button>
                                                <button type="button" name="add" id="add_<?php echo $i;?>" class="btn btn-success btn_add" <?php if($i != (count($committee_info)-1)) { ?>style="display:none;"<?php } ?>>+</button>
                                             </td>
														</tr>
													<?php $k++;} ?>														
																			
													</tbody>
												</table>  
											</div>
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"> <i class="fa fa-check-circle"></i> Update</button>
											<a href="<?php echo base_url('fpo/operation/committeelist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
		var i="<?php echo count($committee_info)-1; ?>";  	
		/* var selecter_dir = $('#director_id'+j).prop('selectedIndex');
		var ceo_selected = $('#hidden_dirs option:eq(' + selecter_dir + ')').attr("id");		
		$('#hidden_dirs option:eq(' + selecter_dir + ')').remove();	 		
			if(ceo_selected.indexOf("-")>0){
				$('#is_ceo'+j).prop("checked", true);
			}else{
				$('#is_ceo'+j).prop("checked", false);
			}
			//var selecter_dir = $('#director_id'+j).prop('selectedIndex');
			//$('#hidden_dirs option:eq(' + selecter_dir + ')').remove();
			
			
			var strDirectors = $('#hidden_dirs').html();
			 */
		$('#dynamic_field').on('click', '.btn_add',function(){ 		
		   var validate = true;
			$('#dynamic_field').find('tr select').each(function(){	
            if($(this).val() == ""){
               validate = false;
            }
			});
         //select 
         $('#dynamic_field').on('change','select', function () {
            var row = $(this).closest('tr');			
               $('select[id="committee_member'+i+'"]', row).each(function() {
            });
         });	
         if(validate){
            j=i;
            i++;
            document.getElementById("sendMessageButton").disabled =false;
            document.getElementById('director_id'+j+'').setAttribute("readonly", "true");		
            document.getElementById('member_duration'+j+'').setAttribute("readonly", "true");
            var ex_dirs = '<?php echo count($committee_info);?>';
            if(i > ex_dirs){
               var selecter_dir = $('#director_id'+j).prop('selectedIndex');
               var ceo_selected = $('#hidden_dirs option:eq(' + selecter_dir + ')').attr("id");  		
               
               if(ceo_selected.indexOf("-")>0){
                  $('#is_ceo'+j).prop("checked", true);
               }else{
                  $('#is_ceo'+j).prop("checked", false);
               }
               $('#hidden_dirs option:eq(' + selecter_dir + ')').remove();
            }
            
            var strDirectors = $('#hidden_dirs').html();
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" id="director_id'+i+'" name="commitee_members['+i+'][director_id]" data-validation-required-message="Please select item description.">'+ strDirectors +'</select><p class="help-block text-danger"></p></td><td><select class="form-control" id="member_duration'+i+'" name="commitee_members['+i+'][member_duration]" required data-validation-required-message="Select duration of member"><option value="">Select Duration of Member</option><option value="1">6 Months</option><option value="2">7 Months</option><option value="3">8 Months</option><option value="4">9 Months</option><option value="5">10 Months</option><option value="6">11 Months</option><option value="7">12 Months</option><option value="8">2 Years</option><option value="9">3 Years</option><option value="10">4 Years</option><option value="11">5 Years</option></select><p class="help-block text-danger"></p></td><td class="text-center"><input type="checkbox" id="is_ceo'+i+'" name="commitee_members['+i+'][is_ceo]" readonly value="1"></td><td><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove" >-</button>&nbsp;<button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>');  
            //$('#director_id'+i).html(strOptions);			
            $('#add_'+(i-1)).hide();
            $('#remove_'+(i)).hide();			
            $('#remove_'+j).show();
            
            return true;// you can submit form or send ajax or whatever you want here
			}else{
            swal('',"Provide all the data");
            return false;
			}																																																											
		});
		$(document).on('click', '.del', function(){           	
         var row_id = $(this).attr("id").split("_");
         var delete_committee = $('#commitee_id').val();
         var delete_director = $(this).parents('tr').find('input[id="director_id'+row_id[1]+'"]').val();
         var is_ceo = $(this).parents('tr').find('input[id="is_ceo'+row_id[1]+'"]').is(":checked");
         if(is_ceo == true)
            is_ceo = 1;
         else
            is_ceo = 0;
         deleterow(delete_committee,delete_director,is_ceo);
         //alert(delete_committee);
         //$('#row_'+row_id[1]+'').remove();
         // deleterow(button_id);
		});  
	});

//for delete

function deleterow(delete_committee,delete_director,is_ceo) {
	var director_id = delete_director;
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
		  url: "<?php echo base_url();?>fpo/operation/deletecommittee/"+delete_committee+"/"+director_id+"/"+is_ceo,
		  type: "POST",
		  data: {
			 this_delete: director_id,
		  },
		  cache: false,
		  success: function() {        
			 setTimeout(function() {
				 return true;
			  window.location.replace("<?php echo base_url('fpo/operation/committeelist')?>");
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
		swal("Cancelled", "You have cancelled committee member from delete action", "info");
		return false;
	 }
  });
}
</script>	 
</body>
</html>