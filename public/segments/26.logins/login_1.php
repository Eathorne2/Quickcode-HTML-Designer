<style type="text/css">
	.login-form{
		width: 100%;
		max-width: 500px;
		margin: 10px auto;
		background-color: rgb(238, 238, 238);
		left: 510.6px;
		top: 45px;
		text-align: center;
	}
	.top-image-holder{
		width: 100%;
		color: rgb(255, 255, 255);
	}
	.form-top-image{
		width:100%;height:200px;object-fit: cover;
	}
	.login-form-title{
		padding-left: 10px;
		padding-right: 10px;
		margin-top: 0px;
	}
	.login-profile-image{
		width: 180px;
		height: 180px;
		object-fit: cover;
		left: 668.6px;
		top: 154px;
		border-radius: 50%;
		margin-top: -94px;
		border: 8px solid rgb(238, 238, 238);
	}
	.login-input-group{
		margin-top: 4px;
		margin-bottom: 4px;
		padding: 0px 10px;
		align-items: center;
	}
	.login-button-holder{
		width: 100%;
		padding: 10px;
		color: rgb(255, 255, 255);
		text-align: center;
	}
	.login-button{
		font-size: 16px;
		padding: 10px;
		border: medium none;
		color: rgb(255, 255, 255);
		background-color: rgb(13, 110, 253);
		border-radius: 30px;
		margin: 0.25rem 0.125rem;
		cursor: pointer;
		width: 196.6px;
		height: 51.2px;
	}
	.login-form-input{
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
</style>

<form handle="true" onsubmit="return false" method="post" enctype="multipart/form-data" class="login-form" >
	<div class="top-image-holder">
		<img src="images/segment_images/buildings/pexels-photo-2097616.jpeg" class="form-top-image" >
	</div>
	<img src="images/segment_images/people/pexels-photo-845457.jpg" class="login-profile-image" >
	<h1 class="login-form-title"  editable="true">Login</h1>
	<div class="login-input-group" >
		<input placeholder="Email" type="text" name="username" class="login-form-input" >
	</div>
	<div class="login-input-group" >
		<input placeholder="Password" type="password" name="username" class="login-form-input" >
	</div>
	<div class="login-button-holder" >
		<button class="login-button"  editable="true">Login</button>
	</div>
</form>