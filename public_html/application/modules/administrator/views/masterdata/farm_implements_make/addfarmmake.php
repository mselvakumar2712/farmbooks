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
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Farm Implements Make</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>">Farm Implements Make and Model</a></li>
                            <li class="active"> Add Farm Implements Make</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				  <form  action="<?php echo base_url('administrator/masterdata/post_farmimplementsmake')?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												 <div class="form-group col-md-4">
												  <label class=" form-control-label">Type of Implement  <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="implement_type1" class="form-check-label">
														  <input type="radio" id="implement_type1" name="implement_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check type of implemet."><span class="ml-1">Primary</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="implement_type2" class="form-check-label">
														  <input type="radio" id="implement_type2" name="implement_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check type of implemet."><span class="ml-1">Attachment</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>
												
												<div class="form-group col-md-4">
													<label for="inputAddress2">Implement Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="implement_name" name="implement_name" required="required" data-validation-required-message="Please Select implement name .">
													<option value="">Select Implement Name </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-4">
													<label for="inputAddress2">Make</label>
													<input type="text" class="form-control "   maxlength="50" id="make" name="make" placeholder="Make" required="required" data-validation-required-message="Please enter make .">
													<p class="help-block text-danger"></p>
												</div>	
											</div>															   										
										<div class="form-row mt-2">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
$('input[name=implement_type]').on('change', function() {
    var implement_id = $("input[name='implement_type']:checked").val();  
    //var implement_id = $("#implement_type").val();
//	alert(implement_id)
    getTypeByImplement( implement_id );
});
 
    
function getTypeByImplement( implement_id ) {
    $("#implement_name option").remove();
    if(implement_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>administrator/Masterdata/getTypeByImplement/"+implement_id,
		  type:"GET",
           data:"",
		  dataType:"html",
		  cache:false,			
		  success:function(response) {
		  console.log(response);
              response=response.trim();                
              responseArray=$.parseJSON(response);
			  console.log(responseArray);
			 if(responseArray.status == 1){
			     if (Object.keys(responseArray).length > 0) {
			         $("#implement_name").append($('<option></option>').val(0).html('Select Implements'));
			     }
			 $.each(responseArray.type_implement_list,function(key,value){
			     $("#implement_name").append($('<option></option>').val(value.id).html(value.Name));
			 });
			} 
		  },
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	   }); 
    } else {
        swal("Sorry!", "Select the bank name");
    } 
}
 

</script>
</body>
</html>