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

.text-right{
   font-style: inherit ! important;
}
.text-success{
   text-align:center ! important;
}
.text-center {
    text-align: left!important; 
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="JournalDetails" class="myModal">
  <div class="modal-header">
    <button type="button" class="close" id="page_reload" data-dismiss="modal">&times;</button>
  </div>        
<div class="modal-body">
 <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <div class="container-fluid">  
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th align="center"><b>Ledger Entry</b></th>
                           <th align="center"><b>Debit ( <span class="fa fa-inr"></span> )</b></th>
                           <th align="center"><b>Credit ( <span class="fa fa-inr"></span> )</b></th>
                        </tr>
                     </thead>
                     <tbody>
						<?php 
							foreach($journal_info as $journal): ?>
							<tr>   
								<?php 
								if($journal->account_code == '4020201' || $journal->account_code == '4020202'){
									$accountName = $journal->debtor_name;
								} else if($journal->account_code == '3030201' || $journal->account_code == '3030202' || $journal->account_code == '3030203'){
									$accountName = $journal->supplier_name;
								} else {
									$accountName = $journal->ledgerName;
								}
								?>
								<td style="width:15%;" align="center"><?php echo $accountName; ?></td>
								<?php $firstCharacter = substr($journal->amount, 0, 1);
									if($firstCharacter != '-'){
								?>
								<td style="width:10%;" align="right"><?php echo number_format(ltrim($journal->amount, '-'), 2); ?></td>
								<td style="width:15%;"></td>
								<?php } else { ?>
								<td style="width:10%;"></td>
								<td style="width:15%;" align="right"><?php echo number_format(ltrim($journal->amount, '-'), 2); ?></td>
								<?php } ?>
							</tr>	
                        <?php endforeach; ?> 
                     </tbody>
                  </table>                                    										
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
$('#JournalDetails').on('hidden.bs.modal', function () {
    location.reload();
});
</script>	
</body>
</html>