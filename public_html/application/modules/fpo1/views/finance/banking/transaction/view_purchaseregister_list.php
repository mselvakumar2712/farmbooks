<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
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
@page 
{
   size: auto;   /* auto is the current printer page size */
   margin: 0mm;  /* this affects the margin in the printer settings */
}

body 
{
   background-color:#FFFFFF; 
   margin: 0px;  /* the margin on the content before printing */
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
                           <h1>Purchase Detail</h1>
                       </div>
                   </div>
               </div>        
         
               <div class="col-sm-8">
                   <div class="page-header float-right">
                       <div class="page-title">
                           <ol class="breadcrumb text-right">
                               <li><a href="#">Finance</a></li>
                               <li><a href="#">Inquiries and Reports</a></li>
                               <li class="active">Purchase Detail</li>
                           </ol>
                       </div>
                   </div>
               </div>
            </div>
            <div class="content mt-3">
               <div class="animated fadeIn">
                  <form action="" method="post" id="directorform" name="sentMessage" novalidate="novalidate" >                   
                     <div class="row" id='printMe'>
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="container-fluid">
                                    <table class="table table-bordered">
                                       <tr>
                                          <th align="left">
                                          <h4><strong>Supplier:</strong></h4>
                                          <?php if($total_info->supplier_id != '4020501' && $total_info->supplier_id != '4020502'){ ?>
                                          <p><strong>M/s. <?php echo ucwords($purchaseinvoice[0]->supplier_name); ?><br>
                                          <?php echo (isset($purchaseinvoice[0]->village_name)) ? ($purchaseinvoice[0]->village_name).',':"";
                                          echo (isset($purchaseinvoice[0]->panchayat_name)) ? ($purchaseinvoice[0]->panchayat_name).',':"";
                                          echo (isset($purchaseinvoice[0]->block_name)) ? ($purchaseinvoice[0]->block_name).' Block,' : "";
                                          echo (isset($purchaseinvoice[0]->taluk_name))? ($purchaseinvoice[0]->taluk_name).' Taluk,<br> ': "";?>              
                                          <?php echo (isset($purchaseinvoice[0]->district_name))?$purchaseinvoice[0]->district_name.'&nbsp;District,':'';echo (isset($purchaseinvoice[0]->state_name))?$purchaseinvoice[0]->state_name.' - '.$purchaseinvoice[0]->pincode:'';?></p>                                      
                                          </strong>
                                          <?php } ?>
                                          </th>	
                                          <th style="width:30%;" align="left">
                                             <p><?php echo 'Invoice No: '.$purchaseinvoice[0]->supp_reference;?></p>          
                                             <p><?php echo 'Invoice Date: '.fpo_display_date($purchaseinvoice[0]->tran_date);?></p>
                                             <p><?php echo 'Reference: '.strtoupper($purchaseinvoice[0]->voucher_no);?></p>
                                          </th>            
                                       </tr>
                                       <caption style="font-size:1.2rem; margin:.3rem 0 0 0; padding-bottom:0;">
                                       Item Detail
                                       </caption>
                                       <tr>                                       
                                          <td>
                                             <h4><strong>Delivered To:</strong></h4>
                                             <?php echo ucwords($fpo_info[0]->producer_organisation_name); ?><br>
                                             <?php echo ($fpo_info[0]->village_name )?$fpo_info[0]->village_name.',':'';echo ($fpo_info[0]->panchayat_name)?$fpo_info[0]->panchayat_name."<br>":'';?>
                                             <?php echo ($fpo_info[0]->block_name)?$fpo_info[0]->block_name.',':'';echo ($fpo_info[0]->taluk_name)?$fpo_info[0]->taluk_name." Taluk,<br>":'';?>
                                             <?php echo $fpo_info[0]->district_name.' District,'.$fpo_info[0]->state_name.' - '.$fpo_info[0]->pin_code;?>
                                          </td>
                                          <td style="width:40%;">
                                             <p><strong>PAN:</strong><?php echo (isset($purchaseinvoice[0]->pan)) ? strtoupper($purchaseinvoice[0]->pan):""?><br>
                                               <strong>GST:</strong><?php echo (isset($purchaseinvoice[0]->gst)) ? strtoupper($purchaseinvoice[0]->gst):""; ?></p>
                                          </td>
                                       </tr>
                                    </table>
                                    
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th align="center"><b>Description</b></th>
                                             <th align="center"><b>Quantity</b></th>
                                             <th align="center"><b>Quantity Each</b></th>
                                             <th align="center"><b>Unit Price ( <span class="fa fa-inr"></span> )</b></th>
                                             <th align="center"><b>Discount ( <span class="fa fa-inr"></span> )</b></th>
                                             <th align="center"><b>GST ( <span class="fa fa-inr"></span> )</b></th>
                                             <th align="center"><b>Amount<br>( <span class="fa fa-inr"></span> )</b></th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                      <?php 
                                          $netTotal=0;
                                          foreach($purchaseinvoice as $sales): ?>
                                          <tr>
                                             <td style="width:35%;">
                                             <?php echo $sales->product_name; ?><br>
                                             <span style="font-size:.6rem;">
                                             <?php if($sales->igst_value && $sales->igst_value!=""){
                                             echo 'IGST - '.number_format($sales->igst,2).' %';
                                             } else if($sales->cgst_value && $sales->cgst_value!= "" && $sales->sgst_value && $sales->sgst_value!= ""){            
                                             echo 'SGST/UTGST - '.number_format($sales->sgst_utgst, 2).'% ,  CGST - '.number_format($sales->cgst ,2).'%','<br>';            
                                             $HSN_Value = explode(' ', $sales->hsn_code);
                                             echo 'HSN - '.$HSN_Value[0];
                                            } else {
                                             //echo '0.00';
                                             } ?>
                                             </span>
                                             </td>
                                             <td style="width:15%;" align="center"><?php echo $sales->qty_invoiced.' '.$sales->short_name;?></td>
                                             <td style="width:10%;" align="center"><?php //echo $sales->qty_invoiced.' '.$sales->short_name;?></td>
                                             <td style="width:15%;" align="right"><?php $gross = sprintf('%.2f',$sales->qty_invoiced*$sales->unit_price); echo number_format($gross, 2); ?></td>
                                             <td style="width:15%;" align="right"><?php $discount = sprintf('%.2f',$sales->discount); echo number_format($discount, 2);?></td>
                                             <td style="width:10%;" align="right">
                                             <?php if($sales->igst_value && $sales->igst_value!= ""){
                                             echo number_format(sprintf('%.2f',$sales->igst_value),2);
                                             } else if($sales->cgst_value && $sales->cgst_value!= "" && $sales->sgst_value && $sales->sgst_value!= ""){            
                                             echo number_format(sprintf('%.2f',$sales->sgst_value),2).'<br> '.number_format(sprintf('%.2f',$sales->cgst_value),2);            
                                             } else {
                                             //echo '0.00';
                                             } ?>             
                                             </td>
                                            <!--<td style="width:20%;" align="right"><?php //echo $totalPurchaseValues_number;?></td>	-->
                                             <td style="width:10%;" align="right"><?php $line_total = sprintf('%.2f',($gross - $discount)+abs($sales->sgst_value)+abs($sales->cgst_value)+abs($sales->igst_value)); echo number_format($line_total, 2); ?></td>
                                          </tr>	
                                          <?php 
                                          $netTotal = $netTotal+$line_total;
                                          endforeach; ?> 
                                       </tbody>
                                       <tfoot>			
                                          <tr>
                                             <th colspan="2" class="text-right">IGST ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->total_igst)?$total_info->total_igst:'0', 2); ?></th>
                                             <th colspan="3" class="text-right">Sub Total ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format($netTotal, 2); ?></th>
                                          </tr>                               
                                          <tr>
                                             <th colspan="2" class="text-right">CGST ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->total_cgst)?$total_info->total_cgst:0, 2); ?></th>
                                             <th colspan="3" class="text-right">Delievery Charge ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->delivery_charge!=0)?$total_info->delivery_charge:0, 2); ?></th>
                                          </tr>
                                          <tr>
                                           <th colspan="2" class="text-right">SGST / UTGST ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->total_sgst)?$total_info->total_sgst:0, 2); ?></th>
                                             <th colspan="3" class="text-right">Discount ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->ov_discount!=0)?$total_info->ov_discount:0, 2); ?></th>
                                          </tr>
                                          <tr>
                                             <th colspan="6" class="text-right">Adjustment ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format(($total_info->adjustment!=0)?$total_info->adjustment:0, 2); ?></th>
                                          </tr>
                                           <tr>
                                             <th colspan="6" class="text-right">Total ( <span class="fa fa-inr"></span> )</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo number_format($total_info->overall_total, 2); ?></th>
                                          </tr>
                                         <tr>
                                       <th colspan="12" class="text-right">
                                       <label><?php echo 'RUPEES '.$totalSalesValues_words.'ONLY';?></label>
                                       </th>
                                       </tr>
                                       </tfoot>
                                    </table>
                                    <div class="row">
                                    <div class="col-md-4">&nbsp;</div>
                                     <div class="col-md-5">
                                     <button class="btn-fs btn btn-success text-center" id='print_button' onclick="printDiv('printMe')"><i class="fa fa-print"></i> Print</button>
                                       <a href="<?php echo base_url('fpo/finance/purchaseregisterlist');?>" id='back_button' class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>	
                                     </div>
                                      <div class="col-md-3">&nbsp;</div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>                  
               </div>	
            </div><!-- /#right-panel -->            
         </div>
      </div>
      <?php $this->load->view('templates/footer.php');?>         
      <?php $this->load->view('templates/bottom.php');?> 
      <?php $this->load->view('templates/datatable.php');?>	   
   </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	$('#example').DataTable({aaSorting: [[0, 'desc']]});
});

function printDiv(divName){
      document.getElementById('print_button').style.display = 'none';
      document.getElementById('back_button').style.display = 'none';
      var printContents = document.getElementById(divName).innerHTML;  
      document.body.innerHTML = printContents;
      window.print();         
}

</script>
