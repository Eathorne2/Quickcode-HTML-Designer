<style>

.alert-section{

	padding:10px;
	width:100vw;
	min-height: 400px;
	background-color:#0000008E;
	height:100vh;
	display:flex;
	justify-content:center;
	left:0px;
	top:-52px;
	align-items:center
}
.alert-container{

	width:422px;
	height:284px;
	padding:10px;
	background-color:#FFFFFFFF;
	color:#000000FF;
	display:flex;
	justify-content:center;
	align-items:center;
	flex-direction:column;
	border-radius:10px
}

.alert-title{

	padding-left: 10px;
	padding-right: 10px;
	margin:10px;
	left:629px;
	top:218px
}
.alert-message{

	padding: 5px;
	color:#7D7D7DFF;
	margin-bottom:20px
}
.alert-button-green{

	padding:15px;
	width:185px;
	text-align:center;
	display:block;
	background-color:#2ADD5EFF;
	color:#FFFFFFFF;
	cursor:pointer;
	transition:all 0.3s ease 0s;
	border-radius:30px
}
.check-mark{
	font-size: 60px;
	color:#2ADD5EFF;
	
}
.alert-button-green:hover{

	background-color:#30FF6CFF;
	color:#484848FF
}

</style>

<section class="alert-section" >
	<div handle="true" class="alert-container" >
		<i class="bi bi-check-circle-fill check-mark">
		</i>
		<h1 editable="true" class="alert-title" >
			Success Message Title
		</h1>
		<div editable="true" class="alert-message" >
			Well done! You have done something right!
		</div>
		<div editable="true"  class="alert-button-green" >
			OK
		</div>
	</div>
</section>