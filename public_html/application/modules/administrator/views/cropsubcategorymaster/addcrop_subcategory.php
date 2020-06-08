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
                        <h1>Add Crop Sub Category Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/subcategory");?>">Crop Subcategory Master</a></li>
                            <li class="active">Add Crop Sub Category</li>
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
						<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="add_cropsubcategory">
						<div class="row row-space">
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Category <span class="text-danger">*</span></label>
							  <select id="cropcategory" name="cropcategory" class="form-control" required="required" data-validation-required-message="Please enter crop category.">
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
								<input type="text" class="form-control" name="cropsubcategory" id="cropsubcategory" maxlength="30" id="inputAddress2" placeholder="Crop category" required="required" data-validation-required-message="Please enter crop sub category.">
							<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Crop Category in Regional Language <span class="text-danger">*</span></label>	
								<input type="text" class="form-control"  maxlength="30" id="crop_category_in_regional" name="crop_category_in_regional" placeholder="Crop Category in Regional Language" required="required" data-validation-required-message="Please enter crop category in regional language.">
								<p class="help-block text-danger"></p>
						    </div>							
					    </div>
						<div class="row row-space">
				
							  <div class="form-group col-md-12 text-center">
							  
								<input id="sendMessageButton" value="Save" class="btn btn-success" type="submit">
								<a href="<?php echo base_url('administrator/subcategory');?>"><input id="back" value="Cancel" class="btn btn-outline-dark text-center " type="button"></a>
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
	  <script>	        
	//FPO ADD API Call
	$('form').submit(function(e){
	e.preventDefault();
	const categorydata = $('#add_cropsubcategory').serializeObject();
	console.log(categorydata);
		 $.ajax({
			url:"<?php echo base_url();?>administrator/subcategory/postsubcategory",
			type:"POST",
			data:categorydata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
			//	console.log(response);
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
$.fn.serializeObject = function() {
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
