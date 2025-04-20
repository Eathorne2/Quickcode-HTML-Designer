
window.addEventListener('load',function(){

	document.querySelector('.main-loader').style.display= 'none';

	document.querySelector('main').style.display = 'block';
	
	IFRAME.addEventListener('load',function(){

		IFRAME.contentWindow.addEventListener('keyup',function(e){

			if(event.shiftKey && e.keyCode == 37){
				submenu_actions.select_parent(e);
			}

			if(event.shiftKey && e.keyCode == 39){
				submenu_actions.select_child(e);
			}
			
		});

		CANVAS.addEventListener('keydown',function(){
			TREE.redraw();
		});

		CANVAS.addEventListener('selectstart',function(e){
			e.preventDefault();
			return false;
		});

		IFRAME.contentWindow.document.addEventListener('click',function(e){
			if(e.target.tagName == 'BUTTON' || selector.isChildOf('A',e.target) || selector.isChildOf('FORM',e.target)){
				e.preventDefault();
			}
		});

		IFRAME.contentWindow.document.addEventListener('dblclick',function(e){
			if(e.target.hasAttribute('editable')){
				e.preventDefault();
				actions.edit_text_content();
			}

		});

		setTimeout(function()
		{
			document.getElementById('SPLASH_LOADER').style.display = 'none';
		}, 5000);

		IFRAME.contentWindow.onmousedown = function(e)
		{
			selector.select_item(e.target);
			
			if(e.button == 2 && selector.selected.length > 0){
				if(selector.isChildOf('CANVAS',e.target))
					selector.show_sub_menu_dropdown(e);
			}else
			if(selector.selected.length == 0 || !selector.isChildOf('js-sub_menu',e.target)){
				selector.show_sub_menu_dropdown(e, false);
			}
		}

		IFRAME.contentWindow.onmouseup = function(e)
		{
			TREE_DRAG = false;
			PROPERTIES_DRAG = false;
			PAGE_LIST_DRAG = false;
			ITEM_RESIZE = false;
			mouse.set_mouse_up(e);
			
		}

		window.onmouseup = function(e)
		{
			TREE_DRAG = false;
			PROPERTIES_DRAG = false;
			PAGE_LIST_DRAG = false;
			ITEM_RESIZE = false;
			mouse.set_mouse_up(e);
			
		}

		/** look for shift or control key **/
		IFRAME.contentWindow.onkeydown = function(e)
		{
			if(e.keyCode == 16)
			{
				SHIFT_MODE = true;
			}else
			if(e.keyCode == 17)
			{
				CONTROL_MODE = true;
			}else
			if(e.keyCode == 27)//esc
			{
				image_loader.hide();
				open_dialog.hide();
				item_loader.hide();
			}else
			if(e.keyCode == 46)//delete
			{
				/*
				if(selector.selected.length == 0)
					return;

				for (var i = 0; i < selector.selected.length; i++)
				{
					selector.selected[i].remove();
				}

				selector.clear_selection();
				*/
			}else
			if(e.keyCode == 37)//left
			{
				if(selector.selected.length == 0)
					return;

				for (var i = 0; i < selector.selected.length; i++)
				{

					let left = actions.get_style(selector.selected[i], 'left', '0px');
					if(left.includes('px'))
					{
						left = parseInt(left.replace('px',''));
						actions.set_style(selector.selected[i], 'left', (left - 1) + 'px');
					}else
					if(left.includes('%'))
					{
						left = parseInt(left.replace('%',''));
						actions.set_style(selector.selected[i], 'left', (left - 1) + '%');
					}else 
					if(left.includes('em'))
					{
						left = parseInt(left.replace('em',''));
						actions.set_style(selector.selected[i], 'left', (left - 1) + 'em');
					}
				}

				selector.refresh_selector_box();
				selector.update_bounds_info();
			}else
			if(e.keyCode == 38)//up
			{
				if(selector.selected.length == 0)
					return;

				for (var i = 0; i < selector.selected.length; i++)
				{

					let top = actions.get_style(selector.selected[i], 'top', '0px');
					if(top.includes('px'))
					{
						top = parseInt(top.replace('px',''));
						actions.set_style(selector.selected[i], 'top', (top - 1) + 'px');
					}else
					if(top.includes('%'))
					{
						top = parseInt(top.replace('%',''));
						actions.set_style(selector.selected[i], 'top', (top - 1) + '%');
					}else 
					if(top.includes('em'))
					{
						top = parseInt(top.replace('em',''));
						actions.set_style(selector.selected[i], 'top', (top - 1) + 'em');
					}
				}

				selector.refresh_selector_box();
				selector.update_bounds_info();

			}else
			if(e.keyCode == 39)//right
			{
				if(selector.selected.length == 0)
					return;

				for (var i = 0; i < selector.selected.length; i++)
				{

					let left = actions.get_style(selector.selected[i], 'left', '0px');
					if(left.includes('px'))
					{
						left = parseInt(left.replace('px',''));
						actions.set_style(selector.selected[i], 'left', (left + 1) + 'px');
					}else
					if(left.includes('%'))
					{
						left = parseInt(left.replace('%',''));
						actions.set_style(selector.selected[i], 'left', (left + 1) + '%');
					}else 
					if(left.includes('em'))
					{
						left = parseInt(left.replace('em',''));
						actions.set_style(selector.selected[i], 'left', (left + 1) + 'em');
					}
				}

				selector.refresh_selector_box();
				selector.update_bounds_info();

			}else
			if(e.keyCode == 40)//down
			{
				if(selector.selected.length == 0)
					return;

				for (var i = 0; i < selector.selected.length; i++)
				{

					let top = actions.get_style(selector.selected[i], 'top', '0px');
					if(top.includes('px'))
					{
						top = parseInt(top.replace('px',''));
						actions.set_style(selector.selected[i], 'top', (top + 1) + 'px');
					}else
					if(top.includes('%'))
					{
						top = parseInt(top.replace('%',''));
						actions.set_style(selector.selected[i], 'top', (top + 1) + '%');
					}else 
					if(top.includes('em'))
					{
						top = parseInt(top.replace('em',''));
						actions.set_style(selector.selected[i], 'top', (top + 1) + 'em');
					}
				}

				selector.refresh_selector_box();
				selector.update_bounds_info();
			}

		}

		IFRAME.contentWindow.onkeyup = function(e)
		{
			if(e.keyCode == 16)
			{
				SHIFT_MODE = false;
			}else
			if(e.keyCode == 17)
			{
				CONTROL_MODE = false;
			}
		}

		IFRAME.contentWindow.onresize = function()
		{
			selector.refresh_selector_box();
		}


		IFRAME.contentWindow.onmousemove = function(e)
		{

			selector.refresh_selector_box();
			selector.hover_on_item(e.target);
			mouse.move(e);

			if(TREE_DRAG){
				TREE.drag();
			}else
			if(PROPERTIES_DRAG){
				properties.drag();
			}else
			if(PAGE_LIST_DRAG){
				PAGE.drag();
			}else
			if(ITEM_RESIZE){
				
				selector.resize();
			}else{

				if(ALLOW_DRAG)
					selector.drag();
			}
		}

		window.onmousemove = function(e)
		{

			//selector.refresh_selector_box();
			//selector.hover_on_item(e.target);
			mouse.move(e);

			if(TREE_DRAG){
				TREE.drag();
			}else
			if(PROPERTIES_DRAG){
				properties.drag();
			}else
			if(PAGE_LIST_DRAG){
				PAGE.drag();
			}else
			if(ITEM_RESIZE){
				
				//selector.resize();
			}else{

				//selector.drag();
			}
		}


		IFRAME.contentWindow.onbeforeunload = function (e)
		{
		    e = e || IFRAME.contentWindow.event;

		    // For IE and Firefox prior to version 4
		    if (e) {
		        e.returnValue = 'Are you sure that you want to leave this page?';
		    }

		    // For Safari
		    return 'Are you sure that you want to leave this page?';
		};

		CANVAS.onmousedown = function(e)
		{

			TREE_DRAG = false;
			PROPERTIES_DRAG = false;
			PAGE_LIST_DRAG = false;
			ITEM_RESIZE = false;
			mouse.set_mouse_down(e);
		}


		actions.allow_hover(document.querySelector(".quickcode-js-allow_hover").checked);
		actions.allow_drag(document.querySelector(".quickcode-js-allow_drag").checked);
		actions.allow_properties(document.querySelector(".quickcode-js-allow_properties").checked);
		actions.show_grid(document.querySelector(".quickcode-js-show_grid").checked);
		dropper.disable(document.querySelector(".quickcode-js-disable_dropdown_action").checked);

		TREE.show(document.querySelector(".quickcode-js-allow_tree").checked);
		//actions.set_hover_mode(document.querySelector(".quickcode-js-hover_mode").checked);

		PAGE.update_data();
		PAGE.show_list(document.querySelector(".quickcode-js-allow_page_list").checked);
		PALETTE.load();
		
		//check if logged in
		IO.send_data({'data_type':'check_login'});

		//load template file if needed
		url.load_template();

	});



});