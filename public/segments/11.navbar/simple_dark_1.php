<style type="text/css">
	
	.nav-container{
		height: 50px;
		color: #414141;
		font-size: 16px;
		position: sticky;
		top: 0px;
		z-index: 4001;
	}
	.nav-logo-and-icon{
		display: flex;
		justify-content: space-between;
		align-items: center;
		background-color: #FFFFFF;
	}
	.nav-logo-container{
		width:150px;
		height:60px;
		overflow: hidden;
	}
	.nav-logo{
		width:100%;
		height:100%;
		object-fit: cover;
		object-position: 50% 50%;
	}
	.nav-toggle-icon{
		font-size: 35px;
		color: #414141;
		margin:5px;
		cursor: pointer;
	}
	.nav-menu-container{
		width: 200px;
		background-color: #000000FF;
		color: #FFFFFF;
		height: 100vh;
		position: fixed;
		left: 0px;
		top: 0px;
		left:-200px;
		transition: all 0.5s ease 0s;
	}
	.nav-ul{
		list-style: none;
	}
	.nav-li{
		line-height: 2.5;
	}
	.nav-list-item{
		text-decoration: none;
		color: #FFFFFF;
		font-size: 18px;
	}
	.nav-menu-toggle{
		display: none;
	}

	.nav-menu-toggle:checked ~ .nav-menu-container{
		left:0px;
	}
</style>

<header handle="true" class="nav-container">
	<div class="nav-logo-and-icon">
		<div class="nav-logo-container">
			<img class="nav-logo" src="images/segment_images/logos/placeholder-logo-3.png">
		</div>
		<label for="nav-menu-toggle-1" class="nav-toggle-icon-container">
			<i class="bi bi-list nav-toggle-icon"></i>
		</label>
		
		<input class="nav-menu-toggle" id="nav-menu-toggle-1" type="checkbox" name="" style="">
		<div class="nav-menu-container">
			<ul handle="true" class="nav-ul">

				<li class="nav-li">
					<a class="nav-list-item" href="#">
						<div editable="true" class="nav-text-item">Home</div>
					</a>
				</li>
				<li class="nav-li">
					<a class="nav-list-item" href="#">
						<div editable="true" class="nav-text-item">About us</div>
					</a>
				</li>
				<li class="nav-li">
					<a class="nav-list-item" href="#">
						<div editable="true" class="nav-text-item">Contact us</div>
					</a>
				</li>
				<li class="nav-li">
					<a class="nav-list-item" href="#">
						<div editable="true" class="nav-text-item">Help</div>
					</a>
				</li>
				
				
			</ul>
		</div>
	</div>
</header>