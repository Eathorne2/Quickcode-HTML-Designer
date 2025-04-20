<style type="text/css">
	
	.header-section{

		width:100vw;
		min-height:100vh;
		background-color:#000000FF;
		background-image:url(images/segment_images/assorted/5.jpg);
		background-size:100%;
		background-repeat:no-repeat;
	}
	.header{

	}
	.navbar-offset{

	}
	.navbar{

		height: 60px;
		width: 100%;
		list-style: none;
		max-width:1200px;
		margin:auto
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

		background-color:#000000FF;
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
	.header-container{

		color: #000000FF;
		width:100%;
		height:100%;
		padding:10px;
		background-color:#0000004C;
		display:flex;
		flex-direction:column;
		justify-content:space-between;
		min-height:100vh;
	}
	.header-content{

		color:#FFFFFF;
		width:100%;
		padding:2em;
		text-align:center;
	}
	.header-title{

		padding-left: 10px;
		padding-right: 10px;
		font-size:50px;
		text-transform:uppercase;
	}
	.header-desc-text{

		padding: 5px;
	}
	.link{

		color:#FFFFFF;
		display:inline-block;
		margin:20px;
		padding:15px;
		padding-left:40px;
		padding-right:40px;
		background-color:#1D9EE0FF;
		border-radius:30px;
		text-transform:uppercase;
		text-decoration:none;
		font-size:14px
	}
	.header-icon-holder{

		color: #000000FF;
		width:100%;
		padding:10px;
		text-align:center
	}
	.header-icon{

		color:#C3C3C3;
		margin-left:10px;
		margin-right:10px;
		transition:all 0.6s ease 0s;
		cursor:pointer;
		font-size: 30px;
	}
 
	.img{

		width:100%;
		height:350px;
		object-fit: cover;
	}
 
	.footer-container{

		background-color: #fbfbfd;
		min-height: 200px;
		color: #858da8;
		padding: 20px;
		font-size: 14px;
		box-shadow: 0px 0px 30px #00000029;
	}
	.footer-panel-holder{

		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}
	.footer-panel{

		flex: 1;
		display: flex;
		flex-direction: column;
		min-width: 200px;
		padding: 10px;
	}
	.footer-panel-header{

		font-size: 16px;
		color: #364a6aff;
		font-weight: bold;
	}
	.footer-link{

		color: #858da8;
		line-height: 2;
	}
	.footer-text{

		margin-bottom: 20px;
	}
	.subscribe-button{

		background-color: #5e2cedff;
		color: #ffffffff;
		padding: 10px;
		padding-left: 30px;
		padding-right: 30px;
		border: none;
		border-radius: 5px;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.subscribe-email{

		border: solid thin #ccc;
		padding: 10px;
		outline: none;
		width:100%;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.footer-socials{

		font-size: 25px;
	}
	.footer-social-icon{

		margin: 5px;
		cursor: pointer;
		color: #858da8;
	}
	.footer-social-link{

		text-decoration: none;
	}
	.footer-copyright{

		color: #858da8;
		margin-top:10px;
		margin-bottom:10px;
	}
	.nav-link-item:hover{

		background-color:#000000FF;
	}
	.header-icon:hover{

		color:#5ECBE6;
		display:inline-block;
		translate:0px -8px
	}
	.link:hover{

		opacity:0.8
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
			text-align: center;
			transition: all 0.5s ease;
			overflow-y: auto;
			display:none;
		}
		.nav-active{

			background-color: transparent;
			color: #0082e6;
		}
		.nav-logo{

			width: 100px;
			height: 60px;
			object-fit: cover;
		}
 
		.nav-link-item:hover{

			background-color: transparent;
			color: #0082e6;
		}
 	
		.nav-checkbtn-input:checked~.nav-ul{
			display:block;
			left: 0px;
		}
	}
</style>
<section class="header-section" >
	<div class="header-container" >
		<header class="header" >
			<nav class="navbar" >
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
							About
						</a>
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
							Help
						</a>
					</li>
				</ul>
			</nav>
			<div class="navbar-offset" >
			</div>
		</header>
		<div class="header-content" >
			<h1 editable="true" class="header-title"  animation-name="focus-in" style="animation-name: focus-in; animation-duration: 2s; animation-delay: 0s; animation-timing-function: ease; animation-play-state: running;" animate-on-view="true">
				The style for today
			</h1>
			<div editable="true" class="header-desc-text"  animation-name="fade-rotate-from-top" style="animation-name: fade-rotate-from-top; animation-duration: 2s; animation-delay: 0s; animation-timing-function: ease; animation-play-state: running;" animate-on-view="true">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry
			</div>
			<a href="#" editable="true" class="link"  animation-name="fade-rotate-from-bottom" style="animation-name: fade-rotate-from-bottom; animation-duration: 2s; animation-delay: 0s; animation-timing-function: ease; animation-play-state: running;" animate-on-view="true">
				Learn More
			</a>
		</div>
		<div class="header-icon-holder" >
			<i class="bi bi-twitter header-icon">
			</i>
			<i class="bi header-icon bi-facebook">
			</i>
			<i class="bi header-icon bi-instagram">
			</i>
			<i class="bi header-icon bi-youtube">
			</i>
			<i class="bi header-icon bi-github">
			</i>
		</div>
	</div>
</section>
