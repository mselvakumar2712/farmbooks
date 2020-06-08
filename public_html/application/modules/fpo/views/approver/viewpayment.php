<style>
.text-center {
    text-align: left!important; 
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="PaymentDetails" class="myModal">
  <div class="modal-header">
    <button type="button" class="close" id="page_reload" data-dismiss="modal">&times;</button>
  </div>        
   <div class="modal-body">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="container-fluid">
                     <div class="row row-space">                     
                       <?php for($i=0;$i<count($payment_info);$i++){?>
                      <?php if(substr($payment_info[$i]->amount, 0, 1) != '-'){?>
                         <div class="form-group col-md-4">
                           <label for="inputAddress2">Deposit Date <span class="text-danger">*</span></label>
                           <input type="date" class="form-control" value="<?php echo $payment_info[$i]->tran_date;?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                           <label for="inputAddress2">Paid From <span class="text-danger">*</span></label>                           
                          <?php
                              $account_name1 =  $payment_info[$i]->account_name;                           
                             if($payment_info[$i]->account_code == '4020201' || $payment_info[$i]->account_code == '4020202'){
                                 $account_name1 = $payment_info[$i]->supplierName;                              
                              }else if($payment_info[$i]->account_code == '3030201' || $payment_info[$i]->account_code == '3030202' || $payment_info[$i]->account_code == '3030203' || $payment_info[$i]->account_code == '3030204'){
                                 $account_name1 = $payment_info[$i]->customerName;                              
                              }else if($payment_info[$i]->account_code == '40204'){                                 
                                 $account_name1 = $payment_info[$i]->bank_name; 
                              } 
                           ?>
                         <input type="text" class="form-control" value="<?php echo $account_name1;?>" readonly>
                       </div>
                        <?php } else { ?>
                        <div class="form-group col-md-4">
                           <label for="inputAddress2">Pay To <span class="text-danger">*</span></label>
                             <?php 
                             $account_name1 =  $payment_info[$i]->account_name;    
                              if($payment_info[$i]->account_code == '3030201' || $payment_info[$i]->account_code == '3030202' || $payment_info[$i]->account_code == '3030203' || $payment_info[$i]->account_code == '3030204'){
                                 $account_name1 = $payment_info[$i]->supplierName;
                              } else if($payment_info[$i]->account_code == '4020201' || $payment_info[$i]->account_code == '4020202'){
                                 $account_name1 = $payment_info[$i]->customerName;
                              } else if ($payment_info[$i]->account_code == '40204'){
                                 $account_name1 = $payment_info[$i]->bank_name;
                              }
                           ?>
                          <input type="text" class="form-control" value="<?php echo $account_name1;?>" readonly>
                        </div>
                        <?php } ?>
                       <?php }?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	</div>
</div>               
<script>
$("#page_reload").click(function(){
 location.reload();
});
$('#ReceiptDetails').on('hidden.bs.modal', function () {
    location.reload();
});
</script>
</body>
</html>