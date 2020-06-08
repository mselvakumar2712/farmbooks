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
                        <h1>Add Size</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/humiditylist');?>">Size</a></li>
                            <li class="active">Add Size</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_size')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Product <span class="text-danger">*</span></label>
													<select  class="form-control" id="product" name="product" required="required" data-validation-required-message="Please Select product.">
													<option value="">Select Product </option>
													<?php for($i=0; $i<count($product);$i++) { ?>										
													 <option value="<?php echo $product[$i]->id; ?>"><?php echo $product[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Size <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly"  maxlength="3" id="size" name="size" placeholder="Size"  required="required" data-validation-required-message="Please enter size .">
												    <p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">UOM</label>
													<select  class="form-control" id="uom" name="uom" required="required" data-validation-required-message="Please Select uom.">
													<option value="">Select UOM </option>
													<?php for($i=0; $i<count($uom);$i++) { ?>										
													 <option value="<?php echo $uom[$i]->id; ?>"><?php echo $uom[$i]->short_name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>												
										 </div>									
										<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/sizelist');?>" class="btn btn-outline-dark">Cancel</a>	
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
	  
</body>
</html>