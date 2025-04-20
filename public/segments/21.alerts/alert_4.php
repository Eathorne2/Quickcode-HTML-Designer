<style type="text/css">
	
	.alert-container-yellow{

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
	.icon-holder-yellow{

		width:100%;
		height:159px;
		padding:10px;
		background-color:#fada5e;
		color: #FFFFFFFF;
		display:flex;
		justify-content:center;
		align-items:center;
	}
	.icon-class-yellow{

		font-size:60px;
		color:#FFFFFFFF;
	}
	.alert-title-yellow{

		padding-left: 10px;
		padding-right: 10px;
		font-size:18px
	}
	.alert-message-yellow{

		padding: 5px;
		color:#7D7D7DFF;
		margin-bottom:20px
	}
	.alert-button-yellow{

		padding:10px;
		width:152px;
		margin:auto;
		color:#FFFFFFFF;
		background-color:#fada5e;
		cursor:pointer;
		border-radius:20px;
		display:block;
		transition:all 0.3s ease 0s
	}
 
	.alert-button-green:hover{

		background-color:#37FFA0FF;
		color:#4A4A4AFF

	}
	.alert-button-red:hover{

		background-color:#FF89A0FF;
		color:#434343FF

	}
	.alert-button-blue:hover{

		background-color:#B4F0F7FF;
		color:#676767FF

	}
	.alert-button-yellow:hover{

		background-color:#FAF5A4FF;
		color:#5F5F5FFF
	}
</style>
<div handle="true" class="alert-container-yellow" >
	<div class="icon-holder-yellow" >
		<i class="bi bi-exclamation-octagon-fill icon-class-yellow" >
		</i>
	</div>
	<h1 editable="true" class="alert-title-yellow" >
		Warning!
	</h1>
	<div editable="true" class="alert-message-yellow" >
		Dont click that button
	</div>
	<div editable="true" class="alert-button-yellow" >
		OK
	</div>
</div>