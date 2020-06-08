<style>
.text-center{
   text-align:left ! important;
}
.text-right{
   font-style:inherit ! important;
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ContraDetails" class="myModal">
  <div class="modal-header">
    <button type="button" class="close" id="page_reload" data-dismiss="modal">&times;</button>
  </div>        
      <div class="modal-body">               
          <div class="row">
           <div class="form-group col-md-4">
               <label for="inputAddress2">Transfer Date <span class="text-danger">*</span></label>
               <input type="date" class="form-control" value="<?php echo $tran_date;?>" readonly>
            </div> 
                                      
            <div class="form-group col-md-4">
               <label for="inputAddress2">Transfer From <span class="text-danger">*</span></label>                           
               <input type="text" class="form-control" value="<?php echo $account_from;?>" readonly>
           </div>
            <div class="form-group col-md-4">
               <label for="inputAddress2">Transfer To <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?php echo $account_to;?>" readonly>
            </div>
           </div>
            <div class="row">
           <div class="form-group col-md-4">
               <label for="inputAddress2">Amount <span class="text-danger">*</span></label>
               <input type="text" class="form-control text-right" value="<?php echo $amount;?>" readonly>
            </div>
           </div>
      </div>
</div>
<?php $this->load->view('templates/datatable.php');?>	   
<script>
 $("#page_reload").click(function(){
   location.reload();
});
$('#ContraDetails').on('hidden.bs.modal', function () {
    location.reload();
});
 </script>
