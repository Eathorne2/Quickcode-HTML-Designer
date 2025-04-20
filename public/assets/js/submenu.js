
var submenu_actions =
{
	
	align_item: function(alignment)
	{
		
		if(selector.selected.length == 0)
			return;

		if(alignment == 'left')
		{
			for (var i = 0; i < selector.selected.length; i++) {

				if(selector.selected[i].hasAttribute('editable'))
				{
					actions.set_style(selector.selected[i], 'text-align', 'left');
				}else{

					let css = getComputedStyle(selector.selected[i]);
					
					if(css.display.includes('inline'))
					{
						if(css.display.includes('inline-')){
							let disp = css.display.replace('inline-','');
							actions.set_style(selector.selected[i], 'display', disp);
						}else{
							actions.set_style(selector.selected[i], 'display', 'block');
						}
					}

					actions.set_style(selector.selected[i], 'margin-left', '0px');
					actions.set_style(selector.selected[i], 'margin-right', 'auto');
				}
			}
		}else 
		if(alignment == 'center')
		{
			for (var i = 0; i < selector.selected.length; i++) {

				if(selector.selected[i].hasAttribute('editable'))
				{
					actions.set_style(selector.selected[i], 'text-align', 'center');
				}else{

					let css = getComputedStyle(selector.selected[i]);
					
					if(css.display.includes('inline'))
					{
						if(css.display.includes('inline-')){
							let disp = css.display.replace('inline-','');
							actions.set_style(selector.selected[i], 'display', disp);
						}else{
							actions.set_style(selector.selected[i], 'display', 'block');
						}
					}

					actions.set_style(selector.selected[i], 'margin-left', 'auto');
					actions.set_style(selector.selected[i], 'margin-right', 'auto');
				}
			}
		}else 
		if(alignment == 'right')
		{
			for (var i = 0; i < selector.selected.length; i++) {

				if(selector.selected[i].hasAttribute('editable'))
				{
					actions.set_style(selector.selected[i], 'text-align', 'right');
				}else{

					let css = getComputedStyle(selector.selected[i]);
					
					if(css.display.includes('inline'))
					{
						if(css.display.includes('inline-')){
							let disp = css.display.replace('inline-','');
							actions.set_style(selector.selected[i], 'display', disp);
						}else{
							actions.set_style(selector.selected[i], 'display', 'block');
						}
					}

					actions.set_style(selector.selected[i], 'margin-left', 'auto');
					actions.set_style(selector.selected[i], 'margin-right', '0px');
				}
			}
		}
		
		properties.load();
	},

	clear_contents: function (e)
	{

		if(!confirm("Are you sure you want to delete all contents of selected items?!"))
			return;

		//save undo
		actions.save_undo_data();
		actions.reset_sudos();

		for (var i = selector.selected.length - 1; i >= 0; i--) {
			
			for (var x = 0; x < selector.selected[i].children.length; x++) {
				selector.selected[i].children[x].remove();
			}

		}

		PAGE.update_data();
		actions.init_js();
		selector.clear_selection();
		selector.show_sub_menu_dropdown(e.target,false);
	},

	delete_element: function (e)
	{
		if(!confirm("Are you sure you want to delete selected items?!"))
			return;

		//save undo
		actions.save_undo_data();
		actions.reset_sudos();

		for (var i = selector.selected.length - 1; i >= 0; i--) {
			
			//if its a tab
			if(selector.selected[i].getAttribute('role') == 'tab')
			{
				
				let activates = selector.selected[i].getAttribute('activates');
				let pane = CANVAS.querySelector('#'+activates);

				if(pane)
					pane.remove();
				
				selector.selected[i].remove();
				
			}else{

				selector.selected[i].remove();
			}
			
/*			//remove unused classes
			let all_classes = selector.selected[i].classList;
			for (var i = 0; i < all_classes.children.length; i++) {
				let id = all_classes.children[i].id;
				let test = CANVAS.querySelector('.'+id);
				if(!test)
					all_classes.children[i].remove();
			}*/

		}

		PAGE.update_data();
		actions.init_js();
		selector.clear_selection();
		selector.show_sub_menu_dropdown(e.target,false);
	},

	change_z_index: function (direction,e)
	{

		//save undo
		actions.save_undo_data();

	  for (var i = 0; i < selector.selected.length; i++) {
	    
	    let parent = selector.selected[i].parentNode;

        if(direction == 'up'){
          var prevNode = selector.selected[i].previousElementSibling;
          if(prevNode){
            parent.insertBefore(selector.selected[i],prevNode);
          }
        }else 
        if(direction == 'down'){
          var nextNode = selector.selected[i].nextElementSibling;
          if(nextNode){
            parent.insertBefore(nextNode,selector.selected[i]);
          }
        }else 
        if(direction == 'bottom'){
            parent.insertBefore(selector.selected[i],null);
        }else 
        if(direction == 'top'){
          var firstNode = parent.firstChild;
          if(firstNode){
            parent.insertBefore(selector.selected[i],firstNode);
          }
        }

	  }

	  actions.init_js();
	  
	  selector.refresh_selector_box();
	  selector.show_sub_menu_dropdown(e.target, false);

	},

	select_parent: function(e)
	{
		if(selector.selected.length == 0)
			return;

		actions.reset_sudos();

		let notfound = 0;

		/** find the parents **/
		let parents = [];
		for (var i = 0; i < selector.selected.length; i++) {
			
			if(selector.selected[i].parentNode.id != "CANVAS"){
				parents.push(selector.selected[i].parentNode);
			}else{
				notfound++;
			}
		}

		if(parents.length > 0)
		{
			selector.clear_selection();
			SHIFT_MODE = true;
			for (var i = 0; i < parents.length; i++) {
				
				selector.select_item(parents[i]);
				//tree.show(parents[i]);
			}
		}

		SHIFT_MODE = false;

		if(notfound)
			alert("No parent was found for "+notfound+" items");

		selector.show_sub_menu_dropdown(e, false);
	},

	select_child: function(e)
	{
		if(selector.selected.length == 0)
			return;

		actions.reset_sudos();

		if(selector.selected[0].children[0]){
			selector.select_item(selector.selected[0].children[0]);
		}else{
			alert("No children were found");
		}

		selector.show_sub_menu_dropdown(e.target, false);
	},

	select_prev_sibling: function(e)
	{
		if(selector.selected.length == 0)
			return;

		actions.reset_sudos();

		if(selector.selected[0].previousElementSibling){
			selector.select_item(selector.selected[0].previousElementSibling);
		}else{
			alert("No previous sibling was found");
		}

		selector.show_sub_menu_dropdown(e.target, false);
	},

	select_next_sibling: function(e)
	{
		if(selector.selected.length == 0)
			return;

		actions.reset_sudos();

		if(selector.selected[0].nextElementSibling){
			selector.select_item(selector.selected[0].nextElementSibling);
		}else{
			alert("No next sibling was found");
		}

		selector.show_sub_menu_dropdown(e.target, false);
	},

	clone_element: function()
	{

		if(selector.selected.length == 0){
			alert("Select something to clone!");
			return;
		}

		//save undo
		actions.save_undo_data();

		for (var i = 0; i < selector.selected.length; i++) {
			
			let clone = selector.selected[i].cloneNode(true);
			
			submenu_actions.set_clone_ids(clone);

			//if its a tab
			if(clone.getAttribute('role') == 'tab')
			{
				clone.setAttribute('active','false');
				let activates = clone.getAttribute('activates');
				clone.setAttribute('activates',activates+'_'+DATA.ITEM_COUNT);

				let pane = CANVAS.querySelector('#'+activates);
				let pane_clone = pane.cloneNode(true);
				pane_clone.id = activates+'_'+DATA.ITEM_COUNT;
				DATA.ITEM_COUNT++;

				pane.parentNode.appendChild(pane_clone);
				selector.selected[i].parentNode.appendChild(clone);
				
			}else{

				selector.selected[i].parentNode.appendChild(clone);
			}
			
			actions.init_js();

		}

	},

	duplicate_element: function()
	{
		if(selector.selected.length == 0){
			alert("Select something to duplicate!");
			return;
		}

		//save undo
		actions.save_undo_data();

		for (var i = 0; i < selector.selected.length; i++) {
			
			let clone = selector.selected[i].cloneNode(true);
			
			submenu_actions.set_clone_ids(clone);
			CLONED_CLASSES = {};
			submenu_actions.set_clone_classes(clone);

			//if its a tab
			if(clone.getAttribute('role') == 'tab')
			{
				clone.setAttribute('active','false');
				let activates = clone.getAttribute('activates');
				clone.setAttribute('activates',activates+'_'+DATA.ITEM_COUNT);

				let pane = CANVAS.querySelector('#'+activates);
				let pane_clone = pane.cloneNode(true);
				pane_clone.id = activates+'_'+DATA.ITEM_COUNT;
				DATA.ITEM_COUNT++;

				pane.parentNode.appendChild(pane_clone);
				selector.selected[i].parentNode.appendChild(clone);
				
			}else{

				selector.selected[i].parentNode.appendChild(clone);
			}

			actions.init_js();
		}
	},

	set_clone_ids: function(clone)
	{
		
		if(clone.id.includes('item_')){
			
			clone.setAttribute('id','item_'+DATA.ITEM_COUNT);
			DATA.ITEM_COUNT++;
		}

		//check for children too
		for (var i = 0; i < clone.children.length; i++) {
			submenu_actions.set_clone_ids(clone.children[i]);
		}

	},

	set_clone_classes: function(clone)
	{
		
		let ifound = false;
		let new_class = '';
		let classes_str = clone.getAttribute('class') || '';
		if(classes_str)
		{
			let parts = classes_str.split(' ');
			for (var x = 0; x < parts.length; x++) {

				parts[x] = parts[x].trim();
				if(parts[x] == '')
					continue;

				if(parts[x].match(/^bi$|^bi\-|^fa$|^fa\-/gi))
					continue;

				for(key in responsive.data){

					let style_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).querySelector('#'+parts[x]);
					let style_holder_sudo = IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).querySelectorAll('#'+parts[x]);

					if(typeof CLONED_CLASSES[parts[x]] == 'string' && style_holder)
					{
						new_class = CLONED_CLASSES[parts[x]];

						clone.classList.remove(parts[x]);
						clone.classList.add(new_class);
						//CLONED_CLASSES[parts[x]] = new_class;

						//if class not exists in this media query
						let style_holder2 = IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).querySelector('#'+new_class);
						if(!style_holder2)
						{
							let div = style_holder.cloneNode(true);
							div.id = new_class;

							if(div.innerHTML.includes('--muted--'))
								div.innerHTML = div.innerHTML.replace(/\.[a-z0-9_\-]+/,'.--muted--'+new_class);
							else
								div.innerHTML = div.innerHTML.replace(/\.[a-z0-9_\-]+/,'.'+new_class);
							IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).appendChild(div);
						}

						//clone sudo classes too
						let style_holder3 = IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).querySelector('#'+new_class);
						if(!style_holder3)
						{
							for (var y = 0; y < style_holder_sudo.length; y++) {
								
								let div_sudo = style_holder_sudo[y].cloneNode(true);
								div_sudo.id = new_class;
								let sudo_name = div_sudo.getAttribute('name');

								if(div_sudo.innerHTML.includes('--muted--'))
									div_sudo.innerHTML = div_sudo.innerHTML.replace(/\.[a-z0-9_\-]+/,'.--muted--'+new_class);
								else
									div_sudo.innerHTML = div_sudo.innerHTML.replace(/\.[a-z0-9_\-]+/,'.'+new_class);

								let reg = new RegExp("^"+parts[x]);
								div_sudo.setAttribute('name',sudo_name.replace(reg,new_class));
								IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).appendChild(div_sudo);
							}
						}


					}else{

						if(style_holder)
						{
						
							new_class = parts[x] + '_'+DATA.ITEM_COUNT;
							DATA.ITEM_COUNT++;

							let div = style_holder.cloneNode(true);
							div.id = new_class;

							div.innerHTML = div.innerHTML.replace(/\.[a-z0-9_\-]+/,'.'+new_class);

							IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].main_css).appendChild(div);
							clone.classList.remove(parts[x]);
							clone.classList.add(new_class);
							CLONED_CLASSES[parts[x]] = new_class;
						}

						//clone sudo classes too
						for (var y = 0; y < style_holder_sudo.length; y++) {
							
							let div_sudo = style_holder_sudo[y].cloneNode(true);
							div_sudo.id = new_class;
							div_sudo.innerHTML = div_sudo.innerHTML.replace(/\.[a-z0-9_\-]+/,'.'+new_class);
							let sudo_name = div_sudo.getAttribute('name');
							let reg = new RegExp("^"+parts[x]);

							div_sudo.setAttribute('name',sudo_name.replace(reg,new_class));
							IFRAME.contentWindow.document.querySelector('.'+responsive.data[key].sudo_css).appendChild(div_sudo);
						}
					}

				}
			}
 
		}

		//check for children too
		for (var i = 0; i < clone.children.length; i++) {
 
			submenu_actions.set_clone_classes(clone.children[i]);
		}

	},

	cut_element: function()
	{

		if(selector.selected.length == 0){
			alert("Select something to cut!");
			return;
		}

		//save undo
		actions.save_undo_data();
		actions.reset_sudos();
		
		COPIED_ITEMS = [];
		for (var i = 0; i < selector.selected.length; i++) {
			COPIED_ITEMS.push(selector.selected[i].cloneNode(true));
			selector.selected[i].remove();
		}

		selector.clear_selection();
	},

	copy_element: function()
	{
		if(selector.selected.length == 0){
			alert("Select something to copy!");
			return;
		}

		COPIED_ITEMS = [];
		for (var i = 0; i < selector.selected.length; i++) {

				let clone = selector.selected[i].cloneNode(true);
				//clone.setAttribute('id','item_'+ITEM_COUNT);
				//ITEM_COUNT++;
				
				COPIED_ITEMS.push(clone);
		}

	},

	paste_element: function()
	{

		if(COPIED_ITEMS.length == 0){
			alert("Cut or copy an element first!");
			return;
		}

		//save undo
		actions.save_undo_data();

		if(selector.selected.length == 0)
		{
				for (var z = 0; z < COPIED_ITEMS.length; z++) {

					let clone = COPIED_ITEMS[z].cloneNode(true);

					if(clone.id != '' && CANVAS.querySelector('#'+clone.id))
						submenu_actions.set_clone_ids(clone);

					CANVAS.appendChild(clone);
				}
		}else{

			for (var i = 0; i < selector.selected.length; i++) {
				
				for (var z = 0; z < COPIED_ITEMS.length; z++) {

					let clone = COPIED_ITEMS[z].cloneNode(true);

					if(clone.id != '' && CANVAS.querySelector('#'+clone.id))
						submenu_actions.set_clone_ids(clone);
					
					selector.selected[i].appendChild(clone);
				}
			}
		}

		//COPIED_ITEMS = [];
		selector.refresh_selector_box();
	},

	
}
