<style type="text/css">
	.footer-container{
		background-color: #555;
		min-height: 200px;
		color: #ddd;
		font-size: 14px;
		padding: 20px;
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
		color: #ffffff;
		font-weight: bold;
	}
	.footer-link{
		color: #ccc;
		line-height: 2;
		margin-right: 10px;
	}
	.footer-panel-big{
		flex: 2;
	}
	.footer-text{
		margin-bottom: 20px;
	}
	.subscribe-button{
		background-color: #00d188ff;
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
	.footer-socials-holder{
		padding: 1em;
		border-top: solid thin #888888;
		text-align: center;
		margin-top: 20px;
	}
	.footer-socials{
		font-size: 25px;
	}
	.footer-social-icon{
		margin: 5px;
		cursor: pointer;
		color: #ddd;
	}
	.footer-social-link{
		text-decoration: none;
	}
	.footer-copyright{
		background-color: #333;
		padding: 20px;
		display: flex;
		justify-content: space-between;
		color: #ffffff;
	}
	.footer-holder{
		
	}
</style>
<div handle="true" class="footer-holder">
	<footer class="footer-container">

		<div class="footer-panel-holder">
			<div class="footer-panel footer-panel-big">
				<div editable="true" class="footer-panel-header">About us</div>
				<div editable="true" class="footer-text" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
		 		<div editable="true" class="footer-panel-header">Contact us</div>
				<div editable="true" class="footer-text" >
					<div class="footer-phone">(+260) 977 156 879</div>
					<div class="footer-email">email@email.com</div>
				</div>
		 		
			</div>
			<div class="footer-panel">
				<div editable="true" class="footer-panel-header">Information</div>
				<a editable="true" class="footer-link" href="">Home</a>
				<a editable="true" class="footer-link" href="">About us</a>
				<a editable="true" class="footer-link" href="">Blog</a>
				<a editable="true" class="footer-link" href="">Events</a>
				<a editable="true" class="footer-link" href="">Gallery</a>
			</div>
			<div class="footer-panel">
				<div editable="true" class="footer-panel-header">Links</div>
				<a editable="true" class="footer-link" href="">Services</a>
				<a editable="true" class="footer-link" href="">Support</a>
				<a editable="true" class="footer-link" href="">Privacy Policy</a>
				<a editable="true" class="footer-link" href="">Terms & Conditions</a>
			</div>
			<div class="footer-panel">
				<form method="post" >
					<div editable="true" class="footer-panel-header">Subscribe to our newsletter</div>
					<input class="subscribe-email" type="text" name="" placeholder="Enter your email here">
					<button editable="true" class="subscribe-button">Subscribe</button>
				</form>
			</div>
		</div>
		<div class="footer-socials-holder">
			<div class="footer-socials">
				<a class="footer-social-link" href="#"><i class="bi bi-twitter footer-social-icon"></i></a>
				<a class="footer-social-link" href="#"><i class="bi bi-facebook footer-social-icon"></i></a>
				<a class="footer-social-link" href="#"><i class="bi bi-instagram footer-social-icon"></i></a>
				<a class="footer-social-link" href="#"><i class="bi bi-youtube footer-social-icon"></i></a>
				<a class="footer-social-link" href="#"><i class="bi bi-github footer-social-icon"></i></a>
				<a class="footer-social-link" href="#"><i class="bi bi-linkedin footer-social-icon"></i></a>
			</div>
		</div>
	</footer>
	<div class="footer-copyright">
		<div class="footer-copyright-links-holder">
			<a editable="true" class="footer-link" href="">Terms & Conditions</a>
			<a editable="true" class="footer-link" href="">Privacy Policy</a>
		</div>
		<div class="footer-copyright-text-holder">Copyright &copy 2030</div>
	</div>
</div>