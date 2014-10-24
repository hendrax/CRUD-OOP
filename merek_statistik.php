<?php
//sertakan class yg diperlukan
include("class/class_grafik.php");

//instance objek grafik
$grafik = new grafik();
?>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/highchart_theme_grid.js"></script>

<script type="text/javascript">

Highcharts.visualize = function(table, options) {
   options.xAxis.categories = [];
   $('tbody th', table).each( function(i) {
	   options.xAxis.categories.push(this.innerHTML);
	});
   options.series = [];

	$('tr', table).each( function(i) {
	   var tr = this;
	   $('th, td', tr).each( function(j) {
	      if (j > 0) { // skip first column
		      if (i == 0) { // get the name and init the series
				   options.series[j - 1] = {
				      name: this.innerHTML,
				      data: []
			      };
			   }
            else { // add values
		         options.series[j - 1].data.push(parseFloat(this.innerHTML));
		      }
			}
		});
	});

	var chart = new Highcharts.Chart(options);
}

// On document ready, call visualize on the datatable.
$(document).ready(function() {
   var table = document.getElementById('table_data'),
	options = {
	   chart: {
		   renderTo: 'grafik',
			defaultSeriesType: 'column'
		},
		title: {
		   text: 'STATISTIK Penjualan per Merek'
		},
		xAxis: { },
		yAxis: {
		   title: {
			   text: 'Total'
			}
		},
		tooltip: {
		   formatter: function() {
			   return '<b>'+ this.series.name +'</b><br/>'+'Terjual '+this.y+' kali';
		   }
		},
  		legend: {
  		   layout: 'vertical',
  			align: 'right',
  			verticalAlign: 'top',
  			x: -10,
  			y: 24,
  			borderWidth: 0
  		}
	};

   Highcharts.visualize(table, options);
});
</script>
<h2>STATISTIK Penjualan per Merek</h2>
<table id="tabel_data" style="position: fixed; visibility:hidden; ">
<thead>
   <tr>
      <th>Merek</th>
      <?php $grafik->kolomMerek(); ?>
   </tr>
</thead>
<tbody>
   <tr>
      <th>Merek</th>
      <?php $grafik->kolomJumlah(); ?>
   </tr>
</tbody>
</table>
<div id="grafik"></div>