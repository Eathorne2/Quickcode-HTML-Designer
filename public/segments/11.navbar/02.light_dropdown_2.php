<style type="text/css">
	.header{
		position: sticky;
		top: 0px;
		z-index: 4000;
	}
	.navbar-offset{

	}
	.navbar{
		height: 80px;
		width: 100%;
		background-color: #FFFFFFFF;
		list-style: none;
		border-top:solid 1px #FFFFFFFF;
	}

	.nav-logo-holder{
		color: white;
		font-size: 35px;
		padding: 0px;
		

	}
	.nav-ul{
		float: right;
		margin-right: 20px;
		list-style: none;
		padding: 0px;
		margin: 0px;
	}
	.child-nav-ul{
		position: absolute;
		list-style: none;
		padding: 0px;
		margin: 0px;
		margin-top: -10px;
		background-color: white;
		box-shadow: 5px 5px 20px #00000066;
		cursor: pointer;
		display: none;
		min-width: 100px;
	}
	
	.nav-list-item{
		line-height: 80px;
		display: inline-block;
		margin: 0px;
		padding-left: 5px;
		padding-right: 5px;
		list-style: none;
		padding: 0px;

	}
	
	.child-nav-list-item{
		line-height: 40px;
		margin: 0px;
		padding: 0px;
		list-style: none;
		width: 100%;
		cursor: pointer;
	}

	.nav-list-item:hover .child-nav-ul{
		display: block;
	}
	.nav-link-item{
		border-radius: 3px;
		padding: 7px;
		padding-left: 16px;
		padding-right: 16px;
		font-size: 15px;
		color: #606060FF;
		text-decoration: none;
		list-style: none;
		transition: all 0.5s ease 0s;
	}
	.child-nav-link-item{
		border-radius: 3px;
		padding: 7px;
		padding-left: 13px;
		padding-right: 13px;
		font-size: 15px;
		color: #33485CFF;
		text-decoration: none;
		list-style: none;
		width: 100%;
	}
	.nav-active{
		background-color: #ffffff;
		color: #1b9bff;
	}
	.nav-checkbtn{
		font-size: 30px;
		color: #606060FF;
		float: right;
		line-height: 80px;
		cursor: pointer;
		margin-right: 40px;
		display: none;
	}

	.nav-logo{
		width: 160px;
		height: 80px;
		object-fit: cover;
	}
 
	.nav-link-dropdown{
		position: relative;
		padding-right: 25px;
	}

	.nav-link-dropdown::before{
		position: absolute;
		content: "\276F";
		font-size: 16px;
		top: 50%;
		right: 10px;
		transform: translateY(-50%) rotate(90deg);
		color: inherit;
	}

	.nav-link-item:hover{
		background-color: #ffffff;
		color: #1b9bff;
	}
	 
	.child-nav-list-item:hover{
		background-color: #ffffff;
		color: #0082e6;
		width:100%;
	}

	.child-nav-list-item:hover > .child-nav-link-item {
		color: #1b9bff;
	}

	
</style>
<style id="laptop" type="text/css">
	@media screen and (max-width: 992px)
	{
		.navbar-offset{
			height: 80px;
		}
		.nav-checkbtn{
			display: block;
		}
		.nav-logo-holder{
			font-size: 30px;
			padding-left: 0px;
		}

		.nav-link-item{
			font-size: 16px;
		}
		.nav-list-item{
			display: block;
			padding: 0px;
			margin-top: 0px;
			margin-bottom: 0px;
			line-height: 80px;
		}

		.navbar{
			position: fixed;
			top:0px;
			left:0px;
			display: flex;
			justify-content: space-between;
			box-shadow: 0px 0px 20px #47474765;
		}
 
		.nav-ul{
 			background-color: #EAEAEAFF;
			position: fixed;
			width: 100%;
			height: 100vh;
			top:60px;
			left:-100%;
			text-align: center;
			transition: all 0.5s ease 0s;
			overflow-y: auto;
		}

		.nav-active{
			background-color: transparent;
			color: #0082e6;
		}

		.child-nav-list-item{
			padding: 0px;
			margin: 0px;
		}

		.nav-checkbtn-input:checked~.nav-ul{
			left: 0px;
		}
		.nav-logo{
			height: 80px;
			object-fit: cover;
		}

		.child-nav-ul{
			position: static;
			width: 100%;
			padding: 0px;
		}

		.nav-link-item:hover{
			background-color: transparent;
			color: #0082e6;
		}

		.child-nav-list-item:hover > .child-nav-link-item {
			color: #1b9bff;
		}
 
	}
</style>
<header handle="true" class="header">
 
	<nav class="navbar">
		<label class="nav-logo-holder">
			<img class="nav-logo" ondragstart="return false" src="images/segment_images/logos/placeholder-logo-3.png" >
		</label>
		<input type="checkbox" id="nav-toggle-check" class="nav-checkbtn-input" style="display: none;">
		<label for="nav-toggle-check" class="nav-checkbtn"><i class="bi bi-list nav-toggle-icon"></i></label>
		<ul class="nav-ul">
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item nav-active" href="#">Home</a>
			</li>
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item nav-link-dropdown" href="#">Dropdown</a>
				
				<ul class="child-nav-ul">
					<li class="child-nav-list-item">
						<a editable="true" class="child-nav-link-item" href="#">Dropdown Item 1</a>
					</li>
					<li class="child-nav-list-item">
						<a editable="true" class="child-nav-link-item" href="#">Dropdown Item 2</a>
					</li>
					<li class="child-nav-list-item">
						<a editable="true" class="child-nav-link-item" href="#">Dropdown Item 3</a>
					</li>
					<li class="child-nav-list-item">
						<a editable="true" class="child-nav-link-item" href="#">Dropdown Item 4</a>
					</li>
					<li class="child-nav-list-item">
						<a editable="true" class="child-nav-link-item" href="#">Dropdown Item 5</a>
					</li>
					
				</ul>
			</li>
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item" href="#">Services</a>
			</li>
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item" href="#">Contact</a>
			</li>
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item" href="#">About</a>
			</li>
			
		</ul>
	</nav>
	<div class="navbar-offset"></div>
</header>