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
                        <h1>Add Live Stocks Variety Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url("administrator/masterdata/livestocksvarietylist");?>">Live Stocks Variety Master</a></li>
                            <li class="active">Add Live Stocks Variety Master </li>
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
										<form  name="sentMessage" action="<?php echo base_url('administrator/masterdata/post_live_stocks_variety')?>"  method="post" id="addcropvarietyform" novalidate="novalidate" >
											<div class="row row-space">
												<div class="form-group col-md-5">
												  <label for="inputState">Live stock<span class="text-danger">*</span></label>
												  <select id="livestocks" name="livestocks" class="form-control" required="required" data-validation-required-message="Please select live stock.">
													<option value="">Select Live stock</option>
													<?php for($i=0; $i<count($live_stocks);$i++) { ?>									
								                    <option value="<?php echo $live_stocks[$i]->id; ?>"><?php echo $live_stocks[$i]->name; ?></option>
								                    <?php } ?>
												  </select>
												  <p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Variety <span class="text-danger">*</span></label>	
													<input type="text" class="form-control"  maxlength="30" id="variety" name="variety[]" placeholder="Variety" required="required" data-validation-required-message="Please enter variety.">
													<p class="help-block text-danger"></p>
												 </div>
												 <div class="form-group col-md-3 mt-3">
												 <label for="inputAddress2"></label>
												 <button type="button" name="add" id="add" class="btn btn-success mt-3">Add Live Stocks Variety</button>
												 </div>
											 </div>
											<div class="row row-space"> 
												 
											</div>
											<table class="table table-bordered text-center mt-4" id="crop_variety">
											   <tbody>
												<tr>
											    </tr>
											</tbody>
											</table>
											<div class="row">													
												<div class="form-group col-md-12 text-center">
												  <div id="success"></div>
													<input id="sendMessageButton" value="Save " class="btn btn-success mt-10" type="submit">
													 <a href="<?php echo base_url('administrator/masterdata/livestocksvarietylist');?>"><input id="back" value="Cancel" class="btn btn-outline-dark text-center mt-10" type="button"></a>
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
<script>
$(document).ready(function() {
	var i=0;  

	$('#sendMessageButton').click(function(){

		var validate = true;
			$('#crop_variety').find('tr input[id="variety'+i+'"]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
		});
		
		if(validate){
	    
		return true; 
		
		}else{			
			swal('',"Provide crop variety");
			return false;
		}
	});
	
	$('#add').click(function(){  
		var validate = true;
			$('#crop_variety').find('tr input[id="variety'+i+'"]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
	    i++;


	   $('#crop_variety').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input type="text" class="form-control"  maxlength="30" id="variety'+i+'" name="variety[]" placeholder="Variety" required="required" data-validation-required-message="Please enter variety."></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
	   }else{			
			swal('',"Provide variety");
			return false;
		}
	});
	
	$(document).on('click', '.btn_remove', function(){  
	   var button_id = $(this).attr("id");   
	   $('#row'+button_id+'').remove();  
	});



});

                  
</script>