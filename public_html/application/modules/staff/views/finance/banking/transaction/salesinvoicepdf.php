<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>

body{
	color:#333;
	text-align:left;
	font-size:16px;
	margin:0;
}
.container{
	margin:0 auto;
	margin-top:35px;
	padding:40px;
	width:750px;
	height:auto;
	background-color:#fff;
}
caption{
	font-size:30px;
	margin-bottom:15px;
}
table{
	border:1px solid #333;
	border-collapse:collapse;
	margin:0 auto;
	width:740px;
}
td, tr, th{
	padding:12px;
	border:1px solid #333;
	width:185px;
}
th{
	background-color: #f0f0f0;
}
h4, p{
	margin:0px;
}
.text-small{   
font-size:15px ! important;
}
</style>


	<table>
		<caption>
			Sales Invoice
		</caption>
			<tr>
            <th colspan="2" align="left"><strong>M/s. </strong><?php echo ucwords($fpo_info[0]->producer_organisation_name); ?><br>
            <?php echo ($fpo_info[0]->village_name)?$fpo_info[0]->village_name.',':'';echo ($fpo_info[0]->panchayat_name)?$fpo_info[0]->panchayat_name."<br>":'';?>
            <?php echo ($fpo_info[0]->block_name)?$fpo_info[0]->block_name.',':''; echo ($fpo_info[0]->taluk_name)?$fpo_info[0]->taluk_name."<br>":'';?>
            <?php echo $fpo_info[0]->district_name.','.$fpo_info[0]->state_name.' - '.$fpo_info[0]->pin_code;?>
            </th>	
           <th colspan="" align="left"><p><?php echo 'Invoice No: '.$salesinvoice[0]->voucher_no;?></p><br>          
           <p><?php echo 'Invoice Date: '.$salesinvoice[0]->tran_date;?></p>          
          </th>            
			</tr>
			<tr>
			<td >
               <p><strong>PAN:</strong><?php echo strtoupper($fpo_info[0]->pan);?><br>
              <strong>CIN:</strong><?php echo (isset($fpo_info[0]->reg_no)) ? strtoupper($fpo_info[0]->reg_no):"";?><br>
              <strong>GST:</strong><?php echo (isset($fpo_info[0]->gst)) ? strtoupper($fpo_info[0]->gst):""; ?></p>
				</td>
				<td>
					<h4>Bill To:</h4>
               <?php if($salesinvoice[0]->customer_name != 'Retail Sales'){?>
               <p><strong>Mr/ Mrs. </strong><?php echo ucwords($salesinvoice[0]->customer_name); ?><br>
               <?php echo (isset($salesinvoice[0]->village_name)) ? ($salesinvoice[0]->village_name).',':"";
               echo (isset($salesinvoice[0]->panchayat_name)) ? ($salesinvoice[0]->panchayat_name).',<br>':"";
               echo (isset($salesinvoice[0]->block_name)) ? ($salesinvoice[0]->block_name).',' : "";
               echo (isset($salesinvoice[0]->taluk_name))? ($salesinvoice[0]->taluk_name).',<br>': "";?>
               <?php echo $salesinvoice[0]->district_name.','.$salesinvoice[0]->state_name.' - '.$salesinvoice[0]->pincode;?></p>
               <?php }else{ echo 'Direct Sales';}?>
            </td>
				<td >
               <h4>Ship To:</h4>
               <?php if($salesinvoice[0]->customer_name != 'Retail Sales'){?>
               <p><strong>Mr/ Mrs. </strong><?php echo ucwords($salesinvoice[0]->customer_name); ?><br>
               <?php echo (isset($salesinvoice[0]->village_name)) ? ($salesinvoice[0]->village_name).',':"";
               echo (isset($salesinvoice[0]->panchayat_name)) ? ($salesinvoice[0]->panchayat_name).',<br>':"";
               echo (isset($salesinvoice[0]->block_name)) ? ($salesinvoice[0]->block_name).',' : "";
               echo (isset($salesinvoice[0]->taluk_name))? ($salesinvoice[0]->taluk_name).',<br>': "";?>               
               <?php echo $salesinvoice[0]->district_name.','.$salesinvoice[0]->state_name.' - '.$salesinvoice[0]->pincode;?></p>
                <?php }else{ echo 'Direct Sales';}?>
				</td>
			</tr>
	</table>
	<table>
		<tbody>
      <tr>
		<!--<td align="center"><b>S.No</b></td>-->
         <td align="center"><b>Description</b></td>
         <td align="center"><b>Qty</b></td>
         <td align="center"><b>Gross Amount<h6>(&#8377;)</h6></b></td>
         <td align="center"><b>Discount<h6>(&#8377;)</h6></b></td>
         <td align="center"><b>GST<h6>(&#8377;)</h6></b></td>
         <td align="center"><b>Amount<h6>(&#8377;)</h6></b></td>
         </tr>
		 </tbody>
		 <tbody>
         <?php 
         $netTotal=0;
         foreach($salesinvoice as $sales): ?>
         <tr>
         <td style="width:45%;">
         <?php echo $sales->product_name; ?><br>
         <?php if($sales->igst_value && $sales->igst_value!=""){
            echo 'IGST - '.$sales->igst.' %';
         } else if($sales->cgst_value && $sales->cgst_value!= "" && $sales->sgst_value && $sales->sgst_value!= ""){            
            echo 'SGST/UTGST - '.$sales->sgst_utgst.'% ,  CGST - '.$sales->cgst.'%';            
         } else {
            //echo '0.00';
         } ?>
         </td>
         <td style="width:15%;" align="center"><?php echo $sales->quantity.' '.$sales->short_name;?></td>
         <td style="width:10%;" align="right"><?php echo ($sales->quantity*$sales->unit_price);?></td>
         <td style="width:10%;" align="right"><?php echo $sales->discount_percent;?></td>
         <td style="width:10%;" align="right">
         <?php if($sales->igst_value && $sales->igst_value!= ""){
            echo $sales->igst_value;
         } else if($sales->cgst_value && $sales->cgst_value!= "" && $sales->sgst_value && $sales->sgst_value!= ""){            
            echo $sales->sgst_value.'<br> '.$sales->cgst_value;            
         } else {
            //echo '0.00';
         } ?>             
         </td>
         <td style="width:10%;" align="right"><?php echo $line_total = $sales->line_total+abs($sales->sgst_value)+abs($sales->cgst_value)+abs($sales->igst_value);?></td>													
         </tr>	
         <?php 
         $netTotal = $netTotal+$line_total;
         endforeach; ?>
		</tbody>
		<tfoot>			
         <tr>
				<th colspan="5" align="right">Grand Total (&#8377;)</th>
				<th align="right" colspan="1"><?php echo $netTotal;?></th>
			</tr>
		</tfoot>
	</table>
  <br>
					<table >
					<thead>	
						<tr class="text-center">
						<th colspan="2" class="text-small" align="left"><p>Bank Address</p></th>
						<th align="left" class="text-small">Signature</th>									
						</tr>
                </thead>
					<tbody>	
						<tr class="text-center">
						<td colspan="2" style='text-transform: capitalize;'> 
							<?php if($account_info && $account_info!= null){
								echo "<b>Acc No:  </b>".$account_info->bank_account_number.'<br>';
								echo "<b>Bank: </b>".$account_info->bank_name.'<br>';
								echo "<b>IFSC & Branch: </b>".strtoupper($account_info->ifsc_code).', '.$account_info->branch_name;
							}?>
						</td>								
						<td align="center">For <?php echo ucwords($fpo_info[0]->producer_organisation_name); ?><br><br>...................<br>Authorized Signatory </td>
						</tr>								
					  </tbody>	
					</table>


