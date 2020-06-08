<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<body>
<style>
.select2-selection__rendered {
    border-color: #007901 ! important;
    display: block;
    width: 100%;
    height: calc(2.35rem + 2px) ! important;
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
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    text-transform: capitalize;
}


</style>

      <div class="container-fluid pl-0 pr-0">
         <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
         <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Farm Implements Model</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/farmimplementsmodellist');?>">Farm Implements Make and Model</a></li>
                            <li class="active"> Add Farm Implements Model</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				  <form  action="<?php echo base_url('administrator/masterdata/post_farmimplementsmodel')?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												 <div class="form-group col-md-6">
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
												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Implement Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="implement_name" name="implement_name" required="required" data-validation-required-message="Please Select implement name .">
													<option value="">Select Implement Name</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
												
											</div>	
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Make</label>
												<select  class="form-control make" id="make" name="make" required="required" data-validation-required-message="Please Select make.">
												<option value="">Select Make</option>
											
												</select>
												<p class="help-block text-danger"></p>
											</div>											
											<div class="form-group col-md-6">
												<label for="inputAddress2">Model</label>
												<input type="text" class="form-control"   maxlength="50" id="model" name="model" placeholder="Model" required="required" data-validation-required-message="Please enter model .">
												<p class="help-block text-danger"></p>
											</div>
										</div>
								
											
										<div class="form-row mt-2">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('administrator/masterdata/farmimplementsmodellist');?>" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
			         $("#implement_name").append($('<option></option>').val(0).html('Select Implement Name'));
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
        swal("Sorry!", "Select the Implement Name");
    } 
}

$(document).ready(function(){
	$('.make').select2({
		placeholder: "Select Make", //placeholder
		tags: true
	});
 
})

$('#implement_name').on('change', function() {
    var implement_id = $(this).val();  
    getImplementByName( implement_id );
});

//new
function getImplementByName( farmimplements_id ) {
    $("#make option").remove();
    if(farmimplements_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>administrator/Masterdata/getImplementByName/"+farmimplements_id,
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
			         $("#make").append($('<option></option>').val(0).html('Select Make'));
					 
			     }
			 $.each(responseArray.type_implement_name,function(key,value){
			     $("#make").append($('<option></option>').val(value.id).html(value.Make));
			 });
			} 
		  },
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	   }); 
    } else {
        swal("Sorry!", "Select the Implement Name");
    } 
}

</script>
</body>
</html>