<style type="text/css">

	.quickcode-item_loader_pagination button{
		padding: 5px 10px;
		border: solid 2px white;
		background-color: #888;
		color: white;
		margin: 5px;
		cursor: pointer;
	}
	.quickcode-item_loader_pagination .active{
		background-color: #00abff;
	}
	.quickcode-item_count_badge{
		position: absolute;
		right: 0px;
		top:0px;
		background-color: #499ae5;
		padding-left: 4px;
		padding-right: 4px;
		font-size: 11px;
		color: white;
		font-style: italic;
	}
</style>
<div id="ITEM_LOADER" class="quickcode-hide" onclick="this.classList.add('quickcode-hide')" style="user-select: none;">
	<div onclick="event.stopPropagation()" style="display:flex;max-height:550px;">
		<div style="overflow-y:auto;max-height:550px;height:100%;flex: 1.8;border-right: solid thin grey;background-color: #eee;" class="quickcode-item_loader_folders"></div>
		<div style="vertical-align:top;overflow-y:auto;flex: 8;padding: 10px;position: relative;">
			<div>
				<input oninput="item_loader.change_folder('search',this.value.trim())" type="text" placeholder="Search by item name" name="item-find" style="width:100%;" class="quickcode-item-search quickcode-form-control">
			</div>
			<div class="quickcode-item_loader_items"></div>
			<div style="flex-wrap:wrap;position: fixed;bottom: 0px;display: flex;justify-content: center;" class="quickcode-item_loader_pagination">

			</div>
		</div>
		<div style="width: 40px;">
			<button onclick="document.querySelector('#ITEM_LOADER').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#eee;cursor: pointer;">x</button>
		</div>
	</div>
</div>
