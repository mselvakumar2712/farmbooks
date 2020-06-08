<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<?php 
$directory = 'assets/uploads/training_director/training_'.$director['id'].'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");

$activeDirectors = explode(',', $director['attended_director']);
$program_speakers = explode(',', $director['program_speaker']);
?>
<style>
.text-right{
   font-style:inherit ! important;
}
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: red;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

#remove_0 {
	display: none;
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
                        <h1>View Training to Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('fpo/operation/training_directorslist');?>">Training of Directors</a></li>
                            <li><a class="active" href="#">View Training to Directors</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="#" method="post" id="directorTrainingViewForm" name="sentMessage" novalidate="novalidate" enctype="multipart/form-data">                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
									
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
									
										<div class="container-fluid">
												<div class="row row-space"> 
													  <div class="form-group col-md-4">
														  <label for="">Date of Training <span class="text-danger">*</span></label>
														   <input type="date" class="form-control" id="date_of_training" name="date_of_training" value="<?php echo $director['training_date']; ?>" readonly required="required" data-validation-required-message="Please select date of training">
														   <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-8">
														<label for="">Directors Attended <span class="text-danger">*</span></label>
														<div class="row">
														<?php foreach($directors as $directors){ ?>														
														<div class="form-group col-md-3">
															<label for="director_<?php echo $directors->id; ?>" style="text-transform: capitalize;"><?php echo $directors->name; ?></label>
															<input type="checkbox" id="director_<?php echo $directors->id; ?>" name="directors_attended[]" value="<?php echo $directors->id; ?>" class="ml-2" <?php if(in_array($directors->id, $activeDirectors)){?> checked <?php } ?> disabled>                        
														</div>
														<?php } ?>
														</div>
														<div class="help-block with-errors text-danger"></div>
													  </div>
													</div>
													  <div class="row row-space">
													  <div class="form-group col-md-6">
														<div class="table-responsive">  
															<table class="table table-bordered" id="dynamic_field">
																<thead>
																	<tr>
																		<th class="text-center">
																			Program Speaker <span class="text-danger">*</span>
																		</th>	
																	</tr>
																</thead>
																<tbody>
																<?php foreach($program_speakers as $program_speaker): ?>
																<tr>  
																	<td width="50%">													
																	<input type="text" class="form-control" maxlength="50" value="<?php echo $program_speaker; ?>" id="program_speakers0" name="program_speakers[]" placeholder="Program Speaker" readonly>
																	</td>
																</tr>
																<?php endforeach; ?>																
																</tbody>
															</table>  
														</div>
													  </div>
														<div class="form-group col-md-3 mt-4">
															<label for="inputAddress2">Cost Involved</label>
															<input type="checkbox" id="involved_cost" name="involved_cost" value="1" class="ml-2" <?php echo ($director['cost_involved']==1)?'checked':''; ?> disabled>
														</div> 
														<div class="form-group col-md-3" id="costHolder">
															<label for="inputAddress2">Total Cost ( <span class="fa fa-inr"></span> )<span class="text-danger">*</span></label>
															<input type="text" id="involved_cost_value" name="involved_cost_value" value="<?php echo $director['involved_cost']; ?>" class="form-control numberOnly ml-2 text-right" readonly placeholder="Cost Involved" data-validation-required-message="Please provide the involved cost">												
															<div class="help-block with-errors text-danger"></div>
														</div> 
												</div>
												
												<div class="row row-space">
													<div class="form-group col-md-12">
														<label for="">Program Photo </label>
														<div class="">
														<?php 
															if($uploadedImages){
																for($i=0;$i<count($uploadedImages);$i++){?>
																<div class="col-md-2">
																	<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
																</div>
														<?php }} ?>
														</div>
													</div>														   
												</div>																							
										</div>										
										<div class="col-md-12 text-center">
											<a href="<?php echo base_url('fpo/operation/edittraining_directors/'.$director['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Training<a>
											<a href="<?php echo base_url('fpo/operation/training_directorslist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
var cost_involved = "<?php echo $director['cost_involved']; ?>";
costHolder(cost_involved);
	
$(document).ready(function(){
		var i=0;
		var j=0;
		$('#sendMessageButton').click(function(){  

		var validate = true;
		$('#dynamic_field').find('tr input[id=program_speakers'+i+']').each(function(){
			
		if($(this).val() == ""){
				validate = false;
			}
		});
		
		if(validate){		
			return true;// you can submit form or send ajax or whatever you want here
		}else{			
			swal('',"Provide all the data");
			return false;
		}

		});	
		
		$(document).on('click', '.btn_add', function(){ 		
		//validate condition
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text], tr select').each(function(){			
			if($(this).val() == ""){
				validate = false;
			}
			});
		
		//validate check
		if(validate){
			document.getElementById("sendMessageButton").disabled =false;
			document.getElementById('program_speakers'+i).setAttribute("readonly", "true");
			j=i;
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="program_speakers'+i+'" name="program_speakers[]" class="form-control" maxlength="50" /></td><td><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove" style="display: none;">-</button><button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>');  
            $('#add_'+j).hide();
            $('#remove_'+j).show();
			
			return true;// you can submit form or send ajax or whatever you want here
			}else{
			swal('',"Provide all the data");
			return false;
			}																																																											
		});
		
		$(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");   
           var arr = $(this).attr("id").split("_"); 
		   $('#row'+arr[1]).remove();
		});  
});


function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}
	
</script>	 
</body>
</html>