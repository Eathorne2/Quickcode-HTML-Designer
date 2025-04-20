var image_loader = 
{
	input_to_update: null,
	last_folder: null,
	view: document.querySelector(".quickcode-image_loader_images"),
	folders: document.querySelector(".quickcode-image_loader_folders"),
	pagination: document.querySelector(".quickcode-image_loader_pagination"),
	page_number: 1,
	limit: 23,
	file_upload_count: 24,

	set_page: function(page_number)
	{
		image_loader.page_number = page_number;

		image_loader.view.innerHTML = "<h2>Loading....</h2>";
		let obj = {};
		obj.data_type = 'load_images';
		obj.page_number = image_loader.page_number;
		obj.limit = image_loader.limit;

		if(image_loader.last_folder)
			obj.folder = image_loader.last_folder;

		IO.send_data(obj);

	},

	list: function(obj)
	{
		
		let images = '';
		for (var i = 0; i < obj.data.length; i++) {

			if(image_loader.last_folder == 'custom')
				images += `<span style="position:relative;display:inline-block"><div onclick="image_loader.delete_image('${obj.data[i].path}')" style="cursor:pointer;background-color:red" class="quickcode-item_count_badge">X</div><img path="${obj.data[i].path}" onclick="image_loader.add_image(event)" src="${obj.data[i].thumbnail}" style="width:100px;height:85px;object-fit:cover; margin: 8px" /></span>`;
			else
				images += `<img path="${obj.data[i].path}" onclick="image_loader.add_image(event)" src="${obj.data[i].thumbnail}" style="width:100px;height:85px;object-fit:cover; margin: 8px" />`;
		}
		
		let folders = '';
		let selected = '';
		for (var i = 0; i < obj.folders.length; i++) {

			selected = '';
			if(obj.folders[i].name == obj.folder)
				selected = 'background-color: #fadbf8;';
			
			folders += 
			`<div onclick="image_loader.change_folder('${obj.folders[i].name}')" style="${selected}position:relative;cursor:pointer;width:100%;height:50px;padding:10px;border-bottom:solid thin #d838dd;text-transform: capitalize;" >
				${obj.folders[i].label}
				<div class="quickcode-item_count_badge">${obj.folders[i].image_count}</div>
			</div>`;
		}

		//add pagination
		let start = image_loader.page_number - 3;
		if(start < 1)
			start = 1;

		let stop = Math.ceil(obj.total / image_loader.limit);
		let pagination = `
			<button onclick="image_loader.set_page(1)" class="${image_loader.page_number == 1 ? 'active':''}">First</button>
		`;

		for (var i = start; i <= stop; i++) {
			if(i == 1)
				continue;

			pagination += `
				<button onclick="image_loader.set_page(${i})" class="${image_loader.page_number == i ? 'active':''}">${i}</button>
			`;
		}
 
		image_loader.view.innerHTML = images;

		if(obj.data.length == 0)
		{
			image_loader.view.innerHTML = `
			<center>
				<div style="height:100%;display:flex;align-items:center;flex-direction:column;justify-content:center;font-size:80px;opacity:0.3"><i class="bi bi-images"></i></div>
				<div>No images found!</div>
			</center>
			`;
		}
		
		image_loader.folders.innerHTML = folders;
		image_loader.pagination.innerHTML = pagination;
		image_loader.folders.style.flex = "1.5";
		image_loader.show();
	},

	load_images: function (e = null)
	{ 
		if(e)
			image_loader.input_to_update = selector.get_parent_from_class('quickcode-property-group',e.target).querySelector(".quickcode-data-source");
		else
			image_loader.input_to_update = document.querySelector('[property="src"]').querySelector(".quickcode-data-source");

		image_loader.view.innerHTML = "<h2>Loading....</h2>";
		image_loader.show();
		let obj = {};
		obj.data_type = 'load_images';
		obj.page_number = image_loader.page_number;
		obj.limit = image_loader.limit;

		if(image_loader.last_folder)
			obj.folder = image_loader.last_folder;

		IO.send_data(obj);
	},

	load_icons: function (e)
	{
		image_loader.input_to_update = selector.get_parent_from_class('quickcode-property-group',e.target).querySelector(".quickcode-data-source");

		image_loader.view.innerHTML = "<h2>Loading....</h2>";
		image_loader.show();
		let obj = {};
		obj.data_type = 'load_icons';
		obj.page_number = image_loader.page_number;
		obj.limit = image_loader.limit;

		IO.send_data(obj);
	},
	
	search_icons: function (search)
	{

		//image_loader.view.innerHTML = "<h2>Loading....</h2>";
		let obj = {};
		obj.search = search;
		obj.data_type = 'load_icons';

		IO.send_data(obj);
	},

	show_uploader: function()
	{
		document.querySelector('.quickcode-image_loader_uploader').classList.remove('quickcode-hide');
	},

	hide_uploader: function()
	{
		document.querySelector('.quickcode-image_loader_uploader').classList.add('quickcode-hide');
	},

	change_folder: function (folder)
	{
		image_loader.last_folder = folder;

		if(folder == 'custom')
			image_loader.show_uploader();
		else
			image_loader.hide_uploader();

		image_loader.view.innerHTML = "<h2>Loading....</h2>";
		let obj = {};
		obj.data_type = 'load_images';
		obj.folder = folder;
		obj.page_number = 1;
		image_loader.page_number = 1;
		obj.limit = image_loader.limit;
		IO.send_data(obj);
	},

	show: function ()
	{
		IMAGE_LOADER.classList.remove("quickcode-hide");
		let prog = document.querySelector('.quickcode-image_loader_progress');
		prog.classList.add('quickcode-hide');
		prog.children[0].innerHTML = '0%';
		prog.children[0].style.width = '0%';

		document.querySelector('.quickcode-file-upload-limit').innerHTML = 'Image upload is limited to '+image_loader.file_upload_count +' files. If exceeded, the oldest file will be deleted';
	},

	hide: function ()
	{
		IMAGE_LOADER.classList.add("quickcode-hide");
		image_loader.view.innerHTML = "";
	},

	delete_image: function(file)
	{
		if(!confirm("Are you sure you want to delete this file?"))
			return;

		let xhr = new XMLHttpRequest;

		xhr.addEventListener('readystatechange',function(e){

			if(xhr.readyState == 4)
			{
				if(xhr.status == 200)
				{
					let obj = JSON.parse(xhr.responseText);
					if(typeof obj == 'object')
					{
						if(obj.success)
							image_loader.set_page(image_loader.page_number);
						else
							alert(obj.message);
					}

				}else{
					alert("Failed to upload. Please check your internet connection");
				}
			}
		});

		let myform = new FormData;
		myform.append('data_type','delete_image');
		myform.append('file',file);

		xhr.open('POST','api.php',true);
		xhr.send(myform);
	},

	upload_file: function(file)
	{
		let allowed = ['image/jpeg','image/png','image/webp'];

		if(!allowed.includes(file.type))
		{
			alert("The only acceptable file types are: "+ allowed.toString().replaceAll('image/'));
			return;
		}

		let xhr = new XMLHttpRequest;

		xhr.addEventListener('readystatechange',function(e){

			if(xhr.readyState == 4)
			{
				if(xhr.status == 200)
				{
					let obj = JSON.parse(xhr.responseText);
					if(typeof obj == 'object')
					{
						if(obj.success)
							image_loader.set_page(1);
						else
							alert("Image could not be uploaded due to an error");
					}

				}else{
					alert("Failed to upload. Please check your internet connection");
				}
			}
		});

		xhr.upload.addEventListener('progress',function(e){

			let percent = Math.round((e.loaded / e.total) * 100);
			let prog = document.querySelector('.quickcode-image_loader_progress');
			prog.classList.remove('quickcode-hide');
			prog.children[0].innerHTML = percent + '%';
			prog.children[0].style.width = percent + '%';
		});
		
		let myform = new FormData;
		myform.append('data_type','upload_image');
		myform.append('file',file);

		xhr.open('POST','api.php',true);
		xhr.send(myform);
	},

	add_image: function (e)
	{
		if(!image_loader.input_to_update)
			return;

		//save undo
		actions.save_undo_data();

		image_loader.input_to_update.value = e.target.getAttribute('path');
		properties.load_images();
		image_loader.hide();
		actions.set_property(image_loader.input_to_update);

	},

	add_icon: function (e)
	{
		if(!image_loader.input_to_update)
			return;

		//save undo
		actions.save_undo_data();

		image_loader.input_to_update.value = 'bi bi-'+ e.target.getAttribute('icon');
		properties.load_images();
		properties.load_icons();
		image_loader.hide();
		actions.set_property(image_loader.input_to_update);

	},

	
}
