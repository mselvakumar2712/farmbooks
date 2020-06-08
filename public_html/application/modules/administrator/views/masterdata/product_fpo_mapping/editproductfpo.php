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
                        <h1>View Product FPO Mapping</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/productfpolist');?>">Product FPO Mapping</a></li>
                            <li class="active">View Product FPO Mapping</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                    <input type="hidden" name="productfpo_id" value="<?php echo $productfpo_info['id']?>" id="productfpo_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the FPO <span class="text-danger">*</span></label>
													<select  class="form-control" id="stock_group" name="stock_group" required="required" data-validation-required-message="Please Select name of the fpo."disabled>
													<option value="">Select Name of the FPO </option>
													<?php for($i=0; $i<count($fpo);$i++) {
														if($productfpo_info['fpo_id']==$fpo[$i]->id){	
														echo '<option value="'.$fpo[$i]->id.'" selected="selected">'.$fpo[$i]->producer_organisation_name.'</option>';
														}else{
													   echo '<option value="'.$fpo[$i]->id.'">'.$fpo[$i]->producer_organisation_name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Stock Group <span class="text-danger">*</span></label>
													<select  class="form-control" id="stock_group" name="stock_group" required="required" readonly data-validation-required-message="Please Select sub category .">
													<option value="">Select Stock Group</option>
													<?php for($i=0; $i<count($stock_group);$i++) {
														if($productfpo_info['stock_group_id']==$stock_group[$i]->id){	
														echo '<option value="'.$stock_group[$i]->id.'" selected="selected">'.$stock_group[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$stock_group[$i]->id.'">'.$stock_group[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-4">
													<label for="inputAddress2">Category <span class="text-danger">*</span></label>
													<select  class="form-control" id="category" name="category" required="required" readonly data-validation-required-message="Please Select category .">
													<?php for($i=0; $i<count($category);$i++) {
														if($productfpo_info['category_id']==$category[$i]->id){	
														echo '<option value="'.$category[$i]->id.'" selected="selected">'.$category[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$category[$i]->id.'">'.$category[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select> 
													<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Sub Category <span class="text-danger">*</span></label>
												<select  class="form-control" id="sub_category" name="sub_category" required="required" readonly data-validation-required-message="Please Select sub category .">
												<option value="">Select Sub Category</option>
												<?php for($i=0; $i<count($subcategory);$i++) {
													if($productfpo_info['sub_category_id']==$subcategory[$i]->id){	
													echo '<option value="'.$subcategory[$i]->id.'" selected="selected">'.$subcategory[$i]->name.'</option>';
													}else{
												   echo '<option value="'.$subcategory[$i]->id.'">'.$subcategory[$i]->name.'</option>';
													}?>										
												<?php }?>
												</select> <p class="help-block text-danger"></p>
											</div>
											
											<div class="form-group col-md-4">
													<label for="inputAddress2">Product <span class="text-danger">*</span></label>
													<select  class="form-control" id="product"  name="product" required="required" data-validation-required-message="Please Select product  ."disabled>
													<option value="">Select Product </option>
													<?php for($i=0; $i<count($product);$i++) {
														if($productfpo_info['product_id']==$product[$i]->id){	
														echo '<option value="'.$product[$i]->id.'" selected="selected">'.$product[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$product[$i]->id.'">'.$product[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
											
											
										</div>
											<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<a href="<?php echo base_url('administrator/masterdata/productfpolist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark text-center" type="button"></a>
												
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
	 
	  	$('#edit').click(function(){
		  $('#editfig').toggleClass('view');
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
	  $(document).ready(function() {

			});


</script>
</body>
</html>