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
                        <h1>Supplier Allocations</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/inventory/supplierallocation');?>">Supplier Allocations</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
			  <form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
				<div class="container">
				<div class="row ">
						<div class="form-group col-md-3">						
						</div>
					<div class="form-group col-md-5 text-center">
						<label for="inputAddress2">Select Supplier</label>
						<select  class="form-control" id="supplier"  name="supplier" required="required" data-validation-required-message="Please select receive into.">
							<option value="">Select Supplier</option>
							<?php for($i=0; $i<count($supplier);$i++) { ?>										
							<option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?></option>
							<?php } ?>
						</select>		
					</div>
					<div class="form-group col-md-3">
					</div>
				</div>
				<div class="row ">
						<div class="form-group col-md-3">						
						</div>
					<div class="form-group col-md-5 text-center">
						<label for="inputAddress2">Show Settled Items:</label>
					  <input type="checkbox" id="item" name="item" class="form-check-input ml-2" required="required" data-validation-required-message="Please Check form of fertilizer.">												
					</div>
					<div class="form-group col-md-3">
					</div>
				</div>
				</div>
			 <div class="row">
                <div class="col-md-12">
                    <div class="card">
						<div class="card-body">
						  <table id="example" class="table table-striped table-bordered" width="100%">
							<thead>
								<tr>
								<th>Transaction Type</th>
								<th>#</th>
								<th>Reference</th>
								<th>Date</th>
								<th>Supplier</th>							
								<!--<th>Currency</th>-->
								<th>Total</th>
								<th>Left to Allocate</th>
								<!--<th>Status</th>-->
								<th width="20%">Action</th>																
								</tr>
							</thead>
							<tbody id="supplierinfo">
							</tbody>
						  </table>
						 </div>
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
   </body>
</html>
<script type="text/javascript">
	$(document).ready(function() {          
        
        $('#example').DataTable();


	});
	$('#supplier').on('change', function () {
	    var supplier_id = $(this).val();
		//alert(supplier_id);
			if(supplier_id == 0)
			{
			console.log(searchdata);
				 $.ajax({
					url:"<?php echo base_url();?>fpo/inventory/supplierallDetail",
					type:"GET",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response){		  
					responsearr=$.parseJSON(response);
						var supplierinfo = "";
						var count=1;
						$.each(responsearr, function(key, value) {	
							var sno=count++;
							supplierinfo += '<tr><td>'+sno+'</td><td>'+value.reference+'</td><td>'+value.suppiler_name+'</td><td>'+value.suppiler_delivery_address+'</td><td>'+value.total+'</td><td>'+value.total+'</td><td>'+value.total+'</td><td><a href="<?php echo base_url("fpo/inventory/allocation?id='+value.id+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';

						});
						$('#supplierinfo').html(supplierinfo);

					},
					error:function(response){
						alert('Error!!! Try again');
					} 
					}); 
			}
			else
			{
				alert(supplier_id);
				 $.ajax({
					url:"<?php echo base_url();?>fpo/inventory/supplierDetail/"+supplier_id,
					type:"GET",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response){		  
					responsearr=$.parseJSON(response);
						var supplierinfo = "";
						var count=1;
						$.each(responsearr, function(key, value) {	
						console.log(value);
							var sno=count++;
							supplierinfo += '<tr><td>'+sno+'</td><td>'+value.supp_name+'</td><td>'+value.supp_ref+'</td><td>'+value.suppiler_delivery_address+'</td><td>'+value.total+'</td><td>'+value.total+'</td><td>'+value.total+'</td><td><a href="<?php echo base_url("fpo/inventory/allocation?id='+value.supplier_id+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';

						});
						$('#supplierinfo').html(supplierinfo);

					},
					error:function(response){
						alert('Error!!! Try again');
					} 
					
					}); 
			}
		});
</script>