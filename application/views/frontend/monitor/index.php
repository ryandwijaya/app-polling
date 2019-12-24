<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>App-Polling</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url() ?>assets/images/interview.png" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url() ?>assets/css/styles/all-themes.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/js/Chart.bundle.js"></script>
</head>
<style>
	html,body{
		height: 100%;
	}
	#main-content{
        height: 100%;
		background: <?= $getData['umum_background'] ?>;
        
	}
    #footer{
    position:absolute;
    bottom:0;
    width:100%;
    background: <?= $getData['umum_background'] ?>;
    }
</style>
<body class="white" id="full"  style="position: fixed;width: 100%;font-family: <?= $getData['umum_font'] ?> ;">
    <div class="row border-bottom p-3" style="background: <?= $getData['umum_background'] ?>;">
        <div class="col-md-2 text-left">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="90" height="90">
        </div>
        <div class="col-md-6 text-center pt-2">
            <h1><?= $instansi['instansi_nama'] ?></h1> 
            <h5><?= $instansi['instansi_alamat'] ?></h5>   
        </div>
        <div class="col-md-2 text-left">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="90" height="90">
        </div>
        <div class="col-md-2 text-center pt-2">
            <h3><div id="clock"></div></h3>
            <h5><i class="fa fa-calendar"></i> <?= date_indo(date("Y-m-d")) ?> </h5>
        </div>
    </div>
	<div class="row pt-1" style="background: <?= $getData['umum_background'] ?>;">
        
		<div class="col-md-12">
			
			<marquee behavior="" direction=""> <h4> <?= $getData['umum_text_top'] ?> </h4></marquee>

		</div>
	</div>

	<div class="row pt-3" id="main-content">
		<div class="col-md-7">
			<video class="p-1" width="100%" autoplay="true">
			  <source src="<?= base_url() ?>assets/upload/video/<?= $getData['umum_video'] ?>">
			  Your browser does not support HTML5 video.
			</video>
		</div>

		<div class="col-md-5" id="bottom">
            
            	
            <div class="row">
            	<div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-12 text-center">
                        <h3 >Grafik Kepuasan</h3>
                        <canvas id="grafik-kpsn" height="190"></canvas> 
                    </div>
                </div>
                <div class="row pl-1 pr-1">
                    <?php if ($this->session->userdata('sess_hr_versi')=='empat' ||  $this->session->userdata('sess_hr_versi')=='lima'): ?>
                    <div class="col">
                        <h3 id="persen-sangat">Sangat Puas :</h3>
                    </div>
                    <?php endif ?>
                    <div class="col">
                        <h3 id="persen-puas">Puas :</h3>
                    </div>
                    <div class="col">
                        <h3 id="persen-cukup">Cukup Puas :</h3>
                    </div>
                    <div class="col">
                        <h3 id="persen-tidak">Tidak Puas :</h3>
                    </div>
                    <?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
                    <div class="col">
                        <h3 id="persen-stidak">Sangat Puas :</h3>
                    </div>
                    <?php endif ?>
                </div>
            	</div>            
            </div>
            

		</div>
	</div>
	<div class="row" id="footer">
		<div class="col-md-12">
			
			<marquee behavior="" direction=""> <h4> <?= $getData['umum_text_bot'] ?> </h4></marquee>

		</div>
	</div>
    	



      
    
    <!-- Plugins Js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/js/table.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>
    
    <!-- Custom Js -->
    <script src="<?= base_url() ?>assets/js/admin.js"></script>
    <script src="<?= base_url() ?>assets/js/app-polling.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/index.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/charts/jquery-knob.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/sparkline/sparkline-data.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/medias/carousel.js"></script>

<script>

function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

var elem = document.body; // Make the body go full screen.
requestFullScreen(elem);
</script>

<script>
    function Timer() {
        

       var dt=new Date()
       var dtnow = dt.getTime()
       document.getElementById('clock').innerHTML=dt.getHours()+":"+String(dt.getMinutes()).padStart(2, '0')+":"+dt.getSeconds();
       setTimeout("Timer()",1000);
    }

    Timer();
</script>

<?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>
    
<script>
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
    setInterval(getVotes, 20000);

</script>
<?php endif ?>




<?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>
    

<script>
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
                            var data1 = {
                                          labels: ['Sangat Puas','Puas','Cukup Puas', 'Tidak Puas'],
                                          datasets: [{
                                            data: [sangatpuas,puas,cukup,tidak],
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

</script>
<?php endif ?>


<?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
    

<script>
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
                            var data1 = {
                                          labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
                                          datasets: [{
                                            data: [sangatpuas,puas,cukup,tidak,stidak],
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
    setInterval(getVotes, 20000);

</script>
<?php endif ?>
    
</body>
        