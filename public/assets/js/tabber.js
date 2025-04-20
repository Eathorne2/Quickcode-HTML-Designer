
const tabber = {

	tabs: [],
	panes: [],

	init: function()
	{
		let tab_containers = IFRAME.contentWindow.document.querySelectorAll('[role="tab-container"]');

		for (var i = 0; i < tab_containers.length; i++) {
			
			tabber.tabs = tab_containers[i].querySelectorAll('[role="tab"]');
			tabber.panes = tab_containers[i].querySelectorAll('[role="tab-pane"]');
			let active_tab = null;

			//add click event listeners to tabs
			for (var x = 0; x < tabber.tabs.length; x++) {
				tabber.tabs[x].addEventListener('click',tabber.click);

				if(tabber.tabs[x].getAttribute('active') == 'true')
					active_tab = tabber.tabs[x];
			}

			tabber.hide_all();

			//activate the default pane
			if(active_tab){

				let id = active_tab.getAttribute('activates');
				active_tab.setAttribute('active','true');
				let active_class = active_tab.getAttribute('active-class');
				if(id){
					let ele = tab_containers[i].querySelector('#'+id);
					if(ele){
						ele.style.display = 'block';
						if(active_class)
							active_tab.classList.add(active_class);
					}
				}
			}
		}

	},

	hide_all: function()
	{
		//hide all panes
		for (var i = 0; i < tabber.panes.length; i++) {
			tabber.panes[i].style.display = 'none';
		}

		//remove active class from all tabs
		for (var i = 0; i < tabber.tabs.length; i++) {
			let active_class = tabber.tabs[i].getAttribute('active-class');
			tabber.tabs[i].setAttribute('active','false');

			if(active_class)
				tabber.tabs[i].classList.remove(active_class);
		}

		
	},

	click: function(e)
	{
		let tab = e.currentTarget;

		let parent = tab;
		let num = 0;
		let found = false;
		while(num < 20 && parent){
			parent = parent.parentNode;
			if(parent.getAttribute('role') == 'tab-container'){
				found = true;
				break;
			}
			num++;
		}

		if(!found) return;

		tabber.tabs = parent.querySelectorAll('[role="tab"]');
		tabber.panes = parent.querySelectorAll('[role="tab-pane"]');

		tabber.hide_all();

		let id = tab.getAttribute('activates');
		tab.setAttribute('active','true');

		if(id){
			let ele = parent.querySelector('#'+id);
			let active_class = tab.getAttribute('active-class');
			if(ele){
				ele.style.display = 'block';
				if(active_class){
					tab.classList.add(active_class);
				}
			}
		}
	}
}
