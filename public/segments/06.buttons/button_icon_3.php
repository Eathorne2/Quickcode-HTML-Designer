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
		cursor:pointer
	}
	.button-icon-text{

		padding: 5px;
		flex:2;
		text-align:center
	}
	.button-split-icon{

		flex:1;
		text-align:center;
		background-color:#0000002B;
		border-top-right-radius:5px;
		border-bottom-right-radius:5px;
		font-size: 30px;
	}
	.button-icon-green:hover{

		opacity:0.8

	}
</style>
<button handle="true" class="button-icon-green" >
	<div class="button-inner-container" >
		<div editable="true" class="button-icon-text" >
			Back
		</div>
		<i class="bi button-split-icon bi-arrow-clockwise">
		</i>
	</div>
</button>