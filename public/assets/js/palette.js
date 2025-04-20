
const PALETTE = {

	palettes: [],
	index: 0,

	set: function(e)
	{
		e.stopPropagation();
		e.preventDefault();

		let index = 0;
		let inputs = e.target.form.querySelectorAll('input');
		
		for (var i = 0; i < inputs.length; i++) {
			if(inputs[i].checked){
					index = inputs[i].value;
				break;
			}
		}

		PALETTE.index = index;
		if(typeof PALETTE.palettes[index] != 'undefined'){

			let text = PALETTE.palettes[index].colors;
			let all_colors = document.querySelectorAll('.jscolor');
			for (var i = 0; i < all_colors.length; i++) {
				all_colors[i].jscolor.option({palette:text});
			}
		}

		PALETTE.hide();

	},

	hide: function()
	{
		document.querySelector('#COLOR_PALETTE').classList.add('quickcode-hide');
	},

	load: function()
	{
		let myform = new FormData();
		myform.append('data_type','load_palettes');

		let xhr = new XMLHttpRequest();
		xhr.addEventListener('readystatechange',function(){

			if(xhr.readyState == 4 && xhr.status == 200){
				let obj = JSON.parse(xhr.responseText);
				if(typeof obj == 'object')
				{
					PALETTE.palettes = obj.data;
				}
			}
		});

		xhr.open('POST','api.php',true);
		xhr.send(myform);
	},

	show_list: function()
	{
		let div = document.querySelector('#COLOR_PALETTE');
		div.classList.remove('quickcode-hide');
		let holder = div.querySelector('.quickcode-palette-holder');
		let str = "";
		holder.innerHTML = "";

		for (var i = 0; i < PALETTE.palettes.length; i++) {
			str += `<div class="quickcode-single-palette">
						<div>
							<label style="cursor: pointer"><input type="radio" name="palette" value="${i}" ${PALETTE.index == i ? 'checked':''} /> ${PALETTE.palettes[i].name}</label>
						</div>
						<div style="display: flex;padding: 4px;box-shadow: 0px 0px 30px #ccc;height:20px">`;
			
			let text = PALETTE.palettes[i].colors;

			let parts = text.split(' ');
			for (var x = 0; x < parts.length; x++) {
				str += `<div style="height: 32px;flex: 1;margin-bottom:10px;background-color: ${parts[x]}"></div>`;
			}

			if(PALETTE.palettes[i].type == 'user')
				str += "<div style='color:red;padding:4px;cursor:pointer;font-weight:bold' onclick='PALETTE.delete("+PALETTE.palettes[i].id+")'>X</div>";

			str += "</div></div>";
		}

		holder.innerHTML += str;

	},

	save_new: function()
	{
		let title = document.querySelector('.COLOR_PALETTE-add-new').querySelector('input').value;
		if(title == ''){
			alert("Please add a title!");
			document.querySelector('.COLOR_PALETTE-add-new').querySelector('input').select();
			return;
		}

		let colors = document.querySelector('.COLOR_PALETTE-add-new').querySelector('textarea').value;
		if(colors == '' || !colors.match(/\#[0-9a-f]+/gi)){
			alert("Please add some colors in HEX format separated by space!");
			document.querySelector('.COLOR_PALETTE-add-new').querySelector('textarea').select();
			return;
		}
		
		PALETTE.palettes.splice(0,0,{

			colors: colors.replaceAll(/[^0-9a-f\#\s]/gi,''),
			name: title,
			type: 'user',
		});

		PALETTE.show_list();
		document.querySelector('.COLOR_PALETTE-add-new').classList.add('quickcode-hide');

		let myform = new FormData();
		myform.append('data_type','save_palette');
		myform.append('name',title);
		myform.append('colors',colors);
		myform.append('type','user');

		let xhr = new XMLHttpRequest();
		xhr.addEventListener('readystatechange',function(){

			if(xhr.readyState == 4 && xhr.status == 200){
 
			}
		});

		xhr.open('POST','api.php',true);
		xhr.send(myform);

	},

	show_new: function()
	{
		if(IO.logged_in){
			document.querySelector('.COLOR_PALETTE-add-new').classList.remove('quickcode-hide');
			document.querySelector('.COLOR_PALETTE-add-new').querySelector('input').value = '';
			document.querySelector('.COLOR_PALETTE-add-new').querySelector('textarea').value = '';
		}else{
			alert("Please login first to add color palettes");
		}
	},

	delete: function(id)
	{
		if(!confirm("Are you sure you want to delete this palette?!"))
			return;

		let myform = new FormData();
		myform.append('data_type','delete_palette');
		myform.append('id',id);

		let xhr = new XMLHttpRequest();
		xhr.addEventListener('readystatechange',function(){

			if(xhr.readyState == 4 && xhr.status == 200){
				PALETTE.load();
				alert("Palette deleted successfully!");
				PALETTE.show_list();

			}
		});

		xhr.open('POST','api.php',true);
		xhr.send(myform);
	},

	
	
};
