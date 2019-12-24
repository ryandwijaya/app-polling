<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
	#container {
  height: 400px;
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

#sliders td input[type=range] {
  display: inline;
}
#sliders td {
  padding-right: 1em;
  white-space: nowrap;
}
 ?>
</style>
<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
    Chart designed to highlight 3D column chart rendering options.
    Move the sliders below to change the basic 3D settings for the chart.
    3D column charts are generally harder to read than 2D charts, but provide
    an interesting visual effect.
  </p>
  <div id="sliders">
    <table>
      <tr>
        <td><label for="alpha">Alpha Angle</label></td>
        <td><input id="alpha" type="range" min="0" max="45" value="15"/> <span id="alpha-value" class="value"></span></td>
      </tr>
      <tr>
        <td><label for="beta">Beta Angle</label></td>
        <td><input id="beta" type="range" min="-45" max="45" value="15"/> <span id="beta-value" class="value"></span></td>
      </tr>
      <tr>
        <td><label for="depth">Depth</label></td>
        <td><input id="depth" type="range" min="20" max="100" value="50"/> <span id="depth-value" class="value"></span></td>
      </tr>
    </table>
  </div>
</figure>



<script>
function go(){

	// Set up the chart
var chart = new Highcharts.Chart({

  chart: {
    renderTo: 'container',
    type: 'column',
    options3d: {
      enabled: true,
      alpha: 15,
      beta: 15,
      depth: 50,
      viewDistance: 25
    }
  },
  title: {
    text: 'Chart rotation demo'
  },
  xAxis: {
    categories: ['Apples', 'Oranges', 'Pears'],
    labels: {
      skew3d: true,
      style: {
        fontSize: '16px'
      }
    }
  },
  subtitle: {
    text: 'Test options by dragging the sliders below'
  },
  plotOptions: {
    column: {
      depth: 25
    }
  },
  series: [{
    data: [29.9, 71.5, 106.4]
  }]
});	
}	

function showValues() {
  $('#alpha-value').html(chart.options.chart.options3d.alpha);
  $('#beta-value').html(chart.options.chart.options3d.beta);
  $('#depth-value').html(chart.options.chart.options3d.depth);
}

// Activate the sliders
$('#sliders input').on('input change', function () {
  chart.options.chart.options3d[this.id] = parseFloat(this.value);
  showValues();
  chart.redraw(false);
});
go();
setInterval(go, 3000);
showValues();
</script>