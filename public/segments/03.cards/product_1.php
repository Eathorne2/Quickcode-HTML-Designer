<style type="text/css">
	
	.product-card-holder{
		vertical-align: top;
		color: #000000FF;
		width:250px;
		height:500px;
		padding:10px;
		background-color:#FFFFFFFF;
		text-align:center;
		margin:20px;
		border-radius:10px;
		box-shadow:0px 0px 20px #00000051;
		display:inline-block
	}
	.img{

		width:100%;
		height:258px;
		object-fit: cover;
		border-radius:10px;
		transition:all 0.3s ease 0s
	}
	.link{

		padding:10px;
		padding-left:20px;
		padding-right:20px;
		background-color:#3F3F3FFF;
		color:#FFFFFFFF;
		text-decoration:none;
		font-size:14px;
		border-radius:30px;
		display:block;
		width:160px;
		margin:auto;
		margin-top:-20px;
		position:relative;
		transition:all 0.5s ease 0s
	}
	.h1{

		padding-left: 10px;
		padding-right: 10px;
		font-size:18px;
		color:#0078D2FF;
		left:-31px;
		top:327px;
		padding:0px;
		margin:5px;
		transition:all 0.7s ease 0s
	}
	.product-card-text{

		padding: 5px;
		font-size:14px;
		transition:all 0.9s ease 0s;
		left:30px;
		top:358px
	}
	.product-card-footer{

		color:#535356FF;
		width:100%;
		height:65px;
		padding:10px;
		background-color:#F2F2F2FF;
		display:flex;
		justify-content:space-between;
		align-items:center;
		border-top:solid 1px #CBCBCBFF
	}
	.product-price-text{

		padding: 5px;
		font-size:25px;
		font-weight:bold
	}
 
	.bi-bag-heart-fill{

	}
	.cart-icon{

		border:solid 1px #7D7D7DFF;
		border-radius:50%;
		width:40px;
		height:40px;
		font-size:24px;
		padding:2px;
		cursor:pointer;
		transition:all 0.3s ease 0s;
	}
	.cart-icon:hover{

		color:#00A1E7FF

	}
	.product-card-holder:hover .img{

		translate:0px -24px;
		box-shadow:0px 10px 15px #0000003F

	}
	.product-card-holder:hover .link{

		translate:0px -20px

	}
	.product-card-holder:hover .h1{

		translate:0px -18px

	}
	.product-card-holder:hover .product-card-text{

		translate:0px -14px
	}
</style>
<div handle="true" class="product-card-holder" >
	<img class="img" src="images/segment_images/products/headphones-with-minimalist-monochrome-background_23-2150763315.jpg" >
	<a href="#" editable="true" class="link" >Product Category</a>
	<h1 editable="true" class="h1" >Some kind of Product Title here</h1>
	<div editable="true" class="product-card-text" >Lorem Ipsum is simply dummy text of the printing and typesetting industry</div>
	<div class="product-card-footer" >
		<div editable="true" class="product-price-text" >$19.99</div>
		<i class="bi bi-bag-check-fill cart-icon"></i>
	</div>
</div>