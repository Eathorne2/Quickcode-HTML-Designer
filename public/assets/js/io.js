const IO = 
{

	preview_image: null,
	uploading: false,
	logged_in: false,
	username: 'User',
	user_row: {},

	new_page: function()
	{
		if(!confirm("Are you sure you want to close the existing project?!"))
			return;

		CANVAS.innerHTML 	= "";
		PAGE.data = [];
		PAGE.index = 0;

		FILE_NAME 			= null;
		document.querySelector(".quickcode-js-doc-title").innerHTML = "Untitled";
		FILE_ID 			= 0;
		ITEM_COUNT 			= 0;
		CLASS_COUNT 		= 0;

		actions.delete_orphaned_classes(true);

		MUTED_CLASSES 	= [];
		COPIED_CLASS 	= null;
		SELECTED_CLASS 	= null;
		SELECTED_SUDO_CLASS = null;
		SELECTED_COMBO_CLASS = null;
		CLONED_CLASSES 	= {};

		CANVAS_EMPTY = true;

		selector.selected = [];
		selector.clear_selection();

		PAGE.refresh_list();
		//window.location.href = window.location.href.split("?")[0];
	},

	show_login: function (){

		let login = document.querySelector('#LOGIN');
		login.classList.remove('quickcode-hide');
		login.querySelector(".quickcode-email").focus();

		let signup = document.querySelector('#SIGNUP');
		signup.classList.add('quickcode-hide');
		
		let profile = document.querySelector('#PROFILE');
		profile.classList.add('quickcode-hide');
		
	},

	show_signup: function (){

		let signup = document.querySelector('#SIGNUP');
		signup.classList.remove('quickcode-hide');
		signup.querySelector(".quickcode-username").focus();

		let login = document.querySelector('#LOGIN');
		login.classList.add('quickcode-hide');
		
		let profile = document.querySelector('#PROFILE');
		profile.classList.add('quickcode-hide');

		//clean the inputs
		let inputs = document.querySelector('#SIGNUP').querySelectorAll('input');
		for (var i = 0; i < inputs.length; i++) {
			inputs[i].value == '';
		}

		
	},

	show_profile: function (){

		if(!IO.logged_in){
			IO.show_login();
			return;
		}

		let profile = document.querySelector('#PROFILE');
		profile.classList.remove('quickcode-hide');
		profile.querySelector(".quickcode-username").value = IO.user_row.username;
		profile.querySelector(".quickcode-email").value = IO.user_row.email;

		profile.querySelector(".quickcode-username").focus();

		let login = document.querySelector('#LOGIN');
		login.classList.add('quickcode-hide');
		
		let signup = document.querySelector('#SIGNUP');
		signup.classList.add('quickcode-hide');
		
	},
	
	save_profile: function (e){

		e.preventDefault();
		e.stopPropagation();

		let profile = document.querySelector('#PROFILE');

		let id = IO.user_row.id;
		let username = profile.querySelector(".quickcode-username").value.trim();
		let email = profile.querySelector(".quickcode-email").value.trim();
		
		let password = profile.querySelector(".quickcode-password").value.trim();
		let retype_password = profile.querySelector(".quickcode-retype_password").value.trim();
			
			if(password != retype_password)
			{
				alert("Passwords do not match!")
			}else{

			//save to server
			let obj = {};
			obj.data_type = 'save_profile';
			obj.id = id;
			obj.username = username;
			obj.email = email;
			obj.password = password;

			IO.send_data(obj);
			}
		
	},
	
	login: function(e){

		e.preventDefault();
		let form = e.currentTarget;
		let email = form.querySelector(".quickcode-email").value.trim();
		let password = form.querySelector(".quickcode-password").value.trim();

		let obj = {
			email,
			password,
			'data_type': 'login',
		}

		IO.send_data(obj);
	},

	logout: function(){

			if(!confirm("Are you sure you want to logout?!"))
			return;

		let obj = {
			'data_type': 'logout',
		}

		IO.send_data(obj);
	},

	save: function()
	{
		if(!IO.logged_in){
			alert("Please login first to save!");
			IO.show_login();
			return;
		}

		if(CANVAS.innerHTML == ""){
			alert("Please add something to save first!");
			return;
		}

		if(!FILE_NAME){
			IO.save_as();
			return;
		}

		PAGE.update_data();

		//generate preview image then save
		IO.make_preview_image();
		PAGE.update_data();
		
	},

	make_preview_image: function()
	{
		
		let prog = document.querySelector(".quickcode-SAVE_AS_LOADER_PROGRESS");
		prog.children[0].style.width = "0%";
		prog.children[0].children[0].innerHTML = "0%";
		prog.classList.remove("quickcode-hide");

		htmlToImage.toJpeg(CANVAS, { quality: 0.5,backgroundColor:'#ffffff'})
	  .then(function (dataUrl) {
	    
	    let obj 		= {};
		obj.data_type 	= 'save';
		obj.id 			= FILE_ID;
		obj.filename 	= FILE_NAME;
		obj.html 		= PAGE.data;
/*		for(a in obj.html)
		{

			//obj.html[a].image 	= null;
		}
*/
		obj.html 		= JSON.stringify(obj.html);
		obj.js 			= "";

		let selected_ids = [];
		for (var i = 0; i < selector.selected.length; i++) {
			selected_ids.push(selector.selected[i].id);
		}
		obj.meta 		= JSON.stringify({
			ITEM_COUNT:DATA.ITEM_COUNT,
			SELECTED:selected_ids
		});

		obj.styles 		= {};
		for(key in responsive.data)
		{
			obj.styles[key] = {
				main_css: IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).innerHTML,
				sudo_css: IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).innerHTML,
				combo_css: IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].combo_css).innerHTML,
			}
		}

		obj.styles = JSON.stringify(obj.styles);

		obj.image = dataUrl;
		IO.send_data(obj, 'quickcode-SAVE_AS_LOADER_PROGRESS');

	  })
	  .catch(function (error) {
	    alert('oops, something went wrong! Error: '+ error);
		    let prog = document.querySelector(".quickcode-SAVE_AS_LOADER_PROGRESS");
			prog.children[0].style.width = "0%";
			prog.children[0].children[0].innerHTML = "0%";
			prog.classList.add("quickcode-hide");
	  });

	},

	collect_query_styles: function(view)
	{
		let obj = {};
		let container = document.querySelector("#QUERIES #queries-"+view);

		for (var i = 0; i < container.children.length; i++) {
			obj[container.children[i].id] = container.children[i].innerHTML;
		}
		
		return JSON.stringify(obj);
	},

	export_template: function()
	{
		responsive.monitor();
 
		let prog = document.querySelector(".quickcode-SAVE_AS_LOADER_PROGRESS");
		prog.children[0].style.width = "0%";
		prog.children[0].children[0].innerHTML = "0%";
		prog.classList.remove("quickcode-hide");

		htmlToImage.toJpeg(document.getElementById('CANVAS'), { quality: 0.3,backgroundColor:'#ffffff'})
	  .then(function (dataUrl) {
	    
	    let obj 		= {};
		obj.data_type 	= 'export';
		obj.id 			= FILE_ID;
		obj.filename 	= FILE_NAME;
		obj.html 		= CANVAS.innerHTML;
		obj.js 			= "";
		obj.meta 		= JSON.stringify({ITEM_COUNT,CLASS_COUNT});
		obj.styles 		= STYLES.innerHTML;
		obj.styles_mobile 		= IO.collect_query_styles('mobile');
		obj.styles_mobile_landscape 		= IO.collect_query_styles('mobile-landscape');
		obj.styles_tablet 		= IO.collect_query_styles('tablet');
		obj.styles_laptop 		= IO.collect_query_styles('laptop');
		obj.styles_monitor 		= IO.collect_query_styles('monitor');

		obj.image = dataUrl;
		IO.send_data(obj, 'quickcode-SAVE_AS_LOADER_PROGRESS');

	  })
	  .catch(function (error) {
	    alert('oops, something went wrong! Error: '+ error);
	  });

	},

	save_file_info: function()
	{

		let dialog = document.querySelector("#SAVE_AS_LOADER");
		let filename = dialog.querySelector(".quickcode-filename").value.trim();
		
		if(filename == ""){
			alert('Please add a valid page name');
			dialog.querySelector(".quickcode-filename").focus();
			return;
		}

		FILE_NAME = dialog.querySelector(".quickcode-filename").value.trim();
		document.querySelector(".quickcode-js-doc-title").innerHTML = FILE_NAME;
		FILE_ID = 0;

		dialog.classList.add('quickcode-hide');
		IO.save();
	},

	export: function(type = 'export')
	{
		//responsive.monitor();

		PAGE.update_data();

		htmlToImage.toJpeg(CANVAS, { quality: 0.3,backgroundColor:'#ffffff'})
		.then(function (dataUrl) 
		{

			let obj = {};
			obj.data_type = type;
			obj.filename = FILE_NAME;
			obj.id = FILE_ID;
			obj.html 	= JSON.stringify(PAGE.data);
			obj.preview_image = '';

			if(type == 'export_template')
				obj.preview_image = dataUrl;
			
			obj.scripts 	= [];

			let selected_ids = [];
			for (var i = 0; i < selector.selected.length; i++) {
				selected_ids.push(selector.selected[i].id);
			}
			obj.meta 		= JSON.stringify({
				ITEM_COUNT:DATA.ITEM_COUNT,
				SELECTED:selected_ids
			});

			let SCRIPTS = IFRAME.contentWindow.document.querySelector('.quickcode-SCRIPTS');
			for (var i = 0; i < SCRIPTS.children.length; i++) {
				obj.scripts.push(SCRIPTS.children[i].innerHTML);
			}

			obj.styles 	= {};

			for(key in responsive.data)
			{
				if(typeof obj.styles[key] == 'undefined')
					obj.styles[key] = [];

				let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css);
				if(class_holder)
				{
					for (var i = 0; i < class_holder.children.length; i++) {
						obj.styles[key].push(class_holder.children[i].innerHTML);
					}
				}
			}

			if(type == 'export_template')
			{
				obj.template_styles 		= {};
				for(key in responsive.data)
				{
					obj.template_styles[key] = {
						main_css: IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).innerHTML,
						sudo_css: IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).innerHTML,
						combo_css: IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].combo_css).innerHTML,
					}
				}

				obj.template_styles = JSON.stringify(obj.template_styles);

			}

			let class_holder = null;

			obj.sudo_styles 	= {};
			for(key in responsive.data)
			{
				if(typeof obj.sudo_styles[key] == 'undefined')
					obj.sudo_styles[key] = [];

				class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css);
				if(class_holder)
				{
					for (var i = 0; i < class_holder.children.length; i++) {
						obj.sudo_styles[key].push(class_holder.children[i].innerHTML);
					}
				}
			}

			obj.combo_styles 	= {};
			for(key in responsive.data)
			{
				if(typeof obj.combo_styles[key] == 'undefined')
					obj.combo_styles[key] = [];

				class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].combo_css);
				if(class_holder)
				{
					for (var i = 0; i < class_holder.children.length; i++) {
						obj.combo_styles[key].push(class_holder.children[i].innerHTML);
					}
				}
			}

			obj.animations 	= {};
			let animations_holder 	= IFRAME.contentWindow.document.querySelector('.'+responsive.animation_css);
			for (var i = 0; i < animations_holder.children.length; i++) {
				
				let id = animations_holder.children[i].id;
				let check = IFRAME.contentWindow.document.querySelector(`[animation-name="${id}"]`);
				if(check){
					obj.animations[id] = animations_holder.children[i].children[0].innerHTML;
				}
			}

			obj.scripts = JSON.stringify(obj.scripts);
			obj.styles = JSON.stringify(obj.styles);
			obj.sudo_styles = JSON.stringify(obj.sudo_styles);
			obj.combo_styles = JSON.stringify(obj.combo_styles);
			obj.animations = JSON.stringify(obj.animations);

			IO.send_data(obj);

		})
		.catch(function (error) {
			alert('oops, something went wrong! Error: '+ error);
		});
	},

	save_as: function()
	{

		if(CANVAS.innerHTML == ""){
			alert("Please add something to save first!");
			return;
		}

		let dialog = document.querySelector("#SAVE_AS_LOADER");
		dialog.classList.remove('quickcode-hide');
		dialog.querySelector(".quickcode-filename").value = FILE_NAME;
		dialog.querySelector(".quickcode-filename").focus();
	},

	signup: function(e)
	{
		e.preventDefault();

		//collect data
		let inputs = document.querySelector('#SIGNUP').querySelectorAll('input');
		let obj = {
			data_type: 'signup',

		};

		let password = '';
		let retype_password = '';
		for (var i = 0; i < inputs.length; i++) {
			if(inputs[i].value == '')
			{
				alert('Please fill in all fields');
				inputs[i].focus();
				inputs[i].select();
				return;
			}else{
				
				if(inputs[i].name == 'password')
					password = inputs[i].value;
				if(inputs[i].name == 'retype_password')
					retype_password = inputs[i].value;
				
				obj[inputs[i].name] = inputs[i].value;
			}
		}

		if(password != retype_password)
		{
			alert('Your passwords do no match');
			return;
		}

		IO.send_data(obj);
	},

	send_data: function(obj, prog_bar_class = null)
	{

		if(IO.uploading){
			alert("Please wait. Uploading is still in progress");
			return;
		}

		IO.show_loader();

		if(prog_bar_class){
			IO.prog_bar = document.querySelector("."+prog_bar_class);
			IO.prog_bar.classList.remove("quickcode-hide");
		}

		let myform = new FormData();
		for(key in obj)
			myform.append(key,obj[key]);

		let xhr = new XMLHttpRequest();

		xhr.addEventListener('error',function(e){
			alert("An error occured. Please check your connection!");
		});

		xhr.upload.addEventListener('progress',function(e){

			let percent = Math.round((e.loaded / e.total) * 100);
			if(typeof IO.prog_bar != 'undefined')
			{
				IO.prog_bar.children[0].style.width = percent + "%";
				IO.prog_bar.children[0].children[0].innerHTML = percent + "%";
			}
		});

		

		xhr.addEventListener('readystatechange',function(){

			if(xhr.readyState == 4)
			{
				if(xhr.status == 200)
				{
					IO.result(xhr.responseText);
				}else{
					console.log(xhr.responseText);
				}

				if(IO.prog_bar){
					IO.prog_bar.classList.add("hide");
					IO.prog_bar = null;
				}

				IO.uploading = false;
				IO.hide_loader();
			}
		});

		xhr.open('POST','api.php',true);
		xhr.send(myform);
	},

	result: function(result)
	{
console.log(result);
		let prog = document.querySelector(".quickcode-SAVE_AS_LOADER_PROGRESS");
		prog.children[0].style.width = "0%";
		prog.children[0].children[0].innerHTML = "0%";
		prog.classList.add("quickcode-hide");

		let obj = JSON.parse(result);
		if(typeof obj == 'object')
		{
			IO.logged_in = obj.logged_in;
			IO.username = obj.username;
			IO.user_row = obj.user_row;
			document.querySelector('.quickcode-js-doc-user').innerHTML = 'Hi, ' + obj.username;

			document.querySelector('.quickcode-auth-login-button').style.display = 'block';
			document.querySelector('.quickcode-auth-signup-button').style.display = 'block';
			document.querySelector('.quickcode-auth-logout-button').style.display = 'none';
			document.querySelector('.quickcode-export-template-button').style.display = 'none';

			if(obj.logged_in)
			{
				document.querySelector('.quickcode-auth-login-button').style.display = 'none';
				document.querySelector('.quickcode-auth-signup-button').style.display = 'none';
				document.querySelector('.quickcode-auth-logout-button').style.display = 'block';

				if(obj.user_row.id == 1)
					document.querySelector('.quickcode-export-template-button').style.display = 'block';
			}

			if(obj.success)
			{
				if(obj.data_type == 'signup')
				{
					let signup = document.querySelector('#SIGNUP');
					signup.classList.add('quickcode-hide');
					alert(obj.message);
					IO.show_login();

				}if(obj.data_type == 'login')
				{
					let signup = document.querySelector('#LOGIN');
					signup.classList.add('quickcode-hide');
					
					alert(obj.message);
					
				}if(obj.data_type == 'save_profile')
				{
					let profile = document.querySelector('#PROFILE');
					
					if(obj.saved)
						profile.classList.add('quickcode-hide');
					
					alert(obj.message);
					
				}if(obj.data_type == 'logout')
				{

					alert(obj.message);
					window.location.reload();
					
				}else
				if(obj.data_type == 'load_item')
				{
					IO.load_item(obj);

				}else 
				if(obj.data_type == 'load_images')
				{
					image_loader.list(obj);

				}else 
				if(obj.data_type == 'load_icons')
				{
					let images = '';
					let text = '';
					if(typeof obj.data == 'object')
					{
						for (var i = 0; i < obj.data.length; i++) {
							images += `<i icon="${obj.data[i].icon}" class="bi bi-${obj.data[i].icon}" onclick="image_loader.add_icon(event)" style="font-size:30px;margin: 10px;cursor:pointer" ></i>`;
						}
					}

					if(typeof obj.search == 'object')
					{
						text = obj.search;
					}
					
					let search = `<div><input class="quickcode-form-control" value="${text}" placeholder="Type to find icons (icons by bootstrap)" oninput="image_loader.search_icons(this.value)" style="padding:10px;margin:10px"></div>`;
					let icons_holder = document.querySelector(".quickcode-js-icons-load");

					if(icons_holder)
					{
						icons_holder.innerHTML = images;
					}else{
						image_loader.view.innerHTML = search + "<div class='quickcode-js-icons-load'>" + images + "</div>";
					}
					
					image_loader.folders.innerHTML = "";
					image_loader.folders.style.flex = "0";
					image_loader.show();

				}else 
				if(obj.data_type == 'preview')
				{
					alert("Preview will open in a new tab");
					window.open(obj.data + PAGE.data[PAGE.index].name+"?"+Math.random(),"_blank");

				}else 
				if(obj.data_type == 'load_items')
				{
					item_loader.list(obj);

				}else 
				if(obj.data_type == 'export' || obj.data_type == 'export_template')
				{

					alert("Export complete. File download will start");
					window.open("zip_download.php?file="+obj.zip_file,"_blank");

				}else 
				if(obj.data_type == 'save')
				{

					FILE_ID 		= obj.id;
					alert("Save complete");

				}else 
				if(obj.data_type == 'delete')
				{

					open_dialog.load_files();

				}else 
				if(obj.data_type == 'open')
				{

					if(typeof obj.html == "undefined")
					{
						alert("That file was not found!");
					}else{

						CANVAS_EMPTY = false;
						
						if(IMPORT_MODE)
						{

							IO.load_item(obj);
							IMPORT_MODE = false;
						}else{

							FILE_NAME 		= obj.filename;
							document.querySelector(".quickcode-js-doc-title").innerHTML = FILE_NAME;
							FILE_ID 		= obj.id;

							if(obj.meta != "")
							{

								let meta = JSON.parse(obj.meta);

								if(typeof meta.ITEM_COUNT != 'undefined')
									DATA.ITEM_COUNT 		= meta.ITEM_COUNT;

							}

							PAGE.data = JSON.parse(obj.html);
							PAGE.index = 0;
							PAGE.refresh_list();

							CANVAS.innerHTML = PAGE.data[0].html;
							selector.selected = [];
							selector.clear_selection();
							
							actions.undo_index = 0;
							actions.undo_data = [];

							//delete old styles
							for(key in responsive.data)
							{
								IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).innerHTML = "";
								IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).innerHTML = "";
								IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].combo_css).innerHTML = "";
							}

							let styles_obj = JSON.parse(obj.styles);
							if(typeof styles_obj == 'object')
							{

								for(key in styles_obj)
								{
									IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).innerHTML = styles_obj[key].main_css;
									IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).innerHTML = styles_obj[key].sudo_css;
									IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].combo_css).innerHTML = styles_obj[key].combo_css || '';
								}
							}


						}
						actions.init_js();
						responsive.monitor();
					}

				}else 
				if(obj.data_type == 'open_dialog')
				{

					open_dialog.list(obj);

				}

			}else{
				alert(obj.message || 'An error occured on the server');
			}

		}
	},

	loop: function(parent,funcs = [])
	{

		for (var i = funcs.length - 1; i >= 0; i--)
			parent = IO[funcs[i].name](parent,funcs[i].args);

		if(parent.children.length > 0){
			for (var i = 0; i < parent.children.length; i++)
				IO.loop(parent.children[i],funcs);
		}
	},

	collect_classes: function(ele)
	{
		if(ele.tagName.toLowerCase() == 'style')
		{
			let mode = ele.id || 'monitor';

			let text = ele.innerHTML;

			let arr = text.match(/\.[a-z0-9_\-:\~\>\+\(\)\. ]+\s*\{[^\}]*/gi);
			
			if(arr)
			{
				for (var i = 0; i < arr.length; i++) {
					let class_name = arr[i].match(/\.[a-z0-9_\-:\\~\>\+(\)\. ]+/gi);
					class_name = class_name[0].substr(1).trim();
					class_name = class_name.replaceAll(/\s{2,}/g,' ');
					if(!class_name.match(/~|>|\+/)){
						class_name = class_name.replace(' ','--space--');
					}

					let class_content = arr[i].replace(/\.[a-z0-9_\-:\~\(\)\.\~\>\+ ]+\s*\{/gi,'');

					let exists = false;
					if(!class_name.includes(':')){

						let test = CANVAS.querySelector('.'+class_name);
						if(test)
							exists = true;
					}

					if(typeof DATA.CURRENT_STYLES[mode] == 'undefined')
						DATA.CURRENT_STYLES[mode] = {};

					DATA.CURRENT_STYLES[mode][class_name] = {styles:class_content.trim(),new_name:'',exists:exists,mode:mode};
				}
			}
		}

		return ele;
	},
	
	fix_active_class: function(ele)
	{

		let myclass = ele.getAttribute('active-class');
		if(myclass)
		{
 
			for(mode in DATA.CURRENT_STYLES)
			{
				if(typeof DATA.CURRENT_STYLES[mode][myclass] == 'object')
				{

					ele.setAttribute('active-class',DATA.CURRENT_STYLES[mode][myclass].new_name);
					break;
				}

			}
			
		}

		return ele;
	},

	add_new_class: function(ele)
	{

		let classes = JSON.parse(JSON.stringify(ele.classList));

		let added = [];
		let item_data = {};

		for (key in classes) {
			
			let myclass = classes[key];
			for(mode in DATA.CURRENT_STYLES)
			{
				if(typeof DATA.CURRENT_STYLES[mode][myclass] == 'object')
				{
					added.push(myclass);
					ele.classList.remove(myclass);
					ele.classList.add(DATA.CURRENT_STYLES[mode][myclass].new_name);
					if(ele.id == '')
						ele.id = 'item_'+DATA.ITEM_COUNT;

					DATA.ITEMS[ele.id] = item_data;
					DATA.ITEM_COUNT++;

					break;
				}

			}

		}

		return ele;
	},

	make_new_class: function(ele)
	{

		let omit = ['style','script'];
		if(!omit.includes(ele.tagName.toLowerCase()) && !ele.classList.contains('TEMP-CANVAS'))
		{

			for(mode in DATA.CURRENT_STYLES)
			{
				for(key in DATA.CURRENT_STYLES[mode])
				{
					if(ele.classList.contains(key))
					{
						if(DATA.CURRENT_STYLES[mode][key].new_name == ''){
							
							DATA.CURRENT_STYLES[mode][key].new_name = key;

							//check if class exists
							let new_class_names = Object.values(DATA.CURRENT_STYLES_NAMES);
							let mykey = key;
							while(new_class_names.includes(mykey))
							{
								DATA.ITEM_COUNT++;
								mykey = key + '_'+DATA.ITEM_COUNT;
								DATA.CURRENT_STYLES[mode][key].new_name = mykey;
							}

							let check_exists = CANVAS.querySelector('.'+mykey);
							while(check_exists)
							{
								DATA.ITEM_COUNT++;
								mykey = key + '_'+DATA.ITEM_COUNT;
								check_exists = CANVAS.querySelector('.'+ mykey);
								DATA.CURRENT_STYLES[mode][key].new_name = mykey;
							}

							let check_exists_css; //check if actual styles exist
							for(mode2 in responsive.data)
							{
							 	check_exists_css = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode2].main_css + ' #'+mykey);
						 		while(check_exists_css)
								{
									DATA.ITEM_COUNT++;
									mykey = key + '_'+DATA.ITEM_COUNT;
									check_exists_css = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode2].main_css + ' #'+mykey);
									DATA.CURRENT_STYLES[mode][key].new_name = mykey;
								}
							}

							if(DATA.CURRENT_STYLES[mode][key].exists){

								if(typeof DATA.CURRENT_STYLES_NAMES[key] == 'string'){
									DATA.CURRENT_STYLES[mode][key].new_name = DATA.CURRENT_STYLES_NAMES[key];
								}else{

									DATA.CURRENT_STYLES[mode][key].new_name = mykey;
									DATA.CURRENT_STYLES_NAMES[key] = mykey;
								}
							}

						}

					}
				}

			}
		}
		
		return ele;
	},
 
	insert_script_tags: function()
	{

		let SCRIPTS = IFRAME.contentWindow.document.querySelector('.quickcode-SCRIPTS');
		let TEMP = IFRAME.contentWindow.document.querySelector('.quickcode-TEMP-CANVAS');
		let script;
		for (var i = 0; i < TEMP.children.length; i++) {
			
			if(TEMP.children[i].tagName.toLowerCase() == 'script')
			{
				
				script = document.createElement('script');
				//script.setAttribute('name',DATA.CURRENT_STYLES[mode][key].new_name);
				script.innerHTML = TEMP.children[i].innerHTML;
				SCRIPTS.appendChild(script);
			}
		}
	},

	insert_style_tags: function()
	{

		let div, styles, styles_hover;
		let hover_name = '';
		let SCRIPT_TAGS = IFRAME.contentWindow.document.querySelector('.quickcode-TEMP-CANVAS').querySelectorAll('script');

		for (mode in DATA.CURRENT_STYLES)
		{
			for (key in DATA.CURRENT_STYLES[mode])
			{
				if(key.includes(':'))
				{
					hover_name = key.split(':');
					hover_name = hover_name[0];

					if(typeof DATA.CURRENT_STYLES[mode][hover_name] == 'object')
					{
						let new_name = DATA.CURRENT_STYLES[mode][hover_name].new_name || '';
						if(new_name == ''){
							for(mymode in DATA.CURRENT_STYLES){
								if(typeof DATA.CURRENT_STYLES[mymode][hover_name] == 'object'){
										
									new_name = DATA.CURRENT_STYLES[mymode][hover_name].new_name;
									if(new_name != '')
										break;
								}
							}
						}

						if(key.includes('.'))
						{
							//combo
							let combiner = key.match(/(\+|>|~|--space--)/gi).shift();
	 
							let affected_class = key.match(/\.[a-z0-9_\-]+/gi).shift().replace('.','');

							DATA.CURRENT_STYLES[mode][key].combiner = combiner;
							DATA.CURRENT_STYLES[mode][key].affected_class = affected_class;

							DATA.CURRENT_STYLES[mode][key].combo_id = new_name;
							DATA.CURRENT_STYLES[mode][key].new_name = key.replace(hover_name,new_name);

							if(typeof DATA.CURRENT_STYLES[mode][affected_class] == 'object')
							{
								let new_affected_class = DATA.CURRENT_STYLES[mode][affected_class].new_name || '';
								if(new_affected_class == ''){
									for(mymode in DATA.CURRENT_STYLES){
										new_affected_class = DATA.CURRENT_STYLES[mymode][affected_class].new_name;
										if(new_affected_class != '')
											break;
									}
								}

								DATA.CURRENT_STYLES[mode][key].affected_class = new_affected_class;

								DATA.CURRENT_STYLES[mode][key].combo_id = new_name;
								DATA.CURRENT_STYLES[mode][key].new_name = DATA.CURRENT_STYLES[mode][key].new_name.replace(affected_class,new_affected_class);
							}

						}else{	
							//sudo
							DATA.CURRENT_STYLES[mode][key].sudo_id = new_name;
							DATA.CURRENT_STYLES[mode][key].new_name = key.replace(hover_name,new_name);
						}
					}else{

						DATA.CURRENT_STYLES[mode][key].new_name = key;
						DATA.CURRENT_STYLES[mode][key].sudo_id = hover_name;
						if(key.includes('.'))
						{
							DATA.CURRENT_STYLES[mode][key].new_name = key;
							DATA.CURRENT_STYLES[mode][key].combo_id = hover_name;
						}

					}

				}

				if(DATA.CURRENT_STYLES[mode][key].new_name == '')
				{

					for(mymode in DATA.CURRENT_STYLES){
						let new_name = '';

						if(typeof DATA.CURRENT_STYLES[mymode][key] == 'object')
							new_name = DATA.CURRENT_STYLES[mymode][key].new_name;

						if(new_name != ''){
							DATA.CURRENT_STYLES[mode][key].new_name = new_name;
							break;
						}
					}
					
				}

				if(DATA.CURRENT_STYLES[mode][key].new_name == '')
					continue;

				div = document.createElement('div');
				div.setAttribute('name',DATA.CURRENT_STYLES[mode][key].new_name);
				div.innerHTML = `
				<style>.${DATA.CURRENT_STYLES[mode][key].new_name.replace('--space--',' ')}{${DATA.CURRENT_STYLES[mode][key].styles}}</style>
				`;

				styles = IFRAME.contentWindow.document.querySelector('.'+responsive.data[DATA.CURRENT_STYLES[mode][key].mode].main_css);
				styles_sudo = IFRAME.contentWindow.document.querySelector('.'+responsive.data[DATA.CURRENT_STYLES[mode][key].mode].sudo_css);
				styles_combo = IFRAME.contentWindow.document.querySelector('.'+responsive.data[DATA.CURRENT_STYLES[mode][key].mode].combo_css);

				if(key.includes(':') && key.includes('.')){
					div.setAttribute('combiner',DATA.CURRENT_STYLES[mode][key].combiner);
					div.setAttribute('affected_class',DATA.CURRENT_STYLES[mode][key].affected_class);
					div.id = DATA.CURRENT_STYLES[mode][key].combo_id;
					styles_combo.appendChild(div);
				}else
				if(key.includes(':')){
					div.id = DATA.CURRENT_STYLES[mode][key].sudo_id;
					styles_sudo.appendChild(div);
				}else{
					div.id = DATA.CURRENT_STYLES[mode][key].new_name;
					styles.appendChild(div);
				}

				//replace any classes from script tags
				let reg;
				for (var i = 0; i < SCRIPT_TAGS.length; i++) {

					reg = new RegExp(`'\\.${key}'`,'g');
					SCRIPT_TAGS[i].innerHTML = SCRIPT_TAGS[i].innerHTML.replaceAll(reg, "'."+DATA.CURRENT_STYLES[mode][key].new_name+"'");
					
					reg = new RegExp(`'${key}'`,'g');
					SCRIPT_TAGS[i].innerHTML = SCRIPT_TAGS[i].innerHTML.replaceAll(reg, "'"+DATA.CURRENT_STYLES[mode][key].new_name+"'");
					
					reg = new RegExp(`\\s${key}\\.`,'g');
					SCRIPT_TAGS[i].innerHTML = SCRIPT_TAGS[i].innerHTML.replaceAll(reg, ' '+DATA.CURRENT_STYLES[mode][key].new_name+'.');
					
					reg = new RegExp(`\\s${key}\\[`,'g');
					SCRIPT_TAGS[i].innerHTML = SCRIPT_TAGS[i].innerHTML.replaceAll(reg, ' '+DATA.CURRENT_STYLES[mode][key].new_name+'[');
					
					reg = new RegExp(`\\s+${key}\\s+=`,'g');
					SCRIPT_TAGS[i].innerHTML = SCRIPT_TAGS[i].innerHTML.replaceAll(reg, ' '+DATA.CURRENT_STYLES[mode][key].new_name+' =');
					
				}


			}
		}

	},

	edit_tab_ids: function(text)
	{
		//give tabs unique references\
		let roles, ids;
		if(roles = text.match(/activates=\"[a-z0-9\-\_]+\"/gi))
		{
			for (var i = 0; i < roles.length; i++) {

				let new_role_text = roles[i].replace(/\"$/,'_'+DATA.ITEM_COUNT+'"');
				let reg = new RegExp(`${roles[i]}`,'gi');

				text = text.replaceAll(reg,new_role_text);
				let id = 'id="'+ roles[i].replace('activates="','');
				
				reg = new RegExp(`${id}`,'gi');
				text = text.replaceAll(reg,id.replace(/\"$/,'_'+DATA.ITEM_COUNT+'"'));
			}

		}

		return text;
	},

	load_item: function(obj)
	{
		actions.save_undo_data();
		
		DATA.CURRENT_STYLES = {};
		DATA.CURRENT_STYLES_NAMES = {};

		let temp_div = IFRAME.contentWindow.document.querySelector('.quickcode-TEMP-CANVAS');
		obj.data = IO.edit_tab_ids(obj.data);

		temp_div.innerHTML = obj.data;

		let funcs = [
			{
				name:'collect_classes',
				args:'',
			},
			{
				name:'make_new_class',
				args:'',
			},
			
			
		];
		IO.loop(temp_div,funcs);

		IO.insert_style_tags();
		IO.insert_script_tags();

		funcs = [

			{
				name:'add_new_class',
				args:'',
			},
			{
				name:'fix_active_class',
				args:'',
			},
		];
		
		CANVAS_EMPTY = false;
		IO.loop(temp_div,funcs);

		IO.remove_style_tags();
		IO.remove_script_tags();
		IO.temp_to_canvas();

		responsive[responsive.mode]();
		PAGE.update_data();
		actions.init_js();
		
		//check image load progress
		LOADING_IMAGES = [];
		let imgs = CANVAS.querySelectorAll('img');
		for (var i = 0; i < imgs.length; i++) {
			if(!imgs[i].complete){

				let loader = document.createElement('div');
				loader.id = 'loader';
				loader.style = 'margin-right:-100px;margin-bottom:-40px;position:relative;display:inline-block;pointer-events:none;background-color:black;color:white;padding: 2px;font-size:11px;font-style:italic';
				loader.innerHTML = 'loading image...';
				imgs[i].parentNode.insertBefore(loader,imgs[i]);

				selector.refresh_selector_box();

				LOADING_IMAGES.push(imgs[i]);
				imgs[i].addEventListener('load',function(e){

					for (var x = 0; x < LOADING_IMAGES.length; x++) {
						if(LOADING_IMAGES[x].id == e.target.id){
							LOADING_IMAGES.splice(x,1);
							e.target.parentNode.querySelector('#loader').remove();
							selector.refresh_selector_box();
						}
					}

				});
				imgs[i].addEventListener('error',function(e){

					for (var x = 0; x < LOADING_IMAGES.length; x++) {
						if(LOADING_IMAGES[x].id == e.target.id){
							LOADING_IMAGES.splice(x,1);
							e.target.parentNode.querySelector('#loader').remove();
							selector.refresh_selector_box();
						}
					}

				});
				
			}
		}

	},

	remove_style_tags: function()
	{
		let tags = IFRAME.contentWindow.document.querySelector('.quickcode-TEMP-CANVAS').querySelectorAll('style');
		for (var i = 0; i < tags.length; i++) {
			tags[i].parentNode.removeChild(tags[i]);
		}
	},

	remove_script_tags: function()
	{
		let tags = IFRAME.contentWindow.document.querySelector('.quickcode-TEMP-CANVAS').querySelectorAll('script');
		for (var i = 0; i < tags.length; i++) {
			tags[i].parentNode.removeChild(tags[i]);
		}
	},
	
	temp_to_canvas: function()
	{
		let temp = IFRAME.contentWindow.document.querySelector('.quickcode-TEMP-CANVAS');

		if(temp.children.length > 0){

			let elements = [];
			for (var i = 0; i < temp.children.length; i++) {
				if(temp.children[i].tagName != 'STYLE' && temp.children[i].tagName != 'SCRIPT')
					elements.push(temp.children[i]);
				
			}
			
			if(selector.selected.length == 0){

				for (var i = 0; i < elements.length; i++) {
					CANVAS.appendChild(elements[i]);
				}
				
			}else{
				for (var i = 0; i < elements.length; i++) {
					selector.selected[0].appendChild(elements[i]);
				}

			}
		}
		
		temp.innerHTML = '';
	},

	show_loader: function()
	{
		document.querySelector('#LOADER').classList.remove('quickcode-hide');
	},

	hide_loader: function()
	{
		document.querySelector('#LOADER').classList.add('quickcode-hide');
	}


};
