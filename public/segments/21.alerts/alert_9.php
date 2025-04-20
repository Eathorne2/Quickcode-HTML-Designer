<style type="text/css">
		.alert-default-container{

		width:100%;
		height:60px;
		background-color:#ededed;
		color: #FFFFFFFF;
		max-width:600px;
		margin:auto;
		margin-top:10px;
		margin-bottom:10px;
		display:flex;
		border-radius:10px;
		overflow-x:hidden;
		overflow-y:hidden
	}
	.alert-default-lining{

		width:6px;
		padding:5px;
		background-color:#a0a0a0;
		color:#FFFFFFFF
	}
	.alert-default-text-container{

		width: 100px;
		padding:10px;
		color:#a0a0a0;
		flex:1;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.alert-default-info{

		padding: 5px;
		font-size:16px;
	}
	.alert-default-icon-holder{

		width:50px;
		padding:10px;
		background-color:#DBDBDBFF;
		color: #FFFFFFFF;
		display:flex;
		justify-content:center;
		align-items:center;
		cursor:pointer;
		font-size:20px;
		box-shadow:0px 0px 30px #5F5F5FFF
	}
	.blue-close-button-default{

		color:#a0a0a0;
		font-size:40px;
	}
	.close-button-bounce-default{

		transition:all 0.5s cubic-bezier(.68,-0.55,.27,1.55) 0s;
	}
	.close-button-bounce-default:hover{

		scale:1.5
	}
	.alert-icon-default{
		font-size: 30px;
	}
</style>
<div handle="true" class="alert-default-container" >
	<div class="alert-default-lining" >
	</div>
	<div handle="true" class="alert-default-text-container" >
		<i class="bi bi-check-circle-fill alert-icon-default">
		</i>
		<div editable="true" class="alert-default-info" >
			Default: This is a default alert
		</div>
	</div>
	<div class="alert-default-icon-holder" >
		<i class="bi bi-x blue-close-button-default close-button-bounce-default">
		</i>
	</div>
</div>
