<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">

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
                        <h1>Meeting Type</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/meetinglist'); ?>">Meeting Type</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">			   			
                <div class="row">				
                <div class="col-md-12">
                    <div class="card">					
                        <div class="card-body">	
                           <!--<div class="container">
								<div class="" style="text-align:right;margin-bottom:20px;" >
								<a href="<?php //echo base_url('fpo/operation/meetinglist');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Meeting List</span>
									</button>
								</a>
							 </div>
						   </div>-->	
						    <div class="container-fluid">
								<div class="row row-space  mt-4"> 
								<div class="form-group col-md-4"></div>
									<div class="form-group col-md-4">
										  <label for="" class="text-center">Type of Meeting <span class="text-danger">*</span></label>
										  <select class="form-control" id="meeting_type" name="meeting_type" onchange="javascript:handleSelect(this)" required data-validation-required-message="Select chairman of the meeting">
											<option value="">Select Type of Meeting</option>
											<option value="<?php echo base_url('fpo/operation/boardmeetinglist')?>" >Board Meeting</option>
											<option value="<?php echo base_url('fpo/operation/committeemeetinglist')?>" >Committee Meeting</option>
											<option value="<?php echo base_url('fpo/operation/annualmeetinglist')?>" >Annual General Meeting</option>
										 </select>
										 <p class="help-block text-danger"></p>
									</div>
								<div class="form-group col-md-4"></div>
								</div>
							</div>
							<!--<div class="row row-space" id="default">
								<table id="example" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Type of Meeting</th>
									<th>Date of Meeting</th>								
									<th>Members Attendance</th>
									<th>Minutes of the Meeting</th>
								  </tr>
								</thead>
									<tbody id="defaultlist">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									</tbody>
								</table>
							</div>-->
							<!--<div class="row row-space" style="display:none" id="board_meeting">
								<table id="example1" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Type of Meeting</th>
									<th>Date of Meeting</th>								
									<th>Members Attendance</th>
									<th>Minutes of the Meeting</th>
									<th>Chairman of the Meeting</th>
									<th>Quorum Available</th>
									<th>Date of Adjournment Meeting</th>
								  </tr>
								</thead>
									<tbody id="boardlist">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>									
									</tbody>
								</table>
							</div>-->
							<!--<div class="row row-space" style="display:none" id="committee_meeting">
								<table id="example2" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Type of Meeting</th>
									<th>Date of Meeting</th>								
									<th>Members Attendance</th>
									<th>Minutes of the Meeting</th>
									<th>Committee</th>
									<th>Sitting Fees paid to Member</th>
									<th>Allowance paid to Member</th>
								  </tr>
								</thead>
									<tbody id="committeelist">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>									
									</tbody>
								</table>
							</div>-->
						<!--<div class="row row-space" style="display:none" id="annual_meeting">
								<table id="example3" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Type of Meeting</th>
									<th>Date of Meeting</th>								
									<th>Members Attendance</th>
									<th>Minutes of the Meeting</th>
									<th>Nature of Meeting</th>
									<th>Date of Notice to Shareholders</th>
									<th>Quorum Available</th>
									<th>Date of Adjournment Meeting</th>
								  </tr>
								</thead>
									<tbody id="annuallist">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>									
									</tbody>
								</table>
							</div> -->
                        </div>
                    </div>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
      <?php $this->load->view('templates/bottom.php');?> 
	  <?php $this->load->view('templates/datatable.php');?>	   
   </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	$('#example').DataTable();
	$('#example1').DataTable();
	$('#example2').DataTable();
	$('#example3').DataTable();
	
	/* $("#meeting_type").change(function () {
        $("#displayText").html($(this).val());
    }); */
	
	  $('select[name="meeting_type"]').on('change', function() {
				var meeting_type = $(this).val();				
                if(meeting_type==1){
				   $('#default').hide();
				   $('#board_meeting').show();				  
				   $('#committee_meeting').hide();
				   $('#annual_meeting').hide();
				}else if(meeting_type==2){
				   $('#default').hide();
				   $('#board_meeting').hide();				  
				   $('#committee_meeting').show();
				   $('#annual_meeting').hide();
				}else if(meeting_type==3){
				   $('#default').hide();
				   $('#board_meeting').hide();				  
				   $('#committee_meeting').hide();
				   $('#annual_meeting').show();
				}								
			});
	
	
	
	
});

 function handleSelect(elm)
{
window.location = elm.value+"";
}

</script>