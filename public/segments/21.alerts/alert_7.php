<style type="text/css">
	
	.alert-success-container{

		width:100%;
		height:60px;
		background-color:#c2f2d6;
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
	.alert-success-lining{

		width:6px;
		padding:5px;
		background-color:#22ac5b;
		color:#FFFFFFFF
	}
	.alert-success-text-container{

		width: 100px;
		padding:10px;
		color:#22ac5b;
		flex:1;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.blue-alert-icon-success{
		font-size: 30px;
		color:#22ac5b;
	}
	.alert-success-info{

		padding: 5px;
		font-size:16px;
	}
	.alert-success-icon-holder{

		width:50px;
		padding:10px;
		background-color:#95eab8;
		color: #FFFFFFFF;
		display:flex;
		justify-content:center;
		align-items:center;
		cursor:pointer;
		font-size:20px;
		box-shadow:0px 0px 30px #5F5F5FFF
	}
	.blue-close-button-success{

		color:#22ac5b;
		font-size:40px;
	}

	.close-button-bounce-success{

		transition:all 0.5s cubic-bezier(.68,-0.55,.27,1.55) 0s
	}

	.close-button-bounce-success:hover{

		scale:1.5
	}

</style>
<div handle="true" class="alert-success-container" >
	<div class="alert-success-lining" >
	</div>
	<div handle="true" class="alert-success-text-container" >
		<i class="bi bi-check-circle-fill blue-alert-icon-success" >
		</i>
		<div editable="true" class="alert-success-info" >
			Success: This is a success alert
		</div>
	</div>
	<div class="alert-success-icon-holder" >
		<i class="bi bi-x blue-close-button-success close-button-bounce-success" >
		</i>
	</div>
</div>
