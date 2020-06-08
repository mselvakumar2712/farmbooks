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
                        <h1>Supplier Allocation Inquiry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/inventory/supplierallocationinquiry');?>">Supplier Allocation Inquiry</a></li>
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
			  <form  action="" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
				<div class="container-fluid">
				<div class="row ">
					<div class="form-group col-md-3">
						<label for="inputAddress2">Select a Supplier</label>
						<select  class="form-control" id="supplier"  name="supplier" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Suppliers</option>
							<?php for($i=0; $i<count($supplier);$i++) { ?>										
									<option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?></option>
							<?php } ?>	
						</select>		
					</div>	
					<div class="form-group col-md-3">
						<label for="inputAddress2">From</label>
						<input  class="form-control" type="date"   id="from" name="from">
						<p class="help-block text-danger"id="validate_date"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">To</label>
						<input  class="form-control" type="date"   id="to" name="to">		
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Type</label>
						<select  class="form-control" id="type"  name="type" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Types</option>
							<option value="1">Default</option>
						</select>
					</div>					
				</div>
				<div class="row ">
					<div class="form-group col-md-4">						
					</div>
					<div class="form-group col-md-3 text-center mt-2">
					    <label for="inputAddress2">Show Settled Items:</label>
					   <input type="checkbox" id="item" name="item" class="form-check-input ml-2" required="required" data-validation-required-message="Please Check form of fertilizer.">																	 
					</div>					
					<div class="form-group col-md-2">
					 <input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
					</div>
					<div class="form-group col-md-2">						
					</div>
				</div>
				</div>				
				<div class="table-responsive mt-4">  
					<table class="table table-bordered">
						<thead>
							<tr bgcolor="#afd66b">
								<th class="text-center">
									Type
								</th>
								<th class="text-center">
									#
								</th>
								<th class="text-center">
									Reference
								</th>
								<th class="text-center">
								    Supp Reference
								</th>
								<th class="text-center">
								    Date
								</th>
								<th class="text-center">
								  Due Date
								</th>
								<th class="text-center">
								 Debit
								</th>
								<th class="text-center">
								 Credit
								</th>
								<th class="text-center">
								 Allocated
								</th>
								<th class="text-center">
								 Balance
								</th>
							</tr>
						</thead>
						<tbody>
						<tr>
						   <td colspan="11" class="text-center">No records</td>
						</tr>
						</tbody>													
					</table>
				 </div>
				</form>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	 <?php $this->load->view('templates/datatable.php');?>	   
   </body>
</html>
<script type="text/javascript">
	$(document).ready(function() {          
        
    $('#example').DataTable();
	
	$("#sendMessageButton").click(function() {
	var startDt=document.getElementById("from").value;
	var endDt=document.getElementById("to").value;
	if(startDt && endDt){
	if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
	{

		$("#validate_date").html("from date is not greater than to date");
		return false;
	}
	}
	}); 
	
	$('#item_description').on('change', function () {
       
	    var description = $(this).val();

		document.getElementById('item_code').value=description;
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
			$('#from').attr('max', maxDate);
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
			$('#to').attr('max', maxDate);
	});

	});
</script>