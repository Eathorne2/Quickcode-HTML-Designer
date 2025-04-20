<style>
#LOGIN{
	left: 0px;
	top: 0px;
	position: fixed;
	z-index: 9909;
	background-color: #000000cc;
	width: 100vw;
	height: 100vh;

}

#LOGIN > div{
	position: fixed;
	text-align: center;
	width: 400px;
	background-color: white;
	border: solid thin grey;
	box-shadow: 0px 10px 20px #00000088;
	left: 50%;
	top:50%;
	transform: translate(-50%, -50%);

}
</style>

<div id="LOGIN" class="quickcode-hide" onclick="this.classList.add('quickcode-hide')">
	<div onclick="event.stopPropagation()" style="">
	<form onsubmit="IO.login(event)" style="display:flex;">
		<div style="flex: 8;padding: 10px;" class="">
			<div style="width: 40px;float: right;">
				<button type="button" onclick="document.querySelector('#LOGIN').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#faa;cursor: pointer;color: white;">x</button>
			</div>
			<br><br>
			<svg style="border: solid thin #444;border-radius:50%;padding:10px" fill="#444" width="80" height="80" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>

			<h2 style="margin-top:0px">Login</h2>
			<input style="padding-top:1em;padding-bottom:1em;" type="text" class="quickcode-form-control quickcode-email" placeholder="Email">
			<br>
			<input style="padding-top:1em;padding-bottom:1em;" type="password" class="quickcode-form-control quickcode-password" placeholder="Password">
			<br>
			<div>Dont have an account? <span onclick="IO.show_signup()" style="cursor:pointer;color: blue;">Signup here</span></div>
			<br>
			<button style="padding:.5em 4em;font-size: 18px;" class="quickcode-btn quickcode-btn-primary">Login</button>
		</div>
	</form>
	</div>
</div>

