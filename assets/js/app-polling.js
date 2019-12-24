$(document).ready(function () {
	// ------------------------------------------------------------------------------------------
	// start
	// ------------------------------------------------------------------------------------------
	var root = window.origin + '/App-Polling/';

	// ------------------------------------------------------------------------------------------
	// Kategori
	// ------------------------------------------------------------------------------------------
	$('.edit-ptn').click(function () {
		var id = $(this).val();
		var getUrl = root + 'ptn/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#ptn').val(response.ptn_txt);
				$('#ptn-id').val(response.ptn_id);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});
	// ------------------------------------------------------------------------------------------
	$('.edit-lyn').click(function () {
		var id = $(this).val();
		var getUrl = root + 'layanan/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#lynn').val(response.lynn_nm);
				$('#lynn-id').val(response.lynn_id);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});

	// ------------------------------------------------------------------------------------------
	$('.edit-jwb').click(function () {
		var id = $(this).val();
		var getUrl = root + 'jwb/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#jwb').val(response.jwb_ket);
				$('#jwb-id').val(response.jwb_id);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});

	// ------------------------------------------------------------------------------------------
	$('.edit-usr').click(function () {
		var id = $(this).val();
		var getUrl = root + 'user/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#nm').val(response.usr_nm);
				$('#usrnm').val(response.usr_usrnm);
				$('#pw').val(response.usr_pw);
				$('#lvl-usr').val(response.usr_lvl);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});

	// ------------------------------------------------------------------------------------------

	// $('#show-report').click(function () {
		
	// 	var ptn = $('#nm-ptn').val();
	// 	var lyn = $('#nm-lynn').val();
	// 	var start = $('#tgl-start').val();
	// 	var end = $('#tgl-end').val();
	// 	var getUrl = root + 'laporan/ajaxGet/'+ptn+'/'+lyn+'/'+start+'/'+end;
	// 	var sgtbaik = 0;
	// 	var baik = 0;
	// 	var cukup = 0;
	// 	var buruk = 0;
	// 	var dChart;
	// 	var bChart;

	// 	$.ajax({
	// 		url : getUrl,
	// 		type : 'ajax',
	// 		dataType : 'json',
	// 		method : 'post',
	// 		success: function (response) {
	// 			for (var i = 0; i < response.length; i++) {
	// 				if (response[i].jwb_id == 1) {
	// 					sgtbaik +=1;
	// 				}if (response[i].jwb_id == 2) {
	// 					baik +=1;
	// 				}else if(response[i].jwb_id == 3){
	// 					cukup +=1;
	// 				}else if(response[i].jwb_id == 4){
	// 					buruk +=1;
	// 				}
	// 			}

	// 			var allvote = response.length;
								

	// 			console.log(cukup);
	// 			//chart

	// 			if (bChart) bChart.destroy();
	// 			if (dChart) dChart.destroy();  
	// 			barChart('chartDonut',sgtbaik,baik,cukup,buruk);
	// 			doughnutChart('chartBar',sgtbaik,baik,cukup,buruk);

	// 			$('#responden').html(response.length+' Suara');
	// 			$('#pertanyaan').html(response[0].ptn_txt);
	// 			$('#layanan').html(response[0].lynn_nm);
	// 			$('#tanggalan').html(start+' sampai '+end);

	// 		},
	// 		error: function (response) {
	// 			console.log(response.status + 'error');
	// 		}
	// 	})
	// });

	// ------------------------------------------------------------------------------------------

});

function barChart(id,sgtbaik,baik,cukup,buruk) {
	var ctx = document.getElementById(id).getContext('2d');                       
    bChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sangat Baik','Baik', 'Cukup', 'Buruk'],
            datasets: [{
                label: '# of Votes',
                data: [sgtbaik, baik, cukup, buruk],
                backgroundColor: [
                    '#5fff81b0',
                    '#fffa5fa3',
                    '#ff571587',
                ],
                borderColor: [
                    'green',
                    'yellow',
                    'red',
                    'black',
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
}
function doughnutChart(id,sgtbaik,baik,cukup,buruk) {
	var ctn = document.getElementById(id).getContext('2d');
	
                             
    dChart = new Chart(ctn, {
        type: 'doughnut',
        data: {
            labels: ['Sangat Baik','Baik', 'Cukup', 'Buruk'],
            datasets: [{
                label: '# of Votes',
                data: [sgtbaik, baik, cukup, buruk],
                backgroundColor: [
                    '#5fff81b0',
                    '#fffa5fa3',
                    '#ff571587',
                ],
                borderColor: [
                    'green',
                    'yellow',
                    'red',
                    'black',
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
}


