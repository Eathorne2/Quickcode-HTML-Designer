<style type="text/css">
	.text-input{

	height: 54px;
	width: 100%;
	min-width:200px;
	background-color: #f0f4f8;
	font-size: 14px;
	margin-bottom: 15px;
	border: none;
	border-radius: 0;
	padding: 15px 30px;
	font-weight: 500;
	color:#4D4D4DFF;
	transition-duration: 500ms;
	font-family:opensans;
	flex:1
}
.text-area{

	height:250px;
	font-family:opensans
}
.contact-form{

	width:100%;
	margin-left: auto;
	margin-right: auto;
	padding: 5px;
	min-height: 200px;
	margin-top:4em;
	max-width: 800px;
	background-color: #FFFFFF;
}
.submit-button{

	background-color:#3CA59DFF;
	transition-duration: 500ms;
	display: inline-block;
	min-width: 170px;
	height: 54px;
	color: #ffffff;
	border-radius: 0;
	padding: 0 30px;
	font-size: 18px;
	line-height: 54px;
	font-weight: 600;
	text-transform: capitalize;
	font-family:opensans;
	border:none;
	cursor:pointer
}
.reply-title{

	padding: 5px;
	font-size:24px;
	font-weight:bold;
	margin-bottom:20px
}
.input-group{

	color: #000000FF;
	display:flex;
	gap:10px;
	flex-wrap:wrap
}
</style>
<form handle="true" class="contact-form" method="post" enctype="multipart/form-data" >
	<div editable="true" class="reply-title" >
		Leave a reply
	</div>
	<div class="input-group" >
		<input placeholder="Name*" type="text" name="name" class="text-input"  required="true">
		<input placeholder="Email*" type="email" name="email" class="text-input"  required="true">
	</div>
	<input placeholder="Website" type="text" name="website" class="text-input" >
	<textarea placeholder="Message" name="message" class="text-input text-area"  required="true"></textarea>
	<button editable="true" class="submit-button" >
		Submit
	</button>
</form>