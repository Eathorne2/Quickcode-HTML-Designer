var selector = 
{
	selected: [],

	clear_selection: function ()
	{
		IFRAME.contentWindow.document.getElementById("SELECTORS").innerHTML = "";
		selector.selected = [];
		properties.hide();
		//tree.hide();

		selector.show_sub_menu_dropdown(false, false);

	},

	show_sub_menu_dropdown: function (e, show = true)
	{
		let sub_menu = document.querySelector('.quickcode-js-sub_menu');

		if(show == true)
	    {
	    	sub_menu.style.left = e.clientX+"px";

	    	sub_menu.style.top = (e.clientY)+"px";
	      sub_menu.classList.remove("quickcode-hide");
	    }else{
	      sub_menu.classList.add("quickcode-hide");
	    }
	},

	isChildOf: function (parent_id, element)
	{

	    while(typeof element != 'undefined' && element){
	        if(element.tagName == parent_id || element.id == parent_id || (element.classList && element.classList.contains(parent_id)))
	        	return true;

	        element = element.parentNode;
	    }

	    return false;

	},

	get_parent_from_class: function (class_id, element)
	{

	    while(typeof element != 'undefined' && element != null && element.parentNode && element.tagName != 'BODY'){

	        if(element.parentNode.classList.contains(class_id))
	        	return element.parentNode;

	        element = element.parentNode;
	    }

	    return null;

	},

	get_parent_from_tagname: function (tagname, element)
	{

		while(typeof element != 'undefined' && element && element.parentNode)
		{
			if(element.parentNode.tagName == tagname.toUpperCase())
	        	return element.parentNode;

	        element = element.parentNode;
		}
	    return null;

	},

	get_parent_from_id: function (element_id, element)
	{

	    while(typeof element != 'undefined' && element && element.parentNode){
	        if(element.parentNode.id == element_id)
	        	return element.parentNode;

	        element = element.parentNode;
	    }

	    return null;

	},

	cumulativeOffset: function (element) {
		var top = 0, left = 0;
		do {
			top += element.offsetTop  || 0;
			left += element.offsetLeft || 0;
			element = element.offsetParent;
		} while(typeof element != 'undefined' && element);

		return {
			top: top,
			left: left
		};
	},

	translate_sub_menu: function (selectable, bounds)
	{

		let myoffset = selector.cumulativeOffset(selectable);

		let scrollX = CANVAS.parentNode.scrollLeft;
		let scrollY = CANVAS.parentNode.scrollTop;

		//make sure the sub menu is visible
		let sub_menu = IFRAME.contentWindow.document.querySelector("#sub_menu");
		if((myoffset.top - 2 - scrollY) < 100){

			sub_menu.style.top = (bounds.height + 5) + "px";
		}else{

			sub_menu.style.top = "-95px";
			sub_menu.style.left = "calc(50% + 20px)";
		}

		if((CANVAS.parentNode.offsetWidth - myoffset.left - scrollX) < 100){

			sub_menu.style.left = "auto";
			sub_menu.style.right = (bounds.width * 2.5) + "px";
		}else{

			sub_menu.style.left = "calc(50% + 20px)";
		}
		
	},

	hover_on_item: function (selectable)
	{
		let myselector = IFRAME.contentWindow.document.getElementById("hoverer");

		if(typeof selectable == 'undefined' || !selectable){
			myselector.classList.add("quickcode-hide");
			return;
		}

		if(!ALLOW_HOVER){
			myselector.classList.add("quickcode-hide");
			return;
		}

		if(selectable.id == "CANVAS")
		{
			myselector.classList.add("quickcode-hide");
			return;
		}

		if(typeof selectable.getBoundingClientRect !== 'function')
			return;

		if(!selector.selected.includes(selectable) && selector.isChildOf("CANVAS", selectable))
		{

			TRANSITION_HOVER_ELEMENT = selectable;
			let bounds = selectable.getBoundingClientRect();
			myselector.classList.remove("quickcode-hide");

			myselector.style.width = (bounds.width + 2) + "px";
			myselector.style.height = (bounds.height + 2) + "px";

			let scrollX = IFRAME.contentWindow.scrollX;
			let scrollY = IFRAME.contentWindow.scrollY;

			myselector.style.top = (bounds.top - 1 + scrollY) + "px";
			myselector.style.left = (bounds.left - 1 + scrollX) + "px";

			let info_holder = myselector.querySelector('.quickcode-hover-label');
			for (var x = 0; x < info_holder.children.length; x++) {
				
				info_holder.children[x].style.color = 'white';
				if(selectable.hasAttribute('handle'))
					info_holder.children[x].style.color = 'yellow';

				info_holder.children[x].innerHTML = selectable.tagName;
			}
			
			TREE.hover_item = selectable.id;
			TREE.redraw();
		}else
		{
			TRANSITION_HOVER_ELEMENT = null;
			myselector.classList.add("quickcode-hide");
			TREE.hover_item = null;
			TREE.redraw();
		}

	},

	hide_hover: function ()
	{
		let myselector = IFRAME.contentWindow.document.getElementById("hoverer");
		myselector.classList.add("quickcode-hide");
		TRANSITION_HOVER_ELEMENT = null;
	},

	refresh_selector_box: function ()
	{
		if(selector.selected.length == 0)
			return;

		let myselector_holder = IFRAME.contentWindow.document.getElementById("SELECTORS");
		for (var i = 0; i < selector.selected.length; i++) {

			let bounds = selector.selected[i].getBoundingClientRect();

			if(typeof myselector_holder.children[i] != 'undefined')
			{

				let clonedSelector = myselector_holder.children[i];

				let scrollX = IFRAME.contentWindow.scrollX;
				let scrollY = IFRAME.contentWindow.scrollY;

				clonedSelector.classList.remove("quickcode-hide");
				clonedSelector.id = "clonedSelector"+i;
				clonedSelector.style.width = (bounds.width + 2) + "px";
				clonedSelector.style.height = (bounds.height + 2) + "px";
				clonedSelector.style.top = (bounds.top - 1 + scrollY) + "px";
				clonedSelector.style.left = (bounds.left - 1 + scrollX) + "px";

				selector.translate_sub_menu(selector.selected[i], bounds);

/*				if(selector.selected[i].hasAttribute('handle')){
					clonedSelector.querySelector('.quickcode-handle-label').classList.remove('quickcode-hide');
				}else{
					clonedSelector.querySelector('.quickcode-handle-label').classList.add('quickcode-hide');
				}*/
				if(i > 0)
					clonedSelector.querySelector('#sub_menu').classList.add('quickcode-hide');

				let info_holder = clonedSelector.querySelector('.quickcode-handle-label');
				for (var x = 0; x < info_holder.children.length; x++) {
					
					info_holder.children[x].style.color = 'white';
					if(selector.selected[i].hasAttribute('handle'))
						info_holder.children[x].style.color = 'yellow';

					info_holder.children[x].innerHTML = selector.selected[i].tagName;
				}	
			}

		}
	},

	redraw_selector_box: function ()
	{
 		let myselector = IFRAME.contentWindow.document.getElementById("selector");
 		let myselector_holder = IFRAME.contentWindow.document.getElementById("SELECTORS");
		myselector_holder.innerHTML = "";

		if(selector.selected.length == 0)
			return;

		for (var i = 0; i < selector.selected.length; i++) {

			let bounds = selector.selected[i].getBoundingClientRect();
			let clonedSelector = myselector.cloneNode(true);
			myselector_holder.appendChild(clonedSelector);

			clonedSelector.classList.remove("quickcode-hide");
			clonedSelector.id = "clonedSelector"+i;
			clonedSelector.style.width = (bounds.width + 2) + "px";
			clonedSelector.style.height = (bounds.height + 2) + "px";
			clonedSelector.style.top = (bounds.top - 1 + scrollY) + "px";
			clonedSelector.style.left = (bounds.left - 1 + scrollX) + "px";

			selector.translate_sub_menu(selector.selected[i], bounds);	

		}
	},

	drag: function()
	{


		if(!mouse.mouseDown || selector.selected.length == 0)
			return;

			actions.save_undo_data();
			DATA.DIRTY_DATA = false;

		for (var i = 0; i < selector.selected.length; i++) {
			
			let oldleft = actions.get_style(selector.selected[i], 'left', '0px');
			let oldtop = actions.get_style(selector.selected[i], 'top', '0px');
			let oldrotate = actions.get_style(selector.selected[i], 'rotate', '0');
			let oldposition = actions.get_style(selector.selected[i], 'position', 'static');
			let oldparentposition = actions.get_style(selector.selected[i].parentNode, 'position', 'static');

			/** dont set position values if static**/
			if(oldposition == 'static' || oldposition == '' || oldposition == 'NaNpx')
				return;


/*			if(selector.selected.length > 0 && TEMP_UNDO.length == 0)
				actions.set_temp_undo();
*/

			let left = Math.round(mouse.initBox.left + mouse.mouseX);
			let top = Math.round(mouse.initBox.top + mouse.mouseY);

			let appendX = "px";
			let appendY = "px";
			if(oldleft.includes("%")){
				appendX = "%";
				left = ((left / mouse.initBoxParent_pos.left) * 100).toFixed(2);
			}

			if(oldtop.includes("%")){
				appendY = "%";
				top = ((top / mouse.initBoxParent_pos.top) * 100).toFixed(2);
			}

			left = left + appendX;
			top = top + appendY;

			actions.set_style(selector.selected[i], 'left', left);
			actions.set_style(selector.selected[i], 'top', top);
			
		}
		
		selector.refresh_selector_box();
		properties.load();
	},

	update_bounds_info: function()
	{
		let boxes = IFRAME.contentWindow.document.getElementById("SELECTORS");
		for (var i = 0; i < selector.selected.length; i++) {
			
			let item = boxes.children[i].querySelector('#bounds-info');
			if(!item)
				continue;

			let box = selector.selected[i].getBoundingClientRect();

			//if(ITEM_RESIZE){
				item.innerHTML = `w:${Math.round(box.width)}px | h:${Math.round(box.height)}px`;
			/*}else{
				item.innerHTML = `<div>x:${Math.round(box.left)}px</div><div>y:${Math.round(box.top)}px</div>`;
			}*/
		}
	},

	set_resize_direction: function(e, direction)
	{

		if(selector.selected.length == 0)
			return;

		/** get selected dimensions **/
		RESIZE_DIRECTION = direction;
		ITEM_RESIZE = true;

		mouse.selected_element_bounds = [];
		for (var i = 0; i < selector.selected.length; i++) {
			
			mouse.selected_element_bounds[i] = selector.selected[i].getBoundingClientRect();
			mouse.selected_element_style_bounds[i] = actions.getBoundsFromStyles(selector.selected[i]);

		}
		
		mouse.set_mouse_down(e);

	},

	resize: function()
	{

		if(!mouse.mouseDown || selector.selected.length == 0 || !ITEM_RESIZE)
			return;
			
			actions.save_undo_data();
			DATA.DIRTY_DATA = false;

		for (var i = 0; i < selector.selected.length; i++) {

			let width = Math.round(mouse.initBox.width + mouse.mouseX);
			let height = Math.round(mouse.initBox.height + mouse.mouseY);

 			let oldrotate = actions.get_style(selector.selected[i], 'rotate', '0');

			/** X size **/
			let oldwidth = actions.get_style(selector.selected[i], 'width', '0px');
			let oldleft = actions.get_style(selector.selected[i], 'left', '0px');

			let appendX = "px";
			if(oldwidth.includes("%")){
				appendX = "%";
				width = ((width / mouse.initBoxParent.width) * 100).toFixed(2);
			}else
			if(oldwidth.includes("vw")){
				appendX = "vw";
				width = ((width / mouse.initBoxParent.width) * 100).toFixed(2);
			}

			/** Y size **/
			let oldheight = actions.get_style(selector.selected[i], 'height', '0px');
			let appendY = "px";
			if(oldheight.includes("%")){
				appendY = "%";
				height = ((height / mouse.initBoxParent.height) * 100).toFixed(2);
			}else
			if(oldheight.includes("vh")){
				appendY = "vh";
				height = ((height / mouse.initBoxParent.height) * 100).toFixed(2);
			}

			/** add values to correct direction **/
			if(RESIZE_DIRECTION == 'left')
			{

				width = width + appendX;
				actions.set_style(selector.selected[i], 'width', width);
			
			}else
			if(RESIZE_DIRECTION == 'right')
			{

				width = width + appendX;
				actions.set_style(selector.selected[i], 'width', width);

			}else
			if(RESIZE_DIRECTION == 'top')
			{

				height = height + appendY;
				actions.set_style(selector.selected[i], 'height', height);

			}else
			if(RESIZE_DIRECTION == 'bottom')
			{

				height = height + appendY;
				actions.set_style(selector.selected[i], 'height', height);
			}else 
			if(RESIZE_DIRECTION == 'bottom-right')
			{

				height = height + appendY;
				actions.set_style(selector.selected[i], 'height', height);

				width = width + appendX;
				actions.set_style(selector.selected[i], 'width', width);
			}else 
			if(RESIZE_DIRECTION == 'bottom-left')
			{

				height = height + appendY;
				actions.set_style(selector.selected[i], 'height', height);
 
				width = width + appendX;
				actions.set_style(selector.selected[i], 'width', width);
			}else
			if(RESIZE_DIRECTION == 'top-right')
			{
 
				height = height + appendY;
				actions.set_style(selector.selected[i], 'height', height);

				width = width + appendX;
				actions.set_style(selector.selected[i], 'width', width);

			}else
			if(RESIZE_DIRECTION == 'top-left')
			{
 
				height = height + appendY;
				actions.set_style(selector.selected[i], 'height', height);
 
				width = width + appendX;
				actions.set_style(selector.selected[i], 'width', width);

			}
		}

		selector.refresh_selector_box();
		selector.update_bounds_info();
		properties.load();
	},

	select_item: function(selectable)
	{


		let myselector = IFRAME.contentWindow.document.getElementById("selector");
		let myselector_holder = IFRAME.contentWindow.document.getElementById("SELECTORS");
		
		if(selectable.id == "CANVAS")
		{
			if(!SHIFT_MODE){

				IFRAME.contentWindow.document.getElementById("SELECTORS").innerHTML = "";
				selector.selected = [];
				properties.hide();
				SELECTED_CLASS = null;

				//if(!SHIFT_MODE)
				//tree.show(selectable);
				//tree.hide();
				TREE.redraw();
			}

			return;
		}

		if(typeof selectable.getBoundingClientRect !== 'function')
			return;

		/** check if item is already selected **/
		if(selector.selected.includes(selectable))
		{
			//unselect it
			/*
			for (var i = 0; i < selector.selected.length; i++) {
				
				if(selector.selected[i].id == selectable.id)
					selector.selected.splice(i,1);
			}
			*/
			/** set element position and size information **/
/*			for (var i = 0; i < selector.selected.length; i++)
			{
				mouse.selected_element_bounds[i] = selector.selected[i].getBoundingClientRect();
				mouse.selected_element_style_bounds[i] = actions.getBoundsFromStyles(selector.selected[i]);
			}

			*/
			return;
		}
		
		let scrollX = IFRAME.contentWindow.scrollX;
		let scrollY = IFRAME.contentWindow.scrollY;

		IFRAME.contentWindow.document.getElementById("hoverer").classList.add("quickcode-hide");

		if(selector.isChildOf("CANVAS", selectable))
		{
			if(HOVER_MODE)
			{
				//remove hover mode if active
/*				actions.save_hover_styles();
				HOVER_MODE = false;
				document.querySelector(".js-hover_mode").checked = false;*/
			}

			if(SHIFT_MODE){
				selector.selected[selector.selected.length] = selectable;
			}else{
				selector.selected = [];
				selector.selected[0] = selectable;
			}
			
			myselector_holder.innerHTML = "";

			for (var i = 0; i < selector.selected.length; i++) {

				let bounds = selector.selected[i].getBoundingClientRect();
				let clonedSelector = myselector.cloneNode(true);
				myselector_holder.appendChild(clonedSelector);

				clonedSelector.classList.remove("quickcode-hide");
				clonedSelector.id = "clonedSelector"+i;
				clonedSelector.style.width = (bounds.width + 2) + "px";
				clonedSelector.style.height = (bounds.height + 2) + "px";
				clonedSelector.style.top = (bounds.top - 1 + scrollY) + "px";
				clonedSelector.style.left = (bounds.left - 1 + scrollX) + "px";

				selector.translate_sub_menu(selector.selected[i], bounds);	

				/** set element position and size information **/
	/*			mouse.selected_element_bounds[i] = selector.selected[i].getBoundingClientRect();
				mouse.selected_element_style_bounds[i] = actions.getBoundsFromStyles(selector.selected[i]);
*/
/*				if(selector.selected[i].hasAttribute('handle')){
					clonedSelector.querySelector('.quickcode-handle-label').classList.remove('quickcode-hide');
				}else{
					clonedSelector.querySelector('.quickcode-handle-label').classList.add('quickcode-hide');
				}*/

				let info_holder = clonedSelector.querySelector('.quickcode-handle-label');
				for (var x = 0; x < info_holder.children.length; x++) {
					
					info_holder.children[x].style.color = 'white';
					if(selector.selected[i].hasAttribute('handle'))
						info_holder.children[x].style.color = 'yellow';

					info_holder.children[x].innerHTML = selector.selected[i].tagName;
				}

			}

			//if(!SELECTED_CLASS)
			SELECTED_CLASS = selector.selected[0].classList[selector.selected[0].classList.length-1] || null;
			actions.reset_sudos();

			mouse.initBox = selector.selected[0].getBoundingClientRect();
			mouse.initBoxParent = mouse.get_relative_parent_dimensions(selector.selected[0]).getBoundingClientRect();
			mouse.initBoxParent_pos = mouse.get_relative_parent_position(selector.selected[0]).getBoundingClientRect();

			IFRAME.contentWindow.document.querySelector('#edit-text').style.display = 'none';
			if(selector.selected[0].hasAttribute('editable'))
				IFRAME.contentWindow.document.querySelector('#edit-text').style.display = 'inline';

			IFRAME.contentWindow.document.querySelector('#change-image').style.display = 'none';
			IFRAME.contentWindow.document.querySelector('#paste-item').style.display = 'inline';
			IFRAME.contentWindow.document.querySelector('#add-item').style.display = 'inline';
			if(selector.selected[0].tagName == 'IMG'){
				IFRAME.contentWindow.document.querySelector('#change-image').style.display = 'inline';
				IFRAME.contentWindow.document.querySelector('#paste-item').style.display = 'none';
				IFRAME.contentWindow.document.querySelector('#add-item').style.display = 'none';
			}
			
			properties.load();
			properties.show();
			selector.update_bounds_info();
			TREE.redraw();

		}else
		{

			let dontRemoveSelection = [
					'quickcode-js-sub_menu',
					'sub_menu',
					'MENU_BUTTONS',
					'item_properties',
					'jscolor-wrap',
					'selector',
					'quickcode-selector',
					'IMAGE_LOADER',
					'ITEM_LOADER',
					'ITEM_TREE',
				];

			for (var i = 0; i < dontRemoveSelection.length; i++) {
				
				if(selector.isChildOf(dontRemoveSelection[i], selectable))
				{
					return;
				}
			}

			selector.clear_selection();
			properties.hide();
			TREE.redraw();

		}

	},

}