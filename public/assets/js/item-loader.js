var item_loader = 
{
	last_folder: null,
	view: document.querySelector(".quickcode-item_loader_items"),
	folders: document.querySelector(".quickcode-item_loader_folders"),
	pagination: document.querySelector(".quickcode-item_loader_pagination"),
	page_number: 1,
	limit: 11,

	set_page: function(page_number)
	{
		item_loader.page_number = page_number;

		item_loader.view.innerHTML = "<h2>Loading....</h2>";
		let obj = {};
		obj.data_type = 'load_items';
		obj.text = document.querySelector('.quickcode-item-search').value.trim();
		obj.page_number = item_loader.page_number;
		obj.limit = item_loader.limit;

		if(item_loader.last_folder)
			obj.folder = item_loader.last_folder;

		IO.send_data(obj);

	},

	load_items: function ()
	{
		item_loader.view.innerHTML = "<h2>Loading....</h2>";
		let obj = {};
		obj.data_type = 'load_items';
		obj.page_number = item_loader.page_number;
		obj.limit = item_loader.limit;

		if(item_loader.last_folder)
			obj.folder = item_loader.last_folder;

		item_loader.show();
		IO.send_data(obj);
	},

	list: function(obj)
	{
		let items = '';
		for (var i = 0; i < obj.data.length; i++) {
			items += `
			<div onclick="item_loader.add_item('${obj.data[i].filename}','${obj.data[i].folder}')" style="display:inline-block;width:130px;vertical-align:top;margin:10px;border:solid thin grey;background-color:#eee;cursor:pointer">
				<div style="padding:10px;text-transform: capitalize;font-size:13px;">${obj.data[i].name}</div>
				<img src="${obj.data[i].image}" style="width:100%;height:100px;object-fit:cover;border:none" />
			</div>
			`;
		}
		
		let folders = '';
		let selected = '';
		for (var i = 0; i < obj.folders.length; i++) {

			selected = '';
			if(obj.folders[i].name == obj.folder)
				selected = 'background-color: #d2fbff;';

			folders += `<div onclick="item_loader.change_folder('${obj.folders[i].name}')" style="${selected}position:relative;cursor:pointer;width:100%;height:50px;padding:10px;border-bottom:solid thin #499ae5;text-transform: capitalize;" >
				${obj.folders[i].label}
				<div class="quickcode-item_count_badge">${obj.folders[i].item_count}</div>
			</div>`;
		}

		//add pagination
		let start = item_loader.page_number - 3;
		if(start < 1)
			start = 1;

		let stop = Math.ceil(obj.total / item_loader.limit);
		let pagination = `
			<button onclick="item_loader.set_page(1)" class="${item_loader.page_number == 1 ? 'active':''}">First</button>
		`;

		for (var i = start; i <= stop; i++) {
			if(i == 1)
				continue;

			pagination += `
				<button onclick="item_loader.set_page(${i})" class="${item_loader.page_number == i ? 'active':''}">${i}</button>
			`;
		}

		item_loader.view.innerHTML = items;
		item_loader.folders.innerHTML = folders;
		item_loader.pagination.innerHTML = pagination;
		item_loader.show();

	},

	change_folder: function (folder,text = null)
	{
		item_loader.last_folder = folder;
		item_loader.view.innerHTML = "<h2>Loading....</h2>";
		let obj = {};
		obj.data_type = 'load_items';
		obj.folder = folder;
		obj.text = text;
		obj.page_number = 1;
		item_loader.page_number = 1;
		obj.limit = item_loader.limit;

		IO.send_data(obj);
	},

	auto_close: function(value)
	{
		AUTO_CLOSE_ITEM_LOADER = value;
	},

	show: function ()
	{
		ITEM_LOADER.classList.remove("quickcode-hide");
		document.querySelector('.quickcode-item-search').focus();
	},

	hide: function ()
	{
		ITEM_LOADER.classList.add("quickcode-hide");
		document.querySelector('.quickcode-item-search').value = '';
		item_loader.view.innerHTML = "";
	},

	add_item: function (item, folder = null)
	{
		let obj = {};
		obj.data_type = 'load_item';

		if(item_loader.last_folder)
			obj.folder = item_loader.last_folder;

		if(folder)
			obj.folder = folder;

		obj.item = item;
		IO.send_data(obj);

		if(AUTO_CLOSE_ITEM_LOADER)
			item_loader.hide();

	}
}
