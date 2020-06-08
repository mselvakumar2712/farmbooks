<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
#remove_1 {
	display: none;
}
.seAddBtn {
	float: left;
	margin-left: 10px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    border-color: green ! important;
    display: block;  
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
                        <h1>Inventory Location Transfer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a href="#"class="active">Inventory Location Transfer</a></li>
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
			<form  action="<?php echo base_url('fpo/inventory/post_locationtransfer')?>" id="inventorylocation"  method="post"  name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid"> 
											<div class="container-fluid">                                            
											<div class="row ">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Date <span class="text-danger">*</span></label>
													<input  class="form-control" value="<?php echo date('Y-m-j'); ?>" type="date" id="date_adjust" name="date_adjust" required="required"  data-validation-required-message="Please select date.">		
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Day </label>
													<input class="form-control" type="text" id="day_adjust" name="day_adjust" readonly>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">From Location <span class="text-danger">*</span></label>
													<select  class="form-control" id="from_loc" name="from_loc" required="required"  style="width:100%" data-validation-required-message="Please select from location.">
														<option value="">Select From Location</option>
														<?php for($i=0; $i<count($location);$i++) { ?>										
														<option value="<?php echo $location[$i]->id; ?>"><?php echo $location[$i]->name; ?></option>
														<?php } ?>																		
													</select>
													<p class="help-block text-danger"></p>		
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Reference <span class="text-danger">*</span></label>
													<input  class="form-control " type="text" maxlength="15" id="ref" name="ref"required="required"  data-validation-required-message="Please enter reference." >
													<p class="help-block text-danger"></p>
											   </div>
											</div>
											<div class="row">																							
											<div class="form-group col-md-3">
													<label for="inputAddress2">Transfer Type <span class="text-danger">*</span></label>
													<select  class="form-control" id="type"  name="type" required="required" data-validation-required-message="Please select type.">
														<option value="">Select Type</option>
														<?php for($i=0; $i<count($trans_type);$i++) { ?>										
														<option value="<?php echo $trans_type[$i]->id; ?>"><?php echo $trans_type[$i]->name; ?></option>
														<?php } ?>
													</select>
														<p class="help-block text-danger"></p>
											</div>												
											<div class="form-group col-md-4">
													<label for="inputAddress2">To Location  <span class="text-danger">*</span></label>
													<select  class="form-control" id="to_loc" name="to_loc" required="required"  style="width:100%" data-validation-required-message="Please select to location.">
														<option value="">Select To Location</option>
														<?php for($i=0; $i<count($location);$i++) { ?>										
														<option value="<?php echo $location[$i]->id; ?>"><?php echo $location[$i]->name; ?></option>
														<?php } ?>																		
													</select>
													<p class="help-block text-danger"></p>
												</div>							
											</div>
											</div>
											<div class="table-responsive mt-3">  
												<table class="table table-bordered low-padded" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Item Description
															</th>
															<th class="text-center">
															   Qty
															</th>
															<th class="text-center">
															   UOM
															</th>															
															<th class="text-center">
															  
															</th>															
														</tr>
													</thead>
													<tbody>
													<tr id="row1">  
														<td width="50%">
                                             <input type="hidden" name="item_code[]" id="item_code1" class="form-control name_list numberOnly" readonly />
                                             <select  class="form-control" id="item_description1"  name="item_description[]" required="required" data-validation-required-message="Please select item description.">
                                                <option value="">Description </option>
                                                <?php for($i=0; $i<count($product_fpo);$i++) { ?>										
                                                <option value="<?php echo $product_fpo[$i]->id; ?>"><?php echo $product_fpo[$i]->product_name." - ".$product_fpo[$i]->classification; ?></option>
                                                <?php } ?>															
                                             </select>
                                          </td>
														<td width="20%"><input type="text" name="qty[]"  id="qty1" maxlength="6" class="form-control numberOnly  name_list text-right" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><select  class="form-control" id="unit1"  name="unit[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">UOM </option>
															<?php for($i=0; $i<count($unit);$i++) { ?>										
															<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->short_name; ?></option>
															<?php } ?>															
														</select><p class=" text-center" ></p></td> 
														<td width="10%" class="text-center"><button type="button" id="add_1" class="btn btn-success btn_add">+</button>
                                                <button type="button" id="remove_1" class="btn btn-danger btn_remove">-</button>
                                          </td>  
													</tr>													
													</tbody>
												</table>  
											</div>
											<div class="row ">
												<div class="form-group col-md-3">
												</div>	
												<div class="form-group col-md-6">
													<label for="inputAddress2">Memo</label>
													<textarea class="form-control " name="memo" id="memo"></textarea>
												</div>
												<div class="form-group col-md-3">
												</div>		
											</div>
											<div class="form-row">
											  <div class="form-group col-md-12 text-center">
												<div id="success"></div>
												<!--<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">-->
												<!--<input  id="sendMessageButton"  value="Process Transfer"  class="btn btn-success text-center" type="submit" disabled>-->
												<button  id="sendMessageButton" align="center" name="general_submit" class="btn btn-success text-center" type="submit" disabled><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
										        <!--<button   align="center" id="update" name="update" class="btn btn-success text-center"  type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>-->
										        <a href="" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
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
	<script src="<?php echo asset_url()?>js/select2.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
	  $('#from_loc').select2();
	  $('#to_loc').select2();
	});
	$(document).ready(function() {
		
		$('#dynamic_field').on('change', 'input, select', function () {
			document.getElementById("sendMessageButton").disabled =true;
		});
		
		$('#dynamic_field').on('keyup', 'input, select', function () {
			document.getElementById("sendMessageButton").disabled =true;
		
		});
		
		$('#dynamic_field').on('click', 'input, select', function () {
			document.getElementById("sendMessageButton").disabled =true;
			
	
		});
		
		$('#dynamic_field').on('change', 'input, select', function () {
			var from_loc=document.getElementById("from_loc").value;
			var to_loc=document.getElementById("to_loc").value;
			
			if(from_loc == ""){
				$(this).val('');
				swal('',"Please select from location");
			}else if(to_loc == ""){
				$(this).val('');
				swal('',"Please select to location");
			}
			
			var item=$(this).parents('tr').find('select[name="item_description[]"]').val();
		
			if(item == ""){
				$(this).val('');
				swal('',"Please select item description");
			}
			
		});
		
		$('#dynamic_field').on('keyup', 'input, select', function () {
			var from_loc=document.getElementById("from_loc").value;
			var to_loc=document.getElementById("to_loc").value;
			
			if(from_loc == ""){
				$(this).val('');
				swal('',"Please select from location");
			}else if(to_loc == ""){
				$(this).val('');
				swal('',"Please select to location");
			}
			
			var item=$(this).parents('tr').find('select[name="item_description[]"]').val();
		
			if(item == ""){
				$(this).val('');
				swal('',"Please select item description");
			}
			
		});
		
		$('#dynamic_field').on('click', 'input, select', function () {
			var from_loc=document.getElementById("from_loc").value;
			var to_loc=document.getElementById("to_loc").value;
			
			if(from_loc == ""){
				$(this).val('');
				swal('',"Please select from location");
			}else if(to_loc == ""){
				$(this).val('');
				swal('',"Please select to location");
			}
			
		});

		
		
		$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');
			
			$('select[id="item_description1"]', row).each(function() {
				document.getElementById("item_code1").value= $(this).val();
				document.getElementById("sendMessageButton").disabled =true;
			});
		});
		$('#dynamic_field').on('change', 'tr input[name="qty[]"]', function () {
			var from_loc=document.getElementById("from_loc").value;
			var str = $(this).attr('id');
			var qty = +$(this).val();
			var item_code = +$(this).parents('tr').find('input[name="item_code[]"]').val();
			if(from_loc == ""){
				$(this).val('');
				swal('',"Please select from location");
			}else{
				
				   $.ajax({
					url:"<?php echo base_url();?>fpo/inventory/checkavailablequantity",
					type:"POST",
					data:{from_loc:from_loc,item_code:item_code},
					dataType:"html",
					cache:false,			
					success:function(response){		  
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray);
						if(responseArray.length == 0 ){
							$('#'+str+'').val('');
						    $('#'+str+'').focus();
						 swal({
							title: 'Stock is not avaliable',
							text: "Quantity is not available!",
							type: 'warning',
							showCancelButton: false,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'OK'
						   }).then((result) => {
							return false;
							 });   
	
						}else{	
					
							//console.log();
							var total_val = responseArray[0].total; 
							console.log(total_val);
							
							if( qty > total_val){ 							
							document.getElementById(""+str+"").value='';
							swal({
							title: 'Stock is not avaliable',
							text: "Quantity is greater than available stock quantity!",
							type: 'warning',
							showCancelButton: false,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'OK'
						   }).then((result) => {
							return false;
						    });  
							
							}
							
						}
					},
					error:function(response){
						alert('Error!!! Try again');
					} 
					
					}); 
			}	
			  
		});


		var i=1;  
		var j=1; 
		$(document).on('click', '.btn_add', function(){ 
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text],tr select').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
			});
			
		   if(validate){
			document.getElementById("sendMessageButton").disabled =false;
			document.getElementById('item_description'+i+'').setAttribute("readonly", "true");
			document.getElementById('qty'+i+'').setAttribute("readonly", "true");
			document.getElementById('unit'+i+'').setAttribute("readonly", "true");
            j=i;	
			i++;
			var str_add = '<tr id="row'+i+'" class="dynamic-added">';
			str_add += '<td width="50%">';
			str_add += '<input type="hidden" name="item_code[]" id="item_code'+i+'" class ="form-control name_list" readonly />';
			str_add += '<select  class="form-control" id="item_description'+i+'"  name="item_description[]" data-validation-required-message="Please select item description."><option value="">Description </option></select><p class="help-block text-danger"></p>';
			str_add += '</td>';
			str_add += '<td width="20%">';
			str_add += '<input type="text" id="qty'+i+'" name="qty[]" maxlength="6" class="form-control numberOnly  name_list text-right" required="" /><p class="help-block text-danger"></p>';
			str_add += '</td>';
			str_add += '<td width="20%">';
			str_add += '<select  class="form-control"  id="unit'+i+'"  name="unit[]" required="required" data-validation-required-message="Please Select unit."><option value="">UOM</option>/select>';
			str_add += '</td>';
			str_add += '<td width="10%"><button type="button" id="add_'+i+'" class="btn btn-success btn_add">+</button>';
			str_add += '<button type="button" id="remove_'+i+'" class="btn btn-danger btn_remove" style="display:none" class="btn btn-danger btn_remove">-</button>';
			str_add += '</td>'; 
			str_add += '</tr>';
			initnumberOnly();
			$('#dynamic_field').find('tbody tr[id="row'+j+'"]').after(str_add);
			$('#add_'+j).hide();
		    $('#remove_'+j).show();
			$("#item_description"+i+" option").remove() ;		
			$.ajax({
			url: '<?php echo base_url('fpo/inventory/getproducts')?>',
			type: "GET",
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Description</option>';	
				$.each(responsearr, function(key, value) {					
					div_data +="<option value="+value.id+">"+value.product_name+" - "+value.classification+"</option>";
				});
				$(div_data).appendTo('#item_description'+i+''); 	      
			}
			});
			$("#unit"+i+" option").remove() ;	
			$.ajax({
			url: '<?php echo base_url('fpo/inventory/getquantityunit')?>',
			type: "GET",
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_unit = '<option value="">UOM</option>';	
				$.each(responsearr, function(key, value) {					
					div_unit +="<option value="+value.id+">"+value.full_name+"</option>";
				});
				$(div_unit).appendTo('#unit'+i+''); 	      
			}
			});
			
			$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');
			
			$('select[id="item_description'+i+'"]', row).each(function() {
				document.getElementById('item_code'+i+'').value= $(this).val();
			});
			});
			
			}else{
				document.getElementById("sendMessageButton").disabled =true;
				swal('',"Provide all the data's");
				return false;

			}
		});


		$(document).on('click', '.btn_remove', function(){ 
			var arr = $(this).attr("id").split("_");
			$('#row'+arr[1]+'').remove();
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
			$('#date_adjust').attr('max', maxDate);
		});
		
		$('input[id="date_adjust"]').on('change', function(e){ 
			e.preventDefault();
			var dateval = "";
			if($(this).val()){
				dateval = $(this).val();
			} else {
				dateval = new Date().getDay();
			}            
			
			updatePaymentDay(dateval);      
		});
		
		var date_adjust=document.getElementById('date_adjust').value;
		
		if(date_adjust){
			
			updatePaymentDay(date_adjust);  
		}
		function updatePaymentDay(dateval) {
			var day="";
			switch(new Date(dateval).getDay()){
				case 0:
				  day = "Sunday";
				  break;
				case 1:
				  day = "Monday";
				  break;
				case 2:
				  day = "Tuesday";
				  break;
				case 3:
				  day = "Wednesday";
				  break;
				case 4:
				  day = "Thursday"
				  break;
				case 5:
				  day = "Friday";
				  break;
				case 6:
				  day = "Saturday";
				  break;
			}
			document.getElementById("day_adjust").value = day;
		} 
	});

</script>

</body>
</html>