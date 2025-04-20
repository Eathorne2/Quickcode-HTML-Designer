
const properties = 
{
	is_custom_position: false,

	set_mouse_down: function(e)
	{
		PROPERTIES_DRAG = true;
		let prop = document.querySelector("#item_properties");

		mouse.selected_element_bounds[0] = prop.getBoundingClientRect();
		
		mouse.set_mouse_down(e);
	},

	update_border_input: function (e)
	{
		let data_source = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-data-source");
		let border_type = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-border_type");
		let border_size = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-border_size");
		let border_color = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-border_color");

		data_source.value = border_type.value + ' ' + border_size.value + 'px ' + border_color.value;
	},

	update_shadow_input: function (e)
	{
		let data_source = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-data-source");
		let shadow_x = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-shadow_x");
		let shadow_y = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-shadow_y");
		let shadow_blur = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-shadow_blur");
		let shadow_color = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-shadow_color");

		data_source.value = shadow_x.value + 'px ' + shadow_y.value + 'px ' + shadow_blur.value + 'px ' + shadow_color.value;

	},

	update_translate_input: function (e)
	{
		let data_source = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-data-source");
		let translate_x = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-translate_x");
		let translate_y = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-translate_y");

		data_source.value = translate_x.value + 'px ' + translate_y.value + 'px';

	},

	update_object_position: function (e)
	{
		let data_source = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-data-source");
		let position_x = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-position_x");
		let position_y = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-position_y");

		data_source.value = position_x.value + 'px ' + position_y.value + 'px';

	},

	update_transition_input: function (e)
	{
		let data_source = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-data-source");
		let transition_time = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-transition_time");
		let transition_delay = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-transition_delay");
		let transition_curve = selector.get_parent_from_class('quickcode-property-group',e.currentTarget).querySelector(".quickcode-transition_curve");

		let curve_names = ['bounce','rounded','cubic'];
		let bezier_values = {
			'bounce':'cubic-bezier(.68,-0.55,.27,1.55)',
			'exponential':'cubic-bezier(1, 0, 0, 1)',
			'cubic':'cubic-bezier(0.79, 0.14, 0.15, 0.86)',
			'circular':'cubic-bezier(0.79, 0.14, 0.15, 0.86)',
			'bouncier':'cubic-bezier(1, -0.65, 0, 1.5)'
		}

		let transition_curve_value = transition_curve.value;
		if(typeof bezier_values[transition_curve.value] == 'string')
			transition_curve_value = bezier_values[transition_curve.value];


		data_source.value = 'all ' + transition_time.value + 's ' + transition_curve_value + ' ' + transition_delay.value + 's';

	},

	load_images: function()
	{
		
		let imgs = document.querySelectorAll("#item_properties img");
		for (var i = 0; i < imgs.length; i++) {
			
			let parent = selector.get_parent_from_class('quickcode-property-group',imgs[i]);
			let source_class = imgs[i].getAttribute('source');
			let src = parent.querySelector("."+source_class).value;

			if(src == ""){
				imgs[i].src = "img/no_image.jpg";
			}else{
				imgs[i].src = src.replaceAll('"',"");
			}
			
		}
	},

	load_icons: function()
	{
		
		let imgs = document.querySelectorAll("#item_properties i");
		for (var i = 0; i < imgs.length; i++) {
			
			let parent = selector.get_parent_from_class('quickcode-property-group',imgs[i]);
			if(parent){

				let source_class = imgs[i].getAttribute('source')
				let myclass = parent.querySelector("."+source_class);

				imgs[i].setAttribute('class',myclass.value);
			}
			
		}
	},

	hide: function()
	{
		document.querySelector("#item_properties").classList.add("quickcode-hide");
	},

	get_append_type: function(str)
	{
		str = str.trim();
		let appends = ['px','%','rem','em','vh','vw'];
		for (var i = 0; i < appends.length; i++) {
			let reg = new RegExp(appends[i]+'$','i');
			if(str.match(reg))
				return appends[i];
		}

		return '';
	},

	load: function()
	{

		if(selector.selected.length > 0)
		{
			let input_groups = document.querySelector('#item_properties').querySelectorAll('.quickcode-property-group');
			let parts = actions.get_class_styles();

			//load data to each input
			for (var i = 0; i < input_groups.length; i++) {
				
				let property_name = input_groups[i].getAttribute('property');
				let property_append = input_groups[i].getAttribute('propertyAppend');
				let property_prepend = input_groups[i].getAttribute('propertyPrepend');
				let property_type = input_groups[i].getAttribute('propertyType');

				if(property_name == 'style')
				{
					input_groups[i].querySelector('.quickcode-data-source').value = parts.join(';\n');
				}else{

					if(property_type == 'style')
					{
						let myinputs = input_groups[i].querySelectorAll('.quickcode-data-source');
						for (var x = 0; x < parts.length; x++) {
						
							if(parts[x] == '')
								continue;

							if(!properties.load_style(parts[x],input_groups[i],property_name,property_append,property_prepend)){
								let default_prop = properties.get_default(property_name,property_type);
								if(typeof default_prop == 'object'){
									properties.load_style(property_name+':'+default_prop.default_value,input_groups[i],property_name,property_append,property_prepend);
								}
							}else{
								break;
							}
						}

						if(parts.length == 0)
						{
							let default_prop = properties.get_default(property_name,property_type);
							if(typeof default_prop == 'object'){
								properties.load_style(property_name+':'+default_prop.default_value,input_groups[i],property_name,property_append,property_prepend);
							}
						}

					}else 
					if(property_type == 'attribute')
					{
						
						let attr = selector.selected[0].getAttribute(property_name);
						if(attr)
						{
							attr = attr.replace(property_prepend,'');  
							attr = attr.replace(property_append,'');  
						}else{

							let default_prop = properties.get_default(property_name,property_type);
							if(typeof default_prop == 'object')
								attr = default_prop.default_value;
						}

						if(property_name == 'class')
						{
							if(selector.selected[0].tagName == 'I')
							{
								input_groups[i].querySelector('.quickcode-data-source').value = selector.selected[0].getAttribute('class');
							}else{
								input_groups[i].querySelector('.quickcode-data-source').value = "";
							}
						}else{
							input_groups[i].querySelector('.quickcode-data-source').value = attr;
						}

					}else
					if(property_type == 'tableAttribute')
					{

						let table = selector.get_parent_from_tagname('table',selector.selected[0]);
						if(typeof table != 'undefined' && table)
						{

							if(property_name == 'columns')
							{
								let tr = table.querySelectorAll("tr");
								input_groups[i].querySelector('.quickcode-data-source').value = tr[0].children.length.toString() || default_prop.default_value;
							}else
							if(property_name == 'rows')
							{
								let tr = table.querySelectorAll("tr");
								input_groups[i].querySelector('.quickcode-data-source').value = tr.length.toString() || default_prop.default_value;
							}
						}

					}
						
				}
			}

			properties.load_images();
			properties.load_icons();
		}
	},

	load_style: function(style_str,input_group,property_name,property_append,property_prepend)
	{
		let myinput = input_group.querySelector('.quickcode-data-source');
		let segmented = ['object-position','transition','border','border-top','border-bottom','border-left','border-right','translate','box-shadow'];
		let value = '';
		let segment = style_str.split(":");
		if(property_name == segment[0].trim())
		{
			
			
			if(typeof segment[1] == 'string' && segment[1].trim() != '')
				value = segment[1];

			if(!segmented.includes(property_name))
			{

				let temp_append = properties.get_append_type(value);
				if(temp_append != ''){
					property_append = temp_append;
					input_group.setAttribute('propertyAppend',temp_append);

					//select the right checkbox
					let radios = input_group.querySelectorAll('.'+property_name+'AppendType');
					for (var i = 0; i < radios.length; i++) {
						if(radios[i].value == temp_append)
							radios[i].checked = true;
					}
				}
			}

			value = value.trim().replace(property_append,'');
			value = value.replace(property_prepend,'');
			
			if(myinput.type == 'checkbox'){
				if(value == myinput.value)
					myinput.checked = true;
				else
					myinput.checked = false;
			}else{

				myinput.value = value;
			}

			/** rgb color **/
			if(!segmented.includes(property_name) && value.match(/^rgb\([0-9\,\s]+\)/i))
			{
				var rgb = value.match(/\d+/g);
				if(rgb){
					if(rgb.length < 4){rgb.push('255');}
					myinput.jscolor.fromRGBA(rgb[0],rgb[1],rgb[2],rgb[3]);
				}
			}else
			/** hex color **/
			if(!segmented.includes(property_name) && value.match(/^\#[0-9a-f]+/i))
			{
				myinput.jscolor.fromString(value);
			}

			/** update individual segmented inputs if any**/
			if(segmented.includes(property_name))
			{
				if(property_name == 'border' || property_name == 'border-top' || property_name == 'border-left' || property_name == 'border-right' || property_name == 'border-bottom')
				{

					let mysize = value.match(/\-*[0-9]+px/i);
					let mytype = value.match(/(solid|dotted|dashed)/i);
					let mycolor = value.match(/rgb\([0-9\,\s]+\)/i);

					let border_size = input_group.querySelector(".quickcode-border_size");
					let border_type = input_group.querySelector(".quickcode-border_type");
					let border_color = input_group.querySelector(".quickcode-border_color");

					if(mycolor)
					{
						let rgb = mycolor[0].match(/\d+/g);
						if(rgb){
							if(rgb.length < 4){rgb.push('255');}
							if(border_color)
								border_color.jscolor.fromRGBA(rgb[0],rgb[1],rgb[2],rgb[3]);
						}
					}else{
						mycolor = value.match(/\#[0-9a-z]+/i);

						if(mycolor){
							mycolor = mycolor[0];
							if(mycolor.length < 8){mycolor = mycolor+'FF';}
							
							if(border_color)
								border_color.jscolor.fromString(mycolor);
						}
					}

					if(mytype && border_type)
						border_type.value = mytype[0];

					if(mysize && border_size)
						border_size.value = mysize[0].replace("px","");

				}else
				if(property_name == 'box-shadow')
				{
					let all_shadows = value.split(',');
					value = all_shadows[0];

					let mynumbers = value.match(/\-*[0-9]+px/gi);
					let mycolor = value.match(/rgb\([0-9\,\s]+\)/i);

					let shadow_x = input_group.querySelector(".quickcode-shadow_x");
					let shadow_y = input_group.querySelector(".quickcode-shadow_y");
					let shadow_blur = input_group.querySelector(".quickcode-shadow_blur");
					let shadow_color = input_group.querySelector(".quickcode-shadow_color");

					if(mycolor)
					{
						let rgb = mycolor[0].match(/\d+/g);

						if(rgb){
							if(rgb.length < 4){rgb.push('255');}
							
							if(shadow_color)
								shadow_color.jscolor.fromRGBA(rgb[0],rgb[1],rgb[2],rgb[3]);
						}
					}else{
						mycolor = value.match(/\#[0-9a-z]+/i);

						if(mycolor){
							mycolor = mycolor[0];
							if(mycolor.length < 8){mycolor = mycolor+'FF';}
							
							if(shadow_color)
								shadow_color.jscolor.fromString(mycolor);
						}
					}

					if(mynumbers && mynumbers.length == 3 && shadow_x){
						shadow_x.value = mynumbers[0].replace("px","");
						shadow_y.value = mynumbers[1].replace("px","");
						shadow_blur.value = mynumbers[2].replace("px","");
					}
					
				}else
				if(property_name == 'transition')
				{

					let transition_time = input_group.querySelector(".quickcode-transition_time");
					let transition_delay = input_group.querySelector(".quickcode-transition_delay");
					let transition_curve = input_group.querySelector(".quickcode-transition_curve");

					if(value.trim() != '')
					{
						let times = value.match(/[0-9\.]+s/gi);
						let curves = value.match(/ease\s|ease\-in\s|ease\-out\s|ease\-in\-out|linear|cubic\-bezier\(.+\)/gi);;
						if(curves)
						{
							let t_time = times[0] || '0s';
							let t_delay = times[1] || '0s';
							let t_curve = curves[0].trim() || 'ease';
								transition_time.value = t_time.replace('s','').trim();
								transition_delay.value = t_delay.replace('s','').trim();
								
								let bezier_values = {
								'bounce':'cubic-bezier(.68,-0.55,.27,1.55)',
								'exponential':'cubic-bezier(1, 0, 0, 1)',
								'cubic':'cubic-bezier(0.79, 0.14, 0.15, 0.86)',
								'circular':'cubic-bezier(0.79, 0.14, 0.15, 0.86)',
								'bouncier':'cubic-bezier(1, -0.65, 0, 1.5)'
							}

							for(zkey in bezier_values)
							{
								if(bezier_values[zkey] == t_curve.trim())
								{
									t_curve = zkey;
									break;
								}
							}

							transition_curve.value = t_curve;
						}
					}else{
						transition_time.value = '0';
							transition_delay.value = '0';
							transition_curve.value = 'ease';
					}
					
				}else
				if(property_name == 'object-position')
				{
					let all_positions = value.split(' ');

					let position_x = input_group.querySelector(".quickcode-position_x");
					let position_y = input_group.querySelector(".quickcode-position_y");
 
					if(all_positions.length == 2){
						position_x.value = all_positions[0].replace(/px|%/,"");
						position_y.value = all_positions[1].replace(/px|%/,"");
					}
					
				}

			}

			return true;
		}

		return false;
	},

	reset_position: function()
	{
		let prop = document.querySelector("#item_properties");
		prop.style.left = "auto";
		prop.style.right = "0px";					
		prop.style.top = "40px";

		properties.is_custom_position = false;
	},

	expand: function (e)
	{
		if(e.target == e.currentTarget && e.currentTarget.parentNode.querySelector(".quickcode-property-holder").classList.contains("quickcode-hide"))
		{
			properties.collapseAll();
			e.currentTarget.parentNode.querySelector(".quickcode-property-holder").classList.remove("quickcode-hide");
		}else{
			properties.collapseAll();
		}
	},

	collapseAll: function ()
	{
		let props = document.querySelectorAll("#item_properties .quickcode-property-holder");

		for (var i = 0; i < props.length; i++) {
			props[i].classList.add("quickcode-hide");
		}
	},
	

	drag: function()
	{
		
		if(!mouse.mouseDown && PROPERTIES_DRAG)
			return;
		
		let prop = document.getElementById('item_properties');

		/** add to values **/
		let left = mouse.selected_element_bounds[0].left;
		let top = mouse.selected_element_bounds[0].top;

		left = (left + mouse.mouseX) + "px";
		top = (top + mouse.mouseY) + 'px';

		prop.style.top = top;
		prop.style.left = left;
		
		properties.is_custom_position = true;
	},

	display_classes: function()
	{
		if(selector.selected.length == 0)
			return;

		let item_classes = selector.selected[0].classList;
		let item_classes_holder = document.querySelector("#item_properties .main-classes-pills");
		item_classes_holder.innerHTML = `Select class: 
		<button onclick="actions.new_class()" title="Add new class"><i class="bi bi-plus"></i></button>
		<button onclick="actions.edit_class()" title="Edit selected class" style="color:orange"><i class="bi bi-pencil-fill"></i></button>
		<button onclick="actions.delete_class()" title="Delete selected class" style="color:red"><i class="bi bi-trash3"></i></button>
		| <button onclick="actions.copy_class()" title="Copy selected class" style="color:blue"><i class="bi bi-copy"></i></button>
		<button onclick="actions.paste_class()" title="Paste copied class" style="color:#8d0f91"><i class="bi bi-clipboard-fill"></i></button>
		<br>

		<div class="quickcode-new-text-input-holder quickcode-d-none" onmousedown="event.stopPropagation()" >
			<button onclick="this.parentNode.classList.add('quickcode-d-none')" style='color:red'>x</button>
			<input class="quickcode-form-control quickcode-text-input" value="">
			<button onclick="actions.save_new_class(this.parentNode.querySelector('input').value.trim())" style='color:blue'>Save</button>
		</div>
				
		`;
		for (var o = 0; o < item_classes.length; o++){

			let selected_class = '';
			if(SELECTED_CLASS == item_classes[o])
				selected_class = ' checked ';

			let prev_class = null;
			if(typeof item_classes[o-1] != 'undefined')
				prev_class = item_classes[o-1];

			let next_class = null;
			if(typeof item_classes[o+1] != 'undefined')
				next_class = item_classes[o+1];
			
			let muted_class = '';
			let muted_input = '';
			if(MUTED_CLASSES.includes(item_classes[o])){
				 muted_class = ' quickcode-muted ';
				 muted_input = ' disabled ';
			}

			item_classes_holder.innerHTML += `
			<label ondblclick="actions.mute_class('${item_classes[o]}')" class='quickcode-item-pill ${muted_class}' style='padding-left:0px;padding-right:2px;'>
				<input onchange="actions.select_class(this.checked,'${item_classes[o]}')" ${selected_class} ${muted_input} type="radio" value="${item_classes[o]}" name="selected_class"> 
				${item_classes[o]}
				<button onclick="actions.move_class_up('${item_classes[o]}','${prev_class}')" title="Move class left" style="color:purple"><i class="bi bi-chevron-left"></i></button>
				<button onclick="actions.move_class_down('${item_classes[o]}','${next_class}')" title="Move class right" style="color:purple"><i class="bi bi-chevron-right"></i></button>
	
				<div id='${item_classes[o]}' class="quickcode-text-input-holder quickcode-d-none" onmousedown="event.stopPropagation()" >
					<button onclick="this.parentNode.classList.add('quickcode-d-none')" style='color:red'>x</button>
					<input class="quickcode-form-control quickcode-text-input" value="${item_classes[o]}">
					<button onclick="actions.save_edited_class(this.parentNode.querySelector('input').value.trim(),'${item_classes[o]}')" style='color:blue'>Save</button>
				</div>

			</label>`;
		}

		let item_classes_holder2 = document.querySelector("#item_properties .sudo-classes-pills");

		let pseudo_classes = IFRAME.contentWindow.document.querySelector('.'+responsive.sudo_css).querySelectorAll('#'+SELECTED_CLASS);
		item_classes_holder2.innerHTML = `

			<hr>
				Pseudo classes:
				<button onclick="actions.new_pseudo_class()" title="Add pseudo class"><i class="bi bi-plus"></i></button>
				<button onclick="actions.delete_pseudo_class()" title="Delete selected pseudo class" style="color:red"><i class="bi bi-trash3"></i></button>
				| Show pseudo class <input type="checkbox" ${SHOW_SUDO_CLASS ? ' checked ':''} onchange="actions.show_pseudo_class(this.checked)" style="transform: scale(1.4);cursor:pointer"/>
			<div class="quickcode-pseudo-classes">

				<div id='text' class="quickcode-new-pseudo-class-holder quickcode-d-none" onmousedown="event.stopPropagation()">
					<button onclick="this.parentNode.classList.add('quickcode-d-none')" style='color:red'>x</button>
					<div style='display:flex;align-items:center'><div style='width:80px'>${SELECTED_CLASS}:</div><input class="quickcode-form-control quickcode-text-input" value="hover"></div>
					<button onclick="actions.save_new_pseudo_class(this.parentNode.querySelector('input').value.trim())" style='color:blue'>Save</button>
				</div>
		`;

		let selected_class = (SELECTED_SUDO_CLASS == null) ? ' checked ':'';

		item_classes_holder2.innerHTML += `

			<label class="quickcode-item-pill" style="background-color:#ab67e3">
				<input onchange="actions.select_pseudo_class(this.checked,'')" ${selected_class} type="radio" value="" name="selected_pseudo_class"> 
				None
			</label>
		`;

			for (var x = 0; x < pseudo_classes.length; x++) {

				let name = pseudo_classes[x].getAttribute('name');
				
				let selected_class = '';
				if(SELECTED_SUDO_CLASS == name)
					selected_class = ' checked ';

				let muted_class = '';
				let muted_input = '';
				if(MUTED_CLASSES.includes(name)){
					 muted_class = ' quickcode-muted ';
					 muted_input = ' disabled ';
				}

				item_classes_holder2.innerHTML += `
					
					<label ondblclick="actions.mute_pseudo_class('${name}')" class="quickcode-item-pill ${muted_class}" style="background-color:#ab67e3">
						<input onchange="actions.select_pseudo_class(this.checked,'${name}')" ${selected_class} ${muted_input} type="radio" value="${name}" name="selected_pseudo_class"> 
						${name.replace(SELECTED_CLASS,'')}
					</label>
					
				`;
			}

			item_classes_holder2.innerHTML += `</div>`;

		let combo_classes = IFRAME.contentWindow.document.querySelector('.'+responsive.combo_css).querySelectorAll('#'+SELECTED_CLASS);
		item_classes_holder2.innerHTML += `
			<hr>
				Combined classes:
				<button onclick="actions.new_combo_class()" title="Add combo class"><i class="bi bi-plus"></i></button>
				<button onclick="actions.delete_combo_class()" title="Delete selected combo class" style="color:red"><i class="bi bi-trash3"></i></button>
				| Show combo class <input type="checkbox" ${SHOW_COMBO_CLASS ? ' checked ':''} onchange="actions.show_combo_class(this.checked)" style="transform: scale(1.4);cursor:pointer"/>
			<div class="quickcode-combo-classes">

				<div id='text' style="color: #666;padding:10px" class="quickcode-new-combo-class-holder quickcode-d-none" onmousedown="event.stopPropagation()" oninput="actions.update_combo_preview(event)">
					
					<button onclick="this.parentNode.classList.add('quickcode-d-none')" style='background-color:red;color:white;float:right;margin:-8px;padding: 5px 15px;border-radius:5px;cursor:pointer'>x</button>
					
					<div style="display: flex;">
						<div style="flex: 1">
							<div>Trigger Action:</div>
							<select class="action" style="width:98%">
								<option>hover</option>
								<option>checked</option>
								<option>focus</option>
								<option>blur</option>
								<option>valid</option>
								<option>invalid</option>
								<option>disabled</option>
							</select>
						</div>
						<div style="flex: 2">
							<div>Combiner Type:</div>
							<select class="combiner" style="width:98%">
								<option value="~">Sibling</option>
								<option value="+">First Sibling</option>
								<option value=">">Direct Child</option>
								<option value="--space--">Child or Grand Child</option>
							</select>
						</div>
					</div>
					<hr style="opacity: 0.7">
					<div>Class to affect:</div>
					<div style='display:flex;align-items:center'>
						<input class="quickcode-form-control quickcode-text-input affected_class" value="some-class">
					</div>
					<hr style="opacity: 0.7">
					<div class="result" style="flex: 2">
						<div>Result:</div>
						<b><div style="color: white;background-color:black;padding:4px">.${SELECTED_CLASS}:<span class="result-action">hover</span> 
							<span class="result-combiner">~</span> 
							.<span class="result-affected_class">some-class</span>{}
						</div></b>
					</div>

					<button onclick="actions.save_new_combo_class(event)" style='background-color:#0ea4ff;color:white;float:right;margin:4px;padding: 5px 15px;border-radius:5px;cursor:pointer'>Save</button>

				</div>
		`;

		let selected_combo_class = (SELECTED_COMBO_CLASS == null) ? ' checked ':'';

		item_classes_holder2.innerHTML += `

			<label class="quickcode-item-pill" style="background-color:#ab67e3">
				<input onchange="actions.select_combo_class(this.checked,'')" ${selected_combo_class} type="radio" value="" name="selected_combo_class"> 
				None
			</label>
		`;

			for (var x = 0; x < combo_classes.length; x++) {

				let name = combo_classes[x].getAttribute('name');
				
				let selected_combo_class = '';
				if(SELECTED_COMBO_CLASS == name)
					selected_combo_class = ' checked ';

				let muted_class = '';
				let muted_input = '';
				if(MUTED_CLASSES.includes(name)){
					 muted_class = ' quickcode-muted ';
					 muted_input = ' disabled ';
				}

				item_classes_holder2.innerHTML += `
					
					<label ondblclick="actions.mute_combo_class('${name}')" class="quickcode-item-pill ${muted_class}" style="background-color:#ab67e3">
						<input onchange="actions.select_combo_class(this.checked,'${name}')" ${selected_combo_class} ${muted_input} type="radio" value="${name}" name="selected_combo_class"> 
						${name.replace(SELECTED_CLASS,'').replace('--space--',' ')}
					</label>
					
				`;
			}

			item_classes_holder2.innerHTML += `</div>`;

		if(SELECTED_CLASS)
		{
			let items_in_class = CANVAS.querySelectorAll('.'+SELECTED_CLASS);

			item_classes_holder.innerHTML += `
			<hr>
			<div>
				Items in class: <b>${items_in_class.length}</b>
				<button onclick="actions.select_by_class()" title="Select items with this class" style="color:blue;float: right"><i class="bi bi-check-all"></i></button>
			</div>
			`;
		}else{
			item_classes_holder.innerHTML += `
			<hr>
			<div>
				No class selected!
			</div>
			<hr>
			`;
		}
		
		
	},

	show: function()
	{

		let panel = document.querySelector("#item_properties");

		if(selector.selected.length > 0){

			let bounds = selector.selected[0].getBoundingClientRect();
			let scrollX = window.scrollX;
			
			if(!properties.is_custom_position)
			{
				if((scrollX + bounds.left) > (CANVAS.offsetWidth / 2))
				{
					panel.style.left = "0px";
					panel.style.top = "40px";
					panel.style.right = "auto";
				}else{
					panel.style.left = "auto";
					panel.style.right = "0px";					
					panel.style.top = "40px";					
				}
			}

			let types = [];
			for (var i = 0; i < selector.selected.length; i++) {
				
				types.push(selector.selected[i].tagName);
			}

			let unique_arr = types.filter(actions.onlyUnique);
			document.querySelector("#item_properties .quickcode-item_types").innerHTML = "Selected types: <span class='quickcode-item-pill'>" + unique_arr.toString().replaceAll(",","</span><span class='quickcode-item-pill'>") + "</span>";

			properties.display_classes();

			if(selector.selected.length == 1){
				document.querySelector("#item_properties .quickcode-item_count").innerHTML = "1 item selected";
			}else{
				document.querySelector("#item_properties .quickcode-item_count").innerHTML = selector.selected.length + " items selected";
			}

			if(ALLOW_PROPERTIES)
				panel.classList.remove("quickcode-hide");
		}else{
			panel.classList.add("quickcode-hide");
		}
	},

	get_default: function(property_name,property_type)
	{
		let props = 
		[
			{
				prop:'color',
				prop_type:'style',
				default_value: '#000000FF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'background-color',
				prop_type:'style',
				default_value: '#FFFFFFFF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'text-align',
				prop_type:'style',
				default_value: 'left',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'font-size',
				prop_type:'style',
				default_value: '14',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'border-radius',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'margin',
				prop_type:'style',
				default_value: '',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'margin-left',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'margin-right',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'margin-top',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'margin-bottom',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'padding',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'padding-left',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'padding-right',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'padding-top',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'padding-bottom',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'position',
				prop_type:'style',
				default_value: 'static',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'overflow-x',
				prop_type:'style',
				default_value: 'visible',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'overflow-y',
				prop_type:'style',
				default_value: 'visible',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'height',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'min-height',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'max-height',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'width',
				prop_type:'style',
				default_value: '0',
				default_property_append: '%',
				default_property_prepend: '',
			},
			{
				prop:'min-width',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'max-width',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'top',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'left',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'right',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'bottom',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'rotate',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'deg)',
				default_property_prepend: 'rotate(',
			},
			{
				prop:'scale',
				prop_type:'style',
				default_value: '0',
				default_property_append: ')',
				default_property_prepend: 'scale(',
			},
			{
				prop:'z-index',
				prop_type:'style',
				default_value: '0',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'gap',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'style',
				prop_type:'attribute',
				default_value: '',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'type',
				prop_type:'attribute',
				default_value: 'text',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'autofocus',
				prop_type:'attribute',
				default_value: 'false',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'required',
				prop_type:'attribute',
				default_value: 'false',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'display',
				prop_type:'style',
				default_value: 'block',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'src',
				prop_type:'attribute',
				default_value: 'img/no_image.jpg',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'placeholder',
				prop_type:'attribute',
				default_value: '',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'value',
				prop_type:'attribute',
				default_value: '',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'required',
				prop_type:'attribute',
				default_value: 'false',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'action',
				prop_type:'attribute',
				default_value: '',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'method',
				prop_type:'attribute',
				default_value: 'post',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'float',
				prop_type:'style',
				default_value: 'none',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'min',
				prop_type:'attribute',
				default_value: '0',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'max',
				prop_type:'attribute',
				default_value: '100',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'step',
				prop_type:'attribute',
				default_value: '1',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'border',
				prop_type:'style',
				default_value: 'solid 0px #FFFFFFFF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'border-top',
				prop_type:'style',
				default_value: 'solid 0px #FFFFFFFF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'border-left',
				prop_type:'style',
				default_value: 'solid 0px #FFFFFFFF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'border-right',
				prop_type:'style',
				default_value: 'solid 0px #FFFFFFFF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'border-bottom',
				prop_type:'style',
				default_value: 'solid 0px #FFFFFFFF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'box-shadow',
				prop_type:'style',
				default_value: '0px 0px 0px #FFFFFFFF',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'justify-content',
				prop_type:'style',
				default_value: 'stretch',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'align-items',
				prop_type:'style',
				default_value: 'stretch',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'border-top-left-radius',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'border-top-right-radius',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'border-bottom-left-radius',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'border-bottom-right-radius',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px',
				default_property_prepend: '',
			},
			{
				prop:'cursor',
				prop_type:'style',
				default_value: 'default',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'object-fit',
				prop_type:'style',
				default_value: '',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'object-position',
				prop_type:'style',
				default_value: '0px 0px',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'font-weight',
				prop_type:'style',
				default_value: 'normal',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'translate-x',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px)',
				default_property_prepend: 'translateX(',
			},
			{
				prop:'translate-y',
				prop_type:'style',
				default_value: '0',
				default_property_append: 'px)',
				default_property_prepend: 'translateY(',
			},
			{
				prop:'clear',
				prop_type:'style',
				default_value: 'none',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'autofocus',
				prop_type:'attribute',
				default_value: 'false',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'transition',
				prop_type:'style',
				default_value: '',
				default_property_append: '',
				default_property_prepend: '',
			},
			{
				prop:'background-image',
				prop_type:'style',
				default_value: 'img/no_image.jpg',
				default_property_append: ")",
				default_property_prepend: "url(",
			},
			{
				prop:'background-position-x',
				prop_type:'style',
				default_value: '',
				default_property_append: "px",
				default_property_prepend: "",
			},
			{
				prop:'background-position-y',
				prop_type:'style',
				default_value: '',
				default_property_append: "px",
				default_property_prepend: "",
			},
			{
				prop:'background-size',
				prop_type:'style',
				default_value: '',
				default_property_append: "px",
				default_property_prepend: "",
			},
			{
				prop:'background-attachment',
				prop_type:'style',
				default_value: 'scroll',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'background-repeat',
				prop_type:'style',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'contenteditable',
				prop_type:'attribute',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'href',
				prop_type:'attribute',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'class',
				prop_type:'attribute',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'text-transform',
				prop_type:'style',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'flex',
				prop_type:'style',
				default_value: '1',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'opacity',
				prop_type:'style',
				default_value: '1',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'colspan',
				prop_type:'attribute',
				default_value: '1',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'rowspan',
				prop_type:'attribute',
				default_value: '1',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'columns',
				prop_type:'tableAttribute',
				default_value: '1',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'rows',
				prop_type:'tableAttribute',
				default_value: '1',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'fill',
				prop_type:'attribute',
				default_value: '#000000FF',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'class',
				prop_type:'attribute',
				default_value: 'bi bi-twitter',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'name',
				prop_type:'attribute',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'min',
				prop_type:'attribute',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'max',
				prop_type:'attribute',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'step',
				prop_type:'attribute',
				default_value: '',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'font-style',
				prop_type:'style',
				default_value: 'normal',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'font-family',
				prop_type:'style',
				default_value: 'opensans',
				default_property_append: "",
				default_property_prepend: "",
			},
			{
				prop:'letter-spacing',
				prop_type:'style',
				default_value: '0',
				default_property_append: "px",
				default_property_prepend: "",
			},
			
		];

		for (var i = 0; i < props.length; i++) {
			if(props[i].prop == property_name && props[i].prop_type == property_type)
				return props[i];
		}

		return '';
	}
};
