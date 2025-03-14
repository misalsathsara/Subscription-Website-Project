var options = {
	chart: {
	  height: 235,
	  width: '75%',
	  type: 'bar',
	  toolbar: {
		show: false,
	  },
	},
	plotOptions: {
	  bar: {
		horizontal: false,
		columnWidth: '60%',
		borderRadius: 8,
	  },
	},
	dataLabels: {
	  enabled: false
	},
	stroke: {
	  show: true,
	  width: 0,
	  colors: ['#435EEF']
	},
	series: [{
	  name: 'Sales',
	  data: [2000, 4000, 8000, 10000]
	}],
	legend: {
	  show: false,
	},
	xaxis: {
	  categories: ['Usa', 'Ind', 'Brz', 'Mex'],
	},
	yaxis: {
	  show: false,
	},
	fill: {
	  colors: ['#4267cd'],
	},
	tooltip: {
	  y: {
		formatter: function(val) {
		  return + val
		}
	  }
	},
	grid: {
	  show: false,
	  xaxis: {
		lines: {
		  show: true
		}
	  },   
	  yaxis: {
		lines: {
		  show: false,
		} 
	  },
	  padding: {
		top: 0,
		right: 0,
		bottom: -10,
		left: 0
	  },
	},
	colors: ['#ffffff'],
  }
  var chart = new ApexCharts(
	document.querySelector("#salesGraph"),
	options
  );
  chart.render();