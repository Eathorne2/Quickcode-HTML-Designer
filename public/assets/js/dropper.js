
const dropper = {
	
	disabled: false,

	init: function()
	{
		//dropper.disabled = false;
		let buttons = CANVAS.querySelectorAll('[role="dropdown"]');
		for (var i = 0; i < buttons.length; i++) {
			buttons[i].addEventListener('click',dropper.click);
			buttons[i].parentNode.querySelector('[role="dropdown-menu"]').style.display = 'none';

			if(dropper.disabled)
				buttons[i].parentNode.querySelector('[role="dropdown-menu"]').style.display = 'block';
		}

		CANVAS.addEventListener('mouseup',dropper.close);
	},

	click: function(e)
	{
		if(dropper.disabled){
			
			//close just one in edit mode
			if(e.currentTarget.parentNode.querySelector('[role="dropdown-menu"]').style.display == 'block')
				e.currentTarget.parentNode.querySelector('[role="dropdown-menu"]').style.display = 'none';
			else
				e.currentTarget.parentNode.querySelector('[role="dropdown-menu"]').style.display = 'block';
			return;
		}

		e.currentTarget.parentNode.querySelector('[role="dropdown-menu"]').style.display = 'block';
	},

	close: function(e)
	{
		if(dropper.disabled)
			return;

		let buttons = CANVAS.querySelectorAll('[role="dropdown"]');
		for (var i = 0; i < buttons.length; i++) {
			buttons[i].parentNode.querySelector('[role="dropdown-menu"]').style.display = 'none';
		}
	},

	disable: function(mybool)
	{

		if(mybool)
		{
			dropper.disabled = true;
			let buttons = CANVAS.querySelectorAll('[role="dropdown"]');
			for (var i = 0; i < buttons.length; i++) {
				buttons[i].parentNode.querySelector('[role="dropdown-menu"]').style.display = 'block';
			}

		}else{
			dropper.disabled = false;
			dropper.init();
		}
	}
}

