<style type="text/css">
	
	.alert-danger-container{

		width:100%;
		height:60px;
		background-color:#ffe0e3;
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
	.alert-danger-lining{

		width:6px;
		padding:5px;
		background-color:#ff4757;
		color:#FFFFFFFF
	}
	.alert-danger-text-container{

		width: 100px;
		padding:10px;
		color:#ff4757;
		flex:1;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.alert-danger-info{

		padding: 5px;
		font-size:16px;
	}
	.alert-danger-icon-holder{

		width:50px;
		padding:10px;
		background-color:#ff99a3;
		color: #FFFFFFFF;
		display:flex;
		justify-content:center;
		align-items:center;
		cursor:pointer;
		font-size:20px;
		box-shadow:0px 0px 30px #5F5F5FFF
	}
	.blue-alert-icon-danger{
		font-size: 30px;
	}

	.blue-close-button-danger{

		color:#ff4757;
		font-size:40px;
	}

	.close-button-bounce-danger{

		transition:all 0.5s cubic-bezier(.68,-0.55,.27,1.55) 0s
	}

	.close-button-bounce-danger:hover{

		scale:1.5
	}
</style>
<div handle="true" class="alert-danger-container" >
	<div class="alert-danger-lining" >
	</div>
	<div handle="true" class="alert-danger-text-container" >
		<i class="bi bi-exclamation-circle-fill blue-alert-icon-danger" >
		</i>
		<div editable="true" class="alert-danger-info" >
			Danger: This is a danger alert
		</div>
	</div>
	<div class="alert-danger-icon-holder" >
		<i class="bi bi-x blue-close-button-danger close-button-bounce-danger" >
		</i>
	</div>
</div>
