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
                        <h1>View Crop Sub Category Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/subcategory");?>">Crop Subcategory Master</a></li>
                            <li class="active">View Crop Sub Category</li>
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
						<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="edit_subcategory" >
						<div class="row row-space">
							<div class="form-group col-md-4">
							  <input type="hidden" name="subcategory_id" value="<?php echo $_REQUEST['id']?>" id="subcategory_id">
						
							  <label for="inputState">Crop Category <span class="text-danger">*</span></label>
								<select id="cropcategory" name="cropcategory" class="form-control" required="required" data-validation-required-message="Please enter crop category." disabled>
								<option value="">Select Crop Category</option>
								<?php
								    for($i=0; $i<count($category);$i++) {
								 ?>										
								<option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
								<?php } ?>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
						    <div class="form-group col-md-4">
								<label for="inputAddress2">Crop Sub Category <span class="text-danger">*</span></label>
								<input type="text" class="form-control"  maxlength="30" name="cropsubcategory" id="cropsubcategory" placeholder="Crop category" required="required" data-validation-required-message="Please enter crop sub category." disabled>
							<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Crop Category in Regional Language <span class="text-danger">*</span></label>	
								<input type="text" class="form-control"  maxlength="30" id="crop_category_in_regional" name="crop_category_in_regional" placeholder="Crop Category in Regional Language" required="required" data-validation-required-message="Please enter crop category in regional language." disabled>
								<p class="help-block text-danger"></p>
						    </div>							
					    </div>
						<div class="form-group col-md-12 text-center">
						 
							   <div id="success"></div>
							    <input id="edit" value="Edit" class="btn btn-success text-center mt-10" type="button">								
								<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-10" type="submit" style="display:none;">
								<a href="#" id="" class="del btn btn-danger mt-10">Delete</a>
							    <a href="<?php echo base_url('administrator/subcategory');?>"><input id="ok" value="Back" class="btn btn-outline-dark text-center mt-10" type="button"></a>
								  <a href="<?php echo base_url('administrator/subcategory');?>"><input id="cancel" value="Cancel" style="display:none;" class="btn btn-outline-dark text-center mt-10" type="button"></a>
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
	  <script>
	  $('#edit').click(function(){
	  $('#sentMessage').toggleClass('view');
	  $("#sendMessageButton").show();
	  $("#cancel").show();
	  $("#edit").hide();
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
		  inp.attr('disabled', 'disabled');
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
	
	/*delete */
	$('a.del').click(function() {
		var subcategory_id = <?php echo $_REQUEST['id']?>;
		$.ajax({
			url: "<?php echo base_url();?>administrator/category/getcropsubcategorybyid/"+subcategory_id,
			type: "GET",
			data: {
			 this_delete: subcategory_id,
			},
			success:function(response) {
			responsearr=$.parseJSON(response);
			console.log(response);
			if(responsearr.status==1){
				swal({
				 text: "You can't delete because crop name has created by using this crop subcategory!",
				 type: 'warning',
				 confirmButtonColor: '#3085d6',
				 cancelButtonColor: '#d33',
				 confirmButtonText: 'OK'
				});
			}else{					
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
					  url: "<?php echo base_url();?>administrator/subcategory/deletesubcategory/"+subcategory_id,
					  type: "POST",
					  data: {
						 this_delete: subcategory_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/subcategory')?>");
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
					swal("Cancelled", "You have cancelled the crop sub category master delete action", "info");
					return false;
				 }
			  });							
			}    
			},error: function() {
			 
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
	});
  
    //edit fpo API CALL
	$(document).ready(function(){
		  //edit popi API CALL
		var subcategory_id =<?php echo $_REQUEST['id']?>;
		$.ajax({
		url: "<?php echo base_url();?>administrator/subcategory/editsubcategory/"+subcategory_id,
		type: "GET",
		dataType:"html",
		cache:false,			
		success:function(response){ 
		response=response.trim();
		responseArray=$.parseJSON(response);
		if(responseArray.status == 1){	
        console.log(responseArray.subcategory_list[0]['crop_category_id']);		
		document.getElementById("cropcategory").value=responseArray.subcategory_list[0]['crop_category_id'];
		document.getElementById("cropsubcategory").value=responseArray.subcategory_list[0]['name'];
		document.getElementById("crop_category_in_regional").value=responseArray.subcategory_list[0]['name_local'];
		} 
		},
		error:function(){
		alert('Error!!! Try again');
		} 
		});
		//$('[id^=door_no]').keypress(validateNumber);
	});
      
        
		//update fpo
	$('form').submit(function(e){
		e.preventDefault();
		const fpodata = $('#edit_subcategory').serializeObject();
		var subcategory_id =<?php echo $_REQUEST['id']?>;
		var url="<?php echo base_url();?>administrator/subcategory/updatesubcategory/"+subcategory_id;
		console.log(fpodata);
			 $.ajax({
				url:url,
				type:"POST",
				data:fpodata,
				dataType:"html",
				cache:false,			
				success:function(response){		  
					response=response.trim();
					responseArray=$.parseJSON(response);
					console.log(response);
					if(responseArray.status == 1){
						$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
						window.location = "<?php echo base_url('administrator/subcategory')?>";
					} 
				},
				error:function(response){
					alert('Error!!! Try again');
				} 
				
				}); 
	});	

	function validateNumber(event) {
		 var key = window.event ? event.keyCode : event.which;
		 if (event.keyCode === 8 || event.keyCode === 46) {
			  return true;
		 } else if ( key < 48 || key > 57 ) {
			  return false;
		 } else {
			return true;
		 }
	};
	$.fn.serializeObject = function()
	{
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

	</script>
</body>
</html>
