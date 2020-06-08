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
                        <h1>Balance Sheet Drilldown</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/finance/balancesheetdrilldown');?>">Balance Sheet Drilldown</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">                                            
											<div class="row ">
												<div class="form-group col-md-2">		
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">As at</label>
													<input  class="form-control" type="date"   id="as_at" name="as_at">		
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Dimension 1</label>
													<select  class="form-control" id="dimension1"  name="dimension1" required="required" data-validation-required-message="Please select dimension 1.">
														<option value="">Select Dimension 1</option>
														<option value="1">1 Software</option>
														<option value="2">2 Development</option>
													</select>
												</div>
												<div class="form-group col-md-3 mt-4">
													<label for="inputAddress2" ></label>
													<input id="sendMessageButton" value="Show" class="btn btn-success  text-center mt-1" type="submit">
												</div>
											</div>
									</div>
									<div class="table-responsive mt-3">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">		
													<th class="text-center">Assets</th>
													<th class="text-center"></th>
												</tr>
											</thead>
											<tbody>
											<tr>
												<td class="text-center" ></td>
											</tr>													
											</tbody>
											<tbody>
											<tr>
												<td  width="80%" class="text-left"> Total Assets</td>
												<td ><input type="text numberOnly" name="total_assets"  id="total_assets" readonly class="form-control " value="0.00" /></td>

											</tr>
											</tbody>
										</table>
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">		
													<th class="text-center">Liabilities</th>
													<th class="text-center"></th>
												</tr>
											</thead>
											<tbody>
											<tr>
												<td class="text-center" ></td>
											</tr>													
											</tbody>
											<tbody>
											<tr>
												<td  width="80%" class="text-left"> Total Liabilities</td>
												<td ><input type="text numberOnly" name="total_liablilities"  id="total_liablilities" readonly class="form-control " value="0.00" /></td>

											</tr>
											<tr>
												<td  width="80%" class="text-left"><strong> Calculated Return</strong> </td>
												<td ><input type="text numberOnly" name="cal_return"  id="cal_return" readonly class="form-control " value="0.00" /></td>

											</tr>
											<tr>
												<td  width="80%" class="text-left">Total Liabilities and Equities</td>
												<td ><input type="text numberOnly" name="total_liablilities_equities"  id="total_liablilities_equities" readonly class="form-control " value="0.00" /></td>

											</tr>
											</tbody>
										</table> 
										</div>
								</div>
							</div>
						</div>
					</div>						
				</form>
			</div>
		</div>
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
</script>