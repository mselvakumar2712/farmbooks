<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

<style>


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
                        <h1>View Product FPO Mapping</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('fpo/masterdata/productfpolist');?>">Product FPO Mapping</a></li>
                            <li class="active">View Product FPO Mapping</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="" method="post" id="" name="sentMessage" novalidate="novalidate" >
                    <input type="hidden" name="productfpo_id" value="<?php echo $product[0]->id;?>" id="productfpo_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										<div class="row row-space">
											<div class="form-group col-md-4">
													<label for="inputAddress2">Stock Group<span class="text-danger">*</span></label>
													<select  class="form-control" id="stock_group" name="stock_group" required="required" readonly data-validation-required-message="Please Select sub category .">
													<option value="">Select Stock Group</option>
													<?php for($i=0; $i<count($stock_group);$i++) {
														if($product[0]->stock_group_id==$stock_group[$i]->id){	
														echo '<option value="'.$stock_group[$i]->id.'" selected="selected">'.$stock_group[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$stock_group[$i]->id.'">'.$stock_group[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
												</div>
											<div class="form-group col-md-4">
													<label for="inputAddress2">Category<span class="text-danger">*</span></label>
													<input type="" name="" class="form-control" value="<?php echo $product[0]->category_name; ?>" readonly>
											</div>
											<div class="form-group col-md-4">
													<label for="inputAddress2">Sub Category<span class="text-danger">*</span></label>
													<input type="" name="" class="form-control" value="<?php echo $product[0]->subcategory_name; ?>" readonly>
											</div>												
										</div>
										<div class="row row-space">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Product <span class="text-danger">*</span></label>
												<input type="" name="" class="form-control" value="<?php echo $product[0]->product_name; ?>" readonly>
											</div>												
											<div class="form-group col-md-4">
												<label for="inputAddress2">Classification<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="classification" value="<?php echo $product[0]->classification; ?>" id="classification" required="required" placeholder="Classification" readonly>                                       
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">HSN Code<span class="text-danger">*</span></label>
												<?php $hSN_code = explode(' ', $product[0]->hsn_code); ?>
												<input type="text" class="form-control" name="hsn_code" value="<?php echo $hSN_code[0]; ?>" id="hsn_code" required="required" placeholder="HSN Code" readonly>                                       
											</div>										
										</div>
										
										<div class="row row-space">
												<div class="form-group col-md-12">
													<label for="inputAddress2">GST Category </label>
													<select class="form-control" id="gst_category" name="gst_category">
													<option value="">Select GST Category </option>
													<?php for($i=0; $i<count($taxvalue);$i++) {
														if($product[0]->hsn_code==$taxvalue[$i]->hsn_code){	
														echo '<option value="'.$taxvalue[$i]->hsn_code.'" selected="selected">'.$taxvalue[$i]->hsn_category.'  -  ('.round($taxvalue[$i]->igst).' %)  -  '.$taxvalue[$i]->item_description.'</option>';
														}else{
													   echo '<option value="'.$taxvalue[$i]->hsn_code.'">'.$taxvalue[$i]->hsn_category.'  -  ('.round($taxvalue[$i]->igst).' %)  -  '.$taxvalue[$i]->item_description.'</option>';
														}?>										
													<?php }?>
													</select>
													<a href="<?php echo base_url('fpo/masterdata/gstdetail');?>" class="text-success ml-1">Refer Current GST Rates</a>
												</div>	
												
											</div>
											<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<a href="<?php echo base_url('fpo/masterdata/productfpolist');?>" id="ok"   class="btn-fs btn btn-outline-dark text-center"><i class="fa fa-arrow-circle-left"></i> Back</a>												
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
	$('.new_gst').select2();

	$('#gst_category').on('change', function(e) {
		e.preventDefault();
        $('#hsn_code').val("");
		var product = $(this).val();
		var product_code = product.split(" ");
        document.getElementById("hsn_code").value = product_code[0];
	});

</script>
</body>
</html>