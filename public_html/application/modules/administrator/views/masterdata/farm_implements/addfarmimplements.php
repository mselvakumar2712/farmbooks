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
                        <h1>Add Farm Implements</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>">Farm Implements</a></li>
                            <li class="active">Add Farm Implements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_farmimplements')?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4">
													<div class="form-group col-md-3">&nbsp;</div>                                    							
													 <div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Implement  <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="implement_type1" class="form-check-label">
														  <input type="radio" id="implement_type1" name="implement_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check implement type."><span class="ml-1">Primary</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="implement_type2" class="form-check-label">
														  <input type="radio" id="implement_type2" name="implement_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check implement type."><span class="ml-1">Attachment</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>
													<div class="form-group col-md-3">&nbsp;</div>
												</div>
												<div class="row row-space  ">
													<div class="form-group col-md-3">&nbsp;</div>                                    							
													 <div class="form-group col-md-5" id="implements_primary" style="display:none;">
														  <label for="inputAddress2">Primary </label>
														  <input type="text" id="primary" name="primary" maxlength="50" class="form-control" maxlength="75" placeholder="Primary"required="required" data-validation-required-message="Please enter primary.">	
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-5" id="implements_attach" style="display:none;">
														  <label for="inputAddress2">Attachment </label>
														  <input type="text" id="attachment" name="attachment" maxlength="50" class="form-control" maxlength="75" placeholder="Attachment"required="required" data-validation-required-message="Please enter attachment.">	
													<p class="help-block text-danger"></p>
												   </div>
													<div class="form-group col-md-3">&nbsp;</div>
												</div>
											<div class="row row-space">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center btn-fs" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
	$(document).ready(function() {
		
		var implements_type = $("input[name='implement_type']");
		var chk="";
		   $('input').on('click', function() {
				
					if (implements_type.is(':checked')) {
					  $("input[name='implement_type']:checked").each ( function() {
							chk = $(this).val() + ",";
						  chk = chk.slice(0, -1);
					  });
						// return value of checkbox checked
					   if(chk==1){
					   $('#implements_primary').show();
					   $('#implements_attach').hide();
					   } else if(chk==2){					 
					   $('#implements_attach').show();
					   $('#implements_primary').hide();
					   } else{
					   $('#implements_primary').hide();
					   $('#implements_attach').hide();
					   }		  
					} 
		    });
	});  		
</script>
</body>
</html>