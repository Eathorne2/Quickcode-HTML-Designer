var SLIDER = {

	items: [],
	intervals: [],

	init: function()
	{
		for (var i = SLIDER.intervals.length - 1; i >= 0; i--) {
			clearInterval(SLIDER.intervals[i]);
		}

		SLIDER.items = CANVAS.querySelectorAll('[role="slider"]');
		if(SLIDER.items.length == 0)
			return;

		for (var i = 0; i < SLIDER.items.length; i++) {
			
			//set events for prev button
			let prev_button = SLIDER.items[i].querySelector('[role="prev-button"]');
			if(prev_button)
				prev_button.addEventListener('click',SLIDER.prev);

			//set events for next button
			let next_button = SLIDER.items[i].querySelector('[role="next-button"]');
			if(next_button)
				next_button.addEventListener('click',SLIDER.next);

			//set events for buttons at the bottom
			let slider_buttons_container = SLIDER.items[i].querySelector('[role="slider-buttons"]');
			if(slider_buttons_container){
				for (var x = slider_buttons_container.children.length - 1; x >= 0; x--) {
					slider_buttons_container.children[x].setAttribute('onclick',`parent.SLIDER.go_to(${x},event)`);
				}
			}
			
			//set transition ended trigger
			let imgs = SLIDER.items[i].querySelectorAll('[role="slider-item"]');
			for (var x = 0; x < imgs.length; x++) {
				imgs[x].addEventListener('transitionend',SLIDER.transition_ended);
			}

			let mytime = 10000;
			if(SLIDER.items[i].getAttribute('slider-duration'))
				mytime = parseInt(SLIDER.items[i].getAttribute('slider-duration')) * 1000;

			SLIDER.switch(SLIDER.items[i]);
			let inter = setInterval(SLIDER.switch,mytime,SLIDER.items[i]);

			SLIDER.intervals[i] = inter;
		}
	},

	transition_ended: function(e){
		
		if(e.target.getAttribute('hidden-item'))
		{
			e.target.style.display = 'none';
		}
	},

	get_parent: function(e)
	{
		let parent = e.target;
		num = 0;
		while(num < 100 && parent && parent.tagName != 'BODY')
		{
			if(parent.getAttribute('role') == 'slider')
				break;
			parent = parent.parentNode;
			num++;
		}

		if(parent.getAttribute('role') == 'slider')
			return parent;

		return null;

	},

	set_active_class: function(parent)
	{
		if(parent)
		{
			let imgs = parent.querySelectorAll('[role="slider-item"]');
			if(imgs.length == 0) return;
			let current = 0;
			for (var i = imgs.length - 1; i >= 0; i--) {
				if(imgs[i].getAttribute('current')  == 'true')
					current = i;
			}

			current = (imgs.length - 1) - current;
			let slider_buttons_container = parent.querySelector('[role="slider-buttons"]');
			if(slider_buttons_container)
			{
				let myclass = slider_buttons_container.getAttribute('active-class') || 'none';
				for (var i = slider_buttons_container.children.length - 1; i >= 0; i--) {
					slider_buttons_container.children[i].classList.remove(myclass);
					if(i == current)
						slider_buttons_container.children[i].classList.add(myclass);
				}
			}
		}
	},

	pause: function(e)
	{
		let parent = SLIDER.get_parent(e);
		if(parent)
			parent.setAttribute('slider-autoplay','false');
	},

	go_to: function(index, e)
	{
		SLIDER.pause(e);
		let parent = SLIDER.get_parent(e);
		let imgs = parent.querySelectorAll('[role="slider-item"]');
		SLIDER.show_by_index((imgs.length - 1) - index, e);
	},

	show_by_index: function(index, e)
	{
		
		let parent = SLIDER.get_parent(e);
		if(parent)
		{
			let slider_transition = parent.getAttribute('slider-transition') || 'fade';
			let imgs = parent.querySelectorAll('[role="slider-item"]');
			if(imgs.length == 0) return;
			let to_show = 0;
			for (var i = imgs.length - 1; i >= 0; i--) {
				SLIDER.hide_item(imgs[i],slider_transition);
				imgs[i].setAttribute('current','false');
				if(i == index)
					to_show = i;
			}

			if(typeof imgs[to_show] != 'undefined')
			{
				SLIDER.display_item(imgs[to_show],slider_transition);
				imgs[to_show].setAttribute('current','true');
			}

			SLIDER.set_active_class(parent);
		}

	},

	display_item: function(element, transition_type = 'fade', duration = 2){

		element.removeAttribute('hidden-item');
		element.style.transition = `all ${duration}s ease`;
		element.style.display = 'block';

		if(transition_type == 'fade')
		{
			element.style.opacity = '1';
			element.style.transform = 'translate(0px, 0px) rotate(0deg) scale(1)';

		}else
		if(transition_type == 'scale'){

			element.parentNode.style.overflow = 'hidden';
			element.style.opacity = '1';
			element.style.transform = 'translate(0px, 0px) rotate(0deg) scale(1)';
		}
	},

	hide_item: function(element, transition_type = 'fade', duration = 2){

		if(element.getAttribute('hidden-item'))
			return;

		element.setAttribute('hidden-item','true');

		if(transition_type == 'fade')
		{
			element.style.transition = `all ${duration}s ease`;
			element.style.opacity = '0';
			element.style.transform = 'translate(0px, 0px) rotate(0deg) scale(1)';

		}else
		if(transition_type == 'scale'){

			element.parentNode.style.overflow = 'hidden';
			element.style.transition = `all ${duration}s ease`;
			element.style.opacity = '0';
			element.style.transform = 'translate(0px, 0px) rotate(5deg) scale(1.5)';
		}
	},
	

	prev: function(e)
	{
		SLIDER.pause(e);
		let parent = SLIDER.get_parent(e);
		if(parent)
		{
			let slider_transition = parent.getAttribute('slider-transition') || 'fade';
			let imgs = parent.querySelectorAll('[role="slider-item"]');
			if(imgs.length == 0) return;
			let current = 0;
			for (var i = imgs.length - 1; i >= 0; i--) {
				SLIDER.hide_item(imgs[i],slider_transition);
				if(imgs[i].getAttribute('current')  == 'true')
					current = i;
				imgs[i].setAttribute('current','false');
			}

			if(typeof imgs[current + 1] != 'undefined')
			{
				SLIDER.display_item(imgs[current + 1],slider_transition);
				imgs[current + 1].setAttribute('current','true');
			}else{
				SLIDER.display_item(imgs[0],slider_transition);
				imgs[0].setAttribute('current','true');
			}

			SLIDER.set_active_class(parent);
		}
	},

	next: function(e)
	{
		SLIDER.pause(e);
		let parent = SLIDER.get_parent(e);
		if(parent)
		{
			let slider_transition = parent.getAttribute('slider-transition') || 'fade';
			let imgs = parent.querySelectorAll('[role="slider-item"]');
			if(imgs.length == 0) return;
			let current = 0;
			for (var i = imgs.length - 1; i >= 0; i--) {
				SLIDER.hide_item(imgs[i],slider_transition);
				if(imgs[i].getAttribute('current')  == 'true')
					current = i;
				imgs[i].setAttribute('current','false');
			}

			if(typeof imgs[current - 1] != 'undefined')
			{
				SLIDER.display_item(imgs[current - 1],slider_transition);
				imgs[current - 1].setAttribute('current','true');
			}else{
				SLIDER.display_item(imgs[imgs.length - 1],slider_transition);
				imgs[imgs.length - 1].setAttribute('current','true');
			}

			SLIDER.set_active_class(parent);
		}
	},

	switch: function(slider)
	{
		
		if(slider.getAttribute('slider-autoplay') != 'true'){

			for (var i = SLIDER.items.length - 1; i >= 0; i--) {
				if(SLIDER.items[i] == slider)
					clearInterval(SLIDER.intervals[i]);
			}
			return;
		}

		let current_found = false;
		let imgs = slider.querySelectorAll('[role="slider-item"]');
		let slider_transition = slider.getAttribute('slider-transition') || 'fade';
		
		if(imgs.length == 0) return;
		for (var i = imgs.length - 1; i >= 0; i--) {

			if(current_found)
			{
				SLIDER.display_item(imgs[i],slider_transition);
				imgs[i].setAttribute('current','true');
				SLIDER.set_active_class(slider);
				return;
			}

			if(!imgs[i].getAttribute('current') || imgs[i].getAttribute('current') != 'true')
			{
				SLIDER.hide_item(imgs[i],slider_transition);
				imgs[i].setAttribute('current','false');
			}else{
				SLIDER.hide_item(imgs[i],slider_transition);
				imgs[i].setAttribute('current','false');
				current_found = true;
			}
		}

		let index = imgs.length-1;
		imgs[index].setAttribute('current','true');
		SLIDER.display_item(imgs[index],slider_transition);
		SLIDER.set_active_class(slider);
		
	},

}