<style>

	.slider-container{

		width:100%;
		min-height: 400px;
		background-color:#FFFFFFFF;
		color: #000000FF;
		padding-top:20px;
		padding-bottom:20px
	}
	.div-container{

		color: #000000FF;
		margin-left:auto;
		margin-right:auto;
		max-width:1000px;
		width:100%;
		overflow:hidden;
	}

	.slider-holder-mover{
		width:100%;
		height:100%;
		position: relative;
		transition: all 0.5s ease 0s;
		left:0px;
		display:flex;
	}
	.card-container{
		
		color: #000000FF;
		min-width:100%;
		padding:10px;
		background-color:#FaFaFaFF;
		min-height:400px;
		height:100%;
		margin:1px;
		vertical-align:top;
		text-align:center;
		border:solid 1px #E3E3E3FF;
		flex:1;

	}
	.div-container_5{

		color: #000000FF;
		width: 100%;
		display:flex;
		justify-content:center;
		align-items:center;
	}
	.slider-title{

		padding-left: 10px;
		padding-right: 10px;
		text-align:center;
		font-family:amatic;
		font-size:40px;
		letter-spacing:4px;
		margin:5px
	}
	.icon{

		font-size: 40px;
		margin-left:10px;
		margin-right:10px;
		cursor:pointer
	}
 
	.product-card{

		color: #000000FF;
		width:100%;
		height:100px;
		background-color:#FFFFFFFF;
		max-width:300px;
		min-height:350px;
		text-align:center;
		display:inline-block;
		margin:5px;
		vertical-align:top;
		box-shadow:0px 0px 30px #00000025
	}
	.div-container_15{

		color: #000000FF;
		width: 100%;
		padding:10px;
		text-align:center
	}
	.img{

		width:100%;
		height:200px;
		object-fit: cover;
	}
	.class_1{

		padding: 5px;
		font-size:20px;
		color:#3F47CCFF
	}
	.class_1_19{

		padding: 5px;
		font-size:14px
	}
	.class_1_21{

		padding: 5px;
		font-size:20px;
		color:#3F47CCFF
	}
	.arrow-holder{
		padding: 4px;
	}
		
</style>

<section role="card-slider" handle="true" class="slider-container" >
	<h1 editable="true" class="slider-title" >
		Featured Products
	</h1>
	<div handle="true" class="div-container" >
		<div role="card-slider-mover" class="slider-holder-mover">
			<div role="slider-card-holder" class="card-container" >
				
				<div handle="true" class="product-card" >
					<img class="img" src="images/segment_images/products/mens-crewneck-sweatshirt_126278-49.jpg" >
					<div class="div-container_15" >
						<div editable="true" class="class_1" >
							Shoes 1
						</div>
						<div editable="true" class="class_1_19" >
							Some of the best shoes
						</div>
						<div editable="true" class="class_1_21" >
							$60
						</div>
					</div>
				</div>

			</div>
			<div role="slider-card-holder" class="card-container" >

				<div handle="true" class="product-card" >
					<img class="img" src="images/segment_images/products/mens-crewneck-sweatshirt_126278-49.jpg" >
					<div class="div-container_15" >
						<div editable="true" class="class_1" >
							Shoes 2
						</div>
						<div editable="true" class="class_1_19" >
							Some of the best shoes
						</div>
						<div editable="true" class="class_1_21" >
							$60
						</div>
					</div>
				</div>
				
			</div>
			<div role="slider-card-holder" class="card-container" >

				<div handle="true" class="product-card" >
					<img class="img" src="images/segment_images/products/mens-crewneck-sweatshirt_126278-49.jpg" >
					<div class="div-container_15" >
						<div editable="true" class="class_1" >
							Shoes 3
						</div>
						<div editable="true" class="class_1_19" >
							Some of the best shoes
						</div>
						<div editable="true" class="class_1_21" >
							$60
						</div>
					</div>
				</div>
				
			</div>
			<div role="slider-card-holder" class="card-container" >

				<div handle="true" class="product-card" >
					<img class="img" src="images/segment_images/products/mens-crewneck-sweatshirt_126278-49.jpg" >
					<div class="div-container_15" >
						<div editable="true" class="class_1" >
							Shoes 4
						</div>
						<div editable="true" class="class_1_19" >
							Some of the best shoes
						</div>
						<div editable="true" class="class_1_21" >
							$60
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="div-container_5">
		<div role="slider-left-button" class="arrow-holder">
			<i class="bi bi-arrow-left-short icon" >
			</i>
		</div>
		<div role="slider-right-button" class="arrow-holder">
			<i class="bi bi-arrow-right-short icon" >
			</i>
		</div>
	</div>
</section>
