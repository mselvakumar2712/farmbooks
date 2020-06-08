<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$current_avaialable_share = (isset($total_avaialable_share))?$total_avaialable_share:0;
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
                        <h1>Allotment of Rights Share Issue </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="">Allotment of Shares </a></li>
                            <li class="active">Allotment of Rights Share Issue</li>
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
                            
                            <?php if($this->session->flashdata('success') && count($share_applied) != 0){ ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $this->session->flashdata('success');?></strong> 
                            </div>
                            <?php }elseif($this->session->flashdata('danger')){?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $this->session->flashdata('danger');?></strong> 
                            </div>
                            <?php }elseif($this->session->flashdata('warning')){?>
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $this->session->flashdata('warning');?></strong> 
                            </div>
                            <?php } ?>
                            
						    <div class="container-fluid">
								<form action="<?php echo base_url('fpo/share/postCalculateRights'); ?>" id="rightsCalculationForm" novalidate="novalidate" method="post">
								<div id="rights_shares">
									<div class="row row-space">
										<div class="form-group col-md-2"></div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Resolution Number <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly" value="<?php echo (!empty($resolution_number))?$resolution_number:$last_bonus_id; ?>" maxlength="15" id="rights_resolution_number" name="rights_resolution_number" placeholder="Resolution Number" required="required" data-validation-required-message="Enter the resolution number">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Resolution Date <span class="text-danger">*</span></label>	
											<input type="date" class="form-control" id="rights_resolution_date" name="rights_resolution_date" placeholder="Resolution Date" required="required" data-validation-required-message="Enter the resolution date" value="<?php echo (!empty($resolution_date))?$resolution_date:date("Y-m-d"); ?>">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3" id="rights_shares_detail1">
											<label for="inputAddress2">Cut-off Date <span class="text-danger">*</span></label>	
											<input type="date" class="form-control" id="rights_cutoff_date" name="rights_cutoff_date" placeholder="Cut-off date" required="required" data-validation-required-message="Select the cut-off date" value="<?php echo (!empty($cutoff_date))?$cutoff_date:date("Y-m-d"); ?>">
											<p class="help-block text-danger"></p>
										</div>
									</div>

									<div class="row row-space" id="rights_shares_detail2">
										<div class="form-group col-md-2"></div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Existing Share (Ratio) <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly" maxlength="3" id="rights_existing_shares" name="rights_existing_shares" placeholder="Existing Share" required="required" data-validation-required-message="Enter existing share" value="<?php echo (!empty($existing_shares))?$existing_shares:""; ?>">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">New Share (Ratio) <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly" maxlength="3" id="rights_new_shares" name="rights_new_shares" placeholder="New Share" required="required" data-validation-required-message="Enter the new share" value="<?php echo (!empty($new_shares))?$new_shares:""; ?>">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-2 mt-4">
                                            <button id="sendMessageButton" value="Calculate" class="btn-fs btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Calculate</button>
										</div>
									</div>
								</div>
								</form>
                                
                                
								<form action="<?php echo base_url('fpo/share/postRightsShares')?>" name="sentMessage" id="allotmentForm" novalidate="novalidate" method="post"> 
                                    <div class="table-responsive" id="rights_detail_report">  
										<table class="table table-bordered">
											<thead>
												<tr>		
													<th colspan="2" class="text-center">Resolution Date: <?php echo (!empty($resolution_number))?$resolution_number:$last_bonus_id;; ?></th>
													<th colspan="4" class="text-center">Resolution Number: <?php echo (!empty($resolution_date))?$resolution_date:date("Y-m-d"); ?></th>		
												</tr>
												<tr>		
													<th class="text-center">S.No</th>
													<th class="text-center">Member Name</th>
													<th class="text-center">Folio Number</th>
												    <th class="text-center">Existing Share</th>
													<th class="text-center">Rights Share</th>
													<th class="text-center">Total Share</th>
												</tr>
											</thead>
											<tbody id="right_share_details">
                                                <input type="hidden" class="form-control" value="<?php echo (!empty($resolution_number))?$resolution_number:$last_bonus_id; ?>" id="rights_resolution_number" name="rights_resolution_number">
                                                <input type="hidden" class="form-control" id="rights_resolution_date" name="rights_resolution_date" value="<?php echo (!empty($resolution_date))?$resolution_date:date("Y-m-d"); ?>">
                                                <input type="hidden" class="form-control" id="rights_cutoff_date" name="rights_cutoff_date" value="<?php echo (!empty($cutoff_date))?$cutoff_date:date("Y-m-d"); ?>">
                                                <?php if(isset($share_applied)) {
                                                    for($i=0;$i<count($share_applied);$i++) { 
                                                    $rights_shares = ($new_shares/$existing_shares*$share_applied[$i]->total_share_value);
													$rights_share = round($rights_shares);
													
													if($rights_share > $total_avaialable_share){
														$avaialable_share = $total_avaialable_share;
														$total_avaialable_share = 0;
													} else {
														$total_avaialable_share = $total_avaialable_share - $rights_share;
														$avaialable_share = $rights_share;
													}
												?>
                                                <tr>
                                                     <td class="text-left">
                                                         <?php echo ($i+1); ?>
                                                        <input type="hidden" name="share_applied[<?php echo $i; ?>][share_id]" id="share_id" value="<?php echo $share_applied[$i]->id; ?>" class="">
                                                    </td> 
													 <td>
                                                         <input type="hidden" name="share_applied[<?php echo $i; ?>][member_type]" id="member_type" value="<?php echo $share_applied[$i]->member_type; ?>" class="">
                                                         <input type="hidden" name="share_applied[<?php echo $i; ?>][holder_id]" id="holder_id" value="<?php echo $share_applied[$i]->holder_id; ?>" class="">
                                                        <?php 
                                                            if($share_applied[$i]->member_type == 1) {
                                                                echo $share_applied[$i]->profile_name;
                                                            } else {
                                                                echo $share_applied[$i]->producer_organisation_name;        
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <input type="text" name="share_applied[<?php echo $i; ?>][folio_number]" id="folio_number" value="<?php echo $share_applied[$i]->folio_number; ?>" class="form-control" readonly>
													</td>	
													<td class="text-right"><input type="text" name="share_applied[<?php echo $i; ?>][existing_share_value]" id="existing_share_value" value="<?php echo $share_applied[$i]->total_share_value; ?>" class="form-control numberOnly" maxlength="4" readonly></td>
                                                    <td class="text-right"><input type="text" name="share_applied[<?php echo $i; ?>][new_share_value]" id="new_share_value" value="<?php echo $avaialable_share; ?>" class="form-control numberOnly <?php echo 'rightShare_'.$i; ?>" maxlength="4" onfocusout="verifyTotalAvailableShare(this.value, '<?php echo 'rightShare_'.$i; ?>', '<?php echo $share_applied[$i]->total_share_value; ?>')"></td>
													<td class="text-right"><input type="text" name="share_applied[<?php echo $i; ?>][total_share_value]" id="total_share_value" value="<?php echo $share_applied[$i]->total_share_value+round($rights_share); ?>" class="form-control numberOnly" maxlength="4" readonly></td>
                                                </tr>	
                                                <?php }} ?>					
											</tbody>													
										</table> 
									</div>									                                    
									<p><tt id="results"></tt></p>
									<div class="row row-space" id="buttonContent">
										<div class="col-md-12 text-center">
                                        <button id="sendMessageButton" value="Confirm" class="btn-fs btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Confirm</button>
								        <a href="<?php echo base_url('fpo/share/sharerightissue'); ?>" class="btn-fs btn btn-outline-dark mt-10"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
$('#rights_detail_report').hide();
$('#rights_calculate').hide();
$('#rights_shares_detail1').hide();
$('#rights_shares_detail2').hide();
$('#buttonContent').hide();
    
var rights_resolution_number = document.getElementById('rights_resolution_number').value;
var rights_resolution_date = document.getElementById('rights_resolution_date').value;
if(rights_resolution_number & rights_resolution_date !=''){
	$('#rights_shares_detail1').show();
	$('#rights_shares_detail2').show();
}
    
$('input').on('keyup input', function () {		
		var arrayrights=[];
		
		var rights_resolution_number = $("#rights_resolution_number").val();
		var rights_resolution_date = $("#rights_resolution_date").val();
		
		if(rights_resolution_number){
		arrayrights.push(rights_resolution_number);
		} 

		if(rights_resolution_date){
		   arrayrights.push(rights_resolution_date);
		}
        
		if(arrayrights.length==2){
		   $('#rights_shares_detail').show();
		}else{
			 $('#rights_shares_detail').hide();
		}
});
	
$(document).ready(function() {	
    var resolution_number = "<?php echo (!empty($resolution_number))?$resolution_number:""; ?>";
    var resolution_date = "<?php echo (!empty($resolution_date))?$resolution_date:""; ?>";
    var sharecount = "<?php echo (!empty($share_applied))?count($share_applied):""; ?>";
    $('#rights_shares_detail1').show();
	$('#rights_shares_detail2').show();
    if(resolution_number && resolution_date !='' && sharecount!=0){
       
        $("#rights_resolution_date").attr("readonly", true);$("#rights_cutoff_date").attr("readonly", true);
        $("#rights_existing_shares").attr("readonly", true);$("#rights_new_shares").attr("readonly", true);
        $('#rights_detail_report').show();
        $('#buttonContent').show();
    } else if(resolution_number & resolution_date !='' && sharecount == 0){
        swal('Sorry!',"Don't have any share applied shareholders");
    }
    
    $('#calculate_rights').click(function() {
		var rights_date=document.getElementById('rights_cutoff_date').value;
		var rights_exst_share=document.getElementById('rights_existing_shares').value;
		var rights_new_share=document.getElementById('rights_new_shares').value;

		if(rights_date==''){
			swal('Sorry!',"Provide the cut off date");
			return false;
		} else if(rights_exst_share==''){
			swal('Sorry!',"Provide the existing share value");
			return false;
		} else if(rights_new_share==''){
			swal('Sorry!',"Provide the new share value");
			return false;
		} else {
			 $('#rights_detail_report').show();	
		}            
    });
    
    
    /** Total Share Calculation by share applied share holders list **/
    $('#rights_detail_report').on('focusout', 'tr input[id="new_share_value"]', function () {
        var rights_share = +$(this).parents('tr').find('input[id="new_share_value"]').val(); 
        var existing_share = +$(this).parents('tr').find('input[id="existing_share_value"]').val();
        $(this).parents('tr').find('input[id="total_share_value"]').val(existing_share+rights_share);
    });
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
      $('#rights_cutoff_date').attr('max', maxDate);		
});    

function verifyTotalAvailableShare(shareAlloted, shareAllotedHolder, shareApplied){
	if(Number(shareAlloted) <= Number(shareApplied)){
		var shareAvailable = "<?php echo $current_avaialable_share; ?>"; 
		var tempTotalShare = 0;
		$('#right_share_details #new_share_value').each(function(){
			tempTotalShare = (Number(tempTotalShare)+Number($(this).val()));
		});
		
		if(Number(tempTotalShare) > Number(shareAvailable)){
			swal("Sorry!", "Current share should not exceeds the avaialable share", "warning");
			//$('#buttonContent').hide();		
			$('.'+shareAllotedHolder).val('');
			//$('.'+shareAllotedHolder).focus();
		} else {
			$('#buttonContent').show();
		}
	} else {
		swal("Sorry!", "Right share should not exceeds the Existing share", "warning");
		$('.'+shareAllotedHolder).val('');
		//$('.'+shareAllotedHolder).focus();
	}
}
   
</script> 
</body>
</html>
