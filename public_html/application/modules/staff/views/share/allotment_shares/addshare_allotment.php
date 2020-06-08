<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI = get_instance();
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
                        <h1>Allotment of Original Share Issue </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="">Allotment of Shares</a></li>
                            <li class="active">Allotment of Original Share Issue</li>
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
								<form action="<?php echo base_url('staff/share/postShareAllotment')?>" name="sentMessage" id="allotmentForm" novalidate="novalidate" method="post">                                   
									<div class="table-responsive" id="allotment_detail_report">  
										<table class="table table-bordered">
											<thead>
												<tr>		
													<th colspan="2" class="text-center">Resolution Date: <?php echo date("Y-m-d"); ?></th>
													<th colspan="3" class="text-center">Resolution Number: <?php echo $last_allot_id; ?></th>		
												</tr>
												<tr>		
													<th class="text-center">S.No</th>
													<th class="text-center">Holder Name</th>
													<th class="text-center">Folio Number</th>
													<th class="text-center">Shares applied</th>
												    <th class="text-center">Shares Allotted</th>
												</tr>
											</thead>
											<tbody>
                                                <?php if(isset($share_application)) {
                                                    for($i=0;$i<count($share_application);$i++) { ?>
                                                <tr>
                                                    <td class="text-left"><?php echo ($i+1); ?></td>
                                                    <td >
                                                        <?php 
                                                            if($share_application[$i]->member_type == 1) {
                                                                echo $share_application[$i]->profile_name;
                                                            } else {
                                                                echo $share_application[$i]->producer_organisation_name;        
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
														<?php 
														$allottedFolioNo = $CI->Share_Model->getShareHolersFolioNo($share_application[$i]->holder_id, $share_application[$i]->member_type);
														if($allottedFolioNo != null && $allottedFolioNo->folio_number) {
															echo $allottedFolioNo->folio_number;
														} else {
															echo str_pad($share_application[$i]->id, 4, '0', STR_PAD_LEFT);
														}
														?>
													</td>
                                                    <td class="text-right"><?php echo $share_application[$i]->no_of_share; ?></td>
                                                    <td class="text-right"><?php echo $share_application[$i]->no_of_share; ?></td>
                                                </tr>	
                                                <?php }} ?>					
											</tbody>													
										</table> 
									</div>                                                                     
									<div id="original_shares">
									<div class="row row-space">
										<div class="form-group col-md-2">
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Resolution Number <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly" maxlength="6" id="resolution_number" name="resolution_number" placeholder="Resolution Number" required="required" data-validation-required-message="Enter resolution number" value="<?php echo $last_allot_id; ?>">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Resolution Date<span class="text-danger">*</span></label>	
											<input type="date" class="form-control" id="resolution_date" name="resolution_date" placeholder="Resolution Date" required="required" data-validation-required-message="Enter resolution date" value="<?php echo date("Y-m-d"); ?>">
											<p class="help-block text-danger"></p>
										</div>
									</div>
                                        
									<div id="original_shares_detail">
                                    <?php if(isset($share_application)) {
                                          for($i=0;$i<count($share_application);$i++) { 
                                            if($share_application[$i]->member_type == 1) {
                                                $share_holder_name = $share_application[$i]->profile_name;
                                                $share_holder_id = $share_application[$i]->holder_id;												
                                            } else {
                                                $share_holder_name = $share_application[$i]->producer_organisation_name;  
                                                $share_holder_id = $share_application[$i]->holder_id;
                                            }
											$allottedFolioNo = $CI->Share_Model->getShareHolersFolioNo($share_application[$i]->holder_id, $share_application[$i]->member_type);
                                        ?>
									<div class="row row-space">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Share Holder Name <span class="text-danger">*</span></label>	
                                            <input type="hidden" id="application_id" name="<?php echo "share_application[".$i."][application_id]"; ?>" value="<?php echo $share_application[$i]->mobile_number; ?>">
                                            <input type="hidden" id="member_type" name="<?php echo "share_application[".$i."][member_type]"; ?>" value="<?php echo $share_application[$i]->member_type; ?>">
                                            <input type="hidden" id="holder_id" name="<?php echo "share_application[".$i."][holder_id]"; ?>" value="<?php echo $share_holder_id; ?>">
											<input type="text" class="form-control" id="farmer_name" name="<?php echo "share_application[".$i."][farmer_name]"; ?>" placeholder="Farmer Name" required="required" data-validation-required-message="Enter farmer name" value="<?php echo $share_holder_name; ?>" readonly>
									        <p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">											
											<label for="inputAddress2">Folio Number <span class="text-danger">*</span></label>	
											<?php if($allottedFolioNo != null && $allottedFolioNo->folio_number) { ?>
												<input type="text" class="form-control numberOnly" maxlength="4" id="original_folio_number" name="<?php echo "share_application[".$i."][folio_no]"; ?>" placeholder="Folio Number" required="required" data-validation-required-message="Enter folio number" value="<?php echo $allottedFolioNo->folio_number; ?>" readonly>
											<?php } else { ?>
												<input type="text" class="form-control numberOnly" maxlength="4" id="original_folio_number" name="<?php echo "share_application[".$i."][folio_no]"; ?>" placeholder="Folio Number" required="required" data-validation-required-message="Enter folio number" value="<?php echo str_pad($share_application[$i]->id, 4, '0', STR_PAD_LEFT); ?>" readonly>
											<?php } ?>
 											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">Shares Applied <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly" maxlength="4" id="original_shares_applied" name="<?php echo "share_application[".$i."][share_applied]"; ?>" placeholder="Shares Applied" required="required" data-validation-required-message="Enter shares applied" value="<?php echo $share_application[$i]->no_of_share; ?>">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">Shares Allotted <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly" maxlength="3" id="original_shares_alloted" name="<?php echo "share_application[".$i."][share_alloted]"; ?>" placeholder="Shares Allotted" required="required" data-validation-required-message="Enter shares allotted" value="<?php echo $share_application[$i]->no_of_share; ?>">
											<p class="help-block text-danger"></p>
										</div>
									</div>
                                    <?php }} ?>
									</div>
                                        
									</div>                                 
									
                                    
									<p><tt id="results"></tt></p>
									<div class="row row-space" id="buttonContent" style="">
										<div class="col-md-12 text-center">							 
										<button id="sendMessageButton" value="Confirm" class="btn-fs btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Confirm</button>
								        <a href="<?php echo base_url('staff/share/shareallotment')?>" class="btn-fs btn btn-outline-dark mt-10"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>		  
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
<script> 	
//$('#original_shares_detail').hide();
var resolution_number = document.getElementById('resolution_number').value;
var resolution_date = document.getElementById('resolution_date').value;
if(resolution_number!= "" & resolution_date!= ""){
    $('#original_shares_detail').show();
    $('#buttonContent').show();
}else{
    $('#original_shares_detail').hide();
    $('#buttonContent').hide();
}
    
var shareCount = "<?php echo count($share_application); ?>"; 
if(shareCount!=0) {
    $('#buttonContent').show();
} else {
    $('#buttonContent').hide();
}
    
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
      $('#resolution_date').attr('max', maxDate);		
});       
</script> 
</body>
</html>
