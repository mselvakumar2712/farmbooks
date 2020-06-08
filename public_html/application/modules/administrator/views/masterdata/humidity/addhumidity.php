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
                        <h1>Add Humidity</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/humiditylist');?>">Humidity</a></li>
                            <li class="active">Add Humidity</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_humidity')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Product <span class="text-danger">*</span></label>
													<select  class="form-control" id="product" name="product" required="required" data-validation-required-message="Please Select product.">
													<option value="">Select Product </option>
													<?php for($i=0; $i<count($product);$i++) { ?>										
													 <option value="<?php echo $product[$i]->id; ?>"><?php echo $product[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Humidity <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly"  maxlength="3" id="humidity" name="humidity" placeholder="Humidity"  required="required" data-validation-required-message="Please enter humidity .">
												    <p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-3">
													<label for="inputAddress2">Date (From)</label>
													<input type="date" class="form-control"  id="humidity_from" name="humidity_from" placeholder="Humidity">
											<p class="help-block text-danger"id="validate_date"></p>
											</div>
											<div class="form-group col-md-3">
													<label for="inputAddress2">Date (To)</label>
													<input type="date" class="form-control"   id="humidity_to" name="humidity_to" placeholder="Humidity">
											</div>
											
										</div>										
											   <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/humiditylist');?>" class="btn btn-outline-dark">Cancel</a>	
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
	$("#sendMessageButton").click(function() {
	var startDt=document.getElementById("humidity_from").value;
	var endDt=document.getElementById("humidity_to").value;
	if(startDt && endDt){
	if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
	{

		$("#validate_date").html("from date is not greater than to date");
		return false;
	}
	}
	});
	</script>
</body>
</html>