var root = window.location.origin+'/app-polling/';
        function getVotes()
        {
            var getUrl = root+ 'ajax/getVotes/';
            
            $.ajax({
                url : getUrl,
                type : 'ajax',
                dataType : 'json',
                method : 'post',
                contentType: "application/json; charset=utf-8", // this
                success : function(response){
                    console.log(response);

                    
                        var sangatpuas = 0;
                        var puas = 0;
                        var cukup = 0;
                        var tidak = 0;
                        var stidak = 0;

                        for (var i = 0; i < response.length; i++) {
                            if (response[i].kpsn_jwb == 9 ) {
                                sangatpuas = sangatpuas+1;
                            }else if(response[i].kpsn_jwb == 10){
                                puas = puas +1;
                            }else if(response[i].kpsn_jwb == 11 ){
                                cukup = cukup+1;
                            }else if(response[i].kpsn_jwb == 12 ){
                                tidak = tidak+1;
                            }else if(response[i].kpsn_jwb == 13 ){
                                stidak = stidak+1;
                            }
                        }

                        var valsangat = sangatpuas/response.length*100;
                        var valpuas = puas/response.length*100;
                        var valcukup = cukup/response.length*100
                        var valtidak = tidak/response.length*100
                        var valstidak = stidak/response.length*100

                        var persensangat = '<h6 class="text-left">Sangat Puas : <br>' + valsangat.toFixed(1) +' %</h6>';
                        var persenpuas = '<h6 class="text-left"> Puas : <br>' + valpuas.toFixed(1) +' %</h6>';
                        var persencukup = '<h6 class="text-left"> Cukup Puas : <br>' + valcukup.toFixed(1) +' %</h6>';
                        var persentidak = '<h6 class="text-left pr-4"> Tidak Puas : <br>' + valtidak.toFixed(1) +' %</h6>';
                        var persenstidak = '<h6 class="text-left pr-4"> Sangat Tidak Puas : <br>' + valstidak.toFixed(1) +' %</h6>';

                        
                        // SETTING CHART
                            // var data1 = {
                            //               labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
                            //               datasets: [{
                            //                 data: [sangatpuas,puas,cukup,tidak,stidak],
                            //                 backgroundColor: [
                            //                             'deeppink','aqua','yellow','#ddf171','red'
                            //                         ],
                            //                         borderColor: [
                            //                             'green',
                            //                             'yellow',
                            //                             'red',
                            //                             'black',
                            //                             'black',
                            //                         ],
                            //               }]
                            //             }

                            // var optionsBar = {
                            //         hover: {
                            //           animationDuration: 0
                            //         },
                            //         animation: {
                            //           duration: 1,
                            //           onComplete: function() {
                            //             var chartInstance = this.chart,
                            //               ctx = chartInstance.ctx;

                            //             ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                            //             ctx.textAlign = 'center';
                            //             ctx.textBaseline = 'bottom';

                            //             this.data.datasets.forEach(function(dataset, i) {
                            //               var meta = chartInstance.controller.getDatasetMeta(i);
                            //               meta.data.forEach(function(bar, index) {
                            //                 var data = dataset.data[index];
                            //                 ctx.fillText(data, bar._model.x, bar._model.y - 5);
                            //               });
                            //             });
                            //           }
                            //         },
                            //         legend: {
                            //           display: false
                            //         },
                            //         tooltips: {
                            //           enabled: false
                            //         },
                            //         scales: {
                            //             yAxes: [{
                            //                ticks: {
                            //                     beginAtZero: true,
                            //                     stepSize: 1
                            //                 }
                            //             }],
                            //             xAxes: [{
                            //                 gridLines: {
                            //                   display: false
                            //                 },
                            //                 ticks: {
                            //                   beginAtZero: true
                            //                 }
                            //               }]
                            //         }

                            //     }



                            // // CHART LAPORAN
                            // var lprn1 = document.getElementById('grafik-kpsn').getContext('2d');
                            // var lpChart = new Chart(lprn1, {
                            //     type: 'bar',
                            //     data: data1,
                            //     options: optionsBar
                            // });


                            var chart = new Highcharts.Chart({
                              chart: {
                                backgroundColor: "rgba(0,0,0,0)",
                                renderTo: 'grafik-kpsn',
                                type: 'column',
                                animation : false,
                                options3d: {
                                  enabled: true,
                                  alpha: 10,
                                  beta: 10,
                                  depth: 40,
                                  viewDistance: 25
                                }
                              },
                              title: {
                                text: 'Grafik Jumlah Vote'
                              },
                              xAxis: {
                                categories: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
                                labels: {
                                  skew3d: true,
                                  style: {
                                    fontSize: '16px'
                                  }
                                }
                              },
                              // subtitle: {
                              //   text: 'Test options by dragging the sliders below'
                              // },
                              plotOptions: {
                                column: {
                                  depth: 25
                                },
                                series: {
                                  animation: {
                                    duration: 0
                                  }
                                }
                              },
                              series: [{
                                name: 'Jumlah',
                                data: [sangatpuas,puas,cukup,tidak,stidak]
                              }]
                            }); 

                            




                        $('#persen-sangat').html(persensangat);
                        $('#persen-puas').html(persenpuas);
                        $('#persen-cukup').html(persencukup);
                        $('#persen-tidak').html(persentidak);
                        $('#persen-stidak').html(persenstidak);
                    
                },
                error: function(response){
                    console.log(response.status);

                }
            });
        }
        getVotes();
        setInterval(getVotes, 5000);