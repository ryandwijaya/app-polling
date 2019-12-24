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

                    
                        var puas = 0;
                        var cukup = 0;
                        var tidak = 0;

                        for (var i = 0; i < response.length; i++) {
                            if (response[i].kpsn_jwb == 1 ) {
                                puas = puas+1;
                            }else if(response[i].kpsn_jwb == 2){
                                cukup = cukup +1;
                            }else if(response[i].kpsn_jwb == 3 ){
                                tidak = tidak+1;
                            }
                        }

                        var valpuas = puas/response.length*100;
                        var valcukup = cukup/response.length*100
                        var valtidak = tidak/response.length*100
                        var persenpuas = '<h4 class="text-left"> Puas : <br>' + valpuas.toFixed(1) +' %</h4>';
                        var persencukup = '<h4 class="text-left"> Cukup Puas : <br>' + valcukup.toFixed(1) +' %</h4>';
                        var persentidak = '<h4 class="text-left pr-4"> Tidak Puas : <br>' + valtidak.toFixed(1) +' %</h4>';



                        // SETTING CHART
                            var data1 = {
                                          labels: ['Puas','Cukup Puas', 'Tidak Puas'],
                                          datasets: [{
                                            data: [puas,cukup,tidak],
                                            backgroundColor: [
                                                        'deeppink','aqua','yellow','#ddf171','red'
                                                    ],
                                                    borderColor: [
                                                        'green',
                                                        'yellow',
                                                        'red',
                                                        'black',
                                                        'black',
                                                    ],
                                          }]
                                        }

                            var optionsBar = {
                                    hover: {
                                      animationDuration: 0
                                    },
                                    animation: {
                                      duration: 1,
                                      onComplete: function() {
                                        var chartInstance = this.chart,
                                          ctx = chartInstance.ctx;

                                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'bottom';

                                        this.data.datasets.forEach(function(dataset, i) {
                                          var meta = chartInstance.controller.getDatasetMeta(i);
                                          meta.data.forEach(function(bar, index) {
                                            var data = dataset.data[index];
                                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                          });
                                        });
                                      }
                                    },
                                    legend: {
                                      display: false
                                    },
                                    tooltips: {
                                      enabled: false
                                    },
                                    scales: {
                                        yAxes: [{
                                           ticks: {
                                                beginAtZero: true,
                                                stepSize: 1
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                              display: false
                                            },
                                            ticks: {
                                              beginAtZero: true
                                            }
                                          }]
                                    }

                                }

                            // CHART LAPORAN
                            var lprn1 = document.getElementById('grafik-kpsn').getContext('2d');
                            var lpChart = new Chart(lprn1, {
                                type: 'bar',
                                data: data1,
                                options: optionsBar
                            });


                        $('#persen-puas').html(persenpuas);
                        $('#persen-cukup').html(persencukup);
                        $('#persen-tidak').html(persentidak);
                    
                },
                error: function(response){
                    console.log(response.status);

                }
            });
        }
        getVotes();
        setInterval(getVotes, 5000);