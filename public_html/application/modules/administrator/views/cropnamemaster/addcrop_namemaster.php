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
                        <h1>Add Crop Name Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/name");?>">Crop Name Master</a></li>
                            <li class="active">Add Crop Name Master </li>
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
						<form  name="sentMessage"  id="cropstandard_form" method="post"  novalidate="novalidate" >
						<div class="row row-space">
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Category <span class="text-danger">*</span></label>
							  <select id="cropcategory" name="cropcategory" class="form-control" required="required" data-validation-required-message="Please select crop category.">
								<option value="">Crop Category</option>
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
							 <select id="crop_sub_category" name="crop_sub_category" class="form-control" required="required" data-validation-required-message="Please select crop sub category.">
								<option value="">Crop Sub Category</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>	
							 <div class="form-group col-md-4">
								<label for="inputAddress2">Crop Name <span class="text-danger">*</span></label>	
								<input type="text" class="form-control"  maxlength="30" id="crop_name" name="crop_name" placeholder="Crop Name" required="required" data-validation-required-message="Please enter crop name.">
								<p class="help-block text-danger"></p>
						    </div>
					    </div>
						<div class="row row-space">
						   
							<div class="form-group col-md-4">
								<label for="inputAddress2">Crop Category in Regional Language <span class="text-danger">*</span></label>	
								<input type="text" class="form-control"  maxlength="30" id="crop_regional_language" name="crop_regional_language" placeholder="Crop Category in Regional Language" required="required" data-validation-required-message="Please enter crop category in regional language">
								<p class="help-block text-danger"></p>
						    </div>
							 </div>
							<div class="row">
							  <div class="form-group col-md-12 text-center">
								<input id="sendMessageButton" value="Save" class="btn btn-success " type="submit">
								<a href="<?php echo base_url('administrator/name');?>"><input id="back" value="Cancel" class="btn btn-outline-dark text-center " type="button"></a>
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
<script type="text/javascript">
        $(document).ready(function(){
			$('select[name="cropcategory"]').on('change', function(e) {
				e.preventDefault();
				var crop_category = $(this).val();
				$("#crop_sub_category option").remove() ;				
				if(crop_category) { 
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
					type: "POST",
					data:{crop_category:crop_category},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
						var div_data = '<option value="">Select Subcategory</option>';
						$.each(responsearr, function(key, value) {						   
						div_data +="<option value="+value.id+">"+value.name+"</option>";						                           							
						});
					    $(div_data).appendTo('#crop_sub_category');	 
					}
				});
				}						
			});
			$('form').submit(function(e){
				e.preventDefault(); 
				const nameData = $('#cropstandard_form').serializeObject();
				console.log(nameData);
			 	$.ajax({
					url:"<?php echo base_url();?>administrator/name/postname",
					type:"POST",
					data:nameData,
					dataType:"html",
					cache:false,			
					success:function(response){		  
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(response);
						
						if(responseArray.status == 1){
							$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
							window.location = "<?php echo base_url('administrator/name');?>";
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
			
        });
    </script>
	