<section>
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <script src="../public/plugins/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../public/plugins/amcharts/serial.js" type="text/javascript"></script>
        <style type="text/css">
            .amcharts-graph-g1 .amcharts-graph-stroke {
                stroke-dasharray: 3px 3px;
                stroke-linejoin: round;
                stroke-linecap: round;
                -webkit-animation: am-moving-dashes 1s linear infinite;
                animation: am-moving-dashes 1s linear infinite;
            }

            @-webkit-keyframes am-moving-dashes {
                100% {
                    stroke-dashoffset: -30px;
                }
            }
            @keyframes am-moving-dashes {
                100% {
                    stroke-dashoffset: -30px;
                }
            }


            .lastBullet {
                -webkit-animation: am-pulsating 1s ease-out infinite;
                animation: am-pulsating 1s ease-out infinite;
            }
            @-webkit-keyframes am-pulsating {
                0% {
                    stroke-opacity: 1;
                    stroke-width: 0px;
                }
                100% {
                    stroke-opacity: 0;
                    stroke-width: 50px;
                }
            }
            @keyframes am-pulsating {
                0% {
                    stroke-opacity: 1;
                    stroke-width: 0px;
                }
                100% {
                    stroke-opacity: 0;
                    stroke-width: 50px;
                }
            }

            .amcharts-graph-column-front {
                -webkit-transition: all .3s .3s ease-out;
                transition: all .3s .3s ease-out;
            }
            .amcharts-graph-column-front:hover {
                fill: #496375;
                stroke: #496375;
                -webkit-transition: all .3s ease-out;
                transition: all .3s ease-out;
            }


            .amcharts-graph-g2 {
              stroke-linejoin: round;
              stroke-linecap: round;
              stroke-dasharray: 500%;
              stroke-dasharray: 0 \0/;    /* fixes IE prob */
              stroke-dashoffset: 0 \0/;   /* fixes IE prob */
              -webkit-animation: am-draw 40s;
              animation: am-draw 40s;
            }
            @-webkit-keyframes am-draw {
                0% {
                    stroke-dashoffset: 500%;
                }
                100% {
                    stroke-dashoffset: 0px;
                }
            }
            @keyframes am-draw {
                0% {
                    stroke-dashoffset: 500%;
                }
                100% {
                    stroke-dashoffset: 0px;
                }
            }




        </style>


        <script>
            // note, we have townName field with a name specified for each datapoint and townName2 with only some of the names specified.
            // we use townName2 to display town names next to the bullet. And as these names would overlap if displayed next to each bullet,
            // we created this townName2 field and set only some of the names for this purpse.
            var chartData = [
                {
                    "date": "2012-01-01",
                    "distance": 227,
                    "townName": "New York",
                    "townName2": "New York",
                    "townSize": 25,
                    "latitude": 40.71,
                    "duration": 408
                },
                {
                    "date": "2012-01-02",
                    "distance": 371,
                    "townName": "Washington",
                    "townSize": 14,
                    "latitude": 38.89,
                    "duration": 482
                },
                {
                    "date": "2012-01-03",
                    "distance": 433,
                    "townName": "Wilmington",
                    "townSize": 6,
                    "latitude": 34.22,
                    "duration": 562
                },
                {
                    "date": "2012-01-04",
                    "distance": 345,
                    "townName": "Jacksonville",
                    "townSize": 7,
                    "latitude": 30.35,
                    "duration": 379
                },
                {
                    "date": "2012-01-05",
                    "distance": 480,
                    "townName": "Miami",
                    "townName2": "Miami",
                    "townSize": 10,
                    "latitude": 25.83,
                    "duration": 501
                },
                {
                    "date": "2012-01-06",
                    "distance": 386,
                    "townName": "Tallahassee",
                    "townSize": 7,
                    "latitude": 30.46,
                    "duration": 443
                },
                {
                    "date": "2012-01-07",
                    "distance": 348,
                    "townName": "New Orleans",
                    "townSize": 10,
                    "latitude": 29.94,
                    "duration": 405
                },
                {
                    "date": "2012-01-08",
                    "distance": 238,
                    "townName": "Houston",
                    "townName2": "Houston",
                    "townSize": 16,
                    "latitude": 29.76,
                    "duration": 309
                },
                {
                    "date": "2012-01-09",
                    "distance": 218,
                    "townName": "Dalas",
                    "townSize": 17,
                    "latitude": 32.8,
                    "duration": 287
                },
                {
                    "date": "2012-01-10",
                    "distance": 349,
                    "townName": "Oklahoma City",
                    "townSize": 11,
                    "latitude": 35.49,
                    "duration": 485
                },
                {
                    "date": "2012-01-11",
                    "distance": 603,
                    "townName": "Kansas City",
                    "townSize": 10,
                    "latitude": 39.1,
                    "duration": 890
                },
                {
                    "date": "2012-01-12",
                    "distance": 534,
                    "townName": "Denver",
                    "townName2": "Denver",
                    "townSize": 18,
                    "latitude": 39.74,
                    "duration": 810
                },
                {
                    "date": "2012-01-13",
                    "townName": "Salt Lake City",
                    "townSize": 12,
                    "distance": 425,
                    "duration": 670,
                    "latitude": 40.75,
                    "alpha":0.4
                },
                {
                    "date": "2012-01-14",
                    "latitude": 36.1,
                    "duration": 470,
                    "townName": "Las Vegas",
                    "townName2": "Las Vegas",
                    "bulletClass": "lastBullet"
                },
                {
                    "date": "2012-01-15"
                },
                {
                    "date": "2012-01-16"
                },
                {
                    "date": "2012-01-17"
                },
                {
                    "date": "2012-01-18"
                },
                {
                    "date": "2012-01-19"
                }
            ];
            var chart;

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.addClassNames = true;
                chart.dataProvider = chartData;
                chart.categoryField = "date";
                chart.dataDateFormat = "YYYY-MM-DD";
                chart.startDuration = 1;
                chart.color = "#6c7b88";
                chart.marginLeft = 0;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
                categoryAxis.autoGridCount = false;
                categoryAxis.gridCount = 50;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#555555";
                // we want custom date formatting, so we change it in next line
                categoryAxis.dateFormats = [{
                    period: 'DD',
                    format: 'DD'
                }, {
                    period: 'WW',
                    format: 'MMM DD'
                }, {
                    period: 'MM',
                    format: 'MMM'
                }, {
                    period: 'YYYY',
                    format: 'YYYY'
                }];

                // as we have data of different units, we create three different value axes
                // Distance value axis
                var distanceAxis = new AmCharts.ValueAxis();
                distanceAxis.title = "distance";
                distanceAxis.gridAlpha = 0;
                distanceAxis.axisAlpha = 0;
                chart.addValueAxis(distanceAxis);

                // latitude value axis
                var latitudeAxis = new AmCharts.ValueAxis();
                latitudeAxis.gridAlpha = 0;
                latitudeAxis.axisAlpha = 0;
                latitudeAxis.title = "duration and latitude";
                latitudeAxis.offset = 83;
                latitudeAxis.titleOffset = 10;
                latitudeAxis.position = "right";
                chart.addValueAxis(latitudeAxis);

                // duration value axis
                var durationAxis = new AmCharts.ValueAxis();
                // the following line makes this value axis to convert values to duration
                // it tells the axis what duration unit it should use. mm - minute, hh - hour...
                durationAxis.duration = "mm";
                durationAxis.durationUnits = {
                    DD: "d. ",
                    hh: "h ",
                    mm: "min",
                    ss: ""
                };
                durationAxis.gridAlpha = 0;
                durationAxis.axisAlpha = 0;
                durationAxis.inside = false;
                durationAxis.position = "right";
                chart.addValueAxis(durationAxis);

                // GRAPHS
                // distance graph
                var distanceGraph = new AmCharts.AmGraph();
                distanceGraph.valueField = "distance";
                distanceGraph.title = "distance";
                distanceGraph.type = "column";
                distanceGraph.fillAlphas = 0.9;
                distanceGraph.valueAxis = distanceAxis; // indicate which axis should be used
                distanceGraph.balloonText = "[[value]] miles";
                distanceGraph.legendValueText = "[[value]] mi";
                distanceGraph.legendPeriodValueText = "total: [[value.sum]] mi";
                distanceGraph.lineColor = "#263138";
                distanceGraph.alphaField = "alpha";
                chart.addGraph(distanceGraph);

                // latitude graph
                var latitudeGraph = new AmCharts.AmGraph();
                latitudeGraph.valueField = "latitude";
                latitudeGraph.id = "g1";
                latitudeGraph.classNameField = "bulletClass";
                latitudeGraph.title = "latitude/city";
                latitudeGraph.type = "line";
                latitudeGraph.valueAxis = latitudeAxis; // indicate which axis should be used
                latitudeGraph.lineColor = "#786c56";
                latitudeGraph.lineThickness = 1;
                latitudeGraph.legendValueText = "[[value]]/[[description]]";
                latitudeGraph.descriptionField = "townName";
                latitudeGraph.bullet = "round";
                latitudeGraph.bulletSizeField = "townSize"; // indicate which field should be used for bullet size
                latitudeGraph.bulletBorderColor = "#786c56";
                latitudeGraph.bulletBorderAlpha = 1;
                latitudeGraph.bulletBorderThickness = 2;
                latitudeGraph.bulletColor = "#000000";
                latitudeGraph.labelText = "[[townName2]]"; // not all data points has townName2 specified, that's why labels are displayed only near some of the bullets.
                latitudeGraph.labelPosition = "right";
                latitudeGraph.balloonText = "latitude:[[value]]";
                latitudeGraph.showBalloon = true;
                latitudeGraph.animationPlayed = true;
                chart.addGraph(latitudeGraph);

                // duration graph
                var durationGraph = new AmCharts.AmGraph();
                durationGraph.id = "g2";
                durationGraph.title = "duration";
                durationGraph.valueField = "duration";
                durationGraph.type = "line";
                durationGraph.valueAxis = durationAxis; // indicate which axis should be used
                durationGraph.lineColor = "#ff5755";
                durationGraph.balloonText = "[[value]]";
                durationGraph.lineThickness = 1;
                durationGraph.legendValueText = "[[value]]";
                durationGraph.bullet = "square";
                durationGraph.bulletBorderColor = "#ff5755";
                durationGraph.bulletBorderThickness = 1;
                durationGraph.bulletBorderAlpha = 1;
                durationGraph.dashLengthField = "dashLength";
                durationGraph.animationPlayed = true;
                chart.addGraph(durationGraph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonDateFormat = undefined;
                chartCursor.cursorAlpha = 0;
                chartCursor.valueBalloonsEnabled = false;
                chartCursor.valueLineBalloonEnabled = true;
                chartCursor.valueLineEnabled = true;
                chartCursor.valueLineAlpha = 0.5;
                chart.addChartCursor(chartCursor);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.bulletType = "round";
                legend.equalWidths = false;
                legend.valueWidth = 120;
                legend.useGraphSettings = true;
                legend.color = "#FFFFFF";
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });
        </script>
        <!-- BEGIN CHART -->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">График</span>
                    <span class="caption-helper">Некоторые показатели</span>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="portlet-body">
                <div id="chartdiv" style="width:100%; height:400px;"></div>
            </div>
        </div>
    </div>
    <!-- END CHART -->

    <div class="col-lg-6 col-xs-12 col-sm-12">
        <script src="../public/plugins/amcharts/pie.js" type="text/javascript"></script>
        <script>
            AmCharts.makeChart("piediv", {
                "type": "pie",
                "dataProvider": [{
                    "country": "Czech Republic",
                        "litres": 156.9
                }, {
                    "country": "Ireland",
                        "litres": 131.1
                }, {
                    "country": "Germany",
                        "litres": 115.8
                }, {
                    "country": "Australia",
                        "litres": 109.9
                }, {
                    "country": "Austria",
                        "litres": 108.3
                }, {
                    "country": "UK",
                        "litres": 65
                }, {
                    "country": "Belgium",
                        "litres": 50
                }],
                "titleField": "country",
                "valueField": "litres",
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "legend": {
                    "align": "center",
                    "markerType": "circle"
                }

            });
        </script>
    <!-- BEGIN PIE -->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">График</span>
                    <span class="caption-helper">Некоторые показатели</span>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="portlet-body">
                <div id="piediv" style="width: 100%; height: 400px;"></div>
            </div>
        </div>
    </div>
    <!-- END PIE -->

    <div class="col-lg-6 col-xs-12 col-sm-12">
        <script>
            // this chart is exactly the same as in areaStacked.html, only made using JSON except JavaScript API
            var chartData2 = [{
               "year": 2000,
                   "cars": 1587,
                   "motorcycles": 650,
                   "bicycles": 121
           }, {
               "year": 1995,
                   "cars": 1567,
                   "motorcycles": 683,
                   "bicycles": 146
           }, {
               "year": 1996,
                   "cars": 1617,
                   "motorcycles": 691,
                   "bicycles": 138
           }, {
               "year": 1997,
                   "cars": 1630,
                   "motorcycles": 642,
                   "bicycles": 127
           }, {
               "year": 1998,
                   "cars": 1660,
                   "motorcycles": 699,
                   "bicycles": 105
           }, {
               "year": 1999,
                   "cars": 1683,
                   "motorcycles": 721,
                   "bicycles": 109
           }, {
               "year": 2000,
                   "cars": 1691,
                   "motorcycles": 737,
                   "bicycles": 112
           }, {
               "year": 2001,
                   "cars": 1298,
                   "motorcycles": 680,
                   "bicycles": 101
           }, {
               "year": 2002,
                   "cars": 1275,
                   "motorcycles": 664,
                   "bicycles": 97
           }, {
               "year": 2003,
                   "cars": 1246,
                   "motorcycles": 648,
                   "bicycles": 93
           }, {
               "year": 2004,
                   "cars": 1218,
                   "motorcycles": 637,
                   "bicycles": 101
           }, {
               "year": 2005,
                   "cars": 1213,
                   "motorcycles": 633,
                   "bicycles": 87
           }, {
               "year": 2006,
                   "cars": 1199,
                   "motorcycles": 621,
                   "bicycles": 79
           }, {
               "year": 2007,
                   "cars": 1110,
                   "motorcycles": 210,
                   "bicycles": 81
           }, {
               "year": 2008,
                   "cars": 1165,
                   "motorcycles": 232,
                   "bicycles": 75
           }, {
               "year": 2009,
                   "cars": 1145,
                   "motorcycles": 219,
                   "bicycles": 88
           }, {
               "year": 2010,
                   "cars": 1163,
                   "motorcycles": 201,
                   "bicycles": 82
           }, {
               "year": 2011,
                   "cars": 1180,
                   "motorcycles": 285,
                   "bicycles": 87
           }, {
               "year": 2012,
                   "cars": 1159,
                   "motorcycles": 277,
                   "bicycles": 71
           }];

           AmCharts.makeChart("serialdiv", {
               type: "serial",
               dataProvider: chartData2,
               marginTop: 10,
               categoryField: "year",
               categoryAxis: {
                   gridAlpha: 0.07,
                   axisColor: "#DADADA",
                   startOnAxis: true,
                   guides: [{
                       category: "2001",
                       lineColor: "#CC0000",
                       lineAlpha: 1,
                       dashLength: 2,
                       inside: true,
                       labelRotation: 90,
                       label: "fines for speeding increased"
                   }, {
                       category: "2007",
                       lineColor: "#CC0000",
                       lineAlpha: 1,
                       dashLength: 2,
                       inside: true,
                       labelRotation: 90,
                       label: "motorcycle maintenance fee introduced"
                   }]
               },
               valueAxes: [{
                   stackType: "regular",
                   gridAlpha: 0.07,
                   title: "Traffic incidents"
               }],

               graphs: [{
                   type: "line",
                   title: "Cars",
                   hidden: true,
                   valueField: "cars",
                   lineAlpha: 0,
                   fillAlphas: 0.6,
                   balloonText: "<img src='../public/plugins/amcharts/images/car.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>"
               }, {
                   type: "line",
                   title: "Motorcycles",
                   valueField: "motorcycles",
                   lineAlpha: 0,
                   fillAlphas: 0.6,
                   balloonText: "<img src='../public/plugins/amcharts/images/motorcycle.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>"
               }, {
                   type: "line",
                   title: "Bicycles",
                   valueField: "bicycles",
                   lineAlpha: 0,
                   fillAlphas: 0.6,
                   balloonText: "<img src='../public/plugins/amcharts/images/bicycle.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>"
               }],
               legend: {
                   position: "bottom",
                   valueText: "[[value]]",
                   valueWidth: 100,
                   valueAlign: "left",
                   equalWidths: false,
                   periodValueText: "total: [[value.sum]]"
               },
               chartCursor: {
                   cursorAlpha: 0
               },
               chartScrollbar: {
                   color: "FFFFFF"
               }

           });
        </script>

        <!-- BEGIN SERIAL -->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase font-dark">График</span>
                            <span class="caption-helper">Некоторые показатели</span>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="serialdiv" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- END SERIAL -->

</div>
    <!-- BEGIN OLD VERSION --<
    <div class="row">
        <div class="col-lg-4">
                <div class="box no-border">
                    <div class="box-header">
                        <h3 class="less">Бюджеты предприятий</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="progress-group">
                                    <span class="progress-text">
                                        <i class="fa fa-rub"></i>
                                        200-360 тыс.
                                    </span>
                                    <span class="progress-number"><b>9</b></span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-warning" style="width: 24%"></div>
                                    </div>
                                </div>
                                <div class="progress-group">
                                    <span class="progress-text">
                                        <i class="fa fa-rub"></i>
                                        361-520 тыс.
                                    </span>
                                    <span class="progress-number"><b>7</b></span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-green" style="width: 19%"></div>
                                    </div>
                                </div>
                                <div class="progress-group">
                                    <span class="progress-text">
                                        <i class="fa fa-rub"></i>
                                        521-680 тыс.
                                    </span>
                                    <span class="progress-number"><b>9</b></span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: 24%"></div>
                                    </div>
                                </div>
                                <div class="progress-group">
                                    <span class="progress-text">
                                        <i class="fa fa-rub"></i>
                                        681-840 тыс.
                                    </span>
                                    <span class="progress-number"><b>7</b></span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-pink" style="width: 19%"></div>
                                    </div>
                                </div>
                                <div class="progress-group">
                                    <span class="progress-text">
                                        <i class="fa fa-rub"></i>
                                        841-1000+ тыс.
                                    </span>
                                    <span class="progress-number"><b>6</b></span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-orange" style="width: 16%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       >-- END OLD VERSION -->
</section>