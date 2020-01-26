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
                                text: 'Grafik Jumlah Vote',
								  style: {
									  color: 'yellow'
								  }
                              },
                              xAxis: {
                                categories: ['Puas', 'Cukup Puas', 'Tidak Puas'],
                                labels: {
                                  skew3d: true,
                                  style: {
                                    fontSize: '16px',
									  color: 'yellow'
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
                                data: [puas,cukup,tidak]
                              }]
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
        setInterval(getVotes, 2000);
