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
                        <h1>Inventory Adjustments</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a href="#"class="active">Inventory Adjustments</a></li>
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
			<form  action="<?php echo base_url('fpo/inventory/post_locationadjusment')?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid"> 
											<div class="container-fluid">                                            
											<div class="row ">
											<div class="form-group col-md-3">
													<label for="inputAddress2">Date  <span class="text-danger">*</span></label>
													<input  class="form-control" value="<?php echo date('Y-m-j'); ?>"   type="date" id="date_adjust" name="date_adjust" required="required"  data-validation-required-message="Please select date.">		
													<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-2">
													<label for="inputAddress2">Day </label>
													<input class="form-control" type="text" id="day_adjust" name="day_adjust" readonly>
											</div>
											<div class="form-group col-md-4">
													<label for="inputAddress2">From Location  <span class="text-danger">*</span></label>
													<select  class="form-control" id="from_loc" name="from_loc" style="width:100%" required="required"  data-validation-required-message="Please select from location.">
														<option value="">Select From Location</option>
														<?php for($i=0; $i<count($location);$i++) { ?>										
														<option value="<?php echo $location[$i]->id; ?>"><?php echo $location[$i]->name; ?></option>
														<?php } ?>																		
													</select>
													<p class="help-block text-danger"></p>		
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Detail  <span class="text-danger">*</span></label>
													<select  class="form-control" id="detail"  name="detail" required="required" data-validation-required-message="Please select detail.">
														<option value="">Select Detail</option>
														<option value="1">Adjustment</option>
													</select>
														<p class="help-block text-danger"></p>		
												</div>	
												<p class="help-block text-danger"></p>						
											</div>
											<div class="row ">
											<div class="form-group col-md-3">
													<label for="inputAddress2">Invoice No <span class="text-danger">*</span></label>
													<input  class="form-control" type="text" maxlength="15" id="ref" name="ref" required="required" data-validation-required-message="Please enter reference.">		
													<p class="help-block text-danger"></p>	
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Type <span class="text-danger">*</span></label>
												<select  class="form-control" id="type"  name="type" required="required" data-validation-required-message="Please select type.">
													<option value="">Select Type</option>
													<option value="1">Positive Adjustment</option>
													<option value="2">Negative Adjustment</option>
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
															   Qty Exp.
															</th>
															<th class="text-center">
															   UOM
															</th>
															<th class="text-center">
															   Unit Price ( <span class="fa fa-inr"></span> )
															</th>
															<th class="text-center">
															   Total ( <span class="fa fa-inr"></span> )
															</th>														
															<th class="text-center">
															  
															</th>															
														</tr>
													</thead>
													<tbody>
													<tr id="row1">  
														<td width="30%">
                                             <input type="hidden" name="item_code[]" id="item_code1" class="form-control name_list numberOnly" readonly /> 
                                             <select  class="form-control" id="item_description1"  name="item_description[]" required="required" data-validation-required-message="Please select item description.">
                                                <option value="">Description </option>
                                                <?php for($i=0; $i<count($product_fpo);$i++) { ?>										
                                                <option value="<?php echo $product_fpo[$i]->id; ?>"><?php echo $product_fpo[$i]->product_name." - ".$product_fpo[$i]->classification; ?></option>
                                                <?php } ?>															
                                             </select>
                                          </td>
														<td width="15%"><input type="text" name="qty[]"  id="qty1" class="form-control  name_list numberOnly text-right" maxlength="6"/><p class="help-block text-danger"></p></td>  
														<td width="10%">
                                             <select  class="form-control pl-0" id="unit1" style="font-size:.79rem;" name="unit[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">UOM</option>
															<?php for($i=0; $i<count($unit);$i++) { ?>										
															<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->short_name; ?></option>
															<?php } ?>
                                             </select>
                                          </td>	
														<td width="15%"><input type="text" name="unit_cash[]"  id="unit_cash1" class="form-control  name_list numberOnly text-right" maxlength="6" /><p class="help-block text-danger"></p></td>  
														<td width="15%"><input type="text" name="line_total[]" id="line_total1" class="form-control  name_list numberOnly text-right" readonly /><p class="help-block text-danger"></p></td>  
														<td width="10%"><button type="button" id="add_1" class="btn btn-success btn_add">+</button>
																<button type="button" id="remove_1" class="btn btn-danger btn_remove">-</button>
														</td>  
													</tr>													
													</tbody>
													<tbody>
													<tr>
                                          <td colspan="4" class="text-right"> Sub Total ( <span class="fa fa-inr"></span> )</td>
														<td><input type="text" id="sub_total"  name="sub_total"  readonly class="form-control text-right"  /></td>
                                          <td></td>
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
											    <button  id="sendMessageButton" align="center" name="general_submit" class="btn btn-success text-center" type="submit" disabled><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
										        <!--<button   align="center" id="update" name="update" class="btn btn-success text-center"  type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>-->
										        <a href="" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
												<!--<input id="sendMessageButton" value="Process Adjustment" class="btn btn-success text-center" type="submit" disabled>-->
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
	$(document).ready(function() {
		$('#from_loc').select2();
	
		$('#dynamic_field').on('change', 'input, select', function () {
			document.getElementById("sendMessageButton").disabled =true;
		});
		
		$('#dynamic_field').on('keyup', 'input, select', function () {
			document.getElementById("sendMessageButton").disabled =true;
		
		});
		
		$('#dynamic_field').on('click', 'input, select', function () {
			document.getElementById("sendMessageButton").disabled =true;
			
	
		});
		
		   $('#dynamic_field').on('keyup','input', function(){
            var qty = +$(this).parents('tr').find('input[name="qty[]"]').val();
            var unit = +$(this).parents('tr').find('input[name="unit_cash[]"]').val();

            $(this).parents('tr').find('input[name="line_total[]"]').val(qty*unit);
            var totamt = 0 ;
            var theTbl = $('#dynamic_field');
            var trs = theTbl.find("input[name='line_total[]']");
            console.log("table length : "+trs.length);
            for(var i=0;i<trs.length;i++)
            {
                console.log("amount from row "+i+" = "+trs[i].value);
				totamt+=parseFloat(trs[i].value);
				document.getElementById("sub_total").value=totamt;
				
            }
        });
		
		function calculateGrandTotal() {
		var subTotal = 0;
		var grandTotal = 0;		
		var theTbl = $('#dynamic_field');
		var trs = theTbl.find("input[name='line_total[]']");
		for(var i=0; i<trs.length; i++) {
			subTotal += parseFloat(trs[i].value || 0);
		}
		subTotal = subTotal.toFixed(2);
		$('#sub_total').val(subTotal);
		
		}

		$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');
			
			$('select[id="item_description1"]', row).each(function() {
				document.getElementById("item_code1").value= $(this).val();

			});
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
			document.getElementById('unit_cash'+i+'').setAttribute("readonly", "true");
			j=i;	
			i++;
			var str_add = '<tr id="row'+i+'" class="dynamic-added">';
			str_add += '<td width="35%">';
			str_add += '<input type="hidden" name="item_code[]" id="item_code'+i+'" class ="form-control name_list" readonly />';
			str_add += '<select  class="form-control" id="item_description'+i+'"  name="item_description[]" data-validation-required-message="Please select item description."><option value="">Description </option></select><p class="help-block text-danger"></p>';
			str_add += '</td>';
			str_add += '<td width="10%">';
			str_add += '<input type="text" id="qty'+i+'" name="qty[]" maxlength="6" class="form-control numberOnly  name_list text-right" required="" /><p class="help-block text-danger"></p>';
			str_add += '</td>';
			str_add += '<td width="20%">';
			str_add += '<select  class="form-control"  id="unit'+i+'"  name="unit[]" required="required" data-validation-required-message="Please Select unit."><option value="">UOM</option>/select>';
			str_add += '</td>';
			str_add += '<td width="20%">';
			str_add += '<input type="text" id="unit_cash'+i+'" name="unit_cash[]" maxlength="6" class="form-control numberOnly  name_list" required="" /><p class="help-block text-danger"></p>';
			str_add += '</td>';
			str_add += '<td width="20%">';
			str_add += '<input type="text" id="line_total'+i+'" name="line_total[]" maxlength="6" class="form-control numberOnly  name_list text-right" required="" /><p class="help-block text-danger"></p>';
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
				document.getElementById("sendMessageButton").disabled =false;
				swal('',"Provide all the data's");
				return false;

			}
		});


		$(document).on('click', '.btn_remove', function(){ 
			var arr = $(this).attr("id").split("_");
			$('#row'+arr[1]+'').remove();
			calculateGrandTotal();
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