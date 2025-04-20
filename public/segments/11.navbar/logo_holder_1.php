<style type="text/css">
	
	.grid-container{

		display: flex;
		flex-wrap:wrap;
		background-color:#FFFFFFFF;
		max-width:1200px;
		margin-left:auto;
		margin-right:auto;
		align-items:center
	}
	.grid-left{

		flex: 1;
		min-width:200px;
		vertical-align: top;
	}
	.grid-right{

		flex: 2;
		min-width:300px;
		vertical-align: top;
		text-align:center;
		height:100px
	}
	.grid-left_4{

		flex: 1;
		min-width:200px;
		min-height: 60px;
		vertical-align: top;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.img{

		width:100%;
		height:100%;
		object-fit: cover;
		max-width:200px
	}
	.input-container{

		display: flex;
		margin-top:4px;
		margin-bottom: 4px;
		padding:5px;
		align-items: center;
		background-color:#FFFFFFFF;
	}
	.text-input{

		display: block;
		width: 100%;
		padding:.6em;
		font-size:16px;
		font-weight: 400;
		line-height: 1.5;
		color: #212529;
		background-color: #fff;
		background-clip: padding-box;
		border: 0px solid #ced4da;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		outline:none;
	}
	.search-icon{

		font-size:20px;
		margin-left:10px;
		margin-right:10px;
		color:#707070FF
	}
	.menu-bar-section{

		width:100%;
		background-color:#FFFFFFFF;
		color: #000000FF;
		border-bottom:solid 1px #EFEFEFFF
	}
	.div-container{

		color: #000000FF;
		padding:5px;
		;
		position:relative
	}
	.menu-bar-icon{

		font-size: 25px;
		color:#7D7D7DFF
	}
	.cart-count-badge{

		padding: 5px;
		position:absolute;
		right:-6px;
		top:-7px;
		background-color:#7971ea;
		color:#FFFFFFFF;
		border-radius:50%;
		min-width:25px;
		text-align:center;
		max-height:25px;
		font-size:13px
	}
	
</style>
<section handle="true" class="menu-bar-section" >
	<div handle="true" class="grid-container" >
		<div class="grid-left" >
			<div class="input-container" >
				<i class="bi bi-search search-icon" >
				</i>
				<input placeholder="Search" type="text" name="search" class="text-input" >
			</div>
		</div>
		<div class="grid-right" >
			<img class="img" src="images/segment_images/logos/placeholder-logo-1.png" >
		</div>
		<div class="grid-left_4" >
			<div class="div-container" >
				<i class="bi bi-person-fill menu-bar-icon" >
				</i>
			</div>
			<div class="div-container" >
				<i class="bi bi-heart menu-bar-icon" >
				</i>
			</div>
			<div class="div-container" >
				<i class="bi bi-cart-fill menu-bar-icon" >
				</i>
				<div editable="true" class="cart-count-badge" >
					8
				</div>
			</div>
		</div>
	</div>
</section>