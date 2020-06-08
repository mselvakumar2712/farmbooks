<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
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
                        <h1>Sales Persons</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Market</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/Market/salestypes');?>">Sales Persons</a></li>
                            <!--<li class="active">List FIG </li>-->
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
		        <form   id="" name="sentMessage" method="POST" action="<?php echo base_url('fpo/Market/postsalesperson')?>" novalidate="novalidate" >
						<div class="container">
							<div class="row ">
								<div class="form-group col-md-6">
									<label for="inputAddress2">Sales Person Name<span class="text-danger">*</span></label>
									<input  class="form-control" type="text"  placeholder="Sales Person Name" id="sales_person_name" name="sales_person_name" required="required"  data-validation-required-message="Please enter sales person name.">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Mobile Number<span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" maxlength="10" id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
									 <p class="help-block text-danger"></p>
								</div>
								<!--<div class="form-group col-md-4">
									<label for="inputAddress2">Fax Number</label>
									<input type="text" class="form-control numberOnly" maxlength="10" id="fax_num" name="fax_num" placeholder="Fax Number">
									 <p class="help-block text-danger"></p>
								</div>-->					
							</div>
							<div class="row">
								<div class="form-group col-md-4">
									<label for="inputAddress2">E-Mail Address</label>
									<input type="email" class="form-control"  id="email" name="email" placeholder="E-Mail Address" >
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-2">
									<label for="inputAddress2">Provision(%)</label>
									<input type="text" class="form-control numberOnly"   maxlength="2" id="provision" name="provision"  placeholder="XX">				
								</div>
								<div class="form-group col-md-3">
									<label for="inputAddress2">Break Pt</label>
									<input type="text" class="form-control numberOnly" maxlength="10"  id="break_pt" name="break_pt" placeholder="XX">
									<div id="mbl_validate" class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-3">
									<label for="inputAddress2">Provision 2(%)</label>
									<input type="text" class="form-control numberOnly" maxlength="2"  id="provision_2" name="provision_2" placeholder="XX">
								</div>
							</div>
							<div class="form-row">
							  <div class="form-group col-md-6 text-right">
								<button  value="" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>							
								 <a href="" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
								</div>
								<div class="col-md-1">&nbsp;</div>
								<div class="col-md-4 text-left">
						      <input type="checkbox" id="in_active" name="in_active" class="form-check-input">show also Inactive
						      </div>
							 </div>
							 
							</div>
							</form>	
						</div>
			
			<div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
					
						<tr bgcolor="#afd66b">		
							<th class="text-center">Name</th>
							<th class="text-center">Phone</th>
							<th class="text-center">Provision</th>
							<th class="text-center">Break Pt.</th>
							<th class="text-center">Provision 2</th>
							<th class="text-center"></th>
							
						</tr>
					</thead>
					<tbody id="salesperson">
																	
					</tbody>
				</table> 
				</div>
            			
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	<?php $this->load->view('templates/datatable.php');?>
	<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	<script src="<?php echo asset_url()?>js/register.js"></script>
	<script>
	$(document).ready(function() {         
            //CROP list API CALL
				$.ajax({
						url:"<?php echo base_url();?>fpo/Market/salespersonlist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						response=response.trim();
						responseArray=$.parseJSON(response);
						 if(responseArray.status == 1){
							var salesperson_list = "";
							$.each(responseArray.salesperson_list,function(key,value){
							 salesperson_list += '<tr><td class="form-group"><input type="text" class="form-control" value='+value.salesman_name+' name="salesman_name" id="salesman_name" disabled></td><td class="form-group"><input type="text" class="form-control" value='+value.salesman_phone+' name="salesman_phone" id="salesman_phone" disabled></td><td class="form-group"><input type="text" class="form-control"value='+value.provision+' name="provision" id="provision" disabled ></td><td class="form-group"><input type="text" class="form-control" value='+value.break_pt+' disabled  name="break_pt" id="break_pt"></td><td class="form-group"><input type="text"  class="form-control" disabled value='+value.provision2+' name="provision2" id="provision2"></td><td class=""><a class="btn btn-success btn-sm edit" id="edit" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><button id="update" href="" value="Update" class="btn btn-success " type="button" style="display:none;" /></td></tr>';
							});
							$('#salesperson').html(salesperson_list);
							$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });
				
});
	 $('a.edit').click(function(){

  $('#salesperson').toggleClass('view');
  $("#update").show();
  //$("#cancel").show();
  $("#edit").hide();
 // $("#ok").hide();
  $('input').each(function(){
    var inp = $(this);
	 //var button = $(this);
    if (inp.attr('disabled')) {
     inp.removeAttr('disabled');
	  document.getElementById("update").disabled =false;
	  //document.getElementById("cancel").disabled =false;
	  
    }
    else {
      //inp.attr('disabled', 'disabled');
    }
  });
});

$('.form-check-input').click(function() {
      //-->this will alert id of checked checkbox.
       if(this.checked){
         $.ajax({
						url:"<?php echo base_url();?>fpo/Market/salespersoninactivelist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						response=response.trim();
						responseArray=$.parseJSON(response);
						 if(responseArray.status == 1){
							 $('#salesperson tr').remove();
							var salesperson_list = "";
							$.each(responseArray.salesperson_list,function(key,value){
							 salesperson_list += '<tr><td class="form-group"><input type="text" class="form-control" value='+value.salesman_name+' name="salesman_name" id="salesman_name" disabled></td><td class="form-group"><input type="text" class="form-control" value='+value.salesman_phone+' name="salesman_phone" id="salesman_phone" disabled></td><td class="form-group"><input type="text" class="form-control"value='+value.provision+' name="provision" id="provision" disabled ></td><td class="form-group"><input type="text" class="form-control" value='+value.break_pt+' disabled  name="break_pt" id="break_pt"></td><td class="form-group"><input type="text"  class="form-control" disabled value='+value.provision2+' name="provision2" id="provision2"></td><td class=""><a class="btn btn-success btn-sm edit"  title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><button id="update" href="" value="Update" class="btn btn-success " type="button" style="display:none;" /></td></tr>';
							});
							$('#salesperson').html(salesperson_list);
							$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });

            }
				else
				{
					$.ajax({
						url:"<?php echo base_url();?>fpo/Market/salespersonlist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						response=response.trim();
						responseArray=$.parseJSON(response);
						 if(responseArray.status == 1){
							var salesperson_list = "";
							$.each(responseArray.salesperson_list,function(key,value){
							 salesperson_list += '<tr><td class="form-group"><input type="text" class="form-control" value='+value.salesman_name+' name="salesman_name" id="salesman_name" disabled></td><td class="form-group"><input type="text" class="form-control" value='+value.salesman_phone+' name="salesman_phone" id="salesman_phone" disabled></td><td class="form-group"><input type="text" class="form-control"value='+value.provision+' name="provision" id="provision" disabled ></td><td class="form-group"><input type="text" class="form-control" value='+value.break_pt+' disabled  name="break_pt" id="break_pt"></td><td class="form-group"><input type="text"  class="form-control" disabled value='+value.provision2+' name="provision2" id="provision2"></td><td class=""><a class="btn btn-success btn-sm edit" id="edit" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><button id="update" href="" value="Update" class="btn btn-success " type="button" style="display:none;" /></td></tr>';
							});
							$('#salesperson').html(salesperson_list);
							$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });
				}
      });
	</script>
   </body>
</html>