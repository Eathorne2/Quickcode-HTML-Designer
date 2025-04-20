var mouse = 
{
	mouseX: 0,
	mouseY: 0,
	initMouseX: 0,
	initMouseY: 0,
	initBox: {},
	initBoxParent: {},
	initBoxParent_pos: {},

	selected_element_bounds: [],
	selected_element_style_bounds: [],

	mouseDown: false,

	set_mouse_down: function(e)
	{
		mouse.initMouseX = e.clientX;
		mouse.initMouseY = e.clientY;

		if(selector.selected.length > 0){
			mouse.initBox = selector.selected[0].getBoundingClientRect();
			mouse.initBoxParent = mouse.get_relative_parent_dimensions(selector.selected[0]).getBoundingClientRect();
			mouse.initBoxParent_pos = mouse.get_relative_parent_position(selector.selected[0]).getBoundingClientRect();
		}

		mouse.mouseDown = true;
	},
	set_mouse_up: function(e)
	{
		mouse.mouseDown = false;

		if(selector.selected.length == 0)
		{

			mouse.selected_element_bounds = [];
			mouse.selected_element_style_bounds = [];
		}

		DATA.DIRTY_DATA = true;
	},

	move: function(e)
	{
		if(!mouse.mouseDown)
			return;

		mouse.mouseX = e.clientX - mouse.initMouseX;
		mouse.mouseY = e.clientY - mouse.initMouseY;

	},

	get_relative_parent_dimensions: function(ele)
	{
		let styles = getComputedStyle(ele);
		let positions = ['absolute','fixed'];
		if(positions.includes(styles.position))
		{
			while(ele && ele.tagName != 'BODY'){
				ele = ele.parentNode;
				styles = getComputedStyle(ele);
				if(styles.position != 'static')
					return ele;
			}
		}

		return ele.parentNode;
	},

	get_relative_parent_position: function(ele)
	{
		let styles = getComputedStyle(ele);
		if(styles.position != 'static')
		{
			while(ele && ele.tagName != 'BODY'){
				ele = ele.parentNode;
				styles = getComputedStyle(ele);
				if(styles.position != 'static')
					return ele;
			}
		}

		return ele.parentNode;
	},

	
	
}
