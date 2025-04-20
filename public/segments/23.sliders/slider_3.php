<style type="text/css">

	.slider-container{
		height:400px;
		background-color: #1b1b1b;
		padding: 5px;
		display: flex;
		justify-content: flex-start;
		align-content: flex-start;
		width: 100%;
	}

	.slider-img-holder{
		display: flex;
	}
	.slider-img{
		max-width: 100%;
		width: 0px;
		object-fit: cover;
		height:100%;
		margin-left: 2px;
		margin-right: 2px;
		transition: all 0.5s cubic-bezier(1, 0, 0, 1) 0s;
	}
	.slider-img-1{
		object-position: 50% 20%;
	}
	.slider-img-2{
		object-position: 50% 30%;
	}
	.slider-img-3{
		object-position: 50% 10%;
	}
	.slider-img-4{
		object-position: 50% 40%;
	}
	
	.slider-img-holder-inner{
		height:100%;
	}

	.slider-button{
		cursor: pointer;
		padding: 10px;
		height: 100%;
		background-color: #424242;
		display: inline-block;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		align-items: center;
		box-shadow: 0px 0px 30px #00000044;
	}

	.slider-image-toggle{
		display:none;
	}
	.slider-image-toggle:checked ~ .slider-img{
		width: 10000px;
	}
	
	.slider-number{
		font-size: 40px;
		font-weight: bold;
		color: #1b1b1b;
	}
	.slider-number-text{
		color: #8C8C8CFF;
		writing-mode:vertical-lr;
	}

</style>
<slider handle="true" class="slider-container" >
	<label class="slider-img-holder">
		<input class="slider-image-toggle" type="radio" name="slider-image-toggle" checked>
		<div class="slider-button">
			<div editable="true" class="slider-number-text">Slide 1</div>
			<div editable="true" class="slider-number">1</div>
		</div>
		
		<img class="slider-img slider-img-1" src="images/segment_images/assorted/6.jpg">
		
	</label>
	<label class="slider-img-holder">
		<input class="slider-image-toggle" type="radio" name="slider-image-toggle">
		<div class="slider-button">
			<div editable="true" class="slider-number-text">Slide 2</div>
			<div editable="true" class="slider-number">2</div>
		</div>
		
		<img class="slider-img slider-img-2" src="images/segment_images/assorted/5.jpg">
		
	</label>
	<label class="slider-img-holder">
		<input class="slider-image-toggle" type="radio" name="slider-image-toggle">
		<div class="slider-button">
			<div editable="true" class="slider-number-text">Slide 3</div>
			<div editable="true" class="slider-number">3</div>
		</div>
		
		<img class="slider-img slider-img-3" src="images/segment_images/assorted/11.jpg">
		
	</label>
	<label class="slider-img-holder">
		<input class="slider-image-toggle" type="radio" name="slider-image-toggle">
		<div class="slider-button">
			<div editable="true" class="slider-number-text">Slide 4</div>
			<div editable="true" class="slider-number">4</div>
		</div>
		
		<img class="slider-img slider-img-3" src="images/segment_images/assorted/8.jpg">
		
	</label>
	
</slider>