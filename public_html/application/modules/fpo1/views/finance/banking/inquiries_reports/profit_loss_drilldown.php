<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
#ledgerShowDiv {	
    position: absolute;
    width: 100%; /* Full width (cover the whole page) */
	height: 100%; /* Full height (cover the whole page) */
	top: 0; 
	left: 0;
	right: 0;
	bottom: 0;
	background-color: rgba(0,0,0,0.5); /* Black background with opacity */
	z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
	cursor: pointer; /* Add a pointer on hover */
	padding: 25px 15px 15px 15px;  
}

.ledgerShowTableBody{
	background-color: #fff;
}
.modal-open{
   padding-right: 10px ! important;
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
                        <h1>Profit & Loss</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/finance/profitandloss');?>">Profit & Loss Drilldown</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="<?php echo base_url('fpo/finance/profitAndLossReports')?>" method="post" id="profit_loss_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">      
										<div class="row">
											<div class="form-group col-md-6">												
												<h3 class="text-capitalize"><b><?php echo $fpoData[0]->producer_organisation_name; ?></b></h3>
												<h5><?php echo $fpoData[0]->village_name.' , '.$fpoData[0]->panchayat_name; ?></h5>
												<h5><?php echo $fpoData[0]->block_name.' , '.$fpoData[0]->taluk_name.' , '. $fpoData[0]->district_name; ?></h5>
												<h5><?php echo $fpoData[0]->state_name.' , '.$fpoData[0]->pin_code; ?></h5>
											</div>																																									
											<div class="form-group col-md-6">
												<div class="form-group col-md-6">
													<label for="inputAddress2">From</label>
													<input class="form-control" type="date" autofocus id="profit_loss_from" name="profit_loss_from" value="<?php echo $fromValue; ?>" max="<?php echo date("Y-m-d"); ?>">		
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">To</label>
													<input class="form-control" type="date" id="profit_loss_to" name="profit_loss_to" value="<?php echo date("Y-m-d"); ?>" readonly>		
												</div>												
												<div class="form-group col-md-12">
                                                    <label for="inputAddress2"></label>
                                                    <button type="submit" class="btn btn-success" id="search_profit_loss">Search</button>
                                                </div>		
											</div>									
									</div>
									
								<?php //if(isset($incomeGLData) || isset($expenseGLData)){ ?>
									<div class="table-responsive mt-3" id="p_and_l_account_balance">  
										<table class="table table-bordered">
											<tr bgcolor="#afd66b">		
												<th class="text-center">Income</th>
												<th class="text-center">Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
											</tr>
																						
											<tbody>												
												<?php //if($openingBalance!=0){ ?>
												<!--<tr id="row_closing" bgcolor="#A9A9A9">
													<td><strong>Opening Balance</strong></td>
													<td align="right"><?php //echo ltrim($openingBalance, '-');echo (substr($openingBalance, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>-->
												<?php //} ?>												
												<?php 
												if($incomeGLData && count($incomeGLData)!=0){
												foreach($incomeGLData As $glData){
												?>
												<tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1, 0, '')" bgcolor="#A9A9A9">
													<td><strong><?php echo $glData->account_name; ?></strong></td>
													<td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>	
												<?php }} ?>
												<?php if($closingStock!=0){ ?>
												<tr id="row_closing" bgcolor="#A9A9A9">
													<td><strong>Closing Stock</strong></td>
													<td align="right"><?php echo number_format(ltrim($closingStock, '-'), 2);echo (substr($closingStock, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>	
												<?php } ?>
												<?php //if(isset($netExpense) && $netExpense!=0){ ?>
												<!--<tr id="row_closing" bgcolor="#A9A9A9">
													<td><strong>Net Expense</strong></td>
													<td align="right"><?php //echo ltrim($netExpense, '-');echo (substr($netExpense, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>-->	
												<?php //} ?>
											</tbody>
											
											<tbody>
											<tr>
												<td width="80%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>												
												<td align="right" class="text-danger"><strong><?php echo number_format(($incomeCost)?ltrim($incomeCost, '-'):0, 2);echo (substr($incomeCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
											</tr>
											</tbody>
										</table>
										
										<table class="table table-bordered">
											<tr bgcolor="#afd66b">		
												<th class="text-center">Expense</th>
												<th class="text-center">Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
											</tr>
																						
											<tbody>
												<?php if($openingStock!=0){ ?>
												<tr id="row_closing" bgcolor="#A9A9A9">
													<td><strong>Opening Stock</strong></td>
													<td align="right"><?php echo number_format(ltrim($openingStock, '-'), 2);echo (substr($openingStock, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>	
												<?php } ?>
												<?php 
												if($expenseGLData && count($expenseGLData)!=0){
												foreach($expenseGLData As $glData){
												?>
												<tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1, 0, '')" bgcolor="#A9A9A9" >
													<td><strong><?php echo $glData->account_name; ?></strong></td>
													<td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>	
												<?php }} ?>
												<?php //if(isset($netIncome) && $netIncome!=0){ ?>
												<!--<tr id="row_closing" bgcolor="#A9A9A9">
													<td><strong>Net Income</strong></td>
													<td align="right"><?php //echo ltrim($netIncome, '-');echo (substr($netIncome, 0, 1) == '-')?' Dr':' Cr'; ?></td>
												</tr>-->	
												<?php //} ?>
											</tbody>
											
											<tbody>
											<tr>
												<td width="80%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>												
												<td align="right" class="text-danger"><strong><?php echo number_format(($expenseCost)?ltrim($expenseCost, '-'):0, 2); echo (substr($expenseCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
											</tr>
											</tbody>
										</table>
										
										
										<br/>
										<table class="table table-bordered" id='total_balance_show'>
											<tr bgcolor="#afd66b">		
												<th width="80%" class="text-danger text-right"><strong>Net Profit/Loss ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></th>
												<th class="text-danger text-right"><strong><?php echo (isset($netIncome))?number_format(ltrim($netIncome, '-'), 2):number_format(ltrim($netExpense, '-'), 2); if(isset($netIncome)){ echo (substr($netIncome, 0, 1) == '-')?' Dr':' Cr'; } else { echo (substr($netExpense, 0, 1) == '-')?' Dr':' Cr'; } ?></strong></th>
											</tr>											
											<!--<tr><td colspan="2"></td></tr>												
											<tr>
												<td width="80%" align="right" class="text-danger"><strong>Income</strong></td>
												<td class="text-danger"><strong><?php //echo ($incomeCost)?ltrim($incomeCost, '-'):"0.00";echo (substr($incomeCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
											</tr>
											<tr>
												<td width="80%" class="text-danger" align="right"><strong>Expense</strong></td>
												<td class="text-danger"><strong><?php //echo ($expenseCost)?ltrim($expenseCost, '-'):"0.00"; echo (substr($expenseCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
											</tr>
											<tr>
												<td width="80%" class="text-danger" align="right"><strong>Net Amount</strong></td>
												<td class="text-danger"><strong><?php //echo (isset($netIncome))?ltrim($netIncome, '-'):ltrim($netExpense, '-'); if(isset($netIncome)){ echo (substr($netIncome, 0, 1) == '-')?' Dr':' Cr'; } else { echo (substr($netExpense, 0, 1) == '-')?' Dr':' Cr'; } ?></strong></td>
											</tr>-->
											</tbody>
										</table>
									</div>																	
								<?php //} ?>
								
							<div class='' id='ledgerShowDiv'>
								<div class='container'>								
								<div class="table-responsive" id="ledgerShows">
									<table class="table table-bordered" id='ledgerShowTable'>
										<tbody>
											<tr bgcolor="#afd66b">	
												<td colspan='3' align='right' onclick='closePopupTable()'><i class="fa fa-close" style="font-size:25px;color:red"></i></td>
											</tr>
										</tbody>
										
										<tbody class=''>
											<tr bgcolor="#afd66b">		
												<th width="40%" class="text-center"><strong>Account Name</strong></th>
												<th width="40%" class="text-center"><strong>To Whom</strong></th>
												<th class="text-center"><strong>Amount ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></th>
											</tr>												
										</tbody>
										<tbody class='ledgerShowTableBody'>
											<tr id='test'><td colspan='3'></td></tr>	
										</tbody>
										<tbody>
											<tr bgcolor="#afd66b"><td colspan='3'></td></tr>	
										</tbody>
									</table>
								</div>
								</div>
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
if(<?php echo $showPage; ?> == 1){
	$("#p_and_l_account_balance").show();
} else {
	$("#p_and_l_account_balance").hide();
}
//$('#ledgerShowDiv').hide();
closePopupTable();


$(document).ready(function() { 
    var today = new Date();
    var passedDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    //profitAndLostDisplay(passedDate, passedDate);	
});

function getChildrenNodeByAccountCode(selectedCode, value, has_child, toggleID, person_type_id, person_id) {	
	//alert(selectedCode);
	if(toggleID == 1){
		if(value == 1){
			var bgColor = '#DCDCDC';
			var forceStyle = 'text-indent: 100px;';
			var values=2;
		} else if(value == 2){
			var bgColor = '#e9e9e9';
			var forceStyle = 'text-align: center;';
			var values=3;
		} else if(value == 3){
			var bgColor = '';
			var forceStyle = 'text-align: right;';
			var values=4;
		} else {
			var bgColor = '';
			var forceStyle = 'text-align: right;';
			var values=5;
		}
		//var childNode = {'selectedCode':selectedCode, 'codeLength':value};
		if(has_child == 1){
			var profit_loss_from = $("#profit_loss_from").val();
			var profit_loss_to = $("#profit_loss_to").val();
			var childList = {"profit_loss_from":profit_loss_from, "profit_loss_to":profit_loss_to, "accountCode":selectedCode};
			$.ajax({
				url:"<?php echo base_url();?>fpo/finance/getChildNodeByCode",
				type:"POST",
				data:childList,
				dataType:"html",
				cache:false,			
				success:function(response) {
					console.log(response);
					response=response.trim();
					responseArray=$.parseJSON(response);
					if(responseArray.status == 1) {
						var childNodeAppendChild=0;
						var childNodeAppend='';
						$.each(responseArray.glCategory, function(key, value){
							if(value.has_child != 0){
								childNodeAppend += '<tr class="row_'+selectedCode+'" id="'+value.account_code+'" onclick="getChildrenNodeByAccountCode(this.id, '+values+', '+value.has_child+', 1, '+value.person_type_id+', '+value.account+')" bgcolor="'+bgColor+'">';
								childNodeAppend += '<td style="'+forceStyle+'"><strong>'+value.account_name+'</strong></td>';
								if(value.amount.charAt(0) != '-'){
									childNodeAppend += '<td align="left">'+parseFloat(value.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Cr</td>';
								} else {
									childNodeAppend += '<td align="left">'+parseFloat(value.amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Dr</td>';
								}
								childNodeAppend += '</tr>';
							} else {
								/*childNodeAppend += '<tr class="row_'+selectedCode+'" id="'+value.account_code+'" onclick="getChildrenNodeByAccountCode(this.id, '+values+', '+value.has_child+', 1)" bgcolor="'+bgColor+'">';
								childNodeAppend += '<td width="40%" style="'+forceStyle+'"><strong>'+value.account_name+'</strong></td>';
								childNodeAppend += '<td width="40%" style="'+forceStyle+'"><strong>'+value.account_name+'</strong></td>';
								if(value.amount.charAt(0) != '-'){
									childNodeAppend += '<td align="right">'+value.amount+' Cr</td>';
								} else {
									childNodeAppend += '<td align="right">'+value.amount.substr(1)+' Dr</td>';
								}
								childNodeAppend += '</tr>';*/
								//window.location = "<?php echo base_url();?>fpo/finance/viewledger/"+selectedCode;
								childNodeAppendChild=1;							
							}
						});
						if(childNodeAppendChild!=1){
							$(childNodeAppend).insertAfter("#"+selectedCode); 
							$("#"+selectedCode).attr('onclick', 'getChildrenNodeByAccountCode('+selectedCode+', '+value+', '+has_child+', 0)');				
						} else {
							//$('#ledgerShowDiv').show();
							//$(childNodeAppend).insertAfter("#test"); 
							//$("#ledgerShowTableBody tr:last").html(childNodeAppend); 
							childNodeAppendLists(selectedCode, person_type_id, person_id);
						}
					}
				},error:function(response){
					alert('Error!!! Try again');
				} 			
			});
		} else {
			swal("Sorry!", "Don't have the child group", 'warning');
		}
	} else {
		$('.row_'+selectedCode).toggle();
	}
} 	


$("#profit_loss_from").focusout(function(){    
    var profit_loss_from = $(this).val();
	$("#profit_loss_to").removeAttr("readonly");
	$("#profit_loss_to").attr("min", profit_loss_from);
});

function childNodeAppendLists(parentAccountCode, person_type_id, person_id){
	$(".ledgerShowTableBody tr").remove();
	var profit_loss_from = $("#profit_loss_from").val();
	var profit_loss_to = $("#profit_loss_to").val();
	var childList = {"profit_loss_from":profit_loss_from, "profit_loss_to":profit_loss_to, "accountCode":parentAccountCode, "person_type_id":person_type_id, "person_id":person_id};
	$.ajax({
        url:"<?php echo base_url();?>fpo/finance/getAllChildNodeByCode",
        type:"POST",
        data:childList,
        dataType:"html",
        cache:false,			
        success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);  
			var childNodeAppend='';
			if(responseArray.glCategory!=0){
				$.each(responseArray.glCategory, function(key, value){
					if(value.has_child == 0){							
						childNodeAppend += '<tr class="row_'+value.selectedCode+'" id="'+value.account_code+'">';
						childNodeAppend += '<td width="45%" class="text-center"><strong>'+value.account_name+'</strong></td>';						
						if(value.debtor_name && value.debtor_name!=undefined){
							childNodeAppend += '<td width="40%" class="text-center"><strong>'+value.debtor_name+'</strong></td>';	
						} else if(value.supplier_name && value.supplier_name!=undefined){
							childNodeAppend += '<td width="40%" class="text-center"><strong>'+value.supplier_name+'</strong></td>';	
						} else {
							childNodeAppend += '<td width="40%"></td>';
						}
						if(value.total_amount.charAt(0) != '-'){
							childNodeAppend += '<td align="right" width="15%">'+parseFloat(value.total_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Cr</td>';
						} else {
							childNodeAppend += '<td align="right" width="15%">'+parseFloat(value.total_amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Dr</td>';
						}
						childNodeAppend += '</tr>';
					}
				}); 
			}
			$('#ledgerShowDiv').show();
			$(".ledgerShowTableBody").append(childNodeAppend);
        },
        error:function(response){
            alert('Error!!! Try again');
        } 			
    });         	
}

function closePopupTable(){
	$('#ledgerShowDiv').hide();
}

</script>