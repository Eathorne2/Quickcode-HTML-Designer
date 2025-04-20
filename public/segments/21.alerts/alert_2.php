<style type="text/css">
	.alert-container-red{

		width:300px;
		height:350px;
		background-color:#FFFFFFFF;
		color:#000000FF;
		margin-top:20px;
		margin-bottom:20px;
		box-shadow:0px 0px 30px #7D7D7DFF;
		text-align:center;
		display:inline-block;
		margin:20px
	}
	.icon-holder-red{

		width:100%;
		height:159px;
		padding:10px;
		background-color:#d85261;
		color: #FFFFFFFF;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.icon-class-red{

		font-size:60px;
		color:#FFFFFFFF
	}
	.alert-title-red{

		padding-left: 10px;
		padding-right: 10px;
		font-size:18px
	}
	.alert-message-red{

		padding: 5px;
		color:#7D7D7DFF;
		margin-bottom:20px;
	}
	.alert-button-red{

		padding:10px;
		width:152px;
		margin:auto;
		color:#FFFFFFFF;
		background-color:#d85261;
		cursor:pointer;
		border-radius:20px;
		display:block;
		transition:all 0.3s ease 0s
	}
</style>
<div handle="true" class="alert-container-red" >
	<div class="icon-holder-red" >
		<i class="bi bi-x-circle-fill icon-class-red" >
		</i>
	</div>
	<h1 editable="true" class="alert-title-red" >
		Sorry!
	</h1>
	<div editable="true" class="alert-message-red" >
		You havent won!
	</div>
	<div editable="true" class="alert-button-red" >
		OK
	</div>
</div>