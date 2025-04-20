<style>
#SIGNUP{
	
	position: fixed;
	width: 100vw;
	height: 100vh;
	background-color: #000000cc;
	left: 0px;
	top:0px;
	z-index: 9909;
}
#SIGNUP > div{
	
	position: fixed;
	width: 400px;
	background-color: white;
	border: solid thin grey;
	box-shadow: 0px 10px 20px #00000088;
	left: 50%;
	top:50%;
	transform: translate(-50%, -50%);
	text-align: center;
}

</style>

<div id="SIGNUP" class="quickcode-hide" onclick="this.classList.add('quickcode-hide')">
	<div onclick="event.stopPropagation()" style="">
	<form onsubmit="IO.signup(event)" style="display:flex;">
		<div style="flex: 8;padding: 10px;" class="">
			<div style="width: 40px;float: right;">
				<button type="button" onclick="document.querySelector('#SIGNUP').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#faa;cursor: pointer;color: white;">x</button>
			</div>
			<div style="text-align: center;background-color: #e4cece;border-radius: 50%;padding: 5px;margin-left: auto;margin-right: auto;width: 70px;height: 70px;">
				<svg style="" fill="#fff" width="50" height="50" viewBox="0 0 24 24"><path d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z"/></svg>
			</div>
			<h2 style="margin-top:0px">Signup</h2>
			<input style="padding-top:1em;padding-bottom:1em;" type="text" class="quickcode-form-control quickcode-username" placeholder="Username" name="username">
			<br>
			<input style="padding-top:1em;padding-bottom:1em;" type="email" class="quickcode-form-control quickcode-email" placeholder="Email" name="email">
			<br>
			
			<input style="padding-top:1em;padding-bottom:1em;" type="password" class="quickcode-form-control quickcode-password" placeholder="Password" name="password">
			<br>
			<input style="padding-top:1em;padding-bottom:1em;" type="password" class="quickcode-form-control quickcode-retype_password" placeholder="Retype Password" name="retype_password">
			<br>
			
			<div>Already have an account? <span onclick="IO.show_login()" style="cursor:pointer;color: blue;">Login here</span></div>
			<br>
			<button style="padding:.5em 4em;font-size: 18px;" class="quickcode-btn quickcode-btn-primary">Create Account</button>
		</div>
	</form>
	</div>
</div>

