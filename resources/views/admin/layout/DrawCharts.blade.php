<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/20/18
 * Time: 10:03 PM
 */
?>

<?php
    /*
     * Tiep nhan JSON o day
     * Truyen sang cho JS de phan tich
     * Su dung JS phan tich tai day
     * Cac tham so truyen vao o dang array
     * */

    /*
     * Lay ra 11 Danh muc co san pham nhieu nhat
     * */
    $JSONCahrtLine1 = json_encode($arrayCate);
    /*
     * Lay du lieu JSON cho bieu do line1
     * */
    $JSONChartLine2 = json_encode($PriceProductRate);
    /*
     * Lay du lieu cho bieu do Line
     * */
    $JSONChartLine = json_encode($ListArrSetDayProduct);
    $JSOnChartLineItem = json_encode($ListArrSetDayItem);
?>


<!-- Code JS de ve bieu do -->
<script>

    $(document).ready(function () {
        /*
        * Dung JS de lay du lieu JSON tu PHP o day
        * Convert JS sang Array
        * Truyen Array vao bieu do
        * */
        // DU lieu cho bieu do cot(BarChart)
        var dataLineCahrt1 = <?php echo $JSONCahrtLine1; ?>;
        var ConvertToJSON = JSON.stringify(dataLineCahrt1);
        var getJSONLineCahrt1 = JSON.parse(ConvertToJSON);
        // Du lieu cho bieu do tron(Dount)
        var DataDountChart = <?php echo $PercentageOrder; ?>;
        var ConvertDataDountChart = JSON.stringify(DataDountChart);
        var getJSONDountCahrt = JSON.parse(ConvertDataDountChart);
        // Du lieu cho bieu do Line2
        // Bieu do line 2 la lay so luong san pham thuoc cac muc gia
        var DataLineChart2 = <?php echo $JSONChartLine2; ?>;
        var ConvertDataLineChart2 = JSON.stringify(DataLineChart2);
        var getJSONLineChart2= JSON.parse(ConvertDataLineChart2);
        // Du lieu cho bieu do Line
        var Data1LineChart = <?php echo $JSONChartLine; ?>;
        var ConvertData1LineChart = JSON.stringify(Data1LineChart);
        var getJSONData1LineChart= JSON.parse(ConvertData1LineChart);

        var Data2LineChart = <?php echo $JSOnChartLineItem; ?>;
        var ConvertData2LineChart = JSON.stringify(Data2LineChart);
        var getJSONData2LineChart= JSON.parse(ConvertData2LineChart);

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
                labels: ["Current", "3 Month ago", "5 Month ago", "7 Month ago", "9 Month ago", "12 Month ago"],
                datasets: [
                    {
                        label: "Total number of products in stock",
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
                        data: getJSONData1LineChart,
                        spanGaps: false
                    },
                    {
                        label: "Number of products sold",
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
                        data: getJSONData2LineChart,
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
                /*
                * Lay 5 muc gia
                * Dem tong so san pham cua 5 muc gia
                * Truyen tham so dang mang cho Bieu do
                * */
                labels: ["10-30$", "30-50$", "50-70$", "70-100$", ">100$"],
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
                        data: getJSONLineChart2,
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
                    "Order delivered",
                    "order not delivered",
                ],
                datasets: [
                    {
                        // Du lieu truyen vao cho cac thanh phan trong bieu do
                        // Gia tri duoc truyen vao theo dung thu tu cua bieu do
                        data: [getJSONDountCahrt, 100-getJSONDountCahrt],
                        borderWidth: [1, 1],
                        /*
                            * Quy dinh mau cho cac phan
                            * Gia tri cac mau se theo dung thu tu
                        */
                        backgroundColor: [
                            '#54e69d',
                            "#59c2e6",
                        ],
                        hoverBackgroundColor: [
                            '#85b4f2',
                            "#ffc36d",
                        ]
                    }
                ]
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
                labels: ["Water & Beverages", "Fruits & Vegetables", "Staples", "Branded Food", "Breakfast & Cereal", "Snacks", "Spices", "Biscuit & Cookie", "Sweets", "Pickle & Condiment", "Instant Food"],
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
                        data: getJSONLineCahrt1
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
</script>
