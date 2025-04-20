<style type="text/css">

	@keyframes page_list_show{
		0%{opacity: 0;transform: translateX(-250px);}
		100%{opacity: 1;transform: translateX(0px);}
	}
 
	#item_page_list .quickcode-page-list > div:hover{
		border: solid 4px grey;
	}

	#item_page_list .selected{
		border: solid 4px #00a0e7;
	}

	#item_page_list .quickcode-page-list > div{
		margin-top:5px;
		cursor: pointer;
		transition: all .2s ease;
	}

	#item_page_list{
		width: 200px;
		background-color: #eeeeee66;
		border: solid thin black;
		height: 80vh;
		overflow-y: auto;
		position: fixed;
		left: 0px;
		top: 40px;
		user-select: none;
		z-index: 4906;
		backdrop-filter: blur(5px);
		animation: page_list_show .5s ease;
	}	
</style>
<div id="item_page_list" class="quickcode-hide" onmousedown="PAGE.set_mouse_down(event)" onmouseup="mouse.set_mouse_up(event)">
	<div style="cursor: move; justify-content: space between;padding: 10px;display: flex;background-color: #888;color: white;">
		<div style="flex: 4">Project Pages</div>
		<div onclick="PAGE.show_list(false)" style="flex: 1;background-color: #ff3c00;cursor:pointer;text-align: center;">x</div>
	</div>
	<div style="display:flex; justify-content: space-between;align-items: center;padding: 2px;">
		<div title="Create new page" onclick="PAGE.save_new('Untitled')" style="cursor:pointer;padding: 4px;background-color:#00a0d7">
			<svg viewBox="0 0 24 24" width="22" height="22" fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M22 24h-20v-24h14l6 6v18zm-7-23h-12v22h18v-16h-6v-6zm1 5h4.586l-4.586-4.586v4.586z"/></svg>
		</div>
		<div title="Move selected page up" onclick="PAGE.move_up()" style="cursor:pointer;padding: 0px;background-color:#00a0d7">
			<svg viewBox="0 0 24 24" width="30" height="30" fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="m16.843 13.789c.108.141.157.3.157.456 0 .389-.306.755-.749.755h-8.501c-.445 0-.75-.367-.75-.755 0-.157.05-.316.159-.457 1.203-1.554 3.252-4.199 4.258-5.498.142-.184.36-.29.592-.29.23 0 .449.107.591.291 1.002 1.299 3.044 3.945 4.243 5.498z"/></svg>
		</div>
		<div title="Move selected page down" onclick="PAGE.move_down()" style="cursor:pointer;padding: 0px;background-color:#00a0d7">
			<svg viewBox="0 0 24 24" width="30" height="30" fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="m16.843 10.211c.108-.141.157-.3.157-.456 0-.389-.306-.755-.749-.755h-8.501c-.445 0-.75.367-.75.755 0 .157.05.316.159.457 1.203 1.554 3.252 4.199 4.258 5.498.142.184.36.29.592.29.23 0 .449-.107.591-.291 1.002-1.299 3.044-3.945 4.243-5.498z"/></svg>
		</div>
		
		<div title="Current page properties" onclick="PAGE.show_properties(true)" style="cursor:pointer;padding: 4px;background-color:#00a0d7">
			<svg viewBox="0 0 24 24" fill="white" width="22" height="22" viewBox="0 0 24 24"><path d="M5.496 1.261l3.77 3.771c.409 1.889-2.33 4.66-4.242 4.242l-3.77-3.771c-.172.585-.254 1.189-.254 1.793 0 1.602.603 3.202 1.826 4.426 1.351 1.351 3.164 1.957 4.931 1.821.933-.072 1.852.269 2.514.931l7.621 7.611c.577.578 1.337.915 2.096.915 1.661 0 3.047-1.411 3.012-3.077-.016-.737-.352-1.47-.914-2.033l-7.621-7.612c-.662-.661-1.002-1.581-.931-2.514.137-1.767-.471-3.58-1.82-4.93-1.225-1.224-2.825-1.834-4.427-1.834-.603 0-1.207.09-1.791.261zm15.459 18.692c0 .553-.447 1-1 1-.553 0-1-.448-1-1s.447-1 1-1 1 .447 1 1z"/></svg>
		</div>
	</div>
	<div class="quickcode-page-list" style="margin: 10px;user-select: none" ondragstart="return false">

	</div>
</div>