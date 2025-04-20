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
	.nav-list-item{
		line-height: 60px;
		display: inline-block;
		margin: 0px;
		margin-left: 5px;
		margin-right: 5px;
		list-style: none;
		padding: 0px;

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
		transition: all 0.5s ease;
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
		}

		.nav-active{
			background-color: transparent;
			color: #0082e6;
		}
		.nav-link-item:hover{
			background-color: transparent;
			color: #0082e6;
		}
		.nav-checkbtn-input:checked~.nav-ul{
			left: 0px;
		}
		.nav-logo{
			width: 100px;
			height: 60px;
			object-fit: cover;
		}

	}
</style>
<header handle="true" class="header">
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
				<a editable="true" class="nav-link-item" href="#">About</a>
			</li>
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item" href="#">Services</a>
			</li>
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item" href="#">Contact</a>
			</li>
			<li class="nav-list-item">
				<a editable="true" class="nav-link-item" href="#">Help</a>
			</li>
			
		</ul>
	</nav>
	<div class="navbar-offset"></div>
</header>