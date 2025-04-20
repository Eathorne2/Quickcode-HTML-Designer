<style type="text/css">
	
	.modal-section{

		width:100%;
		padding:10px;
		min-height: 400px;
		background-color:#FFFFFFA8;
		color: #000000FF;
	}
	.modal-form{

		width:100%;
		max-width:800px;
		margin:10px;
		margin-left: auto;
		margin-right: auto;
		background-color:#FFFFFFFF;
		min-height:500px;
		box-shadow:0px 0px 20px #0000004C;
		border-radius:5px;
		display:flex;
		flex-direction:column;
	}
	.modal-header{

		color: #000000FF;
		height:50px;
		display:flex;
		justify-content:space-between;
		align-items:center;
		padding-left:10px;
		padding-right:10px;
		border-bottom:solid 1px #C3C3C3FF
	}
	.modal-title{

		padding-left: 10px;
		padding-right: 10px;
		text-align:center;
		flex:1;
		font-size:20px;
		left:365px
	}
	.modal-close-icon{

		font-size: 30px;
		color:#7D7D7DFF;
		cursor:pointer;
		transition:all 0.5s ease 0s
	}
	.modal-body{

		color: #000000FF;
		height:100%;
		padding:10px;
		background-color:#FFFFFFFF;
		min-height:500px;
		flex:1;
	}
	.modal-footer{

		color: #000000FF;
		display:flex;
		justify-content:space-between;
		align-items:center;
		border-top:solid 1px #C3C3C3FF
	}
	.modal-save-btn{

		cursor: pointer;
		border: none;
		padding: 10px 20px;
		border-radius: 6px;
		letter-spacing: 0.06em;
		text-transform: uppercase;
		text-decoration: none;
		outline: none;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
		transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
		background-color:#0866ff;
		color:#FFFFFFFF;
		margin: 10px;
		vertical-align: middle;
		min-width:100px
	}
	.modal-cancel-btn{

		cursor: pointer;
		border: none;
		padding: 10px 20px;
		border-radius: 6px;
		letter-spacing: 0.06em;
		text-transform: uppercase;
		text-decoration: none;
		outline: none;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
		transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
		background-color: #eee;
		color: #959595;
		margin: 10px;
		vertical-align: middle;
		min-width:100px
	}
	.modal-save-btn:hover{

		box-shadow: 0 7px 14px rgba(0, 0, 0, 0.18), 0 5px 5px rgba(0, 0, 0, 0.12);
	    background: #0d8aee;
	    color: #FFFFFF;
	}
	.modal-cancel-btn:hover{

		box-shadow: 0 7px 14px rgba(0, 0, 0, 0.18), 0 5px 5px rgba(0, 0, 0, 0.12);
	    background: #e1e1e1;
	    color: #4D4D4DFF;
	}
	.modal-close-icon:hover{

		color:#EC1C23FF
	}
</style>

<section handle="true" class="modal-section" >
	<form handle="true" class="modal-form" method="post" enctype="multipart/form-data" >
		<div class="modal-header" >
			<h1 editable="true" class="modal-title" >
				Modal Title
			</h1>
			<i class="bi bi-x-circle-fill modal-close-icon" >
			</i>
		</div>
		<div class="modal-body" >
		</div>
		<div class="modal-footer" >
			<button editable="true" class="modal-cancel-btn" type="button" >
				Cancel
			</button>
			<button editable="true" class="modal-save-btn" type="submit" >
				Save
			</button>
		</div>
	</form>
</section>
