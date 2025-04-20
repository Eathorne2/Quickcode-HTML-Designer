<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quickcode Free HTML Template Designer | Create & edit your html and css templates for free</title>
	<meta name="description" content="Create & edit your html and css templates for free">
	<meta name="keywords" content="HTML, Template, Free, Quickcode, Quick programming, CSS, Javascript">
	<meta name="author" content="Eathorne Choongo">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css?v4">
  	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5716085734185341" crossorigin="anonymous"></script>

</head>
<style >
	import * as htmlToImage from 'html-to-image';
	import { toPng, toJpeg } from 'html-to-image';
</style>

<body style="min-width:1000px;">
	<div class="main-loader" style="text-align:center;position:fixed;top:40%;left:50%;translate: -50% -50%;width:100%;max-width:200px;">
		<img src="assets/images/loader.gif" style="width:100%">
		<div style="margin-top:-100px">Please wait...</div>
	</div>
	<main style="display:none">

	<?php require 'includes/main-menu.php'?>

 	<div style="display:flex;justify-content: center;">
		<iframe 
			
			style="margin-left: auto;margin-right: auto;transition: width .7s ease;border:solid thin grey;margin-top:40px;width: 100%;height:80vh;background-color: #eee;"
			srcdoc="" 
	 
		></iframe>
	</div>

	<script>

		var FILE_NAME 	= null;
		var FILE_ID 	= 0;
		var TRANSITION_INTERVAL = null;
		var TRANSITION_HOVER_ELEMENT = null;
		var CANVAS_EMPTY 	= true;

		var ALLOW_DRAG		= false;
		var CONTROL_MODE 	= false;
		var ALLOW_HOVER		= true;
		var SHOW_GRID		= true;
		var SHOW_TREE		= false;
		var HOVER_MODE		= false;
		var IMPORT_MODE		= false;
		var SHIFT_MODE 		= false;

		var ALLOW_PROPERTIES	= true;
		var SHOW_TRANSFORM		= true;
		var PROPERTIES_DRAG 	= false;
		var TREE_DRAG 			= false;
		var PAGE_LIST_DRAG 		= false;
		var ITEM_RESIZE 		= false;
		var RESIZE_DIRECTION	= 'right';
		var AUTO_CLOSE_ITEM_LOADER 	= true;

		var MUTED_CLASSES 	= [];
		var COPIED_CLASS 	= null;
		var SELECTED_CLASS 	= null;
		var SELECTED_SUDO_CLASS = null;
		var SELECTED_COMBO_CLASS = null;
		var CLONED_CLASSES 	= {};
		var SHOW_SUDO_CLASS = false;
		var SHOW_COMBO_CLASS = false;
		var IFRAME,CANVAS;
		var LOADING_IMAGES = [];
		
		window.addEventListener('load',function(){

			IFRAME = document.querySelector('iframe');
			IFRAME.srcdoc = `
				<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.min.css">
				<style>

					*, ::after, ::before {
					  box-sizing: border-box;
					}

					@font-face{
						src: url(assets/fonts/OpenSans-Regular.ttf);
						font-family: opensans;
					}

					@font-face{
						src: url(assets/fonts/DancingScript-VariableFont_wght.ttf);
						font-family: dancingscript;
					}

					@font-face{
						src: url(assets/fonts/AmaticSC-Regular.ttf);
						font-family: amatic;
					}

					@font-face{
						src: url(assets/fonts/SpecialElite-Regular.ttf);
						font-family: specialelite;
					}

					@font-face{
						src: url(assets/fonts/Yellowtail-Regular.ttf);
						font-family: yellowtail;
					}

					@font-face{
						src: url(assets/fonts/Segoe-UI.ttf);
						font-family: segoe;
					}

					@font-face{
						src: url(assets/fonts/Segoe-UI-Bold.ttf);
						font-family: segoebold;
					}

					@font-face{
						src: url(assets/fonts/Poppins-Regular.ttf);
						font-family: poppins;
					}

					@font-face{
						src: url(assets/fonts/FiraSans-Regular.ttf);
						font-family: fira;
					}

					@font-face{
						src: url(assets/fonts/bonfire.ttf);
						font-family: bonfire;
					}

					@font-face{
						src: url(assets/fonts/adorable-handmade.ttf);
						font-family: adorable-handmade;
					}
					@font-face{
						src: url(assets/fonts/info-story.ttf);
						font-family: info-story
					}
					@font-face{
						src: url(assets/fonts/Montserrat-VariableFont_wght.ttf);
						font-family: montserrat
					}
					@font-face{
						src: url(assets/fonts/ShantellSans-VariableFont-wght.ttf);
						font-family: shantell
					}
					@font-face{
						src: url(assets/fonts/ShadowsIntoLight-Regular.ttf);
						font-family: shadows-into-light
					}
					@font-face{
						src: url(assets/fonts/Mynerve-Regular.ttf);
						font-family: mynerve
					}
					@font-face{
						src: url(assets/fonts/BOD.TTF);
						font-family: bodoni
					}

					body{

						font-family: opensans;
						font-size: 16px;
						margin:0px;
						padding:0px;
						word-break: break-word;
						word-wrap: break-word;
						width:100%;
						overflow-x: hidden;
						overflow-y: scroll;
						margin-left:auto;
						margin-right:auto;
					}
					
					#hoverer > .quickcode-hoverer-handle{

						background-color: grey;
						height: 14px;
						width: 14px;
						position: absolute;
						border-radius: 50%;
						border: solid 2px white;
					}

					#hoverer > .quickcode-top-left{
						left: -9px;
						top: -9px;
					}

					#hoverer > .quickcode-top-right{
						right: -9px;
						top: -9px;
					}

					#hoverer > .quickcode-bottom-left{
						left: -9px;
						bottom: -9px;
					}

					#hoverer > .quickcode-bottom-right{
						right: -9px;
						bottom: -9px;
					}

					#hoverer > .quickcode-bottom{
						left: 50%;
						bottom: -9px;
						transform: translateX(-50%);
					}

					#hoverer > .quickcode-top{
						left: 50%;
						top: -9px;
						transform: translateX(-50%);
					}

					#hoverer > .quickcode-left{
						top: 50%;
						left: -9px;
						transform: translateY(-50%);
					}

					#hoverer > .quickcode-right{
						top: 50%;
						right: -9px;
						transform: translateY(-50%);
					}

					#hoverer{
						border: dotted 2px grey;
						height: 100px;
						width: 200px;
						position: absolute;
						pointer-events: none;
					}

					.quickcode-hide{
						display: none;
					}

					#sub_menu{
						cursor: pointer;
					}

					.quickcode-sub_menu_dropdown div{
						text-align: left;
						padding: 6px;
						cursor: pointer;
						padding-left: 25px;

					}

					.quickcode-top_border{
						border-top: solid thin #444;
					}
					.quickcode-sub_menu_dropdown div:hover{
						background-color: #8298a3;
					}

					.quickcode-sub_menu_dropdown > div > svg{
						position: absolute;
						left:4px;
					}

					.quickcode-sub_menu_dropdown{
						position: absolute;
						width: 185px;
						background-color: #444b55;
						top:35px;
						left:50px;
						padding:4px;
						box-shadow: 0px 0px 10px #666;
						border-radius: 10px;

					}

					.quickcode-canvas-border{
						border-right:solid thin #444;
						border-left:solid thin #444;
					}

					.quickcode-selector > .quickcode-selector-handle{

						background-color: #ff14e5;
						height: 14px;
						width: 14px;
						position: absolute;
						border-radius: 50%;
						border: solid 2px white;
					}

					.quickcode-selector > .quickcode-top-left{
						left: -9px;
						top: -9px;
					}

					.quickcode-selector > .quickcode-top-right{
						right: -9px;
						top: -9px;
					}

					.quickcode-selector > .quickcode-bottom-left{
						left: -9px;
						bottom: -9px;
					}

					.quickcode-selector > .quickcode-bottom-right{
						right: -9px;
						bottom: -9px;
					}

					.quickcode-selector > .quickcode-bottom{
						left: 50%;
						bottom: -9px;
						transform: translateX(-50%);
					}

					.quickcode-selector > .quickcode-top{
						left: 50%;
						top: -9px;
						transform: translateX(-50%);
					}
					.quickcode-selector > .quickcode-left{
						top: 50%;
						left: -9px;
						transform: translateY(-50%);
					}
					.quickcode-selector > .quickcode-right{
						top: 50%;
						right: -9px;
						transform: translateY(-50%);
					}

					.quickcode-selector{
						border: dotted 2px #ff14e5;
						height: 100px;
						width: 200px;
						position: absolute;
						pointer-events: none;
					}


				</style>
				<div class="quickcode-ANIMATION-CSS">

					<div id="fade-in-from-left">
						<style>
							@keyframes fade-in-from-left {
								from{
									opacity: 0;
									translate: -150px 0px;
								}
								to{
									opacity: 1;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					
					<div id="fade-in-from-right">
						<style>
							@keyframes fade-in-from-right {
								from{
									opacity: 0;
									translate: 150px 0px;
								}
								to{
									opacity: 1;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="fade-in-from-top">
						<style>
							@keyframes fade-in-from-top {
								from{
									opacity: 0;
									translate: 0px -150px;
								}
								to{
									opacity: 1;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="fade-in-from-bottom">
						<style>
							@keyframes fade-in-from-bottom {
								from{
									opacity: 0;
									translate: 0px 150px;
								}
								to{
									opacity: 1;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="move-from-left">
						<style>
							@keyframes move-from-left {
								from{
									translate: -150px 0px;
								}
								to{
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="move-from-right">
						<style>
							@keyframes move-from-right {
								from{
									translate: 150px 0px;
								}
								to{
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="move-from-top">
						<style>
							@keyframes move-from-top {
								from{
									translate: 0px -150px;
								}
								to{
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="move-from-bottom">
						<style>
							@keyframes move-from-bottom {
								from{
									translate: 0px 150px;
								}
								to{
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="fade-rotate-from-left">
						<style>
							@keyframes fade-rotate-from-left {
								from{
									opacity: 0;
									rotate: 20deg;
									translate: -150px 0px;

								}
								to{
									opacity: 1;
									rotate: 0deg;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="fade-rotate-from-right">
						<style>
							@keyframes fade-rotate-from-right {
								from{
									opacity: 0;
									rotate: -20deg;
									translate: 150px 0px;
								}
								to{
									opacity: 1;
									rotate: 0deg;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="fade-rotate-from-top">
						<style>
							@keyframes fade-rotate-from-top {
								from{
									opacity: 0;
									rotate: 20deg;
									translate: 0px -150px;
								}
								to{
									opacity: 1;
									rotate: 0deg;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="fade-rotate-from-bottom">
						<style>
							@keyframes fade-rotate-from-bottom {
								from{
									opacity: 0;
									rotate: -20deg;
									translate: 0px 150px;
								}
								to{
									opacity: 1;
									rotate: 0deg;
									translate: 0px 0px;
								}
							}
						</style>
					</div>
					<div id="flip-horizontal-left">
						<style>
							@keyframes flip-horizontal-left {
								from{
									opacity: 0;
									transform: rotateY(-180deg);
								}
								to{
									opacity: 1;
									transform: rotateY(0deg);
								}
							}
						</style>
					</div>
					<div id="flip-horizontal-right">
						<style>
							@keyframes flip-horizontal-right {
								from{
									opacity: 0;
									transform: rotateY(-180deg);
								}
								to{
									opacity: 1;
									transform: rotateY(0deg);
								}
							}
						</style>
					</div>
					<div id="flip-vertical-left">
						<style>
							@keyframes flip-vertical-left {
								from{
									opacity: 0;
									transform: rotateX(-180deg);
								}
								to{
									opacity: 1;
									transform: rotateX(0deg);
								}
							}
						</style>
					</div>
					<div id="flip-vertical-right">
						<style>
							@keyframes flip-vertical-right {
								from{
									opacity: 0;
									transform: rotateX(-180deg);
								}
								to{
									opacity: 1;
									transform: rotateX(0deg);
								}
							}
						</style>
					</div>
					
					<div id="shake-horizontal">
						<style>
							@keyframes shake-horizontal {
							  0%,
							  100% 
							            transform: translateX(0);
							  }
							  10%,
							  30%,
							  50%,
							  70% {
							            transform: translateX(-10px);
							  }
							  20%,
							  40%,
							  60% {
							            transform: translateX(10px);
							  }
							  80% {
							            transform: translateX(8px);
							  }
							  90% {
							            transform: translateX(-8px);
							  }

							}
						</style>
					</div>
					<div id="jello-horizontal">
						<style>
							@keyframes jello-horizontal {
							  0% {

							            transform: scale3d(1, 1, 1);
							  }
							  30% {
							            transform: scale3d(1.25, 0.75, 1);
							  }
							  40% {
							            transform: scale3d(0.75, 1.25, 1);
							  }
							  50% {
							            transform: scale3d(1.15, 0.85, 1);
							  }
							  65% {
							            transform: scale3d(0.95, 1.05, 1);
							  }
							  75% {
							            transform: scale3d(1.05, 0.95, 1);
							  }
							  100% 
							            transform: scale3d(1, 1, 1);
							  }
							}

						</style>
					</div>
					<div id="focus-in">
						<style>

							@keyframes focus-in {
							  0% {
							    letter-spacing: 1em;
							    
							            transform: translateZ(300px);
							    
							            filter: blur(12px);
							    opacity: 0;
							  }
							  100% {
							    
							            transform: translateZ(12px);
							    
							            filter: blur(0);
							    opacity: 1;
							  }
							}

						</style>
					</div>
					<div id="fade-in">
						<style>

							@keyframes fade-in {
							  0% {
							    opacity: 0;
							  }
							  100% {
							    opacity: 1;
							  }
							}

						</style>
					</div>
					
				</div>
				<div class="quickcode-MAIN-CSS"></div>
				<div class="quickcode-SUDO-CSS"></div>
				<div class="quickcode-COMBO-CSS"></div>

				<div class="quickcode-L-MAIN-CSS"></div>
				<div class="quickcode-L-SUDO-CSS"></div>
				<div class="quickcode-L-COMBO-CSS"></div>

				<div class="quickcode-T-MAIN-CSS"></div>
				<div class="quickcode-T-SUDO-CSS"></div>
				<div class="quickcode-T-COMBO-CSS"></div>

				<div class="quickcode-ML-MAIN-CSS"></div>
				<div class="quickcode-ML-SUDO-CSS"></div>
				<div class="quickcode-ML-COMBO-CSS"></div>

				<div class="quickcode-M-MAIN-CSS"></div>
				<div class="quickcode-M-SUDO-CSS"></div>
				<div class="quickcode-M-COMBO-CSS"></div>
				 
				<div style="background-image:url('assets/images/grid_dots_monitor.svg')">
					<div id="CANVAS" ondblclick="if(event.target.tagName == 'IMG') parent.image_loader.load_images()" oncontextmenu="return false;" oninput="parent.selector.refresh_selector_box()" style="z-index:1;min-height:100vh;position:relative;margin-left:auto;margin-right:auto;padding-bottom: 50px;padding-top:1px;background-color: white;"></div>
				</div>
				<div class="quickcode-SCRIPTS"></div>
				<div id="SELECTORS"></div>

				<div id="hoverer" class="quickcode-hide" style="z-index:4901">
					<div class="quickcode-hoverer-handle quickcode-top-left"></div>
					<div class="quickcode-hoverer-handle quickcode-top-right"></div>
					<div class="quickcode-hoverer-handle quickcode-top"></div>
					<div class="quickcode-hoverer-handle quickcode-left"></div>
					<div class="quickcode-hoverer-handle quickcode-bottom-left"></div>
					<div class="quickcode-hoverer-handle quickcode-bottom"></div>
					<div class="quickcode-hoverer-handle quickcode-right"></div>
					<div class="quickcode-hoverer-handle quickcode-bottom-right"></div>

					<span class='quickcode-hover-label'>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; top:-30px;left:50%;translate:-50% 0px;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; bottom:-30px;left:50%;translate:-50% 0px;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; left:-50px;top:50%;translate:0px -50%;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; right:-50px;top:50%;translate:0px -50%;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
					</span>
				</div>

				<div id="selector" class="quickcode-selector quickcode-hide" style="z-index:4901" oncontextmenu="return false;">
					<div id="sub_menu" style="pointer-events: auto;z-index:9;left:10%;color:white;position: absolute;top:-55px;min-height: 40px;padding:5px;width: 160px;background-color: #444b55;">
				    <div style="display:flex;flex-direction:column">
				    	<div id="bounds-info" style="font-size: 12px;user-select: none;">w:0 h:0</div>
				    	<div style="margin-top:4px">
				    		<svg xmlns="trash" id="delete" onclick="parent.submenu_actions.delete_element(event)" fill="#ffcb00" width="24" height="24" viewBox="0 0 24 24"><path  id="delete" d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
				    		<svg title="Edit text" id="edit-text" onclick="parent.actions.edit_text_content()" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" fill="#B5E61D" width="28" height="28" viewBox="0 0 24 24" ><path d="m4.481 15.659c-1.334 3.916-1.48 4.232-1.48 4.587 0 .528.46.749.749.749.352 0 .668-.137 4.574-1.492zm1.06-1.061 3.846 3.846 11.321-11.311c.195-.195.293-.45.293-.707 0-.255-.098-.51-.293-.706-.692-.691-1.742-1.74-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z" fill-rule="nonzero"/></svg>
				    	
				    		<svg title="Align Left" onclick="parent.submenu_actions.align_item('left')" fill="white" width="26" height="26" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" ><path d="m17 17.75c0-.414-.336-.75-.75-.75h-13.5c-.414 0-.75.336-.75.75s.336.75.75.75h13.5c.414 0 .75-.336.75-.75zm5-4c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm-9-4c0-.414-.336-.75-.75-.75h-9.5c-.414 0-.75.336-.75.75s.336.75.75.75h9.5c.414 0 .75-.336.75-.75zm7-4c0-.414-.336-.75-.75-.75h-16.5c-.414 0-.75.336-.75.75s.336.75.75.75h16.5c.414 0 .75-.336.75-.75z" fill-rule="nonzero"/></svg>
				    		<svg title="Align Center" onclick="parent.submenu_actions.align_item('center')" fill="white" width="26" height="26" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" ><path d="m6 17.75c0-.414.336-.75.75-.75h10.5c.414 0 .75.336.75.75s-.336.75-.75.75h-10.5c-.414 0-.75-.336-.75-.75zm-4-4c0-.414.336-.75.75-.75h18.5c.414 0 .75.336.75.75s-.336.75-.75.75h-18.5c-.414 0-.75-.336-.75-.75zm0-4c0-.414.336-.75.75-.75h18.5c.414 0 .75.336.75.75s-.336.75-.75.75h-18.5c-.414 0-.75-.336-.75-.75zm4-4c0-.414.336-.75.75-.75h10.5c.414 0 .75.336.75.75s-.336.75-.75.75h-10.5c-.414 0-.75-.336-.75-.75z" fill-rule="nonzero"/></svg>
				    		<svg title="Align Right" onclick="parent.submenu_actions.align_item('right')" fill="white" width="26" height="26" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"><path d="m7 17.75c0-.414.336-.75.75-.75h13.5c.414 0 .75.336.75.75s-.336.75-.75.75h-13.5c-.414 0-.75-.336-.75-.75zm-5-4c0-.414.336-.75.75-.75h18.5c.414 0 .75.336.75.75s-.336.75-.75.75h-18.5c-.414 0-.75-.336-.75-.75zm9-4c0-.414.336-.75.75-.75h9.5c.414 0 .75.336.75.75s-.336.75-.75.75h-9.5c-.414 0-.75-.336-.75-.75zm-7-4c0-.414.336-.75.75-.75h16.5c.414 0 .75.336.75.75s-.336.75-.75.75h-16.5c-.414 0-.75-.336-.75-.75z" fill-rule="nonzero"/></svg>
				    		<div style="border-top:solid 1px #ccc;padding-top:2px">
					    		<i id="add-item" onclick="parent.item_loader.load_items()" style="font-size:20px;margin-left:2px" class="bi bi-plus-circle-fill"></i>
					    		<svg title="move item up" onclick="parent.submenu_actions.change_z_index('up',event)" fill="white" width="20" height="20" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
					    		<svg title="move item down" onclick="parent.submenu_actions.change_z_index('down',event)" fill="white" width="20" height="20" style="transform:rotate(180deg);" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
					    		<i id="change-image" onclick="parent.image_loader.load_images()" style="font-size:20px;margin-left:2px" class="bi bi-image"></i>
					    		<i onclick="parent.submenu_actions.copy_element()" style="font-size:20px;margin-left:2px" class="bi bi-copy"></i>
					    		<i onclick="parent.submenu_actions.cut_element()" style="font-size:20px;margin-left:2px" class="bi bi-scissors"></i>
					    		<i id="paste-item" onclick="parent.submenu_actions.paste_element(event)" style="font-size:20px;margin-left:2px" class="bi bi-clipboard"></i>
					    	</div>
				    	</div>
				    </div>
				  </div>

					<div onmousedown="parent.selector.set_resize_direction(event, 'top-left')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-top-left" style="pointer-events: auto;cursor:nw-resize;"></div>
					<div onmousedown="parent.selector.set_resize_direction(event, 'top-right')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-top-right" style="pointer-events: auto;cursor:ne-resize;"></div>
					<div onmousedown="parent.selector.set_resize_direction(event, 'top')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-top" style="pointer-events: auto;cursor:n-resize;"></div>
					<div onmousedown="parent.selector.set_resize_direction(event, 'left')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-left" style="pointer-events: auto;cursor:e-resize;"></div>
					<div onmousedown="parent.selector.set_resize_direction(event, 'bottom-left')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-bottom-left" style="pointer-events: auto;cursor:ne-resize;"></div>
					<div onmousedown="parent.selector.set_resize_direction(event, 'bottom')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-bottom" style="pointer-events: auto;cursor:n-resize;"></div>
					<div onmousedown="parent.selector.set_resize_direction(event, 'right')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-right" style="pointer-events: auto;cursor:e-resize;"></div>
					<div onmousedown="parent.selector.set_resize_direction(event, 'bottom-right')" onmouseup="parent.mouse.set_mouse_up(event)" class="quickcode-selector-handle quickcode-bottom-right" style="pointer-events: auto;cursor:nw-resize;"></div>
					
					<span class='quickcode-handle-label'>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; top:-30px;left:50%;translate:-50% 0px;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; bottom:-30px;left:50%;translate:-50% 0px;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; left:-50px;top:50%;translate:0px -50%;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
						<div style='white-space:nowrap;pointer-events:none;position:absolute; right:-50px;top:50%;translate:0px -50%;font-size:10px;text-align:center;display: inline-block;background-color:black;color:white;padding: 1px 2px'>Handle</div>
					</span>
				</div>
				
				<div class="quickcode-TEMP-CANVAS" style="display: none;"></div>
			`;

			IFRAME.addEventListener('load',function(){
				CANVAS = IFRAME.contentWindow.document.querySelector('#CANVAS');

				CANVAS.addEventListener('transitionstart',function(){

					if(TRANSITION_INTERVAL)
						clearInterval(TRANSITION_INTERVAL);

					TRANSITION_INTERVAL = setInterval(function(){
						selector.refresh_selector_box();
						
						if(TRANSITION_HOVER_ELEMENT)
							selector.hover_on_item(TRANSITION_HOVER_ELEMENT);
						
					},10);
				});

				CANVAS.addEventListener('transitionend',function(){
					if(TRANSITION_INTERVAL)
						clearInterval(TRANSITION_INTERVAL);

					selector.refresh_selector_box();
					
					if(TRANSITION_HOVER_ELEMENT)
						selector.hover_on_item(TRANSITION_HOVER_ELEMENT);
				});

			});
		});

	</script>
	
	<?php require 'includes/image-loader.php'?>
	<?php require 'includes/save-as-loader.php'?>
	<?php require 'includes/profile.php'?>
	<?php require 'includes/open-dialog.php'?>
	<?php require 'includes/item-loader.php'?>
	<?php require 'includes/sub-menu.php'?>
	<?php require 'includes/selector.php'?>
	<?php require 'includes/hoverer.php'?>
	<?php require 'includes/page-list.php'?>
	<?php require 'includes/item-properties.php'?>
	<?php require 'includes/page-properties.php'?>
	<?php require 'includes/palettes.php'?>
	<?php require 'includes/image-loader.php'?>
	<?php require 'includes/splash-loader.php'?>
	<?php require 'includes/login.php'?>
	<?php require 'includes/signup.php'?>
	<?php require 'includes/loader.php'?>
	<!--end selectors-->
	
	<!--modals-->
	<!--end modals-->

	<script src="assets/js/data.js"></script>
	<script src="assets/js/io.js"></script>
	<script src="assets/js/selector.js"></script>
	<script src="assets/js/submenu.js"></script>
	<script src="assets/js/image-loader.js"></script>
	<script src="assets/js/item-loader.js"></script>
	<script src="assets/js/mouse.js"></script>
	<script src="assets/js/properties.js"></script>
	<script src="assets/js/window-events.js"></script>
	<script src="assets/js/jscolor.min.js"></script>
	<script src="assets/js/open-dialog.js"></script>
	<script src="assets/js/actions.js"></script>
	<script src="assets/js/responsive.js"></script>
	<script src="assets/js/page.js"></script>
	<script src="assets/js/palette.js"></script>
	<script src="assets/js/tree.js"></script>
	<script src="assets/js/animator.js"></script>
	<script src="assets/js/tabber.js"></script>
	<script src="assets/js/dropper.js"></script>
	<script src="html-to-image.js"></script>
	<script src="assets/js/chart.min.js"></script>
	<script src="assets/js/chart-loader.js"></script>
	<script src="assets/js/slider.js"></script>
	<script src="assets/js/card-slider.js"></script>
	<script src="assets/js/url.js"></script>

</main>
</body>
<style type="text/css">
	
	.tree_canvas_holder .title{
		padding: 4px;
		background-color: #666;
		color: white;
		display: flex;
		justify-content: space-between;
		align-items: center;
		cursor: move;

	}

	.tree_canvas_holder{
		left: 50%;
		top: 50%;
		translate: -50% -50%;
		background-color: white;
		position: absolute;
		width: 500px;
		height:440px;
		box-shadow: 0px 0px 20px #00000066;
	}
</style>
	<div id="tree_canvas_holder" class="tree_canvas_holder quickcode-hide" onmousedown="TREE.set_mouse_down(event)" onmouseup="mouse.set_mouse_up(event)">
		<div class="title">
			<div style="padding-left: 10px">Tree View</div>
			<div onclick="TREE.show(false);document.querySelector('.quickcode-js-allow_tree').checked = false;" style="cursor: pointer;background-color: red;color: white;padding: 5px 15px;">X</div>
		</div>
		<div style="display: flex">
			<canvas onclick="TREE.click(event)" onmousemove="TREE.pos(event)" style="border: solid thin #666;" class="tree-canvas"></canvas>
			
			<div>
				<style type="text/css">
					table{
						width: 200px;
					}
					td{
						border: solid thin #eee;
					}
				</style>
				<table class="tree-info-table">
					<tr>
						<th>Info</th>
					</tr>
					<tr>
						<td>ID</td>
						<td class="item-id">...</td>
					</tr>
					<tr>
						<th>Item Classes</th>
					</tr>
					<tbody class="item-classes">
						
					</tbody>
				</table>
			</div>
		</div>
			
	</div>

	<script>

		jscolor.presets.default = {
		  previewPosition:'right',
		  format:'hexa',
		    closeButton:true,
		    palette: [
		    '#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26',
		    '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
		    '#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d',
		    '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
		  ],

		};

		jscolor.init();

	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-7Y3GHFHLH0"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-7Y3GHFHLH0');
	</script>

	</html>
</html>