<style type="text/css">
		
	.alert-info-container{

		width:100%;
		height:60px;
		background-color:#d7f0ff;
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
	.alert-info-lining{

		width:6px;
		padding:5px;
		background-color:#3db5ff;
		color:#FFFFFFFF
	}
	.alert-info-text-container{

		width: 100px;
		padding:10px;
		color:#3DB5FFFF;
		flex:1;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.alert-info-icon-holder{

		width:50px;
		padding:10px;
		background-color:#99d8ff;
		color: #FFFFFFFF;
		display:flex;
		justify-content:center;
		align-items:center;
		cursor:pointer;
		font-size:20px;
		box-shadow:0px 0px 30px #5F5F5FFF
	}
	.bi-check-circle-fill{

	}
	.alert-info-info{

		padding: 5px;
		font-size:16px
	}
	.blue-close-button-info{

		color:#3DB5FFFF;
		font-size:40px;
	}
	.blue-alert-icon-info{
		font-size: 30px;	
	}

	.close-button-bounce-info{

		transition:all 0.5s cubic-bezier(.68,-0.55,.27,1.55) 0s
	}

	.close-button-bounce-info:hover{

		scale:1.5
	}
</style>


<div handle="true" class="alert-info-container" >
	<div class="alert-info-lining" >
	</div>
	<div handle="true" class="alert-info-text-container" >
		<i class="bi bi-info-circle-fill blue-alert-icon-info" >
		</i>
		<div editable="true" class="alert-info-info" >
			Info: This is an info alert
		</div>
	</div>
	<div class="alert-info-icon-holder" >
		<i class="bi bi-x blue-close-button-info close-button-bounce-info" >
		</i>
	</div>
</div>

