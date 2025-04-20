	var CHART = {

		charts: [],
		ids: [],

		get_data: function(ele)
		{

			let data = {
		  	chart_title: ele.getAttribute('chart-title') || 'Untitled',
		  	chart_type: ele.getAttribute('chart-type') || 'bar',
		  	xlabel: ele.getAttribute('chart-xlabel') || 'Unknown',
		  	ylabel: ele.getAttribute('chart-ylabel') || 'Unknown',
		  	show_labels: ele.getAttribute('show-labels') || true,
		  	labels: JSON.parse(ele.getAttribute('chart-labels') || '["Male","Female"]'),
		  	data: JSON.parse(ele.getAttribute('chart-data') || '[{"label":"People","data":"[20,60]"}]'),
		  };

			return data;
		},

		init: function(destroy = false)
		{

		  let eles = CANVAS.querySelectorAll('[role="chart"]');
		  if(eles.length == 0)
		  	return;

		  for (var i = 0; i < eles.length; i++) {
		  	
		  	if(CHART.ids.includes(eles[i].id))
		  	{
		  		CHART.update(eles[i],destroy);
		  		continue;
		  	}

		  	CHART.create(eles[i]);
		  }
		},

		create: function(ele, animate = true)
		{
			CHART.ids.push(ele.id);
		  	let mydata = CHART.get_data(ele);

			  let mychart = new Chart(ele, {
			  	animation : true,
			    type: mydata.chart_type,
			    data: {
			      labels: mydata.labels,
			      datasets: mydata.data
			    },
			    options: {
				  responsive: true,
				  maintainAspectRatio: true,
			      scales: {
			        x: {
			            title: {
			                display: true,
			                text: mydata.xlabel
			            },

			        },
			   		y: {
			            title: {
			                display: true,
			                text: mydata.ylabel
			            },
			        },

			      },
			      plugins: {
			        title: {
			            display: true,
			            text: mydata.chart_title
			        },
			        legend: { display: mydata.show_labels ?? true, position:'bottom',
			            fontsize:3
			        }
			    },
			    animation:{
			    	duration: animate ? 1000:0
			    }
			    }
			  });

			  CHART.charts.push(mychart);
		  
		},

		update: function(ele, destroy = false)
		{
			let mydata = CHART.get_data(ele);
		  	let id = CHART.ids.indexOf(ele.id);

			if(destroy)
			{

		  		CHART.charts[id].destroy();
		  		CHART.ids.splice(id,1);
		  		CHART.charts.splice(id,1);

		  		CHART.create(ele, false);
			}else{

				CHART.charts[id].type = mydata.chart_type;
				CHART.charts[id].options.plugins.title.text = mydata.chart_title;
				CHART.charts[id].data.datasets = mydata.data;
				CHART.charts[id].data.labels = mydata.labels;

				CHART.charts[id].update('none');

			}
		}
	}

