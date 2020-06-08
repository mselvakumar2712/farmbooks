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
                        <h1>Allotment  of Shares </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="">Share</a></li>
                            <li class="active">Allotment of Shares  </li>
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
								<form action="<?php echo base_url('administrator/share/postShareAllotment')?>" name="sentMessage" id="allotmentForm" novalidate="novalidate" method="post">
								   <div class="row row-space">
									<div class="form-group col-md-4">
									</div>
									<div class="form-group col-md-4">
									 <label for="inputState">Nature of Allotment<span class="text-danger">*</span></label>
									  <select id="allotment_nature" name="allotment_nature" class="form-control" required="required" data-validation-required-message="Please select nature of allotment.">
										<option value="">Select Nature of Allotment</option>
										<option value="1"> Original Issue</option>
										<option value="2"> Bonus Issue</option>
										<option value="3">Rights Issue</option>
									  </select>
									   <p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-4">
									</div>
									</div>
                                    
									<div class="table-responsive" id="allotment_detail_report">  
										<table class="table table-bordered">
											<thead>
												<tr>		
													<th colspan="2" class="text-center">Resolution Date </th>
													<th colspan="3"  class="text-center">Resolution Number</th>		
												</tr>
												<tr>		
													<th class="text-center">S.No</th>
													<th class="text-center">Farmer Name</th>
													<th class="text-center">Folio Number </th>
													<th class="text-center">Shares applied </th>
												    <th class="text-center">Shares Allotted </th>
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
                                                    <td class="text-right"><?php echo str_pad($share_application[$i]->id, 4, '0', STR_PAD_LEFT); ?></td>
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
											<input type="text" class="form-control numberOnly" maxlength="3" id="resolution_number" name="resolution_number" placeholder="Resolution Number" required="required" data-validation-required-message="Enter resolution number" value="<?php echo $last_allot_id; ?>" readonly>
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
                                        ?>
									<div class="row row-space">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Share Holder Name <span class="text-danger">*</span></label>	
                                            <input type="hidden" id="application_id" name="<?php echo "share_application[".$i."][application_id]"; ?>" value="<?php echo $share_application[$i]->id; ?>">
                                            <input type="hidden" id="member_type" name="<?php echo "share_application[".$i."][member_type]"; ?>" value="<?php echo $share_application[$i]->member_type; ?>">
                                            <input type="hidden" id="holder_id" name="<?php echo "share_application[".$i."][holder_id]"; ?>" value="<?php echo $share_holder_id; ?>">
											<input type="text" class="form-control" id="farmer_name" name="<?php echo "share_application[".$i."][farmer_name]"; ?>" placeholder="Farmer Name" required="required" data-validation-required-message="Enter farmer name" value="<?php echo $share_holder_name; ?>">
									        <p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Folio Number <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly" maxlength="4" id="original_folio_number" name="<?php echo "share_application[".$i."][folio_no]"; ?>" placeholder="Folio Number" required="required" data-validation-required-message="Enter folio number" value="<?php echo str_pad($share_application[$i]->id, 3, '0', STR_PAD_LEFT); ?>">
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
                                    
                                    
									<div id="bonus_shares">
									<div class="row row-space">
										<div class="form-group col-md-2">
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Resolution Number <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly"  maxlength="15" id="bonus_resolution_number" name="bonus_resolution_number" placeholder="Resolution Number" required="required" data-validation-required-message="Please enter resolution number.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Resolution Date<span class="text-danger">*</span></label>	
											<input type="date" class="form-control"   id="bonus_resolution_date" name="bonus_resolution_date" placeholder="Resolution Date" required="required" data-validation-required-message="Please enter resolution date.">
											<p class="help-block text-danger"></p>
										</div>
									</div>
                                        
									<div id="bonus_shares_detail">
									<div class="row row-space">
									    <div class="form-group col-md-1 ">
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Cut-off date<span class="text-danger">*</span></label>	
											<input type="date" class="form-control"  id="bonus_cutoff_date" name="bonus_cutoff_date" placeholder="Cut-off date" required="required" data-validation-required-message="Please select cut-off date.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Existing Share (Ratio) <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly"  maxlength="3" id="bonus_existing_shares" name="bonus_existing_shares" placeholder="Existing Share" required="required" data-validation-required-message="Please enter existing share .">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">New Share (Ratio) <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly"  maxlength="3" id="bonus_new_shares" name="bonus_new_shares" placeholder="New Share" required="required" data-validation-required-message="Please enter new share .">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-2 mt-4">
											<input  value="Calculate" id="calculate_bonus" class="btn btn-success text-center mt-1" type="button">
										
										</div>
									</div>
									</div>
                                        
									<div id="bonus_calculate">
									<div class="row row-space">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Folio Number<span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  id="bonus_folio_num" name="bonus_folio_num" placeholder="Folio Number" required="required" data-validation-required-message="Please select folio number.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Member Name<span class="text-danger">*</span></label>	
											<input type="text" class="form-control" id="bonus_member_name" name="bonus_member_name" placeholder="Member Name" required="required" data-validation-required-message="Please enter member name .">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Existing Share<span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  id="bonus_existing_shares" name="bonus_existing_shares" placeholder="Existing Share" required="required" data-validation-required-message="Please enter existing share .">
											<p class="help-block text-danger"></p>
										</div>										
									</div>
									<div class="row row-space">
										<div class="form-group col-md-4">
											<label for="inputAddress2">New Share <span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  id="bonus_new_share" name="bonus_new_share" placeholder="New Share" required="required" data-validation-required-message="Please select new share.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Total Shares <span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  maxlength="3" id="bonus_total_shares" name="bonus_total_shares" placeholder="Total Shares" required="required" data-validation-required-message="Please enter total shares .">
											<p class="help-block text-danger"></p>
										</div>									
									</div>
									</div>
									</div>
                                    
                                    
									<div id="right_shares">
									<div class="row row-space">
										<div class="form-group col-md-2">
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Resolution Number <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly"  maxlength="15" id="rights_resolution_number" name="rights_resolution_number" placeholder="Resolution Number" required="required" data-validation-required-message="Please enter resolution number.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Resolution Date<span class="text-danger">*</span></label>	
											<input type="date" class="form-control"   id="rights_resolution_date" name="rights_resolution_date" placeholder="Resolution Date" required="required" data-validation-required-message="Please enter resolution date.">
											<p class="help-block text-danger"></p>
										</div>
									</div>
                                        
									<div id="rights_shares_detail">
									<div class="row row-space">
										 <div class="form-group col-md-1 ">
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Cut-off date<span class="text-danger">*</span></label>	
											<input type="date" class="form-control"  id="bonus_cutoff_date" name="bonus_cutoff_date" placeholder="Cut-off date" required="required" data-validation-required-message="Please select cut-off date.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Existing Share (Ratio) <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly"  maxlength="3" id="bonus_existing_shares" name="bonus_existing_shares" placeholder="Existing Share" required="required" data-validation-required-message="Please enter existing share .">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">New Share (Ratio) <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly"  maxlength="3" id="bonus_new_shares" name="bonus_new_shares" placeholder="New Share" required="required" data-validation-required-message="Please enter new share .">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-2 mt-4">
											<input  value="Calculate" id="calculate_rights" class="btn btn-success text-center mt-1" type="button">
										
										</div>
									</div>
									</div>
                                        
									<div id="rights_calculate">
									<div class="row row-space">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Folio Number<span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  id="bonus_folio_num" name="bonus_folio_num" placeholder="Folio Number" required="required" data-validation-required-message="Please select folio number.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Member Name<span class="text-danger">*</span></label>	
											<input type="text" class="form-control" id="bonus_member_name" name="bonus_member_name" placeholder="Member Name" required="required" data-validation-required-message="Please enter member name .">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Existing Share<span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  id="bonus_existing_shares" name="bonus_existing_shares" placeholder="Existing Share" required="required" data-validation-required-message="Please enter existing share .">
											<p class="help-block text-danger"></p>
										</div>										
									</div>
									<div class="row row-space">
										<div class="form-group col-md-4">
											<label for="inputAddress2">New Share <span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  id="bonus_new_share" name="bonus_new_share" placeholder="New Share" required="required" data-validation-required-message="Please select new share.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Total Shares <span class="text-danger">*</span></label>	
											<input type="text" class="form-control"  maxlength="3" id="bonus_total_shares" name="bonus_total_shares" placeholder="Total Shares" required="required" data-validation-required-message="Please enter total shares .">
											<p class="help-block text-danger"></p>
										</div>									
									</div>
									</div>
									</div>
                                    
                                    
									<p><tt id="results"></tt></p>
									<div class="row row-space">
										<div class=" col-md-12 text-center">							 
										<input id="sendMessageButton" value="Confirm" class="btn btn-success text-center mt-10" type="submit">
										 <a href=""><input id="back" value="Cancel" class="btn btn-outline-dark text-center mt-10" type="button"></a>				  
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
    $('#allotment_detail_report').hide();
	$('#original_shares').hide();
	$('#rights_shares_detail').hide();
	$('#bonus_calculate').hide();
	$('#rights_calculate').hide();
	$('#bonus_shares').hide();
	$('#right_shares').hide();
	$('#original_shares_detail').hide();
	$('#bonus_shares_detail').hide();
	$('select[name="allotment_nature"]').on('change', function() {
		var allotment = $(this).val();
		
		if(allotment == 1) { 
			 $('#allotment_detail_report').show();
			 $('#original_shares').show();
			 $('#bonus_shares').hide();
			 $('#right_shares').hide();
		}else if(allotment == 2) { 
			 $('#allotment_detail_report').show();
			 $('#bonus_shares').show();
			 $('#original_shares').hide();
			 $('#right_shares').hide();
		}else if(allotment == 3) { 
			 $('#allotment_detail_report').show();
			 $('#right_shares').show();
			 $('#bonus_shares').hide();
			 $('#original_shares').hide();
		}		
	});
    
	$('input').on('keyup input', function () {
		
		var arrayval=[];
		var arraybonus=[];
		var arrayrights=[];
		var resolution_number = $("#resolution_number").val();
		var resolution_date = $("#resolution_date").val();
		if(resolution_number){
		arrayval.push(resolution_number);
		} 

		if(resolution_date){
		   arrayval.push(resolution_date);
		}

		if(arrayval.length==2){
		   $('#original_shares_detail').show();
		}else{
			 $('#original_shares_detail').hide();
		}

		var bonus_resolution_number = $("#bonus_resolution_number").val();
		var bonus_resolution_date = $("#bonus_resolution_date").val();
		
		if(bonus_resolution_number){
		arraybonus.push(bonus_resolution_number);
		} 

		if(bonus_resolution_date){
		   arraybonus.push(bonus_resolution_date);
		}
        
		if(arraybonus.length==2){
		   $('#bonus_shares_detail').show();
		}else{
			 $('#bonus_shares_detail').hide();
		}
		
		
		
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
    $('#calculate_bonus').click(function() {    		  
        $('#bonus_calculate').show();		
    });
	$('#calculate_rights').click(function() {
	    $('#rights_calculate').show();		
	});
}); 
    

</script> 
</body>
</html>
