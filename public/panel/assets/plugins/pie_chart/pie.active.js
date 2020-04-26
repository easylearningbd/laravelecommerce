
$(document).ready(function(){

	// Load google charts
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	// Draw the chart and set the chart values
	function drawChart() {
	  var data = google.visualization.arrayToDataTable([
	  ['Task', 'Hours per Day'],
	  ['Work', 8],
	  ['Eat', 2],
	  ['TV', 4],
	  ['Gym', 2],
	  ['Sleep', 8]
	]);

	  // Optional; add a title and set the width and height of the chart
	  var options = {'title':'My Average Day', 'width':300, 'height':340};

	  // Display the chart inside the <div> element with id="piechart"
	  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	  chart.draw(data, options);
	}


	

	
});
