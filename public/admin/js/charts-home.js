/*global $, document, Chart, LINECHART, data, options, window*/
/* 
* Them duong dan sau vao file html: 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
* Cac bieu do se duoc ve sau ham ready
* Thu phuong an load Ajax o day xem nhu nao
* Sau khi load duoc Ajax ve thi phan tich du lieu
*/
$(document).ready(function () {
    $.get('LoadDataServer',function(result){
        alert(result);
    });

    'use strict';

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
        // Du lieu truyen vao se co 2 duong
        // 1 duong mau xanh va 1 duong mau do
        // Mau cua duong ke se dua vao tham so truyen vao
        data: {
            // Xet cac nhan dan cho duong di
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "18"],
            datasets: [
                {
                    label: "Page Visitors",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "transparent",
                    borderColor: '#f15765',
                    pointBorderColor: '#da4c59',
                    pointHoverBackgroundColor: '#da4c59',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 1,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    // Truyen cac tham so cho bieu do
                    // Cac tham so o day truyen cho duong thu nhat
                    // Tham so truyen vao theo dung thu tu
                    // Cac tham so se dua vao nhau de phan chia ty le
                    data: [50, 20, 60, 31, 52, 22, 40, 25, 30, 68, 56, 40, 60, 43, 55, 39, 47],
                    spanGaps: false
                },
                {
                    label: "Page Views",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "transparent",
                    borderColor: "#54e69d",
                    pointHoverBackgroundColor: "#44c384",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 1,
                    pointBorderColor: "#44c384",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    // Truyen cac tham so cho bieu do
                    // Cac tham so o day truyen cho duong thu hai
                    // Tham so truyen vao theo dung thu tu
                    // Cac tham so se dua vao nhau de phan chia ty le
                    data: [20, 7, 35, 17, 26, 8, 18, 10, 14, 46, 30, 30, 14, 28, 17, 25, 17, 40],
                    spanGaps: false
                }
            ]
        }
    });

    // ------------------------------------------------------- //
    // Line Chart 1
    // Phan bieu do don, chi chua 1 duong duy nhat
    // Phan tren la dinh dang co ban cho bieu do
    // Phan data se chua du lieu cho bieu do do
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
                        min: 0,
                        stepSize: 0.5
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
            // Xac dinh cac nhan dan cho bieu do
            // Moi nhan dan la 1 nut cua duong di
            labels: ["A", "B", "C", "D", "E", "F", "G"],
            datasets: [
                {
                    label: "Total Overdue",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "transparent",
                    borderColor: '#6ccef0',
                    pointBorderColor: '#59c2e6',
                    pointHoverBackgroundColor: '#59c2e6',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 3,
                    pointBackgroundColor: "#59c2e6",
                    pointBorderWidth: 0,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 4,
                    pointHitRadius: 0,
                    // Truyen gia tri cho cac nhan dan
                    // Gia tri truyen vao se theo dung thu tu toa do cua cac diem
                    data: [30, 28, 30, 22, 24, 10, 7],
                    spanGaps: false
                }
            ]
        }
    });

    // ------------------------------------------------------- //
    // Pie Chart
    // Se quy dinh cac phan cua banh la 1 tham so dau vao
    // Voi moi dau vao se co 1 mau va 1 gia tri khac nhau 
    // Dua vao tham so de ve hinh theo ty le max = 100%
    // ------------------------------------------------------ //
    var PIECHART = $('#pieChart');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 80,
            legend: {
                display: false
            }
        },
        data: {
            // Khai bao cac thanh phan cua bieu do
            // Cac thanh phan cua bieu do se nhan gia tri toi da la 100%
            // Cac gia tri duoc chia deu cho cac phan
            // Gia tri se duoc can cu theo cac tham so du lieu truyen vao
            labels: [
                "First",
                "Second",
                "Third",
                "Fourth"
            ],
            datasets: [
                {
                    // Du lieu truyen vao cho cac thanh phan trong bieu do
                    // Gia tri duoc truyen vao theo dung thu tu cua bieu do
                    data: [300, 50, 100, 60],
                    borderWidth: [0, 0, 0, 0],
                    /* 
                        * Quy dinh mau cho cac phan
                        * Gia tri cac mau se theo dung thu tu
                    */
                    backgroundColor: [
                        '#44b2d7',
                        "#59c2e6",
                        "#71d1f2",
                        "#96e5ff"
                    ],
                    hoverBackgroundColor: [
                        '#44b2d7',
                        "#59c2e6",
                        "#71d1f2",
                        "#96e5ff"
                    ]
                }]
        }
    });


    // ------------------------------------------------------- //
    // Bar Chart
    // Bieu do cot
    // Voi 2 phan la:
    //  Phan khoi tao bieu do: xac dinh so cot, nhan dan cho cac phan, mau sac
    //  Truyen tham so cho cac cot va dinh danh cho cot, hien thi gia tri khi tro chuot vao
    // ------------------------------------------------------ //
    var BARCHARTHOME = $('#barChartHome');
    var barChartHome = new Chart(BARCHARTHOME, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: false
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
            // Khai bao nhan dan cho cac cot
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "November", "December"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)'
                    ],
                    borderColor: [
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)',
                        'rgb(121, 106, 238)'
                    ],
                    borderWidth: 1,
                    /*
                        * Gia tri cua cac cot duoc them vao tai day
                        * Gia tri duoc them theo dung thu tu
                        * Gia tri cao nhat se tuong ung vs cot cao nhat
                        * Cac cot sau se dua vao cot cao nhat de chia ty le do cao cho cot
                    */
                    data: [70, 49, 55, 68, 81, 95, 85, 40, 30, 27, 22, 15]
                }
            ]
        }
    });

});
/* 
    * Ngoai ra con nhieu loai bieu do khac
    * Xem chi tiet tai chart.js
    * Neu muon day du thi cai dat va su dung local thu vien: charts.js
*/