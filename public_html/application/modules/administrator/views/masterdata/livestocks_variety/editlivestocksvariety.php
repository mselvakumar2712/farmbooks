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
            <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Live Stocks Variety Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url("administrator/masterdata/livestocksvarietylist");?>">Live Stocks Variety Master</a></li>
                            <li class="active">View Live Stocks Variety Master </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
									<div class="container-fluid">
										<form  name="sentMessage" action="<?php echo base_url('administrator/masterdata/updatelive_stocks_variety/'.$livestock_info['id'])?>"  method="post" id="addcropvarietyform" novalidate="novalidate" >
											<div class="row row-space">
												<div class="form-group col-md-4">
												</div>
												<div class="form-group col-md-5 text-center">
												  <label for="inputState">Type of Live stock<span class="text-danger">*</span></label>
												  <select id="livestocks" name="livestocks" class="form-control" required="required" data-validation-required-message="Please select live stock."disabled>
													<option value="">Select Live stock</option>
													<?php for($i=0; $i<count($live_stocks);$i++) { ?>									
								                    <option value="<?php echo $live_stocks[$i]->id; ?>"><?php echo $live_stocks[$i]->name; ?></option>
								                    <?php } ?>
												  </select>
												  <p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
												</div>
											 </div>
											<table class="table table-bordered text-center mt-4" id="live_stocks_variety">
											   <thead>
												  <tr>
												  <td>Variety</td>
												  <td><button type="button" name="add" id="add" class="btn btn-success">Add Variety</button></td>
												  </tr>
											   </thead>
											   <tbody>
												  <tr>
												  </tr>
											   </tbody>
											</table>
											 <div class="row">
												<div class="form-group col-md-12 text-center">
												   <div id="success"></div>
													<input id="edit" value="Edit" class="btn btn-success text-center mt-10" type="button">								
														<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-10" type="submit" style="display:none;">
														<a href="<?php echo base_url('administrator/masterdata/livestocksvarietylist');?>"><input id="ok" value="Back" class="btn btn-outline-dark text-center mt-10" type="button"></a>
														<a href="<?php echo base_url('administrator/masterdata/livestocksvarietylist');?>"><input id="cancel" value="Cancel" class="btn btn-outline-dark mt-10" type="button" style="display:none;" ></a>
												   </div>
											</div>
										</div>
									</form>						
								</div>                 
							</div>
						</div>
					</div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
   </div><!-- /#right-panel -->
 </div><!-- .content -->
     <?php $this->load->view('templates/footer.php');?>         
      <?php $this->load->view('templates/bottom.php');?>
	   <?php $this->load->view('templates/datatable.php');?> 
	    <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	 <script src="<?php echo asset_url()?>js/register.js"></script>
</body>
</html>
<script>
$(document).ready(function() {
	var i=0;  

	$('#sendMessageButton').click(function(){

		var validate = true;
			$('#live_stocks_variety').find('tr input[id="variety'+i+'"]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
		});
		
		if(validate){
	    
		return true; 
		
		}else{			
			swal('',"Provide crop variety");
			return false;
		}
	});
	
	$('#add').click(function(){  
		var validate = true;
			$('#live_stocks_variety').find('tr input[id="variety'+i+'"]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
	    i++;

	   $('#live_stocks_variety').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input type="text" class="form-control"  maxlength="30" id="variety'+i+'" name="variety[]" placeholder="Variety" required="required" data-validation-required-message="Please enter variety."></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
	    }else{			
			swal('',"Provide variety");
			return false;
		}
	});
	
	

	
	$("#add").hide();
	$('#edit').click(function(){
		$('#sentMessage').toggleClass('view');
		$("#sendMessageButton").show();
		$("#cancel").show();
		$("#add").show();
		$("#edit").hide();
		$('a.del').click(function() {
			var cropvariety_id = $(this).attr("id"); 
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
				  url: "<?php echo base_url();?>administrator/masterdata/delete_livestocks_variety/"+cropvariety_id,
				  type: "POST",
				  data: {
					 this_delete: cropvariety_id,
				  },
				  cache: false,
				  success: function() {        
					 setTimeout(function() {
					  window.location.replace("<?php echo base_url('administrator/masterdata/livestocksvarietylist')?>");
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
				swal("Cancelled", "You have cancelled the live stocks variety master delete action", "info");
				return false;
			 }
		  });
		});
	

	  $(document).on('click', '.btn_remove', function(){  
	   var button_id = $(this).attr("id");   
	   $('#row'+button_id+'').remove();  
		});
	  $("#ok").hide();
	  $('input').each(function(){
		var inp = $(this);
	   //var button = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		document.getElementById("sendMessageButton").disabled =false;
		document.getElementById("cancel").disabled =false;
		
		}
		else {
		 // inp.attr('disabled', 'disabled');
		}
	});
	  $('select').each(function(){
		var inp = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		document.getElementById("sendMessageButton").disabled =false;
		document.getElementById("cancel").disabled =false;
		}
		else {
		  inp.attr('disabled', 'disabled');
		}
	  });
    });
	
	document.getElementById("livestocks").value ='<?php echo $livestock_info['live_stock_id']?>';
	
	var strVale = '<?php echo $livestock_info['varity_name']?>';
	var stockid = '<?php echo $livestock_info['varityid']?>';
	var intVal_id=stockid.split(',');
	var intValArray=strVale.split(',');
	 for(var i=0;i<intValArray.length;i++){
		if(intValArray.length > 0 ){
		 $('#live_stocks_variety').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input type="hidden"  value="'+intVal_id[i]+'" id="varietyid"  name="varietyid[]" disabled><input type="text" value="'+intValArray[i]+'" class="form-control"  maxlength="30" id="variety" name="variety[]" placeholder="Variety" required="required" data-validation-required-message="Please enter variety."disabled></td><td><a  href="javascript:void(0); " id="'+intVal_id[i]+'" class="del btn btn-danger mt-10">Delete</i></a></td></tr>');  
		}else{
		   $("#live_stocks_variety").val(strVale);
		}
	}


});

                  
</script>