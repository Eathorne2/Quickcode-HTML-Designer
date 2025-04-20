<style type="text/css">
	
	.checkbox{
		margin: 5px;
		padding: 5px;
		appearance: none;
		-webkit-appearance: none;
		background-color: #c6c6c6;
		width:80px;
		height: 40px;
		outline: none;
		border-radius: 20px;
		box-shadow: inset 0px 0px 5px #00000044;
		position: relative;
		transition: all 0.5s ease;
		cursor: pointer;

	}
	.checkbox:checked{
		background-color: #03a9f4;
	}

	.checkbox:checked:before{
		left:40px;
	}

	.checkbox::before{
		content: '';
		position: absolute;
		width: 40px;
		height: 40px;
		background-color: #ffffff;
		border-radius: 50%;
		top:0px;
		left:0px;
		sacle: 1.1;
		box-shadow: 0px 2px 5px #00000088;
		transition: all 0.5s ease;

	}
	.check-group-label{
		display: inline-flex;
		justify-content: center;
		align-items: center;
		font-size: 16px;
	}
	.checkbox-holder{
		display: inline-flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
	}
 
</style>
<label handle="true" class="checkbox-holder">
	<span class="checkbox-label" editable="true">Option 1</span>
	<input class="checkbox" type="checkbox" name="">
	<span class="checkbox-label" editable="true">Option 2</span>
</label>