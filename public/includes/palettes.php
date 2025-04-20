<style>
#COLOR_PALETTE{
	
	position: fixed;
	width: 400px;
	background-color: white;
	border: solid thin grey;
	box-shadow: 0px 10px 20px #aaa;
	left: 50%;
	top:50%;
	transform: translate(-50%, -50%);
	z-index: 9909;
	text-align: left;
	
}

.quickcode-single-holder{

}

.quickcode-single-palette{
	display: flex;
	flex-direction: column;
	font-style: italic;
	margin-bottom: 20px;
}
.COLOR_PALETTE-add-new{
	position: absolute;
	top: 50%;
	left: 50%;
	translate: -50% -50%;
	width: 95%;
	box-shadow: 0px 0px 30px #00000055;
	background-color: white;
	padding: 10px;
}
.COLOR_PALETTE-close{
	border: none;
	background-color: red;
	color: white;
	padding: 8px 20px;
	border-radius: 5px;
}
.COLOR_PALETTE-save{
	border: none;
	background-color: green;
	color: white;
	padding: 8px 20px;
	border-radius: 5px;
}

</style>

<div id="COLOR_PALETTE" class="quickcode-hide" onselectstart="return false">
	<form onsubmit="return false" style="display:flex;">
		<div style="flex: 8;padding: 10px;" class="">
			<div style="width: 40px;float: right;">
				<button type="button" onclick="document.querySelector('#COLOR_PALETTE').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#ff3535;cursor: pointer;color: white;">x</button>
			</div>
			<br>
			<h2 style="margin-top:0px">Color Palette</h2>
			<div style="display: flex;justify-content:flex-end">
				<button style="background-color:#005080;padding: 4px 10px;cursor: pointer;" type="button" onclick="PALETTE.show_new()" class="COLOR_PALETTE-save">+New Palette</button>
			</div>
			<div class="quickcode-palette-holder" style="overflow-y: auto; max-height: 400px;">
				
			</div>
			<br>
			<div style="display: flex;justify-content: space-between;">
				<button type="button" onclick="document.querySelector('#COLOR_PALETTE').classList.add('quickcode-hide')" style="padding:.4em 3em;font-size: 16px;background-color: #666;" class="quickcode-btn quickcode-btn-primary">Cancel</button>
				<button onclick="PALETTE.set(event)" style="padding:.4em 3em;font-size: 18px;" class="quickcode-btn quickcode-btn-primary">Save</button>
			</div>
		</div>
	</form>

	<div class="COLOR_PALETTE-add-new quickcode-hide">
		<div style="display: flex;justify-content:flex-end">
			<button onclick="this.parentNode.parentNode.classList.add('quickcode-hide')" class="COLOR_PALETTE-close">X</button>
		</div>
		<div style="margin-bottom: 10px;">
			<div>Palette Name:</div>
			<input type="text" class="quickcode-form-control" name="name" placeholder="Enter your palette name">
		</div>
		<div style="margin-bottom: 10px;">
			<div>HEX Palette Colors:<small><i>(separated by space)</i></small></div>
			<textarea type="text" class="quickcode-form-control" name="colors" placeholder="e.g #ffffff,#eeeeee,#ef4523"></textarea>
		</div>
		<div style="display: flex;justify-content:flex-end">
			<button onclick="PALETTE.save_new()" class="COLOR_PALETTE-save">Save</button>
		</div>
	</div>

</div>

