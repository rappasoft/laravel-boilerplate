$(document).ready(function () {

    'use strict';

    Chart.defaults.global.defaultFontColor = '#75787c';


    // ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
    var legendState = true;
    if ($(window).outerWidth() < 576) {
        legendState = false;
    }

    var LINECHART = $('#lineCahrt');
    var myLineChart = new Chart(LINECHART, {
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
                        max: 60,
                        min: 10
                    },
                    display: true,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: legendState
            }
        },
        data: {
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9"],
            datasets: [
                {
                    label: "Page Visitors",
                    fill: true,
                    lineTension: 0.2,
                    backgroundColor: "transparent",
                    borderColor: '#864DD9',
                    pointBorderColor: '#864DD9',
                    pointHoverBackgroundColor: '#864DD9',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 5,
                    pointHoverRadius: 5,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [20, 27, 20, 35, 30, 40, 33, 25, 39],
                    spanGaps: false
                },
                {
                    label: "Page Views",
                    fill: true,
                    lineTension: 0.2,
                    backgroundColor: "transparent",
                    borderColor: "#EF8C99",
                    pointBorderColor: '#EF8C99',
                    pointHoverBackgroundColor: "#EF8C99",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 5,
                    pointHoverRadius: 5,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [25, 17, 28, 25, 33, 27, 30, 33, 27],
                    spanGaps: false
                }
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChartExample1');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: {
                        color: '#eee'
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
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)",
                        "rgba(134, 77, 217, 0.57)"
                    ],
                    borderColor: [
                        "rgba(134, 77, 217, 1)",
                        "rgba(134, 77, 217, 1)",
                        "rgba(134, 77, 217, 1)",
                        "rgba(134, 77, 217, 1)",
                        "rgba(134, 77, 217, 1)",
                        "rgba(134, 77, 217, 1)",
                        "rgba(134, 77, 217, 1)"
                    ],
                    borderWidth: 1,
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
                {
                    label: "Data Set 2",
                    backgroundColor: [
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)"
                    ],
                    borderColor: [
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)"
                    ],
                    borderWidth: 1,
                    data: [35, 40, 60, 47, 88, 27, 30],
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Line Chart 1
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChart1');
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
                display: true
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
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChartExample2');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: {
                        color: '#eee'
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
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)"
                    ],
                    borderColor: [
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)",
                        "rgba(75, 75, 75, 0.7)"
                    ],
                    borderWidth: 1,
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
                {
                    label: "Data Set 2",
                    backgroundColor: [
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)",
                        "rgba(238, 139, 152, 0.7)"
                    ],
                    borderColor: [
                        "rgba(238, 139, 152, 1)",
                        "rgba(238, 139, 152, 1)",
                        "rgba(238, 139, 152, 1)",
                        "rgba(238, 139, 152, 1)",
                        "rgba(238, 139, 152, 1)",
                        "rgba(238, 139, 152, 1)",
                        "rgba(238, 139, 152, 1)"
                    ],
                    borderWidth: 1,
                    data: [35, 40, 60, 47, 88, 27, 30],
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Pie Chart 1
    // ------------------------------------------------------ //
    var PIECHART = $('#pieChartHome1');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 90,
            legend: {
                display: false
            }
        },
        data: {
            labels: [
                "First",
                "Second",
                "Third",
                "Fourth"
            ],
            datasets: [
                {
                    data: [300, 50, 100, 60],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#6933b9',
                        "#8553d1",
                        "#a372ec",
                        "#be9df1"
                    ],
                    hoverBackgroundColor: [
                        '#6933b9',
                        "#8553d1",
                        "#a372ec",
                        "#be9df1"
                    ]
                }]
        }
    });

    // ------------------------------------------------------- //
    // Pie Chart 2
    // ------------------------------------------------------ //
    var PIECHART = $('#pieChartHome2');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 90,
            legend: {
                display: false
            }
        },
        data: {
            labels: [
                "First",
                "Second",
                "Third",
                "Fourth"
            ],
            datasets: [
                {
                    data: [80, 70, 100, 60],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#9528b9',
                        "#b046d4",
                        "#c767e7",
                        "#e394fe"
                    ],
                    hoverBackgroundColor: [
                        '#9528b9',
                        "#b046d4",
                        "#c767e7",
                        "#e394fe"
                    ]
                }]
        }
    });

    // ------------------------------------------------------- //
    // Pie Chart 3
    // ------------------------------------------------------ //
    var PIECHART = $('#pieChartHome3');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 90,
            legend: {
                display: false
            }
        },
        data: {
            labels: [
                "First",
                "Second",
                "Third",
                "Fourth"
            ],
            datasets: [
                {
                    data: [120, 90, 77, 95],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#da4d60',
                        "#e96577",
                        "#f28695",
                        "#ffb6c1"
                    ],
                    hoverBackgroundColor: [
                        '#da4d60',
                        "#e96577",
                        "#f28695",
                        "#ffb6c1"
                    ]
                }]
        }
    });


    // ------------------------------------------------------- //
    // Sales Bar Chart 1
    // ------------------------------------------------------ //
    var BARCHART1 = $('#salesBarChart1');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: false,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"],
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
                        '#EF8C99'
                    ],
                    borderWidth: 0.2,
                    data: [35, 55, 65, 85, 40, 30, 18, 35, 20, 70]
                }
            ]
        }
    });

    // ------------------------------------------------------- //
    // Sales Bar Chart 21
    // ------------------------------------------------------ //
    var BARCHART1 = $('#salesBarChart2');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: false,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"],
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
                        '#CF53F9'
                    ],
                    borderWidth: 0.2,
                    data: [44, 75, 65, 34, 60, 45, 22, 35, 30, 63]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Pie Chart
    // ------------------------------------------------------ //
    var PIECHARTEXMPLE    = $('#visitPieChart');
    var pieChartExample = new Chart(PIECHARTEXMPLE, {
        type: 'pie',
        options: {
            legend: {
                display: false
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

});
