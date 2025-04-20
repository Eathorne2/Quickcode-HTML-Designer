const TREE = {

	width: 300,
	height: 400,
	ctx: null,
	canvas: null,

	item_width: 80,
	item_height: 40,

	init_mouse_pos: {
		x:0,
		y:0,
	},

	cords: [],
	hover_item: null,

	is_custom_position: false,

	set_mouse_down: function(e)
	{
		TREE_DRAG = true;
		let prop = document.querySelector("#tree_canvas_holder");

		mouse.selected_element_bounds[0] = prop.getBoundingClientRect();
		
		mouse.set_mouse_down(e);
	},
	
	reset_position: function()
	{
		let prop = document.querySelector("#tree_canvas_holder");
		prop.style.left = "50%";					
		prop.style.top = "50%";
		prop.style.translate = "-50% -50%";

		TREE.is_custom_position = false;
	},

	drag: function()
	{

		if(!mouse.mouseDown && TREE_DRAG)
			return;
		
		let prop = document.getElementById('tree_canvas_holder');

		/** add to values **/
		let left = mouse.selected_element_bounds[0].left;
		let top = mouse.selected_element_bounds[0].top;

		left = (left + mouse.mouseX) + "px";
		top = (top + mouse.mouseY) + 'px';

		prop.style.top = top;
		prop.style.left = left;
		prop.style.translate = '0px 0px';

		TREE.is_custom_position = true;
	},

	pos: function(e)
	{
		let box = e.currentTarget.getBoundingClientRect();
		let x = e.clientX - box.left;
		let y = e.clientY - box.top;

		TREE.hover_item = null;

		for(key in TREE.cords)
		{
			if(x > TREE.cords[key].x && y > TREE.cords[key].y)
			{
				if(x < (TREE.cords[key].x + TREE.cords[key].w) && y < (TREE.cords[key].y + TREE.cords[key].h))
				{
					//item was hovered on
					TREE.hover_item = TREE.cords[key].id;
					break;
				}
			}
		}

		//hover on item
		if(TREE.hover_item && TREE.hover_item != ''){

			let selectable = CANVAS.querySelector('#'+TREE.hover_item);
			selector.hover_on_item(selectable);

		}

		TREE.redraw();

	},

	click: function(e)
	{

		//select item
		if(TREE.hover_item == 'CANVAS')
		{
			selector.clear_selection();
			TREE.redraw();
		}else
		if(TREE.hover_item && TREE.hover_item != '')
		{
			let selectable = CANVAS.querySelector('#'+TREE.hover_item);
			selector.select_item(selectable);
		} 
	},

	show: function(show = true)
	{
		if(show)
		{
			document.querySelector('.tree_canvas_holder').classList.remove('quickcode-hide');

			if(!TREE.canvas)
				TREE.canvas = document.querySelector('.tree-canvas');

			if(!TREE.ctx)
				TREE.ctx = TREE.canvas.getContext('2d');

			TREE.canvas.width = TREE.width;
			TREE.canvas.height = TREE.height;

			SHOW_TREE = true;
			TREE.redraw();

		}else{
			document.querySelector('.tree_canvas_holder').classList.add('quickcode-hide');
			SHOW_TREE = false;
		}

	},

	redraw: function()
	{
		if(!SHOW_TREE)
			return;

		TREE.ctx.fillStyle = "white";
		TREE.ctx.fillRect(0,0,TREE.canvas.width,TREE.canvas.height);
		
		let element = CANVAS;
		if(selector.selected.length > 0)
			element = selector.selected[0];
		
		TREE.cords = [];

		let childX = 210;
		if(element.id == 'CANVAS'){
			TREE.draw_item(10,10,{
				label:'CANVAS',
				extra_text:'(parent)',
				element_id:element.id
			});

			TREE.cords.push({
				id:element.id,
				x:10,
				y:10,
				w:TREE.item_width,
				h:TREE.item_height,
			});

			childX = 110;
		}else{
			if(element.parentNode.id == 'CANVAS')
				TREE.draw_item(10,10,{
					label:'CANVAS',
					extra_text:'(parent)',
					element_id:element.parentNode.id
				});
			else
				TREE.draw_item(10,10,{
					label:element.parentNode.tagName,
					extra_text:'(parent)',
					element_id:element.parentNode.id
				});

			TREE.cords.push({
				id:element.parentNode.id,
				x:10,
				y:10,
				w:TREE.item_width,
				h:TREE.item_height,
			});

			TREE.draw_item(110,10,{
				label:element.tagName,
				extra_text:'(selected)',
				element_id:element.id
			});

			TREE.cords.push({
				id:element.id,
				x:110,
				y:10,
				w:TREE.item_width,
				h:TREE.item_height,
			});
		}

		if(TREE.cords.length > 1)
			TREE.draw_line(90,30,110,10,110,30);

		for (var i = 0; i < element.children.length; i++) {

			TREE.draw_item(childX,10+(45*i),{
				label:element.children[i].tagName,
				extra_text:'(child)',
				element_id:element.children[i].id
			});

			TREE.draw_line(childX - 100 +80,10+20,childX,(10+(45*i)),childX,10+(45*i)+20);
			TREE.cords.push({
				id:element.children[i].id,
				x:childX,
				y:10+(45*i),
				w:TREE.item_width,
				h:TREE.item_height,
			});
		}


		//display info on table
		let table = document.querySelector('.tree-info-table');
		element = CANVAS.querySelector('#'+TREE.hover_item);
		if(element)
		{
			console.log('here');
			table.querySelector('.item-id').innerHTML = `<i><small>${element.id}</i></small>`;

			let str = '';
			for (var i = 0; i < element.classList.length; i++) {
				str += `<tr><td colspan="2" style="font-size:12px;background-color:#f106d7;color:white"><i>${element.classList[i]}</i></td></tr>`;
			}

			table.querySelector('.item-classes').innerHTML = str;
		}else{
			table.querySelector('.item-id').innerHTML = `<i><small>...</i></small>`;
			table.querySelector('.item-classes').innerHTML = `<tr><td colspan="2" style="font-size:12px"><i>Hover on an item</i></td></tr>`;;
		}
	},

	draw_line: function(x1,y1,cx,cy,x2,y2)
	{
		TREE.ctx.strokeStyle = "#67bdf5";
		TREE.ctx.lineWidth = "2";
		TREE.ctx.beginPath();
		TREE.ctx.moveTo(x1, y1);
		TREE.ctx.quadraticCurveTo(cx - 20, cy, x2, y2);
		TREE.ctx.stroke();
	},

	draw_item: function(x,y,obj = {})
	{
		let colors = {
			DIV:'#67bdf5',
			IMG:'#ff6d6d',
			SECTION:'#ffc000',
			A:'#c4d67d',
			I:'#ffc000',
			SPAN:'#fd3c7e',
			INPUT:'#cb00f5',
			H1:'#f68c4e',
			H2:'#f68c4e',
			H3:'#f68c4e',
			H4:'#f68c4e',
			H5:'#f68c4e',
		};

		let label = obj.label || '';
		let extra_text = obj.extra_text || '';
		let element_id = obj.element_id || '';

		if(typeof colors[label] == 'undefined')
			TREE.ctx.strokeStyle = '#67bdf5';
		else
			TREE.ctx.strokeStyle = colors[label];

		let width = TREE.item_width;
		let height = TREE.item_height;

		//TREE.ctx.strokeStyle = "grey";
		//TREE.ctx.strokeStyle = "blue";

		if(extra_text == '(selected)')
			TREE.ctx.fillStyle = "#D85261dd";
		else
			TREE.ctx.fillStyle = "#eee";

		if(element_id == TREE.hover_item)
			TREE.ctx.fillStyle = '#ccc';

		TREE.ctx.beginPath();
		TREE.ctx.roundRect(x,y,width,height,20);
		TREE.ctx.fill();

		TREE.ctx.lineWidth = "2";
		TREE.ctx.beginPath();
		TREE.ctx.roundRect(x,y,width,height,20);
		TREE.ctx.stroke();
		
		//TREE.ctx.fillRect(x,y,width,height);
		//TREE.ctx.strokeRect(x,y,width,height);

		if(extra_text == '(selected)')
			TREE.ctx.fillStyle = "#fff";
		else
			TREE.ctx.fillStyle = "#222";

		TREE.ctx.font = "14px Arial";
		TREE.ctx.fillText(label, x+10, y+15); 

		if(extra_text != '')
		{
			TREE.ctx.font = "12px Arial";
			TREE.ctx.fillText(extra_text, x+10, y+height-5); 
		}
		
	},

}