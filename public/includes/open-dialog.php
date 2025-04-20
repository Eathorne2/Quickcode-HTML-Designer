<div id="OPEN_DIALOG" class="quickcode-hide">
	<div style="display:flex;">
		<div style="flex: 8;padding: 10px;background-color: #eee;">
			<div style="width: 40px;float: right;">
				<button onclick="document.querySelector('#OPEN_DIALOG').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#eee;cursor: pointer;">x</button>
			</div>
			<h2>Open recent projects</h2>
			
			<div style="background-color: white; padding:10px;max-height: 500px;overflow-y: auto;min-height: 400px;" class="quickcode-open_dialog_files"></div>
			<button  onclick="document.querySelector('#OPEN_DIALOG').classList.add('quickcode-hide')" class="quickcode-btn quickcode-btn-danger">Cancel</button>
		</div>
	</div>
</div>
