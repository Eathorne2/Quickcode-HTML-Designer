<style>
#PAGE_PROPERTIES{
	
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
	
}
</style>

<div id="PAGE_PROPERTIES" class="quickcode-hide" onselectstart="return false">
	<form onsubmit="PAGE.save_properties(event)" style="display:flex;">
		<div style="flex: 8;padding: 10px;" class="">
			<div style="width: 40px;float: right;">
				<button type="button" onclick="document.querySelector('#PAGE_PROPERTIES').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#ff3535;cursor: pointer;color: white;">x</button>
			</div>
			<br>
			<h2 style="margin-top:0px">Page Properties</h2>
			<input style="padding-top:1em;padding-bottom:1em;" type="text" class="quickcode-form-control quickcode-title" placeholder="Page Title" name="title">
			<br>
			<input style="padding-top:1em;padding-bottom:1em;" type="text" class="quickcode-form-control quickcode-name" placeholder="Page name (file name)" name="name">
			<br>
			
			<textarea name="description" class="quickcode-form-control quickcode-description" style="padding-top:1em;padding-bottom:1em;" placeholder="Page description(SEO)"></textarea>
			<br>
			<textarea name="keywords" class="quickcode-form-control quickcode-keywords" style="padding-top:1em;padding-bottom:1em;" placeholder="Keywords(SEO)"></textarea>
			<br>
			<div style="display: flex;justify-content: space-between;">
				<button type="button" onclick="PAGE.show_properties(false)" style="padding:.4em 3em;font-size: 16px;background-color: #666;" class="quickcode-btn quickcode-btn-primary">Cancel</button>
				<button style="padding:.4em 3em;font-size: 18px;" class="quickcode-btn quickcode-btn-primary">Save</button>
			</div>
		</div>
	</form>
</div>

