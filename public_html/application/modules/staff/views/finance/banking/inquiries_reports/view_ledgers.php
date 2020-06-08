<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($reportType == 1){ 
	$redirection_path = base_url('staff/finance/profitandloss'); 
} else { 
	$redirection_path = base_url('staff/finance/balancesheetdrilldown'); 
}
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
.table td, .table th {
    padding: 0.5rem;
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
                        <h1>View Ledgers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="#">Finance</a></li>
							<li><a href="#">Inquiries & Reports</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/finance/profitandloss');?>">Profit & Loss Drilldown</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="<?php echo base_url('staff/finance/profitAndLossReports')?>" method="post" id="profit_loss_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">      
									<div class="row">											
										<div class="form-group col-md-12">
											<a href="<?php echo $redirection_path; ?>" class="btn btn-outline-dark">Back</a>
                                        </div>		
									</div>
									
								<?php if(isset($ledgerData)){ ?>
									<div class="table-responsive mt-3" id="p_and_l_account_balance">  
										<table class="table table-bordered">
											<tr bgcolor="#afd66b">		
												<th class="text-center">Account Name</th>
												<th class="text-center">Amount (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
											</tr>
																						
											<tbody>											
												<?php 
												if($ledgerData && count($ledgerData)!=0){
												foreach($ledgerData As $glData){
												?>
												<tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>)" bgcolor="#A9A9A9" >
													<td><strong><?php echo $glData->account_name; ?></strong></td>
													<td align="right"><?php echo ltrim($glData->amount, '-');echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>	
												<?php }} ?>
											</tbody>
											
											<tbody>
											<tr><td colspan="2"></td></tr>
											<tr>
												<td width="80%" class="text-right text-danger"><strong>Total (<i class="fa fa-inr" aria-hidden="true"></i>)</strong></td>												
												<td align="right" class="text-danger"><strong><?php echo ($ledgerTotalCost)?ltrim($ledgerTotalCost, '-'):"0.00";echo (substr($ledgerTotalCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
											</tr>
											</tbody>
										</table>								
									</div>
								<?php } ?>
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
</script>