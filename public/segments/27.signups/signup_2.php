<style type="text/css">
	.signup-section{
		width: 100%;
		background-color: rgb(255, 255, 255);
		padding: 10px;
	}
	.signup-form{
		width: 100%;
		max-width: 500px;
		margin: 10px auto;
		padding: 10px;
		text-align: center;
	}
	.signup-title{
		padding-left: 10px;
		padding-right: 10px;
		font-size: 50px;
		margin: 0em;
		font-family: amatic;
		letter-spacing: 10px;
	}
	.signup-inputs-holder{
		color: rgb(0, 0, 0);
		text-align: left;
	}
	.signup-button{
		font-size: 16px;
		padding: 15px;
		border: medium none;
		color: rgb(255, 255, 255);
		background-color: rgb(13, 110, 253);
		border-radius: 30px;
		margin: 0.25rem 0.125rem;
		cursor: pointer;
		width: 150px;
	}
	.signup-input-group{
		margin-top:4px;
		margin-bottom: 4px;
		padding: 4px;
		align-items: center;
	}
	.signup-input-label{
		margin: .5rem;
		margin-left:0px;
		display: inline-block;
	}
	.signup-input{
		display: block;
		width: 100%;
		padding: 15px;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: rgb(33, 37, 41);
		background-color: rgb(237, 237, 237);
		background-clip: padding-box;
		appearance: none;
		border-radius: 20em;
		transition: all 0.15s ease-in-out 0s;
		border: medium none;
	}
	.signup-dp{
		width: 200px;
		height: 200px;
		object-fit: cover;
	}
	.signup-title{
		padding-left: 10px;
		padding-right: 10px;
		margin: 0em;
	}
</style>
<section class="signup-section">
	<form handle="true" onsubmit="return false" method="post" enctype="multipart/form-data" class="signup-form">
		<h1 class="signup-title" editable="true">MY DRIVE</h1>
		<img ondragstart="return false" src="images/segment_images/illustrations/woman-coming-other-woman-with-ideas-project_74855-11211.jpg" class="signup-dp">
		<h1 class="signup-title" editable="true">SIGNUP</h1>

		<div class="signup-inputs-holder">
			<div class="signup-input-group">
				<label class="signup-input-label" editable="true">USERNAME</label>
				<input placeholder="Enter a Username" type="text" name="username" class="signup-input">
			</div>
			<div class="signup-input-group">
				<label class="signup-input-label" editable="true">EMAIL</label>
				<input placeholder="Enter a valid Email" type="email" name="email" class="signup-input">
			</div>
			<div class="signup-input-group">
				<label class="signup-input-label" editable="true">PASSWORD</label>
				<input placeholder="Enter a password" type="text" name="password" class="signup-input">
			</div>
		</div>
		<button class="signup-button" editable="true">SIGNUP</button>
		
	</form>
</section>