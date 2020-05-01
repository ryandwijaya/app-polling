var root = window.location.origin+'/app-polling/';
function getVotes()
{
	var getUrl = root+ 'ajax/getVotesMonitor4/';

	$.ajax({
		url : getUrl,
		type : 'ajax',
		dataType : 'json',
		method : 'post',
		contentType: "application/json; charset=utf-8", // this
		success : function(response){

			var a = 0;
			var b = 0;
			var c = 0;
			var d = 0;
			for (var i = 0;i< response.votes.length;i++){
				if (response.votes[i].kpsn4_A == '1'){
					a+=1;
				}else if(response.votes[i].kpsn4_B == '1'){
					b+=1;
				}else if(response.votes[i].kpsn4_C == '1'){
					c+=1;
				}else if(response.votes[i].kpsn4_D == '1'){
					d+=1;
				}
			}
			console.log(response.votes);

			var chart = new Highcharts.Chart({
				chart: {

					backgroundColor: "rgba(0,0,0,0)",
					renderTo: 'grafik-kpsn',
					type: 'column',
					animation : false,
					options3d: {
						enabled: true,
						alpha: 14,
						beta: 20,
						depth: 40,
						viewDistance: 25
					}

				},
				title: {
					text: 'Grafik Jumlah Vote',
					style: {
						color: 'black',
						font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
					}
				},
				xAxis: {
					categories: ['A', 'B', 'C', 'D'],
					labels: {
						skew3d: true,
						style: {
							fontSize: '16px',
							color: 'black'
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
					data: [a,b,c,d]
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
