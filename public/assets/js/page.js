
const PAGE = {

	title: 'Home',
	name: 'index.html',
	description: '',
	keywords: '',

	index: 0,
	data: [],

	is_custom_position: false,

	set_mouse_down: function(e)
	{
		PAGE_LIST_DRAG = true;
		let prop = document.querySelector("#item_page_list");

		mouse.selected_element_bounds[0] = prop.getBoundingClientRect();
		
		mouse.set_mouse_down(e);
	},
	
	reset_position: function()
	{
		let prop = document.querySelector("#item_page_list");
		prop.style.right = "auto";
		prop.style.left = "0px";					
		prop.style.top = "40px";

		PAGE.is_custom_position = false;
	},

	drag: function()
	{

		if(!mouse.mouseDown && PAGE_LIST_DRAG)
			return;
		
		let prop = document.getElementById('item_page_list');

		/** add to values **/
		let left = mouse.selected_element_bounds[0].left;
		let top = mouse.selected_element_bounds[0].top;

		left = (left + mouse.mouseX) + "px";
		top = (top + mouse.mouseY) + 'px';

		prop.style.top = top;
		prop.style.left = left;
		
		PAGE.is_custom_position = true;
	},

	move_up: function()
	{

		if(PAGE.index == 0)
			return

		let temp = PAGE.data[PAGE.index];
		PAGE.data.splice(PAGE.index, 1);
		PAGE.data.splice(PAGE.index - 1, 0, temp);
		PAGE.index -= 1;
		PAGE.refresh_list();
	},

	move_down: function()
	{
		if(PAGE.index == (PAGE.data.length - 1))
			return;

		let temp = PAGE.data[PAGE.index];
		PAGE.data.splice(PAGE.index, 1);
		PAGE.data.splice(PAGE.index + 1, 0, temp);
		PAGE.index += 1;
		PAGE.refresh_list();

		PAGE.refresh_list();
	},
	
	show_new: function()
	{
		

	},

	save_new: function(text)
	{
		if(text.match(/[^a-zA-Z0-9_\- ]/gi)){
			alert("No special characters allowed in page names")
			return;
		}

		PAGE.data.push({
			title: 'Page '+(PAGE.data.length + 1),
			name: 'page'+(PAGE.data.length + 1) + '.html',
			description: '',
			keywords: '',
			html: "",
			image: "",
		});

		PAGE.refresh_list();
		PAGE.load_to_canvas(PAGE.data.length - 1);
		PAGE.show_list(true);
	},

	delete: function(id = null)
	{
		if(!confirm("Are you sure you want to delete this page"))
			return;

		if(PAGE.data.length < 2){
			alert("At least one page must remain");
			return;
		}

		let index = PAGE.index;
		if(id)
			index = id;

		PAGE.data.splice(index,1);
		PAGE.index = 0;
		PAGE.load_to_canvas(0);
		PAGE.refresh_list();
		selector.selected = [];
		selector.clear_selection();
		properties.hide();
	},

	save_properties: function(e)
	{
		e.preventDefault();

		let title = document.querySelector('#PAGE_PROPERTIES .quickcode-title').value.trim();
		let name = document.querySelector('#PAGE_PROPERTIES .quickcode-name').value.trim();
		let description = document.querySelector('#PAGE_PROPERTIES .quickcode-description').value.trim();
		let keywords = document.querySelector('#PAGE_PROPERTIES .quickcode-keywords').value.trim();
		
		let old_name = PAGE.data[PAGE.index].name;

		PAGE.data[PAGE.index].title = title;
		PAGE.data[PAGE.index].name = name;
		PAGE.data[PAGE.index].description = description;
		PAGE.data[PAGE.index].keywords = keywords;

		//update all links
		let reg = new RegExp('href="'+old_name,'g');
		for (var i = 0; i < PAGE.data.length; i++) {

			PAGE.data[i].html = PAGE.data[i].html.replaceAll(reg,'href="'+name);
		}

		let links = CANVAS.querySelectorAll('a');

		for (var i = 0; i < links.length; i++) {
			if(links[i].getAttribute('href').trim() == old_name.trim())
				links[i].setAttribute('href', name);
		}

		PAGE.update_data();

		alert('Page properties updated!');
		PAGE.show_properties(false);
		PAGE.refresh_list();

	},

	show_properties: function(value)
	{
		if(value){

			let div = document.querySelector('#PAGE_PROPERTIES');
			div.classList.remove('quickcode-hide');

			div.querySelector('.quickcode-title').value = PAGE.data[PAGE.index].title;
			div.querySelector('.quickcode-name').value = PAGE.data[PAGE.index].name;

			if(typeof PAGE.data[PAGE.index].description == 'string')
				div.querySelector('.quickcode-description').value = PAGE.data[PAGE.index].description;
			else
				div.querySelector('.quickcode-description').value = '';
			
			if(typeof PAGE.data[PAGE.index].keywords == 'string')
				div.querySelector('.quickcode-keywords').value = PAGE.data[PAGE.index].keywords;
			else
				div.querySelector('.quickcode-keywords').value = '';

		}
		else{
			document.querySelector('#PAGE_PROPERTIES').classList.add('quickcode-hide');
		}
	},

	show_list: function(value)
	{
		if(!value){
			document.querySelector("#item_page_list").classList.add("quickcode-hide");
			document.querySelector(".quickcode-js-allow_page_list").checked = false;
		}
		else{
			document.querySelector("#item_page_list").classList.remove("quickcode-hide");
			document.querySelector(".quickcode-js-allow_page_list").checked = true;
			PAGE.refresh_list();
		}
	},

	update_data: function()
	{
		if(typeof PAGE.data[PAGE.index] == 'undefined'){

			PAGE.data[PAGE.index] = {
				title: 'Home',
				name: 'index.html',
				html: "",
				image: "",
			};
		}

		PAGE.data[PAGE.index].html = CANVAS.innerHTML;

		htmlToImage.toJpeg(CANVAS, { quality: 0.5,backgroundColor:'#ffffff'})
		.then(function (dataUrl) {
			PAGE.data[PAGE.index].image = dataUrl;
			PAGE.refresh_list();
		})
		.catch(function (error) {
		    alert('oops, Failed to generate preview image: '+ error);
		});

		
	},

	load_to_canvas: function(index)
	{
		if(index != PAGE.index && typeof PAGE.data[index] != 'undefined')
		{
/*					if(!confirm("You're about to load a new page! Continue?"))
				return;
*/
			PAGE.show_properties(false);
			PAGE.update_data();

			PAGE.index = index;
			selector.selected = [];
			selector.clear_selection();
			CANVAS.innerHTML = PAGE.data[index].html;
			PAGE.refresh_list();
			properties.hide();

			actions.undo_index = 0;
			actions.undo_data = [];

			CHART.init(true);

		}
	},

	refresh_list: function()
	{
		let div = document.querySelector('#item_page_list .quickcode-page-list');
		div.innerHTML = "";
		let str = "";

		for (var i = 0; i < PAGE.data.length; i++) {
			let image = "img/no_image.jpg";
			if(PAGE.data[i].image != '')
				image = PAGE.data[i].image;

			str += `
					<div onclick="PAGE.load_to_canvas(${i})" class='${i == PAGE.index ? 'selected':''}' style="box-shadow: 0px 0px 30px #ccc">
					<img src="${image}" style="width: 100%;height:100px;object-fit:cover">
					<div style="display: flex;background-color: #ccc;padding: 5px;text-align: center;">
						<div style="flex: 1">${i+1}</div>
						<div style="display: flex;justify-content: space-between;flex: 4;text-align: left">
							<div>${PAGE.data[i].title}</div>
							<div onclick="PAGE.delete(${i})" style="color: white;padding: 2px 10px; background-color: red">x</div>
						</div>
					</div>
				</div>
			`;
		}

		div.innerHTML = str;
	},

};