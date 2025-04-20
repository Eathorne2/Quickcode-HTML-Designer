<style type="text/css">
	.signup-section{
		width: 100%;
		height: 100vh;
		background-color: rgb(136, 136, 136);
		background-image: url(images/segment_images/assorted/11.jpg);
		background-size: 100%;
		background-repeat: no-repeat;
		padding: 1px;
	}
	.signup-form{
		width: 100%;
		max-width: 500px;
		margin: 30px auto 10px;
		padding: 20px;
		background-color: rgba(238, 238, 238, 0.557);
		text-align: center;
		border-radius: 10px;
		box-shadow: rgb(136, 136, 136) 1px 1px 30px;
		backdrop-filter:blur(3px);
	}
	.signup-dp{
		width: 150px;
		height: 150px;
		object-fit: cover;
		border-radius: 50%;
	}
	.signup-input-group{
		display: flex;
		margin-top:4px;
		margin-bottom: 4px;
		padding: 4px;
		align-items: center;
		background-color: #F7F7F7FF;
	}
	.signup-input-label{
		min-width: 50px;
		margin: 0.5rem 0.5rem 0.5rem 0px;
		display: inline-block;
		width: 119px;
	}
	.signup-input{
		display: block;
		width: 100%;
		padding: 1em;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: rgb(33, 37, 41);
		background-color: rgb(255, 255, 255);
		background-clip: padding-box;
		border: 1px solid rgb(206, 212, 218);
		appearance: none;
		border-radius: 0.375rem;
		transition: all 0.15s ease-in-out 0s;
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
		width: 260px;
	}
	.signup-title{
		padding-left: 10px;
		padding-right: 10px;
	}
</style>
<section class="signup-section">
	<form handle="true" onsubmit="return false" method="post" enctype="multipart/form-data" class="signup-form">

		<img src="images/segment_images/people/pexels-photo-1066137.jpeg" class="signup-dp">
		<h1 class="signup-title" editable="true">Signup</h1>
		<div class="signup-input-group">
			<label class="signup-input-label" editable="true">Username:</label>
			<input placeholder="" type="text" name="username" class="signup-input">
		</div>
		<div class="signup-input-group">
			<label class="signup-input-label" editable="true">Email:</label>
			<input placeholder="" type="text" name="username" class="signup-input">
		</div>
		<div class="signup-input-group">
			<label class="signup-input-label" editable="true">Password:</label>
			<input placeholder="" type="text" name="username" class="signup-input">
		</div>
		<button class="signup-button" editable="true">Create Account</button>
		
	</form>
</section>