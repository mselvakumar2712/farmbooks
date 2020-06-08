<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header.php');?>
<body class="">
<style>
 footer {
  background-color:#afd66b ! important;
  padding: 9px 0;
  margin-top:50px;
  text-align: center;
  position:relative;
}
table {
    width:100%;

}
table, th, td {
   font-weight:normal ! important;
    border-collapse: collapse;
		padding:5px;
}
th, td {

    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color: black;
    color: white;
}

footer {
  background-color:#afd66b ! important;
  padding: 9px 0;
  margin-top:50px;
  text-align: center;
  position:relative;
}     
</style> 
      <section id="">      
         <!-- Contents -->
         <div class="container-fluid"> 
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-uppercase">fpg Profile</h2>
               </div>
            </div>

            <div class="container-fluid mt-1">         
               <div class="col-md-10 offset-md-1">
                  <div class=" px-3 py-4" style="height:100%">
                     <div class="container">
					<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="editpopi_Form">
						<input type="hidden" name="fpg_id" value="<?php echo $fpg_id;?>" id="fpg_id">
							 <div class="row row-space">
								<div class="form-group col-md-6">
										<label for="inputAddress2">FPO Name </label>
										<input class="form-control" id="popi_list" name="popi_name" required="required" disabled value="<?php echo $fpg_list[0]->fpo_name;?>" data-validation-required-message="Select POPI...">
								<div class="help-block with-errors text-danger"></div>
								</div>	
								<div class="form-group col-md-6">
									<label for="inputAddress2">Name of the Farmer Interest Group</label>
									<input type="text" class="form-control" id="interest_group" name="interest_group" value="<?php echo $fpg_list[0]->FPG_Name;?>" disabled placeholder="Name of the Farmer Interest Group" required="required" data-validation-required-message="Please enter name of the farmer interest group.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="row row-space">
							<div class="form-group col-md-6 ">
							<label for="inputAddress2">Address </label>
							<table style="width:100%">
                              <tr>
							  <th>Village</th>
							   <td><input type="text" class="form-control" maxlength="10"  id="village" value="<?php echo $fpg_list[0]->village_name;?>" disabled name="village" placeholder="Village"></td>
							  </tr>
							  <tr>
							  <th>Gram Panchayat</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpg_list[0]->panchayat_name;?>" id="panchayat" disabled name="panchayat" placeholder="Panchayat"></td>
							  </tr>
							  <tr>
							  <th>Taluk</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpg_list[0]->block_name;?>" id="block" disabled name="block" placeholder="Door No"></td>
							  </tr>
							  <tr>
							  <th>Block</th>
							   <td><input type="text" class="form-control" maxlength="10"  id="block" value="<?php echo $fpg_list[0]->block_name;?>" disabled name="block" placeholder="Block"></td>
							  </tr>
							</table>
							</div>
							<div class="form-group col-md-6 mt-4">
							<table style="width:100%">
							 <tr>
							  <th>District</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpg_list[0]->district_name;?>" id="district" disabled name="district" placeholder="District"></td>
							  </tr>
							  <tr>
							  <th>State</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpg_list[0]->state_name;?>" id="state" disabled name="state" placeholder="State"></td>
							  </tr>
							  <tr>
							  <th>Pincode</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpg_list[0]->PIN_Code;?>" id="pin_code" disabled name="pin_code" placeholder="Pincode"></td>
							  </tr>
							</table>
							 </div>
							 </div> 
							<div class="form-group col-md-12 text-center mt-5">
								<div class="form-group">
									<div id="success"></div>
									<a href="<?php echo base_url('administrator/dashboard');?>"><input id="back" value="Cancel" class="btn swal-button-cancel" type="button"></a>
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
     
</body>
</html>