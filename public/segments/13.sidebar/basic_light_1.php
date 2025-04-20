<style type="text/css">

	.nav-menu-container{
		height: 0px;
	}
	.main-menu {
        background-color:#FFFFFF;
        position:fixed;
        top:0;
        bottom:0;
        height:100vh;
        left:0;
        transition: all 0.5s cubic-bezier(1, -0.65, 0, 1.5) 0s;
        z-index:4000;
        display: inline-block;
        width: 60px;
    	color: #3A3A4F;
    	box-shadow: 0px 0px 20px #00000044;
    }
    .nav-title{
    	text-align: center;
    	font-weight: bold;
    	padding-top: 10px;
    	padding-bottom: 10px;
    	opacity: 0;
    	transition: all 0.5s ease 0s;
    	overflow: hidden;
    	height:0px;
    	width: 100%;
    	color: #DF4500;
    }
    .nav-toggle{
    	display: none;
    }

    .nav-toggle:checked ~ .main-menu{
    	width: 200px;
    }

    .nav-toggle:checked ~ .main-menu .nav-title{
    	opacity: 1;
    	overflow: visible;
    	height:50px;
    	color: #000000;
    }

    .nav-link{
    	color: #636374;
    	text-decoration: none;
    	display: flex;
    	border-bottom: solid 1px #00000022;
    	align-items: center;
    }
    .nav-link-holder{
    	display: none;
    	padding: 10px;
    	flex:4;
    }
    
    .nav-toggle:checked ~ .main-menu .nav-link-holder{
    	display: block;
    }
    
    .ul{
    	list-style: none;
    	margin:0px;
    	padding: 0px;
    	overflow-y: auto;
    	min-height: 300px;
    }
    .li{
    	align-items: center;
    	cursor: pointer;
    	padding: 0px;
    	transition: all 0.5s ease 0s;
    	height: 40px;
    	list-style: none;
    	overflow: hidden;
    }
    .li:hover{
    	background:#000000;
    	border-right: solid 4px #DF4500;
    }
    .li:hover .nav-link{
    	color: #FFFFFF;
    }
    
    .nav-icon{
    	font-size: 24px;
    	padding-left: 5px;
    	padding-right: 5px;
    }
    .nav-user-info{
    	display: flex;
    	justify-content: center;
    	text-align: center;
    	flex-direction: column;
    	align-items: center;
    	background-color: #EEEEEE;
    	border-top: solid 1px #DDDDDD;
    }
    .nav-dp{
    	border: solid 1px #FFFFFF;
    	border-radius: 50%;
    	width: 45px;
    	height: 45px;
    	margin: 4px;
    	margin-top:10px;
    	display: inline-block;
    	object-fit: cover;
    }
    .nav-icon-holder{
    	text-align: center;
    	flex:1;
    }
    .nav-footer{
    	position: absolute;
    	bottom: 0px;
    	left:0px;
    	width:100%;
    	background-color:#FFFFFF;
    }
    .nav-open-icon{
    	font-size: 30px;

    }
    .nav-close-icon{
    	font-size: 30px;
    	display: none;
    }

    .nav-toggle-label{
    	text-align: center;
    	cursor: pointer;
    	display: block;
    }
 
    .nav-toggle:checked ~ .main-menu .nav-open-icon{
    	display: none;
    }

    .nav-toggle:checked ~ .main-menu .nav-close-icon{
    	display: inline;
    }

    .nav-icon-purple{
    	color: #C856D4;
    }
    .nav-icon-blue{
    	color: #729ad0;
    }
    .nav-icon-green{
    	color: #98cea2;
    }
    .nav-icon-orange{
    	color: #e29b29;
    }
    .nav-icon-red{
    	color: #de3b52;
    }
    
</style>
<div handle="true" class="nav-menu-container">
	<input class="nav-toggle" id="nav-toggle-ertysfd" type="checkbox" name="">
	<nav class="main-menu">
		<label class="nav-toggle-label" for="nav-toggle-ertysfd">
			<i class="bi bi-list nav-open-icon"></i>
			<i class="bi bi-x-lg nav-close-icon"></i>
		</label>
		<ul class="ul">
			<li class="li">
				<a class="nav-link" href="#">
					<div class="nav-icon-holder">
						<i class="bi bi-house-fill nav-icon nav-icon-purple"></i>
					</div>
					<div class="nav-link-holder">
						<div editable="true" class="nav-link-text" href="#">Home</div>
					</div>
				</a>
			</li>
			<li class="li">
				<a class="nav-link" href="#">
					<div class="nav-icon-holder">
						<i class="bi bi-people nav-icon nav-icon-blue"></i>
					</div>
					<div class="nav-link-holder">
						<div editable="true" class="nav-link-text" href="#">Users</div>
					</div>
				</a>
			</li>
			<li class="li">
				<a class="nav-link" href="#">
					<div class="nav-icon-holder">
						<i class="bi bi-file-post nav-icon nav-icon-green"></i>
					</div>
					<div class="nav-link-holder">
						<div editable="true" class="nav-link-text" href="#">Posts</div>
					</div>
				</a>
			</li>
			<li class="li">
				<a class="nav-link" href="#">
					<div class="nav-icon-holder">
						<i class="bi bi-tags-fill nav-icon nav-icon-orange"></i>
					</div>
					<div class="nav-link-holder">
						<div editable="true" class="nav-link-text" href="#">Categories</div>
					</div>
				</a>
			</li>
			<li class="li">
				<a class="nav-link" href="#">
					<div class="nav-icon-holder">
						<i class="bi bi-gear-fill nav-icon nav-icon-red"></i>
					</div>
					<div class="nav-link-holder">
						<div editable="true" class="nav-link-text" href="#">Settings</div>
					</div>
				</a>
			</li>
			
		</ul>
		<div class="nav-footer">
			<li class="li">
				<a class="nav-link" href="#">
					<div class="nav-icon-holder">
						<i class="bi bi-power nav-icon"></i>
					</div>
					<div class="nav-link-holder">
						<div editable="true" class="nav-link-text" href="#">Logout</div>
					</div>
				</a>
			</li>
			<div class="nav-user-info">
				<img class="nav-dp" src="images/segment_images/people/curly-man-with-broad-smile-shows-perfect-teeth-being-amused-by-interesting-talk-has-bushy-curly-dark-hair-stands-indoor-against-white-blank-wall_273609-17092.jpg">
				<div editable="true" class="nav-title">Hi, User</div>
			</div>
		</div>
	</nav>
</div>