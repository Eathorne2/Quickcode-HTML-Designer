var open_dialog = 
{
	view: document.querySelector(".quickcode-open_dialog_files"),

	show: function ()
	{
		OPEN_DIALOG.classList.remove("quickcode-hide");
	},

	hide: function ()
	{
		OPEN_DIALOG.classList.add("quickcode-hide");
		open_dialog.view.innerHTML = "";
	},

	open_file: function (id)
	{

		let obj = {};
		obj.data_type 	= 'open';
		obj.id 			= id;
		obj.import_mode = IMPORT_MODE;
		IO.send_data(obj);

		open_dialog.hide();

	},

	delete_file: function (id)
	{

		if(!confirm("Are you sure you want to delete this page?!"))
			return;

		let obj = {};
		obj.data_type 	= 'delete';
		obj.id 			= id;
		IO.send_data(obj);

	},

	load_files: function ()
	{

		open_dialog.view.innerHTML = "<h2>Loading....</h2>";

		let obj = {};
		obj.data_type = 'open_dialog';
		IO.send_data(obj);

		open_dialog.show();

	},

	list: function(obj)
	{
		let pages = '';
		if(typeof obj.data == 'undefined')
		{
			pages += "<div>No saved files found!</div>";
		}else{

			for (var i = 0; i < obj.data.length; i++) {
				pages += `<div onclick="open_dialog.open_file(${obj.data[i].id})" style="border: solid thin #aaa;cursor:pointer;width:200px;margin:10px;display:inline-block"><div style="width:100%"><img src="${obj.data[i].image}" style="width:198px;height:180px;object-fit:cover"/></div><div style="display:flex;text-align:left;font-size:12px;"><div class="quickcode-file-card" >${obj.data[i].filename}<div><small>${obj.data[i].date}</small></div></div><div onclick="open_dialog.delete_file(${obj.data[i].id});event.stopPropagation()" class="quickcode-file-card-delete">x</div></div></div>`;
			}
		}
		
		open_dialog.view.innerHTML = pages;
	}
}
