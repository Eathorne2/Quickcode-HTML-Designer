<style type="text/css">
	.header{
		position: sticky;
		top: 0px;
		z-index: 4000;
	}
	.navbar-offset{

	}
	.navbar{
		height: 60px;
		width: 100%;
		background-color: #19242DFF;
		list-style: none;
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
		line-height: 60px;
		display: inline-block;
		margin: 0px;
		margin-left: 5px;
		margin-right: 5px;
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
		padding-left: 13px;
		padding-right: 13px;
		font-size: 15px;
		color: white;
		text-transform: uppercase;
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
		background-color: #1b9bff;
	}
	.nav-checkbtn{
		font-size: 30px;
		color: white;
		float: right;
		line-height: 60px;
		cursor: pointer;
		margin-right: 40px;
		display: none;
	}
 
	.nav-link-item:hover{
		background-color: #1b9bff;
	}

	.nav-logo{
		width: 160px;
		height: 60px;
		object-fit: cover;
	}
 
	.child-nav-list-item:hover{
		background-color: #0082e6;
		color: #ffffff;
		width:100%;
	}
	.child-nav-list-item:hover > .child-nav-link-item{
		color: #ffffff;
	}
	.nav-contacts-holder{
		background-color: #222F3D;
		color: white;
		display: flex;
		justify-content: space-between;
		padding: 5px;
	}

	.nav-contacts-link{

		margin-left:5px;
		margin-right:5px;
		display: inline-block;
		color: #c4c4c4;
		font-size: 14px;
	}
	.nav-contacts-icon{
		font-size: 20px;
		background-color: #ffffff;
		padding: 0px;
		padding-left: 5px;
		padding-right: 5px;
		color: #222F3D;
		border-radius: 50%;
		transition: all 0.3s ease 0s;
	}
	.nav-contacts-icon:hover{
		scale: 1.2;
		translate: 0px 5px;
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
	
	
</style>
<style id="laptop" type="text/css">
	@media screen and (max-width: 992px)
	{
		.navbar-offset{
			height: 60px;
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
			margin: 50px;
			margin-top: 0px;
			margin-bottom: 0px;
			line-height: 60px;
		}

		.navbar{
			position: fixed;
			top:0px;
			left:0px;
			display: flex;
			justify-content: space-between;
		}
		.nav-contacts-holder{
			display: none;
		}
		.nav-ul{
 			background-color: #19242DFF;
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
		.nav-link-item:hover{
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
			width: 100px;
			height: 60px;
			object-fit: cover;
		}

		.child-nav-ul{
			position: static;
			width: 100%;
			padding: 0px;
		}

	}
</style>
<header handle="true" class="header">
	<div class="nav-contacts-holder">
		<div class="nav-contacts">
			<a class="nav-contacts-link" href="#">
				<span class="nav-top-icon" editable="true"><i class="bi bi-envelope-fill nav-link-icon"></i></span>
				<span class="nav-email-text">email@email.com</span>
			</a>
			<a class="nav-contacts-link" href="#">
				<span class="nav-top-icon" editable="true"><i class="bi bi-telephone-fill nav-link-icon"></i></span>
				<span class="nav-email-text">+260 977 224 567</span>
			</a>
		</div>
		<div class="nav-socials">
			<a class="nav-contacts-link nav-contacts-icon" href="#">
				<i class="bi bi-twitter"></i>
			</a>
			<a class="nav-contacts-link nav-contacts-icon" href="#">
				<i class="bi bi-facebook"></i>
			</a>
			<a class="nav-contacts-link nav-contacts-icon" href="#">
				<i class="bi bi-instagram"></i>
			</a>
			<a class="nav-contacts-link nav-contacts-icon" href="#">
				<i class="bi bi-youtube"></i>
			</a>
			
		</div>
	</div>
	<nav class="navbar">
		<label class="nav-logo-holder">
			<img class="nav-logo" ondragstart="return false" src="images/segment_images/logos/logo_placeholder-300x167.png" >
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