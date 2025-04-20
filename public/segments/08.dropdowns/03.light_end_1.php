<style type="text/css">
	.dropdown{
		display: inline-block;
		margin: 10px;
		position: relative;
	}
	.dropdown-menu{
		border: solid thin #ccc;
		padding: 0px;
		background-color: #FFFFFF;
		border-radius: 5px;
		list-style: none;
		position: absolute;
		z-index: 1000;
		margin-top:0px;
		margin-left:4px;
		text-align: left;
		left: 100%;
		top: 0px;
	}
	.dropdown-item{
		text-decoration: none;
		color: inherit;
		width: 100%;
		height: 100%;
		display: block;
		padding: 10px;

	}
	.dropdown-li{
		border-bottom: solid thin #ddd;
		white-space: nowrap;
		color: #222;
		transition: all 0.5s ease;
		cursor: pointer;
	}
	.dropdown-li:hover{
		color: #FFFFFF;
		background-color: #2492EAFF;
	}
	
	.dropdown-li:last-child{
		border-bottom: none;
	}
	
	.dropdown-toggle{
		border-radius: 5px;
		background-color: #eee;
		cursor: pointer;
		padding: 10px;
		border: solid thin #ccc;
		display: flex;
		align-items: center;
		justify-content: center;
		vertical-align: middle;
		white-space: nowrap;
	}
	.dropdown-toggle::after{
		content: "\25b6";
		margin-left: 4px;
		display: inline-block;
		opacity: 0.75;
	}
 
</style>
<div handle="true" class="dropdown">
	<div editable="true" role="dropdown" class="dropdown-toggle">
		Dropdown
	</div>
	<ul role="dropdown-menu" class="dropdown-menu">
		<li class="dropdown-li">
			<a editable="true" class="dropdown-item" href="">An action</a>
		</li>
		<li class="dropdown-li">
			<a editable="true" class="dropdown-item" href="">More action</a>
		</li>
		<li class="dropdown-li">
			<a editable="true" class="dropdown-item" href="">Another action</a>
		</li>
		
	</ul>
</div>s