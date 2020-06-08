<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
tfoot tr, thead tr {
	background: cornsilk;
}
tfoot td {
	font-weight:bold;
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
                        <h1>Stock Movement</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/inventory/stockmovements');?>">Stock Movement</a></li>
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
			  <form  action="<?php echo base_url('fpo/inventory/getstockmovement')?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
				<div class="container">
				<div class="row ">
				<input  class="form-control" type="hidden" id="stock_search" name="stock_search" value="1">
					<div class="form-group col-md-3">
						<label for="inputAddress2">Select Supplier</label>
						<select  class="form-control" id="supplier"  name="supplier" required="required" data-validation-required-message="Please select receive into.">
							<option value=""> Suppliers</option>
							<?php for($i=0; $i<count($supplier);$i++) {
								if($supp==$supplier[$i]->supplier_id){	
								echo '<option value="'.$supplier[$i]->supplier_id.'" selected="selected">'.$supplier[$i]->supp_name.'</option>';
								}else{
							   echo '<option value="'.$supplier[$i]->supplier_id.'">'.$supplier[$i]->supp_name.'</option>';
								}?>										
							<?php }?>
						</select>		
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">From</label>
						<input  class="form-control" type="date"  value="<?php echo $from_date;?>" id="from" name="from">
						<p class="help-block text-danger"id="validate_date"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">To</label>
						<input  class="form-control" type="date"  value="<?php echo $to_date;?>" id="to" name="to">		
					</div>
					<div class="form-group col-md-2">
						<label for="inputAddress2">Location</label>
						<select  class="form-control" id="location"  name="location" required="required" data-validation-required-message="Please select receive into.">
							<option value=""> Location</option>
							<?php for($i=0; $i<count($location);$i++) {
								if($loc==$location[$i]->id){	
								echo '<option value="'.$location[$i]->id.'" selected="selected">'. $location[$i]->name.'</option>';
								}else{
							   echo '<option value="'.$location[$i]->id.'">'. $location[$i]->name.'</option>';
								}?>										
							<?php }?>
						</select>
					</div>
					<div class="form-group col-md-1">
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
								<th>Item Code</th>
								<th>Item Description</th>
								<th>Movement Date</th>
								<th>Stock In</th>								
								<th>Stock Out</th>
								<th>Available Stock</th>																
								</tr>
							</thead>
							<tbody id="figlist">
							<?php if(!empty($month_info)){?>
							<?php $j=1; foreach($month_info as $row): ?>
							<tr> 
							<td><?php echo $row->stock_id; ?></td>
							<td><?php echo $row->product_name; ?></td>
							<td><?php echo fpo_display_date($row->tran_date); ?></td>
							<td><?php echo $row->purchase; ?></td>
							<td><?php $str=$row->sales;
							  if( $str < 0){
								   $string=str_replace('-', '', $str);
								   echo $string;
							}else{
							   echo $str;
							}?></td>
							<td><?php $total=($row->purchase+$row->sales);echo $total;?></td>
							</tr>
							<?php endforeach; ?>
							<?php } ?>
							</tbody>
							<?php if(!empty($month_info)){?>
							<tfoot>
								<tr>
									<td></td>
									<td></td>
									<td>Total</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tfoot>
							<?php } ?>
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
        
    	$('#example').DataTable(
		{
			//"paging": false,
			"autoWidth": true,
			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 3;
				while(j < nb_cols){
					var pageTotal = api
                .column( j, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return Number(a) + Number(b);
                }, 0 );
          // Update footer
          $( api.column( j ).footer() ).html(pageTotal);
					j++;
				} 
			}
		}
	);
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