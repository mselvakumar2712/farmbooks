<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

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
                        <h1>Work Order Additional Costs</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Production Management</a></li>
							<li><a href="#">Transactions</a></li>
							<li><a href="<?php echo base_url('fpo/production'); ?>">Work Orders</a></li>
                            <li><a class="active" href="#">Edit Work Order</a></li>
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
					<form action="<?php echo base_url('fpo/production/postWorkOrder'); ?>" method="post" id="add_work_order_form" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space"> 
													<div class="form-group col-md-4">
														<label for="">Reference No.</label>
														<input type="text" class="form-control" maxlength="18" id="reference_no" name="reference_no" placeholder="Reference Number" readonly>
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Type </label>
														<select class="form-control" id="type" name="type">
															<option value="">Select Type</option>
															<option value="1">Labour Cost</option>
															<option value="2">Overhead Cost</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="">Additional Cost <span class="text-danger">*</span></label>
														<input type="text numberOnly" class="form-control text-right" id="quantity" name="quantity" required="required" data-validation-required-message="Please enter quantity" placeholder="0.00">
														<p class="help-block text-danger"></p>
													</div>
												</div>
																								
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="">Date</label>
														<input type="date" class="form-control" id="issue_date" name="issue_date" placeholder="">
													</div>
													<div class="form-group col-md-4">
														<label for="">Debit Account </label>
														<select class="form-control" id="type" name="type">
															<option value="">Select Type</option>
															<optgroup label="Current Assets">
															<option value="1060">1060&nbsp;&nbsp;&nbsp;&nbsp;Checking Account</option>
															<option value="1065">1065&nbsp;&nbsp;&nbsp;&nbsp;Petty Cash</option>
															<option value="1200">1200&nbsp;&nbsp;&nbsp;&nbsp;Accounts Receivables</option>
															<option value="1205">1205&nbsp;&nbsp;&nbsp;&nbsp;Allowance for doubtful accounts</option>
															</optgroup>
															<optgroup label="Inventory Assets">
															<option value="1510">1510&nbsp;&nbsp;&nbsp;&nbsp;Inventory</option>
															<option value="1520">1520&nbsp;&nbsp;&nbsp;&nbsp;Stocks of Raw Materials</option>
															<option value="1530">1530&nbsp;&nbsp;&nbsp;&nbsp;Stocks of Work In Progress</option>
															<option value="1540">1540&nbsp;&nbsp;&nbsp;&nbsp;Stocks of Finsihed Goods</option>
															<option value="1550">1550&nbsp;&nbsp;&nbsp;&nbsp;Goods Received Clearing account</option>
															</optgroup>
															<optgroup label="Capital Assets">
															<option value="1820">1820&nbsp;&nbsp;&nbsp;&nbsp;Office Furniture &amp; Equipment</option>
															<option value="1825">1825&nbsp;&nbsp;&nbsp;&nbsp;Accum. Amort. -Furn. &amp; Equip.</option>
															<option value="1840">1840&nbsp;&nbsp;&nbsp;&nbsp;Vehicle</option>
															<option value="1845">1845&nbsp;&nbsp;&nbsp;&nbsp;Accum. Amort. -Vehicle</option>
															</optgroup>
															<optgroup label="Current Liabilities">
															<option value="2100">2100&nbsp;&nbsp;&nbsp;&nbsp;Accounts Payable</option>
															<option value="2110">2110&nbsp;&nbsp;&nbsp;&nbsp;Accrued Income Tax - Federal</option>
															<option value="2120">2120&nbsp;&nbsp;&nbsp;&nbsp;Accrued Income Tax - State</option>
															<option value="2130">2130&nbsp;&nbsp;&nbsp;&nbsp;Accrued Franchise Tax</option>
															<option value="2140">2140&nbsp;&nbsp;&nbsp;&nbsp;Accrued Real &amp; Personal Prop Tax</option>
															<option value="2150">2150&nbsp;&nbsp;&nbsp;&nbsp;Sales Tax</option>
															<option value="2160">2160&nbsp;&nbsp;&nbsp;&nbsp;Accrued Use Tax Payable</option>
															<option value="2210">2210&nbsp;&nbsp;&nbsp;&nbsp;Accrued Wages</option>
															<option value="2220">2220&nbsp;&nbsp;&nbsp;&nbsp;Accrued Comp Time</option>
															<option value="2230">2230&nbsp;&nbsp;&nbsp;&nbsp;Accrued Holiday Pay</option>
															<option value="2240">2240&nbsp;&nbsp;&nbsp;&nbsp;Accrued Vacation Pay</option>
															<option value="2310">2310&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - 401K</option>
															<option value="2320">2320&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Stock Purchase</option>
															<option value="2330">2330&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Med, Den</option>
															<option value="2340">2340&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Payroll Taxes</option>
															<option value="2350">2350&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Credit Union</option>
															<option value="2360">2360&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Savings Bond</option>
															<option value="2370">2370&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Garnish</option>
															<option value="2380">2380&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Charity Cont.</option>
															</optgroup>
															<optgroup label="Long Term Liabilities">
															<option value="2620">2620&nbsp;&nbsp;&nbsp;&nbsp;Bank Loans</option>
															<option value="2680">2680&nbsp;&nbsp;&nbsp;&nbsp;Loans from Shareholders</option>
															</optgroup>
															<optgroup label="Share Capital">
															<option value="3350">3350&nbsp;&nbsp;&nbsp;&nbsp;Common Shares</option>
															</optgroup>
															<optgroup label="Retained Earnings">
															<option value="3590">3590&nbsp;&nbsp;&nbsp;&nbsp;Retained Earnings - prior years</option>
															</optgroup>
															<optgroup label="Sales Revenue">
															<option value="4010">4010&nbsp;&nbsp;&nbsp;&nbsp;Sales</option>
															</optgroup>
															<optgroup label="Other Revenue">
															<option value="4430">4430&nbsp;&nbsp;&nbsp;&nbsp;Shipping &amp; Handling</option>
															<option value="4440">4440&nbsp;&nbsp;&nbsp;&nbsp;Interest</option>
															<option value="4450">4450&nbsp;&nbsp;&nbsp;&nbsp;Foreign Exchange Gain</option>
															<option value="4500">4500&nbsp;&nbsp;&nbsp;&nbsp;Prompt Payment Discounts</option>
															<option value="4510">4510&nbsp;&nbsp;&nbsp;&nbsp;Discounts Given</option>
															</optgroup>
															<optgroup label="Cost of Goods Sold">
															<option value="5010">5010&nbsp;&nbsp;&nbsp;&nbsp;Cost of Goods Sold - Retail</option>
															<option value="5020">5020&nbsp;&nbsp;&nbsp;&nbsp;Material Usage Varaiance</option>
															<option value="5030">5030&nbsp;&nbsp;&nbsp;&nbsp;Consumable Materials</option>
															<option value="5040">5040&nbsp;&nbsp;&nbsp;&nbsp;Purchase price Variance</option>
															<option value="5050">5050&nbsp;&nbsp;&nbsp;&nbsp;Purchases of materials</option>
															<option value="5060">5060&nbsp;&nbsp;&nbsp;&nbsp;Discounts Received</option>
															<option value="5100">5100&nbsp;&nbsp;&nbsp;&nbsp;Freight</option>
															</optgroup>
															<optgroup label="Payroll Expenses">
															<option value="5410">5410&nbsp;&nbsp;&nbsp;&nbsp;Wages &amp; Salaries</option>
															<option value="5420">5420&nbsp;&nbsp;&nbsp;&nbsp;Wages - Overtime</option>
															<option value="5430">5430&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Comp Time</option>
															<option value="5440">5440&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Payroll Taxes</option>
															<option value="5450">5450&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Workers Comp</option>
															<option value="5460">5460&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Pension</option>
															<option value="5470">5470&nbsp;&nbsp;&nbsp;&nbsp;Benefits - General Benefits</option>
															<option value="5510">5510&nbsp;&nbsp;&nbsp;&nbsp;Inc Tax Exp - Federal</option>
															<option value="5520">5520&nbsp;&nbsp;&nbsp;&nbsp;Inc Tax Exp - State</option>
															<option value="5530">5530&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Real Estate</option>
															<option value="5540">5540&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Personal Property</option>
															<option value="5550">5550&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Franchise</option>
															<option value="5560">5560&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Foreign Withholding</option>
															</optgroup>
															<optgroup label="General &amp; Administrative expenses">
															<option value="5610">5610&nbsp;&nbsp;&nbsp;&nbsp;Accounting &amp; Legal</option>
															<option value="5615">5615&nbsp;&nbsp;&nbsp;&nbsp;Advertising &amp; Promotions</option>
															<option value="5620">5620&nbsp;&nbsp;&nbsp;&nbsp;Bad Debts</option>
															<option value="5660">5660&nbsp;&nbsp;&nbsp;&nbsp;Amortization Expense</option>
															<option value="5685">5685&nbsp;&nbsp;&nbsp;&nbsp;Insurance</option>
															<option value="5690">5690&nbsp;&nbsp;&nbsp;&nbsp;Interest &amp; Bank Charges</option>
															<option value="5700">5700&nbsp;&nbsp;&nbsp;&nbsp;Office Supplies</option>
															<option value="5760">5760&nbsp;&nbsp;&nbsp;&nbsp;Rent</option>
															<option value="5765">5765&nbsp;&nbsp;&nbsp;&nbsp;Repair &amp; Maintenance</option>
															<option value="5780">5780&nbsp;&nbsp;&nbsp;&nbsp;Telephone</option>
															<option value="5785">5785&nbsp;&nbsp;&nbsp;&nbsp;Travel &amp; Entertainment</option>
															<option value="5790">5790&nbsp;&nbsp;&nbsp;&nbsp;Utilities</option>
															<option value="5795">5795&nbsp;&nbsp;&nbsp;&nbsp;Registrations</option>
															<option value="5800">5800&nbsp;&nbsp;&nbsp;&nbsp;Licenses</option>
															<option value="5810">5810&nbsp;&nbsp;&nbsp;&nbsp;Foreign Exchange Loss</option>
															<option value="9990">9990&nbsp;&nbsp;&nbsp;&nbsp;Year Profit/Loss</option>
															</optgroup>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="">Credit Account </label>
														<select class="form-control" id="type" name="type">
															<option value="">Select Type</option>
															<optgroup label="Current Assets">
															<option value="1060">1060&nbsp;&nbsp;&nbsp;&nbsp;Checking Account</option>
															<option value="1065">1065&nbsp;&nbsp;&nbsp;&nbsp;Petty Cash</option>
															<option value="1200">1200&nbsp;&nbsp;&nbsp;&nbsp;Accounts Receivables</option>
															<option value="1205">1205&nbsp;&nbsp;&nbsp;&nbsp;Allowance for doubtful accounts</option>
															</optgroup><optgroup label="Inventory Assets">
															<option value="1510">1510&nbsp;&nbsp;&nbsp;&nbsp;Inventory</option>
															<option value="1520">1520&nbsp;&nbsp;&nbsp;&nbsp;Stocks of Raw Materials</option>
															<option value="1530">1530&nbsp;&nbsp;&nbsp;&nbsp;Stocks of Work In Progress</option>
															<option value="1540">1540&nbsp;&nbsp;&nbsp;&nbsp;Stocks of Finsihed Goods</option>
															<option value="1550">1550&nbsp;&nbsp;&nbsp;&nbsp;Goods Received Clearing account</option>
															</optgroup><optgroup label="Capital Assets">
															<option value="1820">1820&nbsp;&nbsp;&nbsp;&nbsp;Office Furniture &amp; Equipment</option>
															<option value="1825">1825&nbsp;&nbsp;&nbsp;&nbsp;Accum. Amort. -Furn. &amp; Equip.</option>
															<option value="1840">1840&nbsp;&nbsp;&nbsp;&nbsp;Vehicle</option>
															<option value="1845">1845&nbsp;&nbsp;&nbsp;&nbsp;Accum. Amort. -Vehicle</option>
															</optgroup><optgroup label="Current Liabilities">
															<option value="2100">2100&nbsp;&nbsp;&nbsp;&nbsp;Accounts Payable</option>
															<option value="2110">2110&nbsp;&nbsp;&nbsp;&nbsp;Accrued Income Tax - Federal</option>
															<option value="2120">2120&nbsp;&nbsp;&nbsp;&nbsp;Accrued Income Tax - State</option>
															<option value="2130">2130&nbsp;&nbsp;&nbsp;&nbsp;Accrued Franchise Tax</option>
															<option value="2140">2140&nbsp;&nbsp;&nbsp;&nbsp;Accrued Real &amp; Personal Prop Tax</option>
															<option value="2150">2150&nbsp;&nbsp;&nbsp;&nbsp;Sales Tax</option>
															<option value="2160">2160&nbsp;&nbsp;&nbsp;&nbsp;Accrued Use Tax Payable</option>
															<option value="2210">2210&nbsp;&nbsp;&nbsp;&nbsp;Accrued Wages</option>
															<option value="2220">2220&nbsp;&nbsp;&nbsp;&nbsp;Accrued Comp Time</option>
															<option value="2230">2230&nbsp;&nbsp;&nbsp;&nbsp;Accrued Holiday Pay</option>
															<option value="2240">2240&nbsp;&nbsp;&nbsp;&nbsp;Accrued Vacation Pay</option>
															<option value="2310">2310&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - 401K</option>
															<option value="2320">2320&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Stock Purchase</option>
															<option value="2330">2330&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Med, Den</option>
															<option value="2340">2340&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Payroll Taxes</option>
															<option value="2350">2350&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Credit Union</option>
															<option value="2360">2360&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Savings Bond</option>
															<option value="2370">2370&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Garnish</option>
															<option value="2380">2380&nbsp;&nbsp;&nbsp;&nbsp;Accr. Benefits - Charity Cont.</option>
															</optgroup><optgroup label="Long Term Liabilities">
															<option value="2620">2620&nbsp;&nbsp;&nbsp;&nbsp;Bank Loans</option>
															<option value="2680">2680&nbsp;&nbsp;&nbsp;&nbsp;Loans from Shareholders</option>
															</optgroup><optgroup label="Share Capital">
															<option value="3350">3350&nbsp;&nbsp;&nbsp;&nbsp;Common Shares</option>
															</optgroup><optgroup label="Retained Earnings">
															<option value="3590">3590&nbsp;&nbsp;&nbsp;&nbsp;Retained Earnings - prior years</option>
															</optgroup><optgroup label="Sales Revenue">
															<option value="4010">4010&nbsp;&nbsp;&nbsp;&nbsp;Sales</option>
															</optgroup><optgroup label="Other Revenue">
															<option value="4430">4430&nbsp;&nbsp;&nbsp;&nbsp;Shipping &amp; Handling</option>
															<option value="4440">4440&nbsp;&nbsp;&nbsp;&nbsp;Interest</option>
															<option value="4450">4450&nbsp;&nbsp;&nbsp;&nbsp;Foreign Exchange Gain</option>
															<option value="4500">4500&nbsp;&nbsp;&nbsp;&nbsp;Prompt Payment Discounts</option>
															<option value="4510">4510&nbsp;&nbsp;&nbsp;&nbsp;Discounts Given</option>
															</optgroup><optgroup label="Cost of Goods Sold">
															<option value="5010">5010&nbsp;&nbsp;&nbsp;&nbsp;Cost of Goods Sold - Retail</option>
															<option value="5020">5020&nbsp;&nbsp;&nbsp;&nbsp;Material Usage Varaiance</option>
															<option value="5030">5030&nbsp;&nbsp;&nbsp;&nbsp;Consumable Materials</option>
															<option value="5040">5040&nbsp;&nbsp;&nbsp;&nbsp;Purchase price Variance</option>
															<option value="5050">5050&nbsp;&nbsp;&nbsp;&nbsp;Purchases of materials</option>
															<option value="5060">5060&nbsp;&nbsp;&nbsp;&nbsp;Discounts Received</option>
															<option value="5100">5100&nbsp;&nbsp;&nbsp;&nbsp;Freight</option>
															</optgroup><optgroup label="Payroll Expenses">
															<option value="5410">5410&nbsp;&nbsp;&nbsp;&nbsp;Wages &amp; Salaries</option>
															<option value="5420">5420&nbsp;&nbsp;&nbsp;&nbsp;Wages - Overtime</option>
															<option value="5430">5430&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Comp Time</option>
															<option value="5440">5440&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Payroll Taxes</option>
															<option value="5450">5450&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Workers Comp</option>
															<option value="5460">5460&nbsp;&nbsp;&nbsp;&nbsp;Benefits - Pension</option>
															<option value="5470">5470&nbsp;&nbsp;&nbsp;&nbsp;Benefits - General Benefits</option>
															<option value="5510">5510&nbsp;&nbsp;&nbsp;&nbsp;Inc Tax Exp - Federal</option>
															<option value="5520">5520&nbsp;&nbsp;&nbsp;&nbsp;Inc Tax Exp - State</option>
															<option value="5530">5530&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Real Estate</option>
															<option value="5540">5540&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Personal Property</option>
															<option value="5550">5550&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Franchise</option>
															<option value="5560">5560&nbsp;&nbsp;&nbsp;&nbsp;Taxes - Foreign Withholding</option>
															</optgroup><optgroup label="General &amp; Administrative expenses">
															<option value="5610">5610&nbsp;&nbsp;&nbsp;&nbsp;Accounting &amp; Legal</option>
															<option value="5615">5615&nbsp;&nbsp;&nbsp;&nbsp;Advertising &amp; Promotions</option>
															<option value="5620">5620&nbsp;&nbsp;&nbsp;&nbsp;Bad Debts</option>
															<option value="5660">5660&nbsp;&nbsp;&nbsp;&nbsp;Amortization Expense</option>
															<option value="5685">5685&nbsp;&nbsp;&nbsp;&nbsp;Insurance</option>
															<option value="5690">5690&nbsp;&nbsp;&nbsp;&nbsp;Interest &amp; Bank Charges</option>
															<option value="5700">5700&nbsp;&nbsp;&nbsp;&nbsp;Office Supplies</option>
															<option value="5760">5760&nbsp;&nbsp;&nbsp;&nbsp;Rent</option>
															<option value="5765">5765&nbsp;&nbsp;&nbsp;&nbsp;Repair &amp; Maintenance</option>
															<option value="5780">5780&nbsp;&nbsp;&nbsp;&nbsp;Telephone</option>
															<option value="5785">5785&nbsp;&nbsp;&nbsp;&nbsp;Travel &amp; Entertainment</option>
															<option value="5790">5790&nbsp;&nbsp;&nbsp;&nbsp;Utilities</option>
															<option value="5795">5795&nbsp;&nbsp;&nbsp;&nbsp;Registrations</option>
															<option value="5800">5800&nbsp;&nbsp;&nbsp;&nbsp;Licenses</option>
															<option value="5810">5810&nbsp;&nbsp;&nbsp;&nbsp;Foreign Exchange Loss</option>
															<option value="9990">9990&nbsp;&nbsp;&nbsp;&nbsp;Year Profit/Loss</option>
															</optgroup>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												</div>
										</div>										
										<div class="row row-space mt-5">
											<div class="form-group col-md-12 text-center">
											<div id="success"></div>
											<a href="<?php echo base_url('fpo/production/editWorkOrder/'); ?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Work Order<a>
											<a href="<?php echo base_url('fpo/production');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
										  </div>											 
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>

</script>	 
</body>
</html>