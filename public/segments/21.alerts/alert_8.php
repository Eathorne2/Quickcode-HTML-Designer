<style type="text/css">
	
	.alert-warning-container{

		width:100%;
		height:60px;
		background-color:#ffdb9b;
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
	.alert-warning-lining{

		width:6px;
		padding:5px;
		background-color:#cd8400;
		color:#FFFFFFFF
	}
	.alert-warning-text-container{

		width: 100px;
		padding:10px;
		color:#cd8400;
		flex:1;
		display:flex;
		justify-content:center;
		align-items:center;
		font-size: 30px;
	}
	.alert-warning-info{

		padding: 5px;
		font-size:16px;
		left:651px;
		top:314px
	}
	.alert-warning-icon-holder{

		width:50px;
		padding:10px;
		background-color:#ffd080;
		color: #FFFFFFFF;
		display:flex;
		justify-content:center;
		align-items:center;
		cursor:pointer;
		font-size:20px;
		box-shadow:0px 0px 30px #5F5F5FFF
	}
	.blue-close-button-warning{

		color:#cd8400;
		font-size:40px;
	}
	.close-button-bounce-warning{

		transition:all 0.5s cubic-bezier(.68,-0.55,.27,1.55) 0s
	}
	.close-button-bounce-warning:hover{

		scale:1.5
	}
</style>
<div handle="true" class="alert-warning-container" >
	<div class="alert-warning-lining" >
	</div>
	<div handle="true" class="alert-warning-text-container" >
		<i class="bi bi-exclamation-diamond-fill">
		</i>
		<div editable="true" class="alert-warning-info" >
			Warning: This is a warning alert
		</div>
	</div>
	<div class="alert-warning-icon-holder" >
		<i class="bi bi-x blue-close-button-warning close-button-bounce-warning">
		</i>
	</div>
</div>