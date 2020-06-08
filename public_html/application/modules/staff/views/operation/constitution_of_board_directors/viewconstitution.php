<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$due_dates = explode(',', $constitution_info['due_dates']);
//print_r($constitution_date);
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
                        <h1>View Constitution of Board of Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/viewconstitution/'.$constitution_info['id']);?>">View Constitution of Board of Directors</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/update_constitution/'.$constitution_info['id'])?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				   <input type="hidden" value="<?php echo $constitution_info['id'];?>" name="constitution_id" id="constitution_id">

					<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													<div class="form-group col-md-4">
														<label for="">Constitution Date <span class="text-danger">*</span></label>
														<input type="date" class="form-control" readonly min="<?php echo date("Y-m-d"); ?>" max="2050-12-31" value="<?php echo $constitution_info['constitution_date']; ?>"  id="constitution_date" name="constitution_date" required="required" data-validation-required-message="Please enter date.">
														<p class="help-block text-danger"></p>
													</div>			
													  <div class="form-group col-md-4">
														<label for="">Minimum Number of Meetings in a Year <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" readonly maxlength="2" id="min_meetings_per_year" value="<?php echo $constitution_info['min_meetings_per_year']; ?>" min="4" max="12" name="min_meetings_per_year" placeholder="Minimum Number of Meetings in a Year" required="required" data-validation-required-message="Please enter minimum number of meetings.">
													    <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  mt-4" id="default">
												<?php $due_dates = explode(',', $constitution_info['due_dates']);
													foreach($due_dates as $date)
													{?> <div class="form-group col-md-3">
															 <input type="date" class="form-control numberOnly" readonly value="<?php echo $date;?>" max="<?php echo date("Y-m-d",strtotime("+12 months")); ?>" id="due_dates" name="due_dates[]">
													</div>
												<?php }?>												
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
																	foreach($constitution_date as $row): $k++;?>
																	<input type="hidden" value="<?php echo $row->id;?>" name="constitution_date_id[]" id="constitution_date_id">

																	<input type="hidden" class="form-control" id="director_id" value="<?php echo $row->id;?>" name="director_id[]" required="required" placeholder="Director Sitting Fees" data-validation-required-message="Please enter director sitting fees.">
																		<tr id="constitution_<?php echo $k;?>">
																			<td><?php echo $row->name;?></td>
																			<td>																	
																			<input type="text" class="form-control numberOnly" readonly id="director_sitting_fee" maxlength="5" value="<?php echo $row->director_sitting_fee;?>" name="director_sitting_fee[]" required="required" placeholder="Director Sitting Fees" data-validation-required-message="Please enter director sitting fees.">
																		     <p class="help-block text-danger"></p>
																			</td>
																			<td>
																			<input type="text" class="form-control numberOnly" readonly maxlength="5" id="director_allowance" value="<?php echo $row->director_allowance;?>" name="director_allowance[]" required="required" placeholder="Allowance to Directors" data-validation-required-message="Please enter allowance.">
																			 <p class="help-block text-danger"></p>
																			</td>
																			<td>
																			<input type="date" class="form-control" id="sitting_fee_from"  readonly name="sitting_fee_from[]" value="<?php echo $row->sitting_fee_from;?>" required="required" data-validation-required-message="Please enter from date.">
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
										<div class="col-md-12 text-center">
											<a href="<?php echo base_url('staff/operation/editconstitution/'.$constitution_info['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>
											<a href="<?php echo base_url('staff/operation/constitutionlist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
	
//var director_sitting = "<?php echo $constitution_info['director_sitting_fee'];?>";

//console.log(director_sitting);

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

$('#min_meetings_per_year').on('change', function() { 
	$('#default').hide();
	$('#default').remove();
	$('#newFields').show(); 
});	
	

$(function() {
	
var input = $('<div class="form-group col-md-3"><input type="date" class="form-control" id="due_date" name="due_date1" required="required" max="2050-12-31" data-validation-required-message="Please enter due date."></div>');
var newFields = $('');
   $('#min_meetings_per_year').bind('blur keyup change', function() {
        var n = this.value || 0;
        if (n+1) {
            if (n > newFields.length) {
                addFields(n);
            } else {
                removeFields(n);
            }
        }
    });
	
    function addFields(n) {	
        j=0;	
        for (i = newFields.length; i < n; i++) {
		j++;
            var newInput = $('<div class="form-group col-md-3"><input type="date" class="form-control" id="due_date'+j+'" name="due_date[]'+j+'" required="required" max="2050-12-31" data-validation-required-message="Please enter due date."></div>').clone();
            newFields = newFields.add(newInput);
            newInput.appendTo('#newFields');
        }		
    }
    function removeFields(n) {
        var removeField = newFields.slice(n).remove();
        newFields = newFields.not(removeField);
    }
});
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


/* $("#sendMessageButton").click(function() {
  var startDt=document.getElementById("from_date").value;
  var endDt=document.getElementById("to_date").value;
  if(startDt && endDt){
  if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
  {
    $("#validate_date").html("Selected date should be LATER than To Date");
    return false;
  }
  }
  var startDt=document.getElementById("allowance_from_date").value;
  var endDt=document.getElementById("allowance_to_date").value;
  if(startDt && endDt){
  if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
  {
    $("#applicable_dates").html("Selected date should be LATER than GST Applicable from");
    return false;
  }
  }  
}); 

function calculatedate (appointment_date) {
	var dtToday = new Date();
	
	
	var month = dtToday.getMonth();
	var date = dtToday.getDate();
	var yyyy = dtToday.getFullYear();
	
	
	var max_Date = yyyy+'-'+0+(month+1)+'-'+date;
	
	//alert(max_Date);
    document.getElementById("due_date1").value = max_Date;	
	$("#due_date1").focus();
	event.preventDefault(); 
}*/
</script>	 
</body>
</html>