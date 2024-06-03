/*global $, document*/
$(document).ready(function () {

    'use strict';

    Chart.defaults.global.defaultFontColor = '#75787c';

    // ------------------------------------------------------- //
    // Line Chart Custom 1
    // ------------------------------------------------------ //
    var LINECHARTEXMPLE   = $('#lineChartCustom1');
    var lineChartExample = new Chart(LINECHARTEXMPLE, {
        type: 'line',
        options: {
            legend: {labels:{fontColor:"#777", fontSize: 12}},
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 60,
                        min: 0
                    },
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }]
            },
        },
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Data Set One",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "rgba(134, 77, 217, 0.88)",
                    borderColor: "rgba(134, 77, 217, 088)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 1,
                    pointBorderColor: "rgba(134, 77, 217, 0.88)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(134, 77, 217, 0.88)",
                    pointHoverBorderColor: "rgba(134, 77, 217, 0.88)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [0, 20, 17, 40, 30, 22, 30],
                    spanGaps: false
                },
                {
                    label: "Data Set Two",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "rgba(98, 98, 98, 0.5)",
                    borderColor: "rgba(98, 98, 98, 0.5)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 1,
                    pointBorderColor: "rgba(98, 98, 98, 0.5)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(98, 98, 98, 0.5)",
                    pointHoverBorderColor: "rgba(98, 98, 98, 0.5)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [0, 30, 22, 20, 35, 25, 50],
                    spanGaps: false
                }
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart Custom 1
    // ------------------------------------------------------ //
    var BARCHART1 = $('#barChartCustom1');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: true,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 0
                    },
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99'
                    ],
                    borderColor: [
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99',
                        '#EF8C99'
                    ],
                    borderWidth: 0.3,
                    data: [35, 55, 65, 85, 40, 30, 50, 35, 50, 70, 60, 50]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Bar Chart Example 2
    // ------------------------------------------------------ //
    var BARCHART1 = $('#barChartCustom2');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: true,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 0
                    },
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9'
                    ],
                    borderColor: [
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9',
                        '#CF53F9'
                    ],
                    borderWidth: 0.2,
                    data: [30, 40, 45, 55, 70, 45, 60, 35, 50, 63, 40, 70]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Line Chart Custom 2
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChartCustom2');
    var myLineChart = new Chart(LINECHART1, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 40,
                        min: 10,
                        stepSize: 0.1
                    },
                    display: false,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "L", "M", "N", "O", "P", "Q", "R", "S", "T"],
            datasets: [
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: '#EF8C99',
                    pointBorderColor: '#EF8C99',
                    pointHoverBackgroundColor: '#EF8C99',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#EF8C99",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [20, 21, 25, 22, 24, 18, 20, 23, 19, 22, 25, 19, 24, 27, 22, 17, 20, 17, 20, 26, 22],
                    spanGaps: false
                },
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: 'rgba(238, 139, 152, 0.24)',
                    pointBorderColor: 'rgba(238, 139, 152, 0.24)',
                    pointHoverBackgroundColor: 'rgba(238, 139, 152, 0.24)',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "rgba(238, 139, 152, 0.24)",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [24, 20, 23, 19, 22, 20, 25, 21, 23, 19, 21, 23, 19, 24, 19, 22, 21, 24, 19, 21, 20],
                    spanGaps: false
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Line Chart Custom 3
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChartCustom3');
    var myLineChart = new Chart(LINECHART1, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 40,
                        min: 10,
                        stepSize: 0.1
                    },
                    display: false,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "L", "M", "N", "O", "P", "Q", "R", "S", "T"],
            datasets: [
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: '#CF53F9',
                    pointBorderColor: '#CF53F9',
                    pointHoverBackgroundColor: '#CF53F9',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#CF53F9",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [24, 20, 23, 19, 22, 20, 25, 21, 23, 19, 21, 23, 19, 24, 19, 22, 21, 24, 19, 21, 20],
                    spanGaps: false
                },
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: 'rgba(207, 83, 249, 0.24)',
                    pointBorderColor: 'rgba(207, 83, 249, 0.24)',
                    pointHoverBackgroundColor: 'rgba(207, 83, 249, 0.24)',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "rgba(207, 83, 249, 0.24)",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [20, 21, 25, 22, 24, 18, 20, 23, 19, 22, 25, 19, 24, 27, 22, 17, 20, 17, 20, 26, 22],
                    spanGaps: false
                }
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChartCustom3');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }]
            },
        },
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9"
                    ],
                    hoverBackgroundColor: [
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9"
                    ],
                    borderColor: [
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9",
                        "#864DD9"
                    ],
                    borderWidth: 0.5,
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
                {
                    label: "Data Set 2",
                    backgroundColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    borderColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    borderWidth: 0.5,
                    data: [35, 40, 60, 47, 88, 27, 30],
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Pie Chart Custom 1
    // ------------------------------------------------------ //
    var PIECHARTEXMPLE    = $('#pieChartCustom1');
    var pieChartExample = new Chart(PIECHARTEXMPLE, {
        type: 'pie',
        options: {
            legend: {
                display: true,
                position: "left"
            }
        },
        data: {
            labels: [
                "A",
                "B",
                "C",
                "D"
            ],
            datasets: [
                {
                    data: [300, 50, 100, 80],
                    borderWidth: 0,
                    backgroundColor: [
                        '#723ac3',
                        "#864DD9",
                        "#9762e6",
                        "#a678eb"
                    ],
                    hoverBackgroundColor: [
                        '#723ac3',
                        "#864DD9",
                        "#9762e6",
                        "#a678eb"
                    ]
                }]
            }
    });

    var pieChartExample = {
        responsive: true
    };



    // ------------------------------------------------------- //
    // Doughnut Chart Custom
    // ------------------------------------------------------ //
    var PIECHART = $('#doughnutChartCustom1');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 80,
            legend: {
                display: true,
                position: "left"
            }
        },
        data: {
            labels: [
                "A",
                "B",
                "C",
                "D"
            ],
            datasets: [
                {
                    data: [120, 90, 77, 95],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#b53dde',
                        "#CF53F9",
                        "#d06cf2",
                        "#de97f6"
                    ],
                    hoverBackgroundColor: [
                        '#b53dde',
                        "#CF53F9",
                        "#d06cf2",
                        "#de97f6"
                    ]
                }]
        }
    });



    // ------------------------------------------------------- //
    // Polar Chart
    // ------------------------------------------------------ //
    var chartOptions = {
        scale: {
            gridLines: {
                color: '#3f4145'
            },
            ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 20
            },
            pointLabels: {
                fontSize: 12
            }
        },
        legend: {
            position: 'left'
        },
        elements: {
            arc: {
                borderWidth: 0,
                borderColor: 'transparent'
            }
        }
    };
    var POLARCHARTEXMPLE  = $('#polarChartCustom');
    var polarChartExample = new Chart(POLARCHARTEXMPLE, {
        type: 'polarArea',
        options: chartOptions,
        data: {
            datasets: [{
                data: [
                    80,
                    70,
                    60,
                    50
                ],
                backgroundColor: [
                    "#ba3fe4",
                    "#CF53F9",
                    "#d97bf9",
                    "#e28eff"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "A",
                "B",
                "C",
                "D"
            ]
        }
    });

    var polarChartExample = {
        responsive: true
    };



    // ------------------------------------------------------- //
    // Radar Chart
    // ------------------------------------------------------ //
    var chartOptions = {
        scale: {
            gridLines: {
                color: '#3f4145'
            },
            ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 20
            },
            pointLabels: {
                fontSize: 12
            }
        },
        legend: {
            position: 'left'
        }
    };
    var RADARCHARTEXMPLE  = $('#radarChartCustom');
    var radarChartExample = new Chart(RADARCHARTEXMPLE, {
        type: 'radar',
        options: chartOptions,
        data: {
            labels: ["A", "B", "C", "D", "E", "C"],
            datasets: [
                {
                    label: "First dataset",
                    backgroundColor: "rgba(113, 39, 172, 0.4)",
                    borderWidth: 2,
                    borderColor: "#7127AC",
                    pointBackgroundColor: "#7127AC",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#7127AC",
                    data: [65, 59, 90, 81, 56, 55]
                },
                {
                    label: "Second dataset",
                    backgroundColor: "rgba(207, 83, 249, 0.4)",
                    borderWidth: 2,
                    borderColor: "#CF53F9",
                    pointBackgroundColor: "#CF53F9",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#CF53F9",
                    data: [50, 60, 80, 45, 96, 70]
                }
            ]
        }
    });
    var radarChartExample = {
        responsive: true
    };







});
