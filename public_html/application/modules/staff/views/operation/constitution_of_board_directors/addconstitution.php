<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>"; print_r($all_director);
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
                        <h1>Add Constitution of Board of Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/addconstitution');?>">Add Constitution of Board of Directors</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/post_constitution')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													<div class="form-group col-md-4">
														<label for="">Constitution Date <span class="text-danger">*</span></label>
														<input type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" max="2050-12-31" value="<?php echo date("Y-m-d"); ?>"  id="constitution_date" name="constitution_date" required="required" data-validation-required-message="Please enter date.">
														<p class="help-block text-danger"></p>
													</div>			
													  <div class="form-group col-md-4">
														<label for="">Minimum Number of Meetings in a Year <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" maxlength="2" id="min_meetings_per_year" value="4" min="4" max="12" name="min_meetings_per_year" placeholder="Minimum Number of Meetings in a Year" required="required" data-validation-required-message="Please enter minimum number of meetings.">
													    <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  mt-4" id="default">													
													  <div class="form-group col-md-3">
														 <input type="date" readonly value="<?php echo $month;?>" class="form-control numberOnly" id="due_dates" name="due_dates[]">
													  </div>
													  <div class="form-group col-md-3">
														 <input type="date" class="form-control" readonly  value="<?php echo $next_month;?>" id="due_dates" name="due_dates[]">
													</div>
													<div class="form-group col-md-3">
														 <input type="date" class="form-control" value="<?php echo $next_month1;?>" readonly id="due_dates" name="due_dates[]">
													 </div>
													 <div class="form-group col-md-3">
														 <input type="date" class="form-control numberOnly" readonly value="<?php echo $next_month2;?>" id="due_dates" name="due_dates[]">
													 </div>
												</div>
												<div class="row row-space  mt-4" id="newFields"></div>												
												<div class="row row-space  mt-4" >
												<div class="col-md-12">
													<table id="example" class="table table-striped table-bordered">
															<thead>
															<tr>
															<th width="20%">Member Name</th>
															<th width="20%">Director Sitting Fees</th>
															<th width="20%">Allowance to Directors</th>
															<th width="20%">From Date</th>
															</tr>
															</thead>
																<tbody id="div1">	
																
																	<?php $k=0;
																	foreach($all_director as $row): $k++;?>
																	<input type="hidden" class="form-control" id="director_id" value="<?php echo $row->id;?>" name="director_id[]" required="required" placeholder="Director Sitting Fees" data-validation-required-message="Please enter director sitting fees.">

																		<tr id="constitution_<?php echo $k;?>">
																			<td><?php echo $row->name;?></td>
																			<td>																		
																			<input type="text" class="form-control numberOnly" id="director_sitting_fee" maxlength="5"  name="director_sitting_fee[]" required="required" placeholder="Director Sitting Fees" data-validation-required-message="Please enter director sitting fees.">
																		     <p class="help-block text-danger"></p>
																			</td>
																			<td>
																			<input type="text" class="form-control numberOnly" maxlength="5" id="director_allowance" name="director_allowance[]" required="required" placeholder="Allowance to Directors" data-validation-required-message="Please enter allowance.">
																			 <p class="help-block text-danger"></p>
																			</td>
																			<td>
																			<input type="date" class="form-control" id="sitting_fee_from" name="sitting_fee_from[]" value="<?php echo date("Y-m-d"); ?>" required="required" data-validation-required-message="Please enter from date.">
																			 <p class="help-block text-danger"></p>
																			</td>
																	   <?php ?>
																	  
																	</tr>
																	<?php endforeach; ?>
																</tbody>					
														  </table>	
													</div>							
												</div>
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<a href="<?php echo base_url('staff/operation/constitutionlist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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

function fnDueDates(id) {
   var strDate = $('#due_dates'+id).val();
   var next = id + 1;
   $('#due_dates'+next).attr('min', strDate);
}

$(document).ready(function() {
	$(document).on('click', '#sendMessageButton', function(){ 
		var validate = true;
		$('#div1').find('input[type=text]').each(function(){
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
			return true;
		}
		else {
			swal('',"Provide all the data");
			return false;
		}
		
	});

   var sitting_fee_count = 0;
   $('#director_sitting_fee').change(function() {
      if(sitting_fee_count == 0){		
         $('input[name="director_sitting_fee[]"]').val($(this).val());
         sitting_fee_count=1;
      }
   });

   var director_allowance_count = 0;
   $('#director_allowance').change(function() {
      if(director_allowance_count == 0){		
         $('input[name="director_allowance[]"]').val($(this).val());
         director_allowance_count=1;
      }
   });

   var fee_from_count = 0;
   $('#sitting_fee_from').change(function() {
      if(fee_from_count == 0){
         $('input[name="sitting_fee_from[]"]').val($(this).val());
         fee_from_count=1;
      }
   });
}); 

$(function() {	
   //var input = $('<div class="form-group col-md-3"><input type="date" class="form-control" id="due_dates" name="due_dates[]" required="required" max="2050-12-31" data-validation-required-message="Please enter due date."></div>');
   var newFields = $('');
   $('#min_meetings_per_year').bind('blur keyup change', function() {
      var n = this.value || 0; 
      if (n >= 4) {
         $('#default').remove();	
         if (n > newFields.length) {
            addFields(n);
         } else {
            removeFields(n);
         }
         $('#newFields').show();
         $('#due_dates1').focus();         
      }else{
         swal('','Minimum 4');
		 this.value = 4;
		 $('#default').show();
      }
   });
	
   function addFields(n) {	
      var j=0;	
      for (var i = newFields.length; i < n; i++) {
         j++;
         var newInput = $('<div class="form-group col-md-3"><input type="date" class="form-control" id="due_dates'+j+'" name="due_dates[]" onChange="fnDueDates('+j+')" required="required" max="2050-12-31" data-validation-required-message="Please enter due date."></div>').clone();
         newFields = newFields.add(newInput);
         newInput.appendTo('#newFields');
      }
 
   }
  
    function removeFields(n) {
        var removeField = newFields.slice(n).remove();
        newFields = newFields.not(removeField);
    }

});

$(function(){
      var dtToday = new Date();    
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      
      var maxDate = year + '-' + month + '-' + day;
      $('#due_dates').attr('max', maxDate);
	  $('#sitting_fee_from').attr('max', maxDate);		
});
</script>	 
</body>
</html>