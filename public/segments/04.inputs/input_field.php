<style> 
	.input-container{
		display: flex;margin-top:4px;margin-bottom: 4px;padding: 4px;align-items: center;background-color: #F7F7F7FF;
	}
	.text-input{
		display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .375rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}
	.text-label{
		min-width:50px;margin: .5rem;margin-left:0px;display: inline-block;
	}
</style>
<div handle="true" class="input-container">
	<label editable="true" class="text-label">Label:</label>
	<input placeholder="Username" type="text" name="username" class="text-input">
</div>
