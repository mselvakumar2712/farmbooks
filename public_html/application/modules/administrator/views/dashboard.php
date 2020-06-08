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

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="farmerWidgets"></canvas>
                        </div>

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
                            <canvas id="figWidgets"></canvas>
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
                            <canvas id="fpgWidgets"></canvas>
                        </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count"><?php echo count($fpo_count);?></span>
                        </h4>
                        <p class="text-light">Total FPO</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="fpoWidgets"></canvas>
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
                                    <h4 class="mb-3">Yearly Production </h4>
                                    <canvas id="yearlyProduction"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Active Farmers</h4>
                                    <canvas id="monthlyActivefarmers"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->
						 <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Farming Area ( Top 10 States )</h4>
                                    <canvas id="farmingArea"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->
						<div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Most Harvested Crop</h4>
                                    <canvas id="cropChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                </div>

			</div>
            <!--/.col-->

        </div> <!-- .content -->     
         </div>
		</div>
      <?php $this->load->view('templates/footer.php');?>         
      <?php $this->load->view('templates/bottom.php');?>        	
      <script src="<?php echo asset_url()?>js/lib/chart-js/Chart.bundle.js"></script>	   	  
   </body>
</html>
<script>
	//pie chart
      var ctx = document.getElementById( "cropChart" );
      ctx.height = 150;
      var myChart = new Chart( ctx, {
        type: 'pie',
        data: {showTooltips: true,
            datasets: [ {
				
               data: [ <?php echo (isset($crop_count[0]['total_area']) ? $crop_count[0]['total_area']:0); ?>,
                         <?php echo (isset($crop_count[1]['total_area']) ? $crop_count[1]['total_area']:0); ?>, <?php echo (isset($crop_count[2]['total_area']) ? $crop_count[2]['total_area']:0); ?>, 
                         <?php echo (isset($crop_count[3]['total_area']) ? $crop_count[3]['total_area']:0); ?>,<?php echo (isset($crop_count[4]['total_area']) ? $crop_count[4]['total_area']:0); ?>,
                         <?php echo (isset($crop_count[5]['total_area']) ? $crop_count[5]['total_area']:0); ?>,<?php echo (isset($crop_count[6]['total_area']) ? $crop_count[6]['total_area']:0); ?>,
                         <?php echo (isset($crop_count[7]['total_area']) ? $crop_count[7]['total_area']:0); ?>,<?php echo (isset($crop_count[8]['total_area']) ? $crop_count[8]['total_area']:0); ?>,<?php echo (isset($crop_count[9]['total_area']) ? $crop_count[9]['total_area']:0); ?> ],
               backgroundColor: [
                        "<?php echo (isset($crop_count[0]['crop_id']) ? "rgba(245,222,179,1)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[1]['crop_id']) ? "rgba(232, 227, 135 ,1)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[2]['crop_id']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[3]['crop_id']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[4]['crop_id']) ? "rgb(128,0,0,0.4)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[5]['crop_id']) ? "rgb(255,255,0,0.2)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[6]['crop_id']) ? "rgb(255,255,0,0.6)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[7]['crop_id']) ? "rgb(128,0,0,0.6)":"rgb(255, 255, 255)");?>",
                        "<?php echo (isset($crop_count[8]['crop_id']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[9]['crop_id']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>",
                        ],
               hoverBackgroundColor: [
                        "<?php echo (isset($crop_count[0]['crop_id']) ? "rgba(245,222,179,1)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[1]['crop_id']) ? "rgba(232, 227, 135 ,1)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[2]['crop_id']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[3]['crop_id']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[4]['crop_id']) ? "rgb(128,0,0,0.4)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[5]['crop_id']) ? "rgb(255,255,0,0.2)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[6]['crop_id']) ? "rgb(255,255,0,0.6)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[7]['crop_id']) ? "rgb(128,0,0,0.6)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[8]['crop_id']) ? "rgb(0,128,0,0.7)":"rgb(255, 255, 255)"); ?>",
                        "<?php echo (isset($crop_count[9]['crop_id']) ? "rgb(255,222,173,0.4)":"rgb(255, 255, 255)"); ?>",
                        ]

                        } ],
               labels: [
                        "<?php echo (isset($crop_count[0]['name']) ? $crop_count[0]['name']:""); ?>",
                        "<?php echo (isset($crop_count[1]['name']) ? $crop_count[1]['name']:""); ?>",
                        "<?php echo (isset($crop_count[2]['name']) ? $crop_count[2]['name']:""); ?>",
                        "<?php echo (isset($crop_count[3]['name']) ? $crop_count[3]['name']:""); ?>",
                        "<?php echo (isset($crop_count[4]['name']) ? $crop_count[4]['name']:""); ?>",
                        "<?php echo (isset($crop_count[5]['name']) ? $crop_count[5]['name']:""); ?>",
                        "<?php echo (isset($crop_count[6]['name']) ? $crop_count[6]['name']:""); ?>",
                        "<?php echo (isset($crop_count[7]['name']) ? $crop_count[7]['name']:""); ?>",
                        "<?php echo (isset($crop_count[8]['name']) ? $crop_count[8]['name']:""); ?>",
                        "<?php echo (isset($crop_count[9]['name']) ? $crop_count[9]['name']:""); ?>",
                        ]
           },
        options: {
            responsive: true,
		}
      });
      
      //WidgetChart 1
    var farmer = document.getElementById( "farmerWidgets" );
    farmer.height = 150;
    var myChart = new Chart( farmer, {
        type: 'line',
        data: {
            labels: [<?php foreach($farmer_Monthwise as $key =>$value){echo "'".$value->month."'".",";}?>], 
            type: 'line',
            datasets: [ {
                data:[<?php foreach($farmer_Monthwise as $key =>$value){echo $value->month_count.',';}?>],
               label: 'Farmer',
                backgroundColor: 'transparent',
                borderColor: 'rgba(255,255,255,.55)',
            }, ]
        },
        options: {

            maintainAspectRatio: false,
            legend: {
                display: false
            },
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
            scales: {
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
            },
            title: {
                display: false,
            },
            elements: {
                line: {
                    borderWidth: 1
                },
                point: {
                    radius: 4,
                    hitRadius: 10,
                    hoverRadius: 4
                }
            }
        }
    } );
    
    
      var fig = document.getElementById( "figWidgets" );
      fig.height = 150;
      var myChart = new Chart( fig, {
        type: 'line',
        data: {
               labels: [<?php foreach($fig_Monthwise as $key =>$value){echo "'".$value->month."'".",";}?>],
               type: 'line',
               datasets: [ {
               data:[<?php foreach($fig_Monthwise as $key =>$value){echo $value->month_count.',';}?>],
               label: 'FIG',
               backgroundColor: '#63c2de',
               borderColor: 'rgba(255,255,255,.55)',
            }, ]
        },
        options: {

            maintainAspectRatio: false,
            legend: {
                display: false
            },
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
            scales: {
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
            },
            title: {
                display: false,
            },
            elements: {
                line: {
                    tension: 0.00001,
                    borderWidth: 1
                },
                point: {
                    radius: 4,
                    hitRadius: 10,
                    hoverRadius: 4
                }
            }
        }
      } );

      var fpg = document.getElementById( "fpgWidgets" );
      fpg.height = 70;
      var myChart = new Chart( fpg, {
        type: 'line',
        data: {
            labels: [<?php foreach($fpg_Monthwise as $key =>$value){echo "'".$value->month."'".",";}?>],
            type: 'line',
            datasets: [ {
             data:[<?php foreach($fpg_Monthwise as $key =>$value){echo $value->month_count.',';}?>],    
             label: 'FPG',
             backgroundColor: 'rgba(255,255,255,.2)',
             borderColor: 'rgba(255,255,255,.55)',
            }, ]
        },
        options: {

            maintainAspectRatio: true,
            legend: {
                display: false
            },
            responsive: true,
            scales: {
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
            },
            title: {
                display: false,
            },
            elements: {
                line: {
                    borderWidth: 2
                },
                point: {
                    radius: 0,
                    hitRadius: 10,
                    hoverRadius: 4
                }
            }
        }
      } );
      
      
     var farmingarea = document.getElementById( "farmingArea" );
    //    ctx.height = 200;
    var myChart = new Chart( farmingarea, {
        type: 'bar',
        data: {
            labels: [ "<?php echo (isset($farming_area[0]['total_area']) ? $farming_area[0]['state_name']:""); ?>",
                      "<?php echo (isset($farming_area[1]['total_area']) ? $farming_area[1]['state_name']:""); ?>","<?php echo (isset($farming_area[2]['total_area']) ? $farming_area[2]['state_name']:""); ?>", 
                      "<?php echo (isset($farming_area[3]['total_area']) ? $farming_area[3]['state_name']:""); ?>","<?php echo (isset($farming_area[4]['total_area']) ? $farming_area[4]['state_name']:""); ?>",
                      "<?php echo (isset($farming_area[5]['total_area']) ? $farming_area[5]['state_name']:""); ?>","<?php echo (isset($farming_area[6]['total_area']) ? $farming_area[6]['state_name']:""); ?>",
                      "<?php echo (isset($farming_area[7]['total_area']) ? $farming_area[7]['state_name']:""); ?>","<?php echo (isset($farming_area[8]['total_area']) ? $farming_area[8]['state_name']:""); ?>","<?php echo (isset($farming_area[9]['total_area']) ? $crop_count[9]['state_name']:""); ?>"],
                  datasets: [
                   {
                       label: "<?php echo date("Y")-1;?>",
                         data: [ <?php echo (isset($farming_previousyear[0]['total_area']) ? $farming_previousyear[0]['total_area']:0); ?>,
                            <?php echo (isset($farming_previousyear[1]['total_area']) ? $farming_previousyear[1]['total_area']:0); ?>, <?php echo (isset($farming_previousyear[2]['total_area']) ? $farming_previousyear[2]['total_area']:0); ?>, 
                            <?php echo (isset($farming_previousyear[3]['total_area']) ? $farming_previousyear[3]['total_area']:0); ?>,<?php echo (isset($farming_previousyear[4]['total_area']) ? $farming_previousyear[4]['total_area']:0); ?>,
                            <?php echo (isset($farming_previousyear[5]['total_area']) ? $farming_previousyear[5]['total_area']:0); ?>,<?php echo (isset($farming_previousyear[6]['total_area']) ? $farming_previousyear[6]['total_area']:0); ?>,
                            <?php echo (isset($farming_previousyear[7]['total_area']) ? $farming_previousyear[7]['total_area']:0); ?>,<?php echo (isset($farming_previousyear[8]['total_area']) ? $farming_previousyear[8]['total_area']:0); ?>,<?php echo (isset($farming_previousyear[9]['total_area']) ? $farming_previousyear[9]['total_area']:0); ?> ],
                       borderColor: "rgba(0, 123, 255, 0.9)",
                       borderWidth: "0",
                       backgroundColor: "rgba(0, 123, 255, 0.5)"
                               },
                  {
                    label: "<?php echo date("Y")?>",
                    data: [ <?php echo (isset($farming_area[0]['total_area']) ? $farming_area[0]['total_area']:0); ?>,
                         <?php echo (isset($farming_area[1]['total_area']) ? $farming_area[1]['total_area']:0); ?>, <?php echo (isset($farming_area[2]['total_area']) ? $farming_area[2]['total_area']:0); ?>, 
                         <?php echo (isset($farming_area[3]['total_area']) ? $farming_area[3]['total_area']:0); ?>,<?php echo (isset($farming_area[4]['total_area']) ? $farming_area[4]['total_area']:0); ?>,
                         <?php echo (isset($farming_area[5]['total_area']) ? $farming_area[5]['total_area']:0); ?>,<?php echo (isset($farming_area[6]['total_area']) ? $farming_area[6]['total_area']:0); ?>,
                         <?php echo (isset($farming_area[7]['total_area']) ? $farming_area[7]['total_area']:0); ?>,<?php echo (isset($farming_area[8]['total_area']) ? $farming_area[8]['total_area']:0); ?>,<?php echo (isset($farming_area[9]['total_area']) ? $farming_area[9]['total_area']:0); ?> ],
                    borderColor: "rgba(220,53,69,0.75)",
                    borderWidth: "0",
                    backgroundColor: "rgba(220,53,69,0.75)"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );
	
	
       //WidgetChart 4
      var fpo = document.getElementById( "fpoWidgets" );
      fpo.height = 70;
      var myChart = new Chart( fpo, {
        type: 'bar',
        data: {
            labels: ["<?php echo (isset($fpo_Monthwise[0]->month_count) ? $fpo_Monthwise[0]->month:0); ?>", 
                    "<?php echo (isset($fpo_Monthwise[1]->month_count) ? $fpo_Monthwise[1]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[2]->month_count) ? $fpo_Monthwise[2]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[3]->month_count) ? $fpo_Monthwise[3]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[4]->month_count) ? $fpo_Monthwise[4]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[5]->month_count) ? $fpo_Monthwise[5]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[6]->month_count) ? $fpo_Monthwise[6]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[7]->month_count) ? $fpo_Monthwise[7]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[8]->month_count) ? $fpo_Monthwise[8]->month:0); ?>", 
                    "<?php echo (isset($fpo_Monthwise[9]->month_count) ? $fpo_Monthwise[9]->month:0); ?>",
                    "<?php echo (isset($fpo_Monthwise[10]->month_count) ? $fpo_Monthwise[10]->month:0); ?>","<?php echo (isset($fpo_Monthwise[11]->month_count) ? $fpo_Monthwise[11]->month:0); ?>"], 
            datasets: [
                {
                    label: "FPO",
                    data: [<?php echo (isset($fpo_Monthwise[0]->month_count) ? $fpo_Monthwise[0]->month_count:0); ?>, 
                    <?php echo (isset($fpo_Monthwise[1]->month_count) ? $fpo_Monthwise[1]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[2]->month_count) ? $fpo_Monthwise[2]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[3]->month_count) ? $fpo_Monthwise[3]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[4]->month_count) ? $fpo_Monthwise[4]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[5]->month_count) ? $fpo_Monthwise[5]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[6]->month_count) ? $fpo_Monthwise[6]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[7]->month_count) ? $fpo_Monthwise[7]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[8]->month_count) ? $fpo_Monthwise[8]->month_count:0); ?>, 
                    <?php echo (isset($fpo_Monthwise[9]->month_count) ? $fpo_Monthwise[9]->month_count:0); ?>,
                    <?php echo (isset($fpo_Monthwise[9]->month_count) ? $fpo_Monthwise[9]->month_count:0); ?>],                       
               
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    //borderWidth: "0",
                    backgroundColor: "rgba(255,255,255,.3)"
                }
            ]
        },
        options: {
              maintainAspectRatio: true,
              legend: {
                display: false
            },
            scales: {
                xAxes: [{
                  display: false,
                  categoryPercentage: 1,
                  barPercentage: 0.5
                }],
                yAxes: [ {
                    display: false
                } ]
            }
        }
      }); 
      
      var activefarmer = document.getElementById( "monthlyActivefarmers" );
      activefarmer.height = 150;
      var myChart = new Chart( activefarmer, {
      type: 'line',
      data: {
      labels: [<?php foreach($farmer_Monthwise as $key =>$value){echo "'".$value->month."'".",";}?>],
      type: 'line',
      defaultFontFamily: 'Lato',
      datasets: [ {
          //data: [<?php echo (isset($farmer_Monthwise[0]->month_count) ? $farmer_Monthwise[0]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[1]->month_count) ? $farmer_Monthwise[1]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[2]->month_count) ? $farmer_Monthwise[2]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[3]->month_count) ? $farmer_Monthwise[3]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[4]->month_count) ? $farmer_Monthwise[4]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[5]->month_count) ? $farmer_Monthwise[5]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[6]->month_count) ? $farmer_Monthwise[6]->month_count:0); ?>,<?php echo (isset($farmer_Monthwise[7]->month_count) ? $farmer_Monthwise[7]->month_count:0); ?>,<?php echo (isset($farmer_Monthwise[8]->month_count) ? $farmer_Monthwise[8]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[9]->month_count) ? $farmer_Monthwise[9]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[10]->month_count) ? $farmer_Monthwise[10]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[11]->month_count) ? $farmer_Monthwise[11]->month_count:0); ?>],            
          //data: [<?php echo (isset($farmer_Monthwise[0]->month_count) ? $farmer_Monthwise[0]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[1]->month_count) ? $farmer_Monthwise[1]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[2]->month_count) ? $farmer_Monthwise[2]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[3]->month_count) ? $farmer_Monthwise[3]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[4]->month_count) ? $farmer_Monthwise[4]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[5]->month_count) ? $farmer_Monthwise[5]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[6]->month_count) ? $farmer_Monthwise[6]->month_count:0); ?>,<?php echo (isset($farmer_Monthwise[7]->month_count) ? $farmer_Monthwise[7]->month_count:0); ?>,<?php echo (isset($farmer_Monthwise[8]->month_count) ? $farmer_Monthwise[8]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[9]->month_count) ? $farmer_Monthwise[9]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[10]->month_count) ? $farmer_Monthwise[10]->month_count:0); ?>, <?php echo (isset($farmer_Monthwise[11]->month_count) ? $farmer_Monthwise[11]->month_count:0); ?>],            
          data:[<?php foreach($farmer_Monthwise as $key =>$value){echo $value->month_count.',';}?>],
          label: "Farmers",
          backgroundColor: 'rgba(0,103,255,.15)',
          borderColor: 'rgba(0,103,255,0.5)',
          borderWidth: 3.5,
          pointStyle: 'circle',
          pointRadius: 5,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'rgba(0,103,255,0.5)',
              }, ]
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
          position: 'top',
          labels: {
              usePointStyle: true,
              fontFamily: 'Lato',
          },


      },
      scales: {
          xAxes: [ {
              display: true,
              gridLines: {
                  display: false,
                  drawBorder: false
              },
              scaleLabel: {
                  display: false,
                  labelString: 'Month'
              }
                  } ],
          yAxes: [ {
              display: true,
              gridLines: {
                  display: false,
                  drawBorder: false
              },
              scaleLabel: {
                  display: true,
                  labelString: 'Monthly Active Farmers'
              }
                  } ]
      },
      title: {
          display: false,
      }
      }
      });

      var monthlyproduction = document.getElementById( "yearlyProduction" );
      monthlyproduction.height = 150;
      var myChart = new Chart( monthlyproduction, {
        type: 'line',
        data: {          
            labels: [ "<?php echo date("Y")-1;?>","<?php echo date("Y");?>"],
            type: 'line',
            defaultFontFamily: 'Lato',
            datasets: [
               <?php for($i=0;$i<count($yearly_harvest);$i++){?>
                //label: "Yearly Production",
                <?php if($yearly_harvest[$i]['season_name']=="Kharif"){?>
                {
                label: "Kharif",
                data: [<?php if(!empty($previous_yearlyharvest)){if($previous_yearlyharvest[$i]['season_name']=="Kharif"){ (isset($previous_yearlyharvest[$i]['total_output'])) ? $previous_yearlyharvest[$i]['total_output']:"0";  }else{ echo "0";}}else{ echo "0";}?>,<?php echo $yearly_harvest[$i]['total_output'];?>],
                backgroundColor: 'transparent',
                borderColor: 'rgba(220,53,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }, 
            <?php }else if($yearly_harvest[$i]['season_name']=="Rabi"){?>  
                    {
                label: "Rabi",
                data: [<?php if(!empty($previous_yearlyharvest)){if($previous_yearlyharvest[$i]['season_name']=="Rabi"){ (isset($previous_yearlyharvest[$i]['total_output'])) ? $previous_yearlyharvest[$i]['total_output']:"0"; }else{ echo "0";}}else{ echo "0";}?>,<?php echo $yearly_harvest[$i]['total_output'].',';?> ],
                backgroundColor: 'transparent',
                borderColor: 'rgba(40,167,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    },
                    <?php }else if($yearly_harvest[$i]['season_name']=="Zaid "){?>  
                    {
                label: "Zaid",
                data: [<?php if(!empty($previous_yearlyharvest)){if($previous_yearlyharvest[$i]['season_name']=="Zaid"){(isset($previous_yearlyharvest[$i]['total_output'])) ? $previous_yearlyharvest[$i]['total_output']:0;}else{ echo 0;}}else{ echo "0";}?>, <?php echo $yearly_harvest[$i]['total_output'];?>],
                backgroundColor: 'transparent',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
               
        }  <?php } }?> ]
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
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value in ton'
                    }
                        } ]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
      });
   
   </script>