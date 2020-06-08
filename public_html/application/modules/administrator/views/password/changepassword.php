<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header.php');?>
<body class="login">
<style>
.login{
background-image:none;
}
.center{
	margin-left:50px;
	
}
@media only screen and (max-width: 768px)
{
	.center{
		margin:0px ! important;
	}
}


</style>      
      <section id="login1">      
         <!-- Contents -->
         <div class="container"> 
            <div class="row">
					<div class="col-md-12 col-xs-12 col-center">
                        <div id="result" class=""></div>
<!--
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
-->
					</div>
		      </div>	  
			<div class="container pt-5">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-uppercase">Change Password</h2>
               </div>
            </div>

            <div class="row mt-1">         
               <div class="col-md-6 offset-md-3">
                  <div class="panel-default px-3 py-4" style="height:100%">
                     <div class="panel-body">
						<form id="loginForm" name="sentMessage" novalidate="novalidate" action="<?php echo base_url('administrator/administrator/changepassword');?>" method="post">
							 <div class="form-group col-md-10 center">
								<h5 class="text-green text-center">Current Password</h5>
								<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
								<input type="password" name="old_password" pattern="\S{6,30}" maxlength="6" title="Password should have atleast 6 characters." placeholder="" class="form-username form-control col-lg-12" id="old_password" data-validation-required-message="Please enter your current password." required>
								<p class="help-block text-danger"></p>
							 </div>
							<div class="form-group col-md-10 center mt-3">
								<h5 class="text-green text-center">New Password</h5>
								<input type="password" name="password" pattern="\S{6,30}" maxlength="6" title="Password should have atleast 6 characters." placeholder="" class="form-username form-control col-lg-12" id="password" data-validation-required-message="Please enter new password." required>
								<p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-10 center mt-3">
								<h5 class="text-green text-center">Confirm New Password</h5>
								<input type="password" name="confirmpassword" pattern="\S{6,30}" maxlength="6" title="Password should have atleast 6 characters." class="form-password form-control" id="confirmpassword" data-validation-required-message="Please enter confirm password." required>
								<p class="help-block text-danger"></p>
							 </div>
							 <div class="form-group row mt-4">
								   <div class="col-sm-12 text-center">
									  <div id="success"></div>
										 <button type="submit" name="save" id="sendMessageButton1" class="btn btn-primary btn-labeled ">
											Submit
										 </button> 
										<a href="<?php echo base_url('administrator/dashboard');?>" id="cancel" class="btn btn-outline-dark " >Cancel</a>
								   </div>
							 </div>
						 </div>
						 </form>
                     </div>
                  </div>
               </div>
            </div>
         </div> 
		</section>
<?php $this->load->view('templates/footer1.php');?>      
<?php $this->load->view('templates/bottom.php');?>   
<?php $this->load->view('templates/datatable.php');?> 
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
/*api call */
//Change password API Call
	$(document).ready(function() {
	$('form').submit(function(e){
	e.preventDefault();
	const changepassword = $('#loginForm').serializeObject(); 
	console.log(changepassword);	
	if(changepassword.user_id !='' && changepassword.password && changepassword.old_password){	
	  $.ajax({
		url:"<?php echo base_url();?>administrator/administrator/change_password",
		type:"POST",
		data:changepassword,
		dataType:"html",
		cache:false,			
		success:function(response){		  
			response=response.trim();
			responseArray=$.parseJSON(response);
			console.log(response);
			 if(responseArray.status == 1){
				$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
				window.location = "<?php echo base_url('administrator/login')?>";
			} else {
				$("#result").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
				var timeout = 3000;
				$('#result').delay(timeout).fadeOut(300);
			} 
		},
		error:function(response){
			alert('Error!!! Try again');
		} 			
	 }); 
}
else
{
	//alert('Please provide mandatory fields');
}
});
$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
	if (o[this.name] !== undefined) {
	  if (!o[this.name].push) {
		o[this.name] = [o[this.name]];
	  }
	  o[this.name].push(this.value || '');
	} else {
	  o[this.name] = this.value || '';
	}
  });
  return o;
};
})
		
		</script>
     
   </body>
</html>