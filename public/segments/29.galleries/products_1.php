
<style>
	.product-card-holder{
		display:flex;
		flex-wrap: wrap;
		padding: 10px;
		justify-content: center;
	}
	.product-card{
		transition: all .3s ease;
		cursor: pointer;
		width:220px;
		background-color:#eee;
		margin: 10px;
		min-height: 200px;
		border: solid thin #ddd

	}

	.product-card:hover{
		box-shadow: 0px 10px 20px #aaa;
		translate: 0px 10px;
	}
	.product-card-title{
		padding: 10px;
		font-weight: bold;
		text-align: center;
	}
	.product-card-img{
		width:100%;
		height:200px;
		object-fit: cover;
	}
	.product-card-amount{
		font-size:25px;
		padding: 10px;
	}
</style>

<div handle="true" class="product-card-holder">
	<div handle="true" class="product-card">
		<div editable="true" class="product-card-title">My product name 1</div>
		<div class="product-card-img-holder">
			<img src="images/segment_images/products/still-life-wireless-cyberpunk-headphones_23-2151072199.jpg" class="product-card-img">
		</div>
		<div class="product-card-amount" editable="true">$8.99</div>
	</div>
	<div handle="true" class="product-card">
		<div editable="true" class="product-card-title">My product name 2</div>
		<div class="product-card-img-holder">
			<img src="images/segment_images/products/realistic-black-smartphone-design-with-two-cameras_23-2148374057.jpg" class="product-card-img">
		</div>
		<div class="product-card-amount" editable="true">$20</div>
	</div>
	<div handle="true" class="product-card">
		<div editable="true" class="product-card-title">My product name 3</div>
		<div class="product-card-img-holder">
			<img src="images/segment_images/products/image3.jpg" class="product-card-img">
		</div>
		<div class="product-card-amount" editable="true">$5.99</div>
	</div>
	<div handle="true" class="product-card">
		<div editable="true" class="product-card-title">My product name 4</div>
		<div class="product-card-img-holder">
			<img src="images/segment_images/products/image4.jpg" class="product-card-img">
		</div>
		<div class="product-card-amount" editable="true">$0.99</div>
	</div>
	<div handle="true" class="product-card">
		<div editable="true" class="product-card-title">My product name 5</div>
		<div class="product-card-img-holder">
			<img src="images/segment_images/products/smartphone-balancing-with-pink-background_23-2150271746.jpg" class="product-card-img">
		</div>
		<div class="product-card-amount" editable="true">$99.99</div>
	</div>
	
</div>
