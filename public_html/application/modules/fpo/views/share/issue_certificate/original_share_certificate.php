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
                        <h1>Issue of Original Share Certificate</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Issue of Share Certificate</a></li>
                            <li class="active">Issue of Original Share Certificate</li>
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
                    <form action="<?php echo base_url('fpo/share/postOriginalCertificate')?>" novalidate="novalidate" method="post" >
					<div class="row">
					<div class="col-md-12">
					<div class="card">
						<div class="card-body">
						<div class="container-fluid">
															 
						<div class="farmer_to_member_form" id="farmer_to_member_form" style="">                                           
						<div class="row row-space mt-4" >
							<div class="form-group col-md-1">
							</div>
							<div class="form-group col-md-3">
								<label for="inputAddress2">Resolution Number </label>	
								<input type="text" class="form-control numberOnly" maxlength="10" id="resolution_number" name="resolution_number" placeholder="Resolution Number" >
							</div>
						   <div class="form-group col-md-3">
								<label for="inputAddress2">Resolution Date</label>	
								<input type="date" class="form-control" id="resolution_date" name="resolution_date" placeholder="Resolution Date" >
							</div>
							<div class="form-group col-md-1 mt-4 text-center">
								<button  id="searchSubmit" class="btn-fs btn btn-success text-center" type="submit">Search</button>
							 </div>	
							<div class="form-group text-center col-md-3 mt-4  ml-3">
								<label id="certificate_id0"></label>	
							</div>
						</div>   
					</form>
							<form action="<?php echo base_url('fpo/share/postIssueOriginalCertificate'); ?>" novalidate="novalidate" method="post" >
                    
									<?php if(isset($list_member)) {
                                    for($i=0;$i<count($list_member);$i++) { ?>
                                    <input type="hidden" id="holder_id" name="<?php echo "list_member[".$i."][holder_id]"; ?>" value="<?php echo $list_member[$i]->holder_id; ?>">
									<input type="hidden" id="share_id" name="<?php echo "list_member[".$i."][share_id]"; ?>" value="<?php echo $list_member[$i]->id; ?>">
                               		<?php ($i+1); ?>
									<div class="row row-space mt-4" id="list_details">    
										<div class="form-group col-md-2">
											<label for="inputAddress2">Folio Number <span class="text-danger">*</span></label>	
											<input type="text" class="form-control folio" name="list_member[<?php echo $i; ?>][folio_number]" id="folio_number<?php echo $i; ?>" value="<?php echo $list_member[$i]->folio_number; ?>" placeholder="Folio Number" readonly>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">No. of Shares <span class="text-danger">*</span></label>	
											<input type="text" class="form-control shares" id="no_shares<?php echo $i; ?>" name="list_member[<?php echo $i; ?>][no_shares]" value="<?php echo $list_member[$i]->total_share_value; ?>" placeholder="No. of Shares" readonly>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">Certificate No. <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly certificate" id="certificate_num<?php echo $i; ?>" <?php if(!empty($list_member[$i]->certificate_num)) { echo "readonly"; } ?> name="list_member[<?php echo $i; ?>][certificate_num]" value="<?php echo (!empty($list_member[$i]->certificate_num))?$list_member[$i]->certificate_num:''; ?>" maxlength="15" placeholder="Certificate Number" >
											<span id="certificate_id0" class="text-warning"></span>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Distinctive number from <span class="text-danger">*</span></label>	
											<input type="text" class="form-control numberOnly no_from" <?php if(!empty($list_member[$i]->distinctive_from)) { echo "readonly"; } ?> name="list_member[<?php echo $i; ?>][distinctive_from]" id="distinctive_from<?php echo $i; ?>" value="<?php echo (!empty($list_member[$i]->distinctive_from))?$list_member[$i]->distinctive_from:''; ?>" maxlength="12" placeholder="Distinctive number from" >
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Distinctive number to <span class="text-danger">*</span></label>	
											<input type="text" class="form-control no_to" id="distinctive_to<?php echo $i; ?>" name="list_member[<?php echo $i; ?>][distinctive_to]" value="<?php echo (!empty($list_member[$i]->distinctive_to))?$list_member[$i]->distinctive_to:''; ?>" placeholder="Distinctive number to" readonly>
											<p class="help-block text-danger"></p>
										</div>
									</div>
										<?php }} if(!empty($list_member)){?>
																			
                                        <!-- Button creation for submit -->
										<div class="form-row">
											<div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="Buttonsubmit" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('fpo/share/originalsharecertificate'); ?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
										    </div>											 
									    </div>
										<?php } ?>		
										<?php if(empty($list_member)){ ?>
										<div class="form-row mt-4 ">
										<div class="form-group col-md-12 text-center">
										<p class=" text-danger">There is no data to search original shares</p>
										</div>
										</div>
										<?php } ?>											
									</form>
								  </div>
							   </div>
						    </div>
				        </div>
				  </div>									
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

$("#searchSubmit").click(function() {
	var resolution_number=document.getElementById("resolution_number").value;
    var resolution_date=document.getElementById("resolution_date").value;

	if( resolution_number || resolution_date != "")
	{
	return true;
		
	}else{
		
		swal('',"Please Enter Resolution Number or Select Resolution Date");
		return false;
	}

	});
$('#Buttonsubmit').click(function(){  

var validate = true;
$("#list_details").closest('.row').find('input[type=text]').each(function(){
	
if($(this).val() == ""){
		validate = false;
	}
});

if(validate){	
	return true;// you can submit form or send ajax or whatever you want here
}else{			
	swal('',"Provide all the data's");
	return false;
}

});
var certificate_id="<?php echo $certificate_num; ?>";
if(certificate_id != 0){	
	$("#certificate_id0").html('Last Certificate No:'+certificate_id);
}else{
	$("#certificate_id0").html('Last Certificate No: -');
}

$('#list_details input').on('change', function () {
	var row = $(this).closest('.row');
	var no_from = $('.no_from', row).val();
	var shares = $('.shares', row).val();
	var num_to = $('.no_to', row).val();
	var certificate = $('.certificate', row).val();
	var no_to=$('.no_to', row);
	if(no_from){
		share_value1=parseInt(no_from);
		share_value2=parseInt(shares);
		var calculate=((share_value1)+(share_value2)-1);
		var cal_val=no_to.val(calculate);		
	}
	var certificate_inputs = document.getElementsByClassName("certificate");
	var distinctive_from = document.getElementsByClassName("no_from");
	var distinctive_to = document.getElementsByClassName("no_to");
	var sharesval = document.getElementsByClassName("shares");
	var certify=parseInt(certificate);
	if(certificate)	{		
		for (var j=0; j < certificate_inputs.length; j++ ) {

			var input_val=certificate_inputs[j].value;
			//var certify_val=((certify) +(j));console.log(certify);
			//console.log("Name: "+certificate_inputs[i].id+" Value: "+certificate_inputs[i].value);
			
			if(input_val == ''){
				var certify_val = parseInt($("#"+certificate_inputs[j-1].id).val()) + 1;
				$("#"+certificate_inputs[j].id+"").val(certify_val);
				//var certify_val1=((certify) +(j));console.log(certify);
				//console.log("Name: "+certificate_inputs[i].id+" Value: "+certificate_inputs[i].value);
				//$("#"+certificate_inputs[j].id+"").val(certify_val1);
			}
		}
	}
	
	if(no_from !='')	{		

	for (var i=0; i < distinctive_from.length; i++ ) {
		if(i != 0){
		//var no_from_val=parseInt(no_from);
		//var no_to_val=parseInt(no_to.val());	
		var input_values=distinctive_to[i].value;
		
		if(no_from){
			//var no_fromval=((no_to_val) +(i));
			//$("#"+distinctive_from[i].id+"").val(no_fromval);
			/*var share_value5=parseInt(sharesval[i].value);
			var share_value6=parseInt(distinctive_from[i].value);
			var calculate_to2=((share_value5)+(share_value6)-1);
			$("#"+distinctive_to[i].id+"").val(calculate_to2);*/
			
		}
		
		if(input_values ==''){
			//var no_fromval=((no_to_val) +(i));
			var no_fromval = parseInt($("#"+distinctive_to[i-1].id+"").val()) + 1;
			$("#"+distinctive_from[i].id+"").val(no_fromval);
			var share_value5=parseInt(sharesval[i].value);
			var share_value6=parseInt(distinctive_from[i].value);
			var calculate_to2=((share_value5)+(share_value6)-1);
			$("#"+distinctive_to[i].id+"").val(calculate_to2);

		}
		
		}
	}
	}

});
$(document).ready(function() {
    /*var row1 = $("#list_details").closest('.row');
	var no_from1 = $('.no_from', row1).val();
	var shares1 = $('.shares', row1).val();
	//var certificate = $('.certificate', row).val();
	var no_to=$('.no_to', row1);
	var certificate1 = $('.certificate', row1).val();
	if(no_from1){
		share_value1=parseInt(no_from1);
		share_value2=parseInt(shares1);
		var calculate=((share_value1)+(share_value2)-1);
		var cal_val=no_to.val(calculate);		
	}
	var certificate_inputs1 = document.getElementsByClassName("certificate");
	var distinctive_from1 = document.getElementsByClassName("no_from");
	var distinctive_to1 = document.getElementsByClassName("no_to");
	var sharesval1 = document.getElementsByClassName("shares");
	var certify1=parseInt(certificate1);
	if(certificate1)	{		
		for (var j=0; j < certificate_inputs1.length; j++ ) {
			console.log(certify1);
			var input_val1=certificate_inputs1[j].value;
			if(input_val1 == ''){
				var certify_val1=((certify1) +(j));console.log(certify1);
				//console.log("Name: "+certificate_inputs[i].id+" Value: "+certificate_inputs[i].value);
				$("#"+certificate_inputs1[j].id+"").val(certify_val1);
			}
		}
	}
	
	if(no_from1 !='')	{		

	for (var i=0; i < distinctive_from1.length; i++ ) {
		var no_from_val1=parseInt(no_from1);	
		var input_values1=distinctive_from1[i].value;

		if(input_values1 ==''){
			var no_fromval1=((no_from_val1) +(i));
			$("#"+distinctive_from1[i].id+"").val(no_fromval1);
			var share_values=parseInt(sharesval1[i].value);
			var share_values1=parseInt(distinctive_from1[i].value);
			var calculate_to_val=((share_values)+(share_values1)-1);
			$("#"+distinctive_to1[i].id+"").val(calculate_to_val);

		}
	}
	}*/
				
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
      $('#resolution_date').attr('max', maxDate);
				
});
                
</script>
</body>
</html>