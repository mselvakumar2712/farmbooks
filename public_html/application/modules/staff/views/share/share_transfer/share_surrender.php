<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

.selected {
    background-color: brown;
    color: #FFF;
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
                        <h1>Share Surrender</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('staff/share');?>">Share Management</a></li>
                            <li class="active">Share Surrender</li>
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
            <?php }elseif($this->session->flashdata('warning')){?>
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('warning');?></strong> 
            </div>
            <?php } ?>
            
            <div class="animated fadeIn">
                    <form action="<?php echo base_url('staff/share/postShareSurrender')?>" method="post" id="shareSurrenderForm" name="sentMessage" novalidate="novalidate" >
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
								    <div class="container-fluid">
                                                                         
                                        <div class="transfer_to_member" id="transfer_to_member" style="">
                                            
                                            <div class="row row-space">                
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress2">Surrender Member Mobile Number <span class="text-danger">*</span></label>
                                                    
                                                    <input type="hidden" class="form-control" name="transferor_member_id" id="transferor_member_id" placeholder="" required>
                                                    <input type="hidden" class="form-control" name="transferor_member_type" id="transferor_member_type" placeholder="" required>
                                                    
                                                    <input type="text" class="form-control numberOnly" id="transferor_member" maxlength="10" minlength="4" name="transferor_member" placeholder="Search member with mobile number" data-validation-required-message="Provide the search text" value="">
                                                    <div id="transferor_validate" class="with-errors text-danger"></div>
                                                </div>
												<div class="form-group col-md-4">
                                                    <label for="inputAddress2">Date of Surrender <span class="text-danger">*</span></label>                                                    
                                                    <input type="date" class="form-control" id="surrender_date" name="surrender_date" placeholder="Date" value="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>" data-validation-required-message="Provide the transfer date">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <label for="inputAddress2">Folio Number <span class="text-danger">*</span></label>                                                    
                                                    <input type="text" class="form-control numberOnly" name="folio_number" id="folio_number" placeholder="Folio Number" data-validation-required-message="Provide Folio number" readonly>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>     
                                            </div>   
                                            
                                            <div class="row row-space">
                                            <div class="table-responsive" id="allotment_detail_report">  
                                                <table class="table table-bordered" id="allotment_detail_table">
                                                    <thead>                                                        
                                                        <tr>		
                                                            <th class="text-center">Folio Number</th>
                                                            <th class="text-center">Holder Name</th>
                                                            <th class="text-center">Shares applied</th>
                                                            <th class="text-center">Shares Allotted</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="allotment_detail"></tbody>
                                                </table> 
                                            </div>  
                                            </div>
                                            
                                            <div class="row row-space" id="transferContent">        
                                                <div class="form-group col-md-3">
                                                    <label class=" form-control-label">Certificate Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" maxlength="6" name="certificate_number" id="certificate_number" placeholder="Certificate Number" data-validation-required-message="Provide certificate number">
                                                    <div id="certificate_validate" class="help-block with-errors text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class=" form-control-label">Distinctive Number From <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" name="distinctive_no_from" id="distinctive_no_from" placeholder="Distinctive No. From" data-validation-required-message="Provide distinctive no from share" readonly>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class=" form-control-label">Distinctive Number To <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" name="distinctive_no_to" id="distinctive_no_to" placeholder="Distinctive No. To" data-validation-required-message="Provide distinctive no from share" readonly>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class=" form-control-label">Reason for Surrender <span class="text-danger">*</span></label>
                                                    <textarea id="reason" rows="5" name="reason" class="form-control" placeholder="Reason for Surrender..." required></textarea>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>                                                                                                   
                                        </div>

                                        <!-- Button creation for submit -->
										<div class="form-row" id="buttonContent">
								            <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
								                <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Confirm</button>
												<a href="<?php echo base_url('staff/share/sharesurrender');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
</div>
		
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
$("#allotment_detail_report").hide();       
$("#transferContent").hide(); 
$("#buttonContent").hide();
    
    
$("#transferor_member").focusout(function() {
    var transferor_member = $(this).val();
    if(transferor_member != "") {       
        if(transferor_member.length == 10 && (transferor_member.charAt(0) == 6 || transferor_member.charAt(0) == 7 || transferor_member.charAt(0) == 8 || transferor_member.charAt(0) == 9)) {
            var search_member = {'mobilenumber':transferor_member, 'folio_number':""};
            searchTransferorMember(search_member);
        } else if(transferor_member.length == 4) {
            var search_member = {'folio_number':transferor_member, 'mobilenumber':""};
            searchTransferorMember(search_member);    
        } else {
            $("#transferor_validate").html("<div class='alert alert-danger'>Given format is wrong</div>");
            $("#transferor_member").focus();
            $(this).val('');
        }
    }
});   
    
function searchTransferorMember(search_member) {    
       $.ajax({
			url:"<?php echo base_url();?>staff/share/verifyMember",
			type:"POST",
			data:search_member,
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1) {                    
                    var member_share = "";
                    $.each(responseArray.member_share,function(key,value){                        
                        if(value.member_type == 1) {
                           var name = value.profile_name;
                        } else {
                           var name = value.producer_organisation_name;
                        }
                        member_share += '<tr><td>'+value.folio_number+'</td><td>'+name+'</td><td>'+value.share_applied+'</td><td>'+value.share_allotted+'</td></tr>';
                    });
                    $("#transferor_member_id").val(responseArray.member_data.holder_id);   
                    $("#transferor_member_type").val(responseArray.member_data.member_type);     
                    
                    $('#allotment_detail').html(member_share);
                    $("#allotment_detail_report").show();    
                    $("#transferContent").show();   
                    //$("#buttonContent").show();     
                    $("#transferor_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
				} else {
                    $("#transferor_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
                    $("#transferor_member").focus();
                    $("#transferor_member").val('');
                } 
            }
         });            
}  
 
    
/*    
$("#certificate_number").focusout(function() {
    var certificate_number = $(this).val();
    var folio_number = $("#allotment_detail tr.selected td:first").html();
    $("#folio_number").val(folio_number);
    var certificate_info = {'certificate_number':certificate_number, 'folio_number':folio_number};
    $.ajax({
			url:"<?php echo base_url();?>staff/share/getCertificateInfo",
			type:"POST",
			data:certificate_info,
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1) {    
                    $("#distinctive_no_from").val(responseArray.certificateInfo[0].distinctive_from);   
                    $("#distinctive_no_to").val(responseArray.certificateInfo[0].distinctive_to);	
                    $("#certificate_validate").html("<div class='alert alert-success'>Valid Certificate Number</div>");
                } else {                    
                    $("#certificate_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
                    $("#certificate_number").focus();
                    $("#certificate_number").val('');
                } 
            }
         });            
});
*/
    
    
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
      $('#transfer_date').attr('max', maxDate);				
});       

    

var table = document.getElementById('allotment_detail'),
    selected = table.getElementsByClassName('selected');
    table.onclick = highlight;
    
function highlight(e) {
    if (selected[0]) selected[0].className = '';
    e.target.parentNode.className = 'selected';  
    $("#buttonContent").show();     
} 
  
document.getElementById('certificate_number').oninput = function () {	
    var folio_number = $("#allotment_detail tr.selected td:first").html();
    $("#folio_no").val(folio_number);
	var transferor_member_id = $("#transferor_member_id").val();   
    var transferor_member_type = $("#transferor_member_type").val();
	var certificate_info = {'holder_id':transferor_member_id, 'member_type':transferor_member_type, 'folio_number':folio_number};
	//console.log(certificate_info);	
		$.ajax({
			url:"<?php echo base_url();?>staff/share/getCertificateInfo",
			type:"POST",
			data:certificate_info,
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                //console.log(responseArray);
                if(responseArray.status == 1) {    
					$("#certificate_number").val('');
					$("#certificate_number").attr('readonly', true);
                    $("#certificate_number").val(responseArray.certificateInfo[0].certificate_num);   
					$("#distinctive_no_from").val(responseArray.certificateInfo[0].distinctive_from);   
                    $("#distinctive_no_to").val(responseArray.certificateInfo[0].distinctive_to);	
                    $("#certificate_validate").html("<div class='alert alert-success'>Valid Certificate Number</div>");
                } else {                                        
                    $("#certificate_number").focus();                    
					$("#certificate_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
					$("#certificate_number").val('');
                } 
            }
        });  
};  
</script>
</body>
</html>