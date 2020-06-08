<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
.textwidth
{
   width:154%;
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
                        <h1>List Support Ticket</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Notification </a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/fig');?>">List Support Ticket</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">	
			<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('success');?></strong> 
					</div>
				<?php }elseif($this->session->flashdata('danger')){?>
					<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('danger');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('info')){?>
					<div class="alert alert-info alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('info');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('warning')){?>
					<div class="alert alert-warning alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('warning');?></strong> 
					</div>
            <?php }?>
            <div class="animated fadeIn">
               <div class="container">
				<!-- <div class="" style="text-align:right;margin-bottom:20px;" >
				<a href="<?php echo base_url('fpo/fig/addfig');?>">
					<button type="button" class="btn btn-success btn-labeled">
						  <i class="fa fa-plus-square"></i><span class="ml-2"> Add FIG</span>
					</button>
				</a>
			 </div> -->
			 </div>
			 <div class="row">
                <div class="col-md-12">
                    <div class="card">
						<div class="card-body">
						  <table id="example" class="table table-striped table-bordered" width="100%">
							<thead>
								<tr>
                        <th style="display:none"></th>
								<th>Date</th>
								<th>FPO Name-Mobile Number</th>
								<th>Category</th>
								<th>Comment</th>
								<th>Status</th>
								<th width="20%">Action</th>															
								</tr>
							</thead>
                     <tbody id="figlist">
								<?php foreach($ticket_list as $row): ?>
									
                           <tr>	
                              <td width="1%" style="display:none;" id="category-<?php echo $row->id; ?>" ><?php echo $row->support_name; ?></td>             
										<td><?php echo fpo_display_date($row->created_at); ?></td>
										<td  width="25%"><?php echo $row->producer_organisation_name;?>-<?php echo $row->mobile;?></td>
										<td id="date-<?php echo $row->id; ?>"><?php echo $row->categoryname; ?></td>
										<td id="message-<?php echo $row->id; ?>" width="25%"><?php $message = $row->comments;$content=substr($message, 0, 100); echo $content; ?></td>
										<td width="10%">
										<?php if ($row->status==1)
										{
										 echo "New";                            
										}	
										else if ($row->status==2)
										{
										echo "Viewed";
										}
                              else if ($row->status==3)
										{
										echo "Replied";
										}
										?></td>																			 
										<td width="10%">
                              <?php if($row->status==1)
                              {?>
										<a href="#" onclick="callMyModal(<?php echo $row->id; ?>)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal1" title="View"><i class="fa fa-eye" aria-hidden="true" title="Edit"></i></a>
										<a href="#" onclick="callMailfunction(<?php echo $row->id; ?>)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2" title="Mail"><i class="fa fa-envelope" aria-hidden="true" title="View"></i></a>
                              <?php } elseif($row->status==2)
                              {?>
                              <a href="#" onclick="callModal(<?php echo $row->id; ?>)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal1" title="View"><i class="fa fa-eye" aria-hidden="true" title="Edit"></i></a>
										<a href="#" onclick="callMailfunction(<?php echo $row->id; ?>)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2" title="Mail"><i class="fa fa-envelope" aria-hidden="true" title="View"></i></a>
                              <?php } elseif($row->status==3)
                              {?>
                              <a href="#" onclick="callModal1(<?php echo $row->id; ?>)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal1" title="View"><i class="fa fa-eye" aria-hidden="true" title="Edit"></i></a>
										<a href="#"  class="btn disabled btn-primary btn-sm" disabled="disabled"  title="Mail"><i class="fa fa-envelope" aria-hidden="true" title="View"></i></a>
                              <?php }?></td>							
									</tr>
								<?php endforeach; ?>
							</tbody> 
						  </table>
						 </div>
                    </div>
                </div>
              </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="modal" id="myModal1" style="display:none;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-success">View</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
 
        <!-- Modal body -->
        <div class="modal-body">
               <div class="modal-overlay"></div>
               <div id="ticket-info"></div>
                
        </div>
        <!-- Modal footer -->              
      </div>
    </div>
  </div>
  <!-- Envelope -->
    <div class="modal" id="myModal2" style="display:none;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         <!-- <h4 class="modal-title">Modal Heading</h4>-->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
               <div class="modal-overlay"></div>
               <div id="ticket-update"></div>
       <!-- <form  name="sentMessage" method="post" action="" novalidate="novalidate" id="support_form">
  
         <div class="container" id="search">
         <div class="form-group col-md-12">
                  <label for="inputAddress">Type <span class="text-danger">*</span></label>
                  <select id="support_name" name="support_name" class="form-control" required>
                       <option value="" >Select type</option> 
                      
               </select>
               <p class="help-block text-danger"></p>
            </div>
              <div class="form-group col-md-12">
                  <label for="inputAddress">Comments </label>
                  <textarea class="form-control" id="comments" name="comments"></textarea>
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="modal-footer">
        	<input id="sendMessageSubmitButton" value="Send" class="btn btn-success text-center" type="button">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>         
		</form> -->      
        </div>
        <!-- Modal footer -->              
      </div>
    </div>
  </div>


    </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	 <?php $this->load->view('templates/datatable.php');?>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>    
   </body>
</html>
<script type="text/javascript">

   function callMyModal(id) {
        jQuery.ajax({
						url:"<?php echo base_url();?>fpo/ticket/viewticket/"+id,
						type: "Post",
						data:"",
						success:function(response) {
							responsearr=jQuery.parseJSON(response);
							//console.log(response);
                     if(responsearr.status == 1){
                        var strHtml = '';
                        var strtype = $('#date-'+id).html();
                        var button = document.createElement('button');       
                        var strmessage = $('#message-'+id).html();
                        strHtml += '<tr><td><label>Type</label></td></tr><tr><td class="text-success">'+strtype+'</td></tr><tr><td>&nbsp;</td></tr><tr><td><label>Comments</label></td></tr><tr><td class="text-success" width="100%">'+strmessage+'</td></tr><tr><td>&nbsp;</td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td><input type="button" class="btn btn-success btn-sm" value="Reply" data-toggle="modal" data-dismiss="modal" data-target="#myModal2" onclick="callMailfunction('+id+')"></td><td>&nbsp; &nbsp; &nbsp;</td><td><input type="button" class="btn btn-danger btn-sm" value="Close" data-dismiss="modal"></td></tr>';
                        $('#ticket-info').html(strHtml);
                     } else {
                        
                     }
						}
					});
      
   }
   function callModal(id){
         var strHtml = '';
         var strtype = $('#date-'+id).html();
         var button = document.createElement('button');       
         var strmessage = $('#message-'+id).html();
         strHtml += '<tr><td><label>Type</label></td></tr><tr><td class="text-success">'+strtype+'</td></tr><tr><td>&nbsp;</td></tr><tr><td><label>Comments</label></td></tr><tr><td class="text-success" width="100%">'+strmessage+'</td></tr><tr><td>&nbsp;</td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td><input type="button" class="btn btn-success btn-sm" value="Reply" data-toggle="modal" data-dismiss="modal" data-target="#myModal2" onclick="callMailfunction('+id+')" ></td><td>&nbsp; &nbsp; &nbsp;</td><td><input type="button" class="btn btn-danger btn-sm" value="Close" data-dismiss="modal"></td></tr>';
         $('#ticket-info').html(strHtml);              
   }
   function callModal1(id) {
            var strHtml = '';
            var strtype = $('#date-'+id).html();
            var button = document.createElement('button');       
            var strmessage = $('#message-'+id).html();
            strHtml += '<tr><td><label>Type</label></td></tr><tr><td class="text-success">'+strtype+'</td></tr><tr><td>&nbsp;</td></tr><tr><td><label>Comments</label></td></tr><tr><td class="text-success" width="100%">'+strmessage+'</td></tr><tr><td>&nbsp;</td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp; &nbsp; &nbsp;</td><td><input type="button" class="btn btn-danger btn-sm" value="Close" data-dismiss="modal"></td></tr>';
            $('#ticket-info').html(strHtml);
                    
   }
   function callMailfunction(id) {
        
      var strHtml = '';
      var strtype = $('#date-'+id).html();
      var url ="<?php echo base_url();?>fpo/ticket/updateticket_info/"+id;
      var button = document.createElement('button');       
      var strmessage = $('#message-'+id).html();
      var category_id = $('#category-'+id).html();
      strHtml += '<form name="sentMessage" method="post" action='+url+' novalidate="novalidate" id="support_data"><table><tr><td><label>Type</label></td></tr><tr><td class="text-success">'+strtype+'</td></tr><tr><td><input type="hidden" name="support_name" id="support_name" value='+category_id+'></td></tr><tr><td>&nbsp;</td></tr><tr><td><label>Comments</label></td></tr><tr><td class="text-success" width="100%">'+strmessage+'</td></tr><tr><td>&nbsp;</td></tr><tr><td><label>Response<span class="text-danger">*</span></label></td></tr><tr><td width="150%"><textarea class="form-control textwidth "  name="response" id="response" required="required" ></textarea><p class="help-block text-danger"></p></td></tr><tr><td>&nbsp;</td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td>&nbsp&nbsp; &nbsp; &nbsp; </td><td><input type="submit" id="sendMessageSubmitButton" class="btn btn-success btn-sm" value="Submit" ></td><td>&nbsp; &nbsp; &nbsp;</td><td><input type="button" class="btn btn-danger btn-sm" value="Close" data-dismiss="modal"></td></tr></table></form>';
      $('#ticket-update').html(strHtml);

   }
  
	$(document).ready(function() {          
        $('#example').DataTable();			
	});
</script>