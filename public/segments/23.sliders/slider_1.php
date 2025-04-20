<style type="text/css">
	
	.slider-container{
		display: flex;
		flex-direction: column;
		background-color: #F8F8F8;
		height: 500px;
		width: 100%;
	}
	.slider-top-section{
		display: flex;
		position: relative;
		flex: 10;
	}
	.slider-middle-section{
		position: relative;
		flex:1;
	}
	.slider-bottom-section{
		padding: 10px;
		display: flex;
		justify-content: center;
		align-items: center;
		max-height: 30px;
		flex: 1;
	}
	.slider-right-section{
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 5px;
		width: 30px;
		top:0px;
		right:0px;
		position: absolute;
		height: 100%;

	}
	.slider-left-section{
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 5px;
		width: 30px;
		top:0px;
		left:0px;
		position: absolute;
		height: 100%;

	}
	.slider-img-holder{
		position: absolute;
		height: 100%;
		width: 100%;
	}
	.slider-img{
		object-fit: cover;
		width: 100%;
		height:100%;
		min-height: 500px;
	}
	.slider-img-button{
		border: solid 3px #CBCBCBFF;
		border-radius: 50%;
		width: 20px;
		height: 20px;
		margin-left:5px;
		margin-right:5px;
		background-color: #FFFFFF;
		cursor: pointer;
		transition: all 0.3s ease;
	}
	.slider-button-icon{
		font-size: 30px;
		cursor: pointer;
		color:#FFFFFF;
		padding: 10px;
		background-color: #AFAFAF77;
		padding: 10px;
		box-shadow:0px 0px 30px #0000002F;
		transition: all 0.3s ease;
	}
	.slider-button-icon:hover{
		translate: 0px 10px;
	}
	.slider-button-active{
		background-color: #9A3EFFFF;
		border: solid 3px #FFFFFF;
	}
	.slider-img-button:hover{
		background-color: #BBBBBBFF;
	}
	.slider-caption{
		height: 30%;
		background-color: #00000044;
		color: #FFFFFF;
		position: absolute;
		bottom: 0px;
		padding: 1em;
		padding-left: 2em;
		padding-right: 2em;
		border-top-right-radius: 30px;
	}
	.slider-caption-title{
		margin-top:10px;
		margin-bottom:10px;
		font-size: 25px;
	}
</style>

<slider role="slider" handle="true" slider-transition="scale" slider-autoplay="true" slider-duration="4" slider-anim-type="" class="slider-container">
	<div class="slider-top-section">
		<div handle="true" class="slider-middle-section">
			<div handle="true" role="slider-item" class="slider-img-holder">
				<img class="slider-img" src="images/segment_images/assorted/3.jpg" >
				<div class="slider-caption">
					<h3 editable="true" class="slider-caption-title">Caption Title</h3>
					<div editable="true" class="slider-caption-desc">Some kind of caption description to compliment the title</div>
				</div>
			</div>
			<div handle="true" role="slider-item" class="slider-img-holder">
				<img class="slider-img" src="images/segment_images/assorted/5.jpg" >
				<div class="slider-caption">
					<h3 editable="true" class="slider-caption-title">Caption Title</h3>
					<div editable="true" class="slider-caption-desc">Some kind of caption description to compliment the title</div>
				</div>
			</div>
			<div handle="true" role="slider-item" class="slider-img-holder">
				<img class="slider-img" src="images/segment_images/assorted/11.jpg" >
				<div class="slider-caption">
					<h3 editable="true" class="slider-caption-title">Caption Title</h3>
					<div editable="true" class="slider-caption-desc">Some kind of caption description to compliment the title</div>
				</div>
			</div>
			
			<div handle="true" role="slider-item" class="slider-img-holder">
				<img class="slider-img" src="images/segment_images/photography/Login_bg.jpg" >
				<div class="slider-caption">
					<h3 editable="true" class="slider-caption-title">Caption Title</h3>
					<div editable="true" class="slider-caption-desc">Some kind of caption description to compliment the title</div>
				</div>
			</div>
		</div>
		<div role="prev-button" class="slider-left-section">
			<i class="bi bi-chevron-left slider-button-icon"></i>
		</div>
		<div role="next-button" class="slider-right-section">
			<i class="bi bi-chevron-right slider-button-icon"></i>
		</div>
	</div>
	<div active-class="slider-button-active" class="slider-bottom-section" role="slider-buttons">
		<div class="slider-img-button slider-button-active"></div>
		<div class="slider-img-button"></div>
		<div class="slider-img-button"></div>
		<div class="slider-img-button"></div>
	</div>
</slider>
