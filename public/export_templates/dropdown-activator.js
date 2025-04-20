
const dropper = {
	
	init: function()
	{
		let buttons = document.querySelectorAll('[role="dropdown"]');
		for (var i = 0; i < buttons.length; i++) {
			buttons[i].addEventListener('click',dropper.click);
			buttons[i].parentNode.querySelector('[role="dropdown-menu"]').style.display = 'none';
		}

		document.addEventListener('mouseup',dropper.close);
	},

	click: function(e)
	{
		e.currentTarget.parentNode.querySelector('[role="dropdown-menu"]').style.display = 'block';
	},

	close: function(e)
	{
		let buttons = document.querySelectorAll('[role="dropdown"]');
		for (var i = 0; i < buttons.length; i++) {
			buttons[i].parentNode.querySelector('[role="dropdown-menu"]').style.display = 'none';
		}
	}
}

window.addEventListener('load',dropper.init);