
const responsive = {

	mode: 'monitor',
	animation_css: 'quickcode-ANIMATION-CSS',
	main_css: 'quickcode-MAIN-CSS',
	sudo_css: 'quickcode-SUDO-CSS',
	combo_css: 'quickcode-COMBO-CSS',

	data: 
	{
		monitor:{
			width: '100%',
			main_css: 'quickcode-MAIN-CSS',
			sudo_css: 'quickcode-SUDO-CSS',
			combo_css: 'quickcode-COMBO-CSS'
		},
		laptop:{
			width: '992px',
			main_css: 'quickcode-L-MAIN-CSS',
			sudo_css: 'quickcode-L-SUDO-CSS',
			combo_css: 'quickcode-L-COMBO-CSS'
		},
		tablet:{
			width: '768px',
			main_css: 'quickcode-T-MAIN-CSS',
			sudo_css: 'quickcode-T-SUDO-CSS',
			combo_css: 'quickcode-T-COMBO-CSS'
		},
		mobile_landscape:{
			width: '576px',
			main_css: 'quickcode-ML-MAIN-CSS',
			sudo_css: 'quickcode-ML-SUDO-CSS',
			combo_css: 'quickcode-ML-COMBO-CSS'
		},
		mobile:{
			width: '320px',
			main_css: 'quickcode-M-MAIN-CSS',
			sudo_css: 'quickcode-M-SUDO-CSS',
			combo_css: 'quickcode-M-COMBO-CSS'
		},

	},

	clear_classes: function()
	{
		document.querySelector('.quickcode-responsive-monitor').classList.remove('quickcode-button-active');
		document.querySelector('.quickcode-responsive-laptop').classList.remove('quickcode-button-active');
		document.querySelector('.quickcode-responsive-tablet').classList.remove('quickcode-button-active');
		document.querySelector('.quickcode-responsive-mobile-landscape').classList.remove('quickcode-button-active');
		document.querySelector('.quickcode-responsive-mobile').classList.remove('quickcode-button-active');
	},

	mute_classes: function()
	{

		SELECTED_SUDO_CLASS = null;
		
		let mute = [];
		let unmute = [];

		if(responsive.mode == 'mobile')
		{
			mute = [];
			unmute = ['monitor','laptop','tablet','mobile_landscape','mobile'];
		}else
		if(responsive.mode == 'mobile_landscape')
		{
			mute = ['mobile'];
			unmute = ['monitor','laptop','tablet','mobile_landscape'];
		}else
		if(responsive.mode == 'tablet')
		{
			mute = ['mobile','mobile_landscape'];
			unmute = ['monitor','laptop','tablet'];
		}else
		if(responsive.mode == 'laptop')
		{
			mute = ['mobile','mobile_landscape','tablet'];
			unmute = ['monitor','laptop'];
		}else
		if(responsive.mode == 'monitor')
		{
			mute = ['mobile','mobile_landscape','tablet','laptop'];
			unmute = ['monitor'];
		}

		for(mode in responsive.data)
		{
/*					if(mode == 'monitor')
				continue;
*/
			let divs = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].main_css).children;
			for (var i = 0; i < divs.length; i++) {
			
				let class_name = divs[i].id;
			/*	if(MUTED_CLASSES.includes(class_name))
					continue;*/

				let class_text = divs[i].children[0].innerHTML;
				
				if(!class_text.includes('--muted--') && mute.includes(mode))
				{
					let reg = new RegExp("."+class_name);
					divs[i].children[0].innerHTML = class_text.replace(reg,'.--muted--'+class_name);

				}else 
				if(class_text.includes('--muted--') && unmute.includes(mode))
				{
					let reg = new RegExp(".--muted--"+class_name);
					divs[i].children[0].innerHTML = class_text.replace(reg,'.'+class_name);
				}
			}

			divs = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].sudo_css).children;
			for (var i = 0; i < divs.length; i++) {
			
				let class_name = divs[i].id;
			/*	if(MUTED_CLASSES.includes(class_name))
					continue;*/

				let class_text = divs[i].children[0].innerHTML;
				
				if(!class_text.includes('--muted--') && mute.includes(mode))
				{
					let reg = new RegExp("."+class_name);
					divs[i].children[0].innerHTML = class_text.replace(reg,'.--muted--'+class_name);

				}else 
				if(class_text.includes('--muted--') && unmute.includes(mode))
				{
					let reg = new RegExp(".--muted--"+class_name);
					divs[i].children[0].innerHTML = class_text.replace(reg,'.'+class_name);
				}
			}

			divs = IFRAME.contentWindow.document.querySelector('.'+responsive.data[mode].combo_css).children;
			for (var i = 0; i < divs.length; i++) {
			
				let class_name = divs[i].id;
			/*	if(MUTED_CLASSES.includes(class_name))
					continue;*/

				let class_text = divs[i].children[0].innerHTML;
				
				if(!class_text.includes('--muted--') && mute.includes(mode))
				{
					let reg = new RegExp("."+class_name);
					divs[i].children[0].innerHTML = class_text.replace(reg,'.--muted--'+class_name);

				}else 
				if(class_text.includes('--muted--') && unmute.includes(mode))
				{
					let reg = new RegExp(".--muted--"+class_name);
					divs[i].children[0].innerHTML = class_text.replace(reg,'.'+class_name);
				}
			}

		
		}

		properties.load();
	},

	monitor: function()
	{

		actions.reset_sudos();

		responsive.mode = 'monitor';
		responsive.main_css = responsive.data['monitor'].main_css;
		responsive.sudo_css = responsive.data['monitor'].sudo_css;
		responsive.combo_css = responsive.data['monitor'].combo_css;

		responsive.mute_classes();

		IFRAME.style.width = responsive.data['monitor'].width;
		IFRAME.style.border = 'none';
		selector.refresh_selector_box();

		responsive.clear_classes();
		document.querySelector('.quickcode-responsive-monitor').classList.add('quickcode-button-active');
		properties.display_classes();

	},

	laptop: function()
	{
		actions.reset_sudos();

		responsive.mode = 'laptop';
		responsive.main_css = responsive.data['laptop'].main_css;
		responsive.sudo_css = responsive.data['laptop'].sudo_css;
		responsive.combo_css = responsive.data['laptop'].combo_css;
		
		responsive.mute_classes();

		IFRAME.style.width = responsive.data['laptop'].width;
		IFRAME.style.border = 'solid 2px black';
		selector.refresh_selector_box();
		
		responsive.clear_classes();
		document.querySelector('.quickcode-responsive-laptop').classList.add('quickcode-button-active');
		properties.display_classes();
		
	},

	tablet: function()
	{
		actions.reset_sudos();

		responsive.mode = 'tablet';
		responsive.main_css = responsive.data['tablet'].main_css;
		responsive.sudo_css = responsive.data['tablet'].sudo_css;
		responsive.combo_css = responsive.data['tablet'].combo_css;
		
		responsive.mute_classes();

		IFRAME.style.width = responsive.data['tablet'].width;
		IFRAME.style.border = 'solid 2px black';
		selector.refresh_selector_box();

		responsive.clear_classes();
		document.querySelector('.quickcode-responsive-tablet').classList.add('quickcode-button-active');
		properties.display_classes();
	},
		

	mobile_landscape: function()
	{
		actions.reset_sudos();

		responsive.mode = 'mobile_landscape';
		responsive.main_css = responsive.data['mobile_landscape'].main_css;
		responsive.sudo_css = responsive.data['mobile_landscape'].sudo_css;
		responsive.combo_css = responsive.data['mobile_landscape'].combo_css;
		
		responsive.mute_classes();

		IFRAME.style.width = responsive.data['mobile_landscape'].width;
		IFRAME.style.border = 'solid 2px black';
		selector.refresh_selector_box();

		responsive.clear_classes();
		document.querySelector('.quickcode-responsive-mobile-landscape').classList.add('quickcode-button-active');
		properties.display_classes();
	},
		

	mobile: function()
	{
		actions.reset_sudos();

		responsive.mode = 'mobile';
		responsive.main_css = responsive.data['mobile'].main_css;
		responsive.sudo_css = responsive.data['mobile'].sudo_css;
		responsive.combo_css = responsive.data['mobile'].combo_css;
		
		responsive.mute_classes();

		IFRAME.style.width = responsive.data['mobile'].width;
		IFRAME.style.border = 'solid 2px black';
		selector.refresh_selector_box();

		responsive.clear_classes();
		document.querySelector('.quickcode-responsive-mobile').classList.add('quickcode-button-active');
		properties.display_classes();
	},
		
	

};
