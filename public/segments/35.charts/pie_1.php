<style type="text/css">
	.chart{
	}
	.chart-container{
		padding: 4px;
		width: 100%;
		max-width: 800px;
		min-height: 200px;
		display: inline-block;
		background-color: #FFFFFF;
	}
</style>
<div class="chart-container" handle="true">
	<canvas 
		class="chart" 
		role="chart" 
		chart-title="My Animal Chart"
		chart-type="pie"
		chart-xlabel="Types of Animals"
		chart-ylabel="Number"
		chart-tension="0.4"

		show-labels="true"
		chart-labels="[&quot;Goats&quot;,&quot;Chickens&quot;,&quot;Dogs&quot;,&quot;Cats&quot;,&quot;Horses&quot;]"
		
		chart-data="[{&quot;label&quot;:&quot;Animals&quot;,&quot;data&quot;:[20,60,40,80,10]}]"
		>
			
	</canvas>
</div>
