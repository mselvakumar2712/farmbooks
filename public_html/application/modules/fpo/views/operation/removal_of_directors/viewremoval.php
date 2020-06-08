<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />

<style>
.select2-selection__rendered {
    border-color: #007901 ! important;
    display: block;
    width: 100%;
    height: calc(2.35rem + 2px) ! important;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    text-transform: capitalize;
}

p {
    font-size: 16px;
    font-family: 'Lato', sans-serif !important;
    font-weight: 400;
    line-height: 24px;
    color: #878787;
    margin-top: 10px;
}
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
                        <h1>View Removal of Director</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/viewremoval');?>">View Removal of Director</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_removal')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-5">
														  <label for="">Name of the Director <span class="text-danger">*</span></label>
																<select class="form-control" id="director" disabled name="director" required="required" data-validation-required-message="Please select gl group.">
																  <option value="">Select Director </option>
																  <?php foreach($director as $director){
																	
																	if($director->id == $removal_info['id'])
																	   echo "<option value='".$director->id."' selected='selected'>".$director->name."</option>";
																	else
																	   echo "<option value='".$director->id."'>".$director->name."</option>";
																   }
																   ?>
																</select> 
																
														
														
														 <div class="help-block text-danger"></div>
													  </div>
													  <div class="form-group col-md-5">
														<label for="">Date of Removal <span class="text-danger">*</span></label>
														<input type="date" class="form-control" value="<?php echo $removal_info['terminated_on']?>" readonly id="removal_date" name="removal_date" required="required" data-validation-required-message="Please enter date of removal.">
														<div class="help-block text-danger"></div>
													</div>
													 
												</div>
												<div class="row row-space  mt-4">
													<div class="form-group col-md-6">
														  <label for="">Reason for Removal <span class="text-danger">*</span></label>
														  <select class="form-control make" id="reason" disabled name="reason" required="required" data-validation-required-message="Select reason for removal">
															 <option value="">Select reason</option>
															 <option value="1"<?php echo (($removal_info['reason'] ==1)?"selected":"") ?> style="height:100%" >581 Q (1)(a) Convicted by a Court of any offence involving moral turpitude and sentenced in respect thereof to imprisonment for not less than six months.</option>
															 <option value="2" <?php echo (($removal_info['reason'] ==2)?"selected":"") ?>>581 Q (1)(b) The Producer Company, in which he is a director, has made a default in repayment of any advances or loans taken from any company or institution or any otherperson and such default continues for ninety days</option>
															 <option value="3" <?php echo (($removal_info['reason'] ==3)?"selected":"") ?>>581 Q (1)(c) He has made a default in repayment of any advances or loans taken from the Producer Company in which he is a director.</option>
															 <option value="4" <?php echo (($removal_info['reason'] ==4)?"selected":"") ?>>581 Q (1)(d)(i) The Producer Company, in which he is a director has not filed the annual accounts and annual return for any continuous three financial years commencing on or after the 1st day of April,2002.</option>
															 <option value="5" <?php echo (($removal_info['reason'] ==5)?"selected":"") ?>>581 Q (1)(d)(ii) The Producer Company, in which he is a director has failed to, repay its deposit or withheld price or patronage bonus or interest thereon on due date, or pay dividend and such failure continues for one year or more.</option>
														     <option value="6" <?php echo (($removal_info['reason'] ==6)?"selected":"") ?>>581 Q (1)(e) Default is made in holding election for the office of director, in the Producer Company in which he is a director,in accordance with the provisions of this Act and articles</option>
															 <option value="7" <?php echo (($removal_info['reason'] ==7)?"selected":"") ?>>581 Q (1)(f) the annual general meeting or extraordinary general meeting of the Producer Company, in which he is a director,is not called in accordance with the provisions of this Act except due to natural calamity or such other reason</option>
														     <option value="8" <?php echo (($removal_info['reason'] ==8)?"selected":"") ?>>Others</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													   <div class="form-group col-md-5" style="display:none" id="other">
														<label for="">Reason of Removal <span class="text-danger">*</span></label>
														<textarea class="form-control" id="Other_reason" disabled name="Other_reason"  required data-validation-required-message="Select reason for removal"><?php echo $removal_info['other_reason']?></textarea>
														<div class="help-block text-danger"></div>
													  </div>							
												</div>
										</div>										
										<div class="col-md-12 text-center">
											<!--<a href="<?php echo base_url('fpo/operation/editremoval/');?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>-->
											<a href="<?php echo base_url('fpo/operation');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

 <?php $this->load->view('templates/footer.php');?>         
 <?php $this->load->view('templates/bottom.php');?> 
 <?php $this->load->view('templates/datatable.php');?>	   
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
<script>

$(document).ready(function () {
	var others=<?php echo $removal_info['reason']?>; 
	//alert(others);
	if ( others == 8) {
			//alert()
            $("#other").show();
        } else {
            $("#other").hide();
        }
    $("#reason").change(function () {
		
		//alert(hi);
        if ( others == 8) {
			alert()
            $("#other").show();
        } else {
            $("#other").hide();
        }
    });
	
	$(function() {
     $('.form-control').on('keypress', function(e) {
         if (e.which == 32){
			 var newStr = $(this).val().length;
			if(newStr){
				 return true;
			}
			  return false;
		 }else{
			 return true;
		 }
            
     });
 });
 $('.make').select2();
 
 $(function(){
      var dtToday = new Date();    
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      
      var maxDate = year + '-' + month + '-' + day;
      $('#removal_date').attr('max', maxDate);
			
}); 
 
	
	
	
});

</script>	 
</body>
</html>