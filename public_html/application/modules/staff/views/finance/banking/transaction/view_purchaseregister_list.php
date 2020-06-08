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
                               <li><a href="#">Transaction</a></li>
                               <li class="active">Purchase Detail</li>
                           </ol>
                       </div>
                   </div>
               </div>
            </div>
            <div class="content mt-3">
               <div class="animated fadeIn">
                  <form action=""  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="container-fluid">
                                    <table class="table table-bordered">
                                       <tr>
                                          <th align="left">
                                          <h4><strong>Supplier:</strong></h4>
                                          <p><strong>M/s. <?php echo ucwords($purchaseinvoice[0]->supplier_name); ?><br>
                                             <?php echo (isset($purchaseinvoice[0]->village_name)) ? ($purchaseinvoice[0]->village_name).',':"";
                                             echo (isset($purchaseinvoice[0]->panchayat_name)) ? ($purchaseinvoice[0]->panchayat_name).',':"";
                                             echo (isset($purchaseinvoice[0]->block_name)) ? ($purchaseinvoice[0]->block_name).',' : "";
                                             echo (isset($purchaseinvoice[0]->taluk_name))? ($purchaseinvoice[0]->taluk_name).',<br> ': "";?>              
                                             <?php echo (isset($purchaseinvoice[0]->district_name))?$purchaseinvoice[0]->district_name.',':'';echo (isset($purchaseinvoice[0]->state_name))?$purchaseinvoice[0]->state_name.' - '.$purchaseinvoice[0]->pincode:'';?></p>                                      
                                             </strong>
                                          </th>	
                                          <th style="width:30%;" align="left">
                                             <p><?php echo 'Invoice No: '.$purchaseinvoice[0]->supp_reference;?></p>          
                                             <p><?php echo 'Invoice Date: '.$purchaseinvoice[0]->tran_date;?></p>
                                             <p><?php echo 'Reference: '.$purchaseinvoice[0]->voucher_no;?></p>
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
                                             <?php echo ($fpo_info[0]->block_name)?$fpo_info[0]->block_name.',':'';echo ($fpo_info[0]->taluk_name)?$fpo_info[0]->taluk_name."<br>":'';?>
                                             <?php echo $fpo_info[0]->district_name.','.$fpo_info[0]->state_name.' - '.$fpo_info[0]->pin_code;?>
                                          </td>
                                          <td style="width:40%;">
                                             <p><strong>PAN:</strong><?php echo strtoupper($fpo_info[0]->pan);?><br>
                                             <strong>CIN:</strong><?php echo (isset($fpo_info[0]->reg_no)) ? strtoupper($fpo_info[0]->reg_no):"";?><br>
                                             <strong>GST:</strong><?php echo (isset($fpo_info[0]->gst)) ? strtoupper($fpo_info[0]->gst):""; ?></p>
                                          </td>
                                       </tr>
                                    </table>
                                    
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th align="center"><b>Description</b></th>
                                             <th align="center"><b>Qty</b></th>
                                             <th align="center"><b>Gross Amount<span>(&#8377;)</span></b></th>
                                             <th align="center"><b>Discount<span>(&#8377;)</span></b></th>
                                             <th align="center"><b>GST<span>(&#8377;)</span></b></th>
                                             <th align="center"><b>Amount<span>(&#8377;)</span></b></th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php 
                                          $netTotal=0;
                                          foreach($purchaseinvoice as $sales): ?>
                                          <tr>
                                             <td style="width:45%;">
                                             <?php echo $sales->product_name; ?><br>
                                             <span style="font-size:.6rem;">
                                             <?php if($sales->igst_value && $sales->igst_value!=""){
                                             echo 'IGST - '.$sales->igst.' %';
                                             } else if($sales->cgst_value && $sales->cgst_value!= "" && $sales->sgst_value && $sales->sgst_value!= ""){            
                                             echo 'SGST/UTGST - '.$sales->sgst_utgst.'% ,  CGST - '.$sales->cgst.'%';            
                                             } else {
                                             //echo '0.00';
                                             } ?>
                                             </span>
                                             </td>
                                             <td style="width:15%;" align="center"><?php echo $sales->qty_invoiced.' '.$sales->short_name;?></td>
                                             <td style="width:10%;" align="right"><?php echo $gross = sprintf('%.2f',$sales->qty_invoiced*$sales->unit_price);?></td>
                                             <td style="width:10%;" align="right"><?php echo $discount = sprintf('%.2f',$sales->discount);?></td>
                                             <td style="width:10%;" align="right">
                                             <?php if($sales->igst_value && $sales->igst_value!= ""){
                                             echo sprintf('%.2f',$sales->igst_value);
                                             } else if($sales->cgst_value && $sales->cgst_value!= "" && $sales->sgst_value && $sales->sgst_value!= ""){            
                                             echo sprintf('%.2f',$sales->sgst_value).'<br> '.sprintf('%.2f',$sales->cgst_value);            
                                             } else {
                                             //echo '0.00';
                                             } ?>             
                                             </td>
                                             <td style="width:10%;" align="right"><?php echo $line_total = sprintf('%.2f',($gross-$discount)+abs($sales->sgst_value)+abs($sales->cgst_value)+abs($sales->igst_value));?></td>													
                                          </tr>	
                                          <?php 
                                          $netTotal = $netTotal+$line_total;
                                          endforeach; ?>
                                       </tbody>
                                       <tfoot>			
                                          <tr>
                                             <th colspan="5" class="text-right">Grand Total (&#8377;)</th>
                                             <th class="text-right" colspan="1" align="right"><?php echo sprintf('%.2f',$netTotal);?></th>
                                          </tr>
                                       </tfoot>
                                    </table>
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
</script>