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
                        <h1>Removal of Director</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/viewremoval');?>">Removal of Director</a></li>
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
					<form  method="POST" action="<?php echo base_url('staff/operation/update_removal')?>" method="POST" id="directorform" name="sentMessage" novalidate="novalidate">                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-5">
														  <label for="">Name of the Director <span class="text-danger">*</span></label>
														   <select class="form-control" id="director" name="director" required data-validation-required-message="Select director name">
															<option value=""> Select Director</option>
															<?php for($i=0; $i<count($director);$i++) { ?>	
															<option value="<?php echo $director[$i]->id; ?>"><?php echo $director[$i]->name; ?></option>
															<?php } ?>
														  </select>
														 <div class="help-block text-danger"></div>
													  </div>
													  <div class="form-group col-md-5">
														<label for="">Date of Removal <span class="text-danger">*</span></label>
														<input type="date" class="form-control"  min="<?php echo $reappoint_date; ?>" id="removal_date" name="removal_date" required="required" data-validation-required-message="Please enter date of appointment." min="1950-01-01" max="2050-12-31">
														 <div class="help-block text-danger"></div>
													</div>
													 
												</div>
												<div class="row row-space  mt-4">
													<div class="form-group col-md-6">
														  <label for="">Reason for Removal <span class="text-danger">*</span></label>
														  <select class="form-control make" id="reason" name="reason" required="required" data-validation-required-message="Select reason for removal">
															 <option value="">Select reason</option>
															 <option value="1" style="height:100%" >581 Q (1)(a) Convicted by a Court of any offence involving moral turpitude and sentenced in respect thereof to imprisonment for not less than six months.</option>
															 <option value="2">581 Q (1)(b) The Producer Company, in which he is a director, has made a default in repayment of any advances or loans taken from any company or institution or any otherperson and such default continues for ninety days</option>
															 <option value="3">581 Q (1)(c) He has made a default in repayment of any advances or loans taken from the Producer Company in which he is a director.</option>
															 <option value="4">581 Q (1)(d)(i) The Producer Company, in which he is a director has not filed the annual accounts and annual return for any continuous three financial years commencing on or after the 1st day of April,2002.</option>
															 <option value="5">581 Q (1)(d)(ii) The Producer Company, in which he is a director has failed to, repay its deposit or withheld price or patronage bonus or interest thereon on due date, or pay dividend and such failure continues for one year or more.</option>
														     <option value="6">581 Q (1)(e) Default is made in holding election for the office of director, in the Producer Company in which he is a director,in accordance with the provisions of this Act and articles</option>
															 <option value="7">581 Q (1)(f) the annual general meeting or extraordinary general meeting of the Producer Company, in which he is a director,is not called in accordance with the provisions of this Act except due to natural calamity or such other reason</option>
														     <option value="8">Others</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													   <div class="form-group col-md-5" style="display:none" id="other">
														<label for="">Reason of Removal <span class="text-danger">*</span></label>
														<textarea class="form-control" id="other_reason" name="other_reason" required="required" data-validation-required-message="Select reason for removal"></textarea>
														<div class="help-block text-danger"></div>
													  </div>							
												</div>
										</div>										
										<div class="col-md-12 text-center">
											<button href="<?php echo base_url('staff/operation/editremoval/');?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Update</button>
											<a href="<?php echo base_url('staff/operation');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
//for white space
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
	
    $("#reason").change(function () {
        if ($(this).find("option:selected").val() == "8") {
            $("#other").show();
        } else {
            $("#other").hide();
        }
    });
	
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