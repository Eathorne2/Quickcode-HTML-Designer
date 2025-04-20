<style type="text/css">

	.quickcode-image_loader_pagination button{
		padding: 5px 10px;
		border: solid 2px white;
		background-color: #888;
		color: white;
		margin: 5px;
		cursor: pointer;
	}
	.quickcode-image_loader_pagination .active{
		background-color: #00abff;
	}
	.quickcode-image_loader_uploader{

	}
	.quickcode-image_loader_progress{
		border: solid thin #ccc;
		color: white;
		font-size: 11px;
		border-radius: 20px;
	}
	.quickcode-image_loader_prog_bar{
		border-radius: 20px;
		background-color: blueviolet;
		height:15px;
	}

	.file-input{
		appearance: none;
		background-color: #DBDBDBFF;
		flex: 1;
		width: 100%;
		cursor: pointer;
		margin-top: 5px;
		margin-bottom: 5px;
		color: #666666;
	}
	.file-input::file-selector-button{
		appearance: none;
		padding: 10px;
		padding-left: 10px;
		padding-right: 10px;
		border: solid 1px #DBDBDBFF;
		background-color: #EEEEEE;
		color: #444444;
		font-weight: bold;
		height: 100%;
		box-shadow: 0px 0px 30px #000000AA;
		font-family: inherit;
		cursor: pointer;
	}
	.quickcode-image_count_badge{
		position: absolute;
		right: 0px;
		top:0px;
		background-color: #d838dd;
		padding-left: 4px;
		padding-right: 4px;
		font-size: 11px;
		color: white;
		font-style: italic;
	}

</style>
<div id="IMAGE_LOADER" class="quickcode-hide" onclick="document.querySelector('#IMAGE_LOADER').classList.add('quickcode-hide')">
	<div onclick="event.stopPropagation()" style="display:flex;max-height:550px;">
		<div style="overflow-y:auto;max-height:550px;height:100%;flex: 1.5;border-right: solid thin grey;background-color: #eee;" class="quickcode-image_loader_folders"></div>
		<div style="vertical-align:top;overflow-y:auto;flex: 8;padding: 10px;position: relative;">
			<div class="quickcode-image_loader_images" style="min-height: 420px"></div>
			<div style="posision: relative;bottom: 0px;">
				<div class="quickcode-image_loader_uploader quickcode-hide">
					<div style="font-size:12px"><i>Click below to upload an image(Max:10Mb)</i><br><span style="color: red" class="quickcode-file-upload-limit"></span></div>
					<div class="quickcode-image_loader_progress quickcode-hide">
						<div class="quickcode-image_loader_prog_bar" style="width:50%">50%</div>
					</div>
					<input type="file" onchange="image_loader.upload_file(this.files[0])" class="file-input" accept="image/png, image/webp, image/jpeg">
				</div>
				<div style="flex-wrap:wrap;display: flex;justify-content: center;" class="quickcode-image_loader_pagination">
					
				</div>
			</div>
		</div>
		<div style="width: 40px;">
			<button onclick="document.querySelector('#IMAGE_LOADER').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#eee;cursor: pointer;">x</button>
		</div>
	</div>
</div>

