<style>
	.section-grid{
		margin-top: 0.5rem;
		margin-bottom: 0.5rem;
		display: grid;
		grid-gap: 5px;
		grid-template-columns: 1fr 2fr 1fr;
		grid-template-rows: 1fr;
		grid-template-areas: 
		'left middle right'
		;
		grid-gap: 0.5rem;
		background-color: #ffffff;
	}

	.grid-content-div{
		
	}

	.grid-left{
		grid-area: left;
		min-height: 100px;
		background-color: #eee;
	}
	.grid-right{
		grid-area: right;
		min-height: 100px;
		background-color: #eee;
	}
	.grid-middle{
		grid-area: middle;
		min-height: 100px;
		background-color: #eee;
	}
	
</style>
<style id="laptop">
	@media all and (max-width: 992px)
	{

		.section-grid{
			grid-template-areas: 
			'left middle middle'
			'right right right'
			;
			
		}


	}
	
</style>
<style id="tablet">
	@media all and (max-width: 768px)
	{

		.section-grid{
			display: block;
		}

		.grid-content-div{
			margin: 0.5rem;
		}

	}
	
</style>


<section handle="true" class="section-grid">
	
	<div class="grid-content-div grid-left"></div>
	<div class="grid-content-div grid-middle"></div>
	<div class="grid-content-div grid-right"></div>

</section>