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
                        <h1>Invoice Prefix</h1>
                    </div>
                </div>
            </div>
           <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Setting</a></li>
                            <li><a href="<?php echo base_url('fpo/setting/invoiceprefix');?>" class="active">Invoice Prefix</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
			<?php if($this->session->flashdata('success')){ ?>
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?php echo $this->session->flashdata('success');?></strong> 
				</div>
				<?php }elseif($this->session->flashdata('danger')){?>
				<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?php echo $this->session->flashdata('danger');?></strong> 
				</div>
				<?php }elseif($this->session->flashdata('info')){?>
				<div class="alert alert-info alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?php echo $this->session->flashdata('info');?></strong> 
				</div>
				<?php }elseif($this->session->flashdata('warning')){?>
				<div class="alert alert-warning alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?php echo $this->session->flashdata('warning');?></strong> 
				</div>
			<?php }?>
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/setting/postinvoiceprefix')?>" method="POST" id="invoice_prefix_suffix" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
                               <div class="row row-space  mt-4"> 
										  <div class="form-group col-md-4"></div>
										   <div class="form-group col-md-4">
										  <label class=" form-control-label">Add invoice Prefix or Suffix <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="invoice_yes" class="form-check-label">
												  <input type="radio" id="invoice_yes" name="invoice_yes_no" value="1" class="form-check-input" required="required" data-validation-required-message="Please select." <?php if($invoice[0]->invoice_prefix != "" || $invoice[0]->invoice_suffix !=""){ ?>checked<?php } ?>><span class="ml-1">Yes</span>
												  <p class="help-block text-danger"></p>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="invoice_no" class="form-check-label">
												  <input type="radio" id="invoice_no" name="invoice_yes_no" value="0" class="form-check-input" required="required" data-validation-required-message="Please select." <?php if($invoice[0]->invoice_prefix == "" && $invoice[0]->invoice_suffix ==""){ ?>checked<?php } ?>><span class="ml-1">No</span>
												  <p class="help-block text-danger"></p>
												</label>
												</div>
											</div>			
										  </div>
									  </div>
									  <div class="form-group col-md-4"></div>
									  </div>
										  <div class="row row-space" id="invoice" style="display: none;"> 
												<div class="form-group col-md-3"></div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Invoice Prefix </label>
													<input type="text" class="form-control" value="<?php echo ($invoice[0]->invoice_prefix)?$invoice[0]->invoice_prefix:"";?>" name="invoice_prefix" maxlength="10" id="invoice_prefix" placeholder="Invoice Prefix" >
                                    </div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Invoice Suffix </label>
													<input type="text" class="form-control" value="<?php echo ($invoice[0]->invoice_suffix)?$invoice[0]->invoice_suffix:"";?>" name="invoice_suffix" maxlength="10" id="invoice_suffix" placeholder="Invoice Suffix">
                                    </div>

										 </div>                              
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit"> <i class="fa fa-floppy-o" aria-hidden="true"></i> <?php if(!empty($invoice[0]->invoice_prefix or $invoice[0]->invoice_suffix)){ ?>Update<?php }else{?> Save<?php }?></button>
												<a href="<?php echo base_url('fpo/setting/invoiceprefix');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
var invoice_prefix = "<?php echo $invoice[0]->invoice_prefix; ?>";
var invoice_suffix = "<?php echo $invoice[0]->invoice_suffix; ?>";	

if(invoice_prefix || invoice_suffix){
   viewElement(1)
}
$(document).ready(function(){   
var invoiceData=0;
      $('[name="invoice_yes_no"]').on('change', function(){
      var invoice_yes_no = $(this).val();			
      invoiceData=invoice_yes_no;
         viewElement(invoice_yes_no);
      });
      
      if(invoice_prefix!="" || invoice_suffix!=""){
         invoiceData=1;
      }

     $(document).on('click', '#sendMessageButton', function(){
       // alert(invoiceData);
            if(invoiceData == 1){
               var invoicePrefix = $('#invoice_prefix').val();
               var invoiceSuffix = $('#invoice_suffix').val();
              
               if(invoicePrefix == "" && invoiceSuffix == ""){
                  swal('',"Provide any one field");
                  return false;
               }else{
                  
                 document.getElementById("invoice_prefix_suffix").submit();
               }           
            }                      
      }); 
});
      

function viewElement(invoice_yes_no){
   if(invoice_yes_no == 1){
         $('#invoice_prefix').prop('required',true);
         $('#invoice').show();	   
    } 
    if(invoice_yes_no == 0){
       $('#invoice').css("display", "none");
    }
}

$("#invoice_suffix").focusout(function(){
    var invoice_prefix = $("#invoice_prefix").val();
    var invoice_suffix = $(this).val();
    if(invoice_prefix != "" && (invoice_prefix == invoice_suffix)){         
         swal('Sorry!', 'Invoice prefix and suffix should not same');
         $("#invoice_suffix").val('');
         $("#invoice_suffix").focus();         
    }   
});
</script>
</body>
</html>