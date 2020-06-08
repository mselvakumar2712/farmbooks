( function ( $ ) {
    "use strict";

    //Team chart
    var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016","2017","2018" ],
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


    //Sales chart
    var ctx = document.getElementById( "sales-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016","2017","2018" ],
            type: 'line',
            defaultFontFamily: 'Lato',
            datasets: [ {
                label: "Kharif",
                data: [ 0, 30, 10, 120, 50, 63, 10 ,30,60],
                backgroundColor: 'transparent',
                borderColor: 'rgba(220,53,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }, {
                label: "Rabi",
                data: [ 0, 50, 40, 80, 40, 79, 120,30,70 ],
                backgroundColor: 'transparent',
                borderColor: 'rgba(40,167,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    },{
                label: "Zaid",
                data: [ 0, 60, 70, 50, 40, 79, 70,40,100],
                backgroundColor: 'transparent',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    } ]
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
    } );

 
 
	//pie chart
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {showTooltips: true,
            datasets: [ {
				
                data: [ 30, 25, 28, 23,15,10,10,5 ],
                backgroundColor: [
                                    "rgba(245,222,179,1)",
                                    "rgba(232, 227, 135 ,1)",
                                    "rgb(0,128,0,0.7)",
                                    "rgb(255,222,173,0.4)",
									"rgb(128,0,0,0.4)",
									"rgb(255,255,0,0.2)",
									"rgb(255,255,0,0.6)",
									"rgb(128,0,0,0.6)",
                                ],
                hoverBackgroundColor: [
                                    "rgba(245,222,179,1)",
                                    "rgba(232, 227, 135 ,1)",
                                    "rgb(0,128,0,0.7)",
                                    "rgb(255,222,173,0.4)",
									"rgb(128,0,0,0.4)",
									"rgb(255,255,0,0.2)",
									"rgb(255,255,0,0.6)",
									"rgb(128,0,0,0.6)",
                                ]

                            } ],
            labels: [
                            "Wheat",
                            "Rice",
                            "Sugarcane",
							"Sorghum",
							"Groundnut",
							"Potato",
							"Maize",
							"Mustard",
                        ]
        },
        options: {
            responsive: true,
		}
    } );
   

    //bar chart
    var ctx = document.getElementById( "barChart" );
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "Punjab", "Uttar Pradesh", "Madhya Pradesh", "Maharashtra", "Bihar", "Andhra Pradesh", "Tamil nadu","West Bengal","Gujarat","Haryana"],
            datasets: [
                {
                    label: "2017",
                    data: [ 50000,36000,40920, 25081,50256,47355, 36240,40000,30000,32000 ],
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                            },
                {
                    label: "2018",
                    data: [ 42128,23448, 35740, 43419, 35486, 54627, 25590 ,53000,42000,22000],
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
	
	

	

} )( jQuery );