<style type="text/css">
	
	.collections-card{

		color: #000000FF;
		width:100%;
		height:400px;
		background-color:#FFFFFFFF;
		margin:10px;
		min-width:200px;
		max-width:350px;
		position:relative;
		overflow:hidden
	}
	.collections-card-info{

		color:#FFFFFFFF;
		height:100%;
		padding:10px;
		background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 17%, rgba(0,0,0,0) 100%);
		position:absolute;
		width:100%;
		display:flex;
		flex-direction:column;
		justify-content:flex-end;
		z-index:1
	}
	.collections-card-img{

		width:100%;
		height:100%;
		object-fit: cover;
		transition:all 0.5s ease 0s
	}
	.collections-card-sub{

		padding: 5px;
		text-transform:uppercase;
		font-size:12px;
		letter-spacing:1px
	}
	.collections-card-title{

		padding: 5px;
		font-size:30px
	}
	.collections-card:hover>.collections-card-img{

		scale:1.1
	}
</style>
<div handle="true" class="collections-card" >
	<div class="collections-card-info" >
		<div editable="true" class="collections-card-sub" >
			Collections
		</div>
		<div editable="true" class="collections-card-title" >
			Women
		</div>
	</div>
	<img class="collections-card-img" src="images/segment_images/fashion/fashionable-woman-pink-coat-black-hat-posing_273443-2426.jpg" >
</div>
