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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ShareAllotedDetails" class="myModal">
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
                                          <label for="inputAddress2">Resolution Number <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" value="<?php echo $share_info[0]->resolution_number;?>" readonly>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Resolution Date <span class="text-danger">*</span></label>
                                          <input type="date" class="form-control" value="<?php echo $share_info[0]->resolution_date;?>" readonly>
                                       </div>
                                         <div class="form-group col-md-4">
                                          <label for="inputAddress2">Share Holder Name <span class="text-danger">*</span></label>
                                          <?php if($share_info[0]->member_type == 1){
                                             $shareholder_name = $share_info[0]->profile_name;
                                            }else{
                                             $shareholder_name = $share_info[0]->producer_organisation_name;                                                
                                            } ?>                                           
                                             <input type="text" class="form-control" value="<?php echo $shareholder_name;?>" readonly>
                                        </div>
											</div>
											<div class="row row-space">												
                                   <div class="form-group col-md-4">
                                          <label for="inputAddress2">Shares Applied <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" value="<?php echo $share_info[0]->share_applied;?>" readonly>
                                       </div>
                                         <div class="form-group col-md-4">
                                          <label for="inputAddress2">Shares Allotted <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" value="<?php echo $share_info[0]->share_allotted;?>" id="alias" name="alias" placeholder="Alias"disabled>
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
$('#ShareAllotedDetails').on('hidden.bs.modal', function () {
    location.reload();
});
</script>
</body>
</html>