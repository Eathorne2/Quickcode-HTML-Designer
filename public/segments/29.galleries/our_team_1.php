<style>
	.content-container{
		width: 100%;
		background-color: rgb(254, 254, 254);
		padding: 20px;
	}
	.main-content{
		width: 100%;
		max-width: 1200px;
		margin-left:auto;
		margin-right:auto;
		padding: 10px;
		text-align: center;
	}
	
	.main-title{
		padding-left: 10px;
		padding-right: 10px;
		font-size: 30px;
		text-transform: uppercase;
	}
	.user-card{
		width: 350px;
		height: 450px;
		background-color: rgb(255, 255, 255);
		color: rgb(53, 53, 53);
		border-radius: 20px;
		margin: 10px;
		left: 1px;
		top: 0px;
		position: relative;
		overflow: hidden;
		transition: all 0.3s ease 0s;
		cursor: pointer;
		text-align: center;
		z-index: 1;
		display: inline-block;
	}
	.user-card:hover{
		width: 350px;
		height: 450px;
		background-color: rgb(255, 255, 255);
		color: rgb(53, 53, 53);
		border-radius: 20px;
		margin: 10px;
		position: relative;
		overflow: hidden;
		transition: all 0.3s ease 0s;
		cursor: pointer;
		text-align: center;
		z-index: 1;
		box-shadow: rgb(141, 141, 141) 1px 1px 30px;
		transform: translateY(-5px);
	}
	.top-corner-box{
		width: 275px;
		height: 287px;
		padding: 10px;
		background-color: rgb(221, 221, 221);
		color: rgb(255, 255, 255);
		border-radius: 50%;
		left: -32px;
		top: -46px;
		position: absolute;
		z-index: -1;
	}
	.user-card-img{
		border-radius: 50%;
		width: 150px;
		height: 150px;
		object-fit: cover;
		margin: 20px;
	}
	.user-card-name{
		padding-left: 10px;
		padding-right: 10px;
		font-size: 24px;
	}
	.user-card-title{
		padding-left: 10px;
		padding-right: 10px;
		color: rgb(91, 91, 91);
	}
	.user-card-button{
		font-size: 16px;
		padding: 10px;
		border: medium none;
		color: rgb(255, 255, 255);
		background-color: rgb(13, 110, 253);
		border-radius: 30px;
		margin: 0.25rem 0.125rem;
		cursor: pointer;
		width: 210px;
	}
	.user-card-socials{
		height: 50px;
		color: rgb(92, 148, 255);
	}
	.user-card-icon{
		font-size: 30px;
		margin-left: 10px;
		margin-right: 10px;
	}
	.user-card-footer{
		padding: 10px;
		background-color: rgb(255, 126, 38);
		color: rgb(255, 255, 255);
		display: flex;
		align-items: center;
		justify-content: center;

	}
	.user-card-footer-text{

	}
</style>
<section class="content-container" >

	<div handle="true" class="main-content">
		<h1 class="main-title" editable="true">Our Team</h1>

		<div handle="true" class="user-card" >
			<div class="top-corner-box" ></div>
			<img ondragstart="return false" src="images/segment_images/people/beautiful-happy-african-american-woman-has-surprised-joyful-expression-cannot-believe-sudden-success-dressed-casual-white-jumper_273609-43273.jpg" class="user-card-img" >
			<h1 class="user-card-name" editable="true">Jane Jonnes</h1>
			<h4 class="user-card-title" editable="true">Web Designer</h4>
			<button class="user-card-button" editable="true">Follow</button>
			<div class="user-card-socials" >
				<i class="bi bi-facebook user-card-icon"></i>
				<i class="bi bi-twitter user-card-icon" ></i>
				<i class="bi bi-linkedin user-card-icon" ></i>
			</div>
			<div class="user-card-footer">
				<div class="user-card-footer-text" editable="true">View Profile</div>
			</div>
		</div>

		<div handle="true" class="user-card" >
			<div class="top-corner-box" ></div>
			<img ondragstart="return false" src="images/segment_images/people/beautiful-sincere-happy-girl-smiling-laughing_176420-9693.jpg" class="user-card-img" ><h1 class="user-card-name"  editable="true">Mary Thomas</h1><h4 class="user-card-title"  editable="true">Web Designer</h4>
			<button class="user-card-button" editable="true">Follow</button><div class="user-card-socials" >
				<i class="bi bi-facebook user-card-icon"></i>
				<i class="bi bi-twitter user-card-icon" ></i>
				<i class="bi bi-linkedin user-card-icon" ></i>
			</div>
			<div class="user-card-footer">
				<div class="user-card-footer-text" editable="true">View Profile</div>
			</div>
		</div>

		<div handle="true" class="user-card" >
			<div class="top-corner-box" ></div>
			<img ondragstart="return false" src="images/segment_images/people/close-up-shot-ordinary-fair-haired-caucasian-male-with-bristle-earrings-staring-carefree-being-indifferent-calm_176420-25002.jpg" class="user-card-img" ><h1 class="user-card-name"  editable="true">Jack Doe</h1><h4 class="user-card-title"  editable="true">Web Designer</h4>
			<button class="user-card-button" editable="true">Follow</button>
			<div class="user-card-socials" >
				<i class="bi bi-facebook user-card-icon"></i>
				<i class="bi bi-twitter user-card-icon" ></i>
				<i class="bi bi-linkedin user-card-icon"></i>
			</div>
			<div class="user-card-footer">
				<div class="user-card-footer-text" editable="true">View Profile</div>
			</div>
		</div>
			
		<div handle="true" class="user-card" >
			<div class="top-corner-box" ></div>
			<img ondragstart="return false" src="images/segment_images/people/beautiful-happy-african-american-woman-has-surprised-joyful-expression-cannot-believe-sudden-success-dressed-casual-white-jumper_273609-43273.jpg" class="user-card-img" ><h1 class="user-card-name"  editable="true">Jane Jonnes</h1><h4 class="user-card-title"  editable="true">Web Designer</h4>
			<button class="user-card-button" editable="true">Follow</button>
			<div class="user-card-socials" >
				<i class="bi bi-facebook user-card-icon"></i>
				<i class="bi bi-twitter user-card-icon" ></i>
				<i class="bi bi-linkedin user-card-icon"></i>
			</div>
			<div class="user-card-footer">
				<div class="user-card-footer-text" editable="true">View Profile</div>
			</div>
		</div>

		<div handle="true" class="user-card" >
			<div class="top-corner-box" ></div>
			<img ondragstart="return false" src="images/segment_images/people/candid-shot-serious-european-lady-makes-shush-gesture-keesp-index-finger-lips_273609-44692.jpg" class="user-card-img" ><h1 class="user-card-name"  editable="true">Kate Middle</h1><h4 class="user-card-title"  editable="true">Web Designer</h4>
			<button class="user-card-button" editable="true">Follow</button>
			<div class="user-card-socials">
				<i class="bi bi-facebook user-card-icon"></i>
				<i class="bi bi-twitter user-card-icon" ></i>
				<i class="bi bi-linkedin user-card-icon" ></i>
			</div>
			<div class="user-card-footer" >
				<div class="user-card-footer-text"  editable="true">View Profile</div>
			</div>
		</div>
		<div handle="true" class="user-card" >
			<div class="top-corner-box" ></div>
			<img ondragstart="return false" src="images/segment_images/people/excited-smiling-curly-haired-girl-showing-credit-card-paying-online-order-using-smartphone_176420-20206.jpg" class="user-card-img" ><h1 class="user-card-name"  editable="true">Joana Phiri</h1><h4 class="user-card-title"  editable="true">Web Designer</h4>
			<button class="user-card-button" editable="true">Follow</button>
			<div class="user-card-socials">
				<i class="bi bi-facebook user-card-icon"></i>
				<i class="bi bi-twitter user-card-icon" ></i>
				<i class="bi bi-linkedin user-card-icon" ></i>
			</div>
			<div class="user-card-footer" >
				<div class="user-card-footer-text"  editable="true">View Profile</div>
			</div>
		</div>
	</div>

</section>
