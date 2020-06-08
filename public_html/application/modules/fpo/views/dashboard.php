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
        </div> <!-- .content -->     
    </div>
</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>        	
<script src="<?php echo asset_url()?>js/lib/chart-js/Chart.bundle.js"></script>
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
                       data: [ <?php echo (isset($purchase_count[0]['amount']) ? $purchase_count[0]['amount']:0); ?>,
                           <?php echo (isset($purchase_count[1]['amount']) ? $purchase_count[1]['amount']:0); ?>, <?php echo (isset($purchase_count[2]['amount']) ? $purchase_count[2]['amount']:0); ?>, 
                           <?php echo (isset($purchase_count[3]['amount']) ? $purchase_count[3]['amount']:0); ?>,<?php echo (isset($purchase_count[4]['amount']) ? $purchase_count[4]['amount']:0); ?>,
                           <?php echo (isset($purchase_count[5]['amount']) ? $purchase_count[5]['amount']:0); ?>,<?php echo (isset($purchase_count[6]['amount']) ? $purchase_count[6]['amount']:0); ?>,
                           <?php echo (isset($purchase_count[7]['amount']) ? $purchase_count[7]['amount']:0); ?>,<?php echo (isset($purchase_count[8]['amount']) ? $purchase_count[8]['amount']:0); ?>,
                           <?php echo (isset($purchase_count[9]['amount']) ? $purchase_count[9]['amount']:0); ?> 
                         ],
                       borderColor: "rgba(0, 123, 255, 0.9)",
                       borderWidth: "0",
                       backgroundColor: "rgba(0, 123, 255, 0.5)"
                               },
                  {
                    label: "<?php echo "sales"?>",
                    data: [<?php echo (isset($sales_count[0]['amount']) ? $sales_count[0]['amount']:0); ?>,
                           <?php echo (isset($sales_count[1]['amount']) ? $sales_count[1]['amount']:0); ?>, <?php echo (isset($sales_count[2]['amount']) ? $sales_count[2]['amount']:0); ?>, 
                           <?php echo (isset($sales_count[3]['amount']) ? $sales_count[3]['amount']:0); ?>,<?php echo (isset($sales_count[4]['amount']) ? $sales_count[4]['amount']:0); ?>,
                           <?php echo (isset($sales_count[5]['amount']) ? $sales_count[5]['amount']:0); ?>,<?php echo (isset($sales_count[6]['amount']) ? $sales_count[6]['amount']:0); ?>,
                           <?php echo (isset($sales_count[7]['amount']) ? $sales_count[7]['amount']:0); ?>,<?php echo (isset($sales_count[8]['amount']) ? $sales_count[8]['amount']:0); ?>,
                           <?php echo (isset($sales_count[9]['amount']) ? $sales_count[9]['amount']:0); ?> 
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
                  <?php echo (isset($sales_count[0]['amount']) ? $sales_count[0]['amount']:0); ?>,
                  <?php echo (isset($sales_count[1]['amount']) ? $sales_count[1]['amount']:0); ?>, <?php echo (isset($sales_count[2]['amount']) ? $sales_count[2]['amount']:0); ?>, 
                  <?php echo (isset($sales_count[3]['amount']) ? $sales_count[3]['amount']:0); ?>,<?php echo (isset($sales_count[4]['amount']) ? $sales_count[4]['amount']:0); ?>,
                  <?php echo (isset($sales_count[5]['amount']) ? $sales_count[5]['amount']:0); ?>,<?php echo (isset($sales_count[6]['amount']) ? $sales_count[6]['amount']:0); ?>,
                  <?php echo (isset($sales_count[7]['amount']) ? $sales_count[7]['amount']:0); ?>,<?php echo (isset($sales_count[8]['amount']) ? $sales_count[8]['amount']:0); ?>,<?php echo (isset($sales_count[9]['amount']) ? $sales_count[9]['amount']:0); ?>
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
                data:[<?php if(!empty($previous_yearly_sales)){if($previous_yearly_sales[$i]['type']== 5){ (isset($previous_yearly_sales[$i]['amount'])) ? $previous_yearly_sales[$i]['amount']:"0";  }else{ echo "0";}}else{ echo "0";}?>,<?php echo $yearly_sales[$i]['amount'];?>],
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
                data:[<?php if(!empty($previous_yearly_sales)){if($previous_yearly_sales[$i]['type']== 6){ (isset($previous_yearly_sales[$i]['amount'])) ? $previous_yearly_sales[$i]['amount']:"0";  }else{ echo "0";}}else{ echo "0";}?>,<?php echo $yearly_sales[$i]['amount'];?>],
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
   var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "2011", "2012", "2013", "2014", "2015", "2016", "2017","2018","2019" ],
            type: 'line',
            defaultFontFamily: 'Lato',
            datasets: [ {
                data: [ 900, 1100,1100,  1200, 1100, 1000, 1000 ,1100,1200],
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
                        labelString: 'Value in numbers'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );
</script>
 
</body>
</html>