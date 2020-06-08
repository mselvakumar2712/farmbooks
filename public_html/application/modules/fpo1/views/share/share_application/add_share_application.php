<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

<?php
	$min_threshold = '';
	$max_threshold = '';
	if($share_setting) {
		$min_threshold = $share_setting->minimum_threshold;
		$max_threshold = $share_setting->maximum_threshold;
	}
?>

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
                        <h1>Add Share Application</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('fpo/share');?>">Share Management</a></li>
                            <li class="active">Add Share Application</li>
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
               <form action="<?php echo base_url('fpo/share/postShareApplication')?>" method="post" id="addshare_application" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
                              <div class="container-fluid">                                                                         
                                 <div class="farmer_to_member_form" id="farmer_to_member_form" style="">                                            
                                    <div class="row row-space mt-4">                
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Search Farmer with Mobile <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" id="search_farmer" maxlength="10" minlength="10" name="search_farmer" placeholder="Search with Mobile" data-validation-required-message="Provide the search text" value="" pattern="^[6-9]\d{9}$" title="Select any FPO and try this">
                                          <div id="farmer_validate" class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Farmer Name </label>
                                          <input type="hidden" name="mobile_number" id="mobile_number" value="" required>
                                          <select class="form-control" id="farmer_name" name="farmer_name" readonly>
                                             <option value="">Select Farmer</option>
                                             <?php for($i=0; $i<count($farmers);$i++) { ?>
                                             <option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
                                             <?php } ?>	
                                          </select>
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Alias - Father / Spouse Name</label>
                                          
                                          <input type="hidden" name="aadhaar" id="aadhaar" value="">
                                          <input type="text" class="form-control" maxlength="60" name="alias_name" id="alias_name" placeholder="Alias - Father / Spouse Name" readonly>
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>
                                    </div>
                                    <div class="row row-space mt-4">
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Share Application Date <span class="text-danger">*</span></label>
                                          <input type="date" class="form-control" id="share_date" name="share_date" placeholder="Date" value="<?php echo date("Y-m-d");?>" max="2050-12-31" data-validation-required-message="Provide the share date" value="">
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class=" form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" maxlength="3" name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Provide no. of share">
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Permanent Account Number (PAN) </label>
                                          <input type="text" class="form-control text-uppercase" maxlength="10" id="pan_number" name="pan_number" placeholder="Ex:AAAAA0000A" >
                                       </div> 
                                    </div>
                                    
                                    <div class="row row-space mt-4">
                                       <div class="form-group col-md-6">
                                          <label for="inputAddress2">Nominee Name </label>
                                          <input type="text" class="form-control" id="nominee_name" name="nominee_name" maxlength="50" placeholder="Nominee Name" >
                                       </div> 
                                       <div class="form-group col-md-6">
                                          <label for="inputAddress2">Nominee’s Father Name </label>
                                          <input type="text" class="form-control" id="nominee_father_name" name="nominee_father_name" maxlength="50" placeholder="Nominee’s Father Name" >
                                       </div> 
                                    </div>                                                
                                 </div>
                                 <!-- Button creation for submit -->
                                 <div class="form-row">
								            <div class="form-group col-md-12 text-center">
                                       <div id="success"></div>
								                <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                       <a href="<?php echo base_url('fpo/share');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
   
	var min_threshold = '<?php echo $min_threshold; ?>';
	var max_threshold = '<?php echo $max_threshold; ?>';
   
    $(function() {
	   $('#no_of_share').bind('change', function() {
		    var shares = parseInt(this.value || 0);
			if(shares == 0) {
				var str = 'Number of shares should be greater than zero';
				swal('', str);
				$(this).val(''); 
				return;
			}
			if(min_threshold >0 && max_threshold >0) {
			   if(shares >= min_threshold && shares <= max_threshold) {
			   }
			   else {
				   var str = 'Minimum allowed number of shares: '+min_threshold;
				   str += '<br/ >Maximum allowed number of shares: '+max_threshold;
				   swal('', str);
				   $(this).val(''); 
			   }
		   }
		   else if(min_threshold >0) {
			   if(shares >= min_threshold) {
			   }
			   else {
				   var str = 'Minimum allowed number of shares: '+min_threshold;
				   swal('', str);
				   $(this).val(''); 
			   }
		   }
		   else if(max_threshold >0) {
			   if(shares <= max_threshold) {
			   }
			   else {
				   var str = 'Maximum allowed number of shares: '+max_threshold;
				   swal('', str);
				   $(this).val(''); 
			   }
		   }
	   });
	   
   });
   
   $("#search_farmer").change(function() {
      var search_farmer_value = $(this).val();
      if(search_farmer_value != "") {         
         if(search_farmer_value.length == 10 && (search_farmer_value.charAt(0) == 6 || search_farmer_value.charAt(0) == 7 || search_farmer_value.charAt(0) == 8 || search_farmer_value.charAt(0) == 9)) {
            var search_farmer = {'mobilenumber':search_farmer_value, 'aadhaar_number':""};
            searchFarmerWithOption(search_farmer);
         } else if(search_farmer_value.length == 14) {
            var search_farmer = {'aadhaar_number':search_farmer_value, 'mobilenumber':""};
            searchFarmerWithOption(search_farmer);    
         }
      }
   });
    
$('#pan_number').change(function (event) { 		
    var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
    var txtpan = $(this).val(); 
    if (txtpan.length == 10 ) { 
        if( txtpan.match(regExp) ){ 
            // alert('PAN match found');
        } else {
            $("#pan_number").val('');
            //alert('Not a valid PAN number');
            swal("Sorry!", "Not a valid PAN number");
            $("#pan_number").focus();
            event.preventDefault();
        } 
    } else { 
        $("#pan_number").val('');
        //alert('Please enter 10 digits for a valid PAN number');
        swal("Sorry!", "Please enter 10 digits for a valid PAN number");
        $("#pan_number").focus();
        event.preventDefault();      
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
      $('#share_date').attr('max', maxDate);				
});
    
function searchFarmerWithOption(search_farmer) {    
       $.ajax({
			url:"<?php echo base_url();?>fpo/share/searchFarmer",
			type:"POST",
			data:search_farmer,
			dataType:"html",
         cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1) {
                     $('#aadhaar').val('');$('#farmer_name').val('');$('#mobile_number').val('');
                     $('#farmer_name').val(responseArray.farmer_data[0]['id']);  
                     $('#mobile_number').val(responseArray.farmer_data[0]['mobile']);
                     if(responseArray.farmer_data[0]['alias_name'] != "" && responseArray.farmer_data[0]['father_spouse_name']) {                       
                        $('#alias_name').val(responseArray.farmer_data[0]['alias_name']+' - '+responseArray.farmer_data[0]['father_spouse_name']);
                     }else if(responseArray.farmer_data[0]['alias_name'] != "") {                       
                        $('#alias_name').val(responseArray.farmer_data[0]['alias_name']);
                     }else if(responseArray.farmer_data[0]['father_spouse_name']) {                       
                        $('#alias_name').val(responseArray.farmer_data[0]['father_spouse_name']);
                     }										
                    $("#farmer_validate").html("<div class='alert alert-success'>Farmer selected successfully</div>");
				} else {
                    $("#farmer_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
                    $("#search_farmer").val('');
                } 
            }
         });            
}  

function getaadhar(aadhar_no){
    if (aadhar_no.length > 0 && aadhar_no.length == 12) {
       var  aadhar = 'XXXX XXXX '+aadhar_no.substring(8); 		
    }
    document.getElementById('aadhaar_number').value = aadhar;
}              
</script>
</body>
</html>