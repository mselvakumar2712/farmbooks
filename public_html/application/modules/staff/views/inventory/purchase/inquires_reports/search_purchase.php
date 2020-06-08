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
                        <h1>Search Purchase Orders</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/inventory/searchpurchaseorder');?>">Search Purchase Orders</a></li>
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
			  <form  action="<?php echo base_url('fpo/inventory/getpurchaseorder')?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
				<div class="container">
				<div class="row ">
					<div class="form-group col-md-3">
						<label for="inputAddress2">PO Order No.</label>
						<input  class="form-control" type="text" maxlength="18" id="reference" name="reference" >
						<p class="help-block text-danger"></p>
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
						<label for="inputAddress2">Into Location</label>
						<select  class="form-control" id="location"  name="location" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Location</option>
							<?php for($i=0; $i<count($location);$i++) { ?>										
							<option value="<?php echo $location[$i]->id; ?>"><?php echo $location[$i]->name; ?></option>
							<?php } ?>	
						</select>
					</div>		
				</div>
				
				<div class="row ">
					<div class="form-group col-md-3">
						<label for="inputAddress2">For Item</label>
						<input  class="form-control" type="text"  placeholder="" id="item_code" name="item_code" readonly>
						<p class="help-block text-danger"></p>
					</div>	
					<div class="form-group col-md-3 mt-2">
						<label for="inputAddress2"></label>
						<select  class="form-control" id="item_description"  name="item_description" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Items</option>
							<?php for($i=0; $i<count($product_fpo);$i++) { ?>										
							<option value="<?php echo $product_fpo[$i]->id; ?>"><?php echo $product_fpo[$i]->product_name; ?></option>
							<?php } ?>							
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Select Supplier</label>
						<select  class="form-control" id="supplier"  name="supplier" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Suppliers</option>
							<?php for($i=0; $i<count($supplier);$i++) { ?>										
									<option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?></option>
							<?php } ?>
						</select>		
					</div>
					<div class="form-group col-md-3 mt-4">
						<label for="inputAddress2" ></label>
						<input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
					</div>		
				</div>
				</div>
			</form>
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
						<div class="card-body">
						  <table id="example" class="table table-striped table-bordered" width="100%">
							<thead>
								<tr>
								<th>#</th>
								<th>Reference</th>
								<th>Supplier</th>
								<th>Location</th>								
								<th>Supplier's Reference</th>
								<th>Order Date</th>
								<th>Order Total</th>																
								</tr>
							</thead>
							<tbody id="figlist">
							<?php if(!empty($purchase_info)){?>
							<?php $j=1; foreach($purchase_info as $row): ?>
							<tr> 
							<td><?php echo $j++; ?></td>
							<td><?php echo $row->reference; ?></td>
							<td><?php echo $row->suppiler_name; ?></td>
							<td><?php $get_address=$row->delivery_address;
								for($i=0; $i<count($location);$i++) { 
									
									if($location[$i]->id==$get_address){
										echo $location[$i]->name;
									}
							}?></td>
							<td><?php echo $row->supp_quotation_ref; ?></td>
							<td><?php echo $row->ord_date; ?></td>
							<td><?php echo $row->total; ?></td>
							</tr>
							<?php endforeach; ?>
							<?php } ?>
							</tbody>
						  </table>
						 </div>
                    </div>
                </div>
              </div>			
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