<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
   <body class="open">
      <div class="container-fluid pl-0 pr-0">        
         <!-- Right Panel -->
         <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
            <!-- Header-->
            
            <div class="breadcrumbs">
               <div class="col-sm-4">
                  <div class="page-header float-left">
                     <div class="page-title">
                     <h1>Dashboard</h1>
                     </div>
                  </div>
               </div>
            </div>

            <div class="content mt-3">
                <div class="col-md-12 col-xs-12 col-center">
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
				</div> 


           <div class="col-md-3 col-xs-3 col-center">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count"><?php echo count($farmer_count);?></span>
                        </h4>
                        <p class="text-light">Registered Farmers</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70"></div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count"><?php echo count($fig_count);?></span>
                        </h4>
                        <p class="text-light">Total FIG</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count"><?php echo count($fpg_count);?></span>
                        </h4>
                        <p class="text-light">Total FPG</p>

                    </div>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count"><?php echo count($sales_count);?></span>
                        </h4>
                        <p class="text-light">Current Month Sales</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
			 <div class="content mt-3">
			 <div class="animated fadeIn">
                <div class="row">

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Sales Purchase Yearly Production</h4>
                                    <canvas id="yearlyProduction"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                        <div class="col-lg-6">
                            <div class="card">
								<!--<button type="button" class="js-calltxt">Click</button>-->
                                <div class="card-body">					
                                    <h4 class="mb-3" id="ttt">Active Farmers</h4>
                                    <canvas id="team-chart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->
						 <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Sales Vs Purchase</h4>
                                    <canvas id="sales_purchase"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->
						<div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Sales Per Month</h4>
                                    <canvas id="overallsales"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                </div>
			</div>
            <!--/.col-->
<!--<div class="js-txtValue">
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALQAAADECAYAAAA27wvzAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjdFODk0N0FGNEFBMTFFODhDRTNCOTJFMTI2RTQ5ODciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjdFODk0N0JGNEFBMTFFODhDRTNCOTJFMTI2RTQ5ODciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGN0U4OTQ3OEY0QUExMUU4OENFM0I5MkUxMjZFNDk4NyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGN0U4OTQ3OUY0QUExMUU4OENFM0I5MkUxMjZFNDk4NyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PutJ2MEAACiQSURBVHja7F0HmBzF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" class="tester">
<img src="http://localhost/fpo/assets/img/logo-new.png" class="tester">
</div>-->
        </div> <!-- .content -->     
    </div>
</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>        	
<script src="<?php echo asset_url()?>js/lib/chart-js/Chart.bundle.js"></script>
<script src="<?php echo asset_url()?>/js/lib/chart-js/chartjs-init.js"></script>
<script src="<?php echo asset_url()?>js/widgets.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
     var sales_purchase = document.getElementById( "sales_purchase" );
    //    ctx.height = 200;
    var myChart = new Chart( sales_purchase, {
        type: 'bar',
        data: {
            labels: [<?php foreach($sales_Monthwise as $key =>$value){echo "'".$value->month."'".",";}?>],
                  datasets: [
                   {
                       label: "<?php echo "Purchase";?>",
                         data: [ <?php echo (isset($purchase_count[0]['type']) ? $purchase_count[0]['type']:0); ?>,
                          <?php echo (isset($purchase_count[1]['type']) ? $purchase_count[1]['type']:0); ?>, <?php echo (isset($purchase_count[2]['type']) ? $purchase_count[2]['type']:0); ?>, 
                           <?php echo (isset($purchase_count[3]['type']) ? $purchase_count[3]['type']:0); ?>,<?php echo (isset($purchase_count[4]['type']) ? $purchase_count[4]['type']:0); ?>,
                           <?php echo (isset($purchase_count[5]['type']) ? $purchase_count[5]['type']:0); ?>,<?php echo (isset($purchase_count[6]['type']) ? $purchase_count[6]['type']:0); ?>,
                          <?php echo (isset($purchase_count[7]['type']) ? $purchase_count[7]['type']:0); ?>,<?php echo (isset($purchase_count[8]['type']) ? $purchase_count[8]['type']:0); ?>,<?php echo (isset($purchase_count[9]['type']) ? $purchase_count[9]['type']:0); ?> 
                         ],
                       borderColor: "rgba(0, 123, 255, 0.9)",
                       borderWidth: "0",
                       backgroundColor: "rgba(0, 123, 255, 0.5)"
                               },
                  {
                    label: "<?php echo "sales"?>",
                    data: [ <?php echo (isset($sales_count[0]['type']) ? $sales_count[0]['type']:0); ?>,
                            <?php echo (isset($sales_count[1]['type']) ? $sales_count[1]['type']:0); ?>, <?php echo (isset($sales_count[2]['type']) ? $sales_count[2]['type']:0); ?>, 
                            <?php echo (isset($sales_count[3]['type']) ? $sales_count[3]['type']:0); ?>,<?php echo (isset($sales_count[4]['type']) ? $sales_count[4]['type']:0); ?>,
                          <?php echo (isset($sales_count[5]['type']) ? $sales_count[5]['type']:0); ?>,<?php echo (isset($sales_count[6]['type']) ? $sales_count[6]['type']:0); ?>,
                           <?php echo (isset($sales_count[7]['type']) ? $sales_count[7]['type']:0); ?>,<?php echo (isset($sales_count[8]['type']) ? $sales_count[8]['type']:0); ?>,<?php echo (isset($sales_count[9]['type']) ? $sales_count[9]['type']:0); ?> 
                            
                            ],
                    borderColor: "rgba(220,53,69,0.75)",
                    borderWidth: "0",
                    backgroundColor: "rgba(220,53,69,0.75)"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
           }]
            }
        }
    }); 
    
    //pie chart
      var ctx = document.getElementById( "overallsales" );
      ctx.height = 150;
      var myChart = new Chart( ctx, {
        type: 'pie',
        data: {showTooltips: true,
            datasets: [{
               data: [  
                  <?php echo (isset($sales_count[0]['type']) ? $sales_count[0]['type']:0); ?>,
                  <?php echo (isset($sales_count[1]['type']) ? $sales_count[1]['type']:0); ?>, <?php echo (isset($sales_count[2]['type']) ? $sales_count[2]['type']:0); ?>, 
                  <?php echo (isset($sales_count[3]['type']) ? $sales_count[3]['type']:0); ?>,<?php echo (isset($sales_count[4]['type']) ? $sales_count[4]['type']:0); ?>,
                  <?php echo (isset($sales_count[5]['type']) ? $sales_count[5]['type']:0); ?>,<?php echo (isset($sales_count[6]['type']) ? $sales_count[6]['type']:0); ?>,
                  <?php echo (isset($sales_count[7]['type']) ? $sales_count[7]['type']:0); ?>,<?php echo (isset($sales_count[8]['type']) ? $sales_count[8]['type']:0); ?>,<?php echo (isset($sales_count[9]['type']) ? $sales_count[9]['type']:0); ?>
                  ],
               backgroundColor:[
                  "<?php echo (isset($sales_count[0]['month']) ? "rgba(245,222,179,1)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[1]['month']) ? "rgba(232, 227, 135 ,1)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[2]['month']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[3]['month']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[4]['month']) ? "rgb(128,0,0,0.4)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[5]['month']) ? "rgb(255,255,0,0.2)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[6]['month']) ? "rgb(255,255,0,0.6)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[7]['month']) ? "rgb(128,0,0,0.6)":"rgb(255, 255, 255)");?>",
                  "<?php echo (isset($sales_count[8]['month']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[9]['month']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>", 
               ],
               hoverBackgroundColor:[
                  "<?php echo (isset($sales_count[0]['month']) ? "rgba(245,222,179,1)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[1]['month']) ? "rgba(232, 227, 135 ,1)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[2]['month']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[3]['month']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[4]['month']) ? "rgb(128,0,0,0.4)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[5]['month']) ? "rgb(255,255,0,0.2)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[6]['month']) ? "rgb(255,255,0,0.6)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[7]['month']) ? "rgb(128,0,0,0.6)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[8]['month']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                  "<?php echo (isset($sales_count[9]['month']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>", 
               ]
               }],
               labels:[
                  "<?php echo (isset($sales_count[0]['month']) ? $sales_count[0]['month']:""); ?>",
                  "<?php echo (isset($sales_count[1]['month']) ? $sales_count[1]['month']:""); ?>",
                  "<?php echo (isset($sales_count[2]['month']) ? $sales_count[2]['month']:""); ?>",
                  "<?php echo (isset($sales_count[3]['month']) ? $sales_count[3]['month']:""); ?>",
                  "<?php echo (isset($sales_count[4]['month']) ? $sales_count[4]['month']:""); ?>",
                  "<?php echo (isset($sales_count[5]['month']) ? $sales_count[5]['month']:""); ?>",
                  "<?php echo (isset($sales_count[6]['month']) ? $sales_count[6]['month']:""); ?>",
                  "<?php echo (isset($sales_count[7]['month']) ? $sales_count[7]['month']:""); ?>",
                  "<?php echo (isset($sales_count[8]['month']) ? $sales_count[8]['month']:""); ?>",
                  "<?php echo (isset($sales_count[9]['month']) ? $sales_count[9]['month']:""); ?>",
               ]
           },
        options: {
            responsive: true,
		}
      });
      
//sales purchase yearly production
var monthlyproduction = document.getElementById( "yearlyProduction" );
      monthlyproduction.height = 150;
      var myChart = new Chart( monthlyproduction, {
        type: 'line',
        data: {          
            labels: ["<?php echo date("Y")-1;?>","<?php echo date("Y");?>"],
            type: 'line',
            defaultFontFamily: 'Lato',
            datasets: [
               <?php for($i=0;$i<count($yearly_sales);$i++){?>
            
               <?php if($yearly_sales[$i]['type']== 5 ){?>
                {
                label: "Purchase",
                data:["<?php if(!empty($previous_yearly_sales)){if($previous_yearly_sales[$i]['type']== 5){ (isset($previous_yearly_sales[$i]['amount'])) ? $previous_yearly_sales[$i]['amount']:"0";  }else{ echo "0";}}else{ echo "0";}?>,<?php echo $yearly_sales[$i]['amount'];?>"],
                backgroundColor: 'transparent',
                borderColor: 'rgba(220,53,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }, 
                <?php }else if($yearly_sales[$i]['type']== 6){?>      
                    {
                label: "Sales",
                data:["<?php if(!empty($previous_yearly_sales)){if($previous_yearly_sales[$i]['type']== 6){ (isset($previous_yearly_sales[$i]['amount'])) ? $previous_yearly_sales[$i]['amount']:"0";  }else{ echo "0";}}else{ echo "0";}?>,<?php echo $yearly_sales[$i]['amount'];?>"],
                backgroundColor: 'transparent',
                borderColor: 'rgba(40,167,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    }
           <?php }}?>]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Lato',
                bodyFontFamily: 'Lato',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Lato',
                },
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Sales & Purchase in Years'
                    }
              }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
      });
    
/*
$(document).ready(function(){
	
	//function CopyToClipboard(containerid) {
		 $(".js-calltxt").on('click',(function (e) {
			
			
			
	   var can = document.getElementById("team-chart");//this is our canvas 
	var img = new Image();
	var test1 = can.toDataURL();//"http://localhost/fpo/assets/img/logo-new.png";//can.toDataURL(); -> prepare the data url here
	//var blob = dataURItoBlob(test1);
	img.src = can.toDataURL();
	//console.log(test1); //consoled this data
	//document.execCommand('copy');
	//var a = document.createElement("div");
	//a.setAttribute("class", "js-txtValue");
	//$(".js-txtValue").html(blob);
	//document.getElementsByClassName(".js-txtValue").innerHTML = can.toDataURL();
	
var div = document.createElement('div');
div.contentEditable = true;
div.appendChild(img);
document.body.appendChild(div);

SelectText(div);
document.execCommand('Copy');
	//$(".js-txtValue").tsfun();

	
	
}));


            $.fn.tsfun = (function (e) {
                //Make the container Div contenteditable
                $(this).attr("contenteditable", true);
                //Select the image
                SelectText($(this).get(0));
                //Execute copy Command
                //Note: This will ONLY work directly inside a click listenner
                document.execCommand('copy');
                //Unselect the content
                window.getSelection().removeAllRanges();
                //Make the container Div uneditable again
                $(this).removeAttr("contenteditable");
                //Success!!
                alert("image copied!");
            });
						//var $this = $(".js-calltxt, .trghhb").tsfun();

			});

function SelectText(element) {
            var doc = document;
            if (doc.body.createTextRange) {
                var range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                var selection = window.getSelection();
                var range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
		
function dataURItoBlob(dataURI) {
    // convert base64 to raw binary data held in a string
    var byteString = atob(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to an ArrayBuffer
    var arrayBuffer = new ArrayBuffer(byteString.length);
    var _ia = new Uint8Array(arrayBuffer);
    for (var i = 0; i < byteString.length; i++) {
        _ia[i] = byteString.charCodeAt(i);
    }

    var dataView = new DataView(arrayBuffer);
    var blob = new Blob([dataView], { type: mimeString });
    return blob;
}	*/
</script>
 
</body>
</html>