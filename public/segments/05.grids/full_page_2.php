<style>
	.section-grid{

		display: grid;
		grid-gap: 5px;
		grid-template-columns: 240px repeat(2, auto) 240px;
		grid-template-rows: auto 1fr 1fr auto;
		grid-template-areas: 
		'header header header header'
		'left content content right'
		'left content content right'
		'footer footer footer footer'
		;
		min-height: 100vh;
		background-color: #ffffff;
	}

	.grid-content-div{
		padding: 5px;
		background-color: #eee;

	}

	.grid-header{
		grid-area: header;
		min-height: 50px;
		align-self:self-start;
		
	}
	.grid-content{
		grid-area: content;
		min-height: 100px;
	}
	.grid-left{
		grid-area: left;
	}
	.grid-right{
		grid-area: right;
	}
	.grid-footer{
		grid-area: footer;
		min-height: 50px;
		align-self:self-start;
	}
	
</style>
<style id="laptop">
	@media all and (max-width: 992px)
	{

		.section-grid{
			grid-template-areas: 
			'header header header header'
			'left content content content'
			'left content content content'
			'right right right right'
			'footer footer footer footer'
			;
			
		}

		.grid-right{
			min-height: 100px;
		}

	}
	
</style>
<style id="tablet">
	@media all and (max-width: 768px)
	{

		.section-grid{
			display: block;
			padding:5px;
			min-height: 100vh;
		}
		.grid-left{
			min-height: 100px;
		}
		.grid-content-div{
			margin: 5px;

		}

	}
	
</style>


<section handle="true" class="section-grid">
	
	<div class="grid-content-div grid-header"></div>
	<div class="grid-content-div grid-content"></div>
	<div class="grid-content-div grid-left"></div>
	<div class="grid-content-div grid-right"></div>
	<div class="grid-content-div grid-footer"></div>

</section>