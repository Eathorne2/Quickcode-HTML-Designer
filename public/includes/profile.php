<style>
#PROFILE{
	
	position: fixed;
	width: 400px;
	background-color: white;
	border: solid thin grey;
	box-shadow: 0px 10px 20px #aaa;
	left: 50%;
	top:50%;
	transform: translate(-50%, -50%);
	z-index: 9909;
	text-align: center;
}
</style>

<div id="PROFILE" class="quickcode-hide">
	<form onsubmit="IO.save_profile(event)" style="display:flex;">
		<div style="flex: 8;padding: 10px;" class="">
			<div style="width: 40px;float: right;">
				<button type="button" onclick="document.querySelector('#PROFILE').classList.add('quickcode-hide')" style="border-radius:0px;width:100%;padding:8px;border:none;background-color:#faa;cursor: pointer;color: white;">x</button>
			</div>
			<br><br>
			<svg fill="#444" width="50" height="50" viewBox="0 0 24 24"><path d="M6 16h-6v-3h6v3zm-2-5v-10h-2v10h2zm-2 7v5h2v-5h-2zm13-7h-6v-3h6v3zm-2-5v-5h-2v5h2zm-2 7v10h2v-10h-2zm13 3h-6v-3h6v3zm-2-5v-10h-2v10h2zm-2 7v5h2v-5h-2z"/></svg>

			<h2 style="margin-top:0px">Profile Settings</h2>
			<input style="padding-top:1em;padding-bottom:1em;" type="text" class="quickcode-form-control quickcode-username" placeholder="Username">
			<br>
			<input style="padding-top:1em;padding-bottom:1em;" type="text" class="quickcode-form-control quickcode-email" placeholder="Email">
			<br>
			
			<input style="padding-top:1em;padding-bottom:1em;" type="password" class="quickcode-form-control quickcode-password" placeholder="Password (leave empty to keep old password)">
			<br>
			<input style="padding-top:1em;padding-bottom:1em;" type="password" class="quickcode-form-control quickcode-retype_password" placeholder="Retype Password">
			<br>
			
			<button style="padding:.5em 4em;font-size: 18px;" class="quickcode-btn quickcode-btn-primary">Save</button>
		</div>
	</form>
</div>

