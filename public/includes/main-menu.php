<style>
	.quickcode-button-active{
		background-color: #152628!important;
	}
</style>
<div id="MENU_BUTTONS" oncontextmenu="return false" onselectstart="return false" style="height:auto;display:flex;flex-wrap: nowrap;align-items: center;">

	<div style="background-color:white">
		<img src="assets/images/logo.jpg" style="width: 90px;margin-right:10px" alt="Quickcode HTML">
	</div>

	<div style="background-color:#a32bd9">
		<span style="display:block;" onclick="item_loader.load_items()">
			<svg fill="white" style="height:20px;width: 20px;" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7 14h-5v5h-4v-5h-5v-4h5v-5h4v5h5v4z"/></svg>
			Add Item
		</span>
	</div>

	<div>
		File
		<div>
			<a onclick="IO.new_page()">
				<svg fill="#ffcb00" width="24" height="24" viewBox="0 0 24 24"><path d="M19.5 13c-2.483 0-4.5 2.015-4.5 4.5s2.017 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.017-4.5-4.5-4.5zm2.5 5h-2v2h-1v-2h-2v-1h2v-2h1v2h2v1zm-7.18 4h-14.82v-20h7c1.695 1.942 2.371 3 4 3h13v7.82c-1.169-1.124-2.754-1.82-4.5-1.82-3.584 0-6.5 2.916-6.5 6.5 0 1.747.695 3.331 1.82 4.5z"/></svg>
				New Project
			</a>
			<a onclick="IMPORT_MODE = false;open_dialog.load_files()">
				<svg fill="#f7d6b5" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M0 2h8l3 3h10v4h3l-4 13h-20v-20zm22.646 8h-17.907l-3.385 11h17.907l3.385-11zm-2.646-1v-3h-9.414l-3-3h-6.586v15.75l3-9.75h16z"/></svg>
				Open Project
			</a>
			<a onclick="IMPORT_MODE = true;open_dialog.load_files()">
				<svg fill="#f7d6b5" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M0 2h8l3 3h10v4h3l-4 13h-20v-20zm22.646 8h-17.907l-3.385 11h17.907l3.385-11zm-2.646-1v-3h-9.414l-3-3h-6.586v15.75l3-9.75h16z"/></svg>
				Import Project
			</a>
			<a onclick="IO.save()">
				<svg fill="#44d1e5" width="24" height="24" viewBox="0 0 24 24"><path d="M14 3h2.997v5h-2.997v-5zm9 1v20h-22v-24h17.997l4.003 4zm-17 5h12v-7h-12v7zm14 4h-16v9h16v-9z"/></svg>
				Save
			</a>
			<a onclick="IO.save_as()">
				<svg fill="#44d1e5" width="24" height="24" viewBox="0 0 24 24"><path d="M15.563 22.282l-3.563.718.72-3.562 2.843 2.844zm-2.137-3.552l2.845 2.845 7.729-7.73-2.845-2.845-7.729 7.73zm-3.062 2.27h-7.364v-7h12.327l6.673-6.688v-2.312l-4-4h-18v22h9.953l.411-2zm-5.364-18h12v7h-12v-7zm8.004 6h2.996v-5h-2.996v5z"/></svg>
				Save As
			</a>
			<a onclick="IO.export('preview')">
				<svg fill="#f7d6b5" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" ><path d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm.002 3c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5z" fill-rule="nonzero"/></svg>
				Preview Page
			</a>
			<a onclick="IO.export()">
				<svg fill="#ffcb00" width="24" height="24" viewBox="0 0 24 24"><path d="M12 21l-8-9h6v-12h4v12h6l-8 9zm9-1v2h-18v-2h-2v4h22v-4h-2z"/></svg>
				Download
			</a>
			
			<a class="quickcode-export-template-button" onclick="IO.export('export_template')">
				<svg fill="#ffcb00" width="24" height="24" viewBox="0 0 24 24"><path d="M12 21l-8-9h6v-12h4v12h6l-8 9zm9-1v2h-18v-2h-2v4h22v-4h-2z"/></svg>
				Export Template
			</a>
			<a class="quickcode-auth-login-button" onclick="IO.show_login()">
				<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
				Login
			</a>
			<a class="quickcode-auth-signup-button" onclick="IO.show_signup()">
				<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24"><path d="M19.5 15c-2.483 0-4.5 2.015-4.5 4.5s2.017 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.017-4.5-4.5-4.5zm2.5 5h-2v2h-1v-2h-2v-1h2v-2h1v2h2v1zm-7.18 4h-14.815l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 6.751 0 7.506 7.595 3.64 13.679-1.292 2.031-2.64 3.63-2.64 5.821 0 1.747.696 3.331 1.82 4.5z"/></svg>
				Signup
			</a>
			
			<a class="quickcode-auth-show-profile-button" onclick="IO.show_profile()">
				<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
				Profile
			</a>
			<a class="quickcode-auth-logout-button" onclick="IO.logout()">
				<svg fill="#ffcb00" width="24" height="24" viewBox="0 0 24 24"><path d="M11 21h8.033v-2l1-1v4h-9.033v2l-10-3v-18l10-3v2h9.033v5l-1-1v-3h-8.033v18zm-1 1.656v-21.312l-8 2.4v16.512l8 2.4zm11.086-10.656l-3.293-3.293.707-.707 4.5 4.5-4.5 4.5-.707-.707 3.293-3.293h-9.053v-1h9.053z"/></svg>
				Logout
			</a>
			
			<a href="https://www.freephptutorials.com">
				Exit
			</a>
			
		</div>
	</div>

	<div>
		Edit
		<div>
			<a onclick="submenu_actions.change_z_index('up',event)">
		      <svg fill="#f7d6b5" width="20" height="20" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
		      Move up
		    </a>
		    <a onclick="submenu_actions.change_z_index('down',event)">
		      <svg fill="#f7d6b5" width="20" height="20" style="transform:rotate(180deg);" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
		      Move down
		    </a>
		    <a onclick="submenu_actions.change_z_index('top',event)" class="quickcode-top_border">
		      <svg fill="#44d1e5" width="20" height="20" style="transform:rotate(-90deg);" viewBox="0 0 24 24"><path d="M19 12l-18 12v-24l18 12zm4-11h-4v22h4v-22z"/></svg>
		      Move to top
		    </a>
		    <a onclick="submenu_actions.change_z_index('bottom',event)">
		      <svg fill="#44d1e5" width="20" height="20" style="transform:rotate(90deg);" viewBox="0 0 24 24"><path d="M19 12l-18 12v-24l18 12zm4-11h-4v22h4v-22z"/></svg>
		      Move to Bottom
		    </a>
		    <a onclick="submenu_actions.clone_element(event)" class="quickcode-top_border">
		      <svg fill="#4cd4b0" width="20" height="20" viewBox="0 0 24 24"><path d="M13.508 11.504l.93-2.494 2.998 6.268-6.31 2.779.894-2.478s-8.271-4.205-7.924-11.58c2.716 5.939 9.412 7.505 9.412 7.505zm7.492-9.504v-2h-21v21h2v-19h19zm-14.633 2c.441.757.958 1.422 1.521 2h14.112v16h-16v-8.548c-.713-.752-1.4-1.615-2-2.576v13.124h20v-20h-17.633z"/></svg>
		      Clone
		    </a>
		    <a onclick="submenu_actions.duplicate_element(event)" >
		      <svg fill="#4cd4b0" width="20" height="20" viewBox="0 0 24 24"><path d="M18 6v-6h-18v18h6v6h18v-18h-6zm-12 10h-4v-14h14v4h-10v10zm16 6h-14v-14h14v14zm-3-8h-3v-3h-2v3h-3v2h3v3h2v-3h3v-2z"/></svg>
		      Duplicate
		    </a>
		    <a onclick="submenu_actions.cut_element(event)" >
		      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M12.026 14.116c-3.475 1.673-7.504 3.619-8.484 4.09-1.848.889-3.542-1.445-3.542-1.445l8.761-4.226 3.265 1.581zm7.93 6.884c-.686 0-1.393-.154-2.064-.479-1.943-.941-2.953-3.001-2.498-4.854.26-1.057-.296-1.201-1.145-1.612l-14.189-6.866s1.7-2.329 3.546-1.436c1.134.549 5.689 2.747 9.614 4.651l.985-.474c.85-.409 1.406-.552 1.149-1.609-.451-1.855.564-3.913 2.51-4.848.669-.321 1.373-.473 2.054-.473 2.311 0 4.045 1.696 4.045 3.801 0 1.582-.986 3.156-2.613 3.973-1.625.816-2.765.18-4.38.965l-.504.245.552.27c1.613.789 2.754.156 4.377.976 1.624.819 2.605 2.392 2.605 3.97 0 2.108-1.739 3.8-4.044 3.8zm-2.555-12.815c.489 1.022 1.876 1.378 3.092.793 1.217-.584 1.809-1.893 1.321-2.916-.489-1.022-1.876-1.379-3.093-.794s-1.808 1.894-1.32 2.917zm-3.643 3.625c0-.414-.335-.75-.75-.75-.414 0-.75.336-.75.75s.336.75.75.75.75-.336.75-.75zm6.777 3.213c-1.215-.588-2.604-.236-3.095.786-.491 1.022.098 2.332 1.313 2.919 1.215.588 2.603.235 3.094-.787.492-1.021-.097-2.33-1.312-2.918z"/></svg>
		      Cut Element
		    </a>
		    <a onclick="submenu_actions.copy_element(event)" >
		      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="m6 18v3c0 .621.52 1 1 1h14c.478 0 1-.379 1-1v-14c0-.478-.379-1-1-1h-3v-3c0-.478-.379-1-1-1h-14c-.62 0-1 .519-1 1v14c0 .621.52 1 1 1zm10.5-12h-9.5c-.62 0-1 .519-1 1v9.5h-2.5v-13h13z" fill-rule="nonzero"/></svg>
		      Copy Element
		    </a>
		    <a onclick="submenu_actions.paste_element(event)" >
		      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M21 2h-19v19h-2v-21h21v2zm3 2v20h-20v-20h20zm-2 2h-1.93c-.669 0-1.293.334-1.664.891l-1.406 2.109h-6l-1.406-2.109c-.371-.557-.995-.891-1.664-.891h-1.93v16h16v-16zm-3 6h-10v1h10v-1zm0 3h-10v1h10v-1zm0 3h-10v1h10v-1z"/></svg>
		      Paste Element
		    </a>
		    <a onclick="submenu_actions.delete_element(event)" >
		      <svg fill="#ffcb00" width="20" height="20" viewBox="0 0 24 24"><path  id="delete" onclick="submenu_actions.delete_element(event)"  d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
		      Delete
		    </a>
		    <a onclick="submenu_actions.clear_contents(event)" >
		      <svg fill="#ffcb00" width="20" height="20" viewBox="0 0 24 24"><path  id="Clear contents" onclick="submenu_actions.delete_element(event)"  d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
		      Clear Contents
		    </a>
		    
		    <a class="quickcode-top_border" onclick="actions.select_handle(event)">
		      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M18 8v-2h-2v2h-10v16h18v-16h-6zm4 14h-14v-12h14v12zm-6-20h-3v-2h5v4h-2v-2zm-14 8h-2v-4h2v4zm9-8h-4v-2h4v2zm-11-2h5v2h-3v2h-2v-4zm2 14h3v2h-5v-4h2v2z"/></svg>
		      Select Handle
		    </a>
		    <a class="quickcode-top_border" onclick="submenu_actions.select_parent(event)">
		      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M18 8v-2h-2v2h-10v16h18v-16h-6zm4 14h-14v-12h14v12zm-6-20h-3v-2h5v4h-2v-2zm-14 8h-2v-4h2v4zm9-8h-4v-2h4v2zm-11-2h5v2h-3v2h-2v-4zm2 14h3v2h-5v-4h2v2z"/></svg>
		      Select Parent
		    </a>
		    
		    <a onclick="submenu_actions.select_child(event)">
		      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M8 12h-2v-4h5v2h-3v2zm11-4v2h3v2h2v-4h-5zm-11 12h-2v4h5v-2h-3v-2zm5 4h4v-2h-4v2zm9-6h2v-4h-2v4zm0 4h-3v2h5v-4h-2v2zm-14-4v-4h-6v-12h14v6h-3v2h5v-10h-18v16h6v2h2z"/></svg>
		      Select First Child
		    </a>
		    <a onclick="submenu_actions.select_prev_sibling(event)">
		      <svg fill="#44d1e5" width="20" height="20" viewBox="0 0 24 24"><path d="M18.764 17.385l2.66 5.423-2.441 1.192-2.675-5.474-3.308 2.863v-12.389l10 7.675-4.236.71zm2.236-7.385h2v-4h-2v4zm0 2.619l2 1.535v-2.154h-2v.619zm-10 8.77v-1.389h-4v2h4v-.611zm-8-3.389h-2v4h4v-2h-2v-2zm-2-14h2v-2h2v-2h-4v4zm2 8h-2v4h2v-4zm8-12h-4v2h4v-2zm6 0h-4v2h4v-2zm4 4h2v-4h-4v2h2v2zm-18 2h-2v4h2v-4z"/></svg>
		      Select Prev Sibling
		    </a>
		    <a onclick="submenu_actions.select_next_sibling(event)">
		      <svg style="transform: rotate(180deg);" fill="#44d1e5" width="20" height="20" viewBox="0 0 24 24"><path d="M18.764 17.385l2.66 5.423-2.441 1.192-2.675-5.474-3.308 2.863v-12.389l10 7.675-4.236.71zm2.236-7.385h2v-4h-2v4zm0 2.619l2 1.535v-2.154h-2v.619zm-10 8.77v-1.389h-4v2h4v-.611zm-8-3.389h-2v4h4v-2h-2v-2zm-2-14h2v-2h2v-2h-4v4zm2 8h-2v4h2v-4zm8-12h-4v2h4v-2zm6 0h-4v2h4v-2zm4 4h2v-4h-4v2h2v2zm-18 2h-2v4h2v-4z"/></svg>
		      Select Next Sibling
		    </a>

		</div>
	</div>

	<div>
		View
		<div>
			<a onclick="properties.reset_position()">Reset Properties Panel</a>
			<a onclick="PAGE.reset_position()">Reset Page Panel</a>
			<a onclick="TREE.reset_position()">Reset Tree Panel</a>
			<a onclick="selector.clear_selection()">Clear Selection</a>
			<a><label><input class="quickcode-js-allow_transform" type="checkbox" onchange="actions.show_transform_box(this.checked)" checked /> Show transform box</label></a>
			<a><label><input class="quickcode-js-allow_hover" type="checkbox" onchange="actions.allow_hover(this.checked)" checked /> Allow Hover Highlight</label></a>
			<a><label><input class="quickcode-js-allow_drag" type="checkbox" onchange="actions.allow_drag(this.checked)" /> Allow Element Drag</label></a>
			<a><label><input class="quickcode-js-show_grid" type="checkbox" onchange="actions.show_grid(this.checked)" checked /> Show grid</label></a>
			<a><label><input class="quickcode-js-autoclose_item_loader" type="checkbox" onchange="item_loader.auto_close(this.checked)" checked /> Auto close item loader</label></a>
			<a><label><input class="quickcode-js-disable_dropdown_action" type="checkbox" onchange="dropper.disable(this.checked)" /> Disable Dropdown Action</label></a>
		</div>
	</div>

	<div>
		Pages
		<div>
			<a onclick="PAGE.save_new('Untitled')">
		      New page
		    </a>
		    <a onclick="PAGE.show_properties(true)">
		      Page properties
		    </a>
		    <a onclick="PAGE.show_list(true)">
		      Page List
		    </a>
		    <a onclick="PAGE.delete()">
		      Delete Page
		    </a>
	    
		</div>
	</div>

	<div>
		CSS
		<div>
			<a onclick="actions.delete_orphaned_classes()">
		      Delete Orphaned Classes
		    </a>
		    <a onclick="PALETTE.show_list()">
		      Color Palette
		    </a>
		    
		    <a onclick="">
		      Animations
		    </a>

		</div>
	</div>
 
	<div>
		Help
		<div>
			<a target="_new" href="https://paypal.me/roletanimations">
				Donate 
				<svg xmlns="http://www.w3.org/2000/svg" fill="#66ff59" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.435c-1.989-5.399-12-4.597-12 3.568 0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-8.118-10-8.999-12-3.568z"/></svg>
			</a>
			<a target="_new" href="https://patreon.com/quickcode">
				Support me on Patreon 
			</a>
			
			<a target="_new" href="https://www.youtube.com/watch?v=4e0kgd2f7Os&list=PLY3j36HMSHNV5S5IYa24hHMXfhGN-sPKx">Video Tutorials</a>
			<a target="_new" href="https://www.youtube.com/@QuickProgramming">Youtube Channel</a>
			<a onclick="document.getElementById('SPLASH_LOADER').setAttribute('style','')" href="#">About</a>
		</div>
	</div>

	<div style="background-color:#4f6794">
		<label style="cursor: pointer;">
			<input class="quickcode-js-allow_page_list" type="checkbox" onchange="PAGE.show_list(this.checked)" > 
			Pages
		</label>
	</div>
	<div style="background-color:#4f6794">
		<label style="cursor: pointer;">
			<input class="quickcode-js-allow_tree" type="checkbox" onchange="TREE.show(this.checked)" > 
			Tree
		</label>
	</div>
	
	<div style="background-color:#4f6794">
		<label style="cursor: pointer;">
			<input class="quickcode-js-allow_properties" type="checkbox" onchange="actions.allow_properties(this.checked)" checked> 
			Properties
		</label>
	</div>
	<div onclick="actions.undo()">
		<svg fill="white" style="float: left;width: 18px;height: 18px;" width="20" height="20" viewBox="0 0 24 24"><path d="M19.885 5.515c-4.617-4.618-12.056-4.676-16.756-.195l-2.129-2.258v7.938h7.484l-2.066-2.191c2.82-2.706 7.297-2.676 10.074.1 2.992 2.993 2.664 7.684-.188 10.319l3.314 3.5c4.716-4.226 5.257-12.223.267-17.213z"/></svg>
		 &nbsp Undo
	</div>
<!-- 	<div onclick="actions.redo()">
		<svg fill="white" style="transform: rotateY(180deg);width: 18px;height: 18px;" width="20" height="20" viewBox="0 0 24 24"><path d="M19.885 5.515c-4.617-4.618-12.056-4.676-16.756-.195l-2.129-2.258v7.938h7.484l-2.066-2.191c2.82-2.706 7.297-2.676 10.074.1 2.992 2.993 2.664 7.684-.188 10.319l3.314 3.5c4.716-4.226 5.257-12.223.267-17.213z"/></svg>
		 Redo
	</div> -->
	<div class="quickcode-responsive-monitor quickcode-button-active" onclick="responsive.monitor()" style="margin-left:1px;width:40px;padding:0px 0px;">
		<svg fill="white" style="margin-top:8px;float:none;height: 18px;" viewBox="0 0 24 24"><path d="M2 0c-1.104 0-2 .896-2 2v15c0 1.104.896 2 2 2h20c1.104 0 2-.896 2-2v-15c0-1.104-.896-2-2-2h-20zm20 14h-20v-12h20v12zm-6.599 7c0 1.6 1.744 2.625 2.599 3h-12c.938-.333 2.599-1.317 2.599-3h6.802z"/></svg>
	</div>
	<div class="quickcode-responsive-laptop quickcode-button" onclick="responsive.laptop()" style="margin-left:1px;width:40px;padding:0px 0px;">
		<svg fill="white" style="margin-top:8px;float:none;height: 18px;" viewBox="0 0 24 24"><path d="M22 17v-11.8c0-.663-.537-1.2-1.2-1.2h-17.6c-.663 0-1.2.537-1.2 1.2v11.8h20zm-18-11h16v9h-16v-9zm20 12v.8c0 .663-.537 1.2-1.2 1.2h-21.6c-.663 0-1.2-.537-1.2-1.2v-.8h10c0 .276.224.5.5.5h3c.276 0 .5-.224.5-.5h10z"/></svg>
	</div>
	<div class="quickcode-responsive-tablet" onclick="responsive.tablet()" style="margin-left:1px;width:40px;padding:0px 0px;">
		<svg fill="white" style="margin-top:8px;float:none;height: 18px;" viewBox="0 0 24 24"><path d="M19 24c1.104 0 2-.896 2-2v-20c0-1.104-.896-2-2-2h-14c-1.104 0-2 .896-2 2v20c0 1.104.896 2 2 2h14zm-14-3v-18h14v18h-14zm6.5 1.5c0-.276.224-.5.5-.5s.5.224.5.5-.224.5-.5.5-.5-.224-.5-.5z"/></svg>
	</div>
	<div class="quickcode-responsive-mobile-landscape" onclick="responsive.mobile_landscape()" style="margin-left:1px;width:40px;padding:0px 0px;">
		<svg fill="white" style="transform: rotate(90deg);margin-top:8px;float:none;height: 18px;" viewBox="0 0 24 24"><path d="M7 0c-1.105 0-2 .896-2 2v18.678c-.001 2.213 3.503 3.322 7.005 3.322 3.498 0 6.995-1.106 6.995-3.322v-18.678c0-1.104-.895-2-2-2h-10zm5 22c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1zm5-4h-10v-14h10v14z"/></svg>
	</div>
	<div class="quickcode-responsive-mobile" onclick="responsive.mobile()" style="margin-left:1px;width:40px;padding:0px 0px;">
		<svg fill="white" style="margin-top:8px;float:none;height: 18px;" viewBox="0 0 24 24"><path d="M7 0c-1.105 0-2 .896-2 2v18.678c-.001 2.213 3.503 3.322 7.005 3.322 3.498 0 6.995-1.106 6.995-3.322v-18.678c0-1.104-.895-2-2-2h-10zm5 22c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1zm5-4h-10v-14h10v14z"/></svg>
	</div>
	
	<span onclick="IO.show_profile()" class="quickcode-js-doc-user" style="margin-left: 10px;">
		Hi, User
	</span>
	<span class="quickcode-js-doc-title" style="color:#fff559;margin-left: 10px;text-transform: capitalize;text-overflow: ellipsis;white-space: nowrap;max-width: 150px;">
		Untitled
	</span>
	
</div>