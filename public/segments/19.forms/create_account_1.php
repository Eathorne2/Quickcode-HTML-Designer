<style type="text/css">
	
	.form{

		width:100%;
		max-width: 500px;
		margin:10px;
		margin-left: auto;
		margin-right: auto;
		padding: 10px;
		background-color:#FFFFFFFF;
		min-height: 200px;
		border:solid 1px #E6E6E6FF;
		box-shadow:0px 0px 30px #00000058
	}
	.checkbox{

		margin: 5px;
		padding: 5px;
		appearance: none;
		-webkit-appearance: none;
		background-color: #c6c6c6;
		width:60px;
		height: 30px;
		outline: none;
		border-radius: 20px;
		box-shadow: inset 0px 0px 5px #00000044;
		position: relative;
		transition: all 0.5s ease;
		cursor: pointer;
	}
	.checkbox-holder{

		display: inline-flex;
		align-items: center;
		justify-content: center;
		width:100%
	}
	.control-group{

		position: relative;
	    margin: 25px 0;
	    padding: 5px;
	}
	.group-input{

		background-color: transparent;
	    color: #444;
	    font-size: 18px;
	    padding: 10px 10px 10px 5px;
	    display: block;
	    width: 100%;
	    border: none;
	    border-radius: 0;
	    border-bottom: 1px solid #888;
	    outline: none;
	}
	.group-label{

		color: #888;
	    font-size: 16px;
	    font-weight: normal;
	    position: absolute;
	    pointer-events: none;
	    left: 15px;
	    top: 10px;
	    transition: 300ms ease all;
	}
	.group-bar{

		position: relative;
	    display: block;
	    width: 100%;
	}
	.control-group_8{

		position: relative;
	    margin: 25px 0;
	    padding: 5px;
	}
	.group-input_9{

		background-color: transparent;
	    color: #444;
	    font-size: 18px;
	    padding: 10px 10px 10px 5px;
	    display: block;
	    width: 100%;
	    border: none;
	    border-radius: 0;
	    border-bottom: 1px solid #888;
	    outline: none;
	}
	.group-label_11{

		color: #888;
	    font-size: 16px;
	    font-weight: normal;
	    position: absolute;
	    pointer-events: none;
	    left: 15px;
	    top: 10px;
	    transition: 300ms ease all;
	}
	.group-bar_10{

		position: relative;
	    display: block;
	    width: 100%;
	}
	.button-container{

		padding: 4px;
		background-color:#F5F5F5FF;
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-top:10px;
		margin-bottom:10px;
		border-top:solid 1px #DDDDDDFF
	}
	.title-container{

		color: #000000FF;
		background-color:#FFFFFFFF;
	}
	.title-inner{

		color: #000000FF;
		padding:5px;
		display:inline-flex;
		width:104.10%;
		margin:-10px
	}
	.title-icon-holder{

		color: #000000FF;
		border-right:solid 1px #D1D1D1FF;
		box-shsadow:0px 0px 20px #BFBFBFFF;
		padding:10px
	}
	.title-heading{

		padding: 5px;
		font-size:20px;
		font-weight:bold;
		color:#0D6EFDFF
	}
	.title-icon{

		font-size: 30px;
		color:#0D6EFDFF
	}
	.title-text-holder{

		color: #000000FF;
		background-color:#FCFCFCFF;
		bsox-shadow:0px 0px 20px #BFBFBFFF;
		padding-left:10px;
		padding-right:10px;
		width:100%
	}
	.title-sub-heading{

		padding: 5px;
		font-size:14px;
		color:#5E5E5EFF
	}
	.button{

		cursor: pointer;
		border: none;
		padding: 10px 20px;
		border-radius: 3px;
		letter-spacing: 0.06em;
		text-transform: uppercase;
		text-decoration: none;
		outline: none;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
		transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
		background-color: #2196F3;
		color:#FFFFFFFF;
		margin: 10px;
		vertical-align: middle;
	}
	.button-cancel{

		cursor: pointer;
		border: none;
		padding: 10px 20px;
		border-radius: 3px;
		letter-spacing: 0.06em;
		text-transform: uppercase;
		text-decoration: none;
		outline: none;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
		transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
		background-color: #eee;
		color:#4D4D4DFF;
		margin: 10px;
		vertical-align: middle;
	}
	.checkbox:checked{

		background-color:#0D6EFDFF;
	}
	.checkbox:checked:before{

		left:30px;
	}
	.checkbox::before{

		content: '';
			position: absolute;
			width: 30px;
			height: 30px;
			background-color: #ffffff;
			border-radius: 50%;
			top:0px;
			left:0px;
			sacle: 1.1;
			box-shadow: 0px 2px 5px #00000088;
			transition: all 0.5s ease;
	}
	.group-bar:before{

		content: "";
		    height: 2px;
		    width: 0;
		    bottom: 0px;
		    position: absolute;
		    background: #2196F3;
		    transition: 300ms ease all;
		    left: 0%;
	}
	.group-bar_10:before{

		content: "";
		    height: 2px;
		    width: 0;
		    bottom: 0px;
		    position: absolute;
		    background: #2196F3;
		    transition: 300ms ease all;
		    left: 0%;
	}
	.button:hover{

		box-shadow: 0 7px 14px rgba(0, 0, 0, 0.18), 0 5px 5px rgba(0, 0, 0, 0.12);
		    background: #0d8aee;
		    color: #deeffd;
	}
	.button-cancel:hover{

		box-shadow: 0 7px 14px rgba(0, 0, 0, 0.18), 0 5px 5px rgba(0, 0, 0, 0.12);
		    background: #e1e1e1;
		    color: #8b8b8b;
	}
	.group-input:focus ~ .group-label{

		top: -14px;
		    font-size: 12px;
		    color: #2196F3;
	}
	.group-input:valid ~ .group-label{

		top: -14px;
		    font-size: 12px;
		    color: #2196F3;
	}
	.group-input:focus ~ .group-bar:before{

		width: 100%;
	}
	.group-input_9:focus ~ .group-label_11{

		top: -14px;
		    font-size: 12px;
		    color: #2196F3;
	}
	.group-input_9:valid ~ .group-label_11{

		top: -14px;
		    font-size: 12px;
		    color: #2196F3;
	}
	.group-input_9:focus ~ .group-bar_10:before{

		width: 100%;
	}
		
</style>
<form method="post" enctype="multipart/form-data" class="form" >
	<div class="title-container" >
		<div class="title-inner" >
			<div class="title-icon-holder" >
				<i class="bi bi-person-plus-fill title-icon" >
				</i>
			</div>
			<div class="title-text-holder" >
				<div  class="title-heading" >
					Create New Account
				</div>
				<div  class="title-sub-heading" >
					Enter your details to make your new account
				</div>
			</div>
		</div>
	</div>
	<div class="control-group" >
		
		<input class="group-input" type="text" required="true"  name="name">
		
		<span class="group-highlight">
		</span>
		
		<span class="group-bar" >
		</span>
		
		<label  class="group-label" >
			Name
		</label>
	</div>
	<div class="control-group_8" >
		
		<input class="group-input_9" type="email" required="true"  name="email">
		
		<span class="group-highlight">
		</span>
		
		<span class="group-bar_10" >
		</span>
		
		<label  class="group-label_11" >
			Email
		</label>
	</div>
	<div class="control-group" >
		
		<input class="group-input" type="password" required="true"  name="password">
		
		<span class="group-highlight">
		</span>
		
		<span class="group-bar" >
		</span>
		
		<label  class="group-label" >
			Password
		</label>
	</div>
	<div class="control-group_8" >
		
		<input class="group-input_9" type="password" required="true"  name="retype-password">
		
		<span class="group-highlight">
		</span>
		
		<span class="group-bar_10" >
		</span>
		
		<label  class="group-label_11" >
			Retype password
		</label>
	</div>
	<span handle="true" class="checkbox-holder" >
		<input class="checkbox" type="checkbox" name="terms"  required="true">
		<span class="checkbox-label" >
			Accept the terms of service
		</span>
	</span>
	<div handle="true" class="button-container" >
		<button  class="button-cancel" type="button" >
			Cancel
		</button>
		<button  class="button" type="submit" >
			Save
		</button>
	</div>
</form>
