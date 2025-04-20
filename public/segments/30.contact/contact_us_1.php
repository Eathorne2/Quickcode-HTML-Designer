<style type="text/css">
	
	.contact-section{

		padding:10px;
		width:100%;
		min-height: 400px;
		background-color:#f1f1f1;
		padding-top:3em;
		padding-bottom:3em
	}
	.grid-container{

		display: flex;
		flex-wrap:wrap;
		max-width:800px;
		margin:auto
	}
	.grid-left{

		flex: 1;
		min-width:300px;
		min-height: 200px;
		vertical-align: top;
	}
	.grid-right{

		flex: 1;
		min-width:300px;
		min-height: 200px;
		vertical-align: top;
	}
	.input-container{

		display: flex;
		margin-top:4px;
		margin-bottom: 4px;
		padding: 4px;
		align-items:flex-start;
		flex-direction:column
	}
	.input-control-textarea{

		display: block;
		width: 100%;
		padding: .375rem .75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #212529;
		background-color:#DDDDDDFF;
		background-clip: padding-box;
		border:solid 1px #DDDDDDFF;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		height:177px;
		outline:none
	}
	.input-label{

		min-width:50px;
		margin: .5rem;
		margin-left:0px;
		display: inline-block;
	}
	.input-container{

		margin-top:4px;
		margin-bottom: 4px;
		padding: 4px;
		align-items: center;
	}
	.input-label{

		margin: .5rem;
		margin-left:0px;
		display: inline-block;
	}
	.input-control{

		display: block;
		width: 100%;
		padding: .375rem .75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #212529;
		background-color:#ddd;
		background-clip: padding-box;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		border:solid 1px #DDDDDDFF;
		outline:none;
		outline:none
	}
	.contact-title{

		padding-left: 10px;
		padding-right: 10px;
		max-width:800px;
		margin:auto;
		text-align:center;
		color:#383838;
		text-transform:uppercase;
		font-size:30px
	}
	.contact-send-text{

		color:#65B72E;
		width:100%;
		height:33px;
		background-color:#dddddd;
		margin-top:-1px;
		padding-left:10px;
		padding-right:10px;
		display:flex;
		justify-content:flex-end;
		align-items:center
	}
	.contact-send-button{

		padding: 5px;
		font-weight:bold;
		cursor:pointer
	}
 
	.contact-socials{

		color:#383838;
		width:100%;
		padding:10px;
		max-width:800px;
		margin:auto;
		text-align:center
	}
 
	.contact-icon{

		margin-left:10px;
		margin-right:10px;
		cursor:pointer;
		font-size: 30px;
	}

	.contact-send-icon{
		font-size: 30px;
		cursor:pointer;
	}
</style>
<section class="contact-section" >
	<h1 editable="true" class="contact-title" >Contact us</h1>
	<div class="grid-container" >
		<div class="grid-left" >
			<div class="input-container" >
				<label editable="true" class="input-label" >Name</label>
				<input placeholder="" type="text" name="username" class="input-control" >
			</div>
			<div class="input-container" >
				<label editable="true" class="input-label" >Email</label>
				<input placeholder="" type="text" name="username" class="input-control" >
			</div>
			<div class="input-container" >
				<label editable="true" class="input-label" >Subject</label>
				<input placeholder="" type="text" name="username" class="input-control" >
			</div>
		</div>
		<div class="grid-right" >
			<div class="input-container" >
				<label editable="true" class="input-label" >Message</label>
				<textarea placeholder="" name="comments" class="input-control-textarea" ></textarea>
				<div class="contact-send-text" >
					<div editable="true" class="contact-send-button" >Send</div>
					<i class="bi bi-envelope contact-send-icon">
					</i>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-socials" >
		<i class="bi bi-twitter contact-icon">
		</i>
		<i class="bi bi-facebook contact-icon">
		</i>
		<i class="bi bi-instagram contact-icon">
		</i>
		<i class="bi bi-youtube contact-icon">
		</i>
		<i class="bi bi-github contact-icon">
		</i>
	</div>
</section>