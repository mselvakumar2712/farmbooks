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
                        <h1>Recurrent Invoices</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/market/recurrentinvoice');?>">Recurrent Invoices</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
		    <form method="POST" action="<?php echo base_url('fpo/Market/postRecurrentInvoice')?>" id="recurrentInvoiceForm" name="sentMessage" novalidate="novalidate" >
			
            <div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="#afd66b">		
							<th class="text-center">Description</th>
							<th class="text-center">Customer</th>
							<th class="text-center">Days</th>
							<th class="text-center">Monthly</th>
							<th class="text-center">Begin</th>
							<th class="text-center">End</th>
						</tr>
					</thead>
                    <tbody>
                        <?php if(count($recurrent_invoice) != 0) { 
                        foreach($recurrent_invoice as $recurrent_invoice){ ?>
                            <tr>
                                <td class="text-center"><?php echo $recurrent_invoice->description; ?></td>
                                <td class="text-center"><?php echo $recurrent_invoice->name; ?></td>
                                <td class="text-center"><?php echo $recurrent_invoice->days; ?></td>
                                <td class="text-center"><?php echo $recurrent_invoice->monthly; ?></td>
                                <td class="text-center"><?php echo $recurrent_invoice->begin; ?></td>
                                <td class="text-center"><?php echo $recurrent_invoice->end; ?></td>
                            </tr>		                                     
                        <?php } ?>
                        <?php } else { ?>
					       <tr>
						      <td colspan="6" class="text-center" >No records found</td>
                            </tr>													
                        <?php } ?>
					</tbody>					
				</table> 
				</div>
                    
			<div class="container">
				<div class="row ">
					<div class="form-group col-md-3">
						<label for="inputAddress2">Description <span class="text-danger">*</span></label>
						<input class="form-control" type="text" placeholder="Description" id="description" name="description" required="required" data-validation-required-message="Please enter description.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Template <span class="text-danger">*</span></label>
						<select class="form-control" id="template" name="template"required="required"  data-validation-required-message="Please select template.">
							<option value="">Select Template </option>
							<option value="1">Default</option>	
						</select> 
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Customer <span class="text-danger">*</span></label>
						<select class="form-control" id="customer" name="customer"required="required" data-validation-required-message="Please select customer.">
							<option value="">Select Customer</option>
                            <?php for($i=0; $i<count($customer);$i++) { ?>	
				            <option value="<?php echo $customer[$i]->debtor_no; ?>"><?php echo $customer[$i]->name; ?></option>
							<?php } ?>							
						</select>  
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Branch <span class="text-danger">*</span></label>
						<select class="form-control" id="branch" name="branch" required="required" data-validation-required-message="Please select branch.">
							<option value="">Select Branch</option>
						</select>   
						<p class="help-block text-danger"></p>
					</div>	
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="inputAddress2">Days</label>
						<input type="text" class="form-control numberOnly" value="" maxlength="10" id="days" name="days"  placeholder="Days">				
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Monthly</label>
						<input type="text" class="form-control numberOnly" maxlength="10" value="" id="monthly" name="monthly" placeholder="Monthly">
						<div class="help-block with-errors text-danger"></div>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Begin <span class="text-danger">*</span></label>
						<input type="date" class="form-control" id="begin" name="begin" required="required" data-validation-required-message="Please select begin date.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">End <span class="text-danger">*</span></label>
						<input type="date" class="form-control" id="end" name="end" required="required" data-validation-required-message="Please select end date." >
						<p class="help-block text-danger"></p>
					</div>					
				</div>
                
				<div class="form-row">
				  <div class="form-group col-md-12 text-center">
				  <div id="success"></div>
                    <button id="sendMessageButton" align="center" name="sendMessageButton" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
				  </div>				 
				</div>
			</div>
            
            </form>			
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	<?php $this->load->view('templates/datatable.php');?>
	<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	<script src="<?php echo asset_url()?>js/register.js"></script>
   </body>
</html>
<script type="text/javascript">
$(document).ready(function() {                  
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
			$('#begin').attr('max', maxDate);
			$('#end').attr('max', maxDate);		
		});
});
    
$('#customer').change(function(){		
    var debtor_no = $("#customer").val();	
    getCustomerBranch(debtor_no);
});
function getCustomerBranch(debtor_no) {
    $("#branch option").remove() ;
    if(debtor_no !='')	{   
        $.ajax({
			url:"<?php echo base_url();?>fpo/market/branchdetail/"+debtor_no,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
                    var branch_list = '<option value="">Select Branch</option>';
					$.each(responseArray.branch_list,function(key,value){
					   branch_list += '<option value='+value.branch_code+'>'+value.br_name+'</option>';
				    });
					$('#branch').html(branch_list);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         });
    } else {
        swal("Sorry!", "Please select the customer and continue");
    }
}    
</script>