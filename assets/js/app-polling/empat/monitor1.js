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

                        for (var i = 0; i < response.length; i++) {
                            if (response[i].kpsn_jwb == 6 ) {
                                puas = puas+1;
                            }else if(response[i].kpsn_jwb == 7){
                                cukup = cukup +1;
                            }else if(response[i].kpsn_jwb == 8 ){
                                tidak = tidak+1;
                            }else if(response[i].kpsn_jwb == 5 ){
                                sangatpuas = sangatpuas+1;
                            }
                        }

                        var valsangat = sangatpuas/response.length*100;
                        var valpuas = puas/response.length*100;
                        var valcukup = cukup/response.length*100
                        var valtidak = tidak/response.length*100
                        var persensangat = '<h4 class="text-left"> Puas : <br>' + valsangat.toFixed(1) +' %</h4>';
                        var persenpuas = '<h4 class="text-left"> Puas : <br>' + valpuas.toFixed(1) +' %</h4>';
                        var persencukup = '<h4 class="text-left"> Cukup Puas : <br>' + valcukup.toFixed(1) +' %</h4>';
                        var persentidak = '<h4 class="text-left pr-4"> Tidak Puas : <br>' + valtidak.toFixed(1) +' %</h4>';


                        // SETTING CHART
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
                                categories: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas'],
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
                                data: [sangatpuas,puas,cukup,tidak]
                              }]
                            }); 






                        $('#persen-sangat').html(persensangat);
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