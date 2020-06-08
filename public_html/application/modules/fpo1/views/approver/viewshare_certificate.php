<style>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ShareCertificateDetails" class="myModal">
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
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Folio Number <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" value="<?php echo $sharehistory_info[0]->folio_number; ?>" readonly>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">No. of Shares <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" value="<?php echo $sharehistory_info[0]->total_share_value;?>" readonly>
                                       </div>
                                      <div class="form-group col-md-4">
                                       <label for="inputAddress2">Certificate No. <span class="text-danger">*</span></label>
                                       <input type="text" class="form-control" value="<?php echo $sharehistory_info[0]->certificate_num;?>" readonly>
                                      </div>
											</div>
											<div class="row row-space">												
                                   <div class="form-group col-md-4">
                                          <label for="inputAddress2">Distinctive Number From <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" value="<?php echo $sharehistory_info[0]->distinctive_from;?>" readonly>
                                       </div>
                                         <div class="form-group col-md-4">
                                          <label for="inputAddress2">Distinctive Number From <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" value="<?php echo $sharehistory_info[0]->distinctive_to;?>" id="alias" name="alias" placeholder="Alias"disabled>
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
$('#ShareCertificateDetails').on('hidden.bs.modal', function () {
    location.reload();
});
</script>
</body>
</html>