<style type="text/css">
		.alert-dark-container{

		width:100%;
		height:60px;
		background-color:#4e4e4e;
		color:#FFFFFFFF;
		max-width:600px;
		margin:auto;
		margin-top:10px;
		margin-bottom:10px;
		display:flex;
		border-radius:10px;
		overflow-x:hidden;
		overflow-y:hidden
	}
	.alert-dark-lining{

		width:6px;
		padding:5px;
		background-color:#3A3A3AFF
	}
	.alert-dark-text-container{

		width: 100px;
		padding:10px;
		color:#cbcbcb;
		flex:1;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.alert-dark-info{

		padding: 5px;
		font-size:16px;
	}
	.alert-dark-icon-holder{

		width:50px;
		padding:10px;
		background-color:#3A3A3AFF;
		display:flex;
		justify-content:center;
		align-items:center;
		cursor:pointer;
		font-size:20px;
		box-shadow:0px 0px 60px #A8A8A8FF
	}
	.blue-close-button-dark{

		color:#C3C3C3FF;
		font-size:40px;
	}
	.close-button-bounce-dark{

		transition:all 0.5s cubic-bezier(.68,-0.55,.27,1.55) 0s
	}

	.close-button-bounce-dark:hover{

		scale:1.5
	}
	.alert-icon-dark{
		 font-size: 30px; 
	}
</style>
<div handle="true" class="alert-dark-container" >
	<div class="alert-dark-lining" >
	</div>
	<div handle="true" class="alert-dark-text-container" >
		<i class="bi bi-exclamation-diamond-fill alert-icon-dark">
		</i>
		<div editable="true" class="alert-dark-info" >
			Dark: This is a dark alert
		</div>
	</div>
	<div class="alert-dark-icon-holder" >
		<i class="bi bi-x blue-close-button-dark close-button-bounce-dark">
		</i>
	</div>
</div>
