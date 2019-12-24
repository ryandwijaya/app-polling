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
		height: 89.4%;
		background: <?= $getData['umum_background'] ?>;
        
	}
</style>
<body class="white" id="full"  style="position: fixed;width: 100%;">

	<div class="row">
        <div class="col-md-3 text-center bg-secondary pt-1">
            <h5 class="text-white"><i class="fa fa-calendar"></i> <?= date_indo(date("Y-m-d")) ?> , <i class="fa fa-clock"></i> <?= date('h:i:sa') ?></h5>
        </div>
		<div class="col-md-9 pt-1">
			
			<marquee behavior="" direction=""> <h4> <?= $getData['umum_text_top'] ?> </h4></marquee>

		</div>
	</div>
	<div class="row" id="main-content">
		<div class="col-md-7 pl-2 pr-2" >
			<video class="p-5" width="100%" height="650" autoplay="true">
			  <source src="<?= base_url() ?>assets/upload/video/<?= $getData['umum_video'] ?>">
			  Your browser does not support HTML5 video.
			</video>
		</div>

		<div class="col-md-5" id="bottom">
            <?php foreach ($getLynn as $lyn): ?>
            	
            <div class="row">
            	<div class="col-md-12">
                <h5 class="border-bottom"><?= $lyn['lynn_nm'] ?></h5>
		      	<canvas id="<?= str_replace(' ','-',$lyn['lynn_nm']) ?>" height="67"></canvas>
            	</div>            
            </div>
            <?php endforeach ?>

           
        


		</div>
	</div>
	<div class="row">
		<div class="col-md-12 pt-1">
			
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

                    

                    <?php foreach ($getLynn as $lyn): ?>
                        var puas = 0;
                        var cukup = 0;
                        var tidak = 0;
                        var lynn = <?= $lyn['lynn_id'] ?>;
                        for (var i = 0; i < response.length; i++) {
                        if (response[i].kpsn_jwb == 1 && response[i].kpsn_lynn == lynn) {
                            puas = puas+1;
                        }else if(response[i].kpsn_jwb == 2 && response[i].kpsn_lynn == lynn){
                            cukup = cukup +1;
                        }else if(response[i].kpsn_jwb == 3 && response[i].kpsn_lynn == lynn){
                            tidak = tidak+1;
                        }
                    }
                    console.log(puas + ' -' + cukup+' - ' + tidak);

                        var ctx = document.getElementById('<?= str_replace(' ','-',$lyn['lynn_nm']) ?>').getContext('2d');
                                
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Puas','Cukup Puas', 'Tidak Puas'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [puas,cukup,tidak],
                                    backgroundColor: [
                                        '#5fff81b0',
                                        '#fffa5fa3',
                                        '#ff571587',
                                        '#ff571543',
                                    ],
                                    borderColor: [
                                        'green',
                                        'yellow',
                                        'red',
                                        'brown',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    
                    <?php endforeach ?>
                    
                },
                error: function(response){
                    console.log(response.status);

                }
            });
        }
    getVotes();
    setInterval(getVotes, 20000);

</script>








<!-- <script>
    var ctx = document.getElementById('misalnya2').getContext('2d');
                                
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Baik', 'Cukup', 'Buruk'],
            datasets: [{
                label: '# of Votes',
                data: [10, 6, 3],
                backgroundColor: [
                    '#5fff81b0',
                    '#fffa5fa3',
                    '#ff571587',
                ],
                borderColor: [
                    'green',
                    'yellow',
                    'red',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('misalnya3').getContext('2d');
                                
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Baik', 'Cukup', 'Buruk'],
            datasets: [{
                label: '# of Votes',
                data: [10, 6, 3],
                backgroundColor: [
                    '#5fff81b0',
                    '#fffa5fa3',
                    '#ff571587',
                ],
                borderColor: [
                    'green',
                    'yellow',
                    'red',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('misalnya4').getContext('2d');
                                
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Baik', 'Cukup', 'Buruk'],
            datasets: [{
                label: '# of Votes',
                data: [10, 6, 3],
                backgroundColor: [
                    '#5fff81b0',
                    '#fffa5fa3',
                    '#ff571587',
                ],
                borderColor: [
                    'green',
                    'yellow',
                    'red',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script> -->
    
</body>
        