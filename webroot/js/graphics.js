
var chartPieHommesFemmes = function(name,xValues, yValues, title){
	new Chart(name, {
	  type: "pie",
	  data: {
		labels: xValues,
		datasets: [{
		  backgroundColor: [ "#353a6e",  "#fc66b0" ],
		  data: yValues
		}]
	  },
	  options: {
		title: {
		  display: true,
		  text: title
		},
		tooltips: {
		  enabled: true,
		  text: title,
		  callbacks : {
			  label : function(tooltipItem, data){
				  return "  " + data['labels'][tooltipItem['index']] + " : " + data['datasets'][0]['data'][tooltipItem['index']] + " %";
			  }
		  }
		}
	  }
	  
	});
};

var charLineAnnees = function(xValues, yValuesH, yValuesF, title){
	new Chart("chart-line-annees", {
	  type: "line",
	  data: {
		labels: xValues,
		datasets: [{
		  borderColor: "#353a6e",
		  data: yValuesH
		},
		{
		  borderColor: "#fc66b0",
		  data: yValuesF
		}]
	  },
	  options: {
		legend: {display: false},  
		title: {
		  display: true,
		  text: title
		},
		scales: {
		  yAxes: [{
			ticks: {
			  beginAtZero: true
			}
		  }],
		}
	  }
	});
};

var chartBarAnnees = function(xValues, yValues, title){
	var barColors = ["red","green","blue","orange","brown","beige","darkorange","turquoise","teal","maroon"];
	new Chart("chart-annees", {
	  type: "bar",
	  data: {
		labels: xValues,
		datasets: [{
		  backgroundColor: colorName,
		  data: yValues
		}]
	  },
	  options: {
		legend: {display: false},  
		title: {
		  display: true,
		  text: title
		},
		scales: {
		  yAxes: [{
			ticks: {
			  beginAtZero: true
			}
		  }],
		}
	  }
	});
};
