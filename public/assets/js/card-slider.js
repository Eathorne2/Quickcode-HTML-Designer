var CARD_SLIDER = {

	items: [],
	intervals: [],
 
	init: function()
	{
 
		CARD_SLIDER.items = CANVAS.querySelectorAll('[role="card-slider"]');
		if(CARD_SLIDER.items.length == 0)
			return;

		for (var i = 0; i < CARD_SLIDER.items.length; i++) {
			
			//set events for prev button
			let prev_button = CARD_SLIDER.items[i].querySelector('[role="slider-left-button"]');
			if(prev_button)
				prev_button.addEventListener('click',CARD_SLIDER.prev);

			//set events for next button
			let next_button = CARD_SLIDER.items[i].querySelector('[role="slider-right-button"]');
			if(next_button)
				next_button.addEventListener('click',CARD_SLIDER.next);

 			prev_button.style.opacity = 0.3;
 			next_button.style.opacity = 1;

 			let imgs = CARD_SLIDER.items[i].querySelectorAll('[role="slider-card-holder"]');
			if(imgs.length > 0)
			{
				let current = 0;
 				for (var i = 0; i < imgs.length; i++) {
 
 					if(i == 0)
						imgs[i].setAttribute('current','true');
					else
						imgs[i].setAttribute('current','false');
				}
			}
 
		}
	},
 
	get_parent: function(e)
	{
		let parent = e.target;
		num = 0;
		while(num < 100 && parent && parent.tagName != 'BODY')
		{
			if(parent.getAttribute('role') == 'card-slider')
				break;
			parent = parent.parentNode;
			num++;
		}

		if(parent.getAttribute('role') == 'card-slider')
			return parent;

		return null;

	},
 
	prev: function(e)
	{
		

		let parent = CARD_SLIDER.get_parent(e);
		if(parent)
		{
			let next_button = parent.querySelector('[role="slider-right-button"]');
			if(next_button)
				next_button.style.opacity = 1;

			let slider_transition = parent.getAttribute('slider-transition') || 'slide';
			let imgs = parent.querySelectorAll('[role="slider-card-holder"]');
			if(imgs.length == 0) return;
			let current = 0;
			for (var i = imgs.length - 1; i >= 0; i--) {
				
				if(imgs[i].getAttribute('current')  == 'true')
					current = i;
			}

			if(imgs[current - 1] != null)
			{

				imgs[current].parentNode.style.position = 'relative';

				let box = imgs[current].getBoundingClientRect();
				let parent_box = imgs[current].parentNode.getBoundingClientRect();

				let box_count = 0;
				let child = imgs[current];
				while((child = child.previousElementSibling) != null){
				  box_count++;
				}

				for (var i = imgs.length - 1; i >= 0; i--) {
 
					imgs[i].setAttribute('current','false');
				}

				imgs[current - 1].setAttribute('current','true');

				if(!imgs[current - 2]){
					let prev_button = parent.querySelector('[role="slider-left-button"]');
					if(prev_button)
						prev_button.style.opacity = 0.3;
				}

				imgs[current].parentNode.style.left = -((box.width * (box_count - 1)) + 1) + 'px';
				imgs[current - 1].setAttribute('current','true');

			}

		}
	},

	next: function(e)
	{
		

		let parent = CARD_SLIDER.get_parent(e);
		if(parent)
		{
			let prev_button = parent.querySelector('[role="slider-left-button"]');
			if(prev_button)
				prev_button.style.opacity = 1;

			let slider_transition = parent.getAttribute('slider-transition') || 'slide';
			let imgs = parent.querySelectorAll('[role="slider-card-holder"]');
			if(imgs.length == 0) return;
			let current = 0;
			for (var i = imgs.length - 1; i >= 0; i--) {
				
				if(imgs[i].getAttribute('current')  == 'true')
					current = i;
			}

			if(imgs[current + 1] != null)
			{
				imgs[current].parentNode.style.position = 'relative';
 
				let box = imgs[current].getBoundingClientRect();
				let content_mover = imgs[current].parentNode.getBoundingClientRect();
				let content_mover_holder = imgs[current].parentNode.parentNode.getBoundingClientRect();
					
					let box_count = 1;
					let child = imgs[current];
					while((child = child.previousElementSibling) != null){
					  box_count++;
					}

					imgs[current].parentNode.style.left = -((box.width * box_count) + 1) + 'px';

					for (var i = imgs.length - 1; i >= 0; i--) {
 
						imgs[i].setAttribute('current','false');
					}

					imgs[current + 1].setAttribute('current','true');

 					if(!imgs[current + 2])
 					{
 						let next_button = parent.querySelector('[role="slider-right-button"]');
						if(next_button)
							next_button.style.opacity = 0.3;
 					}

 					content_mover = imgs[current].parentNode.getBoundingClientRect();
 
					if(Math.abs(imgs[current].parentNode.style.left.replace('px','')) + content_mover_holder.width > (box.width * imgs[current].parentNode.children.length))
					{
						imgs[current].parentNode.style.left = -((box.width * imgs[current].parentNode.children.length) - content_mover_holder.width) + 'px';
					}
			}
			
		}
	},

	resize: function()
	{
		let parents = document.querySelectorAll('[role="card-slider"]');

		for (var x = 0; x < parents.length; x++) {
			
			let imgs = parents[x].querySelectorAll('[role="slider-card-holder"]');
			if(imgs.length == 0) return;
			let current = 0;
			for (var i = imgs.length - 1; i >= 0; i--) {
				
				if(imgs[i].getAttribute('current') == 'true'){
					current = i;
					break;
				}
			}

			let box_count = 0;
			let child = imgs[current];
			while((child = child.previousElementSibling) != null){
			  box_count++;
			}

			let box = imgs[current].getBoundingClientRect();
			imgs[current].parentNode.style.left = -((box.width * box_count)) + 'px';
			
		}
	}
 

}

