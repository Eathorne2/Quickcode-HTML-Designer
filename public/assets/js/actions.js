
var actions = 
{
	undo_levels: 5,
	undo_index: 0,
	undo_data: [],

	getBoundsFromStyles: function(element)
	{
		let bounds = {};

		bounds.left 	= element.offsetLeft;
		bounds.relativeLeft 	= parseFloat(actions.get_style(element, 'left', '0px').replace(/(px|\%|rem|vw|vh|em)/,''));
		bounds.relativeTop 		= parseFloat(actions.get_style(element, 'top', '0px').replace(/(px|\%|rem|vw|vh|em)/,''));
		bounds.top 		= element.offsetTop;
		bounds.bottom 	= parseFloat(actions.get_style(element, 'bottom', '0px').replace(/(px|\%|rem|vw|vh|em)/,''));
		bounds.right 	= parseFloat(actions.get_style(element, 'right', '0px').replace(/(px|\%|rem|vw|vh|em)/,''));
		bounds.width 	= element.offsetWidth;
		bounds.height 	= element.offsetHeight;

		return bounds;
	},

	select_handle: function()
	{
		let found = false;
		let num = 0;
		let parent = selector.selected[0];
		while(parent && parent.tagName != 'BODY' && num < 100)
		{
			num++;
			parent = parent.parentNode;
			if(parent.hasAttribute('handle')){
				found = true;
				break;
			}
		}

		if(found){
			selector.selected = [];
			selector.select_item(parent);
		}else{
			alert("No handle was found above current selection");
		}
	},

	allow_hover: function(value)
	{
		ALLOW_HOVER = value;
	},

	allow_drag: function(value)
	{
		ALLOW_DRAG = value;
	},
	
	show_grid: function(value)
	{
		SHOW_GRID = value;
		if(SHOW_GRID)
		{
			CANVAS.style.backgroundImage = "url('assets/images/grid_dots_monitor.svg')";
		}else{
			CANVAS.style.backgroundImage = "";
		}
	},

	allow_properties: function(value)
	{
		ALLOW_PROPERTIES = value;
		if(!ALLOW_PROPERTIES)
			document.querySelector("#item_properties").classList.add("quickcode-hide");

		if(ALLOW_PROPERTIES && selector.selected.length > 0)
			document.querySelector("#item_properties").classList.remove("quickcode-hide");
	},
	show_transform_box: function(value)
	{
		SHOW_TRANSFORM = value;
		if(SHOW_TRANSFORM){
			IFRAME.contentWindow.document.querySelector("#SELECTORS").classList.remove("quickcode-hide");
		}else{
			IFRAME.contentWindow.document.querySelector("#SELECTORS").classList.add("quickcode-hide");
		}

	},

	delete_orphaned_classes: function(silent = false)
	{
		if(!silent)
		{
			if(!confirm("All classes not attached to elements will be deleted! Continue?!"))
				return;
		}

		let num = 0;
		//delete styles without elements
		let temp_div = IFRAME.contentWindow.document.querySelector('.quickcode-TEMP-CANVAS');
		let all_main_classes = [];
		let all_sudo_classes = [];
		let all_combo_classes = [];
		
		//collect all classes
		for(mode in responsive.data)
		{
			let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css);
			for (var i = 0; i < class_holder.children.length; i++) {
				all_main_classes.push(class_holder.children[i].id);
			}

			class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css);
			for (var i = 0; i < class_holder.children.length; i++) {
				all_sudo_classes.push(class_holder.children[i].id);
			}

			class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css);
			for (var i = 0; i < class_holder.children.length; i++) {
				all_combo_classes.push(class_holder.children[i].id);
			}
		}

		//check all pages 
		//PAGE.update_data();
		for(key in PAGE.data)
		{
			temp_div.innerHTML = PAGE.data[key].html;

			for (var i = 0; i < all_main_classes.length; i++) {

				if(all_main_classes[i] != '' && temp_div.querySelector('.'+all_main_classes[i]))
					all_main_classes[i] = '';
			}

			for (var i = 0; i < all_sudo_classes.length; i++) {

				if(all_sudo_classes[i] != '' && temp_div.querySelector('.'+all_sudo_classes[i]))
					all_sudo_classes[i] = '';
			}

			for (var i = 0; i < all_combo_classes.length; i++) {

				if(all_combo_classes[i] != '' && temp_div.querySelector('.'+all_combo_classes[i]))
					all_combo_classes[i] = '';
			}
			
		}
 
		//delete remaining classes
		for(mode in responsive.data)
		{
			for (var i = 0; i < all_main_classes.length; i++) {

				if(all_main_classes[i] != ''){
					let class_div = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css + ' #'+all_main_classes[i]);
					if(class_div)
					{
						class_div.remove();
						num++;
					}
				}
			}
			for (var i = 0; i < all_sudo_classes.length; i++) {

				if(all_sudo_classes[i] != ''){
					let class_div = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css + ' #'+all_sudo_classes[i]);
					if(class_div)
					{
						class_div.remove();
						num++;
					}
				}
			}
			for (var i = 0; i < all_combo_classes.length; i++) {

				if(all_combo_classes[i] != ''){
					let class_div = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css + ' #'+all_combo_classes[i]);
					if(class_div)
					{
						class_div.remove();
						num++;
					}
				}
			}
		}
 	
 		all_main_classes = [];
		all_sudo_classes = [];
		all_combo_classes = [];

		temp_div.html = '';

		if(!silent)
			alert(num + ' classes were deleted!');
	},

	move_class_up: function(class_name,before_class)
	{
		if(class_name != '')
		{
			let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+class_name);
			if(class_holder)
			{
				if(before_class != 'null')
				{

					let before_class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+before_class);
					if(before_class_holder)
					{
						class_holder.parentNode.insertBefore(class_holder,before_class_holder);
					
						//move class name to the right place on element
						let my_classes = selector.selected[0].getAttribute('class');
						if(my_classes){

							my_classes = my_classes.split(' ');
							let to_remove = 0;
							let move_to = 0;
							for (var i = 0; i < my_classes.length; i++) {
								if(my_classes[i] == class_name)
									to_remove = i;
								if(my_classes[i] == before_class)
									move_to = i;
								
							}

							my_classes.splice(to_remove,1);
							my_classes.splice(move_to,0,class_name);
							selector.selected[0].setAttribute('class',my_classes.join(' '));
						}
					}
					
					properties.display_classes();
				}
			}

		}
	},

	move_class_down: function(class_name,after_class)
	{
		if(class_name != '')
		{
			let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+class_name);
			if(class_holder)
			{
				if(after_class == 'null')
				{
					class_holder.parentNode.insertBefore(class_holder,null);
					//move class name to the end on element
					selector.selected[0].classList.remove(class_name);
					selector.selected[0].classList.add(class_name);
				}else{

					let after_class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+after_class);
					if(after_class_holder)
					{
						class_holder.parentNode.insertBefore(class_holder,after_class_holder.nextElementSibling);
						
						//move class name to the right place on element
						let my_classes = selector.selected[0].getAttribute('class');
						if(my_classes){

							my_classes = my_classes.split(' ');
							let to_remove = 0;
							let move_to = 0;
							for (var i = 0; i < my_classes.length; i++) {
								if(my_classes[i] == class_name)
									to_remove = i;
								if(my_classes[i] == after_class)
									move_to = i;
								
							}

							my_classes.splice(to_remove,1);
							my_classes.splice(move_to,0,class_name);
							selector.selected[0].setAttribute('class',my_classes.join(' '));
						}
					}
				}

				properties.display_classes();
			}

		}
	},
	
	new_class: function()
	{
		let holder = document.querySelector('.quickcode-item_classes .quickcode-new-text-input-holder');
		holder.classList.remove('quickcode-d-none');
		holder.querySelector('input').value = 'class_'+DATA.ITEM_COUNT;
		holder.querySelector('input').select();
	},

	save_new_class: function(myclass = '')
	{
		if(selector.selected.length > 0)
		{
			if(myclass == '')
			{
				myclass = 'class_'+DATA.ITEM_COUNT;
				DATA.ITEM_COUNT++;
			}

			let exists = CANVAS.querySelector("."+myclass);
			if(exists)
			{
				if(!confirm("That class already exists! Continue?"))
					return;
			} 

			for (var i = 0; i < selector.selected.length; i++) {
				selector.selected[i].classList.add(myclass);
			}

			//add class if not exists
			for(mode in responsive.data)
			{
				let test = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css).querySelector('#'+myclass);
				if(!test)
				{
					let div_class = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css);
					let div = document.createElement('div');
					div.id = myclass;
					div.innerHTML = `<style>.${myclass}{}</style>`;
					div_class.appendChild(div);
				}
			}

		}

		SELECTED_CLASS = myclass;
		properties.display_classes();
	},
	
	new_pseudo_class: function()
	{
		let holder = document.querySelector('.quickcode-item_classes .quickcode-new-pseudo-class-holder');
		holder.classList.remove('quickcode-d-none');
		holder.querySelector('input').select();
	},

	new_combo_class: function()
	{
		let holder = document.querySelector('.quickcode-item_classes .quickcode-new-combo-class-holder');
		holder.classList.remove('quickcode-d-none');
		holder.querySelector('input').select();
	},

	save_new_pseudo_class: function(text)
	{
		let holder = document.querySelector('.quickcode-item_classes .quickcode-new-pseudo-class-holder');

		if(!SELECTED_CLASS){
			alert("4:Please select a class first");
			holder.querySelector('input').select();
			return;
		}

		if(text == ''){
			alert("Please enter a valid pseudo class name");
			holder.querySelector('input').select();
			return;
		}

		if(text.match(/[^a-z0-9\:\(\)\-]/i)){
			alert("These are the only special characters allowed: '():-'");
			holder.querySelector('input').select();
			return;
		}

		if(selector.selected.length > 0)
		{
			let myclass = SELECTED_CLASS + ':' +text;

			//add class if not exists
			for(mode in responsive.data)
			{
				let found = false;
				let style_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css).querySelectorAll('#'+SELECTED_CLASS);
				for (var i = 0; i < style_holders.length; i++) {
					if(style_holders[i].getAttribute('name') == myclass){
						found = true;
						break;
					}
				}

				if(found){
					alert("This pseudo class already exists");
					return;
				}else{

					let div_class = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css);
					let div = document.createElement('div');
					div.id = SELECTED_CLASS;
					div.setAttribute('name',myclass);
					div.innerHTML = `<style>.${myclass}{}</style>`;
					div_class.appendChild(div);
				}
			}

		}

		properties.display_classes();
	},
	
	save_new_combo_class: function(e)
	{

		let holder = document.querySelector('.quickcode-item_classes .quickcode-new-combo-class-holder');

		if(!SELECTED_CLASS){
			alert("1:Please select a class first");
			holder.querySelector('input').select();
			return;
		}

		let text = holder.querySelector('input').value.trim();

		if(text == ''){
			alert("Please enter a valid combo class name");
			holder.querySelector('input').select();
			return;
		}

		if(text.match(/[^a-z0-9_\-]/gi)){
			alert("The only special characters allowed are underscore & hyphen");
			holder.querySelector('input').select();
			return;
		}

		if(selector.selected.length > 0)
		{
			let action = holder.querySelector('.action').value.trim();
			let combiner = holder.querySelector('.combiner').value.trim();
			let affected_class = holder.querySelector('.affected_class').value.trim();

			let myclass = SELECTED_CLASS + ':' + action + ' ' +combiner+ ' .'+affected_class;
			myclass = myclass.replaceAll(/\s+/g,'');

			//add class if not exists
			for(mode in responsive.data)
			{
				let found = false;
				let style_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css).querySelectorAll('#'+SELECTED_CLASS);
				for (var i = 0; i < style_holders.length; i++) {
					if(style_holders[i].getAttribute('name') == myclass){
						found = true;
						break;
					}
				}

				if(found){
					alert("This combo class already exists");
					return;
				}else{

					let div_class = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css);
					let div = document.createElement('div');
					div.id = SELECTED_CLASS;
					div.setAttribute('action',action);
					div.setAttribute('combiner',combiner);
					div.setAttribute('affected_class',affected_class);
					div.setAttribute('name',myclass);
					div.innerHTML = `<style>.${myclass.replace('--space--',' ')}{}</style>`;
					div_class.appendChild(div);
				}
			}

		}

		properties.display_classes();
	},
	
	select_class: function(checked,class_name)
	{
		actions.show_pseudo_class(false);
		actions.show_combo_class(false);
		SELECTED_SUDO_CLASS = null;
		SELECTED_COMBO_CLASS = null;


		let boxes = document.querySelector('.quickcode-item_classes').querySelectorAll('.quickcode-text-input-holder');
		for (var i = 0; i < boxes.length; i++) {
			boxes[i].classList.add('quickcode-d-none');
		}

		if(checked && selector.selected.length > 0)
		{
			if(selector.selected[0].classList.contains(class_name))
				SELECTED_CLASS = class_name;
		}

		
		properties.load();
		properties.display_classes();

	},

	show_pseudo_class: function(checked)
	{
		
		if(SELECTED_CLASS && SELECTED_SUDO_CLASS)
		{

			let to_activate = [];
			let mode = '';
			for(mode in responsive.data)
			{
				to_activate.push(mode);
				if(mode == responsive.mode)
					break;
			}

			for (var y = 0; y < to_activate.length; y++) {
				
				mode = to_activate[y];

				let class_holder;
				let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css).querySelectorAll('#'+SELECTED_CLASS);
				for (var i = 0; i < class_holders.length; i++) {
					if(class_holders[i].getAttribute('name') == SELECTED_SUDO_CLASS)
					{
						class_holder = class_holders[i];
						break;
					}
				}

				if(class_holder)
				{

					if(checked){
						if(!SELECTED_SUDO_CLASS.includes('hover') && !SELECTED_SUDO_CLASS.includes('checked'))
							return;

						SHOW_SUDO_CLASS = true;
						if(class_holder)
							class_holder.children[0].innerHTML = class_holder.children[0].innerHTML.replace('.'+SELECTED_SUDO_CLASS,'.'+SELECTED_CLASS);
					}else{
						SHOW_SUDO_CLASS = false;
						if(class_holder && !class_holder.children[0].innerHTML.includes(SELECTED_SUDO_CLASS))
							class_holder.children[0].innerHTML = class_holder.children[0].innerHTML.replace('.'+SELECTED_CLASS,'.'+SELECTED_SUDO_CLASS);
					}
				}
			}
		}

		selector.refresh_selector_box();
	},

	show_combo_class: function(checked)
	{
		
		if(SELECTED_CLASS && SELECTED_COMBO_CLASS)
		{

			let to_activate = [];
			let mode = '';
			for(mode in responsive.data)
			{
				to_activate.push(mode);
				if(mode == responsive.mode)
					break;
			}

			for (var y = 0; y < to_activate.length; y++) {
				
				mode = to_activate[y];
				
				let class_holder;
				let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css).querySelectorAll('#'+SELECTED_CLASS);
				for (var i = 0; i < class_holders.length; i++) {
					if(class_holders[i].getAttribute('name') == SELECTED_COMBO_CLASS)
					{
						class_holder = class_holders[i];
						break;
					}
				}

				if(class_holder)
				{
					let affected_class = class_holder.getAttribute('affected_class');

					if(checked){
						SHOW_COMBO_CLASS = true;
						class_holder.children[0].innerHTML = class_holder.children[0].innerHTML.replace('.'+SELECTED_COMBO_CLASS.replace('--space--',' '),'.'+affected_class);
					}else{
						SHOW_COMBO_CLASS = false;
						if(!class_holder.children[0].innerHTML.includes(SELECTED_COMBO_CLASS))
							class_holder.children[0].innerHTML = class_holder.children[0].innerHTML.replace('.'+affected_class,'.'+SELECTED_COMBO_CLASS.replace('--space--',' '));
					}
				}
			}
		}

		selector.refresh_selector_box();
	},

	reset_sudos: function()
	{
		actions.show_pseudo_class(false);
		actions.show_combo_class(false);
		SELECTED_SUDO_CLASS = null;
		SHOW_SUDO_CLASS = false;
		SELECTED_COMBO_CLASS = null;
		SHOW_COMBO_CLASS = false;
	},

	select_pseudo_class: function(checked,class_name)
	{
		//actions.show_pseudo_class(false);
		let boxes = document.querySelector('.quickcode-item_classes .quickcode-pseudo-classes').querySelectorAll('.quickcode-text-input-holder');
		for (var i = 0; i < boxes.length; i++) {
			boxes[i].classList.add('quickcode-d-none');
		}

		if(checked && selector.selected.length > 0)
		{
			if(class_name == '')
			{
				actions.show_pseudo_class(false);
				SELECTED_SUDO_CLASS = null;
				SHOW_SUDO_CLASS = false;
			}else{

				let clean_name = class_name.split(':')[0];
				if(selector.selected[0].classList.contains(clean_name))
					SELECTED_SUDO_CLASS = class_name;
			}
		}

		SELECTED_COMBO_CLASS = null;
		SHOW_COMBO_CLASS = false;

		actions.show_pseudo_class(true);
		properties.load();
		properties.display_classes();

	},

	select_combo_class: function(checked,class_name)
	{
		//actions.show_combo_class(false);
		let boxes = document.querySelector('.quickcode-item_classes .quickcode-combo-classes').querySelectorAll('.quickcode-text-input-holder');
		for (var i = 0; i < boxes.length; i++) {
			boxes[i].classList.add('quickcode-d-none');
		}

		if(checked && selector.selected.length > 0)
		{
			if(class_name == '')
			{
				actions.show_combo_class(false);
				SELECTED_COMBO_CLASS = null;
				SHOW_COMBO_CLASS = false;
			}else{

				let clean_name = class_name.split(':')[0];
				if(selector.selected[0].classList.contains(clean_name)){
					SELECTED_COMBO_CLASS = class_name;
				}
			}
		}

		SELECTED_SUDO_CLASS = null;
		SHOW_SUDO_CLASS = false;

		actions.show_combo_class(true);
		properties.load();
		properties.display_classes();

	},

	edit_class: function()
	{
		if(SELECTED_CLASS && selector.selected.length > 0)
		{
			let boxes = document.querySelector('.quickcode-item_classes').querySelectorAll('.quickcode-text-input-holder');
			for (var i = 0; i < boxes.length; i++) {
				boxes[i].classList.add('quickcode-d-none');
			}
			document.querySelector('.quickcode-item_classes').querySelector('#'+SELECTED_CLASS).classList.remove('quickcode-d-none');
			document.querySelector('.quickcode-item_classes').querySelector('#'+SELECTED_CLASS).querySelector('.quickcode-text-input').select();
		}

	},

	save_edited_class: function(new_class,old_class)
	{
		//sanitize
		new_class = new_class.replaceAll(/\s+/g,'');
		new_class = new_class.replaceAll(/[^a-z0-9_\-]/gi,'');

		if(new_class.trim() == ''){
			alert("A valid class name is required!");
			document.querySelector('.quickcode-item_classes').querySelector('#'+SELECTED_CLASS).querySelector('.quickcode-text-input').focus();
			return;
		}

		if(SELECTED_CLASS && selector.selected.length > 0)
		{
			for (var i = 0; i < selector.selected.length; i++) {
				
				selector.selected[i].classList.remove(old_class);
				selector.selected[i].classList.add(new_class);
			}
		}

		//change only if class if not exists
		let test = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+new_class);
		if(test)
		{
			
			//remove class if no item is linked
			test = CANVAS.querySelector('.'+old_class);
			if(!test)
			{
				if(confirm("No item is associated with with class: "+old_class+". Would you like to delete it?!"))
				{
					for(mode in responsive.data)
					{
						let div_class = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css).querySelector('#'+old_class);
						if(div_class)
							div_class.parentNode.removeChild(div_class);

						let div_classes = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css).querySelectorAll('#'+old_class);
						if(div_classes){
							for (var i = 0; i < div_classes.length; i++) {
								div_classes[i].parentNode.removeChild(div_classes[i]);
							}
						}
					}
				}
			}

		}else{

			for(mode in responsive.data)
			{
 				test = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css).querySelector('#'+old_class);
				if(test)
				{
					test.children[0].innerHTML = test.children[0].innerHTML.replace(/\.[a-z0-9_\-]+/i,'.'+new_class);
					test.id = new_class;
				}

				//rename sudo classes too
				let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css).querySelectorAll('#'+old_class);
				if(class_holders)
				{
					for (var i = 0; i < class_holders.length; i++) {
						
						class_holders[i].children[0].innerHTML = class_holders[i].children[0].innerHTML.replace(/\.[a-z0-9_\-]+/i,'.'+new_class);
						class_holders[i].id = new_class;
						let old_name = class_holders[i].getAttribute('name');
						class_holders[i].setAttribute('name',old_name.replace(/^[a-z0-9_\-]+/i,new_class));
					}
				}
			}

		}

		SELECTED_CLASS = new_class;
		properties.display_classes();

	},

	select_by_class: function()
	{
		if(SELECTED_CLASS)
		{

			let items = CANVAS.querySelectorAll('.'+SELECTED_CLASS);
			selector.selected = [];

			for (var i = 0; i < items.length; i++) {
				selector.selected.push(items[i]);
			}

			selector.redraw_selector_box();
		}
	},

	copy_class: function()
	{
		if(SELECTED_CLASS)
			COPIED_CLASS = SELECTED_CLASS;
		else
			alert("2:Please select a class first");
	},

	paste_class: function()
	{
		if(selector.selected.length == 0){
			alert("Please select an item first");
		}else{

			if(COPIED_CLASS){
				for (var i = 0; i < selector.selected.length; i++) {
					selector.selected[i].classList.add(COPIED_CLASS);
				}
			}else{
				alert("Please copy a class first");
			}

			properties.display_classes();
		}
	},
	
	delete_class: function()
	{

		if(SELECTED_CLASS && selector.selected.length > 0)
		{
			if(selector.selected[0].classList.length > 1){

				if(!confirm("Are you sure you want to delete the selected class?!"))
					return;
				selector.selected[0].classList.remove(SELECTED_CLASS);

				//remove class if no item is linked
				let test = CANVAS.querySelector('.'+SELECTED_CLASS);
				if(!test)
				{
					if(confirm("No item is linked to this class anymore. Remove it?"))
					{
						let div_class;
						for(mode in responsive.data)
						{
							div_class = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css).querySelector('#'+SELECTED_CLASS);
							if(div_class)
								div_class.parentNode.removeChild(div_class);

							//remove sudo versions too
							let div_classes = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css).querySelectorAll('#'+SELECTED_CLASS);
							if(div_classes){
								for (var i = 0; i < div_classes.length; i++) {
									div_classes[i].parentNode.removeChild(div_classes[i]);
								}
							}

							//remove combo versions too
							div_classes = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css).querySelectorAll('#'+SELECTED_CLASS);
							if(div_classes){
								for (var i = 0; i < div_classes.length; i++) {
									div_classes[i].parentNode.removeChild(div_classes[i]);
								}
							}
							
						}
					}
				}

				SELECTED_CLASS = null;

			}
			else{
				alert("Error: You cant delete the last class on an element");
			}
		}

		SELECTED_CLASS = null;
		properties.display_classes();
	},
	
	delete_pseudo_class: function()
	{

		if(SELECTED_CLASS && SELECTED_SUDO_CLASS && selector.selected.length > 0)
		{

			if(!confirm("Are you sure you want to delete the selected pseudo class?!"))
				return;

				let div_class;
				for(mode in responsive.data)
				{

					let div_classes = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css).querySelectorAll('#'+SELECTED_CLASS);
					if(div_classes){
						for (var i = 0; i < div_classes.length; i++) {

							if(div_classes[i].getAttribute('name') == SELECTED_SUDO_CLASS)
								div_classes[i].parentNode.removeChild(div_classes[i]);
						}
					}
					
				}

			SELECTED_SUDO_CLASS = null;
			SHOW_SUDO_CLASS = false;

		}

		properties.display_classes();
	},
	
	delete_combo_class: function()
	{

		if(SELECTED_CLASS && SELECTED_COMBO_CLASS && selector.selected.length > 0)
		{

			if(!confirm("Are you sure you want to delete the selected combo class?!"))
				return;

				let div_class;
				for(mode in responsive.data)
				{

					let div_classes = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css).querySelectorAll('#'+SELECTED_CLASS);
					if(div_classes){
						for (var i = 0; i < div_classes.length; i++) {

							if(div_classes[i].getAttribute('name') == SELECTED_COMBO_CLASS)
								div_classes[i].parentNode.removeChild(div_classes[i]);
						}
					}

				}

			SELECTED_COMBO_CLASS = null;
			SHOW_COMBO_CLASS = false;

		}

		properties.display_classes();
	},
	
	
	mute_class: function(class_name)
	{
		let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+class_name);
		
		if(MUTED_CLASSES.includes(class_name))
		{
			for (var i = 0; i < MUTED_CLASSES.length; i++) {
				if(MUTED_CLASSES[i] == class_name){
					MUTED_CLASSES.splice(i,1);

					if(class_holder){
						let reg = new RegExp(".--muted--"+class_name);
						class_holder.innerHTML = class_holder.innerHTML.replace(reg,'.'+class_name);
					}
				}
			}
		}else{
			MUTED_CLASSES.push(class_name);
			
			if(class_holder){
				let reg = new RegExp("."+class_name);
				class_holder.innerHTML = class_holder.innerHTML.replace(reg,'.--muted--'+class_name);
			}
		}

		properties.display_classes();

	},

	mute_pseudo_class: function(class_name)
	{
		actions.show_pseudo_class(false);
		let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.sudo_css).querySelectorAll('#'+SELECTED_CLASS);
		
		for (var i = 0; i < class_holders.length; i++) {
			
			if(class_name != class_holders[i].getAttribute('name'))
				continue;

			let class_holder = class_holders[i];
			if(MUTED_CLASSES.includes(class_name))
			{
				for (var i = 0; i < MUTED_CLASSES.length; i++) {
					if(MUTED_CLASSES[i] == class_name){
						MUTED_CLASSES.splice(i,1);

						if(class_holder){
							let reg = new RegExp(".--muted--"+class_name);
							class_holder.innerHTML = class_holder.innerHTML.replace(reg,'.'+class_name);
						}
					}
				}
			}else{
				MUTED_CLASSES.push(class_name);
				
				if(class_holder){
					let reg = new RegExp("."+class_name);
					class_holder.innerHTML = class_holder.innerHTML.replace(reg,'.--muted--'+class_name);
					if(class_name == SELECTED_SUDO_CLASS)
						SELECTED_SUDO_CLASS = null;
				}
			}
		}

		properties.display_classes();

	},

	mute_combo_class: function(class_name)
	{
		actions.show_combo_class(false);
		let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.combo_css).querySelectorAll('#'+SELECTED_CLASS);
		
		for (var i = 0; i < class_holders.length; i++) {
			
			if(class_name != class_holders[i].getAttribute('name'))
				continue;

			let class_holder = class_holders[i];
			if(MUTED_CLASSES.includes(class_name))
			{
				for (var i = 0; i < MUTED_CLASSES.length; i++) {
					if(MUTED_CLASSES[i] == class_name){
						MUTED_CLASSES.splice(i,1);

						if(class_holder){
							class_name = class_name.replace('--space--',' ');
							let reg = new RegExp(".--muted--"+class_name);
							class_holder.innerHTML = class_holder.innerHTML.replace(reg,'.'+class_name);
						}
					}
				}
			}else{
				MUTED_CLASSES.push(class_name);
				
				if(class_holder){
					class_name = class_name.replace('--space--',' ');
					let reg = new RegExp("."+class_name);
					class_holder.innerHTML = class_holder.innerHTML.replace(reg,'.--muted--'+class_name);
					if(class_name == SELECTED_SUDO_CLASS)
						SELECTED_SUDO_CLASS = null;
				}
			}
		}

		properties.display_classes();

	},

	get_class_styles: function(required_style = null)
	{

		if(!SELECTED_CLASS)
			return [];

		let myclass = SELECTED_CLASS;
		let parts = [];

		if(myclass != ''){

			let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+myclass);
			if(class_holder && class_holder.children.length > 0){

				//switch to sudo class if needed
				if(SELECTED_SUDO_CLASS)
				{
					let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.sudo_css).querySelectorAll('#'+myclass);
					for (var i = 0; i < class_holders.length; i++) {

						if(class_holders[i].getAttribute('name') == SELECTED_SUDO_CLASS)
						{
							class_holder = class_holders[i];
							break;
						}
					}
				}

				//switch to combo class if needed
				if(SELECTED_COMBO_CLASS)
				{
					let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.combo_css).querySelectorAll('#'+myclass);
					for (var i = 0; i < class_holders.length; i++) {

						if(class_holders[i].getAttribute('name') == SELECTED_COMBO_CLASS)
						{
							class_holder = class_holders[i];
							break;
						}
					}
				}


				styles = class_holder.children[0].innerHTML.match(/\{[^\}]+/);
				if(styles){

					styles = styles[0].replace(/[\n\r\t\{\}]+/gi,'');
					styles = styles.replace(/\;{2,}/gi,';');
					parts = styles.split(';');
					for (var i = 0; i < parts.length; i++) {
						parts[i] = parts[i].trim();
					}
				}
			}
		}

		if(required_style){
			let box = selector.selected[0].getBoundingClientRect();
			//let required = ['height','width','left','top'];
				let required = [required_style];

			let missing = [];

			for (var x = 0; x < required.length; x++) {
				let style_name = required[x];
				let found = false;
				for (var i = 0; i < parts.length; i++) {

					let reg = new RegExp('^'+style_name);
					if(parts[i].match(reg)){
						found = true;
						break;
					}

				}

				if(!found)
					missing.push(style_name);
			}

			for (var i = 0; i < missing.length; i++) {

				let prop = properties.get_default(missing[i],'style');
				parts.push(prop.default_property_prepend + missing[i] + ':' + Math.round(box[missing[i]]) + prop.default_property_append);
			}
		}

		return parts;
	},

	set_class_styles: function(arr)
	{
		if(!SELECTED_CLASS)
			return [];

		let myclass = SELECTED_CLASS;
		let parts = [];

		if(myclass != ''){

			let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+myclass);
			if(!class_holder)
				class_holder = actions.create_main_class(SELECTED_CLASS);

			//switch to sudo class if needed
			if(SELECTED_SUDO_CLASS)
			{
				let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.sudo_css).querySelectorAll('#'+myclass);
				for (var i = 0; i < class_holders.length; i++) {
					if(class_holders[i].getAttribute('name') == SELECTED_SUDO_CLASS)
					{
						class_holder = class_holders[i];
						break;
					}
				}

				if(!class_holder)
					class_holder = actions.create_sudo_class(SELECTED_SUDO_CLASS);

				let setclass = SELECTED_SUDO_CLASS;
				if(SHOW_SUDO_CLASS)
					setclass = SELECTED_CLASS;

				class_holder.innerHTML = `
					<style>.${setclass}{${arr.join(';')}}</style>
				`;

			}

			//switch to combo class if needed
			if(SELECTED_COMBO_CLASS)
			{
				let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.combo_css).querySelectorAll('#'+myclass);
				for (var i = 0; i < class_holders.length; i++) {
					if(class_holders[i].getAttribute('name') == SELECTED_COMBO_CLASS)
					{
						class_holder = class_holders[i];
						break;
					}
				}

				if(!class_holder)
					class_holder = actions.create_combo_class(SELECTED_COMBO_CLASS);

				let setclass = SELECTED_COMBO_CLASS.replace('--space--',' ');
				if(SHOW_COMBO_CLASS)
					setclass = SELECTED_CLASS;

				class_holder.innerHTML = `
					<style>.${setclass}{${arr.join(';')}}</style>
				`;

			}

			if(!SELECTED_SUDO_CLASS && !SELECTED_COMBO_CLASS){

				class_holder.innerHTML = `
					<style>.${SELECTED_CLASS}{${arr.join(';')}}</style>
				`;
			}

			
		}

	},

	put_class_styles: function(class_name,parts)
	{
		let class_holder;
		if(class_name.trim() != ''){

			if(SELECTED_SUDO_CLASS)
			{
				let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.sudo_css).querySelectorAll('#'+class_name);
				for (var h = 0; h < class_holders.length; h++) {
					if(class_holders[h].getAttribute('name') == SELECTED_SUDO_CLASS)
					{
						class_holder = class_holders[h].children[0];
						break;
					}
				}
				
				if(!SHOW_SUDO_CLASS)
					class_name = SELECTED_SUDO_CLASS;
			}else

			if(SELECTED_COMBO_CLASS)
			{
				let found_index = 0;
				let class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.combo_css).querySelectorAll('#'+class_name);
				for (var h = 0; h < class_holders.length; h++) {
					if(class_holders[h].getAttribute('name') == SELECTED_COMBO_CLASS)
					{
						found_index = h;
						class_holder = class_holders[h].children[0];
						break;
					}
				}
				
				if(SHOW_COMBO_CLASS){
					class_name = class_holders[found_index].getAttribute('affected_class');
				}else{
					class_name = SELECTED_COMBO_CLASS.replace('--space--',' ');
				}
			}

			if(!SELECTED_COMBO_CLASS && !SELECTED_SUDO_CLASS){

				class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+class_name).children[0];
			}
			

			class_holder.innerHTML = `.${class_name}{${parts.join(';')}}`;
		}

	},

	set_temp_undo: function()
	{

	},

	save_temp_undo: function()
	{

	},

	undo: function()
	{
		/*actions.undo_index++;
		if(actions.undo_index > actions.undo_data.length - 1)
			actions.undo_index = actions.undo_data.length;*/
/*
		if(actions.undo_index <= 0)
			actions.undo_index = 1;*/
		
		let data = {};
		if(actions.undo_data.length > 0){
			if(actions.undo_index >= actions.undo_data.length){
				alert("No more undos left!");
				return;
			}

			data = actions.undo_data[actions.undo_index];

			for(key in data.css)
			{
				IFRAME.contentWindow.document.querySelector('.'+ responsive.data[key].main_css).innerHTML = data.css[key].main_css;
				IFRAME.contentWindow.document.querySelector('.'+ responsive.data[key].sudo_css).innerHTML = data.css[key].sudo_css;
			}

			CANVAS.innerHTML = data.html;

			selector.selected = [];
			for (var i = 0; i < data.selected.length; i++) {
				selector.selected.push(CANVAS.querySelector('#'+data.selected[i]));
			}

		}

		actions.undo_index++;
		properties.load();
		selector.refresh_selector_box();
		actions.init_js();
	},

	init_js: function()
	{
		tabber.init();
		dropper.init();
		CHART.init();
		SLIDER.init();
		CARD_SLIDER.init();
	},

	redo: function()
	{
		actions.undo_index--;
		if(actions.undo_index < 0)
			actions.undo_index = -1;

		if(actions.undo_index >= actions.undo_data.length - 1)
			actions.undo_index = actions.undo_data.length - 2;
		
		let data = {};
		if(actions.undo_data.length > 0){
			if(actions.undo_index < 0){
				alert("No more redos left!");
				return;
			}

			data = actions.undo_data[actions.undo_index];

			for(key in data)
			{
				IFRAME.contentWindow.document.querySelector('.'+ responsive.data[key].main_css).innerHTML = data[key].main_css;
				IFRAME.contentWindow.document.querySelector('.'+ responsive.data[key].sudo_css).innerHTML = data[key].sudo_css;
			}
		}

		properties.load();
		selector.refresh_selector_box();
	},

	save_undo_data: function()
	{
/*		if(!DATA.DIRTY_DATA)
			return;
*/
		actions.undo_index = 0;

		let data = {
			css: {
				monitor: {
					main_css: IFRAME.contentWindow.document.querySelector('.'+ responsive.data['monitor'].main_css).innerHTML,
					sudo_css: IFRAME.contentWindow.document.querySelector('.'+ responsive.data['monitor'].sudo_css).innerHTML,
				},
			},

			html: CANVAS.innerHTML,
			selected: [],
		};

		for (var i = 0; i < selector.selected.length; i++) {
			data.selected.push(selector.selected[i].id);
		}

		if(actions.undo_data.length >= actions.undo_levels)
			actions.undo_data.pop();

		//actions.undo_data.push(data);
		actions.undo_data.splice(0,0,data);

	},

	create_main_class: function(selected_class)
	{
		let div = IFRAME.contentWindow.document.createElement('div');
		div.id = selected_class;
		div.innerHTML = `<style>.${selected_class}{}</style>`;

		IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).appendChild(div);
		return div;
	},

	create_sudo_class: function(selected_sudo_class)
	{
		let div = IFRAME.contentWindow.document.createElement('div');
		div.id = SELECTED_CLASS;
		div.innerHTML = `<style>.${selected_sudo_class}{}</style>`;

		IFRAME.contentWindow.document.querySelector('.'+responsive.sudo_css).appendChild(div);
		return div;
	},

	create_combo_class: function(selected_sudo_class)
	{
		let div = IFRAME.contentWindow.document.createElement('div');
		div.id = SELECTED_CLASS;
		div.innerHTML = `<style>.${selected_combo_class.replace('--space--',' ')}{}</style>`;

		IFRAME.contentWindow.document.querySelector('.'+responsive.combo_css).appendChild(div);
		return div;
	},

	onlyUnique:	function (value, index, self)
	{
	  return self.indexOf(value) === index;
	},

	set_property: function(element)
	{
		if(CANVAS_EMPTY)
			return;
		
		if(!SELECTED_CLASS)
		{
			alert("3:Please select a class first");
			return;
		}

		if(MUTED_CLASSES.includes(SELECTED_CLASS))
		{
			alert("You cant edit properties of a muted class");
			return;
		}
		
		actions.save_undo_data();
		DATA.DIRTY_DATA = false;

		let parent = selector.get_parent_from_class("quickcode-property-group",element);

		if(!parent)
			return;

		let value = parent.querySelector('.quickcode-data-source').value.trim().replace('/\t\n\r/','');

		let property_name = parent.getAttribute('property');
		if(element.type == 'checkbox' && !element.checked){
			actions.remove_property(property_name);
			return;
		}
		let property_append = parent.getAttribute('propertyAppend');
		let property_prepend = parent.getAttribute('propertyPrepend');
		let property_type = parent.getAttribute('propertyType');
		let use_property_append = parent.getAttribute('usePropertyAppend');

		//check if append type change
		if(element.name == property_name+'AppendType')
		{
			parent.setAttribute('propertyAppend',element.value);
			property_append = element.value;
		}
		///

		//for (var i = 0; i < selector.selected.length; i++) {

			let myclass = SELECTED_CLASS;
			let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+myclass);

			if(!class_holder)
				class_holder = actions.create_main_class(SELECTED_CLASS);
			
			let class_holders = [];
			if(SELECTED_SUDO_CLASS)
			{
				class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.sudo_css).querySelectorAll('#'+myclass);
				if(class_holders.length == 0)
					class_holders = actions.create_sudo_class(SELECTED_SUDO_CLASS);

				for (var h = 0; h < class_holders.length; h++) {
					if(class_holders[h].getAttribute('name') == SELECTED_SUDO_CLASS)
					{
						class_holder = class_holders[h];
						break;
					}
				}
			}else

			if(SELECTED_COMBO_CLASS)
			{
				class_holders = IFRAME.contentWindow.document.querySelector('.'+responsive.combo_css).querySelectorAll('#'+myclass);
				if(class_holders.length == 0)
					class_holders = actions.create_sudo_class(SELECTED_COMBO_CLASS);

				for (var h = 0; h < class_holders.length; h++) {
					if(class_holders[h].getAttribute('name') == SELECTED_COMBO_CLASS)
					{
						class_holder = class_holders[h];
						break;
					}
				}
			}

			let parts = actions.get_class_styles();

			if(property_name == 'style'){
				
				class_holder.children[0].innerHTML = `.${myclass}{${value.replaceAll(/\n|\r/gi,'')}}`;
			}else{
				
				if(property_type == 'style')
				{
					let found = false;
					for (var x = 0; x < parts.length; x++) {
						
						if(parts[x] == '')
							continue;

						let segment = parts[x].split(":");
						if(property_name == segment[0].trim())
						{
							if(use_property_append == 'false'){
								parts[x] = segment[0]+':'+property_prepend+value;
							}
							else{
								parts[x] = segment[0]+':'+property_prepend+value+property_append;
							}
							
							found = true;
							break;
						}
					}

					if(!found)
						parts[parts.length] = `${property_name}:${property_prepend}${value}${property_append}`;

					actions.put_class_styles(myclass,parts);
					
				}else
				if(property_type == 'attribute'){

					for (var i = 0; i < selector.selected.length; i++) {

						if(property_name == 'class')
						{
							//include other classes
							let myclasses = selector.selected[i].classList;
							for (var b = 0; b < myclasses.length; b++) {
								if(myclasses[b].includes('bi-') || myclasses[b] == 'bi')
									continue;

								value += ' '+ myclasses[b];
							}
							selector.selected[i].setAttribute(property_name,property_prepend+value+property_append);
						}else
						if(property_name == 'src')
						{
							selector.selected[i].setAttribute(property_name,property_prepend+value+property_append);
							
							if(!selector.selected[i].complete){

								let loader = document.createElement('div');
								loader.id = 'loader';
								loader.style = 'margin-right:-100px;margin-bottom:-40px;position:relative;display:inline-block;pointer-events:none;background-color:black;color:white;padding: 2px;font-size:11px;font-style:italic';
								loader.innerHTML = 'replacing image...';

								selector.selected[i].parentNode.insertBefore(loader,selector.selected[i]);
								selector.refresh_selector_box();

								selector.selected[i].addEventListener('load',function(e){
									e.target.parentNode.querySelector('#loader').remove();
									selector.refresh_selector_box();
								});
								selector.selected[i].addEventListener('error',function(e){
									e.target.parentNode.querySelector('#loader').remove();
									selector.refresh_selector_box();
								});
								
							}
							
						}else{

							selector.selected[i].setAttribute(property_name,property_prepend+value+property_append);
							
							if(property_name.includes('chart-'))
								CHART.update(selector.selected[0],true);
						}
					}
					
				}else
				if(property_type == 'tableAttribute')
				{

					let table = selector.get_parent_from_tagname('table',selector.selected[0]);
					if(typeof table == 'undefined' || !table)
					{
						alert("Please select a table row or column");
						return;
					}

					if(property_name == 'columns')
					{
						
						let tr = table.querySelectorAll("tr");
						let columncount = tr[0].children.length;
						
						if(columncount < parseInt(value))
						{
							//add columns
							let toadd = parseInt(value - columncount);
							for (var s = 0; s < tr.length; s++) {
								
								for (var x = 0; x < toadd; x++)
								{
									let tag = tr[s].children[tr[s].children.length - 1];
									let ele = document.createElement(tag.tagName);
									ele.id = 'item_'+DATA.ITEM_COUNT;
									ele.setAttribute('class',tr[s].children[tr[s].children.length - 1].getAttribute('class'));
									ele.innerHTML = '';
									if(s == 0)
										ele.innerHTML = 'Column';

									DATA.ITEM_COUNT++;
									tr[s].appendChild(ele);
								}
							}
						}else 
						if(columncount > parseInt(value))
						{	
							//remove columns
							let toremove = columncount - parseInt(value);
							
							for (var s = 0; s < tr.length; s++) {
								let z = 0;
								for (var x = 0; x < toremove; x++)
								{
									z++;
									tr[s].children[tr[s].children.length - 1].remove();
								}
							}
						}
							
					}else
					if(property_name == 'rows')
					{

						let tr = table.querySelectorAll("tr");
						let rowcount = tr.length;
						
						if(rowcount < parseInt(value))
						{
							//add rows
							let toadd = parseInt(value - rowcount);
							for (var x = 0; x < toadd; x++)
							{
								let new_row = document.createElement('tr');
								new_row.id = 'item_'+DATA.ITEM_COUNT;
								new_row.setAttribute('class',tr[tr.length-1].getAttribute('class'));
								DATA.ITEM_COUNT++;

								let last_row_childcount = tr[tr.length-1].children.length; 
								for (var y = 0; y < last_row_childcount; y++) {
									let td = document.createElement(tr[tr.length-1].children[y].tagName);
									td.id = 'item_'+DATA.ITEM_COUNT;
									td.setAttribute('class',tr[tr.length-1].children[last_row_childcount-1].getAttribute('class'));

									if(y == 0)
										td.innerHTML = tr[tr.length-1].children[y].innerHTML;
									DATA.ITEM_COUNT++;
									new_row.appendChild(td);
								}
 
								tr[tr.length-1].parentNode.appendChild(new_row);
							}
						}else 
						if(rowcount > parseInt(value))
						{	
							//remove rows
							let toremove = rowcount - parseInt(value);
							
							for (var s = 0; s < tr.length; s++) {
								let z = 0;
								for (var x = 0; x < toremove; x++)
								{
									z++;
									tr[tr.length - 1].remove();
								}
							}
						}

						
					}
				}

			}
		//}

		selector.refresh_selector_box();
	},

	remove_property: function(property_name, type = 'style')
	{
		if(!SELECTED_CLASS)
			return;

		if(type == 'attribute')
		{
			for (var i = 0; i < selector.selected.length; i++) {
				selector.selected[i].removeAttribute(property_name);
			}
			properties.load();
		}else{

			let myclass = SELECTED_CLASS;
			let class_holder = IFRAME.contentWindow.document.querySelector('.'+responsive.main_css).querySelector('#'+myclass);

			if(class_holder)
			{
				let class_str = class_holder.children[0].innerHTML;
				let parts = actions.get_class_styles();
				for (var i = 0; i < parts.length; i++) {
					let segments = parts[i].split(':');
					if(property_name == segments[0].trim())
					{
						parts.splice(i,1);
					}
				}

				actions.set_class_styles(parts);
				properties.load();
			}
		}

		selector.refresh_selector_box();
	},

	set_style: function(element, style_name, value, inline = false)
	{
		if(typeof value != 'string')
			value = "";
		
		if(!SELECTED_CLASS)
			return value;

		let parts = actions.get_class_styles(style_name);

		let reg = new RegExp('^'+style_name,'i');

		if(style_name == 'position')
		{
			//compensate to visual position to avoid snapping
			if(value == 'relative')
			{

				element.style['left'] =  "0px";
				element.style['top'] =  "0px";
			}else
			{
				element.style['left'] = element.offsetLeft + "px";
				element.style['top'] = element.offsetTop + "px";
			}
			
		}

		if(value.match(/rotate\(\-*[0-9]+deg\)/i))
		{
			let cur = element.style['transform'];
			if(cur.match(/rotate\(\-*[0-9]+deg\)/i))
			{
				element.style['transform'] = cur.replace(/rotate\(\-*[0-9]+deg\)/i,value);
			}else{

				element.style['transform'] = cur + ' ' + value;
			}

		}else
		if(value.match(/scale\([0-9\.]+\)/i))
		{

			let cur = element.style['transform'];
			if(cur.match(/scale\([0-9\.]+\)/i))
			{
				element.style['transform'] = cur.replace(/scale\([0-9\.]+\)/i,value);
			}else{

				element.style['transform'] = cur + ' ' + value;
			}
			
		}else
		if(value.match(/translateX\(\-*[0-9\.]+px\)/i))
		{

			let cur = element.style['transform'];
			if(cur.match(/translateX\(\-*[0-9\.]+px\)/i))
			{
				element.style['transform'] = cur.replace(/translateX\(\-*[0-9\.]+px\)/i,value);
			}else{

				element.style['transform'] = cur + ' ' + value;
			}
			
		}else
		if(value.match(/translateY\(\-*[0-9\.]+px\)/i))
		{

			let cur = element.style['transform'];
			if(cur.match(/translateY\(\-*[0-9\.]+px\)/i))
			{
				element.style['transform'] = cur.replace(/translateY\(\-*[0-9\.]+px\)/i,value);
			}else{

				element.style['transform'] = cur + ' ' + value;
			}
			
		}else{

			if(inline)
			{
				element.style[style_name] = value;
			}else{

				for (var i = 0; i < parts.length; i++) {

					if(parts[i].match(reg))
					{
						parts[i] = style_name + ':' + value;
						break;
					}
				}
			}

		}
		
		actions.set_class_styles(parts);
	},

	get_style: function(element, style_name, default_value = "")
	{
		let value = '';

		if(!SELECTED_CLASS)
			return value;

		let parts = actions.get_class_styles(style_name);
		let reg = new RegExp('^'+style_name,'i');

		if(style_name == 'rotate')
		{
			for (var i = 0; i < parts.length; i++) {
				if(parts[i].includes('transform') && parts[i].includes('rotate'))
				{
					let tempvalue = parts[i].match(/rotate\(\-*[0-9]+deg\)/i);
					if(tempvalue)
						value = tempvalue[0];
					break;
				}
			}

		}else
		if(style_name == 'scale')
		{
			for (var i = 0; i < parts.length; i++) {
				if(parts[i].includes('transform') && parts[i].includes('scale'))
				{
					let tempvalue = parts[i].match(/scale\([0-9\.]+\)/i);
					if(tempvalue)
						value = tempvalue[0];
					break;
				}
			}

		}else
		if(style_name == 'translateX')
		{
			for (var i = 0; i < parts.length; i++) {
				if(parts[i].includes('transform') && parts[i].includes('translateX'))
				{
					let tempvalue = parts[i].match(/translateX\(\-*[0-9\.]+px\)/i);
					if(tempvalue){
						value = tempvalue[0];
						break;
					}
				}
			}

		}else
		if(style_name == 'translateY')
		{
			for (var i = 0; i < parts.length; i++) {
				if(parts[i].includes('transform') && parts[i].includes('translateX'))
				{
					let tempvalue = parts[i].match(/translateY\(\-*[0-9\.]+px\)/i);
					if(tempvalue)
						value = tempvalue[0];
					break;
				}
			}

		}else{

			let required = ['height','width','left','top'];
			let found = false;
			for (var i = 0; i < parts.length; i++) {

				if(parts[i].match(reg))
				{
					found = true;
					let tempvalue = parts[i].split(':');
					if(tempvalue.length > 1){
						value = tempvalue[1].trim();
					}
					break;
				}
			}

			if(!found && required.includes(style_name))
			{
				let box = element.getBoundingClientRect();
				return box[style_name] + 'px';
			}
			
		}

		if(value.length)
			return value;

		return default_value;
	},

	update_combo_preview: function(e)
	{
		e.stopPropagation();
		e.currentTarget.querySelector('.result-action').innerHTML = e.currentTarget.querySelector('.action').value.trim();
		e.currentTarget.querySelector('.result-combiner').innerHTML = e.currentTarget.querySelector('.combiner').value.replace('--space--',' ');
		e.currentTarget.querySelector('.result-affected_class').innerHTML = e.currentTarget.querySelector('.affected_class').value.trim();
	},

	edit_text_content: function()
	{
		if(selector.selected.length == 0)
			return;

		if(!selector.selected[0].hasAttribute('editable'))
			return;

		let input = document.createElement('textarea');
		let text = selector.selected[0].innerHTML.trim().replaceAll('<br>',"\n");
		input.value = text;
		input.name = 'text-editor';
		input.style.minWidth = '100px';

		let box = selector.selected[0].getBoundingClientRect();
		selector.selected[0].innerHTML = '';
		input.setAttribute('onblur','parent.actions.save_text_content(event)');

		let styles = getComputedStyle(selector.selected[0]);
		
		selector.selected[0].appendChild(input);
		input.style.fontFamily = styles.fontFamily;
		input.style.fontSize = styles.fontSize;
		input.style.fontWeight = styles.fontWeight;
		input.setAttribute('style',input.getAttribute('style')+';text-align-last:'+styles.textAlign);
		input.style.width = box.width + 'px';
		input.style.height = box.height + 'px';
		input.focus();
		input.select();
	},

	save_text_content: function(e)
	{
		if(e.currentTarget.tagName == 'TEXTAREA' && e.currentTarget.name == 'text-editor'){
			let text = e.currentTarget.value.trim().replaceAll(/\n\r/g,'\n');
			e.currentTarget.parentNode.innerHTML = text.replaceAll(/\n/g,'<br>');
		}
	},

};
