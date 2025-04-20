<div id="SAVE_AS_LOADER" class="quickcode-hide">
	<div style="display:flex;">
		<div style="flex: 8;padding: 10px;" class="quickcode-save_as_loader_content">
			<div style="width: 40px;float: right;">
				<button onclick="document.querySelector('#SAVE_AS_LOADER').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#eee;cursor: pointer;">x</button>
			</div>
			<h2>Save page as...</h2>
			<input type="text" class="quickcode-form-control quickcode-filename" >
			<br>
			<button onclick="IO.save_file_info()" class="quickcode-btn quickcode-btn-primary">Save</button>
			<button  onclick="document.querySelector('#SAVE_AS_LOADER').classList.add('quickcode-hide')" class="quickcode-btn quickcode-btn-danger">Cancel</button>
		</div>
	</div>
</div>
<style>
	
#SAVE_AS_LOADER_PROGRESS{
	
	position: fixed;
	width: 400px;
	background-color: white;
	border: solid thin grey;
	box-shadow: 0px 10px 20px #aaa;
	left: 50%;
	top:50%;
	transform: translate(-50%, -50%);
	z-index: 9909;
	text-align: center;
	background-color: #ccc;
}

</style>
<div id="SAVE_AS_LOADER_PROGRESS" class="quickcode-hide quickcode-SAVE_AS_LOADER_PROGRESS">
	<div style="height:30px;background-color:blue;overflow:hidden;padding: 5px;">
		<span style="color: white;">0%</span>
	</div>
	<div style="padding:5px;background-color:white;">Saving...</div>
</div>
