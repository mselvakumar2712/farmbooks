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
                        <h1>Edit Manufacturer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/manufacturerlist');?>">Manufacturer</a></li>
                            <li class="active">Edit Manufacturer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				<form  action="<?php echo base_url('administrator/masterdata/updatemanufacturer/'.$manufacturer_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
				<input type="hidden" name="manufacturerid" value="<?php echo $manufacturer_info['id']?>" id="manufacturerid">
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
											<div class="container-fluid">
											<div class="row row-space  mt-4">                                 							
												<div class="form-group col-md-3"></div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Manufacturer Name <span class="text-danger">*</span></label>
													<input class="form-control" id="name" value="<?php echo $manufacturer_info['name']?>" name="name"   placeholder="Manufacturer Name" required="required"  data-validation-required-message="Please enter manufacturer name.">				
													<p class="help-block text-danger"></p>
											    </div>
												<div class="form-group col-md-3"></div>
											</div>											
											<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-success text-center" type="submit"> <i class="fa fa-check-circle"></i> Update</button>
											<!--<a href="#" id="" class="del btn btn-danger">Delete</a>-->
											<a href="<?php echo base_url('administrator/masterdata/manufacturerlist');?>" id="cancel" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
			 var button = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("sendMessageButton").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			//  inp.attr('disabled', 'disabled');
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
			 //inp.attr('disabled', 'disabled');
			}
		  });
		});
	

</script>
</body>
</html>