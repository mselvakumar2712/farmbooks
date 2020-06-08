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
			Invoice
		</caption>
			<tr>
            <th colspan="2" align="left"><strong>M/s. </strong><?php echo ucwords($fpo_info[0]->producer_organisation_name); ?><br>
            <?php echo ($fpo_info[0]->village_name)?$fpo_info[0]->village_name.',':'';echo ($fpo_info[0]->panchayat_name)?$fpo_info[0]->panchayat_name."<br>":'';?>
            <?php echo ($fpo_info[0]->block_name)?$fpo_info[0]->block_name.',':''; echo ($fpo_info[0]->taluk_name)?$fpo_info[0]->taluk_name." Taluk,<br>":'';?>
            <?php echo $fpo_info[0]->district_name.'&nbsp;District,'.$fpo_info[0]->state_name.' - '.$fpo_info[0]->pin_code;?>
            </th>	
           <th align="left"><p><?php echo 'Invoice No: '.$salesinvoice[0]->voucher_no;?></p><br>          
           <p style="font-size:14px;"><?php echo 'Invoice Date: '.fpo_display_date($salesinvoice[0]->tran_date);?></p>          
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
               <p><?php echo ucwords($salesinvoice[0]->customer_name); ?><br>
               <?php echo (isset($salesinvoice[0]->village_name)) ? ($salesinvoice[0]->village_name).',':"";
               echo (isset($salesinvoice[0]->panchayat_name)) ? ($salesinvoice[0]->panchayat_name).',<br>':"";
               echo (isset($salesinvoice[0]->block_name)) ? ($salesinvoice[0]->block_name).' ,<br>' : "";
               echo (isset($salesinvoice[0]->taluk_name))? ($salesinvoice[0]->taluk_name).' Taluk ,<br>': "";?>               
               <?php echo $salesinvoice[0]->district_name.' District ,';?><br>
               <?php echo $salesinvoice[0]->state_name.' - '.$salesinvoice[0]->pincode;?></p>
               <?php }else{ echo 'Direct Sales';}?>
            </td>
				<td >
               <h4>Ship To:</h4>
               <?php if($salesinvoice[0]->customer_name != 'Retail Sales'){?>
               <p><?php echo ucwords($salesinvoice[0]->customer_name); ?><br>
               <?php echo (isset($salesinvoice[0]->village_name)) ? ($salesinvoice[0]->village_name).',':"";
               echo (isset($salesinvoice[0]->panchayat_name)) ? ($salesinvoice[0]->panchayat_name).',<br>':"";
               echo (isset($salesinvoice[0]->block_name)) ? ($salesinvoice[0]->block_name).' ,<br>' : "";
               echo (isset($salesinvoice[0]->taluk_name))? ($salesinvoice[0]->taluk_name).' Taluk ,<br>': "";?>               
               <?php echo $salesinvoice[0]->district_name.' District ,';?><br>
               <?php echo $salesinvoice[0]->state_name.' - '.$salesinvoice[0]->pincode;?></p>
               <?php }else{ echo 'Direct Sales';}?>
				</td>
			</tr>
	</table><br>
	<table>
		<tbody>
      <tr>
		<!--<td align="center"><b>S.No</b></td>-->
         <td align="center"><b>Description</b></td>
          <td align="center"><b>Quantity</b></td>
         <td align="center"><b>Quantity Each</b></td>
        <td align="center"><b>Unit Price<h6>(&#8377;)</h6></b></td>
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
            echo 'SGST/UTGST - '.$sales->sgst_utgst.'% ,  CGST - '.$sales->cgst.'%','<br>';
            echo 'HSN - '.$sales->hsn_code;            
         } else {
            //echo '0.00';
         } ?>
         </td>
         <td style="width:15%;" align="center"><?php echo $sales->quantity.' '.$sales->short_name;?></td>
         <td style="width:15%;" align="center"><?php //echo $sales->quantity.' '.$sales->short_name;?></td>
         <td style="width:10%;" align="right"><?php echo number_format($sales->quantity*$sales->unit_price,2);?></td>
         <td style="width:10%;" align="right"><?php echo $sales->discount_percent;?></td>
         <td style="width:10%;" align="right">
         <?php if($sales->igst_value && $sales->igst_value!= ""){
            echo number_format($sales->igst_value,2);
         } else if($sales->cgst_value && $sales->cgst_value!= "" && $sales->sgst_value && $sales->sgst_value!= ""){            
            echo number_format($sales->sgst_value,2).'<br> '.number_format($sales->cgst_value, 2);            
         } else {
            //echo '0.00';
         } ?>             
         </td>
         <td style="width:10%;" align="right"><?php $line_total = $sales->line_total+abs($sales->sgst_value)+abs($sales->cgst_value)+abs($sales->igst_value); echo number_format($line_total, 2); ?></td>
        </tr>	
         <?php 
         $netTotal = $netTotal+$line_total;
         endforeach; ?>
		</tbody>
		<tfoot>			
         <tr>
            <th colspan="2" align="right">IGST (&#8377;)</th>
             <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->total_igst)?$total_info->total_igst:0, 2); ?></th>
             <th colspan="3" align="right">Sub Total (&#8377;)</th>
             <th class="text-right" colspan="1" align="right"><?php echo number_format($netTotal, 2); ?></th>
           </tr>                               
         <tr>
            <th colspan="2" align="right">CGST (&#8377;)</th>
          <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->total_cgst)?$total_info->total_cgst:0, 2); ?></th>
           <th colspan="3" align="right">Delievery Charge (&#8377;)</th>
            <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->ov_freight!=0)?$total_info->ov_freight:0, 2); ?></th>
           </tr>
         <tr>
          <th colspan="2" align="right">SGST / UTGST (&#8377;)</th>
          <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->total_sgst)?$total_info->total_sgst:0, 2); ?></th>
           <th colspan="3" align="right">Discount (&#8377;)</th>
       <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->ov_discount!=0)?$total_info->ov_discount:0, 2); ?></th>
         </tr>
         <tr>
            <th colspan="6" align="right">Adjustment (&#8377;)</th>
          <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->adjustment!=0)?$total_info->adjustment:0, 2); ?></th>
            </tr>
          <tr>
            <th colspan="6" align="right">Total (&#8377;)</th>
            <th class="text-right" colspan="1" align="right"><?php echo number_format($total_info->overall_total, 2); ?></th>
         </tr> 
         <tr>
            <th colspan="6" align="right">
            <label><?php echo $totalValues_words.'ONLY';?></label>
            </th>
         </tr>
		</tfoot>
	</table>
  <br>
					<table >
					<thead>	
						<tr class="text-center">
						<th class="text-small"><p>Bank Address</p></th>
						<th class="text-small">Signature</th>									
						</tr>
                </thead>
					<tbody>	
						<tr class="text-center">
						<td style='text-transform: capitalize;'> 
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


