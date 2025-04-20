<style type="text/css">
	
	.button-icon-green{
		padding: 0px;
		color: #000000FF;
		background-color:#007ef4;
		width:150px;
		display:inline-block;
		margin:10px;
		vertical-align:top;
		border: none;
	}
	.button-inner-container{

		color:#FFFFFFFF;
		display:flex;
		align-items:center;
		cursor:pointer;
		position:relative
	}
	.button-split-icon{

		flex:1;
		text-align:center;
		background-color:#DDDDDDFF;
		color:#007EF4FF;
		font-size: 30px;
	}
	.button-icon-text{

		padding: 5px;
		flex:2;
		text-align:center
	}
	.button-diamond-shape{

		color: #000000FF;
		height:10px;
		background-color:#ddd;
		rotate:45deg;
		position:absolute;
		left:41px;
		width:10px
	}
	.button-icon-green:hover{

		opacity:0.8

	}
</style>
<button handle="true" class="button-icon-green" >
	<div class="button-inner-container" >
		<i class="bi button-split-icon bi-gear-fill" ></i>
		<div editable="true" class="button-icon-text">
			Settings
		</div>
		<div class="button-diamond-shape"></div>
	</div>
</button>