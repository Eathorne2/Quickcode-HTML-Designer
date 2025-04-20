<style type="text/css">

	.header-section{

		width:100vw;
		min-height: 400px;
		height:100vh;
		background-color:#000000FF;
		background-image:url(images/segment_images/photography/pexels-valdemaras-d-1647962.jpg);
		background-size:100%;
		background-repeat:no-repeat
	}
	.header-holder{

		color: #000000FF;
		width:100%;
		height:100%;
		background-color:#00000089;
		display:flex;
		flex-direction:column;
		justify-content:space-between
	}
	.header{
	}
	.navbar-offset{

	}
	.navbar{

		height: 60px;
		width: 100%;
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
		margin-top: 0px;
		background-color: white;
		box-shadow: 5px 5px 20px #00000066;
		cursor: pointer;
		display: none;
		min-width: 100px;
	}
	.nav-list-item{

		line-height: 40px;
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
	.nav-link-item{

		border-radius: 3px;
		padding-left: 13px;
		padding-right: 13px;
		font-size: 15px;
		color: white;
		text-transform: uppercase;
		text-decoration: none;
		list-style: none;
		transition: all 0.5s ease;
		display: inline-block;
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
		transition: all 0.5s ease;
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
	.nav-logo{

		width: 160px;
		height: 60px;
		object-fit: cover;
	}
	.nav-dropdown-caret{
		margin-left: 5px;
		float: right;
		color: #ffffff;
	}
	.nav-contacts-holder{

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
		transition: all 0.3s ease;
	}
	.header-content-holder{

		color:#FFFFFF;
		width:100%;
		height:100px;
		padding:10px;
		flex:5;
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-items:center;
		left:2px;
		top:98px
	}
	.header-buttons-holder{

		color: #000000FF;
		width:100%;
		height:100px;
		padding:10px;
		flex:1;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.header-subtitle{

		padding-left: 10px;
		padding-right: 10px;
		left:9px;
		top:523px;
		margin:0px;
		font-family:montserrat;
		text-transform:uppercase;
		font-size:25px;
		font-weight:300;
		letter-spacing:4px
	}

	.header-title{

		padding-left: 10px;
		padding-right: 10px;
		margin:0px;
		font-size:50px;
		text-transform:uppercase;
		font-family:montserrat;
		font-weight:bold;
		left:429px;
		top:241px;
		letter-spacing:4px
	}
	.header-desc-text{

		padding: 5px;
	}
	.button-blue{

		font-size:16px;
		padding: 10px;
		border:none;
		color:#FFFFFF;
		background-color:#1B9BFFFF;
		border-radius:6px;
		margin:5px;
		cursor: pointer;
		width:176px;
		text-transform:uppercase
	}
	.button-green{

		font-size:16px;
		padding: 10px;
		border:none;
		color:#FFFFFF;
		background-color:#21C077FF;
		border-radius:6px;
		margin:5px;
		cursor: pointer;
		width:176px;
		text-transform:uppercase
	}
	.nav-link-item:hover{

		background-color: #1b9bff;
	}
	.child-nav-list-item:hover{

		background-color: #0082e6;
		color: #ffffff!important;
		width:100%;
	}
	.nav-contacts-icon:hover{

		scale: 1.2;
		translate: 0px 5px;
	}
	.nav-list-item:hover .child-nav-ul{

		display: block;
	}
	.nav-link-text{

	}

</style>
<style id="laptop">
	@media all and (max-width: 992px){
		
		.navbar-offset{

			height: 60px;
		}
		.nav-checkbtn{

			display: block;
			position: absolute;
			right:-30px;
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
		.nav-ul{

			background-color: #19242DFF;
			position: fixed;
			width: 100%;
			height: 100vh;
			top:60px;
			left:-100%;
			text-align: center;
			transition: all 0.5s ease;
			overflow-y: auto;
			display:none;
		}
		.nav-active{

			background-color: transparent;
			color: #0082e6;
		}
		.child-nav-list-item{

			padding: 0px;
			margin: 0px;
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
		.nav-dropdown-caret{

			width: 20px;
			margin-left:-20px;
		}
	
		.nav-link-item:hover{

			background-color: transparent;
			color: #0082e6;
		}

		.nav-checkbtn-input:checked~.nav-ul{
			display:block;
			left: 0px;
		}
		.nav-contacts-holder{
			display: none;
		}
	}
</style>
<section  handle="true" class="header-section" >
	<div class="header-holder" >
		<header handle="true" class="header" >
			<div handle="true" class="nav-contacts-holder" >
				<div class="nav-contacts">
					<a  class="nav-contacts-link" href="#" >
						<i class="bi bi-envelope-fill nav-link-icon"></i>
						<span editable="true" class="nav-link-text">email@email.com</span>
					</a>
					<a  class="nav-contacts-link" href="#" >
						<i class="bi bi-telephone-fill nav-link-icon"></i>
						<span editable="true" class="nav-link-text">+260 977 224 567</span>
					</a>
				</div>
				<div class="nav-socials">
					<a class="nav-contacts-icon nav-contacts-link" href="#" >
						<i class="bi bi-twitter">
						</i>
					</a>
					<a class="nav-contacts-icon nav-contacts-link" href="#" >
						<i class="bi bi-facebook">
						</i>
					</a>
					<a class="nav-contacts-icon nav-contacts-link" href="#" >
						<i class="bi bi-instagram">
						</i>
					</a>
					<a class="nav-contacts-icon nav-contacts-link" href="#" >
						<i class="bi bi-youtube">
						</i>
					</a>
				</div>
			</div>
			<nav handle="true" class="navbar" >
				<label class="nav-logo-holder" >
					<img class="nav-logo" src="images/segment_images/logos/logo_placeholder-300x167.png" >
				</label>
				<input type="checkbox" id="nav-toggle-check" class="nav-checkbtn-input" style="display: none;">
				<label for="nav-toggle-check" class="nav-checkbtn" >
					<i class="bi bi-list nav-toggle-icon">
					</i>
				</label>
				<ul class="nav-ul" >
					<label for="nav-toggle-check" class="nav-checkbtn" >
						<i class="bi bi-x-lg nav-toggle-icon">
						</i>
					</label>
					<li class="nav-list-item" >
						<a editable="true" class="nav-active nav-link-item" href="#" >
							Home
						</a>
					</li>
					<li class="nav-list-item" >
						<a editable="true" class="nav-link-item" href="#" >
							Dropdown
							<i class="bi bi-caret-down-fill nav-dropdown-caret" >
							</i>
						</a>
						<ul class="child-nav-ul" >
							<li class="child-nav-list-item" >
								<a editable="true" class="child-nav-link-item" href="#" >
									Dropdown Item 1
								</a>
							</li>
							<li class="child-nav-list-item" >
								<a editable="true" class="child-nav-link-item" href="#" >
									Dropdown Item 2
								</a>
							</li>
							<li class="child-nav-list-item" >
								<a editable="true" class="child-nav-link-item" href="#" >
									Dropdown Item 3
								</a>
							</li>
							<li class="child-nav-list-item" >
								<a editable="true" class="child-nav-link-item" href="#" >
									Dropdown Item 4
								</a>
							</li>
							<li class="child-nav-list-item" >
								<a editable="true" class="child-nav-link-item" href="#" >
									Dropdown Item 5
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-list-item" >
						<a editable="true" class="nav-link-item" href="#" >
							Services
						</a>
					</li>
					<li class="nav-list-item" >
						<a editable="true" class="nav-link-item" href="#" >
							Contact
						</a>
					</li>
					<li class="nav-list-item" >
						<a editable="true" class="nav-link-item" href="#" >
							About
						</a>
					</li>
				</ul>
			</nav>
			<div class="navbar-offset" >
			</div>
		</header>
		<div handle="true" class="header-content-holder" >
			<h3 editable="true" class="header-subtitle" >
				Education is key
			</h3>
			<h1 editable="true" class="header-title"  animation-name="focus-in" style="animation-name: focus-in; animation-duration: 2s; animation-delay: 0s; animation-timing-function: ease; animation-play-state: running;">
				Navigation Menu
			</h1>
			<div editable="true" class="header-desc-text" >
				Lorem Ipsum is simply dummy text of the printing and typesetting industry
			</div>
		</div>
		<div handle="true" class="header-buttons-holder" >
			<button editable="true" class="button-blue" >
				Demo
			</button>
			<button editable="true" class="button-green" >
				Purchase
			</button>
		</div>
	</div>
</section>