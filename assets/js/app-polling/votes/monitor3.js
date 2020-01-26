var root = window.location.origin+'/app-polling/';
function getVotes()
{
	var getUrl = root+ 'ajax/getVotesMonitor3/';

	$.ajax({
		url : getUrl,
		type : 'ajax',
		dataType : 'json',
		method : 'post',
		contentType: "application/json; charset=utf-8", // this
		success : function(response){
			console.log(response);
			var jwbA = 0;
			var jwbB = 0;
			var jwbC = 0;
			var jwbD = 0;

			for (var j = 0 ; j < response.length ; j++){
				if (response[j].mnt3_jwb14 == 'A'){
					jwbA += 1;
				}else if(response[j].mnt3_jwb14 == 'B'){
					jwbB += 1;
				}else if(response[j].mnt3_jwb14 == 'C'){
					jwbC += 1;
				}else if(response[j].mnt3_jwb14 == 'D'){
					jwbD += 1;
				}

			}

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
						color: 'yellow',
						font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
					}
				},
				xAxis: {
					categories: ['A', 'B', 'C', 'D'],
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
					data: [jwbA,jwbB,jwbC,jwbD]
				}]
			});

		},
		error: function(response){
			console.log(response.status);

		}
	});
}
getVotes();
setInterval(getVotes, 2000);
