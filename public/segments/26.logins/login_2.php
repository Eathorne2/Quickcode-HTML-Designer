<style type="text/css">
	.login-section{
		width: 100%;
		height: 100vh;
		background-color: rgb(243, 224, 226);
		left: -10px;
		padding: 1px;
	}
	.login-form{
		display: flex;
		flex-wrap: wrap;
		max-width: 800px;
		margin: 50px auto auto;
		border-radius: 10px;
		overflow: hidden;
		rotate: -3deg;
		border: 1px solid rgb(206, 212, 218);
		box-shadow: rgb(203, 203, 203) 1px 1px 30px;
	}
	.login-section-1{
		flex: 1 1 0%;
		min-width: 300px;
		min-height: 200px;
		vertical-align: top;
		height: 490px;
		text-align: center;
		background-color: rgb(255, 255, 255);
		padding: 0px;
	}

	.login-items-container{
		width: 100%;
		padding: 20px;
		color: rgb(33, 33, 33);
		height: 100%;
	}
	.login-title{
		padding-left: 10px;
		padding-right: 10px;
		margin-top: 2em;
		text-transform: uppercase;
	}
	.login-section-2{
		flex: 1 1 0%;
		min-width: 300px;
		min-height: 200px;
		background-color: rgb(255, 75, 43);
		vertical-align: top;
		background-size: 218%;
		background-repeat: no-repeat;
		color: rgb(255, 255, 255);
		text-align: center;
		padding: 0px;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}
	.sec-2-heading-text{
		padding-left: 10px;
		padding-right: 10px;
		width: 100%;
		text-transform: uppercase;
		font-weight: bold;
		font-size: 25px;
	}
	.sec-2-text{
		padding: 5px;
		width: 100%;
	}
	.login-socials-holder{
		width: 100%;
		height: 60px;
		padding: 10px;
		color: rgb(130, 130, 130);
		font-size: 35px;
		display: flex;
		justify-content: space-evenly;
	}
	.login-sub-title{
		padding: 5px;
		margin-top: 1em;
		margin-bottom: 1em;
	}
	.login-input{
		display: block;
		width: 100%;
		padding: 10px;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: rgb(33, 37, 41);
		background-color: rgb(229, 229, 229);
		background-clip: padding-box;
		appearance: none;
		transition: all 0.15s ease-in-out 0s;
		border: medium none;
		margin-top: 20px;
		margin-bottom: 10px;
	}
	.login-forgot-text{
		padding: 5px;
		margin-top: 1em;
		margin-bottom: 1em;
	}
	.login-button{
		font-size: 16px;
		padding: 15px;
		border: medium none;
		color: rgb(255, 255, 255);
		background-color: rgb(255, 75, 43);
		border-radius: 30px;
		margin: 0.25rem 0.125rem;
		cursor: pointer;
		width: 274px;
		left: -2px;
	}
</style>
<section class="login-section">
	<form handle="true" method="post" class="login-form">
		<div class="login-section-1">
			<div class="login-items-container">
				<h1 class="login-title" editable="true">Log In</h1>
				<div class="login-socials-holder">
					<i class="bi bi-facebook login-social-icon"></i>
					<i class="bi bi-twitter login-social-icon"></i>
				</div>
				<div class="login-sub-title" editable="true">to use your account</div>
				<input placeholder="Email" type="text" name="username" class="login-input">
				<input placeholder="Password" type="password" name="username" class="login-input">
				<div class="login-forgot-text" editable="true">Forgot your password?</div>
				<button class="login-button" editable="true">LOGIN</button>
			</div>
		</div>
		<div class="login-section-2">
			<h1 class="sec-2-heading-text" editable="true">Login form using<br>HTML Designer</h1>
			<div class="sec-2-text" editable="true">Create this kind of HTML using this free tool on freephptutorials.com</div>
		</div>
	</form>
</section>