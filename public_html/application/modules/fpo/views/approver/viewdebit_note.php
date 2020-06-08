<style>
.text-center {
    text-align: left!important; 
}
.text-right{
   font-style:inherit ! important;
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="DebitDetails" class="myModal">
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
                        <div class="row row-space">                     
                          <div class="form-group col-md-4">
                           <label for="inputAddress2">Entry Date <span class="text-danger">*</span></label>
                           <input type="date" class="form-control" value="<?php echo $debit_info[0]->tran_date;?>" readonly>
                          </div>
                          <div class="form-group col-md-4">
                           <label for="inputAddress2">Voucher No. <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" value="<?php echo $debit_info[0]->voucher_no;?>" readonly>
                          </div>
                          <div class="form-group col-md-4">
                          <label for="inputAddress2">Ledger Entry <span class="text-danger">*</span></label>
                           <?php 
                           if($debit_info[0]->account_code == '4020201' || $debit_info[0]->account_code == '4020202'){
                              $accountName = $debit_info[0]->debtor_name;
                           } else if($debit_info[0]->account_code == '3030201' || $debit_info[0]->account_code == '3030202' || $debit_info[0]->account_code == '3030203'){
                             $accountName = $debit_info[0]->supplier_name;
                           } else {
                             $accountName = $debit_info[0]->ledgerName;
                           }
                           ?>	
                          <input type="text" class="form-control" value="<?php echo $accountName; ?>" readonly>
                          </div>
                        </div>
                        <div class="row row-space">                     
                          <div class="form-group col-md-12">
                           <label for="inputAddress2">Debit Note ( <span class="fa fa-inr"></span> ) <span class="text-danger">*</span></label>
                           <input type="text" class="form-control text-right" value="<?php echo number_format($debit_info[0]->amount, 2);?>" readonly>
                          </div>                         
                        </div>
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
$('#DebitDetails').on('hidden.bs.modal', function () {
    location.reload();
});
</script>
</body>
</html>